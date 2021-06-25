<?php
/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package ThemeHunk
 * @subpackage Royal Shop
 * @since 1.0.0
 */
get_header();
$royal_shop_pages_sidebar = royal_shop_pages_sidebar(); ?>
        <div id="content" class="page-content wzta-single-post">
            <div class="content-wrap" >
                <div class="container">
                  <div class="main-area <?php echo esc_attr($royal_shop_pages_sidebar);?>">
                  <?php if($royal_shop_pages_sidebar !=='no-sidebar' && $royal_shop_pages_sidebar !=='disable-left-sidebar'){get_sidebar('primary');}?>
                  <div id="primary" class="primary-content-area">
                   <div class="page-head">
                    <?php the_title( '<h1 class="entry-title wzta-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
                   <?php royal_shop_breadcrumb_trail();?>
                    </div>
                            <div class="primary-content-wrap">
                                  <?php
                                        if( have_posts()):
                                            /* Start the Loop */
                                            while ( have_posts() ) : the_post();
                                            get_template_part( 'template-parts/content', 'single');?>

                                            <div class="wzta-related-links ">
                                            <?php the_post_navigation();?>
                                            </div>
                                          
                                           <?php 
                                           // Author bio.
                                            if ( 'post' === get_post_type() ) :
                                            get_template_part( 'template-parts/author-bio' );
                                            endif;
                                            // If comments are open or we have at least one comment, load up the comment template.
                                            if ( comments_open() || get_comments_number() ) :
                                            comments_template();
                                            endif;
                                            endwhile;
                                        endif;
                                        ?>
                           </div> <!-- end primary-content-wrap-->
                        </div> <!-- end primary primary-content-area-->
                        <?php if($royal_shop_pages_sidebar !=='no-sidebar' && $royal_shop_pages_sidebar !=='disable-right-sidebar'){ get_sidebar('secondary');}?>
                    </div> <!-- end main-area -->
                </div>
            </div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();?>