<style>
* { font-family: calibri; }
h1 { padding: 10px; color: white; background-color: blue; }
</style>
<h1>Ecriture affichage</h1>
<!-- Tout d'abord il est possible d'ecrire du html dans un fichier php en revanche l'inversa n'est pas possible -->

<?php // balise php ouverture et fermeture ?>
<?php 
// Instruction d'affichage
// variable: types/ declaration / affectation
// Concatenation 
// Guillemets et quotes
// Constante
// Condition et operateurs de comparaison
// Function predefinie
// Fonction utilisateur
// Boucle
// Inclusion
// Array
// Classe et Objet.

echo 'Bonjour';       // echo est une instruction permettant d'effectuer un affichage
echo '<br />';        // il est possible de mettre du html 
echo 'Bonjour<br />'; // si vous regardez le code source il n'est pas possible de voir le code php car dejà interpreté depuis le serveur.
print 'Print estr une autre instruction d\'affichage similaire a echo<br />';

// les commentaires en php 
// ceci est un commentaire sur une seule ligne 
/*
ceci un commentaire 
sur plusieurs 
lignes
*/  
// Autre instructiopn d'affichage mais specifique aux phases de developpement: print_r() & var_dump()
echo '<h1>Variables: types /declaration / affectations</h1>';
// definition : une variable est un espace nommé permattant de conserver une valeur.

// Declaration d'une variable avec le signe dollar ($)// une variable est sensible a la casse 
// caracteres autorisés de a-z , de 0-9 et le _ //!\\ UNE VARIABLE NE PEUT PAS COMMENCER PAR UN CHIFFRE!!!!!!

// Affectation d'une valeur avec le signe =
$a = 127;
echo gettype($a); // integer
echo'<br />';

$b = 1.5;
echo gettype($b); // double
echo'<br />';

$a = 'Une chaine de caracter';
echo gettype($a); // string
echo'<br />';

$b = '127';
echo gettype($b); // string 
echo'<br />'; 

$a = true; // ou true // ou l'inverse false / false
echo gettype($a); // booleean 
echo'<br />';

echo '<h1>Concatenation</h1>';
// En php nous utiliserons le . pour la concatenation que l'on peut traduire par "suivi de"

$x ="Bonjour "; // je force un'espace comme ca direct dans la phrase 
$y ="tout le monde";
echo $x . $y . '<br />'; // Ou direct dans la concatenetion $x .' ' $y . '<br />'

echo "<br />" , 'Coucou' , '<br />'; // Il est possible de faire la concatenation avec une virgule ',' en revanche uniquement avec echo. (erreur avec print)

echo '<h1>Concatenation lors de l\'affectation </h1>';
$prenom1 = "Bruno";
$prenom1 = "Claire";

echo $prenom1 . '<br />'; // Affiche Claire 

$prenom2 = "Bruno ";
$prenom2 .= "Claire"; // Equivalent a ecrire $prenom2 = $prenom2 . 'Claire';
// le .= permet de rajouter à l\'existant sans l\'ecraser 
echo $prenom2 . '<br />';  

echo '<h1>Guillemets & Quotes</h1>';

$message = "Aujourd'hui";
// ou
$message = 'Aujourd\'hui';

// concatenation

echo $message . 'il fait chaud<br />';
echo "$message  il fait chaud<br />";// Dans des guillemets , les variables sont reconnues et donc interpretees  
echo '$message  il fait chaud<br />';// Dans des quotes , les variables ne sont pas reconnues et donc interpretees comme du texte.

echo '<h1>Les constantes & constantes magiques</h1>';
// Une constante est un peu comme une variable un espace nommé nous permettant de conserver une valeur sauf que comme son nom l'indique, cette valeur ne pourrà pas changer durant l'execution du script.

define("CAPITALE", "Paris"); // 1er argument: Le nom de la constante / 2eme argument: sa valeur.
// Par convention une constante s'ecrit toujours en majuscule.Aussi quand on l'appelle 

echo CAPITALE . '<br />';

// Constante Magique.// Pas sensible a la caisse
echo __FILE__ . '<br />'; // Affiche le chemin complet jusq'a ce fichier
echo __LINE__ . '<br />'; // Affiche la ligne ou l'instruction se trouve

echo '<h1>Exercice sur les variables</h1>';
// Mettre les valeurs "lundi","Mardi","Mercredi" dans 3 variables.
// Affichage de "Lundi-Mardi-Mercredi" en appelant les variables

$day1 = "lundi ";
$day2 = "mardi ";
$day3 = "mercredi";

echo $day1 ." - ". $day2." - ". $day3;

echo '<h1>Operateurs arithmétique</h1>';
$a = 10;
$b = 2;
echo $a + $b . '<br />'; // Affiche 12
echo $a - $b . '<br />'; // Affiche 8
echo $a * $b . '<br />'; // Affiche 20
echo $a / $b . '<br />'; // Affiche 5
echo $a % $b . '<br />'; // Affiche 0 no rest on 10/2

// Facilite d'ecriture:
echo $a += $b . '<br />';// equivaut a $a = $a + $b
echo $a -= $b . '<br />';
echo $a *= $b . '<br />';
echo $a /= $b . '<br />';

echo '<h1>Structure conditionelles (if / elseif / else) et operateurs de comparaison </h1>';
// isset - empty ( isset = is set )

// isset test si l'element existe (s'il a été declare au prelable dans notre script par example)
// empty test si l'element est vide(A savoir empty verifie au prelable si l'element est defini avant le tester s'il est vide) 

$var1 = 0; // ou $var1 = ""; $var1 = false;

if(empty($var1))
{
	echo 'La variable var1 est vide ou non définie<br />';
}	

$var2 = "";
if(isset($var2))
{
	echo "La variable var2 existe ! <br />";
}
$a = 10; $b = 5; $c = 2;

if($a > $b) // si "a" est strictement superieur a "b"
{
	print"'a' est bien superieur à 'b' <br />";
}
else { // sinon => toutes les autres possibilites 
	print"'a' est n'est pas superieur a 'b' <br />";
}

// ET 
if($a > $b && $b > $c)// si a est suprieur a b et b est superieur a c 
{
	echo 'Ok x le deux conditions <br />';
}

// OU 
if($a == 9 || $b > $c) // Si a est egal a 9  ou si b est superieur a a C
{
	echo "ok pour au moin une de deux conditions <br />";
}

//XOR 
if($a == 10 XOR $b < $c) // Avec XOR on ne rentre dans la condition que si l'une de deux conditions est vrai. Si les deux conditions sont vrais on ne rentre pas
{
	echo 'Ok pour une seule des deux conditions <br />';
}
/* Avec XOR:
    -true XOR true => false
    -false XOR false => false
    -true XOR false => true
    -false XOR true => true
*/	

if($a == 8)
{
	print 'reponse 1<br />';
}
elseif($a != 10)
{
	print 'reponse 2<br />';
}
else {
	echo 'reponse 3<br />';
}

$a1 = 1;
$a2 = '1';

if($a1 == $a2)
{
	echo 'C\'est la meme chose <br />'; // avec === no 
}


/*
	=           Affectation 
	== 			Comparaison de valeur
	=== 		Comparaison de valeur et types
	!= 			different de (en terme de valeur)
	!== 		different de (en terme de valeur ou de type)
	>			strictement superieur
	<			strictement mineur
	>=			superieur ou egal
	<= 			mineur ou egal
*/

// forme contractée des if: autre ecriture 
echo ($a == 10) ? 'if en forme contractée<br />' : 'else en forme contractée<br />';

// le ? represente le if
// les : representent le else
	
// Affichage meteo
function affichage_meteo($saison, $temperature)
{
	return "Nous sommes en"  . $saison .  ' et il fait ' . $temperature . ' degré(s)<br />';
	echo 'nous sommes mardi<br />'; // cette instruction ne sera jamais executé apres un return.
	// Le return dans une fonction nous fait sortir de la fonction!!!
}
echo affichage_meteo('été', 27);
echo affichage_meteo('Hiver', -1);
echo affichage_meteo('Printemps', 18);


// Refaire la fonction affichage_meteo en generant le "en" qui doit etre "au" pour le printems et egalement, il faut gerer les "s" de degre(s)

/*function meteo($saison, $temperature)
{
	if($saison === printemps && $temperature <= 2 && $temperature >= -2)
	{
		return "Nous sommes au "  . $saison .  ' et il fait ' . $temperature . 'degré<br />'; 
	}	
	else
		return "Nous sommes en "  . $saison .  ' et il fait ' . $temperature . ' degré(s)<br />';
}
echo meteo('Printemps', -1);*/

function meteo($saison, $temperature)
{
	$en = 'en';
	$s  = 's';
	
	if($saison == 'Printemps')
	{
		$en = 'au';
	}
	
	if($temperature > -2 && $temperature < 2)
	{
		$s = "";
	}
	return "Nous sommes ".$en. " " . $saison .  ' et il fait ' . $temperature . ' degré'.$s. '<br />';
}
echo meteo('Printemps', 18	);
echo meteo('Printemps', 1);
echo meteo('Hiver', -1);

echo '<h1>Condition Switch</h1>';
// les cases representent des cas differents dans lesquel nous pouvont potentiellement rentrer.
$couleur = "jaune";
switch($couleur)
{
	case 'bleu':
		echo 'vous aimez le bleu<br />';
	break;
	case 'rouge':
		echo 'Vous aimez le rouge<br />';
	break;
	case 'vert' :
		echo 'Vous aimez le vert<br />';
	break;
	default:// toutes les autres possibilites...
		echo 'Vous n\'aimez pas ni le rouge, ni le vert ni, le bleu<br />';
	break;
}

// Exercice: refaire la condition precedente avec if /elseif /else

$couleur = "jaune";

if($couleur === "bleu")
	{
	echo 'vous aimez le bleu<br />';
	}
	elseif ($couleur === 'rouge')
	{
	echo 'Vous aimez le rouge<br />';
	}
	elseif ($couleur === 'vert')
	{
	echo 'Vous aimez le vert<br />';
	}
	else
	{
	echo 'Vous n\'aimez pas ni le rouge, ni le vert ni, le bleu<br />';
	}
	
echo '<h1>Fonctions predefinie</h1>';
// Une fonction predefinie est dejà inscrite dans le langage, le developpeur ne fait que l\'executer.

echo 'Date du jour:<br />';
echo date("d/M/Y H:i:s");
// Date est une function predefinie permettant d'afficher la date.
// en argument cette function accepte une chaine de caractere 
// selon les caracteres fournis cete function nous renvoie different format de date
// Voir la doc sur le site officiel: http://php.net/manual/en/function.date.php
echo '<hr />' . time() . '<hr />';// time() nous affiche le timestamp (nb de secondes ecoules depuis le 1er Janvier 1970)

// traitement des chaines (iconv_strlen() / strpos() / substr())
$email = 'cristiansirch@yahoo.it';
echo strpos($email, '@') . '<br />';

// strpos permet de chercher dans une chaine (fournie en 1er argument) une autre chaine (fournie en deuxieme argument)

//!\\ dans une chaine le premier caracter a la position 0

// valeur de retour 
	// Succes =>  on obtient un int (la position)
	// Echec => booleen false 

$email2 = "hjbvuierhv";
echo strpos($email2, '@') . '<br />';	
var_dump(strpos($email2, '@'));// On obtient un bool(booleen) false
							   // var_dump() est une instruction d'affichage ameliorée nous affichant la valeur de ce qu'on test + son type et si le type est string on obtient egalement sa longueur .
// Ici var_dump() nous permet de voir le false obtenu via la fonction strpos()

//icon_strlen
$phrase = 'Morbi lacinia aliquet sodales. Nullam in nunc ultricies massa ornare rhoncus quis non nunc. Vestibulum eget dui dolor. Phasellus eget lorem eget ex placerat tristique.';

echo '<br />';
echo iconv_strlen($phrase) . '<br />';
// iconv_strlen permet de compter le nombre de caracter dans une chaine 
// succes => int (la longueur de la chaine)

// substr 
$texte = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mollis, odio a congue efficitur, urna dui auctor urna, pellentesque tincidunt metus augue ac dolor.';
echo substr($texte, 0, 35) . "...<a href='#'>Lire la suite</a>";
// substr permet de decouper une chaine 
	// 1er  Argument => La chaine a decouper
	// 2eme Argument => La position de depart
	// 3eme Argument => Le nombre de caracteres a renvoyer (Cet argument est facultatif s'il n'est pas present on recupere tout depuis la position de depart)
 
echo '<h1>Fonction Utilisateur</h1>';
// Non inscrite au langage, c\'est le developpeur qui le declare puis les execute.

function separation()
{
	echo '<hr /><hr /><hr />';
}

// execution:
separation();

// fonction avec 1 argument 
function bonjour($qui)
{
	return "Bonjour" . $qui . '<br />';
}
// Une return nous renvoye le resultat de cette function en revanche si l'on veut faire un affichage il faudra passer par un echo
echo bonjour('Cristian');
$prenom = " marie";
echo bonjour($prenom);

// Fonction pour appliquer la tva 
function applique_tva($nombre)
{
	return $nombre * 1.2;
}
echo applique_tva(1000).'<br />';

// Exercice refaire la fonction precedente en donnant la possibilité a l'utilisateur de choisir le taux. (que ce ne soit pas figé sur le taux 1.2)

function appliquer_taux($nombre, $taux = 1.2)
{
	return $nombre * $taux;
}
echo appliquer_taux(1000) .'<br />';// Avec un argument initialisé par default il devient facultatif.Si je ne funis que un seul argument alors $taux à par default la valeur 1.2
echo appliquer_taux(3000, 4.2) .'<br />';

// Enviromment Global et Local
// Global => Le script complet
// Local => à l'interieur d'une fonction
function jour_semaine()
{
	$jour = 'lundi';
	return $jour;
}
// echo $jour; // $jour n'est pas defini dans l'espace global => erreur
echo jour_semaine() . '<br />';
$jour2 = jour_semaine();
echo $jour2 . '<br />';

// global vers locals
$pays = 'France';
function affichage_pays()
{
	global $pays;
	echo 'Le pays est:'. $pays . '<br />';
}
affichage_pays();// il est possible d'executer une function avant sa declaration car l'interpreteur php charge toutes les fonctions du script avant d'executer le script.

echo '<h1>Structure iterative:LES BOUCLES</h1>';
$i = 0; // Valeur de depart
while($i < 10)
{
	echo $i . ' - ';
	$i++; // incrementation ou decrementation // equivaut à ecrire $i =$i+1
}
echo '<br />';
// Donne 0 - 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9 - 
// Refaire la boucle en enlevant le dernier "-" apres la valeur 9
$i = 0;
while($i < 10)
{
	if ($i < 9) 
	{
		echo $i . ' - ';
	}		
	if ($i == 9)
	{  
		echo $i;
	}
	$i++;
}
// Donne 0 - 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9

echo '<br />';
// Boucle for 
// For (Valeur_de_depart; condition d'entrée; incrementation)
	
for($i = 0; $i < 10 ; $i++)
{
	echo $i;
}
// Afficher en utilisant while ou for un tableau html contenat 10 cellules 
// exemple
?>
<table style="border-collapse: collapse;" border="1">
	<tr>
		<td>0</td>
		<td>1</td>
		<td>2</td>
		<td>3</td>
		<td>4</td>
		<td>5</td>
		<td>6</td>
		<td>7</td>
		<td>8</td>
		<td>9</td>
	</tr>
</table>
<?php
// Pour aller plus loin faire un tableau allant de 0 a 99 avec 10 cellules x 10 lignes
echo '<table border="1"><tr>';
for($i = 0; $i < 10 ; $i++)
{
	echo '<td>'.$i.'</td>';
}
echo '</tr></table>';


// Et un tableau qui va de 0 a 99

echo '<table style="border-collapse:collapse; width:100%; text-align:center; color:green"; border="1";>';
for($y = 0; $y < 10 ; $y++)
{
	echo '<tr>';

	for($i = 0; $i < 10 ; $i++)
	{
		echo '<td>'.$y.$i.'</td>';
	}
	echo '</tr>';
}
	echo '</table>';


echo '<table>';

echo '<h1>Inclusion de fichier</h1>';
//creez un fichier dans le meme dossier ce que celui-ci: example.inc.php
//Dans ce fichier mettez du texte. (lorem ipsum,html,....)

echo '<b>Premiere fois avec include:</b><br />';
include("example.inc.php");

echo '<hr /><b>Premiere fois avec include:</b><br />';
include_once("example.inc.php");

echo '<hr /><b>Premiere fois avec include:</b><br />';
require("example.inc.php");

echo '<hr /><b>Premiere fois avec include:</b><br />';
require_once("example.inc.php");

/*Differences entre include et require:
En cas d'erreur comme par exemple une faute de frappe sur le nom du fichier ou le fichier a ete deplace etc...
-INCLUDE provoque un erreur mais continu l'execution du script
-REQUIRE provoque un erreur et bloque l'execution de la suite du sccript
*/

echo '<h1>Les tableaux ARRAY</h1>';
//Un tableau ARRAY est declaré un peu comme une variable sauf que au lieu de conserver une seule et unique valeur, dans un tableau nous allons avoir un ensemble de valeurs.

// Declaration d'un tableau
$tableau = array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche");

// outil pour pouvoir voir le contenu du tableau
echo '<b>Affichage du tableau avec print_r</b><br />';
echo '<pre>';print_r($tableau);'</pre>'; 

echo '<b>Affichage du tableau avec var_dump</b><br />';
echo '<pre>';var_dump($tableau);'</pre>'; 

// Autre facon de declarer un tableau array 
$tab = array();
// le crochets ([]) indique a la machine que je vais a creer un tableau
$tab[] = "France";
$tab[] = "Italie";
$tab[] = "Espagne";
$tab[] = "Angleterre";
$tab[] = "Portugal";
$tab[] = "Belgique";
$tab[] = "Hollande";

echo '<pre>';print_r($tab);'</pre>';
echo '<pre>';var_dump($tab);'</pre>';
echo '<br />';
echo $tab[2];


echo '<br />';
echo 
'<br />';// Boucle foreach pour les tableaux de donne ARRAY et Object
foreach($tab AS $niq)
{
	//Foreach est un util pour faire une boucle specifique aux tableaux array & object.
	// cette boucle est dinamique et tournera autant des fois qu'il y a des elements dans notre tableau ou Object
	// Le mot cle AS est obligatoire et permet de donner un alias via une variable qui representera a chaque tour de boucle la valeur en cours
	echo $niq . '<br />';
}


echo '<hr />';
// Pour recuperer egalement l'indice en cours , il nous suffit de rajouter une variable de reception apres le mot cles AS:
foreach($tab AS $ind => $niq)
{
	echo $ind . '-' . $niq . '<br />';
}

//Il est possible de choisir nous meme les indices
$plats = array('un' => 'Pates', 'deux' =>'Crepes', 'trois' => 'Salade de fruits', 77 => 'Eau');
echo '<pre>'; var_dump($plats); echo '</pre>'; 


$couleur = array();	
$couleur['j'] = 'gris';
$couleur['b'] = 'bleu';
$couleur['f'] = 'blanc';
$couleur['t'] = 'rouge';
$couleur['a'] = 'vert';
echo '<pre>'; var_dump($couleur); echo '</pre>'; 
echo $couleur['b'] . '<br />';


// Pour connaitre la taille d'un tableau (combien d'elements dans le tableau array)
echo 'Taille du tableau couleur ' . count($couleur) . '<br />';
echo 'Taille du tableau couleur ' . sizeof($couleur) . '<br />';



echo '<h1> Tableau array multidimensionel </h1>';
// Nous parlons de tableau array multidimensionnel lorsqu'un tableau est lui meme contenu dans une autre tableau.

$tableau_etudiants = array( 0 => array('pseudo' => 'Marie' , 'Nom' => 'Durant' , 'email' => 'marie@mail.fr') ,1 => array('pseudo' => 'Luc', 'Nom' => 'Dupond', 'email' => 'luc@mail.fr'), 2 => array('pseudo' => 'Cris', 'Nom' => 'Sirch', 'email' => 'Criss@mail.fr'));

$tableau_etudiants = array(
						0 => array(
							'pseudo' => 'Marie',
							'Nom' => 'Durant',
							'email' => 'marie@mail.fr'),

						1 => array(
							'pseudo' => 'Luc',
							'Nom' => 'Dupont',
							'email' => 'luc@mail.fr'),

						2 => array(
							'pseudo' => 'Cris',
							'Nom' => 'Sirch',
							'email' => 'criss@mail.fr')
							);
echo '<pre>'; print_r($tableau_etudiants); echo '</pre>';

echo $tableau_etudiants[1]['email']; // nous rentrons d'abords à l'indice 1 du premier niveau puis a l'indice 'email' du deuxieme niveau

$taille_tableau = count($tableau_etudiants);
for($i = 0; $i < $taille_tableau; $i++)
{
	// Afficher les mails du deuxieme niveau de ce tableau
	echo $tableau_etudiants[$i]['email'] . '<br />';	
}
echo '<hr />';

// Avec un foreach
foreach($tableau_etudiants AS $valeur)
{
	echo $valeur['email']. '<br />';
}
echo '<hr />';

// Double foreach
foreach($tableau_etudiants AS $valeur)
{
	foreach($valeur AS $val)
	{
		echo $val . '<br />';
	}
		echo '<hr />';
	}

echo '<h1> Les objets </h1>';
// Un objet est un'autre type de donne.Un peu a la maniere d'un array,il permet de conserver des valeurs mais ce la va plus loin puisqu'on peut egalement avoir des fonctions dans un object.
// Une information (variable) dans un objet s'appelle une PROPRIETE' ou ATTRIBUT 
// En revanche une fonction dans un objet s'appelle un METHODE 

// Un objet est toujours issu (crée par) d'une classe (son modele de construction)

// pour declarer une classe
class Etudiant
{
	public $prenom = 'Marie';
	// public est un mot clé permettant de preciser que l'element serà accessible directement sur l'object.Sinon il foudrait passer par des methodes permettant de recuperer cette proprieté ou de la modifier(il existe aussi protect/ private/ static)
	public $age = 25;
	public function pays()
	{
		return 'France';
	}
	
}

// Un objet est un conteneur symbolique, qui possede sa propre existence et incorpore des infos (proprietes) et des fonctions (methodes)
// Pour instantcier un objet
$mon_objet_1 = new Etudiant();// new est un mot clé obligatoire permettant d'instancier d'initializer   un objet depuis une classe 
$mon_objet_2 = new Etudiant();
echo '<pre>'; var_dump($mon_objet_1); echo '</pre>';
echo '<pre>'; var_dump($mon_objet_2); echo '</pre>';

// pour voir les methodes de l'objet 

echo '<pre>'; var_dump(get_class_methods($mon_objet_1)); echo '</pre>';

//Pour recuperer une proprieté de l'objet
echo $mon_objet_1->prenom .'<br />';

// pour recuperer une methode de l'object 
echo $mon_objet_1->pays() .'<br />';

// Modification d'une proprieté
$mon_objet_1->prenom = "Pierre";
echo $mon_objet_1->prenom .'<br />';

















































?>





	
 


















































 















