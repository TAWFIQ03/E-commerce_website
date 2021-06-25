<?php get_header(); ?>
<!-- Page Title Section -->
<?php get_template_part('index', 'breadcrumb'); ?>
<!-- /Page Title Section -->
<!-- Blog & Sidebar Section -->
<div class="container" id="content">
	<div class="row">		
		<!--Blog Area-->
		<div class="<?php if(is_active_sidebar('woocommerce')){ echo 'col-md-8'; } else { echo 'col-md-12'; } ?>" >
				<div id="post-<?php the_ID(); ?>">
					<?php woocommerce_content(); ?>
				</div>	
			</div>
			<!--/End of Blog Detail-->

			<?php get_sidebar('woocommerce'); ?>
		
	</div>	
</div>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer();