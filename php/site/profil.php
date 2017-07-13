<?php
require("inc/init.inc.php");

// verification si l'utilisateurest connecte sinon on le redirige sur connexion
if(!utilisateur_est_connecte())
{
	header("location:connexion.php");
}




// La ligne suivant commnce les affichages dans la page
require("inc/header.inc.php");
require("inc/nav.inc.php");
?>


 
    <div class="container" style="background:url('img/backprofile.jpg'); margin:0 auto; min-height:700px;border:10px white solid ;margin-top:30px;background-size: contain;"><!--container nav end -->

      <div class="starter-template">
        <h1 style="font-size:50px;">Profil(Admin)</h1>
        <?php //echo $message; // messages destines a l'utilisateur ?>
		<?= $message; // cette balise php inclue un echo et est equivalent a la ligne au dessus ?>
			<div>
				<img src="img/selfie.jpg" style="border:10px white solid ;" />
				<div class="well" style="margin-top:50px;border:10px white solid ;">
					<table class="table">
						<tr>
							<th scope="row">Pseudo</th>
							<td><?php echo $_SESSION['utilisateur']['pseudo']; ?></td>
						</tr>
							<th scope="row">Nom</th>
							<td><?php echo $_SESSION['utilisateur']['nom']; ?></td>
						</tr>		
							<th scope="row">Prenom</th>
							<td><?php echo $_SESSION['utilisateur']['prenom']; ?></td>
						</tr>
							<th scope="row">Email</th>
							<td><?php echo $_SESSION['utilisateur']['email']; ?></td>
						</tr>
							<th scope="row">Sex</th>
							<td><?php echo $_SESSION['utilisateur']['sexe']; ?></td>
						</tr>
							<th>Ville</th>
							<td><?php echo $_SESSION['utilisateur']['ville']; ?></td>
						</tr>
							<th>Cp</th>
							<td><?php echo $_SESSION['utilisateur']['cp']; ?></td>
						</tr>
							<th>Adresse</th> 
							<td><?php echo $_SESSION['utilisateur']['adresse']; ?></td>
						</tr>
					</table>
				</div>
			</div>
      </div>
	  
	  

    </div><!--End central block-->
	
	

<?php
require("inc/footer.inc.php");