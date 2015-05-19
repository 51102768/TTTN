<?php

class ManagerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = Message::orderBy('created_at','desc')->get();
		$num_mess = Message::all()->count();

		$user_new = DB::select("select * from account where created_at between DATE_SUB(CURDATE(),INTERVAL (DAY(CURDATE())-1) DAY) and LAST_DAY(NOW())");
		$count_user_new = count($user_new);

		$order_num = Order::all()->count();

		$num_view = Page::find(1)->view;

		$num_login = Page::find(1)->login;

		return View::make('manager.index',
			array("messages"=>$messages,
				"num_mess"=>$num_mess,
				"count_user_new"=>$count_user_new,
				"num_login"=>$num_login,
				"user_new"=>$user_new,
				"order_num"=>$order_num,
				"num_view"=>$num_view));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
