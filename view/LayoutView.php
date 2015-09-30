<?php

class LayoutView {

  
  
  public function renderLogin($isLoggedIn, LoginView $v, DateTimeView $dtv, RegisterView $rv, $message) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 4</h1>
          ' . $this->checkSessionS($isLoggedIn, $rv) . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <div class="container">
              ' . $v->response($message) . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }

  public function renderRegister($isLoggedIn, DateTimeView $dtv, RegisterView $rv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 4</h1>
          ' . $rv->renderLink() . $this->renderIsLoggedIn($isLoggedIn) . '
          
          <h2>Register new user</h2>
          <div class="container">
              ' . $rv->generateRegisterFormHTML() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }

  private function checkSessionS($isLoggedIn, RegisterView $rv) {
    
    if($isLoggedIn == false){
      return $rv->renderLink();

    }

    else if ($isLoggedIn == true){
      return '';

      }
  }

  
  

}

 
