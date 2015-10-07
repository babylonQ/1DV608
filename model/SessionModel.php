<?php

class SessionModel {

	

	public function __construct() {

		if(!isset($_SESSION['Logged'])){
		$_SESSION['Logged'] = false;
		}

		if(!isset($_SESSION['Register'])){
		$_SESSION['Register'] = false;
		}	

		if(!isset($_SESSION['User'])){
		$_SESSION['User'] = false;
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

		$_SESSION['User'] = $user;
			
	}
	public function unsetUser(){

		$_SESSION['User'] = null;
			
	}

	public function isUserSet(){

		return $_SESSION['User'];
			
	}

	public function getUserValue(){
		return $_SESSION['User'];
	}


}