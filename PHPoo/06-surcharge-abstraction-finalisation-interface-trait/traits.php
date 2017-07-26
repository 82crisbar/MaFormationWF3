<?php

//06-surcharge-abstraction-finalisation-interface-trait/traits.php 

// Attention : Le traits ne functionnent que depuis php5.4 

trait TPanier
{
    public function affichageProduit(){
        return 'Voici les produits dans le panier !';
    }
}

trait TMembre 
{
    public function affichageMembre(){
        return 'Voici le Membre !';
    }
}
class Site
{
    use TPanier;
    use TMembre;
    // OR -> // use TPanier, TMembre;
    // Cela e=importe le code present dans TPanier et TMembre


}
/*
COMMENTAIRES :
    -Le traits on ete inventé pour repousser l'heritage non multiple du PHP
    -Une classe peut herité d'une seule classe, mais elle peut importer plusieurs traits. 
    - Un trait peut importer une autre trait. 
    
*/