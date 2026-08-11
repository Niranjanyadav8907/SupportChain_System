<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Department;
use App\Models\User;
use App\Models\Escalation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    /**
     * Display reports interface.
     */
    public function index(Request $request)
    {
        $departments = Department::all();
        $employees = User::whereHas('roles', function($q) {
            $q->where('name', 'Employee');
        })->get();

        $query = Ticket::with(['department', 'creator', 'assignee', 'category']);

        // Apply filters
        if ($request->filled('department_id')) {
            $query->where('department_id', $request->department_id);
        }
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [
                Carbon::parse($request->start_date)->startOfDay(),
                Carbon::parse($request->end_date)->endOfDay()
            ]);
        }

        $tickets = $query->latest()->get();

        // Analytical widgets data
        $analytics = [
            'total' => $tickets->count(),
            'resolved' => $tickets->where('status', 'resolved')->count(),
            'escalated' => $tickets->whereNotNull('escalated_at')->count(),
            'breached' => $tickets->where('sla_deadline', '<', Carbon::now())->whereIn('status', ['open', 'in_progress'])->count()
        ];

        return view('modules.reports.index', compact('tickets', 'departments', 'employees', 'analytics'));
    }

    /**
     * Export reports to CSV.
     */
    public function exportCsv(Request $request)
    {
        $query = Ticket::with(['department', 'creator', 'assignee', 'category']);

        // Apply filters identical to index
        if ($request->filled('department_id')) {
            $query->where('department_id', $request->department_id);
        }
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [
                Carbon::parse($request->start_date)->startOfDay(),
                Carbon::parse($request->end_date)->endOfDay()
            ]);
        }

        $tickets = $query->latest()->get();
        
        $response = new StreamedResponse(function() use ($tickets) {
            $handle = fopen('php://output', 'w');
            
            // Header Columns
            fputcsv($handle, [
                'Ticket Number', 
                'Title', 
                'Department', 
                'Category', 
                'Raised By', 
                'Assigned To', 
                'Priority', 
                'Status', 
                'Created At', 
                'SLA Deadline', 
                'Escalated At'
            ]);

            foreach ($tickets as $ticket) {
                fputcsv($handle, [
                    $ticket->ticket_number,
                    $ticket->title,
                    $ticket->department?->name ?? 'N/A',
                    $ticket->category?->name ?? 'N/A',
                    $ticket->creator?->name ?? 'N/A',
                    $ticket->assignee?->name ?? 'Unassigned',
                    ucfirst($ticket->priority),
                    strtoupper($ticket->status),
                    $ticket->created_at->format('Y-m-d H:i:s'),
                    $ticket->sla_deadline ? $ticket->sla_deadline->format('Y-m-d H:i:s') : 'N/A',
                    $ticket->escalated_at ? $ticket->escalated_at->format('Y-m-d H:i:s') : 'N/A'
                ]);
            }

            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="supportchain_tickets_report_' . Carbon::now()->format('YmdHis') . '.csv"',
        ]);

        return $response;
    }
}
