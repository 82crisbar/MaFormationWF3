<?php

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

//echo json_encode($_POST);
$errors = [];

if(empty($_POST['nom'])){
    $errors[] = 'Le nom est obligatoire';
}

if(empty($_POST['prenom'])){
    $errors[] = 'Le prenom est obligatoire';
}

$response = [];

$response['status'] = (empty($errors)) ? 'ok' : 'ko';
$response['errors'] = $errors;

echo json_encode($response);
