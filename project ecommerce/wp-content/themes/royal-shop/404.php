<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ThemeHunk
 * @subpackage Royal Shop
 * @since 1.0.0
 */
get_header();
$royal_shop_pages_sidebar = royal_shop_pages_sidebar();?>
<div id="content" class="page-content">
        	<div class="content-wrap" >
        		<div class="container">
        			<div class="main-area <?php echo esc_attr($royal_shop_pages_sidebar);?>">
        				<?php if($royal_shop_pages_sidebar !=='no-sidebar' && $royal_shop_pages_sidebar !=='disable-left-sidebar'){get_sidebar('primary');}?>
        				<div id="primary" class="primary-content-area">
        					<div class="wzta-content-wrap">
                                <article id="error-404" >
			<div class="error-404 not-found">
				<div class="error-heading">
					<h2 class="wzta-page-top-title entry-title"><?php esc_html_e( '404', 'royal-shop' ); ?></h2>
					<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'royal-shop' ); ?></h3>
				</div><!-- .error-heading -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'royal-shop' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->

				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-404',
					'depth'          => 1,
					'container'      => 'div',
					'container_id'   => 'quick-links-404',
					'fallback_cb'    => false,
					) );
				?>
			</div><!-- .error-404 -->
          </article>
                           </div> <!-- end primary-content-wrap-->
        				</div> <!-- end primary primary-content-area-->
        				 <?php if($royal_shop_pages_sidebar !=='no-sidebar' && $royal_shop_pages_sidebar !=='disable-right-sidebar'){ get_sidebar('secondary');}?>
        			</div> <!-- end main-area -->
        		</div>
        	</div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();?>