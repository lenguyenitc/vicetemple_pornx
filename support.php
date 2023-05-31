<?php
/* Template Name: Support Page */
$siteKey = xbox_get_field_value( 'my-theme-options', 'reCaptcha-settings1' );
$secret = xbox_get_field_value( 'my-theme-options', 'reCaptcha-settings2' );
$user = wp_get_current_user();
$table = 'supportMsg';
$errMsg = '';
$succMsg = '';
if (xbox_get_field_value( 'my-theme-options', 'enable-recaptcha' ) == 'on' && $siteKey != '' && $secret != '' ){
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
		$captcha = urlencode($_POST['g-recaptcha-response']);
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha);
		$responseData = json_decode($verifyResponse);
		$flag = false;
		if($responseData->success) {$flag = true; $succMsg = 'ok';}
		else $errMsg = esc_html__( 'Please click on the reCAPTCHA box.', 'arc' );
	}
} else {
    $succMsg = 'ok';
}

get_header();
$sidebar_pos = ''; ?>
<div id="primary" class="content-area <?php echo $sidebar_pos; ?> video-submit-area">
	<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
		<h1 class="widget-title" style="text-align: center"><?php echo get_bloginfo('name') . ' Support';?></h1>
		<p class="bugs_problems"><?php echo __('Need help or have any suggestions? <br><span>Please use the contact form below to let us know how we can improve our website.</span>', 'arc');?></p>
		<?php if(!empty($errMsg)): ?><div class="alert alert-danger" id="errMsg"><?php echo $errMsg; ?></div><?php endif; ?>
        <!---modal for delete btn---->
        <style>
            .modalDelMsg {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                max-width: 600px;
                width: 100%;
                z-index: 999999;
                display: none;
            }
            .modalDelMsg.closed {
                display: none;
            }
            .modal-guts-del {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                padding: 20px 50px 20px 20px;
                display: contents;
            }
            .modal-overlay-del {
                z-index: -1000;
                position: fixed;
                top:0;
                left:0;
                width: 100%;
                height: 100%;
                /*background: rgba(15, 23, 37, 0.9);*/
                backdrop-filter: blur(5px);
            }
            #close-button-del {
                position: absolute;
                right: 0;
                top: 0;
                border-color: transparent !important;
                background-color: transparent !important;
                z-index: 999999;
            }

            #modalDelMsg {
                background: <?=get_theme_mod('secondary_color_setting')?>;
                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
                border-radius: 10px;
                padding: 40px 85px;
                border: none !important;
            }
            #modalDelMsg div.modal-guts-del div {
                font-family: 'Roboto',sans-serif;
                font-style: normal;
                font-weight: normal;
                text-align: center;
            }
            #modalDelMsg div.modal-guts-del div h2{
                font-family: 'Roboto',sans-serif;
                font-style: normal;
                font-weight: normal;
                font-size: 36px;
                line-height: 42px;
                text-align: center;
                color: <?=get_theme_mod('text_site_color')?>;
                margin-top: 15px;
            }
            #modalDelMsg div.modal-guts-del div span.confirm{
                font-family: 'Roboto',sans-serif;
                font-style: normal;
                font-weight: normal;
                font-size: 18px;
                line-height: 21px;
                text-align: center;
                color: <?=get_theme_mod('text_site_color')?>;
                margin: 0 auto;
            }
            #modalDelMsg #close-button-del svg{
                position: absolute;
                margin-top: -30px;
                margin-left: 20px;
            }
        </style>
        <div class="modalDelMsg alert alert-success" id="modalDelMsg">
            <button class="class-button" id="close-button-del">
                <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                    <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                </svg>
            </button>
            <div class="modal-guts-del">
                <div>
                    <!--<h2></h2>-->
                    <span class="confirm">Thanks! We got your message.</span>
                </div>
            </div>
        </div>
        <div class="modal-overlay-del" id="modal-overlay-del"></div>
        <form data-abide action="" id="sendSupportMsg" method="post">
			<div id="html_element"></div>
            <legend><?php echo esc_html__( 'Message information', 'arc' ); ?></legend>
			<fieldset class="fieldset">
				<!-- Title -->
                <label for="msg_title">Title <span class="required">*</span></label>
				<input type="text" placeholder="Title" name="arc-msg_title" id="msg_title" value="<?php if(isset($_POST['arc-msg_title'])) echo $_POST['arc-msg_title'];?>" required="required" />
				<?php
				$type = '';
				?>
				<div id="video-type-select">
					<div class="type-col">
						<span class="input-group-label"><?php echo esc_html__( 'Support type', 'arc' ); ?></span>
                        <br>
						<select name="arc-type_msg" id="faq_select">
							<option <?php if ($type == "Bug") echo ' selected="selected"';?> value="Bug"><?php echo __('Bug', 'arc');?></option>
							<option <?php if ($type == "Feedback") echo ' selected="selected"';?> value="Feedback"><?php echo __('General Inquiry', 'arc'); ?></option>
							<option <?php if ($type == "Media") echo ' selected="selected"';?> value="Media"><?php echo __('Press Inquiry', 'arc'); ?></option>
							<option <?php if ($type == "Content") echo ' selected="selected"';?> value="Content"><?php echo __('Content Removal Request', 'arc'); ?></option>
							<option <?php if ($type == "Copyright") echo ' selected="selected"';?> value="Copyright"><?php echo __('Copyright Issue', 'arc'); ?></option>
							<option <?php if ($type == "Confirmation") echo ' selected="selected"';?> value="Confirmation"><?php echo __('Email Confirmation', 'arc'); ?></option>
						</select>
					</div>
				</div>
                <br>
                <label for="msg_description">Message <span class="required">*</span></label>
				<!-- Description -->
				<textarea required="required"  name="arc-msg_description" placeholder="Message" id="msg_description" rows="3" cols="30" ><?php if(isset($_POST['arc-msg_description'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['arc-msg_description']); } else { echo $_POST['arc-msg_description']; } } ?></textarea>
			</fieldset>
            <legend><?php echo esc_html__( 'User information', 'arc' ); ?></legend>
			<fieldset class="fieldset">
                <div id="user_info" style="padding-left: 0px;
                    padding-right: 0px;
                    margin-left: 0em !important;
                    margin-right: 0em !important;">
                    <div>
                        <label for="user_name">Username <span class="required">*</span></label>
                        <!-- Name -->
	                    <?php if(!is_user_logged_in()):?>
                            <input type="text" name="arc-user_name" placeholder="Username" id="user_name" value="<?php if(isset($_POST['arc-user_name'])) echo $_POST['arc-user_name'];?>" />
	                    <?php else: ?>
                            <input type="text" name="arc-user_name" placeholder="Username" id="user_name" value="<?php echo $user->user_login;?>" />
	                    <?php endif; ?>
                    </div>
                    <div>
                        <label for="user_email">Email address <span class="required">*</span></label>
                        <!-- Email -->
	                    <?php if(!is_user_logged_in()):?>
                            <input required="required"  type="email" name="arc-user_email" placeholder="Email address" id="user_email" value="<?php if(isset($_POST['arc-user_email'])) echo $_POST['arc-user_email'];?>" />
	                    <?php else: ?>
                            <input required="required"  type="email" name="arc-user_email" placeholder="Email address" id="user_email" value="<?php echo $user->user_email;?>" />
	                    <?php endif;?>
                    </div>
                </div>
			</fieldset>
			<?php wp_nonce_field('post_nonce', 'arc-post_nonce_field'); ?>
			<?php if ( xbox_get_field_value( 'my-theme-options', 'enable-recaptcha' ) == 'on' && $siteKey != '' && $secret != '' ) : ?>
				<div class="g-recaptcha" id="captchaHide" data-sitekey="<?php echo $siteKey; ?>" data-callback="hideBlock"></div>
				<script>
                    function hideBlock() {
                        setTimeout(function () {
                            document.getElementById('captchaHide').style.display = 'none';
                            jQuery('button.large').attr('disabled', false).css('cursor', 'pointer');
                            jQuery('#captcha_click').val('ok');
                        }, 500);
                    }
				</script>
			<?php endif; ?>
			<?php /*<script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        */ ?>
			<input type="hidden" name="arc-sended" id="sended" value="true" />
			<input type="hidden" name="captcha_click" id="captcha_click" value="" />
            <?php if(xbox_get_field_value( 'my-theme-options', 'enable-recaptcha' ) == 'on' && $siteKey != '' && $secret != '' ):?>
            <style>
                button.large {
                    cursor: not-allowed;
                }
            </style>
            <?php endif;?>
			<?php echo apply_filters('update_button', '<button class="large send_support_msg" type="button">' . __('Send', 'arc') . '</button>', 'send_msg' ); ?>
		</form>
        <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
        </script>
	</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();