<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kaira
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<div class="featured-img">
		<a href="<?php the_permalink(); ?>" class="post-thumbnail">
			<?php the_post_thumbnail('kaira-featured', array('class' => 'img-responsive')); ?>
		</a>
	</div>
	<div class="text-holder">
		<header class="entry-header">
			<div class="category">
			<?php            
				$categories = get_the_category();
				if ( !empty( $categories ) ) { ?>
				<span><a href="<?php echo esc_url(get_category_link( $categories[0]->term_id )); ?>"><?php echo esc_html( $categories[0]->name ); ?></a></span>
			<?php } ?>
			</div>
			<div class="entry-meta"><span><?php echo get_the_date(get_option( 'date-format' ) ); ?></span></div>
			<div class="clearfix"></div>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>
		<div class="entry-excerpt"><?php the_excerpt(); ?></div>
		<div class="entry-footer">
			<a href="<?php the_permalink(); ?>" ><button type="button" class="btn btn-default read-more"><?php esc_html_e('Read more', 'kaira') ?></button></a>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
