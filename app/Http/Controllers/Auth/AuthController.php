<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
//use App\Jobs\SendCreateUserNotification;
use App\Models\Notification;
use App\Notifications\Messages\CreateUserNotification;
use App\Notifications\Messages\CustomNotification;
use App\Notifications\Messages\PersonalisedNotification;


class AuthController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	* Where to redirect users after login / registration.
	*
	* @var string
	*/
	protected $redirectTo = '/';

	/**
	* Create a new authentication controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
	}

	/**
	* Get a validator for an incoming registration request.
	*
	* @param  array  $data
	* @return \Illuminate\Contracts\Validation\Validator
	*/
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'device_token' => 'required|max:255',
			'password' => 'required|min:6|confirmed',
		]);
	}

	/**
	* Create a new user instance after a valid registration.
	*
	* @param  array  $data
	* @return User
	*/
	protected function create(array $data)
	{
		$user = User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'device_token' => preg_replace(
				'/\s+/', '', 
				$data['device_token']
			),
			'password' => bcrypt($data['password']),
		]);

		//Added a push notification...
		Notification::send($user, new CreateUserNotification());
		
		//Some examples of other notification messages
		//Notification::send($user, new PersonalisedNotification($user->name));
		//Notification::send($user, new CustomNotification("hello world"));

		return $user;
	}
}
