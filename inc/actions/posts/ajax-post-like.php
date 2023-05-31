<?php
function arc_post_like() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
		die ( 'Busted!');
	if(isset($_POST['post_like'])){
		$ip = $_SERVER['REMOTE_ADDR'];
		$post_id = $_POST['post_id'];
		$post_like = $_POST['post_like'];
		$meta_likes_count       = intval(get_post_meta($post_id, "likes_count", true));
		$meta_dislikes_count    = intval(get_post_meta($post_id, "dislikes_count", true));
		$meta_total_count       = $meta_likes_count + $meta_dislikes_count;
		$voted_IPs = get_post_meta($post_id, "voted_IP");
		if(!is_array($voted_IPs))
			$voted_IPs = array();
		if(!arc_hasAlreadyVoted($post_id)) {
			$voted_IPs[$ip] = time();
			$voted_IPs['action'] = $post_like;
			update_post_meta($post_id, "voted_IP", $voted_IPs);
			if( $post_like == "like" ){
				update_post_meta($post_id, "likes_count", ++$meta_likes_count);
			} else {
				update_post_meta($post_id, "dislikes_count", ++$meta_dislikes_count);
			}
			update_post_meta($post_id, "rate", round( arc_getPostLikeRate($post_id) ) );
			$alreadyrate = false;
			$percentage     = ceil(($meta_likes_count / ( $meta_total_count + 1 ) ) * 100);
			$button         = esc_html__('Thank you!', 'arc');
			$nbrates        = $meta_total_count + 1;
			$progressbar    = ceil(( $meta_likes_count / ( $meta_total_count + 1 ) ) * 100);
		} else {
			$alreadyrate = true;
			$ip = $_SERVER['REMOTE_ADDR'];
			$post_id = $_POST['post_id'];
			$meta_likes_count       = intval(get_post_meta($post_id, "likes_count", true));
			$meta_dislikes_count    = intval(get_post_meta($post_id, "dislikes_count", true));
			$voted_IPs = get_post_meta($post_id, "voted_IP");

			$already_mark = $voted_IPs[0]['action'];

			if($already_mark == 'like' && $post_like == 'like') {
				update_post_meta($post_id, "likes_count", --$meta_likes_count);
				delete_post_meta($post_id, "voted_IP", $voted_IPs[$ip]);
				$nbrates        = $meta_total_count - 1;
			}
			else if($already_mark == 'like' && $post_like == 'dislike') {
				update_post_meta($post_id, "likes_count", --$meta_likes_count);
				update_post_meta($post_id, "dislikes_count", ++$meta_dislikes_count);

				delete_post_meta($post_id, "voted_IP", $voted_IPs[$ip]);
				$voted_IPs = get_post_meta($post_id, "voted_IP");
				if(!is_array($voted_IPs))
					$voted_IPs = array();
				$voted_IPs[$ip] = time();
				$voted_IPs['action'] = 'dislike';
				update_post_meta($post_id, "voted_IP", $voted_IPs);
				$nbrates        = $meta_total_count;

			}
			else if($already_mark == 'dislike' && $post_like == 'like') {
				update_post_meta($post_id, "dislikes_count", --$meta_dislikes_count);
				update_post_meta($post_id, "likes_count", ++$meta_likes_count);

				delete_post_meta($post_id, "voted_IP", $voted_IPs[$ip]);
				$voted_IPs = get_post_meta($post_id, "voted_IP");
				if(!is_array($voted_IPs))
					$voted_IPs = array();
				$voted_IPs[$ip] = time();
				$voted_IPs['action'] = 'like';
				update_post_meta($post_id, "voted_IP", $voted_IPs);
				$nbrates        = $meta_total_count;
			}
			else if($already_mark == 'dislike' && $post_like == 'dislike') {
				update_post_meta($post_id, "dislikes_count", --$meta_dislikes_count);
				delete_post_meta($post_id, "voted_IP", $voted_IPs[$ip]);
				$nbrates        = $meta_total_count - 1;
			}
			$percentage     = ceil(($meta_likes_count/($nbrates)) * 100);
		}
		$json_arr = ["alreadyrate"   => $alreadyrate,
		                    "percentage"    => (int)$percentage,
		                    "button"        => $button,
		                    "nbrates"       => (int)$nbrates,
		                    "likes"         => (int)$meta_likes_count,
		                    "dislikes"      => (int)$meta_dislikes_count,
		                    "progressbar"   => (int)$progressbar,
							"rate_action"   => $voted_IPs['action']
					];
		wp_send_json($json_arr);
		wp_die();
	}else{
		return false;
	}
}
add_action('wp_ajax_nopriv_post-like', 'arc_post_like');
add_action('wp_ajax_post-like', 'arc_post_like');