<?php
/**
 * The sidebar containing the main widget area
 *
 * @package woo-mx-app
 */

// Exit, if there are no widgets, and the current user is not an administrator
if ( is_active_sidebar( 'footer-copyright' ) ) :

	dynamic_sidebar( 'footer-copyright' );

else : ?>

	<p>

		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'woo-mx-app' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Proudly powered by %s', 'woo-mx-app' ), 'WordPress' );
			?>
		</a>
		<span class="sep"> | </span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( 'Theme: %1$s by %2$s.', 'woo-mx-app' ), 'woo-mx-app', '<a href="https://github.com/Maxim-us">Marko Maksym</a>' );
			?>
	</p>

<?php endif;

