<?php
//06-surcharge-abstraction-finalisation-interface-trait/surcharge.php

// Surcharge (Override) : Permet de modifier le comportement d'une méthode héritée et d'y apporter des traitements supplémentaires.
// Surcharge != redéfinition

class A
{
	public function calcul(){
		return 10;
	}
}

class B extends A
{
	
	public function calcul(){
		//return 15 (10 + 5)
		
		//return $this -> calcul() + 5; // Cela est récursif, car en utilisant $this -> la fonction fait donc appel à elle-même. 
		//return self::calcul() + 5;
		
		return parent::calcul() + 5;
		//return A::calcul() + 5;
		// Avec les deux propositions ci-dessus, on fait réellement appel à la méthode de NOTRE PARENT (class A)
	}
}

/*
Commentaires : 
	La surcharge est très utile dans le cadre de l'héritage, car permet d'ajouter (modifier) des traitements dans une méthode héritée. 
	Par exemple, lorsqu'on travaille sur un CMS ou un FRAMEWORK, on n'a pas le droit de toucher aux fichiers du coeur de l'application, mais on peut hériter de certaines classes, et potentiellement modifier les traitements de certaines méthodes. 
*/











