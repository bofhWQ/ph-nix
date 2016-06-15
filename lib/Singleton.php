<?php
class Singleton extends Base
{
	protected  static $instance;

	static function getInstance()
	{
		if ( static::$instance === null )
		{

			static::$instance = new static();
		}
		return static::$instance;
	}
}