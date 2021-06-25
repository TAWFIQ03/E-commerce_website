<?php 
/**
 * all file includeed
 *
 * @param  
 * @return mixed|string
 */
get_template_part( 'inc/admin-function');
get_template_part( 'inc/header-function');
get_template_part( 'inc/footer-function');
get_template_part( 'inc/blog-function');
//breadcrumbs
get_template_part( 'lib/breadcrumbs/breadcrumbs');

get_template_part('lib/theme-option/class-royal-shop-admin-settings');

//custom-style
get_template_part( 'inc/royal-shop-custom-style');

// customizer
get_template_part('customizer/extend-customizer/class-royal-shop-wp-customize-panel');
get_template_part('customizer/extend-customizer/class-royal-shop-wp-customize-section');
get_template_part('customizer/customizer-radio-image/class/class-royal-shop-customize-control-radio-image');
get_template_part('customizer/customizer-range-value/class/class-royal-shop-customizer-range-value-control');
get_template_part('customizer/customizer-scroll/class/class-royal-shop-customize-control-scroll');
get_template_part('customizer/color/class-control-color');
get_template_part('customizer/customize-buttonset/class-control-buttonset');
get_template_part('customizer/sortable/class-royal-shop-control-sortable');
get_template_part('customizer/background/class-royal-shop-background-image-control');
get_template_part('customizer/customizer-toggle/class-royal-shop-toggle-control');
get_template_part('customizer/heading/class-heading');

get_template_part('customizer/custom-customizer');
get_template_part('customizer/customizer-constant');
get_template_part('customizer/customizer');
/******************************/
// woocommerce
/******************************/
get_template_part( 'inc/woocommerce/woo-core');
get_template_part( 'inc/woocommerce/woo-function');
get_template_part('inc/woocommerce/woocommerce-ajax');
