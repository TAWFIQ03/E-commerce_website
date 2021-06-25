<?php $wallstreet_agency_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ),wallstreet_theme_data_setup());
if($wallstreet_agency_options['blog_section_enabled'] == true) { ?>
<div class="container home-blog-section">
    <div class="row">
      	<div class="section_heading_title">
          	<?php if($wallstreet_agency_options['home_blog_heading']) { ?>
          		<h1><?php echo esc_html($wallstreet_agency_options['home_blog_heading']); ?></h1>
          	<?php } ?>
          	<?php if($wallstreet_agency_options['home_blog_description']) { ?>
          		<div class="pagetitle-separator">
          			<div class="pagetitle-separator-border">
          				<div class="pagetitle-separator-box"></div>
          			</div>
          		</div>
          		<p><?php echo esc_html($wallstreet_agency_options['home_blog_description']); ?></p>
          	<?php } ?>
      	</div>
    </div>

    <div class="row home-blog-content">
      <div class="col-md-12">
			<?php
			$wallstreet_agency_args = array( 'post_type' => 'post','post__not_in'=>get_option("sticky_posts"),'posts_per_page' => 3);
			query_posts( $wallstreet_agency_args );
			if(query_posts( $wallstreet_agency_args ))
			{
          $i=1;
  				while(have_posts()):the_post();
            $i++;?>
              <div class="blog-section-left blog-list-view <?php if($i%2!=0){echo 'right';}?>">
                <div class="media">
                    <div class="blog-post-img">
                        <a href="<?php the_permalink(); ?>">
                            <?php
                                $wallstreet_agency_defalt_arg = array('class' => "img-responsive");
                                if (has_post_thumbnail()):
                                    the_post_thumbnail('', $wallstreet_agency_defalt_arg);
                                endif;
                            ?>
                        </a>
                      </div>
                      <div class="blog-post-title media-body <?php if(!has_post_thumbnail()) { echo 'remove-img'; } ?>">
                          <div class="blog-post-date">
                              <span class="date"><?php echo esc_html(get_the_date()); ?></span>
                              <span class="comment"><a href="<?php the_permalink(); ?>"><i class="fa fa-comment"></i><?php echo esc_html(get_comments_number()); ?></a></span>
                          </div>
                          <div class="blog-post-title-wrapper">
                              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                              <p><?php echo esc_html(get_the_excerpt()); ?></p>
                              <div class="blog-btn-col">
                                <a href="<?php the_permalink(); ?>" class="blog-btn"><?php esc_html_e('Read More', 'wallstreet-agency'); ?></a>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
              <?php
          endwhile;
          wp_reset_postdata();
			} ?>
      </div>
		</div>
</div>
<?php } ?>
