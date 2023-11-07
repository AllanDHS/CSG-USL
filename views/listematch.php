<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<div class="container">
    <h3 class="text-center p-4 fs-2">Liste des matchs</h3>

    <div class="table-responsive">
        <table class="table table-hover" style="min-height: 80%;">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date et heures</th>
                    <th scope="col">Equipes1</th>
                    <th scope="col">Equipes2</th>
                    <th scope="col">Compétitions</th>
                    <th scope="col">Catégories</th>
                    <th scope="col">Lieu</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach (Matchs::getAllMatchs() as $match) : ?>
                    <tr>
                        <th scope="row"><?= $match['mat_id'] ?></th>
                        <td><?= htmlspecialchars($match['mat_date']); ?></td>
                        <td><?= htmlspecialchars(Equipe::getEquipesInfo($match['equ_id'])['equ_name']); ?></td>
                        <td><?= htmlspecialchars(Equipe::getEquipesInfo($match['equ_id_equipes'])['equ_name']); ?></td>
                        <td><?= htmlspecialchars($match['com_name']); ?></td>
                        <td><?= htmlspecialchars($match['cat_name']); ?></td>
                        <td><?= htmlspecialchars($match['mat_place']); ?></td>
                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="#"><button class="btnModify">Modifier</button></a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btnDelete" data-bs-toggle="modal" data-bs-target="#modal<?=$match['mat_id']?>">
                                    Supprimer
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modal<?=$match['mat_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer le match</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer ce match ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action=""><button type="button" class="btn btn-primary">Supprimer</button></form>
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
    <a href="../controllers/controller-ajoutmatch.php"><button class="btnModify">Ajouter un match</button></a>
    <a href="../controllers/controller-paneladmin.php"><button class="btnDelete">Annuler</button></a>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
