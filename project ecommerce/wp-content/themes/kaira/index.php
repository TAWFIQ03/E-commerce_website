<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kaira
 */

get_header(); ?>

<div id="content" class="site-content">
  <div class="container">
    <div class="row">
     <div class="col-md-7">
       <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
          <?php
          if( have_posts() ) :

            if( is_home() && ! is_front_page() ) : ?>

          <header>
           <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
         </header>

         <?php
         endif;

         /* Start the Loop */
         while ( have_posts() ) : the_post();
         get_template_part( 'template-parts/content', get_post_format() );
         endwhile;
         
		$post_args =  array(
			'screen_reader_text' => ' ',
			'prev_text' => __( '<div class="chevronne"><i class="fa fa-chevron-left"></i></div>', 'kaira' ),
			'next_text' => __( '<div class="chevronne"><i class="fa fa-chevron-right"></i></div>', 'kaira' ),
			);

		if( get_theme_mod( 'kaira_pagination_type', 'numbered') == 'defaulted' ) { 				
			the_posts_navigation();
		}
		 else{        
			the_posts_pagination( $post_args );        
		 }		 
		 

         else :
          get_template_part( 'template-parts/content', 'none' );
        endif; ?>

      </main><!-- #main -->
    </div><!-- #primary -->
  </div><!-- col-id-7 -->

  <?php
  get_sidebar();
  get_footer();
