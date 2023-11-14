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


if (isset($_GET['idActu'])) {
    $idActu = $_GET['idActu'];
    $actu = Actu::getActuById($idActu);
    $date = $actu['actu_date'];
    $title = $actu['actu_title'];
    $type = $actu['actu_type'];
    $text = $actu['actu_text'];
    $actuid = $actu['actu_id'];
    $actu_pictures = $actu['actu_pictures'];
    $showForm = true;
} else {
    header('Location: ../controllers/controller-listeActu.php');
    exit();
}


$showForm = true;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nous définissons le tableau d'erreurs
    $errors = [];

    // Nous définissons une variable permettant cacher / afficher le formulaire



    if (empty($_POST['actu_date'])) {
        $errors['actu_date'] = 'Champs obligatoire';
    }


    if (empty($_POST['actu_title'])) {
        $errors['actu_title'] = 'Champs obligatoire';
    }

    if (empty($_POST['actu_type'])) {
        $errors['actu_type'] = 'Champs obligatoire';
    }

    if (empty($_POST['actu_text'])) {
        $errors['actu_text'] = 'Champs obligatoire';
    }




    // Nous allons créer une variable qui contiendra le message du statut d'upload.
    $uploadMessage = '';

    var_dump($_FILES);

    // Nous recherchons si $_FILES["fileToUpload"] existe pour éviter toutes erreurs pour la suite
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] !== 4) {




        // Nous controlons que l'utilisateur à bien sélectionné une image à l'aide du code error, il doit être égal à 0
        if ($_FILES["fileToUpload"]["error"] !== 0) {
            $uploadMessage = '<span class="h6 text-danger">Veuillez sélectionner une image à uploader<span>';
        } else {

            // nous allons créer une variable qui va définir si des erreurs sont présentes.
            $uploadOk = true;

            // nous allons créer un tableau contenant les extensions autorisées
            $arrayExtensions = ['jpg', 'png', 'jpeg', 'webp'];

            // Nous allon extraire le MIME du fichier à l'aide de la fonction mime_content_type
            $mime = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);

            // Nous allons récupérer l'extension du fichier pour la stocker dans une variable : $fileExtension
            // l'extension sera en minuscule à l'aide de la fonction strtolower()
            $fileName = basename($_FILES["fileToUpload"]["name"]);
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

            // Nous controlons si la variable $uploadOk est égale à true, indiquant ainsi que nous pouvons uploader l'image
            if ($uploadOk == true && empty($errors)) {
                $showForm = false;

                // Nous indiquons le chemin du répertoire dans lequel les images vont être téléchargés.
                $directory = "../assets/imageActu/";

                // Nous allons définir $new_name qui aura un nom d'image unique avec : la fonction uniqid() et une extension '.webp'
                $new_name = uniqid() . '.webp';

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $directory . $new_name)) {

                    $actu_date = $_POST['actu_date'];
                    $actu_title = $_POST['actu_title'];
                    $actu_type = $_POST['actu_type'];
                    $actu_text = $_POST['actu_text'];
                    $actu_id = $actuid;
                    $actu_pictures = $new_name;
                
                Actu::uptadeActu($actu_date, $actu_title, $actu_type, $actu_text, $actu_pictures, $actuid);
    
                    $uploadMessage = '<span class="h4 text-success">le fichier a bien été uploadé</span>';
                } else {
                    $uploadMessage = '<span class="h6 text-danger">Erreur lors de l\'upload de votre fichier</span>';
                    $uploadOk = false;
                }

                

                $uploadMessage = '<span class="h4 text-success">le fichier a bien été uploadé</span>';
            } else {
                $uploadMessage = '<span class="h6 text-danger">Erreur lors de l\'upload de votre fichier</span>';
                $uploadOk = false;
            }
        }
    } else {

        if (empty($errors)) {
            var_dump('OK');
            $showForm = false;
            $actu_date = $_POST['actu_date'];
            $actu_title = $_POST['actu_title'];
            $actu_type = $_POST['actu_type'];
            $actu_text = $_POST['actu_text'];
            $actu_pictures = $actu_pictures;
            $actu_id = $actuid;
            Actu::uptadeActuWithoutPictures($actu_date, $actu_title, $actu_type, $actu_text, $actu_id);
        }
    }
}













include "../views/modifyEvent.php";
