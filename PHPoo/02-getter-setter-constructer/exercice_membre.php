<?php 

//02-getter-setter-constructer/exercice_membre.php

// Consignes : Au regard de la classe ci-dessus , créez un membre affectez lui un pseudo et un email et affichez les informations :

class Membre
{
	private $pseudo;
	private $email;
	
	public function getPseudo(){
		return $this -> pseudo;
	}
	
	public function setPseudo($arg){
		if(is_string($arg)){
			$this -> pseudo = $arg;
		}
		else{
			return false;
		}
	}
	
	public function getEmail(){
		return $this -> email;
	}
	
	public function setEmail($email){
		if(is_string($email)){
			$this -> email = $email;
		}
		else{
			return false;
		}
	}
}	
	
	$membre = new Membre;
	
	$membre ->setPseudo('Cristian');
	$membre ->setEmail('cristiansirch@yahoo.it');
	
	echo 'pseudo :' . $membre->getPseudo() . '<br />';
	echo 'email :' . $membre->getEmail() . '<br />';