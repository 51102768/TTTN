<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Register extends Eloquent {
        protected $guarded = array();

        public $timestamps = 'true' ; // to disable default timestamp fields

        // model function to store form data to database
        public static function saveFormData($data)
        {
            DB::table('account')->insert($data);
        }

}