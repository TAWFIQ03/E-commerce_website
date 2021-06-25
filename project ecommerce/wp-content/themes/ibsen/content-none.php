<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Ibsen
 */

?>

<section class="no-results not-found">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'ibsen' ); ?></h1>
	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php
			/* translators: %1$s: link to create new post */
			printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ibsen' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ibsen' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ibsen' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
