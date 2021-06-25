<?php
/**
 * The theme header with transparency for use with Transparent Header page template.
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
?>
<div id="page"<?php echo $page_class; ?>>

	<header id="masthead" class="site-header transparent">

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
