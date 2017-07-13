<?php

//Pour voir les fichiers de session => dossier tmp à la racine du serveur(xampp / wamp /mamp/... )

//pour creer une session On démarre la session AVANT toute chose
session_start(); // crée une session ou ne fait que ouvrir si la seesion existe dejà
// lors de la creation d'une session , un cookie d'identifiant est crée cote utilisateur pour avoir le lien entre la session et l'utilisateur.
// Comme pour setCookie(), la fonction session_start() doit etre execute avant le moindre affichage html !!!!


$_SESSION['pseudo'] = "Marie"; // $_SESSION est une SUPERGLOBALE, toutes les superglobales sans exceptions sont des tableaux array.Il est donc possible de créer des indices avec valeurs dans notre session.

$_SESSION['password'] = "soleil";
$_SESSION['email'] = "mail@mail.fr";
$_SESSION['age'] = "40";
$_SESSION['adresse']['ville'] = 'Paris';
$_SESSION['adresse']['code_postale'] = '75000';
$_SESSION['adresse']['adresse'] = 'rue blabla';


echo 'Premier affichage de la session : <br />';
echo '<pre>'; print_r($_SESSION); echo '</pre>';

// pour supprimer un element de la session: unset()




echo 'Deuxieme affichage de la session : <br />';
unset($_SESSION['password']);
echo '<pre>'; print_r($_SESSION); echo '</pre>';


// Pour detruire la session
session_destroy();// Nous permet de supprimer la session EN REVANCHE il faut savoir que l'information session_destroy() est vue par l'interpreteur php ,mise de cote puis executé uniqiement a la fin du script en cours.

echo 'Troisiemeaffichage de la session apres le session_destroy() : <br />';
echo '<pre>'; print_r($_SESSION); echo '</pre>';











?>