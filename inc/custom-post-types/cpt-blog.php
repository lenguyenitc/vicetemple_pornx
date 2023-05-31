<?php
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_blog_taxonomies', 0 );
// create two taxonomies, genres and writers for the post type "book"
function create_blog_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'                  => esc_html__( 'Categories', 'arc'  ),
		'singular_name'         => esc_html__( 'Category', 'arc'  ),
		'add_new'               => esc_html__( 'Add New Category', 'arc' ),
		'add_new_item'          => esc_html__( 'Add New Category' , 'arc' ),
		'edit_item'             => esc_html__( 'Edit Category' , 'arc' ),
		'new_item'              => esc_html__( 'New Category' , 'arc' ),
		'view_item'             => esc_html__( 'View Category' , 'arc' ),
		'search_items'          => esc_html__( 'Search Categories', 'arc'  ),
		'not_found'             => esc_html__( 'No Category found' , 'arc' ),
		'not_found_in_trash'    => esc_html__( 'No Category found in Trash' , 'arc' ),
	);

	$args = array(
		'labels'            => $labels,
		'singular_label'    => esc_html__('Category', 'arc' ),
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest' 		=> true,
		'hierarchical'      => true,
		'show_tagcloud'     => false,
		'show_in_nav_menus' => true,
		'rewrite'           => array('slug' => 'blog-category', 'with_front' => false ),
	);

	register_taxonomy( 'blog_category', 'blog', $args );
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'                  => esc_html__( 'Tags', 'arc'  ),
		'singular_name'         => esc_html__( 'Tag', 'arc'  ),
		'add_new'               => esc_html__( 'Add New Tag', 'arc' ),
		'add_new_item'          => esc_html__( 'Add New Tag', 'arc'  ),
		'edit_item'             => esc_html__( 'Edit Tag', 'arc'  ),
		'new_item'              => esc_html__( 'New Tag', 'arc'  ),
		'view_item'             => esc_html__( 'View Tag', 'arc'  ),
		'search_items'          => esc_html__( 'Search Tags' , 'arc' ),
		'not_found'             => esc_html__( 'No Tag found' , 'arc' ),
		'not_found_in_trash'    => esc_html__( 'No Tag found in Trash', 'arc'  ),
	);

	$args = array(
		'labels'            => $labels,
		'singular_label'    => esc_html__('Tag', 'arc' ),
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest' 		=> true,
		'hierarchical'      => false,
		'show_tagcloud'     => true,
		'show_in_nav_menus' => true,
		'rewrite'           => array('slug' => 'blog-tag', 'with_front' => false ),
	);
	register_taxonomy( 'blog_tag', 'blog', $args );
}



function register_blog_posttype() {
	$labels = array(
		'name'              => esc_html__( 'Blog', 'arc'  ),
		'singular_name'     => esc_html__( 'Blog', 'arc'  ),
		'add_new'           => esc_html__( 'Add Article', 'arc'  ),
		'add_new_item'      => esc_html__( 'Add Article', 'arc'  ),
		'edit_item'         => esc_html__( 'Edit Article' , 'arc' ),
		'new_item'          => esc_html__( 'New Article' , 'arc' ),
		'view_item'         => esc_html__( 'View Article' , 'arc' ),
		'search_items'      => esc_html__( 'Search Article', 'arc'  ),
		'not_found'         => esc_html__( 'No Article found' , 'arc' ),
		'not_found_in_trash'=> esc_html__( 'No Article found in Trash', 'arc'  ),
		'parent_item_colon' => '',
		'menu_name'         => esc_html__( 'Blog', 'arc'  )
	);
//$taxonomies = array( 'exhibition_type' );
	$supports = array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields');
	$post_type_args = array(
		'labels'            => $labels,
		'singular_label'    => esc_html__('Blog', 'arc' ),
		'public'            => true,
		'show_ui'           => true,
		'publicly_queryable'=> true,
		'query_var'         => true,
		'capability_type'   => 'post',
		'has_archive'       => true,
		'hierarchical'      => true,
		'rewrite'           => array('slug' => 'blog', 'with_front' => false ),
		'supports'          => $supports,
		'show_in_rest' 		=> true,
		'menu_position'     => 5,
		'menu_icon'         => 'dashicons-admin-post',
//'taxonomies'      => $taxonomies,
		'show_in_nav_menus' => true,
		'delete_with_user' => true
	);
	register_post_type('blog', $post_type_args);
}
add_action('init', 'register_blog_posttype');