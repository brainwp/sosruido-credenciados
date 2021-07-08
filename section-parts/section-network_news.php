<?php

/**
 * 
 * Section to get news from up site on network.
 * @since 08/02/2020
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
	$coletivo_network_news_id        = get_theme_mod( 'coletivo_network_news_id', esc_html__( 'network-news', 'coletivo' ) );
	$coletivo_network_news_disable   = get_theme_mod( 'coletivo_network_news_disable' ) == 1 ? true : false;
	$coletivo_network_news_title     = get_theme_mod( 'coletivo_network_news_title', esc_html__( 'Latest News', 'coletivo' ) );
	$coletivo_network_news_subtitle  = get_theme_mod( 'coletivo_network_news_subtitle', esc_html__( 'Section subtitle', 'coletivo' ) );
	$coletivo_network_news_number    = get_theme_mod( 'coletivo_network_news_number', '3' );
	$coletivo_network_news_more_text = get_theme_mod( 'coletivo_network_news_more_text', esc_html__( 'Read Our Blog', 'coletivo' ) );
	$coletivo_network_news_desc      = get_theme_mod( 'coletivo_network_news_desc' );

	if ( coletivo_is_selective_refresh() ) {
		$coletivo_network_news_disable = false;
	}

	if ( ! $coletivo_network_news_disable  ) : ?>

		<?php if ( ! coletivo_is_selective_refresh() ) { ?>
			<section id="<?php if ( $coletivo_network_news_id != '' ) echo $coletivo_network_news_id; ?>" <?php do_action( 'coletivo_section_atts', 'network_news' ); ?> class="<?php echo esc_attr( apply_filters( 'coletivo_section_class', 'section-network-news section-padding onepage-section', 'network_news' ) ); ?>">
		<?php } ?>

		<?php do_action( 'coletivo_section_before_inner', 'network_news' ); ?>
		
		<div class="container">

			<?php if ( $coletivo_network_news_title ||  $coletivo_network_news_subtitle ||  $coletivo_network_news_desc ) { ?>
				<div class="section-title-area">
					<?php if ( $coletivo_network_news_subtitle != '' ) echo '<h5 class="section-subtitle">' . esc_html( $coletivo_network_news_subtitle ) . '</h5>'; ?>
					<?php if ( $coletivo_network_news_title != '' ) echo '<h2 class="section-title">' . esc_html( $coletivo_network_news_title ) . '</h2>'; ?>
					<?php if ( $coletivo_network_news_desc ) {
						echo '<div class="section-desc">' . apply_filters( 'the_content', wp_kses_post( $coletivo_network_news_desc ) ) . '</div>';
					} ?>
				</div><!-- /.section-title-area -->
			<?php } ?>

			<div class="section-content">
				<div class="row">
					<div class="col-sm-12">
						<div class="blog-entry wow slideInUp">
							<?php

							/**
							 * Switch to principal site of the network
							 */
							switch_to_blog( 1 );
							
							$query = new WP_Query(
								array(
									'post_type'      => 'post',
									'posts_per_page' => $coletivo_network_news_number,
									'post_status'    => 'publish'
								)
							);

							if ( $query->have_posts() ) :
							
								while ( $query->have_posts() ) : $query->the_post();

									/*
									* Include the Post-Format-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Format name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', 'list' ); 
									
								endwhile;
								
							else :
							
								get_template_part( 'template-parts/content', 'none' ); 
							
							endif;

							/**
							 * Switch to current site of the network
							 */							
							restore_current_blog(); ?>

							<div class="all-news">
								<a class="btn btn-theme-primary btn-lg" href="<?php echo esc_url( get_site_url( 1 ) ); ?>"><?php if ( $coletivo_network_news_more_text != '' ) echo esc_html( $coletivo_network_news_more_text ); ?></a>
							</div><!-- /.all-news -->

						</div><!-- /.blog-entry -->
					</div>
				</div>

			</div><!-- /.section-content -->
		</div><!-- /.container -->

		<?php do_action( 'coletivo_section_after_inner', 'network_news' ); ?>

		<?php if ( ! coletivo_is_selective_refresh() ){ ?>
			</section>
		<?php } ?>

	<?php endif;

	wp_reset_query();

// Close the if ( is_multisite() && ! is_main_site() )
endif;