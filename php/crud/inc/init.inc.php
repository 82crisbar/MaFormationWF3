<?php 
// connexion BDD
$pdo = new PDO('mysql:host=localhost;dbname=crud', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Ouverture de session 
session_start();

// Declaration de variable
$content = '';

// inclusion de fichiers
require_once('function.inc.php');

// Variable pour l'affichage des messages
$message= '';