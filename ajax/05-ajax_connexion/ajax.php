<?php //mise en place de la verif_connexion a une bdd
$pdo = new PDO('mysql:host=localhost;dbname=connexion', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

//recuperation des arguments dans post fournis via notre requete ajax (variable param)
// ecriture en ternaire
$pseudo = (isset($_POST['pseudo'])) ? $_POST['pseudo'] : "";
$mdp = (isset($_POST['mdp'])) ? $_POST['mdp'] : "";

// Ecriture classique 
/* if(isset($_POST['pseudo'])){
	$pseudo = $_POST['pseudo'];
}
else {
	$pseudo = "";
} */

// declaration d'un tableau array qui contiendrà notre reponse a la requete ajax 
$tab = array();
// declaration de l'indice dans le tableau array qui contiendra la reponse , c'est cet indice que l'on appelle dans l'evenement onreadystatechange
$tab['resultat'] = "";

//EXERCICE
// Faire le controle si le pseudo et le mdp correspond a un entrée de la bdd 
// si il y a un erreur : renvoyer une chaine de caracteres annoncant l'erreur a l'utilisateur
// si tout est ok envoyer un message du typr "Vous etes connecté, vous etes "pseudo" de sexe "(masculin/feminin), votre addresse mail est: "maildelabdd@mail.fr"

$verif_connexion = $pdo->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp"); 
$verif_connexion->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
$verif_connexion->bindParam(":mdp", $mdp, PDO::PARAM_STR);
$verif_connexion->execute();

if($verif_connexion->rowCount() < 1)
{
	$tab['resultat'] = "<p>Erreur sur le pseudo ou sur le mot de passe<br /> Veuillez recommencer svp!</p>";
}
else 
{
	$utilisateur = $verif_connexion->fetch(PDO::FETCH_ASSOC);
	
	$sexe = ($utilisateur['sexe'] == 'm') ? 'masculin' : 'feminin';
	
	$tab['resultat'] = '<p>Vous etes connecté<br /> Vous étes ' . $utilisateur['pseudo'] . ' de sexe ' . $sexe . ',<br />  votre adresse mail est: ' . $utilisateur['email'] . '<p>';
}

/* $verif_connexion = $pdo->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp");
$verif_connexion->bindparam(":pseudo", $pseudo, PDO::PARAM_STR);
$verif_connexion->bindparam(":mdp", $mdp, PDO::PARAM_STR);
$verif_connexion->execute();

$info = $verif_connexion->fetch(PDO::FETCH_ASSOC);


if(!empty && $sexe = m ){
	echo '<h1>Vous etes connecté, vous étes ' . $pseudo . ' de sexe masculin et votre adresse mail est ' . $email . '</h1>';
}
elseif(!empty && $sexe = f){
	echo '<h1>Vous etes connecté, vous étes ' . $pseudo . ' de sexe feminin et votre adresse mail est ' . $email . '</h1>';
}
else{
	echo '<h1>Erreur sur le pseudo ou le mot de passe<br />Veuillez recommencer</h1>';
}
 
 */
//envoy de la réponse en encodant sous le format JSON:
echo json_encode($tab);