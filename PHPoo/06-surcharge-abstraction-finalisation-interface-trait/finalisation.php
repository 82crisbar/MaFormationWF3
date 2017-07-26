<?php

//06-surcharge-abstraction-finalisation-interface-trait/finalisation.php 

final class Application
{
    public function run(){
        return 'L\'application se lance';
    }
}
//-----------------------------------------
$app = new Application;
$app -> run();

// Class Extensions extends Application{} // Une classe finale ne peut étre heritée!

//--------------
class Application2
{
    final public function run2(){
        return 'L\'application se lance';
    }
}
class Extension2 extends Application2
{
    // Public function run2(){} // Une methode finale ne peut pas etre redefinie,ne surchargée
}

/*
COMMENTAIRES: 
    -Une classe finale ne peut pas être heritée
    -Une classe finale peut être instancie 

    -Une méthode finale peut être presente dans une classe normale
    -Une méthode finale peut ne peut pas être surchargée, ni redéfinie. 
*/
