<?php

//02-getter-setter-constructer/Homme.class.php

class Homme
{
	private $prenom; //Proprieté private
	private $nom;	//Proprieté private
	
	public function getPrenom(){
		return $this -> prenom;
	}
	
	public function setPrenom($arg){
		if(!empty($arg) && strlen($arg)> 3 && strlen($arg) < 20 && is_string($arg)){
			$this -> prenom = $arg;
		}
		else{
			return false;
		}
	}
}
//----------------------------------------------
$homme = new Homme;
//$homme -> prenom = 'Cristian'; // ERROR: La proprieté $prenom est private et je n'ai pas acces a l'exterieur de la classe.

$_POST[('prenom')] = 'Cristian';
$homme->setPrenom($_POST['prenom']);
echo 'prenom :' .$homme->getPrenom(); // WORKS!!!

/*
Commentaires:
	Pourquoi faire des GETTERS et des SETTERS?
		-Le php est un langage qui ne type pas ses variables. Il faut donc constantement verifier l'integrité des celles-ci.Donc mettre une proprieté en private ,et créer les getters et les setters permet de verifier une seule fois l'integrité des donnés.
		-Les developpeur qui voudrà affecter une valeur DEVRA obligatoirement passer par le setter !!!
		==> CECI EST UNE BONNE CONTRAINTE!
		
	$this represente l'objet en course de manipulation.

		Setter : Affecter une valeur 
		Getter : Recuperer la valeur 
		
	Nous aurons autant de Getter/setter que de propprieté privée!
*/	