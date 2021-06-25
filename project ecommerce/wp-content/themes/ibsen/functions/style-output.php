<?php
/**
 * Output the customizer styling changes
 *
 * @package Ibsen
 */
if ( !function_exists( 'ibsen_css_font_family' ) ) {
	function ibsen_css_font_family( $font_family ) {
		if ( strpos( $font_family, ':' ) ) {
			$font_family = substr( $font_family, 0, strpos( $font_family, ':' ) );
			return 'font-family:\'' . ibsen_esc_font_family( $font_family ) . '\'';
		} else {			
			return 'font-family:' . ibsen_esc_font_family( $font_family );
		}
	}
}


function ibsen_esc_font_family( $input ) {
	$input = wp_kses( $input, array(
		'"' => array(),
		)
	);
	return $input;
}


if ( !function_exists( 'ibsen_dynamic_style' ) ) {
	function ibsen_dynamic_style( $css = array() ) {

		$font_content = get_theme_mod( 'font_content' );
		$font_headings = get_theme_mod( 'font_headings' );
		$font_site_title = get_theme_mod( 'font_site_title' );
		$font_nav = get_theme_mod( 'font_nav' );

		if ( $font_content ) {
			$font_site_title_on = 1;
			$font_nav_on = 1;
			$css[] = 'body,button,input,select,textarea{' . ibsen_css_font_family( $font_content ) . ';}';
			if ( $font_site_title ) {
				$css[] = '.site-title{' . ibsen_css_font_family( $font_site_title ) . ';}';
			} else {
				$css[] = '.site-title{font-family:\'Sanchez\';}';
			}
			if ( $font_nav ) {
				$css[] = '#site-navigation .site-main-menu{' . ibsen_css_font_family( $font_nav ) . ';}';
			} else {
				$css[] = '#site-navigation .site-main-menu{font-family:\'Open Sans\';}';
			}
		} else {
			$font_site_title_on = 0;
			$font_nav_on = 0;
		}

		if ( $font_headings ) {
			$css[] = 'h1:not(.site-title),h2,h3,h4,h5,h6,blockquote{' . ibsen_css_font_family( $font_headings ) . ';}';
		}

		if ( $font_site_title && $font_site_title_on == 0 ) {
			$css[] = '.site-title{' . ibsen_css_font_family( $font_site_title ) . ';}';
		}

		if ( $font_nav && $font_nav_on == 0 ) {
			$css[] = '#site-navigation .site-main-menu{' . ibsen_css_font_family( $font_nav ) . ';}';
		}
		
		$fs_base = get_theme_mod( 'fs_base', '16' );
		if ( $fs_base && $fs_base != '16' ) {
			$css[] = 'body,button,input,select,textarea{font-size:' . esc_attr($fs_base) . 'px;}';
		}

		if ( class_exists( 'WooCommerce' ) ) {
			$woo_uncat_id = term_exists( 'uncategorized', 'product_cat' );
			if ( $woo_uncat_id != NULL ) {
				$woo_uncat_id = $woo_uncat_id['term_id'];
				$css[] = '#shop-filters .widget_product_categories li.cat-item-' . $woo_uncat_id . '{display:none;}';
			}
		}

		$container_width = get_theme_mod( 'container_width', '1400' );
		if ( $container_width && $container_width != '1400' ) {
			$css[] = '.container{max-width:' . esc_attr($container_width) . 'px;}';
		}

		$color1 = get_theme_mod( 'color1', '#f53b57' );
		if ( $color1 && $color1 != '#f53b57' ) {
			$color1 = esc_attr($color1);

			$css[] = 'a,#masthead .top-account .mini-account a,#masthead .top-cart .mini-cart a,.site-footer a,#add_payment_method .cart-collaterals .cart_totals .discount td,.woocommerce-cart .cart-collaterals .cart_totals .discount td,.woocommerce-checkout .cart-collaterals .cart_totals .discount td,.has-accent-color-color,.infinite-loader{color:' . $color1 . ';}';

			$css[] = '.button,a.button,button,input[type="button"],input[type="reset"],input[type="submit"],#infinite-handle span button,#infinite-handle span button:hover,#infinite-handle span button:focus,#infinite-handle span button:active,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce a.added_to_cart,.woocommerce #respond input#submit.alt.disabled,.woocommerce #respond input#submit.alt.disabled:hover,.woocommerce #respond input#submit.alt:disabled,.woocommerce #respond input#submit.alt:disabled:hover,.woocommerce #respond input#submit.alt:disabled[disabled],.woocommerce #respond input#submit.alt:disabled[disabled]:hover,.woocommerce a.button.alt.disabled,.woocommerce a.button.alt.disabled:hover,.woocommerce a.button.alt:disabled,.woocommerce a.button.alt:disabled:hover,.woocommerce a.button.alt:disabled[disabled],.woocommerce a.button.alt:disabled[disabled]:hover,.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt:disabled[disabled],.woocommerce button.button.alt:disabled[disabled]:hover,.woocommerce input.button.alt.disabled,.woocommerce input.button.alt.disabled:hover,.woocommerce input.button.alt:disabled,.woocommerce input.button.alt:disabled:hover,.woocommerce input.button.alt:disabled[disabled],.woocommerce input.button.alt:disabled[disabled]:hover,#masthead .top-cart.items,#masthead .top-cart.items:hover,#footer-menu a[href^="mailto:"]:before,.widget_nav_menu a[href^="mailto:"]:before,#footer-menu a[href^="tel:"]:before,.widget_nav_menu a[href^="tel:"]:before,.pagination a:hover,.pagination .current,.woocommerce nav.woocommerce-pagination ul li a:focus,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li span.current,.wc-block-grid__product-onsale{background:' . $color1 . ';}';
			
			$css[] = '.woocommerce .sale-flash,.woocommerce ul.products li.product .sale-flash,#yith-quick-view-content .onsale,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.wp-block-button__link,.has-accent-color-background-color,.wc-block-price-filter .wc-block-price-filter__range-input::-webkit-slider-thumb,.wc-block-price-filter .wc-block-price-filter__range-input::-moz-range-thumb,.wc-block-price-filter .wc-block-price-filter__range-input::-webkit-slider-thumb,.wc-block-price-filter .wc-block-price-filter__range-input::-moz-range-thumb{background-color:' . $color1 . ';}';

			$css[] = '.woocommerce-info,.woocommerce-message{border-color:' . $color1 . ';}';

			$css[] = '.wc-block-price-filter .wc-block-price-filter__range-input-wrapper .wc-block-price-filter__range-input-progress,.rtl .wc-block-price-filter .wc-block-price-filter__range-input-wrapper .wc-block-price-filter__range-input-progress{--range-color:' . $color1 . ';}';

		}


		if ( get_theme_mod( 'header_search_off' ) ) {
			$css[] = '#masthead .top-search{display:none;}';
		}

		return implode( '', $css );

	}
}


if ( !function_exists( 'ibsen_editor_dynamic_style' ) ) {
	function ibsen_editor_dynamic_style( $mceInit, $css = array() ) {

		$font_content = get_theme_mod( 'font_content' );
		if ( $font_content ) {
			$css[] = 'body.mce-content-body{' . ibsen_css_font_family( $font_content ) . ';}';
		}

		$font_headings = get_theme_mod( 'font_headings' );
		if ( $font_headings ) {
			$css[] = '.mce-content-body h1,.mce-content-body h2,.mce-content-body h3,.mce-content-body h4,.mce-content-body h5,.mce-content-body h6{' . ibsen_css_font_family( $font_headings ) . ';}';
		}

		$color1 = get_theme_mod( 'color1' );
		if ( $color1 ) {
			$css[] = '.mce-content-body a:not(.button),.mce-content-body a:hover:not(.button),.mce-content-body a:focus:not(.button),.mce-content-body a:active:not(.button){color:' . esc_attr( $color1 ) . '}';
		}

		$styles = implode( '', $css );

		if ( isset( $mceInit['content_style'] ) ) {
			$mceInit['content_style'] .= ' ' . $styles . ' ';
		} else {
			$mceInit['content_style'] = $styles . ' ';
		}
		return $mceInit;

	}
}
add_filter( 'tiny_mce_before_init', 'ibsen_editor_dynamic_style' );


function ibsen_block_editor_dynamic_style( $css = array() ) {

	$container_width = get_theme_mod( 'container_width', '1400' );
		if ( $container_width && $container_width != '1400' ) {
			$css[] = '.wp-block{max-width:' . esc_attr ($container_width ) . 'px;}';
		}

	$background_color = get_theme_mod( 'background_color', 'fdfdfd' );
	if ( $background_color && $background_color != 'fdfdfd' ) {
		$css[] = '.block-editor-editor-skeleton__body{background-color:#' . esc_attr( $background_color ) . '}';
	}

	$font_content = get_theme_mod( 'font_content', 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i' );
	if ($font_content && $font_content != 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i' ) {
		$css[] = '.editor-default-block-appender textarea.editor-default-block-appender__content,.editor-styles-wrapper div,.editor-styles-wrapper p,.editor-styles-wrapper ul,.editor-styles-wrapper li{' . ibsen_css_font_family( $font_content ) . ';}';
	}

	$font_headings = get_theme_mod( 'font_headings', 'Sanchez:400,400i' );
	if ($font_headings && $font_headings != 'Sanchez:400,400i' ) {
		$css[] = '.editor-post-title__block .editor-post-title__input,.editor-styles-wrapper h1,.editor-styles-wrapper h2,.editor-styles-wrapper h3,.editor-styles-wrapper h4,.editor-styles-wrapper h5,.editor-styles-wrapper h6,.wp-block-latest-posts.is-grid li > a > div{' . ibsen_css_font_family( $font_headings ) . ';}';
	}

	$color1 = get_theme_mod( 'color1' );
	if ($color1 && $color1 != "#f53b57") {		
		$css[] = '.editor-rich-text__tinymce a,.block-editor-rich-text__editable a{color:'.esc_attr($color1).'}';

		$css[] = '.editor-styles-wrapper .wc-block-grid__products .wc-block-grid__product .wc-block-grid__product-onsale{background:' . esc_attr( $color1 ) . ';}';

		$css[] = '.woocommerce .sale-flash,.woocommerce ul.products li.product .sale-flash,#yith-quick-view-content .onsale,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.wp-block-button__link,.has-accent-color-background-color,.wc-block-price-filter .wc-block-price-filter__range-input::-webkit-slider-thumb,.wc-block-price-filter .wc-block-price-filter__range-input::-moz-range-thumb,.wc-block-price-filter .wc-block-price-filter__range-input::-webkit-slider-thumb,.wc-block-price-filter .wc-block-price-filter__range-input::-moz-range-thumb{background-color:' . esc_attr( $color1 ) . ';}';

		$css[] = '.wc-block-price-filter .wc-block-price-filter__range-input-wrapper .wc-block-price-filter__range-input-progress,.rtl .wc-block-price-filter .wc-block-price-filter__range-input-wrapper .wc-block-price-filter__range-input-progress{--range-color:' . esc_attr( $color1 ) . ';}';
	}

	return implode( '', $css );

}
