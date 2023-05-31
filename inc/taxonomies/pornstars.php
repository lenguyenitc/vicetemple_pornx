<?php //hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires
add_action( 'init', 'arc_create_pornstars_taxonomy', 0 );
function arc_create_pornstars_taxonomy() {
// Labels part for the GUI
	$labels = array(
		'name' => esc_html__('Pornstars', 'arc' ),
		'singular_name' => esc_html__( 'Pornstar', 'arc' ),
		'search_items' =>  __( 'Search Pornstars', 'arc' ),
		'popular_items' => __( 'Popular Pornstars', 'arc' ),
		'all_items' => __( 'All Pornstars', 'arc' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Pornstar', 'arc' ),
		'update_item' => __( 'Update Pornstar', 'arc' ),
		'add_new_item' => __( 'Add a new pornstar', 'arc' ),
		'new_item_name' => __( 'New Pornstar Name', 'arc' ),
		'separate_items_with_commas' => __( 'Separate Pornstar with commas', 'arc' ),
		'add_or_remove_items' => __( 'Add or remove Pornstars', 'arc' ),
		'choose_from_most_used' => __( 'Choose from the most used Pornstars', 'arc' ),
		'menu_name' => __( 'Pornstars', 'arc' ),
		'back_to_items' => __('Go to Pornstars', 'arc')
	);
// Now register the non-hierarchical taxonomy like tag
	register_taxonomy('pornstars','post', array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var' => true,
		'show_in_rest' => true,
		'rewrite' => array( 'slug' => 'pornstar' )
	));
}