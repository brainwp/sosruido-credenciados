<?php

function sosf_customizer( $wp_customize ) {

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
    
    add_filter( 'coletivo_customizer_partials_selective_refresh_keys', 'sosf_add_section_customizer' );

}
add_action( 'coletivo_customize_after_register', 'sosf_customizer', 10, 1 );

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

    return $value;

}