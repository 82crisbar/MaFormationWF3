<?php
//04-constante-static-self/maison.class.php

class Maison
{
	public $couleur = 'blanc'; // Appartient à l'objet
	public static $espaceTerrain = '500m2'; // Appartient à la classe
	private $nbPorte = 10; // Appartient à l'objet
	private static $nbPiece = 7; // Appartient à la classe
	const HAUTEUR = '10m'; // Appartient à la classe
	
	public function getNbPorte(){
		return $this -> nbPorte; 
	}
	
	public static function getNbPiece(){
		return self::$nbPiece;
	}
	
}
echo 'Terrain : ' . Maison::$espaceTerrain . '<br/>'; // OK ! J'accède à un élément de la classe par la classe. 
echo 'Pieces  : ' . Maison::getNbPiece() . '<br/>'; // OK ! J'accède à un élément private de la classe via un getter appartenant à la classe. 
echo 'Hauteur : ' . Maison::HAUTEUR . '<br/>'; // OK ! J'accède à un élément appartenant à la classe via la classe. 

//-------------------------
$maison = new Maison; 
echo 'Couleur : ' .  $maison  -> couleur  . ' <br/>'; // OK, j'accède à une propriété public via l'objet. 
//echo 'Terrain : ' . $maison -> espaceTerrain  . '<br/>'; // Erreur j'essaie d'accéder à une propriété appartenant à la classe par l'objet. 
//echo 'Nombre de porte : ' . $maison -> nbPorte . '<br/>'; // Erreur : private -> getter
echo 'Nombre de porte : ' . $maison -> getNbPorte() . '<br/>'; // OK j'accède à un élément appartenant à l'objet, et private via un getter appartenant à l'objet. 

/*
Commentaires : 
	Opérateurs : 
		$objet ->   : élement d'un objet à l'extérieur de la classe
		$this ->    : élément d'un objet à l'intérieur de la classe 
		Class::     : élément d'une classe à l'extérieur de la classe
		self::      : élément d'une classe à l'intérieur de la classe
	
	2 questions à se poser : 
		- Est-ce que l'élément est static ?
				-> Si oui ( Class::   / self::  ) 
					- Est-ce que je suis à l'intérieur ou à l'extérieur de la classe ?
						-> intérieur : self::
						-> exterieur : Class::
				
				-> Si non ($objet ->   /  $this ->  )
					- Est-ce que je suis à l'intérieur ou à l'extérieur de la classe ?
						-> intérieur : $this ->
						-> exterieur : $objet -> 


	Static signifie qu'un élément appartient à la classe. Pour y accéder on devra donc l'appeler par la classe (Class:: ou self::). Une propriété static peut être modifiée, et tous les objets qui suivront auront la nouvelle valeur (exemple : singleton).
	
	Const signifie qu'une propriété appartient à la classe et qu'elle ne peut pas être modifiée. 
*/














