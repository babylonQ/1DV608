<?php

class RegisterController {

	private $dtv;
	private $rv;
	private $lv;
	private $message;

	public function __construct() {
			
		$this->dtv = new DateTimeView();
		$this->rv = new RegisterView();
		$this->lv = new LayoutView();
		$this->lc = new LoginController();
	}

	public function doRegisterCases(){

		if($this->rv->getRegister()) {

			if(($this->rv->getIsRegisterUsernameEntered()) && ($this->rv->getIsRegisterPasswordEntered())){
				$this->message = $this->rv->getUserRegisterErrorMsg() . "<br />" . $this->rv->getPassRegisterErrorMsg();
			}
			else if(strlen($this->rv->getRegisterUsername()) < $this->rv->usernameMinChars){
					
				$this->message = $this->rv->getUserRegisterErrorMsg();
			}
			else if(strlen($this->rv->getRegisterPassword()) < $this->rv->passwordMinChars){
					
				$this->message = $this->rv->getPassRegisterErrorMsg();
			}
			else if($this->rv->getRegisterPassword() !== ($this->rv->getRegisterPasswordRepeat())){
					
				$this->message = $this->rv->getPasswordsNotMatchMsg();	
			}
			else if ($this->rv->getRegisterUsername() !== strip_tags($this->rv->getRegisterUsername())) {
      			$this->message = $this->rv->getInvalidCharsMsg();
			}
			else {
				$this->message = $this->rv->getSuccessfulRegisterMsg();		
			}
		}
		if ($this->message === $this->rv->getSuccessfulRegisterMsg()){
			$this->lc->callRenderLogin($this->message);
		}
		else{
			$this->lv->renderRegister(($_SESSION['Logged']), $this->dtv, $this->rv, $this->message);

		}

		

	}

}