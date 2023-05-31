<?php
$border_show = (get_theme_mod('border_around_auth_form') !== false) ? get_theme_mod('border_around_auth_form') : 'yes';
if($border_show == 'yes') {
	$border_color = (get_theme_mod('form_border_color') !== false) ? get_theme_mod('form_border_color') : '#172030';
} else {
	$border_color = 'transparent';
}

$tos_text = (get_theme_mod('tos_text') !== false) ? get_theme_mod('tos_text'): 'Terms and Conditions';
$tos_link = (get_theme_mod('tos_link_page') !== false) ? get_theme_mod('tos_link_page'): site_url().'/terms-and-conditions/';
?>
<style>
    body{
        color: <?php if(get_theme_mod('form_text_color') !== false) echo get_theme_mod('form_text_color'); else echo '#ffffff';?> !important;
        font-size: 14px !important;
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
        font-size: 14px !important;
        color: <?php if(get_theme_mod('form_text_color') !== false) echo get_theme_mod('form_text_color'); else echo '#ffffff';?> !important;
        line-height: 1.5!important;
        display: inline-block!important;
        margin-bottom: 3px!important;
        font-family: 'Roboto',sans-serif!important;
    }
    /*links*/
    #login #backtoblog a, #login #nav a{
        color: <?php if(get_theme_mod('links_color') !== false) echo get_theme_mod('links_color'); else echo '#ffffff'?> !important;
        font-size: 15px !important;
    }
    p.agreePolicy a {
        font-size: 14px !important;
    }
    p.agreePolicy label {
        font-size: 15px !important;
    }
    #login #backtoblog a:hover, #login #nav a:hover{
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
        border: 1px solid <?php echo $border_color;?>!important;
        background-color:
                rgba(<?php
                if(get_theme_mod('form_back_color') !== false) {
                   $hex = str_replace('#', '', get_theme_mod('form_back_color'));}
                    else $hex = '172030';
                   list($r, $g, $b) = sscanf($hex, "%02x%02x%02x");
                   echo $r.",".$g.",". $b;
                   ?>, <?php if(get_theme_mod('form_back_opacity') !== false) echo get_theme_mod('form_back_opacity').'%'; else echo '63%';?>) !important;
        color: <?php if(get_theme_mod('form_text_color') !== false) echo get_theme_mod('form_text_color'); else echo '#ffffff'?> !important;
    }
    #wp-submit:focus, .wp-core-ui .button-primary,
    input[type="submit"] {
        background: <?php if(get_theme_mod('form_button_color') !== false) echo get_theme_mod('form_button_color'); else echo '#C32CE2'?> !important;
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

    p#nav,
    p#backtoblog,
    p#nav2,
    p#backtoblog2{
        text-align: <?php if(get_theme_mod('links_text_position') !== false) { echo get_theme_mod('links_text_position');} else echo 'left';?> !important;
    }
    p#nav2,
    p#backtoblog2 {
        margin: 24px 0 0 0 !important;
        font-size: 15px !important;
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
        width: 100%!important;
        margin: 0 6px 16px 0!important;
        min-height: 40px!important;
        max-height: none!important;
        background-color: #0F1725!important;
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
    #login #reg_passmail {
        font-size: 14px !important;
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
    <?php
    $tos_color = (get_theme_mod('tos_link_color') !== false) ? get_theme_mod('tos_link_color'): '#ffffff';
    $tos_on_hover = (get_theme_mod('tos_link_color_on_hover') !== false) ? get_theme_mod('tos_link_color_on_hover'): '#C32CE2';
    $tos_underline = (get_theme_mod('underline_tos') !== false) ? 'underline' : 'none';
    ?>
    a.tos {
        color: <?php echo $tos_color?> !important;
        text-decoration: <?php echo $tos_underline?> !important;
    }
    a.tos:hover {
        color: <?php echo $tos_on_hover?> !important;
    }
</style>
<div class="page-container">
    <div class="page-back">
        <div id="login" style="display: block;">
            <style>
                p#reg_passmail {
                    margin-top: 10px;
                    font-size: 14px;
                    text-align: center;
                    /*display: none;*/
                }
                #wp-submit {
                    margin-top: 0px;
                }

                #nsl-custom-login-form-main .nsl-container-login-layout-below {
                    padding-top: 10px !important;
                }
                input#user_login,
                input#user_pass,
                input#user_email{
                    background: #0F1725 !important;
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
                div.nsl-container .nsl-button-default {
                    display: flex !important;
                }

                #loginform div.nsl-container-buttons,
                #registerform div.nsl-container-buttons {
                    width: 100% !important;
                }
                #loginform div.nsl-container-buttons a,
                #registerform div.nsl-container-buttons a{
                    width: 100% !important;
                    border-radius: 4px !important;
                    max-width: 100% !important;
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
                #loginform div.nsl-container-buttons a:nth-child(1) > div  div.nsl-button-label-container,
                #registerform div.nsl-container-buttons a:nth-child(1) > div  div.nsl-button-label-container{
                    color: <?=get_theme_mod('secondary_color_setting')?>!important;
                }
                #wp-submit:focus,
                .wp-core-ui .button-primary,
                input[type="submit"] {
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

                div.nsl-container svg {
                    height: 24px!important;
                    width: 24px!important;
                    vertical-align: top!important;
                }
            </style>
            <script>
                jQuery(document).ready(function($) {
                    var img_src = '<?php if(get_theme_mod('logo_file') !== false) echo wp_get_attachment_image_url(get_theme_mod('logo_file'), 'full'); else echo wp_get_attachment_image_url(get_option('custom_logo'), 'full')?>';
                    $('#registerform #form_logo img').attr('src', img_src);

                    $("#user_email").attr("placeholder", "Email");
                    $('#user_login').attr('placeholder', 'Username or Email Address');
                });
            </script>
            <form name="registerform" id="registerform" method="post" novalidate="novalidate">
                <p style="margin:0">
                    <label for="user_login">Username</label>
                    <input type="text" name="user_login" id="user_login" class="input" value="" size="20" autocapitalize="off">
                </p>
                <p style="margin:0">
                    <label for="user_email">Email</label>
                    <input type="email" name="user_email" id="user_email" class="input" value="" size="25">
                </p>
                <script src="https://www.google.com/recaptcha/api.js" async="" defer=""></script>
                <div class="g-recaptcha" style="transform:scale(0.9); transform-origin:0;" data-sitekey="6LdChsoZAAAAAJyNFfRCv3J_hwIQDKT4rrwdiZ7Y">
                    <div style="width: 304px; height: 78px;">
                        <div>
                            <iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LdChsoZAAAAAJyNFfRCv3J_hwIQDKT4rrwdiZ7Y&amp;co=aHR0cHM6Ly9jb2Rlci4zNjVkbmVpLmNvbTo0NDM.&amp;hl=ru&amp;v=eWmgPeIYKJsH2R2FrgakEIkq&amp;size=normal&amp;cb=u96ddu8hdbxi" role="presentation" name="a-e3bw76r04uwj" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" width="304" height="78" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
                <p class="agreePolicy" style="text-align: center; margin-top: 10px">By signing up, you agree to our <a class="tos" href="<?php echo $tos_link?>"><?php echo $tos_text?></a></p>

                <!--<br class="clear">-->
                <p class="submit">
                    <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Register">
                </p>
                <p id="reg_passmail">
                    Registration confirmation will be emailed to you.			</p>
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
                <a href="#">Login</a>
                | 			<a href="#">Lost your password?</a>
            </p>
            <p id="backtoblog"><a href="#">
                    ← Go to PornX		</a></p>
        </div>
    </div>
</div>