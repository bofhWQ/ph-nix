<?php 
class MainController extends BaseController
{
	/**
	 * @config
	 * @var String
	 */
	private static $greeting="Hello World";
	/**
	 * @config
	 * @var String
	 */
	private static $test="Hello Tester";
	/**
	 * @config
	 * @var array
	 */
	private static $test1=["test"=>'Hello',"test1"=>'World'];
	
	public function test()
	{
		echo static::$greeting; 
	}
}