<?php
require_once("inc/init.inc.php");

$tab = array();
$tab['resultat'] = "";

$arg = isset($_POST['arg']) ? $_POST['arg'] : "";
$mode = isset($_POST['mode']) ? $_POST['mode'] : "";

if($mode == 'liste_membre_connecte' && !empty($arg) && $arg == "retirer")
{
	// si on rentre ici nous devons retirer un pseudo du fichier pseudo.txt 
	// ATTENTION au sense de cette condition et la suivante car la valeur de $mode est la meme pour les deux.
	
	// On recupere le contenu de pseudo.txt
	$contenu = file_get_contents("pseudo.txt");
	
	// On remplace dans la chaine de caracteres representé par $contenu le pseudo par rien (pour le supprimer)
	$contenu = str_replace($_SESSION['utilisateur']['pseudo'], '', $contenu);
	
	// On remet le contenu modifié dans le fichier 
	file_put_contents('pseudo.txt', $contenu);
}
elseif($mode == 'liste_membre_connecte')
{
	// Si on rentre ici, nous devons recuperer la liste des membres sur le fichier pseudo.txt puis la renvoyer 
	$fichier = file("pseudo.txt");
	if(!empty($fichier))
	{
		// implode() permet de recuperer les valeurs d'un tableau array et de les renvoyer sous forme de chaine de caracteres separee par un separateur fourni en premier argument
		$tab['resultat'] .= '<p>' . implode('</p><p>', $fichier) . '</p>';
	}
	
}
elseif($mode == "postMessage")
{
	// Si la valeur de mode est egal a postMessage alors nous devons enregistrer le message de l'utilisateur en BDD
	if(!empty($arg)) // $arg est cense contenir le message a enregistrer, donc s'il nest pas vide on l'enregistre.
	{
		$id = $_SESSION['utilisateur']['id_membre'];
		$enregistrement =$pdo->prepare("INSERT INTO dialogue (id_membre, message, date_dialogue) VALUES ($id, :message, NOW())");
		$enregistrement->bindParam(":message", $arg, PDO::PARAM_STR);
		$enregistrement->execute();
		
		$tab['resultat'] .= "<br /><p>Message enregistré</p>";
	}
	 
}
elseif($mode == "message_tchat")
{
	// Exercice: Recuperer tous les messages de la BDD ainsi que les pseudos correspondant
	// les renvoyer dans $tab["resultat"]
	// chaque message doit etre affiché sous la forme: pseudo > message
	// faire en sorte que pour les messages posté par les hommes le pseudo soit ecrit en bleu et en rose pour les femmes
	
	$messages = $pdo->query("SELECT dialogue.message, membre.pseudo, membre.sexe FROM dialogue, membre WHERE dialogue.id_membre = membre.id_membre");
	
	while($mess = $messages->fetch(PDO::FETCH_ASSOC))
	{
		if($mess["sexe"] == "f"){
			$couleur = "rose";
		}else{
			$couleur = "bleu";
		}
		$tab["resultat"] .= "<p><span class='" . $couleur ."'>" . $mess['pseudo'] . '</span> > ' . $mess['message'] . '</p>';  
	}
	
	
}




echo json_encode($tab);