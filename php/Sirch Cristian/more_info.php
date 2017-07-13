<?php

// Connexion avec la BDD exercice_3
require_once('inc/init.inc.php');

// Inclusion du header et de la bar de navigation
require("inc/header.inc.php");
require("inc/nav.inc.php");

// Traitements PHP

if(isset($_GET))
{
	$enregistrement = $pdo->query("SELECT * FROM movies WHERE id_movie = $_GET[film]");
}

?>

<!-- Affichage HTML -->
<?php while ($more_info = $enregistrement -> fetch(PDO::FETCH_ASSOC)) : ?>
<div class="container">
<h1>Movie directory : <?= $more_info['title'] ?></h1>
<ul>
	<li>Actors : <?= $more_info['actors'] ?></li>
	<li>Director : <?= $more_info['director'] ?></li>
	<li>Producer : <?= $more_info['producer'] ?></li>
	<li>Year of production :<?= $more_info['year_of_prod'] ?></li>
	<li>Language : <?= $more_info['language'] ?></li>
	<li>Category : <?= $more_info['category'] ?></li>
	<li>Storyline : <?= $more_info['storyline'] ?></li>
	<li><a href="<?= $more_info['video'] ?>">Link to the movie trailer</a></li>
</ul>
<?php endwhile; ?>
<p><a href="movie_list.php">Back to the movies list</a></p>
</div>