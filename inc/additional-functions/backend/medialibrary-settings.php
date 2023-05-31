<?php
/***increase upload limit***/
add_filter( 'upload_size_limit', 'my_upload_size_limit' );
function my_upload_size_limit( $limit ) {
	return wp_convert_hr_to_bytes( '1024M' );
}

add_filter( 'wp_prepare_attachment_for_js', 'show_jpeg_in_media_library' );
function show_jpeg_in_media_library( $response ) {
	if ( $response['mime'] === 'image/jpeg' ) {
		//display with name of file
		$response['image'] = [
			'src' => $response['url'],
		];
	}
	return $response;
}