/*--------------------------------------------------
    LE CHAINAGE DE METHODES 
--------------------------------------------------*/

$(function() {
    //-- Je souhaite cacher toutes les <div> de ma page HTML
    $('div').hide('slow', function() {
        // -- Une fois que la methode hide() est terminée , mon alerte peut s'executer
        alert('Fin du hide');

        // -- NOTE BENE : La fonction s'executerà pour l'ensemble des elements du selecteur  
        // --[The alert came up twice = for the 2 divs present on the page]

        // -- CSS
        $('div').css("background","yellow");
        $('div').css("color","red");

        // -- Je fait reapparaitre mes div's
        $('div').show();
    
    });// -- Fin fonction Anonime

// -- En utilisant le chainage de methode , vous pouvez faire s'enchainer plusieurs fonctions 
// -- les unes apres les autres...

    $('p').hide(1000).css('color','blue').css('font-size','20px').delay(2000).show(500);

    // -- MAIS C'est encore trop long!!!!!!!!!!

    $('p').hide().css({'color':'blue','font-size':'20px'}).delay(2000).show();
});