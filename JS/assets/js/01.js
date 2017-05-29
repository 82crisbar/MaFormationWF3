//alert("Wow ! Tu es sur ma page");

//Deux Slash pour faire un commentaire unligne.

/*
    Ici je peux faire un commentaire sur plusieurs lignes.

    RACCOURCI : CTRL + /
            ou  CTRL + SHIFT + /

*/

//-- 1 : Declarer une Variable en JS.
var Prenom;

//-- 2 : Affecter un valeur.
Prenom = "Cristian" ;

// --3 : Afficher la Valeur de ma Variable dans la console.
console.log(Prenom);

/*--------------------------------------------------------
|~~~~~~~~~~~~~~~ LES TYPES DE VARIABLES ~~~~~~~~~~~~~~~~~~|
----------------------------------------------------------*/

//-- Ici typeof me permet de connaitre le type de ma variable.
console.log(typeof Prenom);

// -- Declaration d'un nombre.
var Age = 40;

// -- Afficher dans la console.
console.log(Age);

// -- Connaitre son Type.
console.log(typeof Age);

/*--------------------------------------------------------------\
|                LA PORTEE DES VARIABLES                        
|  
|      Les Variables declerees directement a la racine          
|      du fichier JS sont appelees variables GLOBALES.          |
|      
|      Elles sont disponibles dans l'ensemble de votre          |
|      document, y compris dans les fonctions.
|                                                               |
|     ###
|     
|     Les variables declarees a l'interieur d'une function      |
|      sont appellee variables LOCALES.  
|    
|     ###
|
|    Depuis ECME6 (REAL NAME OF JAVASCRIPT), vous pouvez declarer
     une variable avec le mot cle "let".

     Afficher la Valeur de ma Variable dans la console.

     Votre variable sera alors accessible uniquement dans le 
     block dans lequel elle est contenu cad declaree.

     Si elle est declaree dans une condition, elle sera disponible
     uniquement dans le bloc de la condition.                                                                
|________________________________________________________________*/

// -- Les Variables FLOAT
var uneDecimale = -2.984;
console.log(uneDecimale);
console.log(typeof uneDecimale);

// -- Le Booléens (VRAI / FAUX)

var unBooleen = false;
console.log(unBooleen);
console.log(typeof unBooleen);

// -- Les Constantes

/*

La declaration CONST permet de creer une constante accessible uniquement en lecture.
Sa valeur, ne pourra pas etre modifiee par de reaffectations ulterieures.
Une constante ne peut pas etre declaree a nouveaux.

*/

// -- Generalement par convention les constantes sont en Majuscules.
const HOST = "localhost";
const USER = "root";
const PASSWORD = "mysql";

// -- Je ne peux pas faire ce la...
// USER = "Cristian";
// Uncaught TypeError: Assignment to constant variable.

/*--------------------------------------------------------------\
|                        LA MINUTE INFO                        
|  
 Au fur et a mesure que l'on effecte oun re-affecter des valeurs 
 à une variable, celle ci prend la nouvelle valeur et la nouvelle 
 type.

 En JS les variables sont auto-typees.

 Pour convertire une variable de type NUMBER en STRING  et STRING en NUMBER 
 je peux utiliseer les functiuons natives de JavScript.
 |_________________________________________________________________________*/

var unNombre = "24";
console.log(unNombre);
console.log(typeof unNombre);

// -- La fonction parseInt() pour retourner un Entier a partir de ma cheine de caractere.
unNombre = parseInt(unNombre);
console.log(unNombre);
console.log(typeof unNombre);

// -- Je re-affecte une valeur a ma variable

unNombre = "12.55";
console.log(unNombre);
console.log(typeof unNombre);

// -- La fonction parseFloat() permet de retourner un float sur la base d'un STRING

unNombre = parseFloat(unNombre);
console.log(unNombre);
console.log(typeof unNombre);

// -- Conversion d'un String avec toString()

var unNombreEnString = 10;
var maCheineDeCaractere = unNombreEnString.toString();
console.log(unNombreEnString);
console.log(typeof unNombreEnString);
console.log(typeof maCheineDeCaractere);