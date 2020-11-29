<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element
 *
 * @package WordPress
 * @subpackage THEME_NAME_HERE
 * @since THEME_NAME_HERE 1.0
 */
$optionsPage = 317;


?>
<!DOCTYPE html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
      <nav
        class="navbar navbar-expand-md navbar-dark fixed-top bg-dark custom-nav"
      >
        <a class="navbar-brand" href="#"
          ><img src="<?= get_field('site_logo',$optionsPage) ?>" alt="Logo" class="<?= bloginfo('name' ) ?> logo"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarCollapse"
          aria-controls="navbarCollapse"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
				</button>
				
				<?php 
								$args = array(
									'theme_location' => 'primary', 
                  'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                  'container'       => 'div',
                  'container_class' => 'collapse navbar-collapse',
                  'container_id'    => 'navbarCollapse',
                  'menu_class'      => 'navbar-nav ml-auto',
                  'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'          => new WP_Bootstrap_Navwalker(),
								);

								wp_nav_menu($args);
					?>

       
				



      </nav>
    </header>