<?php
/**
 * Template part for displaying related posts
 *
 * @package Ibsen
 */
$grid_layout = get_theme_mod( 'grid_layout', '2' );
if ( $grid_layout == 3 ) {
	$posts_per_page = 3;
} else {
	$posts_per_page = 4;
}

$categories = wp_get_post_categories( get_the_id() );

$related_posts = get_posts( array(
	'posts_per_page' => $posts_per_page,
	'category'       => $categories,
	'exclude'        => get_the_id()
) );

if ( count( $related_posts ) > 0 ) { 
	$grid_loop_layout = ' class="layout-'. esc_attr( $grid_layout ) .'"';
	?>

	<div class="related-posts">
		<h3><?php esc_html_e( 'Related', 'ibsen' ) ;?></h3>
		<div id="grid-loop"<?php echo $grid_loop_layout;?>>
			<?php foreach ( $related_posts as $related_post ) { 
					$related_id = $related_post->ID;
				?>
			<article id="post-<?php echo $related_id; ?>" <?php post_class('', $related_id); ?>>

				<?php
				if ( get_post_format($related_id) == 'video' ) {
					$video_content = apply_filters( 'the_content', get_post($related_id)->post_content );
					$video = false;
					// Only get video from the content if a playlist isn't present.
					if ( false === strpos( $video_content, 'wp-playlist-script' ) ) {
						$video = get_media_embedded_in_content( $video_content, array( 'video', 'object', 'embed', 'iframe' ) );
					}
					if ( ! empty( $video ) ) {

						$first_video = true;
						foreach ( $video as $video_html ) {
							if ( $first_video ) {
								echo '<div class="entry-video">';
									echo $video_html;
								echo '</div>';
								$first_video = false;
							}
						}
					} else {
						ibsen_related_post_thumbnail($related_id);
					}
				} else {
					ibsen_related_post_thumbnail($related_id);
				}
				?>

				<header class="entry-header">
					<?php
					if ( !get_the_title($related_id) ) {
					?>
						<h3 class="entry-title"><a href="<?php echo esc_url( get_permalink($related_id) ); ?>" rel="bookmark"><?php esc_html_e( 'No Title', 'ibsen' ); ?></a></h3>
					<?php
					} else {
						echo '<h2 class="entry-title"><a href="' . esc_url( get_permalink($related_id) ) . '" rel="bookmark">' . wp_kses_post( get_the_title($related_id) ) . '</a></h2>';
					}
					?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php $related_excerpt = wp_kses_post( wpautop( get_post_field( 'post_excerpt', $related_id ) ) );
					if ( $related_excerpt == '' ) {
						$related_excerpt = wp_kses_post( wpautop( wp_trim_words( get_post_field( 'post_content', $related_id ), 20 ) ) );
					}
					if ( $related_excerpt != '' ) {
						echo $related_excerpt;
					}
					if ( 'post' === get_post_type($related_id)) : ?>
						<a class="more-tag button" href="<?php echo esc_url( get_the_permalink($related_id) ); ?>" title="<?php echo esc_attr( get_the_title($related_id) ); ?>"><?php esc_html_e( 'Continue Reading', 'ibsen' ); ?></a>
					<?php endif; ?>
				</div><!-- .entry-content -->

			</article><!-- #post-<?php echo $related_id; ?> -->
			<?php } ?>
		</div><!-- #grid-loop -->
	</div>

<?php
}
?>