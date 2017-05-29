/*--------------------------------------------------

                Les Conditions
--------------------------------------------------*/

var MajoriteLegaleFR = 18;

if(16 > MajoriteLegaleFR) {
    alert("Bienvenu ! ");
} else {
    alert( "Salut");
}   

/*----------------------------------------------------------------            

                    Exercice!!!!!!!!!!!

Creer une fonction permettant de verifier l'age d'un visiteur (prompt)
Majorite legale = Welcome
sinon = redirection vers Google

----------------------------------------------------------------------*/

/*function Verif() {

let age = parseInt(prompt("Hello How old are you ?" , "<Saisir votre Age>"));
console.log(age);
console.log(typeof age);
                                                                                        MY WRONG ONE                
if(16 > MajoriteLegale) {
    alert("Bienvenu ! ");
} else {
    alert( "redirecting to Google...");
}

}  

Verif();*/                  

var MajoriteLegaleFR = 18;

function verifierAge() {
    return parseInt(prompt("How old are you","<Your age>"));
}
if(verifierAge() >= MajoriteLegaleFR) {
    alert("welcome");
  }  else {
        alert("Fuck off this site");
        document.location.href = "https://www.google.fr/search?q=google&oq=google&aqs=chrome..69i57j0l2j69i60l3.2055j0j8&sourceid=chrome&ie=UTF-8";
    }


/*----------------------------------------------

         Les Operateurs de Comparaison

-----------------------------------------------*/

// -- L'operateur de comparaison  "==" signifie : egal a...
// -- Il permet de verifier que 2 variables sont identiques
//-- L'operateur de comparaison  "===" signifie : Strictement egal a...
//-- Il va comparer la valeur et aussi le type de donnee.
//-- L'operateur de comparaison  "!=" signifie : Different de...
// -- L'operateur de comparaison  "!==" signifie : Strictement different de...

/*-----------------------------------------------------------

            EXERCICE
Espace securise, verifier mail avec mot de passe... 
-----------------------------------------------------------*/

// base de donnes 

var email, mdp;

email = "wf3@hl-media.fr";
mdp   = "wf3";


