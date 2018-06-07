<?php
// create meta_boxes for layout
add_action( 'add_meta_boxes', 'woo_mx_app_layout_header_box' );

function woo_mx_app_layout_header_box() {

	$screens = array( 'post', 'page' );

	add_meta_box(
		'woo_mx_app_layout_header_sectionid',
		__( 'Model', 'woo-mx-app' ),
		'woo_mx_app_layout_header_box_callback',
		$screens,
		'side'
	);

}

// appearance layout of header
function woo_mx_app_layout_header_box_callback( $post, $meta ) {

	$screens = $meta['args'];

	// We use nonce for verification
	wp_nonce_field( plugin_basename(__FILE__), 'woo_mx_app_layout_header_nonce' );

	/***************************
	* layout_header
	*/
	$data_layout_header = get_post_meta( $post->ID, '_woo_mx_app_layout_header', true );

	echo '<label for="woo_mx_app_layout_header_field">' . __( 'Type of header', 'woo-mx-app' ) . '</label> ';

	echo '<input type="text" id="woo_mx_app_layout_header_field" name="woo_mx_app_layout_header_field" value="' . esc_attr( $data_layout_header ) . '" size="25" />';

	echo '<hr>';

	/***************************
	* type_menu
	*/
	$data_type_menu = get_post_meta( $post->ID, '_woo_mx_app_type_main_menu', true );

	echo '<label for="woo_mx_app_type_main_menu_field">' . __( 'Type of main menu', 'woo-mx-app' ) . '</label> ';

	echo '<input type="text" id="woo_mx_app_type_main_menu_field" name="woo_mx_app_type_main_menu_field" value="' . esc_attr( $data_type_menu ) . '" size="25" />';

}

// Save data when the post is saved
add_action( 'save_post', 'woo_mx_app_save_postdata' );

function woo_mx_app_save_postdata( $post_id ) {

	// is isset $_POST
	if ( ! isset( $_POST['woo_mx_app_layout_header_field'] ) ) return;

	// check the nonce
	if ( ! wp_verify_nonce( $_POST['woo_mx_app_layout_header_nonce'], plugin_basename(__FILE__) ) ) return;

	// if it is not an automatic save
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// check the user's rights
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	/***************************
	* layout_header
	*/
		// Clear the value of the input field woo_mx_app_layout_header_field
		$layout_header_data = sanitize_text_field( $_POST['woo_mx_app_layout_header_field'] );

		// Update the value of the '_woo_mx_app_layout_header' in the database
		update_post_meta( $post_id, '_woo_mx_app_layout_header', $layout_header_data );

	/***************************
	* type_menu
	*/
		// Clear the value of the input field woo_mx_app_layout_header_field
		$layout_header_data = sanitize_text_field( $_POST['woo_mx_app_type_main_menu_field'] );

		// Update the value of the '_woo_mx_app_layout_header' in the database
		update_post_meta( $post_id, '_woo_mx_app_type_main_menu', $layout_header_data );

}

// get post meta
if ( ! function_exists( 'woo_mx_app_get_post_meta_by_key' ) ) {

	function woo_mx_app_get_post_meta_by_key( $key ) {		

		global $wp_query;

		$_post_ID = $wp_query->post->ID;

		// return an array of all values
		if ( ! $key ) {

			return get_post_meta( $_post_ID );

		}

		// return value if set key
		return get_post_meta( $_post_ID )[$key][0];

	}
}
