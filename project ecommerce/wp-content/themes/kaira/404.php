<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kaira
 */
get_header(); ?>
<div id="content" class="site-content">
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

					<section class="error-404 not-found">
							<h1 class="page-title"><?php esc_html_e( '404', 'kaira' ); ?></h1>
							<h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kaira' ); ?></h2>
							<p><?php esc_html_e( 'Go back to the homepage.', 'kaira' ); ?></p>
                                    <a class="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Homepage', 'kaira' ); ?></a>  
					</section><!-- .error-404 -->

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>

<?php	
get_footer();
