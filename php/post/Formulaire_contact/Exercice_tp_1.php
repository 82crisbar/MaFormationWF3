<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TP 01 Formulaires PHP</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>
  <?php 
	
	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['code_postale']) && isset($_POST['sexe']) && isset($_POST['description'])) 
		
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$ville = $_POST['ville'];
	$code_postale = $_POST['code_postale'];
	$sexe = $_POST['sexe'];
	$description = $_POST['description'];
	
	if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($ville) && !empty($code_postale) && !empty($sexe) && !empty($description))
	{
		echo 'NOM: ' . $nom . '<br />';
		echo 'PRENOM: ' . $prenom . '<br />';
		echo 'ADRESSE: ' . $adresse. '<br />';
		echo 'VILLE: ' . $ville . '<br />';
		echo 'CODE POSTALE: ' . $code_postale . '<br />';
		echo 'SEXE: ' . $sexe . '<br />';
		echo 'DESCRIPTION: ' . $description . '<br />';
	}
	

 
 
  
 
  ?>
  
	
	<div class="container">

      <div class="starter-template">
        <h1>Contact <span class="glyphicon glyphicon-envelope" style="color: lightblue;"></span></h1>
       
		</div>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<form action="" method="post">
				
					<div class="form-group">
						<label for="nom">Nom</label>
						<input type="text" name="nom" id="nom" class="form-control"  />
					</div>
					<div class="form-group">
						<label for="prenom">Prenom</label>
						<input type="text" name="prenom" id="prenom" class="form-control"  />
					</div>
					<div class="form-group">
						<label for="adresse">Adresse</label>
						<input type="text"  name="adresse" id="adresse" class="form-control"/>
					</div>
					<div class="form-group">	
						<label for="ville">Ville</label>
						<input type="text" name="ville" id="ville" class="form-control"></input><br />
					</div>
					<div class="form-group">	
						<label for="code_postale">Code postale</label>
						<input type="text" name="code_postale" id="code_postale" class="form-control"></input><br />
					</div>
					<div class="form-group">
						<label for="sexe">Sexe</label>
						<select type="text" name="sexe" id="sexe" class="form-control">
							<option value="homme">Homme</option>
							<option value="famme">Famme</option>
						</select>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea rows="4" cols="50" name="description" id="description" class="form-control" ></textarea>
					</div>
					<div class="form-group">
						<button class="form-control btn btn-info"> Validation</button>
					</div>
				</form>	
			</div>
		</div>
	</div><!-- /.container -->
		
		
	<div class="container">
	
		<div class="starter-template">
			<h1>Exercice 2.1</h1>
		</div>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<hr />
				<ul>
					<li><a href="lien.php?pays=France">FRANCE</a></li>
					<li><a href="lien.php?pays=Espagne">ESPAGNE</a></li>
					<li><a href="lien.php?pays=Italie">ITALIE</a></li>
					<li><a href="lien.php?pays=Angleterre">ANGLETERRE</a></li>
				</ul>
				<hr />
			</div>		
		</div>
	</div><!-- Container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
