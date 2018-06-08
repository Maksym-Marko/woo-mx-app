<?php
/**
 * The sidebar containing the main widget area
 *
 * @package woo-mx-app
 */

// Exit, if there are no widgets, and the current user is not an administrator
if ( ! is_active_sidebar( 'footer-2' ) ) {

	return;

}

dynamic_sidebar( 'footer-2' );