<?php

/**
 * 
 * Section to get news from up site on network.
 * @since 19/02/2020
 * @author Everaldo Matias <https://everaldo.dev>
 * 
 */

/**
 * Check if multisite is enabled and not the main one
 */
if ( is_multisite() && ! is_main_site() ) :

	/**
	 * Get values from /options.php
	 */
	$coletivo_network_page_featured_id_section     = get_theme_mod( 'coletivo_network_page_featured_id_section', esc_html__( 'network-news', 'coletivo' ) );
	$coletivo_network_page_featured_disable        = get_theme_mod( 'coletivo_network_page_featured_disable' )                                                == 1 ? true : false;
	$coletivo_network_page_featured_title          = get_theme_mod( 'coletivo_network_page_featured_title', esc_html__( 'Latest News', 'coletivo' ) );
	$coletivo_network_page_featured_subtitle       = get_theme_mod( 'coletivo_network_page_featured_subtitle', esc_html__( 'Section subtitle', 'coletivo' ) );
	$coletivo_network_page_featured_more_text      = get_theme_mod( 'coletivo_network_page_featured_more_text', esc_html__( 'Read Our Blog', 'coletivo' ) );
	$coletivo_network_page_featured_desc           = get_theme_mod( 'coletivo_network_page_featured_desc' );
	$coletivo_network_page_featured_content        = get_theme_mod( 'coletivo_network_page_featured_content' );
	$coletivo_network_page_featured_content_source = get_theme_mod( 'coletivo_network_page_featured_content_source' );

	if ( coletivo_is_selective_refresh() ) {
		$coletivo_network_page_featured_disable = false;
	}

	// Get data from page featured

	if ( $coletivo_network_page_featured_content ) {

		/**
		 * Switch to principal site of the network
		 */
		switch_to_blog( 1 );
		
		$page           = get_post( $coletivo_network_page_featured_content );
		$page_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );
		$page_thumbnail = $page_thumbnail[0];
		$page_title     = $page->post_title;
		$page_excerpt   = $page->post_excerpt;
		$page_content   = $page->post_content;
		$page_permalink = get_permalink( $page->ID );

		/**
		 * Switch to current site of the network
		 */							
		restore_current_blog();

	} else {

		echo 'Nenhuma página selecionada!';

	}	
	
	if ( ! $coletivo_network_page_featured_disable ) { ?>
		<?php if ( ! coletivo_is_selective_refresh() ) : ?>
			
			<?php if ( ! $page_thumbnail || empty( $page_thumbnail ) ) {
				$style = 'background-color :#222;';
			} else {
				$style = sprintf( 'background:url( %s ) center no-repeat; background-size:cover;', $page_thumbnail );
			} ?>
			<section style="<?php echo esc_attr( $style );?>" id="<?php if ( $coletivo_network_page_featured_id_section != '' ) {
				echo $coletivo_network_page_featured_id_section;
			}; ?>" <?php do_action( 'coletivo_section_atts', 'network_page_featured' ); ?> class="<?php echo esc_attr( apply_filters( 'coletivo_section_class', 'section-network-page-featured section-padding onepage-section', 'network-page-featured' ) ); ?>">
		
		<?php endif; ?>

	<?php } ?>
		<section style="<?php echo esc_attr( $style );?>" id="<?php if ( $coletivo_network_page_featured_id_section != '' ) {
				echo $coletivo_network_page_featured_id_section;
			}; ?>" <?php do_action( 'coletivo_section_atts', 'network_page_featured' ); ?> class="<?php echo esc_attr( apply_filters( 'coletivo_section_class', 'section-network-page-featured section-padding onepage-section', 'network-page-featured' ) ); ?>">
	<div class="content"> 
		<div class="container">
			<?php do_action( 'coletivo_section_before_inner', 'network_page_featured' ); ?>
			<div class="section-title-area">
				<h2 class="section-title"><?php echo apply_filters( 'the_title', $page_title ); ?></h2>
				<div class="section-desc">
					<?php
						if ( $coletivo_network_page_featured_content_source == 'excerpt' ) {
							echo apply_filters( 'the_content', $page_excerpt );
						} else {
							echo apply_filters( 'the_content', $page_content );
						}
					?>
				</div><!-- /.section-desc -->
			
				<?php if ( $coletivo_network_page_featured_more_text != '' ) : ?>
					<a id="link-network_page_featured" class="btn btn-theme-primary btn-lg" href="<?php echo esc_url( $page_permalink ) ; ?>">
						<?php echo esc_html( $coletivo_network_page_featured_more_text ); ?>
					</a>
				<?php endif; ?>

			</div><!-- /.section-title-area -->
		</div><!-- /.container -->
	</div><!-- /.content -->
	
	<?php do_action( 'coletivo_section_after_inner', 'network_page_featured' ); ?>
	
	<?php if ( ! $page_permalink ) ?>
	</section>


<?php
// Close the if ( is_multisite() && ! is_main_site() )
endif;
