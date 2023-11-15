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
require_once "../models/photos.php";




if (isset ($_POST['delete'])){


    if (isset($_POST['alb_id']) && !empty($_POST['alb_id']))
    Album::deleteAlbum($_POST['alb_id']);



}





include "../views/listeAlbum.php";