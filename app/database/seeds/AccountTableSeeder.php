<?php

class AccountTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('account')->delete();

		User::create([
			"username"=>"admin",
			"password"=>Hash::make("admin"),
			"fullname"=>"Nguyen Thanh Quan",
			"email"=>"nt.quan1704@gmail.com",
			"authority"=>"admin",
			"url"=>"img\avatar\user.jpg"
		]);
	}
}