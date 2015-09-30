<?php

class RegisterView {

	private static $register = 'RegisterView::Register';
	private static $username = 'RegisterView::Username';
	private static $password = 'RegisterView::Password';
	private static $repeatPassword = 'RegisterView::repeatPassword';
	
	private static $cookieName = 'RegisterView::CookieName';
	private static $cookiePassword = 'RegisterView::CookiePassword';
	private static $keep = 'RegisterView::KeepMeLoggedIn';
	private static $messageId = 'RegisterView::Message';


	private static $registerLink = "register";
	private static $backLink = '';

	public function generateRegisterFormHTML() {
		$message = '';

		return '
			<form method="post" > 
				<fieldset>
					<legend>Register a new user - Write username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$username . '">Username :</label>
					<input type="text" id="' . self::$username . '" name="' . self::$username . '" value="" />
					<br>
					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					<br>
					<label for="' . self::$repeatPassword . '">Repeat password  :</label>
					<input type="password" id="' . self::$repeatPassword . '" name="' . self::$repeatPassword . '" />
					<br>
					<input type="submit" name="' . self::$register . '" value="Register" />
				</fieldset>
			</form>
		';
	}

	 public function renderRegisterLink() {
 
      return "<a href='?" . self::$registerLink . "'>Register a new user</a>";
    
 	 }

 	 public function renderBackLink() {
 
      return "<a href='?" . self::$backLink . "'>Back to login</a>";
    
 	 }


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




}