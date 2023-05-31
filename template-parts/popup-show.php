<?php
if(get_theme_mod('popup_side_anim') !== false) {
	if(get_theme_mod('popup_side_anim') == 'right') $anim = 'slideRight';
	if(get_theme_mod('popup_side_anim') == 'left') $anim = 'slideLeft';
	if(get_theme_mod('popup_side_anim') == 'top') $anim = 'slideTop';
	if(get_theme_mod('popup_side_anim') == 'bottom') $anim = 'slideBottom';
} else {
	$anim = 'slideBottom';
}
if (get_theme_mod( 'popup_hide' ) !== false) {
    if(get_theme_mod( 'popup_hide' ) == 'custom') {
        if(get_theme_mod('custom_popup_hide') !== false && get_theme_mod('custom_popup_hide') != '') {
	        $hide = get_theme_mod('custom_popup_hide');
        } else $hide = '3';
    } else {
	    $hide = get_theme_mod('popup_hide');
    }
}
?>
<style>
    div#popupModal button.close {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
    }
    div#popupModal button.close svg line {
        stroke: <?=get_theme_mod('close_popup_btn_color')?>
    }
    <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
    #popupModal div.modal-footer a.btn.pulse{
        border: 1px solid <?=get_theme_mod('btn_color_setting')?> !important;
    }
    <?php endif;?>
</style>
<div style="overflow: auto;" class="modal" id="popupModal" tabindex="-1" role="dialog" data-action="<?php if(get_theme_mod('popup_time_anim') !== false) { echo get_theme_mod('popup_time_anim'); } else echo '15sec';?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content" data-anim="<?php echo $anim;?>">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 20px; font-weight: bold; z-index: 99; position: absolute; top:0; right:0;" data-time="<?php echo $hide;?>">
                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                        <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                    </svg>
                </button>
            </div>
	        <?php if(!get_theme_mod('popup_mime')) $pt = '30px'; else $pt = 0;?>
            <div class="modal-body" style="padding-top: <?=$pt?>!important;">
                <?php if(get_theme_mod('popup_mime')):?>
                <img src="<?php echo get_theme_mod('popup_mime'); ?>" />
                <?php endif;?>
	            <?php
	            if(get_theme_mod('popup_content_type') == 'with_text') {?>
                    <div id="popup_content">
                        <div>
			            <?php
			            if(get_theme_mod('popup_header') !== false) {
				            echo get_theme_mod('popup_header');
			            } else {
				            echo '<h1>The best porno videos for you!</h1>';
			            }?>
                        </div>
                        <div>
			            <?php if(get_theme_mod('popup_description') !== '') {
				            echo get_theme_mod('popup_description');
			            } else {
				            echo '<p>Do you want to watch right now?</p>';
			            }?>
                        </div>
                    </div>
	            <?php }?>
            </div>
            <div class="modal-footer">
                <a target="_self" href="<?=get_theme_mod('popup_link_btn') ? get_theme_mod('popup_link_btn') : site_url(); ?>" class="btn<?php if(get_theme_mod('popup_pulse_btn') == 'on') { echo ' pulse'; } else echo '';?>">
	                <?php if(get_theme_mod('popup_btn_text') !== false) {
		                echo get_theme_mod('popup_btn_text');
	                } else echo 'WATCH NOW!';?>
                </a>
            </div>
        </div>
    </div>
</div>
