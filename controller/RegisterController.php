<?php

class RegisterController {

	private $rv;
	private $nv;
	private $udal;

	public function __construct(UserDAL $udal) {
			
		$this->rv = new RegisterView();
		$this->s = new SessionModel();
		$this->nv = new NavigationView();
		$this->udal = $udal;
	}

	//checks the different conditions and sets the messages which then RegisterView shows 
	public function doRegisterCases(){
	
		if($this->rv->getRegister()) {

			if(($this->rv->getIsRegisterUsernameEntered()) && ($this->rv->getIsRegisterPasswordEntered())){
				$this->rv->setUserAndPassRegisterErrorMsg();
				}
			else if(strlen($this->rv->getRegisterUsername()) < 3){	
				$this->rv->setUserRegisterErrorMsg();
				}
			else if(strlen($this->rv->getRegisterPassword()) < 6){		
				$this->rv->setPassRegisterErrorMsg();
				}
			else if($this->rv->getRegisterPassword() !== ($this->rv->getRegisterPasswordRepeat())){	
				$this->rv->setPasswordsNotMatchMsg();	
				}
			else if ($this->rv->getRegisterUsername() !== strip_tags($this->rv->getRegisterUsername())) {
      			$this->rv->setInvalidCharsMsg();
				}
			else if($this->udal->getUsers()->userExists($this->rv->getRegisterUsername())){
				$this->rv->setUserExistsMsg();
				}
		else {
				//set Register session
				$this->s->setRegistered();
				//set User session
				$this->s->setUser($this->rv->getRegisterUsername());
				//adds user to UserDAL
				$this->udal->add(new User($this->rv->getRegisterUsername(), $this->rv->getRegisterPassword()));
				$this->nv->backToIndex();
			}
		}	

	}

}