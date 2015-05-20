<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerMessage extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("customer_message",function($table)
		{
			$table->increments("id");
			$table->string("name");
			$table->string("email");
			$table->string("phone");
			$table->string("text");
			$table->timestamps();
			$table->dateTime("deleted_at");
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("customer_message");	
	}

}
