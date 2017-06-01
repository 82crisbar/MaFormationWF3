// -- Initialisation de jQuery (DOM READY)
$(function() {

    // -- Déclaration de Variables
    var CollectionDeContacts = [];

    /* --------------------------------------------------------------
                        DECLARATION DES FONCTIONS
    -------------------------------------------------------------- */

    // -- Fonction ajouterContact(Contact) : Ajouter un Contact dans le tableau de Contacts, mettre à jour le tableau HTML, réinitialiser le formulaire et afficher une notification.
    function ajouterContact(UnContact) {

        // -- Ajout du "UnContact" dans le tableau "CollectionDeContact"
        CollectionDeContacts.push(UnContact);
       
        // -- Observez l'ajout des contacts dans la collection
        console.log(CollectionDeContacts);

        // -- On cahe la phrase : aucun contact
        $('.aucuncontact').hide();

        // -- Mise a jour du HTML
        $('#LesContacts').find('tbody').append('<tr><td>' + UnContact.nom +'</td><td>' + UnContact.prenom 
        +'</td><td>' + UnContact.email +'</td><td>'+ UnContact.tel +'</td></tr>');

        // -- Reinitialization du formulaire
        reinitialisationDuFormulaire();

        // -- Affiche une notification
        afficheUneNotification();

    }

        // -- Fonction RéinitialisationDuFormulaire() : Après l'ajout d'un contact, on remet le formulaire à 0 !
    function reinitialisationDuFormulaire() {
        // -- En Javascript :
        // document.getElementById('Contact').reset();
        // -- En JQuery :
        $('#contact').get(0).reset();
    }

        // -- Affichage d'une Notification
    function afficheUneNotification() {
        $('alert-contact').fadeIn().delay(3000).fadeOut();
    }

        // -- Vérification de la présence d'un Contact dans Contacts
    function estCeQunContactEstPresent(UnEmail) {
        
        // -- Booleen qui indique la presence ou pas d'un contact
        var estPresent = false;

        // -- On parcourt le tableau en recherche d'une correspondance
        for(var i = 0 ; i < CollectionDeContacts.length ; i++) {

            // -- Verification pour chaque contact du tableau pour une correspondance avec mon object contact
            if(UnEmail === CollectionDeContacts[i].email) {
                
                // -- Si une correspondance est trouvé "estPresent" passe en VRAI (TRUE)
                estPresent = true;

                // -- On arrete la boucle, plus besoin de continuer la recherche
                break;
            }
        }
    // -- On returne estPresent
        return estPresent;
    }



    // -- Vérification de la validité d'un Email
    // : https://paulund.co.uk/regular-expression-to-validate-email-address
    function validateEmail(email){
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	var valid = emailReg.test(email);

	if(!valid) {
        return false;
    } else {
    	return true;
    }
}

    /* --------------------------------------------------------------
                    TRAITEMENT DE MON FORMULAIRE
    -------------------------------------------------------------- */

    // -- Détection de la soumission de mon Formulaire
   
    $('#contact').on('submit',function(e) {
        
         // -- Voir le contenu de l'evenement
        console.log(e);
        
        // -- Stopper la redirection de la page
        e.preventDefault();

        // -- Recuperation des champs a verifier
        var nom, prenom, email, tel;
        var nom       = $('#nom');
        var prenom    = $('#prenom');
        var email     = $('#email');
        var tel       = $('#tel');

        // -- Verification des informations...
        var mesInformationsSontValides = true;

        // -- Verification du nom
          if(nom.val().lenght == 0) {
            mesInformationsSontValides = false;
        }

          if(prenom.val().lenght == 0) {
            mesInformationsSontValides = false;
        }

          if(email.val().lenght == 0) {
            mesInformationsSontValides = false;
        }

          if(!validateEmail(email.val())) {
            mesInformationsSontValides = false;
        }


        if(mesInformationsSontValides) {
            // -- Tout est correct, preparation du contact
            var Contact = {
                'nom'    :  nom.val(),
                'prenom' :  prenom.val(),
                'email'  :  email.val(),
                'tel'    :  tel.val()
            }; 

            // -- Observon dans la console
            console.log(Contact);

            // -- Verification estQueUnContactEstPresent ?
            if(!estCeQunContactEstPresent(email.val())) {

                // -- Ajout du Contact
                ajouterContact(Contact);


            }


        }else {
            // -- Les info ne sont pas valides 
            alert('ATTENTION\nVeuillez bien remplir tous les champs.');//-- \n = retour a la ligne
        }

    });
    

}); // -- Fin de jQuery READY !