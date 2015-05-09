<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

/**
*  
*/
class Account extends Eloquent implements UserInterface, RemindableInterface
{
	use SoftDeletingTrait;

	protected $table = "account";

	protected $hidden = ["password","remember_token"];

	protected $guarded = ["id"];

	public static $rules = ['username' => 'required', 'id' => 'required', 'email' => 'required', 'fullname' => 'required'];

	protected $fillable = ['username', 'email', 'fullname', 'password'];


	public function getAuthIdentifier(){
		return $this->id;
	}

	public function getAuthPassword(){
		return $this->password;
	}

	public function getReminderEmail(){
		return $this->email;
	}

	public function orders(){
		return $this->hasMany("Order");
	}

	public function getRememberToken()
	{
    	return $this->remember_token;
	}

	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
}