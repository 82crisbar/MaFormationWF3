/*--------------------------------------

       LES OPERATEURS ARITHMETIQUES

---------------------------------------*/

// -- Declaration de plusieurs variables a la suite
var nb1, nb2, resultat;

nb1 = 10;
nb2 = 5;

// -- Addition de nb1 + nb2 avec l'operateur "+"       

resultat = nb1 + nb2;

//
console.log("L'addition de nb1 et nb2 est egale a : " + resultat);

//############## LA SOUBSTRACTION #########//

// -- La soustraction de nb1 - nb2 avec l'operateur "-"

resultat = nb1 - nb2;

//- Affichage du resultat dans la console
console.log("La soustraction de nb1 et nb2 est egale a " + resultat);


//############## LA MULTIPLICATION #########//

// -- La moltiplication de nb1 * nb2 avec l'operateur "*"

resultat = nb1 * nb2;

//- Affichage du resultat dans la console
console.log("La moltiplication de nb1 et nb2 est egale a " + resultat);



//############## LA DIVISION #########//

// -- La DIVISION de nb1 * nb2 avec l'operateur "/"

 resultat = nb1 / nb2;

//- Affichage du resultat dans la console
console.log("La DIVISION de nb1 et nb2 est egale a " + resultat);


//############## MODULO #########//

// -- NB:  Le modulo est le rest du resultat de la division

// -- Le modulo de nb1 et nb2 avec l'operateur "%"

nb1 = 11;

 resultat = nb1 % nb2;

//- Affichage du resultat dans la console
console.log("Le reste de la DIVISION de"+ nb1+ "et" +nb2 +"est egale a " + resultat);

//########## Les Eritures semplifiees #########//

nb1 = 15;
nb1 = nb1 + 5;
console.log(nb1);

nb1 += 5;// -- ce qui vaut ecrire nb1 = nb1 + 5;
// -- Ici j'ai incrementé et affecté.

console.log(nb1);
// -- Je peux proceder de la meme maniere pour tous les operateurs arithmetiques :
// : "+" ,"-", "*", "/", "%" 
