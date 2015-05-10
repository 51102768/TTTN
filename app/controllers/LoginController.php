<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('user.login');
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


	public function login(){
		$input = Input::all();

		$rules = array(
			'username' => 'required',
			'password' => 'required'
			);

		$messages = array(
			'username.required' => 'Vui lòng gõ tên đăng nhập',
			'password.required' => 'Vui lòng gõ mật khẩu'
			);

		$validator = Validator::make($input, $rules, $messages);

		if($validator->passes()){
			$credentials = array('username' => Input::get('username'),
						'password' => Input::get('password'));

			if(Auth::attempt($credentials)){
				return Redirect::to('/')->with('message','Chúc mừng bạn đã đăng nhập thành công');
			}
			else{
				return Redirect::to('login')->with('failed','Đăng nhập thất bại!');
			}
		}
		else{
			return Redirect::to('login')->withErrors($validator->messages());
		}
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
