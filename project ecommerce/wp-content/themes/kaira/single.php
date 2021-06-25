<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kaira
 */

get_header(); ?>

<div id="content" class="site-content">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post(); //main loop

						get_template_part( 'template-parts/content', 'single' );

            		endwhile; // End of the loop.
					?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();

  if ( get_theme_mod( 'kaira_related_posts' ) == 1) {

    get_template_part( 'template-parts/content', 'related');

  }

 get_footer(); ?>
