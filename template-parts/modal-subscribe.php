<?php
if(get_theme_mod('subscribe_back_color') !== false) {
	$backSubscribe = get_theme_mod('subscribe_back_color');
} else {
	$backSubscribe = '#1E2739';
}
if(get_theme_mod('subscribe_header_text') !== false) {
	$headerSubscribe = get_theme_mod('subscribe_header_text');
} else {
	$headerSubscribe = __('Watch the best porno videos!', 'arc');
}
if(get_theme_mod('subscribe_close_color') !== false) {
	$closeColor = get_theme_mod('subscribe_close_color');
} else {
	$closeColor = '#8E939C';
}
?>
<style>
    div#subscribeModal {
        background-color: rgba(15, 23, 37, 0.9) !important;
        backdrop-filter: blur(5px) !important;
        overflow: auto;
    }
    div#subscribeModal div.modal-content{
        background-color: transparent;
        border: none !important;
        padding-top: 10px;
        box-shadow: none !important;
        width: 100%;
        max-width: 483px;
        margin:0 auto;
    }
    div#subscribeModal div.modal-content div.modal-header button.close{
        color: <?php echo $closeColor?> !important;
    }

    div#subscribeModal div.modal-content div.modal-header button.close svg line{
        stroke: <?php echo $closeColor?> !important;
    }

    div#subscribeModal div.modal-footer {
        background-color: <?=$backSubscribe?>;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        padding: 0 !important;
    }
    div#subscribeModal div.modal-footer div#exampleModalLabel {
        font-family: 'Roboto',sans-serif !important;
        font-style: normal;
        font-weight: 300;
        font-size: 36px!important;
        line-height: 42px!important;
        text-align: center!important;
        width: 100%;
        max-width: 246px;
        margin: 0 auto;
        margin-bottom: 10px;
    }
    div#subscribeModal div.modal-footer div#exampleModalLabel > * {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }
    div#subscribeModal div.modal-footer button p,
    div#subscribeModal div.modal-footer button h1,
    div#subscribeModal div.modal-footer button h2,
    div#subscribeModal div.modal-footer button h3,
    div#subscribeModal div.modal-footer button h4,
    div#subscribeModal div.modal-footer button h5,
    div#subscribeModal div.modal-footer button h6 {
        margin: 0;
    }
    div#subscribeModal div.modal-footer {
        border-top: none !important;
    }
    <?php if(!get_theme_mod('premium_popup_image_file')):?>
    div#subscribeModal div.modal-footer div.modal-img {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        object-fit: fill;
        height: 10px !important;
        width: 100%;
        margin-bottom: 40px;
    }
    <?php else:?>
    div#subscribeModal div.modal-footer div.modal-img {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        /*get_template_directory_uri() . '/assets/img/premium_popup_back.png'*/
        background: url('<?=wp_get_attachment_image_url(get_theme_mod('premium_popup_image_file'), 'full')?>');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        object-fit: fill;
        height: 246px;
        width: 100%;
        margin-bottom: 40px;
    }
    <?php endif;?>
    #are_you,
    #are_you > *{
        margin: 0!important;
        padding: 0!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px!important;
        line-height: 21px!important;
        text-align: center!important;
    }
    <?php
    if(get_theme_mod('subscribe_login_color') !== false){
        $links_color = get_theme_mod('subscribe_login_color');
    } else {
        $links_color = '#ffffff';
    }
    ?>
    div#subscribeModal div.modal-footer span.or{
        color: <?php echo $links_color?>!important;
    }
    <?php
   if(get_theme_mod('subscribe_login_color_on_hover') !== false){
	   $links_color_on_hover = get_theme_mod('subscribe_login_color_on_hover');
   } else {
	   $links_color_on_hover = '#FF00D6';
   }?>

    div#premium_btns {
        display: inline-flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
        max-width: 325px;
        margin-top: 30px;
        margin-bottom: 40px;
    }

    div#premium_btns span:nth-child(1),
    div#premium_btns span:nth-child(2) {
        border: 1px solid rgba(<?php
        $hex = $links_color;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        box-sizing: border-box;
        border-radius: 4px;
        /*padding: 10px;*/
        width: 100%;
        max-width: 156px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        text-align: center;
        color: rgba(<?php
        $hex = $links_color;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        height: 36px!important;
    }

    div#premium_btns span a{
        display: block;
        padding: 10px;
    }

    div#premium_btns span:nth-child(2) {
        background-color: transparent !important;
        border: 1px solid rgba(<?php
        $hex = $links_color;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        color: rgba(<?php
        $hex = $links_color;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
    }
    div#premium_btns span:nth-child(2) > a {
        color: rgba(<?php
        $hex = $links_color;
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
    }

    div#subscribeModal div#premium_btns span.login:first-child {
        background-color: <?=get_theme_mod('subscribe_login_color_on_hover')?> !important;
        border: 1px solid <?=get_theme_mod('subscribe_login_color_on_hover')?> !important;
    }
    div#subscribeModal div#premium_btns span.login:first-child:hover {
        background-color: <?=get_theme_mod('reg_btn_color_on_hover')?> !important;
        border: 1px solid <?=get_theme_mod('reg_btn_color_on_hover')?> !important;
        cursor: pointer;
    }
    @media (min-width: 320px) and (max-width : 356px) {
        div#subscribeModal .modal-dialog {
            margin-top: 50px !important;
        }
        div#subscribeModal div.modal-content div.modal-header button.close {
            margin-right: -7px !important;
            margin-top: 13px !important;
        }

        div#premium_btns {
            justify-content: center !important;
            padding-left: 10px;
            padding-right: 10px;
        }
        div#premium_btns span:nth-child(1) {
            margin-bottom: 10px !important;
        }
    }
    @media (min-width: 357px) and (max-width : 539px) {
        div#subscribeModal .modal-dialog {
            margin-top: 50px !important;
        }
        div#subscribeModal div.modal-content div.modal-header button.close {
            margin-right: -7px !important;
            margin-top: 13px !important;
        }
    }
    @media (min-width : 540px) {
        div#subscribeModal .modal-dialog {
            margin-top: 50px !important;
        }
    }

    <?php if(get_theme_mod('enable_demos_color_scheme') == 'demos'):?>

    <?php //fetish
    if('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
    div#subscribeModal div.modal-footer div#exampleModalLabel > *,
    #are_you,
    #are_you > * {
        color: #FFFFFF !important;
    }
    div#premium_btns span:nth-child(1),
    div#premium_btns span:nth-child(1) > a{
        color: #FFFFFF!important;
    }
    div#subscribeModal div#premium_btns span.login:last-child,
    div#subscribeModal div#premium_btns span.login:last-child > a,
    div#premium_btns span:nth-child(2),
    div#premium_btns span:nth-child(2) > a{
        color: rgba(255,255,255, 0.5) !important;
    }
    <?php endif;?>

    <?php //pornx default
    if('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
    div#subscribeModal div.modal-footer div#exampleModalLabel > *,
    #are_you,
    #are_you > * {
        color: #FFFFFF !important;
    }
    div#premium_btns span:nth-child(1),
    div#premium_btns span:nth-child(1) > a{
        color: #FFFFFF!important;
    }
    div#subscribeModal div#premium_btns span.login:last-child,
    div#subscribeModal div#premium_btns span.login:last-child > a,
    div#premium_btns span:nth-child(2),
    div#premium_btns span:nth-child(2) > a{
        color: rgba(255,255,255, 0.5) !important;
    }
    <?php endif;?>

    <?php //light
    if('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
    div#subscribeModal div.modal-footer div#exampleModalLabel > *,
    #are_you,
    #are_you > * {
        color: #111111 !important;
    }
    div#premium_btns span:nth-child(1),
    div#premium_btns span:nth-child(1) > a{
        color: #FFFFFF!important;
    }
    div#subscribeModal div#premium_btns span.login:last-child,
    div#subscribeModal div#premium_btns span.login:last-child > a,
    div#premium_btns span:nth-child(2),
    div#premium_btns span:nth-child(2) > a{
        color: rgba(0,0,0, 0.5) !important;
    }
    <?php endif;?>

    <?php //milf
    if('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#subscribeModal div.modal-footer div#exampleModalLabel > *,
    #are_you,
    #are_you > * {
        color: #FFFFFF !important;
    }
    div#premium_btns span:nth-child(1),
    div#premium_btns span:nth-child(1) > a{
        color: #100025!important;
    }
    div#subscribeModal div#premium_btns span.login:last-child,
    div#subscribeModal div#premium_btns span.login:last-child > a,
    div#premium_btns span:nth-child(2),
    div#premium_btns span:nth-child(2) > a{
        color: rgba(255,255,255, 0.5) !important;
    }
    <?php endif;?>

    <?php //gay
    if('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#subscribeModal div.modal-footer div#exampleModalLabel > *,
    #are_you,
    #are_you > * {
        color: #FFFFFF !important;
    }
    div#premium_btns span:nth-child(1),
    div#premium_btns span:nth-child(1) > a{
        color: #031748!important;
    }
    div#subscribeModal div#premium_btns span.login:last-child,
    div#subscribeModal div#premium_btns span.login:last-child > a,
    div#premium_btns span:nth-child(2),
    div#premium_btns span:nth-child(2) > a{
        color: rgba(255,255,255, 0.5) !important;
    }
    <?php endif;?>

    <?php //hentai
    if('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#subscribeModal div.modal-footer div#exampleModalLabel > *,
    #are_you,
    #are_you > * {
        color: #FFFFFF !important;
    }
    div#premium_btns span:nth-child(1),
    div#premium_btns span:nth-child(1) > a{
        color: #520027!important;
    }
    div#subscribeModal div#premium_btns span.login:last-child,
    div#subscribeModal div#premium_btns span.login:last-child > a,
    div#premium_btns span:nth-child(2),
    div#premium_btns span:nth-child(2) > a{
        color: rgba(255,255,255, 0.5) !important;
    }
    <?php endif;?>

    <?php //teen
    if('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#subscribeModal div.modal-footer div#exampleModalLabel > *,
    #are_you,
    #are_you > * {
        color: #FFFFFF !important;
    }
    div#premium_btns span:nth-child(1),
    div#premium_btns span:nth-child(1) > a{
        color: #FFFFFF!important;
    }
    div#subscribeModal div#premium_btns span.login:last-child,
    div#subscribeModal div#premium_btns span.login:last-child > a,
    div#premium_btns span:nth-child(2),
    div#premium_btns span:nth-child(2) > a{
        color: rgba(255,255,255, 0.5) !important;
    }
    <?php endif;?>

    <?php //trans
    if('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#subscribeModal div.modal-footer div#exampleModalLabel > *,
    #are_you,
    #are_you > *,
    div#subscribeModal div#premium_btns span.login:first-child,
    div#subscribeModal div#premium_btns span.login:first-child > a,
    div#premium_btns span:nth-child(1),
    div#premium_btns span:nth-child(1) > a{
        color: #FFFFFF !important;
    }
    div#subscribeModal div#premium_btns span.login:last-child,
    div#subscribeModal div#premium_btns span.login:last-child > a,
    div#premium_btns span:nth-child(2),
    div#premium_btns span:nth-child(2) > a{
        color: rgba(255,255,255, 0.5) !important;
    }
    <?php endif;?>

    <?php //lesbian
    if('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#subscribeModal div.modal-footer div#exampleModalLabel > *,
    #are_you,
    #are_you > * {
        color: #FFFFFF !important;
    }
    div#premium_btns span:nth-child(1),
    div#premium_btns span:nth-child(1) > a{
        color: #003538 !important;
    }
    div#subscribeModal div#premium_btns span.login:last-child,
    div#subscribeModal div#premium_btns span.login:last-child > a,
    div#premium_btns span:nth-child(2),
    div#premium_btns span:nth-child(2) > a{
        color: rgba(255,255,255, 0.5) !important;
    }
    <?php endif;?>

    <?php endif;?>

</style>
<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="margin-right: -41px;
                        margin-top: -21px;position: absolute;
                        top:0; right:0; border-color: transparent !important;
                        background-color: transparent !important;">
                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                        <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                    </svg>
                </button>
            </div>
<?php
if(!is_user_logged_in()) : ?>
    <div class="modal-footer">
        <div class="modal-img">
        </div>
        <div class="modal-title" id="exampleModalLabel"><?php echo $headerSubscribe;?></div>
	    <?php if(get_theme_mod('subscribe_footer_text') !== false):
		    echo '<div id="are_you">'. get_theme_mod('subscribe_footer_text') .'</div>';?>
            <div id="premium_btns">
                <span class="login"><?php wp_register('', ''); ?></span>
                <span class="login"><a href="<?php echo wp_login_url();?>"><?php echo esc_html__('Login', 'arc'); ?></a></span>
            </div>
	    <?php else: ?>
            <p id="are_you"><?php echo __('Already a Premium Subscriber? ', 'arc');?></p>
            <div id="premium_btns">
                <span class="login"><?php wp_register('', ''); ?></span>
                <span class="login"><a href="<?php echo wp_login_url();?>"><?php echo esc_html__('Login', 'arc'); ?></a></span>
            </div>
        <?php endif;?>
    </div>
<?php endif; ?>
</div>
</div>
</div>