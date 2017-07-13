<?php 

require_once("inc/init.inc.php");


$tab = array();

$tab['resultat'] = "";
// Rajoute d'un indice dans le tableau array qui serà renvoye nous permettant de faire un control sur la disponibilité pseudo.
$tab['pseudo'] = "disponible";
// variable de control en cas d'erreur
$erreur = false;

$pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : "";
$sexe = (isset($_POST['sexe'])) ? $_POST['sexe'] : "";
$ville = (isset($_POST['ville'])) ? $_POST['ville'] : "";
$date_de_naissance = (isset($_POST['date_de_naissance'])) ? $_POST['date_de_naissance'] : ""; 

// Requete en bdd x verifier l'existance ou pas du pseudo

$verif_connexion = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo"); 
$verif_connexion->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
$verif_connexion->execute();

$membre = $verif_connexion->fetch(PDO::FETCH_ASSOC); 

// Verification si le pseudo exist dejà
if($verif_connexion->rowCount() === 0)
{
	// Ici le pseudo n'existe pas car nous avons pas recuperé au moins une ligne
	$inscription = $pdo->prepare("INSERT INTO membre(pseudo, sexe, ville, date_de_naissance, ip, date_connexion) VALUES (:pseudo, :sexe, :ville, :date_de_naissance, :ip, NOW())");	
	$inscription->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
	$inscription->bindParam(":sexe", $sexe, PDO::PARAM_STR);
	$inscription->bindParam(":ville", $ville, PDO::PARAM_STR);
	$inscription->bindParam(":date_de_naissance", $date_de_naissance, PDO::PARAM_STR);
	$inscription->bindParam(":ip", $_SERVER['REMOTE_ADDR'],PDO::PARAM_STR);
	$inscription->execute();
	
	// On recupere l'id inseré pour la placer dans un deuxieme temps dans la session
	$id_membre = $pdo->lastInsertId();
}
elseif($verif_connexion->rowCount() > 0 && $membre['ip'] == $_SERVER['REMOTE_ADDR'])
{
	// si rowCount() > 0 alors le pseudo existe mais il est possible que ce soit le meme personne, on compare donc l'address ip en cours ($_SERVER['REMOTE_ADDR']) avec l'address ip enregistré dans la bdd ($membre['ip']);
	$id_membre = $membre['id_membre'];
	// on met donc a jour la date de connexion
	$pdo->query("UPDATE membre SET date_connexion = NOW() WHERE id_membre = $id_membre");
}
else
{
	// Si on rentre dans ce else, le pseudo existe dejà et l'addresse ip n'est pas la meme que celle pre-enregistré
	
	// On envoi un message d'erreur
	$tab['resultat'] = "<p style='color:red;'>Ce pseudo est dejà utilisé, veuillez en choisir un autre !</p>";
	// On chqnge la valeur de la variable erreur nous permettant de tester dans ce script s'il y a un erreur
	$erreur = true;
	// On change la valeur de $tab['pseudo'] afin de savoir s'il y a une erreur via javascript sur index.php
	$tab['pseudo'] = "reserve";
	
}	

// Verification s'il ni a pas eu d'erreur au prelable 
if(!$erreur)// si $erreur est egal a false
{
	// On inscrit dans la session des infos sur l'utilisateur
	$_SESSION['utilisateur'] = array();
	$_SESSION['utilisateur']['pseudo'] = $pseudo;
	$_SESSION['utilisateur']['sexe'] = $sexe;
	$_SESSION['utilisateur']['id_membre'] = $id_membre;
	
	// creation d'un fichier por enregistrer les utilisateurs present dans notre tchat
	$f = fopen("pseudo.txt", "a");
	if(filesize("pseudo.txt") === 0 ) // avant d'enregistrer l'information, on regarde si le fichier à une taille = 0, si c'est le cas alors c'est la premiere ligne du fichier 
	{
		fwrite($f, $pseudo);
	}
	else{
		// si on rentre ici, alors de pseudos sont dejà inscrit donc on commence par sauter une ligne.
		fwrite($f, "\n". $pseudo);
	}
}

echo json_encode($tab);






























