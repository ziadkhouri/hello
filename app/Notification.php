<?php

namespace App;
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

	public function send()
	{
		$user = User::find($this->user_id);
		$this->dispatch(new SendPushNotification($user->device_token, $this->message));
	}
}
