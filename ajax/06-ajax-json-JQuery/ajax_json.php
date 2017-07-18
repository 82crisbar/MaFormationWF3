<?php
// json_encode() => transforme un tableau ARRAY en format JSON
// jso_decode() => Transforme un format JSON en tableau ARRAY

$tab = array();
$tab['resultat'] = "";

//$prenom = "";// pas necessaire 

if(isset($_POST['personne']))
{
	$prenom = $_POST['personne'];
	
	// Recuperation du contenu d'un fichier 
	$fichier = file_get_contents("fichier.json");
	$json = json_decode($fichier, true);
	
	foreach($json AS $valeur)
	{
		if($valeur['prenom'] == strtolower($prenom))
		{
			$tab['resultat'] = "<table border='1' style='border-collapse: collapse;margin:0 auto;'>
									<tr>	
										<td style='padding: 10px;'>" . $valeur['nom'] . " </td>
										<td style='padding: 10px;'>" . $valeur['prenom'] . " </td>
										<td style='padding: 10px;'>" . $valeur['salaire'] . " </td>
										<td style='padding: 10px;'>" . $valeur['dateEmbauche'] . " </td>
									</tr>
								</table>";		
		}
	}	
}
echo json_encode($tab);