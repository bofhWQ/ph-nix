<?php 
class DebugRegister extends ArrayObject
{
	use Singleton;
	public function __construct()
	{
		//ToDo: Restore from Session
		parent::__construct();
		$_SESSION['DebugRegister']=$this;
	}
	
	public function register(String $file, String $title)
	{
		$found=false;
		foreach($this as $object)
		{
			if( $object->file == $file && $object->title == $title)
			{
				$object->counter++;
				$found=true;
				break;
			}
		}
		if(!$found)
		{
			$object=new DebugRegisterObject($file,$title);
			$this[]=$object;
		}
		
	}
	
}