<?php

namespace App\Notifications\Messages;
use App\Notifications\NotificationMessage;

class PersonalisedNotification extends NotificationMessage
{
	private string $message;

	private function __construct() {};

	function __construct (string $user_name)
	{
		$this->message = "Hello " . $user_name;
	}
	
	public function toString ()
	{
		return $message;
	}
}
