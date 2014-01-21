<?php
class IndexController extends SuController  {
	public function __construct()  {
		if($DEBUG)
			echo "including IndexController<Br />";
	}
	public function IndexAction() {
		$this->render('reg.html',array('name' => 'Fabien'));
	}
}