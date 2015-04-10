<?php

class OrderTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = $this->getFaker();

		$accounts = Account::all();

		foreach($accounts as $account){
			for($i = 0; $i < rand(1,5); $i++){
				Oder::create([
					"account_id" => $account->id,
				]);
			}
		}
	}
}