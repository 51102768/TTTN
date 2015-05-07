<?php

class CategoryTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('category')->delete();

		Category::create([
			"brand"=>"Sennheiser",
			"url"=>"img\brand\Sennheiser509.jpg"
		]);
		Category::create([
			"brand"=>"Audio Technica",
			"url"=>"img\brand\Audio-Technica.jpg"
		]);
		Category::create([
			"brand"=>"Bose",
			"url"=>"img\brand\logo-bose.jpg"
		]);
		Category::create([
			"brand"=>"Philips",
			"url"=>"img\brand\Philips.jpg"
		]);
		Category::create([
			"brand"=>"Apple",
			"url"=>"img\brand\Apple-logo4876.jpg"
		]);
		Category::create([
			"brand"=>"Lehman Audio",
			"url"=>"img\brand\lehmannaudio_logo.gif"
		]);
		Category::create([
			"brand"=>"Astelln Kern",
			"url"=>"img\brand\AstellnKern.gif"
		]);
		Category::create([
			"brand"=>"Braven",
			"url"=>"img\brand\BRAVEN-logo5783.jpg"
		]);
		Category::create([
			"brand"=>"NuForce",
			"url"=>"img\brand\Nuforce-K-1.jpg"
		]);
		Category::create([
			"brand"=>"Shure",
			"url"=>"img\brand\shure-logo.gif"
		]);
	}
}