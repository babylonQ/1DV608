<?php

class LoginController {

	private $v;
	private $s;
	private $ul;

	public function __construct(UserList $list) {
			
		$this->v = new LoginView();
		$this->s = new SessionModel();
		$this->ul = $list;
	}

	//CHECK IF THE USER IS ALREADY LOGGED IN AND BASED ON THAT SET/UNSET MESSAGE
	private function checkLogin(){

		if($this->s->isLoggedIn() == false){
			$this->v->setWelcomeMsg();
			$this->s->setLoggedIn();
		}
		else{
			$this->v->setClearMsg();
		}
	}

	//CHECK IF THE USER IS ALREADY LOGGED OUT AND BASED ON THAT SET/UNSET MESSAGE
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
			else if($this->ul->checkCredentials($this->v->getUsernameValue(), $this->v->getPasswordValue())){
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
}