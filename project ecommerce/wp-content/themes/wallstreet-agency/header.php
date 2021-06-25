<!DOCTYPE html>
<html xmlns="<?php echo esc_url('http://www.w3.org/1999/xhtml')?>" <?php language_attributes(); ?>>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
		<a class="skip-link wallstreet-screen-reader" href="#content"><?php esc_html_e( 'Skip to content', 'wallstreet-agency' ); ?></a>
 				<?php do_action('wallstreet_custom_header', false);
				get_template_part('functions/header/header-nav');
