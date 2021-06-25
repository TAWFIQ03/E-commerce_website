<?php 
/**
 * Custom Style for Royal Shop Theme.
 * @package     Royal Shop
 * @author      ThemeHunk
 * @copyright   Copyright (c) 2021, Royal Shop
 * @since       Royal Shop 1.0.0
 */
function royal_shop_custom_style(){
$royal_shop_style=""; 
$royal_shop_style.= royal_shop_responsive_slider_funct( 'royal_shop_logo_width', 'royal_shop_logo_width_responsive');

/**********************/
//Scheme Color
/**********************/
$royal_shop_color_scheme = esc_html(get_theme_mod('royal_shop_color_scheme','opn-light'));
$custombackground = esc_html(get_theme_mod('custom-background','#2f2f2f'));

/**************************/
// Above Header
/**************************/
    $royal_shop_above_brdr_clr = esc_html(get_theme_mod('royal_shop_above_brdr_clr','#fff'));  
    $royal_shop_style.=".top-header{border-bottom-color:{$royal_shop_above_brdr_clr}}";
    $royal_shop_style.= royal_shop_responsive_slider_funct( 'royal_shop_abv_hdr_hgt', 'royal_shop_top_header_height_responsive');
    $royal_shop_style.= royal_shop_responsive_slider_funct( 'royal_shop_abv_hdr_botm_brd', 'royal_shop_abv_hdr_botm_brd_responsive');

/**************************/
// Above Fooetr
/**************************/
    $royal_shop_above_frt_brdr_clr = esc_html(get_theme_mod('royal_shop_above_frt_brdr_clr','#fff'));  
    $royal_shop_above_frt_top_brdr_clr = esc_html(get_theme_mod('royal_shop_above_frt_top_brdr_clr','#fff'));  
    $royal_shop_style.=".top-footer,body.royal-shop-dark .top-footer{border-bottom-color:{$royal_shop_above_frt_brdr_clr};
                  border-top-color:{$royal_shop_above_frt_top_brdr_clr}}";
    $royal_shop_style.= royal_shop_responsive_slider_funct( 'royal_shop_above_ftr_hgt', 'royal_shop_top_footer_height_responsive');
    $royal_shop_style.= royal_shop_responsive_slider_funct( 'royal_shop_abv_ftr_botm_brd', 'royal_shop_top_footer_border_responsive');
    $royal_shop_style.= royal_shop_responsive_slider_funct( 'royal_shop_abv_ftr_top_brd', 'royal_shop_top_footer_topborder_responsive');

/**************************/
// Below Fooetr
/**************************/
    $royal_shop_bottom_frt_brdr_clr = esc_html(get_theme_mod('royal_shop_bottom_frt_brdr_clr','#fff'));  
    $royal_shop_style.=".below-footer,body.royal-shop-dark .below-footer{border-top-color:{$royal_shop_bottom_frt_brdr_clr}}";
    $royal_shop_style.= royal_shop_responsive_slider_funct( 'royal_shop_btm_ftr_hgt', 'royal_shop_below_footer_height_responsive');
    $royal_shop_style.= royal_shop_responsive_slider_funct( 'royal_shop_btm_ftr_botm_brd', 'royal_shop_below_footer_border_responsive');
/*********************/
// Global Color Option
/*********************/
  $royal_shop_theme_clr = esc_html(get_theme_mod('royal_shop_theme_clr','#00badb'));
  $royal_shop_style.="a:hover, .royal-shop-menu li a:hover, .royal-shop-menu .current-menu-item a,.sider.overcenter .sider-inner ul.royal-shop-menu .current-menu-item a,.sticky-header-col2 .royal-shop-menu li a:hover,.woocommerce .wzta-woo-product-list .price,.wzta-compare .compare-button a:hover,.wzta-product .yith-wcwl-wishlistexistsbrowse.show:before, .wzta-product .yith-wcwl-wishlistaddedbrowse.show:before,.woocommerce ul.products li.product.wzta-woo-product-list .price,.summary .yith-wcwl-add-to-wishlist.show .add_to_wishlist::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show a::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show a::before,.woocommerce .entry-summary a.compare.button.added:before,.header-icon a:hover,.wzta-related-links .nav-links a:hover,.woocommerce .wzta-list-view ul.products li.product.wzta-woo-product-list .price,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,.wzta-wishlist a:hover, .wzta-compare a:hover,.wzta-quik a:hover,.woocommerce ul.cart_list li .woocommerce-Price-amount, .woocommerce ul.product_list_widget li .woocommerce-Price-amount,.royal-shop-load-more button,.page-contact .leadform-show-form label,.wzta-contact-col .fa,.summary .yith-wcwl-add-to-wishlist .add_to_wishlist:hover:before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a::before,.wzta-hlight-icon,.wzta-product .yith-wcwl-wishlistexistsbrowse:before,.woocommerce .entry-summary a.compare.button:hover:before,.wzta-slide-button,.sider.overcenter .sider-inner ul.royal-shop-menu li a:hover,.yith-wcwl-wishlistaddedbrowse:before,.sticky-header .wzta-icon .cart-icon a.cart-contents,.menu-close-btn:hover,.tagcloud a:hover,.wzta-single-product-summary-wrap a[data-title='Add to wishlist']:hover,
.wzta-single-product-summary-wrap a[data-title='Browse wishlist']:hover,
.woocommerce .wzta-single-product-summary-wrap a.compare.button:hover,.mobile-nav-tabs li a.active,.wzta-hglt-icon,.woosw-btn:hover,.woosw-added:before,.wooscp-btn:hover{color:{$royal_shop_theme_clr}}";

$royal_shop_style.=".toggle-cat-wrap,#search-button,.wzta-icon .cart-icon,.single_add_to_cart_button.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button,.cat-list a:after, .wzta-tags-wrapper a:hover,.btn-main-header,.page-contact .leadform-show-form input[type='submit'],.woocommerce .widget_price_filter .royal-shop-widget-content .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .royal-shop-widget-content .ui-slider .ui-slider-handle,.entry-content form.post-password-form input[type='submit'],
.header-support-icon,
.count-item,.nav-links .page-numbers.current, .nav-links .page-numbers:hover,.woocommerce .wzta-woo-product-list span.onsale,.woocommerce .return-to-shop a.button,.widget_product_search [type='submit']:hover,.comment-form .form-submit [type='submit'],.royal-shop-slide-post .owl-nav button.owl-prev:hover, .royal-shop-slide-post .owl-nav button.owl-next:hover,body.royal-shop-dark .royal-shop-slide-post .owl-nav button.owl-prev:hover, body.royal-shop-dark .royal-shop-slide-post .owl-nav button.owl-next:hover,.cart-close-btn:hover:before, .cart-close-btn:hover:after,.menu-close-btn:hover:before,.menu-close-btn:hover:after,.ribbon-btn,.slider-content-caption a,.widget.wzta-about-me a.read-more{background:{$royal_shop_theme_clr}}
  .open-cart p.buttons a:hover,
  .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.wzta-slide .owl-nav button.owl-prev:hover, .wzta-slide .owl-nav button.owl-next:hover,.wzta-list-grid-switcher a.selected, .wzta-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,#searchform [type='submit']:hover,article.wzta-post-article .wzta-readmore.button,.royal-shop-load-more button:hover,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.wzta-top2-slide.owl-carousel .owl-nav button:hover,.product-slide-widget .owl-carousel .owl-nav button:hover, .wzta-slide.wzta-brand .owl-nav button:hover,.wzta-testimonial .owl-carousel .owl-nav button.owl-prev:hover,.wzta-testimonial .owl-carousel .owl-nav button.owl-next:hover,body.royal-shop-dark .wzta-slide .owl-nav button.owl-prev:hover,body.royal-shop-dark .wzta-slide .owl-nav button.owl-next:hover,.woosw-copy-btn input{background-color:{$royal_shop_theme_clr};} 
  .open-cart p.buttons a:hover,.royal-shop-slide-post .owl-nav button.owl-prev:hover, .royal-shop-slide-post .owl-nav button.owl-next:hover,body .woocommerce-tabs .tabs li a::before,.wzta-list-grid-switcher a.selected, .wzta-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,#searchform [type='submit']:hover,.royal-shop-load-more button,.wzta-top2-slide.owl-carousel .owl-nav button:hover,.product-slide-widget .owl-carousel .owl-nav button:hover, .wzta-slide.wzta-brand .owl-nav button:hover,.page-contact .leadform-show-form input[type='submit'],.widget_product_search [type='submit']:hover,.wzta-slide .owl-nav button.owl-prev:hover,.wzta-slide .owl-nav button.owl-next:hover,body.royal-shop-dark .wzta-slide.owl-carousel .owl-nav button.owl-prev:hover, body.royal-shop-dark .wzta-slide.owl-carousel .owl-nav button.owl-next:hover,body.royal-shop-dark .royal-shop-slide-post .owl-nav button.owl-prev:hover, body.royal-shop-dark .royal-shop-slide-post .owl-nav button.owl-next:hover,.wzta-testimonial .owl-carousel .owl-nav button.owl-prev:hover,.wzta-testimonial .owl-carousel .owl-nav button.owl-next:hover,.wzta-title .title:after, .widget-title > span:after,.wzta-product-list-section .wzta-list:hover,
.wzta-product-tab-list-section .wzta-list:hover{border-color:{$royal_shop_theme_clr}} .loader {
    border-right: 4px solid {$royal_shop_theme_clr};
    border-bottom: 4px solid {$royal_shop_theme_clr};
    border-left: 4px solid {$royal_shop_theme_clr};}
    .site-title span a:hover,.main-header-bar .header-icon a:hover,.woocommerce div.product p.price, .woocommerce div.product span.price,body.royal-shop-dark .royal-shop-menu .current-menu-item a,body.royal-shop-dark .sider.overcenter .sider-inner ul.royal-shop-menu .current-menu-item a,body.royal-shop-dark .sider.overcenter .sider-inner ul.royal-shop-menu li a:hover{color:{$royal_shop_theme_clr}}";

  $royal_shop_style.=".woocommerce .wzta-product-hover > a,
    .woocommerce .wzta-product-hover > a:after,#alm-quick-view-modal .alm-qv-image-slider .flex-control-paging li a.flex-active{background:{$royal_shop_theme_clr}!important}";
   //text
   $royal_shop_text_clr = esc_html(get_theme_mod('royal_shop_text_clr',''));
   $royal_shop_style.="body,.woocommerce-error, .woocommerce-info, .woocommerce-message {color: {$royal_shop_text_clr}}";
   //title
   $royal_shop_title_clr = esc_html(get_theme_mod('royal_shop_title_clr',''));
   $royal_shop_style.=".site-title span a,.sprt-tel b,.widget.woocommerce .widget-title, .open-widget-content .widget-title, .widget-title,.wzta-title .title,.wzta-hglt-box h6,h2.wzta-post-title a, h1.wzta-post-title ,#reply-title,h4.author-header,.page-head h1,.woocommerce div.product .product_title, section.related.products h2, section.upsells.products h2, .woocommerce #reviews #comments h2,.woocommerce table.shop_table thead th, .cart-subtotal, .order-total,.cross-sells h2, .cart_totals h2,.woocommerce-billing-fields h3,.page-head h1 a{color: {$royal_shop_title_clr}}";
   //link
   $royal_shop_link_clr = esc_html(get_theme_mod('royal_shop_link_clr'));
   $royal_shop_link_hvr_clr = esc_html(get_theme_mod('royal_shop_link_hvr_clr'));
   $royal_shop_style.="a,#royal-shop-above-menu.royal-shop-menu > li > a{color:{$royal_shop_link_clr}} a:hover,#royal-shop-above-menu.royal-shop-menu > li > a:hover,#royal-shop-above-menu.royal-shop-menu li a:hover{color:{$royal_shop_link_hvr_clr}}";
  // loader
   $royal_shop_loader_bg_clr = esc_html(get_theme_mod('royal_shop_loader_bg_clr','#9c9c9'));
   $royal_shop_style.=".royal_shop_overlayloader{background-color:{$royal_shop_loader_bg_clr}}";
  /**************************/
  //Above Header Color Option
  /**************************/
   $royal_shop_above_hd_bg_clr = esc_html(get_theme_mod('royal_shop_above_hd_bg_clr',''));
   $royal_shop_abv_header_background_image = esc_url(get_theme_mod('header_image'));
   $royal_shop_style.=".top-header:before{background:{$royal_shop_above_hd_bg_clr}}";
   $royal_shop_style.= ".top-header{background-image:url($royal_shop_abv_header_background_image);
   }";
   
  /**************************/
  //Main Header Color Option
  /**************************/
    $royal_shop_main_header_sitetitle_clr          = esc_html(get_theme_mod('royal_shop_main_header_sitetitle_clr',''));
    $royal_shop_main_header_sitetitle_hvr_clr      = esc_html(get_theme_mod('royal_shop_main_header_sitetitle_hvr_clr',''));
    $royal_shop_main_header_sitetagline_clr        = esc_html(get_theme_mod('royal_shop_main_header_sitetagline_clr',''));
    $royal_shop_style.= ".site-title span a{color:{$royal_shop_main_header_sitetitle_clr}} .site-title span a:hover{color:{$royal_shop_main_header_sitetitle_hvr_clr}} .site-description p{color:{$royal_shop_main_header_sitetagline_clr}}";

    $royal_shop_main_content_txt_clr               = esc_html(get_theme_mod('royal_shop_main_content_txt_clr',''));
    $royal_shop_main_content_link_clr              = esc_html(get_theme_mod('royal_shop_main_content_link_clr',''));

    $royal_shop_style.= "
    .main-header{color:{$royal_shop_main_content_txt_clr}}
    .main-header a,.header-icon a{color:{$royal_shop_main_content_link_clr}}.menu-toggle .icon-bar{background:{$royal_shop_main_content_link_clr}}";

    $royal_shop_header_shadow = esc_html(get_theme_mod('royal_shop_header_shadow',true));
    if ($royal_shop_header_shadow == true) {
      $royal_shop_style.= " header{ box-shadow: 0 .125rem .3rem -.0625rem rgba(0,0,0,.03),0 .275rem .75rem -.0625rem rgba(0,0,0,.06)!important;} ";
    }

/*************************/
// Front page-head
/************************/
    $royal_shop_background_color      = esc_html(get_theme_mod('background_color','fff'));
    $royal_shop_style.= "
    .wzta-product-hover{
      background: #{$royal_shop_background_color};
    }
    ";
    //Hide yith if WPC SMART Icon 
if( (class_exists( 'WPCleverWoosw' ))){
$royal_shop_style.=" .woocommerce .entry-summary .yith-wcwl-add-to-wishlist{
  display:none;
}
";
}
if( (class_exists( 'WPCleverWooscp' ))){
$royal_shop_style.=" .woocommerce .entry-summary a.compare.button{
  display:none;
}
";
}

//Move to top 
$royal_shop_move_to_top_bg_clr      = esc_html(get_theme_mod('royal_shop_move_to_top_bg_clr'));
$royal_shop_move_to_top_icon_clr    = esc_html(get_theme_mod('royal_shop_move_to_top_icon_clr'));
$royal_shop_style.="#move-to-top{background:{$royal_shop_move_to_top_bg_clr};color:{$royal_shop_move_to_top_icon_clr}}";

return $royal_shop_style;
}
//start logo width
function royal_shop_logo_width_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.wzta-logo img,.sticky-header .logo-content img{
    max-width: ' . $v3 . 'px;
  }';
  $custom_css = royal_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
// top header height
function royal_shop_top_header_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-header .top-header-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = royal_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function royal_shop_abv_hdr_botm_brd_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-header{
    border-bottom-width: ' . $v3 . 'px;
  }';
  $custom_css = royal_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

// top footer height
function royal_shop_top_footer_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-footer .top-footer-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = royal_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function royal_shop_top_footer_border_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-footer{
    border-bottom-width: ' . $v3 . 'px;
  }';
  $custom_css = royal_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function royal_shop_top_footer_topborder_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-footer{
    border-top-width: ' . $v3 . 'px;
  }';
  $custom_css = royal_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

// below footer height
function royal_shop_below_footer_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.below-footer .below-footer-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = royal_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function royal_shop_below_footer_border_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.below-footer{
    border-top-width: ' . $v3 . 'px;
  }';
  $custom_css = royal_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}