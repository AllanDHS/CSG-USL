<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>



<div class="row">
    <div class="col-12 text-center mt-4 text-uppercase fs-2">
        <p>ajouter un match</p>
    </div>
</div>


<form action="#" method="post">
<?php if ($showForm) { ?>
    <div class="container text-center mx-auto p-2">
        <div class="row mb-3">
            <div class="col">
                <div class="form-group ">
                    <label for="mat_date" class="mb-2 text-uppercase">Date et heure</label>
                    <input type="datetime-local" class="form-control classMargin" name="mat_date" id="mat_date">
                    <span><?= $errors['date'] ?? "" ?></span>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="mat_place" class="mb-2 text-uppercase">Lieu</label>
                    <input type="text" class="form-control classMargin" name="mat_place" id="mat_place">
                    <span><?= $errors['lieu'] ?? "" ?></span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="cat_id" class="mb-2 text-uppercase">Catégories</label>
                    <select name="cat_id" class="form-control" id="cat_id">
                        <option value="" selected disabled>Choisissez une catégorie</option>

                        <?php foreach (Categories::getAllCategories() as $categorie) { ?>

                            <option value="<?= $categorie['cat_id'] ?>" <?= isset($_POST['categories']) && $_POST['categories'] == $categorie['cat_id'] ? 'selected' : '' ?>><?= ucfirst($categorie['cat_name']) ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="from-group">
                    <label for="com_id" class="mb-2 text-uppercase">compétitions</label>
                    <select name="com_id" class="form-control" id="com_id">
                        <option value="" selected disabled>Choisissez une compétitions</option>

                        <?php foreach (Competitions::getAllCompetitions() as $competition) { ?>

                            <option value="<?= $competition['com_id'] ?>" <?= isset($_POST['competitions']) && $_POST['competitions'] == $competition['com_id'] ? 'selected' : '' ?>><?= ucfirst($competition['com_name']) ?> </option>
                        <?php } ?>

                    </select>
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

                            <option value="<?= $equipe['equ_id'] ?>" <?= isset($_POST['equipe1']) && $_POST['equipe1'] == $equipe['equ_id'] ? 'selected' : '' ?>><?= ucfirst($equipe['equ_name']) ?> </option>

                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="equ_id" class="mb-2 text-uppercase">Equipe 2</label>
                    <select name="equ_id" class="form-control" id="equ_id">
                        <option value="" selected disabled>Choisissez l'équipe 2</option>

                        <?php foreach (Equipe::getAllEquipes() as $equipe) { ?>

                            <option value="<?= $equipe['equ_id'] ?>" <?= isset($_POST['equipe2']) && $_POST['equipe2'] == $equipe['equ_id'] ? 'selected' : '' ?>><?= ucfirst($equipe['equ_name']) ?> </option>

                        <?php } ?>

                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-evenly mt-5">
        <button type="submit" class="btnModify">Sauvegarder</button>
        <a href="../controllers/controller-paneladmin.php" class="btnDelete">Annuler</a>
    </div>

    <?php } else { ?>

</form>
