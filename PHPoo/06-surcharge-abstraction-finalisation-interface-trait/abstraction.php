<?php

//06-surcharge-abstraction-finalisation-interface-trait/abstraction.php 

abstract class Joueur
{
    public function seConnecter(){
        return $this -> etreMajeur();
    }

    abstract public function etreMajeur(); // On fonction abstraite n'à pas de corps!

}
//---------------------------
class JoueurFr extends Joueur
{
    public function etreMajeur(){
        return 18;
    }
}
//-------------------------
class JoueurUsa extends Joueur
{
     public function etreMajeur(){
        return 21;
     }    
}
//----------------------------
//$joueur = new Joueur; // NO xce que il est abstract

/*
COMMENTAIRES : 
    - Une classe abstraite ne peut pas etre instanciée 
    - Les methodes abstraites n'ont pas de contenu 
    - Les methodes abstraites sont OBLIGATORIEMENT dans une classe abstraite
    - Lorsqu'on herite d'une classe abstraite on DOIT OBLIGATORIEMENT redefinir les methodes abstraites. 
    - Une classe abstraite peut contenir de methodes normales
    
    Le developpeur qui ecrit une classe abstraite est souvent au coeur de l'application. Il va obliger les autres developpeurs à redefinir des methodes. 
    CECI EST UNE BONNE CONTRAINTE!
*/