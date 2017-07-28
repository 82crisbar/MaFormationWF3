<?php
//Vendor/Manager/Application.php

namespace Manager;

final class Application
{
    private $controller;
    private $action;
    private $argument;

    // La fonction construct() va recuperer les infos dans l'URL et les stocker
    public function __construct(){
        if(isset($_GET['controller'])){
            if(file_exists(__DIR__ . '/../../src/Controller/' . ucfirst($_GET['controller']) . 'Controller.php')){
                $this -> controller = 'Controller\\' . ucfirst($_GET['controller']) . 'Controller';
                // Si le controleur existe bien dans mon dossier controller alors je stocke son "nom" dans ma proprieté $controller. 
            }
            else{
                require __DIR__ . '/../../src/View/404.html';
                //Sinon j'affiche la page 404
            }
        }
        else{
            $this -> controller = 'Controller\ArticleController';
            $this -> action = 'afficheAll';
            // Cela correspond finalement a notre homepage
        }

        if(isset($_GET['action'])){
            $this -> action = $_GET['action'];
            // S'il y a un action dans l'URL alors je stocke son "nom" dans la propriete $action 
        }
        else{
            $this -> controller = 'Controller\ArticleController';
            $this -> action = 'afficheAll';
            // Cela correspond finalement a notre homepage
        }
        // Reccuperation de l'ID s'il y en a un:
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $this -> argument = (int) $_GET['id'];
        }

        //Recuperation de la categorie s'il y a une 
        if(isset($_GET['cat']) && !empty($_GET['cat'])){
            $this -> argument = (string) $_GET['cat'];
        }
        // Recuperer du terme de recherche passé en post
        if(isset($_GET['recherche']) && !empty($_GET['search'])){
            $this -> controller = 'Controller\ArticleController';
            $this -> action = 'rechercher';
            $this -> argument = $_POST['search']; 
        }

    }
    //La fonction run() va instancier le bon controller, et lancer la bonne action 
    public function run(){
        if(!is_null($this -> controller)){
            $a = new $this -> controller;
            // J'instancie le controlleur demandé dont on avait stocke le "nom" dans $this -> controller

            if(!is_null($this -> action) && method_exists($a, $this -> action)){
                // Si $this -> action n'est pas null et que la methode existe dans mon objet $a

                $action = $this -> action;
                if(!is_null($this -> argument)){
                    $a -> $action($this -> argument);
                    // $a -> categorie(pantalon)
                }
                else{
                    $a -> $action();
                    // $a -> afficheall();
                }
            }
            else{
                require __DIR__ . '/../../src/View/404.html';
            }
        }
        else{
            require __DIR__ . '/../../src/View/404.html';
        }

    }
}