<?php get_header(); ?>
<!-- Page Title Section -->
<div class="page-mycarousel">
	<img src="<?php echo esc_url(WALLSTREET_TEMPLATE_DIR_URI);?>/images/page-header-bg.jpg"  class="img-responsive">
	<div class="container page-title-col">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1><?php esc_html_e('Error 404', 'wallstreet'); ?></h1>		
			</div>	
		</div>
	</div>
	<div class="page-breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumbs">
						<?php if (function_exists('wallstreet_custom_breadcrumbs')) wallstreet_custom_breadcrumbs();?>
					</ol>
				</div>
			</div>	
		</div>
	</div>
</div>
<!-- /Page Title Section -->
<div class="container" id="content">
	<div class="row">	
		<div class="col-md-12">
			<div class="error_404">
				<h2><?php esc_html_e('Error 404','wallstreet'); ?></h2>
				<h4><?php esc_html_e('Oops! Page not found','wallstreet'); ?></h4>
				<p><?php esc_html_e('We are sorry, but the page you are looking for does not exist.','wallstreet'); ?></p>
				<p><a href="<?php echo esc_url( home_url( '/' ) );?>" id="blogdetail_btn"><?php esc_html_e('Go Back','wallstreet'); ?></a></p>
			</div>
		</div>
	</div>
</div>
<!-- 404 Error Section -->
<?php get_footer();