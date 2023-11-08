<?php 


require_once "../config.php";
require_once "../helpers/database.php";
require_once "../helpers/form.php";
require_once "../models/categories_equipes.php";
require_once "../models/competitions.php";
require_once "../models/equipes.php";
require_once "../models/match.php";

var_dump($_POST);

if (isset($_GET['idBattle'])){

    $idBattle = $_GET['idBattle'];

    $match = Matchs::getBattleById($idBattle);

    $date = $match['mat_date'];
    $place = $match['mat_place'];
    $categorie = $match['cat_id'];
    $competition = $match['com_id'];
    $equipe1 = $match['equ_id'];
    $equipe2 = $match['equ_id_equipes'];
    $matchid = $match['mat_id'];

} else {
    header('Location: ../controllers/controller-listematch.php');
    exit();
}

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
            $match->updateMatch($_POST);
        }
        

    
    }













include "../views/modifyMatch.php";

?>