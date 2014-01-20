<?php
require_once '../../su.prog/phplib/composer/vendor/autoload.php';
class SuController  {
	function __construct(){
		echo "including SuController";
	}
	public function render($page,$args)  {
		$loader = new Twig_Loader_Filesystem('./templates');
		$twig = new Twig_Environment($loader);
		echo $twig->render($page, $args);
	}
}