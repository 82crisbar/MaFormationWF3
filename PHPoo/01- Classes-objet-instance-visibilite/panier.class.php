<?php

// 01- Classes-objet-instance-visibilite/panier.class.php
/*En objet :
	Variable = proprieté
	fonction = methode
*/

class Panier
{
	public $nbProduit;// Proprieté (default : NULL)
	
	//echo 'Bonjour ! '; // Erreur, tout le code des classes doit etre encapsulé dans des methodes (fonctions)
	
	public function ajouterProduit() {
		//Traitements de ma methode
		return 'Le produit a ete ajouté au panier ! ';
	}
	
	protected function retirerProduit(){
		return 'Le produit à été retiré du panier !';
	}
	private function affichagePanier(){
		return 'Voici le produits dans le panier ! ';
	}
} 	

//------------------------------------------------------------------------------------------
$panier = new Panier;
echo '<pre>';
var_dump($panier);
var_dump(get_class_methods($panier));
echo '</pre>';

// the var_dump tells that $panier its an object from the class panier, that is the first #1 object of thqt class and that that class has one property that is nbProduit.

/*object(Panier)#1 (1) { 
  ["nbProduit"]=>
  NULL
}*/

$panier->nbProduit = 5; // J'effecte la valeur 5 à la proprieté $nbProduit
echo 'Le nombre de produit dans le panier est : ' . $panier->nbProduit . ' ! <br />' ; // Me retourne la valeur affecté dans la proprieté $nbProduit de mon object.

echo 'Panier : ' . $panier -> ajouterProduit() . '<br />';// Works coz it's public

//echo 'Panier : ' . $panier -> retirerProduit() . '<br />'; // Return error coz it's protected

//echo 'Panier : ' . $panier -> affichagePanier() . '<br />';// return error coz its private

// en l'etat Seul les elements public sont accessibles... 

$panier2 = new Panier;

echo '<pre>';
var_dump($panier2);
echo '</pre>';

//La proprieté nbProduit de panier2 est NULL alors que celle de panier contient la valeur 5

/* 
Commentaires:
	- new est un mot clé qui permet de créer un objet d'une classe. On parle d'instaciacion.
	
	- Niveau de visibilité :
			--> public : Les elements sont accessibles de partout.
			--> protected : Les éléments son accessibles a l'interieur de la class ou ils sont été declarés et a l'interieur des classes heritieres.
			--> private : Les elements sont acccessibles UNIQUEMENT à l'interieur de la classe ou ils sont declarés.
*/			
			
































