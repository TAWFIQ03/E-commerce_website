/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ){
/**
 * Dynamic Internal/Embedded Style for a Control
 */
function royal_shop_add_dynamic_css( control, style ){
      control = control.replace( '[', '-' );
      control = control.replace( ']', '' );
      jQuery( 'style#' + control ).remove();

      jQuery( 'head' ).append(
            '<style id="' + control + '">' + style + '</style>'
      );
}
/**
 * Responsive Spacing CSS
 */
function royal_shop_responsive_spacing( control, selector, type, side ){
    wp.customize( control, function( value ){
        value.bind( function( value ){
            var sidesString = "";
            var spacingType = "padding";
            if ( value.desktop.top || value.desktop.right || value.desktop.bottom || value.desktop.left || value.tablet.top || value.tablet.right || value.tablet.bottom || value.tablet.left || value.mobile.top || value.mobile.right || value.mobile.bottom || value.mobile.left ) {
                if ( typeof side != undefined ) {
                    sidesString = side + "";
                    sidesString = sidesString.replace(/,/g , "-");
                }
                if ( typeof type != undefined ) {
                    spacingType = type + "";
                }
                // Remove <style> first!
                control = control.replace( '[', '-' );
                control = control.replace( ']', '' );
                jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();

                var desktopPadding = '',
                    tabletPadding = '',
                    mobilePadding = '';

                var paddingSide = ( typeof side != undefined ) ? side : [ 'top','bottom','right','left' ];

                jQuery.each(paddingSide, function( index, sideValue ){
                    if ( '' != value['desktop'][sideValue] ) {
                        desktopPadding += spacingType + '-' + sideValue +': ' + value['desktop'][sideValue] + value['desktop-unit'] +';';
                    }
                });

                jQuery.each(paddingSide, function( index, sideValue ){
                    if ( '' != value['tablet'][sideValue] ) {
                        tabletPadding += spacingType + '-' + sideValue +': ' + value['tablet'][sideValue] + value['tablet-unit'] +';';
                    }
                });

                jQuery.each(paddingSide, function( index, sideValue ){
                    if ( '' != value['mobile'][sideValue] ) {
                        mobilePadding += spacingType + '-' + sideValue +': ' + value['mobile'][sideValue] + value['mobile-unit'] +';';
                    }
                });

                // Concat and append new <style>.
                jQuery( 'head' ).append(
                    '<style id="' + control + '-' + spacingType + '-' + sidesString + '">'
                    + selector + '  { ' + desktopPadding +' }'
                    + '@media (max-width: 768px) {' + selector + '  { ' + tabletPadding + ' } }'
                    + '@media (max-width: 544px) {' + selector + '  { ' + mobilePadding + ' } }'
                    + '</style>'
                );

            } else {
                wp.customize.preview.send( 'refresh' );
                jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();
            }

        } );
    } );
}
/**
 * Apply CSS for the element
 */
function royal_shop_css( control, css_property, selector, unit ){

    wp.customize( control, function( value ) {
        value.bind( function( new_value ) {

            // Remove <style> first!
            control = control.replace( '[', '-' );
            control = control.replace( ']', '' );

            if ( new_value ){
                /**
                 *  If ( unit == 'url' ) then = url('{VALUE}')
                 *  If ( unit == 'px' ) then = {VALUE}px
                 *  If ( unit == 'em' ) then = {VALUE}em
                 *  If ( unit == 'rem' ) then = {VALUE}rem.
                 */
                if ( 'undefined' != typeof unit) {
                    if ( 'url' === unit ) {
                        new_value = 'url(' + new_value + ')';
                    } else {
                        new_value = new_value + unit;
                    }
                }

                // Remove old.
                jQuery( 'style#' + control ).remove();

                // Concat and append new <style>.
                jQuery( 'head' ).append(
                    '<style id="' + control + '">'
                    + selector + '  { ' + css_property + ': ' + new_value + ' }'
                    + '</style>'
                );

            } else {

                wp.customize.preview.send( 'refresh' );

                // Remove old.
                jQuery( 'style#' + control ).remove();
            }

        } );
    } );
}
/*******************************/
// Range slider live customizer
/*******************************/
function royalShopGetCss( arraySizes, settings, to ) {
    'use strict';
    var data, desktopVal, tabletVal, mobileVal,
        className = settings.styleClass, i = 1;

    var val = JSON.parse( to );
    if ( typeof( val ) === 'object' && val !== null ) {
        if ('desktop' in val) {
            desktopVal = val.desktop;
        }
        if ('tablet' in val) {
            tabletVal = val.tablet;
        }
        if ('mobile' in val) {
            mobileVal = val.mobile;
        }
    }

    for ( var key in arraySizes ) {
        // skip loop if the property is from prototype
        if ( ! arraySizes.hasOwnProperty( key )) {
            continue;
        }
        var obj = arraySizes[key];
        var limit = 0;
        var correlation = [1,1,1];
        if ( typeof( val ) === 'object' && val !== null ) {

            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }

            data = {
                desktop: ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0]) > limit ? ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0] ) : limit,
                tablet: ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) > limit ? ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) : limit,
                mobile: ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) > limit ? ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) : limit
            };
        } else {
            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }
            data =( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] > limit ? ( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] : limit;
        }
        settings.styleClass = className + '-' + i;
        settings.selectors  = obj.selectors;

        royalShopSetCss( settings, data );
        i++;
    }
}
function royalShopSetCss( settings, to ){
    'use strict';
    var result     = '';
    var styleClass = jQuery( '.' + settings.styleClass );
    if ( to !== null && typeof to === 'object' ){
        jQuery.each(
            to, function ( key, value ) {
                var style_to_add;
                if ( settings.selectors === '.container' ){
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '; max-width: 100%; }';
                } else {
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '}';
                }
                switch ( key ) {
                    case 'desktop':
                        result += style_to_add;
                        break;
                    case 'tablet':
                        result += '@media (max-width: 767px){' + style_to_add + '}';
                        break;
                    case 'mobile':
                        result += '@media (max-width: 544px){' + style_to_add + '}';
                        break;
                }
            }
        );
        if ( styleClass.length > 0 ) {
            styleClass.text( result );
        } else {
            jQuery( 'head' ).append( '<style type="text/css" class="' + settings.styleClass + '">' + result + '</style>' );
        }
    } else {
        jQuery( settings.selectors ).css( settings.cssProperty, to + 'px' );
    }
}
//*****************************/
// Logo
//*****************************/
wp.customize(
    'royal_shop_logo_width', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'max-width',
                    propertyUnit: 'px',
                    styleClass: 'royal-shop-logo-width'
                };

                var arraySizes = {
                    size3: { selectors:'.wzta-logo img,.sticky-header .logo-content img', values: ['','',''] }
                };
                royalShopGetCss( arraySizes, settings, to );
            }
        );
    }
);
//top header
wp.customize('royal_shop_col1_texthtml', function(value){
         value.bind(function(to){
             $('.top-header-col1 .content-html').text(to);
         });
     });
 wp.customize('royal_shop_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.top-header-col2 .content-html').text(to);
         });
     });
 wp.customize('royal_shop_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.top-header-col3 .content-html').text(to);
         });
     });
royal_shop_css( 'royal_shop_abv_hdr_botm_brd','border-bottom-width', '.top-header', 'px' );
royal_shop_css( 'royal_shop_above_brdr_clr','border-bottom-color', '.top-header,body.royal-shop-dark .top-header');
wp.customize(
    'royal_shop_abv_hdr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-header .top-header-bar', values: ['','',''] }
                };
                royalShopGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'royal_shop_abv_hdr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-bottom-width',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-header', values: ['','',''] }
                };
                royalShopGetCss( arraySizes, settings, to );
            }
        );
    }
);
/***************/
// MAIN HEADER
/***************/
wp.customize('royal_shop_main_hdr_btn_txt', function(value){
         value.bind(function(to){
             $('.btn-main-header').text(to);
         });
});
wp.customize('royal_shop_main_hdr_calto_txt', function(value){
         value.bind(function(to){
             $('.sprt-tel b').text(to);
         });
});
wp.customize('royal_shop_main_hdr_calto_nub', function(value){
         value.bind(function(to){
             $('.sprt-tel a').text(to);
         });
});
wp.customize('royal_shop_main_hdr_calto_nub', function(value){
         value.bind(function(to){
             $('.sprt-tel a').text(to);
         });
});

//cat slider heading
wp.customize('royal_shop_cat_slider_heading', function(value){
         value.bind(function(to) {
             $('.wzta-category-slide-section .wzta-title .title').text(to);
         });
     });
//product slide
wp.customize('royal_shop_product_slider_heading', function(value){
         value.bind(function(to) {
             $('.wzta-product-slide-section .wzta-title .title').text(to);
         });
     });
//product list
wp.customize('royal_shop_product_list_heading', function(value){
         value.bind(function(to) {
             $('.wzta-product-list-section .wzta-title .title').text(to);
         });
     });
//product cat tab 
wp.customize('royal_shop_cat_tab_heading', function(value){
         value.bind(function(to) {
             $('.wzta-product-tab-section .wzta-title .title').text(to);
         });
     });
//product cat tab list
wp.customize('royal_shop_list_cat_tab_heading', function(value){
         value.bind(function(to) {
             $('.wzta-product-tab-list-section .wzta-title .title').text(to);
         });
     });
//Highlight 
wp.customize('royal_shop_hglgt_heading', function(value){
         value.bind(function(to) {
             $('.wzta-product-highlight-section .wzta-title .title').text(to);
         });
     });
//Big Featured
wp.customize('royal_shop_feature_product_heading', function(value){
         value.bind(function(to) {
             $('.wzta-feature-product-section .wzta-title .title').text(to);
         });
     });
//Ribbon Text
wp.customize('royal_shop_ribbon_text', function(value){
         value.bind(function(to) {
             $('.wzta-ribbon-content h3').text(to);
         });
     });
wp.customize('royal_shop_ribbon_btn_text', function(value){
         value.bind(function(to) {
             $('.wzta-ribbon-content a.ribbon-btn').text(to);
         });
     });
/****************/
// footer
/****************/
wp.customize('royal_shop_footer_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('royal_shop_above_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('royal_shop_above_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col3 .content-html').text(to);
         });
     });
royal_shop_css( 'royal_shop_above_frt_brdr_clr','border-bottom-color', 'body.royal-shop-dark .top-footer,.top-footer');
royal_shop_css( 'royal_shop_above_frt_top_brdr_clr','border-top-color', 'body.royal-shop-dark .top-footer,.top-footer');
wp.customize(
    'royal_shop_above_ftr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: 'royal_shop_above_ftr_hgt'
                };

                var arraySizes = {
                    size3: { selectors:'.top-footer .top-footer-bar', values: ['','',''] }
                };
                royalShopGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'royal_shop_abv_ftr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-bottom-width',
                    propertyUnit: 'px',
                    styleClass: 'royal_shop_abv_ftr_botm_brd'
                };

                var arraySizes = {
                    size3: { selectors:'.top-footer', values: ['','',''] }
                };
                royalShopGetCss( arraySizes, settings, to );
            }
        );
    }
);

wp.customize(
    'royal_shop_abv_ftr_top_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-top-width',
                    propertyUnit: 'px',
                    styleClass: 'royal_shop_abv_ftr_top_brd'
                };

                var arraySizes = {
                    size3: { selectors:'.top-footer', values: ['','',''] }
                };
                royalShopGetCss( arraySizes, settings, to );
            }
        );
    }
);

 wp.customize('royal_shop_footer_bottom_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('royal_shop_bottom_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('royal_shop_bottom_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col3 .content-html').text(to);
         });
     });
royal_shop_css( 'royal_shop_bottom_frt_brdr_clr','border-top-color', '.below-footer,body.royal-shop-dark .below-footer');
wp.customize(
    'royal_shop_btm_ftr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.below-footer .below-footer-bar', values: ['','',''] }
                };
                royalShopGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'royal_shop_btm_ftr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-top-width',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.below-footer', values: ['','',''] }
                };
                royalShopGetCss( arraySizes, settings, to );
            }
        );
    }
);
// loader
royal_shop_css( 'royal_shop_loader_bg_clr','background-color','.royal_shop_overlayloader');
//*****************************/
// Global Color Custom Style
//*****************************/
wp.customize( 'royal_shop_theme_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '';
                dynamicStyle += 'a:hover, .royal-shop-menu li a:hover, .royal-shop-menu .current-menu-item a,.woocommerce .wzta-woo-product-list .price,.wzta-product-hover .wzta-button.add_to_cart_button, .woocommerce ul.products .wzta-product-hover .add_to_cart_button, .woocommerce .wzta-product-hover a.wzta-button, .woocommerce ul.products li.product .product_type_variable, .woocommerce ul.products li.product a.button.product_type_grouped,.wzta-compare .compare-button a:hover, .wzta-product-hover .wzta-button.add_to_cart_button:hover, .woocommerce ul.products .wzta-product-hover .add_to_cart_button :hover, .woocommerce .wzta-product-hover a.wzta-button:hover,.wzta-product .yith-wcwl-wishlistexistsbrowse.show:before, .wzta-product .yith-wcwl-wishlistaddedbrowse.show:before,.woocommerce ul.products li.product.wzta-woo-product-list .price,.summary .yith-wcwl-add-to-wishlist.show .add_to_wishlist::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show a::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show a::before,.woocommerce .entry-summary a.compare.button.added:before,article.wzta-post-article .wzta-readmore.button:hover,.header-icon a:hover,.wzta-related-links .nav-links a:hover,.woocommerce .wzta-list-view ul.products li.product.wzta-woo-product-list .price,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,.woocommerce .wzta-product-hover a.wzta-button,.page-contact .leadform-show-form label,.wzta-contact-col .fa,ul.products .wzta-product-hover .add_to_cart_button:hover,.woocommerce .wzta-product-hover a.wzta-button:hover,.woocommerce ul.products li.product .product_type_variable:hover,.woocommerce ul.products li.product a.button.product_type_grouped:hover,.woocommerce .wzta-product-hover a.wzta-button:hover,.woocommerce ul.products li.product .add_to_cart_button:hover,.woocommerce .added_to_cart.wc-forward:hover,ul.products .wzta-product-hover .add_to_cart_button:hover:after,.woocommerce .wzta-product-hover a.wzta-button:hover:after,.woocommerce ul.products li.product .product_type_variable:hover:after,.woocommerce ul.products li.product a.button.product_type_grouped:hover:after,.woocommerce .wzta-product-hover a.wzta-button:hover:after,.woocommerce ul.products li.product .add_to_cart_button:hover:after,.woocommerce .added_to_cart.wc-forward:hover:after,.woosw-btn:hover,.woosw-added:before,.wooscp-btn:hover{ color: ' + cssval + '} ';
                dynamicStyle += '.toggle-cat-wrap,#search-button,.wzta-icon .cart-icon,.single_add_to_cart_button.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button,.wzta-woo-product-list .wzta-quickview a,.btn-main-header{ background: ' + cssval + '} ';
                dynamicStyle += '.open-cart p.buttons a:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.wzta-slide .owl-nav button.owl-prev:hover, .wzta-slide .owl-nav button.owl-next:hover, .royal-shop-slide-post .owl-nav button.owl-prev:hover, .royal-shop-slide-post .owl-nav button.owl-next:hover,.wzta-list-grid-switcher a.selected, .wzta-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,#searchform [type="submit"]:hover,.page-contact .leadform-show-form input[type="submit"],.nav-links .page-numbers.current, .nav-links .page-numbers:hover,.woosw-copy-btn input{background-color: ' + cssval + '} ';
                dynamicStyle += '.wzta-product-hover .wzta-button.add_to_cart_button, .woocommerce ul.products .wzta-product-hover .add_to_cart_button, .woocommerce .wzta-product-hover a.wzta-button, .woocommerce ul.products li.product .product_type_variable, .woocommerce ul.products li.product a.button.product_type_grouped,.open-cart p.buttons a:hover,.wzta-slide .owl-nav button.owl-prev:hover, .wzta-slide .owl-nav button.owl-next:hover, .royal-shop-slide-post .owl-nav button.owl-prev:hover, .royal-shop-slide-post .owl-nav button.owl-next:hover,body .woocommerce-tabs .tabs li a::before,.wzta-list-grid-switcher a.selected, .wzta-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,#searchform [type="submit"]:hover,.woocommerce .wzta-product-hover a.wzta-button,.page-contact .leadform-show-form input[type="submit"]{border-color: ' + cssval + '} ';
                royal_shop_add_dynamic_css( 'royal_shop_theme_clr', dynamicStyle );

        } );
    } );

royal_shop_css( 'royal_shop_text_clr','color','body,.woocommerce-error, .woocommerce-info, .woocommerce-message');
royal_shop_css( 'royal_shop_title_clr','color','.site-title span a,.sprt-tel b,.widget.woocommerce .widget-title, .open-widget-content .widget-title, .widget-title,.wzta-title .title,.wzta-hglt-box h6,h2.wzta-post-title a, h1.wzta-post-title ,#reply-title,h4.author-header,.page-head h1,.woocommerce div.product .product_title, section.related.products h2, section.upsells.products h2, .woocommerce #reviews #comments h2,.woocommerce table.shop_table thead th, .cart-subtotal, .order-total,.cross-sells h2, .cart_totals h2,.woocommerce-billing-fields h3,.page-head h1 a');
royal_shop_css( 'royal_shop_link_clr','color','a,#royal-shop-above-menu.royal-shop-menu > li > a');
royal_shop_css( 'royal_shop_link_hvr_clr','color','a:hover,#royal-shop-above-menu.royal-shop-menu > li > a:hover,#royal-shop-above-menu.royal-shop-menu li a:hover');

//Above Header
royal_shop_css( 'royal_shop_above_hd_bg_clr','background', '.top-header:before,body.royal-shop-dark .top-header:before');
// above header bg image
wp.customize('header_image', function (value){
    value.bind(function (to){
        $('.top-header').css('background-image', 'url( '+ to +')');
    });
});
//move to top
royal_shop_css( 'royal_shop_move_to_top_bg_clr','background', '#move-to-top');
royal_shop_css( 'royal_shop_move_to_top_icon_clr','color', '#move-to-top');
    
})( jQuery );