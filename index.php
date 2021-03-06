<?php session_start();

require_once('controller/MasterController.php');
require_once('model/SessionModel.php');
require_once('view/LoginView.php');
require_once('view/DateTimeView.php');
require_once('view/LayoutView.php');
require_once('view/RegisterView.php');
require_once('view/NavigationView.php');

//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

$v = new LoginView();
$dtv = new DateTimeView();
$rv = new RegisterView();
$lv = new LayoutView();
$nv = new NavigationView();
$s = new SessionModel();
$mc = new MasterController();
$mc->start();

if($nv->registerLinkPressed()){
		$lv->renderRegister($s->isLoggedIn(), $dtv, $rv, $nv);
}
else{
		$lv->renderLogin($s->isLoggedIn(), $v, $dtv, $nv);
}
	