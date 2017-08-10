<?php 

// On inclut le bon fichier, c'est connect.php pas connection.php'.
require_once 'connect.php';

// On definis nos variables il faut penser a créer une variable array pour l'affichage des erreurs!
$errors = array();
$order = '';
// On vérifie que les paramètres d'url sont définis attention a l'ouverture et fermeture des parenthèses'!
if(isset($_GET['order']) && isset($_GET['column'])){

	// Le paramètre GET doit correspondre à ce qui est envoyé dans l'url
	if($_GET['column'] == 'lastname'){
		$order = ' ORDER BY lastname';
	}
	// Attention!!
	// Ça c'est l'opérateur de comparaison "==" et ça l'opérateur d'affectation "=" ceci permet de donner un valeur à une variable l'utre est fait pour comparer deux valeurs.
	elseif($_GET['column'] == 'firstname'){
		$order = ' ORDER BY firstname';
	}
	elseif($_GET['column'] == 'birthdate'){
		$order = ' ORDER BY birthdate';
	}

	if($_GET['order'] == 'asc'){
		$order.= ' ASC';
	}
	elseif($_GET['order'] == 'desc'){
		$order.= ' DESC';
	}
}

if(!empty($_POST)){
	// On s'assure que le données recues soit "propres" avec la fonction strip_tags() and trim()
	foreach($_POST as $key => $value){
		$post[$key] = strip_tags(trim($value));
	}
	//Attention a tes parenthéses! Avec la fonction strlen() on va checker la longeur du string que on obtien avec $_POST, on verifie que la valeur soit au moin de trois caractéres

	if(strlen($post['firstname']) < 3){
		$errors[] = 'Le prénom doit comporter au moins 3 caractères';
	}
	if(strlen($post['lastname']) < 3){
		$errors[] = 'Le nom doit comporter au moins 3 caractères';
	}
	// Le nom de la fonction est filter_var et non filter_variable
	if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
		$errors[] = 'L\'adresse email est invalide';
	}
	if(empty($post['birthdate'])){
		$errors[] = 'La date de naissance doit être complétée';
	}
	if(empty($post['city'])){
		$errors[] = 'La ville ne peut être vide';
	}

	// Si le tableau $errors est vide, tout est ok pour pouvoir exécuter la  requète SQL!
	if(empty($errors)){
		$insertUser = $db->prepare('INSERT INTO users (gender, firstname, lastname, email, birthdate, city) VALUES(:gender, :firstname, :lastname, :email, :birthdate, :city)');
		$insertUser->bindValue(':gender', $post['gender']);
		$insertUser->bindValue(':firstname', $post['firstname']);
		$insertUser->bindValue(':lastname', $post['lastname']); // Tu avais pas mis le ";" Attention
		$insertUser->bindValue(':email', $post['email']);
		$insertUser->bindValue(':birthdate', date('Y-m-d', strtotime($post['birthdate'])));
		$insertUser->bindValue(':city', $post['city']);
		if($insertUser->execute()){
			// La requète a été correctement executée, on créer une variable pour afficher un message de réussite
			$createUser = true;
		}
		else {
			// Une erreur est survenue dans la requète SQL
			$errors[] = 'Erreur SQL';
		}
	}

}
// On recupére les utilisateurs avec une requete et on rajoute le derniere utilisateur ajouté.
$queryUsers = $db->prepare('SELECT * FROM users'.$order);
if($queryUsers->execute()){
	$users = $queryUsers->fetchAll();
}
?><!DOCTYPE html>
<html>
<head>
<title>Exercice 1</title>
<meta charset="utf-8">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">

	<h1>Liste des utilisateurs</h1>
	
	<p>Trier par : 
		<a href="index.php?column=firstname&order=asc">Prénom (croissant)</a> |
		<a href="index.php?column=firstname&order=desc">Prénom (décroissant)</a> |
		<a href="index.php?column=lastname&order=asc">Nom (croissant)</a> |
		<a href="index.php?column=lastname&order=desc">Nom (décroissant)</a> |
		<a href="index.php?column=birthdate&order=desc">Âge (croissant)</a> |
		<a href="index.php?column=birthdate&order=asc">Âge (décroissant)</a>
	</p>
	<br>

	<div class="row">
		<?php
		if(isset($createUser) && $createUser == true){
			echo '<div class="col-md-6 col-md-offset-3">';
			echo '<div class="alert alert-success">Le nouvel utilisateur a été ajouté avec succès.</div>';
			echo '</div><br>';
		}
		// Si le array $errors n'est pas vide, on affiche un message avec les erreurs.
		if(!empty($errors)){
			echo '<div class="col-md-6 col-md-offset-3">';
			echo '<div class="alert alert-danger">'.implode('<br>', $errors).'</div>';
			echo '</div><br>'; // Encore attention a pas oublier de fermer tes balises avec ";"
		}
		?>

		<div class="col-md-7">
			<table class="table">
				<thead>
					<tr>
						<th>Civilité</th>
						<th>Prénom</th>
						<th>Nom</th>
						<th>Email</th>
						<th>Age</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $user):?>
					<tr>
						<td><?php echo $user['gender'];?></td>
						<td><?php echo $user['firstname'];?></td>
						<td><?php echo $user['lastname'];?></td>
						<td><?php echo $user['email'];?></td>
						<td><?php echo DateTime::createFromFormat('Y-m-d', $user['birthdate'])->diff(new DateTime('now'))->y;?> ans</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<div class="col-md-5">

			<form method="post" class="form-horizontal well well-sm"> <!-- Debut du formulaire -->
				<fieldset>
					<legend>Ajouter un utilisateur</legend>

					<div class="form-group">
						<label class="col-md-4 control-label" for="gender">Civilité</label>
						<div class="col-md-8">
							<select id="gender" name="gender" class="form-control input-md" required>
								<option value="Mlle">Mademoiselle</option>
								<option value="Mme">Madame</option>
								<option value="M">Monsieur</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" for="firstname">Prénom</label>
						<div class="col-md-8">
							<input id="firstname" name="firstname" type="text" class="form-control input-md" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" for="lastname">Nom</label>  
						<div class="col-md-8">
							<input id="lastname" name="lastname" type="text" class="form-control input-md" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" for="email">Email</label>  
						<div class="col-md-8">
							<input id="email" name="email" type="email" class="form-control input-md" required>
						</div>
					</div>


					<div class="form-group">
						<label class="col-md-4 control-label" for="city">Ville</label>  
						<div class="col-md-8">
							<input id="city" name="city" type="text" class="form-control input-md" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" for="birthdate">Date de naissance</label>  
						<div class="col-md-8">
							<input id="birthdate" name="birthdate" type="text" placeholder="JJ-MM-AAAA" class="form-control input-md" required>
							<span class="help-block">au format JJ-MM-AAAA</span>  
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-4 col-md-offset-4">
							<button type="submit" class="btn btn-primary">Envoyer</button>
						</div>
					</div>
				</fieldset>
			</form> <!-- Fin du formulaire -->
		</div>
	</div>
</div>


</body>
</html>