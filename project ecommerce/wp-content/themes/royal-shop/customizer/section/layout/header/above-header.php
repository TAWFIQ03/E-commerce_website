<?php
/**
 * Header Options for  Royal Shop Theme.
 * @package      Royal Shop
 * @author      ThemeHunk
 * @copyright   Copyright (c) 2021,  Royal Shop
 * @since       Royal Shop 1.0.0
 */
//above header
$wp_customize->add_setting( 'royal_shop_above_mobile_disable', array(
                'default'               => true,
                'sanitize_callback'     => 'royal_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'royal_shop_above_mobile_disable', array(
                'label'                 => esc_html__('Disable in mobile', 'royal-shop'),
                'type'                  => 'checkbox',
                'section'               => 'royal-shop-above-header',
                'settings'              => 'royal_shop_above_mobile_disable',
                'priority'   => 1,
            ) ) );
// choose col layout
if(class_exists('Royal_Shop_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'royal_shop_above_header_layout', array(
                'default'           => 'abv-two',
                'sanitize_callback' => 'royal_shop_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Royal_Shop_WP_Customize_Control_Radio_Image(
                $wp_customize, 'royal_shop_above_header_layout', array(
                    'label'    => esc_html__( 'Layout', 'royal-shop' ),
                    'section'  => 'royal-shop-above-header',
                    'choices'  => array(
                       'abv-none'   => array(
                            'url' => ROYAL_SHOP_TOP_HEADER_LAYOUT_NONE,
                        ),
                        'abv-one'   => array(
                            'url' => ROYAL_SHOP_TOP_HEADER_LAYOUT_1,
                        ),
                        'abv-two' => array(
                            'url' => ROYAL_SHOP_TOP_HEADER_LAYOUT_2,
                        ),
                        'abv-three' => array(
                            'url' => ROYAL_SHOP_TOP_HEADER_LAYOUT_3,
                        ),
                    ),
                )
            )
        );
    } 
// col1
$wp_customize->add_setting('royal_shop_above_header_col1_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
$wp_customize->add_control( 'royal_shop_above_header_col1_set', array(
        'settings' => 'royal_shop_above_header_col1_set',
        'label'   => __('Column 1','royal-shop'),
        'section' => 'royal-shop-above-header',
        'type'    => 'select',
        'choices'    => array(
        'none'       => __('None','royal-shop'),
        'text'       => __('Text','royal-shop'),
        'menu'       => __('Menu','royal-shop'),
        'widget'     => __('Widget','royal-shop'),
        'social'     => __('Social Media','royal-shop'),
        'callto'     => __('Call To','royal-shop'),
            
        ),
    ));
// col1-text/html
$wp_customize->add_setting('royal_shop_col1_texthtml', array(
        'default'           => __('Add your content here','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('royal_shop_col1_texthtml', array(
        'label'    => __('Text', 'royal-shop'),
        'section'  => 'royal-shop-above-header',
        'settings' => 'royal_shop_col1_texthtml',
         'type'    => 'textarea',
    ));
// col1 widget redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_col1_widget_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_col1_widget_redirect', array(
                    'section'      => 'royal-shop-above-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'royal-shop' ),
                    'button_class' => 'focus-customizer-widget-redirect-col1',  
                )
            )
        );
} 
// col1 menu redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_col1_menu_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_col1_menu_redirect', array(
                    'section'      => 'royal-shop-above-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'royal-shop' ),
                    'button_class' => 'focus-customizer-menu-redirect-col1',  
                )
            )
        );
} 
// col1 social media redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_col1_social_media_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_col1_social_media_redirect', array(
                    'section'      => 'royal-shop-above-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'royal-shop' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col1',  
                )
            )
        );
} 
// /*****************/
// // Call-to
// /*****************/
$wp_customize->add_setting('royal_shop_col1_above_hdr_calto_txt', array(
        'default' => __('Call To','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'royal_shop_col1_above_hdr_calto_txt', array(
        'label'    => __('Call To Text', 'royal-shop'),
        'section'  => 'royal-shop-above-header',
         'type'    => 'text',
));

$wp_customize->add_setting('royal_shop_col1_above_hdr_calto_nub', array(
        'default' => __('','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'royal_shop_col1_above_hdr_calto_nub', array(
        'label'    => __('Call To Number', 'royal-shop'),
        'section'  => 'royal-shop-above-header',
         'type'    => 'text',
));
// col2
$wp_customize->add_setting('royal_shop_above_header_col2_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
$wp_customize->add_control( 'royal_shop_above_header_col2_set', array(
        'settings' => 'royal_shop_above_header_col2_set',
        'label'   => __('Column 2','royal-shop'),
        'section' => 'royal-shop-above-header',
        'type'    => 'select',
        'choices'    => array(
        'none'                 => __('None','royal-shop'),
        'text'             => __('Text','royal-shop'),
        'menu'                 => __('Menu','royal-shop'),
        'widget'                 => __('Widget','royal-shop'),
        'social'             => __('Social Media','royal-shop'),
        'callto'     => __('Call To','royal-shop'),
            
        ),
    ));
// col2-text/html
$wp_customize->add_setting('royal_shop_col2_texthtml', array(
        'default'           => __('Add your content here','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('royal_shop_col2_texthtml', array(
        'label'    => __('Text', 'royal-shop'),
        'section'  => 'royal-shop-above-header',
        'settings' => 'royal_shop_col2_texthtml',
         'type'    => 'textarea',
    ));
// col2 menu redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_col2_menu_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_col2_menu_redirect', array(
                    'section'      => 'royal-shop-above-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'royal-shop' ),
                    'button_class' => 'focus-customizer-menu-redirect-col2',  
                )
            )
        );
} 
// col2 widget redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_col2_widget_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_col2_widget_redirect', array(
                    'section'      => 'royal-shop-above-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'royal-shop' ),
                    'button_class' => 'focus-customizer-widget-redirect-col2',  
                )
            )
        );
}    
// col2 social media redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_col2_social_media_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_col2_social_media_redirect', array(
                    'section'      => 'royal-shop-above-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'royal-shop' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col2',  
                )
            )
        );
} 
// /*****************/
// // Call-to
// /*****************/
$wp_customize->add_setting('royal_shop_col2_above_hdr_calto_txt', array(
        'default' => __('Call To','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'royal_shop_col2_above_hdr_calto_txt', array(
        'label'    => __('Call To Text', 'royal-shop'),
        'section'  => 'royal-shop-above-header',
         'type'    => 'text',
));

$wp_customize->add_setting('royal_shop_col2_above_hdr_calto_nub', array(
        'default' => __('','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'royal_shop_col2_above_hdr_calto_nub', array(
        'label'    => __('Call To Number', 'royal-shop'),
        'section'  => 'royal-shop-above-header',
         'type'    => 'text',
));
// col3
$wp_customize->add_setting('royal_shop_above_header_col3_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
$wp_customize->add_control( 'royal_shop_above_header_col3_set', array(
        'settings' => 'royal_shop_above_header_col3_set',
        'label'   => __('Column 3','royal-shop'),
        'section' => 'royal-shop-above-header',
        'type'    => 'select',
        'choices'    => array(
        'none'                 => __('None','royal-shop'),
        'text'             => __('Text','royal-shop'),
        'menu'                 => __('Menu','royal-shop'),
        'widget'                 => __('Widget','royal-shop'),
        'social'             => __('Social Media','royal-shop'),
        'callto'     => __('Call To','royal-shop'),
            
        ),
    ));

// col3-text/html
$wp_customize->add_setting('royal_shop_col3_texthtml', array(
        'default'           => __('Add your content here','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('royal_shop_col3_texthtml', array(
        'label'    => __('Text', 'royal-shop'),
        'section'  => 'royal-shop-above-header',
        'settings' => 'royal_shop_col3_texthtml',
         'type'    => 'textarea',
    ));
// col3 social media redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_col3_social_media_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_col3_social_media_redirect', array(
                    'section'      => 'royal-shop-above-header',
                    'button_text'  => esc_html__( 'Go To Social Media', 'royal-shop' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col3',  
                )
            )
        );
} 
// col3 menu redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_col3_menu_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_col3_menu_redirect', array(
                    'section'      => 'royal-shop-above-header',
                    'button_text'  => esc_html__( 'Go To Menu', 'royal-shop' ),
                    'button_class' => 'focus-customizer-menu-redirect-col3',  
                )
            )
        );
}
// col3 widget redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_col3_widget_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     ));
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_col3_widget_redirect', array(
                    'section'      => 'royal-shop-above-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'royal-shop' ),
                    'button_class' => 'focus-customizer-widget-redirect-col3',  
                )
            )
        );
}
// /*****************/
// // Call-to
// /*****************/
$wp_customize->add_setting('royal_shop_col3_above_hdr_calto_txt', array(
        'default' => __('Call To','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'royal_shop_col3_above_hdr_calto_txt', array(
        'label'    => __('Call To Text', 'royal-shop'),
        'section'  => 'royal-shop-above-header',
         'type'    => 'text',
));

$wp_customize->add_setting('royal_shop_col3_above_hdr_calto_nub', array(
        'default' => __('','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'royal_shop_col3_above_hdr_calto_nub', array(
        'label'    => __('Call To Number', 'royal-shop'),
        'section'  => 'royal-shop-above-header',
         'type'    => 'text',
));
/****************************/
// common option
/****************************/
if ( class_exists( 'royal_shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting('royal_shop_abv_hdr_hgt', array(
        'sanitize_callback' => 'royal_shop_sanitize_range_value',
        'default'           => '35',
        'transport'         => 'postMessage',
            ));
$wp_customize->add_control(
            new royal_shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'royal_shop_abv_hdr_hgt', array(
                    'label'       => esc_html__( 'Height', 'royal-shop' ),
                    'section'     => 'royal-shop-above-header',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 20,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
);

$wp_customize->add_setting('royal_shop_abv_hdr_botm_brd', array(
        'sanitize_callback' => 'royal_shop_sanitize_range_value',
        'default'           => '0',
        'transport'         => 'postMessage',
            ));
$wp_customize->add_control(
            new royal_shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'royal_shop_abv_hdr_botm_brd', array(
                    'label'       => esc_html__( 'Bottom Border', 'royal-shop' ),
                    'section'     => 'royal-shop-above-header',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 200,
                        'step' => 1,
                    ),
                    'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
}
// border-color
$wp_customize->add_setting('royal_shop_above_brdr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'royal_shop_sanitize_color'
    ));
$wp_customize->add_control( 
    new  royal_shop_Customizer_Color_Control($wp_customize,'royal_shop_above_brdr_clr', array(
        'label'      => __('Border Color', 'royal-shop' ),
        'section'    => 'royal-shop-above-header',
        'settings'   => 'royal_shop_above_brdr_clr',
    ) ) );  

/****************/
//doc link
/****************/
$wp_customize->add_setting('royal_shop_abv_header_doc_learn_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_abv_header_doc_learn_more',
            array(
        'section'    => 'royal-shop-above-header',
        'type'      => 'doc-link',
        'url'       => 'https://wpzita.com/docs/top-header-setting/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));