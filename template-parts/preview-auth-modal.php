<?php
$login_popup_back_color = (get_theme_mod('login_popup_back_color') !== false) ? get_theme_mod('login_popup_back_color') : '#172030';
$login_popup_back_opacity = (get_theme_mod('login_popup_back_opacity') !== false) ? get_theme_mod('login_popup_back_opacity') : '80';
$login_popup_border_color = (get_theme_mod('login_popup_border_color') !== false) ? get_theme_mod('login_popup_border_color') : '#172030';
$login_popup_text_color = (get_theme_mod('login_popup_text_color') !== false) ? get_theme_mod('login_popup_text_color') : '#ffffff';
$login_popup_btn_color = (get_theme_mod('login_popup_button_color') !== false) ? get_theme_mod('login_popup_button_color') : '#C32CE2';
$login_popup_btn_color_hover = (get_theme_mod('login_popup_button_hover_color') !== false) ? get_theme_mod('login_popup_button_hover_color') : '#FF00D6';
$login_popup_btn_border_color = (get_theme_mod('login_popup_btn_border_color') !== false) ? get_theme_mod('login_popup_btn_border_color') : '#C32CE2';
$login_popup_btn_text_color = (get_theme_mod('login_popup_button_text_color') !== false) ? get_theme_mod('login_popup_button_text_color') : '#ffffff';
$login_popup_btn_text_color_hover = (get_theme_mod('login_popup_button_text_color_on_hover') !== false) ? get_theme_mod('login_popup_button_text_color_on_hover') : '#ffffff';
$login_popup_links_color = (get_theme_mod('login_popup_links_color') !== false) ? get_theme_mod('login_popup_links_color') : '#ffffff';
$login_popup_links_color_hover = (get_theme_mod('login_popup_links_hover_color') !== false) ? get_theme_mod('login_popup_links_hover_color') : '#FF00D6';
$login_popup_links_pos = (get_theme_mod('login_popup_links_text_position') !== false) ? get_theme_mod('login_popup_links_text_position') : 'center';
$login_popup_btn_border = (get_theme_mod('border_button_login_popup') !== false) ? get_theme_mod('border_button_login_popup') : 'no';
?>
<style>
    #preview_auth_modal {
        background-color: rgba(<?php
                $hex = get_theme_mod('login_popup_back_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, <?=$login_popup_back_opacity.'%'?>) !important;
        backdrop-filter: blur(5px);
    }

    #preview_auth_modal .modal-content{
        width: 100%;
        max-width: 738px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        background: transparent !important;
        box-shadow: none !important;
        border: none !important;
    }
    #authform {
        width: 100%;
        margin: 0 auto;
        font-family: 'Roboto', sans-serif !important;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: <?=$login_popup_text_color?>;

    }

    #auth_part,
    #authform #nsl-custom-login-form-1{
        text-align: center;
    }

    #auth_part label[for=user_login],
    #auth_part label[for=user_pass],
    #auth_part #wp-submit-auth-modal,
    #auth_part p.login-remember label{
        font-size: 14px;
        line-height: 1.5;
        display: inline-block;
        margin-bottom: 3px;
    }

    #auth_part label[for=user_login],
    #auth_part label[for=user_pass],
    #auth_part p.login-remember label {
        text-align: left;
        float: left;
    }

    #auth_part p#nav {
        font-size: 14px;
        line-height: 1.5;
    }

    #user_login,
    #user_pass{
        font-size: 24px;
        line-height: 1.33333333;
        width: 100%;
        border-width: .0625rem;
        padding: .1875rem .3125rem;
        min-height: 40px;
        max-height: none;
        background: #fbfbfb;
        box-shadow: 0 0 0 transparent;
        border-radius: 4px;
        border: 1px solid #7e8993;
        border-top-width: 1px;
        border-right-width: 1px;
        border-bottom-width: 1px;
        border-left-width: 1px;
        background-color: #fff;
        color: #32373c;
    }

    #wp-submit-auth-modal,
    button#nav2{
        width: 100%;
        border-radius: 3px;
    }

    #authform p.login-username
    #authform p.login-password {
        margin-bottom: 0 !important;
    }

    #authform p.login-remember label {
        margin-bottom: 10px;
    }

    #auth_part label[for=user_login],
    #auth_part label[for=user_pass],
    #auth_part p.login-remember label {
        color: <?=$login_popup_text_color?> !important;
    }

    #preview_auth_modal .modal-header .close {
        border-color: transparent !important;
        background-color: transparent !important;
        color: <?=$login_popup_text_color?> !important;
    }

    #preview_auth_modal #reg_part h3,
    #preview_auth_modal #reg_part span,
    #preview_auth_modal #reg_part ul li span,
    #preview_auth_modal #reg_part p {
        color: <?=$login_popup_text_color?> !important;
    }

    #preview_auth_modal p#nav a:hover{
        color: rgba(<?php
        $hex = $login_popup_links_color_hover;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 1) !important;
    }

    #preview_auth_modal p#nav {
        text-align: <?=$login_popup_links_pos?> !important;
    }

    #preview_auth_modal #wp-submit-auth-modal,
    #reg_part button#nav2 {
        background-color: <?=$login_popup_btn_color?> !important;
        color: <?=$login_popup_btn_text_color?> !important;
    }

    #reg_part button#nav2 a {
        color: <?=$login_popup_btn_text_color?> !important;
    }

    #preview_auth_modal #wp-submit-auth-modal:hover,
    #reg_part button#nav2:hover {
        background-color: <?=$login_popup_btn_color_hover?> !important;
        color: <?=$login_popup_btn_text_color_hover?> !important;
    }

    #auth_part {
        width: 100% !important;
        max-width: 408px !important;
        padding: 40px !important;
        background-color: <?=$login_popup_back_color?> !important;
        border: 1px solid <?=$login_popup_border_color?> !important;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
        border-radius: 4px;
        margin-right: 2px;
    }

    #reg_part {
        width: 100% !important;
        max-width: 330px !important;
        padding: 40px !important;
        background-color: <?=$login_popup_back_color?> !important;
        border: 1px solid <?=$login_popup_border_color?> !important;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
        border-radius: 4px;
    }

    #reg_part button#nav2:hover a{
        color: <?=$login_popup_btn_text_color_hover?> !important;
    }
    <?php if($login_popup_btn_border == 'no'): ?>
    #preview_auth_modal #wp-submit-auth-modal,
    #reg_part button#nav2,
    #preview_auth_modal #wp-submit-auth-modal:hover,
    #reg_part button#nav2:hover{
        border: none !important;
    }
    <?php else:?>
    #preview_auth_modal #wp-submit-auth-modal,
    #reg_part button#nav2,
    #preview_auth_modal #wp-submit-auth-modal:hover,
    #reg_part button#nav2:hover{
        border: 1px solid <?=$login_popup_btn_border_color?> !important;
    }
    <?php endif;?>

    div#reg_part h3 {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 36px;
        line-height: 42px;
        color: <?=$login_popup_text_color?>;
        margin-top: 0;
    }

    input#user_login,
    input#user_pass {
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
    }
    #wp-submit-auth-modal {
        background-color: <?=$login_popup_btn_color?>;
        border-radius: 4px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 142.69%;
        color: <?=$login_popup_btn_text_color?>;
        width: 100% !important;
        max-width: 328px;
        padding: 8px!important;
    }
    p.login-submit {
        margin-bottom: 20px !important;
        padding-bottom: 20px !important;
        border-bottom: 1px solid #293243;
    }
    #authform div.nsl-container-block .nsl-container-buttons a {
        max-width: 328px !important;
        border-radius: 4px !important;
        font-family: 'Roboto', sans-serif !important;
        font-style: normal!important;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 142.69%!important;
    }
    #authform div.nsl-container-block .nsl-container-buttons div.nsl-button-google div.nsl-button-label-container {
        color: <?=get_theme_mod('secondary_color_setting')?> !important;
    }
    #auth_part p.login-remember label {
        border: none !important;
        background: transparent !important;
        padding-left: 0 !important;
        color: rgba(<?php
        $hex = $login_popup_text_color;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        box-shadow: none !important;
        outline: none!important;
    }
    #auth_part p.login-remember label.ui-state-active,
    #auth_part p.login-remember label:hover{
        color: rgba(<?php
        $hex = $login_popup_text_color;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 1) !important;
        box-shadow: none !important;
        outline: none!important;
        border: none !important;
        background: transparent !important;
    }
    #auth_part p.login-remember label:hover span.ui-checkboxradio-icon {
        border: 1px solid rgba(<?php
        $hex = $login_popup_text_color;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 1)!important;
    }
    #reg_part span,
    #reg_part p,
    #reg_part ul li{
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
    }
    #reg_part ul {
        padding-left: 0px !important;
    }
    #reg_part ul li {
        display: inline-flex;
    }
    p.login-password {
        margin-bottom: 10px !important;
    }
    #auth_part #authform p#nav {
        margin-top: 0 !important;
        margin-bottom: 0px !important;
    }
    #auth_part #authform p#nav a{
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        text-align: <?=$login_popup_links_pos?>;
        color: rgba(<?php
        $hex = $login_popup_links_color;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
    }
    #auth_part #authform p#nav a:hover{
        color: rgba(<?php
        $hex = $login_popup_links_color_hover;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 1) !important;
    }
    button#nav2 a{
        font-family: 'Roboto',sans-serif !important;
        font-style: normal!important;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 142.69%!important;
    }
    h3#login_header {
        font-family: 'Roboto',sans-serif !important;
        font-style: normal!important;
        font-weight: 500!important;
        font-size: 36px!important;
        line-height: 42px!important;
        margin-bottom: 2px!important;
        margin-top: 0!important;
        text-align: left !important;
    }

    @media (max-width: 660px) {
        #preview_auth_modal .modal-dialog {
            margin: 30px auto !important;
        }
        #preview_auth_modal .modal-content {
            justify-content: center !important;
        }
        div#auth_part {
            margin-bottom: 2px !important;
        }
        div#reg_part {
            max-width: 408px !important;
        }
    }
    @media (min-width: 320px) and (max-width: 410px) {
        #preview_auth_modal .modal-dialog {
            margin: 20px auto !important;
        }
        div#auth_part,
        div#reg_part{
            max-width: 320px !important;
        }
    }
    <?php if(get_theme_mod('enable_demos_color_scheme') == 'demos'):?>

    <?php //fetish
    if('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
    #authform label.ui-button .ui-icon,
    #auth_part p.login-remember label{
        color:#CCCCCC!important;
    }
    #auth_part p.login-remember label span.ui-checkboxradio-icon {
        border-color: #CCCCCC!important;
    }

    #auth_part p.login-remember label.ui-state-active,
    #auth_part p.login-remember label:hover{
        color: #FFFFFF!important;
    }
    #auth_part p.login-remember label:hover span.ui-checkboxradio-icon {
        border-color: #FFFFFF!important;
    }
    #auth_part label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-checked.ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked {
        border-color: #FFFFFF!important;
        background:#C62F05!important;
    }
    #reg_part ul li svg path {
        fill: #E83008!important;
    }
    <?php endif;?>

    <?php //pornx default
    if('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
    #authform label.ui-button .ui-icon,
    #auth_part p.login-remember label{
        color:#CCCCCC!important;
    }
    #auth_part p.login-remember label span.ui-checkboxradio-icon {
        border-color: #CCCCCC!important;
    }

    #auth_part p.login-remember label.ui-state-active,
    #auth_part p.login-remember label:hover{
        color: #FFFFFF!important;
    }

    #auth_part p.login-remember label:hover span.ui-checkboxradio-icon {
        border-color: #FFFFFF!important;
    }
    #auth_part label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-checked.ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked {
        border-color: #FFFFFF!important;
        background: #AA2CC4!important;
    }
    #reg_part ul li svg path {
        fill: #C32CE2!important;
    }
    <?php endif;?>

    <?php //light
    if('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>

    #reg_part ul li svg path {
        fill: #8F07AB !important;
    }
    #authform label.ui-button .ui-icon,
    #auth_part p.login-remember label{
        color:#0A0A0A!important;
    }
    #auth_part p.login-remember label span.ui-checkboxradio-icon {
        border-color: #0A0A0A!important;
    }

    #auth_part p.login-remember label.ui-state-active,
    #auth_part p.login-remember label:hover{
        color: #111111!important;
    }

    #auth_part p.login-remember label:hover span.ui-checkboxradio-icon {
        border-color: #111111!important;
    }
    #auth_part label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-checked.ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked {
        border-color: #111111!important;
        background: #C32CE2 !important;
    }
    <?php endif;?>

    <?php //milf
    if('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    #reg_part ul li svg path {
        fill: #18FFC8 !important;
    }

    #authform label.ui-button .ui-icon,
    #auth_part p.login-remember label{
        color:#CCCCCC!important;
    }
    #auth_part p.login-remember label span.ui-checkboxradio-icon {
        border-color: #CCCCCC!important;
    }

    #auth_part p.login-remember label.ui-state-active,
    #auth_part p.login-remember label:hover{
        color: #FFFFFF!important;
    }

    #auth_part p.login-remember label:hover span.ui-checkboxradio-icon {
        border-color: #FFFFFF!important;
    }
    #auth_part label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-checked.ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked {
        border-color:#FFFFFF!important;
        background: #13DBC0 !important;
    }
    <?php endif;?>

    <?php //gay
    if('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    #reg_part ul li svg path {
        fill: #18F1FF !important;
    }

    #authform label.ui-button .ui-icon,
    #auth_part p.login-remember label{
        color:#CCCCCC!important;
    }
    #auth_part p.login-remember label span.ui-checkboxradio-icon {
        border-color: #CCCCCC!important;
    }

    #auth_part p.login-remember label.ui-state-active,
    #auth_part p.login-remember label:hover{
        color: #FFFFFF!important;
    }

    #auth_part p.login-remember label:hover span.ui-checkboxradio-icon {
        border-color: #FFFFFF!important;
    }
    #auth_part label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-checked.ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked {
        border-color:#FFFFFF!important;
        background: #14D7E5!important;
    }
    <?php endif;?>

    <?php //hentai
    if('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>

    #reg_part ul li svg path {
        fill: #FFC700 !important;
    }
    #authform label.ui-button .ui-icon,
    #auth_part p.login-remember label{
        color:#E4C1D2!important;
    }
    #auth_part p.login-remember label span.ui-checkboxradio-icon {
        border-color: #E4C1D2!important;
    }

    #auth_part p.login-remember label.ui-state-active,
    #auth_part p.login-remember label:hover{
        color: #FFFFFF!important;
    }

    #auth_part p.login-remember label:hover span.ui-checkboxradio-icon {
        border-color: #FFFFFF!important;
    }
    #auth_part label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-checked.ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked {
        border-color:#FFFFFF!important;
        background: #D1A300!important;
    }
    <?php endif;?>

    <?php //teen
    if('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    #reg_part ul li svg path {
        fill:#FF2552 !important;
    }

    #authform label.ui-button .ui-icon,
    #auth_part p.login-remember label{
        color:#CCCCCC!important;
    }
    #auth_part p.login-remember label span.ui-checkboxradio-icon {
        border-color: #CCCCCC!important;
    }

    #auth_part p.login-remember label.ui-state-active,
    #auth_part p.login-remember label:hover{
        color: #FFFFFF!important;
    }

    #auth_part p.login-remember label:hover span.ui-checkboxradio-icon {
        border-color: #FFFFFF!important;
    }
    #auth_part label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-checked.ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked {
        border-color:#FFFFFF!important;
        background: #E02154!important;
    }
    <?php endif;?>

    <?php //trans
    if('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    #reg_part ul li svg path {
        fill:#0052CE !important;
    }

    #authform label.ui-button .ui-icon,
    #auth_part p.login-remember label{
        color:#CCCCCC!important;
    }
    #auth_part p.login-remember label span.ui-checkboxradio-icon {
        border-color: #CCCCCC!important;
    }

    #auth_part p.login-remember label.ui-state-active,
    #auth_part p.login-remember label:hover{
        color: #FFFFFF!important;
    }

    #auth_part p.login-remember label:hover span.ui-checkboxradio-icon {
        border-color: #FFFFFF!important;
    }
    #auth_part label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-checked.ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked {
        border-color:#FFFFFF!important;
        background: #0045A0!important;
    }
    <?php endif;?>

    <?php //lesbian
    if('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>

    #reg_part ul li svg path {
        fill:#35FF56 !important;
    }

    #authform label.ui-button .ui-icon,
    #auth_part p.login-remember label{
        color:#CCCCCC!important;
    }
    #auth_part p.login-remember label span.ui-checkboxradio-icon {
        border-color: #CCCCCC!important;
    }

    #auth_part p.login-remember label.ui-state-active,
    #auth_part p.login-remember label:hover{
        color: #FFFFFF!important;
    }

    #auth_part p.login-remember label:hover span.ui-checkboxradio-icon {
        border-color: #FFFFFF!important;
    }
    #auth_part label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-checked.ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked {
        border-color:#FFFFFF!important;
        background: #2EDB56!important;
    }
    <?php endif;?>
    <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
    #auth_modal #wp-submit-auth-modal, #reg_part button#nav2, #auth_modal #wp-submit-auth-modal:hover, #reg_part button#nav2:hover{
        border: 1px solid <?=get_theme_mod('btn_color_setting')?> !important;
    }
    <?php endif;?>
    <?php endif;?>
</style>
<script>
    jQuery(document).ready(function ($) {
        $('#rememberme').checkboxradio();
        $('input#user_login').attr('placeholder', 'Username');
        $('input#user_pass').attr('placeholder', 'Password');

        $('p.login-username').before('<h3 id="login_header">Log in</h3>');

        $('p.login-remember').before('<p id="nav">' +
            '<a href="#">Lost your password?</a>' +
            '</p>');
    });
</script>
<!--preview_preview_auth_modal-->
<div class="modal" id="preview_auth_modal" tabindex="-1" role="dialog" aria-hidden="true" style="display:block;overflow: overlay; overflow-x: hidden">
    <div class="modal-dialog" role="document" style="width: 100%;max-width: 740px;">
        <div class="modal-content" style="max-width: 740px;width: 100%;">
            <div id="auth_part">
				<?php
				wp_login_form(
					[
						'form_id'        => 'authform',
						'label_username' => __('Username'),
						'label_password' => __('Password'),
						'label_remember' => __( 'Keep me logged in' ),
						'label_log_in'   => __( 'Log In' ),
						'id_username'    => 'user_login',
						'id_password'    => 'user_pass',
						'id_remember'    => 'rememberme',
						'id_submit'      => 'wp-submit-auth-modal',
						'remember'       => true,
						'value_username' => NULL,
						'value_remember' => false
					]
				);
				?>
            </div>
            <div id="reg_part">
                <h3>Watch the best porn videos</h3>
                <span style="text-align: center;">
                            Here's what you're missing out on!
                </span><br><br>
                <ul class="clearfix" style="list-style: none;">
                    <li class="alpha">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 2C3.36452 2 0 5.36443 0 9.49996C0 13.6355 3.36452 17 7.5 17C11.6355 17 15 13.6355 15 9.49996C15 5.36443 11.6356 2 7.5 2ZM11.8066 8.23315L7.09476 12.945C6.89442 13.1453 6.62809 13.2556 6.34479 13.2556C6.06148 13.2556 5.79516 13.1453 5.59481 12.945L3.19337 10.5436C2.99302 10.3432 2.88267 10.0769 2.88267 9.79359C2.88267 9.51021 2.99302 9.24389 3.19337 9.04354C3.39364 8.8432 3.65996 8.73285 3.94334 8.73285C4.22665 8.73285 4.49305 8.8432 4.69332 9.04362L6.34471 10.6949L10.3065 6.73313C10.5069 6.53278 10.7732 6.42251 11.0565 6.42251C11.3398 6.42251 11.6061 6.53278 11.8065 6.73313C12.2202 7.14682 12.2202 7.81962 11.8066 8.23315Z" fill="#FF00D6"/>
                        </svg> <span>Premium videos</span>
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 2C3.36452 2 0 5.36443 0 9.49996C0 13.6355 3.36452 17 7.5 17C11.6355 17 15 13.6355 15 9.49996C15 5.36443 11.6356 2 7.5 2ZM11.8066 8.23315L7.09476 12.945C6.89442 13.1453 6.62809 13.2556 6.34479 13.2556C6.06148 13.2556 5.79516 13.1453 5.59481 12.945L3.19337 10.5436C2.99302 10.3432 2.88267 10.0769 2.88267 9.79359C2.88267 9.51021 2.99302 9.24389 3.19337 9.04354C3.39364 8.8432 3.65996 8.73285 3.94334 8.73285C4.22665 8.73285 4.49305 8.8432 4.69332 9.04362L6.34471 10.6949L10.3065 6.73313C10.5069 6.53278 10.7732 6.42251 11.0565 6.42251C11.3398 6.42251 11.6061 6.53278 11.8065 6.73313C12.2202 7.14682 12.2202 7.81962 11.8066 8.23315Z" fill="#FF00D6"/>
                        </svg> <span class="tab3">Custom playlists</span>
                    </li>
                    <li>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.5 2C3.36452 2 0 5.36443 0 9.49996C0 13.6355 3.36452 17 7.5 17C11.6355 17 15 13.6355 15 9.49996C15 5.36443 11.6356 2 7.5 2ZM11.8066 8.23315L7.09476 12.945C6.89442 13.1453 6.62809 13.2556 6.34479 13.2556C6.06148 13.2556 5.79516 13.1453 5.59481 12.945L3.19337 10.5436C2.99302 10.3432 2.88267 10.0769 2.88267 9.79359C2.88267 9.51021 2.99302 9.24389 3.19337 9.04354C3.39364 8.8432 3.65996 8.73285 3.94334 8.73285C4.22665 8.73285 4.49305 8.8432 4.69332 9.04362L6.34471 10.6949L10.3065 6.73313C10.5069 6.53278 10.7732 6.42251 11.0565 6.42251C11.3398 6.42251 11.6061 6.53278 11.8065 6.73313C12.2202 7.14682 12.2202 7.81962 11.8066 8.23315Z" fill="#FF00D6"/>
                        </svg> <span class="tab4">Community forum</span>
                    </li>

                </ul>
                <p>And many more!</p>
                <button type="button" id="nav2">
                    <a rel="nofollow" href="#">Register</a>
                </button>
            </div>
        </div>
    </div>
</div>

