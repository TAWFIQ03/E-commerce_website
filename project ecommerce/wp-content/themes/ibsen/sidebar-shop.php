<?php
/**
 * The sidebar containing the main widget area for WooCommerce archives
 *
 * @package Ibsen
 */

if ( ! is_active_sidebar( 'ibsen-sidebar-shop' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'ibsen-sidebar-shop' ); ?>
</div><!-- #secondary -->
