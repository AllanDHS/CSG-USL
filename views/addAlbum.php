<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<h3 class="text-center mt-4 mb-4 text-light">Créer un Album</h3>

<form action="#" method="post">
    <?php if ($showForm) { ?>
        <div class="container text-center p-2 bg-light containerForm">
            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label for="alb_name" class="mb-2 text-uppercase">Titre de L'album</label>
                        <input type="text" class="form-control mx-auto text-center" id="alb_name" name="alb_name">
                        <span class="text-danger fs-5"><?= $errors['alb_name'] ?? "" ?></span>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary text-uppercase">Créer</button>
                    <a href="../controllers/controller-listeAlbum.php" class="btn btn-danger text-uppercase">Retour</a>
                </div>
            </div>

        </div>



    <?php } else { ?>
        <p class="text-light fs-2 text-center text-uppercase mt-5">L'album a bien été créé</p>
        <div class="text-center">
        <a href="../controllers/controller-paneladmin.php" class="btnModify text-center">retour</a>
        </div>
    <?php } ?>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>