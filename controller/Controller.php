<?php

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

		public function __construct(LoginView $v, DateTimeView $dtv, LayoutView $lv, User $user) {
			
			$this->v = $v;
			$this->dtv = $dtv;
			$this->lv = $lv;
			$this->user = $user;
		}

		//CHECK IF THE USER IS ALREADY LOGGED IN AND BASED ON THAT SHOW/HIDE MESSAGE
		private function checkLogin(){

			if($_SESSION['Logged'] == false){

				$this->message = $this->v->getWelcomeMsg();
					$_SESSION['Logged'] = true;
				}
			else{
				$this->message = '';
				}
		}

		//CHECK IF THE USER IS ALREADY LOGGED OUT AND BASED ON THAT SHOW/HIDE MESSAGE
		private function checkLogout(){

			if($_SESSION['Logged'] == true){
				$this->message = $this->v->getByeMsg();
				$_SESSION['Logged'] = false;
			}
			else {
				$this->message = '';
			}
		}

		public function doCases(){

			//CHECK IF USER PRESSED LOGIN AND ALL THE DIFFERENT SCENARIOS
			if($this->v->getLogin()) {

				if($this->v->getIsUsernameEntered()){
					
					$this->message = $this->v->getUserErrorMsg();
				}
				else if($this->v->getIsPasswordEntered()){
					
					$this->message = $this->v->getPassErrorMsg();
				}
				else if($this->v->getIsUsernameEntered() && !($this->v->getIsPasswordEntered())){
					
					$this->message = $this->v->getUserErrorMsg();	
				}
				else if($this->v->getUsernameValue() == $this->user->getUsername()  && ($this->v->getPasswordValue() == $this->user->getPassword()) ){
					
					$this->checkLogin();	
				}
				else {
					$this->message = $this->v->getUserAndPassErrorMsg();
				}
			}

			//CHECK IF USER PRESSED LOGOUT
			else if($this->v->getLogout()){

				$this->checkLogout();
			}
			//RENDER PAGE DEPENDING ON SESSION STATUS
			$this->lv->render(($_SESSION['Logged']), $this->v, $this->dtv, $this->message);
		}

		public function defaultSession(){

			if(!isset($_SESSION['Logged'])){
			$_SESSION['Logged'] = false;
			}
		}
}