<?php
if(isset($_GET['search-type'])) {
	$type = $_GET['search-type'];
	if($type == 'normal') {
		load_template(TEMPLATEPATH . '/normal-search.php');
	} elseif($type == 'blog') {
		load_template(TEMPLATEPATH . '/blog-search.php');
	} elseif($type == 'photo') {
		load_template(TEMPLATEPATH . '/photos-search.php');
	} elseif($type == 'pornstars') {
		load_template(TEMPLATEPATH . '/actress-search.php');
	} elseif($type == 'members') {
		load_template(TEMPLATEPATH . '/members-search.php');
	} elseif($type == 'all') {
		load_template(TEMPLATEPATH . '/all-search.php');
	}
}