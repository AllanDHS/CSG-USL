<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>


<main>
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">L'album photo de l'entente</h1>
        <p class="lead text-muted">Retrouvez toutes les photos de la saison 2023-2024</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach (Album::getAllAlbums() as $album) :
        ?>
          <div class="col">
            <div class="card shadow-sm">
              <img class="bd-placeholder-img card-img-top" width="100%" src="<?= '../assets/' . $album['alb_name'] . '/' . Album::getAlbumPhotos($album['alb_id'])[0]['pho_name']  ?>" preserveAspectRatio="xMidYMid slice" focusable="false">
              <span><?=$message?></span>

              <div class="card-body">
                <p class="card-text text-uppercase fs-5"><?= $album['alb_name'] ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="../controllers/controller-photoPage.php?album=<?=$album['alb_id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">+ photos</button></a>

                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

</main>


<?php include "components/footer.php" ?>