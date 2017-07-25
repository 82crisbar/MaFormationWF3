<?php 

//02-getter-setter-constructer/Etudiant.class.php

class Etudiant
{
	private $prenom;
	
	public function __construct($argument){
		$this-> setPrenom($argument);
	}
	
	public function getPrenom(){
		return $this-> prenom;
	}
	public function setPrenom($prenom){
		$this-> prenom = $prenom;
	}
}
//------------------------------------------------------
$etudiant = new Etudiant('Cristian');

echo $etudiant->getPrenom();

/*
COMMENTAIRE:
	-La methode magique  __construct() s'execute automatiquement au moment de l'instanciacion.
	-Il n'est pas obligatoire de la declarer en theorie on la declare que si on a besoin d'automatiser un traitement.
	- On l'utilise souvent pour deployer automatiquement notre application (instance sans heritage par example voir chapitre 5)
	-Toutes les methodes magiques s'ecrivent avec le double underscore ( __ )
*/	