<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("product",function($table)
		{
			$table->increments("id");
			$table->string("name");
			$table->string("url");
			$table->string("origin");
			$table->float("weight");
			$table->string("material");
			$table->string("color");
			$table->integer("guarantee");
			$table->integer("stock");
			$table->float("price");
			$table->integer("buytime");
			$table->string("description");
			$table->integer("category_id");
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
		Schema::dropIfExists("product");
	}

}
