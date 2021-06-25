<?php

if ( is_page_template( 'template-transparent-header.php' ) ) {
	get_header( 'transparent' );
} else {
	get_header();
}

if ( 'page' == get_option( 'show_on_front' ) ) {
	if ( ! is_active_sidebar( 'ibsen-sidebar-homepage' ) ) {
		$page_full_width = ' full-width';
	} else {
		$page_full_width = '';
	}
?>

	<div id="primary" class="content-area<?php echo $page_full_width;?>">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'front-page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

		endwhile; // End of the loop.

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'homepage' ); ?>

<?php get_footer(); ?>

<?php
} else {

	get_template_part( 'home' );

}
?>