<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>



<section class="py-3 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto text-light">
            <h1 class="fw-light">L'album photo de l'entente</h1>
            <p class="lead ">Retrouvez toutes les photos de l'album</p>
        </div>
        <div class="m-3">
<a href="../controllers/controller-album.php" class="btn btn-dark fs-5">Retour</a>
</div>
    </div>
</section>
<div class="album py-3 bg-light row justify-content-center">

    <?php foreach (Album::getAlbumPhotos($alb_id) as $photo) : ?>


        <div class="card shadow-sm col-2 m-2">
            <a data-fancybox="gallery" data-src="<?= '../assets/albumPhoto/' . Album::getAlbumName($alb_id) . '/' . $photo['pho_name']  ?>" data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                <img src="<?= '../assets/albumPhoto/' . Album::getAlbumName($alb_id) . '/' . $photo['pho_name']  ?>"  alt="" class="img-fluid p-1"/>
            </a>
        </div>
    <?php endforeach; ?>
</div>


<script>
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });
</script>






















<?php include "components/footer.php" ?>