<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\SlackMessage;

class GenericNotification extends Notification
{
    /**
     * {@inheritdoc}
     */
    public function via()
    {
        return [
            'broadcast',
            'database',
            'slack',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $this->title = $this->data['title'];
        $this->message = $this->data['message'];
        $this->color = $this->data['color'];
        $this->slackChannel = $this->data['slack_channel'];

        return parent::toArray();
    }

    public function toSlack()
    {
        return (new SlackMessage())
            ->to($this->slackChannel)
            ->content($this->data['message']);
    }
}
