<?php
$close_color = (get_theme_mod('cookie_btn_close_color')) ? get_theme_mod('cookie_btn_close_color') : '#8E939C';
$back_color = (get_theme_mod('cookie_block_color')) ? get_theme_mod('cookie_block_color') : '#1E2739';
$btn_color = (get_theme_mod('cookie_btn_color')) ? get_theme_mod('cookie_btn_color'): '#FF00D6';
$btn_color_on_hover = (get_theme_mod('cookie_btn_color_on_hover')) ? get_theme_mod('cookie_btn_color_on_hover'): '#FF00D6';
$text_color_agree = (get_theme_mod('cookie_btn_text_color')) ? get_theme_mod('cookie_btn_text_color'): '#ffffff';
$link_color = (get_theme_mod('policy_link_color')) ? get_theme_mod('policy_link_color'): '#FF00D6';
$link_on_hover = (get_theme_mod('policy_link_color_on_hover')) ? get_theme_mod('policy_link_color_on_hover'): '#FF00D6';
?>
<style>
div#cookie-notice {
    background-color: <?php echo $back_color;?> !important;
    box-shadow: 0px -2px 10px rgba(0, 0, 0, 0.25);
    padding: 20px 40px;
    font-family: 'Roboto',sans-serif !important;
}
div#cookie-notice-container {
    flex-wrap: wrap;
}
#cookie-notice > div > p:not(.cn-buttons-container) {
    font-family: 'Roboto',sans-serif !important;
    font-style: normal!important;
    font-weight: normal!important;
    font-size: 18px!important;
    line-height: 21px!important;
}
div#cookie-notice-container > *,
div#cookie-notice-container > p{
    font-family: 'Roboto',sans-serif !important;
    font-style: normal!important;
    font-weight: normal!important;
    font-size: 18px!important;
    line-height: 21px!important;
}
a#cn-accept-cookie {
    border: 1px solid <?php echo $btn_color;?> !important;
    color: <?php echo $text_color_agree;?> !important;
    background-color: <?=get_theme_mod('cookie_btn_color')?>;
    border-radius: 4px;
    padding: 10px 50px;
    font-family: 'Roboto',sans-serif;
    font-style: normal;
    font-weight: 900;
    font-size: 14px;
    line-height: 16px;
    margin-top: -7px;
}
a#cn-accept-cookie:hover {
    background-color: <?php echo $btn_color_on_hover;?> !important;
    border: 1px solid <?php echo $btn_color_on_hover;?> !important;
}
a#cn-more-info {
    margin-left: 10px;
    margin-right: 10px;
    color: <?php echo $link_color;?> !important;
}
a#cn-more-info:hover{
    color: <?php echo $link_on_hover;?> !important;
}
p#cn-notice-buttons {
    margin-left: 10px;
    font-family: 'Roboto',sans-serif!important;
    font-style: normal!important;
    font-weight: normal!important;
    font-size: 18px;
    line-height: 21px!important;
}
div#cookie-notice span.closeCookie {
    top: calc(50% - 10px);
    left: 40px;
}
div#cookie-notice span.closeCookie svg line{
    stroke: <?php echo $close_color;?> !important;
}
</style>
<?php if(get_theme_mod('enable_demos_color_scheme') == 'demos'):?>

	<?php //fetish
	if('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
        <style>
            #cookie-notice > div > p:not(.cn-buttons-container){
                color: #FFFFFF!important;
            }
            a#cn-accept-cookie{
                color:#FFFFFF!important;
            }
        </style>
	<?php endif;?>

	<?php //pornx default
	if('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
        <style>
            #cookie-notice > div > p:not(.cn-buttons-container),
            a#cn-accept-cookie{
                color: #ffffff !important;
            }
        </style>
	<?php endif;?>

	<?php //light
	if('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche')):?>
        <style>
            #cookie-notice > div > p:not(.cn-buttons-container){
                color: #111111!important;
            }
            a#cn-accept-cookie{
                color: #FFFFFF!important;
            }
        </style>
	<?php endif;?>

	<?php //milf
	if('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
        <style>
            #cookie-notice > div > p:not(.cn-buttons-container){
                color: #FFFFFF!important;
            }
            a#cn-accept-cookie{
                color: #100025!important;
            }
        </style>
	<?php endif;?>

	<?php //gay
	if('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
        <style>
            #cookie-notice > div > p:not(.cn-buttons-container){
                color: #FFFFFF!important;
            }
            a#cn-accept-cookie{
                color: #031748!important;
            }
        </style>
	<?php endif;?>

	<?php //hentai
	if('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
        <style>
            #cookie-notice > div > p:not(.cn-buttons-container){
                color: #FFFFFF!important;
            }
            a#cn-accept-cookie{
                color: #520027!important;
            }
        </style>
	<?php endif;?>

	<?php //teen
	if('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
        <style>
            #cookie-notice > div > p:not(.cn-buttons-container){
                color: #FFFFFF!important;
            }
            a#cn-accept-cookie{
                color: #FFFFFF!important;
            }
        </style>
	<?php endif;?>

	<?php //trans
	if('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
        <style>
            #cookie-notice > div > p:not(.cn-buttons-container){
                color: #FFFFFF!important;
            }
            a#cn-accept-cookie{
                color: #FFFFFF!important;
            }
        </style>
	<?php endif;?>

	<?php //lesbian
	if('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
        <style>
            #cookie-notice > div > p:not(.cn-buttons-container){
                color: #FFFFFF!important;
            }
            a#cn-accept-cookie{
                color: #003538!important;
            }
        </style>
	<?php endif;?>

<?php endif;?>