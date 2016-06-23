<?php 
class DebugRegister extends ArrayObject
{
	public function __construct()
	{
		//ToDo: Restore from Session
		parent::__construct();
		
	}
	
	public static function getInstance()
	{
		if (!isset($_SESSION['DebugRegister']) || $_SESSION['DebugRegister'] === null) 
		{
			$_SESSION['DebugRegister'] = new static();
		}
		return $_SESSION['DebugRegister'];
	}
	
	public function register(String $file, String $title)
	{
		$found=false;
		if(isset($this[$file]))
		{
			foreach($this[$file] as $object)
			{
				if( $object->title == $title)
				{
					$object->counter++;
					$found=true;
					break;
				}
			}
		}
		if(!$found)
		{
			$object=new DebugRegisterObject($file,$title);
			$this[$file][]=$object;
		}
		
	}
	
}