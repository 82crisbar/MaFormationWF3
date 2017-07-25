<?php 
//04-constante-startic-self/Maison.class.php_ini_loaded_file

class Maison
{
    public $couleur = 'blanc';// Appartient a l'objet
    public static $espaceTerrain = '500m2';// Appartient à la class "Maison"
    private $nbPorte = 10;// Appartient a l'objet
    private static $nbPiece = 7;// Appartient à la classe
    const HAUTEUR = '10m'; // Appartient à la classe
    
    public function getNbPorte(){
        return $this -> nbPorte;
    }

    public static function getNbPiece(){
        return self::$nbPiece;
    }



}
echo 'Terrain :' . Maison::$espaceTerrain . '<br />';// OK j'accede à un élément de la class par la class. 
echo 'Pieces :' . Maison::getNbPiece() . '<br />';// OK j'accede à un élémént private de la class via un getter appartenant à la class.
echo 'Hauteur :' . Maison::HAUTEUR . '<br />'; // Ok j'accede à un element const de la class via la class
//-------------------------------------------------------------
$maison = new Maison;
echo 'Couleur : ' . $maison-> couleur . '<br />'; // Ok j'accede a une proprieté public via l'objet
//echo 'Terrain : ' . $maison-> espaceTerrain . '<br />';// Erreur j'essaye d'acceder a une proprieté appartenant à la classe par l'objet.$_COOKIE
//echo 'Nombre de porte :' . $maison-> nbPorte . '<br />';// Erreur : private -> getter
echo 'Nombre de porte :' . $maison-> getNbPorte() . '<br />';// OK j'accede à un élément appartenant a l'objet, et private via un getter appartenant a l'objet

/*
COMMENTAIRES:
    OPERATEURS:
        $objet -> : permet d'acceder a un élémént d'un objet à l'exterieur de la class
        $this ->  : permet d'acceder a un élémént d'un objet à l'interieur de la class
        Class::   : permet d'acceder a un élémént d'une class à l'exterieur de la class
        self::    : permet d'acceder a un élémént d'une class à l'interieur de la class

        2 Questions a se poser:
            -Est que l'element est static?
                    -> si OUI (Class::  /self::)
                    -est ce que je suis a l'interieur ou a l'exterieur de la classe?
                            -interieur : self::
                            -exterieur : Class::
                    -> si NON ($objet ->   / $this-> )
                            -interieur : $this->
                            -exterieur : $objet->

    STATIC signifie que un element appartient a la class. Pour y acceder on devra donc l'appeller par la class(Class:: ou self::). Une proprieté peutn etre modifiée et tous les objets qui suiveron auront la nouvelle valeur (example singleton).

    CONST signifie qu'une proprieté appartient a la class et qu'elle ne peut pas etre modifiée                        
*/
