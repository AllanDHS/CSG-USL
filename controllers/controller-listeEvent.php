<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../controllers/controller-adminconnexion.php');
    exit();
}

require_once "../config.php";
require_once "../helpers/database.php";
require_once "../helpers/form.php";
require_once "../models/actualite.php";

if (isset ($_POST['delete'])){

    Form::deleteFile('../assets/imageActu/', Actu::getActuById($_POST['actu_id'])['actu_pictures']);

    if (isset($_POST['actu_id']) && !empty($_POST['actu_id']))
    Actu::deleteActu($_POST['actu_id']);



}




















include "../views/listeEvent.php";