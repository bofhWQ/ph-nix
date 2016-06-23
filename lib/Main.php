<?php
class Main extends Base
{
	
	public static function run()
	{
		
		session_start();
		MainController::shedule(['test']);
		self::debugDump();
		self::debugRegister();
	}	
}
