/**
 * Theme Customizer enhancements for a better user experience
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously
 */

jQuery(document).ready(function($){
	if ( $('.custom-logo').attr('src') ) {
		$('.site-title').css( {'display': 'none'} );
	} else {
		$('.site-title').css( {'display': 'block'} );
	}
});


( function( $ ) {


	wp.customize('custom_logo', function( value ) {
		value.bind( function( to ) {
			if ( to ) {
				$('.site-title').css( {'display': 'none'} );
			} else {
				$('.site-title').css( {'display': 'block'} );
			}
		} );
	} );


	wp.customize('blogname', function( value ) {
		value.bind( function( to ) {
			$('.site-title a').text( to );
		} );
	} );
	wp.customize('blogdescription', function( value ) {
		value.bind( function( to ) {
			$('.site-description').text( to );
		} );
	} );

	wp.customize('container_width', function( value ) {
		value.bind( function( to ) {
			$('.container').css( {'max-width': to + 'px'} );
		} );
	} );

	wp.customize('header_search_off', function( value ) {
		value.bind( function( to ) {
			if ( to == 1 ) {
				$('#masthead .top-search').css( {'display': 'none'} );
			} else {
				$('#masthead .top-search').css( {'display': 'inline-block'} );
			}			
		} );
	} );

	wp.customize('grid_layout', function( value ) {
		value.bind( function( to ) {
			$( '#grid-loop' ).removeClass();	
			$( '#grid-loop' ).addClass( 'layout-' + to );			
		} );
	} );

	wp.customize('color1', function( value ) {
		value.bind( function( to ) {

			var styleColor = 'a,#masthead .top-account .mini-account a,#masthead .top-cart .mini-cart a,.site-footer a,#add_payment_method .cart-collaterals .cart_totals .discount td,.woocommerce-cart .cart-collaterals .cart_totals .discount td,.woocommerce-checkout .cart-collaterals .cart_totals .discount td,.has-accent-color-color,.infinite-loader{color:' + to + ';}';

			var styleBackground = '.button,a.button,button,input[type="button"],input[type="reset"],input[type="submit"],#infinite-handle span button,#infinite-handle span button:hover,#infinite-handle span button:focus,#infinite-handle span button:active,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce a.added_to_cart,.woocommerce #respond input#submit.alt.disabled,.woocommerce #respond input#submit.alt.disabled:hover,.woocommerce #respond input#submit.alt:disabled,.woocommerce #respond input#submit.alt:disabled:hover,.woocommerce #respond input#submit.alt:disabled[disabled],.woocommerce #respond input#submit.alt:disabled[disabled]:hover,.woocommerce a.button.alt.disabled,.woocommerce a.button.alt.disabled:hover,.woocommerce a.button.alt:disabled,.woocommerce a.button.alt:disabled:hover,.woocommerce a.button.alt:disabled[disabled],.woocommerce a.button.alt:disabled[disabled]:hover,.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt:disabled[disabled],.woocommerce button.button.alt:disabled[disabled]:hover,.woocommerce input.button.alt.disabled,.woocommerce input.button.alt.disabled:hover,.woocommerce input.button.alt:disabled,.woocommerce input.button.alt:disabled:hover,.woocommerce input.button.alt:disabled[disabled],.woocommerce input.button.alt:disabled[disabled]:hover,#masthead .top-cart.items,#masthead .top-cart.items:hover,#footer-menu a[href^="mailto:"]:before,.widget_nav_menu a[href^="mailto:"]:before,#footer-menu a[href^="tel:"]:before,.widget_nav_menu a[href^="tel:"]:before,.pagination a:hover,.pagination .current,.woocommerce nav.woocommerce-pagination ul li a:focus,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li span.current,.editor-styles-wrapper .wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-onsale,.wc-block-grid__product-onsale{background:' + to + ';}';

			var styleBgColor = '.woocommerce .sale-flash,.woocommerce ul.products li.product .sale-flash,#yith-quick-view-content .onsale,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.wp-block-button__link,.has-accent-color-background-color,.wc-block-price-filter .wc-block-price-filter__range-input::-webkit-slider-thumb,.wc-block-price-filter .wc-block-price-filter__range-input::-moz-range-thumb,.wc-block-price-filter .wc-block-price-filter__range-input::-webkit-slider-thumb,.wc-block-price-filter .wc-block-price-filter__range-input::-moz-range-thumb{background-color:' + to + ';}';

			var styleBorderColor = '.woocommerce-info,.woocommerce-message{border-color:' + to + ';}';

			var styleRangeColor = '.wc-block-price-filter .wc-block-price-filter__range-input-wrapper .wc-block-price-filter__range-input-progress,.rtl .wc-block-price-filter .wc-block-price-filter__range-input-wrapper .wc-block-price-filter__range-input-progress{--range-color:' + to + ';}';

			$('head').append('<style>' + styleColor + styleBackground + styleBgColor + styleBorderColor + styleRangeColor + '</style>');
		} );
	} );

	wp.customize('font_site_title', function( value ) {
		value.bind( function( to ) {
			ibsen_font_bind( to, '.site-title' );
		} );
	} );

	wp.customize('font_nav', function( value ) {
		value.bind( function( to ) {
			ibsen_font_bind( to, '#site-navigation .site-main-menu' );
		} );
	} );

	wp.customize('font_content', function( value ) {
		value.bind( function( to ) {
			var font_nav = wp.customize.value( 'font_nav' )();
			var font_site_title = wp.customize.value( 'font_site_title' )();
			ibsen_font_bind( to, 'body, button, input, select, textarea' );
			if ( font_site_title === '' ) {
				$('.site-title').css({ fontFamily: 'initial' });
			} else {
				ibsen_font_bind( font_site_title, '.site-title' );
			}
			if ( font_nav === '' ) {
				$('#site-navigation .site-main-menu').css({ fontFamily: 'initial' });
			} else {
				ibsen_font_bind( font_nav, '#site-navigation .site-main-menu' );
			}
		} );
	} );

	wp.customize('font_headings', function( value ) {
		value.bind( function( to ) {
			ibsen_font_bind( to, 'h1:not(.site-title), h2, h3, h4, h5, h6, blockquote' );
		} );
	} );

	wp.customize('fs_base', function( value ) {
		value.bind( function( to ) {
			$('body,button,input,select,textarea').css( {'font-size': to + 'px'} );
		} );
	} );


} )( jQuery );

function ibsen_font_bind( to, style_class ) {
	if ( to == '' || to == 'Arial, Helvetica, sans-serif' || to == 'Impact, Charcoal, sans-serif' || to == '"Lucida Sans Unicode", "Lucida Grande", sans-serif' || to == 'Tahoma, Geneva, sans-serif' || to == '"Trebuchet MS", Helvetica, sans-serif' || to == 'Verdana, Geneva, sans-serif' || to == 'Georgia, serif' || to == '"Palatino Linotype", "Book Antiqua", Palatino, serif' || to == '"Times New Roman", Times, serif' ) {
	} else {
		var googlefont = encodeURI(to.replace(" ", "+"));
		jQuery('head').append('<link href="//fonts.googleapis.com/css?family=' + googlefont + '" type="text/css" media="all" rel="stylesheet">');
		to = to.substr(0, to.indexOf(':'));
		to = "'" + to + "'";
	}
	jQuery(style_class).css({
		fontFamily: to
	});
}

function ibsen_font_style( to, style_class ) {
	if ( to == 'italic' ) {
		var to_style = 'italic';
	} else {
		var to_style = 'normal';
	}
	jQuery(style_class).css( {'font-style': to_style } );
}

function ibsen_hex2rgba( colour, opacity ) {
	var r,g,b;
	if ( colour.charAt(0) == '#') {
	colour = colour.substr(1);
	}

	r = colour.charAt(0) + '' + colour.charAt(1);
	g = colour.charAt(2) + '' + colour.charAt(3);
	b = colour.charAt(4) + '' + colour.charAt(5);

	r = parseInt( r,16 );
	g = parseInt( g,16 );
	b = parseInt( b,16);
	return 'rgba(' + r + ',' + g + ',' + b + ',' + opacity + ')';
}
