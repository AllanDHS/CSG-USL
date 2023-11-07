<?php 


require_once "../config.php";
require_once "../helpers/database.php";
require_once "../helpers/form.php";
require_once "../models/categories_equipes.php";
require_once "../models/competitions.php";
require_once "../models/equipes.php";
require_once "../models/match.php";

var_dump($_POST);

// Nous définissons le tableau d'erreurs
$errors = [];

// Nous définissons une variable permettant cacher / afficher le formulaire
$showForm = true;


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_POST['mat_date'])){

        if (empty($_POST['mat_date'])){
            $errors['mat_date'] = 'Champs obligatoire';
    }
    }

    if (isset($_POST['mat_place'])){

        if (empty($_POST['mat_place'])){
            $errors['mat_place'] = 'Champs obligatoire';
        } else if (!preg_match(REGEX_NAME, $_POST['mat_place'])){
            $errors['lieu'] = 'Le lieu n\'est pas valide';
        }
    }

    if (!isset($_POST['cat_id'])){
        $errors['cat_id'] = 'Champs obligatoire';
    }

    if (!isset($_POST['com_id'])){
        $errors['com_id'] = 'Champs obligatoire';
    }

    if (!isset($_POST['equ_id'])){
        $errors['equ_id'] = 'Champs obligatoire';
    }

    if (!isset($_POST['equ_id_equipes'])){
        $errors['equ_id_equipes'] = 'Champs obligatoire';

    }

        if (count($errors) == 0) {
            $showForm = false;

            // insertion des données dans la table matchs
            $match = new Matchs();
            $match->addMatch($_POST);
        }
        

    
    }









include "../views/ajoutmatch.php";

?>