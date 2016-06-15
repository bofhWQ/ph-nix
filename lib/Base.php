<?php
class Base
{
	protected static $debug;
	protected $guid;
	
	
	public function __construct()
	{
		$this->guid=hash('sha256',get_class($this).time().mt_rand());
		$this->readConfig();
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
	/**
	 * Get Filename of Config File
	 * @return string
	 */
	private function getConfigFileName()
	{
		return dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.get_class($this).'.php';
	}
	
	/**
	 * Include Config-File
	 */
	private function readConfig()
	{
		$cf=$this->getConfigFileName();
		if(file_exists($cf))
		{
			include $cf;
		}
		if(!isset($config) || !is_array($config))
		{
			$config=array();
		}
		if($this->needConfigUpdate($config))
		{
			if(count($config) > 0)
			{
				$this->writeConfig($config);
			}
		}
		foreach($config as $key => $val)
		{
			$refClass = new ReflectionClass(get_class($this));
			$prop=$refClass->getProperty($key);
			$prop->setAccessible(true);
			$prop->setValue($this,$val);
		}
	}
	/**
	 * Look at included Config File, if all Parameter which are marked with @config 
	 * in the configfile. If not write new File
	 * @param array $cf
	 * @return boolean
	 */
	private function needConfigUpdate(Array &$cf)
	{
		$result=false;
		$refClass = new ReflectionClass(get_class($this));
		$properties= $refClass->getProperties();
		foreach($properties as $prop )
		{
			$comment=$prop->getDocComment();
			if(strpos ( $comment , '@config' ) !== false )
			{
				$key=$prop->getName();
				$configkeys[$key]=true;
			}	
		}
		$defaults=$refClass->getDefaultProperties();
		foreach($defaults as $key => $val)
		{
			if(isset($configkeys[$key]))
			{
				if(!isset($cf[$key]))
				{
					$cf[$key]=$val;
					$result=true;
				}
			}
		}
		return $result;
	}
	/**
	 * If needed write new config File
	 * @param String $out
	 * @param String $cf
	 */
	private function writeConfig(Array $config)
	{
		$cf=$this->getConfigFileName();
		$out="<?php\n".'$config='.var_export($config,true).';';
		file_put_contents($cf, $out, LOCK_EX);
	}
}