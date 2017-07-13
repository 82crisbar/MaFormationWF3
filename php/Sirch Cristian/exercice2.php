<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Moi">

        <title>Exercie_2</title>
        <link href="img/Fire-Toy-icon.png" rel="icon" />

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <?php
            // FUNCTION DE CONVERTION
            function convertir($montant,$devise)
            {
                if($devise == "USD")
                {
                    // number_format sert à formater un number. ici le deuxieme parametre sert à indiquer le nombre de chiffre après la virgule
                    return $montant . " € <b>donne</b> " . number_format($montant *= 0.880080263,"2") . " $";
                }
                elseif($devise == "EUR")
                {
                    // ici le troisieme parametre sert à choisir comment separer les centimes et le quatrieme parametre represente la separation des millier
                    return $montant . " $ <b>donne</b> " . number_format($montant *= 1.13626,"2",","," ") . " €" ;
                }
            }
            
        ?>
    </head>
    <body>
        <div class="container">

            <div class="starter-template">
                <h1>Exercice 2</h1>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="montant">Somme à convertir</label>
                            <input class="form-control" type="texte" name="montant" id="montant"/>
                        </div>
                        
                        <div class="form-group">
                            <label for="devise">Choisissez la devise de sortie</label>
                            <select class="form-control" name="devise" id="devise">
                                <option value="EUR">Euro</option>
                                <option value="USD">Dollar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Convertir</button>
                        </div>
                    </form>
                    <div class="well">
                    <?php
                        if(isset($_POST["montant"]) && is_numeric($_POST["montant"]) && isset($_POST["devise"]))
                        {
                            echo convertir($_POST["montant"],$_POST["devise"]);
                        }
                    ?>
                    </div>
                </div>
            </div>

        </div><!-- /.container -->
    </body>
</html>

	
