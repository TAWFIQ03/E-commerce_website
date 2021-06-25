<?php
/**
 * Template used for displaying featured posts on the Front Page.
 *
 * @package kaira
 */
  $kaira_featured_tag = get_theme_mod( 'kaira_featured_term_1' );
  $kaira_section_title = get_theme_mod( 'kaira_front_featured_posts_label', esc_html__( 'Featured Posts', 'kaira' ) );
  $posts_num = 6;

  $custom_loop = new WP_Query( array(
    'post_type' => 'post',
    'posts_per_page' => absint($posts_num),
    'order' => 'DESC',
    'order_by' => 'date',
    'tag' => esc_html( $kaira_featured_tag)
    ) );

    if ( $custom_loop->have_posts() ) : ?>

  <div class="top-section">
      <div class="container">
        <h1 class="section-title"><?php echo esc_html($kaira_section_title); ?></h1>
        <div class="row">

        <?php
              /* Start the Loop */
              while ( $custom_loop -> have_posts() ) : $custom_loop -> the_post(); ?>
              <div class="col-md-4 col-sm-6 column">
                <article class="post">
                  <div class="image-holder">
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('kaira-grid-post', array('class' => 'img-responsive')); ?></a>
                  </div>
                  <header class="entry-header">
                    <div class="entry-meta">
                      <span><?php echo get_the_date(get_option( 'date-format' ) ); ?></span>
                    </div>
                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  </header>
                </article>
              </div>
              <?php endwhile; ?>
          

        </div>
      </div>
    </div>

  <?php endif; ?>