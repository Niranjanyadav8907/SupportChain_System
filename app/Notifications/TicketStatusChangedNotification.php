<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket;
use App\Models\Setting;

class TicketStatusChangedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $ticket;
    protected $oldStatus;
    protected $newStatus;

    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket, string $oldStatus, string $newStatus)
    {
        $this->ticket = $ticket;
        $this->oldStatus = $oldStatus;
        $this->newStatus = $newStatus;
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
            ->subject('Ticket Status Updated: #' . $this->ticket->ticket_number)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('The status of support ticket #' . $this->ticket->ticket_number . ' has been updated.')
            ->line('Update Details:')
            ->line('Title: ' . $this->ticket->title)
            ->line('Old Status: ' . ucfirst(str_replace('_', ' ', $this->oldStatus)))
            ->line('New Status: ' . ucfirst(str_replace('_', ' ', $this->newStatus)))
            ->action('View Ticket Update', url('/tickets/' . $this->ticket->id))
            ->line('Thank you for your patience.');
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
            'message' => "Ticket #{$this->ticket->ticket_number} status changed from '{$this->oldStatus}' to '{$this->newStatus}'.",
            'type' => 'status_changed'
        ];
    }
}
