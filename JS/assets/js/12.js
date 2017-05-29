/*--------------------------------------------------------
~~~~~~~~~~~~~~~~~~~~ LE DOM ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

---------------------------------------------------------
Le DOM est une interface de developpement en js pour HTML
Grace au DOM, je vais etre en mesure d'acceder /modifier
mon html.

L'object "document" : c'est le point d'entree vers mon 
contenu HTML !

Chaque page chargee dans mon mon navigateur aun object 
"document"
--------------------------------------------------------*/

//-- Comment puis je faire pour recuperer les differentes informations de ma page HTML?

/*------------------------------------------------------
~~~~~~~~~~~~~~~~~ document.getElementById ~~~~~~~~~~~~~~
--------------------------------------------------------

docuument.getElementById() : C'est une fonction qui va 
permettre de recuperer un element HTML a partir de son 
identifiant unique : ID 

----------------------------------------------------*/

var bonjour = document.getElementById("bonjour");
console.log(bonjour);

/*------------------------------------------------------
~~~~~~~~~~~~~~~~ document.getElementByClassName ~~~~~~~~~~~~
--------------------------------------------------------

docuument.getElementByClassName() : C'est une fonction qui va 
permettre de recuperer un ou plusieurs elements (une liste) 
HTML a partir de leur classe.

-------------------------------------------------------*/

 var contenu = document.getElementByClassName("contenu");
 console.log(contenu);

 //-- Me renvoye: Un tableau JS avec mes elements HTML, ou encore autrement dit 
 //-- une collection d'elements HTML.

 /*------------------------------------------------------
~~~~~~~~~~~~~~~~ document.getElementByTagName ~~~~~~~~~~~~
--------------------------------------------------------

docuument.getElementByTagName() : C'est une fonction qui va 
permettre de recuperer un ou plusieurs elements (une liste) 
HTML a partir de leur * nom de balise *

-------------------------------------------------------*/

var span = document.getElementsByTagName("span");
console.log(span);