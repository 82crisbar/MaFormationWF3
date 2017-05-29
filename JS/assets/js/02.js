// -- Declarer un Tableau numerique
var monTableau  = [];
var myArray     = new Array;

// -- Affecter des valeurs a un Tableaux numerique
monTableau[0] = "Hugo";
monTableau[1] = "Tanguy";
monTableau[2] = "Geraldine";

// -- Afficher le contenu de mon tableau numerique dans la console.
console.log(monTableau[0]); // -- Hugo
console.log(monTableau[2]); // -- Geraldine
console.log(monTableau);    // -- Affiche tout mon Tableau

// -- Declarer et affecter des valeurs a un tableau numerique
var NosPrenoms = ["Yimin", "Alex", "Cristian", "Tristan"];
console.log(NosPrenoms);
console.log(typeof NosPrenoms);

// -- Declarer et affecter des valeurs a un object.(Pas de tableaux associatif en JS)
var Coordonnee = {
    "prenom"   :   "Hugo",
    "nom"      :   "LIEGEARD",
    "age"      :   "27" 
}

console.log(Coordonnee);
console.log(typeof Coordonnee);

// -- Comment creer et effecter des valeurs a un tableau a 2 dimensions
var listeDePrenoms  = ["Hugo","Rodrigue","Mario"];
var listeDeNoms     = ["LIEGEARD","NOUEL","SOUKAI"];

// -- Je vais creer un tableau a partir de me 2 tableaux precedents 
var Annuaire = [listeDePrenoms, listeDeNoms];
console.log(Annuaire);

// -- Annuaire un nom et un prenom sur ma page html
document.write(Annuaire[0][1]);
document.write(" ");
document.write(Annuaire[1][1]);

/*----------------------------
 EXERCICE :

 Creez un tableau a 2 dimensions appele "AnnuaireDesStagiaires" qui contiendra toutes les cordonnes pour chaque stagiaire 

 ex. nom, prenom, tel

 ---------------------------*/
var AnnuaireDesStagiaires = [
        {"prenom" : "Frank",  "nom" : "Ciao",  "tel"  :  "844513215845" },
        {"prenom" : "Frank",  "nom" : "Sirch", "tel"  :  "84451329877" },
        {"prenom" : "Audrey",  "nom" : "Mandi",  "tel"  :  "844521321554" },
]

console.log(AnnuaireDesStagiaires);
console.log(AnnuaireDesStagiaires[0].nom); //--Ciao
console.log(AnnuaireDesStagiaires[1].nom); //--Sirch

/*---------------------------------------------------

                AJOUTER UN ELEMENT

-----------------------------------------------------*/

var Couleurs = ["Rouge", "Jaune", "Vert"];

// -- Si je veux rajouter un element dans mon tableau
// -- Je fait appel a la function push() qui me renvoi le nombrees d'elements de mon tableau.

console.log(Couleurs);
var nombreElementsDeMonTableau = Couleurs.push("Orange");
console.log(Couleurs);
console.log(nombreElementsDeMonTableau);

// -- Nb : La fonction unshift() permet d'ajouter un ou plusieurs elements en debut de tableau.

/*---------------------------------------------------------

         RECUPERER ET SORTIR LE DERNIER ELEMENT 

----------------------------------------------------------*/

// -- La fonction pop() me permet de supprimer le dernier element de mon tableau et d'en recuperer 
// -- la valeur. Je peux accessoriement recuperer cette valeur dans une variable.

var monDernierElement = Couleurs.pop();
console.log(monDernierElement);
console.log(Couleurs);

// -- La meme chose est possible avec le premier element utilizant la function shift();
// -- Nb : La function splice() vous permet de faire sortir un ou plusieurs elements de votre tableau.

