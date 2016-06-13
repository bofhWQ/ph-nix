<?php
class Singelton
{
	private  static $instance;

	static function getInstance()
	{
		if ( static::$instance === null )
		{

			static::$instance = new static();
		}
		return static::$instance();
	}
}