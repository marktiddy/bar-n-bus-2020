<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package WordPress
 * @subpackage THEME_NAME_HERE
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<main role="main">
      <?= get_template_part('template-parts/page-header') ?>
      <div class="container main-content">

        <!-- START THE CONTENT -->
        <div class="row">
          <div class="col-md-12 pr-4">
            <?= the_content(); ?>
          </div>
        </div>
      </div>
      <div class="base-margin"></div>
      <!-- /.container -->
    </main>


<?php get_footer();
