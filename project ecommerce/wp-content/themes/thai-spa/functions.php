<?php
function thai_spa_css() {
	$parent_style = 'hantus-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'thai-spa-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('thai-spa-default',get_stylesheet_directory_uri() .'/assets/css/colors/default.css');
	wp_dequeue_style('hantus-default');
	
	wp_enqueue_style('thai-spa-responsive',get_stylesheet_directory_uri().'/assets/css/responsive.css');
	wp_dequeue_style('hantus-responsive');
	wp_dequeue_style('hantus-fonts');

}
add_action( 'wp_enqueue_scripts', 'thai_spa_css',999);
   	

function thai_spa_setup()	{
	
	add_theme_support( 'custom-header', apply_filters( 'thai_spa_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'ffffff',
		'width'                  => 2000,
		'height'                 => 200,
		'flex-height'            => true,
		'wp-head-callback'       => 'hantus_header_style',
	) ) );
	
	add_editor_style( array( 'assets/css/editor-style.css', thai_spa_google_font() ) );
}
add_action( 'after_setup_theme', 'thai_spa_setup' );
	
/**
 * Register Google fonts for thai-spa.
 */
function thai_spa_google_font() {
	
   $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Dancing Script:400,700', 'Rubik:300,400,500,700,900');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

function thai_spa_scripts_styles() {
    wp_enqueue_style( 'thai-spa-fonts', thai_spa_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'thai_spa_scripts_styles' );


/**
 * Called all the Customize file.
 */
require( get_stylesheet_directory() . '/inc/customize/thai-spa-premium.php');