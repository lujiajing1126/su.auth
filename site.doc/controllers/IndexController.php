<?php
require_once './framework/Controller.php';

class IndexController extends SuController  {
	public function __construct()  {
		echo "including IndexController<Br />";
	}
	public function IndexAction() {
		$this->render('reg.html',array('name' => 'Fabien'));
	}
}