<?php

//01-classes-objet-instance-visibilite/Panier.class.php
/* En objet : 
	Variable = Propriété
	Fonction = Méthode
*/

class Panier
{
	public $nbProduit; // Propriété (défaut : NULL)
 
	//echo 'Bonjour ! ';  // Erreur, tout le code des classes doit être encapsulé dans des méthodes (fonctions)
	
	public function ajouterProduit(){
		// Traitements de ma méthode
		return 'Le produit a été ajouté au panier ! '; 
	}
	
	protected function retirerProduit(){
		return 'Le produit a été retiré du panier !'; 
	}
	
	private function affichagePanier(){
		return 'Voici les produits dans le panier !'; 
	}
} 
//---------------------------
$panier = new Panier; 
echo '<pre>'; 
var_dump($panier);
var_dump(get_class_methods($panier));
echo '</pre>';

$panier -> nbProduit = 5; // J'affecte la valeur 5 à la propriété $nbProduit; 
echo 'Le nombre de produit dans le panier est : ' . $panier -> nbProduit . ' ! <br/>';  // Me retourne la valeur affectée dans la propriété $nbproduit de mon objet. 

echo 'Panier : ' . $panier -> ajouterProduit() . ' <br/>';

//echo 'Panier : ' . $panier -> retirerProduit() . ' <br/>';
//echo 'Panier : ' . $panier -> affichagePanier() . ' <br/>';

// En l'état, seuls les éléments public sont accessibles...

$panier2 = new Panier; 
echo '<pre>'; 
var_dump($panier2);
echo '</pre>';
// La propriété nbProduit de panier2 est NULL, alors que celle de panier contient la valeur 5. 


/*
Commentaires : 
	- new est un mot clé qui permet de créer un objet d'une classe. On parle d'instanciation. 
	
	- On peut créer plusieurs objets d'une même classe.
	
	- Niveau de visibilité : 
		--> public : Les éléments sont accessibles de pratout
		--> protected : Les éléments sont accessible à l'intérieur de class où ils ont été déclarés et à l'intérieur des classes héritières
		--> private : Les éléments sont accessibles UNIQUEMENT à l'intérieur de la classes où ils sont déclarés. 
*/






