<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;

class SubscriberNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $user;
    private $source;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $source)
    {
        $this->user = $user;
        $this->source = $source;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line("article added on {$this->source} from {$this->user}");
    }
}
