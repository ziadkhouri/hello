<?php

namespace App\Notifications\Messages;
use App\Notifications\NotificationMessage;

class CreateUserNotification extends NotificationMessage
{
	public function toString ()
	{
		return "User created!";
	}
}
