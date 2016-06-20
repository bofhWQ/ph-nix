<?php
class Debug 
{
	use Singleton;
	const FORMAT_HTML='html';
	const FORMAT_TEXT='text';
	
	/**
	 * @config
	 * @var String
	 */
	private $format=Debug::FORMAT_HTML;
	/**
	 * @config
	 * @var String
	 */
	private $file='';
	
	/**
	 * @config
	 * @var boolean if false, debug is globally disabled
	 */
	private $enable=true;
	
	private $buffer;
	
	public function __construct()
	{
		//parent::__construct();
		$buffer=new CompressedArray();
		
	}
	
	private function getNL()
	{
		$result="\n";
		if($this->format == static::FORMAT_HTML)
		{
			$result="<br>\n";
		}
		return $result;
	}
	
	public function out(String $title, $var="" )
	{
		if($this->enable)
		{
			
			$text=$title.$this->getNL();
			$text.=print_r($var,true).$this->getNL();
			$text.='---------------------------------------------------------------------';
			if($this->file == '')
			{
				//$buffer[]=$text;
				echo $text;
			}
			else
			{
				echo $text;
			}	
		}
	}
	
}