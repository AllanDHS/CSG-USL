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

// Nous recherchons si $_FILES["fileToUpload"] existe pour éviter toutes erreurs pour la suite
if (isset($_FILES["fileToUpload"])) {




    // Nous allons créer une variable qui contiendra le message du statut d'upload.
    $uploadMessage = '';

    // Nous controlons que l'utilisateur à bien sélectionné une image à l'aide du code error, il doit être égal à 0
    if ($_FILES["fileToUpload"]["error"] !== 0) {
        $uploadMessage = '<span class="h6 text-danger">Veuillez sélectionner une image à uploader<span>';
    } else {

        // Nous allons créer une condition pour upload plusieur fichiers

        $countfiles = count($_FILES['fileToUpload']['name']);

        // Nous allons créer une boucle pour parcourir les fichiers
        $totalFileUploaded = 0;
        for ($i = 0; $i < $countfiles; $i++) {
        }

        // nous allons créer une variable qui va définir si des erreurs sont présentes.
        $uploadOk = true;

        // nous allons créer un tableau contenant les extensions autorisées
        $arrayExtensions = ['jpg', 'png', 'jpeg', 'webp'];

        // Nous allon extraire le MIME du fichier à l'aide de la fonction mime_content_type
        $mime = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);

        // Nous allons récupérer l'extension du fichier pour la stocker dans une variable : $fileExtension
        // l'extension sera en minuscule à l'aide de la fonction strtolower()
        $fileName = basename($_FILES["fileToUpload"]["name"][$i]);
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // strpos() pour rechercher le mot 'image' dans le mime, si nous le trouvons pas, false est retourné
        if (strpos($mime, 'image') === false) {
            $uploadMessage = '<span class="h6 text-danger">Veuillez sélectionner un fichier de type "image"<span>';
            $uploadOk = false;
        }
        // Nous contrôlons la taille de d'image : 8mo = 8000000
        else if ($_FILES["fileToUpload"]["size"] > 8000000) {
            $uploadMessage = '<span class="h6 text-danger">La taille de l\'image est trop grande<span>';
            $uploadOk = false;
        }
        // Nous contrôlons si l'extension n'est pas présente dans le tableau à l'aide la fonction !in_array()
        else if (!in_array($fileExtension, $arrayExtensions)) {
            $uploadMessage = '<span class="h6 text-danger">Désolé, seuls les formats : jpg, png, jpeg et webp sont autorisés<span>';
            $uploadOk = false;
        }
        $response = 0;


        // Nous controlons si la variable $uploadOk est égale à true, indiquant ainsi que nous pouvons uploader l'image
        if ($uploadOk == true && empty($errors)) {
            $showForm = false;

            // création du répertoire avec le nom de l'album choisis si il n'existe pas
            if (!is_dir('../assets/' . $_POST['alb_name'])) {
                mkdir('../assets/' . $_POST['alb_name']);
            }


            // Nous indiquons le chemin du répertoire dans lequel les images vont être téléchargés par rapport a l'id de L'album choisis.
            $directory = '../assets/' . $_POST['alb_name'] . '/';

            // Nous allons définir $new_name qui aura un nom d'image unique avec : la fonction uniqid() et une extension '.webp'
            $new_name = uniqid() . '.webp';

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $directory . $new_name)) {

                $alb_id = $_POST['alb_id'];
                $alb_name = $_POST['alb_name'];
                $photos_name = $new_name;

                $totalFileUploaded++;

                $uploadMessage = '<span class="h4 text-success">le fichier a bien été uploadé</span>';
            } else {
                $uploadMessage = '<span class="h6 text-danger">Erreur lors de l\'upload de votre fichier</span>';
                $uploadOk = false;
            }
        }
    }
}
















include "../views/addPhoto.php";
