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
require_once "../models/actualite.php";
require_once "../models/album.php";



if (isset ($_POST['deleteBattle'])){

    if (isset($_POST['idBattle']) && !empty($_POST['idBattle']))
    Matchs::deleteBattle($_POST['idBattle']);

    if (isset($_POST['idMatch']) && !empty($_POST['idMatch']))
    Matchs::deleteMatchs($_POST['idMatch']);


}


if (isset ($_POST['deleteActu'])){

    Form::deleteFile('../assets/imageActu/', Actu::getActuById($_POST['actu_id'])['actu_pictures']);

    if (isset($_POST['actu_id']) && !empty($_POST['actu_id']))
    Actu::deleteActu($_POST['actu_id']);



}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    if (isset($_POST['deleteAlb'])) {
        if (isset($_POST['alb_id']) && !empty($_POST['alb_id'])) {
            $directoryToDelete = '../assets/albumPhoto/' . Album::getAlbumName($_POST['alb_id']);
            Form::deleteDirectory($directoryToDelete);
            
            Album::deleteAlbum($_POST['alb_id']);
        }
    }
}



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