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



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['delete'])) {
        if (isset($_POST['alb_id']) && !empty($_POST['alb_id'])) {
            $directoryToDelete = '../assets/albumPhoto/' . Album::getAlbumName($_POST['alb_id']);
            Form::deleteDirectory($directoryToDelete);
            
            Album::deleteAlbum($_POST['alb_id']);
        }
    }
}






include "../views/listeAlbum.php";
