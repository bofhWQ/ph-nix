<?php
class Base
{
	protected $config;
	public function __construct()
	{
		 if(file_exists(dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.__CLASS__))
		 {
		 	include dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.__CLASS__.'php';
		 	$this->config=$config;
		 }
		 		
	}
	
	
}