<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage THEME_NAME_HERE
 * @since THEME_NAME_HERE 1.0
 */

get_header(); ?>


<main role="main">
      <?= get_template_part('template-parts/page-header') ?>
      <div class="container main-content">

        <!-- START THE CONTENT -->
        <div class="row">
          <div class="col-md-12 pr-4">
           Oops. You once were found but now you're lost. <a href="<?= get_site_url() ?>">Click here to go home</a>
          </div>
        </div>
      </div>
      <div class="base-margin"></div>
      <!-- /.container -->
    </main>



<?php get_footer(); ?>
