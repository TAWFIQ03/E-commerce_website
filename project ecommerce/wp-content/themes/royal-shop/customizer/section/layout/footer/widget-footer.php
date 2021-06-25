<?php

/******************/
//Widegt footer
/******************/
if(class_exists('Royal_Shop_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'royal_shop_bottom_footer_widget_layout', array(
               'default'           => 'ft-wgt-none',
               'sanitize_callback' => 'royal_shop_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Royal_Shop_WP_Customize_Control_Radio_Image(
                $wp_customize, 'royal_shop_bottom_footer_widget_layout', array(
                    'label'    => esc_html__( 'Layout','royal-shop'),
                    'section'  => 'royal-shop-widget-footer',
                    'choices'  => array(
                       'ft-wgt-none'   => array(
                            'url' => ROYAL_SHOP_FOOTER_WIDGET_LAYOUT_NONE,
                        ),
                       'ft-wgt-four' => array(
                            'url' => ROYAL_SHOP_FOOTER_WIDGET_LAYOUT_4,
                        ),
                        'ft-wgt-one'   => array(
                            'url' => ROYAL_SHOP_FOOTER_WIDGET_LAYOUT_1,
                        ),
                        'ft-wgt-two' => array(
                            'url' => ROYAL_SHOP_FOOTER_WIDGET_LAYOUT_2,
                        ),
                        'ft-wgt-three' => array(
                            'url' => ROYAL_SHOP_FOOTER_WIDGET_LAYOUT_3,
                        ),
                        'ft-wgt-five' => array(
                            'url' => ROYAL_SHOP_FOOTER_WIDGET_LAYOUT_5,
                        ),
                        'ft-wgt-six' => array(
                            'url' => ROYAL_SHOP_FOOTER_WIDGET_LAYOUT_6,
                        ),
                        'ft-wgt-seven' => array(
                            'url' => ROYAL_SHOP_FOOTER_WIDGET_LAYOUT_7,
                        ),
                        'ft-wgt-eight' => array(
                            'url' => ROYAL_SHOP_FOOTER_WIDGET_LAYOUT_8,
                        ),
                    ),
                )
            )
        );
    } 
/******************************/
/* Widget Redirect
/****************************/
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_bottom_footer_widget_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_bottom_footer_widget_redirect', array(
                    'section'      => 'royal-shop-widget-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'royal-shop' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                )
            )
        );
} 
/****************/
//doc link
/****************/
$wp_customize->add_setting('royal_shop_ftr_wdgt_learn_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_ftr_wdgt_learn_more',
            array(
        'section'    => 'royal-shop-widget-footer',
        'type'      => 'doc-link',
        'url'       => 'https://wpzita.com/docs/main-footer-setting/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));