<?php

class ContactController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'ContactController@showContact');
	|
	*/

	public function showContact()
	{	
		DB::update("UPDATE page  SET view = view + 1  WHERE id = 1");

		return View::make('contact');
	}

}
