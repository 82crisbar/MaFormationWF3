<?php 
//src/Model/ArticleModel.php 

namespace Model;

use PDO;

class ArticleModel extends Model
{
    public function getAllArticles(){
        return $this -> findAll();
    }

    public function getArticleById($id){
        return $this -> find($id);
    }

    public function deleteArticleById($id){
        return $this -> delete($id);
    }

    public function updateArticleById($id, $infos){
        return $this -> update($id, $infos);
    }

    public function registerArticle($infos){
        return $this -> register($infos);
    }

    //---------------------------------------------

    // requete qui recupere toutes les categories :
    public function getAllCategories(){
        $requete = "SELECT DISTINCT categorie FROM article";
        $resultat = $this -> getDb() -> query($requete);
        
        $categorie = $resultat -> fetchAll(PDO::FETCH_ASSOC);

        if(!$categorie){
            return false;
        } 
        else{
            return $categorie;
        }
    }

    // Requete qui recupere toutes les enregistrements de la table article en fonction de la categorie
    public function getAllArticlesByCategorie($categorie){
        $requete = "SELECT * FROM article WHERE categorie = :categorie";

        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> bindParam(':categorie', $categorie, PDO::PARAM_STR);
        $resultat -> execute();

        $resultat -> setFetchMode(PDO::FETCH_CLASS, "Entity\Article");
        $article = $resultat -> fetchAll();

         if(!$categorie){
            return false;
        } 
        else{
            return $article;
        }

    }
}