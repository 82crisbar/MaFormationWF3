<?php
//06-surcharge-abstraction-finalisation-interface-trait/abstraction.php

abstract class Joueur
{
	public function seConnecter(){
		return $this -> etreMajeur();
	}
	
	abstract public function etreMajeur(); // On fonction abstraite n'a pas corps !
}
//--------------
class JoueurFr extends Joueur
{
	public function etreMajeur(){
		return 18;
	}	
}
//------------------------
class JoueurUs extends Joueur
{
	public function etreMajeur(){
		return 21;
	}
}
//------------
//$joueur = new Joueur; 

/*
Commentaires: 
	 - Une classe abstraite ne peut pas être instanciée
	 - Les méthodes abstraites n'ont pas de contenu
	 - Les méthodes abstraites sont OBLIGATOIREMENT dans une classe abstraite
	 - Lorsqu'on hérite d'une classe abstraite on DOIT OBLIGATOIREMENT redéfinir les méthodes abstraites
	 - Une classe abstraite peut contenir des méthodes normales.
	 
	 Le développeur qui écrit une classe abstraite est souvent au coeur de l'application. Il va obliger les autres dev' à redéfinir des méthodes. CECI EST UNE BONNE CONTRAINTE ! 
*/











