<?php
//05-heritage/Animal.php

class Animal
{
	protected function deplacement(){
		return ' Je me deplace ! ';
	}
	
	public function manger(){
		return 'Je mange !';
	}
}
//---------------------------------
class Elephant extends Animal
{
	public function quiSuisJe(){
		return 'Je suis un elephant et ' . $this -> deplacement() . '!';
		// Je peux appeller la methode deplacement avec $this -> car on herite egalement des methodes protected. 
	}
}
class Chat extends Animal
{
	public function quiSuisJe(){
		return 'Je suis un chat ! ';
	}
	
	public function manger(){
		return 'Je mange peu... car je suis un chat ! ';
		// La fonction manger () existe déjà dans la classe mére (Animal)... Mais puisque mon entité Chat a des càractéristiques particuliéres (manger peu) on peut REDEFINIR une methode herite.
	}
}
//----------------------------------
$eleph = new Elephant;
echo 'Elephant : ' . $eleph-> quiSuisJe() . '<br />';
echo 'Elephant : ' . $eleph-> manger() . '<br />';

$chat = new Chat;
echo 'Chat : ' . $chat-> quiSuisJe() . '<br />';
echo 'Chat : ' . $chat-> manger() . '<br />';

/*
L'HERITAGE est un de fondaments de la ^proigrammation orientée Objet.
Lorsqu'une classe herite d'une autre classe, elle importe tout le code.Les elements sont donc appelles avec $this->(à l'interieur de la classe)

Redefinition : Une classe enfant heritiere peut modifier ENTIEREMENT le comportement d'une methode dont elle a heritée.Lors de l'execution, l'interpreteur va dans un premiere temp regarder dans la classe enfant si la methode existe... puis dans la classe mere.

REDEFINITION != SURCHARGE (Voir chapitre 6)

*/