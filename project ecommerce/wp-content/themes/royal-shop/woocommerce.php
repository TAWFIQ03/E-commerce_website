<?php
/**
 * The WooCommerce template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#woocommerce
 * @package ThemeHunk
 * @package Royal Shop
 * @since 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
get_header();
$shopsidebar = get_theme_mod('royal_shop_sidebar_shp_pge_option','internal-sidebar');
if((is_shop()||is_product_category()) && $shopsidebar!=='internal-sidebar'){
$royal_shop_pages_sidebar = $shopsidebar;
}
else{
$royal_shop_pages_sidebar = royal_shop_pages_sidebar();     
}
?>
        <div id="content" class="page-content">
            <div class="content-wrap" >
                <div class="container">
                    <div class="main-area  <?php echo esc_attr($royal_shop_pages_sidebar);?>">
                        <?php if($royal_shop_pages_sidebar !=='no-sidebar' && $royal_shop_pages_sidebar !=='disable-left-sidebar'){
                            get_sidebar('primary');
                        }?>
                        <div id="primary" class="primary-content-area">
                            <div class="primary-content-wrap">
                            <div class="page-head">
                            <?php royal_shop_get_page_title();?>
                            <?php royal_shop_breadcrumb_trail();?>
                            </div>
                            <?php woocommerce_content();?>  
                           </div> 
                        </div>
                        <?php if($royal_shop_pages_sidebar !=='no-sidebar' && $royal_shop_pages_sidebar !=='disable-right-sidebar'){
                            get_sidebar('secondary');
                        }?>
                    </div><!-- end main-area -->
                </div>
            </div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();?>