<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class UserMessage extends Eloquent {
	use SoftDeletingTrait;

	protected $table = "customer_message";

	protected $guarded = ["id"];


}