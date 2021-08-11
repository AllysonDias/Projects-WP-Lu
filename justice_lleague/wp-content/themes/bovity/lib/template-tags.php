<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bovity
 */

if ( ! function_exists( 'bovity_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function bovity_posted_on() {
		$time_string = '%2$s';
		

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="fa fa-clock-o"></i></i>' . $time_string . '</a>';

		echo '<li>' . $posted_on . '</li>'; // WPCS: XSS OK.

	}	
endif;
                          



if ( ! function_exists( 'bovity_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function bovity_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html( '%s', 'post author', 'bovity' ),
			'<li><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user-o"></i>' . esc_html( get_the_author() ) . '</a></li>'
		);

		echo  $byline ; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'bovity_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bovity_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'bovity' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tags: %1$s', 'bovity' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'bovity' ),
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

/**
 * All categories
 */
function bovity_all_categories() {
	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( esc_html( ' ', 'bovity' ) );
	if ( $categories_list ) {
		echo '<span class="cat-links">' . esc_html($categories_list) . '</span>';
	}
}

/**
 * Get the comments
 */
function bovity_get_comments_numbers() {

	echo '<ul class="post-cat" ><li><a><i class="fa fa-comment-o" aria-hidden="true"></i>';
	$comment_count = get_comments_number();
	if ( '1' === $comment_count ) {
		esc_html_e( '1 comment', 'bovity' );
	} else {
		printf( // WPCS: XSS OK.
			/* translators: 1: comment count number, 2: title. */
			esc_html( _nx( '%1$s comment', '%1$s comments', $comment_count, 'comments title', 'bovity' ) ),
			number_format_i18n( $comment_count )
		);
	}
	echo '</a></li></ul>';
}