<?php
/**
 * Ibsen functions and definitions
 *
 * @package Ibsen
 */

if ( ! function_exists( 'ibsen_setup' ) ) :

//Sets up theme defaults and registers support for various WordPress features

function ibsen_setup() {
	// Make theme available for translation
	load_theme_textdomain( 'ibsen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Support for WooCommerce
	add_theme_support( 'woocommerce', array(
		'product_grid' => array(
			'min_columns' => 2,
			'max_columns' => 8,
		),
	) );

	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'ibsen' ),
		'footer' => esc_html__( 'Footer Menu', 'ibsen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enable support for post formats
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat',
	) );

	// Set up the WordPress core custom background feature
	add_theme_support( 'custom-background', apply_filters( 'ibsen_custom_background_args', array(
		'default-color' => 'fdfdfd',
		'default-image' => '',
	) ) );

	// Enable support for Custom Logo
	add_theme_support( 'custom-logo', array(
		'width'		=> '',
		'height'	=> '',
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Enable support for widgets selective refresh
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Style the visual editor to resemble the theme style
	add_editor_style( array( 'css/editor-style.css', ibsen_editor_fonts_url() ) );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Support for Gutenberg (5.0+ block editor)
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-color-palette', ibsen_custom_color_palette() );

	// https://jetpack.com/support/infinite-scroll/
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer' => false,
	) );

}
endif; // ibsen_setup
add_action( 'after_setup_theme', 'ibsen_setup' );

function ibsen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ibsen_content_width', 1160 );
}
add_action( 'after_setup_theme', 'ibsen_content_width', 0 );

// Set up the WordPress core custom header feature
function ibsen_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ibsen_custom_header_args', array(
		'default-image'			=> '',
		'default-text-color'	=> 'ffffff',
		'header_text'			=> true,
		'width'					=> '1920',
		'height'				=> '110',
		'flex-height'			=> false,
		'flex-width'			=> false,
		'wp-head-callback'		=> '',
	) ) );
}
add_action( 'after_setup_theme', 'ibsen_custom_header_setup' );

// Enables the Excerpt meta box in Page edit screen
function ibsen_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'ibsen_add_excerpt_support_for_pages' );

// Register widget area
function ibsen_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'ibsen' ),
		'id'            => 'ibsen-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="sidebar-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Sidebar', 'ibsen' ),
		'id'            => 'ibsen-sidebar-homepage',
		'description'   => esc_html__( 'Used when you have a static page as your homepage.', 'ibsen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="page-sidebar-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'ibsen' ),
		'id'            => 'ibsen-sidebar-page',
		'description'   => esc_html__( 'Other standard pages that are not the static homepage.', 'ibsen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="page-sidebar-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'ibsen' ),
		'id'            => 'ibsen-sidebar-shop',
		'description'   => esc_html__( 'Requires WooCommerce plugin.', 'ibsen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="shop-sidebar-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Filters', 'ibsen' ),
		'id'            => 'ibsen-sidebar-shop-filters',
		'description'   => esc_html__( 'Horizontal widget area for product archives. Requires WooCommerce plugin.', 'ibsen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="shop-filters-widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top Bar', 'ibsen' ),
		'id'            => 'ibsen-top-bar',
		'description'   => esc_html__( 'Add your own content above the header.', 'ibsen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="top-bar-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top Footer', 'ibsen' ),
		'description'   => esc_html__( 'Full width area above the footer columns.', 'ibsen' ),
		'id'            => 'ibsen-above-footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="above-footer-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'ibsen' ),
		'id'            => 'ibsen-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'ibsen' ),
		'id'            => 'ibsen-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'ibsen' ),
		'id'            => 'ibsen-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

}
add_action( 'widgets_init', 'ibsen_widgets_init' );

if ( ! function_exists( 'ibsen_fonts_url' ) ) :
/**
 * Register Google fonts for Ibsen
 * @return string Google fonts URL for the theme
 */
function ibsen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google fonts: on or off', 'ibsen' ) ) {

		$fonts[] = get_theme_mod( 'font_site_title', 'Sanchez:400,400i' );
		$fonts[] = get_theme_mod( 'font_nav', 'Sanchez:400,400i' );
		$fonts[] = get_theme_mod( 'font_content', 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i' );
		$fonts[] = get_theme_mod( 'font_headings', 'Sanchez:400,400i' );

		$fonts = str_replace('Arial, Helvetica, sans-serif', '', $fonts);
		$fonts = str_replace('Impact, Charcoal, sans-serif', '', $fonts);
		$fonts = str_replace('"Lucida Sans Unicode", "Lucida Grande", sans-serif', '', $fonts);
		$fonts = str_replace('Tahoma, Geneva, sans-serif', '', $fonts);
		$fonts = str_replace('"Trebuchet MS", Helvetica, sans-serif', '', $fonts);
		$fonts = str_replace('Verdana, Geneva, sans-serif', '', $fonts);
		$fonts = str_replace('Georgia, serif', '', $fonts);
		$fonts = str_replace('"Palatino Linotype", "Book Antiqua", Palatino, serif', '', $fonts);
		$fonts = str_replace('"Times New Roman", Times, serif', '', $fonts);

	}

	$fonts = array_filter( $fonts );

	if ( empty( $fonts ) ) {
		$google_fonts_empty = 1;
	} else {
		$google_fonts_empty = 0;
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'ibsen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $google_fonts_empty == 0 ) {
		$fonts_url = add_query_arg( array(
			'family' =>  urlencode( implode( '|', array_unique($fonts) ) ),
			'subset' =>  urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
		return esc_url_raw($fonts_url);
	} else {
		return;
	}
}
endif;

if ( ! function_exists( 'ibsen_editor_fonts_url' ) ) :
/**
 * Register Google fonts for Ibsen
 * @return string Google fonts URL for the tinyMCE editor
 */
function ibsen_editor_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google fonts: on or off', 'ibsen' ) ) {

		$fonts[] = get_theme_mod( 'font_site_title', 'Sanchez:400,400i' );
		$fonts[] = get_theme_mod( 'font_nav', 'Sanchez:400,400i' );
		$fonts[] = get_theme_mod( 'font_content', 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i' );
		$fonts[] = get_theme_mod( 'font_headings', 'Sanchez:400,400i' );

		$fonts = str_replace('Arial, Helvetica, sans-serif', '', $fonts);
		$fonts = str_replace('Impact, Charcoal, sans-serif', '', $fonts);
		$fonts = str_replace('"Lucida Sans Unicode", "Lucida Grande", sans-serif', '', $fonts);
		$fonts = str_replace('Tahoma, Geneva, sans-serif', '', $fonts);
		$fonts = str_replace('"Trebuchet MS", Helvetica, sans-serif', '', $fonts);
		$fonts = str_replace('Verdana, Geneva, sans-serif', '', $fonts);
		$fonts = str_replace('Georgia, serif', '', $fonts);
		$fonts = str_replace('"Palatino Linotype", "Book Antiqua", Palatino, serif', '', $fonts);
		$fonts = str_replace('"Times New Roman", Times, serif', '', $fonts);

	}

	$fonts = array_filter( $fonts );

	if ( empty( $fonts ) ) {
		$google_fonts_empty = 1;
	} else {
		$google_fonts_empty = 0;
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'ibsen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $google_fonts_empty == 0 ) {
		$fonts_url = add_query_arg( array(
			'family' =>  urlencode( implode( '|', array_unique($fonts) ) ),
			'subset' =>  urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
		return esc_url_raw($fonts_url);
	} else {
		return;
	}
}
endif;

/**
 * Enqueue scripts and styles.
 */
function ibsen_scripts() {
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_script( 'ibsen-custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'ibsen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0', true );
	wp_enqueue_style( 'ibsen-fonts', ibsen_fonts_url(), array(), null );
	wp_enqueue_style( 'ibsen-style', get_stylesheet_uri() );
	wp_add_inline_style( 'ibsen-style', ibsen_dynamic_style() );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ibsen_scripts' );

/**
 * Enqueue scripts and styles for Block Editor.
 */
function ibsen_block_editor_assets() {
	wp_enqueue_style( 'ibsen-block-editor-fonts', ibsen_editor_fonts_url() );
	wp_enqueue_style( 'ibsen-block-editor-style', get_template_directory_uri() . '/css/block-editor-style.css' );
	wp_add_inline_style( 'ibsen-block-editor-style', ibsen_block_editor_dynamic_style() );
}
add_action( 'enqueue_block_editor_assets', 'ibsen_block_editor_assets' );

/**
 * Custom block editor color palette.
 */
if ( !function_exists( 'ibsen_custom_color_palette' ) ) {
	function ibsen_custom_color_palette() {
		return array(
			array(
				'name' => esc_html__( 'Ibsen - Accent color', 'ibsen' ),
				'slug' => 'accent-color',
				'color' => get_theme_mod( 'color1', '#f53b57' ),
			),
			array(
				'name' => esc_html__( 'Ibsen - Very dark blue', 'ibsen' ),
				'slug' => 'ibsen-very-dark-blue',
				'color' => '#061530',
			),
			array(
				'name' => esc_html__( 'Ibsen - Light grey', 'ibsen' ),
				'slug' => 'ibsen-light-grey',
				'color' => '#f2f3f5',
			),
			array(
				'name' => esc_html__( 'Pale pink', 'ibsen' ),
				'slug' => 'pale-pink',
				'color' => '#f78da7'
			),
			array(
				'name' => esc_html__( 'Vivid red', 'ibsen' ),
				'slug' => 'vivid-red',
				'color' => '#cf2e2e',
			),
			array(
				'name' => esc_html__( 'Luminous vivid orange', 'ibsen' ),
				'slug' => 'luminous-vivid-orange',
				'color' => '#ff6900',
			),
			array(
				'name' => esc_html__( 'Luminous vivid amber', 'ibsen' ),
				'slug' => 'luminous-vivid-amber',
				'color' => '#fcb900',
			),
			array(
				'name' => esc_html__( 'Light green cyan', 'ibsen' ),
				'slug' => 'light-green-cyan',
				'color' => '#7bdcb5',
			),
			array(
				'name' => esc_html__( 'Vivid green cyan', 'ibsen' ),
				'slug' => 'vivid-green-cyan',
				'color' => '#00d084',
			),
			array(
				'name' => esc_html__( 'Pale cyan blue', 'ibsen' ),
				'slug' => 'pale-cyan-blue',
				'color' => '#8ed1fc',
			),
			array(
				'name' => esc_html__( 'Vivid cyan blue', 'ibsen' ),
				'slug' => 'vivid-cyan-blue',
				'color' => '#0693e3',
			),
			array(
				'name' => esc_html__( 'Vivid purple', 'ibsen' ),
				'slug' => 'vivid-purple',
				'color' => '#9b51e0',
			),
			array(
				'name' => esc_html__( 'Very light gray', 'ibsen' ),
				'slug' => 'very-light-gray',
				'color' => '#eeeeee',
			),
			array(
				'name' => esc_html__( 'Cyan bluish gray', 'ibsen' ),
				'slug' => 'cyan-bluish-gray',
				'color' => '#abb8c3',
			),
			array(
				'name' => esc_html__( 'Very dark gray', 'ibsen' ),
				'slug' => 'very-dark-gray',
				'color' => '#313131',
			),
		);
	}
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/functions/template-tags.php';

/**
 * Custom functions.
 */
require get_template_directory() . '/functions/extras.php';
require get_template_directory() . '/functions/style-output.php';
require get_template_directory() . '/functions/fonts.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/functions/customizer-controls.php';
require get_template_directory() . '/functions/customizer.php';

/**
 * Theme help page.
 */
if ( is_admin() ) {
	require get_template_directory() . '/functions/theme-help.php';
}

if ( !function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * TGM Plugin activation.
 */
require_once get_template_directory() . '/functions/class-tgm-plugin-activation.php';
function ibsen_reg_plugin() {
	$plugins[] = array(
		'name'		=> esc_html__( 'Starter Sites', 'ibsen' ),
		'slug'		=> 'starter-sites',
		'required'	=> false,
	);
	tgmpa( $plugins);
}
add_action( 'tgmpa_register', 'ibsen_reg_plugin' );
