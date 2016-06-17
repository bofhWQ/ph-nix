<?php
class Base
{
	protected static $debug;
	protected $guid;
	
	

	public function __construct()
	{
		init();
	}

	private function init()
	{
		$this->guid=hash('sha256',get_class($this).time().mt_rand());
		$cf=new ConfigFile();
		$cf->readConfig($this);
	}
	/**
	 * Decoration for use Debug
	 * @param String $title
	 * @param string $var
	 */
	protected function debug(String $title, $var="")
	{
		if(static::$debug == null)
		{
			static::$debug=Debug::getInstance();
		}
		if(static::$debug != null)
		{
			static::$debug->out($title,$var);
		}
	}
	
	protected function toSession(String $key,$value)
	{
		
	}

}