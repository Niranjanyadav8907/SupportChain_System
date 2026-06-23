<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\TicketAttachment;
use App\Models\User;
use App\Models\Department;
use App\Models\ActivityLog;
use App\Models\Escalation;
use App\Notifications\TicketCreatedNotification;
use App\Notifications\TicketAssignedNotification;
use App\Notifications\TicketStatusChangedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    /**
     * Display a listing of tickets.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Ticket::with(['creator', 'assignee', 'category', 'department']);

        // Filter based on user role and department hierarchy
        if ($user->isAdmin()) {
            // Admins see all tickets
        } elseif ($user->isTeamLead()) {
            // Team Leads see tickets raised by their subordinates or assigned to them
            $subordinateIds = User::where('reporting_to', $user->id)->pluck('id')->toArray();
            $subordinateIds[] = $user->id;
            $query->where(function($q) use ($user, $subordinateIds) {
                $q->whereIn('user_id', $subordinateIds)
                  ->orWhere('assigned_to', $user->id)
                  ->orWhere('department_id', $user->department_id);
            });
        } elseif ($user->isProjectManager()) {
            // PMs see all tickets in their department or escalated tickets
            $query->where(function($q) use ($user) {
                $q->where('department_id', $user->department_id)
                  ->orWhere('assigned_to', $user->id)
                  ->orWhereNotNull('escalated_at');
            });
        } elseif ($user->isHR()) {
            // HR sees HR Request and Leave Request tickets
            $query->whereHas('category', function($q) {
                $q->whereIn('slug', ['hr-request', 'leave-request']);
            });
        } else {
            // Employee role: only see own raised tickets
            $query->where('user_id', $user->id);
        }

        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('ticket_number', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $tickets = $query->latest()->get();
        $categories = TicketCategory::all();

        return view('modules.tickets.index', compact('tickets', 'categories'));
    }

    /**
     * Show creation form.
     */
    public function create()
    {
        $categories = TicketCategory::where('status', 'active')->get();
        return view('modules.tickets.create', compact('categories'));
    }

    /**
     * Store new ticket.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:ticket_categories,id',
            'priority' => 'required|in:low,medium,high,critical',
            'attachments.*' => 'nullable|file|max:10240', // 10MB limit per file
        ]);

        $user = Auth::user();
        $category = TicketCategory::find($request->category_id);

        // Generate Ticket Number: TKT-YYYYMMDD-XXXX
        $today = Carbon::today()->format('Ymd');
        $random = strtoupper(Str::random(4));
        $ticketNumber = "TKT-{$today}-{$random}";

        // Calculate SLA Deadline
        $slaDeadline = Carbon::now()->addHours($category->sla_hours);

        // Determine initial assignment according to hierarchy.
        // Employee -> Team Lead (Reporting Manager)
        $assignedTo = null;
        if ($user->reporting_to) {
            $assignedTo = $user->reporting_to;
        } else {
            // Find Team Lead in the department
            $lead = User::whereHas('roles', function($q) {
                $q->where('name', 'Team Lead');
            })->where('department_id', $user->department_id)->first();
            
            $assignedTo = $lead ? $lead->id : null;
        }

        $ticket = Ticket::create([
            'ticket_number' => $ticketNumber,
            'user_id' => $user->id,
            'department_id' => $user->department_id,
            'category_id' => $category->id,
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => 'open',
            'assigned_to' => $assignedTo,
            'sla_deadline' => $slaDeadline
        ]);

        // Upload attachments
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments', 'public');
                TicketAttachment::create([
                    'ticket_id' => $ticket->id,
                    'user_id' => $user->id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                    'file_size' => $file->getSize(),
                    'mime_type' => $file->getMimeType()
                ]);
            }
        }

        // Log action
        ActivityLog::create([
            'user_id' => $user->id,
            'action' => 'TICKET CREATED',
            'description' => "Ticket #{$ticket->ticket_number} created by {$user->name}.",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        // Trigger Notification
        if ($assignedTo) {
            $assignee = User::find($assignedTo);
            try {
                $assignee->notify(new TicketAssignedNotification($ticket, $assignee));
            } catch (\Exception $e) {
                Log::error("Failed to send TicketAssignedNotification: " . $e->getMessage());
            }
        }

        return redirect()->route('tickets.show', $ticket->id)->with('status', 'Ticket raised successfully.');
    }

    /**
     * Show single ticket details.
     */
    public function show(Ticket $ticket)
    {
        $user = Auth::user();
        
        // Authorization check
        if (!$user->isAdmin()) {
            if ($user->isEmployee() && $ticket->user_id !== $user->id) {
                abort(403, 'Unauthorized access to this ticket.');
            }
        }

        $ticket->load(['creator', 'assignee', 'category', 'department', 'comments.user', 'attachments', 'escalations.oldAssignee', 'escalations.escalatedTo']);
        
        // Fetch candidates for ticket assignment (Agents, Leads, Managers in same department or Admins)
        $agents = User::whereHas('roles', function($q) {
            $q->whereIn('name', ['Admin', 'Project Manager', 'Team Lead', 'HR']);
        })->where('status', 'active')->get();

        return view('modules.tickets.show', compact('ticket', 'agents'));
    }

    /**
     * Assign ticket to agent.
     */
    public function assign(Request $request, Ticket $ticket)
    {
        $request->validate([
            'assigned_to' => 'required|exists:users,id',
        ]);

        $agent = User::find($request->assigned_to);
        $oldAssignee = $ticket->assignee;

        $ticket->update([
            'assigned_to' => $agent->id,
            'status' => 'in_progress' // Auto change to in progress upon assignment
        ]);

        // Log timeline comment
        $ticket->comments()->create([
            'user_id' => auth()->id(),
            'comment' => "Ticket assigned to {$agent->name} (Previous: " . ($oldAssignee ? $oldAssignee->name : 'None') . ").",
            'is_internal' => true
        ]);

        // Notification
        try {
            $agent->notify(new TicketAssignedNotification($ticket, $agent));
        } catch (\Exception $e) {
            Log::error("Failed to notify assignee: " . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => "Ticket assigned successfully to {$agent->name}."
        ]);
    }

    /**
     * Transition ticket status.
     */
    public function updateStatus(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:open,in_progress,resolved,closed,reopened',
            'comment' => 'nullable|string'
        ]);

        $oldStatus = $ticket->status;
        $ticket->status = $request->status;

        // If closing or resolving, update metrics if needed
        $ticket->save();

        // Create log comment
        $commentText = "Status changed from " . strtoupper(str_replace('_', ' ', $oldStatus)) . " to " . strtoupper(str_replace('_', ' ', $request->status)) . ".";
        if ($request->filled('comment')) {
            $commentText .= " Note: " . $request->comment;
        }

        $ticket->comments()->create([
            'user_id' => auth()->id(),
            'comment' => $commentText,
            'is_internal' => false
        ]);

        // Notification
        $creator = $ticket->creator;
        try {
            $creator->notify(new TicketStatusChangedNotification($ticket, $creator, $request->status));
        } catch (\Exception $e) {
            Log::error("Failed to notify ticket status change: " . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => "Ticket status updated to " . ucfirst(str_replace('_', ' ', $request->status)) . "."
        ]);
    }

    /**
     * Manual escalation override.
     */
    public function escalate(Request $request, Ticket $ticket)
    {
        $request->validate([
            'reason' => 'required|string|max:255'
        ]);

        $user = Auth::user();
        $oldAssignee = $ticket->assignee;
        $escalatedTo = null;

        // Escalation Logic: Find manager of current assignee or creator
        if ($oldAssignee && $oldAssignee->reporting_to) {
            $escalatedTo = User::find($oldAssignee->reporting_to);
        } else {
            // Find department head or Admin
            $escalatedTo = User::whereHas('roles', function($q) {
                $q->where('name', 'Admin');
            })->first();
        }

        if (!$escalatedTo) {
            return response()->json([
                'success' => false,
                'message' => 'Escalation path not found. No manager or admin mapped.'
            ], 422);
        }

        // Determine level
        $currentLevel = Escalation::where('ticket_id', $ticket->id)->count() + 1;

        // Create Escalation Log
        Escalation::create([
            'ticket_id' => $ticket->id,
            'old_assigned_to' => $oldAssignee ? $oldAssignee->id : null,
            'escalated_to' => $escalatedTo->id,
            'reason' => 'Manual override: ' . $request->reason,
            'level' => $currentLevel,
            'status' => 'pending'
        ]);

        $ticket->update([
            'assigned_to' => $escalatedTo->id,
            'escalated_at' => Carbon::now(),
            'status' => 'open' // Set back to open so the supervisor sees it
        ]);

        // Notification
        try {
            $escalatedTo->notify(new \App\Notifications\TicketEscalatedNotification($ticket, $escalatedTo));
        } catch (\Exception $e) {
            Log::error("Failed to notify escalation manager: " . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => "Ticket successfully escalated to {$escalatedTo->name}."
        ]);
    }
}
