<?php

namespace App\Models;
use App\Jobs\SendPushNotification;
use App\Notifications\NotificationMessage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\DispatchesJobs;

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

	/**
	* Send a notification and log it to the database
	*
	* @param User user
	* @param NotificationMessage message
	*/
	public static function send(User $user, NotificationMessage $message)
	{
		Notification::create([
			'user_id' => $user->id,
			'message' => $message->toString(),
		]);

		dispatch(new SendPushNotification($user->device_token, $message->toString()));
	}
}
