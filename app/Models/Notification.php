<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Throwable;

/**
 * Class Notification
 *
 * @package App\Models
 *
 * @property string   id
 * @property string   type
 * @property string   data
 * @property DateTime read_at
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Notification extends Model
{
    const INFO = 'App\Notifications\InfoNotification';
    const RESET_PASSWORD = 'App\Notifications\ResetPasswordNotification';
    const WELCOME_EMAIL = 'App\Notifications\WelcomeEmailNotification';

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = ['read_at'];

    /**
     * Update the notifications count to display into the badges.
     *
     * @param int|null $userId
     *
     * @throws Throwable
     */
    public static function updateBadges($userId = null)
    {
        $userId = !empty($userId) ? $userId : auth()->user()->id;
        $notifications = Notification::with([])
            ->where('notifiable_id', $userId)
            ->whereNull('read_at')
            ->orderBy('created_at', 'desc')
            ->limit(100)
            ->get();

        $notificationsTransformed = [];

        foreach ($notifications as $notification) {
            $notificationData = json_decode($notification->data);

            $notificationsTransformed[] = view('components.notification-item',
                compact('notification'),
                compact('notificationData')
            )->render();
        }

        session([
            'notifications'      => $notificationsTransformed,
            'notificationsCount' => count($notificationsTransformed)
        ]);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }
}
