<?php
//10-autoload/autoload.php

function inclusion_automatique($className){
	// la class A est dans le fichier A.class.php
	require $className . '.class.php';
	
	//----------------
	echo 'On passe dans l\'autoload<br/>';
	echo 'On fait un : require "' . $className . '.class.php"<br/>'; 
}

//-----------------------------
spl_autoload_register('inclusion_automatique'); 
//-----------------------------
/*
Commentaires :
	spl_autoload_register : 
		- Est une fonction super pratique, qui va s'éxécuter lorsqu'elle voir passer le mot clé "new". 
		- Elle va lancer une fonction... celle que nous allons lui préciser en argument. 
		- Elle va apporter à ma fonction le(s) mot(s) qui suis le mot clé "new" --> C'est à dire le nom de la classe !
*/