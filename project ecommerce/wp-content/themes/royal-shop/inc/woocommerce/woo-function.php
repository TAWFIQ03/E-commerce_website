<?php 
/**
 * Perform all main WooCommerce configurations for this theme
 *
 * @package  Royal Shop WordPress theme
 */
// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ){
     return;
}

if ( ! function_exists( 'is_plugin_active' ) ){
         require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

/*******************************/
/** Sidebar Add Cart Product **/
/*******************************/
if ( ! function_exists( 'royal_shop_cart_total_item' ) ){
  /**
   * Cart Link
   * Displayed a link to the cart including the number of items present and the cart total
   */
 function royal_shop_cart_total_item(){
   global $woocommerce; 
   $product_no = WC()->cart->get_cart_contents_count();
  ?>
 <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','royal-shop' ); ?>"><i class="fa fa-shopping-bag"></i>
<?php if ($product_no > 0) { ?>
  <span class="cart-content"><?php echo sprintf ( _n( '<span class="count-item">%d</span>', '<span class="count-item">%d</span>', WC()->cart->get_cart_contents_count(),'royal-shop' ), WC()->cart->get_cart_contents_count() ); ?><?php echo WC()->cart->get_cart_total(); ?></span>
<?php }  ?>
</a>
  <?php }
}
//cart view function
function royal_shop_menu_cart_view($cart_view){
  global $woocommerce;
    $cart_view= royal_shop_cart_total_item();
    return $cart_view;
}
add_action( 'royal_shop_cart_count','royal_shop_menu_cart_view');

function royal_shop_woo_cart_product(){
global $woocommerce;
?>
<div class="cart-overlay"></div>
<div id="open-cart" class="open-cart"> 
  <div class="cart-widget-heading">
  <a class="cart-close-btn"><?php _e('close','royal-shop');?></a></div> 
<div class="royal-shop-quickcart-dropdown">
<?php 
woocommerce_mini_cart(); 
?>
</div>
<?php if ($woocommerce->cart->is_empty() ) : ?>
<a class="button return wc-backward" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"> <?php _e( 'Return to shop', 'royal-shop' ) ?> </a>
<?php endif;?>
</div>
    <?php
}
add_action( 'royal_shop_woo_cart', 'royal_shop_woo_cart_product' );
add_filter('woocommerce_add_to_cart_fragments', 'royal_shop_add_to_cart_dropdown_fragment');
function royal_shop_add_to_cart_dropdown_fragment( $fragments ){
   global $woocommerce;
   ob_start();
   ?>
   <div class="royal-shop-quickcart-dropdown">
       <?php woocommerce_mini_cart(); ?>
   </div>
   <?php $fragments['div.royal-shop-quickcart-dropdown'] = ob_get_clean();
   return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'royal_shop_add_to_cart_fragment');
function royal_shop_add_to_cart_fragment($fragments){
        ob_start();
        $product_no = WC()->cart->get_cart_contents_count(); ?>
          <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','royal-shop' ); ?>"><i class="fa fa-shopping-bag"></i> 
              <?php if ($product_no > 0) { ?>    
            <span class="cart-content"><?php echo sprintf ( _n( '<span class="count-item">%d</span>', '<span class="count-item">%d</span>', WC()->cart->get_cart_contents_count(),'royal-shop' ), WC()->cart->get_cart_contents_count() ); ?><?php echo WC()->cart->get_cart_total(); ?></span>
              <?php } ?>
          </a>

       <?php  $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }
/***********************************************/
//Sort section Woocommerce category filter show
/***********************************************/
function royal_shop_add_to_cart_url($product){
 $cart_url =  apply_filters( 'woocommerce_loop_add_to_cart_link',
    sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button wzta-button %s %s"><span>%s</span></a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( $product->get_id() ),
        esc_attr( $product->get_sku() ),
        esc_attr( isset( $quantity ) ? $quantity : 1 ),
        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
        $product->is_purchasable() && $product->is_in_stock() && $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
        esc_html( $product->add_to_cart_text() )
    ),$product );
 return $cart_url;
}
/**********************************/
//Shop Product Markup
/**********************************/
if ( ! function_exists( 'royal_shop_product_meta_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function royal_shop_product_meta_start(){
         global $product;
    // $cate = $product->get_categories();
      $pid =  $product->get_id();
      $cate = wc_get_product_category_list($pid);
      $cate = implode(" ",array_slice(explode(",",$cate),0,1));
     echo '<div class="wzta-product-wrap"><div class="wzta-product"><span class="wzta-categories-prod">'.$cate.'</span>';
  }
}
if ( ! function_exists( 'royal_shop_product_meta_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function royal_shop_product_meta_end(){

    echo '</div></div>';
  }
}
/**********************************/
//Shop Product Image Markup
/**********************************/
if ( ! function_exists( 'royal_shop_product_image_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function royal_shop_product_image_start(){
    echo '<div class="wzta-product-image">';
  }
}
if ( ! function_exists( 'royal_shop_product_image_end' ) ){

  /**
   * Thumbnail wrap start.
   */
    function royal_shop_product_image_end(){
      // echo woocommerce_template_loop_rating();
      echo '<div class="wzta-icons-wrap">';
    do_action('quickview');
    // royal_shop_whish_list();
    // royal_shop_add_to_compare_fltr();
    
    echo '</div> </div>';
  }
}

if ( ! function_exists( 'royal_shop_product_content_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function royal_shop_product_content_start(){
    echo '<div class="wzta-product-content">';
  }
}
if ( ! function_exists( 'royal_shop_product_content_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function royal_shop_product_content_end(){

    echo '</div>';
  }
}
 /**
   * wzta-product-hover start.
   */
 if ( ! function_exists( 'royal_shop_product_hover_start' ) ){
  function royal_shop_product_hover_start(){

    echo'<div class="wzta-product-hover">';
  }
}
if ( ! function_exists( 'royal_shop_product_hover_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function royal_shop_product_hover_end(){
    
    echo '</div>';
  }
}

if ( ! function_exists( 'royal_shop_shop_content_start' ) ){

  /**
   * Thumbnail wrap start.
   */
  function royal_shop_shop_content_start(){
    
    echo '<div id="shop-product-wrap">';
  }
}

if ( ! function_exists( 'royal_shop_shop_content_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function royal_shop_shop_content_end(){
    
    echo '</div>';
  }
}
/**
* Shop customization.
*
* @return void
*/
add_action( 'woocommerce_before_shop_loop_item', 'royal_shop_product_meta_start', 10);
add_action( 'woocommerce_after_shop_loop_item', 'royal_shop_product_meta_end', 12 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open',20);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open',0);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_title', 0);
add_action( 'woocommerce_before_shop_loop_item_title', 'royal_shop_product_image_start', 0);
add_action( 'woocommerce_before_shop_loop_item_title', 'royal_shop_product_image_end',10 );


add_action( 'woocommerce_after_shop_loop_item_title', 'royal_shop_product_hover_start',50);
add_action( 'woocommerce_after_shop_loop_item', 'royal_shop_product_hover_end',20);
add_action( 'woocommerce_before_shop_loop', 'royal_shop_shop_content_start',1);
add_action( 'woocommerce_after_shop_loop', 'royal_shop_shop_content_end',1);

add_action( 'woocommerce_after_shop_loop_item', 'royal_shop_whish_list',11);
add_action( 'woocommerce_after_shop_loop_item', 'royal_shop_add_to_compare_fltr',11);
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
add_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
//To integrate with a theme, please use bellow filters to hide the default buttons. hide default wishlist button on product archive page
add_filter( 'woosw_button_position_archive', function() {
    return '0';
} );
//hide default compare button on product archive page
add_filter( 'filter_wooscp_button_archive', function() {
    return '0';
} );

/***************/
// single page
/***************/
if ( ! function_exists( 'royal_shop_single_summary_start' ) ){

  /**
   * Thumbnail wrap start.
   */
  function royal_shop_single_summary_start(){
    
    echo '<div class="wzta-single-product-summary-wrap">';
  }
}
if( ! function_exists( 'royal_shop_single_summary_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function royal_shop_single_summary_end(){
    
    echo '</div>';
  }
}
add_action( 'woocommerce_before_single_product_summary', 'royal_shop_single_summary_start',0);
add_action( 'woocommerce_after_single_product_summary', 'royal_shop_single_summary_end',0);

/****************/
// add to compare
/****************/
function royal_shop_add_to_compare_fltr($pid){
      $product_id = $pid;
         if( is_plugin_active('yith-woocommerce-compare/init.php') && (! class_exists( 'WPCleverWooscp' ))){
          echo '<div class="wzta-compare"><span class="compare-list"><div class="woocommerce product compare-button"><a href="'.home_url().'?action=yith-woocompare-add-product&id='.$product_id.'" class="compare button" data-product_id="'.$product_id.'" rel="nofollow">Compare</a></div></span></div>';
           }
           if( ( class_exists( 'WPCleverWooscp' ))){
           echo '<div class="wzta-compare">'.do_shortcode('[wooscp id='.$product_id.']').'</div>';
         }
}
/**********************/
/** wishlist **/
/**********************/
function royal_shop_whish_list($pid=''){
       if( shortcode_exists( 'yith_wcwl_add_to_wishlist' ) && (! class_exists( 'WPCleverWoosw' ))){
        echo '<div class="wzta-wishlist"><span class="wzta-wishlist-inner">'.do_shortcode('[yith_wcwl_add_to_wishlist product_id='.$pid.' icon="fa fa-heart-o" label="wishlist" already_in_wishslist_text="Already" browse_wishlist_text="Added"]' ).'</span></div>';
       }
       if( ( class_exists( 'WPCleverWoosw' ))){
        echo '<div class="wzta-wishlist"><span class="wzta-wishlist-inner">'.do_shortcode('[woosw id='.$pid.']').'</span></div>';
       }
 } 

function royal_shop_whishlist_url(){
$wishlist_page_id =  get_option( 'yith_wcwl_wishlist_page_id' );
$wishlist_permalink = get_the_permalink( $wishlist_page_id );
return $wishlist_permalink ;
}
// 
// display admin name
function royal_shop_display_admin_name(){
$user=wp_get_current_user();
echo esc_html($user->display_name);
}
/** My Account Menu **/
function royal_shop_account(){
 if ( is_user_logged_in() ){?>
<a class="account" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ));?>"><span class="account-text"><?php _e('Hello , ','royal-shop');?> <?php royal_shop_display_admin_name(); ?></span><span class="account-text"><?php _e('My account','royal-shop');?></span><i class="fa fa-user-o" aria-hidden="true"></i></a>
<?php } else {?>
<span><a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ));?>"><span class="account-text"><?php _e('Login / Signup','royal-shop');?></span><span class="account-text"><?php _e('My account','royal-shop');?></span><i class="fa fa-lock" aria-hidden="true"></i></a></span>
<?php }
 }

 // Plus Minus Quantity Buttons @ WooCommerce Single Product Page
add_action( 'woocommerce_before_add_to_cart_quantity', 'royal_shop_display_quantity_minus',10,2 );
function royal_shop_display_quantity_minus(){
    echo '<div class="royal-shop-quantity"><button type="button" class="minus" >-</button>';
}
add_action( 'woocommerce_after_add_to_cart_quantity', 'royal_shop_display_quantity_plus',10,2 );
function royal_shop_display_quantity_plus(){
    echo '<button type="button" class="plus" >+</button></div>';
}


//Woocommerce: How to remove page-title at the home/shop page but not category pages
add_filter( 'woocommerce_show_page_title', 'royal_shop_not_a_shop_page' );
function royal_shop_not_a_shop_page() {
    return boolval(!is_shop());
}
//************************************************************************************************//
// *****************************HOME PAGE WOO FUNCTION****************************************//
//************************************************************************************************//
//***********************/
// product category list
//************************/
function royal_shop_product_list_categories( $args = '' ){
$term = get_theme_mod('royal_shop_exclde_category','');
    $defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => '5',
        'echo'                => 0,
        'exclude'             => '',
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'menu_order',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories','royal-shop' ),
        'style'               => 'list',
        'taxonomy'            => 'product_cat',
        'title_li'            => '',
        'use_desc_for_title'  => 0,
        'walker'        => new List_Category_Images
    );
 $html = wp_list_categories($defaults);
        echo '<ul class="product-cat-list wzta-product-cat-list" data-menu-style="vertical">'.$html.'</ul>';
  }
  // cLASS To fetch cat image
class List_Category_Images extends Walker_Category {
    function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        $saved_data =  get_term_meta( $category->term_id, 'thumbnail_id', true );
        $image = wp_get_attachment_url( $saved_data); 
        $cat_name = apply_filters(
            'list_cats',
            esc_attr( $category->name ),
            $category
        );
        $link='';
        
        $link.= '<a href="' . esc_url( get_term_link( $category ) ) . '" ';
        if ( $args['use_desc_for_title'] && ! empty( $category->description ) ) {
            $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
        }

        $link .= '>';
        if(!empty($image)){
        $link .='<img src="' . $image . '">';
         }
        $link .= $cat_name . '</a>';
       

        if ( ! empty( $args['show_count'] ) ) {
            $link .= ' (' . number_format_i18n( $category->count ) . ')';
        }
        if ( 'list' == $args['style'] ) {
            $output .= "\t<li";
            $class = 'cat-item cat-item-' . $category->term_id;
            if ( ! empty( $args['current_category'] ) ) {
                $_current_category = get_term( $args['current_category'], $category->taxonomy );
                if ( $category->term_id == $args['current_category'] ) {
                    $class .=  ' current-cat';
                } elseif ( $category->term_id == $_current_category->parent ) {
                    $class .=  ' current-cat-parent';
                }
            }
            $output .=  ' class="' . $class . '"';
            $output .= ">$link\n";
        } else {
            $output .= "\t$link<br />\n";
        }
    }
}
  // This is for vertical style
function royal_shop_product_list_categories_mobile( $args = '' ){
    $defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 5,
        'echo'                => 0,
        'exclude'             => '',
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'menu_order',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories','royal-shop' ),
        'style'               => 'list',
        'taxonomy'            => 'product_cat',
        'title_li'            => '',
        'use_desc_for_title'  => 0,
    );
 $html = wp_list_categories($defaults);
        echo '<ul class="wzta-product-cat-list mobile" data-menu-style="accordion">'.$html.'</ul>';
  }