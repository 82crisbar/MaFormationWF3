<?php

header('Content-Type: application/json');

require_once 'connect.php';


$post = [];
$errors = [];

if(!empty($_POST)){

	$post = array_map('trim', array_map('strip_tags', $_POST));

	if(empty($post['brand'])){
		$errors[] = 'La marque du véhicule est invalide';
	}

	if(empty($post['model'])){
		$errors[] = 'Le modèle du véhicule est invalide';
	}

	if(empty($post['year']) || !is_numeric($post['year'])){
		$errors[] = 'L\'année du véhicule est invalide';
	}

	if(empty($post['color'])){
		$errors[] = 'La couleur du véhicule est invalide';
	}

	if(count($errors) === 0){ 
		// Si il y a pas d'erreurs on peut inserer le valeurs reçu, dans la BDD

		$insert = $dbh->prepare('INSERT INTO vehicles(brand, model, year, color) VALUES(:brand, :model, :year, :color)');
		$insert->bindValue(':brand', $post['brand']);
		$insert->bindValue(':model', $post['model']);
		$insert->bindValue(':year', $post['year'], PDO::PARAM_INT);
		$insert->bindValue(':color', $post['color']);

		if($insert->execute()){
			
			$json = [
				'code'  => 'success',
				'msg'	=> 'Le véhicule a été ajouté a la base des données!',
			];
		}
		else {
			var_dump($insert->errorInfo());
		}
	}	
	else {
		$json = [
			'code' => 'errors', 
			'msg'  => implode('<br>', $errors),
		];
	}

	echo json_encode($json);

}