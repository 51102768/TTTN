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
			"block"=>false,
			"url"=>"img\avatar\user.jpg",
			"login"=>date('Y-m-d H:m:s'),
		]);

		User::create([
			"username"=>"ntq170493",
			"password"=>Hash::make("123456"),
			"fullname"=>"Nguyen Thanh Quan",
			"email"=>"quan1704@gmail.com",
			"authority"=>"user",
			"block"=>false,
			"url"=>"img\avatar\user.jpg",
			"login"=>date('Y-m-d H:m:s'),
		]);

		User::create([
			"username"=>"ddasda",
			"password"=>Hash::make("123456"),
			"fullname"=>"Nguyen Thanh Quan",
			"email"=>"asdasd@gmail.com",
			"authority"=>"user",
			"block"=>false,
			"url"=>"img\avatar\user.jpg",
			"login"=>date('Y-m-d H:m:s'),
		]);

		User::create([
			"username"=>"dasdasd",
			"password"=>Hash::make("asdasd"),
			"fullname"=>"Nguyen Thanh Quan",
			"email"=>"nt.asdasdasd@gmail.com",
			"authority"=>"user",
			"block"=>false,
			"url"=>"img\avatar\user.jpg",
			"login"=>date('Y-m-d H:m:s'),
		]);

		User::create([
			"username"=>"asdasdad",
			"password"=>Hash::make("asdasdasdsa"),
			"fullname"=>"asdasdasdad",
			"email"=>"nt.asdasdasd@gmail.com",
			"authority"=>"user",
			"block"=>false,
			"url"=>"img\avatar\user.jpg",
			"login"=>date('Y-m-d H:m:s'),
		]);
	}
}