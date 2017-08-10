<?php


class Chat 
{

	private $prenom;

	private $age;

	private $couleur;

	private $sexe;

	private $race;
	

	public function __construct($prenom, $age, $couleur, $sexe, $race){
		$this->setPrenom($prenom);
		$this->setAge($age);
		$this->setCouleur($couleur);
		$this->setSexe($sexe);
		$this->setRace($race);
	}


	public function getPrenom()
	{
		return $this->prenom;
	}

	
	private function setPrenom($prenom)
	{
		if(is_string($prenom) && strlen($prenom) > 3 && strlen($prenom) < 20){
			$this->prenom = $prenom;
		}
		else {
			trigger_error('Le prénom est invalide', E_USER_WARNING);
		}	

	}

	
	public function getAge()
	{
		return $this->age;
	}

	
	private function setAge($age)
	{
		if(is_int($age)){
			$this->age = $age;
		}
		else {
			trigger_error('L\'age est invalide', E_USER_WARNING);
		}

	}

	
	public function getCouleur()
	{
		return $this->couleur;
	}

	private function setCouleur($couleur)
	{
		if(is_string($couleur) && strlen($couleur) > 3 && strlen($couleur) < 10){
			$this->couleur = $couleur;
		}
		else {
			trigger_error('La couleur est invalide', E_USER_WARNING);
		}
	}

	public function getSexe()
	{

		return $this->sexe;
	}

	private function setSexe($sexe)
	{
		 if(is_string($sexe)){
	    	$this->sexe = $sexe;
		 }
		 else {
			 trigger_error('Le sexe est invalide', E_USER_WARNING);
		}
	}

	public function getRace()
	{
	    return $this->race;
	}


	private function setRace($race)
	{
		if(is_string($race) && strlen($race) >= 3 && strlen($race) <= 20){
			$this->race = $race;
		}
		else {
			trigger_error('La race est invalide', E_USER_WARNING);
		}
	}

	public function getInfos(){
		$infos = [
			'prenom'  => $this->getPrenom(),
			'age'	  => $this->getAge(),
			'couleur' => $this->getCouleur(),
			'sexe'    => $this->getSexe(),
			'race'	  => $this->getRace()
		];

		return $infos;
	}
}