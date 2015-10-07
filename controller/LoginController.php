<?php

//INCLUDE THE FILES NEEDED...
require_once('./view/LoginView.php');
require_once('./view/DateTimeView.php');
require_once('./view/LayoutView.php');

class LoginController {

	private $v;
	private $dtv;
	private $lv;
	private $user;
	private $message;
	private $rv;
	private $s;

		public function __construct() {
			
			$this->v = new LoginView();
			$this->dtv = new DateTimeView();
			$this->lv = new LayoutView();
			$this->user = new User();
			$this->rv = new RegisterView();
			$this->s = new SessionModel();
		}

		//CHECK IF THE USER IS ALREADY LOGGED IN AND BASED ON THAT SHOW/HIDE MESSAGE
		private function checkLogin(){

			if($this->s->isLoggedIn() == false){

				$this->v->setWelcomeMsg();
					$this->s->setLoggedIn();
				}
			else{
				$this->v->setClearMsg();
				}
		}

		//CHECK IF THE USER IS ALREADY LOGGED OUT AND BASED ON THAT SHOW/HIDE MESSAGE
		private function checkLogout(){

			if($this->s->isLoggedIn() == true){
				$this->v->setByeMsg();
				$this->s->setLoggedOut();
			}
			else {
				$this->v->setClearMsg();
			}
		}

		public function doLoginCases(){

			if($this->s->isUserRegistered()){
				$this->v->setSuccessfulRegisterMsg();
				$this->s->unsetRegistered();

			}

			if($this->s->isUserSet()){
				$this->v->setUsername($this->s->getUserValue());
				$this->s->unsetUser();

			}

			//CHECK IF USER PRESSED LOGIN AND ALL THE DIFFERENT SCENARIOS
			if($this->v->getLogin()) {

				if($this->v->getIsUsernameEntered()){
					
					$this->v->setUserErrorMsg();
				}
				else if($this->v->getIsPasswordEntered()){
					$this->v->setUsername($this->v->getUsernameValue());
					$this->v->setPassErrorMsg();
				}
				else if($this->v->getIsUsernameEntered() && !($this->v->getIsPasswordEntered())){
					
					$this->v->setUserErrorMsg();	
				}
				else if($this->v->getUsernameValue() == $this->user->getUsername()  && ($this->v->getPasswordValue() == $this->user->getPassword()) ){
					
					$this->checkLogin();	
				}
				else {
					$this->v->setUsername($this->v->getUsernameValue());
					$this->v->setUserAndPassErrorMsg();
				}
			}

			//CHECK IF USER PRESSED LOGOUT
			else if($this->v->getLogout()){

				$this->checkLogout();
			}
		}

		public function defaultSession(){

			if(!isset($_SESSION['Logged'])){
			$_SESSION['Logged'] = false;
			}
		}
		

		
}