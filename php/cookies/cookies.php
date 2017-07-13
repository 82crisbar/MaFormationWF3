<?php

// recuperation du choix de l'utilisateur ou cas par default
if(isset($_GET['langue']))
{
	$langue = $_GET['langue'];// choix de l'utilisateur c'est la priorite
}
elseif(isset($_COOKIE['langue']))
{
	$langue = $_COOKIE['langue'];
}
else {
	$langue = 'fr'; // cas par default
	// langue = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);// cas x default
}

$un_an = 365*24*3600; // nb_de_nb_heures_dans_une journe*seconds dans une heure

// Creation d'un cookie sur le poste utilisateur
//!\\ La fonction setCookie() doit etre appeler avant le moindre affichage dans la page!!
// pour generer un cookie: 3 arguments setCookie(nom, valeur, duree_de_vie)

setCookie("langue", $langue, time()+$un_an);
//setCookie("langue", $langue, time()-1); Pour effacer le cookie je met la valeur du time() a -1
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	
	<body>
		<ul>
			<li><a href="?langue=fr">France</a></li>
			<li><a href="?langue=es">Espagne</a></li>
			<li><a href="?langue=it">Italie</a></li>
			<li><a href="?langue=en">Angleterre</a></li>
		</ul>	
		<?php
			// affichage d'un texte selon la langue
			switch($langue) // On teste la valeur langue
			{
				case 'fr':
					echo '<p>Bonjour,<br /> vous visitez le site en langue francaise</p>';
				break;	
				case 'en':
					echo '<p>Hello,<br /> vous visitez le site en langue francaise</p>';
				break;	
				case 'it':
					echo '<p>Buongiorno,<br /> vous visitez le site en langue francaise</p>';
				break;	
				case 'es':
					echo '<p>Hola,<br /> vous visitez le site en langue francaise</p>';
				break;	
				default:
					echo '<p>Langue inconnue</p>';
				break;	
			}
			
			//echo '<pre>'; print_r($_SERVER); echo '</pre>';
			// Il est possible de recuperer la langue du navigateur de l'utilisateur
			
			echo 'langue du navigateur: ' . substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) . '<br />';
			echo '<pre>'; print_r($_COOKIE); echo '</pre>';
		?>	
	</body>
</html>