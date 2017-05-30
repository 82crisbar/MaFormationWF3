/*----------------------------------------------------

                DISPONIBILITE DU DOM

----------------------------------------------------*/

/*
    A partir du moment ou mon DOM, c'est a dire l'ensemble de l'arborescence de ma page 
    est completement charge  je peux commencer a utiliser JQUERY.

    Je vais mettre l'ensemble de mon code dans une fonction sera appele AUTOMATIQUEMENT
    par JQuery lorsque le DOM serà entierment defini.

    3 facons de faire : 
*/ 


//-- 1ere Possibilité
jQuery(document).ready(function() {
    // -- Ici le DOM est entierement charge, je peux proceder a mon code JS.
});

// -- 2eme Possibilite 
$(document).ready(function() {

});

// -- 3eme Possibilite sans le document document.ready()

$(function() {
    // -- Ici , le DOM est entierement charge je peux proceder a mon code JS.
   // alert("Hello world !");

    // -- En JS :
    document.getElementById('TexteEnJQuery').innerHTML = "<strong>Mon texte en JS</strong>";

    // -- En jQuery :
    $("#TexteEnJQuery").html("mon Texte en JQ !");
});