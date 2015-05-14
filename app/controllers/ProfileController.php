<?php

class ProfileController extends \BaseController {

	public function indexProfile(){
		return View::make('user.profile');
	}

	public function postProfile(){
		$user = Auth::user();

		if (Input::hasFile('image'))
		{
			$file = Input::file('image');
			$destinationPath = public_path().'/img/avatar';
			$filename = str_random(6) . '_' .$file->getClientOriginalName();
			$uploadSuccess   = Input::file('image')->move($destinationPath, $filename);

			$image = Image::make("img/avatar/" . $filename)->resize(200, 200)->save();

			$user->url = "img/avatar/" . $filename;
			$user->save();

			return Redirect::to('profile')->with('message','Chúc mừng bạn đã chỉnh sửa thành công!');
		}
		else return Redirect::to('profile')->with('message','Tải lên thất bại!');
	}

	public function indexEditProfile(){
		return View::make('user.editprofile');
	}

	public function postEditProfile(){
		$input = Input::all();

		$rules = array(
				'fullname'	=> 'required',
                  			'phone'	=> 'numeric');

		$messages = array(
			'fullname.required'	=> 'Mời bạn điền tên đầy đủ.',
			'phone.numeric'	=>'Điện thoại phải là chuỗi số'
		);

		$validator = Validator::make($input, $rules,$messages);

		if($validator->passes()){
			$user = Auth::user();
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
