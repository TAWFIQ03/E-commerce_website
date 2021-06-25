<?php
function wallstreet_theme_data_setup()
{

	return $theme_options=array(
			//Logo and Fevicon header
			'upload_image_logo'=>'',
			'height'=>'50',
			'width'=>'250',
			'text_title'=>__('on','wallstreet'),
			'upload_image_favicon'=>'',
			'webrit_custom_css'=>'',

			//Featured Image Setting
			'home_banner_enabled'=>__('on','wallstreet'),
			'slider_title_one' => __('Lorem ipsum dolor sit amet','wallstreet'),
			'slider_title_two' => __('Welcome to WallStreet','wallstreet'),
			'slider_description' => __('Maecenas a blandit justo. Curabitur dignissim quam quis malesuada ultrices. Vestibulum nisi augue, ultricies id congue vel.','wallstreet'),
			'slider_image' => 'slider',

			// service
			'service_section_enabled' => true,
			'service_section_animation_enabled' => true,

			'service_image_one' => 'service1',
			'service_title_one'=> __('Habitasse platea','wallstreet'),
			'service_description_one' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.','wallstreet'),

			'service_image_two' => 'service2',
			'service_title_two'=> __('Habitasse platea','wallstreet'),
			'service_description_two' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.','wallstreet'),

			'service_image_three' => 'service3',
			'service_title_three'=> __('Habitasse platea','wallstreet'),
			'service_description_three' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.','wallstreet'),

			//portfolio
			'portfolio_section_enabled' => true,

			'portfolio_title_one' => __('Aenean eu risus','wallstreet'),
			'portfolio_description_one' => __('Integer pellentesque dolor molestie, pellentesque nibh quis, vulputate lorem.','wallstreet'),
			'portfolio_image_one' => 'portfolio1',

			'portfolio_title_two' => __('Aenean eu risus','wallstreet'),
			'portfolio_description_two' => __('Integer pellentesque dolor molestie, pellentesque nibh quis, vulputate lorem.','wallstreet'),
			'portfolio_image_two' => 'portfolio2',

			'portfolio_title_three' => __('Aenean eu risus','wallstreet'),
			'portfolio_description_three' => __('Integer pellentesque dolor molestie, pellentesque nibh quis, vulputate lorem.','wallstreet'),
			'portfolio_image_three' => 'portfolio3',

			'portfolio_title_four' => __('Aenean eu risus','wallstreet'),
			'portfolio_description_four' => __('Integer pellentesque dolor molestie, pellentesque nibh quis, vulputate lorem.','wallstreet'),
			'portfolio_image_four' => 'portfolio4',

			//Home blog
			'blog_section_enabled' =>__('on','wallstreet'),

			// Head Titles
			'contact_header_settings' => true,
			'contact_phone_number' => __('9-999-999-999','wallstreet'),
			'contact_email' => __('abc@example.com.com','wallstreet'),
			'service_title' => __('Lorem Ipsum','wallstreet'),
			'service_description' => __('Orci varius natoque penatibus et magnis.','wallstreet'),
			'portfolio_title' => __('Sed mollis neque','wallstreet'),
			'portfolio_description' => __('Nunc congue nulla sed','wallstreet'),
			'home_blog_heading'=> __('Curabitur lacinia','wallstreet'),
			'home_blog_description' => __('Curabitur quis nibh vulputate nisi tincidunt eleifend.','wallstreet'),

			/** Social media links **/
			'header_social_media_enabled'=> true,
			'footer_social_media_enabled'=> false,
			'social_media_twitter_link' =>"",
			'social_media_facebook_link' =>"",
			'social_media_linkedin_link' =>"",
			'social_media_youtube_link' =>"",
			'social_media_instagram_link' => '',

			/** footer customization **/
			'footer_copyright' => '<p>'.__( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: <a href="https://webriti.com" rel="nofollow"> Wallstreet</a> by Webriti', 'wallstreet' ).'</p>',

		);
}
