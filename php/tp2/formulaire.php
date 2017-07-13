<?php
$pdo = new PDO('mysql:host=localhost;dbname=repertoire', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// declaration de variables vides pour affichage dans les values du formulaire
$nom = "";
$prenom = "";
$telephone = "";
$profession = "";
$ville = "";
$cp = "";
$adresse = "";
$date_de_naissance = "";
$sexe = "";
$description = "";

// controle sur l'exercice de tous les champs provenant du formulaire  (sauf le bouton de validation)
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['profession']) && isset($_POST['ville']) && isset($_POST['ville']) && isset($_POST['cp']) && isset($_POST['adresse'])  && isset($_POST['date_de_naissance']) && isset($_POST['sexe']) && isset($_POST['description']))
{
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $telephone = $_POST['telephone'];
  $profession = $_POST['profession'];
  $ville = $_POST['ville'];
  $cp = $_POST['cp'];
  $adresse = $_POST['adresse'];
  $date_de_naissance = $_POST['date_de_naissance'];
  $sexe = $_POST['sexe'];
  $description = $_POST['description'];

  // variable de control
  $erreur = "";

  // insertion dans la bdd
    if($erreur !== true) // si $erreur est different de true alors le controle prelable sont OK!
    {
      $enregistrement = $pdo->prepare("INSERT INTO annuaire (nom, prenom, telephone, profession, ville, cp, adresse, date_de_naissance, sexe, description) VALUES (:nom, :prenom, :telephone, :profession, :ville, :cp, :adresse, :date_de_naissance, :sexe, :description)");

      $enregistrement->bindParam(":nom", $nom, PDO::PARAM_STR); 
      $enregistrement->bindParam(":prenom", $prenom, PDO::PARAM_STR); 
      $enregistrement->bindParam(":telephone", $telephone, PDO::PARAM_STR); 
      $enregistrement->bindParam(":profession", $profession, PDO::PARAM_STR);
      $enregistrement->bindParam(":ville", $ville, PDO::PARAM_STR); 
      $enregistrement->bindParam(":cp", $cp, PDO::PARAM_STR); 
      $enregistrement->bindParam(":adresse", $adresse, PDO::PARAM_STR); 
      $enregistrement->bindParam(":date_de_naissance", $date_de_naissance, PDO::PARAM_STR); 
      $enregistrement->bindParam(":sexe", $sexe, PDO::PARAM_STR); 
      $enregistrement->bindParam(":description", $description, PDO::PARAM_STR);
      $enregistrement->execute(); 
	  
	   echo '<div class="alert alert-success" style="text-align:center;">Vous étes bien enrégistré dans la liste de la base de données "annuaire"</div>';
    }
}

//echo '<pre>'; print_r($_POST); echo '</pre>';

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="Moi">

    <title>formulaire contact</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
      <div class="container">

         <div class="starter-template">
           <h1><span class="glyphicon glyphicon-user" style="color: lime;"></span>Inscription</h1>
        </div>
    
        <div class="row">
           <div class="col-sm-4 col-sm-offset-4">
            <form method="post" action="" class="well">
              <label for="nom">Nom</label>
              <input type="text" name="nom" id="nom" class="form-control" value="" />
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" id="prenom" class="form-control" value="" />
              <label for="telephone">Telephone</label>
              <input type="text" name="telephone" id="telephone" class="form-control" value="" />
              <label for="profession">Profession</label>
              <input type="text" name="profession" id="profession" class="form-control" value="" />
              <label for="ville">Ville</label>
              <input type="text" name="ville" id="ville" class="form-control" value="" />
              <label for="cp">Code postale</label>
              <input type="text" name="cp" id="cp" class="form-control" value="" />
              <label for="adresse">Adresse</label>
              <input type="textarea" name="adresse" id="adresse" class="form-control" value="" />
              <label for="date_de_naissance">Date de naissance</label>
              <input type="text" name="date_de_naissance" id="date_de_naissance" class="form-control" value="" />
              <label for="sexe">Sexe</label>
              <select type="text" name="sexe" id="sexe" class="form-control" value="" />
                  <option value="m">Homme</option>
                  <option value="f">Femme</option>
              </select> 
              <label for="description">Description</label>
              <input type="textarea" name="description" id="description" class="form-control" value="" />
              <button type="submit" name="inscription" id="inscription" class="form-control btn btn-success" style="margin-top:20px;"><span class="glyphicon glyphicon-star-empty" style="color:lime;"></span>Enregistrement<span class="glyphicon glyphicon-star-empty" style="color:lime";></span></button>
            </form> 
           </div>
         </div>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>










