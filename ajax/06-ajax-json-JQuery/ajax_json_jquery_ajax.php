<!DOCTYPE html>
<html>
	<head>
		<title>AJAX-06 (JQuery)</title>
		<meta charset="utf-8" />
		
	</head>
	<body>
		<form method='post' action="ajax_json.php" id="form" style="width: 50%; margin:0 auto;">
		<?php
			$fichier = file_get_contents("fichier.json");//On recupere le contenu du fichier.json
			$json = json_decode($fichier, true);// on transforme le format json en tableau array
			
			echo '<select name="personne" id="personne" style="width: 50%; margin:0 auto; min-height: 28px; border: 1 px solid #dedede; border-radius: 3px;">';
			
			foreach($json AS $sous_tableau)
			{
				echo '<option>' . $sous_tableau['prenom'] . '</option>';
			}
			
			echo '</select>';
			
			echo '<input type="submit" value="ok" id="submit" style="width: 100%;" />';
		?>
		</form>
		<hr />
		<div id="resultat">
		
		</div>
		<!-- Call for Jquery-->
		<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function(){
				
				$("#form").on("submit", function (event) {
					event.preventDefault();
					
					// On recupere la valeur du champ select (id personne)
					var perso = $("#personne").val();
					var perso = "personne="+perso;
					
					var parametres = $(this).serialize();
					// serialize() recupere tous les names et values d'un formulaire et nous l'envoi dans un format correct GET
					// equivalent en JS FormData
					console.log(parametres);
					
					// Fichier cible // On recupere la valeur de l'attribut action="" du formulaire
					var file = $(this).attr("action");
					console.log(file);
					
					// methode // On recupere la valeur de l'attribut method="" du formulaire
					var method = $(this).attr("method");
					console.log(method);
					
					// http://api.jquery.com/jquery.ajax/
					
					$.ajax({
						url:file,			// url: "ajax_json.php"
						type: method,		// type : "POST"
						data: parametres, 		// data: "personne="+perso, 
						dataType: "json",	// il faut preciser le format des données reçues
						success: function(reponse) {
							$("#resultat").html(reponse.resultat); // La fonction que serà execute lors de la reception de la reponse.
						}
					}, "json");
					
					// avec la methode de jquery post
					$.post(file, parametres, function(reponse){
						$("#resultat").html(reponse.resultat);
						// $.post(lefichiercible, lesparametres, fonctionadeclencher, format)
						
					});
				});
				
			});
		</script>
		
	</body>
</html>
