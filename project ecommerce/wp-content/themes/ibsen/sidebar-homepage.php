<?php
/**
 * The sidebar containing the main widget area for the homepage
 *
 * @package Ibsen
 */

if ( ! is_active_sidebar( 'ibsen-sidebar-homepage' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'ibsen-sidebar-homepage' ); ?>
</div><!-- #secondary -->
