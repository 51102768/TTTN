<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{	
		DB::update("UPDATE page  SET view = view + 1  WHERE id = 1");

		$hot_products = Product::orderBy('buytime','desc')->take(8)->get();

		$new_products = Product::orderBy("created_at",'desc')->take(8)->get();

		$categories = Category::all();	

		return View::make('homepage',array("categories"=>$categories,
							"hot_products"=>$hot_products,
							"new_products"=>$new_products));
	}

}
