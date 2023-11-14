<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<div class="row">
    <div class="col-12 text-center mt-4 text-uppercase fs-2">
        <p>ajouter un Évenements</p>
    </div>
</div>

<form action="#" method="post" enctype="multipart/form-data">
    <?php if ($showForm) { ?>
        <div class="container text-center p-2">
            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label for="act_date" class="mb-2 text-uppercase">Date</label>
                        <input type="text" class="form-control mx-auto text-center" id="actu_date" name="actu_date" placeholder="JJ/MM/AAAA" value="<?= $date ?>">
                        <span class="text-danger fs-5"><?= $errors['actu_date'] ?? "" ?></span>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="act_title" class="mb-2 text-uppercase">Titre</label>
                        <input type="text" class="form-control mx-auto" id="actu_title" name="actu_title" value="<?=$title?>">
                        <span class="text-danger fs-5"><?= $errors['actu_title'] ?? "" ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="act_type" class="mb-2 text-uppercase">Type Actualités</label>
                    <input type="text" class="form-control mx-auto" id="actu_type" name="actu_type" value="<?=$type?>">
                    <span class="text-danger fs-5"><?= $errors['actu_type'] ?? "" ?></span>
                </div>
            </div>
            <textarea class="form-control m-4 mx-auto" id="actu_text" name="actu_text" rows="6" placeholder="Saisir le contenu de l'actualités" value=""><?=$text?></textarea>
            <span class="text-danger fs-5"><?= $errors['actu_text'] ?? "" ?></span>
        </div>
        <div class="">
            <div class="mb-3">
            <img src="../assets/imageActu/<?=$actu_pictures?>" alt="" width="20%">
                <label for="formFile" class="form-label"></label>
                <input class="form-control" type="file" id="formFileMultiple" multiple name="fileToUpload" id="fileToUpload" value="<?=$actu_pictures?>">
                <span class="text-danger fs-5"><?= $uploadMessage ?? "" ?></span>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary text-uppercase">Modifier</button>
        </div>
    <?php } else { ?>
        <p class="text-success fs-2 text-center text-uppercase mt-5">L'évenement a bien été ajouté</p>
        <a href="../controllers/controller-listeEvent.php" class="btnModify text-center">retour</a>
    <?php } ?>

</form>
















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>