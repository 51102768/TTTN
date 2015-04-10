<?php

class AuthorsController extends BaseController{
	//public $restfull =true;

	public function getIndex() {
		$data = array(
			'name' => 'Quan',
			'age' => '22',
			'add' => 'akfbaisbfakbjask'
			);
		return View::make('authors.index', array('userData'=>$data));
	}
}