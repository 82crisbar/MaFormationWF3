<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax Training</title>
</head>
<body>
    <form action="" method="post" id="myForm">
        <label>Nom</label>
        <input type="text" name="nom" >  
        <label>Prenom</label>
        <input type="text" name="prenom">
        <input type="submit" value="envoyer">    
    </form> 
    <div id="response-div"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>
        $('#myForm').submit(function(event){ // On ecoute le submit form
            event.preventDefault();          // empeche la soumission form

            var $this = $(this);

            var data = $this.serialize();  // Transform le form en json

            $.post(
                'back.php',              // La paga qu'on appelle en ajax
                data,                    // les données qu'on envoye
                function(response){      //Fontion qui traite la reponse de l'appel
                    console.log(response);
                    
                    var message;

                    if(response.status == 'ok'){
                        message = '<b>Tout est ok</b>';
                    }else{
                        message = '<b>il y a des erreurs</b>';
                        message += '<br>' + response.errors.join('<br>');
                    }

                    $("#response-div").html(message);
                },
                'json'                   // Type de retour
            );
        });
    </script>
</body>
</html>