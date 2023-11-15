<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>



<div class="container">
    <h3 class="text-center p-4 fs-2">Liste des Album</h3>

    <div class="table-responsive">
        <table class="table table-hover" style="min-height: 80%;">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre de l'album</th>
                    <th scope="col" class="text-center">Image Presentation</th>
                    <th scope="col" class="text-center">Nbr de photos</th>
                    <th scope="col" class="text-center"></th>
                    <th scope="col" class="text-center"></th>
                    <th scope="col" class="text-center"></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach (Album::getAllAlbums() as $album) : ?>
                    <tr>
                        <td><?= htmlspecialchars($album['alb_id']); ?></td>
                        <td><?= htmlspecialchars($album['alb_name']); ?></td>
                        <td class="text-center"><img src="../assets/" alt="" width="100%" height="25rem"></td>
                        <td class="text-center"></td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="../controllers/controller-modifyEvent.php?idActu="><button class="btnModify">Modifier</button></a>
                                <a href="../controllers/controller-modifyEvent.php?idActu="><button class="btnModify">Ajouter Photos</button></a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btnDelete" data-bs-toggle="modal" data-bs-target="#modal<?= $album['alb_id']?>">
                                    Supprimer
                                </button>
                                <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer le match</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Voulez-vous vraiment supprimer l'album ?</p>
                                                <p><?= htmlspecialchars($album['alb_name']); ?> </p>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btnModify" data-bs-dismiss="modal">Annuler</button>
                                                <form action="" method="post">
                                                    <input type="hidden" name="alb_id" value="">
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






















<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>