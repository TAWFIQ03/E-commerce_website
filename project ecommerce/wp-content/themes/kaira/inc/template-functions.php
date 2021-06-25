<?php
/**
 * Functions for theme.
 *
 * @package kaira
 */

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function kaira_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'kaira_pingback_header' );

if ( ! function_exists( 'kaira_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function kaira_entry_meta() {

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comment"><i class="fa fa-comment-o"></i>';
		/* translators: %s: Number of comments. */
		comments_popup_link( esc_html__( 'Leave a comment', 'kaira' ), esc_html__( '1 Comment', 'kaira' ), esc_html__( '% Comments', 'kaira' ) ); 
		echo '</span>';
	}

}
endif;