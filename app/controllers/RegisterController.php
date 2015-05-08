<?php

class RegisterController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('user.register');	
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

		$rules = array('username' 	=> 'required|unique:account|min:6',
				'email'		=> 'required|unique:account|email',
				'fullname'	=> 'required',
				'password'   => 'required|min:6',
                  			'cpassword'  => 'required|min:6|same:password');

		$messages = array(
			'username.required'    => 'Mời bạn điền tên đăng nhập đầy đủ.',
			'username.unique'    => 'Tên đăng nhập này đã tồn tại.',
			'username.min' => 'Tên đăng nhập tối thiểu :min kí tự.',
			'email.required'      => 'Mời bạn điền email đầy đủ.',
			'email.unique'		=> 'Email này đã tồn tại.',
			'email.email'		=> 'Email không hợp lệ.',
			'fullname.required'	=> 'Mời bạn điền tên đầy đủ.',
			'password.require'	=> 'Mời bạn điền mật khẩu đầy đủ.',
			'password.min'	=> 'Mật khẩu tối thiểu là :min kí tự.',
			'cpassword.required'=> 'Mời bạn điền lại mật khẩu.',
			'cpassword.min'	=> 'Mật khẩu tối thiểu là :min kí tự.',
			'cpassword.same'	=> 'Mật khẩu phải giống nhau.',
		);

		$validator = Validator::make($input, $rules,$messages);

		if($validator->passes()){
			 Register::saveFormData(Input::except(array('_token','cpassword')));

		                    return Redirect::to('/')
		                            ->withMessage('Bạn đã đăng kí thành công!');
		}

		else{
			return Redirect::to('register')->withInput()->withErrors($validator->messages());
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
