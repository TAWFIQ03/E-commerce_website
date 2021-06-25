<div class="navbar navbar-wrapper navbar-inverse navbar-static-top navbar5" role="navigation">
	 <div class="container">
	 		<!--Header Details Section-->
			<div class="navbar-header index3">
				<div class="container">
					<?php
					the_custom_logo();
					if((get_option('blogname')!='') || (get_option('blogdescription')!='')): ?>
			      <div class="site-branding-text logo-link-url">
							<?php if(get_option('blogname')!=''): ?>
			        <h1 class="site-title">
			            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			                <div class="wallstreet_title_head"><?php bloginfo( 'name' ); ?></div>
			            </a>
			        </h1>
							<?php endif;
							$wallstreet_agency_description = get_bloginfo( 'description', 'display' );
							if(get_option('blogdescription')!='')
							{
									if ( $wallstreet_agency_description || is_customize_preview() ) : ?>
			    						<p class="site-description"><?php echo $wallstreet_agency_description; ?></p>
									<?php endif;
							} ?>
			      </div>
					<?php endif; ?>
				</div>
			</div>

      <!--/Header Details Section-->
	    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
  			<span class="sr-only"> <?php esc_html_e('Toggle navigation','wallstreet-agency'); ?> </span>
  			<span class="icon-bar"></span>
  			<span class="icon-bar"></span>
  			<span class="icon-bar"></span>
      </button>

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-collapse collapse" id="navigation">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'  => 'nav-collapse collapse navbar-inverse-collapse',
                'menu_class' => 'nav navbar-nav navbar-left',
                'fallback_cb' => 'wallstreet_fallback_page_menu',
                'walker' => new wallstreet_nav_walker()
                )
            );
            ?>
      </div>
   </div>
</div>
