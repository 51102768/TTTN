<?php

class CategoryTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('categories')->delete();

		DB::table('types')->delete();

		$loa = Type::create([
			"id"=>1,
			"name"=>"Loa và Âm li",
		]);

		$mp3 = Type::create([
			"id"=>2,
			"name"=>"Máy nghe nhạc",
		]);

		$hphone = Type::create([
			"id"=>3,
			"name"=>"Tai nghe",
		]);

		$orther = Type::create([
			"id"=>4,
			"name"=>"Khác",
		]);		

		$sen = Category::create([
			"id"=>1,
			"brand"=>"Sennheiser",
			"url"=>"img\brand\Sennheiser509.jpg"
		]);

		$sen->types()->save($hphone);

		$sen->types()->save($mp3);

		$at = Category::create([
			"brand"=>"Audio Technica",
			"url"=>"img\brand\Audio-Technica.jpg"
		]);

		$at->types()->save($hphone);

		$bose = Category::create([
			"brand"=>"Bose",
			"url"=>"img\brand\logo-bose.jpg"
		]);

		$bose->types()->save($loa);

		$bose->types()->save($hphone);

		$phi = Category::create([
			"brand"=>"Philips",
			"url"=>"img\brand\Philips.jpg"
		]);

		$phi->types()->save($mp3);

		$phi->types()->save($hphone);

		$apple = Category::create([
			"brand"=>"Apple",
			"url"=>"img\brand\Apple-logo4876.jpg"
		]);

		$apple->types()->save($mp3);

		$apple->types()->save($hphone);

		$leh = Category::create([
			"brand"=>"Lehman Audio",
			"url"=>"img\brand\lehmannaudio_logo.gif"
		]);

		$leh->types()->save($loa);

		$ak = Category::create([
			"brand"=>"Astelln Kern",
			"url"=>"img\brand\AstellnKern.gif"
		]);

		$ak->types()->save($mp3);

		$bra = Category::create([
			"brand"=>"Braven",
			"url"=>"img\brand\BRAVEN-logo5783.jpg"
		]);

		$bra->types()->save($loa);

		$nu = Category::create([
			"brand"=>"NuForce",
			"url"=>"img\brand\Nuforce-K-1.jpg"
		]);

		$nu->types()->save($loa);

		$nu->types()->save($hphone);

		$shu = Category::create([
			"brand"=>"Shure",
			"url"=>"img\brand\shure-logo.gif"
		]);

		$shu->types()->save($hphone);
	}
}