<?php
// main header
// choose col layout
if(class_exists('Royal_Shop_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'royal_shop_main_header_layout', array(
                'default'           => 'mhdrfive',
                'sanitize_callback' => 'royal_shop_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Royal_Shop_WP_Customize_Control_Radio_Image(
                $wp_customize, 'royal_shop_main_header_layout', array(
                    'label'    => esc_html__( 'Header Layout', 'royal-shop' ),
                    'section'  => 'royal-shop-main-header',
                    'choices'  => array(
                        'mhdrfive' => array(
                            'url' => ROYAL_SHOP_MAIN_HEADER_LAYOUT_FOUR,
                        ),
                        'mhdrone' => array(
                            'url' => ROYAL_SHOP_MAIN_HEADER_LAYOUT_ONE,
                        ),
                        'mhdrtwo' => array(
                            'url' => ROYAL_SHOP_MAIN_HEADER_LAYOUT_TWO,
                        ),
                        'mhdrthree' => array(
                            'url' => ROYAL_SHOP_MAIN_HEADER_LAYOUT_THREE,
                        ),
                                     
                    ),
                )
            )
        );
} 
/***********************************/  
// menu alignment
/***********************************/ 
$wp_customize->add_setting('royal_shop_menu_alignment', array(
                'default'               => 'left',
                'sanitize_callback'     => 'royal_shop_sanitize_select',
            ) );
$wp_customize->add_control( new royal_shop_Customizer_Buttonset_Control( $wp_customize, 'royal_shop_menu_alignment', array(
                'label'                 => esc_html__( 'Menu Alignment', 'royal-shop' ),
                'section'               => 'royal-shop-main-header',
                'settings'              => 'royal_shop_menu_alignment',
                'choices'               => array(
                    'left'              => esc_html__( 'Left', 'royal-shop' ),
                    'center'        => esc_html__( 'center', 'royal-shop' ),
                    'right'             => esc_html__( 'Right', 'royal-shop' ),
                ),
        ) ) );
//Main menu option
/***********************************/  
// menu alignment
/***********************************/ 
$wp_customize->add_setting('royal_shop_mobile_menu_open', array(
                'default'               => 'left',
                'sanitize_callback'     => 'royal_shop_sanitize_select',
            ) );
$wp_customize->add_control( new royal_shop_Customizer_Buttonset_Control( $wp_customize, 'royal_shop_mobile_menu_open', array(
                'label'                 => esc_html__( 'Mobile Menu', 'royal-shop' ),
                'section'               => 'royal-shop-main-header',
                'settings'              => 'royal_shop_mobile_menu_open',
                'choices'               => array(
                    'left'              => esc_html__( 'Left', 'royal-shop' ),
                    'right'             => esc_html__( 'Right', 'royal-shop' ),
                ),
        ) ) );


  $wp_customize->add_setting( 'royal_shop_header_shadow', array(
    'default'           => true,
    'sanitize_callback' => 'royal_shop_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new royal_shop_Toggle_Control( $wp_customize, 'royal_shop_header_shadow', array(
    'label'       => esc_html__( 'Enable Header Shadow', 'royal-shop' ),
    'section'     => 'royal-shop-main-header',
    'type'        => 'toggle',
    'settings'    => 'royal_shop_header_shadow',
  ) ) );

/***********************************/  
// Sticky Header
/***********************************/ 
  $wp_customize->add_setting( 'royal_shop_sticky_header', array(
    'default'           => false,
    'sanitize_callback' => 'royal_shop_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new royal_shop_Toggle_Control( $wp_customize, 'royal_shop_sticky_header', array(
    'label'       => esc_html__( 'On / Off Sticky Header', 'royal-shop' ),
    'section'     => 'royal-shop-main-header',
    'type'        => 'toggle',
    'settings'    => 'royal_shop_sticky_header',
  ) ) );

  $wp_customize->add_setting('royal_shop_sticky_header_effect', array(
        'default'        => 'scrldwmn',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
$wp_customize->add_control( 'royal_shop_sticky_header_effect', array(
        'settings' => 'royal_shop_sticky_header_effect',
        'label'    => __('Sticky Header Effect','royal-shop'),
        'section'  => 'royal-shop-main-header',
        'type'     => 'select',
        'choices'    => array(
        'scrltop'     => __('Effect One','royal-shop'),
        'scrldwmn'    => __('Effect Two (PRO)','royal-shop'),
        ),
    ));
/******************/
// Disable in Mobile
/******************/
$wp_customize->add_setting( 'royal_shop_whislist_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'royal_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'royal_shop_whislist_mobile_disable', array(
                'label'                 => esc_html__('Check to disable wishlist icon in mobile device', 'royal-shop'),
                'type'                  => 'checkbox',
                'section'               => 'royal-shop-main-header',
                'settings'              => 'royal_shop_whislist_mobile_disable',
                'priority'   => 10,
            ) ) );

$wp_customize->add_setting( 'royal_shop_account_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'royal_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'royal_shop_account_mobile_disable', array(
                'label'                 => esc_html__('Check to disable account icon in mobile device', 'royal-shop'),
                'type'                  => 'checkbox',
                'section'               => 'royal-shop-main-header',
                'settings'              => 'royal_shop_account_mobile_disable',
                'priority'   => 12,
            ) ) );

$wp_customize->add_setting( 'royal_shop_cart_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'royal_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'royal_shop_cart_mobile_disable', array(
                'label'                 => esc_html__('Check to disable cart icon in mobile device', 'royal-shop'),
                'type'                  => 'checkbox',
                'section'               => 'royal-shop-main-header',
                'settings'              => 'royal_shop_cart_mobile_disable',
                'priority'   => 13,
            ) ) );
// exclude header category
function royal_shop_get_category_id($arr='',$all=true){
    $cats = array();
    foreach ( get_categories($arr) as $categories => $category ){
       
        $cats[$category->term_id] = $category->name;
     }
     return $cats;
  }

/****************/
//doc link
/****************/
$wp_customize->add_setting('royal_shop_main_header_doc_learn_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_main_header_doc_learn_more',
            array(
        'section'    => 'royal-shop-main-header',
        'type'      => 'doc-link',
        'url'       => 'https://wpzita.com/docs/main-header-setting/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));