<?php 
Trait DebugTrait
{	
	/**
	 * Decoration for use Debug
	 * @param String $title
	 * @param string $var
	 */
	protected static function debug(String $title, $var="", $fulltracedump=false)
	{
		static $debug=null;
		if($debug == null)
		{
			$debug=Debug::getInstance();
		}
		if($debug != null)
		{
			$debug->out($title,$var,$fulltracedump);
		}
	}
	
	protected static function debugDump()
	{
		static $debug=null;
		if($debug == null)
		{
			$debug=Debug::getInstance();
		}
		if($debug != null)
		{
			$debug->dump();
		}
	}
	
	protected static function debugRegister()
	{
		static $debug=null;
		if($debug == null)
		{
			$debug=Debug::getInstance();
		}
		if($debug != null)
		{
			$debug->showRegister();
		}
	}
}