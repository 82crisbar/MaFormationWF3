<?php 
$tab = array();
$tab['resultat'] = "";

if(!empty($_POST['pays']))
{
	//exercice: renvoyer dans $tab['resultat'] les villes selon l'indice pays sous forme "<option>ville1</option><option>ville2</option>"

	$pays = $_POST['pays'];
	$ville = "";
	
	if($pays == "France")
	{
		$ville = "<option>Paris</option><option>Lyon</option><option>Strasburg</option>";
	}
	elseif($pays == "Italie")
	{
		$ville = "<option>Rome</option><option>Udine</option><option>Milan</option>";
	}
	elseif($pays == "Espagne")
	{
		$ville = "<option>Madrid</option><option>Barcelone</option><option>Ibiza</option>";
	}
	
	$tab['resultat'] = $ville;	
}
echo json_encode($tab);