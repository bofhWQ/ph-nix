<?php
class Controller extends Base
{
	private  $subpath;
	
	public static function shedule(array $subpath)
	{
		$this->subpath=$subpath;
		$key=array_unshift($this->subpath);
		if(method_exists($this, $key))
		{
			$this->$key();
		}
	}
}