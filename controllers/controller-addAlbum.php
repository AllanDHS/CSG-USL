<?php


session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../controllers/controller-adminconnexion.php');
    exit();
}



require_once "../config.php";
require_once "../helpers/database.php";
require_once "../helpers/form.php";
require_once "../models/album.php";


// Nous allons créer un tableau qui contiendra les erreurs
$errors = [];

// Nous allons créer une variable qui va définir si le formulaire est valide ou non
$showForm = true;

if (empty($_POST['alb_name'])) {
    $errors['alb_name'] = 'Champs obligatoire';
}


if (count($errors) == 0) {
    $showForm = false;

    $alb_name = $_POST['alb_name'];

    // insertion des données dans la table matchs
    $match = new Album();
    $match->addAlbum($alb_name);
}



















include "../views/addAlbum.php";