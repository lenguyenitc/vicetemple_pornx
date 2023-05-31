<?php
/**
 * Auto-generated CSS style from theme options.
 * @package THEME\CSS
 */
$videos_per_row_option = is_page_template( 'template-categories.php' ) ? xbox_get_field_value( 'my-theme-options', 'number-categ-per-row' ) : xbox_get_field_value( 'my-theme-options', 'number_videos_per_row' );
switch ( $videos_per_row_option ) {
	case '2':
		$videos_per_row = '50';
		break;
	case '3':
		$videos_per_row = '33.33';
		break;
	case '4':
		$videos_per_row = '25';
		break;
	case '5':
		$videos_per_row = '20';
		break;
	default:
		$videos_per_row = '25';
}
$actors_per_row_option = is_page_template( 'template-pornstars.php' ) ? xbox_get_field_value( 'my-theme-options', 'number-actor-per-row' ) : '4';
switch ( $actors_per_row_option ) {
	case '2':
		$actors_per_row = '50';
		break;
	case '3':
		$actors_per_row = '33.33';
		break;
	case '4':
		$actors_per_row = '25';
		break;
	case '5':
		$actors_per_row = '20';
		break;
	default:
		$actors_per_row = '25';
}
$albums_per_row_option = (is_singular('photos') || is_page_template('template-photos.php') || is_post_type_archive('photos') || is_archive()) ? xbox_get_field_value( 'my-theme-options', 'number_albums_per_row' ) : '4';
switch ($albums_per_row_option) {
	case '2':
		$album_per_row = '50';
		break;
	case '3':
		$album_per_row = '33.33';
		break;
	case '4':
		$album_per_row = '25';
		break;
	case '5':
		$album_per_row = '20';
		break;
	default:
		$album_per_row = '20';
}
?>
<style>
    article span.premium-video {
        background: transparent !important;
        width: 95px !important;
        height: 22px !important;
    }

    article span.premium-video img.svg-crown {
        width: 95px !important;
        border-radius: 4px;
    }

    .row {
        max-width: 100em;
        margin: 0 auto;
    }
    <?php
if(get_theme_mod('enable_demos_color_scheme') === 'demos') {
		    if ('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
                $primaryBack = '#004347';
                $secondaryBack = '#003538';
                $boxedLayout = '#003033';
                $menuColor = '#ffffff';
                $primaryColor = '#005055';
                $secondaryColor = '#003c42';
                $primaryBtnColor = '#35ff56';
                $secondaryBtnColor = '#2edb56';
                $iconColor = '#35ff56';
                $inputColor = '#003538';
                $activeLinkColor = '#ffffff';
                $passiveLinkColor = '#cccccc';
                $primaryTextColor = '#ffffff';
                $secondaryTextColor = '#cccccc';

                /***cookie**/
                set_theme_mod('cookie_block_color', '#003538');
                set_theme_mod('cookie_btn_color', '#35FF56');
                set_theme_mod('cookie_btn_color_on_hover', '#2EDB56');
                set_theme_mod('policy_link_color', '#FFFFFF');
                set_theme_mod('policy_link_color_on_hover', '#35FF56');
                set_theme_mod('cookie_btn_close_color', '#8E939C');

                 /**auth**/
                set_theme_mod('login_popup_back_color', '#004347');
                set_theme_mod('login_popup_border_color', '#004347');
                set_theme_mod('login_popup_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_color', '#35FF56');
                set_theme_mod('login_popup_button_hover_color', '#2EDB56');
                set_theme_mod('border_button_login_popup', 'no');
                set_theme_mod('login_popup_button_text_color', '#003538');
                set_theme_mod('login_popup_button_text_color_on_hover', '#003538');
                set_theme_mod('login_popup_links_color', '#CCCCCC');
                set_theme_mod('login_popup_links_hover_color', '#FFFFFF');

                 /**login register page**/
                 set_theme_mod('back_color', '#003538');
                set_theme_mod('form_back_color', '#005055');
                set_theme_mod('form_border_color', '#005055');
                set_theme_mod('form_text_color', '#FFFFFF');
                set_theme_mod('form_button_color', '#35FF56');
                set_theme_mod('form_button_border_color', '#35FF56');
                set_theme_mod('form_button_hover_color', '#2EDB56');
                set_theme_mod('tos_link_color_on_hover', '#FFFFFF');
                set_theme_mod('border_around_auth_form', 'yes');
                set_theme_mod('form_button_text_color', '#003538');
                set_theme_mod('links_color', '#CCCCCC');
                set_theme_mod('tos_link_color', '#CCCCCC');
                set_theme_mod('links_hover_color', '#FFFFFF');

                /**18**/
                set_theme_mod('disc_back_color', '#003033');
                set_theme_mod('disc_form_back_color', '#004347');
                set_theme_mod('disc_form_yes_btn_color', '#35FF56');
                set_theme_mod('disc_form_yes_btn_color_on_hover', '#2EDB56');
                set_theme_mod('disc_form_no_btn_color', '#FFFFFF');
                set_theme_mod('disc_nope_form_btn_color', '#35FF56');
                set_theme_mod('disc_nope_form_btn_color_on_hover', '#2EDB56');

                /**premium popup**/
                set_theme_mod('subscribe_back_color', '#004347');
                set_theme_mod('subscribe_close_color', '#8E939C');
                set_theme_mod('subscribe_login_color', '#FFFFFF');
                set_theme_mod('subscribe_login_color_on_hover', '#35FF56');
                set_theme_mod('reg_btn_color_on_hover', '#2EDB56');
                set_theme_mod('premium_text_label_color', '#35FF56');

                 /**redirect popup**/
                set_theme_mod('popup_background', '#004347');
                set_theme_mod('popup_color_btn', '#35FF56');
                set_theme_mod('popup_hover_color_btn', '#2EDB56');
                set_theme_mod('close_popup_btn_color', '#8E939C');
            }
            //teens
            if ('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
                $primaryBack = '#002e4d';
                $secondaryBack = '#001e32';
                $boxedLayout = '#001d33';
                $menuColor = '#ffffff';
                $primaryColor = '#003f69';
                $secondaryColor = '#00375b';
                $primaryBtnColor = '#ff2552';
                $secondaryBtnColor = '#e02154';
                $iconColor = '#ff2552';
                $inputColor = '#001e32';
                $activeLinkColor = '#ffffff';
                $passiveLinkColor = '#cccccc';
                $primaryTextColor = '#ffffff';
                $secondaryTextColor = '#cccccc';

                /***cookie**/
                set_theme_mod('cookie_block_color', '#001E32');
                set_theme_mod('cookie_btn_color', '#FF2552');
                set_theme_mod('cookie_btn_color_on_hover', '#E02154');
                set_theme_mod('policy_link_color', '#FFFFFF');
                set_theme_mod('policy_link_color_on_hover', '#FF2552');
                set_theme_mod('cookie_btn_close_color', '#5B5B5B');

                 /**auth**/
                set_theme_mod('login_popup_back_color', '#002E4D');
                set_theme_mod('login_popup_border_color', '#002E4D');
                set_theme_mod('login_popup_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_color', '#FF2552');
                set_theme_mod('login_popup_button_hover_color', '#E02154');
                set_theme_mod('border_button_login_popup', 'no');
                set_theme_mod('login_popup_button_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_text_color_on_hover', '#FFFFFF');
                set_theme_mod('login_popup_links_color', '#CCCCCC');
                set_theme_mod('login_popup_links_hover_color', '#FFFFFF');

                 /**login register page**/
                 set_theme_mod('back_color', '#001e32');
                set_theme_mod('form_back_color', '#003f69');
                set_theme_mod('form_border_color', '#003f69');
                set_theme_mod('form_text_color', '#FFFFFF');
                set_theme_mod('form_button_color', '#FF2552');
                set_theme_mod('form_button_border_color', '#FF2552');
                set_theme_mod('form_button_hover_color', '#E02154');
                set_theme_mod('tos_link_color_on_hover', '#E02154');
                set_theme_mod('border_around_auth_form', 'yes');
                set_theme_mod('form_button_text_color', '#FFFFFF');
                set_theme_mod('links_color', '#CCCCCC');
                set_theme_mod('tos_link_color', '#CCCCCC');
                set_theme_mod('links_hover_color', '#FFFFFF');

                 /**18**/
                set_theme_mod('disc_back_color', '#001D33');
                set_theme_mod('disc_form_back_color', '#002E4D');
                set_theme_mod('disc_form_yes_btn_color', '#FF2552');
                set_theme_mod('disc_form_yes_btn_color_on_hover', '#E02154');
                set_theme_mod('disc_form_no_btn_color', '#FFFFFF');
                set_theme_mod('disc_nope_form_btn_color', '#FF2552');
                set_theme_mod('disc_nope_form_btn_color_on_hover', '#E02154');

                /**premium popup**/
                set_theme_mod('subscribe_back_color', '#002E4D');
                set_theme_mod('subscribe_close_color', '#5B5B5B');
                set_theme_mod('subscribe_login_color', '#FFFFFF');
                set_theme_mod('subscribe_login_color_on_hover', '#FF2552');
                set_theme_mod('reg_btn_color_on_hover', '#E02154');
                set_theme_mod('premium_text_label_color', '#FF2552');

                /**redirect popup**/
                set_theme_mod('popup_background', '#002E4D');
                set_theme_mod('popup_color_btn', '#FF2552');
                set_theme_mod('popup_hover_color_btn', '#E02154');
                set_theme_mod('close_popup_btn_color', '#5B5B5B');
            }

            if ('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
                $primaryBack = '#1b0439';
                $secondaryBack = '#100025';
                $boxedLayout = '#0e001e';
                $menuColor = '#ffffff';
                $primaryColor = '#2e0c59';
                $secondaryColor = '#18013a';
                $primaryBtnColor = '#18ffc8';
                $secondaryBtnColor = '#13dbc0';
                $iconColor = '#18ffc8';
                $inputColor = '#100025';
                $activeLinkColor = '#ffffff';
                $passiveLinkColor = '#cccccc';
                $primaryTextColor = '#ffffff';
                $secondaryTextColor = '#cccccc';

                /****cookie**/
                set_theme_mod('cookie_block_color', '#100025');
                set_theme_mod('cookie_btn_color', '#18FFC8');
                set_theme_mod('cookie_btn_color_on_hover', '#13DBC0');
                set_theme_mod('policy_link_color', '#FFFFFF');
                set_theme_mod('policy_link_color_on_hover', '#18FFC8');
                set_theme_mod('cookie_btn_close_color', '#3F3F3F');

                 /**auth**/
                set_theme_mod('login_popup_back_color', '#1B0439');
                set_theme_mod('login_popup_border_color', '#1B0439');
                set_theme_mod('login_popup_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_color', '#18FFC8');
                set_theme_mod('login_popup_button_hover_color', '#13DBC0');
                set_theme_mod('border_button_login_popup', 'no');
                set_theme_mod('login_popup_button_text_color', '#100025');
                set_theme_mod('login_popup_button_text_color_on_hover', '#100025');
                set_theme_mod('login_popup_links_color', '#CCCCCC');
                set_theme_mod('login_popup_links_hover_color', '#FFFFFF');

                /**login register page**/
                set_theme_mod('back_color', '#100025');
                set_theme_mod('form_back_color', '#2e0c59');
                set_theme_mod('form_border_color', '#2e0c59');
                set_theme_mod('form_text_color', '#FFFFFF');
                set_theme_mod('form_button_color', '#18FFC8');
                set_theme_mod('form_button_border_color', '#18FFC8');
                set_theme_mod('form_button_hover_color', '#13DBC0');
                set_theme_mod('tos_link_color_on_hover', '#100025');
                set_theme_mod('border_around_auth_form', 'yes');
                set_theme_mod('form_button_text_color', '#100025');
                set_theme_mod('links_color', '#CCCCCC');
                set_theme_mod('tos_link_color', '#CCCCCC');
                set_theme_mod('links_hover_color', '#FFFFFF');

                /**18**/
                set_theme_mod('disc_back_color', '#0E001E');
                set_theme_mod('disc_form_back_color', '#1B0439');
                set_theme_mod('disc_form_yes_btn_color', '#18FFC8');
                set_theme_mod('disc_form_yes_btn_color_on_hover', '#13DBC0');
                set_theme_mod('disc_form_no_btn_color', '#FFFFFF');
                set_theme_mod('disc_nope_form_btn_color', '#18FFC8');
                set_theme_mod('disc_nope_form_btn_color_on_hover', '#13DBC0');


                 /**premium popup**/
                set_theme_mod('subscribe_back_color', '#1B0439');
                set_theme_mod('subscribe_close_color', '#3F3F3F');
                set_theme_mod('subscribe_login_color', '#FFFFFF');
                set_theme_mod('subscribe_login_color_on_hover', '#18FFC8');
                set_theme_mod('reg_btn_color_on_hover', '#13DBC0');
                set_theme_mod('premium_text_label_color', '#1B0439');

                /**redirect popup**/
                set_theme_mod('popup_background', '#1B0439');
                set_theme_mod('popup_color_btn', '#18FFC8');
                set_theme_mod('popup_hover_color_btn', '#13DBC0');
                set_theme_mod('close_popup_btn_color', '#3A3A3A');
            }

            if ('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
                $primaryBack = '#640030';
                $secondaryBack = '#520027';
                $boxedLayout = '#330016';
                $menuColor = '#ffffff';
                $primaryColor = '#8a0042';
                $secondaryColor = '#660038';
                $primaryBtnColor = '#ffc700';
                $secondaryBtnColor = '#d1a300';
                $iconColor = '#ffc700';
                $inputColor = '#520027';
                $activeLinkColor = '#ffffff';
                $passiveLinkColor = '#e4c1d2';
                $primaryTextColor = '#ffffff';
                $secondaryTextColor = '#e4c1d2';

                /**cookie**/
                set_theme_mod('cookie_block_color', '#520027');
                set_theme_mod('cookie_btn_color', '#FFC700');
                set_theme_mod('cookie_btn_color_on_hover', '#D1A300');
                set_theme_mod('policy_link_color', '#FFFFFF');
                set_theme_mod('policy_link_color_on_hover', '#FFC700');
                set_theme_mod('cookie_btn_close_color', '#515151');

                 /**auth**/
                set_theme_mod('login_popup_back_color', '#640030');
                set_theme_mod('login_popup_border_color', '#640030');
                set_theme_mod('login_popup_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_color', '#FFC700');
                set_theme_mod('login_popup_button_hover_color', '#D1A300');
                set_theme_mod('border_button_login_popup', 'no');
                set_theme_mod('login_popup_button_text_color', '#520027');
                set_theme_mod('login_popup_button_text_color_on_hover', '#520027');
                set_theme_mod('login_popup_links_color', '#E4C1D2');
                set_theme_mod('login_popup_links_hover_color', '#FFFFFF');

                /**login register page**/
                set_theme_mod('back_color', '#520027');
                set_theme_mod('form_back_color', '#8a0042');
                set_theme_mod('form_border_color', '#8a0042');
                set_theme_mod('form_text_color', '#FFFFFF');
                set_theme_mod('form_button_color', '#FFC700');
                set_theme_mod('form_button_border_color', '#FFC700');
                set_theme_mod('form_button_hover_color', '#D1A300');
                set_theme_mod('tos_link_color_on_hover', '#FFFFFF');
                set_theme_mod('border_around_auth_form', 'yes');
                set_theme_mod('form_button_text_color', '#520027');
                set_theme_mod('links_color', '#E4C1D2');
                set_theme_mod('tos_link_color', '#E4C1D2');
                set_theme_mod('links_hover_color', '#FFFFFF');

                /**18**/
                set_theme_mod('disc_back_color', '#330016');
                set_theme_mod('disc_form_back_color', '#640030');
                set_theme_mod('disc_form_yes_btn_color', '#FFC700');
                set_theme_mod('disc_form_yes_btn_color_on_hover', '#D1A300');
                set_theme_mod('disc_form_no_btn_color', '#FFFFFF');
                set_theme_mod('disc_nope_form_btn_color', '#FFC700');
                set_theme_mod('disc_nope_form_btn_color_on_hover', '#D1A300');

                 /**premium popup**/
                set_theme_mod('subscribe_back_color', '#640030');
                set_theme_mod('subscribe_close_color', '#515151');
                set_theme_mod('subscribe_login_color', '#FFFFFF');
                set_theme_mod('subscribe_login_color_on_hover', '#FFC700');
                set_theme_mod('reg_btn_color_on_hover', '#D1A300');
                set_theme_mod('premium_text_label_color', '#FFC700');

                /**redirect popup**/
                set_theme_mod('popup_background', '#640030');
                set_theme_mod('popup_color_btn', '#FFC700');
                set_theme_mod('popup_hover_color_btn', '#D1A300');
                set_theme_mod('close_popup_btn_color', '#515151');
            }
            //gay
            if ('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
                $primaryBack = '#0e245b';
                $secondaryBack = '#031748';
                $boxedLayout = '#051238';
                $menuColor = '#ffffff';
                $primaryColor = '#1d3075';
                $secondaryColor = '#0c1c60';
                $primaryBtnColor = '#18f1ff';
                $secondaryBtnColor = '#14d7e5';
                $iconColor = '#18f1ff';
                $inputColor = '#031748';
                $activeLinkColor = '#ffffff';
                $passiveLinkColor = '#cccccc';
                $primaryTextColor = '#ffffff';
                $secondaryTextColor = '#cccccc';

                /**cookie**/
                set_theme_mod('cookie_block_color', '#031748');
                set_theme_mod('cookie_btn_color', '#18F1FF');
                set_theme_mod('cookie_btn_color_on_hover', '#14D7E5');
                set_theme_mod('policy_link_color', '#FFFFFF');
                set_theme_mod('policy_link_color_on_hover', '#18F1FF');
                set_theme_mod('cookie_btn_close_color', '#5E5E5E');

                 /**auth**/
                set_theme_mod('login_popup_back_color', '#0E245B');
                set_theme_mod('login_popup_border_color', '#0E245B');
                set_theme_mod('login_popup_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_color', '#18F1FF');
                set_theme_mod('login_popup_button_hover_color', '#14D7E5');
                set_theme_mod('border_button_login_popup', 'no');
                set_theme_mod('login_popup_button_text_color', '#031748');
                set_theme_mod('login_popup_button_text_color_on_hover', '#031748');
                set_theme_mod('login_popup_links_color', '#CCCCCC');
                set_theme_mod('login_popup_links_hover_color', '#FFFFFF');

                /**login register page**/
                set_theme_mod('back_color', '#031748');
                set_theme_mod('form_back_color', '#1d3075');
                set_theme_mod('form_border_color', '#1d3075');
                set_theme_mod('form_text_color', '#FFFFFF');
                set_theme_mod('form_button_color', '#18F1FF');
                set_theme_mod('form_button_border_color', '#18F1FF');
                set_theme_mod('form_button_hover_color', '#14D7E5');
                set_theme_mod('tos_link_color_on_hover', '#FFFFFF');
                set_theme_mod('border_around_auth_form', 'yes');
                set_theme_mod('form_button_text_color', '#031748');
                set_theme_mod('links_color', '#CCCCCC');
                set_theme_mod('tos_link_color', '#CCCCCC');
                set_theme_mod('links_hover_color', '#FFFFFF');

                /**18**/
                set_theme_mod('disc_back_color', '#051238');
                set_theme_mod('disc_form_back_color', '#0E245B');
                set_theme_mod('disc_form_yes_btn_color', '#18F1FF');
                set_theme_mod('disc_form_yes_btn_color_on_hover', '#14D7E5');
                set_theme_mod('disc_form_no_btn_color', '#FFFFFF');
                set_theme_mod('disc_nope_form_btn_color', '#18F1FF');
                set_theme_mod('disc_nope_form_btn_color_on_hover', '#14D7E5');

                  /**premium popup**/
                set_theme_mod('subscribe_back_color', '#0E245B');
                set_theme_mod('subscribe_close_color', '#5E5E5E');
                set_theme_mod('subscribe_login_color', '#FFFFFF');
                set_theme_mod('subscribe_login_color_on_hover', '#18F1FF');
                set_theme_mod('reg_btn_color_on_hover', '#14D7E5');
                set_theme_mod('premium_text_label_color', '#18F1FF');

                /**redirect popup**/
                set_theme_mod('popup_background', '#0E245B');
                set_theme_mod('popup_color_btn', '#18F1FF');
                set_theme_mod('popup_hover_color_btn', '#14D7E5');
                set_theme_mod('close_popup_btn_color', '#5E5E5E');
            }

            //pornx default
            if ('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
                $primaryBack = '#172030';
                $secondaryBack = '#0f1725';
                $boxedLayout = '#181c26';
                $menuColor = '#ffffff';
                $primaryColor = '#1e2739';
                $secondaryColor = '#242f4c';
                $primaryBtnColor = '#c32ce2';
                $secondaryBtnColor = '#aa2cc4';
                $iconColor = '#c32ce2';
                $inputColor = '#0f1725';
                $activeLinkColor = '#ffffff';
                $passiveLinkColor = '#cccccc';
                $primaryTextColor = '#ffffff';
                $secondaryTextColor = '#cccccc';

                /**cookie**/
                set_theme_mod('cookie_block_color', '#0F1725');
                set_theme_mod('cookie_btn_color', '#C32CE2');
                set_theme_mod('cookie_btn_color_on_hover', '#AA2CC4');
                set_theme_mod('policy_link_color', '#FFFFFF');
                set_theme_mod('policy_link_color_on_hover', '#C32CE2');
                set_theme_mod('cookie_btn_close_color', '#5B5B5B');

                /**auth**/
                set_theme_mod('login_popup_back_color', '#172030');
                set_theme_mod('login_popup_border_color', '#172030');
                set_theme_mod('login_popup_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_color', '#C32CE2');
                set_theme_mod('login_popup_button_hover_color', '#AA2CC4');
                set_theme_mod('border_button_login_popup', 'no');
                set_theme_mod('login_popup_button_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_text_color_on_hover', '#FFFFFF');
                set_theme_mod('login_popup_links_color', '#CCCCCC');
                set_theme_mod('login_popup_links_hover_color', '#FFFFFF');

                /**login register page**/
                set_theme_mod('back_color', '#0f1725');
                set_theme_mod('form_back_color', '#1e2739');
                set_theme_mod('form_border_color', '#1e2739');
                set_theme_mod('form_text_color', '#FFFFFF');
                set_theme_mod('form_button_color', '#C32CE2');
                set_theme_mod('form_button_border_color', '#C32CE2');
                set_theme_mod('form_button_hover_color', '#AA2CC4');
                set_theme_mod('tos_link_color_on_hover', '#FFFFFF');
                set_theme_mod('border_around_auth_form', 'yes');
                set_theme_mod('form_button_text_color', '#FFFFFF');
                set_theme_mod('links_color', '#CCCCCC');
                set_theme_mod('tos_link_color', '#CCCCCC');
                set_theme_mod('links_hover_color', '#FFFFFF');

                /**18**/
                set_theme_mod('disc_back_color', '#181C26');
                set_theme_mod('disc_form_back_color', '#172030');
                set_theme_mod('disc_form_yes_btn_color', '#C32CE2');
                set_theme_mod('disc_form_yes_btn_color_on_hover', '#AA2CC4');
                set_theme_mod('disc_form_no_btn_color', '#FFFFFF');
                set_theme_mod('disc_nope_form_btn_color', '#C32CE2');
                set_theme_mod('disc_nope_form_btn_color_on_hover', '#AA2CC4');

                  /**premium popup**/
                set_theme_mod('subscribe_back_color', '#172030');
                set_theme_mod('subscribe_close_color', '#5B5B5B');
                set_theme_mod('subscribe_login_color', '#FFFFFF');
                set_theme_mod('subscribe_login_color_on_hover', '#C32CE2');
                set_theme_mod('reg_btn_color_on_hover', '#AA2CC4');
                set_theme_mod('premium_text_label_color', '#C32CE2');

                /**redirect popup**/
                set_theme_mod('popup_background', '#172030');
                set_theme_mod('popup_color_btn', '#C32CE2');
                set_theme_mod('popup_hover_color_btn', '#AA2CC4');
                set_theme_mod('close_popup_btn_color', '#5B5B5B');
            }

            //trans
            if ('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
                $primaryBack = '#3f0303';
                $secondaryBack = '#330000';
                $boxedLayout = '#260000';
                $menuColor = '#ffffff';
                $primaryColor = '#550000';
                $secondaryColor = '#3d0000';
                $primaryBtnColor = '#0052ce';
                $secondaryBtnColor = '#0045a0';
                $iconColor = '#0052ce';
                $inputColor = '#330000';
                $activeLinkColor = '#ffffff';
                $passiveLinkColor = '#ccb2b2';
                $primaryTextColor = '#ffffff';
                $secondaryTextColor = '#ccb2b2';

                /**cookie**/
                set_theme_mod('cookie_block_color', '#330000');
                set_theme_mod('cookie_btn_color', '#0052CE');
                set_theme_mod('cookie_btn_color_on_hover', '#0045A0');
                set_theme_mod('policy_link_color', '#FFFFFF');
                set_theme_mod('policy_link_color_on_hover', '#0052CE');
                set_theme_mod('cookie_btn_close_color', '#515151');

                 /**auth**/
                set_theme_mod('login_popup_back_color', '#3F0303');
                set_theme_mod('login_popup_border_color', '#3F0303');
                set_theme_mod('login_popup_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_color', '#0052CE');
                set_theme_mod('login_popup_button_hover_color', '#0045A0');
                set_theme_mod('border_button_login_popup', 'no');
                set_theme_mod('login_popup_button_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_text_color_on_hover', '#FFFFFF');
                set_theme_mod('login_popup_links_color', '#CCB2B2');
                set_theme_mod('login_popup_links_hover_color', '#FFFFFF');

                /**login register page**/
                set_theme_mod('back_color', '#330000');
                set_theme_mod('form_back_color', '#550000');
                set_theme_mod('form_border_color', '#550000');
                set_theme_mod('form_text_color', '#FFFFFF');
                set_theme_mod('form_button_color', '#0052CE');
                set_theme_mod('form_button_border_color', '#0052CE');
                set_theme_mod('form_button_hover_color', '#0045A0');
                set_theme_mod('tos_link_color_on_hover', '#FFFFFF');
                set_theme_mod('border_around_auth_form', 'yes');
                set_theme_mod('form_button_text_color', '#FFFFFF');
                set_theme_mod('links_color', '#CCB2B2');
                set_theme_mod('tos_link_color', '#CCB2B2');
                set_theme_mod('links_hover_color', '#FFFFFF');

                /**18**/
                set_theme_mod('disc_back_color', '#260000');
                set_theme_mod('disc_form_back_color', '#3F0303');
                set_theme_mod('disc_form_yes_btn_color', '#0052CE');
                set_theme_mod('disc_form_yes_btn_color_on_hover', '#0045A0');
                set_theme_mod('disc_form_no_btn_color', '#FFFFFF');
                set_theme_mod('disc_nope_form_btn_color', '#0052CE');
                set_theme_mod('disc_nope_form_btn_color_on_hover', '#0045A0');

                  /**premium popup**/
                set_theme_mod('subscribe_back_color', '#3F0303');
                set_theme_mod('subscribe_close_color', '#515151');
                set_theme_mod('subscribe_login_color', '#FFFFFF');
                set_theme_mod('subscribe_login_color_on_hover', '#0052CE');
                set_theme_mod('reg_btn_color_on_hover', '#0045A0');
                set_theme_mod('premium_text_label_color', '#0052CE');

                /**redirect popup**/
                set_theme_mod('popup_background', '#3F0303');
                set_theme_mod('popup_color_btn', '#0052CE');
                set_theme_mod('popup_hover_color_btn', '#0045A0');
                set_theme_mod('close_popup_btn_color', '#515151');
            }

            //fetish
            if ('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
                $primaryBack = '#131313';
                $secondaryBack = '#000000';
                $boxedLayout = '#0a0a0a';
                $menuColor = '#ffffff';
                $primaryColor = '#1d1d1d';
                $secondaryColor = '#444444';
                $primaryBtnColor = '#e83008';
                $secondaryBtnColor = '#c62f05';
                $iconColor = '#e83008';
                $inputColor = '#000000';
                $activeLinkColor = '#ffffff';
                $passiveLinkColor = '#cccccc';
                $primaryTextColor = '#ffffff';
                $secondaryTextColor = '#cccccc';

                /***cookie**/
                set_theme_mod('cookie_block_color', '#000000');
                set_theme_mod('cookie_btn_color', '#E83008');
                set_theme_mod('cookie_btn_color_on_hover', '#C62F05');
                set_theme_mod('policy_link_color', '#FFFFFF');
                set_theme_mod('policy_link_color_on_hover', '#E83008');
                set_theme_mod('cookie_btn_close_color', '#565656');

                 /**auth**/
                set_theme_mod('login_popup_back_color', '#131313');
                set_theme_mod('login_popup_border_color', '#131313');
                set_theme_mod('login_popup_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_color', '#E83008');
                set_theme_mod('login_popup_button_hover_color', '#C62F05');
                set_theme_mod('border_button_login_popup', 'no');
                set_theme_mod('login_popup_button_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_text_color_on_hover', '#FFFFFF');
                set_theme_mod('login_popup_links_color', '#CCCCCC');
                set_theme_mod('login_popup_links_hover_color', '#FFFFFF');

                /**login register page**/
                set_theme_mod('back_color', '#0a0a0a');
                set_theme_mod('form_back_color', '#1d1d1d');
                set_theme_mod('form_border_color', '#1d1d1d');
                set_theme_mod('form_text_color', '#FFFFFF');
                set_theme_mod('form_button_color', '#E83008');
                set_theme_mod('form_button_border_color', '#E83008');
                set_theme_mod('form_button_hover_color', '#C62F05');
                set_theme_mod('tos_link_color_on_hover', '#FFFFFF');
                set_theme_mod('border_around_auth_form', 'yes');
                set_theme_mod('form_button_text_color', '#FFFFFF');
                set_theme_mod('links_color', '#CCCCCC');
                set_theme_mod('tos_link_color', '#CCCCCC');
                set_theme_mod('links_hover_color', '#FFFFFF');

                /**18**/
                set_theme_mod('disc_back_color', '#0A0A0A');
                set_theme_mod('disc_form_back_color', '#131313');
                set_theme_mod('disc_form_yes_btn_color', '#E83008');
                set_theme_mod('disc_form_yes_btn_color_on_hover', '#C62F05');
                set_theme_mod('disc_form_no_btn_color', '#FFFFFF');
                set_theme_mod('disc_nope_form_btn_color', '#E83008');
                set_theme_mod('disc_nope_form_btn_color_on_hover', '#C62F05');

                /**premium popup**/
                set_theme_mod('subscribe_back_color', '#131313');
                set_theme_mod('subscribe_close_color', '#565656');
                set_theme_mod('subscribe_login_color', '#FFFFFF');
                set_theme_mod('subscribe_login_color_on_hover', '#E83008');
                set_theme_mod('reg_btn_color_on_hover', '#C62F05');
                set_theme_mod('premium_text_label_color', '#E83008');

                /**redirect popup**/
                set_theme_mod('popup_background', '#131313');
                set_theme_mod('popup_color_btn', '#E83008');
                set_theme_mod('popup_hover_color_btn', '#C62F05');
                set_theme_mod('close_popup_btn_color', '#565656');
            }

            //porn light
            if ('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
                $primaryBack = '#e5e5e5';
                $secondaryBack = '#d0d0d0';
                $boxedLayout = '#9b9b9b';
                $menuColor = '#383838';
                $primaryColor = '#d8d8d8';
                $secondaryColor = '#b2b2b2';
                $primaryBtnColor = '#8f07ab';
                $secondaryBtnColor = '#c32ce2';
                $iconColor = '#8f07ab';
                $inputColor = '#d0d0d0';
                $activeLinkColor = '#111111';
                $passiveLinkColor = '#6d6d6d';
                $primaryTextColor = '#111111';
                $secondaryTextColor = '#0a0a0a';


                /**cookie**/
                set_theme_mod('cookie_block_color', '#B2B2B2');
                set_theme_mod('cookie_btn_color', '#8F07AB');
                set_theme_mod('cookie_btn_color_on_hover', '#C32CE2');
                set_theme_mod('policy_link_color', '#111111');
                set_theme_mod('policy_link_color_on_hover', '#8F07AB');
                set_theme_mod('cookie_btn_close_color', '#3A3A3A');

                 /**auth**/
                set_theme_mod('login_popup_back_color', '#E5E5E5');
                set_theme_mod('login_popup_border_color', '#E5E5E5');
                set_theme_mod('login_popup_text_color', '#111111');
                set_theme_mod('login_popup_button_color', '#8F07AB');
                set_theme_mod('login_popup_button_hover_color', '#C32CE2');
                set_theme_mod('border_button_login_popup', 'no');
                set_theme_mod('login_popup_button_text_color', '#FFFFFF');
                set_theme_mod('login_popup_button_text_color_on_hover', '#FFFFFF');
                set_theme_mod('login_popup_links_color', '#6E6E6E');
                set_theme_mod('login_popup_links_hover_color', '#111111');

                /**login register page**/
                set_theme_mod('back_color', '#d0d0d0');
                set_theme_mod('form_back_color', '#d8d8d8');
                set_theme_mod('form_border_color', '#d8d8d8');
                set_theme_mod('form_text_color', '#111111');
                set_theme_mod('form_button_color', '#8F07AB');
                set_theme_mod('form_button_border_color', '#8F07AB');
                set_theme_mod('form_button_hover_color', '#C32CE2');
                set_theme_mod('tos_link_color_on_hover', '#111111');
                set_theme_mod('border_around_auth_form', 'yes');
                set_theme_mod('form_button_text_color', '#FFFFFF');
                set_theme_mod('links_color', '#6E6E6E');
                set_theme_mod('tos_link_color', '#6E6E6E');
                set_theme_mod('links_hover_color', '#111111');

                /**18**/
                set_theme_mod('disc_back_color', '#9B9B9B');
                set_theme_mod('disc_form_back_color', '#E5E5E5');
                set_theme_mod('disc_form_yes_btn_color', '#8F07AB');
                set_theme_mod('disc_form_yes_btn_color_on_hover', '#C32CE2');
                set_theme_mod('disc_form_no_btn_color', '#111111');
                set_theme_mod('disc_nope_form_btn_color', '#8F07AB');
                set_theme_mod('disc_nope_form_btn_color_on_hover', '#C32CE2');

                /**premium popup**/
                set_theme_mod('subscribe_back_color', '#E5E5E5');
                set_theme_mod('subscribe_close_color', '#3A3A3A');
                set_theme_mod('subscribe_login_color', '#111111');
                set_theme_mod('subscribe_login_color_on_hover', '#8F07AB');
                set_theme_mod('reg_btn_color_on_hover', '#C32CE2');
                set_theme_mod('premium_text_label_color', '#8F07AB');

                /**redirect popup**/
                set_theme_mod('popup_background', '#E5E5E5');
                set_theme_mod('popup_color_btn', '#8F07AB');
                set_theme_mod('popup_hover_color_btn', '#C32CE2');
                set_theme_mod('close_popup_btn_color', '#3A3A3A');
            }

            /***set main color scheme***/
            set_theme_mod('background_color', $primaryBack);  //Primary background color
            set_theme_mod('secondary_background_color',$secondaryBack); //Secondary background color
            set_theme_mod('boxed_layout_background', $boxedLayout); //Boxed layout background
            set_theme_mod('menu_color',$menuColor); //Menu color
            set_theme_mod('primary_color_setting',$primaryColor); //Primary color
            set_theme_mod('secondary_color_setting',$secondaryColor); //Secondary color
            set_theme_mod('btn_color_setting',$primaryBtnColor); //Primary button color
            set_theme_mod('btn_hover_color_setting',$secondaryBtnColor); //Secondary button color
            set_theme_mod('icons_color_setting',$iconColor); //Icon color
            set_theme_mod('input_color',$inputColor); //Input color
            set_theme_mod('links_color_setting',$activeLinkColor); //Active link color
            set_theme_mod('passive_color_setting',$passiveLinkColor); //Passive link color
            set_theme_mod('text_site_color',$primaryTextColor); //Primary text color
            set_theme_mod('secondary_text_site_color',$secondaryTextColor); //Secondary text color
		}
 ?>
</style>
<?php
if ('boxed' === xbox_get_field_value( 'my-theme-options', 'layout' )):
	if(false !== get_theme_mod('background_color')) {
		?>
        <style>
            #page {
                max-width: 1300px;/*67%*/
                margin: 10px auto;
                background: <?=get_theme_mod('background_color')?>;
                box-shadow: 0 0 10px rgba(<?php
                $hex = get_theme_mod('background_color');
	            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                 ?>, 0.50);
                -moz-box-shadow: 0 0 10px rgba(<?php
                $hex = get_theme_mod('background_color');
	            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                 ?>, 0.50);
                -webkit-box-shadow: 0 0 10px rgba(<?php
                $hex = get_theme_mod('background_color');
	            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                 ?>, 0.50);
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
                border-radius: 10px;
            }
            @media (max-width: 1920px) {
                #page {
                    max-width: 1300px !important;
                }
            }
            @media (min-width: 1921px){
                #page {
                    max-width: 1700px !important;
                }
            }
            <?php
	    $blog_info = false;
		$background_image       = get_theme_mod('background_image');
		if($background_image == false) {
		    $background_niche_image = get_theme_mod('boxed_layout_background');
		} else {
		    $background_niche_image = get_theme_mod('boxed_layout_background');
		}
	?>
            <?php if ( ! empty( $background_image ) ) : ?>
            body.custom-background {
                background-image: url(<?php echo esc_html( $background_image ); ?>);
                background-color: <?=get_theme_mod('boxed_layout_background')?> !important;
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                color: <?php if(get_theme_mod('text_site_color') !== false) echo get_theme_mod('text_site_color'); else echo '#ffffff';?>!important;
            }
            <?php elseif ( ! empty( $background_niche_image ) ) : ?>
            body.custom-background {
                background-color: <?php echo esc_html( $background_niche_image ); ?> !important;
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                color: <?php if(get_theme_mod('text_site_color') !== false) echo get_theme_mod('text_site_color'); else echo '#ffffff';?>!important;
            }
            <?php endif; ?>
        </style>
		<?php
	} else {
		if(get_theme_mod('enable_demos_color_scheme') === 'demos') {
			if ('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$primaryBack = '#004347';
			}
			//teens
			if ('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$primaryBack = '#002e4d';
			}
			if ('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$primaryBack = '#1b0439';
			}
			if ('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$primaryBack = '#640030';
			}
			//gay
			if ('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$primaryBack = '#0e245b';
			}
			//pornx default
			if ('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$primaryBack = '#172030';
			}
			//trans
			if ('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$primaryBack = '#3f0303';
			}
			//fetish
			if ('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$primaryBack = '#131313';
			}
			//porn light
			if ('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$primaryBack = '#e5e5e5';
			}
			set_theme_mod('background_color', $primaryBack);  //Primary background color
		}
		?>
        <style>
            #page {
                max-width: 1300px;
                margin: 10px auto;
                background: <?=get_theme_mod('background_color')?>;
                box-shadow: 0 0 10px rgba(<?php
                $hex = get_theme_mod('background_color');
	            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                 ?>, 0.50);
                -moz-box-shadow: 0 0 10px rgba(<?php
                $hex = get_theme_mod('background_color');
	            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                 ?>, 0.50);
                -webkit-box-shadow: 0 0 10px rgba(<?php
                $hex = get_theme_mod('background_color');
	            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                 ?>, 0.50);
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
                border-radius: 10px;
            }
            <?php
	    $blog_info = false;
		$background_image       = get_theme_mod('background_image');
		if($background_image == false) {
		    $background_niche_image = get_theme_mod('boxed_layout_background');
		} else {
		    $background_niche_image = get_theme_mod('boxed_layout_background');
		}
	?>
            <?php if ( ! empty( $background_image ) ) : ?>
            body.custom-background {
                background-image: url(<?php echo esc_html( $background_image ); ?>);
                background-color: <?=get_theme_mod('boxed_layout_background')?> !important;
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                color: <?php if(get_theme_mod('text_site_color') !== false) echo get_theme_mod('text_site_color'); else echo '#ffffff';?>!important;
            }
            <?php elseif ( ! empty( $background_niche_image ) ) : ?>
            body.custom-background {
                background-color: <?php echo esc_html( $background_niche_image ); ?>;
                background-position: center center;
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                color: <?php if(get_theme_mod('text_site_color') !== false) echo get_theme_mod('text_site_color'); else echo '#ffffff';?>!important;
            }
            <?php endif; ?>

        </style>
		<?php
	}
	?>
<?php endif; ?>

<?php
if('full-width' === xbox_get_field_value( 'my-theme-options', 'layout' )):?>
<style>
    body.custom-background {
        background-color: <?=get_theme_mod('background_color');?> !important;
    }
        /**** full-width increase layout***/
    @media (min-width: 1600px) and (max-width: 1799px) {
        .row {
            max-width: 1512px !important;
        }
    }
    @media (min-width: 1800px) and (max-width: 1999px){
        .row {
            max-width: 1728px !important;
        }
    }
    @media (min-width: 2000px) and (max-width: 2199px){
        .row {
            max-width: 1890px !important;
        }
    }
    @media (min-width: 2200px){
        .row{
            max-width: 2070px !important;
        }
    }
</style>
<?php endif;?>
<?php
$primary_color = (get_theme_mod( 'primary_color_setting' ) !== false) ? get_theme_mod( 'primary_color_setting' ) : '#1e2739';
$secondary_color = (get_theme_mod( 'secondary_color_setting' ) !== false) ? get_theme_mod( 'secondary_color_setting' ) : '#1e2739';
?>
<style>
	<?php if (false === has_custom_logo()): $blog_info = true;?>
    .site-branding .logo a {
        color: <?php echo "#".get_theme_mod('header_textcolor');?> !important;
    }
	<?php endif; ?>
	<?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
    button,
    .button,
    input[type="button"],
    input[type="reset"],
    input[type="submit"] {
        background: -moz-linear-gradient(top, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0) 70%); /* FF3.6-15 */
        background: -webkit-linear-gradient(top, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0) 70%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0) 70%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    }
    button,
	.button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.label,
	.label:visited,
	.pagination ul li a,
	.widget_categories ul li a,
	.comment-reply-link,
	a.tag-cloud-link,
	.template-actors li a {
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a62b2b2b', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */
		-moz-box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.12);
		-webkit-box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.12);
		-o-box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.12);
		box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.12);
	}
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="password"],
	input[type="search"],
	input[type="number"],
	input[type="tel"],
	input[type="range"],
	input[type="date"],
	input[type="month"],
	input[type="week"],
	input[type="time"],
	input[type="datetime"],
	input[type="datetime-local"],
	input[type="color"],
	select,
	textarea,
	.wp-editor-container,
    span#search_select-button,
    #popupModal div.modal-footer a.btn{
		-moz-box-shadow: 0 0 1px rgba(255, 255, 255, 0.3), 0 0 5px black inset;
		-webkit-box-shadow: 0 0 1px rgba(255, 255, 255, 0.3), 0 0 5px black inset;
		-o-box-shadow: 0 0 1px rgba(255, 255, 255, 0.3), 0 0 5px black inset;
		box-shadow: 0 0 1px rgba(255, 255, 255, 0.3), 0 0 5px black inset;
	}

	#site-navigation {
		background: <?=get_theme_mod('primary_color_setting')?>;
		-moz-box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.12);
		-webkit-box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.12);
		-o-box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.12);
        /* Drop shadow header */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        border-radius: 0px 0px 4px 4px;
        margin-bottom: 40px;
	}
    div#user_dropdown_menu {
        background: <?=get_theme_mod('background_color')?>;
        -moz-box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.7);
        -webkit-box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.7);
        -o-box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.7);
        box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.7);
    }
    #site-navigation ul {
        z-index: 99992 !important;
    }

	#site-navigation > ul > li:hover > a,
	#site-navigation ul li.current-menu-item a {
		/*-moz-box-shadow: inset 0px 0px 2px 0px #000000;
		-webkit-box-shadow: inset 0px 0px 2px 0px #000000;
		-o-box-shadow: inset 0px 0px 2px 0px #000000;
		box-shadow: inset 0px 0px 2px 0px #000000;
		filter:progid:DXImageTransform.Microsoft.Shadow(color=#000000, Direction=NaN, Strength=2);*/
	}
	<?php else : ?>
    #site-navigation {
        background: <?=$primary_color?>;
        margin-bottom: 40px;
    }

    div#video_thumbnails_below {
		background: <?=get_theme_mod('primary_color_setting')?>;
	}
    div#user_dropdown_menu {
        background: <?=get_theme_mod('primary_color_setting')?>;
    }
	<?php endif; ?>
    .site-branding .logo a {
        position: relative !important;
		font-family: 'Roboto', sans-serif;
		font-size: 30px;
	}
	.site-branding .logo img {
		max-width: 155px;
		max-height: 35px;
		margin-top: 0px;
		margin-left: 0px;
        width: 100%;
	}

	a,
    .top-bar .membership a,
    .more-videos i,
    a.label i::before,
    #createPlaylist i::before,
    a.tag-cloud-link i::before,
	.categories-list .thumb-block:hover .entry-header .cat-title:before,
	.main-navigation .menu-item-has-children > a:after,
	.main-navigation.toggled li.focus > a,
	.main-navigation.toggled li.current_page_item > a,
	.main-navigation.toggled li.current-menu-item > a,
    i.fa-chevron-right,
    i.fa-chevron-left,
    button#send_user_msg i.fa-send,
    a#chat_page i.fa-envelope{
		color: <?php echo get_theme_mod( 'links_color_setting'); ?> !important;
	}
    #back-to-top i::before,
    #send_msg i.fa-send::before,
    div#trending_tags a,
    a#tracking-url i.fa-download {
        color: <?php echo get_theme_mod( 'links_color_setting'); ?>;
    }
    button.about svg g polygon{
        fill: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }
    .welcome i.fa-user::before,
    ul#user_social > li > a > i.fa-facebook,
    ul#user_social > li > a > i.fa-instagram,
    ul#user_social > li > a > i.fa-twitter,
    ul#user_social > li > a > i.fa-reddit,
    ul#user_social > li > a > i.fa-snapchat,
    ul#user_social2 > li > a > i.fa-facebook,
    ul#user_social2 > li > a > i.fa-instagram,
    ul#user_social2 > li > a > i.fa-twitter,
    ul#user_social2 > li > a > i.fa-reddit,
    ul#user_social2 > li > a > i.fa-snapchat,
    div.item i.fa-chevron-down,
    div#video_thumbnails_below p a i.fa-download,
    div#filters div.filters-select i.fa-filter,
    span.says,
    cite.fn a{
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }
    div#trending_tags a {
        padding: 4px;
        margin: 2px;
        border: 1px solid <?php echo get_theme_mod( 'icons_color_setting'); ?>;
        border-radius: 6px;
        color: <?php echo get_theme_mod( 'passive_color_setting'); ?>!important;
    }
    div.uploads span.welcome svg path {
        fill: <?=get_theme_mod( 'links_color_setting');?> !important;
    }
    div#trending_tags a:hover{
        background-color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
        color: <?php echo get_theme_mod( 'links_color_setting'); ?> !important;
    }
    div.tags-list i::before {
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?>;
    }

    .separator i::before {
        color: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
    }
    .main-navigation.toggled li:hover > a,
    .col-1-blog ul li a:hover,
    .col-1-blog ul li a.current_blog_cat,
    .top-bar .membership a i,
    .thumb-block:hover .photos-count i{
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }
    .rating-bar span {
        color: <?php echo get_theme_mod( 'text_site_color'); ?> !important;
    }
    article[id^="content-"]:before {
        background: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }
    .thumb-block i,
    .required,
    .thumb-block:hover .rating-bar i,
    .top-bar .social-share i,
    .morelink i,
    .widget-title i::before,
    .cat-title::before,
    .actor-title::before,
    .author-playlist i::before,
    div.likes i::before{
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }

    #less:hover i,
    #more:hover i {
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }

    #filters .filters-select:after {
        background-color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }

    .site-title a i,
    .menu-toggle i,
    ul.comment_votes_statistic > li.li_revote > span > i.fa-check,
    div.item_user > a:hover,
    div.item_user > a i.fa-arrow-circle-o-right,
    a#public_link,
    div.color2 i.fa-envelope,
    .welcome i.fa-chevron-down,
    .welcome i.fa-chevron-up,
    div#search_filter div.filters-select:after{
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }

	button,
	.button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.label,
	.pagination ul li a:hover,
	body #filters .label.secondary.active,
	.label.secondary:hover,
	.main-navigation li:hover > a,
	.main-navigation li.focus > a,
	.main-navigation li.current_page_item > a,
	.main-navigation li.current-menu-item > a,
	.widget_categories ul li a:hover,
	a.tag-cloud-link:hover,
	.template-actors li a:hover,
    a.bookmark ,
    a.bookmark:hover {
		border-color: <?php echo get_theme_mod( 'btn_color_setting'); ?>!important;
		background-color: <?php echo get_theme_mod( 'btn_color_setting'); ?>!important;
	}

    .main-navigation li.menu-item > a {
        border-bottom: 1px solid <?=get_theme_mod('btn_hover_color_setting')?> !important;
        border-radius: 4px 4px 0px 0px;
    }
    .main-navigation li.current_page_item,
    .main-navigation li.current-menu-item{
        background: <?=get_theme_mod('background_color')?>;
    }


    @media screen and (min-width: 991.99px) {
        #site-navigation {
            border-bottom: 1px solid <?=get_theme_mod('btn_hover_color_setting')?>!important;
            border-radius: 0px 0px 4px 4px;
        }

        nav#site-navigation {
            border-radius: 0 0 4px 4px !important;
            border-left: 1px solid transparent!important;
            border-right: 1px solid transparent!important;
            border-image: linear-gradient(to top, <?=get_theme_mod('btn_hover_color_setting')?>, transparent)!important;
            border-image-slice: 1!important;
        }
        nav#site-navigation:before {
            right: 100%!important;
            bottom: 1px!important;
            background-image: radial-gradient(circle at 0 0, transparent 17px, <?=get_theme_mod('btn_hover_color_setting')?> 19px, <?=get_theme_mod('background_color')?> 20px)!important;
        }
        nav#site-navigation:after {
            left: 100%!important;
            bottom: 1px!important;
            transform: rotate(90deg)!important;
            background-image: radial-gradient(circle at 0 0, transparent 17px, <?=get_theme_mod('btn_hover_color_setting')?> 19px, <?=get_theme_mod('background_color')?> 20px)!important;
        }


        #site-navigation ul li.current-menu-item:before,
        #site-navigation ul li.current-menu-item:after {
            content: '';
            display: block;
            position: absolute;
            width: 14px;
            height: 15px;
        }
        #site-navigation ul li.current-menu-item:before {
            right: 100%;
            bottom: 1px;
            background-image: radial-gradient(circle at 0 0, transparent 17px, <?=get_theme_mod('btn_hover_color_setting')?> 19px, <?=get_theme_mod('background_color')?> 20px);
        }
        #site-navigation ul li.current-menu-item:after {
            left: 100%;
            bottom: 1px;
            transform: rotate(85deg);
            background-image: radial-gradient(circle at 0 0, transparent 18px, <?=get_theme_mod('btn_hover_color_setting')?> 19px, <?=get_theme_mod('background_color')?> 20px);
        }
    }

    div.video-debounce-bar-back {
        background: <?=get_theme_mod('secondary_color_setting')?>;
        border-radius: 4px;
        width:100%;
    }
    div.video-debounce-bar {
        background-color: <?=get_theme_mod('icons_color_setting')?> !important;
        border-radius: 4px;
    }
    button:hover,
    .button:hover,
    input[type="button"]:hover,
    input[type="reset"]:hover,
    input[type="submit"]:hover,
    .pagination ul li a:hover,
    .label.secondary:hover,
    .main-navigation li:hover > a,
    .widget_categories ul li a:hover,
    a.tag-cloud-link:hover,
    .template-actors li a:hover,
    a.bookmark:hover,
    #searchsubmit:hover,
    a.more-videos:hover,
    #back-to-top:hover,
    #btnLoadMore:hover,
    a.button:hover,
    input.submit:hover,
    .label:hover{
        border-color: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?>!important;
        background-color: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?>!important;
    }
    #searchsubmit,
    .comment-reply-link:hover{
        color: <?php echo get_theme_mod( 'links_color_setting'); ?>;
    }

    div#ads_board div.filters-select a:hover {
        background-color: <?php echo get_theme_mod( 'btn_color_setting'); ?>!important;
    }

    div#user_dropdown_menu ul#drop_user li:hover,
    div#upload_dropdown_menu ul#drop_upload li:hover{
        background-color: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
    }
    div#user_dropdown_menu ul#drop_user li:hover,
    div#upload_dropdown_menu ul#drop_upload li:hover {
        color: <?=get_theme_mod( 'links_color_setting');?> !important;
    }
    div#user_dropdown_menu ul#drop_user li:hover a i,
    div#upload_dropdown_menu ul#drop_upload li:hover a i{
        color: <?php echo get_theme_mod( 'links_color_setting'); ?>!important;
    }

    span#change:hover,
    .ul_related li.related_item a:hover,
    section#main footer i.material-icons{
        color: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
    }
    .tags-letter-block .tag-items .tag-item a:hover {
        color: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?> !important;
    }
    input[type="submit"] {
        color: <?php echo get_theme_mod( 'links_color_setting'); ?>!important;
    }
	.rating-bar-meter,
	.vjs-play-progress,
	.appContainer .ctaButton {
		background-color: <?php echo get_theme_mod( 'links_color_setting'); ?> !important;
	}
    .top-bar .social-share a {
        color: <?php echo get_theme_mod( 'passive_color_setting'); ?> !important;
        opacity: 50%;
    }
    .top-bar .social-share a:hover {
        color: <?php echo get_theme_mod( 'links_color_setting'); ?> !important;
        opacity: 100%;
    }
    .top-bar {
        background-color: <?=get_theme_mod('primary_color_setting')?> !important;
    }
    .ui-slider-horizontal .ui-slider-range{
        background-color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    .thumb-block:hover span.hd-video svg path{
        fill: <?=get_theme_mod('icons_color_setting')?>;
    }
    #sidebar span.hd-video {
        top: -5px !important;
        right: 3px;
    }

    <?php if(xbox_get_field_value('my-theme-options', 'enable_duration') == 'on'):?>
    main#main span.hd-video {
        top: 15px !important;
    }
    <?php else:?>
    main#main span.hd-video {
        top: -7px !important;
    }
    <?php endif;?>
    aside ul li:hover {
        cursor: pointer;
        background-color: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
        color: <?=get_theme_mod('links_color_setting')?>;
    }
    aside ul li.activeLi {
        background-color: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
        color: <?=get_theme_mod('links_color_setting')?>;
    }

    article.right div.msg_inner {
        background-color: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
    }
    article.right div.tri {
        border-color: <?php echo get_theme_mod( 'btn_color_setting'); ?> transparent transparent transparent !important;
    }
    .bx-wrapper .bx-controls-direction a {
        /*background-color: */<?php //echo get_theme_mod( 'main_color_setting'); ?>/* !important;*/
    }
    .bx-wrapper .bx-controls-direction a::before,
    .uploads .welcome i.fa-upload,
    ul#drop_upload li a i{
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }
    span.actor-title::before,
    span.cat-title::before,
    span#change i.fa-check::before,
    span#change2 i.fa-check::before{
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }
    .rating-bar-meter{
        background-color: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
    }
    .featured-carousel .slide a:hover span.hd-video svg path,
    .featured-carousel .slide a.active_slide span.hd-video svg path {
        fill: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?> !important;
    }

	#video-tabs button.tab-link.active,
	#comment_tabs button.tab-link.active,
	#profile-tabs button.tab-link.active,
	.title-block,
	.page-title,
	.page .entry-title,
	.comments-title,
	.comment-reply-title,
	.morelink:hover,
    .choices__list--multiple .choices__item{
		border-color: <?php echo get_theme_mod( 'btn_color_setting'); ?>!important;
	}

    .ui-state-active,
    .ui-widget-content .ui-state-active,
    .ui-widget-header .ui-state-active,
    a.ui-button:active,
    .ui-button:active,
    .ui-button.ui-state-active:hover {
        background: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
    }
    span#change:hover {
        cursor: pointer;
    }
    .thumb-block .entry-header,
    .widget-title, .page-title, .page .entry-title, .comments-title, .comment-reply-title,
    .categories-list .thumb-block .entry-header,
    label,
    .social-share small,
    li.gal_tag a i.fa-tag,
    li.article_tags a i.fa-tag{
        color: <?php if(get_theme_mod('text_site_color') !== false) echo get_theme_mod('text_site_color'); else echo '#ffffff';?>!important;
    }
    div.comment-meta.commentmetadata > a > i {
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
        font-size: 18px;
        margin-right: 10px;
    }

    div.comment-meta.commentmetadata > a,
    div.comment-meta.commentmetadata > a > i.fa-close {
        margin-right: 0px;
    }
    /**** 18 confirmation modal****/
    <?php
    $form_back = (get_theme_mod('disc_form_back_color') !== "" && get_theme_mod('disc_form_back_color') !== false) ? get_theme_mod('disc_form_back_color') : '0F1725';
    $form_opacity = (get_theme_mod('disc_form_opacity') !== "" && get_theme_mod('disc_form_opacity') !== false) ? get_theme_mod('disc_form_opacity') . '%' : '90%';?>
    #dclm_modal_content {
        background-color:  rgba(<?php
                $hex = str_replace('#', '', $form_back);
	            list($r, $g, $b) = sscanf($hex, "%02x%02x%02x");
                echo $r.",".$g.",". $b;
                 ?>, <?php echo $form_opacity;?>) !important;
    }
    <?php
        $back_color = (get_theme_mod('cookie_block_color')) ? get_theme_mod('cookie_block_color') : '#ffffff';
        $btn_color = (get_theme_mod('cookie_btn_color')) ? get_theme_mod('cookie_btn_color'): '#FF00D6';
        $btn_color_on_hover = (get_theme_mod('cookie_btn_color_on_hover')) ? get_theme_mod('cookie_btn_color_on_hover'): '#FF00D6';
        $text_color_agree = (get_theme_mod('cookie_btn_text_color')) ? get_theme_mod('cookie_btn_text_color'): '#ffffff';
        $link_color = (get_theme_mod('policy_link_color')) ? get_theme_mod('policy_link_color'): '#FF00D6';
        $link_on_hover = (get_theme_mod('policy_link_color_on_hover')) ? get_theme_mod('policy_link_color_on_hover'): '#FF00D6';
        ?>

     div#cookie-notice {
         background-color: <?php echo $back_color;?> !important;
     }
    a#cn-accept-cookie {
        background-color: <?php echo $btn_color;?> !important;
        border: 1px solid <?php echo $btn_color;?> !important;
        color: <?php echo $text_color_agree;?> !important;
    }
    a#cn-accept-cookie:hover {
        background-color: <?php echo $btn_color_on_hover;?> !important;
        border: 1px solid <?php echo $btn_color_on_hover;?> !important;
    }
    a.a_noselected_tag,
    a.a_selected_tag{
        border: 1px solid <?php echo $btn_color;?> !important;
        color: #fff !important;
        font-size: 12.8px;
        padding: 3px;
        padding-left: 5px;
        padding-right: 5px;
        margin-right: 10px;
        margin-bottom: 10px;
    }
    a.a_selected_tag {
        background-color: <?php echo $btn_color;?> !important;
    }
    a.a_noselected_tag:hover {
        background-color: <?php echo get_theme_mod( 'btn_hover_color_setting');?> !important;
    }
    a.a_noselected_tag i.fa-tag,
    a.a_selected_tag i.fa-tag{
        color: <?=get_theme_mod('links_color_setting')?> !important;
    }
    span.selected_tag {
        color: <?php echo $btn_color;?> !important;
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
        margin-left: 5px;
    }

	/* Small desktops ----------- */
        @media only screen  and (min-width : 64.001em) and (max-width : 84em) {
            /***videos***/
            #main .thumb-block.post:not(.actors),
            #main div.playlist-list.actors-list .thumb-block.photos,
            #main div.articles-widget-list .thumb-block.blog{
                width: <?php echo esc_html( $videos_per_row ); ?>%!important;
            }
        }
        /* Desktops and laptops ----------- */
        @media only screen  and (min-width : 84.001em) {
            #main .thumb-block.post:not(.actors),
            #main div.playlist-list.actors-list .thumb-block.photos,
            #main div.articles-widget-list .thumb-block.blog{
                width: <?php echo esc_html( $videos_per_row ); ?>%!important;
            }
        }

    aside section.widget_articles_block h2.widget-title,
    aside section.widget_playlists_block h2.widget-title{
        box-sizing: border-box;
        border-radius: 4px;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        text-align: center;
        padding-top: 12px;
        padding-bottom: 12px;
        margin-top: 15px;
    }
    aside section.widget_articles_block h2.widget-title,
    aside section.widget_playlists_block h2.widget-title{
        color: <?php echo get_theme_mod( 'secondary_text_site_color'); ?> !important;
        opacity: 0.5;
        border: 1px solid <?php echo get_theme_mod( 'secondary_text_site_color'); ?> !important;
    }
    #sidebar div.articles-widget-list .thumb-block.blog,
    #sidebar div.playlists-widget-list .thumb-block.post.one-playlist
    {
        width: 50%;
    }

    #sidebar div.articles-widget-list .thumb-block.blog .entry-header,
    #sidebar div.playlists-widget-list .thumb-block.post.one-playlist .entry-header{
        display: block;
        background: <?=get_theme_mod('primary_color_setting')?> !important;
        border: none !important;
        border-radius: 0 0 4px 4px !important;
    }
    #sidebar div.articles-widget-list .thumb-block.blog .entry-header p:first-child,
    #sidebar div.playlists-widget-list .thumb-block.post.one-playlist .entry-header p:first-child{
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    #sidebar div.playlists-widget-list .thumb-block.post.one-playlist {
        margin-bottom: 10px !important;
    }

    .site-footer,
    .title-block,
    .page-title, .page .entry-title, .comments-title, .comment-reply-title, .page-title, .page .entry-title, .comments-title, .comment-reply-title{
        background: <?= $primary_color?> !important;
    }
    .pagination ul li a {
        background-color: <?= $primary_color?> !important;
        outline: none;
        border-radius: 4px;
        border: 1px solid <?= $primary_color?>!important;
    }
    .pagination ul li a svg path {
        fill: <?=get_theme_mod( 'links_color_setting');?> !important;
    }

    .pagination ul li a.current {
        border-top: 1px solid rgba(<?php
                $hex = get_theme_mod('btn_color_setting');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) !important;
        border-bottom: 1px solid <?=get_theme_mod('btn_hover_color_setting')?> !important;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        background-position: 0 0, 100% 0;
        background-repeat: no-repeat;
        -webkit-background-size: 1px 100%;
        -moz-background-size: 1px 100%;
        background-size: 1px 100%;
        background-image: -webkit-linear-gradient(top, rgba(<?php
                $hex = get_theme_mod('btn_color_setting');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%), -webkit-linear-gradient(top, rgba(<?php
                $hex = get_theme_mod('btn_color_setting');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%);
        background-image: -moz-linear-gradient(top, rgba(<?php
                $hex = get_theme_mod('btn_color_setting');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%), -moz-linear-gradient(top, rgba(<?php
                $hex = get_theme_mod('btn_color_setting');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%);
        background-image: -o-linear-gradient(top, rgba(<?php
                $hex = get_theme_mod('btn_color_setting');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%), -o-linear-gradient(top, rgba(<?php
                $hex = get_theme_mod('btn_color_setting');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%);
        background-image: linear-gradient(to bottom, rgba(<?php
                $hex = get_theme_mod('btn_color_setting');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%), linear-gradient(to bottom, rgba(<?php
                $hex = get_theme_mod('btn_color_setting');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%);
    }

    div#user_dropdown_menu ul#drop_user li,
    div#upload_dropdown_menu ul#drop_upload li,
    div#video_thumbnails_below {
        background: <?= $secondary_color;?> !important;
    }
    #site-navigation > ul > li {

    }

    .breadcrumbs-area{
        background-color: <?=$secondary_color;?> !important;
        border: 1px solid <?=$secondary_color;?> !important;
    }
    input[type="text"],
    input[type="email"],
    input[type="url"],
    input[type="password"],
    input[type="search"],
    input[type="number"],
    input[type="tel"],
    input[type="range"],
    input[type="date"],
    input[type="month"],
    input[type="week"],
    input[type="time"],
    input[type="datetime"],
    input[type="datetime-local"],
    input[type="color"],
    select,
    textarea,
    .wp-editor-container,
    .choices__inner{
        background-color: <?=get_theme_mod('input_color')?> !important;
        border: 1px solid <?=get_theme_mod('input_color')?> !important;
        color: <?=get_theme_mod('text_site_color')?> !important;
    }

    textarea#embed_frame {
        background-color: <?=get_theme_mod('input_color')?> !important;
        border: 1px solid <?=get_theme_mod('input_color')?> !important;
        border-radius: 4px !important;
    }
    <?php
    if(is_user_logged_in() && current_user_can('administrator')):?>
         div#user_dropdown_menu{
             top: 85px;
         }
        div#upload_dropdown_menu {
            top: 81px;
        }
    <?php
    elseif(is_user_logged_in() && !current_user_can('administrator')):?>
        div#user_dropdown_menu{
            top: 62px;
        }
        div#upload_dropdown_menu {
            top: 58px;
        }
    <?php endif;?>

    textarea#description,
    textarea {
        resize:none;
    }
    /***multi select***/
    .choices__list {
        background-color: <?= get_theme_mod( 'secondary_color_setting' )?> !important;
        color: <?=get_theme_mod('text_site_color')?> !important;
        border: none !important;
    }
    div.choices__item.choices__item--choice.choices__item--selectable {
        color: <?=get_theme_mod('text_site_color')?> !important;
    }
    div.choices__item.choices__item--choice.choices__item--selectable:hover,
    .choices__list--dropdown .choices__item--selectable.is-highlighted {
        background-color: <?= get_theme_mod( 'btn_hover_color_setting')?> !important;
    }
    .choices__list--multiple .choices__item[data-deletable] {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif !important;
        letter-spacing: 1px;
        font-size: 14px;
    }

    /***UI SELECT***/
    .ui-selectmenu-button.ui-button {
        text-align: center !important;
        border-radius: 0 !important;
        border: none !important;
        padding: 0!important;
        padding-top: 12px !important;
        padding-left: 5px!important;
        padding-right: 5px !important;
        background-color: <?= get_theme_mod( 'secondary_color_setting' )?> !important;
        color: <?=get_theme_mod('text_site_color')?> !important;
        margin-right: 0 !important;
        margin-left: 0 !important;
    }
    div.ui-selectmenu-open {
        z-index: 99999;
    }
    .ui-widget.ui-widget-content {
        border: none !important;
    }
    .ui-state-active, .ui-widget-content .ui-state-active {
        border: none !important;
        background: <?= get_theme_mod( 'btn_hover_color_setting')?> !important;
        color: <?=get_theme_mod('text_site_color')?> !important;
    }

    /*select search**/
    #search_select-button.ui-button {
        width: 88px !important;
        border: none !important;
        border-left: 2px solid <?= get_theme_mod( 'primary_color_setting' )?> !important;
    }

    main#main .widget-title {
        border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>!important;
    }

    ul#search_select-menu,
    ul#select_trending_country-menu,
    ul#faq_select-menu,
    ul#select_ad_type-menu,
    ul#submit_select_category-menu,
    ul#ethnicity-menu,
    ul#hair_color-menu,
    ul#reportType-menu,
    ul#playlistList-menu,
    ul#video_category_select-menu,
    ul#i_am-menu,
    ul#orientation-menu,
    ul#display_name-menu,
    ul#account_ethnicity-menu,
    ul#account_hair_style-menu,
    ul#account_hair_color-menu,
    ul#account_tattoo-menu,
    ul#account_piercing-menu,
    ul#porn_tattoo-menu,
    ul#porn_piercing-menu,
    ul#porn_hair_color-menu,
    ul#porn_ethnicity-menu,
    ul#user_orientation-menu,
    ul#user_gender-menu,
    ul#relation-menu,
    ul#relationship-menu,
    ul#country_user-menu,
    ul#user_hair_style-menu,
    ul#eye_color-menu,
    ul#user_eye_color-menu,
    ul#user_hair_color-menu,
    ul#user_tattoo-menu,
    ul#user_piercing-menu,
    ul#cat_tattoo-menu,
    ul#cat_piercing-menu,
    ul#cat_hair_color-menu,
    ul#cat_ethnicity-menu,
    ul#photo_report_type-menu,
    ul#user_post_report_type-menu
    {
        background-color: <?=get_theme_mod('input_color')?> !important;
        color: <?=get_theme_mod('text_site_color')?> !important;
    }
    ul#search_select-menu {
        width: 112px!important;
    }
    ul#search_select-menu li.ui-menu-item div,
    ul#select_trending_country-menu li.ui-menu-item div,
    ul#faq_select-menu li.ui-menu-item div,
    ul#select_ad_type-menu li.ui-menu-item div,
    ul#submit_select_category-menu li.ui-menu-item div,
    ul#ethnicity-menu li.ui-menu-item div,
    ul#hair_color-menu li.ui-menu-item div,
    ul#reportType-menu li.ui-menu-item div,
    ul#playlistList-menu li.ui-menu-item div,
    ul#video_category_select-menu li.ui-menu-item div,
    ul#i_am-menu li.ui-menu-item div,
    ul#orientation-menu li.ui-menu-item div,
    ul#display_name-menu li.ui-menu-item div,
    ul#account_ethnicity-menu li.ui-menu-item div,
    ul#account_hair_style-menu li.ui-menu-item div,
    ul#account_hair_color-menu li.ui-menu-item div,
    ul#account_tattoo-menu li.ui-menu-item div,
    ul#account_piercing-menu li.ui-menu-item div,
    ul#porn_tattoo-menu li.ui-menu-item div,
    ul#porn_piercing-menu li.ui-menu-item div,
    ul#porn_hair_color-menu li.ui-menu-item div,
    ul#porn_ethnicity-menu li.ui-menu-item div,
    ul#user_orientation-menu li.ui-menu-item div,
    ul#relationship-menu li.ui-menu-item div,
    ul#user_eye_color-menu li.ui-menu-item div,
    ul#country_user-menu li.ui-menu-item div,
    ul#relation-menu li.ui-menu-item div,
    ul#eye_color-menu li.ui-menu-item div,
    ul#user_gender-menu li.ui-menu-item div,
    ul#user_hair_style-menu li.ui-menu-item div,
    ul#user_hair_color-menu li.ui-menu-item div,
    ul#user_tattoo-menu li.ui-menu-item div,
    ul#user_piercing-menu li.ui-menu-item div,
    ul#cat_tattoo-menu li.ui-menu-item div,
    ul#cat_piercing-menu li.ui-menu-item div,
    ul#cat_hair_color-menu li.ui-menu-item div,
    ul#cat_ethnicity-menu li.ui-menu-item div,
    ul#user_post_report_type-menu li.ui-menu-item div
    {
        padding-left: 22px !important;
        border: none !important;
    }
    ul#search_select-menu li.ui-menu-item div {
        padding-left: 10px !important;
    }
    ul#search_select-menu li.ui-menu-item div.ui-menu-item-wrapper,
    ul#select_trending_country-menu div.ui-menu-item-wrapper,
    ul#faq_select-menu div.ui-menu-item-wrapper,
    ul#select_ad_type-menu div.ui-menu-item-wrapper,
    ul#submit_select_category-menu div.ui-menu-item-wrapper,
    ul#ethnicity-menu div.ui-menu-item-wrapper,
    ul#hair_color-menu div.ui-menu-item-wrapper,
    ul#reportType-menu div.ui-menu-item-wrapper,
    ul#playlistList-menu div.ui-menu-item-wrapper,
    ul#video_category_select-menu div.ui-menu-item-wrapper,
    ul#i_am-menu div.ui-menu-item-wrapper,
    ul#orientation-menu div.ui-menu-item-wrapper,
    ul#display_name-menu div.ui-menu-item-wrapper,
    ul#account_ethnicity-menu div.ui-menu-item-wrapper,
    ul#account_hair_style-menu div.ui-menu-item-wrapper,
    ul#account_hair_color-menu div.ui-menu-item-wrapper,
    ul#account_tattoo-menu div.ui-menu-item-wrapper,
    ul#account_piercing-menu div.ui-menu-item-wrapper,
    ul#i_am-menu div.ui-menu-item-wrapper,
    ul#orientation-menu div.ui-menu-item-wrapper,
    ul#relation-menu div.ui-menu-item-wrapper,
    ul#eye_color-menu div.ui-menu-item-wrapper,
    ul#display_name-menu div.ui-menu-item-wrapper,
    ul#account_ethnicity-menu div.ui-menu-item-wrapper,
    ul#account_hair_style-menu div.ui-menu-item-wrapper,
    ul#account_hair_color-menu div.ui-menu-item-wrapper,
    ul#account_tattoo-menu div.ui-menu-item-wrapper,
    ul#account_piercing-menu div.ui-menu-item-wrapper,
    ul#porn_tattoo-menu div.ui-menu-item-wrapper,
    ul#porn_piercing-menu div.ui-menu-item-wrapper,
    ul#porn_hair_color-menu div.ui-menu-item-wrapper,
    ul#porn_ethnicity-menu div.ui-menu-item-wrapper,
    ul#user_orientation-menu div.ui-menu-item-wrapper,
    ul#relationship-menu div.ui-menu-item-wrapper,
    ul#user_eye_color-menu div.ui-menu-item-wrapper,
    ul#country_user-menu div.ui-menu-item-wrapper,
    ul#user_gender-menu div.ui-menu-item-wrapper,
    ul#user_hair_style-menu div.ui-menu-item-wrapper,
    ul#user_hair_color-menu div.ui-menu-item-wrapper,
    ul#user_tattoo-menu div.ui-menu-item-wrapper,
    ul#user_piercing-menu div.ui-menu-item-wrapper,
    ul#cat_tattoo-menu div.ui-menu-item-wrapper,
    ul#cat_piercing-menu div.ui-menu-item-wrapper,
    ul#cat_hair_color-menu div.ui-menu-item-wrapper,
    ul#cat_ethnicity-menu div.ui-menu-item-wrapper,
    ul#photo_report_type-menu div.ui-menu-item-wrapper,
    ul#user_post_report_type-menu div.ui-menu-item-wrapper
    {
        border: none!important;
    }

    ul#search_select-menu li.ui-menu-item div.ui-menu-item-wrapper:hover
    ul#select_trending_country-menu div.ui-menu-item-wrapper:hover,
    ul#select_trending_country-menu div.ui-menu-item-wrapper:hover,
    ul#select_ad_type-menu div.ui-menu-item-wrapper:hover,
    ul#submit_select_category-menu div.ui-menu-item-wrapper:hover,
    ul#ethnicity-menu div.ui-menu-item-wrapper:hover,
    ul#hair_color-menu div.ui-menu-item-wrapper:hover,
    ul#reportType-menu div.ui-menu-item-wrapper:hover,
    ul#playlistList-menu div.ui-menu-item-wrapper:hover,
    ul#video_category_select-menu div.ui-menu-item-wrapper:hover,
    ul#i_am-menu div.ui-menu-item-wrapper:hover,
    ul#orientation-menu div.ui-menu-item-wrapper:hover,
    ul#display_name-menu div.ui-menu-item-wrapper:hover,
    ul#account_ethnicity-menu div.ui-menu-item-wrapper:hover,
    ul#account_hair_style-menu div.ui-menu-item-wrapper:hover,
    ul#account_hair_color-menu div.ui-menu-item-wrapper:hover,
    ul#account_tattoo-menu div.ui-menu-item-wrapper:hover,
    ul#account_piercing-menu div.ui-menu-item-wrapper:hover,
    ul#porn_tattoo-menu div.ui-menu-item-wrapper:hover,
    ul#porn_piercing-menu div.ui-menu-item-wrapper:hover,
    ul#porn_hair_color-menu div.ui-menu-item-wrapper:hover,
    ul#porn_ethnicity-menu div.ui-menu-item-wrapper:hover,
    ul#user_orientation-menu div.ui-menu-item-wrapper:hover,
    ul#relationship-menu div.ui-menu-item-wrapper:hover,
    ul#user_eye_color-menu div.ui-menu-item-wrapper:hover,
    ul#country_user-menu div.ui-menu-item-wrapper:hover,
    ul#relation-menu div.ui-menu-item-wrapper:hover,
    ul#eye_color-menu div.ui-menu-item-wrapper:hover,
    ul#user_gender-menu div.ui-menu-item-wrapper:hover,
    ul#user_hair_style-menu div.ui-menu-item-wrapper:hover,
    ul#user_hair_color-menu div.ui-menu-item-wrapper:hover,
    ul#user_tattoo-menu div.ui-menu-item-wrapper:hover,
    ul#user_piercing-menu div.ui-menu-item-wrapper:hover,
    ul#cat_tattoo-menu div.ui-menu-item-wrapper:hover,
    ul#cat_piercing-menu div.ui-menu-item-wrapper:hover,
    ul#cat_hair_color-menu div.ui-menu-item-wrapper:hover,
    ul#cat_ethnicity-menu div.ui-menu-item-wrapper:hover,
    ul#photo_report_type-menu div.ui-menu-item-wrapper:hover,
    ul#user_post_report_type-menu div.ui-menu-item-wrapper:hover
    {
        background-color: <?=get_theme_mod('btn_hover_color_setting')?>!important;
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 1)!important;
    }

    /**select footer**/
    ul#select_trending_country-menu {
        height: 200px;
    }
    #select_trending_country-button.ui-button {
        text-align: left !important;
        width: 10em !important;
        border: none !important;
        padding: 0!important;
        padding-top: 10px !important;
        padding-left: 11px!important;
        padding-right: 5px !important;
        padding-bottom: 8px !important;
    }
    #select_trending_country-button.ui-button .ui-selectmenu-icon.ui-icon {
        margin-top: 2px;
    }
    #search_select-button {
        background-color: <?= get_theme_mod( 'secondary_color_setting' )?> !important;
        color: <?=get_theme_mod('text_site_color')?> !important;
        margin-right: 0 !important;
        margin-left: 0 !important;
    }
    ul#select_trending_country-menu li.ui-menu-item div{
        padding-left: 14px !important;
    }/**select footer**/

    /***support page***/
    #faq_select-button {
        padding-bottom: 10px !important;
        width: 15em;
        padding-left: 20px!important;
        text-align: left !important;
    }

    /***ads board***/
    #select_ad_type-button {
        padding-bottom: 10px !important;
        width: 15em;
        padding-left: 20px!important;
        text-align: left !important;
    }

    /**** submit a video***/
    #submit_select_category-button,
    #ethnicity-button,
    #hair_color-button{
        padding-bottom: 10px !important;
        width: 15em;
        padding-left: 10px!important;
        text-align: left !important;
    }

    ul#submit_select_category-menu {
        height: 200px;
    }

    ul#submit_select_category-menu li.ui-menu-item div,
    ul#ethnicity-menu li.ui-menu-item div,
    ul#hair_color-menu li.ui-menu-item div{
        padding-left: 10px !important;
    }


    /***video page***/
    #reportType-button {
        padding-bottom: 10px !important;
        width: 15em;
        padding-left: 10px!important;
        text-align: left !important;
    }
    ul#reportType-menu li.ui-menu-item div{
        padding-left: 10px !important;
    }

    #playlistList {
        padding-bottom: 10px !important;
        width: 15em;
        padding-left: 10px!important;
        text-align: left !important;
    }

    #playlistList-button {
        padding-bottom: 10px !important;
        width: 145px;
        padding-left: 20px!important;
        text-align: left !important;
    }

    ul#playlistList-menu {
        max-height: 150px;
        margin-top: 2px;
    }

    #video_category_select-button {
        padding-bottom: 10px !important;
        width: 160px;
        padding-left: 10px!important;
        text-align: left !important;
        margin-right: 40px !important;
        font-family: 'Roboto',sans-serif !important;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5)!important;
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 4px!important;
    }
    ul#video_category_select-menu {
        height: 200px;
        margin-top: 2px !important;
    }

    ul#video_category_select-menu li.ui-menu-item div {
        padding-left: 10px !important;
        font-family: 'Roboto',sans-serif !important;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
    }
    ul#video_category_select-menu li.ui-menu-item div:hover {
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 1) !important;
    }
    <?php
    if(is_single()):
    ?>
    body.modal-open {
        overflow: hidden;
    }
    <?php endif;?>
    /***account settings page*/
    #i_am-button,
    #orientation-button,
    #relation-button,
    #eye_color-button,
    #display_name-button,
    #account_ethnicity-button,
    #account_hair_style-button,
    #account_hair_color-button,
    #account_tattoo-button,
    #account_piercing-button{
        padding-bottom: 10px !important;
        width: 100%;
        padding-left: 10px!important;
        text-align: left !important;
    }
    ul#i_am-menu li.ui-menu-item div,
    ul#orientation-menu li.ui-menu-item div,
    ul#relation-menu li.ui-menu-item div,
    ul#eye_color-menu li.ui-menu-item div,
    ul#display_name-menu li.ui-menu-item div,
    ul#account_ethnicity-menu li.ui-menu-item div,
    ul#account_hair_style-menu li.ui-menu-item div,
    ul#account_hair_color-menu li.ui-menu-item div,
    ul#account_tattoo-menu li.ui-menu-item div,
    ul#account_piercing-menu li.ui-menu-item div {
        padding-left: 10px !important;
    }


    /****porn videos***/
    #porn_tattoo-button,
    #porn_piercing-button,
    #porn_hair_color-button,
    #porn_ethnicity-button{
        padding-bottom: 10px !important;
        width: 100%;
        padding-left: 10px!important;
        text-align: left !important;
    }

    ul#porn_tattoo-menu li.ui-menu-item div,
    ul#porn_piercing-menu li.ui-menu-item div,
    ul#porn_hair_color-menu li.ui-menu-item div,
    ul#porn_ethnicity-menu li.ui-menu-item div {
        padding-left: 10px !important;
    }

    /****community***/
    #user_orientation-button,
    #user_relationship-button,
    #relationship-button,
    #user_eye_color-button,
    #country_user-button,
    #user_gender-button,
    #user_hair_style-button,
    #user_hair_color-button,
    #user_tattoo-button,
    #user_piercing-button {
        padding-bottom: 10px !important;
        padding-left: 10px!important;
        text-align: left !important;
    }
    ul#user_orientation-menu li.ui-menu-item div,
    ul#user_relationship-menu li.ui-menu-item div,
    ul#user_eye_color-menu li.ui-menu-item div,
    ul#country_user-menu li.ui-menu-item div,
    ul#relation-menu li.ui-menu-item div,
    ul#user_gender-menu li.ui-menu-item div,
    ul#user_hair_style-menu li.ui-menu-item div,
    ul#user_hair_color-menu li.ui-menu-item div,
    ul#user_tattoo-menu li.ui-menu-item div,
    ul#user_piercing-menu li.ui-menu-item div {
        padding-left: 10px !important;
    }


    ul#country_user-menu {
        height: 200px !important;
    }


    #slider-range .ui-slider-horizontal .ui-slider-range,
    #slider-height .ui-slider-horizontal .ui-slider-range,
    #slider-weight .ui-slider-horizontal .ui-slider-range{
        background-color: <?= get_theme_mod('btn_color_setting')?> !important;
    }
    #slider-range span.ui-slider-handle.ui-corner-all.ui-state-default,
    #slider-height span.ui-slider-handle.ui-corner-all.ui-state-default,
    #slider-weight span.ui-slider-handle.ui-corner-all.ui-state-default    {
        background-color: <?= get_theme_mod('btn_hover_color_setting')?> !important;
        border: 1px solid <?= get_theme_mod('btn_hover_color_setting')?> !important;
        border-radius: 10px !important;
    }

    /***category***/
    #cat_tattoo-button,
    #cat_piercing-button,
    #cat_hair_color-button,
    #cat_ethnicity-button {
        padding-bottom: 10px !important;
        padding-left: 10px!important;
        text-align: left !important;
        /*width: 100%;*/
        max-width: 250px;
        width: 134px;
    }
    ul#cat_tattoo-menu li.ui-menu-item div,
    ul#cat_piercing-menu li.ui-menu-item div,
    ul#cat_hair_color-menu li.ui-menu-item div,
    ul#cat_ethnicity-menu li.ui-menu-item div {
        padding-left: 10px !important;
    }

    /***photo page***/
    #photo_report_type-button,
    #user_post_report_type-button{
        padding-bottom: 10px !important;
        padding-left: 10px!important;
        text-align: left !important;
        width: 100%;
        max-width: 350px;
    }


    #subscribeOnUser button.close,
    #subscribeModal button.close,
    #addToFavorite button.close{
        background-color: transparent !important;
    }

    span.views,
    span.duration {
        color: <?=get_theme_mod('text_site_color')?> !important;
    }

    h1 a#add_to_fav_video i.fa.fa-heart-o,
    h1 a#add_to_fav_video i.fa.fa-heart,
    h1 a#add_to_fav_video2 i.fa.fa-heart-o{
        cursor: pointer;
    }
    h1 a#add_to_fav_video:focus{
        outline: none !important;
    }
    /****show more tags****/
    .load-more-tags-container {
        margin: 20px auto;
        position: relative;
    }
    .load-more-tags-container div.tags-list {
        list-style-type: none;
        padding: 0;
        max-height: 60px;
        overflow: hidden;
        height: auto;
        transition: 0.1s ease-in;
    }
    .load-more-tags-container div.tags-list:after {
        content: "";
        display: table;
        clear: both;
    }
    .load-more-tags-container div.tags-list a.a-tags {
        margin: 10px 5px 0;
        float: left;
    }

    .load-more-tags-container .load-more-tags-btn {
        line-height: 40px;
        margin: 0 auto;
        display: block;
        color: #293243 !important;
        cursor: pointer;
        text-align: center;
        overflow: hidden;
        font-size: 16px;
    }
    .load-more-tags-container .load-more-tags-btn .loaded {
        display: none;
    }
    .load-more-tags-container #load-more-tags {
        display: none;
    }
    .load-more-tags-container #load-more-tags:checked ~ div.tags-list/* a.a-tags:nth-child(1n + 5)*/ {
        max-height: 999px;
        opacity: 1;
        transition: 0.2s ease-in;
    }
    .load-more-tags-container #load-more-tags:checked ~ .load-more-tags-btn .loaded {
        display: block;
    }
    .load-more-tags-container #load-more-tags:checked ~ .load-more-tags-btn .unloaded {
        display: none;
    }
    .loaded::before,
    .loaded::after,
    .unloaded::after,
    .unloaded::before {
        content: "";
        display: inline-block;
        vertical-align: middle;
        width: 100%;
        height: 1px;
        background-color: #293243 !important;
        position: relative;
    }
    .loaded:before,
    .unloaded:before{
        margin-left: -72%;
        left: -14px;
    }
    .loaded:before {
        margin-left: -112%;
    }
    .loaded:after,
    .uploaded:after{
        margin-right: -38%;
        right: -14px;
    }
    .unloaded::after,
    .loaded:after{
        width:35%
    }
    .unloaded i.fa.fa-chevron-down,
    .loaded i.fa.fa-chevron-up {
        color: #293243 !important;
    }

    /***read more content***/
    .read-more-container {
        position: relative;
        margin-top: 0 !important;
    }
    .read-more-container div.content-video {
        list-style-type: none;
        padding: 0;
    }
    .read-more-container div.content-video:after {
        content: "";
        display: table;
        clear: both;
    }
    .read-more-container div.content-video {
        margin: 10px 5px 0;
        float: left;
    }
    .read-more-container div.content-video {
        opacity: 1;
        max-height: 75px;
        transition: 0.1s ease-in;
        overflow: hidden;
    }
    .read-more-container .read-more-btn {
        line-height: 40px;
        margin: 0 auto;
        display: block;
        color: rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        cursor: pointer;
        text-align: center;
        overflow: hidden;
        font-size: 16px;
        clear: both;
    }
    .read-more-container .read-more-btn .read {
        display: none;
    }
    .read-more-container #read-more {
        display: none;
    }
    .read-more-container #read-more:checked ~ div.content-video {
        max-height: inherit !important;
        transition: 0.2s ease-in;
    }
    .read-more-container #read-more:checked ~ .read-more-btn .read {
        display: block;
    }
    .read-more-container #read-more:checked ~ .read-more-btn .readed {
        display: none;
    }
    .read-more-container .load-more-tags-btn .read {
        display: none;
    }
    .read-more-container #read-more {
        display: none;
    }
    .read-more-container #read-more:checked ~ .read-more-btn .read {
        display: block;
    }
    .read-more-container #read-more:checked ~ .read-more-btn .readed {
        display: none;
    }

    .read::before,
    .read::after,
    .readed::after,
    .readed::before {
        content: "";
        display: inline-block;
        vertical-align: middle;
        width: 100%;
        height: 1px;
        background-color: rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        position: relative;
    }

    .read:before,
    .readed:before{
        margin-left: -111%;
        left: -14px;
    }

    .read:before {
        margin-left: -112%;
    }

    .read:after,
    .readed:after{
        margin-right: -58%;
        right: -14px;
    }

    .readed::after,
    .read:after{
        width:45%
    }

    .readed i.fa.fa-chevron-down,
    .read i.fa.fa-chevron-up {
        color: rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
    }

    <?php
    if((int)xbox_get_field_value('my-theme-options', 'number_videos_per_row') == 5):?>
    div.rating-bar span {
        font-size: 11px;
    }
    span.views, span.duration {
        font-size: 11px;
    }
    span.views i, span.duration i {
        top: 0;
    }
    <?php endif;?>
    <?php if(xbox_get_field_value( 'my-theme-options', 'footer-columns' ) == 'one-columns-footer'):?>
        section#media_image-8{
            text-align: center;
        }
        section#media_image-9,
        section#media_image-10,
        section#media_image-11 {
            display:none;
        }
    <?php elseif(xbox_get_field_value( 'my-theme-options', 'footer-columns' ) == 'two-columns-footer'): ?>
        section#media_image-8,
        section#media_image-9{
            text-align: right;
        }
        section#media_image-10,
        section#media_image-11 {
            display:none;
        }
        section#media_image-8 img {
            float: right;
        }
        section#media_image-9 img {
            float: left;
        }
    <?php elseif(xbox_get_field_value( 'my-theme-options', 'footer-columns' ) == 'three-columns-footer'):?>
        .site-footer .three-columns-footer .widget {
            width: 25% !important;
        }
        div.three-columns-footer {
            display: flex !important;
            justify-content: center !important;
        }
        section#media_image-11{
            display:none;
        }
    <?php endif;?>


    #modalWindowAlyaFancybox #full_thumbnails{
        background-color: transparent!important;
    }
    div.thumbs_container {
        margin-left: 0 !important;
        margin-right: 0 !important;
        padding-left: 10px;
        padding-right: 10px;
    }
    div.pagin_photo {
        padding-bottom: 20px !important;
    }

    /****community tabs****/
    button.feed,
    button.members,
    button.advanced_search {
        background: none!important;
        border: none;
        box-shadow: none;
    }

    i.fa.fa-thumbs-up:hover,
    i.fa.fa-thumbs-down:hover {
        color: <?=get_theme_mod('icons_color_setting')?> !important;
    }

    div.activity_block p span i.fa-clock-o,
    div.activity_block p span i.fa-thumbs-up,
    div.activity_block p span i.fa-check,
    div.activity_block p span i.fa-plus,
    div.user_post_activity_video_title p span i.fa-thumbs-up,
    div.user_post_activity_video_title p span i.fa-check,
    div.user_post_activity_video_title p span i.fa-plus
    {
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }
    #forms > button.large,
    #forms > button.large[disabled=disabled],
    #users_feeds > div.feeds > div > p > span > a,
    div.activity_content.image div a{
        color: <?php echo get_theme_mod( 'links_color_setting'); ?>!important;
    }
    li.gal_tag a i.fa-tag,
    li.article_tags a i.fa-tag,
    div.tags-list a i.fa-tag,
    div.cat-list a i.fa-folder-open{
        color: <?php echo get_theme_mod( 'links_color_setting'); ?> !important;
    }
    div#community-tabs button.tab-link {
        color: <?php echo get_theme_mod( 'links_color_setting'); ?>!important;
    }
    #users_feeds .feeds{
        background-color: <?= get_theme_mod( 'primary_color_setting' )?> !important;
    }
    div.users_info p a{
        color: <?php echo get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    div.users_info span,
    ul.users_control_btns li a i,
    div.activity_block p span i{
        color: <?= get_theme_mod( 'text_site_color' )?>!important;
    }

    .red-heart {
        cursor: pointer;
    }

    div.bx-wrapper div.bx-viewport div.thumbs_container img {
        width: auto !important;
    }
    div.uploaded_by{
        float: right;
        margin-top: 20px;
        margin-bottom: 20px;
        color: <?=get_theme_mod('secondary_text_site_color');?> !important;
    }
    div.uploaded_by a {
        color:<?php echo get_theme_mod( 'links_color_setting'); ?>!important;
    }

    div#report_photo button.close {
        background: transparent !important;
        border: none !important;
    }
    div.author_info span {
        font-style: italic;
        color: <?= get_theme_mod( 'text_site_color' )?>!important;
    }
    div.author_info span a {
        color: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
    }

    div span.remove_from_photo {
        top: 10px !important;
        right: 10px !important;
    }
    div span.remove_from_photo i.fa-heart {
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
        cursor: pointer;
    }
    span.delete_image i.fa-close {
        color: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
    }
    .filters-options span a.active {
        background-color: transparent !important;
    }
    #btn_delete_album,
    .btn_upload_to_album {
        padding: 2px 10px;
        background-color: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;;
    }
    #btn_delete_album:hover,
    .btn_upload_to_album:hover {
        background-color: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?> !important;
    }
    span.likes_count {
        color: <?php echo get_theme_mod('secondary_text_site_color'); ?> !important;
    }
    button.about,
    button.share,
    button.playlist,
    button.report,
    #control_interface .fa-expand,
    #control_interface .fa-th-large,
    #control_interface .fa-arrow-circle-left,
    #control_interface .fa-comment,
    #control_interface .fa-share-alt,
    #control_interface .fa-flag
    #modalWindowAlyaFancybox .fa-play,
    #modalWindowAlyaFancybox .fa-pause,
    #modalWindowAlyaFancybox .fa-close,
    #fullscreen_flag,
    #not_fullscreen_flag,
    #modalWindowAlyaFancybox .modal-header .fa-pause,
    #modalWindowAlyaFancybox .modal-header .fa-th-large,
    #modalWindowAlyaFancybox .modal-header .fa-play,
    #modalWindowAlyaFancybox .modal-header button.close
    {
        color: <?php echo get_theme_mod( 'links_color_setting'); ?> !important;
    }

    #control_interface .fa-heart.red-heart {
    }

    progress {
        background: <?=get_theme_mod('background_color')?> !important;
        height: 2px;
        -webkit-appearance: none !important;
    }
    progress::-webkit-progress-bar {
        background: <?=get_theme_mod('background_color')?> !important;
        height: 2px;
    }
    progress::-moz-progress-bar {
        background: <?=get_theme_mod('icons_color_setting')?> !important;
        height: 2px;
    }
    progress::-webkit-progress-value {
        background: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
        height: 2px;
    }


    #users_control_btns li a,
    a.a_selected_tag,
    a.a_noselected_tag,
    form.upload_to_album_form button,
    form#SubmitVideo button[type=submit],
    form#forms button[type=submit],
    #edit_user_video,
    button.vicetemple-player__happy-inside-btn-close,
    #subscribe_on_author,
    span.welcome{
        color: <?php echo get_theme_mod( 'links_color_setting'); ?> !important;
    }
    #write_a_post {
        background: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
        border-color: <?php echo get_theme_mod( 'btn_color_setting'); ?> !important;
    }
    #write_a_post:hover{
        background: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?> !important;
        border-color: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?> !important;
    }

    @media only screen and (max-width: 319px) {
        header.categoryVideoWatchLater span,
        div.rating-bar span.views{
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        <?php if(xbox_get_field_value('my-theme-options','mob-number_videos_per_row') == '2'):?>
        div.rating-bar span:nth-child(3){
            display:none;
        }
        <?php endif;?>

    }
    @media (min-width: 320px) and (max-width : 766px) {

        header.categoryVideoWatchLater span,
        div.rating-bar span.views{
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    <?php if(xbox_get_field_value('my-theme-options','mob-number_videos_per_row') == '2'):?>
        div.rating-bar span:nth-child(3){
            display:none;
        }
    <?php endif;?>
    }
    @media (min-width: 375px) and (max-width: 462px) {
        header.categoryVideoWatchLater span,
        div.rating-bar span.views{
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    <?php if(xbox_get_field_value('my-theme-options','mob-number_videos_per_row') == '2'):?>
        div.rating-bar span:nth-child(3){
            display:none;
        }
    <?php endif;?>
    }
    @media (min-width: 463px) and (max-width : 765px) {
        header.categoryVideoWatchLater span,
        div.rating-bar span.views{
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    <?php if(xbox_get_field_value('my-theme-options','mob-number_videos_per_row') == '2'):?>
        div.rating-bar span:nth-child(3){
            display:none;
        }
    <?php endif;?>
    }
    <?php if(is_page_template('template-pornstars.php')):?>
    @media only screen  and (min-width : 64.001em) and (max-width : 84em) {
        /***actors***/
        #main .thumb-block.actors{
            width: <?php echo esc_html( $actors_per_row ); ?>%!important;
        }
    }
    /* Desktops and laptops ----------- */
    @media only screen  and (min-width : 84.001em) {
        #main .thumb-block.actors {
            width: <?php echo esc_html( $actors_per_row ); ?>%!important;
        }
    }
    <?php endif;?>

    <?php if(is_page_template('template-pornstars.php') && !is_category() && !is_page_template('template-categories.php') && !is_author()):?>
    @media only screen  and (min-width : 64.001em) and (max-width : 84em) {
        /***actors***/
        #main .thumb-block {
            width: <?php echo esc_html($actors_per_row); ?>%!important;
        }
    }
    /* Desktops and laptops ----------- */
    @media only screen  and (min-width : 84.001em) {
        #main .thumb-block {
            width: <?php echo esc_html($actors_per_row); ?>%!important;
        }
    }
    <?php endif;?>

    #message div.tags-list {
       /* max-width: 240px;*/
        flex-wrap: wrap;
    }
    div.render-x {
        position: relative;
        margin-right: 10px;
        margin-bottom: 10px;
    }
    div.render-x a{
        background: <?=get_theme_mod('secondary_color_setting')?> !important;
    }
    div.render-x span {
        float: right;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        padding: 3px 5px !important;
        background: <?=get_theme_mod('secondary_color_setting')?> !important;
        margin-top: -3px;
    }
    div.render-x span svg.fa-close {
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5)!important;
        cursor: pointer;
        font-style: normal;
        font-weight: normal;
        font-size: 12px!important;
        line-height: 14px!important;
    }

    #remove_video_tags,
    #remove_video_tags_on_upload_page{
        background: transparent !important;
        padding-top: 4px;
        padding-bottom: 4px;
        padding-left: 10px;
        padding-right: 10px;
        margin-left: 10px;
        border: none !important;
        color: rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        display: flex;
        flex-wrap: nowrap;
    }
    #remove_video_tags svg,
    #remove_video_tags_on_upload_page svg {
        margin-right: 5px !important;
    }
    #remove_video_tags svg path,
    #remove_video_tags_on_upload_page svg path {
        fill: <?=get_theme_mod('secondary_text_site_color');?>!important;
    }

    div.remove-all-tag {
        display: inline-flex;
    }

    #edit_current_video .remove-all-tag p {
        margin:0 !important;
    }

    div.personal_info_mobile div#subscribers_and_views p,
    div.personal_info_mobile div#subscribers_and_views2 p{
        font-size: 18px!important;
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 1) !important;
    }

    div.personal_info_mobile div#subscribers_and_views p > span.count_subs,
    div.personal_info_mobile div#subscribers_and_views2 p > span.count_subs{
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
    }


    <?php
    if(xbox_get_field_value('my-theme-options', 'use-premium-label') == 'off'):?>
    span.premium-video {
        background: transparent !important;
        width: 50px !important;
        height: 50px !important;
    }
    span.premium-video img.svg-crown {
        width: 22px !important;
        float: right;
    }
    <?php else:?>
    span.premium-video {
        background: transparent !important;
        width: 100px !important;
        height: 33px !important;
    }
    <?php endif; ?>

    span.views {
        float: left;
        padding-left: 5px;
    }
    span.duration {
        float:right;
        padding-right: 5px;
    }

    <?php if(xbox_get_field_value('my-theme-options', 'enable_view') == 'off'):?>
        div.photos_views{
            display:none;
        }
    <?php endif;?>

    <?php if(xbox_get_field_value('my-theme-options', 'enable_view') != 'on'
        && xbox_get_field_value('my-theme-options', 'enable_duration') == 'on'
        && xbox_get_field_value('my-theme-options', 'enable_rating') == 'on'):?>
        span.views {
            display: none;
        }
        #main div.rating-bar span:nth-child(2){
            float: left !important;
            margin-left: 5px;
        }
        aside#sidebar div.rating-bar.no-rate > span:nth-child(2){
            float: inherit;
            margin-left: 5px;
        }
    <?php elseif(xbox_get_field_value('my-theme-options', 'enable_duration') == 'on'
        && xbox_get_field_value('my-theme-options', 'enable_view') == 'on'
        && xbox_get_field_value('my-theme-options', 'enable_rating') != 'on'):?>
        span.views {
            float: left !important;
        }
        span.duration {
            float:right !important;
        }
    <?php elseif(xbox_get_field_value('my-theme-options', 'enable_duration') != 'on'
        && xbox_get_field_value('my-theme-options', 'enable_view') == 'on'
        && xbox_get_field_value('my-theme-options', 'enable_rating') == 'on'):?>
        span.duration {
            display: none;
        }
        div.rating-bar > span:nth-child(3){
            float: right !important;
            margin-right: 5px;
        }
    <?php elseif(xbox_get_field_value('my-theme-options', 'enable_duration') != 'on'
        && xbox_get_field_value('my-theme-options', 'enable_view') != 'on'
        && xbox_get_field_value('my-theme-options', 'enable_rating') == 'on'):?>
        span.views, span.duration {
            display: none;
        }
        #main div.rating-bar span:nth-child(2){
            float: inherit !important;
        }
        aside#sidebar aside#sidebar div.rating-bar.no-rate > span:nth-child(2){
            float: none !important;
            margin-left: 5px;
        }
    <?php elseif(xbox_get_field_value('my-theme-options', 'enable_rating') == 'on'
        && xbox_get_field_value('my-theme-options', 'enable_view') == 'on'
        && xbox_get_field_value('my-theme-options', 'enable_duration') == 'on'):?>
        span.duration {
            float: right !important;
        }
        span.views {
            float: left !important;
        }
    <?php elseif(xbox_get_field_value('my-theme-options', 'enable_rating') == 'on'
        && xbox_get_field_value('my-theme-options', 'enable_duration') == 'on'
        && xbox_get_field_value('my-theme-options', 'enable_view') != 'on'):?>
        span.views {
            display: none;
        }
        span.duration {
            float: right !important;
        }
    <?php elseif(xbox_get_field_value('my-theme-options', 'enable_rating') == 'on'
	    && xbox_get_field_value('my-theme-options', 'enable_duration') != 'on'
	    && xbox_get_field_value('my-theme-options', 'enable_view') == 'on'):?>
        div.rating-bar > span.views {
            float: left !important;
        }
        span.duration {
            display: none;
        }
    <?php elseif(xbox_get_field_value('my-theme-options', 'enable_rating') != 'on'
        && xbox_get_field_value('my-theme-options', 'enable_duration') != 'on'
        && xbox_get_field_value('my-theme-options', 'enable_view') == 'on'):?>
        div.rating-bar > span.views {
            float: inherit !important;
        }
    <?php elseif(xbox_get_field_value('my-theme-options', 'enable_rating') != 'on'
        && xbox_get_field_value('my-theme-options', 'enable_duration') == 'on'
        && xbox_get_field_value('my-theme-options', 'enable_view') != 'on'):?>
        div.rating-bar  span.duration {
            float: inherit !important;
        }
    <?php endif;?>
    #sidebar div.rating-bar > span:nth-child(3) {
        text-align: center;
        float: inherit !important;
    }

    <?php if(xbox_get_field_value( 'my-theme-options', 'layout') == 'full-width'):?>
    div.upgrade {
        height: 40px;
        vertical-align: middle;
        margin-left: -40px;
        margin-right: 55px;
    }
    <?php else:?>
    div.upgrade {
        height: 40px;
        vertical-align: middle;
        margin-left: 20px;
        margin-right: 40px;
    }
    <?php endif;?>

    div.upgrade button {
        color: <?php echo get_theme_mod( 'links_color_setting'); ?> !important;
    }
    div.upgrade button i.fa-star {
        color: <?php echo get_theme_mod( 'links_color_setting'); ?> !important;
        margin-right: 10px;
    }
    li.article_tags {
        background-color: transparent !important;
    }

    div#form{
        margin-bottom: 20px;
    }

    button#сancel {
        background-color: transparent !important;
    }
    span.users_control_btns {
        font-size: 16px !important;
        font-style: normal !important;
        color: <?php echo get_theme_mod( 'links_color_setting'); ?> !important;
        float: right !important;
        cursor: pointer;
        display: inline-flex;
    }
    span.users_control_btns i {
        color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
    }

    div#members {
        justify-content: space-between;
        flex-wrap: wrap;
    }


    article.thumb-block.post {
        border-radius: 4px 4px 0px 0px;
        padding-top:0 !important;
        padding-bottom: 0 !important;
    }
    aside section.widget_videos_block h2.widget-title,
    h2.a_mod{
        color: <?php echo get_theme_mod( 'secondary_text_site_color'); ?> !important;
        opacity: 0.5;
        border: 1px solid <?php echo get_theme_mod( 'secondary_text_site_color'); ?> !important;
    }
    aside div.videos-list article div.rating-bar {
        background: <?=get_theme_mod('primary_color_setting')?> !important;
        border: none !important;
    }

    .bx-wrapper .bx-controls-direction a.bx-prev svg{
       /* content: url("<?=get_template_directory_uri()?>/assets/svg/left-arrow.svg");*/
        position: relative;
        top: 68px;
        left: 20px;
    }
    .bx-wrapper .bx-controls-direction a.bx-prev svg path,
    .bx-wrapper .bx-controls-direction a.bx-next svg path{
        fill:<?=get_theme_mod('primary_color_setting');?> !important;
        fill-opacity: 1!important;
    }
    .bx-wrapper .bx-controls-direction a.bx-prev {
        background: linear-gradient(
                270deg
                , rgba(<?php
            $hex = get_theme_mod('secondary_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 10%), <?=get_theme_mod('secondary_color_setting')?> 100%);
    }

    .bx-wrapper .bx-controls-direction a.bx-next svg {
       /* content: url("<?=get_template_directory_uri()?>/assets/svg/right-arrow.svg");*/
        position: relative;
        top: 68px;
        right: -20px;
    }

    .bx-wrapper .bx-controls-direction a.bx-next{
        background: linear-gradient(
                90deg, rgba(<?php
            $hex = get_theme_mod('secondary_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 10%), <?=get_theme_mod('secondary_color_setting')?> 100%);
        width: 55px !important;
    }
    @media screen and (min-width: 991.99px) {
        .main-navigation li.current_page_item,
        .main-navigation li.current-menu-item {
            border-top: 1px solid rgba(<?php
            $hex = get_theme_mod('btn_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
            border-left: 1px solid <?=get_theme_mod('btn_hover_color_setting')?> !important;
            border-right: 1px solid <?=get_theme_mod('btn_hover_color_setting')?> !important;
            /*background-image: -webkit-linear-gradient(top, rgba(<?php
            $hex = get_theme_mod('btn_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%), -webkit-linear-gradient(top, rgba(<?php
            $hex = get_theme_mod('btn_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%);
            background-image: -moz-linear-gradient(top, rgba(<?php
            $hex = get_theme_mod('btn_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%), -moz-linear-gradient(top, rgba(<?php
            $hex = get_theme_mod('btn_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%);
            background-image: -o-linear-gradient(top, rgba(<?php
            $hex = get_theme_mod('btn_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%), -o-linear-gradient(top, rgba(<?php
            $hex = get_theme_mod('btn_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%);
            background-image: linear-gradient(to bottom, rgba(<?php
            $hex = get_theme_mod('btn_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%), linear-gradient(to bottom, rgba(<?php
            $hex = get_theme_mod('btn_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) 0%, <?=get_theme_mod('btn_hover_color_setting')?> 100%);*/
            border-radius: 4px;
        }
    }
    @media screen and (max-width: 991.98px) {
        #site-navigation ul li.current-menu-item a {
            border-radius: 4px !important;
            border-color: <?=get_theme_mod('btn_color_setting')?>!important;
            border-width: 2px !important;
        }
    }
    .main-navigation li.current_page_item > a,
    .main-navigation li.current-menu-item > a {
        background-color: <?=get_theme_mod('background_color')?> !important;
        border: none !important;
        box-shadow: inset 0px 5px 5px rgba(0, 0, 0, 0.15);
    }

    div.play-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -15px;
        margin-top: -15px;
        opacity:0;
    }

    #site-navigation > ul > li > a > span > svg{
        margin-right: 10px;
        margin-top: 10px;
    }
    #site-navigation > ul > li.home-icon > a > span > svg{
        margin-right: 10px;
        margin-top: 8px;
    }
    #site-navigation > ul > li > a {
        vertical-align: middle;
        display: flex !important;
    }
    #site-navigation > ul > li > a:hover {
        background: <?=get_theme_mod('background_color')?> !important;
        box-shadow: inset 0px 5px 5px rgb(0 0 0 / 15%);
    }
    .site-footer {
        background: linear-gradient(0deg, <?=get_theme_mod('primary_color_setting')?>, <?=get_theme_mod('primary_color_setting')?>);
    }
    #content {
        margin-top: 0px !important;
        padding-top: 0px;
    }
    div.customizer_content h1 {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 300;
        font-size: 36px;
        line-height: 42px;
        border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }
    div.customizer_content > * {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 18px;
    }
    div.customizer_content > p {
        width:100%;
        column-count: 2;
        -moz-column-count: 2;
        -webkit-column-count: 2;
        column-gap: 40px;
        -moz-column-gap: 40px;
        -webkit-column-gap: 40px;
    }
    div.customizer_content > *:first-child {
        margin-top: 0;
    }
    div.customizer_content > *:last-child {
        margin-bottom: 0;
    }
    div#content {
        margin-bottom: 0px !important;
        padding-bottom: 0px !important;
    }
    .site-footer {
        margin-top: 40px !important;
        padding-top: 40px !important;
        padding-bottom: 40px !important;
    }
    .logo-footer {
        padding-top: 37px !important;
        padding-bottom: 15px !important;
        filter: none !important;
    }

    div.footer-menu-row {
        border-top: 1px solid <?=get_theme_mod('secondary_color_setting');?>;
        border-bottom: 1px solid <?=get_theme_mod('secondary_color_setting');?>;
        padding-top: 20px;
        padding-bottom: 20px;
        margin-bottom: 37px;
    }
    p.video_block_delimiter {
        background: <?=get_theme_mod('secondary_color_setting');?>;
    }
    main div.videos-list article header.categoryVideoWatchLater,
    main div article header.categoryVideoWatchLater,
    main div article header.playlistsWidgetHeader {
        background:<?=get_theme_mod('primary_color_setting');?> !important;
    }
    main div article header.playlistsWidgetHeader {
        border-radius: 0px 0px 4px 4px;
    }
    div.footer-menu-container,
    ul#menu-footer-menu {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }
    ul#menu-footer-menu li a {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        text-align: right;
    }
    .footer-menu-container ul li {
        margin-right: 10px !important;
        margin-left: 10px !important;
    }
    .footer-menu-container ul li:first-child {
        margin-left: 0px !important;
    }
    .footer-menu-container ul li:last-child{
        margin-right:0 !important;
    }
    div.copyright *{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        opacity: 0.5;
        color: <?=get_theme_mod('secondary_text_site_color');?>;
    }
    div.copyright *:first-child,
    div.copyright{
        margin-top: 0!important;
        padding-top: 0!important;
    }
    div.copyright {
        margin-bottom: 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
    }
    div.copyright *:last-child {
        margin-bottom: 0!important;
        padding-bottom: 0!important;
    }
    p.footer_rta {
        margin-top: 0!important;
        margin-bottom: 0!important;
    }
    div#trending h3 {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        text-align: right;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5);
    }
    div#trending {
        margin-top: 0px !important;
        margin-bottom: 37px !important;
    }
    span#select_trending_country-button {
        background-color: transparent !important;
    }
    span#select_trending_country-button span.ui-selectmenu-text {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        opacity: 1 !important;
    }
    #select_trending_country-button.ui-button {
        width: 6em !important;
    }
    div#trending_tags a {
        background: <?=get_theme_mod('background_color')?>;
        border-radius: 4px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        text-align: right;
        opacity: 0.5;
        padding: 4px 10px;
        border: none;
    }
    div#trending_tags a:hover {
        background-color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
        opacity: 1;
    }
    aside div.happy-sidebar {
        margin-bottom: 40px;
    }
    section.widget {
        margin-bottom: 40px;
    }

    div.separator-pagination {
        height: 1px;
        border-top: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        margin-bottom: 20px;
        margin-top: 28px;
    }
    .pagination ul {
        padding-top: 0px !important;
        margin-bottom: 40px !important;
    }

    .site-branding .header-search input {
        background-color:<?=get_theme_mod('input_color')?>!important;
        border-top-left-radius: 4px!important;
        border-bottom-left-radius: 4px!important;
        height: 36px;
        padding: 8px 10px 8px 20px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        border: none !important;
    }
    span#search_select-button {
        border-top-right-radius: 4px!important;
        border-bottom-right-radius: 4px!important;
    }

    span#search_select-button {
        border: none !important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        background-color: <?=get_theme_mod('input_color')?> !important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        border-left: none !important;
        margin-left: -0.5px !important;
    }
    #search_select-button.ui-button {
        border-left: none !important;
    }
    .site-branding .header-search input#searchsubmit {
        width: 36px !important;
        height: 36px !important;
    }


    div.separator-search {
        width: 1px;
        height: 36px;
        border-left: 1px solid <?=get_theme_mod('primary_color_setting')?>;
        border-image: linear-gradient(0deg,
            <?=get_theme_mod('input_color')?>,
            <?=get_theme_mod('input_color')?>,
            <?=get_theme_mod('primary_color_setting')?>,
            <?=get_theme_mod('input_color')?>,
            <?=get_theme_mod('input_color')?>);
        border-image-slice: 1;
    }
      /*div.separator-search {
        border-left: 1px solid <?=get_theme_mod('primary_color_setting')?>;
        width: 1px;
        height: 20px;
    }*/
    div.search-btn-icon svg{
        margin-left: -1.55em;
        position: absolute;
        margin-top: 0.65em;
        z-index: 1;
        cursor: pointer;
    }

    .site-branding .logo {
        height: 35px;
    }
    .site-branding .header-search,
    #searchform{
        max-width: 380px;
        width: 100% !important;
    }
    ul#search_select-menu {
        background: <?=get_theme_mod('input_color')?>!important;
        border-radius: 0px 0px 4px 4px !important;
        border-top: 1px solid #293243 !important;
        width: 84px !important;
        margin-top: 1px !important;
    }
    ul#search_select-menu li.ui-menu-item div.ui-menu-item-wrapper {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }

    ul#search_select-menu li.ui-menu-item div.ui-menu-item-wrapper.ui-state-active {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }
    
    ul#search_select-menu li.ui-menu-item div.ui-menu-item-wrapper:hover{
        border: none !important;
        background: <?=get_theme_mod('btn_hover_color_setting')?> !important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }
    .ui-state-active, .ui-widget-content .ui-state-active {
        border: none !important;
        background: transparent !important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }
    .ui-widget-content {
        background:<?=get_theme_mod('text_site_color');?> !important;
    }

    span.welcome {
        display: inline-flex !important;
        vertical-align: middle !important;

    }

    div#upload_dropdown_menu,
    div#user_dropdown_menu{
        background: <?=get_theme_mod('secondary_color_setting')?>;
        border-radius: 4px;
        /*border-top: 1px solid #293243;*/
        max-height: 57px !important;
    }
    span.top_angle svg path {
        fill: <?=get_theme_mod('secondary_color_setting')?>;
    }
    div#user_dropdown_menu {
        border-radius: 4px !important;
        border: none !important;
    }

    div#user_dropdown_menu {
        max-height: 254px !important;
        max-width: 171px !important;
    }

    div#upload_dropdown_menu ul#drop_upload,
    div#user_dropdown_menu ul#drop_user{
        padding-left: 10px !important;
        margin-left: 0 !important;
        margin-bottom: 10px !important;
    }
    div#user_dropdown_menu ul#drop_user {
        padding-left: 0px !important;
    }

    div#upload_dropdown_menu ul#drop_upload li,
    div#user_dropdown_menu ul#drop_user li{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        margin-top: 5px !important;
        margin-bottom: 5px !important;
        background: transparent !important;
    }

    div#user_dropdown_menu ul#drop_user li {
        margin-top: 15px !important;
        margin-bottom: 15px !important;
    }
    div#user_dropdown_menu ul#drop_user li:first-child{
        margin-top: 20px !important;
    }
    div#user_dropdown_menu ul#drop_user li:last-child{
        margin-bottom: 20px !important;
    }
    div#upload_dropdown_menu ul#drop_upload li:first-child,
    div#user_dropdown_menu ul#drop_user li:first-child{
        margin-top: 10px !important;
    }
    div#upload_dropdown_menu ul#drop_upload li a,
    div#user_dropdown_menu ul#drop_user li a{
        background: transparent !important;
        color: rgba(<?php
            $hex = get_theme_mod('passive_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    div#user_dropdown_menu ul#drop_user li a svg path {
        fill: <?=get_theme_mod('passive_color_setting')?> !important;
    }
    div#user_dropdown_menu ul#drop_user li a {
        margin-left: 0 !important;
    }
    div#user_dropdown_menu ul#drop_user li:hover, div#upload_dropdown_menu ul#drop_upload li:hover{
        background: transparent !important;
    }
    div#user_dropdown_menu ul#drop_user li:hover a, div#upload_dropdown_menu ul#drop_upload li:hover a{
        background: transparent !important;
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1) !important;
    }
    div#user_dropdown_menu ul#drop_user li a > svg path{
        fill-opacity: 1 !important;
    }
    div#user_dropdown_menu ul#drop_user li:hover a > svg path{
        fill-opacity: 1 !important;
        fill: <?=get_theme_mod( 'links_color_setting');?> !important;
    }
    div#user_dropdown_menu ul#drop_user li a span {
        margin-left: 10px;
    }
    span.log_reg_separator {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 22px;
        text-align: right;
        margin-right: 10px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    span.welcome-guest-text {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    h2.categories-title,
    h2.tags-title,
    h1.tag-title,
    h2.actors-title,
    h1.actor-title,
    h1.category-title,
    h2.videos-title,
    h2.photos-title{
        font-style: normal;
        font-weight: 300;
        font-size: 36px;
        line-height: 42px;
        text-align: center;
    }
    h1.tag-title,
    h1.category-title,
    h2.videos-title,
    h2.photos-title{
        text-align: left;
    }
    h2.widget-title.photos-title {
        margin-bottom: 0!important;
        padding-bottom: 0!important;
        border-bottom: none!important;
    }
    header.header-photos-title {
        margin-bottom: 30px!important;
        padding-bottom: 20px!important;
        border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        line-height: 5px !important;
    }
    h2.h2_comments {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 300;
        font-size: 36px;
        line-height: 26px;
/*        padding-bottom: 20px;
        margin-bottom: 30px;*/
    }
    header.categories-entry-header {
        padding: 10px !important;
        background: rgba(<?php
            $hex = get_theme_mod('primary_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.8) !important;
        backdrop-filter: blur(10px)!important;
        /* Note: backdrop-filter has minimal browser support */
        border-radius: 0px 0px 4px 4px!important;
        position: absolute;
        bottom: 0;
        width: 100%;
    }
    header.categories-entry-header span.cat-title {
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
    }
    header.categories-entry-header span.cat-video-count {
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        text-align: right;
    }
    header.categories-entry-header span.cat-video-count span {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5);
    }
    div.separator-tags {
        border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        margin-top: 40px;
        margin-bottom: 40px;
    }
    .tags-letter-block .tag-items .tag-item a {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
    }
    .tags-letter-block .tag-items .tag-item a .count {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5);
    }
    div.separator-tags:last-child {
        margin-bottom: 0
    }
    .tags-letter-block {
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    }
    #popular_actress .popular_item p {
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
    }

    header.actors-entry-header,
    header.photos-entry-header {
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 0px 0px 4px 4px;
        padding-left: 10px!important;
        padding-bottom: 10px!important;
        padding-right: 9px!important;
        padding-top: 6px!important;
    }
    header.actors-entry-header p.actor-title,
    header.photos-entry-header p.photo-title {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
    }

    #breadcrumbs a, #breadcrumbs .current {
        font-family: 'Roboto',sans-serif;
    }

    header.actors-entry-header p span.actors-video-count,
    header.photos-entry-header p span.author-photos {
        float:right;
    }
    header.actors-entry-header p span.actors-video-count span{
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }

    article.thumb-block.actors div.post-thumbnail,
    article.thumb-block.album div.post-thumbnail {
        height: 291px;
        background-repeat: no-repeat;
        background-size: cover;
        object-fit: fill;
        background-position: top center;
    }
    /** Photos & GIFs -> Album thumbnails should preserve the aspect ratio on all screen sizes**/
    @media (max-width: 785px) {
        article.thumb-block.album div.post-thumbnail {
            height: 30vw !important;
        }
    }
    @media (min-width: 786px) and (max-width: 992px) {
        article.thumb-block.album div.post-thumbnail {
            height: 25vw !important;
        }
    }

    button#btnLoadMore,
    button#filterLoadMore{
        box-sizing: border-box;
        border-radius: 4px;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        text-align: center;
        padding-top: 12px;
        padding-bottom: 12px;
    }
    aside .rating-bar,
    aside .rating-bar.no-rate,
    footer .rating-bar,
    footer .rating-bar.no-rate{
        text-align: center;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
    }
    aside div.videos-list article{
        margin-bottom: 10px;
    }
    h2.advanced-filter-sidebar {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
    }
    span.collapse-all-tabs {
        float: right;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        text-align: center;
        /* normal and activ pink */
        color: <?=get_theme_mod('btn_color_setting')?>;
        cursor: pointer;
    }
    fieldset.fieldset {
        border:none !important;
        margin: 0px !important;
        margin-bottom: 10px !important;
        padding: 0 !important;
    }
    div#filter_porn_videos_area fieldset legend {
        width: 100%;
        font-family: 'Roboto',sans-serif;
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px  !important;
        padding: 10px 20px  !important;
        font-style: normal  !important;;
        font-weight: normal  !important;
        font-size: 14px  !important;
        line-height: 16px  !important;
        /* Icons wite */
        color: <?=get_theme_mod('text_site_color')?>;
        margin-bottom: 2px !important;
    }
    div#filter_porn_videos_area fieldset legend span.collapse-legend {
        float: right;
    }
    span.collapse-legend svg path {
        fill: <?=get_theme_mod('text_site_color');?> !important;
    }
    div#filter_porn_videos_area div.form-display_name,
    div#filter_porn_videos_area ul#cat_list{
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px;
        padding: 20px;
        width:100% !important;

    }
    div#filter_porn_videos_area div.form-display_name label,
    div#filter_porn_videos_area ul#cat_list label{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    div#filter_porn_videos_area ul#cat_list {
        margin-bottom: 0px !important;
    }
    div.filter-btns-videos {
        display: flex;
        justify-content: space-between;
        margin-top: 10px !important;
    }
    div.filter-btns-videos input[type=submit] {
        background-color: <?=get_theme_mod('btn_color_setting')?>;
        border-radius: 4px;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        font-family: 'Roboto',sans-serif;
        padding: 10px 10px;
        width: 100%;
        max-width: 154px;
        margin-right: 10px;
    }
    div.filter-btns-videos #clear_user_filter{
        font-family: 'Roboto',sans-serif;
        background-color: transparent !important;
        /* Text/opacity 50% */
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        box-sizing: border-box;
        border-radius: 4px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5);
        font-style: normal !important;
        font-weight: 500 !important;
        font-size: 14px !important;
        line-height: 16px !important;
        padding: 10px 10px;
        width: 100%;
        max-width: 154px;
    }

    fieldset.fieldset:last-child {
         margin-top: 0px !important;
         padding-top: 0px !important;
     }
    ul#cat_list li span {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5);
    }

    div#filter_porn_videos_area div.form-display_name label.ui-button,
    div#filter_porn_videos_area ul#cat_list label.ui-button {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
        outline: none !important;
        margin-left: 0!important;
        padding-left: 0!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
    }
    div#filter_porn_videos_area div.form-display_name label.ui-button span.ui-checkboxradio-icon-space,
    div#filter_porn_videos_area ul#cat_list label.ui-button span.ui-checkboxradio-icon-space{
        margin-right: 10px!important;
    }
    div#filter_porn_videos_area div.form-display_name label.ui-checkboxradio-radio-label.ui-checkboxradio-checked .ui-icon,
    div#filter_porn_videos_area ul#cat_list label.ui-checkboxradio-radio-label.ui-checkboxradio-checked .ui-icon {
        background-image: none !important;
    }
    div#filter_porn_videos_area div.form-display_name label.ui-checkboxradio-radio-label .ui-icon-background,
    div#filter_porn_videos_area ul#cat_list label.ui-checkboxradio-radio-label .ui-icon-background {
        background-image: none !important;
        width: 15px !important;
        height: 15px !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        box-sizing: border-box !important;
        border-radius: 4px !important;
        background-color: transparent !important;
        box-shadow: none !important;
    }
    div#filter_porn_videos_area div.form-display_name label.ui-checkboxradio-radio-label.ui-checkboxradio-checked .ui-icon-background, .ui-state-active .ui-icon-background,
    div#filter_porn_videos_area ul#cat_list label.ui-checkboxradio-radio-label.ui-checkboxradio-checked .ui-icon-background, .ui-state-active .ui-icon-background {
        width: 15px !important;
        height: 15px !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
        box-sizing: border-box !important;
        border-radius: 4px !important;
       /* background-color: transparent !important;*/
        box-shadow: none !important;
        background: <?=get_theme_mod('btn_hover_color_setting')?> !important;
        /*border-radius: 3px;*/
    }

    .ui-slider-horizontal {
        height: 2px !important;
    }
    .ui-slider-horizontal .ui-slider-handle {
        width: 10px!important;
        height: 10px!important;
        top: -.2em !important;
        margin-left: -.3em !important;
    }
    #slider-range span.ui-slider-handle.ui-corner-all.ui-state-default,
    #slider-height span.ui-slider-handle.ui-corner-all.ui-state-default,
    #slider-weight span.ui-slider-handle.ui-corner-all.ui-state-default {
        border: 2px solid <?=get_theme_mod('text_site_color')?>!important;
        background-color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    div#filter_porn_videos_area input#duration,
    div#filter_porn_videos_area span.duration-video-span {
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
    }

    div.videos-list article div.post-thumbnail span.duration {
        background: rgba(<?php
            $hex = get_theme_mod('primary_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.8)!important;
    }

    span.hd-video svg path {
        fill: <?=get_theme_mod('primary_color_setting');?> !important;
    }

    #porn_tattoo-button,
    #porn_piercing-button,
    #porn_hair_color-button,
    #porn_ethnicity-button,
    #porn_bust {
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 4px!important;
        padding:10px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        margin-bottom: 5px!important;
    }
    #porn_bust {
        margin-bottom: 0px!important;
        background-color: <?=get_theme_mod('input_color')?>!important;
        border: none!important;
    }
    ul#porn_tattoo-menu,
    ul#porn_piercing-menu,
    ul#porn_hair_color-menu,
    ul#porn_ethnicity-menu {
        margin-top: 1px;
        border-top: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 0 0 4px 4px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        margin-bottom: 5px!important;
    }
    ul#porn_tattoo-menu li.ui-menu-item div,
    ul#porn_piercing-menu li.ui-menu-item div,
    ul#porn_hair_color-menu li.ui-menu-item div,
    ul#porn_ethnicity-menu li.ui-menu-item div {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    ul#porn_tattoo-menu div.ui-menu-item-wrapper:hover,
    ul#porn_piercing-menu div.ui-menu-item-wrapper:hover,
    ul#porn_hair_color-menu div.ui-menu-item-wrapper:hover,
    ul#porn_ethnicity-menu div.ui-menu-item-wrapper:hover {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }

    .photos-count,
    .photos_views{
        position: absolute;
        top: 5px;
        right: 5px;
        color: <?=get_theme_mod('text_site_color')?>;
        padding: 5px 8px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        text-align: right;
        border-radius: 4px;
    }
    div.photos-count {
        padding-top: 3px;
        padding-bottom: 3px;
        padding-left: 6px;
        padding-right: 6px;
    }
    div.photos-count.gif-mark {
        background: rgba(0, 54, 167, 0.8) !important;
    }
    div.photos-count.image-mark {
        background: rgba(<?php
            $hex = get_theme_mod('icons_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.8) !important;
    }

    header.photos-entry-header p:not(.video_block_delimiter),
    header.photos-entry-header p:not(.video_block_delimiter) {
        margin: 5px 0px !important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        overflow: hidden;
    }
    span.author,
    span.posted-on{
        color: <?=get_theme_mod('secondary_text_site_color')?> !important;
    }
    header.photos-entry-header p span.author-photos {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    span.views {
        padding-left:0!important;
    }
    div.gallery-list #filter_users_area,
    div#filter_videos_area{
        background: <?=get_theme_mod('primary_color_setting');?>!important;
        /* Drop shadow card */
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25)!important;
        border-radius: 4px;
        padding: 20px;
    }


    div#filter_videos_area {
        margin-top: -40px !important;
    }
    div.gallery-list #filter_users_area a,
    span.selected_tag{
        background: <?=get_theme_mod('background_color')?>;
        border-radius: 4px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        text-align: right;
        opacity: 0.5;
        padding: 4px 10px;
        border: none;
        margin-right: 10px;
        margin-bottom: 10px;
        border: none !important;
    }
    div.gallery-list #filter_users_area a:hover {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
        opacity: 1;
    }
    span.selected_tag,
    div.gallery-list #filter_users_area a.a_selected_tag{
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
        opacity: 1;
    }

    div.gallery-list #filter_users_area a.a_noselected_tag{
        background: <?=get_theme_mod('background_color')?> !important;
        color: <?=get_theme_mod('passive_color_setting')?> !important;
    }

    div.gallery-list #filter_users_area a.a_selected_tag,
    span.selected_tag,
    div.gallery-list #filter_users_area a.a_noselected_tag:hover{
        background: <?=get_theme_mod('btn_hover_color_setting')?> !important;
        color: <?=get_theme_mod('links_color_setting')?> !important;
    }

    a.removeFromPlaylist svg path:nth-child(1) {
        fill: <?=get_theme_mod('primary_color_setting')?>!important;
        fill-opacity: 1;
    }
    a.removeFromPlaylist:hover svg path:nth-child(1) {
        fill: <?=get_theme_mod('btn_hover_color_setting')?>!important;
        fill-opacity: 1;
    }
    a.removeFromPlaylist:hover svg path:nth-child(2) {
        fill-opacity: 1;
        fill: <?=get_theme_mod('text_site_color')?>;
    }
    a.removeWatchList:hover svg rect {
        fill: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    a.removeWatchList:hover svg path {
        fill-opacity: 1;
    }
    div.separator-filter-tag {
        border-top: 1px solid <?=get_theme_mod('secondary_color_setting');?>!important;
        margin-top: 10px;
        margin-bottom: 20px;
    }
    #filter_users_area > form div > span,
    #clear_tag_filter{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
    }
    #clear_tag_filter {
        border: none !important;
        background: none!important;
        color: <?=get_theme_mod( 'links_color_setting');?> !important;
    }
    div.filters-select {
        padding: 10px 20px;
        background-color: <?=get_theme_mod('primary_color_setting')?>!important;
        border-radius: 4px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px;
        text-align: right;
        /* Text/opacity 50% */
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    span.adv-filter-tags,
    span.adv-filter-photos{
        margin-left: 10px !important;
        opacity: 0.5;
    }
    span.adv-filter-tags svg path,
    span.adv-filter-photos svg path,
    span.filter-angle svg path{
        fill: <?=get_theme_mod('secondary_text_site_color');?> !important;
    }
    div.filters-options {
        background: <?=get_theme_mod('primary_color_setting')?>!important;
        border-radius: 4px;
        padding: 10px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        right: 0px !important;
    }
    div.filters-options span {
        margin-top: 5px;
        margin-bottom: 5px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    div.filters-options span a{
        margin-top: 5px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    div.filters-options span:hover a,
    div.filters-options span:hover{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
        background: none!important;
        background-color: transparent !important;
    }

    .filters-options span a.active {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    div.filters-select.general-select div.filters-options.general {
        top: 105% !important;
    }
    div.filters-select.general-select span.filter-angle{
        margin-left: 10px;
    }
    div.filters-select.general-select span.filter-angle svg {
        fill: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
        opacity: 0.5;
    }
    div#filter_videos_area h3.widget-title {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        /* identical to box height */
        text-align: left;
        color: <?=get_theme_mod('text_site_color')?>;
    }

    div#filter_videos_area {
        background: <?=get_theme_mod('background_color')?>!important;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25) !important;
        padding: 30px !important;
    }
    div#filter_videos_area legend,
    div#filter_videos_area p.legend{
        width: 100%;
        font-family: 'Roboto',sans-serif;
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px !important;
        padding: 10px 20px !important;
        font-style: normal !important;
        font-weight: normal !important;
        font-size: 14px !important;
        line-height: 16px !important;
        color: <?=get_theme_mod('text_site_color')?>;
        margin-bottom: 2px !important;
    }
    div#filter_videos_area p.legend {
        margin-top: 0 !important;
    }
    div#filter_videos_area div.form-display_name {
        background: <?=get_theme_mod('primary_color_setting')?>;
        padding: 20px !important;
        width: 100% !important;
        max-width: 236px;
    }

    #filter_users_area, #filter_videos_area {
        z-index: 19999 !important;
    }
    div.filter_container_columns fieldset.fieldset {
        margin-right: 10px !important;
    }
    div.filter_container_columns fieldset.fieldset:last-child {
        margin-right: 0px !important;
    }
    div.filter_container_columns div.form-display_name label {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5) !important;
    }

    .ui-selectmenu-text {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5) !important;
    }

    div.filter_container_columns div.form-display_name label.ui-button,
    div.filter_container_columns ul#cat_list label.ui-button {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
        outline: none !important;
        margin-left: 0!important;
        padding-left: 0!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
    }
    div.filter_container_columns div.form-display_name label.ui-button span.ui-checkboxradio-icon-space,
    div.filter_container_columns ul#cat_list label.ui-button span.ui-checkboxradio-icon-space{
        margin-right: 10px!important;
    }
    div.filter_container_columns div.form-display_name label.ui-checkboxradio-radio-label.ui-checkboxradio-checked .ui-icon,
    div.filter_container_columns ul#cat_list label.ui-checkboxradio-radio-label.ui-checkboxradio-checked .ui-icon {
        background-image: none !important;
    }
    div.filter_container_columns div.form-display_name label.ui-checkboxradio-radio-label .ui-icon-background,
    div.filter_container_columns ul#cat_list label.ui-checkboxradio-radio-label .ui-icon-background {
        background-image: none !important;
        width: 15px !important;
        height: 15px !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        box-sizing: border-box !important;
        border-radius: 4px !important;
        background-color: transparent !important;
        box-shadow: none !important;
    }
    div.filter_container_columns div.form-display_name label.ui-checkboxradio-radio-label.ui-checkboxradio-checked .ui-icon-background, .ui-state-active .ui-icon-background,
    div.filter_container_columns ul#cat_list label.ui-checkboxradio-radio-label.ui-checkboxradio-checked .ui-icon-background, .ui-state-active .ui-icon-background {
        width: 15px !important;
        height: 15px !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
        box-sizing: border-box !important;
        border-radius: 4px !important;
        box-shadow: none !important;
        background: <?=get_theme_mod('btn_hover_color_setting')?> !important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }

    fieldset div.form-display_name label:hover,
    fieldset div.form-display_name label.ui-state-active,
    div#filter_porn_videos_area div.form-display_name label.ui-state-active, div#filter_porn_videos_area ul#cat_list label.ui-state-active,
    div#filter_porn_videos_area div.form-display_name label:hover, div#filter_porn_videos_area ul#cat_list label:hover{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }

    fieldset div.form-display_name label:hover span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-blank,
    fieldset ul#cat_list label:hover span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-blank,
    div#filter_porn_videos_area div.form-display_name label:hover span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-blank,
    div#filter_porn_videos_area ul#cat_list label:hover span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-blank{
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }

    div.filter_container_columns div.form-display_name label[for=duration] {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
    }
    div.filter_container_columns div.form-display_name input[name=duration],
    #filter_videos_area > form > div.filter_container_columns > fieldset:nth-child(3) > div.form-display_name.col-1-form.slidecontainer > span{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }

    #cat_tattoo-button,
    #cat_piercing-button,
    #cat_hair_color-button,
    #cat_ethnicity-button,
    #cat_porn_bust {
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 4px!important;
        padding:10px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        margin-bottom: 5px!important;
    }
    #cat_porn_bust {
        margin-bottom: 0px!important;
        background-color: <?=get_theme_mod('input_color')?>!important;
        border: none!important;
    }
    ul#cat_tattoo-menu,
    ul#cat_piercing-menu,
    ul#cat_hair_color-menu,
    ul#cat_ethnicity-menu {
        margin-top: 1px;
        border-top: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 0 0 4px 4px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        margin-bottom: 5px!important;
    }
    ul#cat_tattoo-menu li.ui-menu-item div,
    ul#cat_piercing-menu li.ui-menu-item div,
    ul#cat_hair_color-menu li.ui-menu-item div,
    ul#cat_ethnicity-menu li.ui-menu-item div {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    ul#cat_tattoo-menu div.ui-menu-item-wrapper:hover,
    ul#cat_piercing-menu div.ui-menu-item-wrapper:hover,
    ul#cat_hair_color-menu div.ui-menu-item-wrapper:hover,
    ul#cat_ethnicity-menu div.ui-menu-item-wrapper:hover {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }

    input#blogSearchBtn,
    input#uploadedSearch {
        background-color: <?=get_theme_mod('btn_color_setting')?>;
        border-radius: 4px;
        max-width: 36px;
        width: 100%;
        height: 36px!important;
        padding: 10px !important;
    }
    #searchforblog input[type=text] {
        background-color: <?=get_theme_mod('input_color')?> !important;
        border: 1px solid <?=get_theme_mod('input_color')?> !important;
        border-radius: 4px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
        padding: 10px;
        padding-left: 20px;
        height: 36px;
        max-width: 300px;
        width: 100%;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
    }
    form#searchforblog {
        max-height: 36px;
    }

    div#blog_cat_header,
    div#categories_list_content{
        background: <?=get_theme_mod('primary_color_setting')?> !important;
        border-radius: 4px;
        padding: 10px 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        /* Icons wite */
        color: <?=get_theme_mod('text_site_color')?> !important;
        margin-bottom: 5px;
        width: 300px;
        margin-right: 34px;
    }
    div#categories_list_content {
        margin: 0px !important;
        padding-right: 0 !important;

    }
    div#categories_list_content ul {
        list-style: none !important;
        margin: 0 20px 0 0;
        padding: 0 !important;
    }

    div#categories_list_content ul li {
        padding: 10px;
    }

    div#categories_list_content ul li:first-child {
        margin-top:10px;
        border-bottom: 1px solid #293243;
    }
    div#categories_list_content ul li.current_cat_article {
        background: <?=get_theme_mod('background_color')?>;
        box-shadow: inset 4px 4px 4px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
    }
    span.count_articles {
        float:right;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
    }

    #dropbox > p > span {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
    }

    div#blog_page_container {
        display: flex;
    }

    div#articles_container article {
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px;
        padding: 20px;
    }
    div#articles_container article {
        margin: 0px !important;
        margin-bottom: 10px !important;
    }
    div#articles_container article h2 {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: <?=get_theme_mod('text_site_color')?>;
        border-bottom:  1px solid #293243;
        margin: 0 !important;
        padding: 0 !important;
        padding-bottom: 10px !important;
    }
    div#articles_container article div.entry-meta {
        font-family: 'Roboto',sans-serif;;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 18px;
        margin: 0 !important;
        padding: 0 !important;
        padding-top: 10px !important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
        border-top:  1px solid #293243;
    }
    div#articles_container article div.entry-meta span.posted-on a{
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    span.read_more {
        float: right;
    }
    span.read_more a {
        color: <?=get_theme_mod('btn_color_setting')?> !important;
    }
    span.read_more a:hover {
        color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    div#articles_container article {
        display: flex;
    }
    div#articles_container article div.article_image {
        max-width: 181px;
        width: 100%;
        margin-right: 20px;
    }

    div.article_image {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        object-fit: fill;
        max-width: 181px;
        width: 100%;
        border: 4px;
    }

    header.article-title h1{
        border: none !important;
        padding-bottom: 0px !important;
    }
    header.article-title {
        border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
    }
    header.article-title div {
        display: flex;
    }
    header.article-title div p {
        margin: 0 !important;
        padding: 0 !important;
        float: right;
        text-align: right;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    header.article-title div p span a{
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    header.article-title {
        margin-bottom: 30px !important;
    }
    div.blog-tags-title {
        border-top: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        padding-top: 20px;
        padding-bottom: 20px;
        margin-top: 24px;
        display: inline-flex;
        width: 100%;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px!important;
        line-height: 21px!important;
        color: <?=get_theme_mod('text_site_color')?>;
    }
    ul#article_tags li.article_tags {
        border: none !important;
        background: <?=get_theme_mod('primary_color_setting')?> !important;
        border-radius: 4px;
        padding-top: 4px;
        padding-bottom: 4px;
        padding-left: 4px;
        padding-right: 4px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
    }
    ul#article_tags li.article_tags a {
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    ul#article_tags li.article_tags:hover a {
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;

    }
    ul#article_tags li.article_tags:hover {
        background: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    #reply-title {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    #cancel-comment-reply-link {
        font-family: 'Roboto',sans-serif;
        background: transparent !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5) !important;
        box-sizing: border-box;
        border-radius: 4px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
        font-style: normal !important;
        font-weight: 500 !important;
        font-size: 14px !important;
        line-height: 16px !important;
        padding: 10px 10px;
        margin-left: 20px;
        white-space: nowrap;
        margin-right: 20px;
    }
    span.viewers {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
    }

    a.comment-reply-link:hover,
    li.li_report a:hover{
        color:<?=get_theme_mod('text_site_color');?> !important;
    }
    h2#reply-title.widget-title {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 300;
        font-size: 36px;
        line-height: 42px;
        padding-bottom: 20px;
        border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        margin-bottom: 30px;
    }
    #reply-title p {
        padding: 0!important;
        margin: 0 !important;
        float: right;
        font-family: 'Roboto',sans-serif;
        font-style: normal!important;;
        font-weight: normal!important;
        font-size: 18px!important;
        line-height: 21px!important;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
        margin-top: 10px;
        white-space: nowrap;
    }
    a.exit {
        color: <?=get_theme_mod('btn_color_setting')?> !important;
        margin-left: 40px;
    }
    a.exit:hover {
        color: <?=get_theme_mod('btn_hover_color_setting')?>!important;
    }
    a.user-profile {
        color: <?=get_theme_mod('links_color_setting')?> !important;
    }
    input.post-comment {
        font-family: 'Roboto',sans-serif;
        font-style: normal!important;
        font-weight: bold!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
        padding-top: 10px!important;
        padding-bottom: 10px!important;
        padding-left: 30px!important;
        padding-right: 30px!important;
        border-radius: 4px;
    }
    textarea#comment {
        background-color: <?=get_theme_mod('input_color')?> !important;
        border-radius: 4px;
        max-width: 621px;
        padding: 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
    }
    form#commentform p.form-submit {
        margin:0 !important;
        padding:0 !important;
    }

    .comment-author img,
    .comment-author svg{
        width: 40px!important;
        height: 40px!important;
        border-radius: 40px !important;
    }
    div.vcard {
        max-width: 40px!important;
        margin-right: 10px!important;
    }
    cite.fn a {
        font-family: 'Roboto',sans-serif;
        font-style: normal!important;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: <?=get_theme_mod( 'links_color_setting');?>!important;
    }
    #comment_tabs button.tab-link {
        font-family: 'Roboto',sans-serif;
        font-style: normal!important;
    }
    #comment_tabs button.tab-link.active {
        border-color: <?=get_theme_mod('links_color_setting')?>!important;
        border-width: 1px !important;
    }
    a.comment-date {
        font-family: 'Roboto',sans-serif;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        margin-left: 10px!important;
        /* Text/opacity 50% */
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
    }
    div.front-edit-comments a i{
        color: <?=get_theme_mod('icons_color_setting')?>!important;
        font-size: 16px!important;
        margin-left: 5px !important;
    }
    .commentmetadata p,
    div.reply,
    ol.children{
        margin-left: 55px !important;
        background: none !important;
        font-family: 'Roboto',sans-serif;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 18px!important;
        color: <?=get_theme_mod('text_site_color')?>!important;
    }
    div.reply,
    div.reply a,
    div.reply a i{
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    a.hold svg path,
    a.comment-edit-link svg path,
    a.delete svg path {
        fill: <?=get_theme_mod('secondary_text_site_color');?>!important;
    }

    ol.children {
        width: calc(100% - 50px)!important;
        margin-left: 50px !important;
    }
    span.show_replays,
    span.hide_replays {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('btn_color_setting')?> !important;
        cursor: pointer;
        margin-left: 55px;
    }
    span.show_replays svg,
    span.hide_replays svg{
        margin-right: 10px;
    }
    span.show_replays svg path,
    span.hide_replays svg path {
        fill: <?=get_theme_mod('btn_color_setting')?> !important;
    }
    span.show_replays:hover,
    span.hide_replays:hover {
        color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    span.show_replays:hover svg path,
    span.hide_replays:hover svg path {
        fill: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }

    input[type=submit] {
        background: <?=get_theme_mod('btn_color_setting')?>;
        border-radius: 4px;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        font-family: 'Roboto',sans-serif;
        padding: 10px 10px;
        width: 100%;
        max-width: 154px;
    }
    div.box-shadow {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
    }
    div.box-shadow h1.video-title {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 28px;
        /* Text/wite */
        color: <?=get_theme_mod('text_site_color')?>;
    }
    div.entry-content.under_video {
        background: <?=get_theme_mod('secondary_background_color')?>;
        border-radius: 0px 0px 4px 4px;
        padding-top: 20px !important;
        padding-left: 20px !important;
        padding-right: 20px !important;
        padding-bottom: 30px !important;
        display: flex;
        margin-top: -2px;
    }
    div#rating-coll {
        background: linear-gradient(135deg, rgb(66,26,78) 50%, rgb(52,34,77) 100%);
        backdrop-filter: blur(120px);
        border-radius: 0px 0px 0px 4px;
        padding: 40px;
        max-width: 182px;
        margin-right: 30px;
        text-align: center !important;
        width: 100%;
    }
    div.user_pic a div {
        max-width: 80px;
        height: 80px;
        border-radius: 4px;
    }
    div#video_info_about_user span.user,
    div#video_info_about_user span.count_videos,
    div#video_info_about_user span.count_subs {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 300;
        font-size: 24px!important;
        line-height: 28px!important;
        /* identical to box height */
        text-align: center !important;
        margin: 0 auto;
        color: <?=get_theme_mod('text_site_color')?>;
    }
    div.user_pic {
        margin-right: 20px;
    }
    div#video_info_about_user span.user {
        /*margin-bottom: 5px;*/
        display: inline-block;
    }
    div#video_info_about_user span.count_videos {
        margin-bottom: 5px;
        display: inline-block;
        margin-right: 20px;
    }
    div#video_info_about_user span.count_videos,
    div#video_info_about_user span.count_subs {
        font-size: 14px!important;
        line-height: 16px!important;
    }
    div#video_info_about_user span.count_videos span,
    div#video_info_about_user span.count_subs span{
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    #subscribe_on_author {
        background: <?=get_theme_mod('btn_color_setting')?>;
        border-radius: 4px;
        width: 122px;
        padding: 10px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: bold;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?> !important;
        margin: 0 auto;
        margin-top: 20px !important;
        text-align:center;
    }
    #subscribe_on_author:hover {
        background: <?=get_theme_mod('btn_hover_color_setting')?>;

    }
    div.like_legend {
        background: <?=get_theme_mod('secondary_color_setting')?>;
        border-radius: 4px 4px 0px 0px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-bottom: -3px!important;
        min-height: 47px;
    }
    div#rating {
        float: none !important;
        width: 100%!important;
        padding: 9px 19px !important;
    }
    <?php if(is_single()):?>
        article > div.like_legend > div:nth-child(1)  {
            height: 47px;
        }
    <?php endif;?>
    <?php if(xbox_get_field_value('my-theme-options', 'enable_view') == 'off'):?>
        div#rating {
            padding: 9px 0px !important;
        }
    <?php endif;?>
    div#rating span {
        font-family: 'Roboto',sans-serif;
        font-size: 18px!important;
    }
    span#video-views {
        color:  rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    span#video-views span {
        color: <?=get_theme_mod('text_site_color')?> !important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
    }

    
    span.percentage{
        color: <?=get_theme_mod('text_site_color')?> !important;
    }

    span#video-rate span.dislikes_count,
    div.rating_full_screen span.dislikes_count{
        color: <?=get_theme_mod('secondary_text_site_color');?>!important;
    }
    div#rating.rating_full_screen {
        padding-left: 5px !important;
    }
    #video-tabs button,
    #video_tabs2 button{
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: <?=get_theme_mod('links_color_setting')?> !important;
        padding-top: 0 !important;
    }
    #video-tabs button {
        border-color: transparent!important;
        border: none !important;
        padding: 10px 20px!important;
        background: <?=get_theme_mod('secondary_color_setting')?> !important;
        border-bottom: none!important;
        display: inline-flex;
        vertical-align: middle;
        align-items: center;
        border-bottom:1px solid <?=get_theme_mod('secondary_color_setting')?> !important;
    }
    #video-tabs button.tab-link.active {
        border-bottom:1px solid <?=get_theme_mod('secondary_background_color')?>!important;
    }
    #video-tabs a#tracking-url,
    #video-tabs a#tracking-url2 {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        /*text-transform: uppercase!important;*/
        color: <?=get_theme_mod('links_color_setting')?> !important;
        padding-top: 0 !important;
    }
    #video-tabs button.active {
        background: <?=get_theme_mod('secondary_background_color')?> !important;
        box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25)!important;
        border-radius: 4px 4px 0px 0px!important;
        border-color: transparent!important;
        border: none !important;
        padding-bottom: 13px !important;
    }
    #video-tabs button svg,
    #video_tabs a svg{
        margin-right: 10px!important;
        color: <?=get_theme_mod('links_color_setting')?> !important;
    }
    #video-tabs a#tracking-url svg,
    #video-tabs a#tracking-url2 svg {
        margin-right: 10px!important;
        color: <?=get_theme_mod('links_color_setting')?> !important;
    }
    #video_tabs a {
        border-color: transparent!important;
        border: none !important;
        padding: 12px 20px !important;
        border-bottom: none!important;
        display: inline-flex;
        vertical-align: middle;
        align-items: center;
    }
    #video_tabs a.tab-link {
        padding-right: 20px!important;
    }
    #video_tabs a.tab-link,
    #add_to_fav_video,
    #add_to_fav_video2,
    #tracking-url,
    #tracking-url2{
        display: inline-flex!important;
        vertical-align: middle!important;
        align-items: center!important;
        padding-right: 20px !important;
    }
    #tracking-url,
    #tracking-url2 {
        display: inline-flex!important;
        vertical-align: middle!important;
        align-items: center!important;
        padding-right: 20px !important;
    }

    div.video_tab_separator {
        border-color: transparent!important;
        border: none !important;
        padding: 12px 20px 12px 0 !important;
        background: <?=get_theme_mod('secondary_color_setting')?> !important;
        border-bottom: none!important;
        display: inline-flex;
        vertical-align: middle;
        align-items: center;
        height: 41px;
    }
    div.separator {
        border: 1px solid rgba(255, 255, 255, 0.2);
        transform: rotate(0deg);
        height: 20px;
    }
    a#add_to_fav_video i.fa.fa-heart-o,
    a#add_to_fav_video2 i.fa.fa-heart-o{
        font-family: FontAwesome;
        color: <?=get_theme_mod('secondary_text_site_color')?> !important;
    }
    a#add_to_fav_video i.fa.fa-heart,
    a#add_to_fav_video2 i.fa.fa-heart{
        color: <?=get_theme_mod('secondary_text_site_color')?> !important;
    }
    a#add_to_fav_video i.fa.fa-heart-o,
    a#add_to_fav_video2 i.fa.fa-heart-o,
    a#add_to_fav_video i.fa.fa-heart,
    a#add_to_fav_video2 i.fa.fa-heart {
        font-size: 20px !important;
    }
    div.show-more-related {
        float: right!important;
    }
    div.show-more-related a {
        background-color: <?=get_theme_mod('btn_color_setting')?>!important;
        border-color: <?=get_theme_mod('btn_color_setting')?>!important;
        border-radius: 4px!important;
        padding: 8px 30px!important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: <?=get_theme_mod('text_site_color')?> !important;
        margin-top:0!important;
        margin-bottom:0!important;
    }
    button.approve_comments {
        border-bottom: 2px solid #293346 !important;
    }
    
    div#video-date {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        text-align: left;
        /* Text/opacity 50% */
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5);
    }
    div#video-about {
        width: 100% !important;
    }
    #edit_user_video {
        border-radius: 4px!important;
        padding: 10px 20px!important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        background-color: transparent !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        box-sizing: border-box;
        width: 100% !important;
        max-width: 122px !important;
    }
    div#video-actors {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        text-align: left;
    }
    div#video-actors span{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    div#video-actors {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }
    div.separator_video {
        border-bottom: 1px solid #293243;
        margin-top: 20px;
        margin-bottom: 20px;
    }

    div.cat-header span,
    div.tags-header span,
    div#video-actors span{
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color:  <?=get_theme_mod('text_site_color')?> !important;
    }
    div.tags-list {
        margin-top:5px !important;
    }

    div.pornstars_list{
        margin-top: 10px !important;
    }
    div.cat-list a,
    div.tags-list a,
    div.pornstars_list a{
        background: <?=get_theme_mod('background_color')?>!important;
        padding: 4px 10px !important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal;
        font-weight: normal;
        font-size: 12px!important;
        line-height: 14px!important;
        /* identical to box height */
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        border-radius: 4px !important;
        border: none !important;
        margin-left: 0 !important;
        margin-right: 10px !important;
        margin-top: 0 !important;
        margin-bottom: 10px !important;
    }
    div.pornstars_list a {
        float: left;
        margin-bottom: 0 !important;
    }
    div.pornstars_list > div {
        align-items: center !important;
    }

    div.render-x a {
        background: <?=get_theme_mod('secondary_color_setting')?>!important;
        margin-right: 0px !important;
        border-top-right-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }
    div.cat-list a:hover,
    div.tags-list a:hover,
    div.pornstars_list a:hover{
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
        background: <?=get_theme_mod('btn_hover_color_setting')?>!important;
    }
    #apply_btn,
    #close_btn,
    #delete_user_video,
    #delete_user_video_on_uploads_page,
    #remove_video_tags,
    #remove_video_tags_on_upload_page,
    #apply_on_my_uploads_page,
    #sendReport,
    #close_modal_on_my_uploads{
        border-radius: 4px!important;
        font-style: normal;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 16px!important;
        font-family: 'Roboto',sans-serif!important;
        padding: 10px 20px!important;
        /*width: 100%!important;
        max-width: 154px;*/
    }
    #remove_video_tags:hover,
    #remove_video_tags_on_upload_page:hover {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }

    #remove_video_tags:hover svg path,
    #remove_video_tags_on_upload_page:hover svg path {
        fill: <?=get_theme_mod('text_site_color');?> !important;
        fill-opacity: 1 !important;
    }

    #apply_btn,
    #apply_on_my_uploads_page{
        max-width: 96px !important;
    }
    #close_btn,
    #close_modal_on_my_uploads{
        background-color: transparent !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        box-sizing: border-box;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    #delete_user_video,
    #delete_user_video:hover,
    #delete_user_video_on_uploads_page,
    #delete_user_video_on_uploads_page:hover{
        background: transparent !important;
        border: none!important;
        margin-left: 5px!important;
        padding-left: 0px!important;
        padding-right: 0px!important;

    }

    #delete_user_video,
    #delete_user_video_on_uploads_page{
        color:rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }

    form#message > fieldset > div:nth-child(16) > svg path,
    #message > fieldset > div:nth-child(5) > svg path {
        fill:<?=get_theme_mod('secondary_text_site_color');?> !important;
        fill-opacity: 0.5 !important;
    }

    #delete_user_video:hover,
    #delete_user_video_on_uploads_page:hover{
        color: <?=get_theme_mod('text_site_color');?> !important;
    }
    form#message > fieldset > div:nth-child(16):hover > svg path {
        fill:<?=get_theme_mod('text_site_color');?> !important;
        fill-opacity: 1 !important;
    }
    #message > fieldset > div:nth-child(5):hover > svg path {
        fill:<?=get_theme_mod('text_site_color');?> !important;
        fill-opacity: 1 !important;
    }

    #message input,
    #message span#video_category_select-button {
        border-radius: 4px!important;
    }
    div.entry-content.under_video div.tab-content {
        width: 100%;
    }
    .load-more-tags-btn,
    .read-more-btn{
        font-size: 14px!important;
        font-family: 'Roboto',sans-serif!important;
    }

    div#video-playlist h4 {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 18px!important;
        line-height: 21px!important;
        /* identical to box height */
        color: <?=get_theme_mod('text_site_color')?> !important;
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        flex-wrap: wrap;
    }
    #createPlaylist {
        border-color: transparent!important;
        background-color:transparent!important;
        padding: 10px;
        float: right;
        display: inline-flex;
    }
    #createPlaylist {
        cursor: pointer;
        font-family: 'Roboto',sans-serif !important;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        color: <?=get_theme_mod('text_site_color')?> !important;
    }
    span#isnt_in {
        font-family: 'Roboto',sans-serif !important;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        color: <?=get_theme_mod('text_site_color')?>;
    }
    #createPlaylist svg {
        margin-right: 10px !important;
    }
    #createPlaylist svg rect{
        fill:  <?=get_theme_mod('text_site_color')?> !important;
    }
    #video-report table{
       margin-bottom: 0px !important;
    }
    #report_reason {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        color: <?=get_theme_mod('text_site_color')?> !important;
        margin-bottom: 20px;
    }
    span#reportType-button,
    span#user_post_report_type-button,
    span#photo_report_type-button,
    span#user_report_type-button{
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 4px;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        text-align: left!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        padding: 10px 20px !important;
    }
    span#user_post_report_type-button,
    span#photo_report_type-button,
    span#user_report_type-button{
        max-width: 100%!important;
        background: <?=get_theme_mod('input_color')?>!important;
        margin-top: 10px;
        border-radius: 4px !important;
    }
    span#user_report_type-button {
        width: 100% !important;
        border: 4px !important;
    }
    textarea#reportMsg,
    textarea#userPostReportMsg,
    textarea#photoReportMsg,
    textarea#userReportMsg{
        background-color: <?=get_theme_mod('input_color')?> !important;
        border-radius: 4px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        text-align: left!important;
    }
    span#reportType-button span.ui-icon-triangle-1-s,
    span#user_post_report_type-button span.ui-icon-triangle-1-s,
    span#photo_report_type-button span.ui-icon-triangle-1-s,
    span#user_report_type-button span.ui-icon-triangle-1-s{
        margin-left: 10px !important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    #sendReport {
        margin-top: 20px;
    }
    ul#reportType-menu,
    ul#user_post_report_type-menu,
    ul#photo_report_type-menu,
    ul#user_report_type-menu{
        margin-top: 1px;
        padding: 10px 20px !important;
    }
    ul#user_post_report_type-menu,
    ul#photo_report_type-menu,
    ul#user_report_type-menu{
        padding: 10px !important;
        margin-top: 2px !important;
        background: <?=get_theme_mod('input_color')?> !important;
    }
    ul#reportType-menu li div.ui-menu-item-wrapper,
    ul#user_post_report_type-menu li div.ui-menu-item-wrapper,
    ul#photo_report_type-menu li div.ui-menu-item-wrapper,
    ul#user_report_type-menu li div.ui-menu-item-wrapper{
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        text-align: left!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    ul#reportType-menu li div.ui-state-active,
    ul#user_post_report_type-menu li div.ui-state-active,
    ul#photo_report_type-menu li div.ui-state-active,
    ul#user_report_type-menu li div.ui-state-active{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    ul#reportType-menu li:hover div,
    ul#user_post_report_type-menu li:hover div,
    ul#photo_report_type-menu li:hover div,
    ul#user_report_type-menu li:hover div{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    ul#reportType-menu li div{
        padding-left: 0 !important;
    }
    ul#photo_report_type-menu li div,
    ul#user_report_type-menu li div{
        padding-left:10px !important;
    }
    ul#user_post_report_type-menu {
        -moz-box-shadow: 0px 2px 5px 0 rgb(0 0 0 / 50%);
        -webkit-box-shadow: 0px 2px 5px 0 rgb(0 0 0 / 50%);
        -o-box-shadow: 0px 2px 5px 0 rgb(0 0 0 / 50%);
        box-shadow: 0px 2px 5px 0 rgb(0 0 0 / 50%);
    }
    #sendPostReport,
    #sendPhotoReport,
    #sendUserReport{
        border-radius: 4px!important;
        font-style: normal;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 16px!important;
        font-family: 'Roboto',sans-serif!important;
        padding: 10px 20px!important;
        margin-top: 10px !important;
    }
    h2#reply-title2{
        background: <?=get_theme_mod('btn_color_setting')?> !important;
        border-radius: 4px!important;
        padding: 10px 30px!important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 16px!important;
        text-align: right!important;
        color:<?=get_theme_mod('text_site_color')?> !important;
        max-width: 147px !important;
        margin-top: 40px!important;
    }
    p.must-p {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
    }
    p.must-p a {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }


    div#users_feeds {
        border-radius: 0 0 4px 4px;
        padding: 20px;
    }
    #users_feeds .feeds {
        background: <?=get_theme_mod('primary_color_setting');?> !important;
        border-radius: 4px !important;
        padding: 20px !important;
        margin-bottom: 10px !important;
    }
    div.users_info {
        border-bottom: 1px solid <?=get_theme_mod('secondary_color_setting');?>;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    div.users_info a img {
        width: 40px;
        height: 40px;
        border-radius: 40px;
        margin-right: 10px !important;
    }
    div.users_info a svg {
        border-radius: 40px;
        margin-right: 10px !important;
    }
    div.users_info p {
        margin-top: 0;
        margin-bottom: 0;
    }
    div.users_info p a {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 18px!important;
        line-height: 21px!important;
        /* identical to box height */
        color: <?=get_theme_mod('links_color_setting')?> !important;
        margin-right: 5px !important;
    }
    div.users_info p span.wrote {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 18px!important;
        line-height: 21px!important;
        /* identical to box height */
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5) !important;
    }
    #users_feeds > div > div > p > span:nth-child(5) {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5) !important;
    }
    p.users_post {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 18px!important;
        /* or 129% */
        color: <?=get_theme_mod('text_site_color');?> !important;
    }
    
    div#users_feeds div#form {
        background: <?=get_theme_mod('primary_color_setting');?> !important;
        padding: 20px 40px !important;
    }
    form#write_a_post_form textarea{
        background-color: <?=get_theme_mod('input_color')?> !important;
        border-radius: 4px;
        padding: 20px !important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 18px!important;
        /* Icons wite */
        color: <?=get_theme_mod('text_site_color');?> !important;
        border: none !important;
        margin-top: 20px;
        margin-bottom: 20px;
        min-height: 94px !important;
    }
    form#write_a_post_form label {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .8) !important;
    }
    form#write_a_post_form label svg {
        margin-right: 10px;
    }
    form#write_a_post_form label svg path {
        fill: <?=get_theme_mod('secondary_text_site_color');?> !important;
        fill-opacity: 0.8 !important;
    }
    #to_publish,
    #сancel {
        width: 100% !important;
        max-width: 89px!important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 142.69%;
        color:<?=get_theme_mod('text_site_color');?> !important;
        padding: 8px !important;
    }
    #to_publish {
        background-color: <?=get_theme_mod('btn_color_setting')?> !important;
        border-radius: 4px;
        border: 1px solid <?=get_theme_mod('btn_color_setting')?> !important;
    }
    #to_publish:hover {
        background-color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
        border-color:<?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    #сancel {
        background-color: transparent !important;
        /* Icons 50% */
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        box-sizing: border-box;
        border-radius: 4px;
        color:rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    #write_a_post {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 142.69%;
        color: <?=get_theme_mod('text_site_color');?> !important;
        padding: 8px 30px !important;
        background-color: <?=get_theme_mod('primary_color_setting');?>!important;
        border-radius: 4px;
        border: none !important;
        margin-bottom: 5px;
        width: 100%;
    }
    #write_a_post:hover {
        background: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    #write_a_post svg {
        margin-right: 10px;
        fill: <?=get_theme_mod('text_site_color');?>;
        fill-opacity:1 !important;
    }
    #write_a_post svg path {
        fill: <?=get_theme_mod('text_site_color');?>;
    }
    #activity_list h2.recent_activity,
    #suggested_list h2.suggested_list{
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 18px!important;
        line-height: 21px!important;
        /* identical to box height */
        text-align: left!important;
        color: <?=get_theme_mod('text_site_color');?> !important;
    }

    div#activity_container {
        padding: 0!important;
    }
    div.activity_block {
        padding: 0!important;
        margin-bottom: 10px !important;
        border-radius: 4px;
    }
    div.activity_block p.recent_user_info {
        background:<?=get_theme_mod('secondary_color_setting')?> !important;
        border-radius: 4px;
        margin: 6px 0px !important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 14px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        padding: 6px 20px !important;
        margin-bottom: 2px !important;
        display: flex;
        justify-content: space-between;
    }
    p.recent_user_info > span:nth-child(1) {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    span.recent_time_ago {
        float: right;
        text-align: right;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    div.activity_content {
        width: 100%;
        background:<?=get_theme_mod('secondary_color_setting')?> !important;
        border-radius: 4px;
        margin: 6px 0px !important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 14px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        padding: 10px 20px !important;
    }
    div.activity_content > div:first-child {
        border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?> !important;
        padding-bottom: 5px !important;
        margin-bottom: 5px !important;
        display: flex !important;
    }
    p.post_title {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 12px!important;
        line-height: 14px!important;
        color: <?=get_theme_mod('text_site_color');?> !important;
    }
    div.recent_video_info p span {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 12px !important;
        line-height: 14px !important;
        color: <?=get_theme_mod('text_site_color');?> !important;
    }
    div.recent_video_info p span > span {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    div.activity_content.video div:last-child p span {
        margin-right: 10px !important;
    }
    div.recent_video_watchlater {
        width: 100% !important;
        display: flex !important;
        justify-content: space-between;
        margin-left: 5px !important;
    }
    div.recent_video_info {
        width: 100% !important;
        display: flex !important;
        justify-content: space-between;
    }
    div.recent_video_info p a {
        color: <?=get_theme_mod('btn_color_setting')?> !important;
        font-style: normal !important;
    }
    div.recent_video_info p a:hover {
        color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    p.recent_user_info span a {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        /* Icons wite */
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }
    span.users_control_btns span.report_user_post{
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5) !important;
    }
    span.users_control_btns span.report_user_post:hover {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }

    span.users_control_btns svg path{
        fill: <?=get_theme_mod('secondary_text_site_color');?> !important;
        fill-opacity: 0.5 !important;
    }

    span.users_control_btns svg {
        margin-right: 5px;
    }
    div.activity_content.image div a {
        max-width: 50px !important;
        margin-right: 5px !important;
        max-height: 50px !important;
        border-radius: 4px !important;
    }
    div.activity_content.image div:last-child p {
        text-align: right;
    }
    div.activity_content.image div:last-child p span a{
        color: <?=get_theme_mod('btn_color_setting')?> !important;
        font-style: normal !important;
        font-family: 'Roboto',sans-serif!important;
        font-weight: normal!important;
        font-size: 12px!important;
        line-height: 14px!important;
    }
    div.activity_content.image div:last-child p span a:hover {
        color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }


    <?php if(is_page_template('template-community.php')):?>
    div#content {
        padding-left: 0!important;
        padding-right: 0!important;
    }
    #community-tabs {
        width: 100%;
        background: <?=get_theme_mod('secondary_color_setting')?>;
        border-radius: 4px 4px 0px 0px;
        text-align: center;
    }
    #community_tab_content {
        background: <?=get_theme_mod('secondary_background_color')?>;
        padding-right: 24px;
    }

    #community-tabs button.feed,
    #community-tabs button.members,
    #community-tabs button.advanced_search {
        padding: 12px!important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
        display: inline-flex!important;
        align-items: flex-end!important;
    }
    #community-tabs button.feed,
    #community-tabs button.members,
    #community-tabs button.advanced_search {
        padding-left: 23px!important;
        padding-right: 23px!important;
    }
    #community-tabs button.feed svg,
    #community-tabs button.members svg,
    #community-tabs button.advanced_search svg {
        margin-right: 10px!important;
    }
    #community-tabs button.feed.active,
    #community-tabs button.members.active,
    #community-tabs button.advanced_search.active {
        background: <?=get_theme_mod('secondary_background_color')?>!important;
        box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25)!important;
        border-radius: 4px 4px 0px 0px!important;
    }

    a.see_more_in_feed {
        color: <?=get_theme_mod('btn_color_setting')?> !important;
        font-style: normal !important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 16px!important;
        line-height: 16px!important;
    }
    a.see_more_in_feed:hover {
        color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    div.image_in_feed {
        margin-left: 10px !important;
        display: inline-flex;
        align-items: center;
    }
    #members #members_list, #users_suggested
    .community-list:not(.suggested-com-list) .users_list,
    .community-list:not(.suggested-com-list) .users_list2{
        background: <?=get_theme_mod('secondary_background_color')?>!important;
        border-radius: 0px 0px 4px 4px!important;
    }
    footer#colophon {
        margin-top: 0!important;
    }
    <?php endif;?>

    div.users_list ,
    div.users_list2 {
        padding: 20px!important;
        display:flex;
        flex-wrap:wrap;
    }
    div.item_user,
    div.item_user2{
        max-width: 300px !important;
        display: flex;
        justify-content: space-between;
        padding: 10px 15px!important;
        background: <?=get_theme_mod('secondary_color_setting')?>!important;
        border-radius: 4px!important;
        margin-bottom: 5px;
        align-items: center;
        width: calc((100% - 30px)/3);
        margin-right: 5px;
    }
    div.item_user2{
        width: calc((100% - 30px)/4);
    }
    div.item_user:nth-child(3n-1){
        margin-left:5px;
        margin-right:10px;
    }

    div.item_user:nth-child(3n+3){
        margin-right:0px;
    }
    div.item_user2:nth-child(4n+4){
        margin-right:0px;
    }
    div.users_list p.user_pic,
    div.users_list2 p.user_pic{
        margin-top: 0;
        margin-bottom: 0;
        padding-bottom: 0;
        padding-top: 0;
    }
    div.users_list p.user_pic a img,
    div.users_list2 p.user_pic a img,
    div.users_list p.user_pic a svg,
    div.users_list2 p.user_pic a svg{
        width: 40px;
        height: 40px;
        border-radius: 40px;
        margin-right: 10px;
    }
    div.users_list > a,
    div.users_list2 > a{
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: <?=get_theme_mod('text_site_color')?>!important;
    }
    div.item_user.sidebar {
        width: 100%;
        margin-right:0;
        margin-left:0;
    }
    div#suggested_list h2.suggested_list {
        padding-bottom: 10px!important;
    }

    header.community-header {
        margin-left: 24px;
        margin-right: 24px;
        clear: both;
    }
    div.community-list.suggested-com-list article {
        height: 728px;
        background: <?=get_theme_mod('secondary_background_color')?>!important;
    }
    #filter_users_area {
        background: <?=get_theme_mod('secondary_background_color')?>!important;
        border-radius: 0px 4px 4px 4px;
        padding: 20px;
    }

    div#form_filter_users div.filter-block {
        width: 212px!important;
        border-radius: 4px!important;
        padding: 20px!important;
    }
    div#form_filter_users div.form-display_name {
        background: <?=get_theme_mod('secondary_color_setting')?>;
        padding: 20px !important;
        width: 100% !important;
        max-width: 212px!important;
    }
    article.searched_users {
        background: <?=get_theme_mod('secondary_background_color')?>;
        border-radius: 4px;
        padding: 20px;
    }
    div#filter_users_area fieldset label.ui-checkboxradio-label.ui-corner-all.ui-button {
        border: none!important;
        background: none!important;
        padding-left:0 !important;
        padding-right:0 !important;
    }
    div#filter_users_area fieldset label[for=username],
    div#filter_users_area fieldset label[for=location],
    div#filter_users_area fieldset label[for=country_user-button],
    div#filter_users_area fieldset label[for=user_gender-button],
    div#filter_users_area fieldset label[for=user_orientation-button],
    div#filter_users_area fieldset label[for=relationship-button],
    div#filter_users_area fieldset label[for=user_hair_color-button],
    div#filter_users_area fieldset label[for=user_eye_color-button] {
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    span#country_user-button,
    span#user_gender-button,
    span#user_orientation-button,
    span#relationship-button,
    span#user_hair_color-button,
    span#user_eye_color-button {
        width: 100%;
    }
    div#div_user_gender p,
    div.slideheight p,
    div.slideweight p{
        margin: 0 !important;
    }
    input.location,
    input.username{
        margin-bottom: 5px!important;
        background-color: <?=get_theme_mod('input_color')?>!important;
        border: none!important;
        border-radius: 4px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
    }

    span#country_user-button,
    span#user_gender-button,
    span#user_orientation-button,
    span#relationship-button,
    span#user_hair_color-button,
    span#user_eye_color-button {
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 4px!important;
        padding: 10px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        margin-bottom: 5px!important;
    }

    ul#country_user-menu li.ui-menu-item div,
    ul#user_gender-menu li.ui-menu-item div,
    ul#user_orientation-menu li.ui-menu-item div,
    ul#user_hair_color-menu li.ui-menu-item div,
    ul#user_eye_color-menu li.ui-menu-item div,
    ul#relationship-menu li.ui-menu-item div {
        margin-top: 1px;
        border-top: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        border-radius: 0 0 4px 4px!important;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        margin-bottom: 5px!important;
        width: 172px !important;
    }
    ul#country_user-menu {
        width: 172px !important;
    }

    ul#country_user-menu div.ui-menu-item-wrapper.ui-state-active,
    ul#user_gender-menu div.ui-menu-item-wrapper.ui-state-active,
    ul#user_orientation-menu div.ui-menu-item-wrapper.ui-state-active,
    ul#user_hair_color-menu div.ui-menu-item-wrapper.ui-state-active,
    ul#user_eye_color-menu div.ui-menu-item-wrapper.ui-state-active,
    ul#relationship-menu div.ui-menu-item-wrapper.ui-state-active {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }

    ul#country_user-menu div.ui-menu-item-wrapper:hover,
    ul#user_gender-menu div.ui-menu-item-wrapper:hover,
    ul#user_orientation-menu div.ui-menu-item-wrapper:hover,
    ul#user_hair_color-menu div.ui-menu-item-wrapper:hover,
    ul#user_eye_color-menu div.ui-menu-item-wrapper:hover,
    ul#relationship-menu div.ui-menu-item-wrapper:hover {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }

    div#filter_users_area fieldset label.ui-checkboxradio-label.ui-corner-all.ui-button {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
        outline: none !important;
        margin-left: 0!important;
        padding-left: 0!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }

    div#filter_users_area div.form-display_name label.ui-checkboxradio-radio-label .ui-icon-background{
        background-image: none !important;
        width: 15px !important;
        height: 15px !important;
        box-sizing: border-box !important;
        border-radius: 4px !important;
        background-color: transparent !important;
        box-shadow: none !important;
    }

    div#filter_users_area div.form-display_name label.ui-checkboxradio-radio-label.ui-checkboxradio-checked .ui-icon-background,
    .ui-state-active .ui-icon-background {
        width: 15px !important;
        height: 15px !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
        box-sizing: border-box !important;
        border-radius: 4px !important;
        box-shadow: none !important;
        background: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    label.ui-button:active .ui-icon,
    label.ui-button .ui-icon{
        background-image: none !important;
        box-shadow: none !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        background-color: transparent !important;
        border-radius: 4px !important;
    }
    label.ui-button .ui-icon {
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    span.ui-corner-all.ui-button.ui-widget > span.ui-icon.ui-icon-triangle-1-s {
        border: none!important;
    }
    label.ui-checkboxradio-label span.ui-checkboxradio-icon-space {
        margin-right: 10px !important;
    }
    div#filter_users_area div.form-display_name label.ui-state-active {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-checked.ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked {
        background: <?=get_theme_mod('btn_hover_color_setting')?> !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    div#filter_users_area div.form-display_name label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-checked.ui-state-active {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    div#filter_users_area div.form-display_name label.ui-checkboxradio-label.ui-corner-all.ui-button:hover{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    ,
    div#filter_users_area div.form-display_name label:hover span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-blank {
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    /*div#filter_users_area fieldset {
        height: -webkit-fill-available !important;
    }*/

    a.btn_upload_to_album {
        background-color: <?=get_theme_mod('btn_color_setting')?>;
        border: 1px solid <?=get_theme_mod('btn_color_setting')?>;
        border-radius: 4px;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        font-family: 'Roboto',sans-serif;
        padding: 10px 10px;
    }
    a#btn_delete_album,
    button.cancel_last{
        font-family: 'Roboto',sans-serif;
        background-color: transparent !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5) !important;
        box-sizing: border-box;
        border-radius: 4px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5) !important;
        font-style: normal !important;
        font-weight: 500 !important;
        font-size: 14px !important;
        line-height: 16px !important;
        padding: 10px 10px;
    }
    a#btn_delete_album:hover,
    button.cancel_last:hover{
        background-color: transparent!important;
    }
    button.delete_last,
    button.cancel_last {
        width: 100%!important;
        max-width: 125px!important;
    }
    div.div_confirm {
        display: flex!important;
        justify-content: space-evenly!important;
        flex-wrap: wrap!important;
    }
    span.premium-video {
        top: 6px!important;
        right: inherit !important;
        left: 5px!important;
    }
    span.premium-video img.svg-crown {
        float: none !important;
    }


    /***playlist modal***/
    #playlistModal .modal-content button.close {
        margin-right: -45px;
        margin-top: -35px;
    }
    #playlistModal .modal-content{
        background-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }
    #playlistModal #form_container {
        background: <?=get_theme_mod('primary_color_setting')?> !important;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25)!important;
        border-radius: 10px!important;
    }
    #playlistModal form {
        padding: 40px !important;
        font-family: 'Roboto',sans-serif;
        text-align: center !important;
    }
    #playlistModal form h3 {
        font-size: 36px!important;
        line-height: 42px!important;
        font-style: normal!important;
        font-weight: 300!important;
        text-align: center;
        margin-bottom: 10px !important;
        margin-top: 0px !important;
    }
    #playlistModal form span.to_existing {
        font-size: 18px!important;
        line-height: 21px!important;
        color: <?=get_theme_mod('text_site_color')?>;
    }
    div.modal-separator {
        border-bottom: 1px solid #293243;
        border-radius: 100px;
        margin-top:20px;
        margin-bottom:20px;
    }
    div#existings {
        display: inline-flex;
    }
    button#savePlaylist {
        background-color: <?=get_theme_mod('btn_hover_color_setting')?>;
        border-radius: 4px;
        padding: 10px 38px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 900;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?>;
    }
    #playlistModal button.close {
        box-shadow: none !important;
    }
    span#playlistList-button {
        background-color: <?=get_theme_mod('secondary_color_setting')?>;
        border: 1px solid rgba(255, 255, 255, 0.5)!important;
        box-sizing: border-box;
        border-radius: 4px!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        padding: 10px!important;
        color: rgba(<?php
                        $hex = get_theme_mod('text_site_color');
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>, 0.5)!important;
        margin-right: 10px!important;
    }
    ul#playlistList-menu {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        width: 145px;
    }
    ul#playlistList-menu li.ui-menu-item div {
        color: rgba(<?php
                        $hex = get_theme_mod('text_site_color');
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>, 0.5)!important;
    }
    ul#playlistList-menu div.ui-menu-item-wrapper:hover {
        color: rgba(<?php
                        $hex = get_theme_mod('text_site_color');
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>, 1)!important;
    }
    #playlistSuccess,
    #playlistError {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
    }
    #playlistTitle,
    #playlistDesc {
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 4px!important;
        padding: 8px 10px!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
        color: rgba(<?php
                        $hex = get_theme_mod('text_site_color');
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>, 1)!important;
        margin-bottom: 10px !important;
    }
    /***playlist modal***/



    @media screen and (max-width: 991.98px) {
        #site-navigation ul {
            background: <?=get_theme_mod('primary_color_setting')?> !important;
            width: 100%;
            padding: 0;
            display: none;
            /*top: 69px!important;*/
            top: -10px!important;
            left: 20px;
        }
        .main-navigation li.menu-item > a {
            border: none!important;
        }
        #site-navigation ul li.current-menu-item a {
            border: 2px solid <?=get_theme_mod('btn_hover_color_setting')?>!important;
            border-radius: 4px;
        }
    }
    div.search-btn-icon2 svg {
        margin-left: -0.5em;
        position: absolute;
        margin-top: 0.5em;
        z-index: 1;
        cursor: pointer;
    }
    h1.upload_a_video {
        text-align: center !important;
    }
    form#SubmitVideo,
    form.create_an_album{
        width: 100%!important;
        max-width: 620px!important;
        margin: 0 auto!important;
    }
    form#SubmitVideo legend,
    form.create_an_album legend{
        width: 100%;
        font-family: 'Roboto',sans-serif;
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px !important;
        padding: 10px 20px !important;
        font-style: normal !important;
        font-weight: normal !important;
        font-size: 14px !important;
        line-height: 16px !important;
        color: <?=get_theme_mod('text_site_color')?>;
        margin-bottom: 2px !important;
    }
    form#SubmitVideo fieldset.fieldset,
    form.create_an_album fieldset.fieldset{
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px;
        margin-top: 2px;
        margin-bottom: 20px;
        padding: 20px !important;
    }
    form#SubmitVideo button.large,
    form.create_an_album button.large{
        background-color: <?=get_theme_mod('btn_color_setting')?>;
        border-radius: 4px;
        padding: 8px 30px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 142.69%;
        color: <?=get_theme_mod('text_site_color')?>;
    }
    form#SubmitVideo input[type=text],
    form#SubmitVideo textarea,
    form.create_an_album input[type=text]{
        background-color:<?=get_theme_mod('input_color')?>!important;
        border-radius: 4px;
        padding: 10px 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        margin-bottom: 10px;
    }
    #dropbox p {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }

    ul#upload_photos_area {
        width: 100%;
        margin-left: 0 !important;
        padding-left: 0 !important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
        display: table;
    }
    span.img_size {
        font-size: 12px;
        line-height: 14px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    #upload_text > span {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }

    label[for=arc-video_url],
    label[for=arc-thumb],
    label[for=arc-category],
    label[for=bust],
    label[for=ethnicity-button],
    label[for=hair_color-button]{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?>;
    }
    label[for=ethnicity-button],
    label[for=hair_color-button] {
        margin-bottom: 5px !important;
    }
    label[for=ethnicity-button] {
        margin-top: 5px !important;
        margin-bottom: 5px !important;
    }
    label[for=hair_color-button] {
        margin-top: 5px !important;
    }
    div#video_file_upload,
    div#video_file_upload2 {
        display: inline-flex;
        flex-wrap: nowrap;
        justify-content: flex-start;
    }
    div#btn,
    div#btn2 {
        background-color: <?=get_theme_mod('input_color')?>;
        border-radius: 4px;
        padding: 11px 30px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 14px;
        color: <?=get_theme_mod('text_site_color')?>;
        margin-right: 10px;
        height: 36px;
        cursor: pointer;
        white-space: nowrap;
    }
    div#upload_text p,
    div#upload_text2 p,
    div#upload_text span,
    div#upload_text2 span {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?>;
    }
    div#upload_text p,
    div#upload_text2 p {
        margin: 0 !important;
        padding: 0 !important;
    }
    div#upload_text span,
    div#upload_text2 span {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    div.upload_separator {
        border-bottom: 1px solid #293243;
        margin-top:20px;
        margin-bottom:20px;
    }
    div#video_details,
    div#pornstars_details_div{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    div#video_details div,
    div#pornstars_details_div div{
        width: 100%;
        max-width: 185px;
        margin-right: 2px;
    }
    div#ethnicity_hair {
        width: 100%;
        max-width: 187px;
    }
    div#video_details div > div,
    div#pornstars_details_div div > div{
        padding: 20px !important;
        background: <?=get_theme_mod('background_color')?>;
        border-radius: 4px;
    }
    div#video_details div legend,
    div#pornstars_details_div div legend{
        width: 100%;
        max-width: 187px;
        background: <?=get_theme_mod('background_color')?>;
        border-radius: 4px;
        padding: 10px 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?>;
        margin-top: 2px;
    }
    div#video_details label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-radio-label,
    div#pornstars_details_div label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-radio-label{
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
        outline: none !important;
        margin-left: 0!important;
        padding-left: 0!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    div#video_details label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-radio-label:hover,
    div#pornstars_details_div label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-radio-label:hover{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    div#video_details label:hover span.ui-icon,
    div#pornstars_details_div label:hover span.ui-icon{
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    div#video_details label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-radio-label.ui-checkboxradio-checked.ui-state-active,
    div#pornstars_details_div label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget.ui-checkboxradio-radio-label.ui-checkboxradio-checked.ui-state-active{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;

    }
    div#video_details label.ui-state-active span.ui-icon,
    div#pornstars_details_div label.ui-state-active span.ui-icon{
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
        background: <?=get_theme_mod('btn_hover_color_setting')?>!important;
    }
    span#submit_select_category-button,
    span#ethnicity-button,
    span#hair_color-button{
        background-color: <?=get_theme_mod('input_color')?> !important;
        border-radius: 4px!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    span#ethnicity-button,
    span#hair_color-button {
        width: 187px;
    }
    span#submit_select_category-button span.ui-icon-triangle-1-s {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    ul#submit_select_category-menu,
    ul#hair_color-menu,
    ul#ethnicity-menu{
        background: <?=get_theme_mod('input_color')?> !important;
        margin-top: 2px;
    }
    ul#submit_select_category-menu div.ui-menu-item-wrapper,
    ul#hair_color-menu div.ui-menu-item-wrapper,
    ul#ethnicity-menu div.ui-menu-item-wrapper{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    ul#submit_select_category-menu li div.ui-menu-item-wrapper.ui-state-active,
    ul#hair_color-menu li div.ui-menu-item-wrapper.ui-state-active,
    ul#ethnicity-menu li div.ui-menu-item-wrapper.ui-state-active{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1) !important;
    }
    ul#submit_select_category-menu li:hover div.ui-menu-item-wrapper {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }
    div.accordeon {
        width: 100%;
    }


    span.edit_video_from_my_uploads svg rect,
    span.removePlaylist svg rect,
    a#gallery_link svg rect,
    a.removeWatchList svg rect{
        fill:<?=get_theme_mod('primary_color_setting');?> !important;
    }

    span.edit_video_from_my_uploads svg path,
    span.removePlaylist svg path,
    a#gallery_link svg path,
    a.removeWatchList svg path {
        fill:<?=get_theme_mod('text_site_color');?> !important;
    }

    div.tab label {
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px;
        padding: 10px 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    span.age-amount,
    span.height-amount,
    span.weight-amount {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    div.tab section.tab-content {
        background:<?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px;
        margin-top: 2px;
        padding: 10px 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 18px;
        color:  rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }
    p.bugs_problems {
        width: 100%!important;
        max-width: 400px!important;
        margin: 0 auto!important;
        text-align: center;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: bold;
        font-size: 18px;
        line-height: 25px;
        color: <?=get_theme_mod('text_site_color')?>;
        margin-bottom: 20px !important;
    }
    p.bugs_problems > span {
        font-weight: normal !important;
        margin-top: 10px !important;
    }
    form#sendSupportMsg {
        width: 100%!important;
        max-width: 620px!important;
        margin: 0 auto!important;
    }
    form#sendSupportMsg legend {
        width: 100%;
        font-family: 'Roboto',sans-serif;
        background:<?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px !important;
        padding: 10px 20px !important;
        font-style: normal !important;
        font-weight: normal !important;
        font-size: 14px !important;
        line-height: 16px !important;
        color: <?=get_theme_mod('text_site_color')?>;
        margin-bottom: 2px !important;
    }
    form#sendSupportMsg fieldset.fieldset {
        background: <?=get_theme_mod('primary_color_setting');?>;
        border-radius: 4px;
        margin-top: 2px;
        margin-bottom: 20px;
        padding: 20px !important;
    }
    form#sendSupportMsg input[type=text],
    form#sendSupportMsg input[type=email],
    form#sendSupportMsg textarea {
        width: 100%;
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 4px;
        padding: 10px 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        margin-bottom: 10px;
    }
    form#sendSupportMsg div#user_info {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
    form#sendSupportMsg div#user_info > div {
        max-width: 285px;
        width: 100%;
    }
    form#sendSupportMsg button.send_support_msg {
        background-color: <?=get_theme_mod('btn_color_setting')?>;
        border-radius: 4px;
        padding: 8px 30px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 142.69%;
        color:<?=get_theme_mod('text_site_color')?>;
    }
    form#sendSupportMsg span.input-group-label {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color:<?=get_theme_mod('text_site_color')?>;
    }
    span#faq_select-button {
        background-color: <?=get_theme_mod('input_color')?> !important;
        border-radius: 4px!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    ul#faq_select-menu {
        background: <?=get_theme_mod('input_color')?> !important;
        margin-top: 2px;
    }

    ul#faq_select-menu div.ui-menu-item-wrapper{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }
    ul#faq_select-menu li div.ui-menu-item-wrapper.ui-state-active{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1) !important;
    }
    ul#faq_select-menu li:hover div.ui-menu-item-wrapper {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }

    form.upload_to_album_form fieldset.fieldset {
        padding: 10px 20px !important;
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px;
    }
    span.delete_image svg path {
        fill: <?=get_theme_mod('text_site_color')?> !important;
    }
    span.delete_image svg rect {
        fill: <?=get_theme_mod('primary_color_setting')?> !important;
    }
    span.delete_image svg:hover rect,
    span.edit_video_from_my_uploads:hover svg rect{
        fill: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    svg.fa-chevron-left circle,
    svg.fa-chevron-right circle,
    svg.hidden_thumbs g circle,
    svg.fa-expand g circle,
    svg.fa-play g circle,
    svg.fa-pause g circle,
    svg.fa-th-large g circle,
    div.chevron-left-full-screen svg.a-chevron-left g circle,
    div.chevron-right-full-screen svg.fa-chevron-right g circle{
        fill: <?=get_theme_mod('primary_color_setting')?> !important;
    }
    span.confirm_msg {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color:<?=get_theme_mod('text_site_color')?> !important;
        padding-left: 10px !important;
    }
    span.delete_image i.fa.fa-check {
        color:<?=get_theme_mod('text_site_color')?> !important;
    }
    span.delete_image i.fa.fa-check:hover {
        color:<?=get_theme_mod('icons_color_setting')?> !important;
    }

    svg.fa-chevron-left path,
    svg.fa-chevron-right path,
    svg.hidden_thumbs rect,
    svg.fa-expand path,
    svg.fa-play path,
    svg.fa-pause path,
    svg.fa-th-large rect,
    svg.a-chevron-left path {
        fill: <?=get_theme_mod('passive_color_setting')?> !important;
    }

    svg.fa-chevron-left:hover path,
    svg.fa-chevron-right:hover path,
    svg.hidden_thumbs:hover rect,
    svg.fa-expand:hover path,
    svg.fa-play:hover path,
    svg.fa-pause:hover path,
    svg.fa-th-large:hover rect,
    svg.a-chevron-left:hover path {
        fill: <?=get_theme_mod('links_color_setting')?> !important;
        fill-opacity: 1 !important;
    }
    #breadcrumbs a, #breadcrumbs .current {
        color: <?=get_theme_mod('text_site_color');?> !important;
    }

    form.upload_to_album_form button[type=submit] {
        float: right;
        background-color: <?=get_theme_mod('btn_color_setting')?>;
        border: 1px solid <?=get_theme_mod('btn_color_setting')?>;
        border-radius: 4px;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        font-family: 'Roboto',sans-serif;
        padding: 10px 10px;
    }

    button.delete_last {
        background-color: <?=get_theme_mod('btn_color_setting')?>;
        border: 1px solid <?=get_theme_mod('btn_color_setting')?>;
        border-radius: 4px;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        font-family: 'Roboto',sans-serif;
        padding: 10px 10px;
    }
    button.delete_last:hover {
        background-color: <?=get_theme_mod('btn_hover_color_setting')?>;
        border: 1px solid <?=get_theme_mod('btn_hover_color_setting')?>;
    }


    div.author_info > span {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5) !important;
    }
    div.author_info > span > a {
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
    }
    div.number_of_photos_in_album {
        font-family: 'Roboto',sans-serif;
        font-style: normal !important;
        font-weight: normal!important;
        font-size: 18px!important;
        line-height: 21px!important;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
    }
    div.photo_container {
        background: <?=get_theme_mod('secondary_background_color')?>;
        border-radius: 4px;
        padding-top:20px;
    }
    p.photo_position img{
        border-radius: 4px;
    }
    div.thumbs_container img {
        border-radius: 4px;
    }
    <?php if(is_page_template('template-account-settings.php')):?>
        div.site-content {
            padding: 0;
        }
        .site-footer {
            margin-top: 0 !important;
        }
        #content {
            min-height: inherit !important;
        }
        div#my_subscriptions,
        div#my_plan,
        div#my_payments,
        div#email_preferences {
            min-height: 150px !important;
        }
    <?php endif;?>
    div#profile-tabs,
    div#public-profile-tabs{
        background: <?=get_theme_mod('secondary_color_setting')?>;
        border-radius: 4px 4px 0px 0px;
        padding-left: 24px;
    }
    div#public-profile-tabs {
        display: flex !important;
        margin-bottom: 0px !important;
        flex-wrap: wrap;
        background: <?=get_theme_mod('primary_color_setting')?>;
    }
    div.before_tabs_border {
        border-left: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .1)!important;
        margin-top: 13px;
        height: 20px;
    }
    div.before_tabs_border2 {
        border-left: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .1)!important;
        height: 20px;
        margin-top: 13px;
    }

    div#profile-tabs a.tab-link,
    div#profile-tabs button.tab-link,
    div#public-profile-tabs button.tab-link {
        padding: 13px 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color');?>;
        display: flex;
        align-items: center;
        border-color: transparent!important;
        background-color: transparent!important;
    }
    div#public-profile-tabs {
        border-bottom: none !important;
    }

    div#profile-tabs a.tab-link svg,
    div#profile-tabs button.tab-link svg,
    div#public-profile-tabs button.tab-link svg{
        margin-right: 10px;
    }
    div#profile-tabs a.tab-link svg path,
    div#profile-tabs button.tab-link svg path,
    div#public-profile-tabs button.tab-link svg path{
        color: <?=get_theme_mod('text_site_color');?>;
    }
    div#profile-tabs button.tab-link.active,
    div#public-profile-tabs button.tab-link.active{
        background: <?=get_theme_mod('secondary_background_color')?>!important;
        box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 4px 4px 0px 0px;
    }
    div#profile-tabs a.tab-link:first-child,
    div#profile-tabs button.tab-link:first-child,
    div#public-profile-tabs button.tab-link:first-child{
        padding-left: 0!important;
        margin-left: 0!important;
    }
    div#profile-tabs a.tab-link:first-child {
        padding-left: 24px!important;
    }

    div#settings {
        padding-top: 40px;
        background: <?=get_theme_mod('secondary_background_color')?>!important;
    }
    <?php if(is_page_template('template-playlist.php')):?>
        div.playlists_content, main#main {
            background: <?=get_theme_mod('secondary_background_color')?>!important;
        }
    <?php endif;?>
    div#edit_profile {
        width: 100%;
        max-width: 620px;
        margin: 0 auto;
    }
    div#account-tabs,
    div#public-profile-tabs{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: <?=get_theme_mod('text_site_color');?>;
        text-align: center;
        margin-bottom: 30px;
        border-bottom:1px solid <?=get_theme_mod('primary_color_setting');?>;
    }

    div#account-tabs button.tab-link{
        border: none!important;
        background-color: transparent!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
        padding-left:0;
        padding-right:0;
        margin-right: 40px;
    }
    div#account-tabs button.tab-link:last-child{
        margin-right: 0px;
    }
    div#account-tabs button.tab-link.active{
        border-bottom: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    div#account-tabs button.tab-link:hover{
        border-bottom: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    p#new_comment_posted {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 18px;
        margin-bottom: 0!important;
    }

    div.account-list section form#edit-user legend,
    div.account-list section form#edit-user p.legend,
    div.account-list section form#edit-user2 legend,
    div.account-list section form#edit-user2 p.legend{
        background-color: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px;
        padding: 10px 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color');?>;
    }
    div.account-list section form#edit-user p.legend,
    div.account-list section form#edit-user2 p.legend{
        margin: 0;
    }
    div.account-list section form#edit-user fieldset.fieldset,
    div.account-list section form#edit-user2 fieldset.fieldset{
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px;
        margin-top: 2px!important;
        padding: 10px 20px!important;
    }
    div.account-list section form#edit-user fieldset.fieldset input[type=text],
    div.account-list section form#edit-user fieldset.fieldset textarea,
    div.account-list section form#edit-user fieldset.fieldset input[type=password],
    div.account-list section form#edit-user fieldset.fieldset input[type=email],
    div.account-list section form#edit-user fieldset.fieldset input[type=tel],
    div.account-list section form#edit-user2 fieldset.fieldset input[type=text],
    div.account-list section form#edit-user2 fieldset.fieldset textarea,
    div.account-list section form#edit-user2 fieldset.fieldset input[type=password],
    div.account-list section form#edit-user2 fieldset.fieldset input[type=email],
    div.account-list section form#edit-user2 fieldset.fieldset input[type=tel]{
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 4px;
        padding: 10px 20px!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    div.account-list section form#edit-user fieldset.fieldset label,
    div.account-list section form#edit-user2 fieldset.fieldset label{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color');?>;
        padding-top: 2px !important;
        padding-bottom: 5px !important;
    }
    span#i_am-button,
    span#orientation-button,
    span#relation-button,
    span#display_name-button,
    span#account_ethnicity-button,
    span#eye_color-button,
    span#account_hair_style-button,
    span#account_hair_color-button,
    span#account_tattoo-button,
    span#account_piercing-button {
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 4px!important;
        padding: 11px 20px!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
    }
    input#search_in_uploaded {
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-color: <?=get_theme_mod('input_color')?>!important;
    }

    span#i_am-button,
    span#orientation-button,
    span#relation-button,
    span#display_name-button,
    span#account_ethnicity-button,
    span#eye_color-button,
    span#account_hair_style-button,
    span#account_hair_color-button,
    span#account_tattoo-button,
    span#account_piercing-button{
        width: 100%!important;
        max-width: 285px!important;
    }

    div.account-list button.save-back,
    div.account-list button.save-profile {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 142.69%;
        color: <?=get_theme_mod('text_site_color')?>!important;
        padding: 8px 30px !important;
        background-color: <?=get_theme_mod('btn_color_setting')?>!important;
        border-radius: 4px;
        border: none !important;
    }
    div#account_tab_content {
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 40px;
    }
    div#payment_scroll_table {
        margin-bottom: 20px !important;
    }
    div#my_payments tr.payment_type td{
        background: <?=get_theme_mod('primary_color_setting');?>;
        border-radius: 4px;
        padding: 10px 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?>!important;
    }
    div#my_payments tr.payment_type:nth-child(2n) {
        margin-top: 20px!important;
    }
    table#table_payment {
        border: none !important;
        border-spacing: 2px;
        border-collapse: separate;
        margin-bottom: 0!important;
    }
    table#table_payment tr.thead > tr td{
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: <?=get_theme_mod('text_site_color')?>!important;
        background: <?=get_theme_mod('background_color')?>;
        border-radius: 4px!important;
        padding: 10px 20px !important;
    }
    table#table_payment tbody tr {
        border: none!important;
        margin-bottom: 2px!important;
    }
    table#table_payment tbody tr:last-child{
        margin-bottom: 0px!important;
    }
    table#table_payment tbody tr td{
        margin-right: 2px!important;
    }
    table#table_payment tbody tr td:last-child{
        margin-right: 0px!important;
    }
    table#table_payment tbody tr td {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        background: <?=get_theme_mod('secondary_color_setting')?>;
        border: none!important;
        border-radius: 4px;
        padding: 10px 20px !important;
    }
    table#table_payment tbody tr.thead td {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    p.unsubscribe_on_author {
        border: none !important;
        padding: 0 !important;
        background-color: transparent !important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
            $hex = get_theme_mod('passive_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
    }
    #members_list > article > div > div > div > a,
    #suggested_list > div > article > div > div > div > a,
    #advanced_search > article > div > div > div > a{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color');?>;
    }
    #subscriptions_content {
        padding: 0!important;
    }
    #subscriptions_content > div.subscription-item > div > p > a > img {
        width: 40px;
        height: 40px;
        border-radius: 40px;
        margin-right: 10px;
        display:block;
    }
    #subscriptions_content > div.subscription-item > div a {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color');?>;
    }
    div.subscription-item.item_user {
        max-width: 306px !important;
        width: 100%;
    }
    div.subscription-item.item_user:nth-child(3n-1) {
        margin-left: 0px;
        margin-right: 10px;
    }
    div.subscription-item.item_user:nth-child(4n-1) {
        margin-right: 10px;
    }
    div.subscription-item.item_user:last-child {
        margin-right: 0px;
    }

    ul#i_am-menu li div,
    ul#orientation-menu li div,
    ul#relation-menu li div,
    ul#display_name-menu li div,
    ul#account_ethnicity-menu li div,
    ul#eye_color-menu li div,
    ul#account_hair_style-menu li div,
    ul#account_hair_color-menu li div,
    ul#account_tattoo-menu li div,
    ul#account_piercing-menu li div{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 16px;
        color:  rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
        background-color: transparent!important;
        border-color: transparent!important;
        margin-top: 2px;
        width: 100%!important;
        max-width: 285px!important;
    }
    ul#i_am-menu li div:hover,
    ul#orientation-menu li div:hover,
    ul#relation-menu li div:hover,
    ul#display_name-menu li div:hover,
    ul#account_ethnicity-menu li div:hover,
    ul#eye_color-menu li div:hover,
    ul#account_hair_style-menu li div:hover,
    ul#account_hair_color-menu li div:hover,
    ul#account_tattoo-menu li div:hover,
    ul#account_piercing-menu li div:hover{
        color:  rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
        background-color: transparent !important;
    }
    div#edit_profile label[for=show_email],
    div#edit_profile label[for=show_phone],
    div#edit_profile label[for=show_subs],
    div#edit_profile label[for=show_views]{
        background-color: transparent!important;
        border-color: transparent!important;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5)!important;
        border: none !important;
        box-shadow: none !important;
        outline: none !important;
        margin-left: 0!important;
        padding-left: 0!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        margin-bottom: 10px;
    }
    div#edit_profile label[for=show_subs],
    div#edit_profile label[for=show_views] {
        margin-bottom: 0px !important;
    }
    div#edit_profile label[for=show_email] .ui-icon,
    div#edit_profile label[for=show_phone] .ui-icon,
    div#edit_profile label[for=show_subs] .ui-icon,
    div#edit_profile label[for=show_views] .ui-icon{
        margin-left: 5px;
    }
    div#edit_profile label[for=show_email]:hover,
    div#edit_profile label[for=show_phone]:hover,
    div#edit_profile label[for=show_subs]:hover,
    div#edit_profile label[for=show_views]:hover{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
    }
    div#edit_profile label[for=show_email]:hover .ui-icon,
    div#edit_profile label[for=show_phone]:hover .ui-icon,
    div#edit_profile label[for=show_subs]:hover .ui-icon,
    div#edit_profile label[for=show_views]:hover .ui-icon{
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
    }
    div#edit_profile label[for=show_email]:active .ui-icon,
    div#edit_profile label[for=show_phone]:active .ui-icon,
    div#edit_profile label[for=show_email].ui-state-active,
    div#edit_profile label[for=show_phone].ui-state-active,
    div#edit_profile label[for=show_subs]:active .ui-icon,
    div#edit_profile label[for=show_views]:active .ui-icon,
    div#edit_profile label[for=show_subs].ui-state-active,
    div#edit_profile label[for=show_views].ui-state-active{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
    }
    div.user_profile div.user_pic {
        width: 100%;
        /*max-width: 1211px;*/
        position: absolute;
        margin-top: 160px;
        margin-left: 21px;
        background: <?=get_theme_mod('primary_color_setting')?>!important;
        backdrop-filter: blur(15px)!important;
        border-radius: 4px!important;
        height: 206px;
        display: flex;
        justify-content: space-between;
    }
    div#info_about_user {
        position: absolute;
        padding-top: 20px;
        margin-left: 247px;
        width: 100%;
        /*max-width: 964px;*/
        padding-right: 20px;
    }
    div#user_name,
    div#user_name2{
        width: 100%;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-bottom: 20px !important;
        border-bottom: 1px solid #293346 !important;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }
    div#user_name button,
    div#user_name2 button{
        width: 100%;
        max-width: 156px;
        padding: 10px 20px;
        background-color: <?=get_theme_mod('btn_color_setting')?>;
        border-radius: 4px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?>;
        max-height: 36px;
    }
    div#personal_info,
    div#personal_info2{
        display: flex;
        justify-content: space-between;
       /* flex-wrap: wrap;*/
    }
    div#personal_info div:last-child,
    div#personal_info2 div:last-child{
        text-align: right;
    }
    div#personal_info div p,
    div#personal_info div ul li,
    div#personal_info div ul li span,
    div#personal_info2 div p,
    div#personal_info2 div ul li,
    div#personal_info2 div ul li span,
    div#user_info div p,
    div#user_info div ul li span{
        margin: 0;
        padding: 0;
        font-family: 'Roboto',sans-serif;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 14px!important;
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,0.5)!important;
        margin-bottom: 10px;
    }
    div#personal_info div p span,
    /*div#personal_info div ul li > span,*/
    div#personal_info div ul li span > span,
    div#personal_info2 div p span,
        /*div#personal_info2 div ul li > span,*/
    div#personal_info2 div ul li span > span,
    div#user_info div p span,
    div#user_info div ul li span > span{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
    }
    ul#user_location {
        display: block !important;
    }
    ul#user_location li {
        max-width: 165px!important;
        /*white-space: nowrap!important;
        text-overflow: ellipsis!important;
        overflow: hidden!important;*/
        overflow-wrap: break-word!important;
    }
    ul#user_height li {
        max-width: 150px!important;
        /*white-space: nowrap!important;
        text-overflow: ellipsis!important;
        overflow: hidden!important;*/
        overflow-wrap: break-word!important;
    }
    div#contacts_desktop p,
    div#contacts_desktop2 p{
        overflow-wrap: break-word!important;
        max-width: 272px!important;
        /*text-overflow: ellipsis!important;
        overflow: hidden!important;
        white-space: nowrap!important;*/
    }
    div#user_info {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding-left: 21px;
        padding-right: 44px;
        margin-left: 1.5em !important;
        margin-right: 1.5em !important;
        margin-bottom: 26px;
    }
    div#user_info h4 {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1) !important;
    }
    div#what_i_look {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    ul#user_height,
    ul#user_hair{
        display: block!important;
        list-style: none !important;
    }
    ul#user_height {
        padding-left: 0 !important;
        margin-left: 0 !important;
    }
    ul#user_social li,
    ul#user_social2 li{
        margin-left: 10px !important;
    }
    p#about_me {
        color: <?=get_theme_mod('text_site_color');?>!important;
    }
    p.recent_user_info span a.de-listing {
        color: <?=get_theme_mod('btn_color_setting')?> !important;
        font-style: normal !important;
        font-family: 'Roboto',sans-serif!important;
        font-size: 12px!important;
    }
    p.recent_user_info span a.de-listing:hover {
        color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    div#filter_porn_videos_area label {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
        outline: none !important;
        margin-left: 0!important;
        padding-left: 0!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
    }
    div#filter_porn_videos_area div.form-display_name label[for=porn_tattoo-button],
    div#filter_porn_videos_area div.form-display_name label[for=porn_piercing-button],
    div#filter_porn_videos_area div.form-display_name label[for=porn_ethnicity-button],
    div#filter_porn_videos_area div.form-display_name label[for=porn_hair_color-button],
    div#filter_porn_videos_area div.form-display_name label[for=porn_bust] {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1) !important;
        margin-left: 10px !important;
    }

    <?php if(is_page_template('template-public-profile.php')):?>
    .site-content {
        padding-left: 0!important;
        padding-right: 0!important;
    }
    /*div#primary header {
        padding-left: 1.5em!important;
        padding-right: 1.5em!important;
    }*/
    div#public_profile_tab_content {
        padding: 24px;
        padding-bottom: 12px;
        background: <?=get_theme_mod('secondary_background_color')?>;
    }
    .site-footer {
        margin-top: 0px!important;
    }
    <?php endif;?>

    a#set_profile_picture_to_default,
    a#set_profile_back_to_default,
    a#remove_phone_number,
    a#remove_website,
    a#remove_facebook,
    a#remove_instagram,
    a#remove_twitter,
    a#remove_snapchat,
    a#remove_reddit,
    a#remove_manyvids,
    a#remove_onlyfans,
    a#show_email2{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('btn_color_setting')?> !important;
    }
    a#remove_phone_number,
    a#remove_website,
    a#remove_facebook,
    a#remove_instagram,
    a#remove_twitter,
    a#remove_snapchat,
    a#remove_reddit,
    a#remove_manyvids,
    a#remove_onlyfans,
    a#show_email2{
        margin-bottom: 10px !important;
    }
    a#set_profile_picture_to_default:hover,
    a#set_profile_back_to_default:hover,
    a#remove_phone_number:hover,
    a#remove_website:hover,
    a#remove_facebook:hover,
    a#remove_instagram:hover,
    a#remove_twitter:hover,
    a#remove_snapchat:hover,
    a#remove_reddit:hover,
    a#remove_manyvids:hover,
    a#remove_onlyfans:hover,
    a#show_email2:hover{
        color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    input#edit_profile_button,
    button#subscribe_on_author{
        width: 100%;
        max-width: 122px;
        padding: 10px 15px!important;
        background-color: <?=get_theme_mod('btn_color_setting')?> !important;
        border-radius: 4px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?> !important;
        border: none !important;
    }
    button#subscribe_on_author {
        margin-top: 0px!important;
    }
    input#edit_profile_button:hover,
    button#subscribe_on_author:hover {
        background-color: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    ul#user_height {
        margin-right: 20px!important;
    }
    ul#user_hair {
        padding-left: 0px!important;
        margin-left: 0px!important;
    }
    input#delete_account {
        border-radius: 4px;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        font-family: 'Roboto',sans-serif;
        padding: 10px 10px;
        width: 100%;
        max-width: 154px;
    }
    label[for=msg_title],
    label[for=msg_description],
    label[for=user_name],
    label[for=user_email] {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?> !important;
    }

    <?php if(is_page_template('template-watchlist.php') && xbox_get_field_value('my-theme-options','show-sidebar-on-watchlist') == 'off'):?>
        .site-content {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
        div.tab-content {
            padding-left: 24px !important;
            padding-right:24px !important;
        }
    <?php endif;?>

    <?php if(is_page_template('template-watchlist.php')):?>
        h1.widget-title {
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 18px!important;
            line-height: 21px!important;
            color: <?=get_theme_mod('text_site_color')?> !important;
        }
        a.removeWatchList {
            display: flex;
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 18px!important;
            line-height: 21px!important;
            text-align: right!important;
            color: rgba(<?php
            $hex = get_theme_mod('passive_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,0.5) !important;
        }
        a.removeWatchList svg {
            margin-right: 10px;
        }
        a.removeWatchList:hover {
            color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1) !important;
        }
    a.removeWatchList svg path {
        fill: <?=get_theme_mod( 'passive_color_setting');?>!important;
    }
        a.removeWatchList:hover svg path {
            fill: <?=get_theme_mod( 'links_color_setting');?>!important;
            fill-opacity: 1 !important;
        }
        div#watchlist-content {
            margin-top:0 !important;
            padding-top:40px !important;
            background: <?=get_theme_mod('secondary_background_color')?> !important;
            padding-left: 24px !important;
            padding-right:24px !important;
            padding-bottom:24px !important;
        }
        .site-footer {
            margin-top: 0 !important;
        }
    <?php endif;?>

    <?php if(is_page_template('template-playlists.php') && xbox_get_field_value('my-theme-options','show-sidebar-in-playlist') == 'off'):?>
        .site-content {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
        div.tab-content {
            padding-left: 24px !important;
            padding-right:24px !important;
        }
    <?php endif;?>

    <?php if(is_page_template('template-playlists.php')):?>
        div.tab-content {
            padding-bottom: 40px !important;
        }
        h2.widget-title {
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 18px!important;
            line-height: 21px!important;
            color: <?=get_theme_mod('text_site_color')?> !important;
        }
        a#gallery_link {
            display: flex;
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 18px!important;
            line-height: 21px!important;
            text-align: right!important;
            color: rgba(<?php
                $hex = get_theme_mod('passive_color_setting');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>,0.5) !important;
        }
        a#gallery_link svg {
            margin-right: 10px;
        }
    a#gallery_link:hover {
        color: rgba(<?php
                $hex = get_theme_mod('links_color_setting');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>,1) !important;
    }
    a#gallery_link svg path {
        fill: <?=get_theme_mod( 'passive_color_setting');?> !important;
    }
    a#gallery_link:hover svg path {
        fill: <?=get_theme_mod( 'links_color_setting');?> !important;
        fill-opacity: 1 !important;
    }
        div.tab-content {
            margin-top:0 !important;
            padding-top:40px !important;
        }
        main#main {
            background: <?=get_theme_mod('secondary_background_color')?> !important;
        }
        div#primary {
            background: <?=get_theme_mod('secondary_background_color')?> !important;
        }
        .site-footer {
            margin-top: 0!important;
        }
        #content {
            min-height: auto !important;
        }
        div#playlist-videos {
            min-height: 150px !important;
        }
    <?php endif;?>

    <?php if(is_page_template('template-favorites.php') && xbox_get_field_value('my-theme-options','show-sidebar-favorite-photos') == 'off'):?>
        .site-content {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
    div#favorite-content {
        padding-left: 24px !important;
        padding-right:24px !important;
    }
    <?php endif;?>
    <?php if(is_page_template('template-favorites.php') && xbox_get_field_value('my-theme-options','show-sidebar-favorite-photos') == 'on'):?>
    div#favorite-content {
        padding-left: 24px !important;
        padding-right:24px !important;
    }
    div#profile-tabs {
        padding-left: 0px !important;
    }
    <?php endif;?>

    <?php if(is_page_template('template-favorites.php')):?>
        div#favorite-content {
            background: <?=get_theme_mod('secondary_background_color')?> !important;
            display:flex;
            /*min-height: 100vw;*/
            flex-grow: 3;
        }
        div#favorite-tabs {
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 21px;
            color: <?=get_theme_mod('text_site_color')?>;
            text-align: left;
            margin-bottom: 30px;
            border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        }
        div#favorite-tabs button.tab-link {
            border: none!important;
            background-color: transparent!important;
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 21px;
            color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, .5) !important;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
            padding-left: 0;
            padding-right: 0;
            margin-right: 40px;
        }
        div#favorite-tabs button.tab-link.active,
        div#favorite-tabs button.tab-link:hover {
            border-bottom: 1px solid rgba(<?php
                $hex = get_theme_mod('text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) !important;
            color: rgba(<?php
                $hex = get_theme_mod('text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) !important;
        }

        a#add_to_fav_video svg,
        span.remove_from_photo.heart-photos svg rect,
        span#add_to_fav_video svg rect{
            fill: <?=get_theme_mod('primary_color_setting');?> !important;
        }
        a#add_to_fav_video svg path,
        span.remove_from_photo.heart-photos svg path,
        span.add_to_fav_video svg path{
            fill: <?=get_theme_mod('text_site_color');?> !important;
            fill-opacity: 1!important;
        }
        span#add_to_fav_video:hover svg rect,
        span.remove_from_photo.heart-photos:hover svg rect,
        span.removePlaylist:hover svg path{
            fill: <?=get_theme_mod('btn_hover_color_setting')?> !important;
        }

        div#favorite_photos div.photos-list div.photo_div_item{
            border-radius: 4px;
        }
        .site-footer {
            margin-top: 0!important;
        }

    div#favorite_photos div.photos-list div.photo_div_item {
        margin-right: 8px !important;
    }
    <?php endif;?>

    <?php if(is_author() && xbox_get_field_value('my-theme-options','show-sidebar-on-author-page') == 'off'):?>
        .site-content {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }
        div#author-content {
            padding-left: 24px !important;
            padding-right:24px !important;
        }
        <?php else: ?>
    div#author-content {
        padding-left: 24px !important;
        padding-right:24px !important;
    }
    <?php endif;?>

    <?php if(is_author()):?>
        div#author-content {
            background: <?=get_theme_mod('secondary_background_color')?> !important;
            display:flex;
        }
        div#author-tabs {
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 21px;
            color: <?=get_theme_mod('text_site_color')?>;
            text-align: left;
            margin-bottom: 30px;
            border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
        }
        div#author-tabs button.tab-link {
            border: none!important;
            background-color: transparent!important;
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 21px;
            color: rgba(<?php
                $hex = get_theme_mod('secondary_text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, .5) !important;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(<?php
                $hex = get_theme_mod('secondary_text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 0.5) !important;
            padding-left: 0;
            padding-right: 0;
            margin-right: 40px;
        }
        div#author-tabs button.tab-link.active,
        div#author-tabs button.tab-link:hover {
            border-bottom: 1px solid rgba(<?php
                $hex = get_theme_mod('text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) !important;
            color: rgba(<?php
                $hex = get_theme_mod('text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) !important;
        }
        .site-footer {
            margin-top: 0!important;
        }
    <?php endif;?>

    .read-more-container-public {
        margin: 20px auto;
        position: relative;
        margin-bottom: 0px !important;
    }
    .read-more-container-public div.content-video {
        list-style-type: none;
        padding: 0;
    }
    .read-more-container-public div.content-video:after {
        content: "";
        display: table;
        clear: both;
    }
    .read-more-container-public div.content-video {
        margin: 10px 5px 0;
        float: left;
    }
    .read-more-container-public div.content-video {
        /*max-height: 0;
        opacity: 0;*/
        opacity: 1;
        max-height: 75px;
        transition: 0.1s ease-in;
        overflow: hidden;
    }
    .read-more-container-public .read-more-btn {
        line-height: 40px;
        margin: 0 auto;
        display: block;
        color: rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        cursor: pointer;
        text-align: center;
        overflow: hidden;
        font-size: 16px;
        clear: both;
    }
    .read-more-container-public .read-more-btn .read {
        display: none;
    }
    .read-more-container-public #read-more {
        display: none;
    }
    .read-more-container-public #read-more:checked ~ div.content-video {
        max-height: 999px;
        /*opacity: 1;*/
        transition: 0.2s ease-in;
    }
    .read-more-container-public #read-more:checked ~ .read-more-btn .read {
        display: block;
    }
    .read-more-container-public #read-more:checked ~ .read-more-btn .readed {
        display: none;
    }
    .read-more-container-public .load-more-tags-btn .read {
        display: none;
    }
    .read-more-container-public #read-more {
        display: none;
    }
    .read-more-container-public #read-more:checked ~ .read-more-btn .read {
        display: block;
    }
    .read-more-container-public #read-more:checked ~ .read-more-btn .readed {
        display: none;
    }

    .read-more-container-public .read::before,
    .read-more-container-public .read::after,
    .read-more-container-public .readed::after,
    .read-more-container-public .readed::before {
        content: "";
        display: inline-block;
        vertical-align: middle;
        width: 100%;
        height: 1px;
        background-color:rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        position: relative;
    }

    .read-more-container-public .read:before,
    .read-more-container-public .readed:before{
        margin-left: -105%;
        left: -14px;
    }

    .read-more-container-public .read:before {
        margin-left: -112%;
    }

    .read-more-container-public .read:after,
    .read-more-container-public .readed:after{
        margin-right: -38%;
        right: -14px;
    }

    .read-more-container-public .readed::after,
    .read-more-container-public .read:after{
        width:35%
    }

    .read-more-container-public .readed i.fa.fa-chevron-down,
    .read-more-container-public .readed i.fa.fa-chevron-up,
    .read-more-container-public .read i.fa.fa-chevron-up {
        color: rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
    }


    #subscribers_and_views,
    #subscribers_and_views2{
        display: inline-flex;
        align-items: center;
        margin-right: 20px !important;
    }

    #subscribers_and_views p,
    #subscribers_and_views2 p{
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: rgba(<?php
                $hex = get_theme_mod('text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1) !important;
    }
    #subscribers_and_views p span.count_subs,
    #subscribers_and_views2 p span.count_subs{
        color: rgba(<?php
                $hex = get_theme_mod('secondary_text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, .5) !important;
    }
    #subscribers_and_views p span.count_subs:last-child,
    #subscribers_and_views2 p span.count_subs:last-child{
        margin-left: 10px !important;
    }


    @media (min-width: 700px){
        div#create_new div {
            padding-left: 60px !important;
            padding-right: 60px !important;
        }
    }
    @media (min-width: 375px) and (max-width: 462px) {
        div#create_new div {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    }
    div.video_about_container form#message {
        margin-bottom: 40px !important;
    }
    div.video_about_container form#message fieldset.fieldset {
        font-family: 'Roboto',sans-serif !important;
        font-style: normal;
        font-weight: normal;
        font-size: 14px!important;
        line-height: 16px!important;
    }
    div.video_about_container form#message fieldset.fieldset label {
        color: <?=get_theme_mod('text_site_color')?>;
        margin-bottom: 5px !important;
        margin-top: 20px !important;
        display: inline-block !important;
    }
    div.video_about_container form#message fieldset.fieldset input[type=text],
    div.video_about_container form#message fieldset.fieldset textarea{
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        background-color:<?=get_theme_mod('input_color')?> !important;
        border-radius: 4px;
        width: 90% !important;
    }
    span.removePlaylist:hover svg rect {
        fill: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    a#gallery_link:hover svg rect {
        fill: <?=get_theme_mod('btn_hover_color_setting')?>!important;
    }
    a#gallery_link:hover svg path {
        fill-opacity:1;
    }

    div#video_info_about_user {
        height: 80px;
        width: 100%;
        margin-bottom: 30px;
        background: <?=get_theme_mod('background_color')?>!important;
        backdrop-filter: blur(120px);
        border-radius: 4px;
        display:block !important;
    }
    div#edit_current_video,
    div#report_user_post,
    div#report_photo,
    div#report_user_modal{
        background: rgba(15, 23, 37, 0.8) !important;
        backdrop-filter: blur(15px)!important;
    }
    div#edit_current_video .modal-dialog,
    div#report_user_post .modal-dialog,
    div#report_photo .modal-dialog,
    div#report_user_modal .modal-dialog{
        max-width: 500px !important;
        width: 100% !important;
        margin: 50px auto !important;
    }
    div#edit_current_video .modal-dialog .modal-content,
    div#report_user_post .modal-dialog .modal-content,
    div#report_photo .modal-dialog .modal-content,
    div#report_user_modal .modal-dialog .modal-content{
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25)!important;
        background-color: transparent !important;
    }
    h2#edit_video_header,
    div#report_user_post h2#header,
    div#report_photo h2#header,
    div#report_user_modal h2#header{
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px!important;
        padding: 10px !important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px!important;
        line-height: 16px!important;
        text-align: center;
        color:<?=get_theme_mod('text_site_color')?>;
        margin-bottom: 2px;
    }
    p#userPostReportSendMsg,
    p#photoReportSendMsg,
    p#userReportSendMsg{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px!important;
        line-height: 16px!important;
        text-align: center;
        color:<?=get_theme_mod('text_site_color')?>;
    }
    div#edit_current_video .modal-dialog .modal-content .modal-footer,
    div#report_user_post .modal-dialog .modal-content .modal-footer,
    div#report_photo .modal-dialog .modal-content .modal-footer,
    div#report_user_modal .modal-dialog .modal-content .modal-footer{
        padding: 0!important;
        border: none !important;
        box-shadow: none !important;
    }
    div#report_photo .modal-dialog .modal-content,
    div#report_user_modal .modal-dialog .modal-content{
        border: none !important;
        box-shadow: none !important;
    }
    div#edit_current_video .modal-dialog .modal-content .modal-footer > div,
    div#report_user_post .modal-dialog .modal-content .modal-footer > div,
    div#report_photo .modal-dialog .modal-content .modal-footer > div,
    div#report_user_modal .modal-dialog .modal-content .modal-footer > div{
        background: <?=get_theme_mod('primary_color_setting')?>!important;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
        border-radius: 4px;
        padding: 20px;
        padding-bottom: 40px;
    }
    div#report_user_post .modal-dialog .modal-content .modal-footer > div,
    div#report_photo .modal-dialog .modal-content .modal-footer > div,
    div#report_user_modal .modal-dialog .modal-content .modal-footer > div{
        padding-bottom: 20px !important;
    }
    div#edit_current_video fieldset,
    div#report_user_post table,
    div#report_photo table,
    div#report_user_modal table{
        border: none !important;
    }
    div#edit_current_video fieldset label,
    div#report_user_post label,
    div#report_photo label,
    div#report_user_modal label{
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?>;
    }
    div#edit_current_video fieldset input[type=text],
    div#edit_current_video fieldset textarea,
    div#report_user_post textarea,
    div#report_photo textarea,
    div#report_user_modal textarea{
        background-color: <?=get_theme_mod('input_color')?>!important;
        border-radius: 4px;
        padding: 10px 20px;
        width: 100%!important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?>;
    }
    div#edit_current_video div.render-x a {
        background: <?=get_theme_mod('background_color')?>!important;
        margin-right: 0px !important;
        border-top-right-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }
    div#edit_current_video div.render-x a:hover {
        background: <?=get_theme_mod('btn_hover_color_setting')?>!important;
    }
    div#edit_current_video div.render-x span {
        float: right;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        padding: 4px 5px !important;
        background: <?=get_theme_mod('background_color')?> !important;
        margin-top: 2px;
    }
    h2.faqs_title {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 24px!important;
        line-height: 26px!important;
        color: <?=get_theme_mod('text_site_color')?> !important;
        padding-top: 15px;
        padding-bottom: 20px;
        padding-left: 15px;
    }
    #clearSearch {
        background: transparent !important;
        border: none !important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        max-width: inherit !important;
        padding: 0.5em!important;
    }
    .clearSearch-icon2 svg path{
        fill: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
    }
    #clearSearch:hover {
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 1) !important;
    }
    .clearSearch-icon2:hover svg path{
        fill: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 1) !important;
    }

    form#email_preferences_form {
        max-width: 620px !important;
        width: 100% !important;
        margin: 0 auto !important;
    }
    form#email_preferences_form legend,
    form#email_preferences_form p.legend{
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px;
        margin:0;
        padding: 10px 20px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: <?=get_theme_mod('text_site_color')?>;
    }
    form#email_preferences_form fieldset.fieldset {
        background: <?=get_theme_mod('primary_color_setting')?>;
        border-radius: 4px;
        margin-top: 2px!important;
        padding: 10px 20px!important;
    }
    form#email_preferences_form fieldset.fieldset p {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        color: rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5) !important;
        margin: 0 !important;
        margin-left: 30px!important;
        padding:0 !important;
    }
    label[for=video_submission],
    label[for=album_submission],
    label[for=post_submission],
    label[for=video_published] {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        background-color: transparent!important;
        border-color: transparent!important;
        color: rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5)!important;
        border: none !important;
        box-shadow: none !important;
        outline: none !important;
        margin-left: 0!important;
        padding-left: 0!important;
        margin-bottom: 0px!important;
    }
    label[for=video_submission].ui-state-active,
    label[for=album_submission].ui-state-active,
    label[for=post_submission].ui-state-active,
    label[for=video_published].ui-state-active{
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 1)!important;
    }

    label[for=video_submission]:hover,
    label[for=album_submission]:hover,
    label[for=post_submission]:hover,
    label[for=video_published]:hover,
    label[for=video_submission].ui-state-active:hover,
    label[for=album_submission].ui-state-active:hover,
    label[for=post_submission].ui-state-active:hover,
    label[for=video_published].ui-state-active:hover{
        background-color: transparent!important;
        border-color: transparent!important;
    }

    label[for=video_submission].ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked,
    label[for=album_submission].ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked,
    label[for=post_submission].ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked,
    label[for=video_published].ui-state-active span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-icon-check.ui-state-checked{
        background: <?=get_theme_mod('btn_hover_color_setting')?> !important;
        border: 1px solid rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 1)!important;
    }
    span#reportType-button {
        border-radius: 4px !important;
    }
    button#savePlaylist {
        white-space: nowrap !important;
    }
    span.delete_video_from_playlist {
        position: absolute;
        left: 5px;
        top: 5px;
    }
    span.delete_video_from_playlist svg rect {
        fill: <?=get_theme_mod('primary_color_setting')?> !important;
    }
    span.delete_video_from_playlist svg path {
        fill: <?=get_theme_mod('text_site_color')?> !important;
    }
    span.delete_video_from_playlist:hover svg rect{
        fill: <?=get_theme_mod('btn_hover_color_setting')?> !important;
    }
    a.comment-reply-login {
        margin-right: 10px !important;
    }
    p.not-found {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
    }
    input.search-field {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        border-radius: 4px;
    }
    input.search-submit {
        border-radius: 4px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 142.69%;
        width: 138px;
        height: 40px;
    }
    div.tags-letter-block .tag-letter {
        font-family: 'Roboto',sans-serif;
        font-style: normal!important;
        font-weight: 300!important;
        font-size: 36px!important;
        line-height: 42px !important;
        color: <?=get_theme_mod('text_site_color');?> !important;
    }
    a.delete svg,
    a.hold svg,
    a.approved svg,
    a.comment-edit-link svg {
        margin-left: 15px !important;
    }
    #amount,
    #height,
    #weight,
    #duration,
    #video-tabs button,
    #site-navigation ul li.current-menu-item a,
    #site-navigation ul li a,
    #site-navigation,
    div#author-tabs div button.tab-link,
    div#account-tabs button.tab-link{
        box-shadow: none !important;
    }
    #site-navigation ul li.current-menu-item a {
        -webkit-box-shadow: inset 0px 2px 1px 0px rgba(0,0,0,0.42) !important;
        -o-box-shadow: inset 0px 2px 1px 0px rgba(0,0,0,0.42) !important;
        box-shadow: inset 0px 2px 1px 0px rgba(0,0,0,0.42) !important;
    }
    div#author-tabs div button.tab-link,
    div#favorite-content div#favorite-tabs button.tab-link,
    div#author-tabs div button.tab-link,
    div#account-tabs button.tab-link{
        background: none!important;
    }
    @media  (min-width: 500px) and (max-width : 575px) {
        div#report_user_post button.close,
        div#report_photo button.close {
            right: 0px !important;
        }
    }
    @media (max-width : 530px) {
        div#report_user_post {
            overflow: auto !important;
            margin: 10px !important;
        }
        div#report_photo {
            overflow: auto !important;
            padding-left: 10px !important;
            padding-right: 10px !important;
        }
        div#report_user_post button.close,
        div#report_photo button.close {
            right: 0px !important;
        }
    }
    div#report_user_post button.close,
    div#report_photo button.close {
        box-shadow: none !important;
        border: none !important;
        background: none !important;
        padding: 0 !important;
    }
    div.number_of_photos_in_album {
        position:absolute;
        margin: 0 auto;
        top: 20px;
        left: 48%;
        background: rgba(<?php
        $hex = get_theme_mod('primary_color_setting');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.8)!important;
        border-radius: 4px!important;
        padding: 5px !important;
        font-family: 'Roboto',sans-serif !important;
        font-style: normal;
        font-weight: 500;
        font-size: 14px!important;
        line-height: 16px!important;
        color: rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>, 0.5)!important;
    }
    p.photo_position img.gallery_photo {
        margin: 0 auto!important;
        border-radius: 4px!important;
    }
    div.comments_link a span,
    div.comments_link span span{
        font-family: 'Roboto',sans-serif !important;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        text-transform: uppercase;
        color: rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,1)!important;
    }

    div#control_interface div.comments_link svg path,
    div#control_interface div.comments_link svg path {
        fill: <?=get_theme_mod('secondary_text_site_color');?> !important;
    }


    svg.fa-chevron-right:hover,
    svg.fa-chevron-left:hover,
    svg.fa-expand:hover{
        cursor: pointer;
    }
    i.red-heart {
        color:rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,1)!important;
    }
    div#report_user_post .modal-content {
        border:none !important;
    }
    #pornx_privacy {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 14px;
        color: rgba(<?php
        $hex = get_theme_mod('secondary_text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,.5)!important;
    }
    #pornx_privacy a {
        color: rgba(<?php
        $hex = get_theme_mod('passive_color_setting');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,.5)!important;
        display: inline-flex;
        align-items: center;
        text-decoration: rgba(<?php
        $hex = get_theme_mod('passive_color_setting');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,.5)!important;
        text-decoration: underline !important;
    }
    #pornx_privacy a svg {
        margin-left: 5px;
    }
    #pornx_privacy a:hover {
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,1)!important;
    }
    #filter_videos_area > form > div.filter_container_columns > fieldset:nth-child(1) > div > div:nth-child(2) > div > span {
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 14px;
    }
    div.filters-select{
        white-space: nowrap !important;
    }
    .under-video-block .show-more-related {
        margin-top: 4px !important;
    }
    div.front-edit-comments a.hold svg path {
        fill-opacity: 0.5 !important;
    }
    .site-footer {
        /* margin-top: 0 !important*/
    }
    #widget_videos_block-6,
    #content aside#sidebar {
        margin-bottom: 0!important;
    }
    .footer-menu-container ul li a {
        white-space:nowrap !important;
    }
    span#active_plan {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 16px;
        text-align: right;
        color: <?=get_theme_mod('icons_color_setting')?>;
        display: inline-flex;
        align-items: center;
    }
    span.active > svg {
        margin-left: 10px;
    }
    span.active > svg path {
        fill: <?=get_theme_mod('icons_color_setting')?> !important;
        fill-opacity: 1!important;
    }
    span#best_choice {
        font-family: 'Roboto', sans-serif !important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: <?=get_theme_mod('premium_text_label_color')?> !important;
        margin-right: 10px !important;
    }
    span.product_status span#best_choice ~ span#active_plan svg path {
        fill: <?=get_theme_mod('premium_text_label_color')?> !important;
        fill-opacity: 1!important;
    }
    li.product_item.best_li:hover a span.product_title span.product_status span#best_choice {
        color: <?=get_theme_mod('text_site_color')?> !important;
    }
    li.product_item.best_li:hover span.product_status span#best_choice ~ span#active_plan svg path{
        fill: <?=get_theme_mod('text_site_color')?> !important;
        fill-opacity: 1!important;
    }
    div#playlist-videos article header.categories-entry-header span.cat-video-count {
        margin-top: 3px;
    }
    div#articles_container article.blog-article div.article_image {
        border-radius: 4px;
    }


    <?php if(is_page_template('template-porn-videos.php')):?>
    @media only screen and (max-width: 991px) {
        h2.widget-title.videos-title {
            text-align: center !important;
        }

    }
    <?php endif;?>
    <?php if(is_page_template('template-pornstars.php')):?>
    @media only screen  and (min-width: 320px) and (max-width: 528px) {
        div#primary header.actors-entry-header p.actor-title{
            text-align: center !important;
            white-space: nowrap !important;
            text-overflow: ellipsis !important;
            overflow: hidden !important;
        }
        div#primary header.actors-entry-header p.rating-bar {
            text-align: center !important;
        }
        div#primary header.actors-entry-header p.rating-bar span.views {
            float: unset !important;
            white-space: nowrap !important;
            text-overflow: ellipsis !important;
            overflow: hidden !important;
        }
        div#primary header.actors-entry-header p.rating-bar span.actors-video-count {
            white-space: nowrap !important;
            text-overflow: ellipsis !important;
            overflow: hidden !important;
            display: block!important;
            margin-top: 5px !important;
            float: unset !important;
        }
    }
    <?php endif;?>
    div.play-icon,
    div.play-icon:hover {
        opacity:0 !important;
        display: none!important;
    }
    #popupModal button.close {
        box-shadow: none !important;
        border: none!important;
    }

    span#account_select_tabs-button {
        border-bottom: 1px solid rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,1)!important;
    }
    ul#account_select_tabs-menu {
        background-color: <?= get_theme_mod( 'secondary_color_setting' )?>  !important;
        border-radius: 4px !important;
        margin-top:2px !important;
    }
    ul#account_select_tabs-menu li.ui-menu-item div.ui-menu-item-wrapper {
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,0.5) !important;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 16px;
        background-color: transparent!important;
        border-color: transparent!important;
    }
    ul#account_select_tabs-menu li.ui-menu-item div.ui-menu-item-wrapper.ui-state-active,
    ul#account_select_tabs-menu li.ui-menu-item div.ui-menu-item-wrapper:hover{
        color: rgba(<?php
        $hex = get_theme_mod('text_site_color');
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
        echo $r.",".$g.",". $b;
        ?>,1) !important;
    }
    aside#sidebar div.rating-bar.no-rate {
        min-height: 16px !important;
    }

    aside#sidebar a.more-videos.label.mobile {
        display: none!important;
    }
    div#author-content div.accordeon
    /*,    div#public_profile_tab_content*/{
        min-height: 35em;
    }
    /*div#public_profile_tab_content{
        min-height: 24em;
    }*/
    div#watchlist-content {
       /* min-height: 70vw;*/
        flex-grow: 3;
    }
    div.playlist-description {
        padding-left: 16px;
        padding-right: 16px;
    }

    input#delete_account {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
        background-color: transparent !important;
        border: 1px solid rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5) !important;
    }

    #authform div.nsl-container-block .nsl-container-buttons a > div {
        border-radius: 4px !important;
    }
    div.membership span.welcome svg {
        border-radius: 30px!important;
    }
    div.password_protected {
        background-color: <?=get_theme_mod('input_color')?>;
    }
    aside section.widget.widget_videos_block:first-child {
        margin-top: 15px;
    }

    #wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon::before {
        content: none !important;
    }

    div#account_tab_content {
        height: 100%;
    }
    div#advanced_search{
        /*height: 100vw;*/
    }
    div.recent_video_info p {
        margin-top:0px!important;
        margin-bottom:0px!important;
    }
    div.recent_video_info{
        padding-top:8px!important;
        padding-bottom:3px!important;
    }
    div#user_info > div h4 {
        margin-top: 7px!important;
    }

    div.personal_info_mobile div#contacts_mobile p,
    div.personal_info_mobile div#contacts_mobile ul li,
    div.personal_info_mobile div#contacts_mobile span,
    div.personal_info_mobile div.mobile_first_last_birth p,
    div.personal_info_mobile div.mobile_first_last_birth span,
    div.personal_info_mobile div.mobile_first_last_birth ul li{
        margin: 0;
        padding: 0;
        font-family: 'Roboto',sans-serif;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 18px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,0.5)!important;
        margin-bottom: 10px;
    }
    div.personal_info_mobile div#contacts_mobile p span,
    div.personal_info_mobile div#contacts_mobile ul li span > span,
    div.personal_info_mobile div#contacts_mobile p span,
    div.personal_info_mobile div#contacts_mobile ul li span > span,
    div.personal_info_mobile div.mobile_first_last_birth p span,
    div.personal_info_mobile div.mobile_first_last_birth ul li span > span{
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
    }
    div.personal_info_mobile {
        padding-left: 24px;
        padding-right: 24px;
    }
    div#contacts_mobile {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding-left: 1.5em;
        padding-right: 1.5em;
        align-items: center;
    }
    .woocommerce-error {
        border-top-color: <?=get_theme_mod('btn_color_setting')?> !important;
    }
    .woocommerce-error::before {
        color: <?=get_theme_mod('btn_color_setting')?> !important;
    }
    .woocommerce-error li, .woocommerce-info li, .woocommerce-message li {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 18px!important;
        line-height: 21px!important;
    }
    div.woocommerce-NoticeGroup.woocommerce-NoticeGroup-checkout,
    .woocommerce-error, .woocommerce-info, .woocommerce-message{
        border-radius: 4px !important;
    }
    legend.select_plan_legend > span,
    legend.billing_details_legend > span,
    legend.select_payment_legend > span {
        cursor: pointer;
    }

    button.close.close-text {
        border-radius: 4px;
        font-family: 'Roboto',sans-serif;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 142.69%;
        width: 138px;
        height: 36px;
    }
    button#report_user,
    a.report_user{
        background-color: transparent!important;
        border: none !important;
        color:rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,.5)!important;
        margin-right: 0 !important;
        padding-right: 0 !important;
    }
    button#report_user,
    a.report_user {
        background: none !important;
        box-shadow: none !important;
    }
    div#profile-tabs a.tab-link, div#profile-tabs button.tab-link, div#public-profile-tabs button.tab-link {
        background: none !important;
        box-shadow: none !important;
    }
    button#report_user svg path,
    a.report_user svg path {
        fill:rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,.5)!important;
    }
    button#report_user:hover,
    a.report_user:hover {
        color:rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
    }

    button#report_user:hover svg path,
    a.report_user:hover svg path {
        fill:rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
        fill-opacity: 1 !important;
    }

    <?php if($premium_access && !current_user_can('administrator')):?>
    div.happy-header,
    div.happy-footer-mobile,
    div.happy-under-player-mobile,
    div.happy-header-mobile,
    div.happy-footer,
    div.happy-sidebar,
    div.happy-inside-player,
    div.happy-under-player,
    div.vicetemple-player__happy-inside{
        display:none!important;
    }
    <?php endif;?>
    input#searchsubmit {
        background-color: <?=get_theme_mod('btn_color_setting')?> !important;
        border-radius: 4px;
        opacity: 1 !important;
        margin-left: 5px;
    }
    ul#select_trending_country-menu li div {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: 500!important;
        font-size: 14px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,0.5)!important;
    }
    ul#select_trending_country-menu li div:hover {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
    }

    #password_protected_btn {
        border-radius: 4px!important;
        padding: 8px 30px!important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
        margin-top: 0!important;
        margin-bottom: 0!important;
    }

    input[type="password"] {
        background-color: <?=get_theme_mod('background_color')?>;
        border-radius: 4px!important;
        height: 34px!important;
        padding: 10px 20px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,.5)!important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        border: none !important;
    }
    #password_protected_form > p {
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
    }
    div.password_protected {
        position: relative !important;
    }

    div.password_protected #password_protected_form {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
        padding-left:15px;
        padding-right:15px;
        max-width: 320px;
        width: 100%;
    }
    div.password_protected #password_protected_form > div {
        justify-content: center!important;
    }

    <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
    button#upgrade_btn,
    input#searchsubmit,
    a.more-videos.label.desktop,
    a.more-videos.label.mobile,
    input[type=submit],
    input#clear_user_filter,
    button#to_publish,
    button#сancel,
    div.show-more-related a.button,
    input#close_btn,
    button#edit_user_video,
    div.pagination ul li a,
    a.btn_upload_to_album,
    form.upload_to_album_form button[type=submit],
    a#btn_delete_album,
    form#SubmitVideo button.large,
    form.create_an_album button.large,
    input#blogSearchBtn,
    input#uploadedSearch,
    div.account-list button.save-back,
    div.account-list button.save-profile,
    input#delete_account,
    button#custom_Checkout_Button,
    form#sendSupportMsg button.send_support_msg,
    button.close.close-text,
    a#cn-accept-cookie,
    a#yes,
    a#no,
    a#nope,
    div#premium_btns span.login,
    #popupModal div.modal-footer a.btn,
    #auth_modal #wp-submit-auth-modal,
    #authform div.nsl-container-block .nsl-container-buttons a > div,
    input#user_login,
    input#user_pass,
    span.ui-selectmenu-button,
    div.filters-select,
    div#btn, div#edit_current_video2,
    span#submit_select_category-button, span#ethnicity-button, span#hair_color-button,
    #video_category_select-button,
    span#reportType-button, span#user_post_report_type-button, span#photo_report_type-button, span#user_report_type-button,
    input#edit_profile_button, button#subscribe_on_author,
    h1#user_name button,
    h1#user_name2 button,
    span#i_am-button,
    span#orientation-button,
    span#relation-button,
    span#display_name-button,
    span#account_ethnicity-button,
    span#eye_color-button,
    span#account_hair_style-button,
    span#account_hair_color-button, span#account_tattoo-button, span#account_piercing-button,
    span#playlistList-button,
    #reloadRandomFrame,
    span#faq_select-button,
    div.account-list section form#edit-user fieldset.fieldset input[type=text],
    div.account-list section form#edit-user fieldset.fieldset textarea,
    div.account-list section form#edit-user fieldset.fieldset input[type=password],
    div.account-list section form#edit-user fieldset.fieldset input[type=email],
    div.account-list section form#edit-user fieldset.fieldset input[type=tel],
    div.account-list section form#edit-user2 fieldset.fieldset input[type=text],
    div.account-list section form#edit-user2 fieldset.fieldset textarea,
    div.account-list section form#edit-user2 fieldset.fieldset input[type=password],
    div.account-list section form#edit-user2 fieldset.fieldset input[type=email],
    div.account-list section form#edit-user2 fieldset.fieldset input[type=tel]{
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a62b2b2b', endColorstr='#00000000',GradientType=0 )!important;
        -moz-box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.12)!important;
        -webkit-box-shadow: 0 1px 6px 0 rgb(0 0 0 / 12%)!important;
        -o-box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.12)!important;
        box-shadow: 0 1px 6px 0 rgb(0 0 0 / 12%)!important;
        background: -moz-linear-gradient(top, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0) 70%);
        background: -webkit-linear-gradient(top, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0) 70%);
        background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0) 70%);
    }
    <?php endif;?>
    #authform div.nsl-container.nsl-container-block.nsl-container-embedded-login-layout-below,
    #authform div.nsl-container.nsl-container-block.nsl-container-embedded-login-layout-below div.nsl-container-buttons{
        padding-top: 0!important;
    }
    span#select_trending_country-button {
        filter: none !important;
        -moz-box-shadow: none !important;
        -webkit-box-shadow:none !important;
        -o-box-shadow: none !important;
        box-shadow: none !important;
        background: transparent !important;
        background: transparent !important;
        background:transparent !important;
    }

    button#close-button-del {
        box-shadow: none !important;
        border: none !important;
        background: transparent !important;
    }

    div.activity_content.image div:last-child p {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    div.activity_content > div:first-child {
        margin-bottom: 13px !important;
    }
    div.activity_content {
        padding-bottom: 13px !important;
    }
    div.recent_video_info {
        padding-top:0!important;
        padding-bottom:0!important;
    }
    li#wp-admin-bar-user-order span.ab-icon::before {
        content: "\f155";
        font-size: 17px !important;
    }

    <?php if(is_page_template('content-removal.php')):?>
    @media only screen  and (min-width: 320px) and (max-width: 528px) {
        main#main div.entry-content h2,
        main#main div.entry-content h1{
            text-align: center !important;
        }
    }
    <?php endif;?>


    <?php if(!is_front_page() && xbox_get_field_value('my-theme-options', 'enable_breadcrumbs') == 'on'):?>
        nav#site-navigation {
            margin-bottom: 0px!important;
        }
        .breadcrumbs-area {
            background-color: <?=get_theme_mod('background_color')?> !important;
            border: none !important;
            border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?> !important;
        }
    <?php endif;?>

    span.ui-icon {
        width: 15px !important;
        height: 15px !important;
    }

    #close-button-del,
    div#playlistModal button.close {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
    }
    #galleries_tags_div {
        padding-right: 20px !important;
    }
/*

    div#content {
        max-width: 100vw !important;
    }*/
    header.photos-entry-header p.photo-title {
        white-space: nowrap !important;
        text-overflow: ellipsis !important;
        overflow: hidden !important;
    }
    <?php if(is_front_page()):?>
        main#main section.widget.widget_media_image {
            text-align: center;
        }
    <?php endif; ?>


    div#comments div.comment-meta.commentmetadata > p {
        overflow-wrap: break-word;
    }

    .bx-viewport .slide a div.background-slide-main,
    .bx-viewport .slide{
        background: linear-gradient(180deg, rgba(15, 23, 37, 0) 62.7%, <?=get_theme_mod('background_color')?> 100%) !important;
    }

    .bx-viewport .slide a:hover div.background-slide-hover,
    .bx-viewport .slide a.active_slide div.background-slide-hover{
        background: linear-gradient(180deg,
            rgba(0, 0, 0, 0)
            19.94%,
        rgba(<?php
            $hex = get_theme_mod('btn_hover_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,0.81)
            81.13%);
    }

    nav#site-navigation ul#menu-main-menu li > a,
    div#profile-tabs button.tab-link,
    div#profile-tabs a.tab-link,
    div#community-tabs button.tab-link,
    div#public-profile-tabs button.tab-link,
    #video-tabs button.tab-link span,
    #video-tabs a.tab-link,
    #video-tabs a#add_to_fav_video i.fa.fa-heart-o,
    #video-tabs a#add_to_fav_video2 i.fa.fa-heart-o,
    #video-tabs a#add_to_fav_video i.fa.fa-heart,
    #video-tabs a#add_to_fav_video2 i.fa.fa-heart{
        color: <?=get_theme_mod('menu_color');?> !important;
    }

    nav#site-navigation ul#menu-main-menu li > a > span svg path,
    div#profile-tabs button.tab-link svg path,
    div#profile-tabs a.tab-link svg path,
    div#community-tabs button.tab-link svg path,
    div#community-tabs button.tab-link svg rect,
    div#public-profile-tabs button.tab-link svg path,
    #video-tabs button.tab-link svg path,
    #video-tabs button.tab-link svg rect,
    #video-tabs a.tab-link svg path,
    #video-tabs a.tab-link svg rect{
        fill: <?=get_theme_mod('menu_color');?>
    }

    input#duration {
        background-color: transparent!important;
        border-color: transparent!important;
    }
    div.download_invoice {
        color: <?=get_theme_mod('passive_color_setting');?> !important;
    }
    div.download_invoice:hover {
        cursor: pointer;
        color: <?=get_theme_mod('links_color_setting');?> !important;
        opacity: 1;
    }
    div.download_invoice svg path {
        fill: <?=get_theme_mod('passive_color_setting');?> !important;
    }
    div.download_invoice:hover svg path {
        fill: <?=get_theme_mod('links_color_setting');?> !important;
        fill-opacity: 1 !important;
    }
    p#pornx_privacy a:hover {
        color: <?=get_theme_mod('links_color_setting');?> !important;
        opacity: 1;
    }
    ul#article_tags li a,
    ul#galleries_tags li a,
    ul#article_tags li.article_tags a,
    div.cat-list a, div.tags-list a, div.pornstars_list a{
        color: rgba(<?php
            $hex = get_theme_mod('passive_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,0.5)!important;
    }
    ul#article_tags li:hover a,
    ul#galleries_tags li:hover a,
    ul#article_tags li.article_tags:hover a,
    div.cat-list a:hover, div.tags-list a:hover, div.pornstars_list a:hover{
        color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
    }
    span.remove_user_post:hover svg path,
    span.report_user_post:hover svg path{
        fill: <?=get_theme_mod('text_site_color');?> !important;
        fill-opacity: 1 !important;
    }
    span.report_user_post:hover {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
    }
    p.error {
        color: rgba(<?php
            $hex = get_theme_mod('text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,1)!important;
        font-family: 'Roboto',sans-serif!important;
        font-style: normal!important;
        font-weight: normal!important;
        font-size: 14px!important;
        line-height: 16px!important;
    }
    input[type=text],
    input[type=email],
    input[type=search],
    textarea{
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,0.5) !important;
    }

    .pagination ul li {
        min-width: 30px;
        height: 30px;
    }
    .pagination ul li.importantRule {
        min-width: 0px;
        margin-right: 0px;
        margin-left: 0px;
    }
    i.fa.fa-heart.red-heart,
    i.fa.fa-heart-o.red-heart{
        color: <?=get_theme_mod('text_site_color');?> !important;
    }
    div.div_control_fullscreen i.fa.fa-heart,
    div.div_control_fullscreen i.fa.fa-heart.red-heart,
    div.div_control_fullscreen i.fa.fa-heart-o.red-heart {
        color: <?=get_theme_mod('text_site_color');?> !important;
        opacity: 0.5 !important;
    }
    i.fa.fa-heart,
    i.fa.fa-heart-o{
        color: <?=get_theme_mod('secondary_text_site_color');?> !important;
    }
    div.comments_link a:hover,
    div.comments_link span:hover,
    i#heart:hover{
        color: <?=get_theme_mod('text_site_color');?> !important;
    }

    div.div_control_fullscreen span:hover i.fa.fa-heart-o{
        color: <?=get_theme_mod('text_site_color');?> !important;
        opacity: 0.5 !important;
    }
    div.comments_link a:hover svg path,
    div.comments_link span:hover svg path,
    div#control_interface div.comments_link a:hover svg path,
    div#control_interface div.comments_link span:hover svg path,
    div.div_control_fullscreen a:hover svg path,
    div.div_control_fullscreen span:hover svg path,
    div.div_control_fullscreen button.close:hover svg path{
        fill: <?=get_theme_mod('text_site_color');?> !important;
    }
    div#control_interface div.comments_link span.share-alt-not-fullscreen.active {
        width: 73px;
    }
    div#control_interface div.comments_link span.share-alt-not-fullscreen.active span {
        color: <?=get_theme_mod('text_site_color');?> !important;
    }
    div#control_interface div.comments_link span.share-alt-not-fullscreen.active svg path{
        fill: <?=get_theme_mod('text_site_color');?> !important;
    }
    div#control_interface div.comments_link span.share-alt-not-fullscreen.active svg {
        margin-left: unset!important;
    }

    div.filter-btns-videos {
        border-top: 1px solid <?=get_theme_mod('primary_color_setting');?> !important;
    }

    span.watchLaterIcon {
        width: 44px!important;
        height: 44px!important;
        display:block!important;
    }
    span.watchLaterIcon > i.fa  {
        display:none;
        margin-left: 15px !important;
        margin-top: 15px !important;
    }
    #filter_users_area,
    #filter_videos_area {
        background: <?=get_theme_mod('secondary_background_color')?>!important;
    }

    #activity_container  div.recent_video_info > p:nth-child(1) > span:nth-child(1) > span {
        color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>,0.5) !important;
    }

    <?php if ('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
        p.footer_rta a img {
            background: #0F1725;
            border-radius: 4px;
            padding: 5px 10px;
        }
        div.bx-caption span {
            color: #ffffff !important;
        }
        span.hd-video svg rect {
            fill: <?=get_theme_mod('text_site_color');?> !important;
        }
    <?php endif;?>


    #user_info > div:nth-child(3) > p:nth-child(2) > span,
    #user_info > div:nth-child(3) > p:nth-child(3) > span{
        overflow-wrap: break-word;
    }

    <?php if ('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )){
        $def_btn_color = '#100025';
    }
    elseif ('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )){
        $def_btn_color = '#520027';
    }
    elseif ('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )){
        $def_btn_color = '#031748';
    }
    elseif ('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )){
        $def_btn_color = '#003538';
    }
    elseif ('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )){
        $def_btn_color = '#ffffff';
    }
    else $def_btn_color = get_theme_mod('text_site_color');?>
    div.upgrade button,
    div.upgrade button i.fa-star,
    main#main a.more-videos span,
    #back-to-top i::before,
    div.filter-btns-videos input[type=submit],
    #sendPostReport, #sendPhotoReport, #sendUserReport,
    button.large,
    a.btn_upload_to_album,
    form.upload_to_album_form button[type=submit],
    form#SubmitVideo button.large,
    form.create_an_album button.large,
    #forms > button.large,
    #forms > button.large[disabled=disabled],
    div#user_name button,
    div#user_name2 button,
    #apply_on_my_uploads_page,
    div.account-list button.save-back,
    div.account-list button.save-profile,
    #updateuser,
    #custom_Checkout_Button,
    button#savePlaylist,
    #sendReport,
    #apply_btn,
    #commentform #submit,
    input#edit_profile_button,
    button#subscribe_on_author,
    div.show-more-related a,
    form#forms button[type=submit],
    input[type="submit"],
    #to_publish,
    span.photo-count-span{
        color: <?=$def_btn_color?>!important;
    }
    div.search-btn-icon svg path,
    input#blogSearchBtn svg path,
    input#uploadedSearch svg path,
    #searchforblog > div > svg > path,
    #filter > div > div > svg > path{
        fill:<?=$def_btn_color?> !important;
    }

    #wpadminbar .ab-empty-item,
    #wpadminbar a.ab-item,
    #wpadminbar>#wp-toolbar span.ab-label,
    #wpadminbar>#wp-toolbar span.noticon {
        color: #f0f0f1 !important;
    }

    <?php if ('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' ) && get_theme_mod('enable_demos_color_scheme') == 'demos'):?>
        input#search_in_uploaded {
            border-color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
        }
        div.form_edit_video_container input#title-video,
        div.form_edit_video_container #description-video,
        div.form_edit_video_container #video_category_select-button,
        div.form_edit_video_container #tag-video,
        div.form_edit_video_container #btn,
        #reportType-button,
        #reportMsg,
        textarea#embed_frame{
            border: 1px solid <?=get_theme_mod( 'btn_color_setting'); ?>!important;
        }
    <?php endif;?>
    <?php if ('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
        <?php if(is_page_template('template-community.php')):?>
            main div.videos-list article header.categoryVideoWatchLater,
            main div article header.categoryVideoWatchLater {
                background: <?=get_theme_mod('secondary_color_setting');?> !important;
            }
            span.watchLaterIcon {
                display: none !important;
            }
            p.video_block_delimiter,
            div.video-debounce-bar-back{
                background: <?=get_theme_mod('background_color')?> !important;
            }
        <?php endif;?>
    <?php endif;?>

    <?php if ('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche' ) && get_theme_mod('enable_demos_color_scheme') == 'demos'):?>
        input#search_in_uploaded {
            border-color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
        }
        div.form_edit_video_container input#title-video,
        div.form_edit_video_container #description-video,
        div.form_edit_video_container #video_category_select-button,
        div.form_edit_video_container #tag-video,
        div.form_edit_video_container #btn,
        #reportType-button,
        #reportMsg,
        textarea#embed_frame{
            border: 1px solid <?=get_theme_mod( 'btn_color_setting'); ?>!important;
        }
    <?php endif;?>
    <?php if ('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
        <?php if(is_page_template('template-community.php')):?>
            main div.videos-list article header.categoryVideoWatchLater,
            main div article header.categoryVideoWatchLater {
                background: <?=get_theme_mod('secondary_color_setting');?> !important;
            }
            span.watchLaterIcon {
                display: none !important;
            }
            p.video_block_delimiter,
            div.video-debounce-bar-back{
                background: <?=get_theme_mod('background_color')?> !important;
            }
        <?php endif;?>
    <?php endif;?>

    <?php if ('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche' ) && get_theme_mod('enable_demos_color_scheme') == 'demos'):?>
    input#search_in_uploaded {
        border-color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    div.form_edit_video_container input#title-video,
    div.form_edit_video_container #description-video,
    div.form_edit_video_container #video_category_select-button,
    div.form_edit_video_container #tag-video,
    div.form_edit_video_container #btn,
    #reportType-button,
    #reportMsg,
    textarea#embed_frame{
        border: 1px solid <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    <?php endif;?>
    <?php if ('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    <?php if(is_page_template('template-community.php')):?>
    main div.videos-list article header.categoryVideoWatchLater,
    main div article header.categoryVideoWatchLater {
        background: <?=get_theme_mod('secondary_color_setting');?> !important;
    }
    span.watchLaterIcon {
        display: none !important;
    }
    p.video_block_delimiter,
    div.video-debounce-bar-back{
        background: <?=get_theme_mod('background_color')?> !important;
    }
    <?php endif;?>
    <?php endif;?>

    <?php if ('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' ) && get_theme_mod('enable_demos_color_scheme') == 'demos'):?>
    input#search_in_uploaded {
        border-color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    div.form_edit_video_container input#title-video,
    div.form_edit_video_container #description-video,
    div.form_edit_video_container #video_category_select-button,
    div.form_edit_video_container #tag-video,
    div.form_edit_video_container #btn,
    #reportType-button,
    #reportMsg,
    textarea#embed_frame{
        border: 1px solid <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    <?php endif;?>
    <?php if ('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    <?php if(is_page_template('template-community.php')):?>
    main div.videos-list article header.categoryVideoWatchLater,
    main div article header.categoryVideoWatchLater {
        background: <?=get_theme_mod('secondary_color_setting');?> !important;
    }
    span.watchLaterIcon {
        display: none !important;
    }
    p.video_block_delimiter,
    div.video-debounce-bar-back{
        background: <?=get_theme_mod('background_color')?> !important;
    }
    <?php endif;?>
    <?php endif;?>

    <?php if ('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' ) && get_theme_mod('enable_demos_color_scheme') == 'demos'):?>
    input#search_in_uploaded {
        border-color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    div.form_edit_video_container input#title-video,
    div.form_edit_video_container #description-video,
    div.form_edit_video_container #video_category_select-button,
    div.form_edit_video_container #tag-video,
    div.form_edit_video_container #btn,
    #reportType-button,
    #reportMsg,
    textarea#embed_frame{
        border: 1px solid <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    <?php endif;?>
    <?php if ('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    <?php if(is_page_template('template-community.php')):?>
    main div.videos-list article header.categoryVideoWatchLater,
    main div article header.categoryVideoWatchLater {
        background: <?=get_theme_mod('secondary_color_setting');?> !important;
    }
    span.watchLaterIcon {
        display: none !important;
    }
    p.video_block_delimiter,
    div.video-debounce-bar-back{
        background: <?=get_theme_mod('background_color')?> !important;
    }
    <?php endif;?>
    <?php endif;?>


    <?php if ('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' ) && get_theme_mod('enable_demos_color_scheme') == 'demos'):?>
    input#search_in_uploaded {
        border-color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    div.form_edit_video_container input#title-video,
    div.form_edit_video_container #description-video,
    div.form_edit_video_container #video_category_select-button,
    div.form_edit_video_container #tag-video,
    div.form_edit_video_container #btn,
    #reportType-button,
    #reportMsg,
    textarea#embed_frame{
        border: 1px solid <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    <?php endif;?>
    <?php if ('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    <?php if(is_page_template('template-community.php')):?>
    main div.videos-list article header.categoryVideoWatchLater,
    main div article header.categoryVideoWatchLater {
        background: <?=get_theme_mod('secondary_color_setting');?> !important;
    }
    span.watchLaterIcon {
        display: none !important;
    }
    p.video_block_delimiter,
    div.video-debounce-bar-back{
        background: <?=get_theme_mod('background_color')?> !important;
    }
    <?php endif;?>
    <?php endif;?>

    <?php if ('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' ) && get_theme_mod('enable_demos_color_scheme') == 'demos'):?>
    input#search_in_uploaded {
        border-color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    div.form_edit_video_container input#title-video,
    div.form_edit_video_container #description-video,
    div.form_edit_video_container #video_category_select-button,
    div.form_edit_video_container #tag-video,
    div.form_edit_video_container #btn,
    #reportType-button,
    #reportMsg,
    textarea#embed_frame{
        border: 1px solid <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    <?php endif;?>
    <?php if ('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    <?php if(is_page_template('template-community.php')):?>
    main div.videos-list article header.categoryVideoWatchLater,
    main div article header.categoryVideoWatchLater {
        background: <?=get_theme_mod('secondary_color_setting');?> !important;
    }
    span.watchLaterIcon {
        display: none !important;
    }
    p.video_block_delimiter,
    div.video-debounce-bar-back{
        background: <?=get_theme_mod('background_color')?> !important;
    }
    <?php endif;?>
    <?php endif;?>

    <?php if ('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' ) && get_theme_mod('enable_demos_color_scheme') == 'demos'):?>
    input#search_in_uploaded {
        border-color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    div.form_edit_video_container input#title-video,
    div.form_edit_video_container #description-video,
    div.form_edit_video_container #video_category_select-button,
    div.form_edit_video_container #tag-video,
    div.form_edit_video_container #btn,
    #reportType-button,
    #reportMsg,
    textarea#embed_frame{
        border: 1px solid <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    <?php endif;?>
    <?php if ('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    <?php if(is_page_template('template-community.php')):?>
    main div.videos-list article header.categoryVideoWatchLater,
    main div article header.categoryVideoWatchLater {
        background: <?=get_theme_mod('secondary_color_setting');?> !important;
    }
    span.watchLaterIcon {
        display: none !important;
    }
    p.video_block_delimiter,
    div.video-debounce-bar-back{
        background: <?=get_theme_mod('background_color')?> !important;
    }
    <?php endif;?>
    <?php endif;?>


    <?php if ('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' ) && get_theme_mod('enable_demos_color_scheme') == 'demos'):?>
    input#search_in_uploaded {
        border-color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    div.form_edit_video_container input#title-video,
    div.form_edit_video_container #description-video,
    div.form_edit_video_container #video_category_select-button,
    div.form_edit_video_container #tag-video,
    div.form_edit_video_container #btn,
    #reportType-button,
    #reportMsg,
    textarea#embed_frame{
        border: 1px solid <?=get_theme_mod( 'btn_color_setting'); ?>!important;
    }
    <?php endif;?>
    <?php if ('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
    <?php if(is_page_template('template-community.php')):?>
    main div.videos-list article header.categoryVideoWatchLater,
    main div article header.categoryVideoWatchLater {
        background: <?=get_theme_mod('secondary_color_setting');?> !important;
    }
    span.watchLaterIcon {
        display: none !important;
    }
    p.video_block_delimiter,
    div.video-debounce-bar-back{
        background: <?=get_theme_mod('background_color')?> !important;
    }
    <?php endif;?>
    <?php endif;?>

        <?php if ('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' ) && get_theme_mod('enable_demos_color_scheme') == 'demos'):?>
        input#search_in_uploaded {
            border-color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
        }
        div.form_edit_video_container input#title-video,
        div.form_edit_video_container #description-video,
        div.form_edit_video_container #video_category_select-button,
        div.form_edit_video_container #tag-video,
        div.form_edit_video_container #btn,
        #reportType-button,
        #reportMsg,
        textarea#embed_frame{
            border: 1px solid <?=get_theme_mod( 'btn_color_setting'); ?>!important;
        }
    <?php endif;?>
    <?php if ('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )):?>
        <?php if(is_page_template('template-community.php')):?>
        main div.videos-list article header.categoryVideoWatchLater,
        main div article header.categoryVideoWatchLater {
            background: <?=get_theme_mod('secondary_color_setting');?> !important;
        }
        span.watchLaterIcon {
            display: none !important;
        }
        p.video_block_delimiter,
        div.video-debounce-bar-back{
            background: <?=get_theme_mod('background_color')?> !important;
        }
        <?php endif;?>
    <?php endif;?>

    <?php if(xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'off' && xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'off'):?>
    p.video_block_delimiter {
        display: none !important;
    }
    <?php endif;?>

    span.delete_image {
        height: 27px !important;
    }

    div.wrap_image_div {
        width: 200px;
        height: 250px;
        border-radius: 4px;
    }
    div.wrap_image_div::after {
        border-radius: 3px;
        content: '';
        display: block;
        height: 250px;
        position: absolute;
        left: 5px;
        top: 5px;
        background-color: rgb(0,0,0);
        opacity: 0.8;
        transition: 500ms opacity;
    }
    <?php
    switch(xbox_get_field_value( 'my-theme-options', 'number_photos_per_row' )) {
        case '2': ?>
    div.wrap_image_div::after {
        width: 98.4%;
    }
    <?php break;
        case '3': ?>
    div.wrap_image_div::after {
        width: 97.7%;
    }
    <?php break;
        case '4': ?>
    div.wrap_image_div::after {
        width: 97%;
    }
    <?php break;
        case '5': ?>
    div.wrap_image_div::after {
        width: 95.8%;
    }
    <?php break;
        default: ?>
    div.wrap_image_div::after {
        width: 95%;
    }
    <?php break;?>
    <?php } ?>
    div#video_file_upload div#btn {
        max-width: 160px!important;
        overflow: hidden!important;
        white-space: nowrap!important;
        text-overflow: ellipsis!important;
    }
    form#message div#video_file_upload div#upload_text p{
        max-width: 130px!important;
        overflow: hidden!important;
        white-space: nowrap!important;
        text-overflow: ellipsis!important;
    }
    #back-to-top.show i{
        color: inherit !important;
    }
    <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
    input#edit_profile_button,
    button#subscribe_on_author,
    #auth_modal #wp-submit-auth-modal,
    #reg_part button#nav2,
    #auth_modal #wp-submit-auth-modal:hover,
    #reg_part button#nav2:hover,
    div.account-list button.save-back,
    div.account-list button.save-profile,
    .site-branding .header-search input#searchsubmit{
        border: 1px solid <?=get_theme_mod('btn_color_setting')?> !important;
    }
    <?php endif;?>
    <?php if(is_page_template('template-playlists.php')):?>
        div#primary {
            background: none !important;
        }
        <?php if(xbox_get_field_value('my-theme-options', 'show-sidebar-in-playlist') == 'on'):?>
            div.tab-content {
                padding-left: 24px !important;
                padding-right: 24px !important;
            }
        <?php endif;?>
    <?php endif;?>

    <?php if(is_post_type_archive('photos') && !is_category() && !is_page_template('template-categories.php') || is_author()):?>
    @media only screen  and (min-width : 64.001em) and (max-width : 84em) {
        /***albums***/
        #main .thumb-block.album.photos.type-photos {
            width: <?php echo esc_html( $album_per_row ); ?>%!important;
        }
    }
    /* Desktops and laptops ----------- */
    @media only screen  and (min-width : 84.001em) {
        #main .thumb-block.album.photos.type-photos {
            width: <?php echo esc_html( $album_per_row ); ?>%!important;
        }
    }
    <?php endif;?>

    .site-branding {
        padding-left: 24px !important;
    }

    div.zone-1 {
        margin-right: 10px;
    }

    div#div_coupon_details {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    div.div_first_coupon {
        width: 100%;
    }
    input#coupon_code {
        width: 95%;
    }
    div#div_coupon_details button {
        border-radius: 4px!important;
        font-family: 'Roboto',sans-serif!important;
        width: 100%!important;
        font-style: normal!important;
        font-weight: 500!important;
        font-size: 14px!important;
        line-height: 142.69%!important;
        background-color: <?=get_theme_mod('btn_hover_color_setting')?>  !important;
        border-color: <?=get_theme_mod('btn_hover_color_setting')?>  !important;
        color: <?=get_theme_mod('text_site_color')?>;
        padding: 10px!important;
        white-space: nowrap;
    }
    div.bx-caption a.caption_a {
        cursor: pointer;
    }
    @media (min-width: 992px) and  (max-width: 1011px) {
        #site-navigation > ul > li > a {
            padding: 0 17px !important;
        }
    }
    @media (min-width: 1012px) and  (max-width: 1028px) {
        #site-navigation > ul > li > a {
            padding: 0 19px !important;
        }
    }
    div#mobile-top-menus {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
    div#site-navigation-mob {
        width: 50px;
        display: none;
    }
    <?php if(is_page_template('template-public-profile.php')):?>
        #content {
            min-height: auto !important;
        }
    <?php endif;?>


    <?php if(is_user_logged_in()):?>
    @media only screen and (max-width : 767.98px) {
        .top-bar .membership {
            margin-top: 7px !important;
        }
    }
    <?php else:?>
    @media only screen and (max-width : 767.98px) {
        .top-bar .membership {
            margin-top: 5px !important;
        }
    }
    <?php endif;?>

    <?php if(is_user_logged_in()):?>
    @media (min-width: 768px) and (max-width: 991.98px) {
        .top-bar .membership {
            margin-top: 7px !important;
        }
    }
    <?php else:?>
    @media (min-width: 768px) and (max-width: 991.98px) {
        .top-bar .membership {
            margin-top: 5px !important;
        }
    }
    <?php endif;?>
    select#search_select {
        width: 84px !important;
        height: 36px  !important;
        font-size: 12px  !important;
        line-height: 14px  !important;
        opacity: 0.5 !important;
        font-family: 'Roboto',sans-serif!important;
    }
    select#search_select option {
        font-size: 12px  !important;
        line-height: 14px  !important;
        opacity: 0.5 !important;
        font-family: 'Roboto',sans-serif!important;
    }

    <?php if(is_front_page() && isset($_GET['filter']) && !empty($_GET['filter'])):?>
    @media (max-width: 528px) {
        #main header h2.widget-title {
            padding-bottom: 76px;
        }
        #main header #filters {
            position: absolute;
            top: 56px;
            left: 0px;
            right: 0px;
            width: 100%;
            text-align: center;
        }
        #main header #filters div.filters-select {
            display: inline-block;
        }
        div.filters-options {
            right: 50% !important;
            margin-right: calc(-180px/2);
        }
    }
    <?php endif;?>
</style>
