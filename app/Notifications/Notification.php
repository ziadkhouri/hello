<?php

namespace App\Notifications;
use App\Jobs\SendPushNotification;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\User;

class Notification extends Model
{
	use DispatchesJobs;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'message'
    ];

	public static function send(User $user, NotificationMessage $message)
	{
        Notification::create([
            'user_id' => $user->id,
            'message' => $message->toString(),
        ]);

		dispatch(new SendPushNotification($user->device_token, $message->toString()));
	}
}
