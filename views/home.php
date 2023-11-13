<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>




<div class="carou">
    <h1>Bienvenue sur le site de <br> l'entente CSG/USL Handball</h1>
    <div id="carrousel">
        <div id="container">

        </div>
        <img src="../assets/logo/icons8-vers-l'avant-100.png" alt="" class="button" id="left">
        <img src="../assets/logo/icons8-vers-l'avant-100.png" alt="" class="button" id="right">
    </div>
</div>
<div class="matchHomePage">
    <div class="title">
        <a href="">
            <p>resultat du week-end</p>
        </a>
    </div>
    <div class="row justify-content-evenly matchs col-10 mx-auto">
        <?php
        $count = 0;
        foreach (Matchs::getAllBattles() as $battle) :
            if ($count == 3) {
                break;
            } else if ($battle['score_equipe1'] == null || $battle['score_equipe2'] == null) {
                continue;
            }
        ?>
            <div class="container text-center col-lg-3 col-12 m-2 containerMatchs">
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
                        <p class="Equipes1"><?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id'])['equ_name']); ?></p>
                    </div>
                    <div class="col-4 d-flex flex-row justify-content-between fs-2 ">
                        <p><?= htmlspecialchars($battle['score_equipe1']) ?></p>
                        <p>-</p>
                        <p><?= htmlspecialchars($battle['score_equipe2']) ?></p>
                    </div>
                    <div class="col-4">
                        <img src="<?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id_equipes'])['equ_logo']); ?>" alt="" width="35%">
                        <p class="Equipes1"><?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id_equipes'])['equ_name']); ?></p>
                    </div>
                </div>
                <p>
                    <?= htmlspecialchars(Competitions::getCompetitionById($battle['com_id'])['com_name']); ?>
                </p>

            </div>
        <?php
            $count++;
        endforeach; ?>
    </div>

    <div class="matchHomePage">
        <div class="title">
            <a href="">
                <p>Match a venir</p>
            </a>
        </div>
        <div class="row justify-content-evenly matchs col-10  mx-auto ">
            <?php
            $count = 0;
            foreach (Matchs::getAllBattles() as $battle) :
                if ($count == 3) {
                    break;
                } else if ($battle['score_equipe1'] != null || $battle['score_equipe2'] != null) {
                    continue;
                }
            ?>

                <div class="container text-center col-lg-3 col-12 m-2 containerMatchs ">
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
                            <p class="Equipes1"><?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id'])['equ_name']); ?></p>
                        </div>
                        <div class="col-4">
                            <p>-</p>
                        </div>
                        <div class="col-4">
                            <img src="<?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id_equipes'])['equ_logo']); ?>" alt="" width="35%">
                            <p class="Equipes1"><?= htmlspecialchars(Equipe::getEquipesInfo($battle['equ_id_equipes'])['equ_name']); ?></p>
                        </div>
                    </div>
                    <p>
                        <?= htmlspecialchars(Competitions::getCompetitionById($battle['com_id'])['com_name']); ?>
                    </p>

                </div>
            <?php
                $count++;
            endforeach; ?>
        </div>
    </div>

</div>
<div class="container scoreContainer">
    <div class="title">
        <a href="">
            <p>nos dernière <br>Actualités</p>
        </a>
    </div>
    <div class="row justify-content-evenly col-10 mx-auto">
        <div class="col-md-5">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative shadow">
                <?php
                $count = 0;
                foreach (Actu::getAllActu() as $actu) :
                    if ($count == 2) {
                        break;
                    }
                ?>
                    <div class="col p-4 d-flex flex-column position-static shadow border border-primary">
                        <p class="mb-0 text-primary fs-3"><?= htmlspecialchars($actu['actu_type']) ?></p>
                        <div class="mb-1 text-muted fs-5" <?= htmlspecialchars($actu['actu_date']) ?>></div>
                        <p><?= htmlspecialchars($actu['actu_title']) ?></p>
                        <p class="mb-auto p-3 fs-6"><?= htmlspecialchars($actu['actu_text']) ?></p>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" height="300" src="../assets/imageActu/<?= htmlspecialchars($actu['actu_pictures']) ?>">

                        </div>
                    </div>

            </div>
        </div>
    <?php
                    $count++;
                endforeach; ?>
    </div>
</div>
<?php include "components/footer.php" ?>