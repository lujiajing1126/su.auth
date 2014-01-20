<?php
class SuFrontController  {
	private static $_instance;
	private $controller;
	private $action;
	public function __construct()  {
		echo "including FrontController<Br \>";
		$this->ins = null;
	}
	public static function getInstance()  {
		if(!(self::$_instance instanceof self))  {
			self::$_instance = new self;
		}
		return self::$_instance;
	}
	public function test()  {
		echo "test!~";
	}
	public function dispatch()  {
		if(array_key_exists('controller',$_GET))  {
			$this->controller = ucfirst(strtolower($_GET['controller']))."Controller";
			if(array_key_exists('action',$_GET))  {
				$this->action = strtolower($_GET['action'])."Action";
			}
		}
		$controller_file = './controllers/'.$this->controller.'.php';
		//echo $controller_file;
		if(file_exists($controller_file))  {
			require_once $controller_file;
		}
		echo $this->controller;
		echo $this->action;
		$controller = new $this->controller();
		$tmp = $this->action;
		$controller->$tmp();
	}
}