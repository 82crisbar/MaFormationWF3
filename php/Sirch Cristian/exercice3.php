<?php 

// Connexion avec la BDD exercice_3
require_once('inc/init.inc.php');

// Inclusion du header et de la bar de navigation
require("inc/header.inc.php");
require("inc/nav.inc.php");

// declaration de variables vides pour affichage dans les values du formulaire

$title = "";
$actors = "";
$director = "";
$producer = "";
$year_of_prod = "";
$language = "";
$category = "";
$storyline = "";
$video = "";

// controle sur l'exercice de tous les champs provenant du formulaire  (sauf le bouton de validation)
if(isset($_POST['title']) && isset($_POST['actors']) && isset($_POST['director']) && isset($_POST['producer']) && isset($_POST['year_of_prod']) && isset($_POST['language']) && isset($_POST['category'])  && isset($_POST['storyline']) && isset($_POST['video']))
{
	
    $title = $_POST['title'];
  	$actors = $_POST['actors'];
 	$director = $_POST['director'];
	$producer = $_POST['producer'];
	$year_of_prod = $_POST['year_of_prod'];
  	$language = $_POST['language'];
  	$category = $_POST['category'];
 	$storyline = $_POST['storyline'];
	$video = $_POST['video'];

	// variable de control
  	$erreur = "";
	

  	// Verification que toutes les champs du formulaire sont remplì
    if(!empty($_POST['title']) && !empty($_POST['actors']) && !empty($_POST['director']) && !empty($_POST['producer']) && !empty($_POST['year_of_prod']) && !empty($_POST['language']) && !empty($_POST['category']) && !empty($_POST['storyline']) && !empty($_POST['video'])) 
    {
    	$enregistrement = $pdo->prepare("INSERT INTO movies (title, actors, director, producer, year_of_prod, language, category, storyline, video) VALUES (:title, :actors, :director, :producer, :year_of_prod, :language, :category, :storyline, :video)");

 
	      $enregistrement->bindParam(":title", $title, PDO::PARAM_STR); 
	      $enregistrement->bindParam(":actors", $actors, PDO::PARAM_STR); 
	      $enregistrement->bindParam(":director", $director, PDO::PARAM_STR);
	      $enregistrement->bindParam(":producer", $producer, PDO::PARAM_STR); 
	      $enregistrement->bindParam(":year_of_prod", $year_of_prod, PDO::PARAM_STR); 
	      $enregistrement->bindParam(":language", $language, PDO::PARAM_STR); 
	      $enregistrement->bindParam(":category", $category, PDO::PARAM_STR); 
	      $enregistrement->bindParam(":storyline", $storyline, PDO::PARAM_STR); 
	      $enregistrement->bindParam(":video", $video, PDO::PARAM_STR);
	      $enregistrement->execute(); 
			
	      //Message en cas de bon enregistrement du film dans la BDD
		  echo '<div style="text-align:center; font-size:20px;" class="alert alert-success">The movie is been added to the movie directory THANK YOU </div>';
	     
    }
    else{
		//Message en cas d'erreur dans le champs du formulaire
    	echo '<div style="text-align:center; font-size:20px;" class="alert alert-danger" role="alert">Attention, all the fields are to be filled, THANK YOU<div>';
		
    }

}
// Je verifie avec print_r le contenu de mon array
//echo '<pre>'; print_r($_POST); echo '</pre>';


?>

    <div class="container" style="margin-top: 20px; text-align:center;"> <!--Start container -->

    <div class="row"><!-- Start formulaire -->
		<div class="col-sm-4 col-sm-offset-4">
			<form method="post" action="" class="well" enctype="multipart/form-data">
			
				<input type="hidden" name="id_movie" id="id_movie" class="form-control" value="" />
				<label for="title">Title</label>
				<input type="text" name="title" id="title" class="form-control" value="" />
				<label for="actors">Actors</label>
				<input type="text" name="actors" id="actors" class="form-control" value="" />
				<label for="director">Director</label>
				<input type="text" name="director" id="director" class="form-control" value="" />
				<label for="producer">Producer</label>
				<input type="text" name="producer" id="producer" class="form-control" value="" />
				<label for="year_of_prod">Year of production</label>
				<select type="text" name="year_of_prod" id="year_of_prod" class="form-control" value="" />
				<?php
					$i = date('Y');
					while($i >= 1900)
					{
					
						$select = '';
						if(isset($_POST['annee']) && $_POST['annee'] == $i)
						{
							$select = 'selected';
						}
							echo '<option '. $select .'>' . $i . '</option>';
							$i --;
					}
				?>
				</select>
				<label for="language">Language</label>
				<select type="text" name="language" id="language" class="form-control" value="" />
						<option>English</option>
						<option>Spanish</option>
						<option>French</option>
						<option>Italian</option>
						<option>Autre</option>
				</select>
				<label for="category">Category</label>
				<select type="text" name="category" id="category" class="form-control" value="" />
						<option>Comedy</option>
						<option>Adventure</option>
						<option>Sci-Fi</option>
						<option>Horror</option>
						<option>Drama</option>
						<option>Biographic</option>
						<option>Thriller</option>
						<option>War</option>
						<option>History</option>
				</select>
				<label for="storyline">Storyline</label>
				<input type="text" name="storyline" id="storyline" class="form-control" />
				<label for="video">Movie trailer: Insert a working URL link </label>
				<input type="url" name="video" id="video" class="form-control" value="" required pattern="https?://.+"/>
				
				<hr />
				
				<button type="submit" name="addmovie" id="addmovie" class="form-control btn btn-success" style="margin-top:20px;"><span class="glyphicon glyphicon-star-empty" style="color:lime;"></span> Add movie <span class="glyphicon glyphicon-star-empty" style="color:lime";></span></button>
			</form>	
		</div>
	  </div><!-- End formulaire -->

	  

    </div><!-- End container -->

<?php
require("inc/footer.inc.php");
