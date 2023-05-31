<?php
function register_user_posts_post_type() {
    $labels = array(
        'name'              => esc_html__( 'Community Feed', 'arc'  ),
        'singular_name'     => esc_html__( 'Community feed', 'arc'  ),
        'add_new'           => esc_html__( 'Add a new post', 'arc'  ),
        'add_new_item'      => esc_html__( 'Add a new post', 'arc'  ),
        'edit_item'         => esc_html__( 'Edit a post' , 'arc' ),
        'new_item'          => esc_html__( 'New post' , 'arc' ),
        'view_item'         => esc_html__( 'View post' , 'arc' ),
        'search_items'      => esc_html__( 'Search post', 'arc'  ),
        'not_found'         => esc_html__( 'No post found' , 'arc' ),
        'not_found_in_trash'=> esc_html__( 'No post found in Trash', 'arc'  ),
        'parent_item_colon' => '',
        'menu_name'         => esc_html__( 'Community Feed', 'arc'  )
    );
//$taxonomies = array( 'exhibition_type' );
    $supports = array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'custom-fields');
    $post_type_args = array(
        'labels'            => $labels,
        'singular_label'    => esc_html__('Community Feed', 'arc' ),
        'public'            => false,
        'show_ui'           => true,
        'publicly_queryable'=> false,
        'query_var'         => true,
        'capability_type'   => 'post',
        'has_archive'       => false,
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'user-post', 'with_front' => false ),
        'supports'          => $supports,
        'show_in_rest' 		=> true,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-megaphone',
//'taxonomies'      => $taxonomies,
        'show_in_nav_menus' => true,
        'delete_with_user' => true
    );
    register_post_type('user_post', $post_type_args);
}
add_action('init', 'register_user_posts_post_type');