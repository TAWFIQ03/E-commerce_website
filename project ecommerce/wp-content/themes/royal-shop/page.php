<?php
/**
 * 
 * @package ThemeHunk
 * @subpackage Royal Shop
 * @since 1.0.0
 */
get_header();
$royal_shop_pages_sidebar = royal_shop_pages_sidebar(); ?>
<div id="content" class="page-content wzta-page">
          <div class="content-wrap" >
            <div class="container">
              <div class="main-area <?php echo esc_attr($royal_shop_pages_sidebar);?>">
                <?php if($royal_shop_pages_sidebar !=='no-sidebar' && $royal_shop_pages_sidebar !=='disable-left-sidebar'){get_sidebar('primary');}?>
                <div id="primary" class="primary-content-area">
                  <div class="primary-content-wrap">
                    <div class="page-head">
                   <?php royal_shop_get_page_title();?>
                   <?php royal_shop_breadcrumb_trail();?>
                    </div>
                        <div class="wzta-content-wrap">
                        <?php
                            while( have_posts() ) : the_post();
                               get_template_part( 'template-parts/content', 'page' );
                              // If comments are open or we have at least one comment, load up the comment template.
                              if ( comments_open() || get_comments_number() ) :
                                comments_template();
                               endif;
                               endwhile; // End of the loop.
                            ?>
                         </div>
                      </div> <!-- end primary-content-wrap-->
                </div> <!-- end primary primary-content-area-->
                <?php if($royal_shop_pages_sidebar !=='no-sidebar' && $royal_shop_pages_sidebar !=='disable-right-sidebar'){ get_sidebar('secondary');}?>
                <!-- end sidebar-secondary  sidebar-content-area-->
              </div> <!-- end main-area -->
            </div>
          </div> <!-- end content-wrap -->
</div> <!-- end content page-content -->
<?php get_footer();?>