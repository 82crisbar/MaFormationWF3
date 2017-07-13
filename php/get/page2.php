<style>
	* {
		font-family:sans-serif;
	}
	h1{padding: 10px; background-color:darkred; color:white;}
</style>

<?php
// sur page1.php et page2.php mettre un titre avec le nom de la page et un lien qui permet de passer d'une page vers l'autre
echo '<h1>Page 2</h1>';
echo '<a href="page1.php">Go to page 1</a>';

// Pour recuperer une ou des informations depuis l'url, nous pouvons utiliser le protocole HTTP GET
// en PHP nous utilison la superglobale $_GET
// Une superglobale est disponible dans dans toutes les enviroments, notamment dans une fonction sans avoir besoin de l'appeller avec le mot cle "global"
// Toutes les superglobales sont des tableaux ARRAY

// Dans l'url le "?" precise que l'url est finie, tout ce qui se trouve apres le ? sont des infos que nous retrouverons dans $_GET
// SYNTAXE
// ?indice1=valeur1&indice2=valeur2&indice3=valeur3 etc...
	echo'<pre>';print_r($_GET);'</pre>';

// ! \\ $_GET & $_POST sont toujours existantes !!!
// si je fais: if(isset($_GET)) la reponse sera systematiquement "vrai"

if(isset($_GET["article"]) && isset($_GET["couleur"]) && isset($_GET["prix"]))

{
echo 'L\'article est: ' . $_GET["article"]. '<br/ >';
echo 'La coleur est:' . $_GET["couleur"] . '<br/ >';
echo 'Le prix est:'  . $_GET["prix"] . '<br/ >'; 
}
