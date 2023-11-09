<?php


require_once "../config.php";
require_once "../helpers/database.php";
require_once "../helpers/form.php";
require_once "../models/categories_equipes.php";
require_once "../models/competitions.php";
require_once "../models/equipes.php";
require_once "../models/match.php";


// nous ouvrons une session
session_start();

// nous vérifions si l'utilisateur est connecté à l'aide de la variable de session user
// si l'utilisateur n'est pas connecté, nous le redirigeons vers la page de connexion
if (!isset($_SESSION['user'])) {
    header('Location: ../controllers/controller-adminconnexion.php');
    exit();
}

if (isset ($_POST['delete'])){

    if (isset($_POST['idBattle']) && !empty($_POST['idBattle']))
    Matchs::deleteBattle($_POST['idBattle']);

    if (isset($_POST['idMatch']) && !empty($_POST['idMatch']))
    Matchs::deleteMatchs($_POST['idMatch']);


}



include "../views/listematch.php";
