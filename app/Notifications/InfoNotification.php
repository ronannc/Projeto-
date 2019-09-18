<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class InfoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $message;

    /**
     * Create a new notification instance.
     *
     * @param $message
     */
    public function __construct($message)
    {
        $this->message = $message;
        $this->onQueue('notifications');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via()
    {
        return [
            'database',
            'broadcast'
        ];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @return BroadcastMessage
     */
    public function toBroadcast()
    {
        return new BroadcastMessage($this->toArray());
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'title'   => 'Info',
            'message' => $this->message,
            'color'   => 'info',
            'url'     => route('notifications.index'),
        ];
    }
}
