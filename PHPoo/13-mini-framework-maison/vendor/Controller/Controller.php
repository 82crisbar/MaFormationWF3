<?php

//vendor/Controller/Controller.php_ini_loaded_file

namespace Controller;

use Model;

class Controller
{
    protected $model;// Contiendra un objet model correspondant au controller dans lequel je suis. (Ex: ArticleController ----> ArticleModel)

    public function getModel(){
        // get_called_class() = Controller\ArticleController
        //Article
        // new Model\ArticleModel

        $class = 'Model\\' .str_replace(array('Controller\\' , 'Controller'),'', get_called_class()) . 'Model';
        // La ligne ci-dessus à transformé "Controller\ArticleController" en "Mode\ArticleModel"

        $this -> model = new $class;
        //$this -> model = new Model\ArticleModel

        return $this -> model; 

    }
    public function render($layout, $view,array $params){
        $dirView = __DIR__ . '/../../src/View/';

        $dirFile = str_replace(array('Coontroller\\', 'Controller'), '', get_called_class());

        $path_view = $dirView .$dirFile . '/' . $view;
        // c://xampp/htdocs/PHPoo/13-framework/src/View/Article/Boutiqie.html
        $path_layout = $dirView . $layout;
         //c://xampp/htdocs/PHPoo/13-framework/src/View/layout.html

         extract($params);
         //Grace à ace extract(), les indices de mon array $params deviennent des variables dans ma vue

         //---------------------------------------------------------

         ob_start(); // Cela declenche la temporisation de sortie. C'est a dire que la ligne qui suit ne va pas etre executée mais retenue en memoire tampon 
         require $path_view;
         $content = ob_get_clean(); // Ca va mettre dans la variable $content ce qui à été precedentement retenu (le require de ma vue)
        
         ob_start();
         require $path_layout;

         return ob_end_flush();// Returne tout ce qui a ete retenus. Il eteint la temporisation. 
    }

}