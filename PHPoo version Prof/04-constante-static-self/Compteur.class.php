<?php
//04-constante-static-self/Compteur.class.php

class Compteur
{
	public static $nbInstanceClass = 0;
	public $nbInstanceObjet = 0; 
	
	public function __construct(){	
		self::$nbInstanceClass ++; 
		$this -> nbInstanceObjet ++; 	
	}
}
//-----------------
$c1 = new Compteur; // $nbInstanceClass = 1   // $nbInstanceObjet = 1
$c2 = new Compteur; // $nbInstanceClass = 2  // $nbInstanceObjet = 1
$c3 = new Compteur; // $nbInstanceClass = 3  // $nbInstanceObjet = 1
$c4 = new Compteur; // $nbInstanceClass = 4  // $nbInstanceObjet = 1