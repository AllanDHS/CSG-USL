<?php 


require_once "../config.php";
require_once "../helpers/database.php";
require_once "../helpers/form.php";
require_once "../models/categories_equipes.php";
require_once "../models/competitions.php";
require_once "../models/equipes.php";



// Nous définissons le tableau d'erreurs
$errors = [];

// Nous définissons une variable permettant cacher / afficher le formulaire
$showForm = true;


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_POST['date_match'])){

        if (empty($_POST['date_match'])){
            $errors['date_match'] = 'Champs obligatoire';
    }
    }

    if (isset($_POST['lieu'])){

        if (empty($_POST['lieu'])){
            $errors['lieu'] = 'Champs obligatoire';
        } else if (!preg_match(REGEX_NAME, $_POST['lieu'])){
            $errors['lieu'] = 'Le lieu n\'est pas valide';
        }
    }

    if (!isset($_POST['categories'])){
        $errors['categories'] = 'Champs obligatoire';
    }

    if (!isset($_POST['competitions'])){
        $errors['competitions'] = 'Champs obligatoire';
    }

    if (!isset($_POST['equipe1'])){
        $errors['equipe1'] = 'Champs obligatoire';
    }

    if (!isset($_POST['equipe2'])){
        $errors['equipe2'] = 'Champs obligatoire';
    }

    if (empty($errors)){

        // insertion des données dans la table matchs
        $match = new Matchs();

    
    }


}









include "../views/ajoutmatch.php";

?>