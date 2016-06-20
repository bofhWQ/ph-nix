<?php 
class DevFilter
{
	/**
	 * @config
	 * @var array
	 */
	protected $filters=array();
	
	static function isDev()
	{
		$result=flase;
		foreach($filters as $filter)
		{
			if($filter::is())
			{
				$result=true;
				break;
			}
		}
		return $result;
	}
}