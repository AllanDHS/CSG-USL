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