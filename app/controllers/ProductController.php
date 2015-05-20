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
		$categories = Category::orderBy('id','desc')->get();
		$types = Type::lists('name','id');
		$order_num = Order::all()->count();

		return View::make('manager.product',
			array("messages"=>$messages,
				"categories"=>$categories,
				"order_num"=>$order_num,
				"types"=>$types));
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
				$messages = Message::orderBy('created_at','desc')->get();
				$categories = Category::orderBy('id','desc')->get();
				return Redirect::to("product")->with('message','Chúc mừng bạn đã tạo thành công!')
								->with("categories",$categories);

			}
			else{
				return Redirect::to("product")->with('message','Không tải được hình ảnh!');
			}
		}
		else return Redirect::to('product')->withInput()->withErrors($validator->messages());
	}

	public function postAdd(){
		$input = Input::all();

		$product = new Product();
		$product->name = $input['name'];
		$product->origin = $input['origin'];
		$product->weight = $input['weight'];
		$product->color = $input['color'];
		$product->guarantee = $input['guarantee'];
		$product->stock = $input['stock'];
		$product->price = $input["price"];
		$product->category_id = $input["category_id"];
		$product->type_id = $input["type_id"];

		if(Input::hasFile('product_image')){
			$file = Input::file('product_image');
			$destinationPath = public_path().'/img/product';
			$filename = str_random(6) . '_' .$file->getClientOriginalName();
			$uploadSuccess   = Input::file('product_image')->move($destinationPath, $filename);

			$image = Image::make("img/product/" . $filename)->resize(400, 400)->save();

			$product->url = "img/product/" . $filename;

			$product->save();

			
			return Redirect::to("product");
		}
		else return Redirect::to("product")->with("message","Không tải được file");
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
