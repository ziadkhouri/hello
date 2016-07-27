<?php

namespace App\Jobs;

use App\User;
use App\Notification;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCreateUserNotification extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user_id;
    /**
     * Create a new job instance.
     *
     * @param string user_id
     * @return void
     */
    public function __construct(string $user_id)
    {
        $this->user_id = $user_id;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notification = Notification::create([
            'user_id' => $this->user_id,
            'message' => "User was created"
        ]);

        $notification->send();
        //
    }
}
