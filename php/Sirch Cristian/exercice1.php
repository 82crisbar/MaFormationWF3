<?php 
require("inc/header.inc.php");

 $membre = array(
		'Prenom' => 'Cristian',
		'Nom' => 'Sirch',
		'Adresse' => '48 place Jules Ferry',
		'Code Postal' => '92120',
		'Ville' => 'Montrouge',
		'email' => 'cristiansirch@yahoo.it',
		'Telephone' => '0645980772',
		'Date de naissance' => '1982/07/19');

$originalDate = 'Y/m/d';
$euroDate = 'd/m/y';

$date = DateTime::createFromFormat($originalDate, $membre['Date de naissance']);

$dateTexte = $date->format($euroDate);

 ?>
 <!-- Contenu HTML -->
 <!-- Inclusion de la nav bootstrap -->
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Let's introduce myself</a>
        </div>
      </div>
    </nav> 
<!-- Fin de la nav bootstrap -->	
	<div class="container" style="background:lightgrey; margin-top:30px; padding:15px;"> 
	<ul>
	<?php foreach ($membre as $key => $value) : ?>
		<li>
			<?php 
				if($key == 'Date de naissance') {
					echo $key . ' : ' .$dateTexte;
				} else {
					echo $key . ' : ' . $value;
				}?>
			</li>
		<?php endforeach; ?>
		</ul>
	</div>
  </body>
</html>