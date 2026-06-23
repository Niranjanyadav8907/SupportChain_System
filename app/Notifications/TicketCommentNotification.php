<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Ticket;
use App\Models\Setting;
use App\Models\User;

class TicketCommentNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $ticket;
    protected $commenter;
    protected $commentText;
    protected $isInternal;

    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket, User $commenter, string $commentText, bool $isInternal = false)
    {
        $this->ticket = $ticket;
        $this->commenter = $commenter;
        $this->commentText = $commentText;
        $this->isInternal = $isInternal;
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
        $typeLabel = $this->isInternal ? 'Internal Agent Note' : 'Comment';
        
        return (new MailMessage)
            ->subject('New ' . $typeLabel . ' on Ticket #' . $this->ticket->ticket_number)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('A new ' . strtolower($typeLabel) . ' has been added to ticket #' . $this->ticket->ticket_number)
            ->line('By: ' . $this->commenter->name)
            ->line('Content: "' . substr($this->commentText, 0, 150) . '..."')
            ->action('View Ticket Thread', url('/tickets/' . $this->ticket->id))
            ->line('Thank you for staying active in resolution threads.');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        $typeLabel = $this->isInternal ? 'internal agent note' : 'comment';
        return [
            'ticket_id' => $this->ticket->id,
            'ticket_number' => $this->ticket->ticket_number,
            'title' => $this->ticket->title,
            'message' => "{$this->commenter->name} added a new {$typeLabel} to Ticket #{$this->ticket->ticket_number}.",
            'type' => $this->isInternal ? 'internal_note' : 'ticket_comment'
        ];
    }
}
