<?php

class CategoryTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = $this->getFaker();

		for($i = 1; $i <=10; $i++){
			$name = ucwords($faker->word);
			Category::create([
				"name" => $name
			]);
		}
	}
}