<?php 
Trait DebugTrait
{	
	/**
	 * Decoration for use Debug
	 * @param String $title
	 * @param string $var
	 */
	protected static function debug(String $title, $var="")
	{
		static $debug=null;
		if($debug == null)
		{
			$debug=Debug::getInstance();
		}
		if($debug != null)
		{
			$debug->out($title,$var);
		}
	}
}