<?php
//05-Heritage/instance_sans_heritage.php 

class A 
{
    public function direBonjour(){
        return 'Bonjour ! ';
    }
}
//-------------
class C{}
//-------------
class B extends C // B herite de C... donc ne peut pas heriter de A
{
    public $maVariable;// contient un objet de la class A 

    public function __construct(){
        $this -> maVariable = new A;
    }
}
//---------------
$b = new B;
echo $b -> maVariable -> direBonjour();
// echo objet_de_la_class -> direBonjour();


/*
COMMENTAIRES : 
    Nous avons un objet dans un objet. 

    L'interet d'avoir un instance sans heritage (recuperer un objet dans la proprieté d'une classe) est de pouvoir heriter d'une classe méme d'un coté tout en ayant la possibilité de recuperer les elements d'une autre classe en meme temp.
*/