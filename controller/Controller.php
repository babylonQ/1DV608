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
	private $message;


		public function __construct(LoginView $v, DateTimeView $dtv, LayoutView $lv, Member $user) {
			
			$this->v = $v;
			$this->dtv = $dtv;
			$this->lv = $lv;
			$this->user = $user;
		}


		public function checkLogin(){

			if($this->v->getUsernameValue() === $this->user->getUsername() && $this->v->getPasswordValue() === $this->user->getPassword()){
				$_SESSION['Logged'] = true;
			}
			else{
				$_SESSION['Logged'] = false;
			}
		}

		public function request(){

					$this->checkLogin();
					$this->doCases();
				
		}

		public function doCases(){

			if($this->v->getLogin()) {

				if($this->v->getUsername()){
					$this->message = $this->v->getUserErrorMsg();
				}
				
				else if($this->v->getPassword()){
					$this->message = $this->v->getPassErrorMsg();
				}

				else if($this->v->getUsername() && !($this->v->getPassword())){
					
					$this->message = $this->v->getUserErrorMsg();
					
				}
				else if($this->v->getUsernameValue() == $this->user->getUsername()  && ($this->v->getPasswordValue() == $this->user->getPassword()) ){
					
					$this->message = $this->v->getWelcomeMsg();
				
				}
				else {
					$this->message = $this->v->getUserAndPassErrorMsg();
				}
			}

			else if($this->v->getLogout()){

				$this->message = $this->v->getByeMsg();
			}
			$this->lv->render(($_SESSION['Logged']), $this->v, $this->dtv, $this->message);
		}
}