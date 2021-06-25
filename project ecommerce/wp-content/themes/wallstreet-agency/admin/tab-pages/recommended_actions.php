<?php
	$wallstreet_agency_actions = $this->recommended_actions;
	$wallstreet_agency_actions_todo = get_option( 'recommended_actions', false );
?>
<div id="recommended_actions" class="wallstreet_agency-tab-pane panel-close">
		<div class="action-list">
				<?php if($wallstreet_agency_actions): foreach ($wallstreet_agency_actions as $key => $wallstreet_agency_actionValue): ?>
				<div class="action" id="<?php echo esc_attr($wallstreet_agency_actionValue['id']); ?>">
							<div class="recommended_box col-md-6 col-sm-6 col-xs-12">
										<div class="seprate-plugin-box">
												<img width="772" height="180" src="<?php echo esc_url(WALLSTREET_AGENCY_TEMPLATE_DIR_URI.'/images/'.str_replace(' ', '-', strtolower($wallstreet_agency_actionValue['title'])).'.png');?>">
												<div class="action-inner">
														<h3 class="action-title"><?php echo esc_html($wallstreet_agency_actionValue['title']); ?></h3>
														<div class="action-desc"><?php echo esc_html($wallstreet_agency_actionValue['desc']); ?></div>
														<?php echo wp_kses_post($wallstreet_agency_actionValue['link']); ?>
														<div class="action-watch">
															<?php if(!$wallstreet_agency_actionValue['is_done']): ?>
																<?php if(!isset($wallstreet_agency_actions_todo[$wallstreet_agency_actionValue['id']]) || !$wallstreet_agency_actions_todo[$wallstreet_agency_actionValue['id']]): ?>
																	<span class="dashicons dashicons-visibility"></span>
																<?php else: ?>
																	<span class="dashicons dashicons-hidden"></span>
																<?php endif; ?>
															<?php else: ?>
																<span class="dashicons dashicons-yes"></span>
															<?php endif; ?>
														</div>
												</div>
										</div>
							</div>
				</div>
				<?php endforeach; endif; ?>
		</div>
</div>
