<?php
 
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
 
class User
  extends Eloquent
  implements UserInterface, RemindableInterface
{
  protected $table  = "account";
  protected $hidden = ["password"];

  public function orders(){
    return $this->hasMany("Order");
  }

  public function message(){
    return $this->hasMany("Message");
  }
  
  public function getAuthIdentifier()
  {
    return $this->getKey();
  }
  
  public function getAuthPassword()
  {
    return $this->password;
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
    return "remember_token";
  }
  
  public function getReminderEmail()
  {
    return $this->email;
  }
}