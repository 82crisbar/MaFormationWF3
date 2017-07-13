<?php 

// Connexion avec la BDD exercice_3
require_once('inc/init.inc.php');

// Inclusion du header et de la bar de navigation
require("inc/header.inc.php");
require("inc/nav.inc.php");


$resultat = $pdo->query("SELECT * FROM movies");

$realisateur = array();
$titre = array();
$annee = array();

?>
<div class="container">
<table class="table table-bordered" style="background:lightgray; margin-top: 20px;">
	<tr>
		<th colspan="4">Movies directory list</th>
	</tr>
	<tr>
		<th>Title</th>
		<th>Director</th>
		<th>Year of production</th>
		<th>More info's</th>
	</tr>
	<?php while($films = $resultat -> fetch(PDO::FETCH_ASSOC)) : ?>
	<tr>
		<td><?php array_push($titre, "$films[title]"); echo $films['title'] ?></td>
		<td><?php array_push($realisateur, "$films[director]"); echo $films['director'] ?></td>
		<td><?php array_push($annee, "$films[year_of_prod]"); echo $films['year_of_prod'] ?></td>
		<td><a href="more_info.php?film=<?= $films['id_movie'] ?>">More info's</a></td>
	</tr>
	<?php endwhile; ?>
	
</table>

<h2><a href="exercice3.php">Add a movie</a></h2>

</div>



