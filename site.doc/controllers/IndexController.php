<?php
class IndexController extends SuController  {
	public function __construct()  {
		if($DEBUG)
			echo "including IndexController<Br />";
	}
	public function indexAction() {
		$testmodel = M('test');
		$sql = $testmodel->getBuilder()->select('id', 'name')
		->from('testdb');
		echo $sql;
		$this->render('reg.html',array('name' => 'Fabien'));
	}
}