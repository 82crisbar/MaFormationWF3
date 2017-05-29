// 1 Initialization des variables
var AnneeActuelle = new Date();
// 2 Creation de ma fonction 
function Hello() {
// 2.a Je demande a l'utilizator son prenom
let prenom = prompt("Hello ! What is your name ?","<saisir votre prenom>");
console.log(prenom);
console.log(typeof prenom);
// 2.b Je lui demande son age
let age = parseInt(prompt("Hello" + prenom + " ! How old are you ?","<Saisir votre Age>"));
console.log(age);
console.log(typeof age);
// 2.c J'affiche une alert avec son annee de naissance
alert("Amazing ! So you were born in " + (AnneeActuelle.getFullYear() - age) + "!");
// 2.d Affichage dans ma page html
document.write("Hello " + prenom + " it's Amazing ! you are " + age + " years old !"); 
// 3 Execution de ma fonction
}


// 3 Execution de ma fonction
Hello();