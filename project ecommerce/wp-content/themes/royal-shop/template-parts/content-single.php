<?php
/**
 * Template part for displaying single post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  Royal Shop
 * @since 1.0.0
 */
?>
<article class="wzta-article ">
	<div class="entry-content">
					<div class="post-content-outer-wrapper">
						<div class="wzta-posts-description">
							<div class="wzta-post-img-wrapper">
							<div class="wzta-post-img">
							<?php the_post_thumbnail('post_thumbnail_loop'); ?>
						  </div>
					   </div>
					   
					<div class="wzta-post-meta">
						<div class="wzta-post-info">
							<span><?php the_author_posts_link(); ?></span>
						    
							<span><?php the_category(' '); ?></span>
						    
						    <span><?php echo get_the_date(); ?></span>
					     </div>
					   </div>
					<div class="wzta-post-excerpt">
								<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'royal-shop' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'royal-shop' ),
					'after'  => '</div>',
				) );
			?>
						</div>
						
			</div> <!-- wzta-posts-description end -->
		</div> <!-- post-content-outer-wrapper end -->
	</div>
                                       <div class="wzta-post-footer">
                                                <?php if (has_tag()) { ?>
                                                <div class="wzta-tags-wrapper">
                                                    <?php
                                                        the_tags( __('Tag : ','royal-shop'), ' ', ' ' );
                                                    ?>
                                                </div>
                                            <?php } ?>
                                       </div> <!-- wzta-post-footer end -->
</article>