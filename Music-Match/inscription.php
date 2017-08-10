<?php
require("assets/inc/init.inc.php");
// verification si l'utilisateurest connecte sinon on le redirige sur connexion
// if(utilisateur_est_connecte())
// {
// 	header("location:profil.php");
// }

// declaration de variables vides pour affichage dans les values du formulaire
$pseudo = "";
$mdp = "";
$email = "";


// controle sur l'exercice de tous les champs provenant du formulaire  (sauf le bouton de validation)
if(isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['email']))
{
	$pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];
	$email = $_POST['email'];
	
	
	// variable de control
	$erreur = "";
	
	// control sur la taille du pseudo (entre 4 et 14 carachteres inclus) 
	if(iconv_strlen($_POST['pseudo']) >= 4 && iconv_strlen($_POST['pseudo']) <= 14)
	{
		//$message .='<div class="alert alert-success">Votre pseudo est: ' . $pseudo . '</div>';
	}	

		else
		{
			$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, la taille du pseudo est invalide<br />En effet, le pseudo doit avoir entre 4 et 14 caractéres inclus</div>';
			$erreur = true; //Si on rentre dans cette condition alors il y a un erreur.
		}
		
		// control des caracteres dans le pseudo (autorisés: a-z A-Z 0-9 _ - .)
		$verif_caracteres = preg_match('#^[a-zA-Z0-9._-]+$#', $pseudo);

		
		if(!$verif_caracteres && !empty($pseudo))
		{
			// onrentre dans cette condition si $verif_caracteres contient 0 donc s'il y a des caracteres non autorises
			$message .= '<div class="alert alert-danger" role="alert" style="margin-top:20px;">Attention, caracteres non autorises dans le pseudo<br />Caracteres autorises: A-Z et 0-9</div>';
		}
		
		// control sur le format de l'email
		if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) 
		{
			//$message .= '<div class="alert alert-success">Votre email est:' . $email . '</div>';
		}
		else{
			$message .= '<div class="alert alert-danger">Attention le format du mail est invalide<br />Vouillez verifier votre saisie</div>';
			$erreur = true;//Si on rentre dans cette condition alors il y a un erreur.
		}
		
		// controle sur la disponibilite du pseudo en bdd
            $verif_pseudo = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
            $verif_pseudo->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
            $verif_pseudo->execute();
            
		if($verif_pseudo->rowCount() > 0)
		{
			// Si l'on obtient au moins 1 ligne de resultat alors le pseudo est deja pris
			$message .= '<div class="alert alert-danger">Attention le pseudo n\'est pas disponible</div>';
			$erreur = true;
		}
		
		// insertion dans la bdd
		if($erreur !== true) // si $erreur est different de true alors le controle prelable sont OK!
		{

			$enregistrement = $pdo->prepare("INSERT INTO users (pseudo, mdp, email) VALUES (:pseudo, :mdp, :email)");
			$enregistrement->bindParam(":pseudo", $pseudo, PDO::PARAM_STR); 
			$enregistrement->bindParam(":mdp", $mdp, PDO::PARAM_STR); 
			$enregistrement->bindParam(":email", $email, PDO::PARAM_STR); 
			$enregistrement->execute(); 
			// on redirige vers la page connexion.php !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			header("location:index.php");//!\\ a mettre en commntaire en fase de programmation car il bloque les erreurs!!!
		}

		
}
// Avec la ligne suivant commnce les affichages dans la page
require("assets/inc/header.inc.php");
require("assets/inc/nav.inc.php");

?>

    <div class="wrapper">
        <div class="page-header" style="background-image:url('assets/img/backgroundGray.jpg'); text-align:center;">
            <div class="filter"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3">

                            <div class="card card-register" style="background-image: url('assets/img/vinils.jpg');">
							
						<?php
							echo $message;
						?>
                                <h2 class="title" style="font-weight:bold;">Welcome</h2>

                                <form class="register-form" action="" method="post">
								<div class="form-group">
                                    <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Pseudo">
								</div>	
                                <div class="form-group">  
                                    <input type="password" name="mdp" id="mdp" class="form-control" placeholder="Password">
                                </div>    
                                <div class="form-group">   
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">
								</div>
                                    <button type="submit" name="inscription" id="inscription" class="btn btn-danger btn-block btn-round">Jump in!!!</button>
                                </form>
                            </div>
                        </div>
                    </div>
					<div class="footer register-footer text-center">
						<h6>&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i>by us @ WebForce3</h6>
					</div>
                </div>
        </div>
    </div>


<?php
require("assets/inc/footer.inc.php");






