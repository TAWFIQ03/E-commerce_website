<?php 
/**
 * Header Function for Royal Shop theme.
 * 
 * @package     Royal Shop
 * @author      Royal Shop
 * @copyright   Copyright (c) 2021, Royal Shop
 * @since       Royal Shop 1.0.0
 */
/**************************************/
//Top Header function
/**************************************/
if ( ! function_exists( 'royal_shop_top_header_markup' ) ){	
function royal_shop_top_header_markup(){ 
$royal_shop_above_header_layout     = get_theme_mod( 'royal_shop_above_header_layout','abv-two');
$royal_shop_above_header_col1_set   = get_theme_mod( 'royal_shop_above_header_col1_set','text');
$royal_shop_above_header_col2_set   = get_theme_mod( 'royal_shop_above_header_col2_set','text');
$royal_shop_above_header_col3_set   = get_theme_mod( 'royal_shop_above_header_col3_set','text');
$royal_shop_menu_open = get_theme_mod('royal_shop_mobile_menu_open','left');
if($royal_shop_above_header_layout!=='abv-none'):?> 
<div class="top-header">
      <div class="container">
      	<?php if($royal_shop_above_header_layout=='abv-three'){?>
        <div class="top-header-bar thnk-col-3">
          <div class="top-header-col1"> 
          	<?php royal_shop_top_header_conetnt_col1($royal_shop_above_header_col1_set,$royal_shop_menu_open); ?>
          </div>
          <div class="top-header-col2">
          	<?php royal_shop_top_header_conetnt_col2($royal_shop_above_header_col2_set,$royal_shop_menu_open); ?>
          </div>
          <div class="top-header-col3">
          	<?php royal_shop_top_header_conetnt_col2($royal_shop_above_header_col3_set,$royal_shop_menu_open); ?>
          </div>
        </div> 
    <?php } ?>
    <?php if($royal_shop_above_header_layout=='abv-two'){?>
        <div class="top-header-bar thnk-col-2">
          <div class="top-header-col1"> 
          	<?php royal_shop_top_header_conetnt_col1($royal_shop_above_header_col1_set,$royal_shop_menu_open); ?>
          </div>
          <div class="top-header-col2">
          	<?php royal_shop_top_header_conetnt_col2($royal_shop_above_header_col2_set,$royal_shop_menu_open); ?>
          </div>
        </div> 
    <?php } ?>
    <?php if($royal_shop_above_header_layout=='abv-one'){
    	?>
        <div class="top-header-bar thnk-col-1">
          <div class="top-header-col1"> 
          	<?php royal_shop_top_header_conetnt_col1($royal_shop_above_header_col1_set,$royal_shop_menu_open); ?>
          </div>
        </div> 
    <?php } ?>
      <!-- end top-header-bar -->
   </div>
</div>
<?php endif;
   }
}
add_action( 'royal_shop_top_header', 'royal_shop_top_header_markup' );

//************************************/
// top header col1 function
//************************************/
if ( ! function_exists( 'royal_shop_top_header_conetnt_col1' ) ){ 
function royal_shop_top_header_conetnt_col1($content,$mobileopen){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('royal_shop_col1_texthtml',  __( 'Add your content here', 'royal-shop' )));?>
</div>
<?php }elseif($content=='menu'){
if ( has_nav_menu('royal-shop-above-menu' ) ){?>
<!-- Menu Toggle btn-->
     <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
              <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
            </button>
        </div>
        <div class="above royal-shop-menu-hide  <?php echo esc_attr($mobileopen);?>">
        <div class="sider-inner">
        <?php royal_shop_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
  }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'royal-shop' );?></a>
 <?php }
}elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col1' ) ){
    dynamic_sidebar('top-header-widget-col1' );
     }else{?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo royal_shop_social_links();?>
</div>
<?php }elseif($content=='callto'){?>
  <div class="header-support-wrap">
              <div class="header-support-icon">
                 <a class="callto-icon" href="tel:<?php echo esc_html(get_theme_mod('royal_shop_col1_above_hdr_calto_nub')); ?>">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </a>
              </div>
              <div class="header-support-content">
                <span class="sprt-tel"><span><?php echo esc_html(get_theme_mod('royal_shop_col1_above_hdr_calto_txt','Call To')); ?></span> <a href="tel:<?php echo esc_html(get_theme_mod('royal_shop_col1_above_hdr_calto_nub')); ?>"><?php echo esc_html(get_theme_mod('royal_shop_col1_above_hdr_calto_nub','')); ?></a></span>
              </div>
  </div>
<?php }elseif($content=='none'){
return true;
}?>
<?php }
}
//************************************/
// top header col2 function
//************************************/
if ( ! function_exists( 'royal_shop_top_header_conetnt_col2' ) ){ 
function royal_shop_top_header_conetnt_col2($content,$mobileopen){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('royal_shop_col2_texthtml',  __( 'Add your content here', 'royal-shop' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('royal-shop-above-menu' ) ){?>
<!-- Menu Toggle btn-->
        <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
                <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
            </button>
        </div>
        <div class="above royal-shop-menu-hide <?php echo esc_attr($mobileopen);?>">
        <div class="sider-inner">
        <?php royal_shop_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'royal-shop' );?></a>
 <?php }
}
elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col2' ) ){
    dynamic_sidebar('top-header-widget-col2' );
     }else{?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo royal_shop_social_links();?>
</div>
<?php }elseif($content=='callto'){?>
  <div class="header-support-wrap">
              <div class="header-support-icon">
                 <a class="callto-icon" href="tel:<?php echo esc_html(get_theme_mod('royal_shop_col2_above_hdr_calto_nub')); ?>">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </a>
              </div>
              <div class="header-support-content">
                <span class="sprt-tel"><span><?php echo esc_html(get_theme_mod('royal_shop_col2_above_hdr_calto_txt','Call To')); ?></span> <a href="tel:<?php echo esc_html(get_theme_mod('royal_shop_col2_above_hdr_calto_nub')); ?>"><?php echo esc_html(get_theme_mod('royal_shop_col2_above_hdr_calto_nub','')); ?></a></span>
                
              </div>
  </div>
<?php }elseif($content=='none'){
return true;
}?>
<?php }
}
//************************************/
// top header col3 function
//************************************/
if ( ! function_exists( 'royal_shop_top_header_conetnt_col3' ) ){ 
function royal_shop_top_header_conetnt_col3($content,$mobileopen){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('royal_shop_col3_texthtml',  __( 'Add your content here', 'royal-shop' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('royal-shop-above-menu' ) ){?>
<!-- Menu Toggle btn-->
        <nav> 
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-abv">
                <div class="btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </div>
            </button>
        </div>
        <div class="above royal-shop-menu-hide <?php echo esc_attr($mobileopen);?>">
        <div class="sider-inner">
        <?php royal_shop_abv_nav_menu();?>
        </div>
      </div>
    </nav>
<?php 
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'royal-shop' );?></a>
 <?php }
}
elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('top-header-widget-col2' ) ){
    dynamic_sidebar('top-header-widget-col2' );
     }else{?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo royal_shop_social_links();?>
</div>
<?php }elseif($content=='callto'){?>
  <div class="header-support-wrap">
              <div class="header-support-icon">
                 <a class="callto-icon" href="tel:<?php echo esc_html(get_theme_mod('royal_shop_col3_above_hdr_calto_nub')); ?>">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </a>
              </div>
              <div class="header-support-content">
                <span class="sprt-tel"><span><?php echo esc_html(get_theme_mod('royal_shop_col3_above_hdr_calto_txt','Call To')); ?></span> <a href="tel:<?php echo esc_html(get_theme_mod('royal_shop_col3_above_hdr_calto_nub','')); ?>"><?php echo esc_html(get_theme_mod('royal_shop_col3_above_hdr_calto_nub','')); ?></a></span>
                
              </div>
  </div>
<?php }elseif($content=='none'){
return true;
}?>
<?php }
}
/**************************************/
//Below Header function
/**************************************/
if ( ! function_exists( 'royal_shop_below_header_markup' ) ){	
function royal_shop_below_header_markup(){ 
$main_header_layout = get_theme_mod('royal_shop_main_header_layout','mhdrfive');
$main_header_opt = get_theme_mod('royal_shop_main_header_option','none');
$royal_shop_menu_alignment = get_theme_mod('royal_shop_menu_alignment','left');
$royal_shop_menu_open = get_theme_mod('royal_shop_mobile_menu_open','left');
?> 
<div class="below-header  <?php echo esc_attr($main_header_layout);?> <?php echo esc_attr($royal_shop_menu_alignment);?> <?php echo esc_attr($main_header_opt);?>">
			<div class="container">
				<div class="below-header-bar thnk-col-3">
          <?php if ($main_header_layout == 'mhdrfour') {?>
            <div class="below-header-col1">
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
            <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
                <span class="icon-text"><?php esc_html_e('Menu','royal-shop'); ?></span>
            </button>
        </div>
        <div class="main  royal-shop-menu-hide <?php echo esc_attr($royal_shop_menu_open);?>">
        <div class="sider-inner">
          <?php if(has_nav_menu('royal-shop-main-menu' )){ 

             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                   if(has_nav_menu('royal-shop-above-menu' )){
                                royal_shop_abv_nav_menu();
                       }
                  }  
                    royal_shop_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="royal-shop-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
    </div>

<?php if($main_header_opt!=='none'):?>
          <div class="below-header-col2">
             <?php 
             royal_shop_main_header_optn();?>
          </div>
<?php endif; 
  
          }
          elseif ($main_header_layout == 'mhdrfive') {
            
          }
          elseif ($main_header_layout == 'mhdrsix') { ?>
            <div class="below-header-col1">
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
            </div>
            <div class="below-header-col2">
              <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
               <span class="icon-text"><?php esc_html_e('Menu','royal-shop'); ?></span>
            </button>
        </div>
        <div class="main  royal-shop-menu-hide <?php echo esc_attr($royal_shop_menu_open);?>">
        <div class="sider-inner">
          <?php if(has_nav_menu('royal-shop-main-menu' )){ 

             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                   if(has_nav_menu('royal-shop-above-menu' )){
                                royal_shop_abv_nav_menu();
                       }
                  }  
                    royal_shop_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="royal-shop-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
            </div>
            
            <?php if($main_header_opt!=='none'):?>
          <div class="below-header-col3">
             <?php royal_shop_main_header_optn();?>
          </div>
<?php endif; 

            }
      elseif ($main_header_layout == 'mhdrseven') {?>
            <div class="below-header-col1">
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
            <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
               <span class="icon-text"><?php esc_html_e('Menu','royal-shop'); ?></span>
            </button>
        </div>
        <div class="main  royal-shop-menu-hide <?php echo esc_attr($royal_shop_menu_open);?>">
        <div class="sider-inner">
          <?php if(has_nav_menu('royal-shop-main-menu' )){ 

             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                   if(has_nav_menu('royal-shop-above-menu' )){
                                royal_shop_abv_nav_menu();
                       }
                  }  
                    royal_shop_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="royal-shop-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
    </div>

<?php if($main_header_opt!=='none'):?>
          <div class="below-header-col2">
             <?php 
             royal_shop_main_header_optn();?>
          </div>
<?php endif; 
            } ?>
			</div>
		</div> <!-- end below-header -->
<?php	}
}
add_action( 'royal_shop_below_header', 'royal_shop_below_header_markup' );
/**************************************/
//Main Header function
/**************************************/
if ( ! function_exists( 'royal_shop_main_header_markup' ) ){	
function royal_shop_main_header_markup(){ 
$main_header_layout = get_theme_mod('royal_shop_main_header_layout','mhdrfive');
$main_header_opt = get_theme_mod('royal_shop_main_header_option','none');
$royal_shop_menu_alignment = get_theme_mod('royal_shop_menu_alignment','left');
$offcanvas = '';
$royal_shop_menu_open = get_theme_mod('royal_shop_mobile_menu_open','left');
$is_pro = '';
$classes = get_body_class();
if (in_array('theme-royal-shop-pro',$classes)) {
    $is_pro = 1;
}
else{
    $is_pro = 0;
}
?>
<div class="main-header <?php echo esc_attr($main_header_layout);?> <?php echo esc_attr($main_header_opt);?> <?php echo esc_attr($royal_shop_menu_alignment);?>  <?php echo esc_attr($offcanvas);?>">

  <div class="wzta-search-wrapper">
        <div class="wzta-search-inner">
          <div class="container">
              <?php if ( class_exists( 'WooCommerce' ) ){
              royal_shop_product_search_box();
              } ?>
              <button class="wzta-search-close">&#10005;</button>
          </div>
      </div>
  </div>
  <div class="container">
   <div class="desktop-main-header">
				<div class="main-header-bar thnk-col-3">
          <?php  if ($main_header_layout == 'mhdrfive'){ ?>
          <div class="main-header-col1">
            <span class="logo-content">
            <?php royal_shop_logo();?> 
          </span>
          </div>

           <div class="main-header-col2">
              <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
                <span class="icon-text"><?php esc_html_e('Menu','royal-shop'); ?></span>
            </button>
        </div>
        <div class="main  royal-shop-menu-hide <?php echo esc_attr($royal_shop_menu_open);?>">
        <div class="sider-inner">
          <?php if(has_nav_menu('royal-shop-main-menu' )){ 

             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                   if(has_nav_menu('royal-shop-above-menu' )){
                                royal_shop_abv_nav_menu();
                       }
                  }  
                    royal_shop_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="royal-shop-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
          </div>

           <div class="main-header-col3">
            <div class="wzta-icon-market">
            <?php if(class_exists( 'WooCommerce' )){ royal_shop_header_icon_second(); 
            } ?> 
            <div class="cart-icon">
         <?php if(class_exists( 'WooCommerce' )){ 

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') == true){
           if(get_theme_mod('royal_shop_cart_mobile_disable') == false){ ?>
                      <div class="cart-icon" > 
                         <?php 
                         do_action( 'royal_shop_cart_count' );
                         do_action( 'royal_shop_woo_cart' ); 
                         ?>
                       </div>
                      <?php  } }
                      else{?>
                           <div class="cart-icon" > 
                            <?php 
                               do_action( 'royal_shop_cart_count' );
                               do_action( 'royal_shop_woo_cart' ); 
                               ?>
                          </div>
                     <?php  } } ?>
       </div>
          </div>
        
        </div>

        <?php } 
         elseif ($main_header_layout == 'mhdrone'){ ?>
          <div class="main-header-col1">
            <div class="wzta-icon-market">
            <?php if(class_exists( 'WooCommerce' )){  royal_shop_header_icon_second(); 
            } ?> 
            <div class="cart-icon">
         <?php if(class_exists( 'WooCommerce' )){ 

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') == true){
           if(get_theme_mod('royal_shop_cart_mobile_disable') == false){ ?>
                      <div class="cart-icon" > 
                         <?php 
                         do_action( 'royal_shop_cart_count' );
                         do_action( 'royal_shop_woo_cart' ); 
                         ?>
                       </div>
                      <?php  } }
                      else{?>
                           <div class="cart-icon" > 
                            <?php 
                               do_action( 'royal_shop_cart_count' );
                               do_action( 'royal_shop_woo_cart' ); 
                               ?>
                          </div>
                     <?php  } } ?>
       </div>
          </div>
          </div>

           <div class="main-header-col2">
            <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
                <span class="icon-text"><?php esc_html_e('Menu','royal-shop'); ?></span>
            </button>
        </div>
       <div class="main royal-shop-menu-hide <?php echo esc_attr($royal_shop_menu_open);?>">
        <div class="sider-inner">
          <?php if(has_nav_menu('royal-shop-main-menu' )){ 

             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                   if(has_nav_menu('royal-shop-above-menu' )){
                                royal_shop_abv_nav_menu();
                       }
                  }  
                    royal_shop_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="royal-shop-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
              
          </div>

           <div class="main-header-col3">
                <span class="logo-content">
                  <?php royal_shop_logo();?> 
                </span>
        </div>

        <?php } 
        elseif ($main_header_layout == 'mhdrtwo'){ ?>
          <div class="main-header-col1">
            <div class="wzta-icon-market">
            <?php if(class_exists( 'WooCommerce' )){  royal_shop_header_icon_second(); 
            } ?> 
            <div class="cart-icon">
         <?php if(class_exists( 'WooCommerce' )){ 

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') == true){
           if(get_theme_mod('royal_shop_cart_mobile_disable') == false){ ?>
                      <div class="cart-icon" > 
                         <?php 
                         do_action( 'royal_shop_cart_count' );
                         do_action( 'royal_shop_woo_cart' ); 
                         ?>
                       </div>
                      <?php  } }
                      else{?>
                           <div class="cart-icon" > 
                            <?php 
                               do_action( 'royal_shop_cart_count' );
                               do_action( 'royal_shop_woo_cart' ); 
                               ?>
                          </div>
                     <?php  } } ?>
       </div>
          </div>
          </div>

           <div class="main-header-col2">
              <span class="logo-content">
                  <?php royal_shop_logo();?> 
                </span>
              
          </div>

           <div class="main-header-col3">
              <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
                <span class="icon-text"><?php esc_html_e('Menu','royal-shop'); ?></span>
            </button>
        </div>
        <div class="main  royal-shop-menu-hide <?php echo esc_attr($royal_shop_menu_open);?>">
        <div class="sider-inner">
          <?php if(has_nav_menu('royal-shop-main-menu' )){ 

             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                   if(has_nav_menu('royal-shop-above-menu' )){
                                royal_shop_abv_nav_menu();
                       }
                  }  
                    royal_shop_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="royal-shop-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
        </div>

        <?php } 
        elseif ($main_header_layout == 'mhdrthree'){ ?>
          <div class="main-header-col1">
            <span class="logo-content">
                  <?php royal_shop_logo();?> 
                </span>
          </div>

           <div class="main-header-col2">
               <div class="wzta-icon-market">
            <?php if(class_exists( 'WooCommerce' )){  royal_shop_header_icon_second(); 
            } ?> 
            <div class="cart-icon">
         <?php if(class_exists( 'WooCommerce' )){ 

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') == true){
           if(get_theme_mod('royal_shop_cart_mobile_disable') == false){ ?>
                      <div class="cart-icon" > 
                         <?php 
                         do_action( 'royal_shop_cart_count' );
                         do_action( 'royal_shop_woo_cart' ); 
                         ?>
                       </div>
                      <?php  } }
                      else{?>
                           <div class="cart-icon" > 
                            <?php 
                               do_action( 'royal_shop_cart_count' );
                               do_action( 'royal_shop_woo_cart' ); 
                               ?>
                          </div>
                     <?php  } } ?>
       </div>
          </div>
              
          </div>

           <div class="main-header-col3">
              <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
                <span class="icon-text"><?php esc_html_e('Menu','royal-shop'); ?></span>
            </button>
        </div>
        <div class="main  royal-shop-menu-hide <?php echo esc_attr($royal_shop_menu_open);?>">
        <div class="sider-inner">
          <?php if(has_nav_menu('royal-shop-main-menu' )){ 

             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                   if(has_nav_menu('royal-shop-above-menu' )){
                                royal_shop_abv_nav_menu();
                       }
                  }  
                    royal_shop_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="royal-shop-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
        </div>

        <?php }?>

				</div> <!-- end main-header-bar -->
			

    </div> <!-- desktop bar -->

     <div class="responsive-main-header">
          <div class="main-header-bar thnk-col-3">
            <div class="main-header-col1">
            <span class="logo-content">
            <?php royal_shop_logo();?> 
          </span>
          </div>

           <div class="main-header-col2">
            <?php if ( class_exists( 'WooCommerce' ) ){
              royal_shop_product_search_box();
          } ?>
           </div>

           <div class="main-header-col3">
            <div class="wzta-icon-market">
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
            </button>
        </div>
            <?php if(class_exists( 'WooCommerce' )){   royal_shop_header_icon_second(); 
            } ?> 
            <div class="cart-icon">
         <?php if(class_exists( 'WooCommerce' )){ 
        if (wp_is_mobile() == true){
          if(get_theme_mod('royal_shop_cart_mobile_disable') == false){
                          
                      ?>
                      <div class="cart-icon" > 
                         <?php 
                         do_action( 'royal_shop_cart_count' );
                         do_action( 'royal_shop_woo_cart' ); 
                         ?>
                       </div>
                      <?php  } }
                      else{?>
                           <div class="cart-icon" > 
                            <?php 
                               do_action( 'royal_shop_cart_count' );
                               do_action( 'royal_shop_woo_cart' ); 
                               ?>
                          </div>
                     <?php  } } ?>
             </div>
          </div>
        </div>
            </div>
          </div> <!-- responsive-main-header END -->
		</div>
    </div> 
<?php	}
}
add_action( 'royal_shop_main_header', 'royal_shop_main_header_markup' );

function royal_shop_main_header_optn(){
          $royal_shop_main_header_option = get_theme_mod('royal_shop_main_header_option','none');
          if($royal_shop_main_header_option =='button'){?>
          <a href="<?php echo esc_url(get_theme_mod('royal_shop_main_hdr_btn_lnk','#')); ?>" class="btn-main-header"><?php echo esc_html(get_theme_mod('royal_shop_main_hdr_btn_txt','Button Text')); ?></a>
          <?php }
          elseif($royal_shop_main_header_option =='callto'){ ?>
          <div class="header-support-wrap">
              <div class="header-support-icon">
                 <a class="callto-icon" href="tel:<?php echo esc_html(get_theme_mod('royal_shop_main_hdr_calto_nub')); ?>">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </a>
              </div>
              <div class="header-support-content">
                <span class="sprt-tel"><span><?php echo esc_html(get_theme_mod('royal_shop_main_hdr_calto_txt','Call To')); ?></span> <a href="tel:<?php echo esc_html(get_theme_mod('royal_shop_main_hdr_calto_nub','')); ?>"><?php echo esc_html(get_theme_mod('royal_shop_main_hdr_calto_nub','')); ?></a></span>
              </div>
          </div>
          <?php }elseif($royal_shop_main_header_option =='widget'){?>
               <div class="header-widget-wrap">
                 <?php
                  if ( is_active_sidebar('main-header-widget') ){
                       dynamic_sidebar('main-header-widget');
                   }
                  ?>
               </div>
         <?php  }
}
/**************************************/
//logo & site title function
/**************************************/
if ( ! function_exists( 'royal_shop_logo' ) ){
function royal_shop_logo(){
$title_disable          = get_theme_mod( 'title_disable','enable');
$tagline_disable        = get_theme_mod( 'tagline_disable','enable');
$description            = get_bloginfo( 'description', 'display' );
royal_shop_custom_logo(); 
if($title_disable!='' || $tagline_disable!=''){
if($title_disable!=''){ 
?>
<div class="site-title"><span>
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
</span>
</div>
<?php
}
if($tagline_disable!=''){
if( $description || is_customize_preview() ):?>
<div class="site-description">
   <p><?php echo esc_html($description); ?></p>
</div>
<?php endif;
      }
    } 
  }
}
/***************************/
// Product search
/***************************/
function royal_shop_product_search_box(){ ?>             
<div id='search-box' class="wow thmkfadeInDown" data-wow-duration="1s">
<form action='<?php echo esc_url( home_url( '/'  ) ); ?>' id='search-form' class="woocommerce-product-search" method='get' target='_top'>
   <input id='search-text' name='s' placeholder='<?php echo esc_attr(get_theme_mod('search_box_text',esc_attr_x( 'Search for Product', 'placeholder', 'royal-shop' ))); ?>' class="form-control search-autocomplete" value='<?php echo get_search_query(); ?>' type='text' title='<?php echo esc_attr_x( 'Search for:', 'label', 'royal-shop' ); ?>' />
   <div class="vert-brd" ></div>
   <?php 
if ( class_exists( 'WooCommerce' ) ):
$args = array(
   'taxonomy' => 'product_cat',
   'name' => 'product_cat',
   'value_field' => 'slug',
   'class' => 'something',
   'show_option_all'   => __('All Category','royal-shop'),
);
wp_dropdown_categories( $args );
endif;
?>
                        <button id='search-button' value="<?php echo esc_attr_x( 'Submit','submit button', 'royal-shop' ); ?>" type='submit'>                     
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        <input type="hidden" name="post_type" value="product" />
                       </form>
 </div>                    
<?php }
/**********************************/
// header icon function (Header Layout 1)
/**********************************/
function royal_shop_header_icon(){
$whs_icon = get_theme_mod('royal_shop_whislist_mobile_disable',false);
$acc_icon = get_theme_mod('royal_shop_account_mobile_disable',false);
?>
<div class="header-icon">
     <?php 
    if( class_exists( 'YITH_WCWL' )){
      if (wp_is_mobile()) {
          if($whs_icon != true){ ?>
             <a class="whishlist" href="<?php echo esc_url( royal_shop_whishlist_url() ); ?>">
        <span class="wzta-whishlist-text"><?php echo __('My Favourite','royal-shop'); ?></span> <span><?php echo __('Wishlist','royal-shop'); ?></span><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
         <?php }
      }
      else{ ?>
        <a class="whishlist" href="<?php echo esc_url( royal_shop_whishlist_url() ); ?>">
          <span class="wzta-whishlist-text"><?php echo __('My Favourite','royal-shop'); ?></span>
          <span><?php echo __('Wishlist','royal-shop'); ?></span><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
    <?php  }
       }
       if (wp_is_mobile()) {
          if($acc_icon != true):
              royal_shop_account();
          endif;
       }else{
          royal_shop_account();
       } ?>
</div>
<?php } 

/**********************************/
// header icon function (Header Layout 2)
/**********************************/
function royal_shop_header_icon_second(){
$whs_icon = get_theme_mod('royal_shop_whislist_mobile_disable',false);
$acc_icon = get_theme_mod('royal_shop_account_mobile_disable',false);
?>
<div class="header-icon">
     <?php 

if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') == true){
        if($acc_icon == false){
          if ( is_user_logged_in() ) {
  echo $return = '<a class="account" href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><span>'.__('MY ACCOUNT','royal-shop').'</span></a>';
  } 
 else {
  echo $return = '<span><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><span>'.__('LOGIN / REGISTER','royal-shop').'</span></a></span>';
}
      }
       }else{
        if ( is_user_logged_in() ) {
  echo $return = '<a class="account" href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><span>'.__('MY ACCOUNT','royal-shop').'</span></a>';
  } 
 else {
  echo $return = '<span><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'"><span>'.__('LOGIN / REGISTER','royal-shop').'</span></a></span>';
}
       }

    if( class_exists( 'YITH_WCWL' ) && (! class_exists( 'WPCleverWoosw' ))){
      if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') == true){
      if($whs_icon == false){ 
        ?>
      <a class="whishlist" href="<?php echo esc_url( royal_shop_whishlist_url() ); ?>">
        <i  class="fa fa-heart-o" aria-hidden="true"></i></a>
      
     <?php } }
     else{?>
        <a class="whishlist" href="<?php echo esc_url( royal_shop_whishlist_url() ); ?>">
          <i  class="fa fa-heart-o" aria-hidden="true"></i></a>
    <?php  } }

    //WPC WISHLIST 
     if( class_exists( 'WPCleverWoosw' )){
      if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') == true 
        || strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') == true){
      if($whs_icon == false){ 
        ?>
      <a class="whishlist" href="<?php echo esc_url( WPcleverWoosw::get_url()); ?>">
        <i  class="fa fa-heart-o" aria-hidden="true"></i></a>
     <?php } }
     else{?>
        <a class="whishlist" href="<?php echo esc_url( WPcleverWoosw::get_url()); ?>">
        <i  class="fa fa-heart-o" aria-hidden="true"></i></a>
    <?php  } }

        ?>
            <a href="" class="wzta-search"><i class="fa fa-search"></i></a>
       
</div>
<?php } 
/**************************/
//PRELOADER
/**************************/
if( ! function_exists( 'royal_shop_preloader' ) ){
 function royal_shop_preloader(){
  $royal_shop_preloader_image_upload = get_theme_mod('royal_shop_preloader_image_upload','');
  $royal_shop_preloader_enable = get_theme_mod('royal_shop_preloader_enable',false);

 if (( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) ||
                isset( $_REQUEST['elementor-preview'] )){
      return;
 }elseif ($royal_shop_preloader_image_upload != '' && $royal_shop_preloader_enable==true){ ?>
    <div class="royal_shop_overlayloader">
    <div class="royal-shop-pre-loader"><img src="<?php echo esc_url($royal_shop_preloader_image_upload);?>"></div>
    </div> 
   <?php  }
   elseif ($royal_shop_preloader_enable==true){ ?>
    <div class="royal_shop_overlayloader">
    <div class="royal-shop-pre-loader">
    <div class="royal-shop-lds-ripple"><div></div><div></div></div>
  </div>
</div>
  <?php }
 }

}
add_action('royal_shop_site_preloader','royal_shop_preloader');

 /**********************/
 // Sticky Header
 /**********************/
 if( ! function_exists( 'royal_shop_sticky_header_markup' )){
 function royal_shop_sticky_header_markup(){ 
 $royal_shop_menu_open = get_theme_mod('royal_shop_mobile_menu_open','left'); ?>
<div class="sticky-header">
   <div class="container">
        <div class="sticky-header-bar thnk-col-3">
           <div class="sticky-header-col1">
               <span class="logo-content">
                  <?php royal_shop_logo();?> 
              </span>
           </div>
           <div class="sticky-header-col2">
             <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
            <button type="button" class="menu-btn" id="menu-btn-stk">
                <div class="btn">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </div>
            </button>
        </div>
        <div class="sider main  royal-shop-menu-hide  <?php echo esc_attr($royal_shop_menu_open); ?>">
        <div class="sider-inner">
          <?php if(has_nav_menu('royal-shop-sticky-menu' )){ 
             if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false 
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
                              || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false){
                    if(has_nav_menu('royal-shop-above-menu')){
                      royal_shop_abv_nav_menu();
                    }     
                  }  
                royal_shop_stick_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="royal-shop-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
        </div>
        </div>
        </nav>
           </div>
            <div class="sticky-header-col3">
              <div class="wzta-icon">
        
                <div class="header-icon">
                  <a class="prd-search" href="#"><i class="fa fa-search"></i></a>     
                     <?php 
                     if( class_exists( 'WPCleverWoosw' )){ ?>
                      <a class="whishlist" href="<?php echo esc_url( WPcleverWoosw::get_url()); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
                  <?php   }
                    if( class_exists( 'YITH_WCWL' ) && (! class_exists( 'WPCleverWoosw' ))){ ?>
                      <a class="whishlist" href="<?php echo esc_url( royal_shop_whishlist_url() ); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a>
                     <?php } 
                        royal_shop_account();
                       ?>
                </div>
             <?php if(class_exists( 'WooCommerce' )){ ?>
                      <div class="cart-icon" > 
                         <?php 
                         do_action( 'royal_shop_cart_count' );
                         do_action( 'royal_shop_woo_cart' ); 
                         ?>
                       </div>
                      <?php  } ?> 
                  </div>
           </div>
        </div>

   </div>
</div>
      <div class="search-wrapper">
                     <div class="container">
                      <div class="search-close"><a class="search-close-btn"></a></div>
                     <?php  if ( class_exists( 'WooCommerce' ) ){
                              royal_shop_product_search_box();
                          } ?>
                       </div>
       </div> 
 <?php }
}
if(get_theme_mod('royal_shop_sticky_header',false)==true):
add_action('royal_shop_sticky_header','royal_shop_sticky_header_markup');
endif;

/*****************/
/*mobile nav bar*/
/*****************/

function royal_shop_mobile_navbar(){?>
<div id="royal-shop-mobile-bar">
  <ul>
    <li><a class="gethome" href="<?php echo esc_url( get_home_url() ); ?>"><i class="icon below fa fa-home" aria-hidden="true"></i></a><span> <?php echo __('Home','royal-shop'); ?></span></li>
   <?php if( class_exists( 'YITH_WCWL' ) && (! class_exists( 'WPCleverWoosw' ))){ ?>
    <li><a class="whishlist" href="<?php echo esc_url( royal_shop_whishlist_url() ); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a><span> <?php echo __('Wishlist','royal-shop'); ?></span></li>
    <?php }
    if( class_exists( 'WPCleverWoosw' )){ ?>
      <li><a class="whishlist" href="<?php echo esc_url( WPcleverWoosw::get_url()); ?>"><i  class="fa fa-heart-o" aria-hidden="true"></i></a><span> <?php echo __('Wishlist','royal-shop'); ?></span></li>
   <?php } ?>
    <li>
            <a href="#" class="menu-btn" id="mob-menu-btn">
              
                <i class="fa fa-list-alt" aria-hidden="true"></i>              </a>
                <span> <?php echo __('Menu','royal-shop'); ?></span>
 
       </li>
    <li><?php royal_shop_account();?><span> <?php echo __('Account','royal-shop'); ?></span></li>
    <li><?php 
           do_action( 'royal_shop_cart_count' ); 
        ?> 
        <span> <?php echo __('Cart','royal-shop'); ?></span>
    </li>
    
  </ul>
</div>
<?php }
add_action( 'wp_footer', 'royal_shop_mobile_navbar' );

// mobile panel
function royal_shop_open_cart_mobile_panel(){
$royal_shop_mobile_menu_open = get_theme_mod('royal_shop_mobile_menu_open','left');
  ?>
      <div class="mobile-nav-bar sider main  royal-shop-menu-hide <?php echo esc_attr($royal_shop_mobile_menu_open); ?>">
        <div class="sider-inner">
          <div class="mobile-tab-wrap">
             <?php if (class_exists( 'WooCommerce' )) { ?>
            <div class="mobile-nav-tabs">
                <ul>
                  <li class="primary active" data-menu="primary">
                     <a href="#mobile-nav-tab-menu"><?php _e('Menu','royal-shop');?></a>
                  </li>
                  <li class="categories" data-menu="categories">
                    <a href="#mobile-nav-tab-category"><?php _e('Categories','royal-shop');?></a>
                  </li>
                </ul>
            </div>
          <?php } ?>
            <div id="mobile-nav-tab-menu" class="mobile-nav-tab-menu panel">
          <?php if(has_nav_menu('royal-shop-main-menu' )){ 
                    if(has_nav_menu('royal-shop-above-menu' )){
                         royal_shop_abv_nav_menu();
                       }
                        royal_shop_main_nav_menu();
              }else{
                 wp_page_menu(array( 
                 'items_wrap'  => '<ul class="royal-shop-menu" data-menu-style="horizontal">%3$s</ul>',
                 'link_before' => '<span>',
                 'link_after'  => '</span>'));
             }?>
           </div>
           <?php if (class_exists( 'WooCommerce' )) { ?>
           <div id="mobile-nav-tab-category" class="mobile-nav-tab-category panel">
             <?php royal_shop_product_list_categories_mobile(); ?>
           </div>
         <?php } ?>
          </div>
           <div class="mobile-nav-widget">
             <?php royal_shop_main_header_optn();?>
           </div>
        </div>
      </div>
<?php 
}
add_action( 'royal_shop_main_header', 'royal_shop_open_cart_mobile_panel' );