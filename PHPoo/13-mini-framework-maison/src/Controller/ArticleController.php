<?php 
//Vendor/Controller/ ArticleController.php 

namespace Controller;

class ArticleController extends Controller
{
    //Via l'heritage avec Controller j'ai access a getModel() et à render()

    //Affichage de la page boutique:
    public function afficheAll(){
        //1 : Recuperer tous les produits
        //2 : Recuperer toutes les categories
        //3 : Envoyer la vue boutique.php 

        $articles = $this -> getModel() -> getAllArticles();
        $categories = $this -> getModel() -> getAllCategories();

        $params = array(
            'articles' => $articles,
            'categories' => $categories,
            'titre' => 'Ma super Boutique'
        );

        return $this -> render('layout.html', 'boutique.html', $params);

    }

    //Affichage d'une page article:
    public function affiche($id){
        //1 : Recuperer le produit
        //2 :Recuperer toutes les suggestions
        //3 :Afficher la vue fiche_article.php

        $article = $this -> getModel() -> getArticleById($id);

        if(!$article)
        {
            require __DIR__ . '/../../src/View/404.html';
        }
        else{
             $params = array(
            'article' => $article,
            'titre' => 'Produit :' . $article -> getTitre()
        );

        return $this -> render('layout.html', 'fiche_article.html', $params);
        }


    }

    //Affichage des articles d'une categorie:
    public function categorie($categorie){
        //1 : Recuperer toutes les produits d'une categorie
        //2 : Recuperer toutes les categories
        //3 : Afficher la vue boutique.php 

        $articles =$this -> getModel() -> getAllArticlesByCategorie($categorie);
        $categories = $this -> getModel() -> getAllCategories();

        $params = array(
            'articles' => $articles,
            'categories' => $categories,
            'title' => 'Categorie de produit :' . $categorie
        );

        return $this -> render('layout.html', 'boutique.html', $params );


    }

}