<?php


require_once('controller/Controller.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');


$c = new \controller\Controller();
$c->request();


//CREATE OBJECTS OF THE VIEWS
//$v = new \view\LoginView();
//$dtv = new \view\DateTimeView();
//$lv = new \view\LayoutView();


//$lv->render(false, $v, $dtv);