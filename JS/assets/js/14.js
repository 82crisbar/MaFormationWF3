/*-------------------------------------------------------------------------------
                       --------- Les Evenements------------
-------------------------------------------------------------------------------*/

/* Les evenements vont me permettre de declencher une fonction, 
    c'est a dire : une serie d'instruction,suite à une action de 
    mon utilisateur.

     OBJECTIF: Etre en mesure de capturer ces evenements afin 
               d'executer une fonction.

Les Evenements : Mouse (souris)

        Le mouseenter : La souris passe au dessus de la zone qu'occupe un element
        Le mouseleave : La souris sorte de cette zone 

Les evenements : Keyboard (Clavier)

        Keydown : Une touche du clavier est enfoncée 
        Keyup   : Une touche a ete relachée

Les evenements : Window 

        Scroll : Defilement de la fenetre
        Resize : Redinsionement de la fenetre

Les evenements : FORM

        Change : Pour les elements <input>, <select> et <textarea>
        Submit : A l'envoi d'un formulaire

Les evenements Document

        DOMContentLoaded : Execute lorsque le document HTML est 
                       completement chargé sans attendre le css et les images    



-----------------------------------------------------------------
                    LES ECOUTEURS D4EVENEMENTS
-----------------------------------------------------------------

Pour attacher un evenement à un élément, ou autrement dit, pour
declarer un ecouteur d'evenement qui se chargera de lancer une 
action, c'est a dire une fonction pour un evenement donné,
je vais utilisé la sintaxe suivante  */

var p = document.getElementById("MonParagraphe");
console.log(p);

// -- Je souhaite que mon paragraphe soit rouge au cluick de la souris

    //-- 1 : Je defini une fonction chargée de'executer cette action .
    function changeColorToRed() {
        p.style.color = "red";
    }

// -- 2 : Je declare un ecouteur qui se chargerà d'appeler la fonction 
// au declanchement de l'evenement 
p.addEventListener("click", changeColorToRed);        

/*----------------------------------------------------------------------               
                          EXERCICE PRATIQUE
A l'aide de JS créer un champ input type text avec un id unique .
affichez ensuite dans une alerte la saisie de l'utilizateur

----------------------------------------------------------------------*/


var input = document.createElement("input"); 
input.type = "text";
input.id = "submit";

var submit = document.createElement("input");
submit.type = "submit";
submit.id = "monSubmit";

document.body.appendChild(input);
document.body.appendChild(submit);

function spacefill()
{
    var spacefill = document.getElementById("submit").value;
    if (spacefill == null) {
        alert("Please check your text");
    }
    else
    {
        alert(spacefill);
    }

}



