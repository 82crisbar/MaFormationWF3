/*----------------------------------
            LA CONCATENATION
----------------------------------*/

var DebutDePhrase      =   "Aujourd'hui";
var DateDuJour         =   new Date();
var SuiteDePhrase      =   ", sont présents :";
var NombreDeStagiaires =   19;
var FinDePhrase        =   " stagiaires.<br>";


// -- Nous sougaiton maintenant , grace a la concatenation, afficher tout ce petit monde, en un seul morceau !

document.write(DebutDePhrase + DateDuJour.getDate() + "/" + (DateDuJour.getMonth() + 1) + "/" + DateDuJour.getFullYear() + SuiteDePhrase + NombreDeStagiaires + FinDePhrase);

var phrase1 = "Je m'appelle ";
var phrase2 = "Cristian et j'ai ";
var age     = 35;
var phrase3 = " ans !"

document.write(phrase1 + phrase2 + age +phrase3);