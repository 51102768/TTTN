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

Route::get('contact', 'ContactController@showContact');

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

			$orders = Order::where("account_id","=",$input['user_id'])->get();

			foreach ($orders as $order) {
				$order->orderItems()->forceDelete();
			}
			
			$orders = Order::where("account_id","=",$input['user_id'])->forceDelete();

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
					"authority"=>$user->authority,
					"block" => $user->block);

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

Route::get("product","ProductController@index");

Route::post("brand_img","ProductController@postImg");

Route::post("product_add","ProductController@postAdd");

Route::get("product_info",function(){
	if(Request::ajax()){
		$input = Input::all();
		$category_id = $input['category_id'];

		if($input["action"] == "open"){
			$products =  DB::select('select * from product where category_id = "'.$category_id.'" order by id desc');
			$data = [];
			
			return Response::json($products);
		}
	}
});

Route::post("category_remove",function(){
	if(Request::ajax()){
		$input = Input::all();

		DB::delete('delete from category where id ='.$input['category_id']);
		DB::delete('delete from product where category_id ='.$input['category_id']);

		return "Success!";
	}
});

Route::get("product_info_table",function(){
	if(Request::ajax()){
		$input = Input::all();

		$data = Product::find($input["product_id"]);

		return Response::json($data);
	}
});

Route::post("product_remove",function(){
	if(Request::ajax()){
		$input = Input::all();

		DB::delete('delete from product where id ='.$input['product_id']);

		return "Success!";
	}
});

Route::get("product_statistics","ProductStatController@index");


Route::get("order","OrderController@index");

Route::get("order_check",function(){
	if(Request::ajax()){	
		$input = Input::all();

		$order = Order::find($input["order_id"]);

		$order->forceDelete();

		$order->orderItems()->forceDelete();

		return "Success!";
	}
});

Route::get("page","PageController@index");


Route::get("item",function(){
	$input = Input::all();
	$product = Product::find($input["product_id"]);

	return View::make("product.item",array("product"=>$product));
});