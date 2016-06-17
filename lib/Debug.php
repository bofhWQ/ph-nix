<?php
class Debug extends Singleton
{
	const FORMAT_HTML='html';
	const FORMAT_TEXT='text';
	
	/**
	 * @config
	 * @var unknown
	 */
	private $format=static::FORMAT_HTML;
	/**
	 * @config
	 * @var unknown
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
				$buffer[]=$text;
			}
			else
			{
			
			}	
		}
	}
	
}