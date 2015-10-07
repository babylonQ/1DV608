<?php

class User {

	private $username = 'Admin';
	private $password = 'Password';
	private $v;

	

		public function getUsername(){
			return $this->username;
		}

		public function getPassword(){
			return $this->password;
		}

		public function checkCredentials(){

			if($this->getUsername() === 'Admin' && $this->getPassword() === 'Password'){

				return true;
			}
			else{
				return false;
			}

		}

		


}