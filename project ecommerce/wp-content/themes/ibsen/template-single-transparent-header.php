<?php
/**
 * Template Name: Transparent Header
 * Template Post Type: post
 *
 * A post template with a transparent header and no sidebar.
 *
 * @package Ibsen
 */

get_header( 'transparent' );

?>

	<div id="primary" class="content-area full-width">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single-no-title' ); ?>

				<?php
					the_post_navigation( array(
						'prev_text' => '<span class="nav-title"><i class="dashicons dashicons-arrow-left-alt2"></i>%title</span>',
						'next_text' => '<span class="nav-title">%title<i class="dashicons dashicons-arrow-right-alt2"></i></span>',
					) );

					get_template_part( 'content', 'related' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
