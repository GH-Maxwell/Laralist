<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	public function catalogs() {
		return $this->hasMany('Catalog');
	}

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	//mass assignment 
	protected $fillable = ['username', 'email', 'password', 'passwordConfirm'];

	//validation rules &  declare errors property 
	public static $rules = [
		'username' =>  'required|unique:users',
		'email' => 'required|email|unique:users',
		'password' => 'required',
		'passwordConfirm' => 'required|same:password'
	];

	public static $messages = [
		'same' => 'The :others must match!'
	];

	public static $errors;

	//validation method
	public function isValid() {
		$validation = Validator::make($this->attributes, User::$rules, User::$messages);

		if ($validation->passes()) 

		return true;

		$this->errors = $validation->messages();

		return false;
		
	} 

	public function getRememberToken() {
    	return $this->remember_token;
	}

	public function setRememberToken($value) {
    	$this->remember_token = $value;
	}

	public function getRememberTokenName() {
    	return 'remember_token';
	}

}
