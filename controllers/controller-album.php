<?php



require_once "../config.php";
require_once "../helpers/database.php";
require_once "../helpers/form.php";
require_once "../models/album.php";
require_once "../models/photos.php";


// condition pour afficher un message si l'album est vide
if (empty($album['alb_id']) && empty($album['pho_name'])) {
    $message = "Aucune photo n'est disponible pour le moment";
}else{
    $message = "";
}


include "../views/album.php";
?>