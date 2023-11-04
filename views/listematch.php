<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>

<div class="container">
    <h3 class="text-center p-4 fs-2">Liste des matchs</h3>

    <div class="table-responsive">
        <table class="table table-hover" style="min-height: 80%;">
            <thead class="table-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Equipe 1</th>
                    <th scope="col">Equipe 2</th>
                    <th scope="col">Score 1</th>
                    <th scope="col">Score 2</th>
                    <th scope="col">Compétitions</th>
                    <th scope="col">Lieu</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td>CSG Handball</td>
                    <td>Montivilliers</td>
                    <td>49</td>
                    <td>20</td>
                    <td>+16M prénat</td>
                    <td>Salle michel ostermeyer</td>
                    <td></td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="#"><button class="btnModify">Modifier</button></a>
                            <a href="#"><button class="btnDelete">Supprimer</button></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
