<?php
class Main extends Base
{
	public static function run()
	{
		
		MainController::shedule(['test']);
		self::debugDump();
		self::debugRegister();
		print_r($_SESSION);
	}	
}
