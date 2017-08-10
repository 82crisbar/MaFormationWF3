<?php
//02-getter-setter-constructeur/exercice_membre.php

// Consignes : Au regard de la classe ci-dessous, créez un membre affectez-lui un pseudo et un email et affichez les informations : 

class Membre
{
	private $pseudo;
	private $email;
	
	public function getPseudo(){
		return $this -> pseudo;
	}
	
	public function setPseudo($pseudo){
		if(is_string($pseudo)){
			$this -> pseudo = $pseudo; 	
		}
	}
	
	public function getEmail(){
		return $this -> email;
	}
	
	public function setEmail($email){
		if(is_string($email)){
			$this -> email = $email;
		}
	}
}
$membre = new Membre; 
$membre -> setPseudo('yakine');
$membre -> setEmail('yakine.hamida@evogue.fr');

echo 'Pseudo : ' . $membre -> getPseudo() . '<br/>' ;
echo 'Email : ' . $membre -> getEmail() . '<br/>';




