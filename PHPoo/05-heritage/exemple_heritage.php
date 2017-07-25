<?php 
// 05-heritage/exemple_heritage.php_ini_loaded_file

class Membre 
{
    public $id_membre;
    public $pseudo;
    public $email;

    public function seConnecter(){
        return 'Je me connecte ! ';
    }
    public function inscription(){
        return 'Je m\'inscris !';
    }
}
class Admin extends Membre // La classe Admin herite de la classe Membre
{
    public function accesBackOffice(){
        return 'J\'ai accés au BO !';
    }
}
//-------------------------------------------------------
$admin = new Admin;
echo $admin ->seConnecter() . '<br />';
echo $admin ->inscription() . '<br />';
echo $admin ->accesBackOffice() . '<br />';

/*
Un admin c'est avant tout un membre avec une fonctionnalité supplementaire: L'acces au backoffice
Il est donc membre et qu'on ne re-ecrive pas tout le code deux fois!
*/