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
			$user = User::where('username', '=', Input::get('username'))->firstOrFail();
			if($user->block == false){
				if(Auth::attempt($credentials)){
					DB::update("UPDATE page  SET login = login + 1  WHERE id = 1");
					$user = Auth::user();
					$user->login = date("Y-m-d H:i:s");
					$user->save();
					return Redirect::to('/')->with('message','Chúc mừng bạn đã đăng nhập thành công');
				}
				else{
					return Redirect::to('login')->with('failed','Đăng nhập thất bại!');
				}
			}
			else{
				return Redirect::to('login')->with('failed','Tài khoản này không có quyền đăng nhập!');
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
