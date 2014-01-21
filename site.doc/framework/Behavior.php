<?php
interface IBehavior  {
	public static function run();
}

class Behavior {
	public function __construct()  {
		if($DEBUG)
			echo "Behavior Class";
	}
}