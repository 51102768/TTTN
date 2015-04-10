<?php

class AccountTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		// $this->call('UserTableSeeder');

		$faker = $this->getFaker();

		for($i = 0; $i < 10; $i++){
			$email = $faker->email;
			$password = Hash::make("password");

			Account::create([
				"email" => $email,
				"password" => $password
			]);
		}
	}
}