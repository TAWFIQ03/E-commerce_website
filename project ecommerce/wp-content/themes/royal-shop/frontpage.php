<?php 
/**
 * Template Name: Homepage Template
 *
 * @package ThemeHunk
 * @subpackage Royal Shop
 * @since 1.0.0
 */
get_header();
$royal_shop_sidebar_front_option = get_theme_mod('royal_shop_sidebar_front_option','active-sidebar');
?>
   <div id="content" class="front">
          <div class="content-wrap" >
            <div class="container">
              <?php get_template_part( 'front-page/front-customfive'); ?>
              <div class="main-area <?php echo esc_attr($royal_shop_sidebar_front_option);?>">
                <?php if($royal_shop_sidebar_front_option !=='no-sidebar' && $royal_shop_sidebar_front_option!=='disable-left-sidebar'){
                  get_sidebar('primary');
                }?>
                <div id="primary" class="primary-content-area">
                  <div class="primary-content-wrap">
                          <?php
                          if( shortcode_exists( 'royal-shop' ) ){
                             do_shortcode("[royal-shop section='royal_shop_show_frontpage']");
                          }
                        ?>
                  </div> <!-- end primary-content-wrap-->
                </div> <!-- end primary primary-content-area-->
                <?php if($royal_shop_sidebar_front_option !=='no-sidebar' && $royal_shop_sidebar_front_option!=='disable-right-sidebar'){
                  get_sidebar('secondary');}?>
              </div> <!-- end main-area -->     
            </div>
          </div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();