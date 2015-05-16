<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("account",function($table)
		{
			$table->increments("id");
			$table->string("username");
			$table->string("email");
			$table->string("password");
			$table->string("fullname");
			$table->string('phone');
			$table->string('address');
			$table->string('authority');
			$table->boolean('block');
			$table->string('url')->nullable();
			$table->dateTime("login");
			$table->rememberToken();
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
		Schema::dropIfExists("account");	
	}

}
