<?php
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_photos_taxonomies', 0 );
// create two taxonomies, genres and writers for the post type "book"
function create_photos_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'                  => esc_html__( 'Categories', 'arc' ),
		'singular_name'         => esc_html__( 'Category', 'arc'  ),
		'add_new'               => esc_html__( 'Add New Category', 'arc' ),
		'add_new_item'          => esc_html__( 'Add New Category', 'arc'  ),
		'edit_item'             => esc_html__( 'Edit Category', 'arc'  ),
		'new_item'              => esc_html__( 'New Category' , 'arc' ),
		'view_item'             => esc_html__( 'View Category', 'arc'  ),
		'search_items'          => esc_html__( 'Search Categories', 'arc'  ),
		'not_found'             => esc_html__( 'No Category found', 'arc'  ),
		'not_found_in_trash'    => esc_html__( 'No Category found in Trash' , 'arc' ),
	);
	$args = array(
		'labels'            => $labels,
		'singular_label'    => esc_html__('Categories', 'arc' ),
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest' 		=> true,
		'hierarchical'      => true,
		'show_tagcloud'     => false,
		'show_in_nav_menus' => true,
		'rewrite'           => array('slug' => 'photos-category', 'with_front' => false ),
	);
	//register_taxonomy( 'photos_category', 'photos', $args );

	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'                  => esc_html__( 'Tags', 'arc'  ),
		'singular_name'         => esc_html__( 'Tag', 'arc'  ),
		'add_new'               => esc_html__( 'Add new tags', 'arc' ),
		'add_new_item'          => esc_html__( 'Add new tags', 'arc'  ),
		'edit_item'             => esc_html__( 'Edit Tag', 'arc'  ),
		'new_item'              => esc_html__( 'New Tag' , 'arc' ),
		'view_item'             => esc_html__( 'View Tag' , 'arc' ),
		'search_items'          => esc_html__( 'Search Tags', 'arc' ),
		'not_found'             => esc_html__( 'No Tag found' , 'arc' ),
		'not_found_in_trash'    => esc_html__( 'No Tag found in Trash' , 'arc' ),
	);
	$args = array(
		'labels'            => $labels,
		'singular_label'    => esc_html__('Tags', 'arc' ),
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest' 		=> true,
		'show_tagcloud'     => false,
		'hierarchical'      => false,
		'show_in_nav_menus' => true,
		'rewrite'           => array('slug' => 'photos_tag', 'with_front' => false ),
	);
	register_taxonomy( 'photos_tag', 'photos', $args );
}
function register_photos_posttype() {
	$labels = array(
		'name'              => esc_html__( 'Photos and GIFs', 'arc'  ),
		'singular_name'     => esc_html__( 'Photos and GIFs', 'arc' ),
		'add_new'           => esc_html__( 'Add Album', 'arc'  ),
		'add_new_item'      => esc_html__( 'Add Album', 'arc'  ),
		'edit_item'         => esc_html__( 'Edit Album', 'arc'  ),
		'new_item'          => esc_html__( 'New Album' , 'arc' ),
		'view_item'         => esc_html__( 'View Album', 'arc'  ),
		'search_items'      => esc_html__( 'Search albums' , 'arc' ),
		'not_found'         => esc_html__( 'No Album found' , 'arc' ),
		'not_found_in_trash'=> esc_html__( 'No Album found in Trash' , 'arc' ),
		'parent_item_colon' => '',
		'menu_name'         => esc_html__( 'Photos and GIFs', 'arc'  )
	);
//$taxonomies = array( 'exhibition_type' );
	$supports = array('title',
		'editor',
		'excerpt',
		'author',
		'thumbnail',
		'comments',
		'revisions',
		'custom-fields', );
	$post_type_args = array(
		'labels'            => $labels,
		'singular_label'    => esc_html__('Photos and GIFs', 'arc' ),
		'public'            => true,
		'show_ui'           => true,
		'publicly_queryable'=> true,
		'query_var'         => true,
		'capability_type'   => 'post',
		'has_archive'       => true,
		'hierarchical'      => true,
		'rewrite'           => array('slug' => 'photos', 'with_front' => false ),
		'supports'          => $supports,
		'show_in_rest' 		=> true,
		'menu_position'     => 4,
		'menu_icon'         => 'dashicons-format-gallery',
//'taxonomies'      => $taxonomies,
		'show_in_nav_menus' => true,
		'delete_with_user' => true
	);
	register_post_type('photos', $post_type_args);
}
add_action('init', 'register_photos_posttype');