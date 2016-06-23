<?php
class IPFilter extends Base implements IFilter
{
	public static function is($val)
	{
		$result=false;
		self::debug("SERVER_ADDR",$_SERVER['SERVER_ADDR']);
		self::debug("Looking for",$val);
		self::debug("preg_match",preg_match("/^$val/",$_SERVER['SERVER_ADDR']));
		if(preg_match("/^$val/",$_SERVER['SERVER_ADDR']) == 1)
		{
			$result=true;
		}
		return $result;
	}
}