<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woo-mx-app
 */

?>
		</div><!-- .row -->
	</div><!-- #content .container-fluid -->

	<footer id="colophon" class="site-footer container-fluid">

		<div class="row">
			
			<?php dynamic_sidebar( 'footer-1' ); ?>

			<div class="site-info col-12">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'woo-mx-app' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'woo-mx-app' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'woo-mx-app' ), 'woo-mx-app', '<a href="http://underscores.me/">Underscores.me</a>' );
					?>
			</div><!-- .site-info -->

		</div>

		

		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
