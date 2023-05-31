<?php
add_action( 'xbox_init', 'admin_premium_page_metabox');
function admin_premium_page_metabox(){
	$options = array(
		'id' => 'admin_premium_page_metabox_id',
		'title' => 'Logos Grid',
		'post_types' => ['page'],
		'show_in' => [get_page_by_path('premium')->ID]
	);
	$xbox = xbox_new_metabox($options);

	$xbox->add_field(array(
		'id' => 'grid-layout',
		'name' => __('Grid layout', 'arc' ),
		'type' => 'title',
	));
	$xbox->add_field(array(
		'id' => 'grid-layout-rows',
		'name' => __('Rows', 'arc' ),
		'type' => 'number',
		'default' => 6,
		'options' => array(
			'unit' => 'rows',
			'show_unit' => true,
			'show_spinner' => true,
			'disable_spinner' => false,
		),
		'attributes' => array(
			'min' => 1,
			'max' => 6,
			'step' => 1,
			'precision' => 0,
		)
	));
	$xbox->add_field(array(
		'id' => 'grid-layout-cols',
		'name' => __('Cols', 'arc' ),
		'type' => 'number',
		'default' => 9,
		'options' => array(
			'unit' => 'cols',
			'show_unit' => true,
			'show_spinner' => true,
			'disable_spinner' => false,
		),
		'attributes' => array(
			'min' => 1,
			'max' => 9,
			'step' => 1,
			'precision' => 0,
		)
	));

	$xbox->add_field(array(
		'id' => 'add-logos',
		'name' => __('Add logos', 'arc' ),
		'desc' => __('Images should be dimensions 100x33px', 'arc' ),
		'type' => 'title',
	));

	$xbox->add_field(array(
		'id' => 'premium-images-list',
		'name' => __('Choose images', 'arc'),
		'type' => 'file',
		'options' => array(
			'multiple' => true,
			'mime_types' => array( 'jpg', 'jpeg', 'png'),
			'preview_size' => array( 'width' => '100px' ),
		)
	));
}