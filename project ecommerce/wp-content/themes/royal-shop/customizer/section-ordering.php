<?php
/*********************/
// Sticky Sidebar
/********************/
 $wp_customize->add_setting( 'royal_shop_sticky_sidebar', array(
    'default'           => false,
    'sanitize_callback' => 'royal_shop_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new royal_shop_Toggle_Control( $wp_customize, 'royal_shop_sticky_sidebar', array(
    'label'       => esc_html__( 'Fixed Sidebar', 'royal-shop' ),
    'section'     => 'royal-shop-section-sidebar-group',
    'type'        => 'toggle',
    'settings'    => 'royal_shop_sticky_sidebar',
  ) ) );

  $wp_customize->add_setting('royal_shop_sidebar_front_option', array(
        'default'        => 'active-sidebar',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
$wp_customize->add_control( 'royal_shop_sidebar_front_option', array(
        'settings' => 'royal_shop_sidebar_front_option',
        'label'    => __('Home Page','royal-shop'),
        'section'  => 'royal-shop-section-sidebar-group',
        'type'     => 'select',
        'choices'    => array(
        'active-sidebar' => __('Both Sidebar','royal-shop'),
        'no-sidebar' => __('No Sidebar','royal-shop'),
        'disable-left-sidebar'  => __('Right Sidebar','royal-shop'),
        'disable-right-sidebar' => __('Left Sidebar','royal-shop'),
        ),
    ));

$wp_customize->add_setting('royal_shop_sidebar_ineternal_option', array(
        'default'        => 'active-sidebar',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
$wp_customize->add_control( 'royal_shop_sidebar_ineternal_option', array(
        'settings' => 'royal_shop_sidebar_ineternal_option',
        'label'    => __('Inner Pages','royal-shop'),
        'section'  => 'royal-shop-section-sidebar-group',
        'type'     => 'select',
        'choices'    => array(
        'active-sidebar' => __('Both Sidebar','royal-shop'),
        'no-sidebar' => __('No Sidebar','royal-shop'),
        'disable-left-sidebar'  => __('Right Sidebar','royal-shop'),
        'disable-right-sidebar' => __('Left Sidebar','royal-shop'),
        ),
    ));

/****************/
//doc link
/****************/
$wp_customize->add_setting('royal_shop_sticky_sidebar_learn_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_sticky_sidebar_learn_more',
            array(
        'section'    => 'royal-shop-section-sidebar-group',
        'type'      => 'doc-link',
        'url'       => 'https://wpzita.com/docs/sidebar-setting/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));
/*********************/
// Move To Top
/********************/
 $wp_customize->add_setting( 'royal_shop_move_to_top', array(
    'default'           => false,
    'sanitize_callback' => 'royal_shop_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new royal_shop_Toggle_Control( $wp_customize, 'royal_shop_move_to_top', array(
    'label'       => esc_html__( 'Enable', 'royal-shop' ),
    'section'     => 'royal-shop-move-to-top',
    'type'        => 'toggle',
    'settings'    => 'royal_shop_move_to_top',
  ) ) );

  // BG color
 $wp_customize->add_setting('royal_shop_move_to_top_bg_clr', array(
        'default'           => '#141415',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new royal_shop_Customizer_Color_Control($wp_customize,'royal_shop_move_to_top_bg_clr', array(
        'label'      => __('Background Color', 'royal-shop' ),
        'section'    => 'royal-shop-move-to-top',
        'settings'   => 'royal_shop_move_to_top_bg_clr',
    ) ) 
 );  

$wp_customize->add_setting('royal_shop_move_to_top_icon_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'royal_shop_move_to_top_icon_clr', array(
        'label'      => __('Icon Color', 'royal-shop' ),
        'section'    => 'royal-shop-move-to-top',
        'settings'   => 'royal_shop_move_to_top_icon_clr',
    ) ) 
 );

// shop pages
$wp_customize->add_setting('royal_shop_sidebar_shp_pge_option', array(
        'default'        => 'internal-sidebar',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
$wp_customize->add_control( 'royal_shop_sidebar_shp_pge_option', array(
        'settings' => 'royal_shop_sidebar_shp_pge_option',
        'label'    => __('Shop Page & Product Category Page','royal-shop-pro'),
        'section'  => 'royal-shop-section-sidebar-group',
        'type'     => 'select',
        'choices'    => array(
        'internal-sidebar' => __('Same as Internal Pages','royal-shop-pro'),
        'active-sidebar' => __('Active Both Sidebar','royal-shop-pro'),
        'no-sidebar' => __('No Sidebar','royal-shop-pro'),
        'disable-left-sidebar'  => __('Disable Left Sidebar','royal-shop-pro'),
        'disable-right-sidebar' => __('Disable Right Sidebar','royal-shop-pro'),
        ),
    ));

/****************/
//doc link
/****************/
$wp_customize->add_setting('royal_shop_movetotop_learn_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_movetotop_learn_more',
            array(
        'section'    => 'royal-shop-move-to-top',
        'type'      => 'doc-link',
        'url'       => 'https://wpzita.com/docs/back-to-top/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));