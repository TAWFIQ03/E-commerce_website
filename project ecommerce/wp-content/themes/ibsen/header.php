<?php
/**
 * The theme header.
 *
 * @package Ibsen
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ibsen' ); ?></a>
<?php
	if ( get_theme_mod( 'sticky_footer' ) ) {
		$page_class = ' class="sticky-footer"';
	} else {
		$page_class = '';
	}

	$header_color = get_theme_mod( 'header_color', '' );
	if ( $header_color === 'light' ) {
		$use_header_color = ' light';
	} else {
		$use_header_color = '';
	}

	$header_image = get_header_image();
	if ( $header_image ) {
		$use_header_image = ' style="background-image: url(' . esc_url( $header_image ) . ')"';
	} else {
		$use_header_image = '';
	}
?>
<div id="page"<?php echo $page_class; ?>>

	<header id="masthead" class="site-header<?php echo $use_header_color; ?>"<?php echo $use_header_image; ?>>

		<?php if ( is_active_sidebar( 'ibsen-top-bar' ) ) : ?>
		<div id="top-bar">
			<div class="container">
				<?php dynamic_sidebar( 'ibsen-top-bar' ); ?>
			</div>
		</div>
		<?php endif; ?>

		<div class="container">
		<?php
		if ( is_customize_preview() ) {
			ibsen_header_content_customizer();
		} else {
			ibsen_header_content();
		}
		?>
		<?php ibsen_header_menu(); ?>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content clearfix">
		<div class="container clearfix">
