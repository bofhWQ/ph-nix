<?php 
class DebugRegisterObject
{
	public $file;
	public $title;
	public $enabled;
	public $counter;
	
	public function __construct(String $file, String $title)
	{
		$this->file=$file;
		$this->title=$title;
		$this->enabled=false;
		$this->counter=1;
	}
	
	
}
