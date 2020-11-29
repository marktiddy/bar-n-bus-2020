<?php 
$image = get_the_post_thumbnail_url();
if (!$image) {
  $image = get_theme_file_uri() . '/images/converse.jpg';
}

?>



<div
        class="container-fluid page-header"
        style="
          background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)), url(<?= $image ?>) !important;
          background-size: cover;
          background-position: center;
        "
      >
       

        <div class="row">
          <div class="col-md-12 text-center text-white">
            <h1><?= the_title(); ?></h1>
          </div>
        </div>
      </div>