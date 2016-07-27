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

    protected $device_token, $message;

    /**
     * Create a new job instance.
     *
     * @param string $device_token
     * @param string $message
     * @return void
     */
    public function __construct(string $device_token, string $message)
    {
        $this->device_token = $device_token;
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
           ->to($this->device_token)
            ->send($this->message);
    }
}
