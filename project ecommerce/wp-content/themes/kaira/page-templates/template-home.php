<?php
/**
 * Template Name: Custom Homepage
 *
 * This is a home page template which uses slider with featured posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kaira
 */

get_header(); 

if( is_front_page() ){

  if ( 1 == get_theme_mod( 'kaira_slider_settings' ) ) {
    get_template_part( 'template-parts/content', 'home-slider' );
  }
  elseif( get_header_image() ){ ?>
    <div class="slider">
      <div class="container">
      <img src="<?php header_image();?>">
    </div>
    </div>
  <?php }

  if ( 1 == get_theme_mod( 'kaira_front_featured_posts' ) ) {
    get_template_part( 'template-parts/content', 'home-featured' );
  }
}
?>

<div id="content" class="site-content">
  <div class="container">
    <div class="row">
     <div class="col-md-7">
       <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
         <?php

         /* Start the Loop */
         do_action( 'kaira_homepages_posts' ); ?>

      </main><!-- #main -->
    </div><!-- #primary -->
  </div><!-- col-id-7 -->

  <?php
  get_sidebar();
  get_footer();
