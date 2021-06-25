<?php
/**
 * Theme help
 *
 * Adds a simple Theme help page to the Appearance section of the WordPress Dashboard.
 *
 * @package Ibsen
 */

// Add Theme help page to admin menu.
add_action( 'admin_menu', 'ibsen_add_theme_help_page' );

function ibsen_add_theme_help_page() {

	// Get Theme Details from style.css
	$theme = wp_get_theme();

	/* translators: %s: theme name. */
	add_theme_page(
		esc_html( $theme->get( 'Name' ) ) . ' ' .  esc_html( $theme->get( 'Version' ) ), sprintf( esc_html__( '%s Help', 'ibsen' ), $theme->get( 'Name' ) ), 'edit_theme_options', 'ibsen', 'ibsen_display_theme_help_page'
	);

}

// Display Theme help page.
function ibsen_display_theme_help_page() {

	// Get Theme Details from style.css.
	$theme = wp_get_theme();
	?>

	<div class="wrap theme-help-wrap">

		<h1><?php echo esc_html( $theme->get( 'Name' ) ) . ' <span class="theme-version">' .  esc_html( $theme->get( 'Version' ) ); ?></span></h1>

		<div class="theme-description"><?php echo esc_html( $theme->get( 'Description' ) ); ?></div>

		<div id="getting-started">

			<h3><?php
				/* translators: %s: theme name. */
				printf( esc_html__( 'Getting Started with %s', 'ibsen' ), $theme->get( 'Name' ) ); ?>
			</h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Options', 'ibsen' ); ?></h4>

						<p class="about">
							<?php
							/* translators: %s: theme name. */
							printf( esc_html__( '%s makes use of the Customizer for the theme settings.', 'ibsen' ), $theme->get( 'Name' ) ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( wp_customize_url() ); ?>" class="button button-primary">
								<?php esc_html_e( 'Customize', 'ibsen' ); ?>
							</a>
						</p>
					</div>

					<div class="section">
						<h4><?php esc_html_e( 'Documentation', 'ibsen' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Do you need help to setup and customize this theme? Check out the theme documentation.', 'ibsen' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( 'https://uxlthemes.com/documentation/' ); ?>" target="_blank" class="button button-secondary">
								<?php esc_html_e( 'View Documentation', 'ibsen' ); ?>
							</a>
						</p>
					</div>

					<div class="section">
						<h4><?php esc_html_e( 'Support', 'ibsen' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Any questions?', 'ibsen' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( 'https://uxlthemes.com/forums/forum/ibsen/' ); ?>" target="_blank" class="button button-secondary">
								<?php esc_html_e( 'Get Support', 'ibsen' ); ?>
							</a>
						</p>
					</div>


					<div class="section">
						<h4><?php esc_html_e( 'Upgrade', 'ibsen' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Upgrade to Ibsen Pro for even more cool features and customization options.', 'ibsen' ) ; ?>
						</p>
						<p>
							<a href="<?php echo esc_url( 'https://uxlthemes.com/theme/ibsen-pro/' ); ?>" target="_blank" class="button button-pro">
								<?php esc_html_e( 'GO PRO', 'ibsen' ); ?>
							</a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Demo Content', 'ibsen' ); ?></h4>

						<p class="about">
							<?php
							/* translators: %s: theme name. */
							printf( esc_html__( 'Import %s demo content and Starter Sites.', 'ibsen' ), $theme->get( 'Name' ) ); ?>
						</p>
						<?php
						if ( class_exists( 'Starter_Sites' ) ) {
							$plugin_page = 'starter-sites';
							$plugin_text = esc_html__( 'View Demo Content', 'ibsen' );
						} else {
							$plugin_page = 'tgmpa-install-plugins';
							$plugin_text = esc_html__( 'Get Starter Sites Plugin', 'ibsen' );
						}
						?>
						<p>
							<a href="<?php echo esc_url( get_admin_url() . 'themes.php?page=' . $plugin_page ); ?>" class="button button-primary">
								<?php echo $plugin_text; ?>
							</a>
						</p>
					</div>

					<div class="screenshot">
						<a href="<?php echo esc_url( 'https://uxlthemes.com/theme/ibsen/' ); ?>" target="_blank">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png" />
						</a>
						<a href="<?php echo esc_url( 'https://uxlthemes.com/theme/ibsen/' ); ?>" target="_blank" class="button button-primary">
							<?php esc_html_e( 'Theme Details', 'ibsen' ); ?>
						</a>
					</div>

				</div>

			</div>

		</div>

		<hr>

		<div id="theme-author">

			<p>
				<?php /* translators: %1$s: theme name, %2$s: theme author, %3$s: link to theme review page. */
				printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'ibsen' ),  $theme->get( 'Name' ) , '<a target="_blank" href="https://uxlthemes.com/">' . $theme->get( 'Author' ) . '</a>', '<a target="_blank" href="https://wordpress.org/support/theme/ibsen/reviews/?filter=5">' . __( 'rate it', 'ibsen' ) . '</a>' ); ?>
			</p>

		</div>

	</div>

	<?php
}

// Add CSS for Theme help Panel.
add_action( 'admin_enqueue_scripts', 'ibsen_theme_help_page_css' );

function ibsen_theme_help_page_css( $hook ) {

	// Load styles and scripts only on theme help page.
	if ( 'appearance_page_ibsen' != $hook ) {
		return;
	}

	// Embed theme help css style.
	wp_enqueue_style( 'ibsen-theme-help-css', get_template_directory_uri() . '/css/theme-help.css' );
}
