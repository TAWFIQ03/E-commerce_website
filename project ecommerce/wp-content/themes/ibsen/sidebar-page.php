<?php
/**
 * The sidebar containing the main widget area for pages
 *
 * @package Ibsen
 */

if ( ! is_active_sidebar( 'ibsen-sidebar-page' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'ibsen-sidebar-page' ); ?>
</div><!-- #secondary -->
