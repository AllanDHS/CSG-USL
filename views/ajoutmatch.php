<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>



<div class="row">
    <div class="col-12 text-center mt-4 text-uppercase fs-2">
        <p>ajouter un match</p>
    </div>
</div>


<form action="#" method="post">

    <div class="container text-center mx-auto p-2">
        <div class="row mb-3">
            <div class="col">
                <div class="form-group ">
                    <label for="date_match" class="mb-2 text-uppercase">Date et heure</label>
                    <input type="datetime-local" class="form-control classMargin" name="date_match" id="date_match">
                    <span><?= $errors['date'] ?? "" ?></span>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="lieu_match" class="mb-2 text-uppercase">Lieu</label>
                    <input type="text" class="form-control classMargin" name="lieu_match" id="lieu_match">
                    <span><?= $errors['lieu'] ?? "" ?></span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-group">
                    <label for="categories" class="mb-2 text-uppercase">Catégories</label>
                    <select name="categories" class="form-control" id="categories">
                        <option value="" selected disabled>Choisissez une catégorie</option>

                        <?php foreach (Categories::getAllCategories() as $categorie) { ?>

                            <option value="<?= $categorie['cat_id'] ?>" <?= isset($_POST['categories']) && $_POST['categories'] == $categorie['cat_id'] ? 'selected' : '' ?>><?= ucfirst($categorie['cat_name']) ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="from-group">
                    <label for="competitions" class="mb-2 text-uppercase">compétitions</label>
                    <select name="competitions" class="form-control" id="competitions">
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
                    <label for="equipe1" class="mb-2 text-uppercase">Equipe 1</label>
                    <select name="equipe1" class="form-control" id="equipe1">
                        <option value="" selected disabled>Choisissez l'équipe 1</option>

                        <?php foreach (Equipe::getAllEquipes() as $equipe) { ?>

                            <option value="<?= $equipe['equ_id'] ?>" <?= isset($_POST['equipe1']) && $_POST['equipe1'] == $equipe['equ_id'] ? 'selected' : '' ?>><?= ucfirst($equipe['equ_name']) ?> </option>

                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="equipe1" class="mb-2 text-uppercase">Equipe 2</label>
                    <select name="equipe2" class="form-control" id="equipe2">
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



</form>