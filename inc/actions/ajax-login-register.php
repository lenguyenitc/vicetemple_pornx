<?php
function arc_login_register_modal() {
	$siteKey = xbox_get_field_value( 'my-theme-options', 'reCaptcha-settings1' );
	$secret = xbox_get_field_value( 'my-theme-options', 'reCaptcha-settings2' );
	// only show the registration/login form to non-logged-in members
	if( ! is_user_logged_in() ){
		?>
		<div class="modal fade arc-user-modal" id="arc-user-modal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" data-active-tab="">
				<div class="modal-content">
					<div class="modal-body">
						<a href="#" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-remove"></i></a>
						<!-- Register form -->
						<div class="arc-register">
							<?php if( get_option('users_can_register') ) : ?>
								<h3><?php printf( esc_html__('Join %s', 'arc'), get_bloginfo('name') ); ?></h3>
								<form id="arc_registration_form" action="<?php echo esc_url(home_url( '/' )); ?>" method="POST">
									<div class="form-field">
										<label><?php echo esc_html__('Username', 'arc'); ?></label>
										<input class="form-control input-lg required" name="arc_user_login" type="text"/>
									</div>
									<div class="form-field">
										<label for="arc_user_email"><?php echo esc_html__('Email', 'arc'); ?></label>
										<input class="form-control input-lg required" name="arc_user_email" id="arc_user_email" type="email"/>
									</div>
									<div class="form-field">
										<label for="arc_user_pass"><?php echo esc_html__('Password', 'arc'); ?></label>
										<input class="form-control input-lg required" name="arc_user_pass" type="password"/>
									</div>

									<?php if ( xbox_get_field_value( 'my-theme-options', 'enable-recaptcha' ) == 'on' && $siteKey != '' && $secret != '' ) : ?>
										<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>" data-theme="dark"></div>
									<?php endif; ?>
									<div class="form-field">
										<input type="hidden" name="action" value="arc_register_member"/>
										<button class="btn btn-theme btn-lg" data-loading-text="<?php echo esc_html__('Loading...', 'arc') ?>" type="submit"><?php echo esc_html__('Sign up', 'arc'); ?></button>
									</div>
									<?php wp_nonce_field( 'ajax-login-nonce', 'register-security' ); ?>
								</form>
								<div class="arc-errors"></div>
							<?php else : ?>
								<div class="alert alert-danger"><?php echo esc_html__('Registration is disabled.', 'arc'); ?></div>
							<?php endif; ?>
						</div>
						<!-- Login form -->
						<div class="arc-login">
							<h3><?php echo apply_filters('update_title', sprintf(__('Login to %s', 'arc'), get_bloginfo('name')), 'login_popup' ); ?></h3>
							<form id="arc_login_form" action="<?php echo esc_url(home_url( '/' )); ?>" method="post">
								<div class="form-field">
									<label><?php echo esc_html__('Username', 'arc') ?></label>
									<input class="form-control input-lg required" name="arc_user_login" type="text"/>
								</div>
								<div class="form-field">
									<label for="arc_user_pass"><?php echo esc_html__('Password', 'arc')?></label>
									<input class="form-control input-lg required" name="arc_user_pass" id="arc_user_pass" type="password"/>
								</div>
								<div class="form-field lost-password">
									<input type="hidden" name="action" value="arc_login_member"/>
									<button class="btn btn-theme btn-lg" data-loading-text="<?php echo esc_html__('Loading...', 'arc') ?>" type="submit"><?php echo esc_html__('Login', 'arc'); ?></button> <a class="alignright" href="#arc-reset-password"><?php echo esc_html__('Lost Password?', 'arc') ?></a>
								</div>
								<?php wp_nonce_field( 'ajax-login-nonce', 'login-security' ); ?>
							</form>
							<div class="arc-errors"></div>
						</div>
						<!-- Lost Password form -->
						<div class="arc-reset-password">
							<h3><?php echo esc_html__('Reset Password', 'arc'); ?></h3>
							<p><?php echo esc_html__('Enter the username or e-mail you used in your profile. A password reset link will be sent to you by email.', 'arc'); ?></p>
							<form id="arc_reset_password_form" action="<?php echo esc_url(home_url( '/' )); ?>" method="post">
								<div class="form-field">
									<label for="arc_user_or_email"><?php echo esc_html__('Username or E-mail', 'arc') ?></label>
									<input class="form-control input-lg required" name="arc_user_or_email" id="arc_user_or_email" type="text"/>
								</div>
								<div class="form-field">
									<input type="hidden" name="action" value="arc_reset_password"/>
									<button class="btn btn-theme btn-lg" data-loading-text="<?php echo esc_html__('Loading...', 'arc') ?>" type="submit"><?php echo esc_html__('Get new password', 'arc'); ?></button>
								</div>
								<?php wp_nonce_field( 'ajax-login-nonce', 'password-security' ); ?>
							</form>
							<div class="arc-errors"></div>
						</div>
						<div class="arc-loading">
							<p><i class="fa fa-refresh fa-spin"></i><br><?php echo esc_html__('Loading...', 'arc') ?></p>
						</div>
					</div>
					<div class="modal-footer">
						<span class="arc-register-footer"><?php echo esc_html__('Don\'t have an account?', 'arc'); ?> <a href="#arc-register"><?php echo esc_html__('Sign up', 'arc'); ?></a></span>
						<span class="arc-login-footer"><?php echo esc_html__('Already have an account?', 'arc'); ?> <a href="#arc-login"><?php echo esc_html__('Login', 'arc'); ?></a></span>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
//add_action('wp_footer', 'arc_login_register_modal');
#
# 	AJAX FUNCTION
# 	========================================================================================
#   These function handle the submitted data from the login/register modal forms
# 	========================================================================================
#
// LOGIN

function arc_login_member(){
	// Get variables
	$user_login		= $_POST['arc_user_login'];
	$user_pass		= $_POST['arc_user_pass'];
	// Check CSRF token
	if( !check_ajax_referer( 'ajax-login-nonce', 'login-security', false) ){
		echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">' . esc_html__('Session token has expired, please reload the page and try again', 'arc') . '</div>'));
	}
	// Check if input variables are empty
	elseif( empty($user_login) || empty($user_pass) ){
		echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">' . esc_html__('Please fill all form fields', 'arc') . '</div>'));
	} else { // Now we can insert this account
		$user = wp_signon( array('user_login' => $user_login, 'user_password' => $user_pass), false );
		if( is_wp_error($user) ){
			echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">' . str_replace('Lost your password?', '', $user->get_error_message()) . '</div>'));
		} else{
			echo json_encode(array('error' => false, 'message'=> '<div class="alert alert-success">' . esc_html__('Login successful, reloading page...', 'arc') . '</div>'));
		}
	}
	wp_die();
}
//add_action('wp_ajax_nopriv_arc_login_member', 'arc_login_member');

// REGISTER
function arc_register_member(){
	$siteKey = xbox_get_field_value( 'my-theme-options', 'reCaptcha-settings1' );
	$secret = xbox_get_field_value( 'my-theme-options', 'reCaptcha-settings2' );
	// Get variables
	$user_login	= $_POST['arc_user_login'];
	$user_email	= $_POST['arc_user_email'];
	$user_pass	= $_POST['arc_user_pass'];
	// Check CSRF token
	if( !check_ajax_referer( 'ajax-login-nonce', 'register-security', false) ){
		echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">' . esc_html__('Session token has expired, please reload the page and try again', 'arc') . '</div>'));
		die();
	}
	// Check if input variables are empty
	elseif( empty($user_login) || empty($user_email) || empty($user_pass) ){
		echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">' . esc_html__('Please fill all form fields', 'arc') . '</div>'));
		die();
	}
	if ( xbox_get_field_value( 'my-theme-options', 'enable-recaptcha' ) == 'on' && $siteKey != '' && $secret != '' ){
		if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
			$captcha = urlencode($_POST['g-recaptcha-response']);
//get verify response data
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha);
			$responseData = json_decode($verifyResponse);
			if($responseData->success){
				$new_user_id = wp_insert_user(array(
						'user_login'		=> $user_login,
						'user_pass'	 		=> $user_pass,
						'user_email'		=> $user_email,
						'user_registered'	=> date('Y-m-d H:i:s'),
						'role'				=> 'subscriber'
					)
				);
				echo json_encode(array('error' => false, 'message' => '<div class="alert alert-success">' . esc_html__( 'Registration complete. You can now login.', 'arc')));
			}else{
				echo json_encode(array('error' => true, 'message' => '<div class="alert alert-danger">' . esc_html__( 'Captcha verification failed, please try again.', 'arc')));
			}
		}else{
			echo json_encode(array('error' => true, 'message' => '<div class="alert alert-danger">' . esc_html__( 'Please click on the reCAPTCHA box.', 'arc')));
		}
	}else{
		$new_user_id = wp_insert_user(array(
				'user_login'		=> $user_login,
				'user_pass'	 		=> $user_pass,
				'user_email'		=> $user_email,
				'user_registered'	=> date('Y-m-d H:i:s'),
				'role'				=> 'subscriber'
			)
		);
		if( is_wp_error($new_user_id) ){
			$registration_error_messages = $new_user_id->new_user_id;
			$display_errors = '<div class="alert alert-danger">'. $new_user_id->get_error_message() . '</div>';
			/*foreach($registration_error_messages as $error){
				$display_errors .= '<p>'.$error[0].'</p>';
			}*/
			//$display_errors .= '</div>';
			echo json_encode(array('error' => true, 'message' => $display_errors));
		}else{
			echo json_encode(array('error' => false, 'message' => '<div class="alert alert-success">' . esc_html__( 'Registration complete. You can now login.', 'arc')));
		}
	}
	wp_die();
}
//add_action('wp_ajax_nopriv_arc_register_member', 'arc_register_member');

// RESET PASSWORD
function arc_reset_password(){
	// Get variables
	$username_or_email = $_POST['arc_user_or_email'];
	// Check CSRF token
	if( !check_ajax_referer( 'ajax-login-nonce', 'password-security', false) ){
		echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">' . esc_html__('Session token has expired, please reload the page and try again', 'arc') . '</div>'));
	}
	// Check if input variables are empty
	elseif( empty($username_or_email) ){
		echo json_encode(array('error' => true, 'message'=> '<div class="alert alert-danger">' . esc_html__('Please fill all form fields', 'arc') . '</div>'));
	} else {
		$username = is_email($username_or_email) ? sanitize_email($username_or_email) : sanitize_user($username_or_email);
		$user_forgotten = arc_lostPassword_retrieve($username);
		if( is_wp_error($user_forgotten) ){
			$lostpass_error_messages = $user_forgotten->errors;
			$display_errors = '<div class="alert alert-warning">';
			foreach($lostpass_error_messages as $error){
				$display_errors .= '<p>'.$error[0].'</p>';
			}
			$display_errors .= '</div>';
			echo json_encode(array('error' => true, 'message' => $display_errors));
		}else{
			echo json_encode(array('error' => false, 'message' => '<p class="alert alert-success">' . esc_html__('Password Reset. Please check your email.', 'arc')));
		}
	}
	wp_die();
}

//add_action('wp_ajax_nopriv_arc_reset_password', 'arc_reset_password');
function arc_lostPassword_retrieve( $user_data ) {
	global $wpdb, $current_site, $wp_hasher;
	$errors = new WP_Error();
	if( empty($user_data) ){
		$errors->add( 'empty_username', esc_html__( 'Please enter a username or e-mail address.', 'arc' ) );
	} elseif( strpos($user_data, '@') ){
		$user_data = get_user_by( 'email', trim( $user_data ) );
		if( empty($user_data)){
			$errors->add( 'invalid_email', esc_html__( 'There is no user registered with that email address.', 'arc'  ) );
		}
	} else {
		$login = trim( $user_data );
		$user_data = get_user_by('login', $login);
	}
	if( $errors->get_error_code() ){
		return $errors;
	}
	if( !$user_data ){
		$errors->add('invalidcombo', esc_html__('Invalid username or e-mail.', 'arc'));
		return $errors;
	}
	$user_login = $user_data->user_login;
	$user_email = $user_data->user_email;
	do_action('retrieve_password', $user_login);
	$allow = apply_filters('allow_password_reset', true, $user_data->ID);
	if( !$allow ){
		return new WP_Error( 'no_password_reset', esc_html__( 'Password reset is not allowed for this user', 'arc' ) );
	} elseif ( is_wp_error($allow) ){
		return $allow;
	}
	$key = wp_generate_password(20, false);
	do_action('retrieve_password_key', $user_login, $key);
	if(empty($wp_hasher)){
		require_once ABSPATH.'wp-includes/class-phpass.php';
		$wp_hasher = new PasswordHash(8, true);
	}
	$hashed = $wp_hasher->HashPassword($key);
	$wpdb->update($wpdb->users, array('user_activation_key' => $hashed), array('user_login' => $user_login));
	$message = esc_html__('Someone requested that the password be reset for the following account:', 'arc' ) . "\r\n\r\n";
	$message .= network_home_url( '/' ) . "\r\n\r\n";
	$message .= sprintf( __( 'Username: %s', 'arc' ), $user_login ) . "\r\n\r\n";
	$message .= esc_html__('If this was a mistake, just ignore this email and nothing will happen.', 'arc' ) . "\r\n\r\n";
	$message .= esc_html__('To reset your password, visit the following address:', 'arc' ) . "\r\n\r\n";
	$message .= '<' . network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' ) . ">\r\n\r\n";
	if ( is_multisite() ) {
		$blogname = $GLOBALS['current_site']->site_name;
	} else {
		$blogname = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );
	}
	$title   = sprintf( __( '[%s] Password Reset', 'arc' ), $blogname );
	$title   = apply_filters( 'retrieve_password_title', $title );
	$message = apply_filters( 'retrieve_password_message', $message, $key );
	if ( $message && ! wp_mail( $user_email, $title, $message ) ) {
		$errors->add( 'noemail', esc_html__( 'The e-mail could not be sent.<br />Possible reason: your host may have disabled the mail() function.', 'arc' ) );
		return $errors;
		wp_die();
	}
	return true;
}

/**
 * Automatically add a Login link to Primary Menu
 */

/*add_filter( 'wp_nav_menu_items', 'arc_login_link_to_menu', 10, 2 );
function arc_login_link_to_menu ( $items, $args ) {
    if( ! is_user_logged_in() && $args->theme_location == apply_filters('login_menu_location', 'primary') ) {
        $items .= '<li class="menu-item login-link"><a href="#arc-login">' . esc_html__( 'Login/Register', 'arc' ) . '</a></li>';
    }
    return $items;
}*/