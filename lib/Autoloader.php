<?php
class Autoloader {
	public function __construct() {
		
		
		//spl_autoload_register(array($this, 'loader'));
	}
	/*
	private function loader($className) {
		include (__DIR__.DIRECTORY_SEPARATOR.$className . '.php');
	}
	*/
}