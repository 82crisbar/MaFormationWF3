function validateEmail(email){
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	var valid = emailReg.test(email);

	if(!valid) {
        return false;
    } else {
    	return true;
    }
}

$(function() {
    $('#contact').on('submit', function(event) {
         event.preventDefault();
        $('#contact .has-error').removeClass('has-error');
        $('#contact .text-danger').remove();
       
        var nom       = $('#nom');
        var prenom    = $('#prenom');
        var email     = $('#email');
        var tel       = $('#tel');

        if(nom.val() == "") {
            nom.parent().addClass('has-error');
            $("<p class='text-danger'>N'oubliez pas de saisir votre nom</p>").appendTo(nom.parent())
            }
        if(prenom.val() == "") {
                prenom.parent().addClass('has-error');
                $("<p class='text-danger'>N'oubliez pas de saisir votre prenom</p>").appendTo(prenom.parent())
            } 
            if(tel.val().length == "" || $.isNumeric(tel.val()) == false) {
                    tel.parent().addClass('has-error');
                    $("<p class='text-danger'>Verifier votre numero de telephone </p>").appendTo(tel.parent())
            }
            if(!validateEmail(email.val())){
                        email.parent().addClass('has-error');
                        $("<p class='text-danger'>Varifiez votre email svp</p>").appendTo
                        (email.parent());
            }     
                
                if($(this/*the formulaire*/).find('.has-error').length == 0) {
                $(this).replaceWith("<div class='alert alert-success'>Votre demande a bien ete envoye!Nous vous contacteron dans le moindre delay</div>");

            }   else {
                $(this).append("<div class='alert alert-danger'>Nous avons pas ete en mesure de prendre en compte votre request.Verifier vos informqtions</div>");
            }

    });
       
    });
   


   /* //-- DECLARATION DE FUNCTIONS

    function ajouterContact(Contact) {

    }
    function reinitialisationDuFormulaire() {

    }
    function afficheUneNotification() {

    }
    function estQueUnContactEstPresent(contact) {

    }
    function validateEmail(email) {

    }
    //-- Fin de JQuery
});*/