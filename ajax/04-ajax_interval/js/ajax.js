

setInterval('ajax()', 2000);
// setInterval va executer la fonction ajax() toutes les 5sec ecrit en millisecondes

function ajax()
	{
	if(window.XMLHttpRequest)
	{
		var xhttp = new XMLHttpRequest();
	}
	else
	{
		var xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	// Le fichier cible 
	var file = 'ajax.php';
	
	xhttp.open("POST", file, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	xhttp.onreadystatechange = function()
	{
		if(xhttp.readyState == 4 && xhttp.status == 200) 
		{
			console.log(xhttp.responseText);
			var retour = JSON.parse(xhttp.responseText);
			document.getElementById("conteneur").innerHTML = retour.tableau;
			// .tableau represente l'indice generé sur le script php contenant la reponse
		}
	}
	xhttp.send();
}