<?php

class CustomerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		
		
		$messages = Message::orderBy('created_at','desc')->get();

		$users = User::all();

		return View::make("manager.customer")->with("messages",$messages)
								->with("users",$users);
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

	public function indexStatistics(){
		$messages = Message::orderBy('created_at','desc')->get();

		$users = User::all();
		$count_user = $users->count();
		$count_user_nomal = count(DB::select('select * from account where authority = "user"'));
		$count_user_vip = count(DB::select('select * from account where authority = "vip"'));
		$user_new = DB::select("select * from account where created_at between DATE_SUB(CURDATE(),INTERVAL (DAY(CURDATE())-1) DAY) and LAST_DAY(NOW())");
		$count_user_new = count($user_new);
		$count_messages = $messages->count();

		return View::make("manager.customer-stats",
			array("users"=>$users,
				"messages"=>$messages,
				"count_user"=>$count_user,
				"count_user_nomal"=>$count_user_nomal,
				"count_user_vip"=>$count_user_vip,
				"count_messages"=>$count_messages,
				"count_user_new"=>$count_user_new,
				"user_new"=>$user_new));

	}

}
