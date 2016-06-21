<?php
class AutoFilter
{
	public $filter;
	public $args=array();
	
	public function __construct(IFilter $filter, Array $args)
	{
		$this->filter=$filter;
		$this->args=$args;
	}
	
	public function is()
	{
		if (isset($this->filter))
		{
			$currentFilter=$this->filter;
			$currentFilter::is($this->args);
		}
	}
	
}