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