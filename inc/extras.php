<?php
function arc_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'arc_body_classes' );
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function arc_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'arc_pingback_header' );
if( !function_exists('arc_get_post_data') ){
	function arc_get_post_data( $post_id ) {
		return get_post( $post_id );
	}
}
remove_filter( 'get_the_author_description', 'wpautop' );