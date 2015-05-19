<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Type extends Eloquent {
	use SoftDeletingTrait;

	protected $table = "types";

	protected $guarded = ["id"];

	protected $hidden = ["remember_token"];

	public function products(){
		return $this->hasMany("Product");
	}

	public function category(){
		return $this->belongsToMany("Category");
	}
}