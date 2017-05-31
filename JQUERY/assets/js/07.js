function validateEmail(email){
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	var valid = emailReg.test(email);

	if(!valid) {
        return false;
    } else {
    	return true;
    }
}
// -- Initialization de JQuery
    $(function() {

//-- Ecouter a quel moment est soumis notre formulaire
//-- A la soumision de mon formulaire , je vais executer une function anonyme
//-- En JS : document.getElementById('contact').addEvenListener('submit', MaFonctionAExecuter);
    $('#contact').on('submit', function(event) {
        //-- event : correspond ici a notre evenement "submit" 

        //-- Arreter la redirection HTML5
        event.preventDefault();

        //-- Suppression des differents erreurs
        //-- Je cible tous les elements qui contiennent la classe "has-error",
        //-- puis je supprime ".has-error" pour ces elements

        //-- Je supprimela classe has error en ciblant les elements qui ont la classe has error,
        //--je supprime la classe sur les elements que je cible 

        $('#contact .has-error').removeClass('has-error');

        //-- Pareil ici mais avec ".text danger"
        $('#contact .text-danger').remove();
        //-- Declaration des variables (champs a verifier)
        var nom       = $('#nom');
        var prenom    = $('#prenom');
        var email     = $('#email');
        var tel       = $('#tel');

        //-- Je passe a la verification de chaque champ

            //-- 1. Verification du nom
            if(nom.val() == "") {
                //--Si le champ nom est vide, alors j'ajoute a son parent la class "has-error"
                nom.parent().addClass('has-error');
                
                $("<p class='text-danger'>N'oubliez pas de saisir votre nom</p>").appendTo(nom.parent())
                else {
                    $(nom).appendTo()
                }
            }
            //-- Verification prenom
            if(prenom.val() == "") {
               
                prenom.parent().addClass('has-error');
                
                $("<p class='text-danger'>N'oubliez pas de saisir votre prenom</p>").appendTo(prenom.parent())
            }
            //-- Verification email
            if(!validateEmail(email.val())){
                     email.parent().addClass('has-error');
                     $("<p class='text-danger'>Varifiez votre email svp</p>").appendTo
                     (email.parent());
                
            }
            //-- Validation numero telephone
            if(tel.val().lenght == "" || $.isNumeric(tel.val()) == false) {
               
                tel.parent().addClass('has-error');
                
                $("<p class='text-danger'>Verifier votre numero de telephone </p>").appendTo(tel.parent())
            }
        if($(this/*the formulaire*/).find('.has-error').length == 0) {
            $(this).replaceWith("<div class='alert alert-success'>Votre demande a bien ete envoye!Nous vous contacteron dans le plus moindre delay</div>");

        }else {
            $(this).prepend("<div class='alert alert-danger'>Nous avons pas ete en mesure de prendre en compte votre request.Verifier vos informqtions</div>");
        }
    });
});