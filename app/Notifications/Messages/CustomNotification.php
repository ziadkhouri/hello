<?php

namespace App\Notifications\Messages;
use App\Notifications\NotificationMessage;

class CustomNotification extends NotificationMessage
{
	private string $message;

	private function __construct() {};

	function __construct (string $message)
	{
		$this->message = $message;
	}
	
	public function toString ()
	{
		return $message;
	}
}