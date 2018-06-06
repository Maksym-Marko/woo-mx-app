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
			
			<!-- start widget area -->
			<?php 
				// get widget area "footer-1"
				woo_mx_app_get_sidebar( 'footer-1' );
			?>

			<div class="w-100"></div>

			<?php 
				// get widget area "footer-2"
				woo_mx_app_get_sidebar( 'footer-2' );
			?>
			<!-- end widget area -->

			<!-- copyright -->
			<div class="site-info mx-copyright col-12">
				
				<?php 
					// get widget area "footer-copyright"
					woo_mx_app_get_sidebar( 'footer-copyright' );
				?>
				
			</div><!-- .site-info -->

		</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
