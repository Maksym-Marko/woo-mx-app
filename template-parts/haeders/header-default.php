<?php
	// check if there is a background
	$header_bg = get_custom_header()->url;
	$no_bg_class = '';

	if ( $header_bg ) {

		$set_bgi = 'style="background-image: url( ' . $header_bg . ' );"';

	} else {

		$set_bgi = '';
		$no_bg_class = 'mx-header_without_background';

	}
?>


<?php 
	var_dump( woo_mx_app_get_post_meta_by_key( '_woo_mx_app_layout_header' ) );
?>


<header id="masthead" class="site-header container-fluid mx-header <?php echo $no_bg_class; ?>" <?php echo $set_bgi; ?>>	

	<div class="mx-headre_line row">

		<!-- <div class="site-branding row"> -->
			<div class="col-3 col-sm-2">
				
				<?php the_custom_logo(); ?>

			</div>

			<div class="col-9 col-sm-10">

				<div class="row">
					
					<div class="col-12">
						
						<?php			
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$woo_mx_app_description = get_bloginfo( 'description', 'display' );
						if ( $woo_mx_app_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $woo_mx_app_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>

					</div>

					<div class="col-12">
						
						<nav id="site-navigation" class="mx-main_navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'woo-mx-app' ); ?></button>
							<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'menu_class'	=> 'row no-gutters',
								'walker'		=> new woo_mx_app_walker_nav_menu(),
							) );
							?>
						</nav><!-- #site-navigation -->

					</div>

				</div>

			</div>
			
		<!-- </div>.site-branding -->			

	</div>

</header><!-- #masthead -->