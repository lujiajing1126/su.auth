<?php
function M($modelname)  {
	if(!class_exists('SuModel'))  {
		require_once './framework/Model.php';
	}
	$model = ucfirst(strtolower($modelname)).'Model';
	if(file_exists('./models/'.$model.PHPCS))  {
		require_once './models/'.$model.PHPCS;
		if(class_exists($model))  {
			return new $model;
		}
	}
}