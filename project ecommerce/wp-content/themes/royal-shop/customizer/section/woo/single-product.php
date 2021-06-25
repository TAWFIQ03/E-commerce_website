<?php
/**
 * Register WooCommerce Single Product Page
 */

if ( ! class_exists( 'WooCommerce' ) ){
    return;
}

/******************************/
// Up Sell Product
/******************************/
if(class_exists('Heading')){
$wp_customize->add_setting('royal_shop_upsell_product_collapse', array(
        'default'           => '',
        'sanitize_callback' => 'royal_shop_sanitize_text',  
                )
            );
$wp_customize->add_control(
            new Heading(
                $wp_customize, 'royal_shop_upsell_product_collapse', array(
                    'label'            => esc_html__( 'Up Sell Product', 'royal-shop' ),
                    'section'          => 'royal-shop-woo-single-product',
                    'class'            => 'royal_shop_upsell_product_collapse',
                    'accordion'        => true,
                    'expanded'         => false,
                    'controls_to_wrap' => 3,
                )
            )
        );
}
// display upsell
$wp_customize->add_setting('royal_shop_upsell_product_display', array(
                'default'               => true,
                'sanitize_callback'     => 'royal_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'royal_shop_upsell_product_display', array(
                'label'         => __('Display up sell product', 'royal-shop'),
                'type'          => 'checkbox',
                'section'       => 'royal-shop-woo-single-product',
                'settings'      => 'royal_shop_upsell_product_display',
            ) ) );
// up sell product column
if ( class_exists( 'royal_shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'royal_shop_upsale_num_col_shw', array(
                'sanitize_callback' => 'royal_shop_sanitize_range_value',
                'default' => '4',  
            )
        );
$wp_customize->add_control(
            new royal_shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'royal_shop_upsale_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'royal-shop' ),
                    'section'     => 'royal-shop-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
            'royal_shop_upsale_num_product_shw', array(
                'sanitize_callback' => 'royal_shop_sanitize_range_value',
                'default' => '4',        
            )
        );
$wp_customize->add_control(
            new royal_shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'royal_shop_upsale_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'royal-shop' ),
                    'section'     => 'royal-shop-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    
                )
        )
);
}
/******************************/
// Related Product
/******************************/
if(class_exists('Heading')){
$wp_customize->add_setting('royal_shop_related_product_collapse', array(
        'default'           => '',
        'sanitize_callback' => 'royal_shop_sanitize_text',  
                )
            );
$wp_customize->add_control(
            new Heading(
                $wp_customize, 'royal_shop_related_product_collapse', array(
                    'label'            => esc_html__( 'Related Product', 'royal-shop' ),
                    'section'          => 'royal-shop-woo-single-product',
                    'class'            => 'royal_shop_related_product_collapse',
                    'accordion'        => true,
                    'expanded'         => false,
                    'controls_to_wrap' => 3,
                )
            )
        );
}

// display upsell
$wp_customize->add_setting('royal_shop_related_product_display', array(
                'default'               => true,
                'sanitize_callback'     => 'royal_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'royal_shop_related_product_display', array(
                'label'         => __('Display Related product', 'royal-shop'),
                'type'          => 'checkbox',
                'section'       => 'royal-shop-woo-single-product',
                'settings'      => 'royal_shop_related_product_display',
            ) ) );
// up sell product column
if ( class_exists( 'royal_shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'royal_shop_related_num_col_shw', array(
                'sanitize_callback' => 'royal_shop_sanitize_range_value',
                'default' => '4',
                
                
            )
        );
$wp_customize->add_control(
            new royal_shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'royal_shop_related_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'royal-shop' ),
                    'section'     => 'royal-shop-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
            'royal_shop_related_num_product_shw', array(
                'sanitize_callback' => 'royal_shop_sanitize_range_value',
                'default' => '4',
                
                
            )
        );
$wp_customize->add_control(
            new royal_shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'royal_shop_related_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'royal-shop' ),
                    'section'     => 'royal-shop-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    
                )
        )
);
}
/****************/
// doc link
/****************/
$wp_customize->add_setting('royal_shop_single_product_link_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_single_product_link_more',
            array(
        'section'     => 'royal-shop-woo-single-product',
        'type'        => 'doc-link',
        'url'         => 'https://wpzita.com/docs/single-product-setting/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));