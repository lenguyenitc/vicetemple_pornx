<?php
/**
 *** https://docs.metabox.io/fields/radio/
 ***/
function arc_video_information_metabox( $meta_boxes ) {
		$meta_boxes[] = array(
		'id' => 'video-information-metabox',
		'title' => esc_html__( 'Video information', 'arc' ),
		'post_types' => array('post'),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => 'premium_video',
				'name' => esc_html__( 'Premium', 'arc' ),
				'type' => 'radio',
				'desc' => __( '<i>Use this option only if you have enabled membership on the site.</i><br> Only users with premium subscriptions will be able to view the video.', 'arc' ),
				'placeholder' => '',
				'options' => array(
					'off' => esc_html__( 'No', 'arc' ),
					'on' => esc_html__( 'Yes', 'arc' ),
				),
				'inline' => 'true',
				'std' => 'off',
				'default' => 'off'

			),
			array(
				'id' => 'featured_video',
				'name' => esc_html__( 'Featured', 'arc' ),
				'type' => 'radio',
				'desc' => esc_html__( 'The video will be recommended and displayed as part of the homepage\'s carousel.', 'arc' ),
				'placeholder' => '',
				'options' => array(
					'off' => esc_html__( 'No', 'arc' ),
					'on' => esc_html__( 'Yes', 'arc' ),
				),
				'inline' => 'true',
				'std' => 'off'

			),
			array(
				'id' => 'hd_video',
				'name' => esc_html__( 'High-definition (HD)', 'arc' ),
				'type' => 'radio',
				'desc' => esc_html__( 'An "HD" label will be displayed over the video\'s thumbnail.', 'arc' ),
				'placeholder' => '',
				'options' => array(
					'off' => esc_html__( 'No', 'arc' ),
					'on' => esc_html__( 'Yes', 'arc' ),
				),
				'inline' => 'true',
				'std' => 'off',
			),
			array(
				'id' => 'production',
				'name' => esc_html__( 'Production', 'arc' ),
				'type' => 'radio',
				'desc' => esc_html__( 'Set video production. Users will be able to filter videos using these options.', 'arc' ),
				'placeholder' => '',
				'options' => array(
					'professional' => esc_html__( 'Professional', 'arc' ),
					'homemade' => esc_html__( 'Homemade', 'arc' ),
				),
				'inline' => 'true',
			),
			array(
				'id' => 'video_orientation',
				'name' => esc_html__( 'Orientation', 'arc' ),
				'type' => 'radio',
				'desc' => esc_html__( 'Set video orientation. Users will be able to filter videos using these options.', 'arc' ),
				'placeholder' => '',
				'options' => array(
					'straight' => esc_html__( 'Straight', 'arc' ),
					'gay' => esc_html__( 'Gay', 'arc' ),
					'bi' => esc_html__( 'Bi', 'arc' ),
					'trans' => esc_html__( 'Trans', 'arc' ),
				),
				'inline' => 'true',
			),
			array(
				'id' => 'video_url',
				'type' => 'file_input',
				'name' => esc_html__( 'File source (required)', 'arc' ),
				'desc' => esc_html__( 'Paste a URL to the video, or select a video file from the media library (mp4, webm, m4v, mov).', 'arc' ),
				'mime_type' => array('video/mp4', 'video/webm', 'video/quicktime'),
				'max_file_uploads' => 1,
				'max_status' => 'true',
			),
			array(
					'type' => 'heading',
					'name' => esc_html__( 'Additional resolutions', 'arc' ),
			),
			array(
				'id' => 'video_url_240',
				'type' => 'file_input',
				'name' => esc_html__( '240p', 'arc' ),
				'desc' => esc_html__( 'Paste a URL to the video, or select a video file from the media library (mp4, webm, m4v, mov).', 'arc' ),
				'mime_type' => array('video/mp4', 'video/webm', 'video/quicktime'),
				'max_file_uploads' => 1,
				'max_status' => 'true',
			),
			array(
				'id' => 'video_url_360',
				'type' => 'file_input',
				'name' => esc_html__( '360p', 'arc' ),
				'desc' => esc_html__( 'Paste a URL to the video, or select a video file from the media library (mp4, webm, m4v, mov).', 'arc' ),
				'mime_type' => array('video/mp4', 'video/webm', 'video/quicktime'),
				'max_file_uploads' => 1,
				'max_status' => 'true',
			),
			array(
				'id' => 'video_url_480',
				'type' => 'file_input',
				'name' => esc_html__( '480p', 'arc' ),
				'desc' => esc_html__( 'Paste a URL to the video, or select a video file from the media library. (mp4, webm, m4v, mov).', 'arc' ),
				'mime_type' => array('video/mp4', 'video/webm', 'video/quicktime'),
				'max_file_uploads' => 1,
				'max_status' => 'true',
			),
			array(
				'id' => 'video_url_720',
				'type' => 'file_input',
				'name' => esc_html__( '720p', 'arc' ),
				'desc' => esc_html__( 'Paste a URL to the video, or select a video file from the media library (mp4, webm, m4v, mov).', 'arc' ),
				'mime_type' => array('video/mp4', 'video/webm', 'video/quicktime'),
				'max_file_uploads' => 1,
				'max_status' => 'true',
			),
			array(
				'id' => 'video_url_1080',
				'type' => 'file_input',
				'name' => esc_html__( '1080p', 'arc' ),
				'desc' => esc_html__('Paste a URL to the video, or select a video file from the media library (mp4, webm, m4v, mov).', 'arc' ),
				'mime_type' => array('video/mp4', 'video/webm', 'video/quicktime'),
				'max_file_uploads' => 1,
				'max_status' => 'true',
			),
			array(
				'id' => 'video_url_4k',
				'type' => 'file_input',
				'name' => esc_html__( '4K', 'arc' ),
				'desc' => esc_html__( 'Paste a URL to the video, or select a video file from the media library (mp4, webm, m4v, mov).', 'arc' ),
				'mime_type' => array('video/mp4', 'video/webm', 'video/quicktime'),
				'max_file_uploads' => 1,
				'max_status' => 'true',
			),
			array(
				'id' => 'embed',
				'type' => 'textarea',
				'sanitize_callback' => 'none',
				'name' => esc_html__( 'Embed code', 'arc' ),
				'placeholder' => (string)'<iframe width="560" height="315" src="https://www.youtube.com/embed/BboMpayJomw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
				'desc' => esc_html__('Paste the video\'s embed code (e.g., iframe) to generate a video player on the frontend.', 'arc' ),
			),
			array(
				'id' => 'shortcode',
				'type' => 'text',
				'name' => esc_html__( 'Shortcode', 'arc' ),
				'desc' => esc_html__( 'Paste the video\'s shortcode (e.g., [video src="file.mp4"] or [viceplayer src="file.mp4"]) to generate a video player on the frontend.', 'arc' ),
			),
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Duration', 'arc' ),
                'desc' => esc_html__( 'Video duration will be detected automatically. However, you may manually adjust the timestamp displayed over video thumbnails.', 'arc' ),
			),
			array(
				'id' => 'hours',
				'name' => esc_html__( 'Hours', 'arc' ),
				'type' => 'select',
				'desc' => esc_html__( 'Set displayed hours', 'arc' ),
				'options' => array(
					_( '00'),
					_( '01'),
					_( '02'),
					_( '03'),
					_( '04'),
					_( '05'),
					_( '06'),
					_( '07'),
					_( '08'),
					_( '09'),
					_( '10')
				),
				'std' => '00',
			),
			array(
				'id' => 'minute',
				'name' => esc_html__( 'Minutes', 'arc' ),
				'type' => 'select',
				'desc' => esc_html__( 'Set displayed minutes', 'arc' ),
				'options' => array(
					_( '00'),
					_( '01'),
					_( '02'),
					_( '03'),
					_( '04'),
					_( '05'),
					_( '06'),
					_( '07'),
					_( '08'),
					_( '09'),
					_( '10'),
					_( '11'),
					_( '12'),
					_( '13'),
					_( '14'),
					_( '15'),
					_( '16'),
					_( '17'),
					_( '18'),
					_( '19'),
					_( '20'),
					_( '21'),
					_( '22'),
					_( '23'),
					_( '24'),
					_( '25'),
					_( '26'),
					_( '27'),
					_( '28'),
					_( '29'),
					_( '30'),
					_( '31'),
					_( '32'),
					_( '33'),
					_( '34'),
					_( '35'),
					_( '36'),
					_( '37'),
					_( '38'),
					_( '39'),
					_( '40'),
					_( '41'),
					_( '42'),
					_( '43'),
					_( '44'),
					_( '45'),
					_( '46'),
					_( '47'),
					_( '48'),
					_( '49'),
					_( '50'),
					_( '51'),
					_( '52'),
					_( '53'),
					_( '54'),
					_( '55'),
					_( '56'),
					_( '57'),
					_( '58'),
					_( '59')
				),
				'std' => '00',
			),
			array(
				'id' => 'second',
				'name' => esc_html__( 'Seconds', 'arc' ),
				'type' => 'select',
				'desc' => esc_html__( 'Set displayed seconds', 'arc' ),
				'options' => array(
					_( '00'),
					_( '01'),
					_( '02'),
					_( '03'),
					_( '04'),
					_( '05'),
					_( '06'),
					_( '07'),
					_( '08'),
					_( '09'),
					_( '10'),
					_( '11'),
					_( '12'),
					_( '13'),
					_( '14'),
					_( '15'),
					_( '16'),
					_( '17'),
					_( '18'),
					_( '19'),
					_( '20'),
					_( '21'),
					_( '22'),
					_( '23'),
					_( '24'),
					_( '25'),
					_( '26'),
					_( '27'),
					_( '28'),
					_( '29'),
					_( '30'),
					_( '31'),
					_( '32'),
					_( '33'),
					_( '34'),
					_( '35'),
					_( '36'),
					_( '37'),
					_( '38'),
					_( '39'),
					_( '40'),
					_( '41'),
					_( '42'),
					_( '43'),
					_( '44'),
					_( '45'),
					_( '46'),
					_( '47'),
					_( '48'),
					_( '49'),
					_( '50'),
					_( '51'),
					_( '52'),
					_( '53'),
					_( '54'),
					_( '55'),
					_( '56'),
					_( '57'),
					_( '58'),
					_( '59')
				),
				'std' => '00',
			),

			array(
				'type' => 'heading',
				'name' => esc_html__( 'Pornstar information', 'arc' ),
			),
			array(
				'id' => 'tattoo',
				'name' => esc_html__( 'Tattoos', 'arc' ),
				'type' => 'radio',
				'desc' => esc_html__( 'Set if the pornstars have tattoos. Users will be able to filter videos using these options.', 'arc' ),
				'placeholder' => '',
				'options' => array(
					'on' => esc_html__( 'Yes', 'arc' ),
					'off' => esc_html__( 'No', 'arc' ),
				),
				'inline' => 'true',
			),
			array(
				'id' => 'piercing',
				'name' => esc_html__( 'Piercing', 'arc' ),
				'type' => 'radio',
				'desc' => esc_html__( 'Set if the pornstars have piercings. Users will be able to filter videos using these options.', 'arc' ),
				'placeholder' => '',
				'options' => array(
					'on' => esc_html__( 'Yes', 'arc' ),
					'off' => esc_html__( 'No', 'arc' ),
				),
				'inline' => 'true',
			),
			array(
				'id' => 'ethnicity',
				'name' => esc_html__( 'Ethnicity', 'arc' ),
				'type' => 'select',
				'desc' => esc_html__( 'Set the pornstar\'s ethnicity. Users will be able to filter videos using these options.', 'arc' ),
				'options' => array(
					'Asian' => __('Asian', 'arc'),
					'Ebony' => __('Ebony', 'arc'),
					'Indian' => __('Indian', 'arc'),
					'Latino' => __('Latino', 'arc'),
					'Middle Eastern' => __('Middle Eastern', 'arc'),
					'Mixed' => __('Mixed', 'arc'),
					'White' => __('White', 'arc'),
				),
				'std' => 'White',
			),
			array(
				'id' => 'hair_color',
				'name' => esc_html__( 'Hair color', 'arc' ),
				'type' => 'select',
				'desc' => esc_html__( 'Set the pornstar\'s hair color. Users will be able to filter videos using these options.', 'arc' ),
				'options' => array(
					'Blonde' => __('Blonde', 'arc'),
					'Brown' => __('Brown', 'arc'),
					'Red' => __('Red', 'arc'),
					'Black' => __('Black', 'arc'),
					'Other' => __('Other', 'arc'),
				),
				'std' => 'Other',
			),
			array(
				'id' => 'bust',
				'type' => 'text',
				'name' => esc_html__( 'Bust size', 'arc' ),
				'desc' => esc_html__( 'Set the pornstar\'s bust size (A-K). Users will be able to filter videos using these options.', 'arc' ),
				'placeholder' => esc_html__( 'A-K', 'arc' ),
			),

			array(
				'type' => 'heading',
				'name' => esc_html__( 'Views and Rating', 'arc' ),
			),
			array(
				'id' => 'post_views_count',
				'type' => 'number',
				'name' => esc_html__( 'Views', 'arc' ),
                'desc' => esc_html__( 'Set video views.', 'arc' ),
				'step' => '1',
				'default' => '0'
			),
			array(
				'id' => 'likes_count',
				'type' => 'number',
				'name' => esc_html__( 'Likes', 'arc' ),
                'desc' => esc_html__( 'Set video likes.', 'arc' ),
				'step' => '1',
				'default' => '0'
			),
			array(
				'id' => 'dislikes_count',
				'type' => 'number',
				'name' => esc_html__( 'Dislikes', 'arc' ),
                'desc' => esc_html__( 'Set video dislikes.', 'arc' ),
				'step' => '1',
				'default' => '0'
			),
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Thumbnails and Trailer', 'arc' ),
			),
			array(
				'id' => 'trailer_url',
				'type' => 'file_input',
				'name' => esc_html__( 'Trailer URL', 'arc' ),
				'desc' => esc_html__( 'Paste a URL to the trailer or upload a video file from the media library (mp4, webm, mov, m4v). The trailer is used as a preview when hovering over the video\'s thumbnail.', 'arc' ),
				'mime_type' => array('video/mp4', 'video/webm'),
				'max_file_uploads' => 1,
				'max_status' => 'true',
			),
			array(
				'id' => 'thumb',
				'type' => 'file_input',
				'name' => esc_html__( 'Main thumbnail', 'arc' ),
				'desc' => esc_html__( 'Paste a URL to the video\'s main thumbnail or upload an image file from the media library (jpg, png, gif). The main thumbnail is displayed as the video\'s default thumbnail.', 'arc' ),
				'mime_type' => array('image/jpeg', 'image/jpg', 'image/png', 'image/gif'),
				'max_file_uploads' => 1,
				'max_status' => 'true',
			),
			array(
				'id' => 'thumbnails',
				'type' => 'file_advanced',
				'name' => esc_html__( 'Thumbnails', 'arc' ),
				'desc' => esc_html__( 'The thumbnail rotation is used for preview when hovering over the video\'s thumbnail. They may also be displayed under the video player.', 'arc' ),
				'max_file_uploads' => 10,
				'max_status' => 'true',
			),
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Download link', 'arc' ),
			),
			array(
				'id' => 'tracking_url',
				'type' => 'text',
				'name' => esc_html__( 'Tracking URL', 'arc' ),
				'desc' => esc_html__( 'Paste a tracking URL for the video you want to use when downloading the video on the frontend.', 'arc' ),
			),
			array(
				'type' => 'heading',
				'name' => esc_html__( 'Advertising', 'arc' ),
			),
			array(
				'id' => 'unique_ad_under_player',
				'type' => 'textarea',
				'sanitize_callback' => 'none',
				'name' => esc_html__( 'Advertisement under the video player', 'arc' ),
				'desc' => esc_html__( 'Paste the advertisement banner\'s iframe or image that you want to be displayed under the video payer.', 'arc' ),
			),
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'arc_video_information_metabox' );



