<?php 
class DevFilter
{
	/**
	 * @config
	 * @var array
	 */
	protected static $filters=array();
	
	static function isDev()
	{
		$result=false;
		foreach(self::$filters as $filter)
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