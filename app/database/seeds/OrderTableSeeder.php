<?php

class OrderTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('order')->delete();

		$faker = $this->getFaker();

		$accounts = User::all();

		for($i = 0; $i < rand(0,5); $i++){
			$user =  User::all();
			Order::create([
				"account_id" => $user[$i]->id
			]);
		}
	}
}