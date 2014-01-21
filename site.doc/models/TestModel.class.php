<?php
Class TestModel extends SuModel  {
	public function __construct(){
		parent::__construct();
	}
	public function say()  {
		echo "iamtestmodel";
	}
}