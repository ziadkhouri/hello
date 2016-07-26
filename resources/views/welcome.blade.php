@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    <ul>
                        <li>Registering a new user will generate an Apple Push Notification. 
                        <li>The endpoint is "/register"
                        <li>The device token has all whitespace removed before being saved to the database. This is done in the AuthController.
                        <li>The laraval Queues API is used to queue push notifications so they do not "block" and impact the user experience
                        <li>Queued jobs and failed jobs can be monitored in the database. Tables; jobs, failed_jobs. Error messages are stored in storage/logs/laravel.log. This could be improved if necessary.
                        <li>The SendPushNotification job takes the following parameters; User and message. It can be easliy repurposed or extended if needs be.
                        <li>Apple Push Notifications are implemented using https://github.com/davibennun/laravel-push-notification
                        <li>The certificate I use is self-signed, and will be rejected by Apple.
                        <li>I used the laravel Authentication API as a shortcut to create the "new user" functionality. This is kind of overkill, and I could remove the redundant functionality if required.
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
