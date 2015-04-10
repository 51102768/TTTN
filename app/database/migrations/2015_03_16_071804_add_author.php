<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('authors')->insert(array(
			"name"=>"Nguyen Thanh Quan",
			"bio"=>"Author!!!...",
			"created_at"=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
			));

		DB::table('authors')->insert(array(
			"name"=>"Lam Hoang Vu",
			"bio"=>"Author 2!!!...",
			"created_at"=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('authors')->insert(array(
			'name'=>'Do Pham Quang Tri',
			'bio'=>'Author 3!!!...',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('authors')->insert(array(
			'name'=>'Pham Nguyen Thanh Cong',
			'bio'=>'Author 4!...',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s'),
			));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('authors')->where('name','=','Nguyen Thanh Quan')->delete();
		DB::table('authors')->where('name','=','Lam Hoang Vu')->delete();
		DB::table('authors')->where('name', '=', 'Do Pham Quang Tri')->delete();
		DB::table('authors')->where('name', '=', 'Pham Nguyen Thanh Cong')->delete();
	}

}
