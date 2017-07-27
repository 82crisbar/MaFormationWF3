<?php

//web/index.php_ini_loaded_file

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

// Lancement de l'appliation (interupteur) :
// $app = new Application;
// $app -> run();

//TEST 1 : Entity

// $article = new Entity\Article;
// $article -> setTitre('Mon super article !');
// echo $article -> getTitre();
// localhost/PHPoo/13-framework/web/index.php 

// //TEST 2 : PDOManager
// $pdom = Manager\PDOManager::getInstance();
// $resultat = $pdom -> getPdo() -> query("SELECT * FROM article");
// $articles = $resultat -> fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// print_r($articles);
// echo '</pre>';

// TEST : Model 
// $model = new Model\Model;

// $article = $model -> findAll();
// //$article = $model -> find(14);

// echo '<pre>';
// var_dump($article);
// echo '</pre>';

//Test 4 : ArticleModel
$am = new Model\ArticleModel;

$articles = $am -> getAllArticles();
$articles = $am -> getArticleById(6);
$categories = $am -> getAllCategories();
$article2 = $am -> getAllArticlesByCategorie('Chemise');

echo '<pre>';
var_dump($articles);
echo '</pre>';
