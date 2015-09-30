<?php

class RegisterController {

	private $dtv;
	private $rv;
	private $lv;


	public function __construct() {
			
		$this->dtv = new DateTimeView();
		$this->rv = new RegisterView();
		$this->lv = new LayoutView();
	}

	public function doRegisterCases(){

		$this->lv->renderRegister(($_SESSION['Logged']), $this->dtv, $this->rv);

	}

}