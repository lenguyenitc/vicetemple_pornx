<?php
function arc_comment_like() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		die ( 'Busted!');
	if(isset($_POST['comment_like'])){
		$ip = $_SERVER['REMOTE_ADDR'];
		$comment_id = $_POST['comment_id'];
		$comment_like = $_POST['comment_like'];
		$meta_likes_count       = intval(get_comment_meta($comment_id, "likes_count", true));
		$meta_dislikes_count    = intval(get_comment_meta($comment_id, "dislikes_count", true));
		$meta_total_count       = $meta_likes_count + $meta_dislikes_count;
		$voted_IPs = get_comment_meta($comment_id, "voted_IP");
		if(!is_array($voted_IPs))
			$voted_IPs = array();
		if(!comment_hasAlreadyVoted($comment_id)) {
			$voted_IPs[$ip] = time();
			$voted_IPs['action'] = $comment_like;
			update_comment_meta($comment_id, "voted_IP", $voted_IPs);
			if($comment_like == "like" ){
				update_comment_meta($comment_id, "likes_count", ++$meta_likes_count);
			} else {
				update_comment_meta($comment_id, "dislikes_count", ++$meta_dislikes_count);
			}
			update_comment_meta($comment_id, "rate", round(arc_getCommentLikeRate($comment_id) ) );
			$alreadyrate = false;
			$percentage     = ceil(($meta_likes_count / ( $meta_total_count + 1 ) ) * 100);
			$nbrates        = $meta_total_count + 1;
			$progressbar    = ceil(( $meta_likes_count / ( $meta_total_count + 1 ) ) * 100);
		} else {
			$alreadyrate = true;

			$ip = $_SERVER['REMOTE_ADDR'];
			$comment_id = $_POST['comment_id'];
			$meta_likes_count       = intval(get_comment_meta($comment_id, "likes_count", true));
			$meta_dislikes_count    = intval(get_comment_meta($comment_id, "dislikes_count", true));
			$voted_IPs = get_comment_meta($comment_id, "voted_IP");

			$already_mark = $voted_IPs[0]['action'];

			if($already_mark == 'like' && $comment_like == 'like') {
				update_comment_meta($comment_id, "likes_count", --$meta_likes_count);
				delete_comment_meta($comment_id, "voted_IP", $voted_IPs[$ip]);
				$nbrates        = $meta_total_count - 1;
			}
			else if($already_mark == 'like' && $comment_like == 'dislike') {
				update_comment_meta($comment_id, "likes_count", --$meta_likes_count);
				update_comment_meta($comment_id, "dislikes_count", ++$meta_dislikes_count);

				delete_comment_meta($comment_id, "voted_IP", $voted_IPs[$ip]);
				$voted_IPs = get_comment_meta($comment_id, "voted_IP");
				if(!is_array($voted_IPs))
					$voted_IPs = array();
				$voted_IPs[$ip] = time();
				$voted_IPs['action'] = 'dislike';
				update_comment_meta($comment_id, "voted_IP", $voted_IPs);
				$nbrates        = $meta_total_count;

			}
			else if($already_mark == 'dislike' && $comment_like == 'like') {
				update_comment_meta($comment_id, "dislikes_count", --$meta_dislikes_count);
				update_comment_meta($comment_id, "likes_count", ++$meta_likes_count);

				delete_comment_meta($comment_id, "voted_IP", $voted_IPs[$ip]);
				$voted_IPs = get_comment_meta($comment_id, "voted_IP");
				if(!is_array($voted_IPs))
					$voted_IPs = array();
				$voted_IPs[$ip] = time();
				$voted_IPs['action'] = 'like';
				update_comment_meta($comment_id, "voted_IP", $voted_IPs);
				$nbrates        = $meta_total_count;
			}
			else if($already_mark == 'dislike' && $comment_like == 'dislike') {
				update_comment_meta($comment_id, "dislikes_count", --$meta_dislikes_count);
				delete_comment_meta($comment_id, "voted_IP", $voted_IPs[$ip]);
				$nbrates        = $meta_total_count - 1;
			}
			$percentage     = ceil(($meta_likes_count/($nbrates)) * 100);
		}
		$json_arr = ["alreadyrate"   => $alreadyrate,
		             "percentage"    => (int)$percentage,
		             "nbrates"       => (int)$nbrates,
		             "likes"         => (int)$meta_likes_count,
		             "dislikes"      => (int)$meta_dislikes_count,
		             "progressbar"   => (int)$progressbar,
		             "rate_action"   => $voted_IPs['action'],
					 "comment_id"   => $comment_id
		];
		wp_send_json($json_arr);
		wp_die();
	}else{
		return false;
	}
}
add_action('wp_ajax_nopriv_comment_like', 'arc_comment_like');
add_action('wp_ajax_comment_like', 'arc_comment_like');