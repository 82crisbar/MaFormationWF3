<?php

//Vendor/Model/Model.php 

namespace Model;
use PDO;
use Manager\PDOManager;

class Model
{
    private $db;//Contiendra notre objet pdo;

    //Fonction pour recuperer l'objet PDO :
    public function getDb(){
        $this -> db = PDOManager::getInstance() -> getPdo();
        return $this -> db;
    }

    //Methode pour recuperer le nom de la table lors des requetes generiques
    public function getTableName(){
        //get_called_class() : Me retourne le nom de la classe dans laquelle je suis
        //ArticleModel ===> Model\ArticleModel ======> article
        //MembreModel ===> Model\MembreModel ========> membre

        $table = strtolower(str_replace(array('Model\\','Model'),'', get_called_class()));
        // La ligne ci-dessus va transformer 'Model\ArticleModel' en 'article' et stocker ça dans $table 

        return $table;
    

    }

    //---------------------------------------------------------------------------
    //---------------------------------------------------------------------------

    //REQUETES GENERIQUES:

    //Requete pour récupérer toutes les infos d'une table
    public function findAll(){
        $requete = "SELECT * FROM " . $this -> getTableName();
        //$requete = "SELECT * FROM article";
        //$requete = "SELECT * FROM membre";

        $resultat = $this -> getDb() -> query($requete);
        $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . ucfirst($this -> getTableName()));
        // new Entity\Article
        // setFetchMode() est une fonction de PDOStatement. Cela permet d'instancier un objet (dans notre cas Entity\Article par exemple), de prendre les resultats de la requete et d'affecter à chaque proprieté de l'objet les valeurs trouvées dans les champs correspondant dans la BDD.Pour que cela fonctionne il faut ABSOLUTLEMENT que les proprietes des entites correspondent aux champs dans la BDD.

        $donnees = $resultat -> fetchall();

        if(!$donnees){
            return false;
        }
        else{
            return $donnees;
        }
    }
    //Requete pour recuperer un enregistrement d'une table (par son id)
    public function find($id){
        $requete = "SELECT * FROM " . $this -> getTableName() . " WHERE id_" . $this-> getTableName() . " = :id";

        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> bindParam(':id', $id, PDO::PARAM_INT);
        $resultat -> execute();

        $resultat -> setFetchMode(PDO::FETCH_CLASS, 'Entity\\' . ucfirst($this -> getTableName()));

        $donnees = $resultat -> fetch();

        if(!$donnees){
            return false;
        }
        else{
            return $donnees;
        }

    }
    //requete pour supprimer un enregistrement (par son id)
    public function delete($id){
        $requete = "DELETE FROM " . $this -> getTableName() . " WHERE id_" . $this -> getTableName() . " =:id";

        $resultat = $this -> getDb() -> prepare($requete);
        $resultat -> bindParam(':id', $id, PDO::PARAM_INT);
            return $resultat -> execute();
    }
    //Requete pour modifier un enregistrement (par son id)
    public function update($id, $infos){
        $newValues = '';
        $a = 0;

       foreach($infos AS $key => $value){
           if($a == 0){
               $newValues .= " $key = :$key";
               $a++;
           }
           else{
               $newValues .= " $key = :$key";
           }
           
        }

        $requete = "UPDATE " . $this -> getTableName() . " set " . $newValues . " WHERE id_" . $this -> getTableName() . " = :id";
        $resultat = $this -> getDb() -> prepare($requete);
        $infos['id'] = $id;

        return $resultat -> execute($infos);
    }

    // requete pour inserer un enregistrement dans une table
    public function register($infos){
        $requete = 'INSERT INTO ' . $this -> getTableName() . ' (' .implode(',', array_keys($infos)) . ') VALUES (' . ":" . implode(", :", array_keys($infos)) . ')';

        // $requete = 'INSERT INTO article (titre, description, prix) VALUE (:titre, :description, :prix)'

        $resultat = $this -> getDb() -> prepare($requete);

        if($resultat -> execute($infos)){
            return $this -> getDb() -> lastInsertId();
        }
        else{
            return false;
        }
    }            
}