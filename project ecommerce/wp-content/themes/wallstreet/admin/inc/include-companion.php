<?php
/**
 * This file implements custom requirements for the Webriti Companion Plugin.
 * It can be used as-is in themes (drop-in).
 *
 */

$wallstreet_hide_install = get_option('wallstreet_hide_customizer_companion_notice', false);
if (!function_exists('webriti_companion') && !$wallstreet_hide_install) {
	if (class_exists('WP_Customize_Section') && !class_exists('wallstreet_Companion_Installer_Section')) {
		/**
		 * Recommend the installation of wallstreet Companion using a custom section.
		 *
		 * @see WP_Customize_Section
		 */
		class wallstreet_Companion_Installer_Section extends WP_Customize_Section {
			/**
			 * Customize section type.
			 *
			 * @access public
			 * @var string
			 */
			public $type = 'wallstreet_companion_installer';

			public function __construct($manager, $id, $args = array()) {
				parent::__construct($manager, $id, $args);

				add_action('customize_controls_enqueue_scripts', 'wallstreet_Companion_Installer_Section::enqueue');
			}

			/**
			 * enqueue styles and scripts
			 *
			 *
			 **/
			public static function enqueue() {
				wp_enqueue_script('plugin-install');
				wp_enqueue_script('updates');
				wp_enqueue_script('wallstreet-companion-install', WALLSTREET_TEMPLATE_DIR_URI . '/admin/assets/js/plugin-install.js', array('jquery'));
				wp_localize_script('wallstreet-companion-install', 'wallstreet_companion_install',
					array(
						'installing' => esc_html__('Installing', 'wallstreet'),
						'activating' => esc_html__('Activating', 'wallstreet'),
						'error'      => esc_html__('Error', 'wallstreet'),
						'ajax_url'   => esc_url(admin_url('admin-ajax.php')),
					)
				);
			}
			/**
			 * Render the section.
			 *
			 * @access protected
			 */
			protected function render() {
				// Determine if the plugin is not installed, or just inactive.
				$plugins   = get_plugins();
				$installed = false;
				foreach ($plugins as $plugin) {
					if ('Webriti Companion' === $plugin['Name']) {
						$installed = true;
					}
				}
				$slug = 'webriti-companion';
				// Get the plugin-installation URL.
				$classes            = 'cannot-expand accordion-section control-section-companion control-section control-section-themes control-section-' . $this->type;
				?>
				<li id="accordion-section-<?php echo esc_attr($this->id); ?>" class="<?php echo esc_attr($classes); ?>">
					<span class="webriti-customizer-notification-dismiss" id="companion-install-dismiss" href="#companion-install-dismiss"> <i class="fa fa-times"></i></span>
					<?php if (!$installed): ?>
					<?php 
						$plugin_install_url = add_query_arg(
							array(
								'action' => 'install-plugin',
								'plugin' => $slug,
							),
							self_admin_url('update.php')
						);
						$plugin_install_url = wp_nonce_url($plugin_install_url, 'install-plugin_webriti-companion');
					 ?>
						<p><?php esc_html_e('Webriti Companion plugin is required to take advantage of this theme\'s features in the customizer.', 'wallstreet');?></p>
						<a class="webriti-plugin-install install-now button-secondary button" data-slug="webriti-companion" href="<?php echo esc_url($plugin_install_url); ?>" aria-label="<?php esc_attr_e('Install Webriti Companion Now', 'wallstreet');?>" data-name="<?php esc_attr_e('Webriti Companion', 'wallstreet'); ?>">
							<?php esc_html_e('Install & Activate', 'wallstreet');?>
						</a>
					<?php else: ?>
						<?php 
							$plugin_link_suffix = $slug . '/' . $slug . '.php';
							$plugin_activate_link = add_query_arg(
								array(
									'action'        => 'activate',
									'plugin'        => rawurlencode( $plugin_link_suffix ),
									'plugin_status' => 'all',
									'paged'         => '1',
									'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $plugin_link_suffix ),
								), self_admin_url( 'plugins.php' )
							);
						?>
						<p><?php esc_html_e('You have installed Webriti Companion Plugin. Activate it to take advantage of this theme\'s features in the customizer.', 'wallstreet');?></p>
						<a class="webriti-plugin-activate activate-now button-primary button" data-slug="webriti-companion" href="<?php echo esc_url($plugin_activate_link); ?>" aria-label="<?php esc_attr_e('Activate Webriti Companion now', 'wallstreet');?>" data-name="<?php esc_attr_e('Webriti Companion', 'wallstreet'); ?>">
							<?php esc_html_e('Activate Now', 'wallstreet');?>
						</a>
					<?php endif;?>
				</li>
				<?php
			}
		}
	}
	if (!function_exists('wallstreet_companion_installer_register')) {
		/**
		 * Registers the section, setting & control for the Webriti Companion installer.
		 *
		 * @param object $wp_customize The main customizer object.
		 */
		function wallstreet_companion_installer_register($wp_customize) {
			$wp_customize->add_section(new wallstreet_Companion_Installer_Section($wp_customize, 'wallstreet_companion_installer', array(
				'title'      => '',
				'capability' => 'install_plugins',
				'priority'   => 0,
			)));

		}
		add_action('customize_register', 'wallstreet_companion_installer_register');
	}
}

function wallstreet_hide_customizer_companion_notice(){
	update_option('wallstreet_hide_customizer_companion_notice', true);
	echo true;
	wp_die();
}
add_action('wp_ajax_wallstreet_hide_customizer_companion_notice', 'wallstreet_hide_customizer_companion_notice');