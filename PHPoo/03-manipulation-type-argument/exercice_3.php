<?php

//03-manipulation-type-argument/exercice_3.php

class Vehicule
{
	private $litreEssence;// 5 contenu a un instant T
	private $reservoir;   // 50 Capacité max du reservoir
	
	public function getLitreEssence (){
		return $this -> litreEssence;
	}
	
	public function setLitreEssence ($litre){
		$this -> litreEssence = $litre;
	}
	
	public function  getReservoir(){
		return $this -> reservoir;
	}
	public function  setReservoir($litre){
		$this -> reservoir = $litre;
	}
}

class Pompe
{
	private $litreEssence;// 5 contenu a un instant T
	
	public function getLitreEssence (){
		return $this -> litreEssence;
	}
	
	public function setLitreEssence ($litre){
		$this -> litreEssence = $litre;
	}
	
	// Fonction pour la consigne 8...
	public function plainVoiture($nimportequoi){

		$totLitresXLePlain = ( $nimportequoi -> getReservoir() - $nimportequoi-> getLitreEssence() );
		
		// Modifier le contenu de ma pompe passant de 800 a 755 litres (soit 800 - ce qu'a besoin le vehicule)
		$this-> setLitreEssence( $this -> getLitreEssence() - $totLitresXLePlain );
		
		// Modifier le contenu de mon vehicule en passant de 5 a 50 
		$nimportequoi->setLitreEssence($nimportequoi -> getLitreEssence() + $totLitresXLePlain);
	}
	
}

$Panda = new Vehicule;

$Panda -> setLitreEssence(5);
echo 'La voiture contient :' . $Panda -> getLitreEssence() . 'litres <br />'; 
$Panda -> setReservoir(50);


$pompe = new Pompe;
$pompe -> setLitreEssence(800);
echo 'La pompe contient :' . $pompe -> getLitreEssence() . 'litres <br />';

$pompe -> plainVoiture($Panda); 

echo 'La voiture contient apres le plein :' . $Panda -> getLitreEssence() . 'litres <br />'; 
echo 'La pompe contient apres le plein :' .$pompe -> getLitreEssence() . 'litres <br />';