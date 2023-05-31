<?php
/**
 * Template Name: Edit Profile
 **/
if(empty($_POST['update_profile'])) {
	if($_SERVER['REQUEST_METHOD'] !== 'POST' || !current_user_can('administrator') || empty($_POST['user_id'])) {
		wp_redirect(site_url('/forbidden/'));
		die();
	}
}

if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
	if ( !empty( $_POST['country'] ) )
		update_user_meta( $_POST['user_id'], 'country', esc_attr( $_POST['country'] ) );

	if ( !empty( $_POST['city'] ) )
		update_user_meta( $_POST['user_id'], 'city', esc_attr( $_POST['city'] ) );

	if ( !empty( $_POST['i_am'] ) )
		update_user_meta( $_POST['user_id'], 'i_am', esc_attr( $_POST['i_am'] ) );

	if ( !empty( $_POST['orientation'] ) )
		update_user_meta( $_POST['user_id'], 'orientation', esc_attr( $_POST['orientation'] ) );

	if ( !empty( $_POST['relation'] ) )
		update_user_meta( $_POST['user_id'], 'relation', esc_attr( $_POST['relation'] ) );

	if ( !empty( $_POST['birthday'] ) )
		update_user_meta( $_POST['user_id'], 'birthday', esc_attr( $_POST['birthday'] ) );

	if ( !empty( $_POST['languages'] ) )
		update_user_meta( $_POST['user_id'], 'languages', esc_attr( $_POST['languages'] ) );

	if ( !empty( $_POST['fetishes'] ) )
		update_user_meta( $_POST['user_id'], 'fetishes', esc_attr( $_POST['fetishes'] ) );


	if ( !empty( $_POST['ethnicity'] ) )
		update_user_meta( $_POST['user_id'], 'ethnicity', esc_attr( $_POST['ethnicity'] ) );

	if ( !empty( $_POST['eye_color'] ) )
		update_user_meta( $_POST['user_id'], 'eye_color', esc_attr( $_POST['eye_color'] ) );

	if ( !empty( $_POST['hair_style'] ) )
		update_user_meta( $_POST['user_id'], 'hair_style', esc_attr( $_POST['hair_style'] ) );
	if ( !empty( $_POST['hair_color'] ) )
		update_user_meta( $_POST['user_id'], 'hair_color', esc_attr( $_POST['hair_color'] ) );
	if ( !empty( $_POST['height'] ) )
		update_user_meta( $_POST['user_id'], 'height', esc_attr( $_POST['height'] ) );
	if ( !empty( $_POST['weight'] ) )
		update_user_meta( $_POST['user_id'], 'weight', esc_attr( $_POST['weight'] ) );
	if ( !empty( $_POST['tattoo'] ) )
		update_user_meta( $_POST['user_id'], 'tattoo', esc_attr( $_POST['tattoo'] ) );
	if ( !empty( $_POST['piercing'] ) )
		update_user_meta( $_POST['user_id'], 'piercing', esc_attr( $_POST['piercing'] ) );

	if ( !empty( $_POST['nickname'] ) )
		update_user_meta( $_POST['user_id'], 'nickname', esc_attr( $_POST['nickname'] ) );
	if ( !empty( $_POST['first-name'] ) )
		update_user_meta( $_POST['user_id'], 'first_name', esc_attr( $_POST['first-name'] ) );
	if ( !empty( $_POST['last-name'] ) )
		update_user_meta($_POST['user_id'], 'last_name', esc_attr( $_POST['last-name'] ) );
	if ( !empty( $_POST['display_name'] ) )
		wp_update_user(array('ID' => $_POST['user_id'], 'display_name' => esc_attr( $_POST['display_name'] )));
	    update_user_meta($_POST['user_id'], 'display_name' , esc_attr( $_POST['display_name'] ));
	if ( !empty( $_POST['description'] ) )
		update_user_meta( $_POST['user_id'], 'description', esc_attr( $_POST['description'] ) );
	/* Redirect so the page will show updated info.*/
	do_action('edit_user_profile_update', $_POST['user_id']);

}
get_header();
?>
<div id="primary" class="content-area actors-list">
	<main id="main" class="site-main" role="main">
		<div>
			<header class="entry-header">
				<h2 class="widget-title"><?php echo 'You are editing '. get_userdata($_POST['user_id'])->display_name.'\'s profile';?></h2>
			</header>
		<?php if ( isset($_GET['updated']) && $_GET['updated'] == true ) : ?>
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
                    display: block;
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
                    z-index: 99999;
                    position: fixed;
                    top:0;
                    left:0;
                    width: 100%;
                    height: 100%;
                    background: rgba(15, 23, 37, 0.9);
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
                <button class="class-button" id="close-button-del" onclick="document.getElementById('modalDelMsg').style.display='none';
                            document.getElementById('modal-overlay-del').style.zIndex='-1000';
                            window.history.pushState('name', '', window.location.href.split('?')[0]);">
                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                        <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                    </svg>
                </button>
                <div class="modal-guts-del">
                    <div>
                        <span class="confirm"><?php echo get_userdata($_POST['user_id'])->display_name.'\'s '. esc_html__('profile has been updated.', 'arc'); ?></span>
                    </div>
                </div>
            </div>
            <div class="modal-overlay-del" id="modal-overlay-del"></div>
            <!--- [end] modal for delete btn---->
		<?php endif;?>
			<div id="account_tab_content">
				<!--feed tab--->
				<div class="account-list edit_user_profile" id="edit_profile" style="display:block">
					<section class="tab-content">
				<form method="post" id="edit-user" action="<?php the_permalink(); ?>?updated=true" name="front_end_upload">
					<legend><?php echo esc_html__( 'Profile picture', 'arc' ); ?></legend>
					<fieldset class="fieldset">
						<div>
							<a href="#" data-user-id="<?=$_POST['user_id']?>" data-action="avatar" id="set_profile_picture_to_default">Set profile picture to default</a>
						</div>
					</fieldset>
					<legend><?php echo esc_html__( 'Profile background', 'arc' ); ?></legend>
					<fieldset class="fieldset">
						<div>
							<a href="#" data-user-id="<?=$_POST['user_id']?>" data-action="back" id="set_profile_back_to_default">Set background picture to default</a>
						</div>
					</fieldset>

					<legend><?php echo esc_html__( 'Location', 'arc' ); ?></legend>
					<fieldset class="fieldset">
						<div id="div_country_city" style="display: flex; flex-wrap: wrap;justify-content: space-between">
							<div style="width: 100%; max-width: 285px">
								<label for="country">Country</label>
								<input maxlength="32" class="text-input" placeholder="Country" name="country" type="text" id="country" value="<?php the_author_meta( 'country', $_POST['user_id'] ); ?>" />
							</div>
							<div style="width: 100%; max-width: 285px">
								<label for="city">City</label>
								<input maxlength="20" class="text-input" placeholder="City" name="city" type="text" id="city" value="<?php the_author_meta( 'city', $_POST['user_id'] ); ?>" />
							</div>
						</div>
					</fieldset>

					<legend><?php echo esc_html__( 'Personal information', 'arc' ); ?></legend>
					<fieldset class="fieldset">
						<div id="div_i_am_orientation" style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-bottom: 20px;">
							<div style="width: 100%; max-width: 186px">
								<label for="i_am"><?php echo esc_html__('Gender ', 'arc') ?></label>
								<select name="i_am" id="i_am"><br/>
									<option disabled selected value="0"><?php echo __('Choose gender', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Male', 'arc')); ?>><?php echo __('Male', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Female', 'arc')); ?>><?php echo __('Female', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Transgender MtF', 'arc')); ?>><?php echo __('Transgender MtF', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Transgender FtM', 'arc')); ?>><?php echo __('Transgender FtM', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Genderqueer', 'arc')); ?>><?php echo __('Genderqueer', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Male and female couple', 'arc')); ?>><?php echo __('Male and female couple', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Male couple', 'arc')); ?>><?php echo __('Male couple', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Female couple', 'arc')); ?>><?php echo __('Female couple', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Transgender couple', 'arc')); ?>><?php echo __('Transgender couple', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Transgender and male couple', 'arc')); ?>><?php echo __('Transgender and male couple', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Transgender and female couple', 'arc')); ?>><?php echo __('Transgender and female couple', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'i_am', true), __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
								</select>
							</div>
							<div style="width: 100%; max-width: 186px">
								<label for="orientation"><?php echo esc_html__('Orientation ', 'arc') ?></label>
								<select name="orientation" id="orientation"><br/>
									<option disabled selected value="0"><?php echo __('Choose orientation', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'orientation', true), __('Heterosexual', 'arc')); ?>><?php echo __('Heterosexual', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'orientation', true), __('Homosexual', 'arc')); ?>><?php echo __('Homosexual', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'orientation', true), __('Bisexual', 'arc')); ?>><?php echo __('Bisexual', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'orientation', true), __('Heteroflexible', 'arc')); ?>><?php echo __('Heteroflexible', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'orientation', true), __('Homoflexible', 'arc')); ?>><?php echo __('Homoflexible', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'orientation', true), __('Pansexual', 'arc')); ?>><?php echo __('Pansexual', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'orientation', true), __('Asexual', 'arc')); ?>><?php echo __('Asexual', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'orientation', true), __('Not sure', 'arc')); ?>><?php echo __('Not sure', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'orientation', true), __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
								</select>
							</div>

							<div style="width: 100%; max-width: 186px">
								<label for="relation"><?php echo esc_html__('Relationship status', 'arc') ?></label>
								<select name="relation" id="relation"><br/>
									<option disabled value="0"><?php echo __('Choose status', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'relation', true), __('Single', 'arc')); ?>><?php echo __('Single', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'relation', true), __('Taken', 'arc')); ?>><?php echo __('Taken', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'relation', true), __('Open', 'arc')); ?>><?php echo __('Open', 'arc'); ?></option>
								</select>
							</div>
						</div>

						<div id="div_nick_name" style="display: flex; flex-wrap: wrap;justify-content:space-between">
							<div style="width: 100%; max-width: 186px">
								<label for="nickname">Nickname</label>
								<input maxlength="20" class="text-input" placeholder="Nickname" name="nickname" type="text" id="nickname" value="<?php the_author_meta( 'nickname', $_POST['user_id'] ); ?>" />
							</div>
							<div style="width: 100%; max-width: 186px">
								<label for="first-name">First name</label>
								<input maxlength="20" class="text-input" placeholder="First name" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $_POST['user_id'] ); ?>" />
							</div>
							<div style="width: 100%; max-width: 186px">
								<label for="last-name">Last name</label>
								<input maxlength="20" class="text-input" placeholder="Last name" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $_POST['user_id'] ); ?>" />
							</div>
						</div>

						<div id="div_display_birthday" style="display: flex; flex-wrap: wrap; justify-content: space-between">
							<div style="width: 100%; max-width: 285px">
								<label for="display_name"><?php echo esc_html__('Display name', 'arc') ?></label>
								<select name="display_name" id="display_name"><br/>
									<?php
									$public_display = array();
									$public_display['display_nickname']  = get_userdata($_POST['user_id'])->nickname;
									$public_display['display_username']  = get_userdata($_POST['user_id'])->user_login;
									if ( !empty(get_userdata($_POST['user_id'])->first_name) )
										$public_display['display_firstname'] = get_userdata($_POST['user_id'])->first_name;
									if ( !empty(get_userdata($_POST['user_id'])->last_name) )
										$public_display['display_lastname'] = get_userdata($_POST['user_id'])->last_name;
									if ( !empty(get_userdata($_POST['user_id'])->first_name) && !empty(get_userdata($_POST['user_id'])->last_name) ) {
										$public_display['display_firstlast'] = get_userdata($_POST['user_id'])->first_name . ' ' . get_userdata($_POST['user_id'])->last_name;
										$public_display['display_lastfirst'] = get_userdata($_POST['user_id'])->last_name . ' ' . get_userdata($_POST['user_id'])->first_name;
									}
									if ( ! in_array( get_userdata($_POST['user_id'])->display_name, $public_display ) ) // Only add this if it isn't duplicated elsewhere
										$public_display = array( 'display_displayname' => get_userdata($_POST['user_id'])->display_name ) + $public_display;
									$public_display = array_map( 'trim', $public_display );
									$public_display = array_unique( $public_display );
									foreach ( $public_display as $id => $item ) {
										?>
										<option <?php selected( get_userdata($_POST['user_id'])->display_name, $item ); ?>><?php echo $item; ?></option>
										<?php
									}
									?>
								</select>
							</div>
							<script>
                                jQuery(document).ready(function ($) {
                                    $("#birthday").datepicker(
                                        /*{
                                        changeMonth: true,
                                        changeYear: true
                                    }*/
                                    );
                                });
							</script>
							<style>
                                .ui-state-default,
                                .ui-widget-content .ui-state-default,
                                .ui-widget-header .ui-state-default,
                                .ui-button,
                                html .ui-button.ui-state-disabled:hover,
                                html .ui-button.ui-state-disabled:active {
                                    color: black !important;
                                }
                                .ui-state-default:hover{
                                    border-color: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?>!important;
                                }
                                .ui-state-active, .ui-widget-content .ui-state-active {
                                    background-color: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?>!important;
                                    border-color: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?>!important;
                                    color: <?php echo get_theme_mod( 'text_site_color'); ?>!important;
                                }
                                .ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
                                    border-color: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?>!important;
                                    background-color: white !important;
                                }
                                html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
                                    border-color: <?php echo get_theme_mod( 'btn_hover_color_setting'); ?>!important;
                                }
                                div#calendar_inside i {
                                    color: <?php echo get_theme_mod( 'icons_color_setting'); ?> !important;
                                    font-size: 20px;
                                    position: relative;
                                    z-index: 1;
                                    float: right;
                                    top: 30px;
                                    right: 10px;
                                }
							</style>

							<div style="width: 100%; max-width: 285px">
								<label for="birthday"><?php echo esc_html__('Birthday', 'arc'); ?> </label>
								<div id="calendar_inside" style="margin-top: -20px;">
									<i class="fa fa-calendar"></i>
									<input class="text-input" type="text" id="birthday" name="birthday" value="<?php the_author_meta( 'birthday', $_POST['user_id'] ); ?>">
								</div>
							</div><br>
						</div>

						<div id="div_lang_fetish" style="display: flex; flex-wrap: wrap; justify-content: space-between;margin-bottom: 10px !important;">
							<div style="width: 100%; max-width: 285px">
								<label for="languages">Languages</label>
								<textarea maxlength="50" style="min-height: 5em;" rows="3" name="languages" id="languages" placeholder="Languages (separated by commas)"><?=get_user_meta($_POST['user_id'],'languages', true)?></textarea>
							</div>
							<div style="width: 100%; max-width: 285px">
								<label for="fetishes">Fetishes</label>
								<textarea maxlength="264" style="min-height: 5em;" rows="3" name="fetishes" id="fetishes" placeholder="Fetishes (separated by commas)"><?=get_user_meta($_POST['user_id'],'fetishes', true)?></textarea>
							</div>
						</div>

                        <label for="show_email2"  style="margin-top: 10px !important;">Email</label>
                        <a href="#" id="show_email2" data-user-id="<?=$_POST['user_id']?>" data-action="email" >Hide email from public profile</a>

						<label for="phone"  style="margin-top: 10px !important;">Phone number</label>
						<a href="#" data-user-id="<?=$_POST['user_id']?>" data-action="phone" id="remove_phone_number">Remove phone number</a>
						<label for="url" style="margin-top: 10px !important;">Website</label>
						<a href="#" id="remove_website" data-user-id="<?=$_POST['user_id']?>" data-action="site">Remove website</a>

						<label for="description"  style="margin-top: 10px !important;">About me</label>
						<textarea name="description" placeholder="Say something about yourself" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $_POST['user_id'] ); ?></textarea>
					</fieldset>

					<legend><?php echo esc_html__( 'Appearance', 'arc' ); ?></legend>
					<fieldset class="fieldset">
						<div id="div_eth_eye" style="display: flex; flex-wrap: wrap; justify-content: space-between;margin-bottom: 20px;">
							<div style="width: 100%; max-width: 285px">
								<label for="ethnicity"><?php echo esc_html__('Ethnicity', 'arc'); ?> </label>
								<select name="ethnicity" id="account_ethnicity"><br/>
									<option disabled value="0"><?php echo __('Choose ethnicity', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'ethnicity', true), __('Asian', 'arc')); ?>><?php echo __('Asian', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'ethnicity', true), __('Ebony', 'arc')); ?>><?php echo __('Ebony', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'ethnicity', true), __('Indian', 'arc')); ?>><?php echo __('Indian', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'ethnicity', true), __('Latino', 'arc')); ?>><?php echo __('Latino', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'ethnicity', true), __('Middle Eastern', 'arc')); ?>><?php echo __('Middle Eastern', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'ethnicity', true), __('Mixed', 'arc')); ?>><?php echo __('Mixed', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'ethnicity', true), __('Caucasian', 'arc')); ?>><?php echo __('Caucasian', 'arc'); ?></option>
								</select>
							</div>

							<div style="width: 100%; max-width: 285px">
								<label for="eye_color"><?php echo esc_html__('Eye color', 'arc'); ?> </label>
								<select name="eye_color" id="eye_color">
									<option disabled selected value="0"><?php echo __('Choose eye color', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'eye_color', true), __('Black', 'arc')); ?>><?php echo __('Black', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'eye_color', true), __('Blue', 'arc')); ?>><?php echo __('Blue', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'eye_color', true), __('Brown', 'arc')); ?>><?php echo __('Brown', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'eye_color', true), __('Green', 'arc')); ?>><?php echo __('Green', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'eye_color', true), __('Gray', 'arc')); ?>><?php echo __('Gray', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'eye_color', true), __('Hazel', 'arc')); ?>><?php echo __('Hazel', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'eye_color', true), __('Multicolored', 'arc')); ?>><?php echo __('Multicolored', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'eye_color', true), __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
								</select>
							</div>
						</div>

						<div id="div_hair_style_color" style="display: flex; flex-wrap: wrap; justify-content: space-between;margin-bottom: 20px;">
							<div style="width: 100%; max-width: 285px">
								<label for="hair_style"><?php echo esc_html__('Hair style', 'arc'); ?></label>
								<select name="hair_style" id="account_hair_style">
									<option disabled selected value="0"><?php echo __('Choose a hair style', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_style', true), __('Bald', 'arc')); ?>><?php echo __('Bald', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_style', true), __('Receding', 'arc')); ?>><?php echo __('Receding', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_style', true), __('Very short', 'arc')); ?>><?php echo __('Very short', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_style', true), __('Short', 'arc')); ?>><?php echo __('Short', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_style', true), __('Medium', 'arc')); ?>><?php echo __('Medium', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_style', true), __('Long', 'arc')); ?>><?php echo __('Long', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_style', true), __('Very long', 'arc')); ?>><?php echo __('Very long', 'arc'); ?></option>
								</select>
							</div>
							<div style="width: 100%; max-width: 285px">
								<label for="hair_color"><?php echo esc_html__('Hair color', 'arc'); ?> </label>
								<select name="hair_color" id="account_hair_color">
									<option disabled selected value="0"><?php echo __('Choose hair color', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_color', true), __('Blonde', 'arc')); ?>><?php echo __('Blonde', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_color', true), __('Brown', 'arc')); ?>><?php echo __('Brown', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_color', true), __('Red', 'arc')); ?>><?php echo __('Red', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_color', true), __('Black', 'arc')); ?>><?php echo __('Black', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'hair_color', true), __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
								</select>
							</div>
						</div>

						<div id="div_weight_height" style="display: flex; flex-wrap: wrap;justify-content: space-between">
							<div style="width: 100%; max-width: 285px">
								<label for="height">Height</label>
								<input maxlength="3" class="text-input" placeholder="Height in cm" name="height" type="text" id="height" value="<?php the_author_meta( 'height', $_POST['user_id'] ); ?>" />
							</div>
							<div style="width: 100%; max-width: 285px">
								<label for="weight">Weight</label>
								<input maxlength="3" class="text-input" name="weight" placeholder="Weight in kg" type="text" id="weight" value="<?php the_author_meta( 'weight', $_POST['user_id'] ); ?>" />
							</div>
						</div>

						<div id="div_tattoo_piersing" style="display: flex; flex-wrap: wrap; justify-content: space-between;margin-bottom: 20px;">
							<div style="width: 100%; max-width: 285px">
								<label for="tattoo"><?php echo esc_html__('Tattoos', 'arc'); ?></label>
								<select name="tattoo" id="account_tattoo">
									<option disabled value="0"><?php echo __('Do you have tattoos?', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'tattoo', true), __('Yes', 'arc')); ?>><?php echo __('Yes', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'tattoo', true), __('No', 'arc')); ?>><?php echo __('No', 'arc'); ?></option>
								</select><br/>
							</div>
							<div style="width: 100%; max-width: 285px">
								<label for="piercing"><?php echo esc_html__('Piercings', 'arc'); ?> </label>
								<select name="piercing" id="account_piercing"><br/>
									<option disabled value="0"><?php echo __('Do you have piercings?', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'piercing', true), __('Yes', 'arc')); ?>><?php echo __('Yes', 'arc'); ?></option>
									<option <?php selected(get_user_meta($_POST['user_id'],'piercing', true), __('No', 'arc')); ?>><?php echo __('No', 'arc'); ?></option>
								</select>
							</div>
						</div>
					</fieldset>

					<legend><?php echo esc_html__( 'Social profiles', 'arc' ); ?></legend>
					<fieldset class="fieldset">
						<label for="facebook" style="margin-top: 10px !important;">Facebook</label>
						<a href="#" id="remove_facebook" data-user-id="<?=$_POST['user_id']?>" data-action="facebook">Remove Facebook</a>
						<label for="instagram"  style="margin-top: 10px !important;">Instagram</label>
						<a href="#" id="remove_instagram" data-user-id="<?=$_POST['user_id']?>" data-action="instagram">Remove Instagram</a>
						<label for="twitter"  style="margin-top: 10px !important;">Twitter</label>
						<a href="#" id="remove_twitter" data-user-id="<?=$_POST['user_id']?>" data-action="twitter">Remove Twitter</a>
						<label for="snapchat"  style="margin-top: 10px !important;">Snapchat</label>
						<a href="#" id="remove_snapchat" data-user-id="<?=$_POST['user_id']?>" data-action="snapchat">Remove Snapchat</a>
						<label for="reddit"  style="margin-top: 10px !important;">Reddit</label>
						<a href="#" id="remove_reddit" data-user-id="<?=$_POST['user_id']?>" data-action="reddit">Remove Reddit</a>
						<label for="manyvids"  style="margin-top: 10px !important;">ManyVids</label>
						<a href="#" id="remove_manyvids" data-user-id="<?=$_POST['user_id']?>" data-action="manyvids">Remove ManyVids</a>
						<label for="onlyfans" style="margin-top: 10px !important;">OnlyFans</label>
						<a href="#" id="remove_onlyfans" data-user-id="<?=$_POST['user_id']?>" data-action="onlyfans">Remove OnlyFans</a>
					</fieldset>
                    <input name="update_profile" type="hidden" id="update_profile" value="ok" />
                    <input name="user_id" type="hidden" id="user_id" value="<?=$_POST['user_id']?>" />
					<?php
					//action hook for plugin and extra fields
					do_action('edit_user_profile', $_POST['user_id']);
					?>
					<div class="form-submit" style="display: flex;justify-content: space-between;">
						<?php echo apply_filters('update_button', '<input name="updateuser" type="submit" id="updateuser" class="margin-top-1 margin-bottom-1 submit button" value="' . __('Update profile', 'arc') . '" />', 'profile' ); ?>
						<?php wp_nonce_field( 'update-user_'. $_POST['user_id'] ) ?>
						<input name="action" type="hidden" id="action" value="update-user" />
					</div>
				</form>
			</section>
				</div>
			</div>
		</div>
		<script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
		</script>
	</main>
</div>
<?php
get_footer();