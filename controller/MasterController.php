<?php

class MasterController{

	
	private $rv;
	private $lc;
	private $rc;

	public function __construct() {
			$this->lc = new LoginController();
			$this->rc = new RegisterController();
			$this->nv = new NavigationView();
		}

	public function start(){
		if(($this->nv->registerLinkPressed())){
			$this->rc->doRegisterCases();
		}
		else{
			$this->lc->doLoginCases();
		}
		
	}

	
}