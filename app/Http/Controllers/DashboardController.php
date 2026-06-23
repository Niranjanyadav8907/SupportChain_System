<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use App\Models\Ticket;
use App\Models\Escalation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the portal dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        $stats = [];

        if ($user->isAdmin()) {
            $stats['total_users'] = User::count();
            $stats['total_departments'] = Department::count();
            $stats['total_tickets'] = Ticket::count();
            $stats['open_tickets'] = Ticket::where('status', 'open')->count();
            $stats['closed_tickets'] = Ticket::where('status', 'closed')->count();
            $stats['escalated_tickets'] = Ticket::whereNotNull('escalated_at')->count();
        } elseif ($user->isTeamLead()) {
            // Team Lead sees tickets of team members who report to them
            $subordinateIds = User::where('reporting_to', $user->id)->pluck('id')->toArray();
            $subordinateIds[] = $user->id; // Include self

            $stats['team_tickets'] = Ticket::whereIn('user_id', $subordinateIds)->count();
            $stats['escalated_tickets'] = Ticket::whereIn('user_id', $subordinateIds)->whereNotNull('escalated_at')->count();
            $stats['assigned_tickets'] = Ticket::where('assigned_to', $user->id)->count();
            $stats['pending_tickets'] = Ticket::whereIn('user_id', $subordinateIds)->whereIn('status', ['open', 'in_progress'])->count();
        } elseif ($user->isProjectManager()) {
            // PM sees all tickets in their department and escalated tickets
            $deptUserIds = User::where('department_id', $user->department_id)->pluck('id')->toArray();
            
            $stats['dept_tickets'] = Ticket::whereIn('user_id', $deptUserIds)->count();
            $stats['escalated_tickets'] = Ticket::whereNotNull('escalated_at')->count();
            $stats['assigned_tickets'] = Ticket::where('assigned_to', $user->id)->count();
            $stats['closed_tickets'] = Ticket::whereIn('user_id', $deptUserIds)->where('status', 'closed')->count();
        } elseif ($user->isHR()) {
            // HR sees HR Request and Leave Request tickets
            $hrTicketQuery = Ticket::whereHas('category', function($q) {
                $q->whereIn('slug', ['hr-request', 'leave-request']);
            });

            $stats['total_hr_tickets'] = (clone $hrTicketQuery)->count();
            $stats['open_hr_tickets'] = (clone $hrTicketQuery)->whereIn('status', ['open', 'in_progress'])->count();
            $stats['closed_hr_tickets'] = (clone $hrTicketQuery)->where('status', 'closed')->count();
        } else {
            // Employee role
            $stats['my_tickets'] = Ticket::where('user_id', $user->id)->count();
            $stats['pending_tickets'] = Ticket::where('user_id', $user->id)->whereIn('status', ['open', 'in_progress'])->count();
            $stats['closed_tickets'] = Ticket::where('user_id', $user->id)->where('status', 'closed')->count();
        }

        // Fetch recent tickets for list
        $recentTickets = Ticket::with(['category', 'creator', 'assignee']);
        if ($user->isAdmin()) {
            $recentTickets = $recentTickets->latest()->take(5)->get();
        } elseif ($user->isTeamLead()) {
            $subordinateIds = User::where('reporting_to', $user->id)->pluck('id')->toArray();
            $subordinateIds[] = $user->id;
            $recentTickets = $recentTickets->whereIn('user_id', $subordinateIds)->latest()->take(5)->get();
        } elseif ($user->isProjectManager()) {
            $deptUserIds = User::where('department_id', $user->department_id)->pluck('id')->toArray();
            $recentTickets = $recentTickets->whereIn('user_id', $deptUserIds)->latest()->take(5)->get();
        } elseif ($user->isHR()) {
            $recentTickets = $recentTickets->whereHas('category', function($q) {
                $q->whereIn('slug', ['hr-request', 'leave-request']);
            })->latest()->take(5)->get();
        } else {
            $recentTickets = $recentTickets->where('user_id', $user->id)->latest()->take(5)->get();
        }

        return view('dashboard.index', compact('stats', 'recentTickets'));
    }
}
