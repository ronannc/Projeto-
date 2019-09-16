<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    private $email;

    /**
     * Create a notification instance.
     *
     * @param string  $token
     * @param         $email
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
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
            'database'
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @return MailMessage
     */
    public function toMail()
    {
        return (new MailMessage)
            ->subject('Redefinição de senha')
            ->line('Você está recebendo esse email pois recebemos uma requisição para redefinição de senha para a sua conta.')
            ->action('Redefinir senha', url(config('app.url') . route('password.reset', [$this->token], false)))
            ->line('Se você não solicitou uma redefinição de senha, nenhuma ação é necessária.');
    }

    public function toArray()
    {
        return [
            'title'   => 'Redefinição de senha',
            'message' => 'Usuário ' . $this->email . ' solicitou redefinição de senha.',
            'color'   => 'info',
            'url'     => route('home'),
        ];
    }
}
