<?php
$border_show = (get_theme_mod('border_around_auth_form') !== false) ? get_theme_mod('border_around_auth_form') : 'yes';
if($border_show == 'yes') {
	$border_color = (get_theme_mod('form_border_color') !== false) ? get_theme_mod('form_border_color') : '#172030';
} else {
	$border_color = 'transparent';
}
?>
<style>
    body{
        color: <?php if(get_theme_mod('form_text_color') !== false) echo get_theme_mod('form_text_color'); else echo '#ffffff';?> !important;
        font-size: 13px !important;
    }
    /*back*/
    .page-container {
        width:100%;
        height:100%;
        background-color: <?php if(get_theme_mod('back_color') !== false) echo get_theme_mod('back_color'); else echo '#000000';?>;
        position: fixed;
        top:0;
        z-index: 9999999;
    }
    .page-back {
        width:100%;
        height:100%;
        left:0;
        top:0;
        position: absolute;
        background-image: url(<?php if(get_theme_mod('back_file') !== false) echo wp_get_attachment_image_url(get_theme_mod('back_file'), 'full'); else echo wp_get_attachment_image_url(get_option('auth_bg'), 'full')?>);
        background-size:cover;
        background-position: center;
    } /*end back*/

    #login{
        position: absolute !important;
        top: 0 !important;
        left: calc(50% - 160px) !important;
    }
    #login {
        max-width: 326px;
        width: 100%;
        padding: 8% 0 0;
        margin: auto;
        color: <?php if(get_theme_mod('form_text_color') !== false) echo get_theme_mod('form_text_color'); else echo '#ffffff';?> !important;
    }
    #login h1{
        display: none !important;
    }
    #login label {
        font-size: 13px !important;
        color: <?php if(get_theme_mod('form_text_color') !== false) echo get_theme_mod('form_text_color'); else echo '#ffffff';?> !important;
    }
    /*links*/
    #login #backtoblog a, #login #nav a,
    p.agreePolicy a{
        color: <?php if(get_theme_mod('links_color') !== false) echo get_theme_mod('links_color'); else echo '#ffffff'?> !important;
        font-size: 15px !important;
    }
    p.agreePolicy a {
        font-size: 13px !important;
    }
    p.agreePolicy label {
        font-size: 15px !important;
    }
    #login #backtoblog a:hover, #login #nav a:hover, p.agreePolicy a:hover {
        color: <?php if(get_theme_mod('links_hover_color') !== false) echo get_theme_mod('links_hover_color'); else echo '#C32CE2'?>!important;
    }
    #backtoblog{
        color: <?php if(get_theme_mod('links_color') !== false) echo get_theme_mod('links_color'); else echo '#ffffff'?> !important;
    }
    #backtoblog:hover{
        color: <?php if(get_theme_mod('links_hover_color') !== false) echo get_theme_mod('links_hover_color'); else echo '#C32CE2'?> !important;
    }
    /*end links*/

    /*form*/
    #login form {
        padding: 40px !important;
        box-shadow: 0px 2px 10px rgb(0 0 0 / 25%);
        border-radius: 4px;
        border: 1px solid <?php echo $border_color?>;
        background-color: rgba(<?php
            $hex = get_theme_mod('form_back_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, <?php if(get_theme_mod('form_back_color') !== false) echo get_theme_mod('form_back_opacity').'%'; else echo '63%';?>);
        color: <?php if(get_theme_mod('form_text_color') !== false) echo get_theme_mod('form_text_color'); else echo '#ffffff'?>;
    }
    #wp-submit:focus, .wp-core-ui .button-primary,
    input[type="submit"] {
        background-color: <?php if(get_theme_mod('form_button_color') !== false) echo get_theme_mod('form_button_color'); else echo '#C32CE2'?> !important;
        border-color: <?php if(get_theme_mod('form_button_border_color') !== false) echo get_theme_mod('form_button_border_color'); else echo '#C32CE2'?> !important;
        width: 100% !important;
        margin-top: 10px !important;
        color: <?php if(get_theme_mod('form_button_text_color') !== false) echo get_theme_mod('form_button_text_color'); else echo '#ffffff'?> !important;
    }

    #wp-submit:focus, .wp-core-ui .button-primary:hover, input[type="submit"]:hover{
        background-color: <?php if(get_theme_mod('form_button_hover_color') !== false) echo get_theme_mod('form_button_hover_color'); else echo '#C32CE2'?> !important;
        border-color: <?php if(get_theme_mod('form_button_border_color') !== false) echo get_theme_mod('form_button_border_color'); else echo '#C32CE2'?> !important;
    }

    .input:focus,
    #wp-submit:focus, .wp-core-ui .button-primary:focus, input[type="submit"]:focus {
        outline: none!important;
        box-shadow: 0 0 0 1px transparent!important;
        border-color: transparent!important;
    }
    #wp-submit:focus, .wp-core-ui .button-primary:focus, input[type="submit"]:focus {
        background-color: <?php if(get_theme_mod('form_button_hover_color') !== false) echo get_theme_mod('form_button_hover_color'); else echo '#C32CE2'?> !important;
    }
    /*end form*/
    .form-block-rcl .g-recaptcha{
        margin-bottom: 30px !important;
    }
    .form-block-rcl .g-recaptcha > div{
        box-sizing: border-box !important;
        max-width: 100% !important;
        width: 294px !important;
    }
    .form-block-rcl .g-recaptcha iframe{
        width: 100% !important;
    }
    label[for=rememberme] {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
        $hex = get_theme_mod('form_text_color') ? get_theme_mod('form_text_color') : '#ffffff';
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,0.5)!important;
    }
    p#nav,
    p#backtoblog,
    p#nav2,
    p#backtoblog2{
        text-align: <?php if(get_theme_mod('links_text_position') !== false) { echo get_theme_mod('links_text_position');} else echo 'left';?> !important;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
        $hex = get_theme_mod('form_text_color') ? get_theme_mod('form_text_color') : '#ffffff';
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,0.5)!important;
    }
    p#nav2,
    p#backtoblog2 {
        margin: 24px 0 0 0 !important;
        font-size: 13px !important;
        padding: 0 24px 0 !important;
    }
    p#nav > a:nth-child(1) {
        margin-right: 3px!important;
    }
    p#nav > a:nth-child(2) {
        margin-left: 3px!important;
    }
    #login form {
        color: <?php if(get_theme_mod('form_text_color') !== false) echo get_theme_mod('form_text_color'); else echo '#ffffff';?> !important;
        margin-top: 20px!important;
        margin-left: 0!important;
        padding: 26px 24px 46px!important;
        font-weight: 400!important;
        overflow: hidden!important;
    }
    #login form .input, #login form input[type=checkbox], #login input[type=text] {
        font-size: 24px!important;
        line-height: 1.33333333!important;
        width: 100%!important;
        padding: .1875rem .3125rem!important;
        margin: 0 6px 16px 0!important;
        min-height: 40px!important;
        max-height: none!important;
        box-shadow: 0 0 0 transparent!important;
        border-radius: 4px!important;
        border: 1px solid #7e8993!important;
        background-color: #fff!important;
        color: #32373c!important;
    }
    #login #reg_passmail {
        font-size: 13px !important;
        color: <?php if(get_theme_mod('form_text_color') !== false) echo get_theme_mod('form_text_color'); else echo '#ffffff';?> !important;
    }
    #wp-submit {
        min-height: 32px;
        line-height: 2.30769231;
        padding: 0 12px;
        vertical-align: baseline;
        width: 100%;
        margin-top: 10px;
    }
    .wp-core-ui .button-primary,
    input[type=submit]{
        background-color: <?php if(get_theme_mod('form_button_color') !== false) echo get_theme_mod('form_button_color'); else echo '#C32CE2'?>;
        border-color: <?php if(get_theme_mod('form_button_border_color') !== false) echo get_theme_mod('form_button_border_color'); else echo '#C32CE2'?>;
        width: 100%!important;
        margin-top: 10px!important;
        color: <?php if(get_theme_mod('form_button_text_color') !== false) echo get_theme_mod('form_button_text_color'); else echo '#ffffff'?>;
        border-radius: 4px!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 142.69% !important;
        max-width: 328px!important;
        padding: 8px!important;
    }
    #login .button.wp-hide-pw {
        background: 0 0 !important;
        border: 1px solid transparent !important;
        box-shadow: none!important;
        width: 5.5rem!important;
        /*height: 4.5rem!important;*/
        min-width: 40px!important;
        margin: 0!important;
        position: absolute!important;
        right: 0!important;
        top: 0!important;
        color: <?php if(get_theme_mod('form_button_color') !== false) echo get_theme_mod('form_button_color'); else echo '#C32CE2'?>!important;
        vertical-align: top!important;
        display: inline-block!important;
        text-decoration: none!important;
        font-size: 13px!important;;
        line-height: 2.15384615!important;
        min-height: 30px!important;
        padding: 0 10px!important;
        cursor: pointer!important;
        -webkit-appearance: none!important;
        border-radius: 3px!important;
        white-space: nowrap!important;
        box-sizing: border-box!important;
    }
    input[type=checkbox]#rememberme {
        border: 1px solid rgba(<?php
        $hex = get_theme_mod('form_text_color') ? get_theme_mod('form_text_color') : '#ffffff';
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,0.5)!important;
        border-radius: 4px!important;
        background:transparent!important;
        color: #555!important;
        clear: none!important;
        cursor: pointer!important;
        display: inline-block!important;
        line-height: 0!important;
        height: 1rem!important;
        margin: -.25rem .25rem 0 0!important;
        outline: 0!important;
        padding: 0!important;
        text-align: center!important;
        vertical-align: middle!important;
        -webkit-appearance: none!important;
        box-shadow: inset 0 1px 2px rgba(0,0,0,.1)!important;
        transition: .05s border-color ease-in-out!important;
    }
    input#user_login,
    input#user_pass,
    input#user_email,
    #login input[type=text],
    #login input[type="password"]{
        background-color: #0F1725 !important;
        border-radius: 4px !important;
        padding: 10px 20px !important;
        border: none !important;
        box-shadow: none !important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('form_text_color') ? get_theme_mod('form_text_color') : '#ffffff';?>
    }
    #login label {
        font-size: 14px!important;
        line-height: 1.5!important;
        display: inline-block!important;
        margin-bottom: 3px!important;
        font-family: 'Roboto',sans-serif!important;
    }
    label[for=rememberme] {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
        $hex = get_theme_mod('form_text_color') ? get_theme_mod('form_text_color') : '#ffffff';
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,0.5)!important;
    }
    #loginform p.submit {
        margin-bottom: 20px !important;
        padding-bottom: 20px !important;
        border-bottom: 1px solid #293243;
        display: flex;
        clear: both;
    }
    #loginform div.nsl-container-buttons,
    #registerform div.nsl-container-buttons {
        width: 100% !important;
    }
    div.nsl-container .nsl-button-default {
        display: flex !important;
    }

    #loginform div.nsl-container-buttons a,
    #registerform div.nsl-container-buttons a{
        width: 100% !important;
        border-radius: 4px !important;
        max-width: 100%  !important;
        height: 40px!important;
        margin-top: 5px!important;
        margin-bottom: 5px!important;
    }
    #loginform div.nsl-container-buttons a > div,
    #registerform div.nsl-container-buttons a > div{
        border-radius: 4px !important;
        height: 40px!important;
        margin-bottom: 5px!important;
    }
    #loginform div.nsl-container.nsl-container-block.nsl-container-login-layout-below,
    #loginform div.nsl-container.nsl-container-block.nsl-container-login-layout-below div.nsl-container-buttons{
        padding-top: 0!important;
    }

    #loginform div.nsl-container-buttons a:nth-child(1) > div  div.nsl-button-label-container,
    #registerform div.nsl-container-buttons a:nth-child(1) > div  div.nsl-button-label-container{
        color: <?=get_theme_mod('secondary_color_setting')?>!important;

    }
    div.nsl-container .nsl-button-default div.nsl-button-label-container {
        margin: 0 24px 0 12px!important;
        padding: 10px 0!important;
        font-family: Helvetica, Arial, sans-serif!important;
        font-size: 16px!important;
        line-height: 20px!important;
        letter-spacing: .25px!important;
        overflow: hidden!important;
        text-align: center!important;
        text-overflow: clip!important;
        white-space: nowrap!important;
        flex: 1 1 auto!important;
        -webkit-font-smoothing: antialiased!important;
        -moz-osx-font-smoothing: grayscale!important;
        text-transform: none!important;
        display: inline-block!important;
    }


    div.nsl-container .nsl-button-svg-container {
        flex: 0 0 auto!important;
        padding: 8px!important;
        display: flex!important;
        align-items: center!important;
    }

    #loginform div.nsl-container-buttons a:nth-child(1) > div  div.nsl-button-svg-container,
    #registerform div.nsl-container-buttons a:nth-child(1) > div  div.nsl-button-svg-container {
        flex: 0 0 auto!important;
        padding: 8px!important;
        display: flex!important;
        align-items: center!important;
    }
    div.nsl-container svg {
        height: 24px!important;
        width: 24px!important;
        vertical-align: top!important;
    }
</style>
<script>
    jQuery(document).ready(function($) {
        var img_src = '<?php if(get_theme_mod('logo_file') !== false) echo wp_get_attachment_image_url(get_theme_mod('logo_file'), 'full'); else echo wp_get_attachment_image_url(get_option('custom_logo'), 'full')?>';
        $('#loginform #form_logo img').attr('src', img_src);
        $('#user_login').attr('placeholder', 'Username or Email Address')
        $('#user_pass').attr('placeholder', 'Password');
    });
</script>
<div class="page-container">
	<div class="page-back">
		<div id="login">
			<form name="loginform" id="loginform" method="post" style="padding-bottom: 20px !important;">
				<p>
					<label for="user_login">Username or Email Address</label>
					<input type="text" name="log" id="user_login" class="input" value="" size="20" autocapitalize="off">
				</p>
				<div class="user-pass-wrap">
					<label for="user_pass">Password</label>
                    <div class="wp-pwd">
                        <input type="password" name="pwd" id="user_pass" class="input password-input" value="" size="20">
                        </button>
                    </div>
				</div>
				<p class="forgetmenot" style="margin-bottom: 0px!important;margin-top: 0px!important;padding-top: 0 !important;padding-bottom: 0 !important;">
                    <input style="margin-top: 14px!important; min-height: 15px!important; width: 1rem!important; min-width: 1rem!important;"name="rememberme" type="checkbox" id="rememberme" value="forever"> <label for="rememberme">Remember Me</label></p>
				<p class="submit" style="margin-top: 0px;">
					<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In">
				</p>
                <div id="nsl-custom-login-form-main">
                    <div class="nsl-container nsl-container-block nsl-container-login-layout-below" data-align="left" style="display: block;">
                        <div class="nsl-container-buttons">
                            <a href="<?=site_url()?>/login?loginSocial=google" rel="nofollow" aria-label="Continue with <b>Google</b>" data-plugin="nsl" data-action="connect" data-provider="google" data-popupwidth="600" data-popupheight="600">
                                <div class="nsl-button nsl-button-default nsl-button-google" data-skin="light" style="background-color:#fff;">
                                    <div class="nsl-button-svg-container">
                                        <svg xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path fill="#4285F4" fill-rule="nonzero" d="M20.64 12.2045c0-.6381-.0573-1.2518-.1636-1.8409H12v3.4814h4.8436c-.2086 1.125-.8427 2.0782-1.7959 2.7164v2.2581h2.9087c1.7018-1.5668 2.6836-3.874 2.6836-6.615z"></path><path fill="#34A853" fill-rule="nonzero" d="M12 21c2.43 0 4.4673-.806 5.9564-2.1805l-2.9087-2.2581c-.8059.54-1.8368.859-3.0477.859-2.344 0-4.3282-1.5831-5.036-3.7104H3.9574v2.3318C5.4382 18.9832 8.4818 21 12 21z"></path><path fill="#FBBC05" fill-rule="nonzero" d="M6.964 13.71c-.18-.54-.2822-1.1168-.2822-1.71s.1023-1.17.2823-1.71V7.9582H3.9573A8.9965 8.9965 0 0 0 3 12c0 1.4523.3477 2.8268.9573 4.0418L6.964 13.71z"></path><path fill="#EA4335" fill-rule="nonzero" d="M12 6.5795c1.3214 0 2.5077.4541 3.4405 1.346l2.5813-2.5814C16.4632 3.8918 14.426 3 12 3 8.4818 3 5.4382 5.0168 3.9573 7.9582L6.964 10.29C7.6718 8.1627 9.6559 6.5795 12 6.5795z"></path><path d="M3 3h18v18H3z"></path></g></svg>
                                    </div>
                                    <div class="nsl-button-label-container">Continue with <b>Google</b>
                                    </div>
                                </div>
                            </a>
                            <a href="<?=site_url()?>/login?loginSocial=facebook" rel="nofollow" aria-label="Continue with <b>Facebook</b>" data-plugin="nsl" data-action="connect" data-provider="facebook" data-popupwidth="475" data-popupheight="175"><div class="nsl-button nsl-button-default nsl-button-facebook" data-skin="dark" style="background-color:#1877F2;"><div class="nsl-button-svg-container"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1365.3 1365.3" height="1365.3" width="1365.3"><path d="M1365.3 682.7A682.7 682.7 0 10576 1357V880H402.7V682.7H576V532.3c0-171.1 102-265.6 257.9-265.6 74.6 0 152.8 13.3 152.8 13.3v168h-86.1c-84.8 0-111.3 52.6-111.3 106.6v128h189.4L948.4 880h-159v477a682.8 682.8 0 00576-674.3" fill="#fff"></path></svg></div><div class="nsl-button-label-container">Continue with <b>Facebook</b></div></div></a>
                        </div>
                    </div>
                </div>
			</form>
			<p id="nav">
				<a rel="nofollow" href="#">Register</a> | <a href="#">Lost your password?</a>
			</p>
			<p id="backtoblog"><a href="#">
					← Go to PornX		</a>
            </p>
		</div>
	</div>
</div>
