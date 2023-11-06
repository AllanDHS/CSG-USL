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
                        <option value="1">U7</option>
                        <option value="2">U9</option>
                        <option value="3">U11</option>
                        <option value="4">U13</option>
                        <option value="5">U15</option>
                        <option value="6">U17</option>
                        <option value="7">U19</option>
                        <option value="8">U21</option>
                        <option value="9">Senior</option>
                        <option value="10">Vétéran</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="from-group">
                    <label for="competitions" class="mb-2 text-uppercase">compétitions</label>
                    <select name="competitions" class="form-control" id="competitions">
                        <option value="" selected disabled>Choisissez une compétitions</option>
                        <option value="">+16M prénationale</option>
                        <option value="">+16M régionale honneur</option>
                        <option value="">+16F prénationale</option>
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
                        <option value="">CSG/USL Handball</option>
                        <option value="">Cany-barville</option>
                        <option value="">Countances</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="equipe1" class="mb-2 text-uppercase">Equipe 2</label>
                    <select name="equipe2" class="form-control" id="equipe2">
                        <option value="" selected disabled>Choisissez l'équipe 2</option>
                        <option value="">CSG/USL Handball</option>
                        <option value="">Cany-barville</option>
                        <option value="">Countances</option>
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