<?php

namespace App\Jobs;

use App\User;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use PushNotification; 

class SendPushNotification extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user, $message;

    /**
     * Create a new job instance.
     *
     * @param  User  $user
     * @param string $message
     * @return void
     */
    public function __construct(User $user, string $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        PushNotification::app('helloIOS')
           ->to($this->user->device_token)
            ->send($this->message);
    }
}
