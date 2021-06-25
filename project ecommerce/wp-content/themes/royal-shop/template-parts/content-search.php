<?php
/**
 * Template part for displaying posts
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package  Royal Shop
 * @since 1.0.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('wzta-post-article'); ?>>
					<div class="post-content-outer-wrapper">
					<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {?>
						<div class="wzta-post-img-wrapper">
							<div class="wzta-post-img">
								<a href="<?php the_permalink() ?>" class="post-thumb-link">
									<?php the_post_thumbnail('post_thumbnail_loop'); ?>
								</a>
							</div>
						</div>
					<?php } ?>
					<div class="wzta-posts-description ">
						
						<?php the_title( '<h2 class="entry-title wzta-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

						<div class="wzta-post-meta">
						<div class="wzta-post-info">
							<span><?php the_author_posts_link(); ?></span>
						    
							<span><?php the_category(' '); ?></span>
						    
						    <span><?php echo get_the_date(); ?></span>
					     </div>
						<div class="wzta-post-comments">
							<div class="wzta-comments-icon">
								<span class="wzta-comments"><a href="<?php comments_link(); ?>" title=""><?php comments_popup_link(esc_html('0','royal-shop'), esc_html('1','royal-shop'), esc_html('%','royal-shop')); ?></a></span>
							</div>
						</div>
					    </div>
						<div class="wzta-post-excerpt">
								<?php royal_shop_the_excerpt();?> 
						</div>
					</div> <!-- wzta-posts-description end -->
				</div> <!-- post-content-outer-wrapper end -->
</article>