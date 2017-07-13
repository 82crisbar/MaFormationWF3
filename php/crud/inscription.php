<?php
require_once('inc/init.inc.php');
echo '<pre>'; print_r($_POST); echo '</pre>';

 if($_POST)
 {
	$erreur = "";
	//Exercice : controler les champs pseudo, nom, prenom, taille maximum : 20 caracteres, taille minimum : 4caracteres.
	// controler que le pseudo lors de l'inscription n'existe pas en BDD

	
	if(isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['sexe']) && isset($_POST['ville']) && isset($_POST['code_postale']) && isset($_POST['adresse']))
	{
		$pseudo = $_POST['pseudo'];
		$mdp = $_POST['mdp'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$email = $_POST['email'];
		$sexe = $_POST['sexe'];
		$ville = $_POST['ville'];
		$cp = $_POST['code_postale'];
		$adresse = $_POST['adresse'];
				
		if((iconv_strlen($_POST['pseudo']) >= 4 && iconv_strlen($_POST['pseudo']) <= 20) && (iconv_strlen($_POST['nom']) >= 4 && iconv_strlen($_POST['nom']) <= 20) && (iconv_strlen($_POST['prenom']) >= 4 && iconv_strlen($_POST['prenom']) <= 20))
		{
			$erreur .='<div class="alert alert-success">Tres bien bienvenue a bord</div>';
		}
		else{
			$erreur .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, la taille du pseudo est invalide<br />En effet, le pseudo doit avoir entre 4 et 20 caractéres inclus</div>';
			
		}
		
		$verif_pseudo = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
		$verif_pseudo->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
		$verif_pseudo->execute();
		
		if($verif_pseudo->rowCount() > 0)
		{
			// Si l'on obtient au moins 1 ligne de resultat alors le pseudo est deja pris
			$erreur .= '<div class="alert alert-danger">Attention le pseudo n\'est pas disponible</div>';
			
		}
			
		if(empty($erreur)) // si $erreur est different de true alors le controle prelable sont OK!
		{
			// pour crypter le mdp
			//$mdp = password_hash($mdp, PASSWORD_DEFAULT);
			//Pour voir la gestion du mdp lors de la connexion voir le fichier connexion_avec_mdp_hash.php
			$enregistrement = $pdo->prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, sexe, code_postale, adresse, statut) VALUES (:pseudo, :mdp, :nom, :prenom, :email, :sexe, :code_postale, :adresse, 0)");
			$enregistrement->bindParam(":pseudo", $pseudo, PDO::PARAM_STR); 
			$enregistrement->bindParam(":mdp", $mdp, PDO::PARAM_STR); 
			$enregistrement->bindParam(":nom", $nom, PDO::PARAM_STR); 
			$enregistrement->bindParam(":prenom", $prenom, PDO::PARAM_STR); 
			$enregistrement->bindParam(":email", $email, PDO::PARAM_STR); 
			$enregistrement->bindParam(":sexe", $sexe, PDO::PARAM_STR); 
			$enregistrement->bindParam(":code_postale", $code_postale, PDO::PARAM_STR); 
			$enregistrement->bindParam(":adresse", $adresse, PDO::PARAM_STR); 
			$enregistrement->execute(); 
			// on redirige vers la page connexion.php
			
		}
	}
	
}

require_once('inc/header.inc.php');
?>
<section>
	 <div class="container">

      <div class="starter-template">
		<h1><span class="glyphicon glyphicon-user" style="color: SteelBlue;"></span>Inscription</h1>
      </div>
	  
	  <div class="row">
	  <div class="col-sm-4 col-sm-offset-4">
		<form method="post" action="" class="well">
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" class="form-control" value="" />
			<label for="mdp">Mot de passe</label>
			<input type="text" name="mdp" id="mdp" class="form-control" value="" />
			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom" class="form-control" value="" />
			<label for="email">Prenom</label>
			<input type="text" name="prenom" id="prenom" class="form-control" value="" />
			<label for="email">email</label>
			<input type="text" name="email" id="email" class="form-control" value="" />
			<label for="civilte">Sexe</label>
			<select type="text" name="civilte" id="civilte" class="form-control" value="" />
				<option value="m">Homme</option>
				<option value="f">Femme</option>
			</select>	
			<label for="ville">Ville</label>
			<input type="text" name="ville" id="ville" class="form-control" value="" />
			<label for="code_postale">Code postale</label>
			<input type="text" name="code_postale" id="code_postale" class="form-control" value="" />
			<label for="adresse">Adresse</label>
			<input type="textarea" rows="4" cols="60" name="adresse" id="adresse" class="form-control" value="" />
			<button type="submit" name="inscription" id="inscription" class="form-control btn btn-success" style="margin-top:20px;"><span class="glyphicon glyphicon-star-empty" style="color:lime;"></span> Inscription <span class="glyphicon glyphicon-star-empty" style="color:lime";></span></button>
		</form>	
	  </div>
	  </div>

    </div><!-- /.container -->
</section>

<?php
require_once('inc/footer.inc.php');