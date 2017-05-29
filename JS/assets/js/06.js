/*------------------------------------

            LES FONCTIONS

-------------------------------------*/

// -- Declarer une fonction
// -- Cette fonction en retourne aucun valeur 

function DitBonjour() {
    // lors de l'appel de la fonction les instructions seront executees
    alert("Bonjour !");
}            

// -- Je vais appeler ma fonction "DitBonjour" et declancher ses instructions.

DitBonjour();

// -- Declarer une fonction que va q prendre une variable en parametre

function Bonjour(Prenom, Nom) {
    document.write("<p>CIAO  <strong>" + Prenom + " " + Nom + "</strong> !</p>");
}

// -- Appeler / utiliser une fonction avec un parametre

Bonjour("Cristian", "Sirch");

// -- Ou 

var Prenom = "Cristian";
var Nom    = "SIRCH";

Bonjour(Prenom,Nom);

/*------------------------------------

EXERCICE :
Creez une fonction permettant d'effectuer l'addition de deux nombres passes en parametre.
------------------------------------*/

function Addition(nb1,nb2) {
    var resultat = nb1 + nb2;

//-- Le mot cle "return" permet de renvoyer un valeur en sortie.    
    return resultat;

}

var resultat = Addition(10, 5);
document.write ("<p>" + resultat + "</p>");