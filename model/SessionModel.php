<?php

class SessionModel {

	public function __construct() {

		if(!isset($_SESSION['Logged'])){
		$_SESSION['Logged'] = false;
		}

		if(!isset($_SESSION['Register'])){
		$_SESSION['Register'] = false;
		}	

		if(!isset($_SESSION['Username'])){
		$_SESSION['Username'] = false;
		}		
	}

	public function isLoggedIn(){
		return $_SESSION['Logged'];
	}
	public function setLoggedIn(){
		$_SESSION['Logged'] = true;
	}
	public function setLoggedOut(){
		$_SESSION['Logged'] = false;
	}
	public function isUserRegistered(){
		return $_SESSION['Register'];
	}
	public function setRegistered(){
		$_SESSION['Register'] = true;
	}
	public function unsetRegistered(){
		$_SESSION['Register'] = false;
	}
	public function setUser($user){
		$_SESSION['Username'] = $user;		
	}
	public function unsetUser(){
		$_SESSION['Username'] = null;		
	}
	public function isUserSet(){
		return $_SESSION['Username'];		
	}
	public function getUserValue(){
		return $_SESSION['Username'];
	}
}