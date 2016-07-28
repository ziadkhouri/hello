# hello
A  laravel challenge: send an Apple Push Notification when a user registers.

- Registering a new user will generate an Apple Push Notification. 
- The endpoint is "/register"
- The device token has all whitespace removed before being saved to the database. This is done in the AuthController.
- The laraval Queues API is used to queue push notifications so they do not "block" and impact the user experience
- The Notification library is contained in App/Notifications
- Notifications are stored in the database
- New notification types can be added by subclassing NotificationMessage. Some examples are included.
- Apple Push Notifications are implemented using https://github.com/davibennun/laravel-push-notification
- The certificate I use is self-signed, and will be rejected by Apple.
- I used the laravel Authentication API as a shortcut to create the "new user" functionality. This is kind of overkill, and I could remove the redundant functionality if required.
