<?php
class HostFilter implements IFilter
{
	public static function is($val)
	{
		$result=false;
		if (preg_match("/^$val/",$_SERVER['SERVER_NAME']) == 1)
		{
			$result=true;
		}
		return $result;
	}
}