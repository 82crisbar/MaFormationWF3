<?php
require("../inc/init.inc.php");

//restriction d'access si l'utilisateur n'est pas admin alors il ne doit pas acceder a cette page

if(!utilisateur_est_admin())
{
	header("location:../connexion.php");
	exit();// permet d'arreter l'execution du script au cas ou une personne malveillante ferait des ingections via GET
}

//Mettre en place un controle pour savoir si l'utilisateur veut une suppression d'un produit.

if(isset($_GET['action']) && $_GET['action'] == 'suppression' && !empty($_GET['id_article']) && is_numeric($_GET['id_article']))
{
	// is_numeric permet de savoir si l'information est bien une valeur numerique sans tenir compte de son type (les infos provenant de GET et de POST sont toujours de type string )
	$id_article = $_GET['id_article'];
	// on fait une requete pour recuperer les infos de l'article afin de connaitre  la photo pour la supprimer
	$article_a_supprimer = $pdo->prepare("SELECT * FROM article WHERE id_article = :id_article");
	$article_a_supprimer->bindParam(":id_article", $id_article, PDO::PARAM_STR);
	$article_a_supprimer->execute();
	
	$article_a_suppr = $article_a_supprimer->fetch(PDO::FETCH_ASSOC);
	// On verifie si la photo existe
	if(!empty($article_a_suppr['photo']) )
	{
		// On verifie le chemin si le fichier existe
		$chemin_photo = RACINE_SERVEUR . 'photo/' . $article_a_suppr['photo'];
		//$message .= $chemin_photo;
		if(file_exists($chemin_photo))
		{
			unlink($chemin_photo); // unlink() permet de supprimer un fichier sur un serveur.
		}
	}
	$suppression = $pdo->prepare("DELETE FROM article WHERE id_article = :id_article ");
	$suppression->bindParam(":id_article", $id_article, PDO::PARAM_STR);
	$suppression->execute();
	$message .= '<div class="alert alert-success" role="alert" style="margin-top = 20px;">L\'article n°' . $id_article . 'a bien été supprimé</div>';
	
	// On bascule sur l'affichage du tableau
	$_GET['action'] = 'affichage';
}

// declaration de variables vides pour affichage dans les values du formulaire
$id_article = "";
$reference = "";
$categorie = "";
$titre = "";
$description = "";
$couleur = "";
$taille = "";
$sexe = "";
$prix = "";
$stock = "";
$photo_bdd = "";

//§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§	
// RECUPERATION DES INFORMATIONS D'UN ARTICLE A MODIFIER  //
//§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
if(isset($_GET['action']) && $_GET['action'] == 'modification' && !empty($_GET['id_article']) && is_numeric($_GET['id_article']))
{
	$id_article = $_GET['id_article'];
	$article_a_modif = $pdo->prepare("SELECT * FROM article WHERE id_article = :id_article");
	$article_a_modif->bindParam(":id_article", $id_article, PDO::PARAM_STR);
	$article_a_modif->execute();
	$article_actuel = $article_a_modif->fetch(PDO::FETCH_ASSOC);
	
	$id_article = $article_actuel['id_article'];
	$reference = $article_actuel['reference'];
	$categorie = $article_actuel['categorie'];
	$titre = $article_actuel['titre'];
	$description = $article_actuel['description'];
	$couleur = $article_actuel['couleur'];
	$taille = $article_actuel['taille'];
	$sexe = $article_actuel['sexe'];
	$prix = $article_actuel['prix'];
	$stock = $article_actuel['stock'];
	// On recupere la photo de l'article dans une nouvelle variable
	$photo_actuelle = $article_actuel['photo'];
	
	
	
}


// controle sur l'exercice de tous les champs provenant du formulaire  (sauf le bouton de validation)
if(isset($_POST['id_article']) && isset($_POST['reference']) && isset($_POST['categorie']) && isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['couleur']) && isset($_POST['taille']) && isset($_POST['sexe']) && isset($_POST['prix']) && isset($_POST['stock']))
{	
	$id_article = $_POST['id_article'];
	$reference = $_POST['reference'];
	$categorie = $_POST['categorie'];
	$titre = $_POST['titre'];
	$description = $_POST['description'];
	$couleur = $_POST['couleur'];
	$taille = $_POST['taille'];
	$sexe = $_POST['sexe'];
	$prix = $_POST['prix'];
	$stock = $_POST['stock'];
	
// variable de control pour la reference article
	$erreur = "";


	
											//////////////////////////////////////////////////////////////////
											//				START ENREGISTREMENT DES PRODUITS				//
											//////////////////////////////////////////////////////////////////	
	
	// Control sur la disponibilite de la reference en BDD si on est dans le cas d'un ajout car lors de la modification la reference existerà
	$verif_reference = $pdo->prepare("SELECT * FROM article WHERE reference = :reference");
		$verif_reference->bindParam(":reference", $reference, PDO::PARAM_STR);
		$verif_reference->execute();
		
		if($verif_reference->rowCount() > 0 && isset($_GET['action']) && $_GET['action'] == 'ajout')
		{
			//Si on obtient au moin une ligne alors la reference est dejà prise
			$message .= '<div class="alert alert-danger">Attention la reference choisi n\'est pas disponible</div>';
			$erreur = true;
		}
		
		if(empty($titre))
		{
			$message .= '<div class="alert alert-danger">Attention le titre est obbligatoire</div>';
			$erreur = true;
		}
		// recuperation de l'ancienne photo dans le cas d'une modification&id_article
		if(isset($_GET['action']) && $_GET['action'] == "modification")
		{
			if(isset($_POST['ancienne_photo']))
			{
				$photo_bdd = $_POST['ancienne_photo'];
			}
		}
		
		// Verification si l'utilisateur a chargé une image 
		if(!empty($_FILES['photo']['name']))
		{
			//si c'est ne pas vide alors un fichier a bien ete chargé via le formulaire.
			
			//On concatene la reference sur le titre a fin de ne jamais avoir un fichier avec un nom deja existant sur le serveur.
			$photo_bdd = $reference . $_FILES['photo']['name'];
			
			// Verification de l'extension de l'image (extensions acceptées: jpg, jpeg, png, gif)
			$extension = strrchr($_FILES['photo']['name'], '.');// Cette fonction predefinie permet de decouper une chaine selon un caracter  fourni en 2eme argument (ici le .) 
			//!\\ATTENTION cette fonction deccouperà la chaine a partir de la derniere occourrence du 2eme argument (donc nous renvoie la cheine comprise apres le dernier point trouvé)
			// Example : maphoto.jpg => on recupere .jpg
			// Example : maphoto.photo.png => on recupere .png
			// var_dump($extension);
			
			// On transforme $extension afin que tous les caracteres soient en minuscule
			$extension = strtolower($extension);// inverse strtoupper
			// On enleve le .
			$extension = substr($extension, 1);// exemple: .jpg => jpg
			// les extensions acceptées 
			$tab_extensions_valide = array("jpg", "jpeg", "png", "gif");
			// Nous pouvons donc verifier si $extension fait partie des valeurs autorisé dans $tab_extensions_valide
			$verif_extension = in_array($extension, $tab_extensions_valide);// in_array verifie si un valeur fournie en 1er argument fait partie des valeurs contenues dans un tableau array fourni en 2 argument.
			
			if($verif_extension && !$erreur)
			{
				// Si $verif_extension est egal a true et que $erreur n'est pas egala true (il n'y a pas d'erreur au prelable)
				$photo_dossier = RACINE_SERVEUR . 'photo/' . $photo_bdd;
				
				copy($_FILES['photo']['tmp_name'], $photo_dossier);
				// copy() permet de copier un fichier depuis un emplacement fourni en premier argument vers un autre emplacement fourni en deuxieme argument.
			}
			elseif(!$verif_extension) {
				$message .= '<div class="alert alert-danger">Attention la photo n\'a pas une extension valide (extension acceptées: jpg, jpeg, png, gif) </div>';
				$erreur = true;
			}
			
				
		}		
		
		if(!$erreur) // equivaut a dire if($erreur == false)
		{
			if(isset($_GET['action']) && $_GET['action'] == 'modification')
			{
				$enregistrement = $pdo->prepare("UPDATE article SET reference = :reference, categorie = :categorie, titre = :titre, description = :description, couleur = :couleur, taille = :taille, sexe = :sexe, prix = :prix, stock = :stock, photo = :photo WHERE id_article = :id_article" );
				$id_article = $_POST['id_article'];
				$enregistrement->bindParam(":id_article", $id_article, PDO::PARAM_STR);
			}
			elseif(isset($_GET['action']) && $_GET['action'] == 'ajout')
			{
				//Insertion des produits
				$enregistrement = $pdo->prepare("INSERT INTO article (reference, categorie, titre, description, couleur, taille, sexe, prix, stock, photo) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :sexe, :prix, :stock, :photo )");
			}
			
			
			$enregistrement->bindParam(":reference", $reference, PDO::PARAM_STR); 
			$enregistrement->bindParam(":categorie", $categorie, PDO::PARAM_STR); 
			$enregistrement->bindParam(":titre", $titre, PDO::PARAM_STR); 
			$enregistrement->bindParam(":description", $description, PDO::PARAM_STR); 
			$enregistrement->bindParam(":couleur", $couleur, PDO::PARAM_STR); 
			$enregistrement->bindParam(":taille", $taille, PDO::PARAM_STR); 
			$enregistrement->bindParam(":sexe", $sexe, PDO::PARAM_STR);  
			$enregistrement->bindParam(":prix", $prix, PDO::PARAM_STR);  
			$enregistrement->bindParam(":stock", $stock, PDO::PARAM_STR); 
			$enregistrement->bindParam(":photo", $photo_bdd, PDO::PARAM_STR); 
			$enregistrement->execute();

		}
	
}
												//////////////////////////////////////////////////////////////////
												//				FIN ENREGISTREMENT DES PRODUITS					//
												//////////////////////////////////////////////////////////////////

// La ligne suivant commnce les affichages dans la page
require("../inc/header.inc.php");
require("../inc/nav.inc.php");
?>


 
    <div class="container">

      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-user" style="color: lime;"></span>Gestion Boutique</h1>
        <?php //echo $message; // messages destines a l'utilisateur ?>
		<?= $message; // cette balise php inclue un echo et est equivalent a la ligne au dessus ?>
		<hr />
		<a href="?action=ajout" class="btn btn-default">Ajouter un produit</a>
		<a href="?action=affichage" class="btn btn-info">Affiche les produits</a>
      </div>
	  
	  <?php 															//!\\ 
	  // affichage de tous les produits dans un tableau html          
	  // exercice: couper la description si elle est trop longue
	  // exercice: Afficher l'image dans une balise <img src="" />
	  
	  if(isset($_GET['action']) && $_GET['action'] == "affichage") 
	  {
			$resultat = $pdo->query("SELECT * FROM article");
			 echo '<hr />';
				echo '<div class="row">';
					echo '<div class="col-sm-12">';
						echo '<table class="table table-bordered" style="background:lightgray;">'; 
						echo '<tr>';
						 
						 $nb_col = $resultat->columnCount(); // Affichage number de colonnes
				 
						 for($i = 0; $i < $nb_col; $i++)
						{
							
							$colonne = $resultat->getColumnMeta($i);
							echo '<th style="padding: 10px;">' . $colonne['name'] . '</th>';
						}
						echo '<th>Modif</th>';
						echo '<th>Supprimer</th>';	
						 echo '</tr>';
								  
						 while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
						{
							echo '<tr>';
						 
							foreach($ligne AS $indice => $valeur)
							{
							 if($indice == 'photo')
							 {
							 echo '<td style="padding: 10px;"><img src="' . URL . 'photo/' . $valeur . '"width="140"></td>';
							 }
							 elseif($indice == "description")
							 {
								echo '<td>' . substr($valeur, 0, 56) . '...<a href="" >Lire la suite</a></td>'; 
							 }
							 elseif($indice == "prix")
							 {
								echo '<td><span style="color: red;">' . $valeur . '€</span>' . '</td>';
							 }
							 else{
								echo '<td>' . $valeur .  '</td>';
							 }
							}
							echo '<td><a href="?action=modification&id_article=' . $ligne['id_article'] .'" class="btn btn-warning"><span class="glyphicon glyphicon-refresh"></span></a></td>';
							echo '<td><a onclick="return(confirm(\'Etes vous sur\'));"  href="?action=suppression&id_article=' . $ligne['id_article'] .'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>';
							echo '</tr>';
						}
						 echo '</table>';
				echo'</div>';	
			echo'</div>';
	  }
	  
	  ?>

<?php // Affichage du formulaire d'enregistrament
if(isset($_GET['action']) && ($_GET['action'] == "ajout" || $_GET['action'] == 'modification')) { ?>  
	   
	   <div class="row"><!-- Start formulaire -->
		<div class="col-sm-4 col-sm-offset-4">
			<form method="post" action="" class="well" enctype="multipart/form-data">
			
				<input type="hidden" name="id_article" id="id_article" class="form-control" value="<?php echo $id_article; ?>" />
				<label for="reference">Reference<span style="color:red;">*</span></label>
				<input type="text" name="reference" id="reference" class="form-control" value="<?php echo $reference; ?>" />
				<label for="categorie">Categorie</label>
				<select type="text" name="categorie" id="categorie" class="form-control" value="<?php echo $categorie; ?>" />
				<option <?php if($categorie == 'T-shirt') {echo 'selected';} ?> >T-shirt</option>
				<option <?php if($categorie == 'Pantalon') {echo 'selected';} ?> >Pantalon</option>
				<option <?php if($categorie == 'Manteau') {echo 'selected';} ?> >Manteau</option>
				<option <?php if($categorie == 'Veste') {echo 'selected';} ?> >Veste</option>
				<option <?php if($categorie == 'Chaussures') {echo 'selected';} ?>>Chaussures</option>
				<option <?php if($categorie == 'Chemises') {echo 'selected';} ?> >Chemises</option>
				<option <?php if($categorie == 'Accessoires') {echo 'selected';} ?> >Accessoires</option>
				</select>
				<label for="titre">Titre<span style="color:red;">*</span></label>
				<input type="text" name="titre" id="titre" class="form-control" value="<?php echo $titre; ?>" />
				<label for="description">Description</label>
				<input type="textarea" name="description" id="description" class="form-control" value="<?php echo $description; ?>" />
				<label for="couleur">Couleur</label>
				<select type="text" name="couleur" id="couleur" class="form-control" value="<?php echo $couleur; ?>" />
				<option <?php if($couleur == 'Jaune') {echo 'selected';} ?> >Jaune</option>
				<option <?php if($couleur == 'Rouge') {echo 'selected';} ?> >Rouge</option>
				<option <?php if($couleur == 'Vert') {echo 'selected';} ?> > Vert</option>
				<option <?php if($couleur == 'Violet') {echo 'selected';} ?> >Violet</option>
				<option <?php if($couleur == 'Bleu') {echo 'selected';} ?> >Bleu</option>
				</select>
				<label for="taille">Taille</label>
				<select type="text" name="taille" id="taille" class="form-control" value="<?php echo $taille; ?>" />
				<option <?php if($taille == 'XS') {echo 'selected';} ?> >XS</option>
				<option <?php if($taille == 'S') {echo 'selected';} ?> >S</option>
				<option <?php if($taille == 'M') {echo 'selected';} ?> >M</option>
				<option <?php if($taille == 'L') {echo 'selected';} ?> >L</option>
				<option <?php if($taille == 'XL') {echo 'selected';} ?> >XL</option>
				</select>
				<label for="sexe">Sexe</label>
				<select type="text" name="sexe" id="sexe" class="form-control" value="<?php echo $sexe; ?>" />
				<option value="m">Homme</option>
				<option value="f" <?php if($sexe == 'f') {echo 'selected';} ?> >Femme</option>
				</select>
				
				<?php 
				// affichage de la photo actuelle dans le cas d'une modification d'article 
					if(isset($article_actuel)) // si cette variable existe alors nous sommes dans le cas d'une modification
					{
						echo '<div>';
						echo  '<label>Photo actuelle</label>';
						echo '<img src="' . URL . 'photo/' . $photo_actuelle . '" class="img-thumbnail" width="210" />';
						// On crée un champ chache qui contiendrà la nom de la photo afin de recuperer lors de la validation du formulaire 
						echo '<input type="hidden" name="ancienne_photo" value="' . $photo_actuelle . '" />';
						echo '</div>';
					}
				?>
				
				<label for="photo">Photo</label>
				<input type="file" name="photo" id="photo" class="form-control" />


				<label for="prix">Prix</label>
				<input type="text" name="prix" id="prix" class="form-control" value="<?php echo $prix; ?>" />
				<label for="stock">Stock</label>
				<input type="text" name="stock" id="stock" class="form-control" value="<?php echo $stock; ?>" />
				<hr />
				<div><span style="color:red;">*(champs obligatoire)</span></div>
				<button type="submit" name="acheter" id="acheter" class="form-control btn btn-success" style="margin-top:20px;"><span class="glyphicon glyphicon-star-empty" style="color:lime;"></span> Creation article <span class="glyphicon glyphicon-star-empty" style="color:lime";></span></button>
			</form>	
		</div>
	  </div><!-- End formulaire -->
	  
<?php 
}     // accolade correspondante à la condition sur l'affichage du formulaire 
	  // if(isset($_GET['action']) && $_GET['action'] == "ajout")   
?>
    </div><!-- /.container -->

<?php
require("../inc/footer.inc.php");