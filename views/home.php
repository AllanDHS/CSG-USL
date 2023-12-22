<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>




<div class="carou">
    <h1 class="mb-5">Bienvenue sur le site de <br> l'entente CSG/USL Handball</h1>
    <div id="carrousel">
        <div id="container">

        </div>
        <img src="../assets/logo/icons8-vers-l'avant-50.png" alt="" class="button" id="left">
        <img src="../assets/logo/icons8-vers-l'avant-50.png" alt="" class="button" id="right">
    </div>
</div>
<div class="matchHomePage">
    <div class="title">
        <a href="">
            <p class="border border-success fontSize titleCat m-lg-4 text-lg-left text-center">résultats du <br><span>week-end</span></p>
        </a>
    </div>
    <div class="row justify-content-evenly matchs col-10 mx-auto">
        <?php
        $count = 0;
        $matchesExist = false;
        foreach (Matchs::getAllBattles() as $battle) :
            if ($count == 3) {
                break;
            } else if ($battle['score_equipe1'] == null || $battle['score_equipe2'] == null) {
                continue;
            }
        ?>
            <div class="container text-center col-lg-3 col-12 m-2 containerMatchs bg-light ">
                <p>
                    <?= htmlspecialchars(Categories::getCategorieById($battle['cat_id'])['cat_name']); ?>
                </p>
                <p>
                    <?= Form::formatDateUsToFr(explode(' ', $battle['mat_date'])[0]); ?>
                </p>
                <p>
                    <?= Form::HeureFormat(explode(' ', $battle['mat_date'])[1]); ?>
                </p>
                <p>
                    <?= htmlspecialchars($battle['mat_place']); ?>
                </p>

                <div class="row d-flex align-items-center centerDiv">
                    <div class="col-lg-4 col-6">
                        <img src="<?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id'])['equ_logo']); ?>" alt="" width="35%" class="">
                        <p class="Equipes1 overflow-hidden"><?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id'])['equ_name']); ?></p>
                    </div>
                    <div class="col-4 d-flex flex-row justify-content-between">
                        <p><?= htmlspecialchars($battle['score_equipe1']) ?></p>
                        <p>-</p>
                        <p><?= htmlspecialchars($battle['score_equipe2']) ?></p>
                    </div>
                    <div class="col-4">
                        <img src="<?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id_equipes'])['equ_logo']); ?>" alt="" width="35%" class="">
                        <p class="Equipes1 overflow-hidden"><?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id_equipes'])['equ_name']); ?></p>
                    </div>
                </div>
                <p>
                    <?= htmlspecialchars(Competitions::getCompetitionById($battle['com_id'])['com_name']); ?>
                </p>

            </div>
        <?php
            $matchesExist = true;
            $count++;
        endforeach; ?>
        <!-- condition pour afficher un message si il n'y a pas de matchs à venir -->
        <?php if (!$matchesExist) {
            echo "
           <p class=' text-center fs-2 text-bold'>Aucun Résultats ce week-end</p>";
        } ?>
        
    </div>
    <div class="text-center divBtnHome m-5">
    <a href="#" class="text-center btnHome">Tous les résultats</a>
    </div>

    <div class="matchHomePage">
        <div class="title">
            <a href="">
                <p class="fontSize  border border-success m-lg-4 text-lg-left text-center titleCat">Matchs à venir</p>
            </a>
        </div>
        <div class="row justify-content-evenly matchs col-10  mx-auto ">
            <?php
            $count = 0;
            $matchesExist = false;

            foreach (Matchs::getAllBattles() as $battle) :
                if ($count == 3) {
                    break;
                } else if ($battle['score_equipe1'] != null || $battle['score_equipe2'] != null) {
                    continue;
                }

            ?>

                <div class="container text-center col-lg-3 col-12 m-2 containerMatchs bg-light ">
                    <p>
                        <?= htmlspecialchars(Categories::getCategorieById($battle['cat_id'])['cat_name']); ?>
                    </p>
                    <p>
                        <?= Form::formatDateUsToFr(explode(' ', $battle['mat_date'])[0]); ?>
                    </p>
                    <p>
                        <?= Form::HeureFormat(explode(' ', $battle['mat_date'])[1]); ?>
                    </p>
                    <p>
                        <?= htmlspecialchars($battle['mat_place']); ?>
                    </p>

                    <div class="row d-flex align-items-center centerDiv">
                        <div class="col-4">
                            <img src="<?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id'])['equ_logo']); ?>" alt="" width="35%">
                            <p class="Equipes1 overflow-hidden"><?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id'])['equ_name']); ?></p>
                        </div>
                        <div class="col-4">
                            <p>-</p>
                        </div>
                        <div class="col-4">
                            <img src="<?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id_equipes'])['equ_logo']); ?>" alt="" width="35%">
                            <p class="Equipes1 overflow-hidden"><?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id_equipes'])['equ_name']); ?></p>
                        </div>
                    </div>
                    <p>
                        <?= htmlspecialchars(Competitions::getCompetitionById($battle['com_id'])['com_name']); ?>
                    </p>

                </div>

            <?php
                $matchesExist = true;
                $count++;
            endforeach; ?>
            <!-- condition pour afficher un message si il n'y a pas de matchs à venir -->
            <?php if (!$matchesExist) {
                echo "<p class=' text-center fs-2 text-bold'>Aucun match n'est prévu ce week-end</p>";
            } ?>
        </div>
        <div class="text-center divBtnHome m-5">
    <a href="#" class="text-center btnHome">Tous les matchs</a>
    </div>
    </div>

</div>
<div class=" ">
    <div class="title">

        <p class="fontSize  border border-success m-lg-4 text-lg-left text-center titleCat">Actualités</p>

    </div>
    <div class="row justify-content-evenly col-12 mx-auto">


        <?php
        
        $count = 0;
        $actuExist = false;
        foreach (Actu::getAllActu() as $actu) :
            if ($count == 2) {
                break;
            }
        ?>
            <div class="col-lg-5 d-flex flex-column position-static py-3 bg-light containerActu m-3">
                <p class="mb-0 text-primary fs-3"><?= htmlspecialchars($actu['actu_type']) ?></p>
                <div class="mb-1 text-muted fs-5"><?= htmlspecialchars($actu['actu_date']) ?></div>
                <p><?= htmlspecialchars($actu['actu_title']) ?></p>
                <p class="mb-auto p-3 fs-6 overflow-hidden"><?= htmlspecialchars($actu['actu_text']) ?></p>
                <div class="col-auto d-none d-lg-block">
                    <img class="test-img rounded" src="../assets/imageActu/<?= htmlspecialchars($actu['actu_pictures']) ?>">
                </div>
            </div>
        <?php
            $actuExist = true;
            $count++;
        endforeach; ?>
        <!-- condition pour afficher un message si il n'y a pas d'actus -->
        <?php if (!$actuExist) {
                echo "<p class='text-center fs-2 text-bold'>Aucune actus pour le moment</p>";
            } ?>

    </div>
    <div class="text-center divBtnHome m-5">
    <a href="#" class="text-center btnHome">Toutes les Actualités</a>
    </div>
</div>
<?php include "components/footer.php" ?>