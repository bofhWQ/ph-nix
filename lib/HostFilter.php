<?php
class HostFilter implements IFilter
{
	public static function is(Array $params)
	{
		$result=false;
		$data=explode('.',$_SERVER['SERVER_NAME']);
		foreach($params as $val)
		{
			if ($data[0] == $val)
			{
				$result=true;
				break;
			}
		}
		return $result;
	}
}