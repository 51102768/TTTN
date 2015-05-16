<?php

class PageTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('page')->delete();

		Page::create([
			"id"=>1;
			"view"=>0,
			"login"=>0,
		]);
	}
}