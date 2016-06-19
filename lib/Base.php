<?php
class Base
{
	use DebugTrait;
	protected $guid;
	
	

	public function __construct()
	{
		$this->init();
	}

	private function init()
	{
		$this->guid=hash('sha256',get_class($this).time().mt_rand());
		$cf=ConfigFile::getInstance();
		$cf->readConfig($this);
	}
	
	
	
	protected function toSession(String $key,$value)
	{
		
	}

}