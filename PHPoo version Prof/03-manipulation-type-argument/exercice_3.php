<?php
//03-manipulation-type-argument/exercice3.php

class Vehicule
{
	private $litreEssence; // 5 contenu à un instant T
	private $reservoir; // 50 capacité max du réservoir
	
	public function getLitreEssence(){
		return $this -> litreEssence;
	}
	public function setLitreEssence($litre){
		$this -> litreEssence = $litre;
	}
	
	public function ge  tReservoir(){
		return $this -> reservoir;
	}
	public function setReservoir($litre){
		$this -> reservoir = $litre;
	}
}
class Pompe
{
	private $litreEssence; // 800 contenu à un instant T
	
	public function getLitreEssence(){
		return $this -> litreEssence;
	}
	public function setLitreEssence($litre){
		$this -> litreEssence = $litre;
	}
	
	public function fairePlein(Vehicule $v){
		// on stocke dans une variable la quantité nécessaire pour faire le plein dans le véhicule (soit 50 - ce qu'il y a déjà)
		$besoin = $v -> getReservoir() - $v -> getLitreEssence();  // 45
		
		//Modifier le contenu de ma pompe passant de 800 à 755 L (soit 800 - ce dont le véhicule a besoin) 
		$this -> setLitreEssence($this -> getlitreEssence() - $besoin );
		
		// Modifier le contenu de mon véhicule passant de 5 à 50L (soit ce qu'il a déjà plus la capacité max moins ce qu'il a déjà)
		$v -> setLitreEssence($v -> getLitreEssence() + $besoin);
	}
	
}
//------------------------
$vehicule = new Vehicule; 
$vehicule -> setLitreEssence(5);
$vehicule -> setReservoir(50);

echo 'La voiture contient : ' . $vehicule -> getLitreEssence() . ' litres <br/>'; 
 
$pompe = new Pompe; 
$pompe -> setLitreEssence(800);
echo 'La pompe contient : ' . $pompe -> getLitreEssence() . ' litres <hr/>'; 

//------
$pompe -> fairePlein($vehicule); 

echo '<h2>Après ravitaillement : </h2>';
echo 'La voiture contient : ' . $vehicule -> getLitreEssence() . ' litres <br/>'; 
echo 'La pompe contient : ' . $pompe -> getLitreEssence() . ' litres <hr/>';


