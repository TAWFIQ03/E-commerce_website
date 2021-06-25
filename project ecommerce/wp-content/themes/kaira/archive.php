<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kaira
 */

get_header();
?>
<div id="content" class="site-content">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php
						if ( have_posts() ) : ?>

						<p class="archive-title">
							<?php
							the_archive_title();
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</p>

						<?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				$post_args =  array(
					'screen_reader_text' => ' ',
					'prev_text' => __( '<div class="chevronne"><i class="fa fa-chevron-left"></i></div>', 'kaira' ),
					'next_text' => __( '<div class="chevronne"><i class="fa fa-chevron-right"></i></div>', 'kaira' ),
					);

				if( get_theme_mod( 'kaira_pagination_type', 'numbered') == 'defaulted' ) { 				
					the_posts_navigation();
	        	}
                 else{        
	                the_posts_pagination( $post_args );        
                 }
				else :
				
				get_template_part( 'template-parts/content', 'none' );

				endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
		</div>

		<?php		
		get_sidebar();
		get_footer();
