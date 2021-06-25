<?php
/**
 * Getting started template
 */
?>

<div id="getting_started" class="wallstreet_agency-tab-pane active">
		<div class="container-fluid">
				<div class="row">
						<div class="col-md-6">
								<div class="wallstreet_agency-tab-pane-half wallstreet_agency-tab-pane-first-half">
									<h3><?php esc_html_e( "Recommended Plugins", 'wallstreet-agency' ); ?></h3>
									<div style="border-top: 1px solid #eaeaea;">
											<p style="margin-top: 16px;">
												<?php esc_html_e( 'To take full advantage of the theme features you need to install recommended plugins.', 'wallstreet-agency' ); ?>
											</p>
											<p><a target="_self" href="#recommended_actions" class="wallstreet_agency-custom-class"><?php esc_html_e( 'Click here','wallstreet-agency');?></a></p>
									</div>
								</div>

								<div class="wallstreet_agency-tab-pane-half wallstreet_agency-tab-pane-first-half">
										<h3><?php esc_html_e( "Start Customizing", 'wallstreet-agency' ); ?></h3>
										<div style="border-top: 1px solid #eaeaea;">
												<p style="margin-top: 16px;">
													<?php esc_html_e( 'After activating recommended plugins , now you can start customization.', 'wallstreet-agency' ); ?>
												</p>
												<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer','wallstreet-agency');?></a></p>
										</div>
								</div>
						</div>
						<div class="col-md-6">
								<div class="wallstreet_agency-tab-pane-half wallstreet_agency-tab-pane-first-half">
										<img src="<?php echo esc_url( WALLSTREET_AGENCY_TEMPLATE_DIR_URI ) . '/admin/img/wallstreet-agency.png'; ?>" alt="<?php esc_attr_e( 'Wallstreet Agency Theme', 'wallstreet-agency' ); ?>" />
								</div>
						</div>
				</div>
				<div class="row">
						<div class="wallstreet_agency-tab-center">
							<h3><?php esc_html_e( "Useful Links", 'wallstreet-agency' ); ?></h3>
						</div>
						<div class=" useful_box">
		            <div class="wallstreet_agency-tab-pane-half wallstreet_agency-tab-pane-first-half">
			            	<div class="col-md-6">
			                <a href="<?php echo esc_url('https://wallstreet-agency.webriti.com/'); ?>" target="_blank"  class="info-block">
			                	<div class="dashicons dashicons-desktop info-icon"></div>
			                	<p class="info-text"><?php echo esc_html__('Lite Demo','wallstreet-agency'); ?></p>
			            	</a>
			            	</div>
			            	<div class="col-md-6">
			                <a href="<?php echo esc_url('https://webriti.com/demo/wp/preview/?prev=wallstreet'); ?>" target="_blank"  class="info-block">
			                	<div class="dashicons dashicons-desktop info-icon"></div>
			                	<p class="info-text"><?php echo esc_html__('PRO Demo','wallstreet-agency'); ?></p>
			                </a>
		                </div>
		            </div>
                <div class="wallstreet_agency-tab-pane-half wallstreet_agency-tab-pane-first-half">
                	<div class="col-md-6">
	                    <a href="<?php echo esc_url('https://wordpress.org/support/view/theme-reviews/wallstreet-agency'); ?>" target="_blank"  class="info-block">
			                  	<div class="dashicons dashicons-smiley info-icon"></div>
			                  	<p class="info-text"><?php echo esc_html__('Your feedback is valuable to us','wallstreet-agency'); ?></p>
	                    </a>
                	</div>
                	<div class="col-md-6">
	                    <a href="<?php echo esc_url('https://webriti.com/wallstreet/'); ?>" target="_blank"  class="info-block">
		                    	<div class="dashicons dashicons-book-alt info-icon"></div>
		                    	<p class="info-text"><?php echo esc_html__('Premium Theme Details','wallstreet-agency'); ?></p>
	                    </a>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
