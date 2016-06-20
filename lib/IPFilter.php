<?php
class IPFilter implements IFilter
{
	public static function is(Array $params)
	{
		$result=false;
		$data=explode('.',$_SERVER['SERVER_ADDR']);
		foreach($params as $val)
		{
			if(preg_match('/^$val/',$_SERVER['SERVER_ADDR']) == 1)
			{
				$result=true;
				break;
			}
		}
		return $result;
	}
}