<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woo-mx-app
 */

if ( ! is_active_sidebar( 'sidebar-right' ) ) {
	return;
}

$class_col = 'col-4';

if ( is_page_template( 'page_two_sidebars.php' ) ) {

	$class_col = 'col-3';

}
?>

<aside id="secondary" class="widget-area <?php echo $class_col; ?>">
	<?php dynamic_sidebar( 'sidebar-right' ); ?>
</aside><!-- #secondary -->
