<?php

namespace controller;

//INCLUDE THE FILES NEEDED...
require_once('/view/LoginView.php');
require_once('/view/DateTimeView.php');
require_once('/view/LayoutView.php');

class Controller {

	private $v;
	private $dtv;
	private $lv;
	private $member;


		public function __construct() {
			
			$this->v = new \view\LoginView();
			$this->dtv = new \view\DateTimeView();
			$this->lv = new \view\LayoutView();
		}

		public function request(){
			$this->lv->render(false, $this->v, $this->dtv);
		}


}