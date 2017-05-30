/*------------------------------------------

            LE SELECTEUR JQUERY

------------------------------------------*/ 

// -- Format : $('selecteur')
// -- En JQuery, tous les selecteurs CSS sont disponibles

// -- DOM READY !

$(function() {
    // -- Les Flemards.JS
    function l(e) {
        console.log(e);
    }
  // -- Selectioner les balises <span> :
   
  // -- Version JS :
  l('SPAN en JS :');
  l(document.getElementsByTagName('span'));

  // Version JQuery :
  l('SPAN en JQuery :');
  l($('span')) ;

  // -- Selectionner mon MENU

    // -- Version en JS :
    l("ID via JS :");
    l(document.getElementById("menu"));

    // -- Version JQuery :

    l("ID via JQuery");
    l($("#menu"));

    // -- Selectionner une CLASSE :

    l("Classe via JQuery");
    l($(".MaClasse"))

    // --Selectionner par attribut 

    l('Par Attribut : ')
    l($("[href='http://www.google.fr']"))
});          