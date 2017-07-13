<?php

//Fonction pour savoir si un utilisateur est connecté
function utilisateur_est_connecte()
{
	if(isset($_SESSION['utilisateur']))
	{
		// si l'indice utilisateur existe alors l'utilisateur est connecte car il est passe par la page de connexion
		return true;// Si on passe sur cette ligne, on sort de la fonction et le return false en dessus ne sera pas pris en compte
	}
	return false;// Si on rentre pas dans le if, on returne false
}

//Fonction pour savoir si un utilisateur est connecte mais aussi a le status administrateur (admin)
function utilisateur_est_admin()
{
	if(utilisateur_est_connecte() && $_SESSION['utilisateur']['statut']==1)
	{
		return true;
	}
	return false;
}

// Création du Panier
function creation_panier()
{
	if(!isset($_SESSION['panier']))
	{
		$_SESSION['panier'] = array();
		$_SESSION['panier']['id_article']= array();
		$_SESSION['panier']['prix']= array();
		$_SESSION['panier']['quantite']= array();
		$_SESSION['panier']['titre']= array();
		$_SESSION['panier']['photo']= array();
	}
}

// Function ajouter une article dans le panier
function ajouter_un_article_au_panier($id_article, $prix, $quantite, $titre, $photo)
{
	// Avant d'ajouter, on verifie si l'article n'est pas dejà present dans le panier, si c'est le cas on ne fait que modifier sa quantité 
	$position = array_search($id_article, $_SESSION['panier']['id_article']);
	// array_search() permet de verifier si un valeur se trouve dans un tableau array. Si c'est le cas on recupere l'indice correspondant.
	
	if($position !== FALSE)
	{
		$_SESSION['panier']['quantite'][$position] += $quantite;
	}
	else{
		$_SESSION['panier']['quantite'][] = $quantite;
		$_SESSION['panier']['id_article'][] = $id_article;
		$_SESSION['panier']['prix'][] = $prix;
		$_SESSION['panier']['titre'][] = $titre;
		$_SESSION['panier']['photo'][] = $photo; // ici je rajoute la photo sur le panier
	}
}

//retitrer un article du panier

function retirer_article_du_panier($id_article)
{
	$position = array_search($id_article, $_SESSION['panier']['id_article']);
	// On verifie si l'article est bien present dans le panier et avec array_search on recupere son indice correspondant
	if($position !== FALSE)
	{
		array_splice($_SESSION['panier']['id_article'],$position, 1);
		array_splice($_SESSION['panier']['quantite'],$position, 1);
		array_splice($_SESSION['panier']['prix'],$position, 1);
		array_splice($_SESSION['panier']['titre'],$position, 1);
		array_splice($_SESSION['panier']['photo'],$position, 1); // ici j'enleve la photo avec le rest du panier
		
		// array_splice() permet de supprimer un element dans un tableau et sourtout de reordonner les indices afin de ne pas avoir de trou dans notre tableau
		// array_splice(le tableau_concerne, indice_a_supprimer, nb_d'element a supprimer)
	
	}
}

// function calcul du montant total du panier
function montant_total()
{
	
	// Calcul du montant total du panier
	if(!empty($_SESSION['panier']['titre']))
	{
		$taille_tab = sizeof($_SESSION['panier']['id_article']);
		$total = 0;
		for($i = 0; $i < $taille_tab; $i++)
		{
			$total += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['quantite'][$i];
		}
		return $total;
	}
}