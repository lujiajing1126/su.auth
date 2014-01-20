<?php
require_once 'framework/FrontController.php';
//require_once 'controllers/IndexController.php';

$frontcontroller = SuFrontController::getInstance();
$frontcontroller->dispatch();