<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent {
	use SoftDeletingTrait;

	protected $table = "categories";

	protected $guarded = ["id"];

	protected $hidden = ["remember_token"];

	public function products(){
		return $this->hasMany("Product");
	}

	public function types(){
		return $this->belongsToMany("Type");
	}
}