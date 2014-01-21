<?php
require_once '../../su.prog/phplib/composer/vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader);

echo $twig->render('reg.html', array('name' => 'Fabien'));
