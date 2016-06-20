<?php
class BaseController extends Base
{
	//private  static $subpath;
	
	public static function shedule(array $subpath)
	{
		
		$key=array_shift($subpath);
		$instance=new static();
		if(method_exists($instance, $key))
		{
			$instance->$key();
		}
	}
}