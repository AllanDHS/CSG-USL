<?php


require_once "../config.php";
require_once "../helpers/database.php";
require_once "../helpers/form.php";
require_once "../models/categories_equipes.php";
require_once "../models/competitions.php";
require_once "../models/equipes.php";
require_once "../models/match.php";


if (isset ($_POST['delete'])){

    if (isset($_POST['idBattle']) && !empty($_POST['idBattle']))
    Matchs::deleteBattle($_POST['idBattle']);

    if (isset($_POST['idMatch']) && !empty($_POST['idMatch']))
    Matchs::deleteMatchs($_POST['idMatch']);


}



include "../views/listematch.php";
