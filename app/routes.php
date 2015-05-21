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

Route::get('promotion', 'PromotionController@showPromotion');

Route::get('guide', 'GuideController@showGuide');

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

Route::group(array('before' => 'admin'), function(){

Route::get('manager', 'ManagerController@index');

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

		DB::delete('delete from categories where id ='.$input['category_id']);
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
});

Route::get("item",function(){
	$input = Input::all();
	$product = Product::find($input["product_id"]);

	$categories = Category::all();	

	return View::make("product.item",array("product"=>$product,
						"categories"=>$categories));
});

Route::post("order_list",function(){
	$input = Input::all();
	$product = Product::find($input["product_id"]);

	$cart = Cart::add($product->id, $product->name, $input["quantity"], $product->price);

	return "asdasd";
});

Route::post("customer-message",function(){
	$input = Input::all();

	$message = new UserMessage();

	$message->name = $input["name"];
	$message->text = $input['message'];
	$message->phone = $input["phone"];
	$message->email = $input["email"];

	$message->save();
	

	return Redirect::back()->with("message","Cảm ơn bạn đã phản hồi");
});


Route::get("brand",function(){
	$input = Input::all();

	$categories = Category::all();	

	$category_link = Category::find($input["category_id"]);

	if(array_key_exists("type_id", $input)){
		$products = Product::where(["category_id"=>$input["category_id"],
						"type_id"=>$input["type_id"]])->get();
		return View::make("product.brand",array("products"=>$products,
								"categories"=>$categories,
								"category_link"=>$category_link));
	}else{
		$products = Category::find($input["category_id"])->products;

		return View::make("product.brand",array("products"=>$products,
								"categories"=>$categories,
								"category_link"=>$category_link));
	}
});


Route::post("remove_cart",function(){
	$input = Input::all();

	Cart::remove($input["rowid"]);

	return "Success";
});

Route::get("payment",function(){
	if(Auth::guest()){
		return Redirect::to("login")->with("message","Mời bạn đăng nhập trước!");
	}
	else{
		$categories = Category::all();
		return View::make("product.payment",array("categories"=>$categories));
	}
});

Route::get("delete_cart",function(){
	Cart::destroy();
	return Redirect::to("/")->with("message","Bạn đã xóa thành công!");
});

Route::get("ordered",function(){
	$carts = Cart::content();
	$user = Auth::user();
	
	$order = Order::create([
		"account_id"=>$user->id]);
	
	foreach($carts as $cart){
	
	OrderItem::create([
		"order_id"=>$order->id,
		"product_id"=>$cart->id,
		"quantity"=>$cart->qty,
		"price"=>$cart->price]);
	}

	Cart::destroy();

	return Redirect::to("/")->with("message","Cảm ơn bạn đã đặt hàng của chúng tôi");
});


Route::post("search",function(){
	$categories = Category::all();
	$input = Input::all();
	$products = DB::select("SELECT * FROM product WHERE name LIKE '%".$input["item"]."%' ");

	return View::make("product.search",array("categories"=>$categories,
							"products"=>$products,));
});