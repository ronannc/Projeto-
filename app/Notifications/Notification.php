<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;

abstract class Notification extends \Illuminate\Notifications\Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var array
     */
    public $data;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $color;

    /**
     * @var string
     */
    protected $slackChannel;

    /**
     * Create a new notification instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
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
            'mail',
            'broadcast',
            'database',
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
            'title'         => $this->title,
            'message'       => $this->message,
            'url'           => $this->url,
            'color'         => $this->color,
            'slack_channel' => $this->slackChannel,
        ];
    }
}
