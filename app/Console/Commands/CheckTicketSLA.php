<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Ticket;
use App\Models\Escalation;
use App\Models\User;
use App\Models\Role;
use App\Models\Setting;
use App\Notifications\TicketEscalatedNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CheckTicketSLA extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tickets:check-sla';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scan active tickets and escalate those that have breached their SLA deadline';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Scanning tickets for SLA breaches...');

        // Check if escalation is globally enabled
        if (Setting::get('escalation_enabled', '1') !== '1') {
            $this->warn('Automated escalations are currently disabled in settings.');
            return;
        }

        // Find tickets that are open or in_progress, have a deadline in the past, and haven't been escalated recently
        $tickets = Ticket::whereIn('status', ['open', 'in_progress'])
            ->where('sla_deadline', '<', Carbon::now())
            ->whereNull('escalated_at')
            ->get();

        if ($tickets->isEmpty()) {
            $this->info('No SLA breaches detected.');
            return;
        }

        foreach ($tickets as $ticket) {
            $this->escalateTicket($ticket);
        }

        $this->info('SLA scan complete.');
    }

    /**
     * Escalate a specific ticket.
     */
    private function escalateTicket(Ticket $ticket): void
    {
        $oldAssignee = $ticket->assignee;
        $escalatedTo = null;

        // Escalation Logic: Employee -> Team Lead -> Project Manager -> HR/Admin
        if ($oldAssignee) {
            // If currently assigned, try to escalate to their reporting manager
            if ($oldAssignee->reporting_to) {
                $escalatedTo = User::find($oldAssignee->reporting_to);
            } else {
                // If assignee has no manager, escalate based on role
                if ($oldAssignee->hasRole('Employee')) {
                    // Find first Team Lead in the system or department
                    $escalatedTo = User::whereHas('roles', function($q) {
                        $q->where('name', 'Team Lead');
                    })->where('department_id', $ticket->department_id)->first() 
                    ?? User::whereHas('roles', function($q) { $q->where('name', 'Team Lead'); })->first();
                } elseif ($oldAssignee->hasRole('Team Lead')) {
                    // Find first Project Manager in the system or department
                    $escalatedTo = User::whereHas('roles', function($q) {
                        $q->where('name', 'Project Manager');
                    })->where('department_id', $ticket->department_id)->first()
                    ?? User::whereHas('roles', function($q) { $q->where('name', 'Project Manager'); })->first();
                }
            }
        } else {
            // Unassigned ticket: Escalate to the ticket creator's manager (Team Lead)
            $creator = $ticket->creator;
            if ($creator && $creator->reporting_to) {
                $escalatedTo = User::find($creator->reporting_to);
            }
        }

        // Fallback: If no manager/supervisor is found, escalate to Admin or HR
        if (!$escalatedTo) {
            $escalatedTo = User::whereHas('roles', function($q) {
                $q->where('name', 'Admin');
            })->first();
        }

        if (!$escalatedTo) {
            $this->error("Failed to find escalation path for Ticket #{$ticket->ticket_number}");
            return;
        }

        // Determine escalation level
        $currentLevel = Escalation::where('ticket_id', $ticket->id)->count() + 1;

        // Log the Escalation
        Escalation::create([
            'ticket_id' => $ticket->id,
            'old_assigned_to' => $oldAssignee ? $oldAssignee->id : null,
            'escalated_to' => $escalatedTo->id,
            'reason' => 'SLA deadline (' . $ticket->sla_deadline->format('Y-m-d H:i:s') . ') breached. Automatic escalation.',
            'level' => $currentLevel,
            'status' => 'pending'
        ]);

        // Update Ticket details
        $ticket->update([
            'assigned_to' => $escalatedTo->id,
            'escalated_at' => Carbon::now(),
            'status' => 'open' // reset to open so the new assignee knows it needs attention
        ]);

        // Trigger Notification
        try {
            $escalatedTo->notify(new TicketEscalatedNotification($ticket, $escalatedTo));
        } catch (\Exception $e) {
            Log::error("Notification failed for escalation on Ticket #{$ticket->ticket_number}: " . $e->getMessage());
        }

        $this->info("Ticket #{$ticket->ticket_number} escalated to {$escalatedTo->name}.");
    }
}
