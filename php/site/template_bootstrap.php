<?php
require("inc/init.inc.php");



// La ligne suivant commnce les affichages dans la page
require("inc/header.inc.php");
require("inc/nav.inc.php");
?>


 
    <div class="container">

      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-user" style="color: lime;"></span>Inscription</h1>
        <?php //echo $message; // messages destines a l'utilisateur ?>
		<?= $message; // cette balise php inclue un echo et est equivalent a la ligne au dessus ?>
      </div>
	  

    </div><!-- /.container -->

<?php
require("inc/footer.inc.php");








