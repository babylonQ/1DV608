<?php

class MasterController{

	private $user;
	private $rv;
	private $lc;
	private $rc;

	public function __construct() {
			
			$this->rv = new RegisterView();
			$this->lc = new LoginController();
			$this->rc = new RegisterController();
		}

	public function start(){
		if(($this->rv->registerLinkPressed())){
			$this->rc->doRegisterCases();
		}
		else{
			$this->lc->doCases();
		}
		
	}

	public function defaultSession(){

			if(!isset($_SESSION['Logged'])){
			$_SESSION['Logged'] = false;
			}
		}
}