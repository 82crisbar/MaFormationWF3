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
		<form method="post" action="" id="form">
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" />
			<label for="mdp">Mot de passe</label>
			<input type="text" name="mdp" id="mdp" />
			
			<input style="background:limegreen; margin-top:10px;" type="submit" id="submit" value="Connexion" /> 
		</form>
		</hr>
		<div id="resultat"></div>
		<script><!-- Debut du Javascript -->
			// On recupere l'element html qui a l'id form et on rajoute un evenement (la soumission du formulaire) puis on declenche un fonction sur cet evenement qui bloque la soumission du formulaire (bloque la recharge de la page)
			document.getElementById('form').addEventListener("submit", function(e){
			// On bloque la soumission du formulaire // .preventDefault() permet de bloquer l'evenement quel qu'il soit
			e.preventDefault();
			// On execute notre fonction declaree a l'exterieur de l'evenement qui lancerà la requete ajax
			ajax();// est l'appel a la function que on a cree en bas, 

			});
			// Declaration d'une fonction ajax nous permettent de lancer une requete ajax 
			function ajax() {
				var file = "ajax.php";
				// Verification pour la compatribilité navigateur si XMLHttpRequest existe sur ce navigateur 
				if(window.XMLHttpRequest)
					var xhttp = new XMLHttpRequest();
				else
					// sinon c'est un navigateur IE ancien et c'est ActiveXObject qui devrà etre utilisé 
					var xhttp = new ActiveXObject("Microsoft.XMLHTTP"); // pour Internet explorer...
				// On recupere l'element qui a l'id pseudo et on le place dans la variable p
				var p = document.getElementById("pseudo");
				// On recupere sur la variable p la value de la saisie du champ
				var pseudo = p.value;//Recuperation de la valeur pseudo
				console.log('Pseudo: '+pseudo);
				//On recupere l'element qui a l'id mdp et on le place dans la variable m
				var m = document.getElementById("mdp");
				// On recupere sur la variable m la value de la saisie du champ
				var mdp = m.value;//Recuperation de la valeur mdp
				console.log('Mdp: '+mdp);
				
				// Mise en place d'une chaine de caracteres representant les parametres que nous allons transmettre a ajax.php sous la forme indice=valeur&indice2=valeur2&indice3=valeur3...
				var param = "pseudo="+pseudo+"&mdp="+mdp;
				console.log(param);
				// On ouvre la requete ajax en mode post en founissant le fichier cible concerne par la requete ajax represente par le file en mode true(asinchrone)
				xhttp.open("POST", file, true);
				//On transmet a notre requete ajax un header http obligatoire lorque nous utilisons la methode post
				xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				// Mise en place de l'evenement qui va se declencher a chaque changement de statut de la requete ajax 
				// On teste le statut de la requete ajax ainsi que le statut http
				xhttp.onreadystatechange = function (){
					// Si le statut de la requete ajax est egal a 4 et dans le meme temp si le statut http est egal a 200 
					if(xhttp.readyState == 4 && xhttp.status == 200){
					//Les status de la requete XMLHttpRequest
					/* - 0 => Objet crée, demandenon initialisé
					- 1 => connexion avec le server etablie
					- 2 => demande envoyé et recu par le serveur 
					- 3 => traitement cote serveur
					- 4 => demande terminée et reponse reçue 

					Statut HTTP: 
					https://fr.wikipedia.org/wiki/Liste_des_codes_HTTP
					"200" => "OK"
					"403" => "Forbidden"
					"404" => "Not found"

					Nous attendrons toujours que le statut de la requete soit a 4 et le statut HTTP soit a 200 afin de manipuler la reponse. */
					//.responseText rapresente la response fournie par notre requete ajax 
						console.log(xhttp.responseText);
						//Si on recupere une chaine de carachtere au format JSON, nous devons utiliser JSON.parse() afin de créer un objet JS
						var result = JSON.parse(xhttp.responseText);
						
						// .resultat dans la ligne suivante correspond a l'indice defini en php sur ajax.php
						// On place donc la reponse dans l'element html prevu a cet effet.
						document.getElementById("resultat").innerHTML = result.resultat;
					}
				}
				// Cette ligne declenche l'envoi de la requete ajax en fournissant les parametres attendus sur ajax.php
				xhttp.send(param);
				
			}
		</script><!-- Fin du Javascript -->
	</body>
</html>