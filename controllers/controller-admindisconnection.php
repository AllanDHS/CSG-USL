<?php
// Nous ouvrons une session
session_start();



// si l'utilisateur dispose d'une session active, je le redirige vers le menu admin en ayant au préalable détruit sa session
if (isset($_SESSION['admin'])) {
    session_unset();
    session_destroy();
    header('Location: ../controllers/controller-adminconnexion.php');
    exit;
} else {
    // sinon je le redirige vers la page de connexion
    header('Location: ../controllers/controller-home.php');
    exit;
}