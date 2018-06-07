<?php

// change search forms
add_filter( 'get_search_form', 'woo_mx_app_change_search_form' );

function woo_mx_app_change_search_form( $form ){

	$form = '<form role="search" method="get" id="searchform" class="form-row mx-form_search" action="' . home_url( '/' ) . '" >	
		<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="query..." class="col-8 mx-input_search" />
		<button type="submit" class="btn btn-primary col-4 mx-button_search_submit" id="searchsubmit">Search</button>
	</form>';

	return $form;
}