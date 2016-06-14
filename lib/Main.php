<?php
class Main extends Base
{
	public static function run()
	{
		//ToDo: define sollte als Klassenkonstante in ein Konfigfile ausgelagert werden!
		
		define('CLASS_DIR', 'lib/');
		set_include_path(CLASS_DIR.PATH_SEPARATOR.get_include_path());
		spl_autoload_register();
		
		MainController::shedule(['test']);
	}	
}
