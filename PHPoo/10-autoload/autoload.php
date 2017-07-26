<?php

//10-autoload/autoload.php 

function inclusion_automatique($className){
    // La class A est dans le fichier A.class.php 
    require $className . '.class.php';

    //-----------------
    echo 'On passe dans l\'autoload<br/>';
    echo 'On fait un : require "' . $className . '.class.php"<br/>';

}


//--------------------------
spl_autoload_register("inclusion_automatique");
//--------------------------
/*
COMMENTAIRE:
    spl_autoload_register :
        -Est une fonction super pratique, qui va s'executer lorsqu'elle voir passer le mot clé "new". 
        -Elle va lancer une fonction... celle que nous allons lui preciser an argument. 
        -Emme va apporter a ma function le(s) mot(s) qui suis le mot clé "new", cet a dire le nom de la classe!
*/
