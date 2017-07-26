<?php
// 06-surcharge-abstraction-finalisation-interface-trait/surcharge.php 

// Surcharge (OVERRIDE) : Permet de modifier le comportement d'une methode héritée et d'y apporter des traitements supplementaires. 
// Surcharge != redefinition

class A 
{
    public function calcul(){
        return 10;
    }

}

class B extends A 
{
    public function calcul(){
        //return 15 (10 + 5); WHAT WE WANT TO OBTAIN!

        //return $this -> calcul() + 5; NO NO NO!!!!!!!!!!!! Ce la est recursif , car en utilisant $this-> la fonction fait donc appel à elle-même;

        return parent::calcul() + 5; // GOOD!!!!
        //return A::calcul() + 5;    // ALSO GOOD!!!!!
        // Avec le deux proposition ci-dessus ,On fait réellement appel a la methode de NOTRE PARENT (A) 
    }
}

/*
COMMENTAIRES :
    La surcharge est utile dans les cadre de l'heritage, car permet d'ajouter (modifier) des traitements dans une methode heritée.
    Par exemple, lorsque l'on travaille sur un CMS ou un FRAMEWORK, on a pas le droit de toucher aux fichiers du coeur de l'application , mais on peux heriter des certaines classes, et ppotentiellement modifier le traitements de certaines methodes

*/