<?php
header("Content-Type: text/html; charset=\"utf-8\"");

if ( 'POST' != $_SERVER['REQUEST_METHOD'] ) {
	header('Allow: POST');
	header('HTTP/1.1 405 Method Not Allowed');
	header('Content-Type: text/plain');
	exit;
}


require( dirname(__FILE__) . '/../../../wp-load.php' );

nocache_headers();

$id = $_POST['tip'];
if($id){
	update_user_meta(get_current_user_id(), 'deny_'.$id, '1');
}