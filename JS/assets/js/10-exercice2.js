function w(t) {
    document.write(t);
}

function l(e) {
    console.log(e);
}
// -- Creation du tableau 3D en js
var PremierTrimestre = [
    {
        "nom"     :    "Liegiard",
        "prenom"  :    "Hugo",
        "moyenne" :    {
                            "francais"  : 4,
                            "math"      : 8,
                            "physique"  : 18
                       },
    },
    {
        "nom"     :    "Sirch",
        "prenom"  :    "Cristian",
        "moyenne" :    {
                            "francais"  : 6,
                            "math"      : 18,
                            "physique"  : 10,
                            "English"   : 20
                       },
    },
    {
        "nom"     :    "Bianchi",
        "prenom"  :    "Frank",
        "moyenne" :    {
                            "francais"  : 10,
                            "math"      : 7,
                            "physique"  : 16
                       },
    }
];
l(PremierTrimestre);

w('<ol>');
//-- Je soaite afficher la liste de mes etudiants

for(i = 0; i < PremierTrimestre.length ; i++) {
    // -- On recupere l'object etudiant de l'interation
    var Etudiant = PremierTrimestre[i];
    // -- Apercu dans la console
    l(Etudiant);

    // -- Afficher le nom et prenom d'un etudiant
    w("<li>");

    // --Je definis NombreDeMatiere et SommeDesNotes = 0

    var NombreDeMatiere = 0, SommeDesNotes = 0;
   
    w(Etudiant.prenom + " " + PremierTrimestre[i].nom);

   w("<ul>") ;
   for(let matiere in Etudiant.moyenne) {
       //l(matiere)
       //l(Etudiant.moyenne[matiere])
       NombreDeMatiere++;
       SommeDesNotes += Etudiant.moyenne[matiere];
   w("<li>");       
   w(matiere + " : " + Etudiant.moyenne[matiere]);
   w("</li>");
} // --fin de la boucle matiere

   w("<li>");       
      w("<strong>Moyenne Generale :</strong> " + (Math.round(SommeDesNotes / NombreDeMatiere)));
   w("</li>");

w("</ul>")    
    w("</li>");
} //-- fin de la boucle etudiants
w('</ol>')

