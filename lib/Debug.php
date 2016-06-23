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
	
	private $register;
	
	public function __construct()
	{
		//parent::__construct();
		$buffer=new CompressedArray();
		$this->register=DebugRegister::getInstance();
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
		/*
		while(isset($result[0]['function']) && $result[0]['function'] == 'debug' )
		{
			array_shift($result);
		}
		*/
		return $result;
	}
	
	private function appendToFile(String $text)
	{
		$fh=fopen($this->file,'a+');
		if($fh)
		{
			fwrite($fh,$text);
			fclose($fh);
		}
	}
	
	public function out(String $title, $var="" , $fullbacktrace =false)
	{
		if($this->enable)
		{
			$backtrace=$this->getBacktrace();
			$this->register->register($backtrace[0]['file'],$title);
			$text='file :'.$backtrace[0]['file'].' Line :'.$backtrace[0]['line'].$this->getNL();
			$text.=$title.$this->getNL();
			$text.=print_r($var,true).$this->getNL();
			
			if($fullbacktrace)
			{
				$text.='Backtrace'.$this->getNL();
				$text.='+++++++++'.$this->getNL();
				$text.=print_r($backtrace,true).$this->getNL();
			}
			$text.='----------------------------------------------------------------------------------------'.$this->getNL();
			if($this->file == '')
			{
				$this->buffer[]=$text;
			}
			else
			{
				$this->appendToFile($this->preFormat($text));
			}	
		}
	}
	
	
	public function dump()
	{
		foreach($this->buffer as $val)
		{
			echo $this->preFormat($val);
		}
	}
	
	public function showRegister()
	{
		echo $this->preFormat(print_r($this->register,true));
	}
}