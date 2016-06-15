<?php
class CompressedArray extends ArrayObject
{
	public function __construct()
	{
		super(array());
	}
	function offsetSet($key,$value) 
	{ 
		$this[$key] = gzcompress($value,9); 
	}
	
	function &offsetGet($key) 
	{ 
		return gzuncompress($this[$key]); 
	}
}