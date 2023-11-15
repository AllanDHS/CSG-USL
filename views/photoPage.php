<?php include "components/header.php" ?>
<?php include "components/navbar.php" ?>



<section class="py-3 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">L'album photo de l'entente</h1>
            <p class="lead text-muted">Retrouvez toutes les photos de la saison 2023-2024</p>
        </div>
    </div>
</section>
<div class="album py-3 bg-light row">

    <?php foreach (Album::getAlbumPhotos($alb_id) as $photo) : ?>


        <div class="card shadow-sm col-2 m-2">
            <a data-fancybox="gallery" data-src="<?= '../assets/' . Album::getAlbumName($alb_id) . '/' . $photo['pho_name']  ?>" data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code">
                <img src="<?= '../assets/' . Album::getAlbumName($alb_id) . '/' . $photo['pho_name']  ?>" width="200" height="150" alt="" />
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