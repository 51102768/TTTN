<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages = Message::orderBy('created_at','desc')->get();
		$categories = Category::all();

		return View::make('manager.product',
			array("messages"=>$messages,
				"categories"=>$categories));
	}

	public function postImg(){
		$input = Input::all();
		$rules = array('brand' 	=> 'required|unique:category');

		$messages = array(
			'brand.required'  => 'Mời bạn điền tên thương hiệu đầy đủ.',
			'brand.unique'    => 'Tên thương hiệu này đã tồn tại.',
		);

		$validator = Validator::make($input, $rules,$messages);
		if($validator->passes()){
			if (Input::hasFile('image')){
				$brand = $input["brand"];
				$file = $input['image'];
				$destinationPath = public_path().'/img/brand';
				$filename = str_random(6) . '_' .$file->getClientOriginalName();

				$uploadSuccess   = Input::file('image')->move($destinationPath, $filename);

				$image = Image::make("img/brand/" . $filename)->resize(400, 300)->save();

				Category::create([
					"brand"=>$brand,
					"url"=> "img/brand/" . $filename,
				]);

				return Redirect::to("product")->with('message','Chúc mừng bạn đã tạo thành công!');
			}
			else{
				return Redirect::to("product")->with('message','Không tải được hình ảnh!');
			}
		}
		else return Redirect::to('product')->withInput()->withErrors($validator->messages());
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
