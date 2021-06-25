<?php 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function royal_shop_customize_register( $wp_customize ){
//Registered panel and section
require ROYAL_SHOP_THEME_DIR . 'customizer/register-panels-and-sections.php';	
//site identity
require ROYAL_SHOP_THEME_DIR . 'customizer/section/layout/header/set-identity.php';
require ROYAL_SHOP_THEME_DIR . 'customizer/section/layout/header/header.php';	
//Header
require ROYAL_SHOP_THEME_DIR . 'customizer/section/layout/header/above-header.php';	
require ROYAL_SHOP_THEME_DIR . 'customizer/section/layout/header/main-header.php';
require ROYAL_SHOP_THEME_DIR . 'customizer/section/layout/header/loader.php';
//Footer
require ROYAL_SHOP_THEME_DIR . 'customizer/section/layout/footer/above-footer.php';
require ROYAL_SHOP_THEME_DIR . 'customizer/section/layout/footer/widget-footer.php';
require ROYAL_SHOP_THEME_DIR . 'customizer/section/layout/footer/bottom-footer.php';
//section ordering
require ROYAL_SHOP_THEME_DIR . 'customizer/section-ordering.php';
//social Icon
require ROYAL_SHOP_THEME_DIR . 'customizer/section/layout/social-icon/social-icon.php';
//Blog
require ROYAL_SHOP_THEME_DIR . 'customizer/section/layout/blog/blog.php';
//Color Option
require ROYAL_SHOP_THEME_DIR . 'customizer/section/color/global-color.php';
//woo-product
require ROYAL_SHOP_THEME_DIR . 'customizer/section/woo/product.php';
require ROYAL_SHOP_THEME_DIR . 'customizer/section/woo/single-product.php';
require ROYAL_SHOP_THEME_DIR . 'customizer/section/woo/cart.php';
require ROYAL_SHOP_THEME_DIR . 'customizer/section/woo/shop.php';
// scroller
if ( class_exists('Royal_Shop_Customize_Control_Scroll')){
      $scroller = new Royal_Shop_Customize_Control_Scroll();
  }
}
add_action('customize_register','royal_shop_customize_register');
function royal_shop_is_json( $string ){
    return is_string( $string ) && is_array( json_decode( $string, true ) ) ? true : false;
}