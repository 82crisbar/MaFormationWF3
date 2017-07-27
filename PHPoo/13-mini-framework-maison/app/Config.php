<?php 
//app/Config.php

class Config 
{
    protected $parametres;

    public function __construct(){
        require __DIR__ . '/Config/parametres.php';
        $this -> parametres = $parametres;
        // Au moment où j'instancierai ma classe config, je récupére les parametres du site pour les stocker dans la propriété $parametres. 
    }
    public function getParametersConnect(){
        return $this -> parametres['connect'];
        // Cette fonction me retourne seulement la partie connexion de paramétres.Elle serà utile à PDOManager.
    }
}
//$config = new Config;
//echo '<pre>';
//print_r($config -> getParametersConnect());
//echo '</pre>';