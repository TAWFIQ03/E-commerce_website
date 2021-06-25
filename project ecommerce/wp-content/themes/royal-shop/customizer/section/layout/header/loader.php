<?php
//Enable Loader
$wp_customize->add_setting( 'royal_shop_preloader_enable', array(
                'default'               => false,
                'sanitize_callback'     => 'royal_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'royal_shop_preloader_enable', array(
                'label'                 => esc_html__('Enable Loader', 'royal-shop'),
                'type'                  => 'checkbox',
                'section'               => 'royal-shop-pre-loader',
                'settings'              => 'royal_shop_preloader_enable',
                'priority'   => 1,
            ) ) );
// BG color
 $wp_customize->add_setting('royal_shop_loader_bg_clr', array(
        'default'           => '#9c9c9c',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new royal_shop_Customizer_Color_Control($wp_customize,'royal_shop_loader_bg_clr', array(
        'label'      => __('Background Color', 'royal-shop' ),
        'section'    => 'royal-shop-pre-loader',
        'settings'   => 'royal_shop_loader_bg_clr',
        'priority'   => 2,
    ) ) 
 ); 
/*******************/ 
// Pre loader Image
/*******************/ 
$wp_customize->add_setting('royal_shop_preloader_image_upload', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'royal_shop_preloader_image_upload', array(
        'label'          => __('Pre Loader Image', 'royal-shop'),
        'description'    => __('(You can also use GIF image.)', 'royal-shop'),
        'section'        => 'royal-shop-pre-loader',
        'settings'       => 'royal_shop_preloader_image_upload',
 )));

/****************/
// doc link
/****************/
$wp_customize->add_setting('royal_shop_loader_link_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_loader_link_more',
            array(
        'section'     => 'royal-shop-pre-loader',
        'type'        => 'doc-link',
        'url'         => 'https://wpzita.com/docs/pre-loader-setting/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));