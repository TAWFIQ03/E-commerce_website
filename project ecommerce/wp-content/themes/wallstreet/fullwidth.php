<?php 
/*
Template Name: Full Width Page
*/
get_header(); ?>
<!-- Page Title Section -->
<?php get_template_part('index', 'breadcrumb'); ?>
<!-- /Page Title Section -->
<!-- Blog & Sidebar Section -->
<div class="container" id="content">
	<div class="row">		
		<!--Blog Area-->
		<div class="col-md-12">
		<?php the_post(); ?>
			<div class="blog-detail-section">
				<?php if(has_post_thumbnail()){ ?>
				<?php $wallstreet_defalt_arg =array('class' => "img-responsive"); ?>
				<div class="blog-post-img">
					<?php the_post_thumbnail('', $wallstreet_defalt_arg); ?>
				</div>
				<?php } ?>
				<div class="clear"></div>
				<div class="blog-post-title">
					<div class="blog-post-title-wrapper" style="width:100%";>
						<?php the_content(); ?>
					</div>
				</div>	
			</div>
			<?php comments_template('',true); ?>
		</div>		
		<!--/Blog Area-->
</div>
</div>
<?php get_footer();