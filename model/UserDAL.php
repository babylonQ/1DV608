<?php

require_once('model/User.php');
require_once('model/UserList.php');

class UserDAL {
	private static $table = "users";
	private $userList;
	private $database;

	public function __construct(mysqli $db) {
		$this->database = $db;	
	}

	//gets users from the database table
	public function getUsers() {
		
		$this->userList = new UserList();
		$stmt = $this->database->prepare("SELECT * FROM " . self::$table);
		if ($stmt === FALSE) {
			throw new Exception($this->database->error);
		}
		$stmt->execute();
	    $stmt->bind_result($username, $password);
	    
	    while ($stmt->fetch()) {
	    	$user = new User($username, $password);
	    	$this->userList->add($user);
		}
		return  $this->userList;
	}
	
	//adds user to the database table
	public function add(User $toBeAdded) {
		$stmt = $this->database->prepare("INSERT INTO  `a9523293_mirza`.`users` (
			`username` , `password`)
				VALUES (?, ?)");
		if ($stmt === FALSE) {
			throw new Exception($this->database->error);
		}
		$usern = $toBeAdded->getUsername();
		$pass = $toBeAdded->getPassword();
		$stmt->bind_param('ss', $usern, $pass);
		$stmt->execute();
	}
}
