<?php
/**
 * Template part for displaying single posts
 *
 * @package Ibsen
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				ibsen_posted_by();
				ibsen_posted_on();
				?>
			</div><!-- .entry-meta -->
		<?php endif;

		ibsen_post_thumbnail(); ?>
	</header><!-- .entry-header -->


	<div class="entry-content single-entry-content">
		<?php

		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ibsen' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ibsen_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
