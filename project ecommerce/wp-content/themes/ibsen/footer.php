<?php
/**
 * The template for displaying the footer
 *
 * @package Ibsen
 */

?>
	</div><!-- .container -->

	</div><!-- #content -->
<?php
	if ( get_theme_mod( 'sticky_footer' ) ) {
		$footer_class = ' sticky-footer';
	} else {
		$footer_class = '';
	}
?>
	<footer id="colophon" class="site-footer<?php echo $footer_class; ?>">

		<?php if(is_active_sidebar( 'ibsen-above-footer' )): ?>
		<div id="above-footer">
			<div class="container">
				<?php dynamic_sidebar( 'ibsen-above-footer' ); ?>
			</div>
		</div>
		<?php endif; ?>

		<?php if(is_active_sidebar( 'ibsen-footer1' ) || is_active_sidebar( 'ibsen-footer2' ) || is_active_sidebar( 'ibsen-footer3' ) ): ?>
		<div id="top-footer">
			<div class="container">
				<div class="top-footer clearfix">
					<div class="footer footer1">
						<?php if(is_active_sidebar( 'ibsen-footer1' )): 
							dynamic_sidebar( 'ibsen-footer1' );
						endif;
						?>	
					</div>

					<div class="footer footer2">
						<?php if(is_active_sidebar( 'ibsen-footer2' )): 
							dynamic_sidebar( 'ibsen-footer2' );
						endif;
						?>	
					</div>

					<div class="footer footer3">
						<?php if(is_active_sidebar( 'ibsen-footer3' )): 
							dynamic_sidebar( 'ibsen-footer3' );
						endif;
						?>	
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<div id="bottom-footer">
			<div class="container">

				<?php ibsen_powered_by(); ?>

				<?php wp_nav_menu( array( 
                	'theme_location' => 'footer',
                	'container_id' => 'footer-menu',
                	'menu_id' => 'footer-menu', 
                	'menu_class' => 'ibsen-footer-nav',
                	'depth' => 1,
                	'fallback_cb' => 'ibsen_footer_menu_fallback',
				) ); ?>

			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
