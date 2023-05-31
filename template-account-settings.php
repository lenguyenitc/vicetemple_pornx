<?php
/**
 * Template Name: Account Settings
 **/
global $current_user, $wp_roles;
wp_get_current_user();
$error = array();
$referer = '';
if(is_user_logged_in() && !empty($_GET['send_key']) && base64_decode($_GET['send_key']) == get_current_user_id() && $_GET['confirm_changing'] == 'yes') {
    wp_update_user(
		['ID' => get_current_user_id(),
		 'user_email' => get_user_meta(get_current_user_id(),'temp_email_addr',true)]
	);
	delete_user_meta(get_current_user_id(), 'temp_email_addr');
	wp_redirect( get_permalink().'?updated=true&confirmed=true' ); exit;
}
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
	else delete_user_meta( $current_user->ID, 'country');

	if ( !empty( $_POST['city'] ) )
		update_user_meta( $current_user->ID, 'city', esc_attr( $_POST['city'] ) );
	else delete_user_meta( $current_user->ID, 'city');

	if ( !empty( $_POST['i_am'] ) )
		update_user_meta( $current_user->ID, 'i_am', esc_attr( $_POST['i_am'] ) );
	if ( !empty( $_POST['orientation'] ) )
		update_user_meta( $current_user->ID, 'orientation', esc_attr( $_POST['orientation'] ) );

	if ( !empty( $_POST['relation'] ) )
		update_user_meta( $current_user->ID, 'relation', esc_attr( $_POST['relation'] ) );

	if ( !empty( $_POST['birthday'] ) )
		update_user_meta( $current_user->ID, 'birthday', esc_attr( $_POST['birthday'] ) );

	if ( !empty( $_POST['languages'] ) )
		update_user_meta( $current_user->ID, 'languages', esc_attr( $_POST['languages'] ) );
	else delete_user_meta( $current_user->ID, 'languages');

	if ( !empty( $_POST['fetishes'] ) )
		update_user_meta( $current_user->ID, 'fetishes', esc_attr( $_POST['fetishes'] ) );
	else delete_user_meta( $current_user->ID, 'fetishes');

	if ( !empty( $_POST['phone'] ) )
		update_user_meta( $current_user->ID, 'phone', esc_attr( $_POST['phone'] ) );
	else delete_user_meta( $current_user->ID, 'phone');

	if ( !empty( $_POST['ethnicity'] ) )
		update_user_meta( $current_user->ID, 'ethnicity', esc_attr( $_POST['ethnicity'] ) );

	if ( !empty( $_POST['eye_color'] ) )
		update_user_meta( $current_user->ID, 'eye_color', esc_attr( $_POST['eye_color'] ) );

	if ( !empty( $_POST['hair_style'] ) )
		update_user_meta( $current_user->ID, 'hair_style', esc_attr( $_POST['hair_style'] ) );

	if ( !empty( $_POST['hair_color'] ) )
		update_user_meta( $current_user->ID, 'hair_color', esc_attr( $_POST['hair_color'] ) );

	if ( !empty( $_POST['height'] ) )
		update_user_meta( $current_user->ID, 'height', esc_attr( $_POST['height'] ) );
	else delete_user_meta( $current_user->ID, 'height');

	if ( !empty( $_POST['weight'] ) )
		update_user_meta( $current_user->ID, 'weight', esc_attr( $_POST['weight'] ) );
	else delete_user_meta( $current_user->ID, 'weight');

	if ( !empty( $_POST['tattoo'] ) )
		update_user_meta( $current_user->ID, 'tattoo', esc_attr( $_POST['tattoo'] ) );
	if ( !empty( $_POST['piercing'] ) )
		update_user_meta( $current_user->ID, 'piercing', esc_attr( $_POST['piercing'] ) );

	if ( !empty( $_POST['facebook'] ) )
	    if(parse_url($_POST['facebook'], PHP_URL_SCHEME) === null) {
		    update_user_meta( $current_user->ID, 'facebook', 'https://' . esc_attr( $_POST['facebook'] ) );
        } else {
		    update_user_meta( $current_user->ID, 'facebook', esc_attr( $_POST['facebook'] ) );
        }
	else delete_user_meta( $current_user->ID, 'facebook');

	if ( !empty( $_POST['instagram'] ) )
		if(parse_url($_POST['instagram'], PHP_URL_SCHEME) === null) {
			update_user_meta( $current_user->ID, 'instagram', 'https://' .esc_attr( $_POST['instagram'] ) );
		} else {
			update_user_meta( $current_user->ID, 'instagram', esc_attr( $_POST['instagram'] ) );
        }
	else delete_user_meta( $current_user->ID, 'instagram');

	if ( !empty( $_POST['twitter'] ) )
		if(parse_url($_POST['twitter'], PHP_URL_SCHEME) === null) {
			update_user_meta( $current_user->ID, 'twitter', 'https://' .esc_attr( $_POST['twitter'] ) );
		} else {
			update_user_meta( $current_user->ID, 'twitter', esc_attr( $_POST['twitter'] ) );
		}
	else delete_user_meta( $current_user->ID, 'twitter');

	if ( !empty( $_POST['reddit'] ) )
		if(parse_url($_POST['reddit'], PHP_URL_SCHEME) === null) {
			update_user_meta( $current_user->ID, 'reddit', 'https://' .esc_attr( $_POST['reddit'] ) );
		} else {
			update_user_meta( $current_user->ID, 'reddit', esc_attr( $_POST['reddit'] ) );
		}
	else delete_user_meta( $current_user->ID, 'reddit');

	if ( !empty( $_POST['snapchat'] ) )
		if(parse_url($_POST['snapchat'], PHP_URL_SCHEME) === null) {
			update_user_meta( $current_user->ID, 'snapchat', 'https://' .esc_attr( $_POST['snapchat'] ) );
		} else {
			update_user_meta( $current_user->ID, 'snapchat', esc_attr( $_POST['snapchat'] ) );
		}
	else delete_user_meta( $current_user->ID, 'snapchat');

	if ( !empty( $_POST['manyvids'] ) )
		if(parse_url($_POST['manyvids'], PHP_URL_SCHEME) === null) {
			update_user_meta( $current_user->ID, 'manyvids', 'https://' .esc_attr( $_POST['manyvids'] ) );
		} else {
			update_user_meta( $current_user->ID, 'manyvids', esc_attr( $_POST['manyvids'] ) );
		}
	else delete_user_meta( $current_user->ID, 'manyvids');

	if ( !empty( $_POST['onlyfans'] ) )
		if(parse_url($_POST['onlyfans'], PHP_URL_SCHEME) === null) {
			update_user_meta( $current_user->ID, 'onlyfans', 'https://' .esc_attr( $_POST['onlyfans'] ) );
		} else {
			update_user_meta( $current_user->ID, 'onlyfans', esc_attr( $_POST['onlyfans'] ) );
		}
	else delete_user_meta( $current_user->ID, 'onlyfans');

	if ( !empty( $_POST['url'] ) )
		wp_update_user( array ('ID' => $current_user->ID, 'user_url' => esc_attr( $_POST['url'] )));
	else delete_user_meta( $current_user->ID, 'user_url');

	require_once ABSPATH . WPINC .'/registration.php';
	if (!empty($_POST['email'])){
		if (!is_email(esc_attr( $_POST['email'] )))
			$error[] = esc_html__('The Email you entered is not valid. Please try again.', 'arc');
		/**/
		else{
			if(esc_attr( $_POST['email']) !== get_userdata(get_current_user_id())->user_email) {
                if(email_exists(esc_attr( $_POST['email'] ))) {
                    $error[] = esc_html__('This email is already used by another user. Try a different one.', 'arc');
                }
				if ( count($error) == 0 ) {
					/**отправка письма*/
					update_user_meta( $current_user->ID, 'temp_email_addr', esc_attr( $_POST['email']));
					confirm_changing_the_email(get_current_user_id(), esc_attr( $_POST['email'] ));
					do_action('edit_user_profile_update', $current_user->ID);
					wp_redirect( get_permalink().'?updated=true&confirm=email' ); exit;
				}

            }
		}
	}

	if ( !empty( $_POST['nickname'] ) )
		update_user_meta( $current_user->ID, 'nickname', esc_attr( $_POST['nickname'] ) );
	else delete_user_meta( $current_user->ID, 'nickname');

	if ( !empty( $_POST['first-name'] ) )
		update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
	else delete_user_meta( $current_user->ID, 'first_name');

	if ( !empty( $_POST['last-name'] ) )
		update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );
	else delete_user_meta( $current_user->ID, 'last_name');

	if ( !empty( $_POST['display_name'] ) ){
		wp_update_user(array('ID' => $current_user->ID, 'display_name' => esc_attr( $_POST['display_name'] )));
		update_user_meta($current_user->ID, 'display_name' , esc_attr( $_POST['display_name'] ));
    }
    else delete_user_meta( $current_user->ID, 'display_name');

    if ( !empty( $_POST['description'] ) )
		update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );
	else delete_user_meta( $current_user->ID, 'description');

	if ( count($error) == 0 ) {
		//action hook for plugins and extra fields saving
		do_action('edit_user_profile_update', $current_user->ID);
		wp_redirect( get_permalink().'?updated=true' ); exit;
	}
}
get_header();
?>
	<div id="primary" class="content-area actors-list">
		<main id="main" class="site-main" role="main">
			<?php
			if(!is_user_logged_in()) :?>
                <p><?php echo 'You need to ';?>
                    <a style="cursor: pointer" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');">Login </a>
					<?php echo wp_register(" or ", "") . ' to see this page.'?>
                </p>
			<?php else :  ?>
				<div id="profile-tabs" class="tabs">
                   <!-- <div class="before_tabs_border"></div>-->
					<?php $curr = wp_get_current_user();?>
					<a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/profile/'. $curr->user_login . '/'?>'" class="tab-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.6617 12.9623L17.8287 10.4519C17.4209 9.8936 16.7643 9.56055 16.073 9.56055H15.2174C14.9774 9.56055 14.7826 9.75534 14.7826 9.99534C14.7826 10.2353 14.9774 10.4301 15.2174 10.4301H16.073C16.4878 10.4301 16.8817 10.6302 17.1261 10.9649L18.6461 13.0388H1.35913L2.87303 10.9649C3.11825 10.6293 3.51216 10.4301 3.92694 10.4301H4.78259C5.02259 10.4301 5.21739 10.2353 5.21739 9.99534C5.21739 9.75534 5.02259 9.56055 4.78259 9.56055H3.92694C3.23564 9.56055 2.5791 9.8936 2.17129 10.4519L0.381725 12.911C0.139117 13.1545 0 13.491 0 13.8336V17.8214C0 19.0206 0.975652 19.9953 2.1739 19.9953H17.8261C19.0252 19.9953 20 19.0205 20 17.8214V13.8336C20 13.491 19.8608 13.1545 19.6617 12.9623Z" fill="white"/>
                            <path d="M15.5477 6.23563L10.3303 0.148689C10.166 -0.0443546 9.83551 -0.0443546 9.67031 0.148689L4.45292 6.23563C4.3416 6.36431 4.31641 6.54606 4.3877 6.69997C4.45899 6.85389 4.61291 6.95302 4.78247 6.95302H6.08682V11.7356C6.08682 11.9756 6.28161 12.1704 6.52161 12.1704H13.4781C13.7181 12.1704 13.9129 11.9756 13.9129 11.7356V6.95302H15.2173C15.3869 6.95302 15.5416 6.85389 15.6121 6.69997C15.6833 6.54606 15.6581 6.36431 15.5477 6.23563Z" fill="white"/>
                        </svg><?php echo esc_html__('My Uploads', 'arc'); ?></a>
                    <a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/favorites/'?>'" class="tab-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.7307 4.37008C15.9025 3.48659 14.766 3 13.5304 3C12.6068 3 11.761 3.28717 11.0164 3.85348C10.6406 4.13933 10.3002 4.48906 10 4.89725C9.69995 4.48918 9.35938 4.13933 8.98352 3.85348C8.23901 3.28717 7.39319 3 6.4696 3C5.23401 3 4.09741 3.48659 3.26917 4.37008C2.45081 5.24325 2 6.43613 2 7.72914C2 9.05996 2.50427 10.2782 3.58691 11.563C4.55542 12.7123 5.94739 13.879 7.55933 15.23C8.10974 15.6914 8.73364 16.2144 9.38147 16.7714C9.55261 16.9188 9.77222 17 10 17C10.2277 17 10.4474 16.9188 10.6183 16.7717C11.2661 16.2145 11.8904 15.6913 12.441 15.2297C14.0527 13.8789 15.4447 12.7123 16.4132 11.5629C17.4958 10.2782 18 9.05996 18 7.72902C18 6.43613 17.5492 5.24325 16.7307 4.37008Z" fill="white"/>
                        </svg><?php echo esc_html__('My Favorites', 'arc'); ?></a>

                    <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/playlists/'?>'">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.6923 5.51367H2.30767C1.03315 5.51367 0 6.54687 0 7.82134V17.565C0 18.8395 1.0332 19.8726 2.30767 19.8726H17.6923C18.9668 19.8726 20 18.8394 20 17.565V7.82134C20 6.54682 18.9668 5.51367 17.6923 5.51367ZM12.9876 13.0389C12.9404 13.1335 12.8637 13.2101 12.7693 13.2573L7.87181 16.1291C7.79652 16.181 7.7068 16.2079 7.61542 16.206L7.38465 16.1291C7.23987 16.0338 7.16061 15.8655 7.1795 15.6932V9.94954C7.16061 9.77727 7.23982 9.60888 7.38465 9.51362C7.53189 9.41439 7.72457 9.41439 7.87186 9.51362L12.7693 12.3854C13.01 12.5056 13.1077 12.7982 12.9876 13.0389Z" fill="white"/>
                            <path d="M2.64173 3.97486H17.3853C17.6685 3.97486 17.8981 3.74527 17.8981 3.46204C17.8981 3.17881 17.6685 2.94922 17.3853 2.94922H2.64173C2.3585 2.94922 2.12891 3.17881 2.12891 3.46204C2.12891 3.74527 2.3585 3.97486 2.64173 3.97486Z" fill="white"/>
                            <path d="M4.82142 1.15455H15.1804C15.4637 1.15455 15.6932 0.92496 15.6932 0.641728C15.6932 0.358496 15.4637 0.128906 15.1804 0.128906H4.82142C4.53818 0.128906 4.30859 0.358496 4.30859 0.641728C4.30859 0.92496 4.53823 1.15455 4.82142 1.15455Z" fill="white"/>
                        </svg><?php echo esc_html__('My Playlists', 'arc'); ?></a>
                    <a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/watched-videos/'?>'" class="tab-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url()">
                                <path d="M1.51184 17.0547H18.4885C19.3237 17.0547 20.0004 16.3777 20.0004 15.5429V4.45715C20.0004 3.62232 19.3237 2.94531 18.4885 2.94531H1.51184C0.677007 2.94531 0 3.62232 0 4.45715V15.5429C0 16.3777 0.677007 17.0547 1.51184 17.0547ZM11.1641 15.9935H8.83556V14.5549H11.1641V15.9935ZM16.7129 4.041H19.0415V5.47955H16.7129V4.041ZM16.644 14.5549H18.9729V15.9935H16.644V14.5549ZM12.8083 4.041H15.1372V5.47955H12.8083V4.041ZM12.7398 14.5549H15.0687V15.9935H12.7398V14.5549ZM8.90449 4.041H11.233V5.47955H8.90449V4.041ZM8.25143 7.51638L11.7486 9.26513C12.5602 9.67112 12.5602 10.3293 11.7486 10.7349L8.25143 12.484C7.43982 12.8896 6.78131 12.4829 6.78131 11.5748V8.42522C6.78095 7.51747 7.43946 7.11075 8.25143 7.51638ZM5.00027 4.041H7.32916V5.47955H5.00027V4.041ZM4.9317 14.5549H7.26023V15.9935H4.9317V14.5549ZM1.09605 4.041H3.42494V5.47955H1.09605V4.041ZM1.02748 14.5549H3.35637V15.9935H1.02748V14.5549Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath >
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg><?php echo esc_html__('Watched Videos', 'arc'); ?></a>

                    <button class="tab-link active settings">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url()">
                                <path d="M1.31303 7.32766C1.41816 7.68811 1.56406 8.03568 1.74857 8.3618L1.22292 9.02476C1.05128 9.24146 1.07059 9.55041 1.26368 9.74565L2.16909 10.6511C2.36433 10.8463 2.67328 10.8634 2.88998 10.6918L3.54865 10.1704C3.88764 10.3657 4.24809 10.518 4.62355 10.6253L4.72225 11.4728C4.75443 11.7474 4.98615 11.9534 5.26077 11.9534H6.54164C6.81627 11.9534 7.04798 11.7474 7.08016 11.4728L7.17457 10.6553C7.57792 10.5502 7.96411 10.3936 8.32671 10.1898L8.96392 10.6939C9.18062 10.8656 9.48957 10.8463 9.68481 10.6532L10.5902 9.74778C10.7855 9.55254 10.8026 9.24358 10.631 9.02689L10.1354 8.39825C10.3413 8.04208 10.5023 7.66234 10.6095 7.26542L11.3733 7.17746C11.648 7.14527 11.8539 6.91356 11.8539 6.63893V5.35806C11.8539 5.08344 11.648 4.85172 11.3733 4.81954L10.6203 4.73157C10.5173 4.33895 10.3628 3.96348 10.1654 3.61162L10.6289 3.02589C10.8005 2.8092 10.7812 2.50024 10.5881 2.305L9.68484 1.40174C9.48959 1.2065 9.18064 1.18934 8.96394 1.36098L8.39538 1.81153C8.02636 1.59484 7.63156 1.42963 7.2175 1.31807L7.13168 0.582157C7.09949 0.307532 6.86778 0.101562 6.59315 0.101562H5.31228C5.03766 0.101562 4.80594 0.307532 4.77376 0.582157L4.68794 1.31807C4.26313 1.43178 3.85763 1.60342 3.48002 1.8287L2.89 1.36098C2.67331 1.18934 2.36435 1.20865 2.16911 1.40174L1.26371 2.30715C1.06846 2.50239 1.0513 2.81134 1.22294 3.02804L1.71641 3.65238C1.51902 4.00854 1.36884 4.38829 1.27014 4.78307L0.480594 4.87318C0.205969 4.90536 0 5.13708 0 5.4117V6.69257C0 6.9672 0.205969 7.19891 0.480594 7.23109L1.31303 7.32766ZM5.95377 3.86266C7.12093 3.86266 8.07139 4.81313 8.07139 5.98028C8.07139 7.14744 7.12093 8.0979 5.95377 8.0979C4.78663 8.0979 3.83615 7.14744 3.83615 5.98028C3.83615 4.81313 4.78661 3.86266 5.95377 3.86266Z" fill="white"/>
                                <path d="M18.6167 7.64305L17.9408 7.07234C17.7328 6.89641 17.4259 6.90499 17.2286 7.09165L16.8552 7.44137C16.5399 7.28904 16.2052 7.18176 15.8597 7.11954L15.7546 6.60462C15.701 6.33858 15.4542 6.15407 15.1839 6.17552L14.3021 6.25061C14.0317 6.27422 13.8193 6.4952 13.8107 6.76768L13.7936 7.29118C13.4546 7.41348 13.1349 7.58083 12.8431 7.79109L12.3969 7.49501C12.1694 7.34482 11.8669 7.38773 11.691 7.59585L11.1203 8.27597C10.9443 8.48408 10.9529 8.79089 11.1395 8.98828L11.53 9.40448C11.3949 9.70915 11.2983 10.0288 11.2425 10.3571L10.6847 10.4708C10.4187 10.5244 10.2341 10.7712 10.2556 11.0415L10.3307 11.9233C10.3543 12.1937 10.5753 12.4061 10.8478 12.4146L11.4507 12.4339C11.5601 12.7214 11.7039 12.9939 11.8776 13.2492L11.5408 13.7577C11.3906 13.9851 11.4335 14.2877 11.6416 14.4636L12.3174 15.0343C12.5256 15.2102 12.8324 15.2016 13.0298 15.015L13.4718 14.6009C13.7614 14.7361 14.0661 14.8369 14.3793 14.897L14.5016 15.502C14.5553 15.768 14.802 15.9526 15.0723 15.9311L15.9541 15.856C16.2245 15.8324 16.4369 15.6114 16.4455 15.3389L16.4648 14.7468C16.7866 14.6331 17.0912 14.4786 17.3723 14.2877L17.8594 14.6095C18.0868 14.7597 18.3893 14.7168 18.5652 14.5086L19.1359 13.8328C19.3119 13.6247 19.3033 13.3179 19.1166 13.1205L18.724 12.7043C18.8678 12.3996 18.9729 12.0778 19.0329 11.7474L19.5693 11.638C19.8354 11.5843 20.0199 11.3376 19.9984 11.0672L19.9233 10.1854C19.8997 9.91509 19.6787 9.70269 19.4063 9.69411L18.8677 9.67694C18.7561 9.3637 18.606 9.06764 18.4193 8.79299L18.7132 8.35102C18.8677 8.12364 18.8248 7.81898 18.6167 7.64305ZM15.2933 12.7407C14.3407 12.8223 13.4996 12.1121 13.4202 11.1595C13.3387 10.2069 14.0489 9.36587 15.0015 9.28648C15.9541 9.20495 16.7952 9.91514 16.8745 10.8677C16.9561 11.8203 16.2459 12.6614 15.2933 12.7407Z" fill="white"/>
                                <path d="M4.39921 15.1144C4.12887 15.1423 3.92076 15.3697 3.91861 15.6422L3.91218 16.185C3.90789 16.4575 4.10956 16.6892 4.3799 16.7235L4.77896 16.775C4.84547 17.0174 4.93988 17.2492 5.06217 17.468L4.80471 17.7855C4.63307 17.9979 4.64594 18.3026 4.83689 18.4978L5.21665 18.8862C5.4076 19.0814 5.71226 19.1029 5.92896 18.9355L6.24862 18.6888C6.4739 18.8218 6.71207 18.927 6.96093 18.9999L7.00384 19.4118C7.03173 19.6822 7.25915 19.8903 7.53163 19.8924L8.07447 19.8989C8.34693 19.9032 8.57866 19.7015 8.61299 19.4311L8.66234 19.0407C8.93269 18.9741 9.19016 18.8733 9.43472 18.7403L9.73509 18.9827C9.9475 19.1544 10.2522 19.1415 10.4474 18.9505L10.8358 18.5708C11.031 18.3799 11.0525 18.0752 10.8851 17.8585L10.6555 17.5602C10.7971 17.3242 10.9066 17.0732 10.9817 16.8093L11.3378 16.7728C11.6081 16.7449 11.8162 16.5175 11.8184 16.245L11.8248 15.7022C11.8291 15.4298 11.6275 15.198 11.3571 15.1637L11.0095 15.1186C10.943 14.8569 10.8443 14.6037 10.7156 14.3677L10.9323 14.1017C11.104 13.8893 11.0911 13.5846 10.9001 13.3894L10.5204 13.001C10.3294 12.8058 10.0247 12.7843 9.80806 12.9517L9.54843 13.1512C9.30387 13.0032 9.04209 12.8895 8.76749 12.8122L8.73314 12.4754C8.70525 12.205 8.47785 11.9969 8.20534 11.9948L7.66253 11.9883C7.39005 11.9841 7.15833 12.1857 7.12398 12.4561L7.08107 12.7908C6.79789 12.8637 6.52541 12.9753 6.27224 13.1212L6.00405 12.9023C5.79164 12.7307 5.48696 12.7436 5.29172 12.9345L4.90124 13.3164C4.70599 13.5074 4.68454 13.812 4.85189 14.0287L5.08146 14.3248C4.94844 14.5608 4.84331 14.8118 4.77465 15.0757L4.39921 15.1144ZM7.90283 14.5007C8.68165 14.5093 9.30597 15.1508 9.29741 15.9297C9.28883 16.7085 8.6473 17.3328 7.86848 17.3242C7.08966 17.3157 6.46533 16.6741 6.4739 15.8953C6.4825 15.1165 7.12401 14.4922 7.90283 14.5007Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath >
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg><?php echo esc_html__('Account Settings', 'arc'); ?></button>
				</div>
				<div id="settings" style="display: block">
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
                            /*background: rgba(15, 23, 37, 0.9);*/
                            backdrop-filter: blur(5px);
                        }

                        #modal-overlay-del2 {
                            z-index: -111111;
                            position: fixed;
                            top:0;
                            left:0;
                            width: 100%;
                            height: 100%;
                            /*background: rgba(15, 23, 37, 0.9);*/
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
                        #modalDelMsg2 {
                            display: none;
                        }

                        #modalDelMsg,
                        #modalDelMsg2{
                            background: <?=get_theme_mod('secondary_color_setting')?>;
                            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
                            border-radius: 10px;
                            padding: 40px 85px;
                            border: none !important;
                        }

                        #modalDelMsg div.modal-guts-del div,
                        #modalDelMsg2 div.modal-guts-del div{
                            font-family: 'Roboto',sans-serif;
                            font-style: normal;
                            font-weight: normal;
                            text-align: center;
                        }

                        #modalDelMsg div.modal-guts-del div h2,
                        #modalDelMsg2 div.modal-guts-del div h2{
                            font-family: 'Roboto',sans-serif;
                            font-style: normal;
                            font-weight: normal;
                            font-size: 36px;
                            line-height: 42px;
                            text-align: center;
                            color: <?=get_theme_mod('text_site_color')?>;
                            margin-top: 15px;
                        }

                        #modalDelMsg div.modal-guts-del div span.confirm,
                        #modalDelMsg2 div.modal-guts-del div span.confirm{
                            font-family: 'Roboto',sans-serif;
                            font-style: normal;
                            font-weight: normal;
                            font-size: 18px;
                            line-height: 21px;
                            text-align: center;
                            color: <?=get_theme_mod('text_site_color')?>;
                            margin: 0 auto;
                        }

                        #modalDelMsg #close-button-del svg,
                        #modalDelMsg2 #close-button-del2 svg{
                            position: absolute;
                            margin-top: -30px;
                            margin-left: 20px;
                        }


                        #modalDelMsg2 #close-button-del2 svg {
                            margin-top: 0px!important;
                            margin-left: 0px!important;
                        }

                        #close-button-del2 {
                            border: none !important;
                            background: transparent !important;
                            box-shadow: none !important;
                            top: -25px !important;
                            right: -25px !important;
                            position: absolute !important;
                            margin-top: 0px!important;
                            margin-left: 0px!important;
                        }
                    </style>
					<?php if ( isset($_GET['updated']) && $_GET['updated'] == true ) : ?>
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
                                    <!--<h2></h2>-->
                                    <?php if($_GET['confirmed'] == true):?>
                                        <span class="confirm">Your email has been updated.</span>
                                    <?php elseif($_GET['confirm'] == 'email'):?>
                                        <span class="confirm">We sent you an email to confirm your new email address.</span>
                                    <?php else:?>
                                        <span class="confirm">Your profile has been updated.</span>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-overlay-del" id="modal-overlay-del"></div>
                        <!--- [end] modal for delete btn---->
					<?php endif; ?>
                    <div class="modalDelMsg alert alert-success" id="modalDelMsg2">
                        <button class="class-button" id="close-button-del2" onclick="document.getElementById('modalDelMsg2').style.display='none';
                            document.getElementById('modal-overlay-del2').style.zIndex='-1000';">
                            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                                <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                            </svg>
                        </button>
                        <div class="modal-guts-del">
                            <div>
                                <h2>We have sent you an email.</h2>
                                <span class="confirm">Your account will be permanently deleted once you have confirmed it.</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-overlay-del" id="modal-overlay-del2"></div>
					<div class="accordeon">
						<?php
						if(isset($_GET['add-to-cart']) && !empty($_GET['add-to-cart']) || $_GET['upgrade'] == 'plan'){
							$active_tab_my_plan = 'block';
							$other_tab = 'none';
							$button_my_plan_active = 'active';
							$button_edit_active = '';
						} else {
							$active_tab_my_plan = 'none';
							$other_tab = 'block';
							$button_my_plan_active = '';
							$button_edit_active = 'active';
						}
						?>
                        <div id="account-tabs" class="tabs">
                            <div id="desktop_account_select_tabs">
                                <button style="cursor: pointer;" class="tab-link <?=$button_edit_active?> edit_profile" data-tab-id="edit_profile">
                                    <?php echo esc_html__('Edit profile', 'arc'); ?>
                                </button>
                                <button style="cursor: pointer;" class="tab-link my_subscription" data-tab-id="my_subscriptions">
                                    <?php echo esc_html__('My subscriptions', 'arc'); ?>
                                </button>
                                <button style="cursor: pointer;" class="tab-link <?=$button_my_plan_active?> my_plan" data-tab-id="my_plan">
                                    <?php echo esc_html__('My plan', 'arc'); ?>
                                </button>
                                <button style="cursor: pointer;" class="tab-link my_payments" data-tab-id="my_payments">
                                    <?php echo esc_html__('My payments', 'arc'); ?>
                                </button>
                                <button style="cursor: pointer;" class="tab-link email_preferences" data-tab-id="email_preferences">
                                    <?php echo esc_html__('Email preferences', 'arc'); ?>
                                </button>
                            </div>
                            <script>
                                jQuery(document).ready(function($) {
                                    var active_select = $('select#account_select_tabs option.tab-link.active').attr('data-tab-id');
                                    $('select#account_select_tabs option[data-tab-id='+active_select+']').prop('selected',true);
                                    $('select#account_select_tabs').on('change', function (){
                                       var tab = $('select#account_select_tabs option.tab-link:selected').attr('data-tab-id');
                                       $('button[data-tab-id='+tab+']').trigger('click');
                                   });

                                    $(document).on('click', 'ul#account_select_tabs-menu li div', function (){
                                        $('select#account_select_tabs option').removeClass('active');
                                        var div_name = $(this).text();
                                        $('select#account_select_tabs option[data-tab-id='+div_name.replace(' ', '_').toLowerCase()+']').prop('selected',true).addClass('active');
                                        $('button[data-tab-id='+div_name.replace(' ', '_').toLowerCase()+']').trigger('click');
                                    });
                                });
                            </script>
                            <div id="mobile_account_select_tabs" style="display: none">
                                <select id="account_select_tabs">
                                    <option class="tab-link <?=$button_edit_active?> edit_profile" data-tab-id="edit_profile"><?php echo esc_html__('Edit profile', 'arc'); ?></option>
                                    <option class="tab-link my_subscription" data-tab-id="my_subscriptions"><?php echo esc_html__('My subscriptions', 'arc'); ?></option>
                                    <option class="tab-link <?=$button_my_plan_active?> my_plan" data-tab-id="my_plan"><?php echo esc_html__('My plan', 'arc'); ?></option>
                                    <option class="tab-link my_payments" data-tab-id="my_payments"><?php echo esc_html__('My payments', 'arc'); ?></option>
                                    <option class="tab-link email_preferences" data-tab-id="email_preferences"><?php echo esc_html__('Email preferences', 'arc'); ?></option>
                                </select>
                            </div>
                        </div>
                        <!--edit profile--->
                        <div id="account_tab_content">
                            <!--edit profile--->
                            <div class="account-list" id="edit_profile" style="display:<?=$other_tab?>">
                                <section class="tab-content">
		                            <?php if (is_user_logged_in()) : ?>
			                            <?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
                                        <form method="post" id="edit-user" action="<?php the_permalink(); ?>" enctype="multipart/form-data" name="front_end_upload">
                                            <p class="legend"><?php echo esc_html__( 'Profile picture', 'arc' ); ?></p>
                                            <fieldset class="fieldset">
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
                                                <div class="box1">
                                                    <div id="video_file_upload2">
                                                        <div id="btn2">+ Select a file</div>
                                                        <div id="upload_text2">
                                                            <p>Upload profile picture</p>
                                                            <span>.jpg .jpeg .png .gif</span>
                                                        </div>
                                                    </div>
                                                    <input style="display:none" type="file" id="file-input-profile" accept="image/jpeg,image/png,image/gif">
                                                </div>
                                                <!-- leftbox -->
                                                <div class="box-21 crop-profile" style="">
                                                    <div class="result_profile"></div>
                                                </div>
                                                <br>
                                                <!--rightbox-->
                                                <div class="box-21 img-result_profile hide">
                                                    <!-- result of crop -->
						                            <?php if(get_user_meta($current_user->ID, 'personal_foto', true) !== false) :?>
                                                        <div id="image" style="display: flex;  width: 100%; height: 150px">
                                                            <img style="max-height: 150px;" class="cropped_profile" alt="" src="<?php echo get_user_meta($current_user->ID, 'personal_foto', true);?>" />
                                                        </div>
						                            <?php else:?>
                                                        <div id="image" style="display: none; width: 100%">
                                                            <img class="cropped_profile" alt="" src="" />
                                                        </div>
						                            <?php endif;?>
                                                </div>
                                                <!-- input file -->
                                                <div class="box1">
                                                    <div class="options_profile hide">
                                                    </div>
                                                    <br>
                                                    <!-- save btn -->
                                                    <button class="btn save-profile hide">Crop and Save</button>
                                                </div>
                                            </fieldset>

                                            <p class="legend"><?php echo esc_html__( 'Profile background', 'arc' ); ?></p>
                                            <fieldset class="fieldset">
                                                <!----test---->
                                                <div class="box">
                                                    <div id="video_file_upload">
                                                        <div id="btn">+ Select a file</div>
                                                        <div id="upload_text">
                                                            <p>Upload background picture</p>
                                                            <span>.jpg .jpeg .png .gif</span>
                                                        </div>
                                                    </div>
                                                    <input style="display:none" type="file" id="file-input-back" accept="image/jpeg,image/png,image/gif">
                                                </div>
                                                <!-- leftbox -->
                                                <div class="box-2 crop-back" style="">
                                                    <div class="result"></div>
                                                </div>
                                                <br>
                                                <!--rightbox-->
                                                <div class="box-2 img-result hide">
                                                    <!-- result of crop -->
						                            <?php if(get_user_meta($current_user->ID, 'personal_back', true) !== false) :?>
                                                        <div id="image2" style="display: flex;  width: 100%;">
                                                            <img style="max-height: 200px;" class="cropped" alt="" src="<?php echo get_user_meta($current_user->ID, 'personal_back', true);?>" />
                                                        </div>
						                            <?php else:?>
                                                        <div id="image2" style="display: none; width: 100%">
                                                            <img class="cropped" alt="" src="" />
                                                        </div>
						                            <?php endif;?>
                                                </div>
                                                <!-- input file -->
                                                <div class="box">
                                                    <div class="options hide">
                                                        <input type="hidden" class="img-w" value="1080" />
                                                        <input type="hidden" class="img-h" value="200" />
                                                    </div>
                                                    <br>
                                                    <!-- save btn -->
                                                    <button class="btn save-back hide">Crop and Save</button>
                                                </div>
                                                <!---test---->
                                            </fieldset>

                                            <fieldset class="fieldset">
                                                <div id="div_subs_views" style="display: flex; flex-wrap: wrap;justify-content: space-between">
                                                    <div style="width: 100%; max-width: 285px">
	                                                    <?php $show_subs = get_user_meta($current_user->ID, 'show_subs', true);?>
                                                        <input data-action="subs" style="width: auto; display: inline" name="show_subs" type="checkbox" id="show_subs" <?php if($show_subs == "on") echo ' value="on" checked="checked"';?>  />
                                                        <label style="display: inline-block;" for="show_subs"><?php echo __('Display Subscribers', 'arc');?></label>
                                                    </div>
	                                                <div style="width: 100%; max-width: 285px">
		                                                <?php $show_views = get_user_meta($current_user->ID, 'show_views', true);?>
                                                        <input data-action="views" style="width: auto; display: inline" name="show_views" type="checkbox" id="show_views" <?php if($show_views == "on") echo ' value="on" checked="checked"';?>  />
                                                        <label style="display: inline-block;" for="show_views"><?php echo __('Display Video views', 'arc');?></label>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <p class="legend"><?php echo esc_html__( 'Location', 'arc' ); ?></p>
                                            <fieldset class="fieldset">
                                                <div id="div_country_city" style="display: flex; flex-wrap: wrap;justify-content: space-between">
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="country">Country</label>
                                                        <input class="text-input" maxlength="32" placeholder="Country" name="country" type="text" id="country" value="<?php the_author_meta( 'country', $current_user->ID ); ?>" />
                                                    </div>
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="city">City</label>
                                                        <input class="text-input" maxlength="20" placeholder="City" name="city" type="text" id="city" value="<?php the_author_meta( 'city', $current_user->ID ); ?>" />
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <p class="legend"><?php echo esc_html__( 'Personal information', 'arc' ); ?></p>
                                            <fieldset class="fieldset">
                                                <div id="div_i_am_orientation" style="display: flex; flex-wrap: wrap; justify-content: space-between; margin-bottom: 20px;">
                                                    <div style="width: 100%; max-width: 186px">
                                                        <label for="i_am"><?php echo esc_html__('Gender ', 'arc') ?></label>
                                                        <select name="i_am" id="i_am"><br/>
                                                            <option disabled selected value="0"><?php echo __('Choose gender', 'arc'); ?></option>
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
                                                    <div style="width: 100%; max-width: 186px">
                                                        <label for="orientation"><?php echo esc_html__('Orientation ', 'arc') ?></label>
                                                        <select name="orientation" id="orientation"><br/>
                                                            <option disabled selected value="0"><?php echo __('Choose orientation', 'arc'); ?></option>
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

                                                    <div style="width: 100%; max-width: 186px">
                                                        <label for="relation"><?php echo esc_html__('Relationship status', 'arc') ?></label>
                                                        <select name="relation" id="relation"><br/>
                                                            <option disabled selected value="0"><?php echo __('Choose status', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'relation', true), __('Single', 'arc')); ?>><?php echo __('Single', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'relation', true), __('Taken', 'arc')); ?>><?php echo __('Taken', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'relation', true), __('Open', 'arc')); ?>><?php echo __('Open', 'arc'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="div_nick_name" style="display: flex; flex-wrap: wrap;justify-content:space-between">
                                                    <div style="width: 100%; max-width: 186px">
                                                        <label for="nickname">Nickname</label>
                                                        <input class="text-input" maxlength="20" placeholder="Nickname" name="nickname" type="text" id="nickname" value="<?php the_author_meta( 'nickname', $current_user->ID ); ?>" />
                                                    </div>
                                                    <div style="width: 100%; max-width: 186px">
                                                        <label for="first-name">First name</label>
                                                        <input class="text-input" maxlength="20" placeholder="First name" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
                                                    </div>
                                                    <div style="width: 100%; max-width: 186px">
                                                        <label for="last-name">Last name</label>
                                                        <input class="text-input" maxlength="20" placeholder="Last name" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
                                                    </div>
                                                </div>

                                                <div id="div_display_birthday" style="display: flex; flex-wrap: wrap; justify-content: space-between">
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="display_name"><?php echo esc_html__('Display name', 'arc') ?></label>
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
                                                        #add_payment_method #payment ul.payment_methods li,
                                                        .woocommerce-cart #payment ul.payment_methods li,
                                                        .woocommerce-checkout #payment ul.payment_methods li {
                                                            white-space: nowrap !important;
                                                        }
                                                    </style>

                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="birthday"><?php echo esc_html__('Birthday', 'arc'); ?> </label>
                                                        <div id="calendar_inside" style="margin-top: -20px;">
                                                            <i class="fa fa-calendar"></i>
                                                            <input class="text-input" type="text" id="birthday" name="birthday" value="<?php the_author_meta( 'birthday', $current_user->ID ); ?>">
                                                        </div>
                                                    </div><br>
                                                </div>

                                                <div id="div_lang_fetish" style="display: flex; flex-wrap: wrap; justify-content: space-between">
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="languages">Languages</label>
                                                        <textarea maxlength="50" style="min-height: 5em;" rows="3" name="languages" id="languages" placeholder="Languages (separated by commas)"><?=get_user_meta($current_user->ID,'languages', true)?></textarea>
                                                    </div>
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="fetishes">Fetishes</label>
                                                        <textarea maxlength="300" style="min-height: 5em;" rows="3" name="fetishes" id="fetishes" placeholder="Fetishes (separated by commas)"><?=get_user_meta($current_user->ID,'fetishes', true)?></textarea>
                                                    </div>
                                                </div>

                                                <div style="display: flex; flex-wrap: wrap;justify-content: space-between">
                                                    <div style="width: 100%; max-width: 285px">
	                                                    <?php $show_email = get_user_meta($current_user->ID, 'show_email', true);?>
                                                        <input style="width: auto; display: inline" name="show_email" type="checkbox" id="show_email" <?php if($show_email == 'on') echo ' value="on" checked="checked"';?>  />
                                                        <label style="display: inline-block" for="show_email"><?php echo __('Display email on public profile', 'arc');?></label>
                                                    </div>
                                                    <div style="width: 100%; max-width: 285px">
	                                                    <?php $show_phone = get_user_meta($current_user->ID, 'show_phone', true);?>
                                                        <input style="width: auto; display: inline" name="show_phone" type="checkbox" id="show_phone" <?php if($show_phone == 'on') echo ' value="on" checked="checked"';?>  />
                                                        <label style="display: inline-block" for="show_phone"><?php echo __('Display phone on public profile', 'arc');?></label>
                                                    </div>
                                                </div>
                                                <label for="phone">Phone number</label>
                                                <input class="text-input" maxlength="20" placeholder="Phone number" name="phone" type="tel" id="phone" value="<?php the_author_meta( 'phone', $current_user->ID ); ?>" />
                                                <label for="email">Email</label>
                                                <input class="text-input" pattern=".{1,64}@.{1,63}" maxlength="128" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID )?>" placeholder="<?php the_author_meta( 'user_email', $current_user->ID )?>"/>
                                                <label for="url">Website</label>
                                                <input class="text-input" maxlength="264" placeholder="Website" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />


                                                <div id="div_pass_pass2" style="display: flex; flex-wrap: wrap; justify-content: space-between">
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="pass1">Password</label>
                                                        <input class="text-input" placeholder="Password" name="pass1" type="password" id="pass1" />
                                                    </div>
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="pass2">Repeat password</label>
                                                        <input class="text-input" name="pass2" placeholder="Repeat password" type="password" id="pass2" />
                                                    </div>
                                                </div>
                                                <label for="description">About me</label>
                                                <textarea name="description" placeholder="Say something about yourself" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
                                            </fieldset>

                                            <p class="legend"><?php echo esc_html__( 'Appearance', 'arc' ); ?></p>
                                            <fieldset class="fieldset">
                                                <div id="div_eth_eye" style="display: flex; flex-wrap: wrap; justify-content: space-between;margin-bottom: 20px;">
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="ethnicity"><?php echo esc_html__('Ethnicity', 'arc'); ?> </label>
                                                        <select name="ethnicity" id="account_ethnicity"><br/>
                                                            <option disabled selected value="0"><?php echo __('Choose ethnicity', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Asian', 'arc')); ?>><?php echo __('Asian', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Ebony', 'arc')); ?>><?php echo __('Ebony', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Indian', 'arc')); ?>><?php echo __('Indian', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Latino', 'arc')); ?>><?php echo __('Latino', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Middle Eastern', 'arc')); ?>><?php echo __('Middle Eastern', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Mixed', 'arc')); ?>><?php echo __('Mixed', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'ethnicity', true), __('Caucasian', 'arc')); ?>><?php echo __('Caucasian', 'arc'); ?></option>
                                                        </select>
                                                    </div>

                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="eye_color"><?php echo esc_html__('Eye color', 'arc'); ?> </label>
                                                        <select name="eye_color" id="eye_color">
                                                            <option disabled selected value="0"><?php echo __('Choose eye color', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'eye_color', true), __('Black', 'arc')); ?>><?php echo __('Black', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'eye_color', true), __('Blue', 'arc')); ?>><?php echo __('Blue', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'eye_color', true), __('Brown', 'arc')); ?>><?php echo __('Brown', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'eye_color', true), __('Green', 'arc')); ?>><?php echo __('Green', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'eye_color', true), __('Gray', 'arc')); ?>><?php echo __('Gray', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'eye_color', true), __('Hazel', 'arc')); ?>><?php echo __('Hazel', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'eye_color', true), __('Multicolored', 'arc')); ?>><?php echo __('Multicolored', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'eye_color', true), __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="div_hair_style_color" style="display: flex; flex-wrap: wrap; justify-content: space-between;margin-bottom: 20px;">
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="hair_style"><?php echo esc_html__('Hair style', 'arc'); ?></label>
                                                        <select name="hair_style" id="account_hair_style">
                                                            <option disabled selected value="0"><?php echo __('Choose a hair style', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Bald', 'arc')); ?>><?php echo __('Bald', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Receding', 'arc')); ?>><?php echo __('Receding', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Very short', 'arc')); ?>><?php echo __('Very short', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Short', 'arc')); ?>><?php echo __('Short', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Medium', 'arc')); ?>><?php echo __('Medium', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Long', 'arc')); ?>><?php echo __('Long', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_style', true), __('Very long', 'arc')); ?>><?php echo __('Very long', 'arc'); ?></option>
                                                        </select>
                                                    </div>
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="hair_color"><?php echo esc_html__('Hair color', 'arc'); ?> </label>
                                                        <select name="hair_color" id="account_hair_color">
                                                            <option disabled selected value="0"><?php echo __('Choose hair color', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_color', true), __('Blonde', 'arc')); ?>><?php echo __('Blonde', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_color', true), __('Brown', 'arc')); ?>><?php echo __('Brown', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_color', true), __('Red', 'arc')); ?>><?php echo __('Red', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_color', true), __('Black', 'arc')); ?>><?php echo __('Black', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'hair_color', true), __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="div_weight_height" style="display: flex; flex-wrap: wrap;justify-content: space-between">
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="height">Height</label>
                                                        <input maxlength="3" class="text-input" placeholder="Height in cm" name="height" type="text" id="height" value="<?php the_author_meta( 'height', $current_user->ID ); ?>" />
                                                    </div>
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="weight">Weight</label>
                                                        <input maxlength="3" class="text-input" name="weight" placeholder="Weight in kg" type="text" id="weight" value="<?php the_author_meta( 'weight', $current_user->ID ); ?>" />
                                                    </div>
                                                </div>

                                                <div id="div_tattoo_piersing" style="display: flex; flex-wrap: wrap; justify-content: space-between;margin-bottom: 20px;">
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="tattoo"><?php echo esc_html__('Tattoos', 'arc'); ?></label>
                                                        <select name="tattoo" id="account_tattoo">
                                                            <option disabled selected value="0"><?php echo __('Do you have tattoos?', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'tattoo', true), __('Yes', 'arc')); ?>><?php echo __('Yes', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'tattoo', true), __('No', 'arc')); ?>><?php echo __('No', 'arc'); ?></option>
                                                        </select><br/>
                                                    </div>
                                                    <div style="width: 100%; max-width: 285px">
                                                        <label for="piercing"><?php echo esc_html__('Piercings', 'arc'); ?> </label>
                                                        <select name="piercing" id="account_piercing"><br/>
                                                            <option disabled selected value="0"><?php echo __('Do you have piercings?', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'piercing', true), __('Yes', 'arc')); ?>><?php echo __('Yes', 'arc'); ?></option>
                                                            <option <?php selected(get_user_meta($current_user->ID,'piercing', true), __('No', 'arc')); ?>><?php echo __('No', 'arc'); ?></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            <p class="legend"><?php echo esc_html__( 'Social profiles', 'arc' ); ?></p>
                                            <fieldset class="fieldset">
                                                <label for="facebook">Facebook</label>
                                                <input maxlength="264" placeholder="Facebook" class="text-input" name="facebook" type="text" id="facebook" value="<?php the_author_meta( 'facebook', $current_user->ID ); ?>" />
                                                <label for="instagram">Instagram</label>
                                                <input maxlength="264" class="text-input" placeholder="Instagram" name="instagram" type="text" id="instagram" value="<?php the_author_meta( 'instagram', $current_user->ID ); ?>" />
                                                <label for="twitter">Twitter</label>
                                                <input maxlength="264" class="text-input" name="twitter" placeholder="Twitter" type="text" id="twitter" value="<?php the_author_meta( 'twitter', $current_user->ID ); ?>" />
                                                <label for="snapchat">Snapchat</label>
                                                <input maxlength="264" class="text-input" name="snapchat" placeholder="Snapchat" type="text" id="snapchat" value="<?php the_author_meta( 'snapchat', $current_user->ID ); ?>" />
                                                <label for="reddit">Reddit</label>
                                                <input maxlength="264" class="text-input" name="reddit" placeholder="Reddit" type="text" id="reddit" value="<?php the_author_meta( 'reddit', $current_user->ID ); ?>" />
                                                <label for="manyvids">ManyVids</label>
                                                <input maxlength="264" class="text-input" placeholder="ManyVids" name="manyvids" type="text" id="manyvids" value="<?php the_author_meta( 'manyvids', $current_user->ID ); ?>" />
                                                <label for="onlyfans">OnlyFans</label>
                                                <input maxlength="264" class="text-input" placeholder="OnlyFans" name="onlyfans" type="text" id="onlyfans" value="<?php the_author_meta( 'onlyfans', $current_user->ID ); ?>" />
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
                                        <div class="alert" style="display: flex;!important;"><?php __('You must be logged in. Please <a href="' . wp_login_url() .'">Login</a>' . wp_register(' or ', '') . ' a new account.', 'arc'); ?></div>
		                            <?php endif; ?>
                                </section>
                            </div>
                            <!-- subscriptions--->
                            <div class="account-list" id="my_subscriptions" style="display:none">
                                <section class="tab-content">
		                            <?php
		                            $subscriptions = get_user_meta(get_current_user_id(), "subscribe_author");
		                            if(count($subscriptions) == 0) :?>
                                        <div class="" style="display: flex!important;">
                                            <div class="alert"><?php echo __('You are not subscribed to any user.', 'arc');?></div>
                                        </div>
		                            <?php else: ?>
                                        <div class="" style="display: flex!important;">
                                            <article style="width: 100%;">
                                                <div id="subscriptions_content" class="users_list" style="text-align: center;">
						                            <?php
						                            foreach ($subscriptions as $subscription) {?>
                                                        <div class="subscription-item item_user" data-remove-item="<?php echo $subscription?>">
                                                            <div style="display: inline-flex;align-items: center;">
                                                                <p class="user_pic" style="margin-bottom: 0">
                                                                    <a href="/public-profile/?xxx=<?php echo $subscription;?>" style="margin-top: 5px;">
                                                                        <?php
                                                                        if(get_user_meta($subscription, 'personal_foto', true) != false) :?>
                                                                            <img src="<?php echo get_user_meta($subscription,'personal_foto', true);?>" />
                                                                        <?php else:?>
                                                                            <img src="<?php echo get_template_directory_uri(). '/assets/img/picture.png'?>" />
                                                                        <?php endif;?>
                                                                    </a>
                                                                </p>
                                                                <a class="user_name" style="white-space: nowrap;
                                                                    text-overflow: ellipsis;
                                                                    overflow: hidden;" href="/public-profile/?xxx=<?=$subscription;?>">
                                                                    <?php echo get_userdata($subscription)->display_name;?></a>
                                                            </div>
                                                            <p class="unsubscribe_on_author" data-subscribe="profile" data-author="<?php echo $subscription?>" style="cursor: pointer">
		                                                        <?php echo __('Unsubscribe', 'arc');?>
                                                            </p>
                                                            <!--<a href="/public-profile/?xxx=<?/*=$subscription;*/?>">
                                                                <span>
                                                                    <svg width="4" height="17" viewBox="0 0 4 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <circle cx="2" cy="2" r="2" fill="white" fill-opacity="0.5"/>
                                                                    <circle cx="2" cy="8.5" r="2" fill="white" fill-opacity="0.5"/>
                                                                    <circle cx="2" cy="15" r="2" fill="white" fill-opacity="0.5"/>
                                                                    </svg>
                                                                </span>
                                                            </a>-->
                                                        </div>
						                            <?php } ?>
                                                </div>
                                            </article>
                                        </div>
		                            <?php endif;?>
                                </section>
                            </div>
                            <!---plan---->
                            <div class="account-list" id="my_plan" style="display:<?=$active_tab_my_plan?>;width: 100%;max-width: 620px;margin: 0 auto;">
                                <section class="tab-content">
                                    <form id="edit-user2" name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
                                        <p class="select_plan_legend legend"><?php echo esc_html__( 'Select plan', 'arc' ); ?>
                                            <span class="collapse-legend" style="float:right">
                                            <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"></path>
                                            </svg>
                                            </span>
                                        </p>
                                        <style>
                                            ul.products {
                                                padding-left: 0 !important;
                                                margin-bottom: 0!important;
                                            }
                                            ul.products li.product_item{
                                                list-style: none!important;
                                                background: transparent !important;
                                                border: 1px solid <?=get_theme_mod('background_color')?> !important;
                                                margin-bottom: 10px !important;
                                                box-shadow: none !important;
                                                background: <?=get_theme_mod('background_color')?> !important;
                                                border-radius: 4px !important;
                                                padding: 10px 20px;
                                                white-space: nowrap !important;
                                            }
                                            ul.products li.product_item.best_li{
                                                border: 1px solid <?=get_theme_mod('premium_text_label_color')?>  !important;
                                            }
                                            ul.products li.product_item:hover {
                                                background: <?=get_theme_mod('btn_hover_color_setting')?>  !important;
                                                border-color: <?=get_theme_mod('btn_hover_color_setting')?>  !important;
                                            }
                                            ul.products li.product_item:hover > a > span.product_title span.product_status svg path {
                                                /*fill: <?=get_theme_mod('text_site_color')?> !important;*/
                                                fill-opacity: 1 !important;
                                            }
                                            button#custom_Checkout_Button:hover {
                                                background-color: <?=get_theme_mod('btn_hover_color_setting')?>  !important;
                                                border-color: <?=get_theme_mod('btn_hover_color_setting')?>  !important;
                                            }
                                            ul.products li.product_item a {
                                                display: contents;
                                            }
                                            ul.products li.product_item a span.product_title {
                                                display: flex;
                                                justify-content: space-between;
                                                font-family: 'Roboto',sans-serif;
                                                font-style: normal;
                                                font-weight: normal;
                                                font-size: 18px;
                                                line-height: 21px;
                                                text-align: center;
                                                color:<?=get_theme_mod('text_site_color')?>;
                                            }
                                            span.product_status {
                                                display: inline-flex;
                                                align-items: center;
                                            }
                                            .woocommerce-checkout #payment {
                                                background: transparent !important;
                                            }
                                            div.woocommerce-notices-wrapper {
                                                display: none !important;
                                            }
                                            div.woocommerce-billing-fields h3,
                                            div.woocommerce-additional-fields h3,
                                            h3#order_review_heading{
                                                display: none !important
                                            }
                                            div#customer_details div.col-1{
                                                width: 100%;
                                            }
                                            div.woocommerce center {
                                                display: none !important;
                                            }
                                            span.optional,
                                            div.woocommerce-privacy-policy-text p{
                                                display: none !important;
                                            }
                                            .woocommerce-checkout #payment ul.payment_methods {
                                                border-bottom: none !important;
                                            }

                                            div#div_billing_details div.woocommerce-billing-fields h3 {
                                                display: none;
                                            }
                                            abbr.required {
                                                border-bottom: none;
                                                cursor: auto;
                                            }
                                            div#payment {
                                                display: flex;
                                                flex-wrap: wrap;
                                                justify-content: space-between;
                                                align-items: center;
                                            }
                                            div#payment > div,
                                            div#payment div.place-order {
                                                width: 50%;
                                            }
                                            button#custom_Checkout_Button {
                                                background-color: <?=get_theme_mod('btn_color_setting')?>  !important;
                                                border-radius: 4px;
                                                border-color: <?=get_theme_mod('btn_color_setting')?>  !important;
                                                font-family: 'Roboto',sans-serif;
                                                width: 100%;
                                                max-width: 84px;
                                                font-style: normal;
                                                font-weight: 500;
                                                font-size: 14px;
                                                line-height: 142.69%;
                                                color: <?=get_theme_mod('text_site_color')?>;
                                                padding: 8px;
                                                white-space: nowrap;
                                            }
                                            div#pay_block {
                                                width: 100%;
                                                display: flex;
                                                flex-wrap: wrap;
                                                justify-content: space-between;
                                            }
                                            div#pay_block > div:nth-child(1),
                                            div#pay_block > div:nth-child(2) {
                                                width: 50%;
                                            }
                                            span#title_plan,
                                            span#cost_plan,
                                            span.vat_label,
                                            span.tax-total bdi,
                                            span.total_span > span,
                                            span.total_span span.total_curr{
                                                font-family: 'Roboto',sans-serif;
                                                font-style: normal!important;
                                                font-weight: normal!important;
                                                font-size: 14px!important;
                                                line-height: 16px!important;
                                                color: rgba(<?php
                                                $hex = get_theme_mod('secondary_text_site_color');
                                                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                                                echo $r.",".$g.",". $b;
                                                ?>,0.5) !important;
                                            }
                                            span#cost_plan > span,
                                            span.tax-total bdi,
                                            span.total_span span.total_curr{
                                                color: rgba(<?php
                                                $hex = get_theme_mod('text_site_color');
                                                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                                                echo $r.",".$g.",". $b;
                                                ?>,1) !important;
                                            }
                                            div.total_delimeter {
                                                border-bottom: 1px solid #293346;
                                                margin-top: 5px;
                                                margin-bottom: 5px;
                                                width: 70%;
                                                margin-left: 30%;
                                            }
                                            p#period_plan {
                                                margin:0;
                                                padding:0;
                                                font-family: 'Roboto',sans-serif;
                                                font-style: normal;
                                                font-weight: normal;
                                                font-size: 14px;
                                                line-height: 16px;
                                                color: rgba(<?php
                                                $hex = get_theme_mod('secondary_text_site_color');
                                                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                                                echo $r.",".$g.",". $b;
                                                ?>,0.5) !important;
                                            }
                                            .woocommerce-checkout #payment div.form-row,
                                            .woocommerce-checkout #payment ul.payment_methods{
                                                padding: 0!important;
                                            }
                                            ul.wc_payment_methods.payment_methods.methods {
                                                columns: 2;
                                                -webkit-columns: 2;
                                                -moz-columns: 2;
                                            }
                                            ul.wc_payment_methods.payment_methods.methods li label.ui-checkboxradio-label.ui-corner-all.ui-button.ui-widget {
                                                border:none !important;
                                                background: transparent !important;
                                                color: rgba(<?php
                                                $hex = get_theme_mod('text_site_color');
                                                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                                                echo $r.",".$g.",". $b;
                                                ?>,1) !important;
                                            }
                                            ul.wc_payment_methods.payment_methods.methods li label:hover span.ui-checkboxradio-icon.ui-corner-all.ui-icon.ui-icon-background.ui-state-hover.ui-icon-blank {
                                                border-color: rgba(<?php
                                                $hex = get_theme_mod('text_site_color');
                                                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                                                echo $r.",".$g.",". $b;
                                                ?>,1) !important;
                                            }
                                            .woocommerce .blockUI.blockOverlay {
                                                position: relative! important;
                                                display: none! important;
                                            }
                                            div.woocommerce-billing-fields__field-wrapper p {
                                                margin-bottom: 0px !important;
                                                margin-top: 10px !important;
                                            }
                                            span.product_title {
                                                display: grid!important;
                                                grid-template-columns: repeat(3, 1fr)!important;
                                                grid-gap: 20px 20px!important;
                                                justify-content: space-between!important;
                                            }
                                            span.product_price {
                                                text-align: left !important;
                                            }
                                            span.product_status {
                                                justify-content: flex-end !important;
                                            }
                                            span.not_active {
                                                display: flex;
                                                align-items: center;
                                            }
                                            ul.products li.product_item span.not_active:not(.best_active) svg path {
                                                fill:  <?=get_theme_mod('secondary_text_site_color');?> !important;
                                            }
                                            ul.products li.product_item:hover span.not_active svg path {
                                                fill:  <?=get_theme_mod('text_site_color');?> !important;
                                            }
                                            span.best_active svg path {
                                                fill:  <?=get_theme_mod('premium_text_label_color')?> !important;
                                                fill-opacity: 1 !important;
                                            }

                                        </style>
                                        <script>
                                            jQuery(document).ready(function($) {
                                                $('abbr').replaceWith(function(){
                                                    return $("<sup class='required' title='required' />").append($(this).contents());
                                                });
                                            });
                                        </script>
                                        <fieldset class="fieldset select_plan_fieldset" style="padding-top: 20px !important;padding-bottom: 15px!important;">
                                            <div id="div_select_plan">
                                                <div>
                                                    <?php
                                                    if (is_user_logged_in()) {
	                                                    global $wpdb;
	                                                    $input_data = get_all_orders_current_user(get_current_user_id());
	                                                    $plan_title = get_final_expires_time_of_active_user_order($input_data, true);
                                                    }
                                                    ?>
                                                    <ul class="products">
                                                        <?php
                                                        $args = array(
                                                            'post_type' => 'product',
                                                            'posts_per_page' => 4,
                                                            'order' => 'ASC',
                                                            'orderby' => 'ID'
                                                        );
                                                        $loop = new WP_Query( $args );
                                                        if ($loop->have_posts()) {
                                                            while ($loop->have_posts()) : $loop->the_post();
	                                                            echo apply_filters(
		                                                            'woocommerce_loop_add_to_cart_link',
		                                                            sprintf(
			                                                            '<li class="product_item %s"><a href="%s" rel="nofollow" 
                                                                            data-product_id="%s" 
                                                                            data-product_sku="%s" 
                                                                            class="button %s product_type_%s">
                                                                            <span class="product_title">
                                                                            <span class="product_price">%s</span>
                                                                            <span class="name_plan">%s</span>
                                                                            <span class="product_status">%s<span %s class="%s %s">%s%s</span></span>
                                                                            </span>                                                                            
                                                                            </a></li>',
			                                                            (get_theme_mod('premium_display_best_label') && get_theme_mod('premium_rate_type') == $product->get_title()) ? 'best_li': '',
			                                                            esc_url( $product->add_to_cart_url()),//1 href
			                                                            esc_attr($product->get_id()),//2 id
			                                                            esc_attr($product->get_sku()),//3 sku
			                                                            $product->is_purchasable() ? 'add_to_cart_button' : '', //4 btn
			                                                            esc_attr( $product->product_type ),//5 type
			                                                            $product->get_price_html() ,//6 price
			                                                            esc_html($product->get_title()),//7 title
                                                                        (get_theme_mod('premium_display_best_label') && get_theme_mod('premium_rate_type') == $product->get_title()) ? '<span id="best_choice">best choice</span>': '',
                                                                        ($product->get_title() == $plan_title) ? "id='active_plan'" : "",
                                                                        ($product->get_title() == $plan_title) ? 'active' : 'not_active',
                                                                        (get_theme_mod('premium_rate_type') == $product->get_title() && get_theme_mod('premium_display_best_label')) ? 'best_active' : '',
                                                                        ($product->get_title() == $plan_title) ? 'Active' : '', //8 active plan
			                                                            '<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.5 0.5C3.36452 0.5 0 3.86443 0 7.99996C0 12.1355 3.36452 15.5 7.5 15.5C11.6355 15.5 15 12.1355 15 7.99996C15 3.86443 11.6356 0.5 7.5 0.5ZM11.8066 6.73315L7.09476 11.445C6.89442 11.6453 6.62809 11.7556 6.34479 11.7556C6.06148 11.7556 5.79516 11.6453 5.59481 11.445L3.19337 9.04357C2.99302 8.84322 2.88267 8.5769 2.88267 8.29359C2.88267 8.01021 2.99302 7.74389 3.19337 7.54354C3.39364 7.3432 3.65996 7.23285 3.94334 7.23285C4.22665 7.23285 4.49305 7.3432 4.69332 7.54362L6.34471 9.19492L10.3065 5.23313C10.5069 5.03278 10.7732 4.92251 11.0565 4.92251C11.3398 4.92251 11.6061 5.03278 11.8065 5.23313C12.2202 5.64682 12.2202 6.31962 11.8066 6.73315Z" fill="white" fill-opacity="0.5"/>
</svg>'//9 status
		                                                            ),
		                                                            $product
	                                                            ); endwhile;
                                                        } else {
                                                            echo __( '0 premium plans found' );
                                                        }
                                                        wp_reset_postdata();
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </fieldset>
	                                        <?=do_shortcode('[woocommerce_checkout]');?>
                                    </form>
                                </section>
                            </div>
                            <!---payments---->
                            <div class="account-list" id="my_payments" style="display:none">
                                <section class="tab-content">
		                            <?php
		                            /**get data about orders for my payments tab**/
		                            if (is_user_logged_in()) {
			                            global $wpdb;
			                            $user_id = get_current_user_id();
			                            $query = "SELECT `wp_wc_order_stats`.`order_id`,`wp_wc_order_stats`.`status`  FROM `wp_wc_order_stats`
                                        LEFT JOIN `wp_wc_customer_lookup` ON `wp_wc_order_stats`.`customer_id`= `wp_wc_customer_lookup`.`customer_id` 
                                        WHERE `wp_wc_customer_lookup`.`user_id` = " .$user_id ." 
                                        AND (`wp_wc_order_stats`.`status` = 'wc-processing' OR `wp_wc_order_stats`.`status` = 'wc-completed') 
                                        ORDER BY `wp_wc_order_stats`.`date_created` DESC";
			                            $order_ids = $wpdb->get_results($query, ARRAY_A);
		                            }

		                            $gateways_ids = WC()->payment_gateways()->get_payment_gateway_ids();
		                            $avaliable_gateways = WC()->payment_gateways()->get_available_payment_gateways();
                                    foreach($order_ids as $order_id) {
                                        $query = "SELECT `product_id` FROM `wp_wc_order_product_lookup` WHERE `order_id` = " . $order_id['order_id'];
                                        $product_id = $wpdb->get_var($query);
                                        $product_title = get_post($product_id, ARRAY_A )['post_title'];
                                        switch ($product_title) {
                                            case '1 month':
                                                $time = strtotime(date("Y/m/d"));
                                                $final = date("d.m.Y", strtotime("+1 month", $time));
                                                break;
                                            case '3 months':
                                                $time = strtotime(date("Y/m/d"));
                                                $final = date("d.m.Y", strtotime("+3 months", $time));
                                                break;
                                            case '6 months':
                                                $time = strtotime(date("Y/m/d"));
                                                $final = date("d.m.Y", strtotime("+6 months", $time));
                                                break;
                                            case '12 months':
                                                $time = strtotime(date("Y/m/d"));
                                                $final = date("d.m.Y", strtotime("+12 months", $time));
                                                break;
                                            default:
                                                break;
                                        }

                                        switch($order_id['status']) {
                                            case 'wc-completed':
                                            case 'wc-processing':
                                                $status = 'Completed';
                                                break;
                                            default:
                                                $status = 'Pending';
                                                break;
                                        }
	                                    foreach ($gateways_ids as $id) {
		                                    if($avaliable_gateways[$id]->enabled == 'yes') {
			                                    if($avaliable_gateways[$id]->title == get_post_meta($order_id['order_id'], '_payment_method_title', true)) {
			                                        $table_payments[$avaliable_gateways[$id]->title][] = [
			                                                'date' => date("H:i / d.m.Y", get_post_meta($order_id['order_id'], '_date_paid', true)),
                                                            'title' => get_post($product_id, ARRAY_A )['post_title'],
                                                            'price' => get_post_meta($product_id, '_price', true),
                                                            'status' => $status,
                                                            'expires' => $final,
                                                            'ID' => $order_id['order_id']
                                                    ];
                                                }
		                                    }
	                                    }
                                    }
		                            if(count($order_ids) == 0):
			                            ?>
                                        <div class="alert" style="display: flex;!important;"><?php echo esc_html__('You haven\'t made any payments yet.', 'arc'); ?></div>
		                            <?php else:?>
                                        <div id="payment_scroll_table" style="display: flex!important;">
                                        <table id="table_payment">
                                        <tbody>
                                        <?php
                                        $count_payments = 0;
                                        foreach($table_payments as $payment => $value):?>
                                            <tr class="payment_type" >
                                                <?php if($count_payments > 0): continue;?>
                                                <?php else: ?>
                                                <td colspan="5"><?php echo $payment;?></td>
                                            </tr>
                                            <tr class="thead">
                                                <td><?php echo __('Time and Date', 'arc');?></td>
                                                <td><?php echo __('Period', 'arc');?></td>
                                                <td><?php echo __('Cost', 'arc');?></td>
                                                <td><?php echo __('Status', 'arc');?></td>
                                                <td><?php echo __('Invoice', 'arc');?></td>
                                            </tr>
                                                <?php $count_payments++; endif;?>
                                            <?php foreach($value as $item):?>
                                                <tr>
                                                    <td><?php echo $item['date'] ?></td>
                                                    <td><?php echo $item['title'] ?></td>
                                                    <td><?php echo $item['price']. ' ' ?><?php echo get_woocommerce_currency_symbol()?></td>
                                                    <td><?php echo $item['status'] ?></td>
                                                    <td>
                                                        <div class="download_invoice" style="display: inline-flex; align-items: center;cursor:pointer">
                                                        <svg style="margin-right: 10px" width="18" height="18" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url()">
                                                                <path d="M17.8328 12.3374C17.4135 12.3374 17.0758 12.6751 17.0758 13.0944V17.5735H1.92031V13.0944C1.92031 12.6751 1.58262 12.3374 1.16328 12.3374C0.743945 12.3374 0.40625 12.6751 0.40625 13.0944V18.3343C0.40625 18.7536 0.743945 19.0913 1.16328 19.0913H17.8328C18.2521 19.0913 18.5898 18.7536 18.5898 18.3343V13.0944C18.5898 12.6751 18.2521 12.3374 17.8328 12.3374Z" fill="white" fill-opacity="0.5"></path>
                                                                <path d="M8.96426 13.5878C9.37617 13.9849 9.86973 13.7808 10.0367 13.5878L14.6457 8.98252C14.9426 8.68564 14.9426 8.20693 14.6457 7.91006C14.3488 7.61318 13.8701 7.61318 13.5732 7.91006L10.2557 11.2239V1.60518C10.2557 1.18584 9.91797 0.848145 9.49863 0.848145C9.0793 0.848145 8.7416 1.18584 8.7416 1.60518V11.2202L5.42402 7.90635C5.12715 7.60947 4.64844 7.60947 4.35156 7.90635C4.05469 8.20322 4.05469 8.68193 4.35156 8.97881L8.96426 13.5878Z" fill="white" fill-opacity="0.5"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath >
                                                                    <rect width="19" height="19" fill="white" fill-opacity="0.5" transform="translate(0 0.499512)"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                            <a href="<?=site_url('/account-settings/')?>backend/?ID=<?=$item['ID']?>"><?php echo ' Download'; ?></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php endforeach;?>
                                        <?php endforeach;?>
                                        </tbody>
                                        </table>
                                        </div>
		                            <?php endif;?>
                                </section>
                            </div>
                            <!--email preferences---->
                            <div class="account-list" id="email_preferences" style="display:none">
                                <section class="tab-content">
                                    <?php if (is_user_logged_in()) : ?>
                                        <form id="email_preferences_form">
                                            <p class="legend">I want to receive the following emails</p>
                                            <fieldset class="fieldset">
                                                <div class="form-display_name">
                                                    <?php $video_submission = get_user_meta($current_user->ID, 'video_submission', true);?>
                                                    <input type="checkbox" data-action="video_submission" name="video_submission" id="video_submission" <?php if($video_submission == 'on') echo ' value="on" checked="checked"';?> />
                                                    <label for="video_submission">Video submission</label>
                                                    <p>Email me when I successfully upload a video.</p><br>

                                                    <?php $album_submission = get_user_meta($current_user->ID, 'album_submission', true);?>
                                                    <input type="checkbox" data-action="album_submission" name="album_submission" id="album_submission" <?php if($album_submission == 'on') echo ' value="on" checked="checked"';?> />
                                                    <label for="album_submission">Album submission</label>
                                                    <p>Email me when I successfully upload a photo album.</p><br>

                                                    <?php $post_submission = get_user_meta($current_user->ID, 'post_submission', true);?>
                                                    <input type="checkbox" data-action="post_submission" name="post_submission" id="post_submission"  <?php if($post_submission == 'on') echo ' value="on" checked="checked"';?> />
                                                    <label for="post_submission">Community post submission</label>
                                                    <p>Email me when I successfully submit a post to the Community feed.</p><br>

                                                    <?php $video_published = get_user_meta($current_user->ID, 'video_published', true);?>
                                                    <input type="checkbox" data-action="video_published" name="video_published" id="video_published" <?php if($video_published == 'on') echo ' value="on" checked="checked"';?> />
                                                    <label for="video_published">Subscribed video published</label>
                                                    <p>Email me when a user I'm subscribed to publishes a new video.</p><br>
                                                </div>
                                            </fieldset>
                                        </form>
                                    <?php else : ?>
                                        <div class="alert" style="display: flex;!important;"><?php __('You must be logged in. Please <a href="' . wp_login_url() .'">Login</a>' . wp_register(' or ', '') . ' a new account.', 'arc'); ?></div>
                                    <?php endif; ?>
                                </section>
                            </div>
                        </div>
					</div>
				</div>
				<?php endif;?>
            <style>
                <?php if(!wc_tax_enabled()):?>
                    @media (min-width: 320px) and (max-width: 495px) {
                        div#payment {
                            justify-content: center !important;
                            flex-direction: column-reverse !important;
                        }

                        div.form-row.place-order{
                            width: 100% !important;
                        }
                        div#payments_methods_list {
                            width: 50% !important;
                            order: 2 !important;
                            text-align: center !important;
                            justify-content: space-around !important;
                            padding-bottom: 10px !important;
                        }
                        div#pay_block {
                            justify-content: center !important;
                        }
                        div#pay_block div:nth-child(1),
                        div#pay_block div:nth-child(2){
                            width: 100% !important;
                        }
                        div#pay_block div:nth-child(2){
                            text-align: center !important;
                            padding-top: 10px !important;
                            padding-bottom: 10px !important;
                        }
                        #add_payment_method #payment ul.payment_methods li,
                        .woocommerce-cart #payment ul.payment_methods li,
                        .woocommerce-checkout #payment ul.payment_methods li {
                            white-space: nowrap !important;
                            text-align: center !important;
                        }
                        span.product_title {
                            display: flex !important;
                            flex-wrap: wrap !important;
                        }
                        span.product_price {
                            text-align: center!important;
                            width: 100%!important;
                            margin-top: 10px !important;
                        }
                        span.product_price > span.woocommerce-Price-amount {
                            margin-top: 10px !important;
                        }
                        span.name_plan {
                            margin-top: 7px !important;
                        }
                    }
                <?php else:?>
                @media (min-width: 320px) and (max-width: 560px) {
                    div#payment {
                        justify-content: center !important;
                        flex-direction: column-reverse !important;
                    }

                    div.form-row.place-order{
                        width: 100% !important;
                    }
                    div#payments_methods_list {
                        width: 50% !important;
                        order: 2 !important;
                        text-align: center !important;
                        justify-content: space-around !important;
                        padding-bottom: 10px !important;
                    }
                    div#pay_block {
                        justify-content: center !important;
                    }
                    div#pay_block > div:nth-child(1) {
                        text-align: center !important;
                        display: inline-flex!important;
                        justify-content: space-around!important;
                    }
                    div#pay_block div:nth-child(1) > div:not(.total_delimeter),
                    div#pay_block div:nth-child(1) > span.tax-total,
                    div#pay_block div:nth-child(1) > span.total_span {
                        width: 33% !important;
                        white-space: nowrap !important;
                    }

                    div#pay_block div:nth-child(1){
                        width: 80% !important;
                    }
                    div#pay_block div:nth-child(2){
                        width: 100% !important;
                    }
                    div#pay_block div:nth-child(2){
                        text-align: center !important;
                        padding-top: 10px !important;
                        padding-bottom: 10px !important;
                    }

                    div.total_delimeter {
                        transform: rotate(90deg) !important;
                        margin-left: 0 !important;
                        width: 7% !important;
                        margin-bottom: 0 !important;
                        height: 5px!important;
                        margin-top: 9px !important;
                    }

                    #add_payment_method #payment ul.payment_methods li,
                    .woocommerce-cart #payment ul.payment_methods li,
                    .woocommerce-checkout #payment ul.payment_methods li {
                        white-space: nowrap !important;
                        text-align: center !important;
                    }
                    p#period_plan {
                        margin-top: 10px !important;
                    }
                    div#payments_methods_list {
                        width: 60% !important;
                        order: 2 !important;
                        text-align: center !important;
                        justify-content: space-around !important;
                        padding-bottom: 10px !important;
                    }
                    div#pay_block div:nth-child(2){
                        text-align: center !important;
                        padding-top: 10px !important;
                        padding-bottom: 10px !important;
                        margin-left: 0 !important;
                    }
                    span.product_title {
                        display: flex !important;
                        flex-wrap: wrap !important;
                        line-height: 0 !important;
                    }
                    span.product_price {
                        text-align: center!important;
                        width: 100%!important;
                        margin-top: 10px !important;
                    }
                    span.product_price > span.woocommerce-Price-amount {
                        margin-top: 10px !important;
                    }
                    span.name_plan {
                        margin-top: 7px !important;
                    }
                }
                @media (min-width: 320px) and (max-width: 390px) {
                    div#pay_block div:nth-child(1){
                        width: 100% !important;
                    }
                }
                @media (min-width: 320px) and (max-width: 420px) {
                    div#payments_methods_list{
                        width: 100% !important;
                    }
                }
                <?php endif;?>
                @media (min-width: 320px) and (max-width: 365px) {
                    span.name_plan,
                    span.product_status {
                        width: 100% !important;
                        text-align: center !important;
                        justify-content: center !important;
                    }
                }
                @media (min-width: 320px) and (max-width: 550px) {
                    .woocommerce form .form-row-first,
                    .woocommerce form .form-row-last,
                    .woocommerce-page form .form-row-first,
                    .woocommerce-page form .form-row-last {
                        width: 100% !important;

                    }
                }
                #pay_block > div:nth-child(1) > div:nth-child(1) {
                    white-space: nowrap !important;
                }
            </style>
			<script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-subscriptions' ) == 'on') {
	get_sidebar();
}
get_footer();
