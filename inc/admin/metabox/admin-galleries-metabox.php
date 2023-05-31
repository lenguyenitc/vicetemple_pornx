<?php
add_action( 'xbox_init', 'admin_galleries_metabox');
function admin_galleries_metabox(){
	$options = array(
		'id' => 'admin_galleries_metabox_id',
		'title' => 'Album information',
		'post_types' => ['photos'],
	);
	$xbox = xbox_new_metabox( $options );
	$xbox->add_field(array(
		'id' => 'admin-gallery-type',
		'name' => __('Set as a GIF gallery', 'arc' ),
		'desc' => 'Set the album to be filtered by the GIF-only option on the Photos & GIFs page.',
		'type' => 'radio',
		'default' => 'off',
		'items' => array(
			'off' => 'No',
			'on' => 'Yes',
		),
	));
}