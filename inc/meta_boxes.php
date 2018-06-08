<?php
/*
* Create meta_boxes for the layout style
*/
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

/*
* Create the Metabox panel in the admin panel to configure the layout
*/
function woo_mx_app_layout_header_box_callback( $post, $meta ) {

	$screens = $meta['args'];

	// Use nonce for verification
	wp_nonce_field( plugin_basename( __FILE__ ), 'woo_mx_app_layout_header_nonce' );

	/***************************
	* Header layout
	*/
	$data_layout_header = get_post_meta( $post->ID, '_woo_mx_app_layout_header', true );

	$data_layout_header = esc_attr( $data_layout_header );

	// Array of the option values
	$layout_header_values = array(

		'Default Header',
		'Video Header'

	);

	// Display the field with the settings
	?>
	<div class="mx-metabox_wrap">

		<label for="woo_mx_app_layout_header_field"><?php echo __( 'Type of header', 'woo-mx-app' ); ?></label>

		<select id="woo_mx_app_layout_header_field" name="woo_mx_app_layout_header_field">
			
			<?php foreach( $layout_header_values as $value ) : ?>

				<option value="<?php echo $value; ?>"
				<?php if ( $data_layout_header == $value ) echo 'selected';?>><?php echo $value; ?></option>

			<?php endforeach; ?>

		</select>
	</div>

	<?php

	/***************************
	* Style of the main menu
	*/
	$data_type_menu = get_post_meta( $post->ID, '_woo_mx_app_type_main_menu', true );

	$data_type_menu = esc_attr( $data_type_menu );

	// Array of the option values
	$main_meny_values = array(

		'Default Menu',
		'Fixed Menu'

	);

	?>
	<div class="mx-metabox_wrap">

		<label for="woo_mx_app_type_main_menu_field"><?php echo __( 'Type of main menu', 'woo-mx-app' ); ?></label>

		<select id="woo_mx_app_type_main_menu_field" name="woo_mx_app_type_main_menu_field">
			
			<?php foreach( $main_meny_values as $value ) : ?>

				<option value="<?php echo $value; ?>"
				<?php if ( $data_type_menu == $value ) echo 'selected';?>><?php echo $value; ?></option>

			<?php endforeach; ?>

		</select>
	</div>

	<?php

}

/*
* Save data when the post is saved
*/
add_action( 'save_post', 'woo_mx_app_save_postdata' );

function woo_mx_app_save_postdata( $post_id ) {

	// check the nonce
	if ( ! wp_verify_nonce( $_POST['woo_mx_app_layout_header_nonce'], plugin_basename(__FILE__) ) ) return;

	// if it is not an automatic save
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// check the user's rights
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	/*************************************
	* Save settings for the header layout.
	*/
		// Clear the value of the input field woo_mx_app_layout_header_field
		$layout_header_data = sanitize_text_field( $_POST['woo_mx_app_layout_header_field'] );

		// Update the value of the '_woo_mx_app_layout_header' in the database
		update_post_meta( $post_id, '_woo_mx_app_layout_header', $layout_header_data );

	/***************************************
	* Save settings for the main menu style
	*/
		// Clear the value of the input field woo_mx_app_type_main_menu_field
		$layout_header_data = sanitize_text_field( $_POST['woo_mx_app_type_main_menu_field'] );

		// Update the value of the '_woo_mx_app_type_main_menu' in the database
		update_post_meta( $post_id, '_woo_mx_app_type_main_menu', $layout_header_data );

}

/*
* Obtain metadata with a specific key.
* If the key is not set, the function returns an array
* of all values of a particular post.
*/
if ( ! function_exists( 'woo_mx_app_get_post_meta_by_key' ) ) {

	function woo_mx_app_get_post_meta_by_key( $key ) {		

		global $wp_query;

		$_post_ID = $wp_query->post->ID;

		// return an array of all values
		if ( ! $key ) {

			return get_post_meta( $_post_ID );

		}

		// return value if set key
		return get_post_meta( $_post_ID, $key, true );

	}
}
