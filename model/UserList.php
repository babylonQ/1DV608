<?php

class UserList {
  
    private $users = array();

    //adds user to a list
    public function add(User $newUser) {
    $this->users[] = $newUser;
    }
    
    //checks if username already exists 
    public function userExists($username) {
       foreach ($this->users as $user) {
          if ($user->getUsername() === $username) {
           return true;
          }
        }
      return false;
     }

    //checks if username and password match
    public function checkCredentials($username, $password) {
       foreach ($this->users as $user) {
         if ($user->getUsername() === $username && $user->getPassword() === $password) {
           return true;
         }
       }
       return false;
    }
}