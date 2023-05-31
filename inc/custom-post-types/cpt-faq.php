<?php
/**cpt faqs (Irina Starchenko fragment)**/
add_action('init', 'create_cpt_faq');
function create_cpt_faq(){
	register_post_type('faqs', array(
		'labels'             => array(
			'name'               => 'FAQ',
			'singular_name'      => 'FAQ',
			'add_new'            => 'Add new question',
			'add_new_item'       => 'Add new question',
			'edit_item'          => 'Edit question',
			'new_item'           => 'New question',
			'view_item'          => 'View question',
			'search_items'       => 'Search question',
			'not_found'          => 'No found question',
			'not_found_in_trash' => 'No found question in Trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'FAQ',
		),
		'menu_icon'          => 'dashicons-editor-help',
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title', 'editor')
	) );
}