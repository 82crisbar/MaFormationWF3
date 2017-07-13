<?php
require("inc/init.inc.php");

//Toujours apres le init et toujours avant la fonction on cree la fonction deconnection
// DECONNEXION

if(isset($_GET['action']) && $_GET['action'] == 'deconnexion' )
{
	session_destroy();
}



// verification si l'utilisateurest connecte sinon on le redirige sur connexion
if(utilisateur_est_connecte())
{
	header("location:profil.php");
}

// verification de l'existence des indices du formulaire
if(isset($_POST['pseudo']) && isset($_POST['mdp']))
{
	$pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];
	
	$verif_connexion = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp");
	$verif_connexion->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
	$verif_connexion->bindParam(":mdp", $mdp, PDO::PARAM_STR);
	$verif_connexion->execute();
	
	if($verif_connexion->rowCount() > 0)
	{
		// Si nous avons une ligne alors le pseudo et le mdp sont corrects
		//$message .='<div class="alert alert-success">OK Welcome to my boutique</div>';// WE REDIRECT ON THE MAIN PAGE
		$info_utilisateur = $verif_connexion->fetch(PDO::FETCH_ASSOC);
		// on place toutes les informations de l'utilisateur dans la session sauf le mdp
		$_SESSION['utilisateur']= array();
		$_SESSION['utilisateur']['id_membre'] = $info_utilisateur['id_membre'];
		$_SESSION['utilisateur']['pseudo'] = $info_utilisateur['pseudo'];
		$_SESSION['utilisateur']['nom'] = $info_utilisateur['nom'];
		$_SESSION['utilisateur']['prenom'] = $info_utilisateur['prenom'];
		$_SESSION['utilisateur']['sexe'] = $info_utilisateur['sexe'];
		$_SESSION['utilisateur']['ville'] = $info_utilisateur['ville'];
		$_SESSION['utilisateur']['cp'] = $info_utilisateur['cp'];
		$_SESSION['utilisateur']['adresse'] = $info_utilisateur['adresse'];
		$_SESSION['utilisateur']['statut'] = $info_utilisateur['statut'];
		$_SESSION['utilisateur']['email'] = $info_utilisateur['email'];
		
		// on redirige sur profil
		header("location:profil.php");
		
		/*//meme chose avec un foreach
		$_SESSION['utilisateur'] = array();
		foreach($info_utilisateur AS $indice => $valeur)
		{
			if($indice != 'mdp')
			{
				$_SESSION['utilisateur'][$indice] = $valeur;
			}
		}*/
		
	}
	else {
		$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, erreur sur le pseudo ou le mot de passe<br /> Veuillez recommencer </div>';
	}
}



// La ligne suivant commnce les affichages dans la page
require("inc/header.inc.php");
require("inc/nav.inc.php");
//echo '<pre>'; print_r($_SESSION); echo '</pre>';
?>


 
    <div class="container">

      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-user" style="color: lime;"></span>Connexion</h1>
        <?php //echo $message; // messages destines a l'utilisateur ?>
		<?= $message; // cette balise php inclue un echo et est equivalent a la ligne au dessus ?>
      </div>
	  
	
		<div class="row">
		  <div class="col-sm-4 col-sm-offset-4">
			<form method="post" action="" class="well">
				<label for="pseudo">Pseudo</label>
				<input type="text" name="pseudo" id="pseudo" class="form-control" value="" />
				<label for="mdp">Mot de passe</label>
				<input type="text" name="mdp" id="mdp" class="form-control" value="" />
				<button type="submit" name="inscription" id="inscription" class="form-control btn btn-success" style="margin-top:20px;"><span class="glyphicon glyphicon-star-empty" style="color:lime;"></span> Connexion <span class="glyphicon glyphicon-star-empty" style="color:lime";></span></button>
			</form>	
		  </div>
		</div>
		
	</div><!-- /.container -->	
<?php
require("inc/footer.inc.php");