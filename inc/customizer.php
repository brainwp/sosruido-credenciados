<?php

function sosf_customizer_network_news( $wp_customize ) {

    /*------------------------------------------------------------------------*/
    /*  Section: Network News
    /*------------------------------------------------------------------------*/
    $wp_customize->add_panel( 'coletivo_network_news' ,
		array(
			'priority'        => coletivo_get_customizer_priority( 'coletivo_network_news' ),
			'title'           => esc_html__( 'Section: Network News', 'coletivo' ),
			'description'     => '',
			'active_callback' => 'coletivo_showon_frontpage'
		)
	);
	$wp_customize->add_section( 'coletivo_network_news_settings' ,
		array(
			'priority'    => 3,
			'title'       => esc_html__( 'Section Settings', 'coletivo' ),
			'description' => '',
			'panel'       => 'coletivo_network_news',
		)
    );
    
	// Show Content
	$wp_customize->add_setting( 'coletivo_network_news_disable',
		array(
			'sanitize_callback' => 'coletivo_sanitize_checkbox',
			'default'           => '',
		)
	);
	$wp_customize->add_control( 'coletivo_network_news_disable',
		array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Hide this section?', 'coletivo' ),
			'section'     => 'coletivo_network_news_settings',
			'description' => esc_html__( 'Check this box to hide this section.', 'coletivo' ),
		)
    );
    
	// Section ID
	$wp_customize->add_setting( 'coletivo_network_news_id',
		array(
			'sanitize_callback' => 'coletivo_sanitize_text',
			'default'           => esc_html__( 'network-news', 'coletivo' ),
		)
	);
	$wp_customize->add_control( 'coletivo_network_news_id',
		array(
			'label'       => esc_html__( 'Section ID:', 'coletivo' ),
			'section'     => 'coletivo_network_news_settings',
			'description' => esc_html__( 'The section id, we will use this for link anchor.', 'coletivo' )
		)
    );
    
	// Title
	$wp_customize->add_setting( 'coletivo_network_news_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'Latest News', 'coletivo' ),
		)
	);
	$wp_customize->add_control( 'coletivo_network_news_title',
		array(
			'label'       => esc_html__( 'Section Title', 'coletivo' ),
			'section'     => 'coletivo_network_news_settings',
			'description' => '',
		)
    );
    
	// Sub Title
	$wp_customize->add_setting( 'coletivo_network_news_subtitle',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'Section subtitle', 'coletivo' ),
		)
	);
	$wp_customize->add_control( 'coletivo_network_news_subtitle',
		array(
			'label'       => esc_html__( 'Section Subtitle', 'coletivo' ),
			'section'     => 'coletivo_network_news_settings',
			'description' => '',
		)
    );
    
    // Description
    $wp_customize->add_setting( 'coletivo_network_news_desc',
        array(
            'sanitize_callback' => 'coletivo_sanitize_text',
            'default'           => '',
        )
    );
    $wp_customize->add_control( new coletivo_Editor_Custom_Control(
        $wp_customize,
        'coletivo_network_news_desc',
        array(
            'label' 		=> esc_html__( 'Section Description', 'coletivo' ),
            'section' 		=> 'coletivo_network_news_settings',
            'description'   => '',
        )
    ));
    
	// Number of post to show.
	$wp_customize->add_setting( 'coletivo_network_news_number',
		array(
			'sanitize_callback' => 'coletivo_sanitize_number',
			'default'           => '3',
		)
	);
	$wp_customize->add_control( 'coletivo_network_news_number',
		array(
			'label'     	=> esc_html__( 'Number of post to show', 'coletivo' ),
			'section' 		=> 'coletivo_network_news_settings',
			'description'   => '',
		)
    );
    
	// Blog Button
	$wp_customize->add_setting( 'coletivo_network_news_more_link',
		array(
			'sanitize_callback' => 'esc_url',
			'default'           => '#',
		)
	);
	$wp_customize->add_setting( 'coletivo_network_news_more_text',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'Read Our Blog', 'coletivo' ),
		)
	);
	$wp_customize->add_control( 'coletivo_network_news_more_text',
		array(
			'label'     	=> esc_html__( 'More News Button Text', 'coletivo' ),
			'section' 		=> 'coletivo_network_news_settings',
			'description'   => '',
		)
    );
    
    //add_filter( 'coletivo_customizer_partials_selective_refresh_keys', 'sosf_add_section_customizer' );

}
add_action( 'coletivo_customize_after_register', 'sosf_customizer_network_news', 10, 1 );

/**
 * 
 * Network Page Featured
 * 
 */
function sosf_customizer_network_page_featured( $wp_customize ) {

    /*------------------------------------------------------------------------*/
    /*  Network Page Featured
    /*------------------------------------------------------------------------*/
    $wp_customize->add_panel( 'coletivo_network_page_featured' ,
		array(
			'priority'        => coletivo_get_customizer_priority( 'coletivo_network_page_featured' ),
			'title'           => esc_html__( 'Section: Network Page Featured', 'coletivo' ),
			'description'     => '',
			'active_callback' => 'coletivo_showon_frontpage'
		)
	);
	$wp_customize->add_section( 'coletivo_network_page_featured_settings' ,
		array(
			'priority'    => 3,
			'title'       => esc_html__( 'Section Settings', 'coletivo' ),
			'description' => '',
			'panel'       => 'coletivo_network_page_featured',
		)
    );
    
	// Show Content
	$wp_customize->add_setting( 'coletivo_network_page_featured_disable',
		array(
			'sanitize_callback' => 'coletivo_sanitize_checkbox',
			'default'           => '',
		)
	);
	$wp_customize->add_control( 'coletivo_network_page_featured_disable',
		array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Hide this section?', 'coletivo' ),
			'section'     => 'coletivo_network_page_featured_settings',
			'description' => esc_html__( 'Check this box to hide this section.', 'coletivo' ),
		)
    );
    
	// Section ID
	$wp_customize->add_setting( 'coletivo_network_page_featured_id_section',
		array(
			'sanitize_callback' => 'coletivo_sanitize_text',
			'default'           => esc_html__( 'network-page-featured', 'coletivo' ),
		)
	);
	$wp_customize->add_control( 'coletivo_network_page_featured_id_section',
		array(
			'label'       => esc_html__( 'Section ID:', 'coletivo' ),
			'section'     => 'coletivo_network_page_featured_settings',
			'description' => esc_html__( 'The section id, we will use this for link anchor.', 'coletivo' )
		)
	);
	
    
	// Title
	$wp_customize->add_setting( 'coletivo_network_page_featured_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'Network Page Featured', 'coletivo' ),
		)
	);
	$wp_customize->add_control( 'coletivo_network_page_featured_title',
		array(
			'label'       => esc_html__( 'Section Title', 'coletivo' ),
			'section'     => 'coletivo_network_page_featured_settings',
			'description' => '',
		)
    );
    
	// Sub Title
	$wp_customize->add_setting( 'coletivo_network_page_featured_subtitle',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'Section subtitle', 'coletivo' ),
		)
	);
	$wp_customize->add_control( 'coletivo_network_page_featured_subtitle',
		array(
			'label'       => esc_html__( 'Section Subtitle', 'coletivo' ),
			'section'     => 'coletivo_network_page_featured_settings',
			'description' => '',
		)
    );
    
    // Description
    $wp_customize->add_setting( 'coletivo_network_page_featured_desc',
        array(
            'sanitize_callback' => 'coletivo_sanitize_text',
            'default'           => '',
        )
    );
    $wp_customize->add_control( new coletivo_Editor_Custom_Control(
        $wp_customize,
        'coletivo_network_page_featured_desc',
        array(
            'label' 		=> esc_html__( 'Section Description', 'coletivo' ),
            'section' 		=> 'coletivo_network_page_featured_settings',
            'description'   => '',
        )
    ));

	// The page to feature.

	/**
	 * Switch to principal site of the network
	 */
	switch_to_blog( 1 );
	
	$pages  =  get_pages();	

	/**
	 * Switch to current site of the network
	 */							
	restore_current_blog();

	$option_pages = array();
	$option_pages[0] = __( 'Select page', 'coletivo' );
	foreach( $pages as $p ){
		$option_pages[ $p->ID ] = $p->post_title;
	}
	
	$wp_customize->add_setting( 'coletivo_network_page_featured_content',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'coletivo_network_page_featured_content',
		array(
			'label'       => esc_html__( 'Featured Page', 'coletivo' ),
			'section'     => 'coletivo_network_page_featured_settings',
			'description' => esc_html__( 'You need to select a Featured Image for a background in full size.', 'coletivo' ),
			'type'        => 'select',
			'choices'     => $option_pages,
			'fields'      => array(
				'options' => $option_pages
			)
	));

	// Featured page content source
    $wp_customize->add_setting( 'coletivo_network_page_featured_content_source',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => 'content',
        )
    );
    $wp_customize->add_control( 'coletivo_network_page_featured_content_source',
        array(
            'label' 		=> esc_html__('Content source', 'coletivo'),
            'section' 		=> 'coletivo_network_page_featured_settings',
            'type'          => 'select',
            'choices'       => array(
                'content' => esc_html__( 'Full Page Content', 'coletivo' ),
                'excerpt' => esc_html__( 'Page Excerpt', 'coletivo' ),
            ),
        )
    );
    
	// Page Button
	$wp_customize->add_setting( 'coletivo_network_page_featured_more_text',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'Veja mais', 'coletivo' ),
		)
	);
	$wp_customize->add_control( 'coletivo_network_page_featured_more_text',
		array(
			'label'     	=> esc_html__( 'Texto "Ver mais" do botão', 'coletivo' ),
			'section' 		=> 'coletivo_network_page_featured_settings',
			'description'   => '',
		)
    );
    
    add_filter( 'coletivo_customizer_partials_selective_refresh_keys', 'sosf_add_section_customizer' );

}
add_action( 'coletivo_customize_after_register', 'sosf_customizer_network_page_featured', 10, 1 );

/**
 * Add settings and ID on list of the sections
 */
function sosf_add_section_customizer( $value ) {

    // network news
    $network_news = array(
        'id' => 'network-news',
        'selector' => '.section-network-news',
        'settings' => array(
            'coletivo_network_news_title',
            'coletivo_network_news_subtitle',
            'coletivo_network_news_desc',
            'coletivo_network_news_number',
            'coletivo_network_news_more_text'
        ),
    );

	$value[] = $network_news;

	// network page featured
    $network_page_featured = array(
        'id' => 'network-page-featured',
        'selector' => '.section-network-page-featured',
        'settings' => array(
			'coletivo_network_page_featured_id_section',
			'coletivo_network_page_featured_disable',
            'coletivo_network_page_featured_title',
            'coletivo_network_page_featured_subtitle',
            'coletivo_network_page_featured_desc',
			'coletivo_network_page_featured_more_text',
			'coletivo_network_page_featured_content_source',
			'coletivo_network_page_featured_content'
        ),
    );

	$value[] = $network_page_featured;

    return $value;

}