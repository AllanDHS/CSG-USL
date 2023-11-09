<?php

session_start();

require_once "../config.php";
require_once "../helpers/database.php";
require_once "../models/admin.php";



var_dump($_SESSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    if (isset($_POST['adm_login']) && !empty($_POST['adm_login']) && isset($_POST['adm_password']) && !empty($_POST['adm_password'])) {

        $adminInfos = Admin::getAdmin($_POST['adm_login']);

        if($adminInfos){
            if(password_verify($_POST['adm_password'], $adminInfos['adm_password'])){
                session_start();
                $_SESSION['admin'] = true;
                header('Location: ../controllers/controller-paneladmin.php');
                exit();
            } else {
                $errors['adm_password'] = 'Mot de passe incorrect';
            }
        } else {
            $errors['adm_login'] = 'Login incorrect';
        }
    }
}









include "../views/adminconnexion.php";
