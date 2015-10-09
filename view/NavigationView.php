<?php

class NavigationView {

	private static $registerLink = "register";
	private static $backLink = '';

	public function renderLink() {
 	 	if($this->registerLinkPressed() == false){
 	 		return $this->renderRegisterLink();
 	 	}
 	 	else{
 	 		return $this->renderBackLink();
 	 	}
 	 }

	 public function registerLinkPressed() {	
    	return isset($_GET[self::$registerLink]);
  	}

	 public function renderRegisterLink() {
      	return "<a href='?" . self::$registerLink . "'>Register a new user</a>";
 	}

 	 public function renderBackLink() {
      return "<a href='?" . self::$backLink . "'>Back to login</a>";
 	 }

 	 public function backToIndex(){
		header('Location:/?');
	}

}
