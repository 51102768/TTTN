<?php

class ProfileController extends \BaseController {

	public function indexProfile(){
		return View::make('user.profile');
	}

	public function indexEditProfile(){
		return View::make('user.editprofile');
	}

	public function postEditProfile(){
		$input = Input::all();

		$rules = array(
				'email'		=> 'required|unique:account|email',
				'fullname'	=> 'required',
                  			'phone'	=> 'numeric');

		$messages = array(
			'email.required'      	=> 'Mời bạn điền email đầy đủ.',
			'email.unique'		=> 'Email này đã tồn tại.',
			'email.email'		=> 'Email không hợp lệ.',
			'fullname.required'	=> 'Mời bạn điền tên đầy đủ.',
			'phone.numeric'	=>'Điện thoại phải là chuỗi số'
		);

		$validator = Validator::make($input, $rules,$messages);

		if($validator->passes()){
			$user = Auth::user();
			$user->email = $input['email'];
			$user->fullname = $input['fullname'];
			$user->phone = $input['phone'];
			$user->address = $input['address'];
			$user->save();

			return Redirect::to('profile')->with('message','Chúc mừng bạn đã chỉnh sửa thành công!');
		}
		else {
			return Redirect::to('editprofile')->withInput()->withErrors($validator->messages());	
		}
	}
}
