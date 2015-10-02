<?php

class RegisterView {

	private static $register = 'RegisterView::Register';
	private static $username = 'RegisterView::UserName';
	private static $password = 'RegisterView::Password';
	private static $passwordRepeat = 'RegisterView::PasswordRepeat';
	private static $messageId = 'RegisterView::Message';


	private static $registerLink = "register";
	private static $backLink = '';
	public $usernameMinChars = 3;
	public $passwordMinChars = 6;

	public function responseRegister($message) {
		
		$response = $this->generateRegisterFormHTML($message);
		
		return $response;
	}

	public function generateRegisterFormHTML($message) {
		//$message = '';

		return '
			<form method="post" > 
				<fieldset>
					<legend>Register a new user - Write username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$username . '">Username :</label>
					<input type="text" id="' . self::$username . '" name="' . self::$username . '" value="' . (strip_tags($this->getRegisterUsername())) . '" />
					<br>
					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					<br>
					<label for="' . self::$passwordRepeat . '">Repeat password  :</label>
					<input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" />
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

  	public function getRegister(){
		return isset($_POST[self::$register]);
	}

	public function getRegisterUsername(){
		if (isset($_POST[self::$username])) {
      	return $_POST[self::$username];
   		 }
	}

	public function getRegisterPassword(){
		if (isset($_POST[self::$password])) {
      	return $_POST[self::$password];
   		 }
	}

	public function getRegisterPasswordRepeat() {
    	if (isset($_POST[self::$passwordRepeat])) {
      		return $_POST[self::$passwordRepeat];
    	}
  	}

  	public function getIsRegisterUsernameEntered(){
		return  empty($_POST[self::$username]);
	}

	public function getIsRegisterPasswordEntered(){
		return empty($_POST[self::$password]);
	}

	public function getUserRegisterErrorMsg(){
		return "Username has too few characters, at least 3 characters.";
	}

	public function getPassRegisterErrorMsg(){
		return "Password has too few characters, at least 6 characters.";
	}

	public function getPasswordsNotMatchMsg(){
		return "Passwords do not match.";
	}

	public function getInvalidCharsMsg(){
		return "Username contains invalid characters.";
	}

	public function getSuccessfulRegisterMsg(){
		return "Registered new user.";
	}
	public function getUserExistsMsg(){
		return "User exists, pick another username.";
	}

}