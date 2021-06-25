<?php
/**
 * Template part for displaying content on single.php.
 *
 * @package kaira
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <div class="featured-img">
        <?php
        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'kaira-featured' );
        }
       ?>
    </div>
    <header class="entry-header">
        <div class = "category">
                <span>
                <?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                             }
                ?>
	        </span>
        </div>
        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
        <div class="entry-meta">
            <span class="posted">
                <i class="fa fa-calendar-o" aria-hidden="true"></i>
	                <?php echo get_the_date(get_option('date_format'));?>
            </span>
            <span class="posted-tags">
                <i class="fa fa-tags" aria-hidden="true"></i>
				<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
            </span>            
            <?php kaira_entry_meta(); ?>
        </div>
        </header>
        <div class="entry-content">
            <p><?php the_content(); ?></p>
        </div>       
        <?php do_action( 'kaira_author_bio' );
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif; ?>
        </article>

    </div>
