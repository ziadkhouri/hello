<?php

namespace App\Notifications\Messages;
use App\Notifications\NotificationMessage;

class PersonalisedNotification extends NotificationMessage
{
	private $message = '';

	/**
	* An example of a personalised message
	*
	* @param string $user_name
	*/
	function __construct (string $user_name)
	{
		$this->message = "Hello " . $user_name;
	}

	/**
	* A message personalised with the given $user_name
	*
	* @return string
	*/
	public function toString ()
	{
		return $this->message;
	}
}
