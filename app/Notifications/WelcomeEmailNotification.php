<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $email;

    private $password;

    /**
     * Create a new notification instance.
     *
     * @param $email
     * @param $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->onQueue('notifications');
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Bem-vindo!')
            ->line('Aqui está seu login e senha para acesso ao sistema:')
            ->line($this->email)
            ->line('<b><h1><pre>' . $this->password . '</pre></h1></b>')
            ->line('Essa senha foi gerada automaticamene e recomendamos que você a troque por uma nova.')
            ->line('Nunca compartilhe sua senha com alguém.');
    }
}
