<?php

class RegisterController {

	private $dtv;
	private $rv;
	private $lv;
	private $message;
	private $user;
	private $l;
	private $nv;

	public function __construct() {
			
		//$this->dtv = new DateTimeView();
		$this->rv = new RegisterView();
		//$this->lv = new LayoutView();
		//$this->lc = new LoginController();
		$this->user = new User();
		$this->l = new LoginView();
		$this->s = new SessionModel();
		$this->nv = new NavigationView();
	}

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
			else if($this->rv->getRegisterUsername() === $this->user->getUsername()){
				$this->rv->setUserExistsMsg();
				}
		else {
				$this->s->setRegistered();
				$this->s->setUser($this->rv->getRegisterUsername());
				$this->nv->backToIndex();
			}
		}	

	}

}