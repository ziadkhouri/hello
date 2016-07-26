# hello
A  laravel challenge: send an Apple Push Notification when a user registers.

- Registering a new user will generate an Apple Push Notification.
- The endpoint is "/register"
- The device token has all whitespace removed before being saved to the database. This is done in the AuthController.
- The laraval Queues API is used to queue push notifications so they do not "block" and impact the user experience
- Queued jobs and failed jobs can be monitored in the database. Tables; jobs, failed_jobs. Error messages are stored in storage/logs/laravel.log. This could be improved if necessary.
- The SendPushNotification job takes the following parameters; User and message. It can be easliy repurposed or extended if needs be.
- Apple Push Notifications are implemented using https://github.com/davibennun/laravel-push-notification
- The certificate I use is self-signed, and will be rejected by Apple.
- I used the laravel Authentication API as a shortcut to create the "new user" functionality. This is kind of overkill, and I could remove the redundant functionality if required.
