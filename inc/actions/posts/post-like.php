<?php
function arc_hasAlreadyVoted($post_id) {
	$timebeforerevote = 86400;//60sec * 60min * 24h
	$ip = $_SERVER['REMOTE_ADDR'];
	if(!$ip) return false;
	$voted_IPs = get_post_meta($post_id, "voted_IP", true);
	if( !is_array($voted_IPs) )
		$voted_IPs = array();
	if(in_array($ip, array_keys($voted_IPs))){
		$time = $voted_IPs[$ip];
		$now = time();
		if(round(($now - $time) / 60) > $timebeforerevote) {
			delete_post_meta($post_id, "voted_IP", $voted_IPs[$ip]);
			return false;
		}
		return true;
	}
	return false;
}
function arc_getPostLikeLink($post_id){
	$output = '<span class="post-like" style="display: flex;font-size: 16px !important;">';
	if(arc_hasAlreadyVoted($post_id)){
		if(is_attachment()){
			if(is_user_logged_in()) {
				$output .= '<a href="#" data-post_id="'.$post_id.'" class="a_like" data-post_like="like">
								<span style="display:inline-flex">
									<span class="like">
										<span id="more">
											<i class="fa fa-thumbs-up" style="color: #cccccc !important;"></i> 
											<span class="likes_count">0</span>
											<span class="grey-link"></span>
										</span>
									</span>
								</span>
							</a>
							<a href="#" data-post_id="'.$post_id.'" class="a_dislike" data-post_like="dislike">
								<span class="qtip dislike">
									<span id="less">
										<i class="fa fa-thumbs-down fa-flip-horizontal" style="color: #cccccc !important;"></i> 
										<span class="dislikes_count">0</span>
									</span>
								</span>
							</a>';
				$output .= '</span>';
			} else {
				if(xbox_get_field_value('my-theme-options', 'allow_rating') == 'on') {
					$output .= '<a href="#" data-post_id="'.$post_id.'" class="a_like" data-post_like="like">
									<span style="display:inline-flex">
										<span class="like">
											<span id="more">
												<i class="fa fa-thumbs-up" style="color: #cccccc !important;"></i> 
												<span class="likes_count">0</span>
												<span class="grey-link"></span>
											</span>
										</span>
									</span>
								</a>
								<a href="#" data-post_id="'.$post_id.'" class="a_dislike" data-post_like="dislike">
									<span class="qtip dislike">
										<span id="less">
											<i class="fa fa-thumbs-down fa-flip-horizontal" style="color: #cccccc !important;"></i> 
											<span class="dislikes_count">0</span>
										</span>
									</span>
								</a>';
					$output .= '</span>';
				} else {
					$output .= '<a onclick="jQuery(document).ready(($)=>{$(\'#auth_modal\').show();})" data-post_like="like" class="a_like">
									<span style="display:inline-flex">
										<span class="like">
											<span id="more">
												<i class="fa fa-thumbs-up" style="color: #cccccc !important;"></i> 
												<span class="likes_count">0</span>
												<span class="grey-link"></span>
											</span>
										</span>
									</span>
									</a>
									<a onclick="jQuery(document).ready(($)=>{$(\'#auth_modal\').show();})" data-post_like="dislike" class="a_dislike">
										<span class="qtip dislike">
											<span id="less">
												<i class="fa fa-thumbs-down fa-flip-horizontal" style="color: #cccccc !important;"></i> 
												<span class="dislikes_count">0</span>
											</span>
										</span>
									</a>';
					$output .= '</span>';
				}
			}
		}
		else {
			if(is_user_logged_in()) {
				$output .= '<a href="#" data-post_id="'.$post_id.'" data-post_like="like" class="a_like">
							<span class="like">
								<span id="more">
									<i class="fa fa-thumbs-up" style="color: #cccccc !important;"></i> 
									<span class="likes_count">0</span>
									<span class="grey-link"></span>
								</span>
							</span>
							</a>
							<a href="#" data-post_id="'.$post_id.'" data-post_like="dislike" class="a_dislike">
								<span class="qtip dislike">
									<span id="less">
										<i class="fa fa-thumbs-down fa-flip-horizontal" style="color: #cccccc !important;"></i> 
										<span class="dislikes_count">0</span>
									</span>
								</span>
							</a>';
				$output .= '</span>';
			} else {
				if(xbox_get_field_value('my-theme-options', 'allow_rating') == 'on') {
					$output .= '<a href="#" data-post_id="'.$post_id.'" data-post_like="like" class="a_like">
									<span class="like">
										<span id="more">
											<i class="fa fa-thumbs-up" style="color: #cccccc !important;"></i> 
											<span class="likes_count">0</span>
											<span class="grey-link"></span>
										</span>
									</span>
								</a>
								<a href="#" data-post_id="'.$post_id.'" data-post_like="dislike" class="a_dislike">
									<span class="qtip dislike">
										<span id="less">
											<i class="fa fa-thumbs-down fa-flip-horizontal" style="color: #cccccc !important;"></i> 
											<span class="dislikes_count">0</span>
										</span>
									</span>
								</a>';
					$output .= '</span>';
				} else {
					$output .= '<a onclick="jQuery(document).ready(($)=>{$(\'#auth_modal\').show();})">
								<span class="like">
									<span id="more">
										<i class="fa fa-thumbs-up" style="color: #cccccc !important;"></i> 
										<span class="likes_count">0</span>
										<span class="grey-link"></span>
									</span>
								</span>
								</a>
								<a onclick="jQuery(document).ready(($)=>{$(\'#auth_modal\').show();})">
									<span class="qtip dislike">
										<span id="less">
											<i class="fa fa-thumbs-down fa-flip-horizontal" style="color: #cccccc !important;"></i> 
											<span class="dislikes_count">0</span>
										</span>
									</span>
								</a>';
				}
			}
		}
	}
	else {
		if(is_user_logged_in()) {
			$output .= '<a href="#" data-post_id="'.$post_id.'" data-post_like="like" class="a_like">
							<span class="like">
								<span id="more"><i class="fa fa-thumbs-up" style="color: #cccccc !important;"></i> 
									<span class="likes_count">0</span>
									<span class="grey-link"></span>
								</span>
							</span>
							</a>
							<a href="#" data-post_id="'.$post_id.'" data-post_like="dislike" class="a_dislike">
								<span class="qtip dislike">
									<span id="less"><i class="fa fa-thumbs-down fa-flip-horizontal" style="color: #cccccc !important;"></i> 
										<span class="dislikes_count">0</span>
									</span>
								</span>
							</a>';
			$output .= '</span>';
		} else {
			if(xbox_get_field_value('my-theme-options', 'allow_rating') == 'on') {
				$output .= '<a href="#" data-post_id="'.$post_id.'" data-post_like="like" class="a_like">
								<span class="like">
									<span id="more"><i class="fa fa-thumbs-up" style="color: #cccccc !important;"></i> 
									<span class="likes_count">0</span>
									<span class="grey-link"></span>
									</span>
								</span>
								</a>
								<a href="#" data-post_id="'.$post_id.'" data-post_like="dislike" class="a_dislike">
									<span class="qtip dislike">
										<span id="less"><i class="fa fa-thumbs-down fa-flip-horizontal" style="color: #cccccc !important;"></i> 
											<span class="dislikes_count">0</span>
										</span>
									</span>
								</a>';
				$output .= '</span>';
			} else {
				$output .= '<a onclick="jQuery(document).ready(($)=>{$(\'#auth_modal\').show();})">
								<span class="like">
									<span id="more"><i class="fa fa-thumbs-up" style="color: #cccccc !important;"></i> 
										<span class="likes_count">0</span>
										<span class="grey-link"></span>
									</span>
								</span>
							</a>
								<a onclick="jQuery(document).ready(($)=>{$(\'#auth_modal\').show();})">
									<span class="qtip dislike">
										<span id="less"><i class="fa fa-thumbs-down fa-flip-horizontal" style="color: #cccccc !important;"></i> 
											<span class="dislikes_count">0</span>
										</span>
									</span>
								</a>';
			}
		}
	}
	return $output;
}
function arc_getPostLikeRate( $post_id ){
	$like_count     = intval(get_post_meta($post_id, "likes_count", true));
	$dislike_count  = intval(get_post_meta($post_id, "dislikes_count", true));
	$total_count    =  $like_count + abs($dislike_count);
	if($total_count > 0)
		return ceil($like_count / $total_count * 100) . '%';
	else
		return false;
}
function arc_getItemPostLikeRate( $post_id ){
	if( arc_getPostLikeRate($post_id) !== false )
		return arc_getPostLikeRate($post_id) . '%';
	else
		return false;
}


function alreadyVoted() {
	$timebeforerevote = 86400;//60sec * 60min * 24h
	$ip = $_SERVER['REMOTE_ADDR'];
	if(!$ip) return false;
	$voted_IPs = get_post_meta($_POST['post_id'], "voted_IP", true);
	if($voted_IPs !== false) {
		if(in_array($ip, array_keys($voted_IPs))){
			$time = $voted_IPs[$ip];
			$now = time();
			if(round(($now - $time) / 60) > $timebeforerevote) {
				delete_post_meta($_POST['post_id'], "voted_IP", $voted_IPs[$ip]);
				return false;
			} else {
				wp_send_json($voted_IPs['action']);
			}
		}
	}
}
add_action('wp_ajax_alreadyVoted', 'alreadyVoted');
add_action('wp_ajax_nopriv_alreadyVoted', 'alreadyVoted');

function alreadyVotedFullscreen() {
	$timebeforerevote = 86400;//60sec * 60min * 24h
	$ip = $_SERVER['REMOTE_ADDR'];
	if(!$ip) return false;
	$voted_IPs = get_post_meta($_POST['post_id'], "voted_IP", true);
	if($voted_IPs !== false) {
		if(in_array($ip, array_keys($voted_IPs))){
			$time = $voted_IPs[$ip];
			$now = time();
			if(round(($now - $time) / 60) > $timebeforerevote) {
				delete_post_meta($_POST['post_id'], "voted_IP", $voted_IPs[$ip]);
				return false;
			} else {
				wp_send_json($voted_IPs['action']);
			}
		}
	}
}
add_action('wp_ajax_alreadyVotedFullscreen', 'alreadyVotedFullscreen');
add_action('wp_ajax_nopriv_alreadyVotedFullscreen', 'alreadyVotedFullscreen');
