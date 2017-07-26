<?php 

//06-surcharge-abstraction-finalisation-interface-trait/interface.php 
interface Mouvement
{
    public function start();
    public function turnLeft();
    public function turnRight();
}
class Bateau extends Vehicule implements Mouvement
{
   public function start(){
       //Traitement de la methode
   }

    public function turnLeft(){
       //Traitement de la methode
   }

    public function turnRight(){
       //Traitement de la methode
   }
}
class Avion extends Vehicule implements Mouvement
{
     public function start(){
       //Traitement de la methode
   }
     
     public function turnLeft(){
       //Traitement de la methode
   }

     public function turnRight(){
       //Traitement de la methode
   }
}

/*
Commentaires :
    -Un interface est une liste de methodes (sans contenu) qui permet de gatrantir que toutes les classes qui implements l'interface contiendront les memes methodes. Cela garantit une convention de nommage.C'est une sorte de contrat passé entre le developpeur maitre (lead dev') de l'application, et les autres dev'.

    -Une interface n'est pas instanciable. 
    -Par exemple : Bateau et Avion, appartiennent au groupe "Vehicule" , et partagent un point commun "Mouvement". (implements). 

    - il est possible d'implementer plusieurs interfaces (class H implements I,J)
    -Une classe peut herité d'une autre et en meme temps implementer une ou plusieurs interfaces(s)
    -Les methodes d'une interface sont forcement public, sinon elles ne pourraient pas étre redefinie.  
*/
