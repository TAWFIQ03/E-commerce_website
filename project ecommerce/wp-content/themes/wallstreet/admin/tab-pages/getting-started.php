<?php
/**
 * Getting started template
 */
?>

<div id="getting_started" class="wallstreet-tab-pane active">

	<div class="container-fluid">
		
		<div class="row">
			<div class="col-md-6">
				<div class="wallstreet-tab-pane-half wallstreet-tab-pane-first-half">
					<h3><?php esc_html_e( "Recommended Plugins", 'wallstreet' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'To take full advanctage of the theme features you need to install recommended plugins.', 'wallstreet' ); ?>
						
						</p>
						<p><a target="_self" href="#recommended_actions" class="wallstreet-custom-class"><?php esc_html_e( 'Click here','wallstreet');?></a></p>
					</div>
				</div>

				<div class="wallstreet-tab-pane-half wallstreet-tab-pane-first-half">
					<h3><?php esc_html_e( "Start Customizing", 'wallstreet' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'After activating recommended plugins , now you can start customization.', 'wallstreet' ); ?>
						
						</p>
						<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer','wallstreet');?></a></p>
					</div>
				</div>

				<div class="wallstreet-tab-pane-half wallstreet-tab-pane-first-half">
					<h3><?php esc_html_e( "Documentation", 'wallstreet' ); ?></h3>
					<div style="border-top: 1px solid #eaeaea;">
						<p style="margin-top: 16px;">
							<?php esc_html_e( 'Browse the documention for the detailed information regarding this theme.', 'wallstreet' ); ?>
						
						</p>
						<p><a target="_blank" href="<?php echo esc_url('https://help.webriti.com/themes/wallstreet/wallstreet-wordpress-theme/'); ?>"><?php esc_html_e( 'Documentation','wallstreet');?></a></p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="wallstreet-tab-pane-half wallstreet-tab-pane-first-half">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/admin/img/wallstreet.png'; ?>" alt="<?php esc_attr_e( 'wallstreet Theme', 'wallstreet' ); ?>" />
				</div>
			</div>	
		</div>
		<div class="row">
			<div class="wallstreet-tab-center">
				<h3><?php esc_html_e( "Useful Links", 'wallstreet' ); ?></h3>
			</div>
			<div class=" useful_box">
                <div class="wallstreet-tab-pane-half wallstreet-tab-pane-first-half">
                    <a href="<?php echo esc_url('https://webriti.com/wallstreet-free'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-desktop info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Lite Demo','wallstreet'); ?></p>
                	</a>
                    <a href="<?php echo esc_url('https://webriti.com/demo/wp/preview/?prev=wallstreet'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-book-alt info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('PRO Demo','wallstreet'); ?></p>
                    </a>        
                </div>
                <div class="wallstreet-tab-pane-half wallstreet-tab-pane-first-half">
                    <a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/wallstreet'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-smiley info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Your feedback is valuable to us','wallstreet'); ?></p>
                    </a>
                    <a href="<?php echo esc_url('https://webriti.com/wallstreet/'); ?>" target="_blank"  class="info-block">
                    	<div class="dashicons dashicons-book-alt info-icon"></div>
                    	<p class="info-text"><?php echo esc_html__('Premium Theme Details','wallstreet'); ?></p>
                    </a>
                </div>
            </div>        
        </div>            
    </div>
</div>

