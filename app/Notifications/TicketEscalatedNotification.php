<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket;
use App\Models\Setting;
use App\Models\User;

class TicketEscalatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $ticket;
    protected $escalatedTo;

    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket, User $escalatedTo)
    {
        $this->ticket = $ticket;
        $this->escalatedTo = $escalatedTo;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        $channels = [];
        if (Setting::get('in_app_notifications_enabled', '1') === '1') {
            $channels[] = 'database';
        }
        if (Setting::get('email_notifications_enabled', '1') === '1') {
            $channels[] = 'mail';
        }
        return $channels;
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('ALERT: Ticket Escalated: #' . $this->ticket->ticket_number)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('A support ticket has been escalated to you due to an SLA breach or supervisor override.')
            ->line('Ticket Details:')
            ->line('Number: #' . $this->ticket->ticket_number)
            ->line('Title: ' . $this->ticket->title)
            ->line('Priority: ' . ucfirst($this->ticket->priority))
            ->line('Deadline was: ' . $this->ticket->sla_deadline->format('Y-m-d H:i:s'))
            ->action('Open Ticket and Resolve', url('/tickets/' . $this->ticket->id))
            ->line('Please address this ticket with high priority.');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'ticket_id' => $this->ticket->id,
            'ticket_number' => $this->ticket->ticket_number,
            'title' => $this->ticket->title,
            'message' => "Urgent: Ticket #{$this->ticket->ticket_number} has been escalated to you.",
            'type' => 'ticket_escalated'
        ];
    }
}
