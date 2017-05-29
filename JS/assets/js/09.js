/*-----------------------------------

            Les Boucles

-----------------------------------*/

// -- La Boucle FOR
// -- Pour i = 1 ; tant que i  <= (strictement inferieur ou egale) 10 ; alors, j'incremente
for(var i = 1 ; i <= 10 ; i++) {
    document.write("<p>Instruction executée : <strong>" + i + "</strong></p>");
}

document.write("<hr>")
// -- La boucle WHILE : tant que 

var j = 1;
while(j <= 10) {
     document.write("<p>Instruction executée : <strong>" + j + "</strong></p>");
     j++;
}

var Prenoms = ['Hugo', 'Jean', 'Mathieu', 'Luc' ,'Pierre', 'Mark'];

for(var n = 0 ; n <= 5 ; n++) {
    document.write("<p><strong>" + Prenoms[n] + "</strong></p>");
}       

