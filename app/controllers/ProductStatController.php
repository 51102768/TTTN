<?php

class ProductStatController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = Message::orderBy('created_at','desc')->get();

		$high_products = Product::orderBy('buytime','desc')->take(10)->get();

		$new_products = Product::orderBy('created_at','desc')->take(10)->get();

		$order_num = Order::all()->count();

		$categories = Category::all();

		$count=1;
		return View::make("manager.product-stats",
						array('messages'=>$messages,
							'high_products'=>$high_products,
							"new_products"=>$new_products,
							"categories" => $categories,
							'count'=>$count,
							"order_num"=>$order_num));
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
