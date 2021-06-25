<?php 
//Enable Loader
$wp_customize->add_setting( 'royal_shop_social_original_color', array(
                'default'               => false,
                'sanitize_callback'     => 'royal_shop_sanitize_checkbox',
            ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'royal_shop_social_original_color', array(
                'label'       => esc_html__('Show Original Color', 'royal-shop'),
                'type'        => 'checkbox',
                'section'     => 'royal-shop-social-icon',
                'settings'    => 'royal_shop_social_original_color',
)));
$wp_customize->add_setting('royal_shop_social_link_facebook', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('royal_shop_social_link_facebook', array(
        'label'    => __('Facebook URL', 'royal-shop'),
        'section'  => 'royal-shop-social-icon',
        'settings' => 'royal_shop_social_link_facebook',
         'type'       => 'text',
        
        ));

$wp_customize->add_setting('royal_shop_social_link_linkedin', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('royal_shop_social_link_linkedin', array(
        'label'    => __('LinkedIn URL', 'royal-shop'),
        'section'  => 'royal-shop-social-icon',
        'settings' => 'royal_shop_social_link_linkedin',
         'type'       => 'text',
        
        ));
$wp_customize->add_setting('royal_shop_social_link_pintrest', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('royal_shop_social_link_pintrest', array(
        'label'    => __('Pinterest URL', 'royal-shop'),
        'section'  => 'royal-shop-social-icon',
        'settings' => 'royal_shop_social_link_pintrest',
         'type'       => 'text',
        
        ));
$wp_customize->add_setting('royal_shop_social_link_twitter', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('royal_shop_social_link_twitter', array(
        'label'    => __('Twitter URL', 'royal-shop'),
        'section'  => 'royal-shop-social-icon',
        'settings' => 'royal_shop_social_link_twitter',
         'type'       => 'text',
        ));
$wp_customize->add_setting('royal_shop_social_link_insta', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('royal_shop_social_link_insta', array(
        'label'    => __('Instagram URL', 'royal-shop'),
        'section'  => 'royal-shop-social-icon',
        'settings' => 'royal_shop_social_link_insta',
         'type'       => 'text',
        ));
$wp_customize->add_setting('royal_shop_social_link_tumblr', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('royal_shop_social_link_tumblr', array(
        'label'    => __('Tumblr URL', 'royal-shop'),
        'section'  => 'royal-shop-social-icon',
        'settings' => 'royal_shop_social_link_tumblr',
         'type'       => 'text',
        ));
$wp_customize->add_setting('royal_shop_social_link_youtube', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('royal_shop_social_link_youtube', array(
        'label'    => __('Youtube URL', 'royal-shop'),
        'section'  => 'royal-shop-social-icon',
        'settings' => 'royal_shop_social_link_youtube',
         'type'       => 'text',
        ));
$wp_customize->add_setting('royal_shop_social_link_stumbleupon', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('royal_shop_social_link_stumbleupon', array(
        'label'    => __('Stumbleupon URL', 'royal-shop'),
        'section'  => 'royal-shop-social-icon',
        'settings' => 'royal_shop_social_link_stumbleupon',
        'type'     => 'text',
        ));
        $wp_customize->add_setting('royal_shop_social_link_dribble', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('royal_shop_social_link_dribble', array(
        'label'    => __('Dribble URL', 'royal-shop'),
        'section'  => 'royal-shop-social-icon',
        'settings' => 'royal_shop_social_link_dribble',
        'type'     => 'text',
        ));

/****************/
//body doc link
/****************/
$wp_customize->add_setting('royal_shop_social_link_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_social_link_more',
            array(
        'section'     => 'royal-shop-social-icon',
        'type'        => 'doc-link',
        'url'         => 'https://wpzita.com/docs/social-icon-setting/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));