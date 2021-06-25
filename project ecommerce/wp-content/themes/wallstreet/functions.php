<?php
/* * Theme Name	: wallstreet
 * Theme Core Functions and Codes
 */

// Global variables define
if (!function_exists('wp_body_open')) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action('wp_body_open');
    }

}

/* * Includes reqired resources here* */
define('WALLSTREET_TEMPLATE_DIR_URI', get_template_directory_uri());
define('WALLSTREET_TEMPLATE_DIR', get_template_directory());
define('WALLSTREET_THEME_FUNCTIONS_PATH', WALLSTREET_TEMPLATE_DIR . '/functions');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/menu/wallstreet_nav_walker.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/font/font.php');
//Customizer
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-pro-feature.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-copyright.php');
//require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-home.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-social.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer-blog.php');
require( WALLSTREET_THEME_FUNCTIONS_PATH . '/customizer/customizer_recommended_plugin.php');

// add detect button
add_action('admin_init', 'wallstreet_detect_button');

function wallstreet_detect_button() {
    wp_enqueue_style('wallstreet-info-button', WALLSTREET_TEMPLATE_DIR_URI . '/css/import-button.css');
}

// add style
function wallstreet_custom_enqueue_css() {
    wp_enqueue_style('wallstreet-drag-drop', WALLSTREET_TEMPLATE_DIR_URI . '/css/drag-drop.css');
}

add_action('admin_print_styles', 'wallstreet_custom_enqueue_css', 10);

//wp title tag starts here
function wallstreet_head($title, $sep) {
    global $paged, $page;
    if (is_feed())
        return $title;

// Add the site name.
    $title .= get_bloginfo('name', 'display');

// Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        $title = "$title $sep $site_description";

// Add a page number if necessary.
    if (( $paged >= 2 || $page >= 2 ) && !is_404())
        $title = "$title $sep " . sprintf(esc_html__('Page', 'wallstreet'), max($paged, $page));

    return $title;
}

add_filter('wp_title', 'wallstreet_head', 10, 2);

require_once('wallstreet_theme_setup_data.php');

add_action('after_setup_theme', 'wallstreet_setup');

function wallstreet_setup() {
    global $content_width;
    if (!isset($content_width))
        $content_width = 600; //In PX


// Load text domain for translation-ready
    load_theme_textdomain('wallstreet', WALLSTREET_TEMPLATE_DIR . '/language');

    add_theme_support('post-thumbnails'); //supports featured image
    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', esc_html__('Primary Menu', 'wallstreet')); //Navigation
    // theme support
    $args = array('default-color' => '000000',);
    add_theme_support('custom-background', $args);
    add_theme_support('automatic-feed-links');

    // woocommerce support
    add_theme_support('woocommerce');

    //Added Woocommerce Galllery Support
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    //Add theme Support Title Tag
    add_theme_support('title-tag');

    //Custom logo
    add_theme_support('custom-logo', array(
        'height' => 50,
        'width' => 250,
        'flex-height' => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    add_editor_style();

    add_action('wp_enqueue_scripts', 'wallstreet_scripts');
    if (is_singular()) {
        wp_enqueue_script("comment-reply");
    }

    //About Theme
    $theme = wp_get_theme(); // gets the current theme
    if ('Wallstreet' == $theme->name) {
        if (is_admin()) {
            require get_template_directory() . '/admin/admin-init.php';
        }
    }
}

// Read more tag to formatting in blog page
function wallstreet_new_content_more($more) {
    global $post;
    return '<div class=\"blog-btn-col\"><a href="' . esc_url(get_permalink()) . "#more-{$post->ID}\" class=\"blog-btn\">" . esc_html__('Read More', 'wallstreet') . '</a></div>';
}

add_filter('the_content_more_link', 'wallstreet_new_content_more');

/* sidebar */
add_action('widgets_init', 'wallstreet_widgets_init');

function wallstreet_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar widget area', 'wallstreet'),
        'id' => 'sidebar_primary',
        'description' => esc_html__('Sidebar widget area', 'wallstreet'),
        'before_widget' => '<div class="sidebar-widget" >',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar-widget-title"><h2>',
        'after_title' => '</h2></div>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer widget area', 'wallstreet'),
        'id' => 'footer-widget-area',
        'description' => esc_html__('Footer widget area', 'wallstreet'),
        'before_widget' => '<div class="col-md-3 col-sm-6 footer_widget_column">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="footer_widget_title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('WooCommerce sidebar widget area', 'wallstreet'),
        'id' => 'woocommerce',
        'description' => esc_html__('WooCommerce sidebar widget area', 'wallstreet'),
        'before_widget' => '<div class="sidebar-widget" >',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
}

function wallstreet_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-responsive comment-img img-circle", $class);
    return $class;
}

add_filter('get_avatar', 'wallstreet_add_gravatar_class');

function wallstreet_scripts() {
    $current_options = get_option('wallstreet_pro_options');
    wp_enqueue_style('wallstreet-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', WALLSTREET_TEMPLATE_DIR_URI . '/css/bootstrap.css');
    wp_enqueue_style('wallstreet-default', WALLSTREET_TEMPLATE_DIR_URI . '/css/default.css');
    wp_enqueue_style('wallstreet-theme-menu', WALLSTREET_TEMPLATE_DIR_URI . '/css/theme-menu.css');
    wp_enqueue_style('wallstreet-media-responsive', WALLSTREET_TEMPLATE_DIR_URI . '/css/media-responsive.css');
    wp_enqueue_style('wallstreet-font-awesome-min', WALLSTREET_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('wallstreet-tool-tip', WALLSTREET_TEMPLATE_DIR_URI . '/css/css-tooltips.css');
    wp_enqueue_script('wallstreet-menu', WALLSTREET_TEMPLATE_DIR_URI . '/js/menu/menu.js', array('jquery'));
    wp_enqueue_script('wallstreet-bootstrap', WALLSTREET_TEMPLATE_DIR_URI . '/js/bootstrap.min.js');
}

add_action('admin_init', 'wallstreet_customizer_css');

function wallstreet_customizer_css() {
    wp_enqueue_style('wallstreet-customizer-info', WALLSTREET_TEMPLATE_DIR_URI . '/css/pro-feature.css');
}

// code for comment
if (!function_exists('wallstreet_comment')) {

    function wallstreet_comment($comment, $args, $depth) {
        global $comment_data;
//translations
        $leave_reply = isset($comment_data['translation_reply_to_coment']) ? $comment_data['translation_reply_to_coment'] : esc_html__('Reply', 'wallstreet');
        ?>
        <div <?php comment_class('media comment_box'); ?> id="comment-<?php comment_ID(); ?>">
            <a class="pull-left-comment" href="<?php the_author_meta('user_url'); ?>"><?php echo get_avatar($comment, 70); ?></a>
            <div class="media-body">
                <div class="comment-detail">
                    <h4 class="comment-detail-title"><?php comment_author(); ?><span class="comment-date"><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php esc_html_e('Posted on &nbsp;', 'wallstreet'); ?><?php echo esc_html(comment_time('g:i a')); ?><?php echo " - ";
                echo esc_html(comment_date('M j, Y')); ?></a></span></h4>
                    <?php comment_text(); ?>
        <?php edit_comment_link(esc_html__('Edit', 'wallstreet'), '<p class="edit-link">', '</p>'); ?>
                    <div class="reply">
        <?php comment_reply_link(array_merge($args, array('reply_text' => $leave_reply, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'per_page' => $args['per_page']))) ?>
                    </div>
        <?php if ($comment->comment_approved == '0') : ?>
                        <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'wallstreet'); ?></em>
                        <br/>
        <?php endif; ?>
                </div>
            </div>
        </div>
    <?php
    }

}
// end of wallstreet_comment function

add_action('wp_head', 'wallstreet_head_enqueue_custom_css');

function wallstreet_head_enqueue_custom_css() {

    $current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());
    if ($current_options['webrit_custom_css'] != '') {
        ?>
        <style>
        <?php echo esc_html($current_options['webrit_custom_css']); ?>
        </style>
    <?php
    }
}

function wallstreet_custmizer_style() {

    wp_enqueue_style('wallstreet-customizer-css', WALLSTREET_TEMPLATE_DIR_URI . '/css/cust-style.css');
}

add_action('customize_controls_print_styles', 'wallstreet_custmizer_style');


require_once get_template_directory() . '/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'wallstreet_register_required_plugins');

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function wallstreet_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name' => esc_html__('Contact Form 7','wallstreet'),
            'slug' => 'contact-form-7',
            'required' => false,
        ),
        array(
            'name' => esc_html__('Webriti Companion','wallstreet'),
            'slug' => 'webriti-companion',
            'required' => false,
        )
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'wallstreet', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}

// add css on activate webriti-companion plugin

$wallstreet_pluginList = get_option('active_plugins');
$wallstreet_webriti_companion_plugin = 'webriti-companion/webriti-companion.php';
if (!in_array($wallstreet_webriti_companion_plugin, $wallstreet_pluginList)) :
    add_action('wp_head', 'wallstreet_homepage_blog_css');

    function wallstreet_homepage_blog_css() {
        echo '<style type="text/css">
			.home-blog-section {
			    padding: 140px 0 20px!important;
			}
	  	 </style>';
    }


endif;

//Set for old user
if (!get_option('wallstreet_user', false)) {
     //detect old user and set value
    $wallstreet_green_user = get_option('wallstreet_pro_options', array());
    if ((isset($wallstreet_green_user['service_title']) || isset($wallstreet_green_user['service_description']) || isset($wallstreet_green_user['home_blog_heading']) || isset($wallstreet_green_user['home_blog_description']))) {
        add_option('wallstreet_user', 'old');
    }else{
        add_option('wallstreet_user', 'new');
    }
}

//Custom CSS compatibility
$wallstreet_current_options = wp_parse_args(get_option('wallstreet_pro_options', array()), wallstreet_theme_data_setup());
if ($wallstreet_current_options['webrit_custom_css'] != '' && $wallstreet_current_options['webrit_custom_css'] != 'nomorenow') {
    $wallstreet_css = '';
    $wallstreet_css .= $wallstreet_current_options['webrit_custom_css'];
    $wallstreet_css .= (string) wp_get_custom_css(get_stylesheet());
    $wallstreet_current_options['webrit_custom_css'] = 'nomorenow';
    update_option('wallstreet_pro_options', $wallstreet_current_options);
    wp_update_custom_css_post($wallstreet_css, array());
}
