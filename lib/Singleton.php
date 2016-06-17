<?php

/**
 * Class Singelton stellt sicher, dass es nur eine Instance gibt
 *
 * Warnung:
 * Die Verwendung des Singelton ist ein Antipattern, wenn es nur eine Instance gibt, warum dann keine Klasse mit nur
 * statischen Funktionen und statischen Variablen verwenden?
 */
class Singleton extends Base
{
	

	protected function __construct()
	{
		//Thou shalt not construct that which is unconstructable!
	}

	protected function __clone()
	{
		
	}
	
	public static function getInstance()
	{
		static $instance=null;
		if ($instance === null) {
			$instance = new static();
		}
		return $instance;
	}
}