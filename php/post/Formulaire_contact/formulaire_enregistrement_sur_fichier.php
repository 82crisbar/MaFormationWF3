
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Formulaire enregistrement sur fichier</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>
  <?php
  echo '<pre>'; print_r($_POST); echo '</pre>';
  
  if(isset($_POST['pseudo']) && isset($_POST['email']))
  {
	  $pseudo = $_POST['pseudo'];
	  $email  = $_POST['email'];
	  if(!empty($pseudo) && !empty($email))
	  {
		// Enregistrement des cas information sur un fiche cree dinamiquement grace a php
		// fonction fopen
		$f = fopen("liste.txt", "a");// fopen(nomdufichier,mode)
		// pour les differentes modes disponibles
		// http://php.net/manual/fr/function.fopen.php
		fwrite($f, $pseudo . ' - ');
        fwrite($f, $email . "\n");	// le \n permet le retour a la ligne dans le fichiers cibles
		fclose($f);// fclose() qui n'est pas obligatoire permet de fermer le fichier et de liberer de la ressource sur le serveur 
		
	  }
	  else 
	  {
		  echo '<div class="alert alert-danger" role="alert">Attention, le pseudo et le mail sont obbligatoires<br />Veuillez recommencer.<div>';
	  }
  }
  
  ?>
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
        <h1>Contact <span class="glyphicon glyphicon-envelope" style="color: red;"></span></h1>
		
  <form method="post" action="">
	<div class="form-group">
		<label for="pseudo">Pseudo</label>
		<input type="text" maxlenght="14" name="pseudo" id="pseudo" value="" class="form-control"/>
	</div>
	<div class="form-group">	
		<label for="email">E-mail</label>
		<input type="text" name="email" id="email "class="form-control"></input><br />
	</div>
	<div class="form-group">	
		<button class="form-control btn btn-success"><span class="glyphicon glyphicon-star" style="color: red;"></span><span class="glyphicon glyphicon-star" style="color: red;"></span><span class="glyphicon glyphicon-star" style="color: red;"></span> Validation<span class="glyphicon glyphicon-star" style="color: red;"></span><span class="glyphicon glyphicon-star" style="color: red;"></span><span class="glyphicon glyphicon-star" style="color: red;"></span></button>
	</div>	
  </form>
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
