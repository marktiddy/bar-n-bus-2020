<?php
/**
 * The template for displaying the footer
 *
 * Contains all of the content after the pages content
 *
 * @package WordPress
 * @subpackage THEME_NAME_HERE
 * @since THEME_NAME_HERE 1.0
 */
$optionsPage = 317;
?>
	
<!-- FOOTER -->
<footer class="container-fluid">
      <div class="row">
        <div class="col-md-9">
          <p>
					&copy; <?php the_time('Y'); ?> - <?php bloginfo('name'); ?> <br><?= get_field('footer_blurb',$optionsPage) ?>. 				<a href="<?= get_field('privacy_policy_page',$optionsPage) ?>">Privacy Policy</a>

          </p>
          <p>Website build by Mark Tiddy</p>
        </div>
        <div class="col-md-3 socials">
          <a href="<?= get_field('facebook',$optionsPage) ?>"><i class="fab fa-facebook-f"></i></a>
          <a href="<?= get_field('instagram',$optionsPage) ?>"><i class="fab fa-instagram"></i></a>
					<a href="<?= get_field('twitter',$optionsPage) ?>"><i class="fab fa-twitter"></i></a>
					
				</div>

      </div>
    </footer>


<?php wp_footer(); ?>
</body>
</html>