<?php session_start();

//namespace view;

require_once('./model/Member.php');

class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	private $user;

	private $view;
  	
	
	public function __construct() {
		
			$this->user = new Member();
	}
	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response($message) {

		if($_SESSION["Logged"] === true) {
		//	$message = 'Welcome';
			$response = $this->generateLogoutButtonHTML($message);
		}
		else {
		//	$message = 'Bye bye!';
			$response = $this->generateLoginFormHTML($message);
		}

		return $response;
	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message) {
		return '
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . $this->getUsernameValue() . '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}
	
	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES

	public function getLogin(){

		return isset($_POST[self::$login]);
	}

	public function getLogout(){

		return isset($_POST[self::$logout]);
	}

	public function getUsername(){

		return  empty($_POST[self::$name]);
	}

	public function getPassword(){

		return empty($_POST[self::$password]);
	}

	public function getUsernameValue(){
		if (isset($_POST[self::$name])){

			return ($_POST[self::$name]);
		}
		
	}

	public function getPasswordValue(){

		if (isset($_POST[self::$password])){

			return ($_POST[self::$password]);
		}
	}

	public function getUserErrorMsg(){
	//	$err = ;
		return "Username is missing";
	}

	public function getPassErrorMsg(){
	//	$err = ;
		return "Password is missing";
	}

	public function getUserAndPassErrorMsg(){
	//	$err = ;
		return "Wrong name or password";
	}

	public function getWelcomeMsg(){
		return "Welcome";
	}
	public function getByeMsg(){
		return "Bye bye!";
	}
	
}
