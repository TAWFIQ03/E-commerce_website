<?php
/**
 * Royal Shop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Royal Shop
 * @since 1.0.0
 */
/**
 * Theme functions and definitions
 */
if ( ! function_exists( 'royal_shop_setup' ) ) :
define( 'ROYAL_SHOP_THEME_VERSION','1.0.0');
define( 'ROYAL_SHOP_THEME_DIR', get_template_directory() . '/' );
define( 'ROYAL_SHOP_THEME_URI', get_template_directory_uri() . '/' );
define( 'ROYAL_SHOP_THEME_SETTINGS', 'royal-shop-settings' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_royal_shop_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function royal_shop_setup(){
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'royal-shop', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'woocommerce' );
	
		// Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style-editor.css' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		// Add support for Custom Header.
		add_theme_support( 'custom-header', 

			apply_filters( 'royal_shop_custom_header_args', array(
				'default-image' => '',
				'flex-height'   => true,
				'header-text'   => false,
				'video'          => false,
		) 
		) );

		// Recommend plugins
        add_theme_support( 'recommend-plugins', array(
             'z-companion' => array(
                'name' => esc_html__( 'Z Companion', 'royal-shop' ),
                'active_filename' => 'z-companion/z-companion.php',
                'slug'		=> 'z-companion',
            ),
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'royal-shop' ),
                'active_filename' => 'woocommerce/woocommerce.php',
                'slug'			=>	'woocommerce',
            ),
            'woo-smart-wishlist' => array(
                 'name' => esc_html__( 'WPC Smart Wishlist for WooCommerce', 'royal-shop' ),
                 'active_filename' => 'woo-smart-wishlist/wpc-smart-wishlist.php',
                 'slug'				=>	'woo-smart-wishlist',
             ),
            'woo-smart-compare' => array(
                 'name' => esc_html__( 'WPC Smart Compare for WooCommerce', 'royal-shop' ),
                 'active_filename' => 'woo-smart-compare/wpc-smart-compare.php',
                 'slug'			=>	'woo-smart-compare',
             ),
            'lead-form-builder' => array(
                'name' => esc_html__( 'Lead Form Builder', 'royal-shop' ),
                'active_filename' => 'lead-form-builder/lead-form-builder.php',
                'slug'			 =>	'lead-form-builder',
            ),
            'wp-popup-builder' => array(
                'name' => esc_html__( 'WP Popup Builder – Popup Forms & Newsletter', 'royal-shop' ),
                'active_filename' => 'wp-popup-builder/wp-popup-builder.php',
                'slug'			=>	'wp-popup-builder',
            ), 
        ) );

           // Useful plugins
        add_theme_support( 'useful-plugins', array(
             'themehunk-megamenu-plus' => array(
                'name' => esc_html__( 'Megamenu plugin from Themehunk.', 'royal-shop' ),
                'active_filename' => 'themehunk-megamenu-plus/themehunk-megamenu.php',
                'slug'			=>	'themehunk-megamenu-plus',
            )
        ) );
        
		// Add support for Custom Background.
        $args = array(
	    'default-color' => 'fff',
        );	
        add_theme_support( 'custom-background',$args );
		
        $GLOBALS['content_width'] = apply_filters( 'royal_shop_content_width', 640 );
        add_theme_support( 'woocommerce', array(
                                                 'thumbnail_image_width' => 320,
                                             ) );
	}
endif;
add_action( 'after_setup_theme', 'royal_shop_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 */
/**
 * Register widget area.
 */
function royal_shop_widgets_init(){
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'royal-shop' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your primary sidebar.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="royal-shop-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'royal-shop' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your secondary sidebar.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="royal-shop-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header First Widget', 'royal-shop' ),
		'id'            => 'top-header-widget-col1',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Second Widget', 'royal-shop' ),
		'id'            => 'top-header-widget-col2',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Third Widget', 'royal-shop' ),
		'id'            => 'top-header-widget-col3',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
		'name'          => esc_html__( 'Main Header Widget', 'royal-shop' ),
		'id'            => 'main-header-widget',
		'description'   => esc_html__( 'Add widgets here to appear in main header.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar(array(
		'name'          => esc_html__( 'Footer Top First Widget', 'royal-shop' ),
		'id'            => 'footer-top-first',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Second Widget', 'royal-shop' ),
		'id'            => 'footer-top-second',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Third Widget', 'royal-shop' ),
		'id'            => 'footer-top-third',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below First Widget', 'royal-shop' ),
		'id'            => 'footer-below-first',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Second Widget', 'royal-shop' ),
		'id'            => 'footer-below-second',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Third Widget', 'royal-shop' ),
		'id'            => 'footer-below-third',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'royal-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	for ( $i = 1; $i <= 4; $i++ ){
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer Widget Area %d', 'royal-shop' ), $i ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'royal_shop_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function royal_shop_scripts(){
	// enqueue css
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	wp_enqueue_style( 'font-awesome', ROYAL_SHOP_THEME_URI . 'third-party/fonts/font-awesome/css/font-awesome.css', '', ROYAL_SHOP_THEME_VERSION );
	wp_enqueue_style( 'animate', ROYAL_SHOP_THEME_URI . 'css/animate.css','',ROYAL_SHOP_THEME_VERSION);
	wp_enqueue_style( 'royal-shop-menu', ROYAL_SHOP_THEME_URI . 'css/royal-shop-menu.css','',ROYAL_SHOP_THEME_VERSION);
	wp_enqueue_style( 'royal-shop-style', get_stylesheet_uri(), array(), ROYAL_SHOP_THEME_VERSION );
	wp_add_inline_style('royal-shop-style', royal_shop_custom_style());
    //enqueue js
    wp_enqueue_script("jquery-effects-core",array( 'jquery' ));
    wp_enqueue_script( 'jquery-ui-autocomplete',array( 'jquery' ),'',true );
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script('royal-shop-menu-js', ROYAL_SHOP_THEME_URI .'js/royal-shop-menu.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script('sticky-sidebar-js', ROYAL_SHOP_THEME_URI .'js/sticky-sidebar.js', array( 'jquery' ), '1.0.1', true );
    wp_enqueue_script('royal-shop-accordian-menu-js', ROYAL_SHOP_THEME_URI .'js/royal-shop-accordian-menu.js', array( 'jquery' ), ROYAL_SHOP_THEME_VERSION , true );
    wp_enqueue_script( 'royal-shop-custom-js', ROYAL_SHOP_THEME_URI .'js/royal-shop-custom.js', array( 'jquery' ), ROYAL_SHOP_THEME_VERSION , true );
     $royalshoplocalize = array(
     			'royal_shop_move_to_top_optn' => (bool)get_theme_mod('royal_shop_move_to_top',false)
			);
    wp_localize_script( 'royal-shop-custom-js', 'royal_shop',  $royalshoplocalize);
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'royal_shop_scripts' );
/********************************************************/
// Adding Dashicons in WordPress Front-end
/********************************************************/
add_action( 'wp_enqueue_scripts', 'royal_shop_load_dashicons_front_end' );
function royal_shop_load_dashicons_front_end(){
  wp_enqueue_style( 'dashicons' );
}

/**
 * Load init.
 */
require_once trailingslashit(ROYAL_SHOP_THEME_DIR).'inc/init.php';

//custom function conditional check for blog page
function royal_shop_is_blog (){
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}
/**
 * @snippet       Translate a String in WooCommerce (English to Spanish)
 */

if ( class_exists( 'WooCommerce' ) ){

add_filter( 'gettext', 'royal_shop_translate_woocommerce_strings', 999, 3 );
  
function royal_shop_translate_woocommerce_strings( $translated, $untranslated, $domain ) {

 $sale_text = esc_html(get_theme_mod('royal_shop_woo_sale_text','Sale!'));

   if ( ! is_admin() && 'woocommerce' === $domain ) {
 
      switch ( $untranslated ) {
 
         case 'Sale!' :
 
            $translated = $sale_text;
            break;    
      }
   }   
   return $translated;
}
}