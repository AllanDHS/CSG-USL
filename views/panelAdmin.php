<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<div class="container-fluid">
    <div class="row m-4">
        <div class="col-12">
            <p class="fs-4 text-uppercase">Panel Admin</p>
        </div>
        <div class="col-6">
            <a href="../controllers/controller-ajoutmatch.php"><button class="btn btn-primary my-md-2">Ajouter un Matchs</button></a>
            <a href="../controllers/controller-listematch.php"><button class="btn btn-primary">Liste des Matchs</button></a>
        </div>
    </div>
    <div class="row m-4">
        <div class="col-6 ">
            <a href="../controllers/controller-ajoutEvent.php"><button class="btn btn-primary my-md-2">Ajouter un Évenements</button></a>
            <a href="../controllers/controller-listeEvent.php"><button class="btn btn-primary">Liste des Évenements</button></a>
        </div>
    </div>
    <div class="row m-4">
        <div class="col-6">
            <a href="../controllers/controller-addAlbum.php"><button class="btn btn-primary">Ajouter un Album Photos</button></a>
            <a href="../controllers/controller-listeAlbum.php"><button class="btn btn-primary">Liste des Albums Photos</button></a>
        </div>
    </div>
    <div class="row m-4">
        <div class="col-12">
            <a href="../controllers/controller-admindisconnection.php"><button class="btn btn-primary text-uppercase">déconnexion</button></a>
        </div>
    </div>
    
</div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
