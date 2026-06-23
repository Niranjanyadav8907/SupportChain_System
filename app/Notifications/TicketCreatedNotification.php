<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket;
use App\Models\Setting;

class TicketCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $ticket;

    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
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
            ->subject('New Ticket Created: #' . $this->ticket->ticket_number)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('A new support ticket has been registered in the SupportChain System.')
            ->line('Ticket Details:')
            ->line('Number: #' . $this->ticket->ticket_number)
            ->line('Title: ' . $this->ticket->title)
            ->line('Priority: ' . ucfirst($this->ticket->priority))
            ->line('Category: ' . $this->ticket->category->name)
            ->action('View Ticket Details', url('/tickets/' . $this->ticket->id))
            ->line('Thank you for using our internal support portal.');
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
            'message' => "Ticket #{$this->ticket->ticket_number} was created successfully.",
            'type' => 'ticket_created'
        ];
    }
}
