<?php
/******************/
//Global Option
/******************/
// theme color
 $wp_customize->add_setting('royal_shop_theme_clr', array(
        'default'        => '#00badb',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'royal_shop_theme_clr', array(
        'label'      => __('Theme Color', 'royal-shop' ),
        'section'    => 'royal-shop-gloabal-color',
        'settings'   => 'royal_shop_theme_clr',
        'priority' => 1,
    ) ) 
 );  
// link color
 $wp_customize->add_setting('royal_shop_link_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'royal_shop_link_clr', array(
        'label'      => __('Link Color', 'royal-shop' ),
        'section'    => 'royal-shop-gloabal-color',
        'settings'   => 'royal_shop_link_clr',
        'priority' => 2,
    ) ) 
 );  
// link hvr color
 $wp_customize->add_setting('royal_shop_link_hvr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'royal_shop_link_hvr_clr', array(
        'label'      => __('Link Hover Color', 'royal-shop' ),
        'section'    => 'royal-shop-gloabal-color',
        'settings'   => 'royal_shop_link_hvr_clr',
        'priority' => 3,
    ) ) 
 );

// text color
 $wp_customize->add_setting('royal_shop_text_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'royal_shop_text_clr', array(
        'label'      => __('Text Color', 'royal-shop' ),
        'section'    => 'royal-shop-gloabal-color',
        'settings'   => 'royal_shop_text_clr',
        'priority' => 4,
    ) ) 
 );
 // title color
 $wp_customize->add_setting('royal_shop_title_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'royal_shop_title_clr', array(
        'label'      => __('Title Color', 'royal-shop' ),
        'section'    => 'royal-shop-gloabal-color',
        'settings'   => 'royal_shop_title_clr',
        'priority' => 4,
    ) ) 
 );  
// gloabal background option
$wp_customize->get_control( 'background_color' )->section = 'royal-shop-gloabal-color';
$wp_customize->get_control( 'background_color' )->priority = 6;
$wp_customize->get_control( 'background_image' )->section = 'royal-shop-gloabal-color';
$wp_customize->get_control( 'background_image' )->priority = 7;
$wp_customize->get_control( 'background_preset' )->section = 'royal-shop-gloabal-color';
$wp_customize->get_control( 'background_preset' )->priority = 8;
$wp_customize->get_control( 'background_position' )->section = 'royal-shop-gloabal-color';
$wp_customize->get_control( 'background_position' )->priority = 8;
$wp_customize->get_control( 'background_repeat' )->section = 'royal-shop-gloabal-color';
$wp_customize->get_control( 'background_repeat' )->priority = 9;
$wp_customize->get_control( 'background_attachment' )->section = 'royal-shop-gloabal-color';
$wp_customize->get_control( 'background_attachment' )->priority = 10;
$wp_customize->get_control( 'background_size' )->section = 'royal-shop-gloabal-color';
$wp_customize->get_control( 'background_size' )->priority = 11;
/****************/
//doc link
/****************/
$wp_customize->add_setting('royal_shop_global_clr_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_global_clr_more',
            array(
        'section'     => 'royal-shop-gloabal-color',
        'type'        => 'doc-link',
        'url'         => 'https://wpzita.com/docs/site-colors/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));