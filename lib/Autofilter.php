<?php
class AutoFilter
{
	public $filter;
	public $args=array();
	
	public function __construct(IFiler $filter, Array $args)
	{
		$this->filter=$filter;
		$this->args=$args;
	}
	
	public function is()
	{
		$this->filter::is($args);
	}
	
}