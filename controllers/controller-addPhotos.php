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


// Nous définissons le tableau d'erreurs
$errors = [];

// Nous définissons une variable permettant cacher / afficher le formulaire
$showForm = true;


// Nous initialisons la variable $uploadOk à true
$uploadOk = true;



// Nous recherchons si $_FILES["fileToUpload"] existe pour éviter toutes erreurs pour la suite
if (isset($_FILES["fileToUpload"])) {
    // Nous allons créer une variable qui contiendra le message du statut d'upload.
    $uploadMessage = '';

    $test = $_FILES['fileToUpload']['error'];
    

    // Nous controlons que l'utilisateur a bien sélectionné une image à l'aide du code error, il doit être égal à 0
    if ($_FILES['fileToUpload']['error'][0] !== 0) {
        $uploadMessage = '<span class="h6 text-danger">Veuillez sélectionner une uuuuu à uploader<span>';
    } else {

        // Nous allons créer une condition pour upload plusieurs fichiers
        $countfiles = count($_FILES['fileToUpload']['name']);

        // Nous allons créer une boucle pour parcourir les fichiers
        $totalFileUploaded = 0;

        // Nous initialisons la variable $uploadOk à true
        $uploadOk = true;

        

        // création du répertoire avec le nom de l'album choisis si il n'existe pas
        if (!is_dir('../assets/' . Album::getAlbumName($_POST['alb_id']))) {
            mkdir('../assets/' . Album::getAlbumName($_POST['alb_id']));
        }

        foreach ($_FILES['fileToUpload']['tmp_name'] as $image) {

            // Nous indiquons le chemin du répertoire dans lequel les images vont être téléchargés par rapport a l'id de L'album choisis.
            $directory = '../assets/' . Album::getAlbumName($_POST['alb_id']) . '/';

            // Nous allons définir $new_name qui aura un nom d'image unique avec : la fonction uniqid() et une extension '.webp'
            $new_name = uniqid() . '.webp';

            if (move_uploaded_file($image, $directory . $new_name)) {



                $photos_name = $new_name;


                Photos::addPhoto($new_name, $_POST['alb_id']);



                $uploadMessage = '<span class="h4 text-success">le fichier a bien été uploadé</span>';
            }
        }
    }
}

include "../views/addPhoto.php";
