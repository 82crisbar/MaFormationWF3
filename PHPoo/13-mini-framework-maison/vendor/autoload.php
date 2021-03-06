<?php
// vendor/autoload.php

class Autoload
{
    public static function inclusion_automatique($className){

        //Voilà ce qu'on attende de notre autoload

        //new Controller\ArticleController
        //require "src/Controller/ArticleController.php"

        //new Entity\Article
        //require 'src/Entity/Article.php'

        //new Controller\Controller
        //require 'vendor/Controller/Controller.php'

        //new Manager\PDOManager
        //require 'vendor/Manager/PDOManager.php'

        $tab = explode('\\',$className); 

        if(
            $tab[0] == 'Manager' 
            ||
            ($tab[0] == 'Controller' && $tab[1] == 'Controller') 
            || 
            ($tab[0] == 'Model' && $tab[1] == 'Model')){
                $path = __DIR__ . '/' . implode('/',$tab) . '.php';

        }
        else{
            $path = __DIR__ . '/../src/' . implode('/',$tab) . '.php';
        }
        //---------------------------------------
        echo '<pre> Autoload : ' . $className . '<br />';
        echo '==> require "' . $path . '"</pre>';
        //---------------------------------------

        require $path;
    }
}

//--------------------------
spl_autoload_register(array("Autoload","inclusion_automatique"));
//---------------------------
/*
Commentaires:
    Spl_autoload_register() et POO attend en argument un array avec les valeurs suivantes:
        -1:Le nom de la classe
        -2: Le nom de la methode qui va etre static
        (OBLIGATORIEMENT)
        ----> Autoload::inlusion_automatique($className)
*/        
