<?php get_header(); ?>
<!-- SLIDER -->
<main role="main">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <!-- item start -->
          <div class="carousel-item active" style="
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?= get_field('slider_1_image'); ?>); background-size: cover; background-repeat:no-repeat; 
          ">
           
            <div class="container">
              <div class="carousel-caption text-left">
                <h1><?= get_field('slider_1_title'); ?></h1>
                <p>
                <?= get_field('slider_1_text'); ?>
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="<?= get_field('slider_1_button_destination'); ?>" role="button"
                    ><?= get_field('slider_1_button_text'); ?></a
                  >
                </p>
              </div>
            </div>
          </div>
          <!-- item end -->
          <!-- item start-->
<?php if (get_field('slider_2_title')): ?>
  <div class="carousel-item" style="
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?= get_field('slider_2_image'); ?>); background-size: cover; background-repeat:no-repeat; 
          ">


            <div class="container">
              <div class="carousel-caption text-left">
                <h1><?= get_field('slider_2_title'); ?></h1>
                <p>
                <?= get_field('slider_2_text'); ?>
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="<?= get_field('slider_2_button_destination'); ?>" role="button"
                    ><?= get_field('slider_2_button_text'); ?></a
                  >
                </p>
              </div>
            </div>
          </div>
<?php endif; ?>
        </div>
        <a
          class="carousel-control-prev"
          href="#myCarousel"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#myCarousel"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <!-- END OF SLIDER -->

      <!-- FEATURE SECTION-->
      <div class="container-fluid feature-area">
        <div class="row">

          <a class="col-md-4 feature-item text-center text-white" href="<?= get_field('box_1_link'); ?>">
            <i class="<?= get_field('box_1_icon'); ?>"></i>
            <h2><?= get_field('box_1_title'); ?></h2>
            <p>
            <?= get_field('box_1_text'); ?>
            </p>
          </a>
          <a class="col-md-4 feature-item text-center text-white" href="<?= get_field('box_2_link'); ?>">
            <i class="<?= get_field('box_2_icon'); ?>"></i>
            <h2><?= get_field('box_2_title'); ?></h2>
            <p>
            <?= get_field('box_2_text'); ?>
            </p>
          </a>
          <a class="col-md-4 feature-item text-center text-white" href="<?= get_field('box_3_link'); ?>">
            <i class="<?= get_field('box_3_icon'); ?>"></i>
            <h2><?= get_field('box_3_title'); ?></h2>
            <p>
            <?= get_field('box_3_text'); ?>
            </p>
          </a>
         
        </div>
      </div>

      <div class="container main-content">
        <!-- Three columns of text below the carousel -->

        <!-- START THE CONTENT -->
        <div class="row">
          <div class="col-md-12">
            <p>
              <?= the_content(); ?>
            </p>
          </div>
          
        </div>
      </div>
      <div class="base-margin"></div>
      <!-- /.container -->
    </main>

<?php get_footer(); ?>