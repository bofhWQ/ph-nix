<?php 
class MainController extends BaseController
{
	/**
	 * @config
	 * @var unknown
	 */
	private static $greeting="Hello World";
	/**
	 * @config
	 * @var unknown
	 */
	private static $test="Hello Tester";
	/**
	 * @config
	 * @var unknown
	 */
	private static $test1=["test"=>'Hello',"test1"=>'World'];
	
	public function test()
	{
		echo static::$greeting; 
	}
}