<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class OrderItem extends Eloquent {
	use SoftDeletingTrait;

	protected $table = "order_item";

	protected $guarded = ["id"];

	public function product(){
		return $this->belongsTo("Product");
	}

	public function order(){
		return $this->belongsTo("Order");
	}
}