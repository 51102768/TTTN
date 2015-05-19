<?php

class TypeTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('types')->delete();

		Type::create([
			"id"=>1,
			"name"=>"Loa và Âm li",
			"category_id"=>1,
		]);

		Type::create([
			"id"=>2,
			"name"=>"Máy nghe nhạc",
		]);

		Type::create([
			"id"=>3,
			"name"=>"Tai nghe",
		]);

		Type::create([
			"id"=>4,
			"name"=>"Khác",
		]);
	}
}