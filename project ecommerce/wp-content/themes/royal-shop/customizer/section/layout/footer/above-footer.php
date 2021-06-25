<?php

/******************/
//Above footer
/******************/
//choose col layout
if(class_exists('Royal_Shop_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'royal_shop_above_footer_layout', array(
                'default'           => 'ft-abv-none',
                'sanitize_callback' => 'royal_shop_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Royal_Shop_WP_Customize_Control_Radio_Image(
                $wp_customize, 'royal_shop_above_footer_layout', array(
                    'label'    => esc_html__('Layout','royal-shop'),
                    'section'  => 'royal-shop-above-footer',
                    'choices'  => array(
                        'ft-abv-none'   => array(
                            'url' => ROYAL_SHOP_TOP_HEADER_LAYOUT_NONE,
                        ),
                        'ft-abv-one'   => array(
                            'url' => ROYAL_SHOP_TOP_HEADER_LAYOUT_1,
                        ),
                        'ft-abv-two' => array(
                            'url' => ROYAL_SHOP_TOP_HEADER_LAYOUT_2,
                        ),
                        'ft-abv-three' => array(
                            'url' => ROYAL_SHOP_TOP_HEADER_LAYOUT_3,
                        ),
                    ),
                )
            )
        );
    } 
//********************************/
// col1-setting
//*******************************/
$wp_customize->add_setting('royal_shop_above_footer_col1_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
$wp_customize->add_control('royal_shop_above_footer_col1_set', array(
        'settings' => 'royal_shop_above_footer_col1_set',
        'label'    => __('Column 1','royal-shop'),
        'section'  => 'royal-shop-above-footer',
        'type'     => 'select',
        'choices'  => array(
        'none'             => __('None','royal-shop'),
        'text'             => __('Text','royal-shop'),
        'menu'             => __('Menu','royal-shop'),
        'widget'           => __('Widget','royal-shop'),
        'social'           => __('Social Media','royal-shop'),   
    ),
));
//col1-text/html
$wp_customize->add_setting('royal_shop_footer_col1_texthtml', array(
        'default'           => __('Add your content here','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('royal_shop_footer_col1_texthtml', array(
        'label'    => __('Text', 'royal-shop'),
        'section'  => 'royal-shop-above-footer',
        'settings' => 'royal_shop_footer_col1_texthtml',
         'type'    => 'textarea',
    ));
// col1 widget redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_footer_col1_widget_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize,'royal_shop_footer_col1_widget_redirect', array(
                    'section'      => 'royal-shop-above-footer',
                    'button_text'  => esc_html__('Go To Widget','royal-shop'),
                    'button_class' => 'focus-customizer-widget-redirect-col1',  
                )
            )
        );
} 
// col1 menu redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_footer_col1_menu_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize,'royal_shop_footer_col1_menu_redirect', array(
                    'section'      => 'royal-shop-above-footer',
                    'button_text'  => esc_html__('Go To Menu','royal-shop'),
                    'button_class' => 'focus-customizer-menu-redirect-col1',  
                )
            )
        );
} 
// col1 social media redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_footer_col1_social_media_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_footer_col1_social_media_redirect', array(
                    'section'      => 'royal-shop-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'royal-shop' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col1',  
                )
            )
        );
} 
/***************************************/
// col2
/***************************************/
$wp_customize->add_setting('royal_shop_above_footer_col2_set',array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
$wp_customize->add_control( 'royal_shop_above_footer_col2_set',array(
        'settings' => 'royal_shop_above_footer_col2_set',
        'label'   => __('Column 2','royal-shop'),
        'section' => 'royal-shop-above-footer',
        'type'    => 'select',
        'choices'    => array(
        'none'                 => __('None','royal-shop'),
        'text'             => __('Text','royal-shop'),
        'menu'                 => __('Menu','royal-shop'),
        'widget'                 => __('Widget','royal-shop'),
        'social'             => __('Social Media','royal-shop'),     
        ),
    ));
//col2-text/html
$wp_customize->add_setting('royal_shop_above_footer_col2_texthtml', array(
        'default'           => __('Add your content here','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_textarea', 
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control('royal_shop_above_footer_col2_texthtml', array(
        'label'    => __('Text', 'royal-shop'),
        'section'  => 'royal-shop-above-footer',
        'settings' => 'royal_shop_above_footer_col2_texthtml',
         'type'    => 'textarea',
    ));
// col2 widget redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_above_footer_col2_widget_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize,'royal_shop_above_footer_col2_widget_redirect', array(
                    'section'      => 'royal-shop-above-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'royal-shop' ),
                    'button_class' => 'focus-customizer-widget-redirect-col2',  
                )
            )
        );
}    
// col2 menu redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_above_footer_col2_menu_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize,'royal_shop_above_footer_col2_menu_redirect', array(
                    'section'      => 'royal-shop-above-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'royal-shop' ),
                    'button_class' => 'focus-customizer-menu-redirect-col2',  
                )
            )
        );
}    
// col2 social media redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_above_footer_col2_social_media_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_above_footer_col2_social_media_redirect', array(
                    'section'      => 'royal-shop-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'royal-shop' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col2',  
                )
            )
        );
} 
// col3
$wp_customize->add_setting('royal_shop_above_footer_col3_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_select',
    ));
$wp_customize->add_control('royal_shop_above_footer_col3_set', array(
        'settings' => 'royal_shop_above_footer_col3_set',
        'label'   => __('Column 3','royal-shop'),
        'section' => 'royal-shop-above-footer',
        'type'    => 'select',
        'choices' => array(
        'none'             => __('None','royal-shop'),
        'text'             => __('Text','royal-shop'),
        'menu'             => __('Menu','royal-shop'),
        'widget'           => __('Widget','royal-shop'),
        'social'           => __('Social Media','royal-shop'),   
        ),
    ));
//col3-text/html
$wp_customize->add_setting('royal_shop_above_footer_col3_texthtml', array(
        'default'           => __('Add your content here','royal-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_textarea', 
        'transport'         => 'postMessage', 
    ));
$wp_customize->add_control('royal_shop_above_footer_col3_texthtml', array(
        'label'    => __('Text', 'royal-shop'),
        'section'  => 'royal-shop-above-footer',
        'settings' => 'royal_shop_above_footer_col3_texthtml',
        'type'    => 'textarea',
    ));
// col3 social media redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_above_footer_col3_social_media_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize, 'royal_shop_above_footer_col3_social_media_redirect', array(
                    'section'      => 'royal-shop-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'royal-shop' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col3',  
                )
            )
        );
} 
// col3 widget redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_above_footer_col3_widget_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize,'royal_shop_above_footer_col3_widget_redirect', array(
                    'section'      => 'royal-shop-above-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'royal-shop' ),
                    'button_class' => 'focus-customizer-widget-redirect-col3',  
                )
            )
        );
}
// col3 menu redirection
if (class_exists('royal_shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'royal_shop_above_footer_col3_menu_redirect', array(
            'sanitize_callback' => 'royal_shop_sanitize_text',
     )
);
$wp_customize->add_control(
            new royal_shop_Widegt_Redirect(
                $wp_customize,'royal_shop_above_footer_col3_menu_redirect', array(
                    'section'      => 'royal-shop-above-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'royal-shop' ),
                    'button_class' => 'focus-customizer-menu-redirect-col3',  
                )
            )
        );
}
/****************************/
// common option
/****************************/
if ( class_exists( 'royal_shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'royal_shop_above_ftr_hgt', array(
                'sanitize_callback' => 'royal_shop_sanitize_range_value',
                'default'           => '30',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new royal_shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'royal_shop_above_ftr_hgt', array(
                    'label'       => esc_html__( 'Height', 'royal-shop' ),
                    'section'     => 'royal-shop-above-footer',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 30,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                     'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
}
// above bottom-border
if ( class_exists( 'royal_shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'royal_shop_abv_ftr_botm_brd', array(
                'sanitize_callback' => 'royal_shop_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new royal_shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'royal_shop_abv_ftr_botm_brd', array(
                    'label'       => esc_html__( 'Bottom Border', 'royal-shop' ),
                    'section'     => 'royal-shop-above-footer',
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

// above top-border
if ( class_exists( 'royal_shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'royal_shop_abv_ftr_top_brd', array(
                'sanitize_callback' => 'royal_shop_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new royal_shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'royal_shop_abv_ftr_top_brd', array(
                    'label'       => esc_html__( 'Top Border', 'royal-shop' ),
                    'section'     => 'royal-shop-above-footer',
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
 $wp_customize->add_setting('royal_shop_above_frt_brdr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new royal_shop_Customizer_Color_Control($wp_customize,'royal_shop_above_frt_brdr_clr', array(
        'label'      => __('Bottom Border Color', 'royal-shop' ),
        'section'    => 'royal-shop-above-footer',
        'settings'   => 'royal_shop_above_frt_brdr_clr',
    ) ) 
 );  

// border-color
 $wp_customize->add_setting('royal_shop_above_frt_top_brdr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'royal_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new royal_shop_Customizer_Color_Control($wp_customize,'royal_shop_above_frt_top_brdr_clr', array(
        'label'      => __('Top Border Color', 'royal-shop' ),
        'section'    => 'royal-shop-above-footer',
        'settings'   => 'royal_shop_above_frt_top_brdr_clr',
    ) ) 
 );  

/****************/
//doc link
/****************/
$wp_customize->add_setting('royal_shop_abv_ftr_learn_more', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_abv_ftr_learn_more',
            array(
        'section'    => 'royal-shop-above-footer',
        'type'      => 'doc-link',
        'url'       => 'https://wpzita.com/docs/top-footer-setting/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));