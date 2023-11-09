<?php 


// nous ouvrons une session
session_start();

// nous vérifions si l'utilisateur est connecté à l'aide de la variable de session user
// si l'utilisateur n'est pas connecté, nous le redirigeons vers la page de connexion
if (!isset($_SESSION['admin'])) {
    header('Location: ../controllers/controller-adminconnexion.php');
    exit();
}




include "../views/panelAdmin.php";
?> 