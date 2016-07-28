<?php

namespace App\Notifications\Messages;
use App\Notifications\NotificationMessage;

class CreateUserNotification extends NotificationMessage
{
	/**
	* A message to be sent when a new user is registered
	*
	* @return string
	*/
	public function toString ()
	{
		return "User created!";
	}
}
