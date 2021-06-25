<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Ibsen
 */

if ( ! function_exists( 'ibsen_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ibsen_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<span class="posted-on">' . $time_string . '</span>';

	}
endif;

if ( ! function_exists( 'ibsen_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ibsen_posted_by() {

		echo '<span class="byline"><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span> ';

	}
endif;

if ( ! function_exists( 'ibsen_entry_cats' ) ) :
	/**
	 * Prints HTML with meta information for the categories only.
	 */
	function ibsen_entry_cats() {
		// Hide category text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$list_item_seperator = esc_html__( ', ', 'ibsen' );

			$categories_list = get_the_category_list( $list_item_seperator );
			if ( $categories_list ) {
				echo '<span class="cat-links"><i class="ibsen-icon-folder"></i> ' . $categories_list . '</span>';
			}

		}

	}
endif;

if ( ! function_exists( 'ibsen_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ibsen_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			$author_post_count = count_user_posts( get_the_author_meta( 'ID' ) );
			if ( $author_post_count > 1 ) {
				/* translators: %2s: number of posts by this author. */
				$author_post_count_output = sprintf( ' - <span class="author-post-count"><a href="%1s">' . esc_html__( '%2s posts', 'ibsen' ) . '</a></span>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), $author_post_count );
			} else {
				$author_post_count_output = '';
			}

			echo '<p><span class="author vcard">' . get_avatar( get_the_author_meta( 'ID' ), '60' ) . '</span></p>';
			echo '<p><span class="author-name">' . esc_html( get_the_author() ) . '</span>' . $author_post_count_output . '</p>';
			echo '<p><span class="author-description">' . get_the_author_meta( 'description' ) . '</span></p>';

			/* translators: used between list items, there is a space after the comma */
			$list_item_seperator = esc_html__( ', ', 'ibsen' );

			$categories_list = get_the_category_list( $list_item_seperator );
			if ( $categories_list ) {
				echo '<span class="cat-links"><i class="ibsen-icon-folder"></i> ' . $categories_list . '</span>';
			}

			$tags_list = get_the_tag_list( '', $list_item_seperator );
			if ( $tags_list ) {
				echo '<span class="tags-links"><i class="ibsen-icon-tag"></i> ' . $tags_list . '</span>';
			}

		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ibsen' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'ibsen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'ibsen_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ibsen_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'ibsen_related_post_thumbnail' ) ) :
	function ibsen_related_post_thumbnail($related_id) {
		if ( post_password_required($related_id) || is_attachment($related_id) || ! has_post_thumbnail($related_id) ) {
			return;
		}
		?>

		<a class="post-thumbnail" href="<?php the_permalink($related_id); ?>" aria-hidden="true">
			<?php
			echo get_the_post_thumbnail( $related_id, 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
					'post' => $related_id,
				) ),
			) );
			?>
		</a>

		<?php
	}
endif;

if ( ! function_exists( 'ibsen_single_excerpt' ) ) :
	/**
	 * Displays the post excerpt.
	 *
	 * Do not display auto-generated excerpt, only manually added excerpt.
	 * [get_the_excerpt] and [apply_filters( 'the_excerpt', get_post_field( 'post_excerpt') )]
	 * are not suitable because some plugins are auto-generating unwanted excerpts.
	 *
	 */
	function ibsen_single_excerpt() {

		$single_excerpt = wp_kses_post( wpautop( get_post_field( 'post_excerpt') ) );
		if ( $single_excerpt ) { ?>
			<div class="single-excerpt">
				<?php echo $single_excerpt; ?>
			</div>
		<?php }

	}
endif;
