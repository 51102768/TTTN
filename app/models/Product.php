<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Product extends Eloquent {
	use SoftDeletingTrait;

	protected $table = "product";

	protected $guarded = ["id"];

	public function orders(){
		return $this->belongsToMany("Order","order_item");
	}

	public function orderItems(){
		return $this->hasMany("OrderItem");
	}

	public function category(){
		return $this->belongsTo("Category");
	}
}