<?php
class Debug 
{
	use Singleton;
	const FORMAT_HTML='html';
	const FORMAT_TEXT='text';
	
	/**
	 * @config
	 * @var unknown
	 */
	private $format=Debug::FORMAT_HTML;
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
	
	private function preFormat(String $text)
	{
		if($this->format == static::FORMAT_HTML)
		{
		$result= '<pre>'.$text.'</pre>';
		}
		else
		{
			$result=$text;
		}
		return $result;
	}
	
	private function getBackTrace()
	{
		$result=debug_backtrace();
		while(isset($result[0]['class']) && $result[0]['class'] == 'Debug' )
		{
			array_shift($result);
		}
		while(isset($result[0]['function']) && $result[0]['function'] == 'debug' )
		{
			array_shift($result);
		}
		return $result;
	}
	public function out(String $title, $var="" , $fullbacktrace =false)
	{
		if($this->enable)
		{
			$backtrace=$this->getBacktrace();
			$text='file :'.$backtrace[0]['file'].' Line :'.$backtrace[0]['line'].$this->getNL();
			$text.=$title.$this->getNL();
			$text.=print_r($var,true).$this->getNL();
			
			if($fullbacktrace)
			{
				$text.='Backtrace'.$this->getNL();
				$text.='+++++++++'.$this->getNL();
				$text.=print_r($backtrace,true).$this->getNL();
			}
			$text.='---------------------------------------------------------------------'.$this->getNL();
			if($this->file == '')
			{
				//$buffer[]=$text;
				echo $this->preFormat($text);
			}
			else
			{
				echo $this->preFormat($text);
			}	
		}
	}
	
}