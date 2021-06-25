<?php
/**
 * Template used for displaying related posts
 *
 * @package kaira
 */

?>
<div class="related-post">
    <div class="container">
      <h1 class="section-title"><?php echo esc_html(get_theme_mod( 'kaira_related_posts_label' )); ?></h1>
      <div class="row">
      <?php
        $categories = get_the_category();
        $exclude_id[] = get_the_ID();

       	$args = array(
          'posts_per_page' => 6,
       	  'category_name' => esc_html( $categories[0]->name ),
          'post__not_in'  => $exclude_id,

       		);
       	$loop = new WP_Query( $args );
       	if( $loop -> have_posts() ) :
       		while( $loop -> have_posts() ) : $loop -> the_post();
      ?>
        <div class="col-md-4 col-sm-6 column">
          <article class="post">
            <div class="image-holder">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('kaira-grid-post', array('class' => 'img-responsive')); ?></a>
            </div>
            <header class="entry-header">
              <div class="entry-meta">
                <span><?php echo get_the_date(get_option('date_format') ); ?></span>
              </div>
              <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </header>
          </article>
        </div>
        <?php
        	endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </div>
    </div>
  </div>
