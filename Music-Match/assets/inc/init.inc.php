<?php
//connexion a la BDD 
$pdo = new PDO('mysql:host=localhost;dbname=bdd_project', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Appel du fichier contenant toutes notres fonctions
require_once("function.inc.php");


//Creation de variables pouvant nous servir dans le cadre du project:
//variable pour afficher des messages à l'utilisateur
$message = "";

//ouverture de la session
session_start();



