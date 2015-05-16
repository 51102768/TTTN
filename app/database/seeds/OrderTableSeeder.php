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

		$accounts = Account::all();

		for($i = 0; $i < rand(10,20); $i++){
			Order::create([
				"account_id" => rand(1,5)
			]);
		}
	}
}