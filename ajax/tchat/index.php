<!DOCTYPE html>
<html>
	<head>
		<title>Accueil - Connexion</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div class="contenu">
		<fieldset>
			<div id="message">Bonjour veuillez vous connecter pour acceder au tchat!!
			<!-- Mettre en place une requete ajax declenchée lors de la validation du formulaire.Recuperer les parametres à fournir puis tester si la communication est ok, si vous recevez bien la reponse depuis ajax_connexion.php-->
			
			</div>
		</fieldset>
		<fieldset>
			<form method="post" action="" id="form">
			<!-- dans ce formulaire: 4 champs + bouton submit(pseudo/ sexe/ ville/ date_de_naissance) -->
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" value="" />
			
			<label for="sexe">Sexe</label>
			<select  name="sexe" id="sexe" />
				<option value="m">Homme</option>
				<option value="f">Femme</option>
			</select>
			
			<label for="ville">Ville</label>
			<input type="text" name="ville" id="ville" value="" />
			
			<label for="date_de_naissance">Date de naissance</label>
			<input type="date" name="date_de_naissance" id="date_de_naissance" value="" />
			
			<input type="submit" value="Valider" />
			</form>
		</fieldset>
		
		</div>
		<script>
			document.getElementById('form').addEventListener("submit", function(e){
				e.preventDefault();
				ajax();
			});
			//Declaration de la fonction ajax
			function ajax() {
				// Recuperation des values des champs du formulaire
				var champPseudo = document.getElementById("pseudo");
				var pseudo = champPseudo.value;	
				var champSexe = document.getElementById("sexe");
				var sexe = champSexe.value;	
				var champVille = document.getElementById("ville");
				var ville = champVille.value;	
				var champDateDeNaissance = document.getElementById("date_de_naissance");
				var DateDeNaissance = champDateDeNaissance.value;
				
				// Mise en place des parametres que nous allons envoyer sur ajax_connexion.php via ajax
				var param = "pseudo="+pseudo+"&sexe="+sexe+"&ville="+ville+"&date_de_naissance="+DateDeNaissance;
				console.log(param);
				// Initiation de l'objet ajax represente par la variable xhttp
				var file = "ajax_connexion.php";
				
				if(window.XMLHttpRequest)
					var xhttp = new XMLHttpRequest();
				else
					
					var xhttp = new ActiveXObject("Microsoft.XMLHTTP");
				
				xhttp.open("POST", file, true);
				xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				
				xhttp.onreadystatechange = function (){
				
					if(xhttp.readyState == 4 && xhttp.status == 200){
					
						console.log(xhttp.responseText);
						var reponse = JSON.parse(xhttp.responseText);
						document.getElementById("message").innerHTML = reponse.resultat;
						
						if(reponse.pseudo == 'disponible') {
							
							// Si la valeur de l'indice pseudo est 'disponible' alors je sais qu'il n'y a pas eu d'erreur et on redirige vers 'dialogue.php'
							window.location = 'dialogue.php';
						}
					}	
				}
				xhttp.send(param);
			}	
		</script>
	</body>
	
</html>
