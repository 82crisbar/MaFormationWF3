<?php
require("inc/init.inc.php");
$erreur = "";
// creation de la fonction Vider le panier 
if(isset($_GET['action']) && $_GET['action'] == "vider")
{
	unset($_SESSION['panier']);// Permet de supprimer la partie panier de la session
}

// retirer un article du panier
if(isset($_GET['action']) && $_GET['action'] == 'retirer' && !empty($_GET['id_article']))
{
	retirer_article_du_panier($_GET['id_article']);
}

// Creation du panier
creation_panier();

if(isset($_POST['ajout_panier']))
{
	//si l'indice existe dans post alors l'utilisateur a cliqué sur le bouton ajouter au panier (depuis la page fiche_article.php)
	$info_article = $pdo->prepare("SELECT * FROM article WHERE id_article = :id_article");
	$info_article->bindParam(":id_article", $_POST['id_article'], PDO::PARAM_STR);
	$info_article->execute();
	
	$article = $info_article->fetch(PDO::FETCH_ASSOC);
	
	// Ajout de la TVA sur le prix
	$article['prix'] = $article['prix'] * 1.2;
	
ajouter_un_article_au_panier($_POST['id_article'], $article['prix'], $_POST['quantite'], $article['titre'], $article['photo']);

//On redirige sur la meme page pour se perdre les informations dans POST afin que si l'utilisateur actualise la page (F5) l'article ne soit pas rentré une nouvelle fois
header("location:panier.php");

}



//§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
//            VALIDATION DU PAYEMENT DU PANIER          //
//§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§

if(isset($_GET['action']) && $_GET['action'] == 'payer' && !empty($_SESSION['panier']['prix']))
{	//si l'utilisateur click sur le bouton "payer le panier"
	// 1ere action: verification du stock disponible en comparaison des quantites demandées.
	
	for($i = 0; $i < count($_SESSION['panier']['titre']); $i++)
	{
		$resultat = $pdo->query("SELECT * FROM article WHERE id_article = " . $_SESSION['panier']['id_article'][$i]);
		$verif_stock = $resultat->fetch(PDO::FETCH_ASSOC);
		
		if($verif_stock['stock'] < $_SESSION['panier']['quantite'][$i])
		{
			// Si on rentre dans cette condition alors il y a un stock inferieur à la quantité demandée.
			// 2 possibilité: stock à 0 ou stock > 0 mais inferieur a la quantité demandé x l'utilisateur
			if($verif_stock['stock'] > 0)
			{
				// Il reste du stock alors on effecte directement le stock restant pour la quatite demandée
				$_SESSION['panier']['quantite']['$i'] = $verif_stock['stock'];
				$message .= '<div class="alert alert-danger">Attention la quantité de l\'article "' . $_SESSION['panier']['titre'][$i] . '" a été modifié ou notre stock est insufficent!<br />Veuillez verifier votre commande.</div>';
			}
			else{
				$message .= '<div class="alert alert-danger">Attention l\'article "' . $_SESSION['panier']['titre'][$i] . '" a été supprimé de votre panier car nous sommes en rupture de stock pour ce produit !<br />Veuillez verifier votre commande.</div>';
				
				retirer_article_du_panier($_SESSION['panier']['id_article'][$i]);
				
				$i--; // SI NOUS ENLEVONS UN ARTICLE DU PANIER, il est necessaire de décrémenter (-1) la variable $i car avec array_splice (voir retirer_article_du_panier() sur function.inc.php) les indices sont reordonnes)
			}
			$erreur = true;
		}
	}

	if(!$erreur) // ou if($erreur != true)	
	{
		$id_membre = $_SESSION['utilisateur']['id_membre'];
		$montant_commande = montant_total();
		$pdo->query("INSERT INTO commande (id_membre, montant, date) VALUES ($id_membre, $montant_commande, NOW())");
		$id_commande = $pdo->lastInsertId(); // On recupere l'id inseré par la derniere requete
		$nb_tour_panier = count($_SESSION['panier']['titre']);
		for($i = 0; $i < $nb_tour_panier; $i++)
		{
			$id_article_commande = $_SESSION['panier']['id_article'][$i];
			$quantite_commande = $_SESSION['panier']['quantite'][$i];
			$prix_commande = $_SESSION['panier']['prix'][$i];
			$pdo->query("INSERT INTO details_commande(id_commande, id_article, quantite, prix) VALUES ($id_commande, $id_article_commande, $quantite_commande, $prix_commande)");
			
			//Mise a jour du stock
			$pdo->query("UPDATE article SET stock = stock - $quantite_commande WHERE id_article = $id_article_commande");
		}	
		unset($_SESSION['panier']);
	}
		
}


// La ligne suivant commnce les affichages dans la page
require("inc/header.inc.php");
require("inc/nav.inc.php");
//echo '<pre>'; var_dump($_POST); '</pre>';
//echo '<pre>'; print_r($_SESSION); '</pre>';
//echo '<pre>'; var_dump($total); '</pre>';
?>


 
    <div class="container">

      <div class="starter-template">
        <h1><span class="glyphicon glyphicon-shopping-cart" style="color: GreenYellow;"></span>Panier</h1>
        <?php //echo $message; // messages destines a l'utilisateur ?>
		<?= $message; // cette balise php inclue un echo et est equivalent a la ligne au dessus ?>
      </div>
	  
	  
	  <div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<table class="table table-bordered " style="background:lightgrey;">
				<tr>
					<th colspan="8">Panier</th>
				</tr>
				<tr>
					<th>Article</th>
					<th>Titre</th>
					<th>Quantité</th>
					<th>Prix unitaire</th>
					<th>Prix total article</th>>
					<th>Photo</th>
					<th>Action</th>
					
					
				</tr>	
					<?php 
						// Verification si le panier est vide sur n'importe quel tableau array dernier niveau(id_article / prix / quantite ou titre)
						if(empty($_SESSION['panier']['id_article']))
						{
							echo '<tr><th colspan="8" style="color:red; text-align:center; ">Aucun article dans votre panier</th></tr>';
						}
						else{
							//Sinon on affiche tous les produits dans un tableau html //!\\ Il s'affiche dans l'ordre d'ecriture
							$taille_tableau = count($_SESSION['panier']['titre']);
							for($i = 0; $i < $taille_tableau; $i++)
							{
								echo '<tr>';
								echo '<td>' . $_SESSION['panier']['id_article'][$i] . '</td>';
								echo '<td>' . $_SESSION['panier']['titre'][$i] . '</td>';
								echo '<td>' . $_SESSION['panier']['quantite'][$i] . '</td>';
								echo '<td>' . number_format($_SESSION['panier']['prix'][$i], 2). '€</td>';
									// number format() permet de forcer l'affichage de 0 apres la virgule
								echo '<td>' . number_format($_SESSION['panier']['prix'][$i], 2) * $_SESSION['panier']['quantite'][$i] . '€</td>';
								echo '<td><img src="' . URL . 'photo/' . $_SESSION['panier']['photo'][$i] . '" class="img-thumbnail img-responsive "/></td>'; 
								echo '<td><a href="?action=retirer&id_article=' . $_SESSION['panier']['id_article'][$i] . '" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>';
								echo '</tr>';
							}
							// Affichage du prix total du panier ttc
							echo '<tr>
									<td colspan="4">Montant total <b>TTC</b></td>
									<td colspan="4"><b>' . number_format(montant_total(), 2) .'€</b></td>
								 </tr>';	
									
							
							// Affichage du bouton pour voir si l'utilisateur est connecte 
							if(utilisateur_est_connecte())
							{
								//bouton payer le panier
								echo '<tr><td colspan="8"><a href="?action=payer" class="btn btn-success form-control">Payer</a></td></tr>';
							}
							else{
								
								echo '<tr><td colspan="8">Afin de valider votre commande, veuillez vous <a href="connexion.php">connecter</a> ou vous<a href="inscription.php">inscrire</a></td></tr>';
							}
							echo '<tr><td colspan="8"><a href="?action=vider" class="btn btn-warning form-control">Vider le panier</a></td></tr>';
						}
						// rajouter un ligne du tableau qui affiche un lien a href (?action=payer) pour payer le panier si l'utilisateur est connecte.Sinon afficher un texte pour proposer a l'utilisateur de s'inscrire ou de se connecter
						
					
						
						// rajouter une ligne du tableau qui affiche un bouton vider le panier uniquement si le panier n'est pas vide.Et faire le traitement afin que si on click sur le bouton, il faut vider le panier.(unset($_SESSION['panier']))
						
						// rajouter une ligne pour afficher le prix total du panier 
					?>
				
			</table>
			<hr />
			<p style="background:lightgrey;font-size:18px;">Reglement par cheque uniquement !<br />A l\'adresse: 18 rue Geoffroy Lasnier 75004 PARIS</p>
			<hr />
			<p>
			<?php
			if(utilisateur_est_connecte())
			{
				// Si l'utilisateur est connecté, on affiche son adesse de livraison
				echo '<address style="background:lightgrey;font-size:18px;"><p>Votre adresse de livraison est: </b><br />' . $_SESSION['utilisateur']['adresse'] . '<br />'  . $_SESSION['utilisateur']['cp'] . '<br />' . $_SESSION['utilisateur']['ville'] . '</address>';
			}
			
			?>
			</p>
			<hr />
		</div>
	  </div>
	  
	
	
    </div><!-- /.container -->

<?php
require("inc/footer.inc.php");