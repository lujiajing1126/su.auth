<?php
require_once 'framework/FrontController.php';

//get instance of FrontController
$frontcontroller = SuFrontController::getInstance();

//register custom Behaviors
$frontcontroller->registerBehavior('PreAuth');

//dispatch the request
$frontcontroller->dispatch();