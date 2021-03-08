<?php
namespace controllers;
 /**
  * Controller MyAuth
  */
class MyAuth extends ControllerBase{

	public function index(){
		$this->loadView("MyAuth/index.html");
	}
}
