<?php

class IndexController extends BaseController{
	//public $restfull =true;

	public function indexAction() {
		return View::make('mainPage.index');
	}
}