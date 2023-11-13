<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<div class="container">
    <h3 class="text-center p-4 fs-2">Liste des Évenements</h3>

    <div class="table-responsive">
        <table class="table table-hover" style="min-height: 80%;">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date de l'actu</th>
                    <th scope="col">Type</th>
                    <th scope="col">title</th>
                    <th scope="col">contenue</th>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach (Actu::getAllActu() as $actu) : ?>
                    <tr>
                        <td><?= htmlspecialchars($actu['actu_id']); ?></td>
                        <td><?= htmlspecialchars($actu['actu_date']); ?></td>
                        <td><?= htmlspecialchars($actu['actu_type']); ?></td>
                        <td><?= htmlspecialchars($actu['actu_title']); ?></td>
                        <td><?= htmlspecialchars($actu['actu_text']); ?></td>
                        <td class="text-center"><img src="../assets/imageActu/<?= htmlspecialchars($actu['actu_pictures']); ?>" alt="" width="100%" height="25rem"></td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="../controllers/controller-modifyMatch.php?idBattle="><button class="btnModify">Modifier</button></a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btnDelete" data-bs-toggle="modal" data-bs-target="#modal<?= $actu['actu_id'] ?>">
                                    Supprimer
                                </button>
                                <div class="modal fade" id="modal<?= $actu['actu_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer le match</h1>
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
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="text-center mt-5">
    <a href="../controllers/controller-ajoutevent.php"><button class="btnModify">Ajouter un évenements</button></a>
    <a href="../controllers/controller-paneladmin.php"><button class="btnDelete">Annuler</button></a>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>