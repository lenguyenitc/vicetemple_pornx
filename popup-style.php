<?php
/***get rgb from hex for background***/
function arc_rgb_from_hex($color) {
	if($color == '') $color = '#000';
	$color = str_replace( '#', '', $color);
	// Convert shorthand colors to full format, e.g. "FFF" -> "FFFFFF".
	$color = preg_replace( '~^(.)(.)(.)$~', '$1$1$2$2$3$3', $color );
	$rgb      = array();
	$rgb['R'] = hexdec( $color[0] . $color[1] );
	$rgb['G'] = hexdec( $color[2] . $color[3] );
	$rgb['B'] = hexdec( $color[4] . $color[5] );
	return $rgb;
}
if(get_theme_mod('popup_color_btn') !== false) {
	$pulse_c = get_theme_mod('popup_color_btn');
} else {
	$pulse_c = '#FF00D6';
}
$pulse_color = arc_rgb_from_hex(str_replace('#', '', $pulse_c));
?>
<style>
    #popupModal {
        position: fixed;
        top: 0px;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 99999;
        display: none;
        overflow: hidden;
        -webkit-overflow-scrolling: touch;
        outline: 0;
        background: rgba(15, 23, 37, 0.9)!important;
        backdrop-filter: blur(5px)!important;
    }
    #popupModal button.close {
        z-index: 1 !important;
        background: transparent !important;
        border: transparent !important;
        top: -32px!important;
        right: -39px!important;
    }
    #popupModal div.modal-content {
        background-color: <?php if(get_theme_mod('popup_background') !== false){ echo get_theme_mod('popup_background'); } else echo '#1e2739';?>;
        border: none !important;
        margin: 0 auto!important;
        width: 100% !important;
        max-width: 483px !important;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25) !important;
        border-radius: 10px !important;
    }
    #popupModal div.modal-body {
        padding: 0 !important;
        border-radius: 10px!important;
    }
    div#popup_content {
        margin-bottom:20px !important;
    }
    div#popup_content > div:nth-child(1) > *{
        margin: 0 auto !important;
        font-family: 'Roboto', sans-serif!important;
        font-style: normal!important;
        font-weight: 300!important;
        font-size: 36px!important;
        line-height: 42px!important;
        text-align: center!important;
        max-width: 358px !important;
        width: 100% !important;
        color: #FFFFFF;
    }
    div#popup_content > div:nth-child(1) {
        margin-top: 40px !important;
        margin-bottom: 10px !important;
    }
    div#popup_content > div:nth-child(2) > *{
        margin: 0 auto !important;
        font-family: 'Roboto', sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 18px!important;
        text-align: center!important;
        opacity: 0.5;
        max-width: 421px !important;
        width: 100% !important;
    }
    #popupModal div.modal-body img {
        width: 100%;
        height: auto;
        margin: 0;
        padding: 0;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        max-height: 400px;
        vertical-align: middle;
    }
    #popupModal div.modal-footer {
        border-top: none !important;
        margin-top: 0!important;
        padding-bottom: 40px !important;
    }
    #popupModal div.modal-footer a.btn {
        padding: 10px;
        /*display: block;*/
        text-align: center;
        margin: 0 auto !important;
        background-color: <?php if(get_theme_mod('popup_color_btn') !== false) { echo get_theme_mod('popup_color_btn'); } else echo '#FF00D6';?>;
        color: <?php if(get_theme_mod('text_site_color') !== false) { echo get_theme_mod('text_site_color');} else echo '#ffffff';?>;
        text-decoration: none;
        /*max-width: 198px;*/
        width: 100% !important;
        height: 36px !important;
        white-space: nowrap !important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: 900!important;
        font-size: 14px!important;
        line-height: 16px!important;
        border-radius: 4px!important;
    }
    #popupModal div.modal-footer a.btn > * {
        white-space: nowrap !important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: 900!important;
        font-size: 14px!important;
        line-height: 16px!important;
        display: contents !important;
    }
    #popupModal div.modal-footer a.btn.pulse {
        cursor: pointer;
        box-shadow: 0 0 0 rgba(<?php echo $pulse_color['R'] . ',' . $pulse_color['G'] .','. $pulse_color['B']. ', 0.8';?>);
        animation: pulse 2s infinite;
    }
    #popupModal div.modal-footer a.btn.pulse:hover {
        animation: none;
        background: <?php if(get_theme_mod('popup_hover_color_btn') !== false) { echo get_theme_mod('popup_hover_color_btn'); }else echo '#FF00D6';?>;
    }

    @-webkit-keyframes pulse {
        0% {
            -webkit-box-shadow: 0 0 0 0 rgba(<?php echo $pulse_color['R'] . ',' . $pulse_color['G'] .','. $pulse_color['B']. ', 0.8';?>);
        }
        70% {
            -webkit-box-shadow: 0 0 0 20px rgba(<?php echo $pulse_color['R'] . ',' . $pulse_color['G'] .','. $pulse_color['B']. ', 0';?>);
        }
        100% {
            -webkit-box-shadow: 0 0 0 0 rgba(<?php echo $pulse_color['R'] . ',' . $pulse_color['G'] .','. $pulse_color['B']. ', 0';?>);
        }
    }
    @keyframes pulse {
        0% {
            -moz-box-shadow: 0 0 0 0 rgba(<?php echo $pulse_color['R'] . ',' . $pulse_color['G'] .','. $pulse_color['B']. ', 0.8';?>);
            box-shadow: 0 0 0 0 rgba(<?php echo $pulse_color['R'] . ',' . $pulse_color['G'] .','. $pulse_color['B']. ', 0.8';?>);
        }
        70% {
            -moz-box-shadow: 0 0 0 20px rgba(<?php echo $pulse_color['R'] . ',' . $pulse_color['G'] .','. $pulse_color['B']. ', 0';?>);
            box-shadow: 0 0 0 20px rgba(<?php echo $pulse_color['R'] . ',' . $pulse_color['G'] .','. $pulse_color['B']. ', 0';?>);
        }
        100% {
            -moz-box-shadow: 0 0 0 0 rgba(<?php echo $pulse_color['R'] . ',' . $pulse_color['G'] .','. $pulse_color['B']. ', 0';?>);
            box-shadow: 0 0 0 0 rgba(<?php echo $pulse_color['R'] . ',' . $pulse_color['G'] .','. $pulse_color['B']. ', 0';?>);
        }
    }

    .slideRight{
        animation-name: slideRight;
        -webkit-animation-name: slideRight;

        animation-duration: <?php if(get_theme_mod('popup_speed_anim') !== false) { echo get_theme_mod('popup_speed_anim');} else echo '0.5s';?>;
        -webkit-animation-duration: <?php if(get_theme_mod('popup_speed_anim') !== false ) {  echo get_theme_mod('popup_speed_anim');} else echo '0.5s';?>;

        animation-timing-function: ease-in-out;
        -webkit-animation-timing-function: ease-in-out;

        visibility: visible !important;
    }

    @keyframes slideRight {
        0% {
            transform: translateX(150%);
        }
        100% {
            transform: translateX(0%);
        }
    }

    @-webkit-keyframes slideRight {
        0% {
            transform: translateX(150%);
        }
        100% {
            transform: translateX(0%);
        }
    }
    .slideLeft{
        animation-name: slideLeft;
        -webkit-animation-name: slideLeft;

        animation-duration: <?php if(get_theme_mod('popup_speed_anim') !== false) { echo get_theme_mod('popup_speed_anim');} else echo '0.5s';?>;
        -webkit-animation-duration: <?php if(get_theme_mod('popup_speed_anim') !== false ) {  echo get_theme_mod('popup_speed_anim');} else echo '0.5s';?>;

        animation-timing-function: ease-in-out;
        -webkit-animation-timing-function: ease-in-out;

        visibility: visible !important;
    }

    @keyframes slideLeft {
        0% {
            transform: translateX(-150%);
        }
        100% {
            transform: translateX(0%);
        }
    }

    @-webkit-keyframes slideRight {
        0% {
            transform: translateX(-150%);
        }
        100% {
            transform: translateX(0%);
        }
    }
    .slideTop{
        animation-name: slideTop;
        -webkit-animation-name: slideTop;

        animation-duration: <?php if(get_theme_mod('popup_speed_anim') !== false) { echo get_theme_mod('popup_speed_anim');} else echo '0.5s';?>;
        -webkit-animation-duration: <?php if(get_theme_mod('popup_speed_anim') !== false ) {  echo get_theme_mod('popup_speed_anim');} else echo '0.5s';?>;

        animation-timing-function: ease-in-out;
        -webkit-animation-timing-function: ease-in-out;

        visibility: visible !important;
    }

    @keyframes slideTop {
        0% {
            transform: translateY(-150%);
        }
        100% {
            transform: translateY(0%);
        }
    }

    @-webkit-keyframes slideTop {
        0% {
            transform: translateY(-150%);
        }
        100% {
            transform: translateY(0%);
        }
    }
    .slideBottom{
        animation-name: slideBottom;
        -webkit-animation-name: slideBottom;

        animation-duration: <?php if(get_theme_mod('popup_speed_anim') !== false) { echo get_theme_mod('popup_speed_anim');} else echo '0.5s';?>;
        -webkit-animation-duration: <?php if(get_theme_mod('popup_speed_anim') !== false ) {  echo get_theme_mod('popup_speed_anim');} else echo '0.5s';?>;

        animation-timing-function: ease-in-out;
        -webkit-animation-timing-function: ease-in-out;

        visibility: visible !important;
    }

    @keyframes slideBottom {
        0% {
            transform: translateY(150%);
        }
        100% {
            transform: translateY(0%);
        }
    }

    @-webkit-keyframes slideTop {
        0% {
            transform: translateY(150%);
        }
        100% {
            transform: translateY(0%);
        }
    }
    div#popup_content {
        padding-left: 20px;
        padding-right: 20px;
    }

    @media (max-width: 551px) {
        #popupModal div.modal-dialog {
            margin-top: 50px !important;

        }
        #popupModal button.close {
            right: -13px!important;
        }

    }

    <?php if(get_theme_mod('enable_demos_color_scheme') == 'demos'):?>

    <?php //fetish
    if('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
        div#popup_content > div:nth-child(1) > * {
            color: #FFFFFF !important;
        }
        div#popup_content > div:nth-child(2) > * {
            color: #CCCCCC !important;
            opacity: 1 !important;
        }
        #popupModal div.modal-footer a.btn,
        #popupModal div.modal-footer a.btn > * {
            color: #FFFFFF !important;
        }
    <?php endif;?>

    <?php //pornx default
    if('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
    div#popup_content > div:nth-child(1) > * {
        color: #FFFFFF !important;
    }
    div#popup_content > div:nth-child(2) > * {
        color: #CCCCCC !important;
        opacity: 1 !important;
    }
    #popupModal div.modal-footer a.btn,
    #popupModal div.modal-footer a.btn > * {
        color: #FFFFFF !important;
    }
    <?php endif;?>

    <?php //light
    if('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
    div#popup_content > div:nth-child(1) > * {
        color: #111111 !important;
    }
    div#popup_content > div:nth-child(2) > * {
        color: #0A0A0A !important;
        opacity: 1 !important;
    }
    #popupModal div.modal-footer a.btn,
    #popupModal div.modal-footer a.btn > * {
        color: #FFFFFF !important;
    }
    <?php endif;?>

    <?php //milf
    if('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#popup_content > div:nth-child(1) > * {
        color: #FFFFFF !important;
    }
    div#popup_content > div:nth-child(2) > * {
        color: #CCCCCC !important;
        opacity: 1 !important;
    }
    #popupModal div.modal-footer a.btn,
    #popupModal div.modal-footer a.btn > * {
        color: #100025!important;
    }
    <?php endif;?>

    <?php //gay
    if('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#popup_content > div:nth-child(1) > * {
        color: #FFFFFF !important;
    }
    div#popup_content > div:nth-child(2) > * {
        color: #CCCCCC !important;
        opacity: 1 !important;
    }
    #popupModal div.modal-footer a.btn,
    #popupModal div.modal-footer a.btn > * {
        color: #031748!important;
    }
    <?php endif;?>

    <?php //hentai
    if('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#popup_content > div:nth-child(1) > * {
        color: #FFFFFF !important;
    }
    div#popup_content > div:nth-child(2) > * {
        color: #E4C1D2 !important;
        opacity: 1 !important;
    }
    #popupModal div.modal-footer a.btn,
    #popupModal div.modal-footer a.btn > * {
        color: #520027!important;
    }
    <?php endif;?>

    <?php //teen
    if('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#popup_content > div:nth-child(1) > * {
        color: #FFFFFF !important;
    }
    div#popup_content > div:nth-child(2) > * {
        color: #CCCCCC !important;
        opacity: 1 !important;
    }
    #popupModal div.modal-footer a.btn,
    #popupModal div.modal-footer a.btn > * {
        color: #FFFFFF!important;
    }
    <?php endif;?>

    <?php //trans
    if('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#popup_content > div:nth-child(1) > * {
        color: #FFFFFF !important;
    }
    div#popup_content > div:nth-child(2) > * {
        color: #CCB2B2 !important;
        opacity: 1 !important;
    }
    #popupModal div.modal-footer a.btn,
    #popupModal div.modal-footer a.btn > * {
        color: #FFFFFF!important;
    }
    <?php endif;?>

    <?php //lesbian
    if('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    div#popup_content > div:nth-child(1) > * {
        color: #FFFFFF !important;
    }
    div#popup_content > div:nth-child(2) > * {
        color: #CCCCCC !important;
        opacity: 1 !important;
    }
    #popupModal div.modal-footer a.btn,
    #popupModal div.modal-footer a.btn > * {
        color: #003538!important;
    }
    <?php endif;?>

    <?php endif;?>

</style>
