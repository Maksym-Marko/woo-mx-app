<?php
/**
 * Template Name: Two Sidbars
 *
 * @package woo-mx-app
 */

get_header();

// get left sidebar
woo_mx_app_get_sidebar( 'left' );

?>

	<div id="primary" class="content-area col-6">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get right sidebar
get_sidebar();

// get footer
get_footer();
