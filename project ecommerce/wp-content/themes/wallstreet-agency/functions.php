<?php
// Global variables define
define('WALLSTREET_AGENCY_PARENT_TEMPLATE_DIR_URI', get_template_directory_uri());
define('WALLSTREET_AGENCY_TEMPLATE_DIR_URI', get_stylesheet_directory_uri());
define('WALLSTREET_AGENCY_TEMPLATE_DIR', trailingslashit(get_stylesheet_directory()));

if (!function_exists('wp_body_open')) {
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }
}

//enqueue default.css
add_action('wp_enqueue_scripts', 'wallstreet_agency_theme_css', 999);

function wallstreet_agency_theme_css() {
    wp_enqueue_style('wallstreet_agency-parent-style', WALLSTREET_AGENCY_PARENT_TEMPLATE_DIR_URI . '/style.css');
    wp_enqueue_style('wallstreet_agency-parent-media-style', WALLSTREET_AGENCY_PARENT_TEMPLATE_DIR_URI . '/css/media-responsive.css');
    wp_enqueue_style('bootstrap', WALLSTREET_AGENCY_PARENT_TEMPLATE_DIR_URI . '/css/bootstrap.css');
    wp_dequeue_style('wallstreet-default', WALLSTREET_AGENCY_PARENT_TEMPLATE_DIR_URI . '/css/default.css');
    wp_enqueue_style('wallstreet_agency-default', WALLSTREET_AGENCY_TEMPLATE_DIR_URI . '/css/default.css');
}

add_action('after_setup_theme', 'wallstreet_agency_theme_setup');

function wallstreet_agency_theme_setup() {
    load_child_theme_textdomain('wallstreet-agency', WALLSTREET_AGENCY_TEMPLATE_DIR . '/languages');
    require( WALLSTREET_AGENCY_TEMPLATE_DIR . '/functions/customizer/customizer-copyright.php' );

    //About Theme
    $theme = wp_get_theme(); // gets the current theme
    if ('Wallstreet Agency' == $theme->name) {
        if (is_admin()) {
            require WALLSTREET_AGENCY_TEMPLATE_DIR . '/admin/admin-init.php';
        }
    }
}

//Set theme Default data
function wallstreet_agency_theme_data_setup() {
    $array_new = array(
        'footer_copyright' => '<p>' . __('Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow">Wallstreet Agency</a> by Webriti', 'wallstreet-agency') . '</p>',
        'footer_social_media_enabled' => false,
        'social_media_twitter_link' => "",
        'social_media_facebook_link' => "",
        'social_media_linkedin_link' => "",
        'social_media_youtube_link' => "",
        'social_media_instagram_link' => "",
    );
    return $result = array_merge($array_new);
}
