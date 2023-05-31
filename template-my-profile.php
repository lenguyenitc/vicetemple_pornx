<?php
/**
Template Name: Profile
**/
/* Get user info. */
global $current_user, $wp_roles;
wp_get_current_user();
$error = array();
$referer = '';
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {



	/* Update user password. */
	if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
		if ( $_POST['pass1'] == $_POST['pass2'] )
			wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
		else
			$error[] = esc_html__('The passwords you entered do not match. Your password was not updated.', 'arc');
	}
	if ( !empty( $_POST['country'] ) )
		update_user_meta( $current_user->ID, 'country', esc_attr( $_POST['country'] ) );
	if ( !empty( $_POST['city'] ) )
		update_user_meta( $current_user->ID, 'city', esc_attr( $_POST['city'] ) );
	if ( !empty( $_POST['i_am'] ) )
		update_user_meta( $current_user->ID, 'i_am', esc_attr( $_POST['i_am'] ) );
	if ( !empty( $_POST['orientation'] ) )
		update_user_meta( $current_user->ID, 'orientation', esc_attr( $_POST['orientation'] ) );
	if ( !empty( $_POST['birthday'] ) )
		update_user_meta( $current_user->ID, 'birthday', esc_attr( $_POST['birthday'] ) );

	if ( !empty( $_POST['phone'] ) )
		update_user_meta( $current_user->ID, 'phone', esc_attr( $_POST['phone'] ) );
	if ( !empty( $_POST['ethnicity'] ) )
		update_user_meta( $current_user->ID, 'ethnicity', esc_attr( $_POST['ethnicity'] ) );
	if ( !empty( $_POST['hair_style'] ) )
		update_user_meta( $current_user->ID, 'hair_style', esc_attr( $_POST['hair_style'] ) );
	if ( !empty( $_POST['hair_color'] ) )
		update_user_meta( $current_user->ID, 'hair_color', esc_attr( $_POST['hair_color'] ) );
	if ( !empty( $_POST['height'] ) )
		update_user_meta( $current_user->ID, 'height', esc_attr( $_POST['height'] ) );
	if ( !empty( $_POST['weight'] ) )
		update_user_meta( $current_user->ID, 'weight', esc_attr( $_POST['weight'] ) );
	if ( !empty( $_POST['tattoo'] ) )
		update_user_meta( $current_user->ID, 'tattoo', esc_attr( $_POST['tattoo'] ) );
	if ( !empty( $_POST['piercing'] ) )
		update_user_meta( $current_user->ID, 'piercing', esc_attr( $_POST['piercing'] ) );

	if ( !empty( $_POST['facebook'] ) )
		update_user_meta( $current_user->ID, 'facebook', esc_attr( $_POST['facebook'] ) );
	if ( !empty( $_POST['instagram'] ) )
		update_user_meta( $current_user->ID, 'instagram', esc_attr( $_POST['instagram'] ) );
	if ( !empty( $_POST['twitter'] ) )
		update_user_meta( $current_user->ID, 'twitter', esc_attr( $_POST['twitter'] ) );
	if ( !empty( $_POST['reddit'] ) )
		update_user_meta( $current_user->ID, 'reddit', esc_attr( $_POST['reddit'] ) );
	if ( !empty( $_POST['snapchat'] ) )
		update_user_meta( $current_user->ID, 'snapchat', esc_attr( $_POST['snapchat'] ) );
	if ( !empty( $_POST['clips4sale'] ) )
		update_user_meta( $current_user->ID, 'clips4sale', esc_attr( $_POST['clips4sale'] ) );
	if ( !empty( $_POST['manyvids'] ) )
		update_user_meta( $current_user->ID, 'manyvids', esc_attr( $_POST['manyvids'] ) );

	if ( !empty( $_POST['url'] ) )
		wp_update_user( array ('ID' => $current_user->ID, 'user_url' => esc_attr( $_POST['url'] )));

	if (!empty( $_POST['email'] ) ){
		if (!is_email(esc_attr( $_POST['email'] )))
			$error[] = esc_html__('The Email you entered is not valid. Please try again.', 'arc');
		/*elseif(email_exists(esc_attr( $_POST['email'] )))
			$error[] = esc_html__('This email is already used by another user. Try a different one.', 'arc');*/
		else{
			wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
		}
	}
	if ( !empty( $_POST['nickname'] ) )
		update_user_meta( $current_user->ID, 'nickname', esc_attr( $_POST['nickname'] ) );
	if ( !empty( $_POST['first-name'] ) )
		update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
	if ( !empty( $_POST['last-name'] ) )
		update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
	if ( !empty( $_POST['display_name'] ) )
		wp_update_user(array('ID' => $current_user->ID, 'display_name' => esc_attr( $_POST['display_name'] )));
	update_user_meta($current_user->ID, 'display_name' , esc_attr( $_POST['display_name'] ));
	if ( !empty( $_POST['description'] ) )
		update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
	/* Redirect so the page will show updated info.*/
	/*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
	if ( count($error) == 0 ) {
		//action hook for plugins and extra fields saving
		do_action('edit_user_profile_update', $current_user->ID);
		wp_redirect( get_permalink().'?updated=true' ); exit;
	}

}
get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-profile-page' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
        <?php
        if(!is_user_logged_in()) :?>
            <p><?php echo 'You need to ';?>
                <a style="cursor: pointer" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');">Login </a>
		        <?php echo wp_register(" or ", "") . ' to see this page.'?>
            </p>
        <?php else :  ?>
            <?php $curr = wp_get_current_user();?>
            <div id="profile-tabs" class="tabs">
                <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/profile/'. $curr->user_login . '/'?>'"><i class="fa fa-upload"></i> <?php echo esc_html__('Uploaded videos', 'arc'); ?></a>
                <button class="tab-link active profile"><i class="fa fa-user"></i> <?php echo esc_html__('My profile', 'arc'); ?></button>
                <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/watched-videos/'?>'"><i class="fa fa-eye"></i> <?php echo esc_html__('Watched videos', 'arc'); ?></a>
                <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/playlists/'?>'"><i class="fa fa-play"></i> <?php echo esc_html__('My playlist', 'arc'); ?></a>
                <!--<a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php /*echo site_url().'/chat/?xxx='. $curr->ID;*/?>'"><i class="fa fa-comment"></i> <?php /*echo esc_html__('My chat', 'arc'); */?></a>-->
                <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/my-subscriptions/'?>'"><i class="fa fa-user-plus"></i> <?php echo esc_html__('My subscriptions', 'arc'); ?></a>
                <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/my-payments/'?>'"><i class="fa fa-paypal"></i> <?php echo esc_html__('My payments', 'arc'); ?></a>
            </div>
            <div class="tab-content" style="margin-top: 20px">
                <div id="profile" style="display: block">
                    <h2 class="widget-title"><i class="fa fa-user"></i><?php echo esc_html__('My profile', 'arc'); ?>
                    <a id="public_link" style="float:right" href="/public-profile/?xxx=<?php echo $curr->ID;?>"><i class="fa fa-arrow-circle-o-right"></i> <?php echo __('Go to Public Profile', 'arc');?></a>
                    </h2>
			<?php if (is_user_logged_in()) : ?>
				<?php if ( isset($_GET['updated']) && $_GET['updated'] == true ) : ?> <div id="message" class="alert alert-success">
					<i class="fa fa-check"></i> <?php echo esc_html__('Your profile has been updated.', 'arc'); ?></div>
				<?php endif; ?>
				<?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
				<form method="post" id="edit-user" action="<?php the_permalink(); ?>" enctype="multipart/form-data" name="front_end_upload">
                    <fieldset class="fieldset">
                        <legend><strong><?php echo esc_html__( 'Main photo', 'arc' ); ?></strong></legend>
                        <p>
                            <style>
                                html,
                                input {
                                    box-sizing: border-box;
                                    font-family: Helvetica, sans-serif;
                                }

                                * {
                                    box-sizing: inherit;
                                }

                                .hidden {
                                    display: none;
                                }

                                .img-export {
                                    display: block;
                                }
                            </style>
                            <label class="img-upload-label">
                                <?php echo __('Upload avatar:', 'arc');?>
                                <input type="file" class="js-fileinput img-upload" accept="image/jpeg,image/png,image/jpg,image/gif">
                                <button class="js-export img-export" style="display: none;"><?php echo __('Crop and save avatar', 'arc');?></button>
                            </label>
                            <canvas class="js-editorcanvas" style="display: none;"></canvas>
                            <canvas class="js-previewcanvas" style="display: none;"></canvas>
                            <?php if(get_user_meta($current_user->ID, 'personal_foto', true) !== false) :?>
                            <div id="image" style="display: block;">
                                <img alt="" src="<?php echo get_user_meta($current_user->ID, 'personal_foto', true);?>" />
                            </div>
                            <?php else:?>
                            <div id="image" style="display: none;">
                                <img alt="" src="" />
                            </div>
                            <?php endif;?>
                        </p>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend><strong><?php echo esc_html__( 'Profile background', 'arc' ); ?></strong></legend>
                        <p>
                            <label class="img-upload-label">
								<?php echo __('Upload background:', 'arc');?>
                                <input type="file" class="js-fileinput2 img-upload2" accept="image/jpeg,image/png,image/gif">
                                <button class="js-export img-export2" style="display: none;"><?php echo __('Crop and save background', 'arc');?></button>
                            </label>
                            <canvas class="js-editorcanvas2" style="display: none;width: 100%"></canvas>
                            <canvas class="js-previewcanvas2" style="display: none; width: 100%"></canvas>
							<?php if(get_user_meta($current_user->ID, 'personal_back', true) !== false) :?>
                        <div id="image2" style="display: block;  width: 100%">
                            <img alt="" src="<?php echo get_user_meta($current_user->ID, 'personal_back', true);?>" />
                        </div>
						<?php else:?>
                            <div id="image2" style="display: none; width: 100%">
                                <img alt="" src="" />
                            </div>
						<?php endif;?>
                        </p>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend><strong><?php echo esc_html__( 'Location', 'arc' ); ?></strong></legend>
                        <div class="form-username col-2-form">
                            <label for="country"><?php echo esc_html__('Country', 'arc'); ?></label>
                            <input class="text-input" name="country" type="text" id="country" value="<?php the_author_meta( 'country', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-username col-2-form">
                            <label for="city"><?php echo esc_html__('City', 'arc'); ?></label>
                            <input class="text-input" name="city" type="text" id="city" value="<?php the_author_meta( 'city', $current_user->ID ); ?>" />
                        </div>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend><strong><?php echo esc_html__( 'Personal information', 'arc' ); ?></strong></legend>
                        <div class="form-display_name col-2-form">
                            <label for="i_am"><?php echo esc_html__('I am: ', 'arc') ?></label>
                            <select name="i_am" id="i_am"><br/>
                                <option value="0"><?php echo __('Who you are', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Male', 'arc')); ?>><?php echo __('Male', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Female', 'arc')); ?>><?php echo __('Female', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Transgender MtF', 'arc')); ?>><?php echo __('Transgender MtF', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Transgender FtM', 'arc')); ?>><?php echo __('Transgender FtM', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Genderqueer', 'arc')); ?>><?php echo __('Genderqueer', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Male and female couple', 'arc')); ?>><?php echo __('Male and female couple', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Male couple', 'arc')); ?>><?php echo __('Male couple', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Female couple', 'arc')); ?>><?php echo __('Female couple', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Transgender couple', 'arc')); ?>><?php echo __('Transgender couple', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Transgender and male couple', 'arc')); ?>><?php echo __('Transgender and male couple', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Transgender and female couple', 'arc')); ?>><?php echo __('Transgender and female couple', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'i_am', true), __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
                            </select>
                        </div>
                        <div class="form-display_name col-2-form">
                            <label for="orientation"><?php echo esc_html__('Orientation: ', 'arc') ?></label>
                            <select name="orientation" id="orientation"><br/>
                                <option value="0"><?php echo __('Choose orientation', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'orientation', true), __('Heterosexual', 'arc')); ?>><?php echo __('Heterosexual', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'orientation', true), __('Homosexual', 'arc')); ?>><?php echo __('Homosexual', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'orientation', true), __('Bisexual', 'arc')); ?>><?php echo __('Bisexual', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'orientation', true), __('Heteroflexible', 'arc')); ?>><?php echo __('Heteroflexible', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'orientation', true), __('Homoflexible', 'arc')); ?>><?php echo __('Homoflexible', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'orientation', true), __('Pansexual', 'arc')); ?>><?php echo __('Pansexual', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'orientation', true), __('Asexual', 'arc')); ?>><?php echo __('Asexual', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'orientation', true), __('Not sure', 'arc')); ?>><?php echo __('Not sure', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'orientation', true), __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
                            </select>
                        </div>

                    <div class="form-username col-3-form">
                        <label for="first-name"><?php echo esc_html__('Nickname', 'arc'); ?></label>
                        <input class="text-input" name="nickname" type="text" id="nickname" value="<?php the_author_meta( 'nickname', $current_user->ID ); ?>" />
                    </div>
					<div class="form-username col-3-form">
						<label for="first-name"><?php echo esc_html__('First Name', 'arc'); ?></label>
						<input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
					</div>
					<div class="form-username col-3-form">
						<label for="last-name"><?php echo esc_html__('Last Name', 'arc'); ?></label>
						<input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
					</div>

					<div class="form-display_name col-2-form">
                        <label for="display_name"><?php echo esc_html__('Display Name as', 'arc') ?></label>
						<select name="display_name" id="display_name"><br/>
							<?php
							$public_display = array();
							$public_display['display_nickname']  = $current_user->nickname;
							$public_display['display_username']  = $current_user->user_login;
							if ( !empty($current_user->first_name) )
								$public_display['display_firstname'] = $current_user->first_name;
							if ( !empty($current_user->last_name) )
								$public_display['display_lastname'] = $current_user->last_name;
							if ( !empty($current_user->first_name) && !empty($current_user->last_name) ) {
								$public_display['display_firstlast'] = $current_user->first_name . ' ' . $current_user->last_name;
								$public_display['display_lastfirst'] = $current_user->last_name . ' ' . $current_user->first_name;
							}
							if ( ! in_array( $current_user->display_name, $public_display ) ) // Only add this if it isn't duplicated elsewhere
								$public_display = array( 'display_displayname' => $current_user->display_name ) + $public_display;
							$public_display = array_map( 'trim', $public_display );
							$public_display = array_unique( $public_display );
							foreach ( $public_display as $id => $item ) {
								?>
								<option <?php selected( $current_user->display_name, $item ); ?>><?php echo $item; ?></option>
								<?php
							}
							?>
						</select>
					</div>
					<!--<div class="clear"></div>-->
                        <div class="form-email col-2-form" >
                            <label for="birthday"><?php echo esc_html__('Birthday', 'arc'); ?> </label>
                            <input class="text-input" name="birthday" type="date" id="birthday" value="<?php the_author_meta( 'birthday', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-email col-1-form">
                            <label for="languages"><?php echo esc_html__('Languages', 'arc'); ?> </label>
                            <select name="languages" id="languages" data-choice multiple="multiple"><br/>
                                <?php
                                if(!empty(get_user_meta($current_user->ID,'languages', true))):
                                    foreach(get_user_meta($current_user->ID,'languages', true) as $lang):?>
                                        <option selected="selected"><?php echo $lang; ?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                                <option><?php echo __('English', 'arc'); ?></option>
                                <option><?php echo __('Albanian', 'arc'); ?></option>
                                <option><?php echo __('Arabic', 'arc'); ?></option>
                                <option><?php echo __('Chinese', 'arc'); ?></option>
                                <option><?php echo __('Croatian', 'arc'); ?></option>
                                <option><?php echo __('Czech', 'arc'); ?></option>
                                <option><?php echo __('Farsi', 'arc'); ?></option>
                                <option><?php echo __('Finnish', 'arc'); ?></option>
                                <option><?php echo __('French', 'arc'); ?></option>
                                <option><?php echo __('German', 'arc'); ?></option>
                                <option><?php echo __('Greek', 'arc'); ?></option>
                                <option><?php echo __('Hungarian', 'arc'); ?></option>
                                <option><?php echo __('Indonesian', 'arc'); ?></option>
                                <option><?php echo __('Italian', 'arc'); ?></option>
                                <option><?php echo __('Japanese', 'arc'); ?></option>
                                <option><?php echo __('Korean', 'arc'); ?></option>
                                <option><?php echo __('Malay', 'arc'); ?></option>
                                <option><?php echo __('Nederlands', 'arc'); ?></option>
                                <option><?php echo __('Norwegian', 'arc'); ?></option>
                                <option><?php echo __('Polish', 'arc'); ?></option>
                                <option><?php echo __('Portuguese', 'arc'); ?></option>
                                <option><?php echo __('Romanian', 'arc'); ?></option>
                                <option><?php echo __('Russian', 'arc'); ?></option>
                                <option><?php echo __('Serbian', 'arc'); ?></option>
                                <option><?php echo __('Sign language', 'arc'); ?></option>
                                <option><?php echo __('Spanish', 'arc'); ?></option>
                                <option><?php echo __('Swedish', 'arc'); ?></option>
                                <option><?php echo __('Thai', 'arc'); ?></option>
                                <option><?php echo __('Turkish', 'arc'); ?></option>
                                <option><?php echo __('Ukrainian', 'arc'); ?></option>
                                <option><?php echo __('Vietnamese', 'arc'); ?></option>
                                <option><?php echo __('Other', 'arc'); ?></option>
                            </select>
                        </div>
                        <div class="form-display_name col-1-form">
                           <!-- <p id="popular">Anal Sex</p>-->
                            <label for="fetishes"><?php echo esc_html__('Fetishes:', 'arc') ?></label>
                            <select name="fetishes" id="fetishes" data-choice multiple="multiple"><br/>
                                <?php if(!empty(get_user_meta($current_user->ID,'fetishes', true))):?>
	                            <?php foreach(get_user_meta($current_user->ID,'fetishes', true) as $fetish):?>
                                    <option selected="selected"><?php echo $fetish; ?></option>
                                <?php endforeach;
                                endif;?>
                                <option><?php echo __('Masturbation', 'arc'); ?></option>
                                <option><?php echo __('Milf', 'arc'); ?></option>
                                <option><?php echo __('Anal Sex', 'arc'); ?></option>
                                <option><?php echo __('Blonde', 'arc'); ?></option>
                                <option><?php echo __('Webcam', 'arc'); ?></option>
                                <option><?php echo __('BBW', 'arc'); ?></option>
                                <option><?php echo __('Pussy', 'arc'); ?></option>
                                <option><?php echo __('Wife', 'arc'); ?></option>
                                <option><?php echo __('BDSM', 'arc'); ?></option>
                                <option><?php echo __('Threesome', 'arc'); ?></option>
                                <option><?php echo __('Fingering', 'arc'); ?></option>
                                <option><?php echo __('Dildo', 'arc'); ?></option>
                                <option><?php echo __('Stockings', 'arc'); ?></option>
                                <option><?php echo __('Group Sex', 'arc'); ?></option>
                                <option><?php echo __('Handjob', 'arc'); ?></option>
                                <option><?php echo __('Creampie', 'arc'); ?></option>
                                <option><?php echo __('Slut', 'arc'); ?></option>
                                <option><?php echo __('Flashing', 'arc'); ?></option>
                                <option><?php echo __('Cuckold', 'arc'); ?></option>
                                <option><?php echo __('Lingerie', 'arc'); ?></option>
                                <option><?php echo __('Girlfriend', 'arc'); ?></option>
                                <option><?php echo __('Bareback', 'arc'); ?></option>
                                <option><?php echo __('Doggy Style', 'arc'); ?></option>
                                <option><?php echo __('BBC', 'arc'); ?></option>
                                <option><?php echo __('Crossdresser', 'arc'); ?></option>
                                <option><?php echo __('Orgasm', 'arc'); ?></option>
                                <option><?php echo __('Redhead', 'arc'); ?></option>
                                <option><?php echo __('Squirting', 'arc'); ?></option>
                                <option><?php echo __('Double Penetration', 'arc'); ?></option>
                                <option><?php echo __('Small Tits', 'arc'); ?></option>
                                <option><?php echo __('Gangbang', 'arc'); ?></option>
                                <option><?php echo __('Riding', 'arc'); ?></option>
                                <option><?php echo __('Swingers', 'arc'); ?></option>
                                <option><?php echo __('Wet', 'arc'); ?></option>
                                <option><?php echo __('Nipples', 'arc'); ?></option>
                                <option><?php echo __('Pussy Licking', 'arc'); ?></option>
                                <option><?php echo __('Slave', 'arc'); ?></option>
                                <option><?php echo __('Orgy', 'arc'); ?></option>
                                <option><?php echo __('Licking', 'arc'); ?></option>
                                <option><?php echo __('Panties', 'arc'); ?></option>
                                <option><?php echo __('Spanking', 'arc'); ?></option>
                                <option><?php echo __('Bondage', 'arc'); ?></option>
                                <option><?php echo __('Bitch', 'arc'); ?></option>
                                <option><?php echo __('Teasing', 'arc'); ?></option>
                                <option><?php echo __('Cunnilingus', 'arc'); ?></option>
                                <option><?php echo __('Kissing', 'arc'); ?></option>
                                <option><?php echo __('Vibrator', 'arc'); ?></option>
                                <option><?php echo __('High Heels', 'arc'); ?></option>
                                <option><?php echo __('Latex', 'arc'); ?></option>
                                <option><?php echo __('Big Tits', 'arc'); ?></option>
                                <option><?php echo __('Bukkake', 'arc'); ?></option>
                                <option><?php echo __('Tattoo', 'arc'); ?></option>
                                <option><?php echo __('Asshole', 'arc'); ?></option>
                                <option><?php echo __('Domination', 'arc'); ?></option>
                                <option><?php echo __('Cowgirl', 'arc'); ?></option>
                                <option><?php echo __('Kinky', 'arc'); ?></option>
                                <option><?php echo __('Dick Sucking', 'arc'); ?></option>
                                <option><?php echo __('Spandex', 'arc'); ?></option>
                                <option><?php echo __('Bikini', 'arc'); ?></option>
                                <option><?php echo __('Husband', 'arc'); ?></option>
                                <option><?php echo __('Teacher', 'arc'); ?></option>
                                <option><?php echo __('Ass To Mouth', 'arc'); ?></option>
                                <option><?php echo __('Pawg', 'arc'); ?></option>
                                <option><?php echo __('Big Clit', 'arc'); ?></option>
                                <option><?php echo __('Glasses', 'arc'); ?></option>
                                <option><?php echo __('Hentai', 'arc'); ?></option>
                                <option><?php echo __('Smoking', 'arc'); ?></option>
                                <option><?php echo __('Fisting', 'arc'); ?></option>
                                <option><?php echo __('Rough Sex', 'arc'); ?></option>
                                <option><?php echo __('Dirty Talk', 'arc'); ?></option>
                                <option><?php echo __('Breasts', 'arc'); ?></option>
                                <option><?php echo __('Jeans', 'arc'); ?></option>
                                <option><?php echo __('Oral Sex', 'arc'); ?></option>
                                <option><?php echo __('Gagging', 'arc'); ?></option>
                                <option><?php echo __('Hooker', 'arc'); ?></option>
                                <option><?php echo __('Maid', 'arc'); ?></option>
                                <option><?php echo __('Eating', 'arc'); ?></option>
                                <option><?php echo __('Reverse Cowgirl', 'arc'); ?></option>
                                <option><?php echo __('Shaving', 'arc'); ?></option>
                                <option><?php echo __('Gilf', 'arc'); ?></option>
                                <option><?php echo __('Music', 'arc'); ?></option>
                                <option><?php echo __('Cosplay', 'arc'); ?></option>
                                <option><?php echo __('Swallowing', 'arc'); ?></option>
                                <option><?php echo __('Moaning', 'arc'); ?></option>
                                <option><?php echo __('Socks', 'arc'); ?></option>
                                <option><?php echo __('Stranger', 'arc'); ?></option>
                                <option><?php echo __('Leather', 'arc'); ?></option>
                                <option><?php echo __('Foot Worship', 'arc'); ?></option>
                                <option><?php echo __('Fellatio', 'arc'); ?></option>
                                <option><?php echo __('Submission', 'arc'); ?></option>
                                <option><?php echo __('Toilet', 'arc'); ?></option>
                                <option><?php echo __('Medical', 'arc'); ?></option>
                                <option><?php echo __('Pigtail', 'arc'); ?></option>
                                <option><?php echo __('Military', 'arc'); ?></option>
                                <option><?php echo __('Nudity', 'arc'); ?></option>
                                <option><?php echo __('Gothic', 'arc'); ?></option>
                                <option><?php echo __('Rimming', 'arc'); ?></option>
                                <option><?php echo __('Queen', 'arc'); ?></option>
                                <option><?php echo __('Dominatrix', 'arc'); ?></option>
                                <option><?php echo __('Fishnet', 'arc'); ?></option>
                                <option><?php echo __('Ballbusting', 'arc'); ?></option>
                                <option><?php echo __('Upskirt', 'arc'); ?></option>
                                <option><?php echo __('Fucking Machine', 'arc'); ?></option>
                                <option><?php echo __('Ass Shaking', 'arc'); ?></option>
                                <option><?php echo __('Whipping', 'arc'); ?></option>
                                <option><?php echo __('Fitness', 'arc'); ?></option>
                                <option><?php echo __('Exhibitionism', 'arc'); ?></option>
                                <option><?php echo __('Cheerleader', 'arc'); ?></option>
                                <option><?php echo __('Piss', 'arc'); ?></option>
                                <option><?php echo __('Master', 'arc'); ?></option>
                                <option><?php echo __('Pegging', 'arc'); ?></option>
                                <option><?php echo __('Pussy Shaving', 'arc'); ?></option>
                                <option><?php echo __('Queening', 'arc'); ?></option>
                                <option><?php echo __('Short Hair', 'arc'); ?></option>
                                <option><?php echo __('Art', 'arc'); ?></option>
                                <option><?php echo __('Doll', 'arc'); ?></option>
                                <option><?php echo __('Tights', 'arc'); ?></option>
                                <option><?php echo __('Double Blowjob', 'arc'); ?></option>
                                <option><?php echo __('Seduction', 'arc'); ?></option>
                                <option><?php echo __('Satin', 'arc'); ?></option>
                                <option><?php echo __('Snatch', 'arc'); ?></option>
                                <option><?php echo __('Puffy Nipples', 'arc'); ?></option>
                                <option><?php echo __('Milking', 'arc'); ?></option>
                                <option><?php echo __('Model', 'arc'); ?></option>
                                <option><?php echo __('Bathtub', 'arc'); ?></option>
                                <option><?php echo __('Gonzo', 'arc'); ?></option>
                                <option><?php echo __('Sister', 'arc'); ?></option>
                                <option><?php echo __('Face Fucking', 'arc'); ?></option>
                                <option><?php echo __('Shopping', 'arc'); ?></option>
                                <option><?php echo __('Stretching', 'arc'); ?></option>
                                <option><?php echo __('Midget', 'arc'); ?></option>
                                <option><?php echo __('Dominant', 'arc'); ?></option>
                                <option><?php echo __('Touching', 'arc'); ?></option>
                                <option><?php echo __('Outdoor Sex', 'arc'); ?></option>
                                <option><?php echo __('Housewife', 'arc'); ?></option>
                                <option><?php echo __('Ebony Ass', 'arc'); ?></option>
                                <option><?php echo __('Barefoot', 'arc'); ?></option>
                                <option><?php echo __('Interracial Sex', 'arc'); ?></option>
                                <option><?php echo __('Toe Sucking', 'arc'); ?></option>
                                <option><?php echo __('Corset', 'arc'); ?></option>
                                <option><?php echo __('Long Hair', 'arc'); ?></option>
                                <option><?php echo __('Spitting', 'arc'); ?></option>
                                <option><?php echo __('Butt Plug', 'arc'); ?></option>
                                <option><?php echo __('Foreplay', 'arc'); ?></option>
                                <option><?php echo __('Sybian', 'arc'); ?></option>
                                <option><?php echo __('Anal Beads', 'arc'); ?></option>
                                <option><?php echo __('Tug Job', 'arc'); ?></option>
                                <option><?php echo __('White Booty', 'arc'); ?></option>
                                <option><?php echo __('Ass Play', 'arc'); ?></option>
                                <option><?php echo __('Sandwich', 'arc'); ?></option>
                                <option><?php echo __('Tickling', 'arc'); ?></option>
                                <option><?php echo __('Enema', 'arc'); ?></option>
                                <option><?php echo __('Gloves', 'arc'); ?></option>
                                <option><?php echo __('Control', 'arc'); ?></option>
                                <option><?php echo __('Drinking', 'arc'); ?></option>
                                <option><?php echo __('Ass Worship', 'arc'); ?></option>
                                <option><?php echo __('Slapping', 'arc'); ?></option>
                                <option><?php echo __('Farting', 'arc'); ?></option>
                                <option><?php echo __('Yoga Pants', 'arc'); ?></option>
                                <option><?php echo __('Flogging', 'arc'); ?></option>
                                <option><?php echo __('Wet And Messy', 'arc'); ?></option>
                                <option><?php echo __('Swimsuit', 'arc'); ?></option>
                                <option><?php echo __('Biting', 'arc'); ?></option>
                                <option><?php echo __('Massage', 'arc'); ?></option>
                                <option><?php echo __('Groping', 'arc'); ?></option>
                                <option><?php echo __('Smothering', 'arc'); ?></option>
                                <option><?php echo __('Wrestling', 'arc'); ?></option>
                                <option><?php echo __('Wedding', 'arc'); ?></option>
                                <option><?php echo __('Shoeplay', 'arc'); ?></option>
                                <option><?php echo __('Braces', 'arc'); ?></option>
                                <option><?php echo __('Deep Throating', 'arc'); ?></option>
                                <option><?php echo __('Masochism', 'arc'); ?></option>
                                <option><?php echo __('Denial', 'arc'); ?></option>
                                <option><?php echo __('Sadism', 'arc'); ?></option>
                                <option><?php echo __('Muff Diving', 'arc'); ?></option>
                                <option><?php echo __('Libertine', 'arc'); ?></option>
                                <option><?php echo __('Ass Eating', 'arc'); ?></option>
                                <option><?php echo __('Douche', 'arc'); ?></option>
                                <option><?php echo __('Casting Couch', 'arc'); ?></option>
                                <option><?php echo __('Non Nude', 'arc'); ?></option>
                                <option><?php echo __('Dangling', 'arc'); ?></option>
                                <option><?php echo __('Landing Strip', 'arc'); ?></option>
                                <option><?php echo __('Sandals', 'arc'); ?></option>
                                <option><?php echo __('Stuffing', 'arc'); ?></option>
                                <option><?php echo __('Sex In Public', 'arc'); ?></option>
                                <option><?php echo __('Booty Shaking', 'arc'); ?></option>
                                <option><?php echo __('Paddling', 'arc'); ?></option>
                                <option><?php echo __('Armpits', 'arc'); ?></option>
                                <option><?php echo __('Hairy Pussy', 'arc'); ?></option>
                                <option><?php echo __('Swimming', 'arc'); ?></option>
                                <option><?php echo __('Fuck Buddy', 'arc'); ?></option>
                                <option><?php echo __('Handcuffs', 'arc'); ?></option>
                                <option><?php echo __('Blouse', 'arc'); ?></option>
                                <option><?php echo __('Hairy Bush', 'arc'); ?></option>
                                <option><?php echo __('Big Toy', 'arc'); ?></option>
                                <option><?php echo __('Ass Spreading', 'arc'); ?></option>
                                <option><?php echo __('Underwater', 'arc'); ?></option>
                                <option><?php echo __('Female Ejaculation', 'arc'); ?></option>
                                <option><?php echo __('Happy Ending', 'arc'); ?></option>
                                <option><?php echo __('Hairy Armpits', 'arc'); ?></option>
                                <option><?php echo __('Sex Machine', 'arc'); ?></option>
                                <option><?php echo __('Flip Flops', 'arc'); ?></option>
                                <option><?php echo __('Balls Deep', 'arc'); ?></option>
                                <option><?php echo __('Cock Tease', 'arc'); ?></option>
                                <option><?php echo __('Lipstick', 'arc'); ?></option>
                                <option><?php echo __('Phone Sex', 'arc'); ?></option>
                                <option><?php echo __('Cock Worship', 'arc'); ?></option>
                                <option><?php echo __('Hot Tub', 'arc'); ?></option>
                                <option><?php echo __('Gymnastics', 'arc'); ?></option>
                                <option><?php echo __('Begging', 'arc'); ?></option>
                                <option><?php echo __('Velvet', 'arc'); ?></option>
                                <option><?php echo __('Choking', 'arc'); ?></option>
                                <option><?php echo __('Spit Roast', 'arc'); ?></option>
                                <option><?php echo __('Prostate Massage', 'arc'); ?></option>
                                <option><?php echo __('Freckles', 'arc'); ?></option>
                                <option><?php echo __('Attention', 'arc'); ?></option>
                                <option><?php echo __('Trampling', 'arc'); ?></option>
                                <option><?php echo __('Multiple Orgasm', 'arc'); ?></option>
                                <option><?php echo __('Crying', 'arc'); ?></option>
                                <option><?php echo __('Spread Eagle', 'arc'); ?></option>
                                <option><?php echo __('Suck Off', 'arc'); ?></option>
                                <option><?php echo __('Feminization', 'arc'); ?></option>
                                <option><?php echo __('Futanari', 'arc'); ?></option>
                                <option><?php echo __('Plastic', 'arc'); ?></option>
                                <option><?php echo __('Role Play', 'arc'); ?></option>
                                <option><?php echo __('Older Woman', 'arc'); ?></option>
                                <option><?php echo __('Miniskirt', 'arc'); ?></option>
                                <option><?php echo __('Uniform', 'arc'); ?></option>
                                <option><?php echo __('Sounding', 'arc'); ?></option>
                                <option><?php echo __('Dirty Feet', 'arc'); ?></option>
                                <option><?php echo __('Mutual Masturbation', 'arc'); ?></option>
                                <option><?php echo __('Jumping', 'arc'); ?></option>
                                <option><?php echo __('Leotard', 'arc'); ?></option>
                                <option><?php echo __('Shaft', 'arc'); ?></option>
                                <option><?php echo __('Contortion', 'arc'); ?></option>
                                <option><?php echo __('Hair Pulling', 'arc'); ?></option>
                                <option><?php echo __('Anal Training', 'arc'); ?></option>
                                <option><?php echo __('Orgasm Denial', 'arc'); ?></option>
                                <option><?php echo __('Virginity', 'arc'); ?></option>
                                <option><?php echo __('Skirt', 'arc'); ?></option>
                                <option><?php echo __('Your Mom', 'arc'); ?></option>
                                <option><?php echo __('Chain', 'arc'); ?></option>
                                <option><?php echo __('Suspension', 'arc'); ?></option>
                                <option><?php echo __('Cock Milking', 'arc'); ?></option>
                                <option><?php echo __('Voyeurism', 'arc'); ?></option>
                                <option><?php echo __('School Uniform', 'arc'); ?></option>
                                <option><?php echo __('Spinner', 'arc'); ?></option>
                                <option><?php echo __('Ballerina', 'arc'); ?></option>
                                <option><?php echo __('Makeup', 'arc'); ?></option>
                                <option><?php echo __('Stilettos', 'arc'); ?></option>
                                <option><?php echo __('Vampire', 'arc'); ?></option>
                                <option><?php echo __('Pussy Pumping', 'arc'); ?></option>
                                <option><?php echo __('Giantess', 'arc'); ?></option>
                                <option><?php echo __('Big Legs', 'arc'); ?></option>
                                <option><?php echo __('Fuck Hole', 'arc'); ?></option>
                                <option><?php echo __('Wide Hips', 'arc'); ?></option>
                                <option><?php echo __('Downblouse', 'arc'); ?></option>
                                <option><?php echo __('Pillow Humping', 'arc'); ?></option>
                                <option><?php echo __('Geisha', 'arc'); ?></option>
                                <option><?php echo __('One Night Stand', 'arc'); ?></option>
                                <option><?php echo __('Tit Slapping', 'arc'); ?></option>
                                <option><?php echo __('Vacuuming', 'arc'); ?></option>
                                <option><?php echo __('Puffy Tits', 'arc'); ?></option>
                                <option><?php echo __('Money Shot', 'arc'); ?></option>
                                <option><?php echo __('Harem', 'arc'); ?></option>
                                <option><?php echo __('Real Doll', 'arc'); ?></option>
                                <option><?php echo __('Tongue', 'arc'); ?></option>
                                <option><?php echo __('Chastity Belt', 'arc'); ?></option>
                                <option><?php echo __('Triple Penetration', 'arc'); ?></option>
                                <option><?php echo __('Balloon', 'arc'); ?></option>
                                <option><?php echo __('Fitting Room', 'arc'); ?></option>
                                <option><?php echo __('Pecker', 'arc'); ?></option>
                                <option><?php echo __('Wrinkled Soles', 'arc'); ?></option>
                                <option><?php echo __('Suck Ass', 'arc'); ?></option>
                                <option><?php echo __('Pile Driver', 'arc'); ?></option>
                                <option><?php echo __('Crossed Legs', 'arc'); ?></option>
                                <option><?php echo __('Whipped Cream', 'arc'); ?></option>
                                <option><?php echo __('Golden Shower', 'arc'); ?></option>
                                <option><?php echo __('Shibari', 'arc'); ?></option>
                                <option><?php echo __('Hermaphrodite', 'arc'); ?></option>
                                <option><?php echo __('Leather Pants', 'arc'); ?></option>
                                <option><?php echo __('Kicking', 'arc'); ?></option>
                                <option><?php echo __('Ball Kicking', 'arc'); ?></option>
                                <option><?php echo __('Tantra', 'arc'); ?></option>
                                <option><?php echo __('Laughing', 'arc'); ?></option>
                                <option><?php echo __('Tramp Stamp', 'arc'); ?></option>
                                <option><?php echo __('Long Toes', 'arc'); ?></option>
                                <option><?php echo __('Ass Job', 'arc'); ?></option>
                                <option><?php echo __('Belly Dancing', 'arc'); ?></option>
                                <option><?php echo __('Flexing', 'arc'); ?></option>
                                <option><?php echo __('Caressing', 'arc'); ?></option>
                                <option><?php echo __('Encasement', 'arc'); ?></option>
                                <option><?php echo __('Fuck Off', 'arc'); ?></option>
                                <option><?php echo __('Mixed Wrestling', 'arc'); ?></option>
                                <option><?php echo __('Vintage Stockings', 'arc'); ?></option>
                                <option><?php echo __('Foot Massage', 'arc'); ?></option>
                                <option><?php echo __('Perversion', 'arc'); ?></option>
                                <option><?php echo __('Self Bondage', 'arc'); ?></option>
                                <option><?php echo __('Burlesque', 'arc'); ?></option>
                                <option><?php echo __('Punching', 'arc'); ?></option>
                                <option><?php echo __('Foot Smelling', 'arc'); ?></option>
                                <option><?php echo __('Adult Theater', 'arc'); ?></option>
                                <option><?php echo __('Japanese Bondage', 'arc'); ?></option>
                                <option><?php echo __('Sissy Training', 'arc'); ?></option>
                                <option><?php echo __('Hairy Legs', 'arc'); ?></option>
                                <option><?php echo __('Pussy Worship', 'arc'); ?></option>
                                <option><?php echo __('Face Slapping', 'arc'); ?></option>
                                <option><?php echo __('Pubic Hair', 'arc'); ?></option>
                                <option><?php echo __('Brothel', 'arc'); ?></option>
                                <option><?php echo __('Interrogation', 'arc'); ?></option>
                                <option><?php echo __('Sugar Daddy', 'arc'); ?></option>
                                <option><?php echo __('Foot Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Wig', 'arc'); ?></option>
                                <option><?php echo __('Breastfeeding', 'arc'); ?></option>
                                <option><?php echo __('Penis Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Tongue Sucking', 'arc'); ?></option>
                                <option><?php echo __('Road Head', 'arc'); ?></option>
                                <option><?php echo __('Cellulite', 'arc'); ?></option>
                                <option><?php echo __('Clothing', 'arc'); ?></option>
                                <option><?php echo __('Leather Gloves', 'arc'); ?></option>
                                <option><?php echo __('Dick Hole', 'arc'); ?></option>
                                <option><?php echo __('Struggling', 'arc'); ?></option>
                                <option><?php echo __('Pearl Necklace', 'arc'); ?></option>
                                <option><?php echo __('Missionary Position', 'arc'); ?></option>
                                <option><?php echo __('Panty Stuffing', 'arc'); ?></option>
                                <option><?php echo __('Ssbbw', 'arc'); ?></option>
                                <option><?php echo __('Around The World', 'arc'); ?></option>
                                <option><?php echo __('Cornuto', 'arc'); ?></option>
                                <option><?php echo __('Restraint', 'arc'); ?></option>
                                <option><?php echo __('Financial Domination', 'arc'); ?></option>
                                <option><?php echo __('Orgasm Control', 'arc'); ?></option>
                                <option><?php echo __('Tight Ass', 'arc'); ?></option>
                                <option><?php echo __('Janitor', 'arc'); ?></option>
                                <option><?php echo __('Slavery', 'arc'); ?></option>
                                <option><?php echo __('Creeping', 'arc'); ?></option>
                                <option><?php echo __('Dick Lips', 'arc'); ?></option>
                                <option><?php echo __('Airtight', 'arc'); ?></option>
                                <option><?php echo __('Scratching', 'arc'); ?></option>
                                <option><?php echo __('Vintage Lingerie', 'arc'); ?></option>
                                <option><?php echo __('Karate', 'arc'); ?></option>
                                <option><?php echo __('Gigolo', 'arc'); ?></option>
                                <option><?php echo __('Ironing', 'arc'); ?></option>
                                <option><?php echo __('Kneeling', 'arc'); ?></option>
                                <option><?php echo __('Premature Ejaculation', 'arc'); ?></option>
                                <option><?php echo __('Ballet Flats', 'arc'); ?></option>
                                <option><?php echo __('Glory Hole', 'arc'); ?></option>
                                <option><?php echo __('Hula Hoop', 'arc'); ?></option>
                                <option><?php echo __('Large Nipples', 'arc'); ?></option>
                                <option><?php echo __('Flirting', 'arc'); ?></option>
                                <option><?php echo __('Succubus', 'arc'); ?></option>
                                <option><?php echo __('Charity', 'arc'); ?></option>
                                <option><?php echo __('Castration', 'arc'); ?></option>
                                <option><?php echo __('Breast Bondage', 'arc'); ?></option>
                                <option><?php echo __('Cock Slapping', 'arc'); ?></option>
                                <option><?php echo __('Biceps', 'arc'); ?></option>
                                <option><?php echo __('Religious', 'arc'); ?></option>
                                <option><?php echo __('Ass Grinding', 'arc'); ?></option>
                                <option><?php echo __('Ass Kissing', 'arc'); ?></option>
                                <option><?php echo __('Calves', 'arc'); ?></option>
                                <option><?php echo __('Balls Out', 'arc'); ?></option>
                                <option><?php echo __('Duct Tape', 'arc'); ?></option>
                                <option><?php echo __('Face Licking', 'arc'); ?></option>
                                <option><?php echo __('Hair Job', 'arc'); ?></option>
                                <option><?php echo __('Transformation', 'arc'); ?></option>
                                <option><?php echo __('Wet Look', 'arc'); ?></option>
                                <option><?php echo __('Expansion', 'arc'); ?></option>
                                <option><?php echo __('Hoover', 'arc'); ?></option>
                                <option><?php echo __('Zipper', 'arc'); ?></option>
                                <option><?php echo __('Body Painting', 'arc'); ?></option>
                                <option><?php echo __('Booty Clapping', 'arc'); ?></option>
                                <option><?php echo __('Hair Washing', 'arc'); ?></option>
                                <option><?php echo __('Aftermath', 'arc'); ?></option>
                                <option><?php echo __('Dry Humping', 'arc'); ?></option>
                                <option><?php echo __('Skull Fuck', 'arc'); ?></option>
                                <option><?php echo __('Candle Wax', 'arc'); ?></option>
                                <option><?php echo __('Sex Fight', 'arc'); ?></option>
                                <option><?php echo __('Verbal Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Side Boob', 'arc'); ?></option>
                                <option><?php echo __('Pirate', 'arc'); ?></option>
                                <option><?php echo __('Outdoor Bondage', 'arc'); ?></option>
                                <option><?php echo __('Clit Pumping', 'arc'); ?></option>
                                <option><?php echo __('Corporal Punishment', 'arc'); ?></option>
                                <option><?php echo __('Shaved Head', 'arc'); ?></option>
                                <option><?php echo __('Wax Play', 'arc'); ?></option>
                                <option><?php echo __('Body Piercing', 'arc'); ?></option>
                                <option><?php echo __('Fingernails', 'arc'); ?></option>
                                <option><?php echo __('Cutting', 'arc'); ?></option>
                                <option><?php echo __('Desperation', 'arc'); ?></option>
                                <option><?php echo __('Handicap', 'arc'); ?></option>
                                <option><?php echo __('Breast Expansion', 'arc'); ?></option>
                                <option><?php echo __('Butter Face', 'arc'); ?></option>
                                <option><?php echo __('Degradation', 'arc'); ?></option>
                                <option><?php echo __('Tickle Torture', 'arc'); ?></option>
                                <option><?php echo __('Wrinkles', 'arc'); ?></option>
                                <option><?php echo __('Huge Labia', 'arc'); ?></option>
                                <option><?php echo __('Belly Punching', 'arc'); ?></option>
                                <option><?php echo __('Cum Countdown', 'arc'); ?></option>
                                <option><?php echo __('Mummification', 'arc'); ?></option>
                                <option><?php echo __('Public Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Stomping', 'arc'); ?></option>
                                <option><?php echo __('Top Heavy', 'arc'); ?></option>
                                <option><?php echo __('Ass Sniffing', 'arc'); ?></option>
                                <option><?php echo __('Chewing', 'arc'); ?></option>
                                <option><?php echo __('Light Bondage', 'arc'); ?></option>
                                <option><?php echo __('Pedal Pumping', 'arc'); ?></option>
                                <option><?php echo __('Large Labia', 'arc'); ?></option>
                                <option><?php echo __('Backseat Driver', 'arc'); ?></option>
                                <option><?php echo __('Foot Gagging', 'arc'); ?></option>
                                <option><?php echo __('Gag Reflex', 'arc'); ?></option>
                                <option><?php echo __('Pet Play', 'arc'); ?></option>
                                <option><?php echo __('Size Queen', 'arc'); ?></option>
                                <option><?php echo __('Smegma', 'arc'); ?></option>
                                <option><?php echo __('Alpha Male', 'arc'); ?></option>
                                <option><?php echo __('Ass Smacking', 'arc'); ?></option>
                                <option><?php echo __('Pussy Control', 'arc'); ?></option>
                                <option><?php echo __('Crawling', 'arc'); ?></option>
                                <option><?php echo __('Face Farting', 'arc'); ?></option>
                                <option><?php echo __('Penis Pump', 'arc'); ?></option>
                                <option><?php echo __('Hairbrush Spanking', 'arc'); ?></option>
                                <option><?php echo __('Surfing', 'arc'); ?></option>
                                <option><?php echo __('Jungle Fever', 'arc'); ?></option>
                                <option><?php echo __('Big Pussy', 'arc'); ?></option>
                                <option><?php echo __('Cunt Busting', 'arc'); ?></option>
                                <option><?php echo __('Figging', 'arc'); ?></option>
                                <option><?php echo __('Masturbation Encouragement', 'arc'); ?></option>
                                <option><?php echo __('Pantyhose Domination', 'arc'); ?></option>
                                <option><?php echo __('Martial Arts', 'arc'); ?></option>
                                <option><?php echo __('Whale Tail', 'arc'); ?></option>
                                <option><?php echo __('Switching', 'arc'); ?></option>
                                <option><?php echo __('Wanton', 'arc'); ?></option>
                                <option><?php echo __('Amazon', 'arc'); ?></option>
                                <option><?php echo __('Clown', 'arc'); ?></option>
                                <option><?php echo __('Diddle', 'arc'); ?></option>
                                <option><?php echo __('Giant', 'arc'); ?></option>
                                <option><?php echo __('Limp Dick', 'arc'); ?></option>
                                <option><?php echo __('Power Tool', 'arc'); ?></option>
                                <option><?php echo __('Chick With Dick', 'arc'); ?></option>
                                <option><?php echo __('Jackhammer', 'arc'); ?></option>
                                <option><?php echo __('Ass Grabbing', 'arc'); ?></option>
                                <option><?php echo __('Bridesmaid', 'arc'); ?></option>
                                <option><?php echo __('Umbrella', 'arc'); ?></option>
                                <option><?php echo __('Food Play', 'arc'); ?></option>
                                <option><?php echo __('Girdle', 'arc'); ?></option>
                                <option><?php echo __('Hummer', 'arc'); ?></option>
                                <option><?php echo __('Ice Cube', 'arc'); ?></option>
                                <option><?php echo __('Jodhpurs', 'arc'); ?></option>
                                <option><?php echo __('Sex With Stranger', 'arc'); ?></option>
                                <option><?php echo __('Robot', 'arc'); ?></option>
                                <option><?php echo __('Sleep', 'arc'); ?></option>
                                <option><?php echo __('Breast Smothering', 'arc'); ?></option>
                                <option><?php echo __('Dick Slap', 'arc'); ?></option>
                                <option><?php echo __('Bugger', 'arc'); ?></option>
                                <option><?php echo __('Infidelity', 'arc'); ?></option>
                                <option><?php echo __('Predicament Bondage', 'arc'); ?></option>
                                <option><?php echo __('Shocker', 'arc'); ?></option>
                                <option><?php echo __('Cuddle', 'arc'); ?></option>
                                <option><?php echo __('Violet Wand', 'arc'); ?></option>
                                <option><?php echo __('Ass Smelling', 'arc'); ?></option>
                                <option><?php echo __('Jelly Belly', 'arc'); ?></option>
                                <option><?php echo __('Down Jacket', 'arc'); ?></option>
                                <option><?php echo __('Grappling', 'arc'); ?></option>
                                <option><?php echo __('Peter Pan', 'arc'); ?></option>
                                <option><?php echo __('Sock Smelling', 'arc'); ?></option>
                                <option><?php echo __('Squashing', 'arc'); ?></option>
                                <option><?php echo __('Vacuum Pumping', 'arc'); ?></option>
                                <option><?php echo __('Shrinking', 'arc'); ?></option>
                                <option><?php echo __('Superheroine', 'arc'); ?></option>
                                <option><?php echo __('Sploshing', 'arc'); ?></option>
                                <option><?php echo __('Pantyhose', 'arc'); ?></option>
                                <option><?php echo __('Barbershop', 'arc'); ?></option>
                                <option><?php echo __('Bitch Slap', 'arc'); ?></option>
                                <option><?php echo __('Grooming', 'arc'); ?></option>
                                <option><?php echo __('Sneezing', 'arc'); ?></option>
                                <option><?php echo __('Ball Game', 'arc'); ?></option>
                                <option><?php echo __('Sensual Tickling', 'arc'); ?></option>
                                <option><?php echo __('Pantyhose Footjob', 'arc'); ?></option>
                                <option><?php echo __('Panty Wetting', 'arc'); ?></option>
                                <option><?php echo __('Shackles', 'arc'); ?></option>
                                <option><?php echo __('Superhero', 'arc'); ?></option>
                                <option><?php echo __('Blushing', 'arc'); ?></option>
                                <option><?php echo __('Female Supremacy', 'arc'); ?></option>
                                <option><?php echo __('Food Porn', 'arc'); ?></option>
                                <option><?php echo __('Mixed Fighting', 'arc'); ?></option>
                                <option><?php echo __('Dusting', 'arc'); ?></option>
                                <option><?php echo __('Foot Domination', 'arc'); ?></option>
                                <option><?php echo __('Overall', 'arc'); ?></option>
                                <option><?php echo __('Pantyhose Wrestling', 'arc'); ?></option>
                                <option><?php echo __('Jeans And Pants Wetting', 'arc'); ?></option>
                                <option><?php echo __('Bound Orgasm', 'arc'); ?></option>
                                <option><?php echo __('Bruise', 'arc'); ?></option>
                                <option><?php echo __('Cupping', 'arc'); ?></option>
                                <option><?php echo __('Eye Glasses', 'arc'); ?></option>
                                <option><?php echo __('Menstruation', 'arc'); ?></option>
                                <option><?php echo __('Ruined Orgasm', 'arc'); ?></option>
                                <option><?php echo __('Heifer', 'arc'); ?></option>
                                <option><?php echo __('Pvc Vinyl', 'arc'); ?></option>
                                <option><?php echo __('Saran Wrap', 'arc'); ?></option>
                                <option><?php echo __('Tap That Ass', 'arc'); ?></option>
                                <option><?php echo __('Embarrassment', 'arc'); ?></option>
                                <option><?php echo __('Forced Stripping', 'arc'); ?></option>
                                <option><?php echo __('Small Penis Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Head Shaving', 'arc'); ?></option>
                                <option><?php echo __('Toilet Slavery', 'arc'); ?></option>
                                <option><?php echo __('Watersport', 'arc'); ?></option>
                                <option><?php echo __('BBW With Thin Chick', 'arc'); ?></option>
                                <option><?php echo __('Burping', 'arc'); ?></option>
                                <option><?php echo __('Feeder And Feedee', 'arc'); ?></option>
                                <option><?php echo __('Hand Over Mouth', 'arc'); ?></option>
                                <option><?php echo __('Kneejob', 'arc'); ?></option>
                                <option><?php echo __('Masturbation Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Pop The Cherry', 'arc'); ?></option>
                                <option><?php echo __('Blackmail Fantasy', 'arc'); ?></option>
                                <option><?php echo __('Odd Insertion', 'arc'); ?></option>
                                <option><?php echo __('Executrix', 'arc'); ?></option>
                                <option><?php echo __('Male Submission', 'arc'); ?></option>
                                <option><?php echo __('Straitjacket', 'arc'); ?></option>
                                <option><?php echo __('Under Boob', 'arc'); ?></option>
                                <option><?php echo __('Artistic Cutting', 'arc'); ?></option>
                                <option><?php echo __('Autofellatio', 'arc'); ?></option>
                                <option><?php echo __('Bag Popping', 'arc'); ?></option>
                                <option><?php echo __('Ballet Boots And Shoes', 'arc'); ?></option>
                                <option><?php echo __('Ballet Slippers', 'arc'); ?></option>
                                <option><?php echo __('Balloon Stuffing', 'arc'); ?></option>
                                <option><?php echo __('Belly Plopping', 'arc'); ?></option>
                                <option><?php echo __('Belly Sound', 'arc'); ?></option>
                                <option><?php echo __('Blowing Bubbles', 'arc'); ?></option>
                                <option><?php echo __('Blowjob', 'arc'); ?></option>
                                <option><?php echo __('Body Part Comparison', 'arc'); ?></option>
                                <option><?php echo __('Boot Blacking', 'arc'); ?></option>
                                <option><?php echo __('Boots', 'arc'); ?></option>
                                <option><?php echo __('Bouncing Boobs', 'arc'); ?></option>
                                <option><?php echo __('Breast Milk Pumping', 'arc'); ?></option>
                                <option><?php echo __('Breast Play', 'arc'); ?></option>
                                <option><?php echo __('Calf Muscle', 'arc'); ?></option>
                                <option><?php echo __('Chakra Energy Play', 'arc'); ?></option>
                                <option><?php echo __('Clothes Destruction', 'arc'); ?></option>
                                <option><?php echo __('Cocksucking', 'arc'); ?></option>
                                <option><?php echo __('Coughing', 'arc'); ?></option>
                                <option><?php echo __('Cpr', 'arc'); ?></option>
                                <option><?php echo __('Cunt Worship', 'arc'); ?></option>
                                <option><?php echo __('Cyber Sex', 'arc'); ?></option>
                                <option><?php echo __('Daddy Daughter', 'arc'); ?></option>
                                <option><?php echo __('Decorative Cutting', 'arc'); ?></option>
                                <option><?php echo __('Depilation', 'arc'); ?></option>
                                <option><?php echo __('Doctor And Nurse', 'arc'); ?></option>
                                <option><?php echo __('Drooling', 'arc'); ?></option>
                                <option><?php echo __('Edge Play', 'arc'); ?></option>
                                <option><?php echo __('Edging Game', 'arc'); ?></option>
                                <option><?php echo __('Escaping', 'arc'); ?></option>
                                <option><?php echo __('Eyebrow Shaving', 'arc'); ?></option>
                                <option><?php echo __('Fat', 'arc'); ?></option>
                                <option><?php echo __('Feet', 'arc'); ?></option>
                                <option><?php echo __('Food And Object Crush', 'arc'); ?></option>
                                <option><?php echo __('Food Masturbation', 'arc'); ?></option>
                                <option><?php echo __('Foot Smother', 'arc'); ?></option>
                                <option><?php echo __('Freeze', 'arc'); ?></option>
                                <option><?php echo __('Gaining Weight', 'arc'); ?></option>
                                <option><?php echo __('Garter', 'arc'); ?></option>
                                <option><?php echo __('Goth', 'arc'); ?></option>
                                <option><?php echo __('Hourglass', 'arc'); ?></option>
                                <option><?php echo __('Interview', 'arc'); ?></option>
                                <option><?php echo __('Jeans Face Sitting', 'arc'); ?></option>
                                <option><?php echo __('Lead And Leash', 'arc'); ?></option>
                                <option><?php echo __('Match Lighting', 'arc'); ?></option>
                                <option><?php echo __('Med Exam', 'arc'); ?></option>
                                <option><?php echo __('Med Gyno', 'arc'); ?></option>
                                <option><?php echo __('Mom And Boy Dynamics', 'arc'); ?></option>
                                <option><?php echo __('Mom And Girl', 'arc'); ?></option>
                                <option><?php echo __('Mud And Quicksand Sinking', 'arc'); ?></option>
                                <option><?php echo __('Muscle Control', 'arc'); ?></option>
                                <option><?php echo __('Muscle Fucking', 'arc'); ?></option>
                                <option><?php echo __('Muscle Worship', 'arc'); ?></option>
                                <option><?php echo __('Nun And Priest', 'arc'); ?></option>
                                <option><?php echo __('Nurse Play', 'arc'); ?></option>
                                <option><?php echo __('Riding Lawn Mower', 'arc'); ?></option>
                                <option><?php echo __('Ritual', 'arc'); ?></option>
                                <option><?php echo __('Scent', 'arc'); ?></option>
                                <option><?php echo __('Self Sucking', 'arc'); ?></option>
                                <option><?php echo __('Sex In The Cemetery', 'arc'); ?></option>
                                <option><?php echo __('Sex In Videostore Porn Room', 'arc'); ?></option>
                                <option><?php echo __('Sex Online', 'arc'); ?></option>
                                <option><?php echo __('Shoe And Boot Worship', 'arc'); ?></option>
                                <option><?php echo __('Size Comparison', 'arc'); ?></option>
                                <option><?php echo __('Sneakers', 'arc'); ?></option>
                                <option><?php echo __('Stomach Growling', 'arc'); ?></option>
                                <option><?php echo __('Stretch Marks', 'arc'); ?></option>
                                <option><?php echo __('Tanned Body', 'arc'); ?></option>
                                <option><?php echo __('Tit And Nipple Sucking', 'arc'); ?></option>
                                <option><?php echo __('Toe', 'arc'); ?></option>
                                <option><?php echo __('Toes And Feet', 'arc'); ?></option>
                                <option><?php echo __('Toy Making', 'arc'); ?></option>
                                <option><?php echo __('Urethral Sound', 'arc'); ?></option>
                                <option><?php echo __('Vaping', 'arc'); ?></option>
                                <option><?php echo __('Verbal Degradation', 'arc'); ?></option>
                                <option><?php echo __('Water Bondage', 'arc'); ?></option>
                                <option><?php echo __('Waterboarding', 'arc'); ?></option>
                                <option><?php echo __('Wedgie', 'arc'); ?></option>
                                <option><?php echo __('Wet T Shirt', 'arc'); ?></option>
                                <option><?php echo __('Yawning', 'arc'); ?></option>
                                <option><?php echo __('1950s Household', 'arc'); ?></option>
                                <option><?php echo __('Abduction Play', 'arc'); ?></option>
                                <option><?php echo __('Abrasion Play', 'arc'); ?></option>
                                <option><?php echo __('Abs', 'arc'); ?></option>
                                <option><?php echo __('Abused Shoes', 'arc'); ?></option>
                                <option><?php echo __('Accent', 'arc'); ?></option>
                                <option><?php echo __('Adult Diaper', 'arc'); ?></option>
                                <option><?php echo __('Age Play', 'arc'); ?></option>
                                <option><?php echo __('Age Regression', 'arc'); ?></option>
                                <option><?php echo __('Albino', 'arc'); ?></option>
                                <option><?php echo __('Alien And Monster', 'arc'); ?></option>
                                <option><?php echo __('All Natural', 'arc'); ?></option>
                                <option><?php echo __('Anal Chastity', 'arc'); ?></option>
                                <option><?php echo __('Anal Hook', 'arc'); ?></option>
                                <option><?php echo __('Anal Stretching', 'arc'); ?></option>
                                <option><?php echo __('Androgyny', 'arc'); ?></option>
                                <option><?php echo __('Anime', 'arc'); ?></option>
                                <option><?php echo __('Anonymous Encounters', 'arc'); ?></option>
                                <option><?php echo __('Apocalyptic', 'arc'); ?></option>
                                <option><?php echo __('Apron', 'arc'); ?></option>
                                <option><?php echo __('Arm Holding', 'arc'); ?></option>
                                <option><?php echo __('Armbinder', 'arc'); ?></option>
                                <option><?php echo __('Armwrestling', 'arc'); ?></option>
                                <option><?php echo __('Arrogant Woman', 'arc'); ?></option>
                                <option><?php echo __('Asmr', 'arc'); ?></option>
                                <option><?php echo __('Asphyxiaphilia', 'arc'); ?></option>
                                <option><?php echo __('Ass', 'arc'); ?></option>
                                <option><?php echo __('Ass Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Ass Squishing', 'arc'); ?></option>
                                <option><?php echo __('Asscheek Fucking', 'arc'); ?></option>
                                <option><?php echo __('Assignment', 'arc'); ?></option>
                                <option><?php echo __('Assisted Masturbation', 'arc'); ?></option>
                                <option><?php echo __('Auralism', 'arc'); ?></option>
                                <option><?php echo __('Back', 'arc'); ?></option>
                                <option><?php echo __('Bad Breath', 'arc'); ?></option>
                                <option><?php echo __('Bald Girl', 'arc'); ?></option>
                                <option><?php echo __('Ball And Cock Tickling', 'arc'); ?></option>
                                <option><?php echo __('Ball Gag', 'arc'); ?></option>
                                <option><?php echo __('Ball Stretching', 'arc'); ?></option>
                                <option><?php echo __('Balloon B2p', 'arc'); ?></option>
                                <option><?php echo __('Balloon Non Pop', 'arc'); ?></option>
                                <option><?php echo __('Band Aid', 'arc'); ?></option>
                                <option><?php echo __('Bare Bottom Spanking', 'arc'); ?></option>
                                <option><?php echo __('Bare Fisted Fighting', 'arc'); ?></option>
                                <option><?php echo __('Bare Handed Spanking', 'arc'); ?></option>
                                <option><?php echo __('Bastinado', 'arc'); ?></option>
                                <option><?php echo __('Bathroom Use Control', 'arc'); ?></option>
                                <option><?php echo __('BBW With Thin Man', 'arc'); ?></option>
                                <option><?php echo __('Beach Ball', 'arc'); ?></option>
                                <option><?php echo __('Bearhug', 'arc'); ?></option>
                                <option><?php echo __('Beatdown', 'arc'); ?></option>
                                <option><?php echo __('Behavior Modification', 'arc'); ?></option>
                                <option><?php echo __('Belly', 'arc'); ?></option>
                                <option><?php echo __('Belly Button', 'arc'); ?></option>
                                <option><?php echo __('Belly Drop', 'arc'); ?></option>
                                <option><?php echo __('Belt Spanking', 'arc'); ?></option>
                                <option><?php echo __('Belt Whipping', 'arc'); ?></option>
                                <option><?php echo __('Ben Wa Balls', 'arc'); ?></option>
                                <option><?php echo __('Bimbofication', 'arc'); ?></option>
                                <option><?php echo __('Birthmark', 'arc'); ?></option>
                                <option><?php echo __('Bisexual Encouragement', 'arc'); ?></option>
                                <option><?php echo __('Blindfold', 'arc'); ?></option>
                                <option><?php echo __('Bloated Belly', 'arc'); ?></option>
                                <option><?php echo __('Blood Play', 'arc'); ?></option>
                                <option><?php echo __('Body Busting', 'arc'); ?></option>
                                <option><?php echo __('Body Hair', 'arc'); ?></option>
                                <option><?php echo __('Body Inflation', 'arc'); ?></option>
                                <option><?php echo __('Body Modification', 'arc'); ?></option>
                                <option><?php echo __('Body Worship', 'arc'); ?></option>
                                <option><?php echo __('Bodybuilding', 'arc'); ?></option>
                                <option><?php echo __('Bodystocking', 'arc'); ?></option>
                                <option><?php echo __('Bondage Art', 'arc'); ?></option>
                                <option><?php echo __('Bondage Equipment', 'arc'); ?></option>
                                <option><?php echo __('Bondage Tape', 'arc'); ?></option>
                                <option><?php echo __('Boot Domination', 'arc'); ?></option>
                                <option><?php echo __('Boot Licking', 'arc'); ?></option>
                                <option><?php echo __('Boot Worship', 'arc'); ?></option>
                                <option><?php echo __('Boss And Employee', 'arc'); ?></option>
                                <option><?php echo __('Boss And Secretary', 'arc'); ?></option>
                                <option><?php echo __('Bound Belly', 'arc'); ?></option>
                                <option><?php echo __('Bow', 'arc'); ?></option>
                                <option><?php echo __('Bra', 'arc'); ?></option>
                                <option><?php echo __('Bracelet', 'arc'); ?></option>
                                <option><?php echo __('Brake Failure', 'arc'); ?></option>
                                <option><?php echo __('Brat', 'arc'); ?></option>
                                <option><?php echo __('Breast Spanking', 'arc'); ?></option>
                                <option><?php echo __('Breast Whipping', 'arc'); ?></option>
                                <option><?php echo __('Breath Play', 'arc'); ?></option>
                                <option><?php echo __('Breeding', 'arc'); ?></option>
                                <option><?php echo __('Brunette', 'arc'); ?></option>
                                <option><?php echo __('Bubble Gum', 'arc'); ?></option>
                                <option><?php echo __('Bubbles', 'arc'); ?></option>
                                <option><?php echo __('Bull', 'arc'); ?></option>
                                <option><?php echo __('Bullwhip', 'arc'); ?></option>
                                <option><?php echo __('Bunion', 'arc'); ?></option>
                                <option><?php echo __('Business Suit', 'arc'); ?></option>
                                <option><?php echo __('Butt Drop', 'arc'); ?></option>
                                <option><?php echo __('Caging And Confinement', 'arc'); ?></option>
                                <option><?php echo __('Camel Toe', 'arc'); ?></option>
                                <option><?php echo __('Caning', 'arc'); ?></option>
                                <option><?php echo __('Cape', 'arc'); ?></option>
                                <option><?php echo __('Car Crush', 'arc'); ?></option>
                                <option><?php echo __('Casting', 'arc'); ?></option>
                                <option><?php echo __('Catheter', 'arc'); ?></option>
                                <option><?php echo __('Catsuit', 'arc'); ?></option>
                                <option><?php echo __('Cell Popping', 'arc'); ?></option>
                                <option><?php echo __('Chap', 'arc'); ?></option>
                                <option><?php echo __('Chastity', 'arc'); ?></option>
                                <option><?php echo __('Chastity Device', 'arc'); ?></option>
                                <option><?php echo __('Cheerleading Uniform', 'arc'); ?></option>
                                <option><?php echo __('Chest Sitting', 'arc'); ?></option>
                                <option><?php echo __('Chocolate', 'arc'); ?></option>
                                <option><?php echo __('Cigar', 'arc'); ?></option>
                                <option><?php echo __('Clamp And Clip', 'arc'); ?></option>
                                <option><?php echo __('Claws', 'arc'); ?></option>
                                <option><?php echo __('Cling Film', 'arc'); ?></option>
                                <option><?php echo __('Clit Spanking', 'arc'); ?></option>
                                <option><?php echo __('Clothespin', 'arc'); ?></option>
                                <option><?php echo __('Clover Clamp', 'arc'); ?></option>
                                <option><?php echo __('Cock And Ball Torture', 'arc'); ?></option>
                                <option><?php echo __('Cockring', 'arc'); ?></option>
                                <option><?php echo __('Collar', 'arc'); ?></option>
                                <option><?php echo __('Consensual Nonconsent Play', 'arc'); ?></option>
                                <option><?php echo __('Cornertime', 'arc'); ?></option>
                                <option><?php echo __('Corset Cinching', 'arc'); ?></option>
                                <option><?php echo __('Corset Piercing', 'arc'); ?></option>
                                <option><?php echo __('Corset Training', 'arc'); ?></option>
                                <option><?php echo __('Costume', 'arc'); ?></option>
                                <option><?php echo __('Covert Bondage', 'arc'); ?></option>
                                <option><?php echo __('Cranking', 'arc'); ?></option>
                                <option><?php echo __('Crop', 'arc'); ?></option>
                                <option><?php echo __('Crotch Abuse', 'arc'); ?></option>
                                <option><?php echo __('Crucifixion Play', 'arc'); ?></option>
                                <option><?php echo __('Crush', 'arc'); ?></option>
                                <option><?php echo __('Crutch', 'arc'); ?></option>
                                <option><?php echo __('Cum', 'arc'); ?></option>
                                <option><?php echo __('Curvy', 'arc'); ?></option>
                                <option><?php echo __('D And S', 'arc'); ?></option>
                                <option><?php echo __('Dacryphilia', 'arc'); ?></option>
                                <option><?php echo __('Daddy And Girl', 'arc'); ?></option>
                                <option><?php echo __('Dancing', 'arc'); ?></option>
                                <option><?php echo __('Defilement', 'arc'); ?></option>
                                <option><?php echo __('Denim', 'arc'); ?></option>
                                <option><?php echo __('Diaper', 'arc'); ?></option>
                                <option><?php echo __('Diaper Discipline', 'arc'); ?></option>
                                <option><?php echo __('Discipline', 'arc'); ?></option>
                                <option><?php echo __('Dishwashing', 'arc'); ?></option>
                                <option><?php echo __('Dollification', 'arc'); ?></option>
                                <option><?php echo __('Domestic Servitude', 'arc'); ?></option>
                                <option><?php echo __('Duel Masturbation', 'arc'); ?></option>
                                <option><?php echo __('Ear', 'arc'); ?></option>
                                <option><?php echo __('Eating In Car', 'arc'); ?></option>
                                <option><?php echo __('Ebony Foot', 'arc'); ?></option>
                                <option><?php echo __('Electric Massager', 'arc'); ?></option>
                                <option><?php echo __('Electric Play', 'arc'); ?></option>
                                <option><?php echo __('Embarrassed Naked Female', 'arc'); ?></option>
                                <option><?php echo __('Emotional Masochism', 'arc'); ?></option>
                                <option><?php echo __('Emotional Sadism', 'arc'); ?></option>
                                <option><?php echo __('Eroscillator', 'arc'); ?></option>
                                <option><?php echo __('Erotic Audio', 'arc'); ?></option>
                                <option><?php echo __('Erotic Literature', 'arc'); ?></option>
                                <option><?php echo __('Erotic Magic', 'arc'); ?></option>
                                <option><?php echo __('Erotic Photography', 'arc'); ?></option>
                                <option><?php echo __('E Stim', 'arc'); ?></option>
                                <option><?php echo __('Ethnic', 'arc'); ?></option>
                                <option><?php echo __('Exercise', 'arc'); ?></option>
                                <option><?php echo __('Eye', 'arc'); ?></option>
                                <option><?php echo __('Eye Contact Restriction', 'arc'); ?></option>
                                <option><?php echo __('Eye Crossing', 'arc'); ?></option>
                                <option><?php echo __('Eyelash', 'arc'); ?></option>
                                <option><?php echo __('Face', 'arc'); ?></option>
                                <option><?php echo __('Face Sitting And Smothering', 'arc'); ?></option>
                                <option><?php echo __('Facebusting', 'arc'); ?></option>
                                <option><?php echo __('Facestanding', 'arc'); ?></option>
                                <option><?php echo __('Facestuffing And Overeating', 'arc'); ?></option>
                                <option><?php echo __('Facial Hair', 'arc'); ?></option>
                                <option><?php echo __('Fantasy Wrestling', 'arc'); ?></option>
                                <option><?php echo __('Fat Admirer', 'arc'); ?></option>
                                <option><?php echo __('Fat Apron', 'arc'); ?></option>
                                <option><?php echo __('Fear', 'arc'); ?></option>
                                <option><?php echo __('Feather', 'arc'); ?></option>
                                <option><?php echo __('Feet Fight', 'arc'); ?></option>
                                <option><?php echo __('Feet Joi', 'arc'); ?></option>
                                <option><?php echo __('Female Boxing', 'arc'); ?></option>
                                <option><?php echo __('Fetnight', 'arc'); ?></option>
                                <option><?php echo __('Finger', 'arc'); ?></option>
                                <option><?php echo __('Finger Brushing', 'arc'); ?></option>
                                <option><?php echo __('Finger Nail Polishing', 'arc'); ?></option>
                                <option><?php echo __('Fire Cupping', 'arc'); ?></option>
                                <option><?php echo __('Fire Flogging', 'arc'); ?></option>
                                <option><?php echo __('Fire Play', 'arc'); ?></option>
                                <option><?php echo __('Fish Hook', 'arc'); ?></option>
                                <option><?php echo __('Flesh Hook', 'arc'); ?></option>
                                <option><?php echo __('Food', 'arc'); ?></option>
                                <option><?php echo __('Food Stuffing', 'arc'); ?></option>
                                <option><?php echo __('Foot Party', 'arc'); ?></option>
                                <option><?php echo __('Foot Play', 'arc'); ?></option>
                                <option><?php echo __('Foot Slave Training', 'arc'); ?></option>
                                <option><?php echo __('Foot Smelling Handjob', 'arc'); ?></option>
                                <option><?php echo __('Foot Tickling', 'arc'); ?></option>
                                <option><?php echo __('Foot Torture', 'arc'); ?></option>
                                <option><?php echo __('Footjob', 'arc'); ?></option>
                                <option><?php echo __('Footsie', 'arc'); ?></option>
                                <option><?php echo __('Forced Bi', 'arc'); ?></option>
                                <option><?php echo __('Forced Ejaculation', 'arc'); ?></option>
                                <option><?php echo __('Forced Fem', 'arc'); ?></option>
                                <option><?php echo __('Forced Kissing', 'arc'); ?></option>
                                <option><?php echo __('Forced Orgasm', 'arc'); ?></option>
                                <option><?php echo __('Foreskin', 'arc'); ?></option>
                                <option><?php echo __('Forniphilia', 'arc'); ?></option>
                                <option><?php echo __('French Maid', 'arc'); ?></option>
                                <option><?php echo __('Fur', 'arc'); ?></option>
                                <option><?php echo __('Fursuit', 'arc'); ?></option>
                                <option><?php echo __('G Spot Stimulation', 'arc'); ?></option>
                                <option><?php echo __('Gag Talk', 'arc'); ?></option>
                                <option><?php echo __('Gagging And Choked By Cock', 'arc'); ?></option>
                                <option><?php echo __('Game', 'arc'); ?></option>
                                <option><?php echo __('Gas Mask', 'arc'); ?></option>
                                <option><?php echo __('Gastronomic Voyeurism', 'arc'); ?></option>
                                <option><?php echo __('Geek', 'arc'); ?></option>
                                <option><?php echo __('Gelding', 'arc'); ?></option>
                                <option><?php echo __('Gender Play', 'arc'); ?></option>
                                <option><?php echo __('Gender Transformation', 'arc'); ?></option>
                                <option><?php echo __('Genital Piercing', 'arc'); ?></option>
                                <option><?php echo __('Glamour Gown', 'arc'); ?></option>
                                <option><?php echo __('Glass Dildo', 'arc'); ?></option>
                                <option><?php echo __('Graphoerotica', 'arc'); ?></option>
                                <option><?php echo __('Growth', 'arc'); ?></option>
                                <option><?php echo __('Hair', 'arc'); ?></option>
                                <option><?php echo __('Hair Bleaching', 'arc'); ?></option>
                                <option><?php echo __('Hair Bondage', 'arc'); ?></option>
                                <option><?php echo __('Hair Brush Spanking', 'arc'); ?></option>
                                <option><?php echo __('Hair Brushing', 'arc'); ?></option>
                                <option><?php echo __('Hair Color', 'arc'); ?></option>
                                <option><?php echo __('Hair Cutting', 'arc'); ?></option>
                                <option><?php echo __('Hair Fucking', 'arc'); ?></option>
                                <option><?php echo __('Hair Perming', 'arc'); ?></option>
                                <option><?php echo __('Hair Style', 'arc'); ?></option>
                                <option><?php echo __('Hairy Arms', 'arc'); ?></option>
                                <option><?php echo __('Hand Expressing', 'arc'); ?></option>
                                <option><?php echo __('Hand Worship', 'arc'); ?></option>
                                <option><?php echo __('Hands', 'arc'); ?></option>
                                <option><?php echo __('Hat', 'arc'); ?></option>
                                <option><?php echo __('Headphone', 'arc'); ?></option>
                                <option><?php echo __('Headscarf', 'arc'); ?></option>
                                <option><?php echo __('Height Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Hemp Rope', 'arc'); ?></option>
                                <option><?php echo __('Hiccup', 'arc'); ?></option>
                                <option><?php echo __('High Protocol', 'arc'); ?></option>
                                <option><?php echo __('Highly Arched Feet', 'arc'); ?></option>
                                <option><?php echo __('Hips', 'arc'); ?></option>
                                <option><?php echo __('Hojojutsu', 'arc'); ?></option>
                                <option><?php echo __('Hood', 'arc'); ?></option>
                                <option><?php echo __('Hook Suspension', 'arc'); ?></option>
                                <option><?php echo __('Hopping', 'arc'); ?></option>
                                <option><?php echo __('Hot Oil Massage', 'arc'); ?></option>
                                <option><?php echo __('Housecleaning', 'arc'); ?></option>
                                <option><?php echo __('Human Ashtray', 'arc'); ?></option>
                                <option><?php echo __('Human Doll', 'arc'); ?></option>
                                <option><?php echo __('Human Furniture', 'arc'); ?></option>
                                <option><?php echo __('Human Toilet', 'arc'); ?></option>
                                <option><?php echo __('Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Humor', 'arc'); ?></option>
                                <option><?php echo __('Ice', 'arc'); ?></option>
                                <option><?php echo __('Ignore', 'arc'); ?></option>
                                <option><?php echo __('Impact Play', 'arc'); ?></option>
                                <option><?php echo __('Impregnation Fantasy', 'arc'); ?></option>
                                <option><?php echo __('Inflatable', 'arc'); ?></option>
                                <option><?php echo __('Inflatable Blow', 'arc'); ?></option>
                                <option><?php echo __('Inflatable Non Pop', 'arc'); ?></option>
                                <option><?php echo __('Inflatable Suit', 'arc'); ?></option>
                                <option><?php echo __('Internal Enslavement', 'arc'); ?></option>
                                <option><?php echo __('Kilt', 'arc'); ?></option>
                                <option><?php echo __('Kinbaku', 'arc'); ?></option>
                                <option><?php echo __('Kitten Petplay', 'arc'); ?></option>
                                <option><?php echo __('Lace', 'arc'); ?></option>
                                <option><?php echo __('Lactation', 'arc'); ?></option>
                                <option><?php echo __('Lapsitting', 'arc'); ?></option>
                                <option><?php echo __('Large Object', 'arc'); ?></option>
                                <option><?php echo __('Legs', 'arc'); ?></option>
                                <option><?php echo __('Librarian', 'arc'); ?></option>
                                <option><?php echo __('Lickling', 'arc'); ?></option>
                                <option><?php echo __('Lift And Carry', 'arc'); ?></option>
                                <option><?php echo __('Limp', 'arc'); ?></option>
                                <option><?php echo __('Lips', 'arc'); ?></option>
                                <option><?php echo __('Liquid Latex', 'arc'); ?></option>
                                <option><?php echo __('Liquor', 'arc'); ?></option>
                                <option><?php echo __('Lollipop Licker', 'arc'); ?></option>
                                <option><?php echo __('Losing Weight', 'arc'); ?></option>
                                <option><?php echo __('Lotion And Oil', 'arc'); ?></option>
                                <option><?php echo __('Lycra And Spandex', 'arc'); ?></option>
                                <option><?php echo __('Maid Uniform', 'arc'); ?></option>
                                <option><?php echo __('Making Home Movie', 'arc'); ?></option>
                                <option><?php echo __('Male Authority', 'arc'); ?></option>
                                <option><?php echo __('Male Feet', 'arc'); ?></option>
                                <option><?php echo __('Man Following Orders', 'arc'); ?></option>
                                <option><?php echo __('Mask', 'arc'); ?></option>
                                <option><?php echo __('Master And Slave', 'arc'); ?></option>
                                <option><?php echo __('Med Resus', 'arc'); ?></option>
                                <option><?php echo __('Medical Clinic', 'arc'); ?></option>
                                <option><?php echo __('Medical Play', 'arc'); ?></option>
                                <option><?php echo __('Medieval Device', 'arc'); ?></option>
                                <option><?php echo __('Mental Bondage', 'arc'); ?></option>
                                <option><?php echo __('Mental Domination', 'arc'); ?></option>
                                <option><?php echo __('Meok Bang', 'arc'); ?></option>
                                <option><?php echo __('Metal', 'arc'); ?></option>
                                <option><?php echo __('Military Interrogation', 'arc'); ?></option>
                                <option><?php echo __('Military Uniform', 'arc'); ?></option>
                                <option><?php echo __('Mistress With Strap On', 'arc'); ?></option>
                                <option><?php echo __('Mistress And Slave', 'arc'); ?></option>
                                <option><?php echo __('Mixed Boxing', 'arc'); ?></option>
                                <option><?php echo __('Money', 'arc'); ?></option>
                                <option><?php echo __('Monogamy', 'arc'); ?></option>
                                <option><?php echo __('Mouth', 'arc'); ?></option>
                                <option><?php echo __('Mouthsoaping', 'arc'); ?></option>
                                <option><?php echo __('Muscle Domination', 'arc'); ?></option>
                                <option><?php echo __('Muscles', 'arc'); ?></option>
                                <option><?php echo __('Nape Shaving', 'arc'); ?></option>
                                <option><?php echo __('Neck', 'arc'); ?></option>
                                <option><?php echo __('Neck Brace', 'arc'); ?></option>
                                <option><?php echo __('Needle Play', 'arc'); ?></option>
                                <option><?php echo __('Nerdy Girl', 'arc'); ?></option>
                                <option><?php echo __('Nipple Play', 'arc'); ?></option>
                                <option><?php echo __('Nose', 'arc'); ?></option>
                                <option><?php echo __('Nose Blowing', 'arc'); ?></option>
                                <option><?php echo __('Nose Pinching', 'arc'); ?></option>
                                <option><?php echo __('Nun', 'arc'); ?></option>
                                <option><?php echo __('Nyotaimori', 'arc'); ?></option>
                                <option><?php echo __('Obedience Training', 'arc'); ?></option>
                                <option><?php echo __('Objectification', 'arc'); ?></option>
                                <option><?php echo __('Office Domination', 'arc'); ?></option>
                                <option><?php echo __('Old Guard Slavery', 'arc'); ?></option>
                                <option><?php echo __('One Shoe', 'arc'); ?></option>
                                <option><?php echo __('One Shoe Hopping', 'arc'); ?></option>
                                <option><?php echo __('Ordered To Masturbate', 'arc'); ?></option>
                                <option><?php echo __('Orthopedic Brace', 'arc'); ?></option>
                                <option><?php echo __('Otk Spanking', 'arc'); ?></option>
                                <option><?php echo __('Pad Bulge', 'arc'); ?></option>
                                <option><?php echo __('Pain', 'arc'); ?></option>
                                <option><?php echo __('Panty Sniffing', 'arc'); ?></option>
                                <option><?php echo __('Penis Plug', 'arc'); ?></option>
                                <option><?php echo __('Percussion Play', 'arc'); ?></option>
                                <option><?php echo __('Perm Rods And Roller Set', 'arc'); ?></option>
                                <option><?php echo __('Petticoat', 'arc'); ?></option>
                                <option><?php echo __('Photography', 'arc'); ?></option>
                                <option><?php echo __('Piercing', 'arc'); ?></option>
                                <option><?php echo __('Piggy Play', 'arc'); ?></option>
                                <option><?php echo __('Pillow Fight', 'arc'); ?></option>
                                <option><?php echo __('Pinching', 'arc'); ?></option>
                                <option><?php echo __('Pin Up', 'arc'); ?></option>
                                <option><?php echo __('Play Piercing', 'arc'); ?></option>
                                <option><?php echo __('Play Punishment', 'arc'); ?></option>
                                <option><?php echo __('Plushy', 'arc'); ?></option>
                                <option><?php echo __('Pointed Toes', 'arc'); ?></option>
                                <option><?php echo __('Polyamory', 'arc'); ?></option>
                                <option><?php echo __('Pony Play', 'arc'); ?></option>
                                <option><?php echo __('Porn', 'arc'); ?></option>
                                <option><?php echo __('Post Cum Torture', 'arc'); ?></option>
                                <option><?php echo __('Posture Collar', 'arc'); ?></option>
                                <option><?php echo __('Power Exchange', 'arc'); ?></option>
                                <option><?php echo __('Powerful Woman', 'arc'); ?></option>
                                <option><?php echo __('Predator And Prey', 'arc'); ?></option>
                                <option><?php echo __('Pressure Point', 'arc'); ?></option>
                                <option><?php echo __('Princess', 'arc'); ?></option>
                                <option><?php echo __('Pro Domme', 'arc'); ?></option>
                                <option><?php echo __('Prostate Milking', 'arc'); ?></option>
                                <option><?php echo __('Psycholagny', 'arc'); ?></option>
                                <option><?php echo __('Public Blowjob', 'arc'); ?></option>
                                <option><?php echo __('Public Farting', 'arc'); ?></option>
                                <option><?php echo __('Public Play', 'arc'); ?></option>
                                <option><?php echo __('Public Toilet', 'arc'); ?></option>
                                <option><?php echo __('Punk Rocker', 'arc'); ?></option>
                                <option><?php echo __('Puppet Porn', 'arc'); ?></option>
                                <option><?php echo __('Puppy Play', 'arc'); ?></option>
                                <option><?php echo __('Pussy And Asshole Waxing', 'arc'); ?></option>
                                <option><?php echo __('Pussy Slapping', 'arc'); ?></option>
                                <option><?php echo __('Pvc', 'arc'); ?></option>
                                <option><?php echo __('Pyro', 'arc'); ?></option>
                                <option><?php echo __('Queefing', 'arc'); ?></option>
                                <option><?php echo __('Real Fight', 'arc'); ?></option>
                                <option><?php echo __('Rejection', 'arc'); ?></option>
                                <option><?php echo __('Religious Play', 'arc'); ?></option>
                                <option><?php echo __('Remote Control Device', 'arc'); ?></option>
                                <option><?php echo __('Revving', 'arc'); ?></option>
                                <option><?php echo __('Riding Crop', 'arc'); ?></option>
                                <option><?php echo __('Rockabilly', 'arc'); ?></option>
                                <option><?php echo __('Rope Bondage And Suspension', 'arc'); ?></option>
                                <option><?php echo __('Rubber', 'arc'); ?></option>
                                <option><?php echo __('Sacred Sexuality', 'arc'); ?></option>
                                <option><?php echo __('Sadomasochism', 'arc'); ?></option>
                                <option><?php echo __('Salon', 'arc'); ?></option>
                                <option><?php echo __('Scar', 'arc'); ?></option>
                                <option><?php echo __('Scarf Bondage', 'arc'); ?></option>
                                <option><?php echo __('Scarification', 'arc'); ?></option>
                                <option><?php echo __('Schoolgirl', 'arc'); ?></option>
                                <option><?php echo __('Schoolgirl Uniform', 'arc'); ?></option>
                                <option><?php echo __('Scissorhold', 'arc'); ?></option>
                                <option><?php echo __('Scolding', 'arc'); ?></option>
                                <option><?php echo __('Seat Belt', 'arc'); ?></option>
                                <option><?php echo __('Secretary', 'arc'); ?></option>
                                <option><?php echo __('Sensation Play', 'arc'); ?></option>
                                <option><?php echo __('Sensory Deprivation', 'arc'); ?></option>
                                <option><?php echo __('Sensual Domination', 'arc'); ?></option>
                                <option><?php echo __('Sensual Play', 'arc'); ?></option>
                                <option><?php echo __('Sensualism', 'arc'); ?></option>
                                <option><?php echo __('Service', 'arc'); ?></option>
                                <option><?php echo __('Service Oriented Submission', 'arc'); ?></option>
                                <option><?php echo __('Sexual Objectification', 'arc'); ?></option>
                                <option><?php echo __('Sexual Rejection', 'arc'); ?></option>
                                <option><?php echo __('Sexual Slavery', 'arc'); ?></option>
                                <option><?php echo __('Shoejob', 'arc'); ?></option>
                                <option><?php echo __('Shoes', 'arc'); ?></option>
                                <option><?php echo __('Shoulder Riding', 'arc'); ?></option>
                                <option><?php echo __('Shower Scene', 'arc'); ?></option>
                                <option><?php echo __('Silent Movie', 'arc'); ?></option>
                                <option><?php echo __('Silk', 'arc'); ?></option>
                                <option><?php echo __('Silly Face', 'arc'); ?></option>
                                <option><?php echo __('Single Tail Whip', 'arc'); ?></option>
                                <option><?php echo __('Sissification', 'arc'); ?></option>
                                <option><?php echo __('Sissy Panties', 'arc'); ?></option>
                                <option><?php echo __('Skinny Woman', 'arc'); ?></option>
                                <option><?php echo __('Slave Bell', 'arc'); ?></option>
                                <option><?php echo __('Slave Tattoo', 'arc'); ?></option>
                                <option><?php echo __('Sleepsack', 'arc'); ?></option>
                                <option><?php echo __('Sleepy Sex', 'arc'); ?></option>
                                <option><?php echo __('Slip', 'arc'); ?></option>
                                <option><?php echo __('Slow Motion', 'arc'); ?></option>
                                <option><?php echo __('Small Penis Encouragement', 'arc'); ?></option>
                                <option><?php echo __('Small Penis Worship', 'arc'); ?></option>
                                <option><?php echo __('Small Testicle Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Smell', 'arc'); ?></option>
                                <option><?php echo __('Snorkel Gear', 'arc'); ?></option>
                                <option><?php echo __('Snuggling', 'arc'); ?></option>
                                <option><?php echo __('Sockjob', 'arc'); ?></option>
                                <option><?php echo __('Sole Fucking', 'arc'); ?></option>
                                <option><?php echo __('Soles', 'arc'); ?></option>
                                <option><?php echo __('Speculum', 'arc'); ?></option>
                                <option><?php echo __('Speech Restriction', 'arc'); ?></option>
                                <option><?php echo __('Spinal Brace', 'arc'); ?></option>
                                <option><?php echo __('Spiritual BDSM', 'arc'); ?></option>
                                <option><?php echo __('Sprain', 'arc'); ?></option>
                                <option><?php echo __('Spreader Bar', 'arc'); ?></option>
                                <option><?php echo __('Staple', 'arc'); ?></option>
                                <option><?php echo __('Stethoscope', 'arc'); ?></option>
                                <option><?php echo __('Stomach Sitting', 'arc'); ?></option>
                                <option><?php echo __('Strap On', 'arc'); ?></option>
                                <option><?php echo __('Strapping', 'arc'); ?></option>
                                <option><?php echo __('Strong womаn', 'arc'); ?></option>
                                <option><?php echo __('Submission Hold', 'arc'); ?></option>
                                <option><?php echo __('Subspace', 'arc'); ?></option>
                                <option><?php echo __('Super Villain', 'arc'); ?></option>
                                <option><?php echo __('Suspension Bondage', 'arc'); ?></option>
                                <option><?php echo __('Sweat', 'arc'); ?></option>
                                <option><?php echo __('Sweater', 'arc'); ?></option>
                                <option><?php echo __('Take Down And Capture', 'arc'); ?></option>
                                <option><?php echo __('Teacher And Student', 'arc'); ?></option>
                                <option><?php echo __('Tearing Off Clothing', 'arc'); ?></option>
                                <option><?php echo __('Tears', 'arc'); ?></option>
                                <option><?php echo __('Teeth', 'arc'); ?></option>
                                <option><?php echo __('Tens Unit', 'arc'); ?></option>
                                <option><?php echo __('Thigh', 'arc'); ?></option>
                                <option><?php echo __('Thigh Fucking', 'arc'); ?></option>
                                <option><?php echo __('Thong', 'arc'); ?></option>
                                <option><?php echo __('Throat', 'arc'); ?></option>
                                <option><?php echo __('Throat Sitting', 'arc'); ?></option>
                                <option><?php echo __('Throatstanding', 'arc'); ?></option>
                                <option><?php echo __('Tiptoe', 'arc'); ?></option>
                                <option><?php echo __('Tit Busting', 'arc'); ?></option>
                                <option><?php echo __('Tit Dropping', 'arc'); ?></option>
                                <option><?php echo __('Tit Fucking', 'arc'); ?></option>
                                <option><?php echo __('Tit Punching', 'arc'); ?></option>
                                <option><?php echo __('Toe Pointing', 'arc'); ?></option>
                                <option><?php echo __('Toe Spreading', 'arc'); ?></option>
                                <option><?php echo __('Toe Wiggling', 'arc'); ?></option>
                                <option><?php echo __('Toejob', 'arc'); ?></option>
                                <option><?php echo __('Toenail', 'arc'); ?></option>
                                <option><?php echo __('Toenail Polish', 'arc'); ?></option>
                                <option><?php echo __('Toilet Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Total Power Exchange', 'arc'); ?></option>
                                <option><?php echo __('Towel', 'arc'); ?></option>
                                <option><?php echo __('Toy', 'arc'); ?></option>
                                <option><?php echo __('Toy Car Crush', 'arc'); ?></option>
                                <option><?php echo __('Ugly', 'arc'); ?></option>
                                <option><?php echo __('Unaware Giantess', 'arc'); ?></option>
                                <option><?php echo __('Uncut Cock', 'arc'); ?></option>
                                <option><?php echo __('Urethral Fucking', 'arc'); ?></option>
                                <option><?php echo __('Uvula', 'arc'); ?></option>
                                <option><?php echo __('Vacuum Bed', 'arc'); ?></option>
                                <option><?php echo __('Vaginal Stretching', 'arc'); ?></option>
                                <option><?php echo __('Veins And Veiny', 'arc'); ?></option>
                                <option><?php echo __('Victorian Lifestyle', 'arc'); ?></option>
                                <option><?php echo __('Victorian Pornography', 'arc'); ?></option>
                                <option><?php echo __('Victory Pose', 'arc'); ?></option>
                                <option><?php echo __('Vintage Porn', 'arc'); ?></option>
                                <option><?php echo __('Vinyl', 'arc'); ?></option>
                                <option><?php echo __('Violence', 'arc'); ?></option>
                                <option><?php echo __('Voice Play', 'arc'); ?></option>
                                <option><?php echo __('Vore', 'arc'); ?></option>
                                <option><?php echo __('Wartenberg Pinwheel', 'arc'); ?></option>
                                <option><?php echo __('Wax', 'arc'); ?></option>
                                <option><?php echo __('Wear', 'arc'); ?></option>
                                <option><?php echo __('Weight Humiliation', 'arc'); ?></option>
                                <option><?php echo __('Weightlifting Female', 'arc'); ?></option>
                                <option><?php echo __('Weightlifting Mixed', 'arc'); ?></option>
                                <option><?php echo __('Wheelchair', 'arc'); ?></option>
                                <option><?php echo __('Whip', 'arc'); ?></option>
                                <option><?php echo __('Wide Tight Belt', 'arc'); ?></option>
                                <option><?php echo __('Wolfplay', 'arc'); ?></option>
                                <option><?php echo __('Workout Clothes', 'arc'); ?></option>
                                <option><?php echo __('Wrist Watch', 'arc'); ?></option>
                                <option><?php echo __('Wristjob', 'arc'); ?></option>
                                <option><?php echo __('Writing Erotica', 'arc'); ?></option>
                                <option><?php echo __('Zentai', 'arc'); ?></option>
                                <option><?php echo __('Zit Popping', 'arc'); ?></option>
                                <option><?php echo __('Zit Squeezing', 'arc'); ?></option>
                                <option><?php echo __('Underwear', 'arc'); ?></option>
                            </select>
                        </div>
                        <div class="form-email col-1-form">
	                        <?php $show_email = get_user_meta($current_user->ID, 'show_email', true);?>
                            <input style="width: auto; display: inline" name="show_email" type="checkbox" id="show_email" <?php if($show_email == 'on') echo ' value="on" checked="checked"';?>  />
                            <label style="display: inline-block" for="show_email"><?php echo __('Show email in public profile', 'arc');?></label>
                        </div>
                        <div class="form-email col-3-form">
                            <label for="phone"><?php echo esc_html__('Phone number', 'arc'); ?></label>
                            <input class="text-input" name="phone" type="tel" id="phone" value="<?php the_author_meta( 'phone', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-email col-3-form">
                            <label for="email"><?php echo esc_html__('Email', 'arc'); ?> <span class="required">*</span></label>
                            <input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID )?>" placeholder="<?php the_author_meta( 'user_email', $current_user->ID )?>"/>
                        </div>
                        <div class="form-url col-3-form">
                            <label for="url"><?php echo esc_html__('Website', 'arc'); ?></label>
                            <input class="text-input" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-password col-2-form">
                            <label for="pass1"><?php echo esc_html__('Password', 'arc'); ?> <span class="required">*</span></label>
                            <input class="text-input" name="pass1" type="password" id="pass1" />
                        </div>
                        <div class="form-password col-2-form">
                            <label for="pass2"><?php echo esc_html__('Repeat Password', 'arc'); ?> <span class="required">*</span></label>
                            <input class="text-input" name="pass2" type="password" id="pass2" />
                        </div>
                        <div class="form-textarea" style="width: 98%;">
                            <label for="description"><?php echo esc_html__('About me', 'arc') ?></label>
                            <textarea name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend><strong><?php echo esc_html__( 'What I look like:', 'arc' ); ?></strong></legend>
                        <div class="form-password col-1-form">
                            <label for="ethnicity"><?php echo esc_html__('Ethnicity', 'arc'); ?> </label>
                            <select name="ethnicity" id="ethnicity"><br/>
                                <option value="0"><?php echo __('Choose ethnicity', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Asian', 'arc')); ?>><?php echo __('Asian', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Ebony', 'arc')); ?>><?php echo __('Ebony', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Indian', 'arc')); ?>><?php echo __('Indian', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Latino', 'arc')); ?>><?php echo __('Latino', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Middle Eastern', 'arc')); ?>><?php echo __('Middle Eastern', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Mixed', 'arc')); ?>><?php echo __('Mixed', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('White', 'arc')); ?>><?php echo __('White', 'arc'); ?></option>
                            </select>
                        </div>
                        <div class="form-password col-2-form">
                            <label for="hair_style"><?php echo esc_html__('Hair style', 'arc'); ?></label>
                            <select name="hair_style" id="hair_style"><br/>
                                <option value="0"><?php echo __('Choose hail style', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Bald', 'arc')); ?>><?php echo __('Bald', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Receding', 'arc')); ?>><?php echo __('Receding', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Very short', 'arc')); ?>><?php echo __('Very short', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Short', 'arc')); ?>><?php echo __('Short', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Medium', 'arc')); ?>><?php echo __('Medium', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Long', 'arc')); ?>><?php echo __('Long', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Very long', 'arc')); ?>><?php echo __('Very long', 'arc'); ?></option>
                            </select>
                        </div>
                        <div class="form-password col-2-form">
                            <label for="hair_color"><?php echo esc_html__('Hair color', 'arc'); ?> </label>
                            <select name="hair_color" id="hair_color"><br/>
                                <option value="0"><?php echo __('Choose hair color', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_color', true), __('Blonde', 'arc')); ?>><?php echo __('Blonde', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_color', true), __('Brown', 'arc')); ?>><?php echo __('Brown', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_color', true), __('Red', 'arc')); ?>><?php echo __('Red', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_color', true), __('Black', 'arc')); ?>><?php echo __('Black', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_color', true), __('Hairless', 'arc')); ?>><?php echo __('Hairless', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'hair_color', true), __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
                            </select>
                        </div>
                        <div class="form-password col-2-form">
                            <label for="height"><?php echo esc_html__('Height, sm', 'arc'); ?></label>
                            <input class="text-input" name="height" type="text" id="height" value="<?php the_author_meta( 'height', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-password col-2-form">
                            <label for="weight"><?php echo esc_html__('Weight, kg', 'arc'); ?> </label>
                            <input class="text-input" name="weight" type="text" id="weight" value="<?php the_author_meta( 'weight', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-password col-2-form">
                            <label for="tattoo"><?php echo esc_html__('Tattoo', 'arc'); ?></label>
                            <select name="tattoo" id="tattoo"><br/>
                                <option value="0"><?php echo __('Do you have a tattoo', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'tattoo', true), __('Yes', 'arc')); ?>><?php echo __('Yes', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'tattoo', true), __('No', 'arc')); ?>><?php echo __('No', 'arc'); ?></option>
                            </select>
                        </div>
                        <div class="form-password col-2-form">
                            <label for="piercing"><?php echo esc_html__('Piercing', 'arc'); ?> </label>
                            <select name="piercing" id="piercing"><br/>
                                <option value="0"><?php echo __('Do you have a piercing', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'piercing', true), __('Yes', 'arc')); ?>><?php echo __('Yes', 'arc'); ?></option>
                                <option <?php selected(get_user_meta($current_user->ID,'piercing', true), __('No', 'arc')); ?>><?php echo __('No', 'arc'); ?></option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset">
                        <legend><strong><?php echo esc_html__( 'Social profiles', 'arc' ); ?></strong></legend>
                        <div class="form-password col-1-form">
                            <label for="facebook"><?php echo esc_html__('Facebook', 'arc'); ?> </label>
                            <input placeholder="" class="text-input" name="facebook" type="text" id="facebook" value="<?php the_author_meta( 'facebook', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-password col-1-form">
                            <label for="instagram"><?php echo esc_html__('Instagram', 'arc'); ?> </label>
                            <input class="text-input" name="instagram" type="text" id="instagram" value="<?php the_author_meta( 'instagram', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-password col-1-form">
                            <label for="twitter"><?php echo esc_html__('Twitter', 'arc'); ?> </label>
                            <input class="text-input" name="twitter" type="text" id="twitter" value="<?php the_author_meta( 'twitter', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-password col-1-form">
                            <label for="snapchat"><?php echo esc_html__('Snapchat', 'arc'); ?> </label>
                            <input class="text-input" name="snapchat" type="text" id="snapchat" value="<?php the_author_meta( 'snapchat', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-password col-1-form">
                            <label for="reddit"><?php echo esc_html__('Reddit', 'arc'); ?> </label>
                            <input class="text-input" name="reddit" type="text" id="reddit" value="<?php the_author_meta( 'reddit', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-password col-1-form">
                            <label for="clips4sale"><?php echo esc_html__('Clips4sale.com', 'arc'); ?> </label>
                            <input class="text-input" name="clips4sale" type="text" id="clips4sale" value="<?php the_author_meta( 'clips4sale', $current_user->ID ); ?>" />
                        </div>
                        <div class="form-password col-1-form">
                            <label for="manyvids"><?php echo esc_html__('Manyvids.com', 'arc'); ?> </label>
                            <input class="text-input" name="manyvids" type="text" id="manyvids" value="<?php the_author_meta( 'manyvids', $current_user->ID ); ?>" />
                        </div>
                    </fieldset>
					<?php
					//action hook for plugin and extra fields
					do_action('edit_user_profile', $current_user);
					?>
					<div class="form-submit" style="display: flex;justify-content: space-between;">
						<?php echo $referer; ?>
						<?php echo apply_filters('update_button', '<input name="updateuser" type="submit" id="updateuser" class="margin-top-1 margin-bottom-1 submit button" value="' . __('Update your profile', 'arc') . '" />', 'profile' ); ?>
						<?php wp_nonce_field( 'update-user_'. $current_user->ID ) ?>
						<input name="action" type="hidden" id="action" value="update-user" />
                        <p id="del_request" style="padding-top: 1em; margin-left: 10px; margin-right: 10px;"></p>
                        <?php if($current_user->ID !== 1):?>
                        <input style="max-width: 170px" class="margin-top-1 margin-bottom-1 button" type="button" id="delete_account" name="delete_account" data-user-id="<?=$current_user->ID?>" value="<?=__('Delete account', 'arc');?>"/>
                        <?php endif;?>
					</div>
				</form>
			    <?php else : ?>
				<div class="alert"><?php __('You must be logged in. Please <a href="' . wp_login_url() .'">Login</a>' . wp_register(' or ', '') . ' a new account.', 'arc'); ?></div>
			    <?php endif; ?>
                </div>
            </div>
            <?php endif;?>
		</main><!-- #main -->
        <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            /*var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';*/
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
        </script>
	</div><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-profile-page' ) == 'on') {
	get_sidebar();
}
get_footer();