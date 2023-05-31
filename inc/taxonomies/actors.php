<?php //hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
add_action( 'init', 'arc_create_actors_taxonomy', 0 );
function arc_create_actors_taxonomy() {
// Labels part for the GUI
	$labels = array(
		'name' => esc_html__('Actors', 'arc' ),
		'singular_name' => esc_html__( 'Actor', 'arc' ),
		'search_items' =>  __( 'Search Actors', 'arc' ),
		'popular_items' => __( 'Popular Actors', 'arc' ),
		'all_items' => __( 'All Actors', 'arc' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Actor', 'arc' ),
		'update_item' => __( 'Update Actor', 'arc' ),
		'add_new_item' => __( 'Add a new actor', 'arc' ),
		'new_item_name' => __( 'New Actor Name', 'arc' ),
		'separate_items_with_commas' => __( 'Separate Actors with commas', 'arc' ),
		'add_or_remove_items' => __( 'Add or remove Actors', 'arc' ),
		'choose_from_most_used' => __( 'Choose from the most used Actors', 'arc' ),
		'menu_name' => __( 'Actors', 'arc' ),
		'back_to_items' => __('Go to Actors', 'arc')
	);
// Now register the non-hierarchical taxonomy like tag
	register_taxonomy('actors','post', array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'show_in_rest' => true,
		'rewrite' => array( 'slug' => 'actor' )
	));
}