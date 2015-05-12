<?php

class MessageTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('message')->delete();

		Message::create([
			"user_id"=>"1",
			"text"=>'asasnfababscanckansc',
		]);
	}
}