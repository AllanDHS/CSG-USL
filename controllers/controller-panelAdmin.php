<?php 


// nous ouvrons une session
session_start();

// nous vérifions si l'utilisateur est connecté à l'aide de la variable de session user
// si l'utilisateur n'est pas connecté, nous le redirigeons vers la page de connexion
if (!isset($_SESSION['admin'])) {
    header('Location: ../controllers/controller-adminconnexion.php');
    exit();
}

require_once "../config.php";
require_once "../helpers/database.php";
require_once "../helpers/form.php";
require_once "../models/categories_equipes.php";
require_once "../models/competitions.php";
require_once "../models/equipes.php";
require_once "../models/match.php";

// Récupération de tous les matchs
$matchs = Matchs::getAllBattles();

// // Récupération de toutes les équipes
// $equipes = Equipe::getEquipesInfo($id);

// Récupération de toutes les catégories d'équipes
$categories = Categories::getAllCategories();

// Récupération de toutes les compétitions
$competitions = Competitions::getAllCompetitions();








include "../views/panelAdmin.php";
?> 