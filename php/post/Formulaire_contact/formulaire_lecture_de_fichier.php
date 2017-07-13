<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">

    <title>lecture de fichier</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>
  <div class="container">

      <div class="starter-template">
        <h1>Lecture de fichier  <span class="glyphicon glyphicon-envelope" style="color: red;"></span></h1>
  <?php
 // apres avoir vu comment enregistrer de donnes dans un fichier sur le serveur, nous allons les recuperer afin de le manipuler sur ce fichier
 
 $nom_fichier = 'liste.txt';
 $contenu_fichier = file($nom_fichier);
 // file() fait tout le travail pour nous 
 // cette fonction retourne chaque ligne d'un fichier dans un tableau array
 echo '<pre>'; 
 print_r($contenu_fichier); 
 echo '</pre>';
 
 // affiche dans une liste ul li chaque ligne recuperée du fichier liste.txt 
 echo '<ul>';
 foreach($contenu_fichier AS $valeur)
 {
	 $position_tiret = strpos($valeur, '-');
	 $position_tiret += 2;
	 
	 echo '<li style="color:DodgerBlue;">' . $valeur . '</li>';
  
	 echo '<li style="color:red;">'. substr($valeur, 0, ($position_tiret-2)) . '</li>';
	 echo '<li style="color:green;">'. substr($valeur,$position_tiret) . '</li>';
 
 } 
  ?>
  </div> <!-- container-->
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
  
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
