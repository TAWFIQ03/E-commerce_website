<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kaira
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
      <div class="holder">
        <div class="widget-area">
          <div class="container">
            <div class="row">
              <div class="col-md-4 column no-padding">
    	         <?php dynamic_sidebar( 'footer-1' ); ?>
              </div>

              <div class="col-md-4 column">
	              <?php dynamic_sidebar( 'footer-2' ); ?>
              </div>

              <div class="col-md-4 column">
                <?php dynamic_sidebar( 'footer-3' ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-info">
        <?php do_action('kaira_footer'); ?>
      </div>
    </footer>
	</div>

<?php wp_footer(); ?>

</body>
</html>
