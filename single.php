<?php
/**
 * The template for displaying all single posts 
 *
 * @package WordPress
 * @subpackage THEME_NAME_HERE
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					// STUFF AND THINGS GO HERE! 

				endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->	
</div><!-- .wrap -->

<?php get_footer();
