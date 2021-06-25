<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kaira
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kaira' ); ?></a>
      <header id="masthead" class="site-header" role="banner">
        <div class="container">
          <div class="site-branding">
            <?php
              the_custom_logo(); ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    <?php
                                        $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) : ?>
                                            <p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
                                    <?php
                                        endif;
                                    ?>                
          </div>
          <nav id="site-navigation" class="main-navigation">

            <div class="menu">
              <?php
                wp_nav_menu( array(
                  'theme_location' => 'menu-1',
                  'menu_id'        => 'primary-menu',
                  'container'      => 'ul',
                  'depth'           => '3',
                  'fallback_cb'    => 'wp_page_menu',
                  'menu_class'     => 'nav_menu',
                  'item_wrap'      => '<ul class="%2$s">%3s</ul>'
                ) );
              ?>
            </div>
          </nav>
        </div>
      </header>
