<?php

/**
 * Class Singelton stellt sicher, dass es nur eine Instance gibt
 *
 * Warnung:
 * Die Verwendung des Singelton ist ein Antipattern, wenn es nur eine Instance gibt, warum dann keine Klasse mit nur
 * statischen Funktionen und statischen Variablen verwenden?
 * 
 * Aber: Bei statische Funktionen gibt es keine Möglichleit über Vererbung einen Standardkonstruktor aufzurufen um z.B. die 
 * Konfig zu lesen 
 */
Trait Singleton 
{
	

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