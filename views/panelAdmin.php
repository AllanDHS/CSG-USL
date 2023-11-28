<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<h3 class="text-center text-light p-4">Bienvenue sur le panel Admin</h3>

<div class="container mx-auto text-center bg-light shadow p-4">
    <h1 class="text-center p-4">Matchs à venir</h1>
    <div class="row justify-content-evenly">
        <?php
        $count = 0;
        foreach (Matchs::getAllBattles() as $battle) :
            if ($count == 3) {
                break;
            } else if ($battle['score_equipe1'] != null || $battle['score_equipe2'] != null) {
                continue;
            }
        ?>

            <div class="text-center col-lg-3 col-6 containerMatchs bg-light">
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

                <div class="mt-4 justify-content-evenly d-flex m-3">
                    <a href="../controllers/controller-modifyMatch.php?idBattle=<?= $battle['bat_id'] ?>"><button class="btn btn-dark">Modifier</button></a>
                    <button type="button" class="btnDelete" data-bs-toggle="modal" data-bs-target="#modal<?= $battle['bat_id'] ?>">
                        Supprimer
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modal<?= $battle['bat_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer le match</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Voulez-vous vraiment supprimer le match ?</p>
                                    <p><?= (Equipe::getEquipesInfo($battle['equ_id'])['equ_name']) ?> vs <?= (Equipe::getEquipesInfo($battle['equ_id_equipes'])['equ_name']) ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btnModify" data-bs-dismiss="modal">Fermer</button>
                                    <form action="" method="post">
                                        <input type="hidden" name="idBattle" value="<?= $battle['bat_id'] ?>">
                                        <input type="hidden" name="idMatch" value="<?= $battle['mat_id'] ?>">
                                        <button type="submit" class="btnDelete" name="delete">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php
            $count++;

        endforeach; ?>
    </div>
    <div class="BottomBtn d-flex mx-auto">
        <a href="../controllers/controller-listematch.php" class=" d-flex text-light BtnView"><i class="fi fi-rr-list"></i>Tous les matchs</a>
        <div class="RightBtn  d-flex">
            <a href="../controllers/controller-ajoutmatch.php" class=" d-flex text-light BtnAdd"><i class="fi fi-rr-plus"></i>Ajouter</a>
        </div>
    </div>
</div>


</div>
<div class="container row mx-auto justify-content-between text-center bg-light shadow mb-5 mt-5">
    <h1 class="text-center p-4">actualités</h1>
    <div class="row justify-content-evenly col-12 mx-auto">
        <?php
        $count = 0;
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
                <div class="mt-4 justify-content-evenly d-flex m-3">
                    <a href="../controllers/controller-modifyEvent.php?idActu=<?= $actu['actu_id'] ?>"><button class="btn btn-dark">Modifier</button></a>
                    <button type="button" class="btnDelete" data-bs-toggle="modal" data-bs-target="#modal<?= $actu['actu_id'] ?>">
                        Supprimer
                    </button>
                    <div class="modal fade" id="modal<?= $actu['actu_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer l'actu</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Voulez-vous vraiment supprimer l'évenement' ?</p>
                                    <p><?= htmlspecialchars($actu['actu_type']); ?> </p>
                                    <p><?= htmlspecialchars($actu['actu_title']); ?></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btnModify" data-bs-dismiss="modal">Annuler</button>
                                    <form action="" method="post">
                                        <input type="hidden" name="actu_id" value="<?= $actu['actu_id'] ?>">
                                        <button type="submit" class="btnDelete" name="delete">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            $count++;
        endforeach; ?>

    </div>

    <div class="BottomBtn d-flex mx-auto mt-5 mb-4">
        <a href="../controllers/controller-listeEvent.php" class=" d-flex text-light BtnView"><i class="fi fi-rr-list"></i>Toutes les Actus</a>
        <div class="RightBtn  d-flex">
            <a href="../controllers/controller-ajoutEvent.php" class="d-flex text-light BtnAdd"><i class="fi fi-rr-plus"></i>Ajouter</a>
        </div>
    </div>

</div>
<div class="container row mx-auto justify-content-between text-center bg-light shadow">
    <h1 class="text-center p-4">Album Photo</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        $count = 0;
        foreach (Album::getAllAlbums() as $album) :
            if ($count == 2) {
                break;
            }
        ?>
            <div class="col">
                <div class="card shadow-sm">

                    <?php
                    if (count(Album::getAlbumPhotos($album['alb_id'])) > 0) {
                    ?>
                        <img class="bd-placeholder-img card-img-top" width="100%" src="<?= '../assets/albumPhoto/' . $album['alb_name'] . '/' . Album::getAlbumPhotos($album['alb_id'])[0]['pho_name']  ?>" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <?php } else { ?>
                        <img class="bd-placeholder-img card-img-top" width="100%" src="../assets/image/im6.jpg">

                    <?php } ?>

                    <div class="card-body">
                        <p class="card-text text-uppercase fs-5"><?= $album['alb_name'] ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="../controllers/controller-addPhotos.php?idAlbum=<?= $album['alb_id'] ?>"><button type="button" class="btn btn-dark">Ajouter des photos</button></a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btnDelete" data-bs-toggle="modal" data-bs-target="#modal<?= $album['alb_id'] ?>">
                                    Supprimer
                                </button>

                                <div class="modal fade" id="modal<?= $album['alb_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer le match</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Voulez-vous vraiment supprimer l'Album ?</p>
                                                <p></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btnModify" data-bs-dismiss="modal">Annuler</button>
                                                <form action="" method="post">
                                                    <input type="hidden" name="alb_id" value="<?= $album['alb_id'] ?>">
                                                    <button type="submit" class="btnDelete" name="delete">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            $count++;
            ?>
        <?php endforeach; ?>
    </div>


    <div class="BottomBtn d-flex mx-auto mt-5 mb-4">
        <a href="../controllers/controller-listeAlbum.php" class=" d-flex text-light BtnView"><i class="fi fi-rr-list"></i>Tous les Albums</a>
        <div class="RightBtn  d-flex">
            <a href="../controllers/controller-addAlbum.php" class=" d-flex text-light BtnAdd"><i class="fi fi-rr-plus"></i>Ajouter</a>
        </div>
    </div>

</div>

<div class="text-center m-5">
<a href="../controllers/controller-admindisconnection.php" class="btn btn-danger fs-2">DECONNEXION</a>
</div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>