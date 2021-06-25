<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Ibsen
 */

if ( ! is_active_sidebar( 'ibsen-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'ibsen-sidebar' ); ?>
</div><!-- #secondary -->
