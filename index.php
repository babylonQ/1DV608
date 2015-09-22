<?php session_start();

require_once('controller/Controller.php');
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('model/User.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$v = new LoginView();
$dtv = new DateTimeView();
$lv = new LayoutView ();
$user = new User();

$c = new Controller($v, $dtv, $lv, $user);
$c->defaultSession();
$c->doCases();

