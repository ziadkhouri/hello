<?php

namespace App\Notifications\Messages;
use App\Notifications\NotificationMessage;

class CustomNotification extends NotificationMessage
{
	private $message = '';

	/**
	* An example of a customised message
	*
	* @param string $message
	*/
	function __construct (string $message)
	{
		$this->message = $message;
	}

	/**
	* The given $message
	*
	* @return string
	*/
	public function toString ()
	{
		return $this->message;
	}
}