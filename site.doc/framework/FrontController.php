<?php
require_once './framework/conf/const.php';
require_once './framework/conf/conventions.php';
require_once './framework/Controller.php';
require_once './framework/Behavior.php';
require_once './framework/ExceptionHandler.php';
require_once './framework/functions.class.php';

//load global constants from user-define config file.
if(file_exists('./conf/config.php'))  {
	require_once './conf/config.php';
}

set_exception_handler('SuException');

class SuFrontController  {
	private static $_instance;
	private $controller;
	private $action;
	private $behaviors = array();
	private $i = 0;
	public function __construct()  {
		if($DEBUG)
			echo "including FrontController<Br \>";
		$this->ins = null;
	}
	public static function getInstance()  {
		if(!(self::$_instance instanceof self))  {
			self::$_instance = new self;
		}
		return self::$_instance;
	}
	public function registerBehavior($bname)  {
		if(file_exists('./behaviors/'.$bname.'Behavior.php'))  {
			//echo "exist!";
			$this->behaviors[$this->i] = $bname.'Behavior';
			//var_dump($this->behaviors);
			$this->i++;
		}
	}
	private function predispatch()  {
		//var_dump($this->behaviors);
		if(count($this->behaviors) != 0)  {
			for($j=0;$j<count($this->behaviors);$j++)  {
				require_once './behaviors/'.$this->behaviors[$j].'.php';
				$tmpbehavior = new $this->behaviors[$j];
				if(!($tmpbehavior instanceof IBehavior))  {
					echo "the behavior class is not implements from IBehavior interface.";
				}
				$tmpbehavior::run();
			}
		}
	}
	public function dispatch()  {
		if(array_key_exists('controller',$_GET))  {
			$this->controller = ucfirst(strtolower($_GET['controller']))."Controller";
			if(array_key_exists('action',$_GET))  {
				$this->action = strtolower($_GET['action'])."Action";
			}
		}
		$controller_file = './controllers/'.$this->controller.'.php';

		if($this->controller != null || $this->controller != '')  {
			if(file_exists($controller_file))  {
				require_once $controller_file;
			}
			else  {
				throw new Exception("Error Controller Name", 1);
			}
		}	
		if($DEBUG)  {
			echo $this->controller;
			echo $this->action;
		}
		// preDispatch
		$this->predispatch();
		if(class_exists($this->controller))
			$controller = new $this->controller();
		else
			throw new Exception("Controller class no found...", 1);

		if(method_exists($controller, $this->action))
			$tmp = $this->action;
		else
			throw new Exception("Error Action Name", 1);
		$controller->$tmp();
	}
}