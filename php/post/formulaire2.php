<?php
// Sur formulaire2.php: mettre en place un formulaire avec deux champs (pseudo & email) + le bouton de validation
// ce formulaire doit envoyer les infos saisies sur la page formulaire2_resultat.php
// Faire en sorte d'afficher sur la page formulaire2_resultat.php les informations reçues (var_dump ou print_r)
// ensuite afficher proprement (a la main) les infos saisies 
// ! \\  Attention au cas d'erreur, par exemple si j'arrive directement sur formulaire2_resultat.php sans etre passé par la validation du formulaire, y-a t'il des erreurs
// Pour aller plus loin testez la taille du pseudo: Le pseudo doit avoir entre 4 et 14 caracteres inclus.
// Si la taille est ok: on affiche le pseudo est:... ect
//S'il y a un probleme sur la taille on affiche un message a l'utilisateur


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<style>
			*{ font-family: sans-serif;}
			form { width: 30%;	 margin: 0 auto;}
			label { display:inline-block; width:100%; font-style:italic;}
			input { height:30px; border: 1px solid #eee; width:100%; resize:none;}
		</style>	
	</head>
	<body>
	<?php
		echo'<pre>';print_r($_POST);'</pre>';
		
		
	?>
		<form method="post" action="formulaire2_resultat.php">
			<label for="pseudo">Pseudo</label>
			<input type="text" maxlenght="14" name="pseudo" id="pseudo" value="" />
			<label for="email">E-mail</label>
			<input type="text" name="email"></input><br /><br />
			<input type="submit" id="submit" value="Valider" />
		</form>
	</body>
</html>
