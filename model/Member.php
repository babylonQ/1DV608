<?php

class Member {

	private $username = 'Admin';
	private $password = 'Password';

		public function getUsername(){
			return $this->username;
		}

		public function getPassword(){
			return $this->password;
		}

		public function checkCredentials(){

			if($this->username === 'Admin' && $this->password === 'Password'){

				return true;
			}
			else{
				return false;
			}

		}
}