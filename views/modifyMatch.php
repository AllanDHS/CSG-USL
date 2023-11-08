<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>



<div class="row">
    <div class="col-12 text-center mt-4 text-uppercase fs-2">
        <p>Modifier un match</p>
    </div>
</div>


<form action="#" method="post">
    
<?php if ($showForm) { ?>
    <input type="hidden" name="mat_id" value="<?= $matchid ?>">
    <div class="container text-center mx-auto p-2">
        <div class="row mb-3">
            <div class="col">
                <div class="form-group ">
                    <label for="mat_date" class="mb-2 text-uppercase">Date et heure</label>
                    <input type="datetime-local" class="form-control classMargin" name="mat_date" id="mat_date" value="<?=$date?>">
                    <span class="text-danger fs-5"><?= $errors['mat_date'] ?? "" ?></span>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="mat_place" class="mb-2 text-uppercase">Lieu</label>
                    <input type="text" class="form-control classMargin" name="mat_place" id="mat_place" value="<?=$place?>" >
                    <span class="text-danger fs-5"><?= $errors['mat_place'] ?? "" ?></span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="cat_id" class="mb-2 text-uppercase">Catégories</label>
                    <select name="cat_id" class="form-control" id="cat_id">
                        <option value="" selected disabled>Choisissez une catégorie</option>

                        <?php foreach (Categories::getAllCategories() as $categories) { ?>

                            <option <?= $categorie == $categories['cat_id'] ? "selected" : "" ?> value="<?= $categories['cat_id'] ?>" <?= isset($_POST['categories']) && $_POST['categories'] == $categories['cat_id'] ? 'selected' : '' ?>><?= ucfirst($categories['cat_name']) ?> </option>
                        <?php } ?>
                    </select>
                    <span class="text-danger fs-5"><?= $errors['cat_id'] ?? "" ?></span>
                </div>
            </div>
            <div class="col">
                <div class="from-group">
                    <label for="com_id" class="mb-2 text-uppercase">compétitions</label>
                    <select name="com_id" class="form-control" id="com_id">
                        <option value="" selected disabled>Choisissez une compétitions</option>

                        <?php foreach (Competitions::getAllCompetitions() as $competitions) { ?>

                            <option <?= $competition == $competitions['com_id'] ? "selected" : "" ?> value="<?= $competitions['com_id'] ?>" <?= isset($_POST['competitions']) && $_POST['competitions'] == $competitions['com_id'] ? 'selected' : '' ?>><?= ucfirst($competitions['com_name']) ?> </option>
                        <?php } ?>

                    </select>
                    <span class="text-danger fs-5"><?= $errors['com_id'] ?? "" ?></span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="equ_id" class="mb-2 text-uppercase">Equipe 1</label>
                    <select name="equ_id" class="form-control" id="equ_id">
                        <option value="" selected disabled>Choisissez l'équipe 1</option>

                        <?php foreach (Equipe::getAllEquipes() as $equipe) { ?>

                            <option <?= $equipe1 == $equipe['equ_id'] ? "selected" : "" ?>   value="<?= $equipe['equ_id'] ?>" <?= isset($_POST['equipe1']) && $_POST['equipe1'] == $equipe['equ_id'] ? 'selected' : '' ?>><?= ucfirst($equipe['equ_name']) ?> </option>

                        <?php } ?>
                    </select>
                    <span class="text-danger fs-5"><?= $errors['equ_id'] ?? "" ?></span>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="equ_id_equipes" class="mb-2 text-uppercase">Equipe 2</label>
                    <select name="equ_id_equipes" class="form-control" id="equ_id_equipes">
                        <option value="" selected disabled>Choisissez l'équipe 2</option>

                        <?php foreach (Equipe::getAllEquipes() as $equipe) { ?>

                            <option <?= $equipe2 == $equipe['equ_id'] ? "selected" : "" ?> value="<?= $equipe['equ_id'] ?>" <?= isset($_POST['equipe2']) && $_POST['equipe2'] == $equipe['equ_id'] ? 'selected' : '' ?>><?= ucfirst($equipe['equ_name']) ?> </option>

                        <?php } ?>

                    </select>
                    <span class="text-danger fs-5"><?= $errors['equ_id_equipes'] ?? "" ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-evenly mt-5">
        <button type="submit" class="btnModify">Sauvegarder</button>
        <a href="../controllers/controller-paneladmin.php" class="btnDelete">Annuler</a>
    </div>

    <?php } else { ?>
        <p class="text-success fs-2 text-center text-uppercase mt-5">Le match a bien été modifié</p>
        <a href="../controllers/controller-home.php" class="btnModify">retour</a>
    <?php } ?>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
