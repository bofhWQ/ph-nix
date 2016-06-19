<?php
class ConfigFile
{
	use DebugTrait;
	use Singleton;
	/**
	 * @config
	 * @var boolean $write if set write configFile
	 */
	private $write=true;
	
	public function __construct()
	{
		$this->readConfig($this);
	}
	/**
	 * Get Filename of Config File
	 * @return string
	 */
	private function getConfigFileName($object)
	{
		return $this->getConfigDir($object).get_class($object).'.php';
	}
	
	private function getConfigDir($object)
	{
		return dirname(__DIR__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR;
	}
	
	private function getStateConfigFileName($object)
	{
		$result='';
		$state=Enviroment::getState();
		if($state !== '' )
		{
			$result=$this->getConfigDir($object).DIRECTORY_SEPARATOR.$state.DIRECTORY_SEPARATOR.get_class($object).'.php';
		}
		return $result;
	}
	/**
	 * Include Config-File
	 */
	public function readConfig($object)
	{
		
				
		$cf=$this->getConfigFileName($object);
		if(file_exists($cf))
		{
			include $cf;
		}
		if(!isset($config) || !is_array($config))
		{
			$config=array();
		}
		print_r($object);
		echo 'get_called_class() = '.get_class($object);
		if($object !== $this && get_class($object) != 'Enviroment' )
		{
			$scf=$this->getStateConfigFileName($object);
			
			if(file_exists($scf))
			{
				$configDefault=$config;
				include $scf;
				foreach($config as $key => $val)
				{
					$configDefault[$key]=$val;
				}
				$config=$configDefault;
			}
			
		}
		
		if($this->write && $this->needConfigUpdate($config,$object))
		{
			
			if(count($config) > 0)
			{
				$this->writeConfig($config,$object);
			}
		}
		
		foreach($config as $key => $val)
		{
			$refClass = new ReflectionClass(get_class($object));
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
	private function needConfigUpdate(Array &$config, $object)
	{
		$result=false;
		$refClass = new ReflectionClass(get_class($object));
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
				if(!isset($config[$key]))
				{
					$config[$key]=$val;
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
	private function writeConfig(Array $config,$object)
	{
		$cf=$this->getConfigFileName($object);
		$out="<?php\n".'$config='.var_export($config,true).';';
		file_put_contents($cf, $out, LOCK_EX);
	}
}