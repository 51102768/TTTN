<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Message extends Eloquent {
	use SoftDeletingTrait;

	protected $table = "message";

	protected $guarded = ["id"];

	public function user(){
		return $this->belongsTo("User");
	}
}