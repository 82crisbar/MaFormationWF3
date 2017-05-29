/*-------------------------------
    LA MANIPOLATION DES CONTENUS
-------------------------------*/

function l(e) {
    console.log(e);
}

//-- Je soaite recuperer mon lien; comment proceder?

var google = document.getElementById("google");
l(google)

//-- Maintenant , je souhaite acceder aux informations de ce lien, par example :

    // A : Le lien vers lequel pointe la balise
    l("le lien vers lequel pointe la balise :")
    l(google.href);
    
    // B :L'ID de la balise 
    l("L'ID de la balise :")
    l(google.id);

    // C : La classe de la balise
    l("La classe de la balise :")
    l(google.className);

    // D : Le texte de la balise (L'element)
    l("le texte de la balise ")
    l(google.textContent);

    // -- Maintenant je souhaite modifier le contenu de monn lien 
    // -- Comme une variable classique , je vais simplement venir affecter une nouvelle valeur.
    google.textContent = "Mon lien vers Google !";  

    /*---------------------------------------------------
                Ajouter un element dans ma page
    ----------------------------------------------------*/

    // -- Nous allons utiliser 2 methodes

    // -- 1 La fonction document.createElement() va permettre de generer un nouvel 
    //-- element dans le DOM ; qui pourrais par la suite modifier avec les methodes que nous venons de voir.

    //-- Definition de mon element 

    var span = document.createElement("span");

    //-- Si je souhaite lui donner un ID.

    span.id = "MonSpan";

    //--  Si je souhaite lui attribuer du contenu...
    span.textContent = "Mon beau texte  en JS";

    //-- La fonction appendChild() va me permettre de rajouter un enfant a un element du DOM.
    google.appendChild(span);



var h1 = document.createElement("h1");
var a = document.createElement("a");

a.textContent = "Titre de mon article";
a.href = "#";

//-- Je met mon lien (a) dans mon h1

h1.appendChild(a);

document.body.appendChild(h1);

//-- I want my title to be red 

a.style.color = "red";

a.style.textDecoration = "none"; // Notice the text-decoration on Js become textDecoration


