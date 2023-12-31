<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<h3 class="text-center mt-4 mb-4 text-light">Ajouter des photos</h3>


<form action="#" method="post" enctype="multipart/form-data">
    <?php if ($showForm) { ?>
        <div class="container text-center p-2">
            <div class="row mb-3">
                <div class="col">
                    <div class="form-group">
                        <label for="alb_name" class="mb-2 text-uppercase text-light">Album</label>
                        <select name="alb_id" class="form-control" id="alb_id">
                            <option value="" selected disabled>Choisissez un Ablum </option>

                            <?php foreach (Album::getAllAlbums() as $album) { ?>

                                <option <?= $albumName == $album['alb_name'] ? "selected" : "" ?> value="<?= $album['alb_id'] ?>" <?= isset($_POST['alb_id']) && $_POST['alb_id'] == $album['alb_id'] ? 'selected' : '' ?>><?= ucfirst($album['alb_name']) ?> </option>
                            <?php } ?>
                        </select>
                        <span class="text-danger fs-5"><?= $errors['alb_name'] ?? "" ?></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label"></label>
                    <input class="form-control" type="file" id="formFileMultiple" name="fileToUpload[]" id="fileToUpload" multiple>
                    <span class="text-danger fs-5"><?= $uploadMessage ?? "" ?></span>
                </div>
            </div>
        </div>
        </div>


        <div class="text-center">
            <button type="submit" class="btn btn-primary text-uppercase">Ajouter</button>
            <a href="../controllers/controller-paneladmin.php" class="btnModify text-center">retour</a>
        </div>
    <?php } else { ?>
        <p class="text-light fs-2 text-center text-uppercase mt-5">Les photos ont bien été ajouté a l'album</p>
        <div class="text-center">
        <a href="../controllers/controller-paneladmin.php" class="btnModify text-center">retour</a>
        </div>
    <?php } ?>

</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>