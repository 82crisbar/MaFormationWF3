<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<style>
			*{ font-family: sans-serif;}
			form { width: 30%;	 margin: 0 auto;}
			label { display:inline-block; width:100%; font-style:italic;}
			input { height:30px; border: 1px solid #eee; width:100%; resize:none;}
			textarea { height: 60px;}
		</style>	
	</head>
	<body>
		<?php
			echo '<pre>'; print_r($_POST); echo '</pre>'; 
	//connexion a la bdd
			$pdo = new PDO('mysql:host=localhost;dbname=connexion','root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			
			if(isset($_POST['pseudo']) && isset($_POST['mdp']))
			{
				//$pseudo = $_POST['pseudo'];
				//$mdp = $_POST['mdp'];
				//Recuperation des infos en ajoutant la fonction predefinie addslashes() pour gerer les quotes et guillemets
				$pseudo = addslashes($_POST['pseudo']);
				$mdp = addslashes($_POST['mdp']);
				// Addslashes() rajoute un antislash de qu'il trouve une cote ou un guillemet dans une chaine des carachteres
				echo '<b>Pseudo:</b>'.$pseudo .'<br />';
				echo '<b>Mot de passe:</b>'.$mdp .'<br />';
				
				$req = "SELECT * FROM utilisateur WHERE pseudo = '$pseudo' AND mdp = '$mdp'";
	// affichage de la requete pour comprendre les ingections
				echo '<b>Requete:</b>' . $req . '<br />';
				
	//execution de la requete 
				//$resultat = $pdo->query($req);
				//La ligne dessus permet l'ingection de code via le formulaire (ingections notamment), pour securiser, il nous suffit d'utiliser prepare + execute
				$resultat = $pdo->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo AND mdp = :mdp");
				$resultat->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
				$resultat->bindParam(":mdp", $mdp, PDO::PARAM_STR);
				$resultat->execute();
				
				
				$membre = $resultat->fetch(PDO::FETCH_ASSOC);
	//si nous recuperons qq chose de la bdd
				if(!empty($membre)) 
				{
	// Alors le pseudo et le mdp son correct
					echo '<h1 style="background:lime;font-size:50px;text-align:center;">Vous etes connecté</h1>';
					echo '<b>Vos informations</b><br />';
					echo '<b>id_utilisateur:</b>' . $membre['id_utilisateur'] .'<br />';
					echo '<b>Pseudo:</b>' . $membre['pseudo'] . '<br />';
					echo '<b>Mot de passe:</b>' . $membre['mdp'] . '<br />';
					echo '<b>Sexe:</b>' . $membre['sexe'] . '<br />';
					echo '<b>Email:</b>' . $membre['email'] . '<br />';
					echo '<b>Adresse:</b>' . $membre['adresse'] . '<br />';	
				}
				else {
					echo '<h1 style="background:red;color:white;text-align:center;">Erreur sur le pseudo ou le mot de passe<br />Veuillez recommencer</h1>';
				}
				
			}
		?>
	
		<form method="post" action="">
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" value="" />
			<label for="mdp">Mot de passe</label>
			<input type="text" name="mdp" id="mdp" value="" />
			<!--<label for="email">Email</label>
			<input type="email" name="email" id="email" value="" />
			<label for="sexe">Sexe</label>
			<input type="text" name="sexe" id="sexe" value="" />
			<label for="adresse">Adresse</label>
			<textarea rows="4" cols="90" id="adresse" name="adresse"></textarea><br /><br /> -->
			<input style="background:lime; margin-top:10px;" type="submit" id="submit" value="Valider" /> 
		</form>
	</body>
</html>