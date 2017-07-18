<?php
require_once("inc/init.inc.php");

if(empty($_SESSION['utilisateur']['pseudo']))
{
	header('location:index.php');
}
echo '<pre>'; var_dump($_SESSION); echo '</pre>';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dialogue - Tchat</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div id="conteneur">
			<h2 id="moi">Bonjour <?php echo $_SESSION["utilisateur"]["pseudo"];?></h2>
			<div id="message_tchat"></div>
			<div id="liste_membre_connecte"></div>
			<div class="clear"></div>
			<div id="smiley">
				<img class="smiley" src="smil/smiley1.gif" alt=":)" />
			</div> 
			<!-- FORMULAIRE -->
			<div id="formulaire_tchat">
				<form method="post" action="#" id="form">
					<textarea id="message" name="message" rows="5" maxlength="300"></textarea><br />
					<input type="submit" name="envoi" value="Envoi" class="submit" />
				</form>	
			</div>
			<div id="postMessage"></div>
		</div>
		<script>
			//Recuperation de la liste des connectes via un setInterval();
			setInterval("ajax(liste_membre_connecte)", 1333);
			
			// recuperation et affichage de tous les messages via un setInterval
			setInterval("ajax(message_tchat)", 3777);
			
			// Suppression de l'utilisateur sur le fichier pseudo.txt lors la fermeture de la fenetre
			window.onbeforeunload = function(e){
				ajax("liste_membre_connecte", 'retirer');
				return "Are you sure";
			}
			
			//Enregistrement des messages lors de la validition (submit) du formulaire
			document.getElementById("form").addEventListener("submit", function(event){
				event.preventDefault(); //Bloque le rechargement de page consecutif a submit du formulaire
				ajax("postMessage", message.value);
				ajax("message_tchat");
				document.getElementById('message').value = '';
			}); 
			
			// Enregistrement des messages lors de la validation du form via la touche entrée
			document.addEventListener("keypress",function(){
				if(event.keyCode == 13){ // La touche entrée à un keyCode = 13 (look up JS keycodes)
					event.preventDefault(); //Bloque le rechargement de page consecutif a submit du formulaire
					ajax("postMessage", message.value);
					ajax("message_tchat");
					document.getElementById('message').value = '';
				}		
			});
			
			
			//Declaration de la fonction AJAX
			function ajax(mode, arg = ''){
				if(typeof(mode) == 'object'){
					mode = mode.id;
					// Si notre argument mode est de type object , c'est que js ne recupere pas le texte normal de l'argument mais la balise html qui possede cet ID puisqu'il est possible de selectionner un élément directment par son id.Du coup on pioche dedans pour ne recuperer que l'id (mode.id)
				}
				console.log("mode: "+mode);
				
				var file = "ajax.php"; // le fichier cible
				var param = "mode="+mode+"&arg="+arg;// Les parametres a fournir sur ajax.php
				
				if(window.XMLHttpRequest){
					var xhttp = new XMLHttpRequest();// La plupart des navigateurs
				}
				else{
					var xhttp = new ActiveXObject("Microsoft.XMLHTTP"); // IExplorer
				}
			
			xhttp.open("POST", file, true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			
			xhttp.onreadystatechange = function() {
				if(xhttp.readyState == 4 && xhttp.status == 200){
					console.log(xhttp.responseText);
					var obj = JSON.parse(xhttp.responseText);
					console.log(obj);
					
					document.getElementById(mode).innerHTML = obj.resultat; // On place la response dans l'element html  dont l'id a ete fourni dans l'argument "mode"
					document.getElementById(mode).scrollTOP = message_tchat.scrollHeigth; // Prmet de descendre le scroll (ascenseur) pour voire les derniers messages ou le dernier membres
				}
			}
			xhttp.send(param); // On envoi en fournissant les parametres.
		}	
			
		</script>
	</body>
	
</html>