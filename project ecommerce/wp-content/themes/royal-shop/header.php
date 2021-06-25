<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Royal Shop
 * @since 1.0.0
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('royal_shop_mobile_header_clr','#fff')); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url(get_bloginfo( 'pingback_url' )); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
	<?php wp_body_open();?>	

<?php do_action('royal_shop_site_preloader'); ?>
<div id="page" class="royal-shop-site">
	<header>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'royal-shop' ); ?></a>
		<?php do_action( 'royal_shop_sticky_header' ); ?> 
        <!-- sticky header -->
		<?php if(get_theme_mod('royal_shop_above_mobile_disable',true)==true){
			if (wp_is_mobile()!== true):
              do_action( 'royal_shop_top_header' );  
              endif;
		}elseif(get_theme_mod('royal_shop_above_mobile_disable',true)==false){
			 do_action( 'royal_shop_top_header' );  
		} ?> 
		<!-- end top-header -->
        <?php do_action( 'royal_shop_main_header' ); ?> 
		<!-- end main-header -->
	</header> <!-- end header -->