<?php
/**
 * Template used for displaying slider on the Front Page.
 *
 * @package kaira
 */
  $kaira_featured_tag = get_theme_mod( 'kaira_slider_tag' );
  
  $custom_loop = new WP_Query( array(
    'post_type' => 'post',
    'order' => 'DESC',
    'order_by' => 'date',
    'tag' => esc_html( $kaira_featured_tag)
    ) );

    if ( $custom_loop->have_posts() ) : ?>

  <div class="slider">
  <div class="container">
    <div class="flexslider">
      <ul class="slides">
        <?php  
        while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); 
        $cat = get_the_category();
        if( has_post_thumbnail() ) :
        ?>
        <li>
          <div class="post-thumbnail">
            <?php the_post_thumbnail( 'kaira-slider' ); ?>
          </div>
          <div class="banner-text">
            <div class="text">
              <p class="category"><a href="<?php echo esc_url(get_category_link( $cat[0]->term_id )); ?>"><?php echo esc_html( $cat[0]->name ); ?></a></p>
              <p class="date"><?php echo get_the_date(); ?></p>
              <div class="clearfix"></div>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <button type="button" class="btn btn-default read-more"><a href="<?php the_permalink(); ?>" ><?php esc_html_e('Read more', 'kaira') ?></a></button>
            </div>
          </div>
        </li>

        <?php  
        endif;

        endwhile;
        wp_reset_postdata();

        ?>

      </ul>
    </div>
  </div>
</div>

  <?php endif; ?>