<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Order extends Eloquent {
	use SoftDeletingTrait;

	protected $table = "order";

	protected $guarded = ["id"];

	public function account(){
		return $this->belongsTo("Account");
	}

	public function orderItems(){
		return $this->hasMany("OrderItem");
	}

	public function products(){
		return $this->belongsToMany("Product","order_item");
	}
}