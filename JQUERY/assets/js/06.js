/*--------------------------------------
        Le Selecteurs d'enfants
--------------------------------------*/

// -- Initialization de JQuery

$(function() {
    // -- Ici commence mon JQuery
    // -- Les flemards.js
    function l(e) {
        console.log(e);
    }

    // -- Je souhaite selectionner toutes mes divs
    l($('div'))

    // -- Je souhaite selectionner mon header
    l($('header'))

    // -- Je souhaite tous les elements descendants direct( enfants) qui sont dans le "header"
    l($('header').children())

    // -- Je souhaite parmis mes descendant directs; selectionner que mes elements "ul"
    l($('header').children('ul'))

    // -- Je souhaite recuperer tous les elements "li" de mon "ul"
    l($('header').children('ul').find('li'))

    // -- Je souhaite recuperer uniquement le 2eme element de mes "li" 
    // -- je vais le faire avec "eq" et le numero de correspondance dans le "tableau"
    l($('header').find('li').eq(1))

    // -- Je veux connaitre le voisin direct de mon  "header" 
    l($('header').next())
    l($('header').next().next()) // -- pou le voisin du voisin
    l($('header').prev()) // -- Le voisin d'avant
    
    // -- Le parents
    l($('header').parents())
});