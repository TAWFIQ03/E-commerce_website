<?php
function wallstreet_social_customizer( $wp_customize ) {
/* Header Section */
	$wp_customize->add_panel( 'social_link_options', array(
		'priority'       => 450,
		'capability'     => 'edit_theme_options',
		'title'      => esc_html__('Social link settings','wallstreet'),
	) );
	
	//Header social Icon

	$wp_customize->add_section(
        'social_icon',
        array(
            'title' => esc_html__('Social Links','wallstreet'),
           'priority'    => 400,
			'panel' => 'social_link_options',
        )
    );
	
	//Show and hide Header Social Icons
	$wp_customize->add_setting(
	'wallstreet_pro_options[header_social_media_enabled]'
    ,
    array(
        'default' => true,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'wallstreet_sanitize_checkbox',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[header_social_media_enabled]',
    array(
        'label' => esc_html__('Enable social media links on header section','wallstreet'),
        'section' => 'social_icon',
        'type' => 'checkbox',
    )
	);
	//Footer enable/disable social icon
	$wp_customize->add_setting(
	'wallstreet_pro_options[footer_social_media_enabled]'
    ,
    array(
        'default' => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'wallstreet_sanitize_checkbox',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[footer_social_media_enabled]',
    array(
        'label' => esc_html__('Enable social media links on footer section','wallstreet'),
        'section' => 'social_icon',
        'type' => 'checkbox',
    )
	);
	
	
	//twitter link
	
	$wp_customize->add_setting(
    'wallstreet_pro_options[social_media_twitter_link]',
    array(
        'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[social_media_twitter_link]',
    array(
        'label' => esc_html__('Twitter URL','wallstreet'),
        'section' => 'social_icon',
        'type' => 'text',
    )
	);

	// Facebook link
	$wp_customize->add_setting(
    'wallstreet_pro_options[social_media_facebook_link]',
    array(
        'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[social_media_facebook_link]',
    array(
        'label' => esc_html__('Facebook URL','wallstreet'),
        'section' => 'social_icon',
        'type' => 'text',
    )
	);
	
	//Linkdin link
	
	$wp_customize->add_setting(
	'wallstreet_pro_options[social_media_linkedin_link]' ,
    array(
        'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[social_media_linkedin_link]',
    array(
        'label' => esc_html__('LinkedIn URL','wallstreet'),
        'section' => 'social_icon',
        'type' => 'text',
    )
	);
	
	//Youtube Profile Link:
	
	$wp_customize->add_setting(
	'wallstreet_pro_options[social_media_youtube_link]' ,
    array(
        'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[social_media_youtube_link]',
    array(
        'label' => esc_html__('YouTube URL','wallstreet'),
        'section' => 'social_icon',
        'type' => 'text',
    )
	);
	
	//Instagram Profile Link:
	
	$wp_customize->add_setting(
	'wallstreet_pro_options[social_media_instagram_link]' ,
    array(
        'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'wallstreet_pro_options[social_media_instagram_link]',
    array(
        'label' => esc_html__('Instagram URL','wallstreet'),
        'section' => 'social_icon',
        'type' => 'text',
    )
	);
	
	}
	add_action( 'customize_register', 'wallstreet_social_customizer' );