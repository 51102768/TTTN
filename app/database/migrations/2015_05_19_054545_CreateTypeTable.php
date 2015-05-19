<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("types",function($table)
		{
			$table->increments("id");
			$table->string("name");
			$table->integer('category_id')->unsigned()->index();
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
		Schema::dropIfExists("types");
	}

}
