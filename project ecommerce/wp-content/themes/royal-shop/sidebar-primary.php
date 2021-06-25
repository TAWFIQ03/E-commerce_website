<?php
/**
 * Primary sidebar
 *
 * @package ThemeHunk
 * @package  Royal Shop
 * @since 1.0.0
 */
$royal_shop_main_header_layout = get_theme_mod('royal_shop_main_header_layout','mhdrfive');
?>
<div id="sidebar-primary" class="sidebar-content-area sidebar-1 <?php echo esc_attr(apply_filters( 'royal_shop_stick_sidebar_class',''));?>">
  <div class="sidebar-main">
    <?php 
    if ( class_exists( 'WooCommerce' ) && $royal_shop_main_header_layout != 'mhdrsix'){ ?>
            <div class="menu-category-list">
              <div class="toggle-cat-wrap">
                  <p class="cat-toggle">
                    <span class="cat-icon"> 
                      <span class="cat-top"></span>
                       <span class="cat-top"></span>
                       <span class="cat-bot"></span>
                     </span>
                    <span class="toggle-title"><?php _e('Categories','royal-shop');?></span>
                    <span class="toggle-icon"></span>
                  </p>
               </div>
              <?php royal_shop_product_list_categories(); ?>
             </div><!-- menu-category-list -->
           <?php }
            if(class_exists( 'WooCommerce' ) && is_shop()){
                  if ( is_active_sidebar('royal-shop-woo-shop-sidebar') ){
                           dynamic_sidebar('royal-shop-woo-shop-sidebar');
                    }
                  }
                  else{
                  if ( is_active_sidebar('sidebar-1') ){
                           dynamic_sidebar('sidebar-1');
                    }
                }
           ?>
  </div> <!-- sidebar-main End -->
</div> <!-- sidebar-primary End -->                 