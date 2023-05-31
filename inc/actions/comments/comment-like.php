<?php
function comment_hasAlreadyVoted($comment_id) {
	$timebeforerevote = 86400;//60sec * 60min * 24h
	$ip = $_SERVER['REMOTE_ADDR'];
	if(!$ip) return false;
	$voted_IPs = get_comment_meta($comment_id, "voted_IP", true);
	if( !is_array($voted_IPs) )
		$voted_IPs = array();
	if(in_array($ip, array_keys($voted_IPs))){
		$time = $voted_IPs[$ip];
		$now = time();
		if(round(($now - $time) / 60) > $timebeforerevote) {
			delete_comment_meta($comment_id, "voted_IP", $voted_IPs[$ip]);
			return false;
		}
		return true;
	}
	return false;
}
function arc_getCommentLikeRate( $comment_id ){
	$like_count     = intval(get_comment_meta($comment_id, "likes_count", true));
	$dislike_count  = intval(get_comment_meta($comment_id, "dislikes_count", true));
	$total_count    =  $like_count + abs($dislike_count);
	if($total_count > 0)
		return ceil($like_count / $total_count * 100) . '%';
	else
		return false;
}

function alreadyVotedComment($comment_id) {
	$timebeforerevote = 86400;//60sec * 60min * 24h
	$ip = $_SERVER['REMOTE_ADDR'];
	if(!$ip) return false;
	$voted_IPs = get_comment_meta($comment_id, "voted_IP", true);
	if($voted_IPs !== false) {
		if(in_array($ip, array_keys($voted_IPs))){
			$time = $voted_IPs[$ip];
			$now = time();
			if(round(($now - $time) / 60) > $timebeforerevote) {
				delete_comment_meta($comment_id, "voted_IP", $voted_IPs[$ip]);
				return false;
			} else {
				return [$comment_id, $voted_IPs['action']];
			}
		}
	}
	return false;
}
//add_action('wp_ajax_alreadyVotedComment', 'alreadyVotedComment');


function comment_hasAlreadySpam($comment_id) {
	$timebeforerevote = 86400;//60sec * 60min * 24h
	$ip = $_SERVER['REMOTE_ADDR'];
	if(!$ip) return false;
	$spam_IPs = get_comment_meta($comment_id, "spam_IP", true);
	if(!is_array($spam_IPs))
		$spam_IPs = array();
	if(in_array($ip, array_keys($spam_IPs))){
		$time = $spam_IPs[$ip];
		$now = time();
		if(round(($now - $time) / 60) > $timebeforerevote) {
			delete_comment_meta($comment_id, "voted_IP", $spam_IPs[$ip]);
			return false;
		}
		return true;
	}
	return false;
}