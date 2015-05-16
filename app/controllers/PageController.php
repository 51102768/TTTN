<?php

class PageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		
		
		$messages = Message::orderBy('created_at','desc')->get();

		$order_num = Order::all()->count();

		$users = User::orderBy('login','desc')->take(15)->get();

		$num_view = Page::find(1)->view;

		$user_new = DB::select("select * from account where created_at between DATE_SUB(CURDATE(),INTERVAL (DAY(CURDATE())-1) DAY) and LAST_DAY(NOW())");

		$num_users_new = count($user_new);


		return View::make("manager.page")->with("messages",$messages)
								->with("users",$users)
								->with("order_num",$order_num)
								->with("num_view",$num_view)
								->with("num_users_new",$num_users_new);
	}


}