<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kaira
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
			<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$comment_count = get_comments_number();
				if ( 1 === $comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html_e( '%1$s Comment', 'kaira' ),
						'<span>' . get_the_title() . '</span>'
					);
				} else {
					printf( // WPCS: XSS OK.
						/* translators: 1: comment count number, 2: title. */
						esc_html( _nx( '%1$s Comments', '%1$s Comments', $comment_count, 'comments title', 'kaira' ) ),
						number_format_i18n( $comment_count ),
						'<span>' . get_the_title() . '</span>'
					);
				}
			?>
		</h2><!-- .comments-title -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'kaira' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'kaira' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'kaira' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 90,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'kaira' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'kaira' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'kaira' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'kaira' ); ?></p>
	<?php
	endif;
    
    //https://codex.wordpress.org/Function_Reference/comment_form
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $fields =  array(
        'author' =>
            '<div class="col-md-4 no-padding no-padding-right"><p class="comment-form-author"><input id="author" name="author" type="text" placeholder="' .esc_attr('Full Name', 'kaira'). '" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30"' . $aria_req . ' /></p></div>',
        'email' =>
            '<div class="col-md-4 no-padding no-padding-right"><p class="comment-form-email"><input id="email" name="email" type="text" placeholder="' .esc_attr('Email Address', 'kaira'). '" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' /></p></div>',
        'url' =>
            '<div class="col-md-4 no-padding no-padding-right"><p class="comment-form-url"><input id="url" name="url" type="text" placeholder="' .esc_attr('Website', 'kaira'). '" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" size="30" /></p></div>',
    );
    $comment_arg = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'submit',
        'class_submit'      => 'submit',
        'name_submit'       => 'submit',
        'label_submit'		=> esc_attr__( 'Comment', 'kaira' ), /* translators: %s: title of comment form */
        'title_reply'       => esc_html__( 'Leave a Comment', 'kaira' ), /* translators: %s: title of comment form */
        'title_reply_to'    => esc_html__( 'Leave a Comment to %s', 'kaira' ),
        'cancel_reply_link' => esc_html__( 'Cancel Reply', 'kaira' ),
        'format'            => 'xhtml',
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' .esc_html('Leave your comment here...', 'kaira'). '" cols="45" rows="8" aria-required="true">' .
            '</textarea></p>',

        'must_log_in' => '<p class="must-log-in">' .
        sprintf( /* translators: %s: login url */
        __( 'You must be <a href="%s">logged in</a> to post a comment.', 'kaira' ), 
        wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
        ) . '</p>',

        'logged_in_as' => '<p class="logged-in-as">' .
        sprintf( /* translators: %s: user profile url */	
        __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'kaira' ), 
        admin_url( 'profile.php' ),
        $user_identity,
        wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
        ) . '</p>',            
        
        'comment_notes_before' => '',
        'comment_notes_after' => '',

        
    );
    
    comment_form( $comment_arg );?>

</div><!-- #comments -->
