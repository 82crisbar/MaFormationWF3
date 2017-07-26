<?php

//11-PDO/pdo.php 
$pdo = new PDO('mysql:host=localhost;dbname=wf3_entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));


try {
// Erreur de requete volontaire :
$resultat = $pdo -> query("eeuiaehuhaetuhe");
}
catch(PDOException $e){
    echo '<div style="background: red; color: white; padding:10px">';
    echo 'Erreur SQL : <br/>';
    echo 'Message : ' . $e -> getMessage() . '<br/>';
    echo 'Fichier : ' . $e -> getFile() . '<br/>';
    echo 'Ligne : ' . $e -> getLine() . '<br/>';
    echo '</div>';
    exit;
 }



// Marqueur non nominatif
$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ?");
$resultat -> execute(array('Amandine'));

// exemple2 : plusieurs valeurs :
$resultat = $pdo -> prepare("SELECT * FROM employes WHERE prenom = ? AND service = ? ");
$resultat -> execute(array('Amandine','Communication'));

// MArqueur nominatif (:)
$resultat = $pdo -> prepare("SELECT * FROM employes WHERE :prenom AND :service ");
$resultat -> execute(array(
    'service' => 'Communication',
    'prenom' => 'Amandine'
    ));

// Query() + fetchAll à l'interieur de la requete
$resultat = $pdo -> query("SELECT * FROM employes", PDO::FETCH_ASSOC);

var_dump($resultat);

foreach($resultat as $valeur){
    echo 'Prenom: ' .$valeur['prenom'] . '<br/>';
}