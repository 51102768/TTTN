<?php

class ProductTableSeeder extends DatabaseSeeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = $this->getFaker();

		DB::table('product')->delete();

		$categories = Category::where("brand", "=","Sennheiser")->first();

		Product::create([
			"name"		=>"Sennheiser MX 686G Sport",
			"stock"		=>"1",
			"origin"	=>"Germany",
			"url"		=>"img/product/Sennheiser/mx686g.jpg",
			"weight"	=>"23",
			"color"		=>"Green",
			"price"		=>"69.95",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Sennheiser Momentum",
			"stock"		=>"10",
			"origin"	=>"Germany",
			"url"		=>"img/product/Sennheiser/momentum.jpg",
			"weight"	=>"16",
			"color"		=>"Red and Black",
			"price"		=>"99.95",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Sennheiser CX200 Street II",
			"stock"		=>"7",
			"origin"	=>"Germany",
			"url"		=>"img/product/Sennheiser/cx200-streetII.jpg",
			"weight"	=>"5",
			"color"		=>"Black",
			"price"		=>"35",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Sennheiser HDR 120 Expansion",
			"stock"		=>"3",
			"origin"	=>"Germany",
			"url"		=>"img/product/Sennheiser/HDR120.jpg",
			"weight"	=>"229",
			"color"		=>"Black",
			"price"		=>"69",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Sennheiser HD 280 Pro",
			"stock"		=>"7",
			"origin"	=>"Germany",
			"url"		=>"img/product/Sennheiser/HD280Pro.jpg",
			"weight"	=>"220",
			"color"		=>"Black",
			"price"		=>"80",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		$categories = Category::where("brand", "=","Audio Technica")->first();

		Product::create([
			"name"		=>"Audio Technica ATH-M50x Professional Foldable Studio Monitor Headphones - Black",
			"stock"		=>"25",
			"origin"	=>"Japan",
			"url"		=>"img/product/AudioTechnica/ATH-M50X.jpg",
			"weight"	=>"285",
			"color"		=>"Black",
			"price"		=>"173.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);

		Product::create([
			"name"		=>"Audio Technica ATH-M30x Professional Monitor Headphones - Black",
			"stock"		=>"35",
			"origin"	=>"Japan",
			"url"		=>"img/product/AudioTechnica/ATH-M30X.jpg",
			"weight"	=>"220",
			"color"		=>"Black",
			"price"		=>"69",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Audio Technica ATH-SPORT 3",
			"stock"		=>"15",
			"origin"	=>"Japan",
			"url"		=>"img/product/AudioTechnica/ATH-SPORT3.jpg",
			"weight"	=>"9.5",
			"color"		=>"Black and Silver",
			"price"		=>"49.5",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Audio Technica ATH-M40x Professional Monitor Headphones - Black",
			"stock"		=>"35",
			"origin"	=>"Japan",
			"url"		=>"img/product/AudioTechnica/ATH-M40X.jpg",
			"weight"	=>"240",
			"color"		=>"Black",
			"price"		=>"124",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),

		]);
		Product::create([
			"name"		=>"Audio Technica ATH-IM50 Dual Symphonic",
			"stock"		=>"31",
			"origin"	=>"Japan",
			"url"		=>"img/product/AudioTechnica/ATH-IM50.jpg",
			"weight"	=>"3",
			"color"		=>"Black",
			"price"		=>"57.7",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		$categories = Category::where("brand", "=","Bose")->first();
		Product::create([
			"name"		=>"Bose IE2 In-Ear only Headphones - Black/White",
			"stock"		=>"11",
			"origin"	=>"US",
			"url"		=>"img/product/Bose/IE2.jpg",
			"weight"	=>"18.4",
			"color"		=>"Black and White",
			"price"		=>"120",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Bose SIE2 sport headphones (Green)",
			"stock"		=>"14",
			"origin"	=>"US",
			"url"		=>"img/product/Bose/SIE2.jpg",
			"weight"	=>"17",
			"color"		=>"Green",
			"price"		=>"70",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Bose QuietComfort QC25 Acoustic Noise Cancelling",
			"stock"		=>"54",
			"origin"	=>"US",
			"url"		=>"img/product/Bose/QC25.jpg",
			"weight"	=>"195",
			"color"		=>"Black",
			"price"		=>"228.77",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"BOSE SoundLink Mini Bluetooth Music Player Sterio Wireless Speaker",
			"stock"		=>"19",
			"origin"	=>"US",
			"url"		=>"img/product/Bose/SoundlinkMini.jpg",
			"weight"	=>"680",
			"color"		=>"Grey",
			"price"		=>"175",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"BOSE Companion® 2 Series III multimedia speaker system",
			"stock"		=>"18",
			"origin"	=>"US",
			"url"		=>"img/product/Bose/companion.jpg",
			"weight"	=>"1800",
			"color"		=>"Black",
			"price"		=>"99.95",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		$categories = Category::where("brand", "=","Philips")->first();
		Product::create([
			"name"		=>"Phillips Fidelio On-ear headband headset",
			"stock"		=>"7",
			"origin"	=>"Netherlands",
			"url"		=>"img/product/Phillips/fidelio.jpg",
			"weight"	=>"166",
			"color"		=>"Black",
			"price"		=>"229.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Phillips SHE3595PP/28",
			"stock"		=>"75",
			"origin"	=>"Netherlands",
			"url"		=>"img/product/Phillips/SHE3595PP.jpg",
			"weight"	=>"10.95",
			"color"		=>"Purple",
			"price"		=>"99.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Phillips Vibe 8GB MP3/MP4 player Fullsound",
			"stock"		=>"45",
			"origin"	=>"Netherlands",
			"url"		=>"img/product/Phillips/vibe-mp3.jpg",
			"weight"	=>"33",
			"color"		=>"Black",
			"price"		=>"49.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Phillips Raga 4GB MP3 Player",
			"stock"		=>"17",
			"origin"	=>"Netherlands",
			"url"		=>"img/product/Phillips/raga-mp3.jpg",
			"weight"	=>"33",
			"color"		=>"Blue or Black",
			"price"		=>"39.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Phillips Ariaz 16GB MP3 Player",
			"stock"		=>"37",
			"origin"	=>"Netherlands",
			"url"		=>"img/product/Phillips/ariaz-mp3.jpg",
			"weight"	=>"65",
			"color"		=>"Black",
			"price"		=>"99.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),

		]);
		$categories = Category::where("brand", "=","Apple")->first();
		Product::create([
			"name"		=>"Apple iPod Shuffle",
			"stock"		=>"79",
			"origin"	=>"US",
			"url"		=>"img/product/Apple/ipod-shuffle.jpg",
			"weight"	=>"12.5",
			"color"		=>"Multiple Colors",
			"price"		=>"49",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Apple iPod Nano",
			"stock"		=>"53",
			"origin"	=>"US",
			"url"		=>"img/product/Apple/ipod-nano.jpg",
			"weight"	=>"31",
			"color"		=>"Multiple Colors",
			"price"		=>"149",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Apple iPod Touch",
			"stock"		=>"99",
			"origin"	=>"US",
			"url"		=>"img/product/Apple/ipod-touch.jpg",
			"weight"	=>"88",
			"color"		=>"Multiple Colors",
			"price"		=>"199",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Apple EarPods with Remote and Mic",
			"stock"		=>"11",
			"origin"	=>"US",
			"url"		=>"img/product/Apple/earpods.jpg",
			"weight"	=>"10",
			"color"		=>"White",
			"price"		=>"29",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Apple In-Ear Headphones with Remote and Mic",
			"stock"		=>"61",
			"origin"	=>"US",
			"url"		=>"img/product/Apple/headphones.jpg",
			"weight"	=>"10.2",
			"color"		=>"White",
			"price"		=>"79",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		$categories = Category::where("brand", "=","Lehman Audio")->first();
		Product::create([
			"name"		=>"LEHMANN AUDIO LINEAR - HEADPHONE AMPLIFIER",
			"stock"		=>"11",
			"origin"	=>"Germany",
			"url"		=>"img/product/LehmanAudio/linear.jpg",
			"weight"	=>"1500",
			"color"		=>"Black",
			"price"		=>"399",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"LEHMANN AUDIO TRAVELLER - PORTABLE HEADPHONE AMPLIFIER",
			"stock"		=>"16",
			"origin"	=>"Germany",
			"url"		=>"img/product/LehmanAudio/traveller.jpg",
			"weight"	=>"196",
			"color"		=>"Black",
			"price"		=>"599",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"LEHMANN AUDIO - BLACK CUBE SE II",
			"stock"		=>"6",
			"origin"	=>"Germany",
			"url"		=>"img/product/LehmanAudio/black-cube.jpg",
			"weight"	=>"400",
			"color"		=>"Black",
			"price"		=>"799",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"LEHMANN AUDIO - RHINELANDER",
			"stock"		=>"3",
			"origin"	=>"Germany",
			"url"		=>"img/product/LehmanAudio/rhinelander.jpg",
			"weight"	=>"400",
			"color"		=>"Silver",
			"price"		=>"529",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"LEHMANN AUDIO LINEAR SE - HEADPHONE AMPLIFIER",
			"stock"		=>"11",
			"origin"	=>"Germany",
			"url"		=>"img/product/LehmanAudio/linear-se.png",
			"weight"	=>"2200",
			"color"		=>"Silver",
			"price"		=>"799",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		$categories = Category::where("brand", "=","Astelln Kern")->first();
		Product::create([
			"name"		=>"AK 120",
			"stock"		=>"18",
			"origin"	=>"South Korea",
			"url"		=>"img/product/AstellandKern/ak120.jpg",
			"weight"	=>"143",
			"color"		=>"Black",
			"price"		=>"789",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"AK 240",
			"stock"		=>"8",
			"origin"	=>"South Korea",
			"url"		=>"img/product/AstellandKern/ak240.jpg",
			"weight"	=>"185",
			"color"		=>"Black",
			"price"		=>"1189",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"AK 500N",
			"stock"		=>"20",
			"origin"	=>"South Korea",
			"url"		=>"img/product/AstellandKern/ak500n.jpg",
			"weight"	=>"11385",
			"color"		=>"Black",
			"price"		=>"10000",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"AK JR",
			"stock"		=>"38",
			"origin"	=>"South Korea",
			"url"		=>"img/product/AstellandKern/akjr.jpg",
			"weight"	=>"93",
			"color"		=>"White",
			"price"		=>"894",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"AK 100 II",
			"stock"		=>"13",
			"origin"	=>"South Korea",
			"url"		=>"img/product/AstellandKern/ak100.jpg",
			"weight"	=>"122",
			"color"		=>"Black",
			"price"		=>"699",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		$categories = Category::where("brand", "=","Braven")->first();
		Product::create([
			"name"		=>"Braven BRV HD",
			"stock"		=>"22",
			"origin"	=>"US",
			"url"		=>"img/product/Braven/brv-hd.png",
			"weight"	=>"1820",
			"color"		=>"Black",
			"price"		=>"299.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Braven 805",
			"stock"		=>"12",
			"origin"	=>"US",
			"url"		=>"img/product/Braven/805.png",
			"weight"	=>"1270",
			"color"		=>"Multiple Colors",
			"price"		=>"199.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Braven 770",
			"stock"		=>"22",
			"origin"	=>"US",
			"url"		=>"img/product/Braven/770.png",
			"weight"	=>"907",
			"color"		=>"Black",
			"price"		=>"149.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Braven 570",
			"stock"		=>"14",
			"origin"	=>"US",
			"url"		=>"img/product/Braven/570.png",
			"weight"	=>"312",
			"color"		=>"Blue",
			"price"		=>"99.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Braven BRV Bank",
			"stock"		=>"22",
			"origin"	=>"US",
			"url"		=>"img/product/Braven/braven-bank.png",
			"weight"	=>"278",
			"color"		=>"Black",
			"price"		=>"99.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		$categories = Category::where("brand", "=","NuForce")->first();
		Product::create([
			"name"		=>"NuForce Primo 8",
			"stock"		=>"42",
			"origin"	=>"Japan",
			"url"		=>"img/product/NuForce/primo8.jpg",
			"weight"	=>"19.3",
			"color"		=>"Black and Blue",
			"price"		=>"499",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"NuForce NE750M",
			"stock"		=>"23",
			"origin"	=>"Japan",
			"url"		=>"img/product/NuForce/NE750M.jpg",
			"weight"	=>"14",
			"color"		=>"Black and Red",
			"price"		=>"99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"NuForce NE800M",
			"stock"		=>"72",
			"origin"	=>"Japan",
			"url"		=>"img/product/NuForce/NE800M.jpg",
			"weight"	=>"18",
			"color"		=>"Black and Gold",
			"price"		=>"169",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"NuForce uDAC3",
			"stock"		=>"53",
			"origin"	=>"Japan",
			"url"		=>"img/product/NuForce/uDAC3.jpg",
			"weight"	=>"250",
			"color"		=>"Red",
			"price"		=>"129",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"NuForce HA-200",
			"stock"		=>"9",
			"origin"	=>"Japan",
			"url"		=>"img/product/NuForce/ha-200.jpg",
			"weight"	=>"2200",
			"color"		=>"Black",
			"price"		=>"349",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		$categories = Category::where("brand", "=","Shure")->first();
		Product::create([
			"name"		=>"Shure SRH940",
			"stock"		=>"19",
			"origin"	=>"US",
			"url"		=>"img/product/Shure/srh940.jpg",
			"weight"	=>"320",
			"color"		=>"Black",
			"price"		=>"299.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Shure SE846",
			"stock"		=>"109",
			"origin"	=>"US",
			"url"		=>"img/product/Shure/se846.jpg",
			"weight"	=>"30",
			"color"		=>"White",
			"price"		=>"999",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Shure SE112",
			"stock"		=>"35",
			"origin"	=>"US",
			"url"		=>"img/product/Shure/se112.jpg",
			"weight"	=>"32",
			"color"		=>"Black",
			"price"		=>"49.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Shure SE535LTD",
			"stock"		=>"14",
			"origin"	=>"US",
			"url"		=>"img/product/Shure/se535ltd.jpg",
			"weight"	=>"48",
			"color"		=>"Red",
			"price"		=>"549.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
		Product::create([
			"name"		=>"Shure SRH750DJ",
			"stock"		=>"21",
			"origin"	=>"US",
			"url"		=>"img/product/Shure/srh750dj.jpg",
			"weight"	=>"227",
			"color"		=>"Black",
			"price"		=>"149.99",
			"guarantee"	=>'2"',
			"category_id" =>$categories->id,
			"buytime" =>$faker->numberBetween(5,40),
		]);
	}
}