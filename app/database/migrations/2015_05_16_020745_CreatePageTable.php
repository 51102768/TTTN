<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("page",function($table)
		{
			$table->increments("id");
			$table->integer("view");
			$table->integer("login");
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
		Schema::dropIfExists("page");
	}

}
