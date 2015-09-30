<?php session_start();

require_once('controller/LoginController.php');
require_once('controller/RegisterController.php');
require_once('controller/MasterController.php');
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('model/User.php');
//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');



//$lc = new LoginController();
//$lc->defaultSession();
//$lc->doCases();

$mc = new MasterController();
$mc->defaultSession();
$mc->start();

