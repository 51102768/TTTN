<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'HomeController@showWelcome');

Route::get('login', 'LoginController@index');

Route::post('login','LoginController@login');

Route::get('register', 'RegisterController@index');

Route::post('register','RegisterController@store');

Route::get('logout', array('as' => 'logout', function () { 
	Auth::logout();

	return Redirect::to('/')->with('message', 'Bạn đã đăng xuất thành công');
 }));

Route::get('profile', 'ProfileController@indexProfile');

Route::post('image-submit','ProfileController@postProfile');

Route::get('editprofile','ProfileController@indexEditProfile');

Route::post('editprofile','ProfileController@postEditProfile');

Route::get('manager','ManagerController@index');

Route::get('message','MessageController@index');

Route::post('message','MessageController@store');

Route::post('message_checked','MessageController@delete');

Route::get('customer','CustomerController@index');

Route::get('user',function(){

	if(Request::ajax()){
		$input = Input::all();

		if($input["action"] == "remove"){
			$user =  User::destroy($input['user_id']);
			return "Success!";
		}
		else if($input["action"] == "open"){
			$user =  User::find($input['user_id']);

			$data = array("username"=>$user->username,
					"fullname"=>$user->fullname,
					"email"=>$user->email,
					"phone"=>$user->phone,
					"address"=>$user->address,
					"url"=>$user->url,
					"authority"=>$user->authority);

			return Response::json($data);
		}
		else if($input["action"] == "block"){
			$user =  User::find($input['user_id']);

			$user->block = true;
			$user->save();

			return "Success Block!";
		}
		else if($input["action"] == "unblock"){
			$user =  User::find($input['user_id']);

			$user->block = false;
			$user->save();
			
			return "Success  Unblock!";
		}
		else if ($input["action"] == "changeAuth") {
			$user =  User::find($input['user_id']);

			$user->authority = strtolower($input["authority"]);
			$user->save();
			
			return "Success  change author!";
		}
	}
});

Route::get("customer-statistics","CustomerController@indexStatistics");