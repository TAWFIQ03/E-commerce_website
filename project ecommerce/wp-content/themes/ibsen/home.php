<?php
/**
 * The template for displaying the blog home
 *
 * @package Ibsen
 */

get_header();

if ( ! is_active_sidebar( 'ibsen-sidebar' ) ) {
	$page_full_width = ' full-width';
} else {
	$page_full_width = '';
}

$grid_layout = get_theme_mod( 'grid_layout', '2' );
$grid_loop_layout = ' class="layout-'. esc_attr( $grid_layout ) .'"';
$grid_loop_main = ' infinite-grid layout-'. esc_attr( $grid_layout );
?>

	<div id="primary" class="content-area<?php echo $page_full_width;?>">
		<main id="main" class="site-main<?php echo $grid_loop_main;?>" role="main">

		<?php if ( have_posts() ) : ?>

			<div id="grid-loop"<?php echo $grid_loop_layout;?>>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content' ); ?>					

				<?php endwhile; ?>

			</div><!-- #grid-loop -->
		
			<?php the_posts_pagination( array(
						'prev_text' => '<i class="dashicons dashicons-arrow-left-alt2"></i>',
						'next_text' => '<i class="dashicons dashicons-arrow-right-alt2"></i>',
					) ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
