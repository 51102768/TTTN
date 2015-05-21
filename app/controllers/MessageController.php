<?php

class MessageController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	$order_num = Order::all()->count();
		$messages = Message::orderBy('created_at','desc')->get();
		$customer_messages = UserMessage::orderBy('created_at','desc')->get();

		return View::make("manager.message")->with('messages',$messages)
								->with("order_num",$order_num)
								->with("customer_messages",$customer_messages);
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
		$input = Input::all();

		$user = Auth::user();

		$message = new Message();

		$message->user_id = $user->id;
		$message->text = $input['message'];

		$message->save();
		

		return Redirect::to('message');
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

	public function delete(){
		DB::table('message')->truncate();

		return Redirect::to("message");
	}

}
