<?php
class Base
{
	protected $config;
	public function __construct()
	{
		$cf=dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.get_class($this).'.php';	
		 if(file_exists($cf))
		 {
		 	include $cf;
		 	$this->config=$config;
		 }	
	}
}