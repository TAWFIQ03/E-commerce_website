<?php
//General Section
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
// product animation
$wp_customize->add_setting('royal_shop_woo_product_animation', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
$wp_customize->add_control( 'royal_shop_woo_product_animation', array(
        'settings'=> 'royal_shop_woo_product_animation',
        'label'   => __('Background Type','royal-shop'),
        'section' => 'royal-shop-woo-shop',
        'type'    => 'select',
        'choices'    => array(
        'none'            => __('None','royal-shop'),
        'zoom'            => __('Zoom','royal-shop'),
        'swap'            => __('Fade Swap (PRO)','royal-shop'),
        'slide'            => __('Slide Swap (PRO)','royal-shop'),         
        ),
    ));
/*******************/
//Quick view
/*******************/
$wp_customize->add_setting('royal_shop_woo_quickview_enable', array(
                'default'               => true,
                'sanitize_callback'     => 'royal_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'royal_shop_woo_quickview_enable', array(
                'label'         => esc_html__('Enable Quick View.', 'royal-shop'),
                'type'          => 'checkbox',
                'section'       => 'royal-shop-woo-shop',
                'settings'      => 'royal_shop_woo_quickview_enable',
            ) ) );

$wp_customize->add_setting('royal_shop_woo_sale_text', array(
        'default' => __('Sale!','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_text',
));
$wp_customize->add_control( 'royal_shop_woo_sale_text', array(
        'label'    => __('Sale Badge Text', 'royal-shop'),
        'section'  => 'royal-shop-woo-shop',
         'type'    => 'text',
));
/****************/
// doc link
/****************/
$wp_customize->add_setting('royal_shop_product_style_link_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_product_style_link_more',
            array(
        'section'     => 'royal-shop-woo-shop',
        'type'        => 'doc-link',
        'url'         => 'https://wpzita.com/docs/product-style/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));
