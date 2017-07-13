<?php
require("inc/init.inc.php");

// verification si l'utilisateurest connecte sinon on le redirige sur connexion
if(utilisateur_est_connecte())
{
	header("location:profil.php");
}

// declaration de variables vides pour affichage dans les values du formulaire
$pseudo = "";
$mdp = "";
$nom = "";
$prenom = "";
$email = "";
$sexe = "";
$ville = "";
$cp = "";
$adresse = "";

// controle sur l'exercice de tous les champs provenant du formulaire  (sauf le bouton de validation)
if(isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['sexe']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['adresse']))
{
	$pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$sexe = $_POST['sexe'];
	$ville = $_POST['ville'];
	$cp = $_POST['cp'];
	$adresse = $_POST['adresse'];
	
	// variable de control
	$erreur = "";
	
	// control sur la taille du pseudo (entre 4 et 14 carachteres inclus) 
	if(iconv_strlen($_POST['pseudo']) >= 4 && iconv_strlen($_POST['pseudo']) <= 14)
	{
		//$message .='<div class="alert alert-success">Votre pseudo est: ' . $pseudo . '</div>';
	}	

		else
		{
			$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, la taille du pseudo est invalide<br />En effet, le pseudo doit avoir entre 4 et 14 caractéres inclus</div>';
			$erreur = true; //Si on rentre dans cette condition alors il y a un erreur.
		}
		
		// control des caracteres dans le pseudo (autorisés: a-z A-Z 0-9 _ - .)
		$verif_caracteres = preg_match('#^[a-zA-Z0-9._-]+$#', $pseudo);
		/*
		// preg_match() va verifier les caracteres contenus dans la variable pseudo selon une 'expression reguliere' fourni en &er argument.
		// renvoye 1 si tout est ok sinon 0
		
		//expression:
		#  => permet d'indiquer le debut et la fin de l'expression 
		^  => indique la chaine ($pseudo) ne peut que commencer par ce caracteres.
		$  => indique la chaine ($pseudo) ne peut que finir par ce caracteres.
		+  => indique que les caracteres autorises pouvent apparetre plusieurs fois
		[] => contient les caracteres autorises
		*/
		
		if(!$verif_caracteres && !empty($pseudo))
		{
			// onrentre dans cette condition si $verif_caracteres contient 0 donc s'il y a des caracteres non autorises
			$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, caracteres non autorises dans le pseudo<br />Caracteres autorises: A-Z et 0-9</div>';
		}
		
		// control sur le format de l'email
		if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) 
		{
			//$message .= '<div class="alert alert-success">Votre email est:' . $email . '</div>';
		}
		else{
			$message .= '<div class="alert alert-danger">Attention le format du mail est invalide<br />Vouillez verifier votre saisie</div>';
			$erreur = true;//Si on rentre dans cette condition alors il y a un erreur.
		}
		
		// controle sur la disponibilite du pseudo en bdd
		$verif_pseudo = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
		$verif_pseudo->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
		$verif_pseudo->execute();
		
		if($verif_pseudo->rowCount() > 0)
		{
			// Si l'on obtient au moins 1 ligne de resultat alors le pseudo est deja pris
			$message .= '<div class="alert alert-danger">Attention le pseudo n\'est pas disponible</div>';
			$erreur = true;
		}
		
		// insertion dans la bdd
		if($erreur !== true) // si $erreur est different de true alors le controle prelable sont OK!
		{
			// pour crypter le mdp
			//$mdp = password_hash($mdp, PASSWORD_DEFAULT);
			//Pour voir la gestion du mdp lors de la connexion voir le fichier connexion_avec_mdp_hash.php
			$enregistrement = $pdo->prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, sexe, cp, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :sexe, :cp, :adresse, 0)");
			$enregistrement->bindParam(":pseudo", $pseudo, PDO::PARAM_STR); 
			$enregistrement->bindParam(":mdp", $mdp, PDO::PARAM_STR); 
			$enregistrement->bindParam(":nom", $nom, PDO::PARAM_STR); 
			$enregistrement->bindParam(":prenom", $prenom, PDO::PARAM_STR); 
			$enregistrement->bindParam(":email", $email, PDO::PARAM_STR); 
			$enregistrement->bindParam(":sexe", $sexe, PDO::PARAM_STR); 
			$enregistrement->bindParam(":cp", $cp, PDO::PARAM_STR); 
			$enregistrement->bindParam(":adresse", $adresse, PDO::PARAM_STR); 
			$enregistrement->execute(); 
			// on redirige vers la page connexion.php
			header("location:connexion.php");//!\\ a mettre en commntaire en fase de programmation car il bloque les erreurs!!!
		}
	
	
	
	
	
}
	



// La ligne suivant commnce les affichages dans la page
require("inc/header.inc.php");
require("inc/nav.inc.php");
//echo '<pre>'; print_r($_POST); echo '</pre>';


?>
 
    <div class="container">

      <div class="starter-template">
		<h1><span class="glyphicon glyphicon-user" style="color: lime;"></span>Inscription</h1>
        <?php //echo $message; // messages destines a l'utilisateur ?>
		<?= $message; // cette balise php inclue un echo et est equivalent a la ligne au dessus ?>
      </div>
	  
	  <div class="row">
	  <div class="col-sm-4 col-sm-offset-4">
		<form method="post" action="" class="well">
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" class="form-control" value="<?php echo $pseudo; ?>" />
			<label for="mdp">Mot de passe</label>
			<input type="text" name="mdp" id="mdp" class="form-control" value="<?php echo $mdp; ?>" />
			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom" class="form-control" value="<?php echo $nom; ?>" />
			<label for="email">Prenom</label>
			<input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $prenom; ?>" />
			<label for="email">email</label>
			<input type="text" name="email" id="email" class="form-control" value="<?php echo $email; ?>" />
			<label for="sexe">Sexe</label>
			<select type="text" name="sexe" id="sexe" class="form-control" value="<?php echo $sexe; ?>" />
				<option value="m">Homme</option>
				<option value="f"<?php if($sexe == 'f') {echo 'selected';} ?>>Femme</option>
			</select>	
			<label for="ville">Ville</label>
			<input type="text" name="ville" id="ville" class="form-control" value="<?php echo $ville; ?>" />
			<label for="cp">Code postale</label>
			<input type="text" name="cp" id="cp" class="form-control" value="<?php echo $cp; ?>" />
			<label for="adresse">Adresse</label>
			<input type="textarea" rows="4" cols="60" name="adresse" id="adresse" class="form-control" value="<?php echo $adresse; ?>" />
			<button type="submit" name="inscription" id="inscription" class="form-control btn btn-success" style="margin-top:20px;"><span class="glyphicon glyphicon-star-empty" style="color:lime;"></span> Inscription <span class="glyphicon glyphicon-star-empty" style="color:lime";></span></button>
		</form>	
	  </div>
	  </div>

    </div><!-- /.container -->

<?php
require("inc/footer.inc.php");








