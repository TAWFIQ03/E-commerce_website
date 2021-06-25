<?php
/**
 * Secondary sidebar
 *
 * @package ThemeHunk
 * @package  Royal Shop
 * @since 1.0.0
 */
 ?>
<div id="sidebar-secondary" class="sidebar-content-area sidebar-2 <?php echo esc_attr(apply_filters( 'royal_shop_stick_sidebar_class',''));?>">
  <div class="sidebar-main">
           <?php 
			    if (is_active_sidebar('sidebar-2') ){
			    dynamic_sidebar('sidebar-2');
			    }
           ?>
  </div> <!-- sidebar-main End -->
</div> <!-- sidebar-secondary End -->     