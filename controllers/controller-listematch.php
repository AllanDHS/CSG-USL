<?php


require_once "../config.php";
require_once "../helpers/database.php";
require_once "../helpers/form.php";
require_once "../models/categories_equipes.php";
require_once "../models/competitions.php";
require_once "../models/equipes.php";
require_once "../models/match.php";





if (isset($_POST['delete'])) {
    if (isset($_POST['idMatch']) && ($_POST['idMatch'])  != null)
    Matchs::deleteMatch($_POST['idMatch']);
}


include "../views/listematch.php";
?>