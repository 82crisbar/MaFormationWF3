<?php

//04-constante-startic-self/singleton.php_ini_loaded_file

// Design Pattern (patron de conception): C'est une reponse trouvée par d'autres developpeur à une probleme rencontré par la communauté.$_COOKIE

//Singleton : C'est la reponse a la question suivante:
//           -> Comment faire pour créer une classe qui ne peut etre instanciable qu'UNE SEULE ET UNIQUE FOIS?

class Singleton
{

    private static $instance = NULL;// D'abord NULL puis va contenir l'UNIQUE objet de la classe singleton
    private function  __construct(){} // Fonction private, donc la classe ne peut étre instanciée 
    private function __clone(){} // Fonction private, donc l'objet de la classe ne pourra pas être cloné

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Singleton;
            // ou self::$instance = new self;
        }
        return self::$instance;
    }
     

}
//$singleton = new Singleton; // IMPOSSIBLE!!!

$objet = Singleton::getInstance();
echo '<pre>';
var_dump($objet);
echo '</pre>';