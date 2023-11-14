<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<h3 class="text-center mt-4 mb-4">Créer un Album</h3>

<form action="#" method="post">
    <?php if ($showForm) { ?>
        <div class="container text-center p-2">
            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label for="alb_name" class="mb-2 text-uppercase">Titre de L'album</label>
                        <input type="text" class="form-control mx-auto text-center" id="alb_name" name="alb_name">
                        <span class="text-danger fs-5"><?= $errors['alb_name'] ?? "" ?></span>
                    </div>
                </div>
            </div>
        </div>


        <div class="text-center">
            <button type="submit" class="btn btn-primary text-uppercase">Créer</button>
        </div>
    <?php } else { ?>
        <p class="text-success fs-2 text-center text-uppercase mt-5">L'album a bien été ajouté</p>
        <a href="../controllers/controller-listeEvent.php" class="btnModify text-center">retour</a>
    <?php } ?>

</form>