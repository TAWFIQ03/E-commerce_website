<?php
/**
 * Register customizer panels & sections.
 */
/*************************/
/*WordPress Default Panel*/
/*************************/
$royal_shop_shop_panel_default = new royal_shop_WP_Customize_Panel( $wp_customize,'royal-shop-panel-default', array(
    'priority' => 1,
    'title'    => __( 'WordPress Default', 'royal-shop' ),
  ));
$wp_customize->add_panel($royal_shop_shop_panel_default);

$wp_customize->add_setting('royal_shop_home_page_setup', array(
    'sanitize_callback' => 'royal_shop_sanitize_text',
    ));
$wp_customize->add_control(new royal_shop_Misc_Control( $wp_customize, 'royal_shop_home_page_setup',
            array(
        'section'    => 'static_front_page',
        'type'      => 'doc-link',
        'url'       => 'https://wpzita.com/docs/how-to-setup-homepage-in-royal-shop/',
        'description' => esc_html__( 'Feel difficulty, Explore our', 'royal-shop' ),
        'priority'   =>100,
    )));
/************************/
// Background option
/************************/
$royal_shop_shop_bg_option = new  royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-bg-option', array(
    'title' =>  __( 'Background', 'royal-shop' ),
    'panel' => 'royal-shop-panel-default',
    'priority' => 10,
  ));
$wp_customize->add_section($royal_shop_shop_bg_option);

/*************************/
/*Layout Panel*/
/*************************/
$wp_customize->add_panel( 'royal-shop-panel-layout', array(
				'priority' => 3,
				'title'    => __( 'Layout Settings', 'royal-shop' ),
) );

// Header
$royal_shop_section_header_group = new  royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-section-header-group', array(
    'title' =>  __( 'Header', 'royal-shop' ),
    'panel' => 'royal-shop-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section( $royal_shop_section_header_group );

// above-header
$royal_shop_above_header = new  royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-above-header', array(
    'title'    => __( 'Top Header', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-layout',
        'section'  => 'royal-shop-section-header-group',
        'priority' => 3,
  ));
$wp_customize->add_section( $royal_shop_above_header );
// main-header
$royal_shop_shop_main_header = new  royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-main-header', array(
    'title'    => __( 'Main Header', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-layout',
    'section'  => 'royal-shop-section-header-group',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_shop_main_header );
// exclude category
$royal_shop_exclde_cat_header = new  royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_exclde_cat_header', array(
    'title'    => __( 'Exclude Category', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-layout',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_exclde_cat_header );
//blog
$royal_shop_section_blog_group = new  royal_shop_WP_Customize_Section( $wp_customize,'royal-shop-section-blog-group', array(
    'title' =>  __( 'Post Page', 'royal-shop' ),
    'panel' => 'royal-shop-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section($royal_shop_section_blog_group);

$royal_shop_section_footer_group = new  royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-section-footer-group', array(
    'title' =>  __( 'Footer', 'royal-shop' ),
    'panel' => 'royal-shop-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section( $royal_shop_section_footer_group);
// sidebar
$royal_shop_section_sidebar_group = new  royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-section-sidebar-group', array(
    'title' =>  __( 'Sidebar', 'royal-shop' ),
    'panel' => 'royal-shop-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section($royal_shop_section_sidebar_group);
// Scroll to top
$royal_shop_move_to_top = new  royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-move-to-top', array(
    'title' =>  __( 'Back To Top', 'royal-shop' ),
    'panel' => 'royal-shop-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section($royal_shop_move_to_top);
//above-footer
$royal_shop_above_footer = new  royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-above-footer',array(
    'title'    => __( 'Top Footer','royal-shop' ),
    'panel'    => 'royal-shop-panel-layout',
        'section'  => 'royal-shop-section-footer-group',
        'priority' => 1,
));
$wp_customize->add_section( $royal_shop_above_footer);
//widget footer
$royal_shop_shop_widget_footer = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-widget-footer', array(
    'title'    => __('Main Footer','royal-shop'),
    'panel'    => 'royal-shop-panel-layout',
    'section'  => 'royal-shop-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $royal_shop_shop_widget_footer);
//Bottom footer
$royal_shop_shop_bottom_footer = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-bottom-footer', array(
    'title'    => __('Copyright','royal-shop'),
    'panel'    => 'royal-shop-panel-layout',
    'section'  => 'royal-shop-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $royal_shop_shop_bottom_footer);

/*************************/
/* Preloader */
/*************************/
$wp_customize->add_section( 'royal-shop-pre-loader' , array(
    'title'      => __('Preloader','royal-shop'),
    'priority'   => 30,
    'panel' => 'royal-shop-panel-layout',
) );
/*************************/
/* Social   Icon*/
/*************************/
$royal_shop_social_header = new royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-social-icon', array(
    'title'    => __( 'Social Icon', 'royal-shop' ),
    'priority' => 30,
    'panel' => 'royal-shop-panel-layout',
  ));
$wp_customize->add_section( $royal_shop_social_header );
/*************************/
/* Frontpage Panel */
/*************************/
$wp_customize->add_panel( 'royal-shop-panel-frontpage', array(
                'priority' => 5,
                'title'    => __( 'HomePage Sections', 'royal-shop' ),
) );

$royal_shop_top_slider_section = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_top_slider_section', array(
    'title'    => __( 'Main Slider', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_top_slider_section );

$royal_shop_category_tab_section = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_category_tab_section', array(
    'title'    => __( 'Filter Product Slider', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_category_tab_section );

$royal_shop_product_slide_section = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_product_slide_section', array(
    'title'    => __( 'Product Slider', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_product_slide_section );

$royal_shop_cat_slide_section = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_cat_slide_section', array(
    'title'    => __( 'Product Categories Section', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_cat_slide_section );

$royal_shop_product_slide_list = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_product_slide_list', array(
    'title'    => __( 'ListView Slider', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_product_slide_list );

$royal_shop_product_big_feature = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_product_big_feature', array(
    'title'    => __( 'Highlighted Product Filter', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_product_big_feature );
$royal_shop_product_cat_list = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_product_cat_list', array(
    'title'    => __( 'ListView With Filter', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_product_cat_list );
// ribbon
$royal_shop_ribbon = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_ribbon', array(
    'title'    => __( 'Call To Action', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_ribbon );

$royal_shop_banner = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_banner', array(
    'title'    => __( 'Ad Banner', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_banner );

$royal_shop_brand = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_brand', array(
    'title'    => __( 'Brands', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_brand );

$royal_shop_highlight = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_highlight', array(
    'title'    => __( 'Services', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_highlight );

$royal_shop_1_custom_sec = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_1_custom_sec', array(
    'title'    => __( 'First Blank Section', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_1_custom_sec );

$royal_shop_2_custom_sec = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_2_custom_sec', array(
    'title'    => __( 'Second Blank Section', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_2_custom_sec );

$royal_shop_3_custom_sec = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_3_custom_sec', array(
    'title'    => __( 'Third Blank Section', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_3_custom_sec );

$royal_shop_4_custom_sec = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_4_custom_sec', array(
    'title'    => __( 'Fourth Blank Section', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_4_custom_sec );

$royal_shop_5_custom_sec = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_5_custom_sec', array(
    'title'    => __( 'Top Blank Section', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_5_custom_sec );

$royal_shop_vt2_category_tab_section = new royal_shop_WP_Customize_Section( $wp_customize, 'royal_shop_vt2_category_tab_section', array(
    'title'    => __( 'Vertical Banner Tabbed Carousel', 'royal-shop' ),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $royal_shop_vt2_category_tab_section );

//section ordering
$royal_shop_section_order = new royal_shop_WP_Customize_Section($wp_customize,'royal-shop-section-order', array(
    'title'    => __('Section Ordering', 'royal-shop'),
    'panel'    => 'royal-shop-panel-frontpage',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_section_order);
/******************/
// Color Option
/******************/
$wp_customize->add_panel( 'royal-shop-panel-color-background', array(
        'priority' => 22,
        'title'    => __( 'Color & Background Settings', 'royal-shop' ),
    ) );
// Section gloab color and background
$wp_customize->add_section('royal-shop-gloabal-color', array(
    'title'    => __('Site Colors', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'priority' => 1,
));
//header
$royal_shop_header_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-header-color', array(
    'title'    => __('Header', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $royal_shop_header_color );

$royal_shop_abv_header_clr = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-abv-header-clr', array(
    'title'    => __('Above Header','royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-header-color',
    'priority' => 1,
));
$wp_customize->add_section( $royal_shop_abv_header_clr);

$royal_shop_main_header_clr = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-main-header-clr', array(
    'title'    => __('Main Header','royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-header-color',
    'priority' => 2,
));
$wp_customize->add_section( $royal_shop_main_header_clr);

$royal_shop_sticky_header_clr = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-sticky-header-clr', array(
    'title'    => __('Sticky Header','royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-header-color',
    'priority' => 2,
));
$wp_customize->add_section($royal_shop_sticky_header_clr);


$royal_shop_mobile_pan_clr = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-mobile-pan-clr', array(
    'title'    => __('Mobile','royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-header-color',
    'priority' => 2,
));
$wp_customize->add_section($royal_shop_mobile_pan_clr);

$royal_shop_canvas_pan_clr = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-canvas-pan-clr', array(
    'title'    => __('Off Canvas Sidebar','royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-header-color',
    'priority' => 2,
));
$wp_customize->add_section($royal_shop_canvas_pan_clr);

// header category
$royal_shop_main_header_cat_clr = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-main-header-cat-clr', array(
    'title'    => __('Category','royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-header-color',
    'priority' => 3,
));
$wp_customize->add_section($royal_shop_main_header_cat_clr);
/****************/
//Sidebar
/****************/
$royal_shop_sidebar_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-sidebar-color', array(
    'title'    => __('Primary Sidebar', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $royal_shop_sidebar_color );
/****************/
//Secondary Sidebar
/****************/
$royal_shop_secondary_sidebar_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-secondary-sidebar-color', array(
    'title'    => __('Secondary Sidebar', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $royal_shop_secondary_sidebar_color );
/****************/
//footer
/****************/
$royal_shop_footer_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-footer-color', array(
    'title'    => __('Footer', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $royal_shop_footer_color );

/****************/
//Woocommerce color
/****************/
$royal_shop_woo_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-woo-color', array(
    'title'    => __('Woocommerce', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'priority' => 4,
));
$wp_customize->add_section( $royal_shop_woo_color );

/*************************/
// Frontpage
/*************************/
$royal_shop_front_page_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-front-page-color', array(
    'title'    => __('Frontpage Sections', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'priority' => 4,
));
$wp_customize->add_section($royal_shop_front_page_color);

$royal_shop_top_slider_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-top-slider-color', array(
    'title'    => __('Main Slider', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 1,
));
$wp_customize->add_section($royal_shop_top_slider_color);

$royal_shop_cat_slider_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-cat-slider-color', array(
    'title'    => __('Product Categories Section', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 2,
));
$wp_customize->add_section($royal_shop_cat_slider_color);

$royal_shop_product_slider_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-product-slider-color', array(
    'title'    => __('Product Slider', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 3,
));
$wp_customize->add_section($royal_shop_product_slider_color);

$royal_shop_product_cat_slide_tab_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-product-cat-slide-tab-color', array(
    'title'    => __('Filter Product Slider', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 3,
));
$wp_customize->add_section($royal_shop_product_cat_slide_tab_color);

$royal_shop_product_list_slide_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-product-list-slide-color', array(
    'title'    => __('ListView Slider', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 4,
));
$wp_customize->add_section($royal_shop_product_list_slide_color);

$royal_shop_product_list_tab_slide_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-product-list-tab-slide-color', array(
    'title'    => __('ListView With Filter', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 5,
));
$wp_customize->add_section($royal_shop_product_list_tab_slide_color);

$royal_shop_banner_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-banner-color', array(
    'title'    => __('Ad Banner', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_banner_color);

$royal_shop_ribbon_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-ribbon-color', array(
    'title'    => __('Call To Action', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_ribbon_color);

$royal_shop_brand_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-brand-color', array(
    'title'    => __('Brands', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_brand_color);

$royal_shop_highlight_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-highlight-color', array(
    'title'    => __('Services', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_highlight_color);

$royal_shop_big_featured_color = new  royal_shop_WP_Customize_Section($wp_customize,'royal-shop-big-featured-color', array(
    'title'    => __('Highlighted Product Filter', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_big_featured_color);
/****************/
//custom section
/****************/
$royal_shop_custom_one_color = new royal_shop_WP_Customize_Section($wp_customize,'royal-shop-custom-one-color', array(
    'title'    => __('First Blank Section', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_custom_one_color);

$royal_shop_custom_two_color = new royal_shop_WP_Customize_Section($wp_customize,'royal-shop-custom-two-color', array(
    'title'    => __('Second Blank Section', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_custom_two_color);

$royal_shop_custom_three_color = new royal_shop_WP_Customize_Section($wp_customize,'royal-shop-custom-three-color', array(
    'title'    => __('Third Blank Section', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_custom_three_color);

$royal_shop_custom_four_color = new royal_shop_WP_Customize_Section($wp_customize,'royal-shop-custom-four-color', array(
    'title'    => __('Fourth Blank Section', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_custom_four_color);

$royal_shop_custom_five_color = new royal_shop_WP_Customize_Section($wp_customize,'royal-shop-custom-five-color', array(
    'title'    => __('Top Blank Section', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_custom_five_color);


$royal_shop_vt2_color = new royal_shop_WP_Customize_Section($wp_customize,'royal_shop_vt2_color', array(
    'title'    => __('Banner Tab Section', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'section'  => 'royal-shop-front-page-color',
    'priority' => 6,
));
$wp_customize->add_section($royal_shop_vt2_color);

/*********************/
// Page Content Color
/*********************/
$royal_shop_custom_page_content_color = new royal_shop_WP_Customize_Section($wp_customize,'royal-shop-page-content-color', array(
    'title'    => __('Content Color', 'royal-shop'),
    'panel'    => 'royal-shop-panel-color-background',
    'priority' => 2,
));
$wp_customize->add_section($royal_shop_custom_page_content_color);
/******************/
// Shop Page
/******************/
$royal_shop_woo_shop = new royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-woo-shop', array(
    'title'    => __( 'Product Style', 'royal-shop' ),
     'panel'    => 'woocommerce',
     'priority' => 2,
));
$wp_customize->add_section( $royal_shop_woo_shop );

$royal_shop_woo_single_product = new royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-woo-single-product', array(
    'title'    => __( 'Single Product', 'royal-shop' ),
     'panel'    => 'woocommerce',
     'priority' => 3,
));
$wp_customize->add_section($royal_shop_woo_single_product );

$royal_shop_woo_cart_page = new royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-woo-cart-page', array(
    'title'    => __( 'Cart Page', 'royal-shop' ),
     'panel'    => 'woocommerce',
     'priority' => 4,
));
$wp_customize->add_section($royal_shop_woo_cart_page);

$royal_shop_woo_shop_page = new royal_shop_WP_Customize_Section( $wp_customize, 'royal-shop-woo-shop-page', array(
    'title'    => __( 'Shop Page', 'royal-shop' ),
     'panel'    => 'woocommerce',
     'priority' => 4,
));
$wp_customize->add_section($royal_shop_woo_shop_page);

/*****************************/
// Template
/*****************************/
$wp_customize->add_panel('royal-shop-panel-inner-pagetemplate', array(
                'priority' => 4,
                'title'    => __('Inner Page Template ', 'royal-shop'),
));