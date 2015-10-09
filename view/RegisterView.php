<?php

class RegisterView {

	private static $register = 'RegisterView::Register';
	private static $username = 'RegisterView::UserName';
	private static $password = 'RegisterView::Password';
	private static $passwordRepeat = 'RegisterView::PasswordRepeat';
	private static $messageId = 'RegisterView::Message';

	private static $message = '';

	public function responseRegister() {
		
		$response = $this->generateRegisterFormHTML(self::$message);
		return $response;
	}

	public function generateRegisterFormHTML($message) {

		return '
			<form method="post" > 
				<fieldset>
					<legend>Register a new user - Write username and password</legend>
					<p id="' . self::$messageId . '">' . self::$message . '</p>
					
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

	//setters and getters for different conditions

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

	public function setUserRegisterErrorMsg(){
		self::$message = "Username has too few characters, at least 3 characters.<br />";
	}

	public function setPassRegisterErrorMsg(){
		self::$message = "Password has too few characters, at least 6 characters.";
	}

	public function setPasswordsNotMatchMsg(){
		self::$message = "Passwords do not match.";
	}

	public function setInvalidCharsMsg(){
		self::$message = "Username contains invalid characters.";
	}

	
	public function setUserExistsMsg(){
		self::$message = "User exists, pick another username.";
	}

	public function setUserAndPassRegisterErrorMsg(){
		self::$message = "Username has too few characters, at least 3 characters.<br />Password has too few characters, at least 6 characters.";
	}

}