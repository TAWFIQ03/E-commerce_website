<?php 
/**
 * Footer Function for Royal Shop theme.
 * 
 * @package     Royal Shop
 * @author      Royal Shop
 * @copyright   Copyright (c) 2020, Royal Shop
 * @since       Royal Shop 1.0.0
 */
/**************************************/
//Top footer function
/**************************************/
if ( ! function_exists( 'royal_shop_top_footer_markup' ) ){  
function royal_shop_top_footer_markup(){ ?>  
<?php 
$royal_shop_above_footer_layout    = get_theme_mod( 'royal_shop_above_footer_layout','ft-abv-none');
$royal_shop_above_footer_col1_set  = get_theme_mod( 'royal_shop_above_footer_col1_set','text');
$royal_shop_above_footer_col2_set  = get_theme_mod( 'royal_shop_above_footer_col2_set','text');
$royal_shop_above_footer_col3_set  = get_theme_mod( 'royal_shop_above_footer_col3_set','text');
?>  
<div class="top-footer">
      <div class="container">
          <?php if($royal_shop_above_footer_layout=='ft-abv-one'):?>  
             <div class="top-footer-bar thnk-col-1">
                 <div class="top-footer-col1">
                  <?php royal_shop_top_footer_conetnt_col1($royal_shop_above_footer_col1_set); ?>
                 </div>
                 </div>
                 <?php elseif($royal_shop_above_footer_layout=='ft-abv-two'):?>
                 <div class="top-footer-bar thnk-col-2">
                 <div class="top-footer-col1">
                  <?php royal_shop_top_footer_conetnt_col1($royal_shop_above_footer_col1_set); ?>
                 </div> 
                  <div class="top-footer-col2">
                    <?php royal_shop_top_footer_conetnt_col2($royal_shop_above_footer_col2_set); ?>
                    </div></div>

                  <?php elseif($royal_shop_above_footer_layout=='ft-abv-three'):?>
                    <div class="top-footer-bar thnk-col-3">
                    <div class="top-footer-col1">
                  <?php royal_shop_top_footer_conetnt_col1($royal_shop_above_footer_col1_set); ?>
                    </div>  
                  <div class="top-footer-col2"><?php royal_shop_top_footer_conetnt_col2($royal_shop_above_footer_col2_set); ?></div>
                  <div class="top-footer-col3"><?php royal_shop_top_footer_conetnt_col3($royal_shop_above_footer_col3_set); ?></div>
                 </div>
             <?php endif;?> 
         <!-- end top-footer-bar -->
      </div>
 </div> 
<?php }
}
add_action( 'royal_shop_top_footer', 'royal_shop_top_footer_markup' );
/**************************************/
//Widgett footer function
/**************************************/
if ( ! function_exists( 'royal_shop_widget_footer_markup' ) ){  
function royal_shop_widget_footer_markup(){ 
$royal_shop_bottom_footer_widget_layout  = get_theme_mod( 'royal_shop_bottom_footer_widget_layout','ft-wgt-none');  
  ?>  
        <div class="widget-footer">
      <div class="container">
                <?php if($royal_shop_bottom_footer_widget_layout =='ft-wgt-one'):?>
        <div class="widget-footer-wrap thnk-col-1">
          <div class="widget-footer-col1">
            <?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?>
                      </div>
        </div>
          <?php elseif($royal_shop_bottom_footer_widget_layout =='ft-wgt-two'): ?>
          
                   <div class="widget-footer-wrap thnk-col-2">
                <div class="widget-footer-col1"><?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
                 <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
           </div>
                  <?php elseif($royal_shop_bottom_footer_widget_layout =='ft-wgt-three'): ?>

                     <div class="widget-footer-wrap thnk-col-3">
                <div class="widget-footer-col1">

                  <?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
                 <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
                  <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{ ?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?>
                               </a>
                          <?php }?>


                       </div>
           </div>
            <?php elseif($royal_shop_bottom_footer_widget_layout =='ft-wgt-four'): ?>
               <div class="widget-footer-wrap thnk-col-4">
                <div class="widget-footer-col1">

                  <?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
                 <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
                  <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{ ?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?>
                               </a>
                          <?php }?>

                          
                       </div>
                   <div class="widget-footer-col4"><?php if( is_active_sidebar('footer-4' ) ){
                                       dynamic_sidebar('footer-4' );
                             }else{ ?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?>
                               </a>
                          <?php }?>

                          
                       </div>
            </div>

           <?php elseif($royal_shop_bottom_footer_widget_layout =='ft-wgt-five'): ?> 
            <div class="widget-footer-wrap thnk-col-3-1-2 ">
                <div class="widget-footer-col1">

                  <?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
                 <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
                  <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{ ?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?>
                               </a>
                          <?php }?>


                       </div>
                  </div>
              <?php elseif($royal_shop_bottom_footer_widget_layout =='ft-wgt-six'): ?> 
            <div class="widget-footer-wrap thnk-col-3-2-1-2">
                <div class="widget-footer-col1">

                  <?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
                 <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
                  <div class="widget-footer-col3"><?php if( is_active_sidebar('footer-3' ) ){
                                       dynamic_sidebar('footer-3' );
                             }else{ ?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?>
                               </a>
                          <?php }?>


                       </div>
                  </div>  
            <?php elseif($royal_shop_bottom_footer_widget_layout =='ft-wgt-seven'): ?> 
            <div class="widget-footer-wrap thnk-col-2-1-2">
              <div class="widget-footer-col1"><?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
                 <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
              </div> 
              <?php elseif($royal_shop_bottom_footer_widget_layout =='ft-wgt-eight'): ?> 
            <div class="widget-footer-wrap thnk-col-2-2-1">
                <div class="widget-footer-col1"><?php if( is_active_sidebar('footer-1' ) ){
                                       dynamic_sidebar('footer-1' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
                 <div class="widget-footer-col2"><?php if( is_active_sidebar('footer-2' ) ){
                                       dynamic_sidebar('footer-2' );
                             }else{?>
                           <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
                          <?php }?></div>
              </div>
           <?php endif;?>
        
      </div>
    </div>  
<?php }
}
add_action( 'royal_shop_widget_footer', 'royal_shop_widget_footer_markup' );
/**************************************/
//Below footer function
/**************************************/
if ( ! function_exists( 'royal_shop_below_footer_markup' ) ){  
function royal_shop_below_footer_markup(){ ?>  
<?php 
$royal_shop_bottom_footer_layout  = get_theme_mod( 'royal_shop_bottom_footer_layout','ft-btm-one');
$royal_shop_bottom_footer_col1_set= get_theme_mod( 'royal_shop_bottom_footer_col1_set','text');
$royal_shop_bottom_footer_col2_set= get_theme_mod( 'royal_shop_bottom_footer_col2_set','text');
$royal_shop_bottom_footer_col3_set= get_theme_mod( 'royal_shop_bottom_footer_col3_set','text');
?>    
<div class="below-footer">
      <div class="container">
         <?php if($royal_shop_bottom_footer_layout=='ft-btm-one'):?>  
        <div class="below-footer-bar thnk-col-1">
          <div class="below-footer-col1"> 
            <?php royal_shop_bottom_footer_conetnt_col1($royal_shop_bottom_footer_col1_set); ?>
            </div>
                </div>
                 <?php elseif($royal_shop_bottom_footer_layout=='ft-btm-two'):?>
                  <div class="below-footer-bar thnk-col-2">
                    <div class="below-footer-col1"> <?php royal_shop_bottom_footer_conetnt_col1($royal_shop_bottom_footer_col1_set); ?></div>
          <div class="below-footer-col2"> <?php royal_shop_bottom_footer_conetnt_col2($royal_shop_bottom_footer_col2_set); ?></div>
        </div>
        <?php elseif($royal_shop_bottom_footer_layout=='ft-btm-three'):?>
        <div class="below-footer-bar thnk-col-3">
                    <div class="below-footer-col1"> <?php royal_shop_bottom_footer_conetnt_col1($royal_shop_bottom_footer_col1_set); ?></div>
          <div class="below-footer-col2"> <?php royal_shop_bottom_footer_conetnt_col2($royal_shop_bottom_footer_col2_set); ?></div>
          <div class="below-footer-col3"> <?php royal_shop_bottom_footer_conetnt_col3($royal_shop_bottom_footer_col3_set); ?></div>
        </div>
      <?php endif; ?>
        
      </div>
    </div>  
<?php }
}
add_action( 'royal_shop_below_footer', 'royal_shop_below_footer_markup' );
/**********************/
// footer function
/************************/
//************************************/
// Footer top col1 function
//************************************/
if ( ! function_exists( 'royal_shop_top_footer_conetnt_col1' ) ){ 
function royal_shop_top_footer_conetnt_col1($content){ ?>
<?php if($content=='text'){?>
<div class="content-html">
<?php echo esc_html(get_theme_mod('royal_shop_footer_col1_texthtml',  __( 'Add your content here', 'royal-shop' )));?>
</div>
<?php }
elseif($content=='menu'){
  if ( has_nav_menu('royal-shop-footer-menu' ) ){?>
<?php 
  royal_shop_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'royal-shop' );?></a>
 <?php }
}elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-top-first' ) ){
    dynamic_sidebar('footer-top-first' );
     }else{?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
     <?php }?>
 </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo royal_shop_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// Footer top col2 function
//************************************/
if ( ! function_exists( 'royal_shop_top_footer_conetnt_col2' ) ){ 
function royal_shop_top_footer_conetnt_col2($content){ ?>
<?php if($content=='text'){?>
<div class="content-html">
  <?php echo esc_html(get_theme_mod('royal_shop_above_footer_col2_texthtml',  __( 'Add your content here', 'royal-shop' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('royal-shop-footer-menu' ) ){?>
<?php 
  royal_shop_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'royal-shop' );?></a>
 <?php }
}elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-top-second' ) ){
    dynamic_sidebar('footer-top-second' );
     }else{?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo royal_shop_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// Footer top col3 function
//************************************/
if ( ! function_exists( 'royal_shop_top_footer_conetnt_col3' ) ){ 
function royal_shop_top_footer_conetnt_col3($content){?>
<?php if($content=='text'){?>
<div class="content-html">
<?php echo esc_html(get_theme_mod('royal_shop_above_footer_col3_texthtml',  __( 'Add your content here', 'royal-shop' )));;?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('royal-shop-footer-menu' ) ){ ?>
<?php 
  royal_shop_footer_nav_menu();
 } else { ?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'royal-shop' );?></a>
<?php }
}elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-top-third' ) ){
    dynamic_sidebar('footer-top-third' );
     }else{?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo royal_shop_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// Footer bottom col1 function
//************************************/
if ( ! function_exists( 'royal_shop_bottom_footer_conetnt_col1' ) ){ 
function royal_shop_bottom_footer_conetnt_col1($content){ ?>
<?php if($content=='text'){?>
<div class="content-html">
  <?php echo esc_html(get_theme_mod('royal_shop_footer_bottom_col1_texthtml','Copyright | Royal Shop | Developed by WpZita'));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('royal-shop-footer-menu' ) ) {?>
<?php 
  royal_shop_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'royal-shop' );?></a>
 <?php }
}
elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-below-first' ) ){
    dynamic_sidebar('footer-below-first' );
     } else { ?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
     <?php }?>
     </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo royal_shop_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// Footer bottom col2 function
//************************************/
if ( ! function_exists( 'royal_shop_bottom_footer_conetnt_col2' ) ){ 
function royal_shop_bottom_footer_conetnt_col2($content){ ?>
<?php if($content=='text'){?>
<div class="content-html">
  <?php echo esc_html(get_theme_mod('royal_shop_bottom_footer_col2_texthtml','Add your content here'));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('royal-shop-footer-menu' ) ) {?>
<?php 
  royal_shop_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'royal-shop' );?></a>
 <?php }
}
elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-below-second')){
    dynamic_sidebar('footer-below-second');
          }else{ ?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
        <?php } ?>
  </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo royal_shop_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}
//************************************/
// Footer bottom col3 function
//************************************/
if ( ! function_exists( 'royal_shop_bottom_footer_conetnt_col3' ) ){ 
function royal_shop_bottom_footer_conetnt_col3($content){ ?>
<?php if($content=='text'){?>
<div class="content-html">
  <?php echo esc_html(get_theme_mod('royal_shop_bottom_footer_col3_texthtml',  __( 'Add your content here', 'royal-shop' )));?>
</div>
<?php }elseif($content=='menu'){
  if ( has_nav_menu('royal-shop-footer-menu' ) ) {?>
<?php 
  royal_shop_footer_nav_menu();
 }else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign footer menu', 'royal-shop' );?></a>
 <?php }
}
elseif($content=='widget'){?>
  <div class="content-widget">
    <?php if( is_active_sidebar('footer-below-third')){
    dynamic_sidebar('footer-below-third');
          }else{ ?>
      <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'royal-shop' );?></a>
        <?php } ?>
  </div>
<?php }elseif($content=='social'){?>
<div class="content-social">
<?php echo royal_shop_social_links();?>
</div>
<?php }elseif($content=='none'){
return false;
}?>
<?php }
}