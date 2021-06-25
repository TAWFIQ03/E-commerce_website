<?php
/**
 * kaira functions and definitions
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package kaira
 * @subpackage Functions
 * @author     ThemeThread <support@themethread.com>
 * @copyright  Copyright (c) 2017, ThemeThread
 * @link       http://themethread.com/theme/kaira
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'kaira_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kaira_setup() {

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

	//Custom Image Sizes
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'kaira-slider', 1140, 500, true );
	add_image_size( 'kaira-featured', 652, 375, true );
	add_image_size( 'kaira-grid-post', 360, 230, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'kaira' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kaira_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 90,
		'width'       => 250,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),				
	) );
		
	$kaira_header_arg = array(
		'default-image'          => '',
		'width'                  => 1140,
		'height'                 => 500,
		'flex-height'            => true,
		'header-text'            => true,
		'default-text-color'     => '000000',		
		'flex-width'             => false,
		'wp-head-callback' 		 => 'kaira_header_title',		
	);
	add_theme_support( 'custom-header', $kaira_header_arg );

}
endif;
add_action( 'after_setup_theme', 'kaira_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kaira_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kaira_content_width', 640 );
}
add_action( 'after_setup_theme', 'kaira_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kaira_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kaira' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kaira' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area 1', 'kaira' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'kaira' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area 2', 'kaira' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'kaira' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area 3', 'kaira' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'kaira' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
}
add_action( 'widgets_init', 'kaira_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kaira_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'jquery-meanmenu', get_template_directory_uri() . '/css/meanmenu.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
	wp_enqueue_style( 'kaira-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'kaira-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kaira_scripts' );

//Admin css
function kaira_admin_scripts() {

	wp_enqueue_style( 'kaira-admin-style',get_template_directory_uri().'/inc/css/admin.css', '1.0', 'screen' );        
}
add_action( 'customize_controls_enqueue_scripts', 'kaira_admin_scripts' );

/**
 * Register custom fonts.
 */
function kaira_fonts_url() {

	$kaira_fonts_url = '';
	$kaira_fonts = get_theme_mod('kaira_header_font_setting', 'open-sans');

	//Customization Fonts For Header, Nav Menu & Footer
	if($kaira_fonts == 'open-sans'){
			$kaira_opensans = _x('on', 'Open Sans : on or off', 'kaira');
	}
	else{
			$kaira_opensans = _x('off', 'Open Sans : on or off', 'kaira');
	}
	if($kaira_fonts == 'lato'){
			$kaira_lato = _x('on', 'Lato : on or off', 'kaira');
	}
	else
	{
	$kaira_lato = _x('off', 'Lato : on or off', 'kaira');
	}
	if($kaira_fonts == 'source_sans_pro'){
			$kaira_source_sans_pro = _x( 'on', 'Source Sans Pro: on or off', 'kaira' );	}
	else{
			$kaira_source_sans_pro = _x( 'off', 'Source Sans Pro: on or off', 'kaira' );
	}
	if($kaira_fonts == 'roboto'){
			$kaira_roboto = _x('on', 'Roboto : on or off', 'kaira');	}
	else{
			$kaira_roboto = _x('off', 'Roboto : on or off', 'kaira');
	}
	if($kaira_fonts == 'ubuntu'){
			$kaira_ubuntu = _x('on', 'Ubuntu : on or off', 'kaira');
	}
	else{
			$kaira_ubuntu = _x('off', 'Ubuntu : onn or off', 'kaira');
	}


	if ( 'off' !== $kaira_opensans || 'off' !== $kaira_source_sans_pro || 'off' !== $kaira_roboto  || 'off' !== $kaira_lato  || 'off' !== $kaira_ubuntu ) {
	$kaira_font_families = array();

		if ( 'on' == $kaira_opensans ) {
		$kaira_font_families[] = 'Open Sans';
		}

		if ( 'on' == $kaira_source_sans_pro ) {
		$kaira_font_families[] = 'Source Sans Pro:300,400,600,700,900';
		}

		if ( 'on' == $kaira_roboto) {
		$kaira_font_families[] = 'Roboto';
		}

		if('on' == $kaira_lato){
			$kaira_font_families[] = 'Lato';
		}

		if('on' == $kaira_ubuntu){
			$kaira_font_families[] = 'Ubuntu';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $kaira_font_families ) ),
		);

		$kaira_fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $kaira_fonts_url );
}

//Body Fonts
function kaira_body_fonts_url() {
	$kaira_fonts_body_url = '';
	$kaira_body_fonts = get_theme_mod('kaira_body_font_setting', 'source_sans_pro');
	if($kaira_body_fonts == 'open-sans'){
			$kaira_opensans = _x('on', 'Open Sans : on or off', 'kaira');
	}
	else{
			$kaira_opensans = _x('off', 'Open Sans : on or off', 'kaira');
	}
	if($kaira_body_fonts == 'lato'){
			$kaira_lato = _x('on', 'Lato : on or off', 'kaira');
	}
	else
	{
	$kaira_lato = _x('off', 'Lato : on or off', 'kaira');
	}
	if($kaira_body_fonts == 'source_sans_pro'){
			$kaira_source_sans_pro = _x( 'on', 'Source Sans Pro: on or off', 'kaira' );	}
	else{
			$kaira_source_sans_pro = _x( 'off', 'Source Sans Pro: on or off', 'kaira' );
	}
	if($kaira_body_fonts == 'roboto'){
			$kaira_roboto = _x('on', 'Roboto : on or off', 'kaira');	}
	else{
			$kaira_roboto = _x('off', 'Roboto : on or off', 'kaira');
	}
	if($kaira_body_fonts == 'ubuntu'){
			$kaira_ubuntu = _x('on', 'Ubuntu : on or off', 'kaira');
	}
	else{
			$kaira_ubuntu = _x('off', 'Ubuntu : onn or off', 'kaira');
	}
	if ( 'off' !== $kaira_opensans || 'off' !== $kaira_source_sans_pro || 'off' !== $kaira_roboto  || 'off' !== $kaira_lato  || 'off' !== $kaira_ubuntu ) {
	$kaira_font_families = array();

		if ( 'on' == $kaira_opensans ) {
		$kaira_font_families[] = 'Open Sans';
		}

		if ( 'on' == $kaira_source_sans_pro ) {
		$kaira_font_families[] = 'Source Sans Pro:300,400,600,700,900';
		}

		if ( 'on' == $kaira_roboto) {
		$kaira_font_families[] = 'Roboto';
		}

		if('on' == $kaira_lato){
			$kaira_font_families[] = 'Lato';
		}

		if('on' == $kaira_ubuntu){
			$kaira_font_families[] = 'Ubuntu';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $kaira_font_families ) ),
		);

		$kaira_fonts_body_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $kaira_fonts_body_url );

}

function kaira_google_fonts() {
	if ( kaira_fonts_url() == kaira_body_fonts_url() ) {

		wp_enqueue_style( 'kaira-fonts', kaira_fonts_url(), array(), null );	

	}
	else{
	wp_enqueue_style( 'kaira-fonts', kaira_fonts_url(), array(), null );
	wp_enqueue_style( 'kaira-body-fonts', kaira_body_fonts_url(), array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'kaira_google_fonts' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Customizable Fonts
 */
require get_template_directory() . '/inc/style.php';

/**
 * Load Extras functions
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Move textarea of comment form to bottom
 */
function kaira_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'kaira_move_comment_field_to_bottom' );

/**
 * Remove title of archive in archive title
 */
 
function kaira_archive_title ( $title ) {
    $title = single_cat_title( '', false );
    return $title;
} 
 
add_filter( 'get_the_archive_title', 'kaira_archive_title' );


/**
 * Excerpt Length Control
 */

function kaira_customexcerptlength( $length ) {

	if ( is_admin() ) {
		return $length;
	}
	else {
    	return 60;
	}
}

add_filter('excerpt_length', 'kaira_customexcerptlength');