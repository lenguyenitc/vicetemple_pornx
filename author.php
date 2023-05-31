<?php
/** **/
$url = $_SERVER['REQUEST_URI'];
$user_name_input = explode('/profile/', $url)[1];
if (strpos($url, 'page') !== false){
    $user_name_input  = explode('/page/', $user_name_input)[0];
} else{
    $user_name_input = str_ireplace('/', '', $user_name_input);
}
$user_name_input = mb_strtolower($user_name_input);

$owner_this_page = get_user_by( 'ID', get_current_user_id() )->user_nicename;
$owner_this_page = mb_strtolower($owner_this_page);
if ($owner_this_page !== $user_name_input) {
    wp_redirect(site_url() . '/public-profile/?xxx=' . get_user_by( 'slug', $user_name_input )->ID);
}

/** **/
$succMsg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['post_id'])) {
	if(!empty($_FILES['arc_file_upload'])) {
		if(wp_verify_nonce( $_POST['fileup_nonce'], 'arc_file_upload')){
			if ( ! function_exists( 'wp_handle_upload' ) )
				require_once ABSPATH . 'wp-admin/includes/image.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/media.php';
			$file = &$_FILES['arc_file_upload'];
			$overrides = [ 'test_form' => false ];
			$movefile = wp_handle_upload( $file, $overrides );

			if ( $movefile && empty($movefile['error']) ) {
				update_post_meta($_POST['post_id'], 'thumb', $movefile['url']);

				$wp_upload_dir = wp_upload_dir();
				$filetype = wp_check_filetype($movefile['url'], null);
				$attachment_preview = array(
					'guid'           => $movefile['url'],
					'post_mime_type' => $movefile['type'],
					'post_title'     => preg_replace( '/\.[^.]+$/', '', $movefile['url']),
					'post_content'   => '',
					'post_status'    => 'inherit'
				);
				$scaled_video_attachment_id = wp_insert_attachment($attachment_preview, $movefile['url'], 0);
				$scaled_video_attachment_data = wp_generate_attachment_metadata($scaled_video_attachment_id, $movefile['url']);
				wp_update_attachment_metadata($scaled_video_attachment_id, $scaled_video_attachment_data);
			}
		}
	}

	$title = trim( strip_tags( $_POST['title'] ) );
	$description = trim( strip_tags( $_POST['description'] ) );
	$post_id = trim( strip_tags( $_POST['post_id'] ) );
	if (!empty($title)) {
		$data = [
			'ID'          => $post_id,
			'post_title'  => $title,
		];
		wp_update_post( wp_slash($data));
	}

	if (!empty($description)) {
		$data = [
			'ID'          => $post_id,
			'post_content'  => $description,
		];
		wp_update_post( wp_slash($data));
	}

	if (!empty($_POST['tags'])) {
		$tag = explode(',', $_POST['tags']);
		wp_set_object_terms( $post_id, $tag, 'post_tag', true );
	}

	if (!empty($_POST['category'])) {
		wp_set_object_terms( $post_id, $_POST['category'], 'category', false );
	}

	if (empty($_POST['delete_video'])) {
		//$succMsg = esc_html__( 'Video information was changed successfully.', 'arc' );
	}
	wp_redirect(site_url() . '/' . $_SERVER['REQUEST_URI']);
}
$curr = wp_get_current_user();
?>
<?php get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-author-page' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
<?php
?><div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
    <main id="main" class="site-main <?php echo $sidebar_pos; ?> profile-page" role="main">
        <?php
        if(!is_user_logged_in()) :?>
            <p><?php echo 'You need to ';?>
                <a style="cursor: pointer" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');">Login </a>
		        <?php echo wp_register(" or ", "") . ' to see this page.'?>
            </p>
        <?php else :  ?>
        <div id="profile-tabs" class="tabs">
            <button class="tab-link active upload" style="padding-left: 20px;">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.6617 12.9623L17.8287 10.4519C17.4209 9.8936 16.7643 9.56055 16.073 9.56055H15.2174C14.9774 9.56055 14.7826 9.75534 14.7826 9.99534C14.7826 10.2353 14.9774 10.4301 15.2174 10.4301H16.073C16.4878 10.4301 16.8817 10.6302 17.1261 10.9649L18.6461 13.0388H1.35913L2.87303 10.9649C3.11825 10.6293 3.51216 10.4301 3.92694 10.4301H4.78259C5.02259 10.4301 5.21739 10.2353 5.21739 9.99534C5.21739 9.75534 5.02259 9.56055 4.78259 9.56055H3.92694C3.23564 9.56055 2.5791 9.8936 2.17129 10.4519L0.381725 12.911C0.139117 13.1545 0 13.491 0 13.8336V17.8214C0 19.0206 0.975652 19.9953 2.1739 19.9953H17.8261C19.0252 19.9953 20 19.0205 20 17.8214V13.8336C20 13.491 19.8608 13.1545 19.6617 12.9623Z" fill="white"/>
                    <path d="M15.5477 6.23563L10.3303 0.148689C10.166 -0.0443546 9.83551 -0.0443546 9.67031 0.148689L4.45292 6.23563C4.3416 6.36431 4.31641 6.54606 4.3877 6.69997C4.45899 6.85389 4.61291 6.95302 4.78247 6.95302H6.08682V11.7356C6.08682 11.9756 6.28161 12.1704 6.52161 12.1704H13.4781C13.7181 12.1704 13.9129 11.9756 13.9129 11.7356V6.95302H15.2173C15.3869 6.95302 15.5416 6.85389 15.6121 6.69997C15.6833 6.54606 15.6581 6.36431 15.5477 6.23563Z" fill="white"/>
                </svg><?php echo esc_html__('My Uploads', 'arc'); ?></button>
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
            <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/watched-videos/'?>'">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip_tab_link)">
                        <path d="M1.51184 17.0547H18.4885C19.3237 17.0547 20.0004 16.3777 20.0004 15.5429V4.45715C20.0004 3.62232 19.3237 2.94531 18.4885 2.94531H1.51184C0.677007 2.94531 0 3.62232 0 4.45715V15.5429C0 16.3777 0.677007 17.0547 1.51184 17.0547ZM11.1641 15.9935H8.83556V14.5549H11.1641V15.9935ZM16.7129 4.041H19.0415V5.47955H16.7129V4.041ZM16.644 14.5549H18.9729V15.9935H16.644V14.5549ZM12.8083 4.041H15.1372V5.47955H12.8083V4.041ZM12.7398 14.5549H15.0687V15.9935H12.7398V14.5549ZM8.90449 4.041H11.233V5.47955H8.90449V4.041ZM8.25143 7.51638L11.7486 9.26513C12.5602 9.67112 12.5602 10.3293 11.7486 10.7349L8.25143 12.484C7.43982 12.8896 6.78131 12.4829 6.78131 11.5748V8.42522C6.78095 7.51747 7.43946 7.11075 8.25143 7.51638ZM5.00027 4.041H7.32916V5.47955H5.00027V4.041ZM4.9317 14.5549H7.26023V15.9935H4.9317V14.5549ZM1.09605 4.041H3.42494V5.47955H1.09605V4.041ZM1.02748 14.5549H3.35637V15.9935H1.02748V14.5549Z" fill="white"/>
                    </g>
                    <defs>
                        <clipPath id="clip_tab_link">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg><?php echo esc_html__('Watched Videos', 'arc'); ?></a>

            <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/account-settings/'?>'">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip_tab_link2)">
                        <path d="M1.31303 7.32766C1.41816 7.68811 1.56406 8.03568 1.74857 8.3618L1.22292 9.02476C1.05128 9.24146 1.07059 9.55041 1.26368 9.74565L2.16909 10.6511C2.36433 10.8463 2.67328 10.8634 2.88998 10.6918L3.54865 10.1704C3.88764 10.3657 4.24809 10.518 4.62355 10.6253L4.72225 11.4728C4.75443 11.7474 4.98615 11.9534 5.26077 11.9534H6.54164C6.81627 11.9534 7.04798 11.7474 7.08016 11.4728L7.17457 10.6553C7.57792 10.5502 7.96411 10.3936 8.32671 10.1898L8.96392 10.6939C9.18062 10.8656 9.48957 10.8463 9.68481 10.6532L10.5902 9.74778C10.7855 9.55254 10.8026 9.24358 10.631 9.02689L10.1354 8.39825C10.3413 8.04208 10.5023 7.66234 10.6095 7.26542L11.3733 7.17746C11.648 7.14527 11.8539 6.91356 11.8539 6.63893V5.35806C11.8539 5.08344 11.648 4.85172 11.3733 4.81954L10.6203 4.73157C10.5173 4.33895 10.3628 3.96348 10.1654 3.61162L10.6289 3.02589C10.8005 2.8092 10.7812 2.50024 10.5881 2.305L9.68484 1.40174C9.48959 1.2065 9.18064 1.18934 8.96394 1.36098L8.39538 1.81153C8.02636 1.59484 7.63156 1.42963 7.2175 1.31807L7.13168 0.582157C7.09949 0.307532 6.86778 0.101562 6.59315 0.101562H5.31228C5.03766 0.101562 4.80594 0.307532 4.77376 0.582157L4.68794 1.31807C4.26313 1.43178 3.85763 1.60342 3.48002 1.8287L2.89 1.36098C2.67331 1.18934 2.36435 1.20865 2.16911 1.40174L1.26371 2.30715C1.06846 2.50239 1.0513 2.81134 1.22294 3.02804L1.71641 3.65238C1.51902 4.00854 1.36884 4.38829 1.27014 4.78307L0.480594 4.87318C0.205969 4.90536 0 5.13708 0 5.4117V6.69257C0 6.9672 0.205969 7.19891 0.480594 7.23109L1.31303 7.32766ZM5.95377 3.86266C7.12093 3.86266 8.07139 4.81313 8.07139 5.98028C8.07139 7.14744 7.12093 8.0979 5.95377 8.0979C4.78663 8.0979 3.83615 7.14744 3.83615 5.98028C3.83615 4.81313 4.78661 3.86266 5.95377 3.86266Z" fill="white"/>
                        <path d="M18.6167 7.64305L17.9408 7.07234C17.7328 6.89641 17.4259 6.90499 17.2286 7.09165L16.8552 7.44137C16.5399 7.28904 16.2052 7.18176 15.8597 7.11954L15.7546 6.60462C15.701 6.33858 15.4542 6.15407 15.1839 6.17552L14.3021 6.25061C14.0317 6.27422 13.8193 6.4952 13.8107 6.76768L13.7936 7.29118C13.4546 7.41348 13.1349 7.58083 12.8431 7.79109L12.3969 7.49501C12.1694 7.34482 11.8669 7.38773 11.691 7.59585L11.1203 8.27597C10.9443 8.48408 10.9529 8.79089 11.1395 8.98828L11.53 9.40448C11.3949 9.70915 11.2983 10.0288 11.2425 10.3571L10.6847 10.4708C10.4187 10.5244 10.2341 10.7712 10.2556 11.0415L10.3307 11.9233C10.3543 12.1937 10.5753 12.4061 10.8478 12.4146L11.4507 12.4339C11.5601 12.7214 11.7039 12.9939 11.8776 13.2492L11.5408 13.7577C11.3906 13.9851 11.4335 14.2877 11.6416 14.4636L12.3174 15.0343C12.5256 15.2102 12.8324 15.2016 13.0298 15.015L13.4718 14.6009C13.7614 14.7361 14.0661 14.8369 14.3793 14.897L14.5016 15.502C14.5553 15.768 14.802 15.9526 15.0723 15.9311L15.9541 15.856C16.2245 15.8324 16.4369 15.6114 16.4455 15.3389L16.4648 14.7468C16.7866 14.6331 17.0912 14.4786 17.3723 14.2877L17.8594 14.6095C18.0868 14.7597 18.3893 14.7168 18.5652 14.5086L19.1359 13.8328C19.3119 13.6247 19.3033 13.3179 19.1166 13.1205L18.724 12.7043C18.8678 12.3996 18.9729 12.0778 19.0329 11.7474L19.5693 11.638C19.8354 11.5843 20.0199 11.3376 19.9984 11.0672L19.9233 10.1854C19.8997 9.91509 19.6787 9.70269 19.4063 9.69411L18.8677 9.67694C18.7561 9.3637 18.606 9.06764 18.4193 8.79299L18.7132 8.35102C18.8677 8.12364 18.8248 7.81898 18.6167 7.64305ZM15.2933 12.7407C14.3407 12.8223 13.4996 12.1121 13.4202 11.1595C13.3387 10.2069 14.0489 9.36587 15.0015 9.28648C15.9541 9.20495 16.7952 9.91514 16.8745 10.8677C16.9561 11.8203 16.2459 12.6614 15.2933 12.7407Z" fill="white"/>
                        <path d="M4.39921 15.1144C4.12887 15.1423 3.92076 15.3697 3.91861 15.6422L3.91218 16.185C3.90789 16.4575 4.10956 16.6892 4.3799 16.7235L4.77896 16.775C4.84547 17.0174 4.93988 17.2492 5.06217 17.468L4.80471 17.7855C4.63307 17.9979 4.64594 18.3026 4.83689 18.4978L5.21665 18.8862C5.4076 19.0814 5.71226 19.1029 5.92896 18.9355L6.24862 18.6888C6.4739 18.8218 6.71207 18.927 6.96093 18.9999L7.00384 19.4118C7.03173 19.6822 7.25915 19.8903 7.53163 19.8924L8.07447 19.8989C8.34693 19.9032 8.57866 19.7015 8.61299 19.4311L8.66234 19.0407C8.93269 18.9741 9.19016 18.8733 9.43472 18.7403L9.73509 18.9827C9.9475 19.1544 10.2522 19.1415 10.4474 18.9505L10.8358 18.5708C11.031 18.3799 11.0525 18.0752 10.8851 17.8585L10.6555 17.5602C10.7971 17.3242 10.9066 17.0732 10.9817 16.8093L11.3378 16.7728C11.6081 16.7449 11.8162 16.5175 11.8184 16.245L11.8248 15.7022C11.8291 15.4298 11.6275 15.198 11.3571 15.1637L11.0095 15.1186C10.943 14.8569 10.8443 14.6037 10.7156 14.3677L10.9323 14.1017C11.104 13.8893 11.0911 13.5846 10.9001 13.3894L10.5204 13.001C10.3294 12.8058 10.0247 12.7843 9.80806 12.9517L9.54843 13.1512C9.30387 13.0032 9.04209 12.8895 8.76749 12.8122L8.73314 12.4754C8.70525 12.205 8.47785 11.9969 8.20534 11.9948L7.66253 11.9883C7.39005 11.9841 7.15833 12.1857 7.12398 12.4561L7.08107 12.7908C6.79789 12.8637 6.52541 12.9753 6.27224 13.1212L6.00405 12.9023C5.79164 12.7307 5.48696 12.7436 5.29172 12.9345L4.90124 13.3164C4.70599 13.5074 4.68454 13.812 4.85189 14.0287L5.08146 14.3248C4.94844 14.5608 4.84331 14.8118 4.77465 15.0757L4.39921 15.1144ZM7.90283 14.5007C8.68165 14.5093 9.30597 15.1508 9.29741 15.9297C9.28883 16.7085 8.6473 17.3328 7.86848 17.3242C7.08966 17.3157 6.46533 16.6741 6.4739 15.8953C6.4825 15.1165 7.12401 14.4922 7.90283 14.5007Z" fill="white"/>
                    </g>
                    <defs>
                        <clipPath id="clip_tab_link2">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg><?php echo esc_html__('Account Settings', 'arc'); ?></a>
        </div>
	        <?php if(!empty($succMsg)):?>
                <style>
                    .modalSuccMsg {
                        position: fixed;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 600px;
                        max-width: 100%;
                        padding: 30px;
                        z-index: 99999;
                        display: flex;
                        padding-top: 10px;
                        padding-bottom: 10px;
                    }
                    .modalSuccMsg.closed {
                        display: none;
                    }
                    .modal-guts {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        padding: 20px 50px 20px 20px;
                        display: contents;
                    }
                    .modal-overlay {
                        z-index: 1000;
                        position: fixed;
                        top:0;
                        left:0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.44);
                    }
                    #close-button {
                        position: absolute;
                        right: 0;
                        top: 0;
                        color: #000;
                        border-color: transparent !important;
                        background-color: transparent !important;
                        font-weight: bold;
                        z-index: 99999;
                        font-size: 24px;
                    }
                </style>
                <div class="modalSuccMsg alert alert-success" id="modalSuccMsg">
                    <button class="class-button" id="close-button" onclick="window.location.href = location;"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-guts">
                        <p><?php echo $succMsg;?></p>
                    </div>
                </div>
                <div class="modal-overlay" id="modal-overlay"></div>
	        <?php endif;?>
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
                    display: none;
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
                    z-index: -1000;
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
                <button class="class-button" id="close-button-del">
                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                        <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                    </svg>
                </button>
                <div class="modal-guts-del">
                    <div>
                        <h2></h2>
                        <span class="confirm"></span>
                    </div>
                </div>
            </div>
            <div class="modal-overlay-del" id="modal-overlay-del"></div>
            <!--- [end] modal for delete btn---->
        <div id="author-content" style="padding-top: 40px">
            <div class="accordeon">
                <?php if(isset($_POST['filter_by']) && $_POST['filter_by'] == 'uploaded_videos' && $_POST['filter_by'] !== 'uploaded_photos'):
                    $btn_video = 'active'; $btn_photo = ''; $tab_video = 'block'; $tab_photo = 'none';
                    elseif (isset($_POST['filter_by']) && $_POST['filter_by'] == 'uploaded_photos' && $_POST['filter_by'] !== 'uploaded_videos'):
                    $btn_photo = 'active'; $btn_video = ''; $tab_photo = 'block'; $tab_video = 'none';
                    else: $btn_video = 'active'; $btn_photo = ''; $tab_video = 'block'; $tab_photo = 'none'; endif;?>
                <div id="author-tabs" class="tabs" style="display: flex;justify-content: space-between;flex-wrap: wrap;">
                    <p id="uploaded_p" style="display:none;margin: 0;padding:0;">Uploaded</p>
                    <div>
                        <button style="cursor: pointer;" class="tab-link <?=$btn_video?> uploaded_videos" data-tab-id="uploaded_videos">
		                    <span id="desktop_uploaded_videos"><?php echo esc_html__('Uploaded videos', 'arc'); ?></span>
		                    <span id="mobile_uploaded_videos" style="display:none"><?php echo esc_html__('Videos', 'arc'); ?></span>
                        </button>
                        <button style="cursor: pointer;" class="tab-link <?=$btn_photo?> uploaded_photos" data-tab-id="uploaded_photos">
		                    <span id="desktop_uploaded_albums"><?php echo esc_html__('Uploaded albums', 'arc'); ?></span>
		                    <span id="mobile_uploaded_albums" style="display:none"><?php echo esc_html__('Albums', 'arc'); ?></span>
                        </button>
                        <!--Awaiting moderation-->
                        <!--Show videos that are pending moderation ("Draft" status)-->
                        <button style="cursor: pointer;" class="tab-link awaiting_moderation" data-tab-id="awaiting_moderation">
                            <span id="desktop_awaiting_moderation"><?php echo esc_html__('Awaiting moderation', 'arc'); ?></span>
                            <span id="mobile_awaiting_moderation" style="display:none"><?php echo esc_html__('Awaiting', 'arc'); ?></span>
                        </button>
                    </div>
                    <div class="searchFormUploaded" style="display: inline-flex; max-width: 435px;width: 100%;float:right">
		                <?php if(!isset($_POST['action'])) {$margin = 'margin-left:200px'; $show_clear = 'none';} else {$show_clear = 'block';} ?>
                        <form method="POST" style="display: <?=$show_clear?>">
                            <div style="display: inline-flex;flex-wrap: nowrap;">
                                <div class="clearSearch-icon2" style="display: inline-flex; flex-wrap: nowrap;align-items: center">
                                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip_tab_link3)">
                                            <path d="M11.8295 2.19544H10.2232V2.11133C10.2232 1.22281 9.50043 0.5 8.61191 0.5H6.38168C5.49316 0.5 4.77036 1.22281 4.77036 2.11133V2.19544H3.16406C2.67872 2.19544 2.28516 2.58889 2.28516 3.07435V3.74429C2.28516 3.90611 2.41631 4.03725 2.57812 4.03725H12.4155C12.5773 4.03725 12.7084 3.90611 12.7084 3.74429V3.07435C12.7084 2.58889 12.315 2.19544 11.8295 2.19544ZM5.64926 2.11133C5.64926 1.70747 5.97782 1.37891 6.38168 1.37891H8.61191C9.01577 1.37891 9.34433 1.70747 9.34433 2.11133V2.19544H5.64926V2.11133Z" fill="white"/>
                                            <path d="M2.66406 4.91602L3.37417 15.091C3.3903 15.3212 3.58176 15.4999 3.81259 15.4999H11.1802C11.411 15.4999 11.6025 15.3212 11.6185 15.091L12.3285 4.91602H2.66406ZM5.75717 14.0053C5.75088 14.0056 5.74447 14.0057 5.73817 14.0057C5.50414 14.0057 5.30948 13.821 5.29952 13.5849L5.00655 6.70015C4.99614 6.45765 5.18439 6.25269 5.4269 6.24239C5.66951 6.23243 5.87436 6.42034 5.88466 6.66284L6.17763 13.5476C6.18793 13.7901 5.99967 13.995 5.75717 14.0053ZM7.93578 13.5663C7.93578 13.809 7.73906 14.0057 7.49633 14.0057C7.2536 14.0057 7.05688 13.809 7.05688 13.5663V6.68149C7.05688 6.43877 7.2536 6.24204 7.49633 6.24204C7.73906 6.24204 7.93578 6.43877 7.93578 6.68149V13.5663ZM9.69325 13.5849C9.68318 13.8211 9.48852 14.0057 9.25449 14.0057C9.24819 14.0057 9.24178 14.0056 9.23549 14.0054C8.99299 13.9951 8.80473 13.7901 8.81503 13.5476L9.108 6.66284C9.11842 6.42034 9.32361 6.2322 9.56577 6.2425C9.80827 6.2528 9.99652 6.45765 9.98622 6.70015L9.69325 13.5849Z" fill="white"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip_tab_link3">
                                                <rect width="15" height="15" fill="white" transform="translate(0 0.5)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <input type="hidden" name="clear_filter" value="">
                                    <input id="clearSearch" type="submit" class="button" value="Clear search results"/>
                                </div>
                            </div>
                        </form>
                        <form method="POST" id="filter" style="
                                    width: 100%;
                                    max-width: 260px;
                                    margin-right: 5px; <?=$margin?>">
                            <div style="display: inline-flex;flex-wrap: nowrap;">
                                <input type="text" name="search_in_uploaded" id="search_in_uploaded"
                                       style="max-width: 190px;height: 36px !important; border-radius:4px; margin-right: 5px;" value="<?=$_POST['search_in_uploaded']?>"/>
                                <input type="hidden" name="action" value="filter_uploaded">
                                <input type="hidden" name="filter_by" value="">
                                <div class="search-btn-icon2" style="width: 36px;">
                                    <input id="uploadedSearch" type="submit" class="button" value=""/>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-left: -1.4em;margin-top: 0.6em;">
                                        <path d="M15.3167 14.434L11.0511 10.1684C11.8774 9.14777 12.3749 7.8509 12.3749 6.43843C12.3749 3.16471 9.71114 0.500977 6.43742 0.500977C3.1637 0.500977 0.5 3.16468 0.5 6.4384C0.5 9.71211 3.16373 12.3758 6.43745 12.3758C7.84993 12.3758 9.1468 11.8784 10.1674 11.0521L14.433 15.3177C14.5549 15.4396 14.7149 15.5008 14.8749 15.5008C15.0349 15.5008 15.1949 15.4396 15.3168 15.3177C15.5611 15.0733 15.5611 14.6783 15.3167 14.434ZM6.43745 11.1258C3.85247 11.1258 1.75 9.02338 1.75 6.4384C1.75 3.85341 3.85247 1.75094 6.43745 1.75094C9.02244 1.75094 11.1249 3.85341 11.1249 6.4384C11.1249 9.02338 9.02241 11.1258 6.43745 11.1258Z" fill="white"/>
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="author_tab_content">
                    <div class="author-list" id="uploaded_videos" style="display:<?=$tab_video?>">
                        <div class="videos-list result-without-ajax">
                            <style>
                                div.video-debounce-bar {
                                    top:22px;
                                }
                                div.video-debounce-bar--wait {
                                    animation: debounce-bar-load 0.5s 0.2s ease-in-out forwards, debounce-bar-hide 0.5s 0.8s ease-in-out forwards;
                                }
                                @keyframes debounce-bar-load {
                                    0% {width: 0%;opacity: 1}
                                    100% {width: 100%;}
                                }

                                @keyframes debounce-bar-hide {
                                    0% {top: 22px;}
                                    100% {top: 22px; opacity: 0}
                                }
                            </style>
                            <?php
                            if(isset($_POST['filter_by']) && $_POST['filter_by'] == 'uploaded_videos' && $_POST['filter_by'] !== 'uploaded_photos'):
	                            $args1 = [
		                            'post_status' => 'publish',
		                            'numberposts' => -1,
		                            'author'    => get_current_user_id(),
		                            'post_type'   => 'post',
		                            's' => esc_html($_POST['search_in_uploaded']),
	                            ];
                                $filter_posts = new WP_Query($args1);
                                $args = [
                                    'post_status' => 'publish',
                                    'numberposts' => -1,
                                    'author'    => get_current_user_id(),
                                    'orderby'     => 'date',
                                    'order'       => 'DESC',
                                    'post_type'   => 'post',
                                    's' => esc_html($_POST['search_in_uploaded']),
                                    'posts_per_page' => 20,
                                    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
                                ];
                                $query = new WP_Query($args);

                                if($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post();
                                        get_template_part( 'template-parts/loop', 'videoedit' );
                                    endwhile;
                                else :
                                    die('<div class="alert">No match query</div>');
                                endif;
                                wp_reset_query();?>
                                <style>
                                    div.pagination:not(.albums) {
                                        padding-left: 4em;
                                    }
                                </style>
                                <div class="clear"></div>
                                <div class="separator-pagination"></div>
	                            <?php arc_page_navi(ceil(count($filter_posts->posts)/20));
                            else:
                            if (have_posts()): ?>
	                        <?php
	                        while (have_posts()) : the_post();
		                        get_template_part( 'template-parts/loop', 'videoedit' );
	                        endwhile;
	                        ?>
                                <style>
                                    div.pagination:not(.albums) {
                                        padding-left: 4em;
                                    }
                                </style>
                                <div class="clear"></div>
                                <div class="separator-pagination"></div>
                            <style>
                                #uploaded_videos div.pagination {
                                    display: block !important;
                                    text-align: center!important;
                                    width: 100%!important;
                                }
                                #uploaded_videos div.pagination ul.single {
                                    display: inline-block !important;
                                    justify-content: center !important;
                                }
                            </style>
	                            <?php arc_page_navi(); else: ?>
                                <div class="alert"><?php echo __('You haven\'t uploaded any videos yet. Please keep in mind that videos may be subject to admin moderation. This page only shows the approved videos.', 'arc');?></div>
                            <?php endif; ?>
                            <?php endif;?>

                        </div>
                    </div>

                    <div class="author-list" id="uploaded_photos" style="display:<?=$tab_photo?>">
                        <!--galleries-->
                        <div id="user_photos" class="gallery-list search-without-ajax-photo">
	                        <?php
	                        if(isset($_POST['filter_by']) && $_POST['filter_by'] == 'uploaded_photos' && $_POST['filter_by'] !== 'uploaded_videos'):
	                        $args2 = [
		                        'post_status' => 'publish',
		                        'numberposts' => -1,
		                        'author'    => get_current_user_id(),
		                        'post_type'   => 'photos',
		                        's' => esc_html($_POST['search_in_uploaded']),
	                        ];
	                        $filter_photos = new WP_Query($args2);
	                        $args3 = [
		                        'post_status' => 'publish',
		                        'numberposts' => -1,
		                        'author'    => get_current_user_id(),
		                        'orderby'     => 'date',
		                        'order'       => 'DESC',
		                        'post_type'   => 'photos',
		                        's' => esc_html($_POST['search_in_uploaded']),
		                        'posts_per_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
		                        'posts_per_archive_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
		                        'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
	                        ];
	                        $query2 = new WP_Query($args3);

	                        if($query2->have_posts()) :
		                        while ($query2->have_posts()) : $query2->the_post();
			                        get_template_part( 'template-parts/loop', 'photo' );
		                        endwhile;
	                        else :
		                        die('<div class="alert">No match query</div>');
	                        endif;
	                        wp_reset_query();
	                        ?>
                            <style>
                                div.pagination:not(.albums) {
                                    padding-left: 4em;
                                }
                            </style>
                            <div class="clear"></div>
                            <div class="separator-pagination"></div>
                            <?php albums_page_navi(ceil(count($filter_photos->posts)/20));
                            else:?>
	                            <?php
	                            $count_albums = get_posts([
		                            'numberposts' => -1,
		                            'author'    => $curr->ID,
		                            'orderby'     => 'date',
		                            'order'       => 'DESC',
		                            'post_type'   => 'photos',
		                            'suppress_filters' => true,
	                            ]);
	                            ?>
	                            <?php
	                            if(count($count_albums) == 0):
		                            ?>
                                    <div class="alert"><?php echo __('You haven\'t uploaded any albums yet. Please keep in mind that albums may be subject to admin moderation. This page only shows the approved albums.', 'arc');?></div>
	                            <?php
	                            else:
		                            query_posts([
			                            'post_status' => 'publish',
			                            'numberposts' => -1,
			                            'author'    => $curr->ID,
			                            'orderby'     => 'date',
			                            'order'       => 'DESC',
			                            'post_type'   => 'photos',
			                            'suppress_filters' => true,
			                            'posts_per_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
			                            'posts_per_archive_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
			                            'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
		                            ]);

		                            if ( have_posts() ):
			                            while ( have_posts() ): the_post();
				                            get_template_part( 'template-parts/loop', 'photo' );
			                            endwhile;
			                            if(count($count_albums) > xbox_get_field_value('my-theme-options', 'number_albums_per_page')):?>
                                            <div class="clear"></div>
                                            <div class="separator-pagination"></div>
                                            <style>
                                                div.pagination.albums {
                                                    padding-left: 0 !important;
                                                }
                                                div.pagination.albums ul {
                                                    margin-bottom: 0 !important;
                                                    padding-bottom: 0 !important;
                                                }
                                                div.pagination.albums {
                                                    margin-bottom: 40px !important;
                                                }
                                            </style>
			                            <?php endif;
			                            albums_page_navi(ceil(count($count_albums)/xbox_get_field_value('my-theme-options', 'number_albums_per_page')));
		                            endif;
	                            endif;
	                            ?>
                            <?php endif;?>
                        </div>
                    </div>
                    <!--Awaiting moderation-->
                    <!--Show videos that are pending moderation ("Draft" status)-->
                    <div class="author-list" id="awaiting_moderation" style="display: none">
                        <div id="mod_videos" class="videos-list" style="margin-left:0;margin-right: 0">
                            <h2 class="a_mod">Pending videos</h2>
                            <?php
                            $args_video_mod = [
                                'post_status' => 'pending',
                                'numberposts' => -1,
                                'author'    => get_current_user_id(),
                                'orderby'     => 'date',
                                'order'       => 'DESC',
                                'post_type'   => 'post',
                            ];
                            $query_video_mod = new WP_Query($args_video_mod);

                            if($query_video_mod->have_posts()) :
                                while ($query_video_mod->have_posts()) : $query_video_mod->the_post();
                                    get_template_part( 'template-parts/loop', 'video-on-mod' );
                                endwhile;
                            else: echo '<p>You have no videos that are awaiting moderation.</p>';
                            endif;
                            ?>
                        </div>
                        <div class="clear"></div>
                        <div id="mod_photos" class="gallery-list">
                            <h2 class="a_mod" style="margin-top:31px">Pending albums</h2>
                            <?php
                            $args_photos_mod = [
                                'post_status' => 'pending',
                                'numberposts' => -1,
                                'author'    => get_current_user_id(),
                                'orderby'     => 'date',
                                'order'       => 'DESC',
                                'post_type'   => 'photos',
                            ];
                            $query_photos_mod = new WP_Query($args_photos_mod);

                            if($query_photos_mod->have_posts()) :
                                while ($query_photos_mod->have_posts()) : $query_photos_mod->the_post();
                                    get_template_part( 'template-parts/loop', 'photo-on-mod' );
                                endwhile;
                                else: echo '<p>You have no albums that are awaiting moderation.</p>';
                            endif;
                            ?>
                        </div>
                    </div>
                    <!---modal edit video--->
                    <div class="modal" id="edit_current_video" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 99999;background: rgba(0,0,0,0.5); overflow-x: hidden">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="border: none !important;">
                                <div class="modal-footer">
                                    <h2 style="padding-left:20px;padding-top:20px" class="modal-title" id="edit_video_header">Edit: <span></span></h2>
                                    <div>
                                        <?php
                                        $categories = get_categories([
                                            'taxonomy'     => 'category',
                                            'type'         => 'post',
                                            'child_of'     => 0,
                                            'orderby'      => 'name',
                                            'order'        => 'ASC',
                                            'hide_empty'   => 1,
                                            'hierarchical' => 1,
                                            'number'       => 0,
                                            'pad_counts'   => false,
                                        ]);
                                        ?>
                                        <form id="message" enctype="multipart/form-data" method="POST" style="width: 100%;text-align: left;">
                                            <fieldset style="padding: 0 !important;margin: 0 !important;">
                                                <label for="title-video">Title</label><br>
                                                <input style="margin-bottom: 10px;" placeholder="Title" type="text" name="title" id="title-video"><br>
                                                <label for="description-video">Description</label><br>
                                                <textarea placeholder="Description" name="description" id="description-video" style="max-width:460px;min-height: 68px;"></textarea><br>

                                                <div style="display: flex; justify-content: space-between;flex-wrap: wrap;">
                                                    <div style="width: 48%;">
                                                        <label for="thumbnail-video">Thumbnail</label><br>
                                                        <script>
                                                            jQuery(document).ready(function ($) {
                                                                $('#video_file_upload #btn').on('click', () => {
                                                                    $('input#thumbnail-video').trigger('click');
                                                                });
                                                                $('input[type="file"]').on('change', function (event, files, label) {
                                                                    var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '')
                                                                    $('div#upload_text p').text(file_name);
                                                                });
                                                            });
                                                        </script>
                                                        <div id="video_file_upload" style="display: inline-flex;align-items: center;">
                                                            <div id="btn" style="white-space: nowrap;height: 38px;padding: 11px 12px !important;">+ Select a file</div>
                                                            <div id="upload_text">
                                                                <p>No file chosen</p>
                                                            </div>
                                                        </div>
                                                        <?php wp_nonce_field( 'arc_file_upload', 'fileup_nonce' ); ?>
                                                        <input style="display: none;" type="file" accept="image/png, image/jpg, image/jpeg" name="arc_file_upload" id="thumbnail-video" value="<?php if(isset($FILES['arc-video_file'])) echo $FILES['arc-video_file'];?>"/>
                                                    </div>
                                                    <div>
                                                        <label for="category-video">Category</label><br>
                                                        <select size="1" name="category" id="video_category_select">
                                                            <?php
                                                            if($categories) {
                                                                foreach($categories as $cat) {
                                                                    echo '<option value="'. $cat->name .'">'. $cat->name .'</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div style="width: 100%;display: inline-flex; justify-content: space-between; flex-wrap: wrap;" class="div_video_form_tags">
                                                    <div style="max-width: 380px;width: 70%;">
                                                        <br>
                                                        <label for="tag-video">Tags</label><br>
                                                        <input type="text" name="tags" id="tag-video" placeholder="Tags (separated by commas)" style="width: 100%;max-width:380px">
                                                    </div>
                                                    <div style="display: inline-flex;
                                                                        align-items: flex-end;">
                                                                <span id="remove_video_tags_on_upload_page" aria-hidden="true" style="align-items: center;display: none;cursor:pointer; font-size: 16px" data-post-id="">
                                                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g clip-path="url(#clip_tab_link4)">
                                                                        <path d="M2.03469 0.677187C2.37969 0.677187 2.65969 0.957187 2.65969 1.30219V1.82312C4.00219 0.6525 5.71437 0 7.53906 0C11.6531 0 15 3.35906 15 7.4875C15 7.8325 14.72 8.1125 14.375 8.1125C14.03 8.1125 13.75 7.8325 13.75 7.4875C13.75 4.04812 10.9637 1.25 7.53906 1.25C6.03687 1.25 4.62563 1.78187 3.51313 2.73719H4.08594C4.43094 2.73719 4.71094 3.01719 4.71094 3.36219C4.71094 3.70719 4.43094 3.98719 4.08594 3.98719H2.03469C1.68969 3.98719 1.40969 3.70719 1.40969 3.36219V1.30219C1.40969 0.957187 1.68969 0.677187 2.03469 0.677187Z" fill="white" fill-opacity="0.5"/>
                                                                        <path d="M0.624062 6.8877C0.969061 6.8877 1.24906 7.1677 1.24906 7.5127C1.24906 10.9521 4.03531 13.7502 7.46 13.7502C8.94469 13.7502 10.3409 13.2314 11.4472 12.2971H10.8469C10.5019 12.2971 10.2219 12.0171 10.2219 11.6721C10.2219 11.3271 10.5019 11.0471 10.8469 11.0471H12.8984C12.9041 11.0471 12.9091 11.0486 12.9144 11.0486C12.9381 11.0493 12.9616 11.0524 12.9853 11.0558C13.0028 11.0583 13.0203 11.0599 13.0375 11.0639C13.0581 11.0686 13.0784 11.0761 13.0988 11.083C13.1175 11.0896 13.1366 11.0952 13.1547 11.1033C13.1719 11.1111 13.1881 11.1211 13.2047 11.1305C13.2244 11.1418 13.2437 11.1527 13.2622 11.1658C13.2669 11.1693 13.2722 11.1711 13.2769 11.1749C13.2875 11.183 13.2956 11.193 13.3056 11.2018C13.3222 11.2161 13.3388 11.2305 13.3538 11.2468C13.3678 11.2618 13.38 11.2774 13.3922 11.2933C13.4044 11.3093 13.4162 11.3252 13.4272 11.3421C13.4381 11.3596 13.4475 11.3777 13.4566 11.3958C13.4656 11.4136 13.4741 11.4318 13.4813 11.4505C13.4884 11.4699 13.4941 11.4893 13.4994 11.5093C13.5044 11.5283 13.5097 11.5474 13.5128 11.5671C13.5166 11.5893 13.5181 11.6114 13.5197 11.6339C13.5206 11.6468 13.5234 11.6593 13.5234 11.6724V13.7324C13.5234 14.0774 13.2434 14.3574 12.8984 14.3574C12.5534 14.3574 12.2734 14.0774 12.2734 13.7324V13.2355C10.9412 14.3696 9.25469 15.0002 7.46 15.0002C3.34594 15.0002 -0.000938416 11.6411 -0.000938416 7.5127C-0.000938416 7.1677 0.279061 6.8877 0.624062 6.8877Z" fill="white" fill-opacity="0.5"/>
                                                                        </g>
                                                                        <defs>
                                                                        <clipPath id="clip_tab_link4">
                                                                        <rect width="15" height="15" fill="white" transform="matrix(-1 0 0 1 15 0)"/>
                                                                        </clipPath>
                                                                        </defs>
                                                                        </svg> Remove
                                                                </span>
                                                    </div>
                                                </div>
                                                <div class="remove-all-tag">
                                                    <br><br>
                                                    <div class="tags-list" style="display: flex;">
                                                    </div>
                                                </div>

                                                <div class="separator_video"></div>
                                                <input type="hidden" name="post_id" value="" id="hidden_post_id">
                                                <input type="submit" value="Apply" id="apply_on_my_uploads_page">
                                                <input type="button" value="Close" id="close_modal_on_my_uploads">
                                                <div style="float:right;display: flex;align-items: center; flex-wrap: nowrap;">
                                                    <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip_tab_link5)">
                                                            <path d="M11.8295 2.19544H10.2232V2.11133C10.2232 1.22281 9.50043 0.5 8.61191 0.5H6.38168C5.49316 0.5 4.77036 1.22281 4.77036 2.11133V2.19544H3.16406C2.67872 2.19544 2.28516 2.58889 2.28516 3.07435V3.74429C2.28516 3.90611 2.41631 4.03725 2.57812 4.03725H12.4155C12.5773 4.03725 12.7084 3.90611 12.7084 3.74429V3.07435C12.7084 2.58889 12.315 2.19544 11.8295 2.19544ZM5.64926 2.11133C5.64926 1.70747 5.97782 1.37891 6.38168 1.37891H8.61191C9.01577 1.37891 9.34433 1.70747 9.34433 2.11133V2.19544H5.64926V2.11133Z" fill="white"/>
                                                            <path d="M2.66406 4.91602L3.37417 15.091C3.3903 15.3212 3.58176 15.4999 3.81259 15.4999H11.1802C11.411 15.4999 11.6025 15.3212 11.6185 15.091L12.3285 4.91602H2.66406ZM5.75717 14.0053C5.75088 14.0056 5.74447 14.0057 5.73817 14.0057C5.50414 14.0057 5.30948 13.821 5.29952 13.5849L5.00655 6.70015C4.99614 6.45765 5.18439 6.25269 5.4269 6.24239C5.66951 6.23243 5.87436 6.42034 5.88466 6.66284L6.17763 13.5476C6.18793 13.7901 5.99967 13.995 5.75717 14.0053ZM7.93578 13.5663C7.93578 13.809 7.73906 14.0057 7.49633 14.0057C7.2536 14.0057 7.05688 13.809 7.05688 13.5663V6.68149C7.05688 6.43877 7.2536 6.24204 7.49633 6.24204C7.73906 6.24204 7.93578 6.43877 7.93578 6.68149V13.5663ZM9.69325 13.5849C9.68318 13.8211 9.48852 14.0057 9.25449 14.0057C9.24819 14.0057 9.24178 14.0056 9.23549 14.0054C8.99299 13.9951 8.80473 13.7901 8.81503 13.5476L9.108 6.66284C9.11842 6.42034 9.32361 6.2322 9.56577 6.2425C9.80827 6.2528 9.99652 6.45765 9.98622 6.70015L9.69325 13.5849Z" fill="white"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip_tab_link5">
                                                                <rect width="15" height="15" fill="white" transform="translate(0 0.5)"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <input id="delete_user_video_on_uploads_page" data-post="" type="button" value="Delete video" name="delete_video" style="float:right">
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <?php endif;?>
            <?php if(xbox_get_field_value('my-theme-options','show-sidebar-on-author-page') == 'on'):?>
            <script>
                jQuery(document).ready(function($) {
                    let flag = false;
                    if(window.innerWidth >= 992) {
                        $('div#author-content').height($('div#content').height());
                    }

                    window.addEventListener("orientationchange", function() {
                        $('#author-content').css('height', 'auto');
                        flag =  true;
                    }, false);

                    $(window).on('resize', function() {
                        if (!flag) {
                            $('#author-content').css('height', 'auto');
                        }
                    });

                });
            </script>
            <?php endif;?>
        <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            /*var true_posts = '<?php //echo serialize($wp_query->query_vars); ?>';*/
            var author_uploads = '<?php echo serialize($wp_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
        </script>
       <!-- <div id="response"></div>-->
    </main>
    </div>
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-author-page' ) == 'on') {
	get_sidebar();
}
get_footer();
exit;