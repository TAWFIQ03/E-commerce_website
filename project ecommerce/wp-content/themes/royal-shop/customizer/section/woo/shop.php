<?php 
/************************/
//Shop product pagination
/************************/
   $wp_customize->add_setting('royal_shop_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
    $wp_customize->add_control('royal_shop_pagination', array(
        'settings' => 'royal_shop_pagination',
        'label'   => __('Shop Page Pagination','royal-shop'),
        'section' => 'royal-shop-woo-shop-page',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','royal-shop'),
        'click'   => __('Load More (PRO)','royal-shop'), 
        'scroll'  => __('Infinite Scroll (PRO)','royal-shop'), 
        )
    ));

  
$wp_customize->add_setting('royal_shop_pagination_loadmore_btn_text', array(
        'default'           => 'Load More',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_text',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('royal_shop_pagination_loadmore_btn_text', array(
        'label'    => __('Load More Text', 'royal-shop'),
        'section'  => 'royal-shop-woo-shop-page',
        'settings' => 'royal_shop_pagination_loadmore_btn_text',
         'type'    => 'text',
    ));

/****************/
// doc link
/****************/
$wp_customize->add_setting('royal_shop_shop_page_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_shop_page_more',
            array(
        'section'     => 'royal-shop-woo-shop-page',
        'type'        => 'doc-link',
        'url'         => 'https://wpzita.com/docs/shop-page-setting/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>  100,
    )));