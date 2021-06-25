<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.','wallstreet' ); ?></p>
<?php return; endif; ?>
<?php if ( have_comments() ) { ?>

<div class="comment-section">
	<div class="comment-title">
	<h3><i class="fa fa-comment-o"></i>
		<?php
				printf( esc_html( __('One thought on &ldquo;%2$s&rdquo;','wallstreet'), __('%1$s thoughts on &ldquo;%2$s&rdquo;','wallstreet'), get_comments_number() ),
					esc_html(number_format_i18n( get_comments_number() )), '<span>' . esc_html(get_the_title()) . '</span>' );
			?>
	</h3>
	</div>
	<?php wp_list_comments( array( 'callback' => 'wallstreet_comment' ) ); ?>
</div> <!---comment_section--->

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'wallstreet' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'wallstreet' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;','wallstreet') ); ?></div>
		</nav>
		<?php }?>
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php esc_html_e( 'Comments are closed' ,'wallstreet' ); ?></p>
		<?php endif; ?>
	<?php } ?>
	<?php if ('open' == $post->comment_status) { ?>
	<?php if ( get_option('comment_registration') && isset($user_ID) ) { ?>
	<p><?php echo sprintf( 	wp_kses(
											/* translators: %s is Link to login */
											__( 'You must be <a href="%s">logged in</a> to post a comment.', 'wallstreet' ),
											array(
												'a' => array(
													'href' => array(),
												),
											)
										), esc_url(site_url( 'wp-login.php' )) . '?redirect_to=' .  urlencode(esc_url(get_permalink()))); ?></p>
<?php } else {
?>
<div class="comment-form-section">
	<?php
	 $wallstreet_fields=array(
		'author' => '<div class="blog-form-group"><input class="blog-form-control" name="author" id="author" value="" type="name" placeholder="'.esc_attr__('Name','wallstreet').'" /></div>',
		'email' => '<div class="blog-form-group"><input class="blog-form-control" name="email" id="email" value="" type="email" placeholder="'.esc_attr__('Email','wallstreet').'" /></div>',
		);
		function wallstreet_fields($wallstreet_fields) {
			return $wallstreet_fields;
		}
		add_filter('comment_form_default_fields','wallstreet_fields');
			$wallstreet_defaults = array(
			'fields'=> apply_filters( 'comment_form_default_fields', $wallstreet_fields ),
			'comment_field'=> '<div class="blog-form-group-textarea" >
			<textarea id="comments" rows="5" class="blog-form-control-textarea" name="comment" type="text" placeholder="'.esc_attr__('Leave your message','wallstreet').'"></textarea></div>',
			'logged_in_as' => '<p class="logged-in-as">' . esc_html__("Logged in as",'wallstreet' ).'<a href="'.  esc_url(admin_url( 'profile.php' )).'"> '.$user_identity.'</a>'. '<a href="'. esc_url(wp_logout_url( get_permalink() )).'" title="'.esc_attr__('Log out from this Account','wallstreet').'"> '.esc_html__("Logout",'wallstreet').'</a>' . '</p>',
			'id_submit'=> 'blogdetail_btn',
			'label_submit'=>esc_html__('Send Message','wallstreet'),
			'comment_notes_after'=> '',
			'comment_notes_before' => '',
			'title_reply'=> '<div class="comment-title"><h3><i class="fa fa-comment-o"></i>'.esc_html__('Leave your message','wallstreet').'</h3></div>',
			'id_form'=> 'commentform'
			);
		comment_form($wallstreet_defaults);
	?>
</div>
<?php } }
