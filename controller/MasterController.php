<?php

require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');
require_once('model/UserDAL.php');

class MasterController{

	private $lc;
	private $rc;

	public function __construct(){

		$this->nv = new NavigationView();
		$this->mysqli = new mysqli("mysqlurl", "user", "pass", "user");
		if (mysqli_connect_errno()) {
	   		printf("Connect failed: %s\n", mysqli_connect_error());
	   		exit();
		}
		$this->udal = new UserDAL($this->mysqli);
	}

	public function start(){
		if(($this->nv->registerLinkPressed())){
			$this->rc = new RegisterController($this->udal);
			$this->rc->doRegisterCases();
		}
		else{
			$this->lc = new LoginController($this->udal->getUsers());
			$this->lc->doLoginCases();
		}
		$this->mysqli->close();
	}
}
