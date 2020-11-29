<?php /* Template Name: About Page */ ?>

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
      <div class="spacer-50"></div>
      <?php 
      $teamMembers = new WP_Query(array(
        'post_type' => 'team',
        'posts_per_page' => -1,
        'order' => 'ASC'
      ));

      ?>
      <!-- FEATURE SECTION-->
      <div class="container team-area">
          <div class="row">
          <?php while ($teamMembers->have_posts()): $teamMembers->the_post(); ?>

            <div class="col-md-4 team-item text-center text-white">
              <img
                src="<?= get_field('image'); ?>"
                alt=""
              />
              <h2><?= the_title(); ?></h2>
              <p>
              <?= get_field('job_title'); ?>
              </p>
        </div>

    <?php endwhile; 
    wp_reset_postdata();
    ?>
          </div>
        </div>


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


<?php get_footer(); ?>