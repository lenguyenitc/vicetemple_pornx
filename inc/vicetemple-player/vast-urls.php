<?php
$path = APL_DIR . '/uploads/';
$start = $path . 'start.txt';
$middle = $path . 'middle.txt';

if(file_exists($start)) {
	if(file_get_contents($start) !== '' && false !== file_get_contents($start)) {
		$get_start_content = explode(PHP_EOL, file_get_contents($start));
		if(count($get_start_content) !== 0) {
			if(xbox_get_field_value('vicetemplepl-options', 'vp-pre-roll-url') !== '') {
				$get_start_content[] = xbox_get_field_value('vicetemplepl-options', 'vp-pre-roll-url');
			}
			$arr_key = array_rand($get_start_content, 1);
			start_video('file', $get_start_content[$arr_key]);
		}
	} else {
		start_video('xbox');
	}
} else {
	start_video('xbox');
}
function start_video($type, $url = '') {
	if($type == 'xbox') {
		$preRoll_url = xbox_get_field_value('vicetemplepl-options', 'vp-pre-roll-url');
	} else {
		$preRoll_url = $url;
	}
	if($preRoll_url !== '') {
		$format_path = parse_url($preRoll_url, PHP_URL_PATH);
		$format = explode( '.',  $format_path);
		$format = end($format);
		if($format == 'mp4') {
			add_url_to_xml($preRoll_url, 'preRoll');
		}
	}
}

if(file_exists($middle)) {
	if(file_get_contents($middle) !== '' && false !== file_get_contents($middle)) {
		$get_middle_content = explode(PHP_EOL, file_get_contents($middle));
		if(count($get_middle_content) !== 0) {
			if(xbox_get_field_value('vicetemplepl-options', 'vp-mid-roll-url') !== '') {
				$get_middle_content[] = xbox_get_field_value('vicetemplepl-options', 'vp-mid-roll-url');
			}
			$arr_key = array_rand($get_middle_content, 1);
			middle_video('file', $get_middle_content[$arr_key]);
		}
	} else {
		middle_video('xbox');
	}
} else {
	middle_video('xbox');
}
function middle_video($type, $url = '') {
	if($type == 'xbox') {
		$midRoll_url = xbox_get_field_value('vicetemplepl-options', 'vp-mid-roll-url');
	} else {
		$midRoll_url = $url;
	}
	if($midRoll_url !== '') {
		$format_path = parse_url($midRoll_url, PHP_URL_PATH);
		$format = explode( '.',  $format_path);
		$format = end($format);
		if($format == 'mp4') {
			add_url_to_xml($midRoll_url, 'midRoll');
		}
	}
}

$skip_pre_roll = xbox_get_field_value('vicetemplepl-options', 'skip-pre-roll');
$skip_mid_roll = xbox_get_field_value('vicetemplepl-options', 'skip-mid-roll');
add_skip_to_xml($skip_pre_roll, 'preroll');
add_skip_to_xml($skip_mid_roll, 'midroll');