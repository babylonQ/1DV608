<?php

//namespace controller;

//INCLUDE THE FILES NEEDED...
require_once('./view/LoginView.php');
require_once('./view/DateTimeView.php');
require_once('./view/LayoutView.php');

class Controller {

	private $v;
	private $dtv;
	private $lv;
	private $user;


		public function __construct() {
			
			$this->v = new LoginView();
			$this->dtv = new DateTimeView();
			$this->lv = new LayoutView();
			$this->user = new Member();
		}


		public function checkLogin(){

			if($this->v->getRequestUserName() === $this->user->getUsername() && $this->v->getRequestPassword() === $this->user->getPassword()){
				$_SESSION['Logged'] =true;
			}

			else{
				$_SESSION['Logged'] = false;
			}

		}

		public function request(){

						//var_dump(($_SESSION['Logged']));
						$this->checkLogin();
						$this->lv->render(($_SESSION['Logged']), $this->v, $this->dtv);
				
		}
}