<?php
/**
 * Template Name: Favorites
 **/
/*if(isset($_GET['xxx']) && !empty($_GET['xxx'])) {
	if(get_user_by('ID', $_GET['xxx']) == false) header('Location:' . site_url() . '/favorites/?xxx='.get_current_user_id());
	else $userID = $_GET['xxx'];
} elseif(isset($_GET['xxx']) && empty($_GET['xxx'])) {
	header('Location:' . site_url() . '/favorites/?xxx='.get_current_user_id());
} elseif(!isset($_GET['xxx'])) header('Location:' . site_url() . '/favorites/?xxx='.get_current_user_id());*/
if(!is_user_logged_in()) {
	$favoriteLogin = ' favoriteLoggedOut';
} else $favoriteLogin = '';
$userID = get_current_user_id();
global $wpdb;
get_header();
?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-favorite-photos' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; }
	else { $sidebar_pos = 'with-sidebar-left'; }
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
                    <!--<div class="before_tabs_border"></div>-->
					<a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/profile/'. $curr->user_login . '/'?>'" class="tab-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.6617 12.9623L17.8287 10.4519C17.4209 9.8936 16.7643 9.56055 16.073 9.56055H15.2174C14.9774 9.56055 14.7826 9.75534 14.7826 9.99534C14.7826 10.2353 14.9774 10.4301 15.2174 10.4301H16.073C16.4878 10.4301 16.8817 10.6302 17.1261 10.9649L18.6461 13.0388H1.35913L2.87303 10.9649C3.11825 10.6293 3.51216 10.4301 3.92694 10.4301H4.78259C5.02259 10.4301 5.21739 10.2353 5.21739 9.99534C5.21739 9.75534 5.02259 9.56055 4.78259 9.56055H3.92694C3.23564 9.56055 2.5791 9.8936 2.17129 10.4519L0.381725 12.911C0.139117 13.1545 0 13.491 0 13.8336V17.8214C0 19.0206 0.975652 19.9953 2.1739 19.9953H17.8261C19.0252 19.9953 20 19.0205 20 17.8214V13.8336C20 13.491 19.8608 13.1545 19.6617 12.9623Z" fill="white"/>
                            <path d="M15.5477 6.23563L10.3303 0.148689C10.166 -0.0443546 9.83551 -0.0443546 9.67031 0.148689L4.45292 6.23563C4.3416 6.36431 4.31641 6.54606 4.3877 6.69997C4.45899 6.85389 4.61291 6.95302 4.78247 6.95302H6.08682V11.7356C6.08682 11.9756 6.28161 12.1704 6.52161 12.1704H13.4781C13.7181 12.1704 13.9129 11.9756 13.9129 11.7356V6.95302H15.2173C15.3869 6.95302 15.5416 6.85389 15.6121 6.69997C15.6833 6.54606 15.6581 6.36431 15.5477 6.23563Z" fill="white"/>
                        </svg><?php echo esc_html__('My Uploads', 'arc'); ?></a>
                    <button class="tab-link active favorites">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.7307 4.37008C15.9025 3.48659 14.766 3 13.5304 3C12.6068 3 11.761 3.28717 11.0164 3.85348C10.6406 4.13933 10.3002 4.48906 10 4.89725C9.69995 4.48918 9.35938 4.13933 8.98352 3.85348C8.23901 3.28717 7.39319 3 6.4696 3C5.23401 3 4.09741 3.48659 3.26917 4.37008C2.45081 5.24325 2 6.43613 2 7.72914C2 9.05996 2.50427 10.2782 3.58691 11.563C4.55542 12.7123 5.94739 13.879 7.55933 15.23C8.10974 15.6914 8.73364 16.2144 9.38147 16.7714C9.55261 16.9188 9.77222 17 10 17C10.2277 17 10.4474 16.9188 10.6183 16.7717C11.2661 16.2145 11.8904 15.6913 12.441 15.2297C14.0527 13.8789 15.4447 12.7123 16.4132 11.5629C17.4958 10.2782 18 9.05996 18 7.72902C18 6.43613 17.5492 5.24325 16.7307 4.37008Z" fill="white"/>
                        </svg><?php echo esc_html__('My Favorites', 'arc'); ?></button>
                    <a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/playlists/'?>'" class="tab-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.6923 5.51367H2.30767C1.03315 5.51367 0 6.54687 0 7.82134V17.565C0 18.8395 1.0332 19.8726 2.30767 19.8726H17.6923C18.9668 19.8726 20 18.8394 20 17.565V7.82134C20 6.54682 18.9668 5.51367 17.6923 5.51367ZM12.9876 13.0389C12.9404 13.1335 12.8637 13.2101 12.7693 13.2573L7.87181 16.1291C7.79652 16.181 7.7068 16.2079 7.61542 16.206L7.38465 16.1291C7.23987 16.0338 7.16061 15.8655 7.1795 15.6932V9.94954C7.16061 9.77727 7.23982 9.60888 7.38465 9.51362C7.53189 9.41439 7.72457 9.41439 7.87186 9.51362L12.7693 12.3854C13.01 12.5056 13.1077 12.7982 12.9876 13.0389Z" fill="white"/>
                            <path d="M2.64173 3.97486H17.3853C17.6685 3.97486 17.8981 3.74527 17.8981 3.46204C17.8981 3.17881 17.6685 2.94922 17.3853 2.94922H2.64173C2.3585 2.94922 2.12891 3.17881 2.12891 3.46204C2.12891 3.74527 2.3585 3.97486 2.64173 3.97486Z" fill="white"/>
                            <path d="M4.82142 1.15455H15.1804C15.4637 1.15455 15.6932 0.92496 15.6932 0.641728C15.6932 0.358496 15.4637 0.128906 15.1804 0.128906H4.82142C4.53818 0.128906 4.30859 0.358496 4.30859 0.641728C4.30859 0.92496 4.53823 1.15455 4.82142 1.15455Z" fill="white"/>
                        </svg><?php echo esc_html__('My Playlists', 'arc'); ?></a>
                    <a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/watched-videos/'?>'" class="tab-link">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#playlist_clip)">
                                <path d="M1.51184 17.0547H18.4885C19.3237 17.0547 20.0004 16.3777 20.0004 15.5429V4.45715C20.0004 3.62232 19.3237 2.94531 18.4885 2.94531H1.51184C0.677007 2.94531 0 3.62232 0 4.45715V15.5429C0 16.3777 0.677007 17.0547 1.51184 17.0547ZM11.1641 15.9935H8.83556V14.5549H11.1641V15.9935ZM16.7129 4.041H19.0415V5.47955H16.7129V4.041ZM16.644 14.5549H18.9729V15.9935H16.644V14.5549ZM12.8083 4.041H15.1372V5.47955H12.8083V4.041ZM12.7398 14.5549H15.0687V15.9935H12.7398V14.5549ZM8.90449 4.041H11.233V5.47955H8.90449V4.041ZM8.25143 7.51638L11.7486 9.26513C12.5602 9.67112 12.5602 10.3293 11.7486 10.7349L8.25143 12.484C7.43982 12.8896 6.78131 12.4829 6.78131 11.5748V8.42522C6.78095 7.51747 7.43946 7.11075 8.25143 7.51638ZM5.00027 4.041H7.32916V5.47955H5.00027V4.041ZM4.9317 14.5549H7.26023V15.9935H4.9317V14.5549ZM1.09605 4.041H3.42494V5.47955H1.09605V4.041ZM1.02748 14.5549H3.35637V15.9935H1.02748V14.5549Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="playlist_clip">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg><?php echo esc_html__('Watched Videos', 'arc'); ?></a>

					<a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/account-settings/'?>'">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(account_clip)">
                                <path d="M1.31303 7.32766C1.41816 7.68811 1.56406 8.03568 1.74857 8.3618L1.22292 9.02476C1.05128 9.24146 1.07059 9.55041 1.26368 9.74565L2.16909 10.6511C2.36433 10.8463 2.67328 10.8634 2.88998 10.6918L3.54865 10.1704C3.88764 10.3657 4.24809 10.518 4.62355 10.6253L4.72225 11.4728C4.75443 11.7474 4.98615 11.9534 5.26077 11.9534H6.54164C6.81627 11.9534 7.04798 11.7474 7.08016 11.4728L7.17457 10.6553C7.57792 10.5502 7.96411 10.3936 8.32671 10.1898L8.96392 10.6939C9.18062 10.8656 9.48957 10.8463 9.68481 10.6532L10.5902 9.74778C10.7855 9.55254 10.8026 9.24358 10.631 9.02689L10.1354 8.39825C10.3413 8.04208 10.5023 7.66234 10.6095 7.26542L11.3733 7.17746C11.648 7.14527 11.8539 6.91356 11.8539 6.63893V5.35806C11.8539 5.08344 11.648 4.85172 11.3733 4.81954L10.6203 4.73157C10.5173 4.33895 10.3628 3.96348 10.1654 3.61162L10.6289 3.02589C10.8005 2.8092 10.7812 2.50024 10.5881 2.305L9.68484 1.40174C9.48959 1.2065 9.18064 1.18934 8.96394 1.36098L8.39538 1.81153C8.02636 1.59484 7.63156 1.42963 7.2175 1.31807L7.13168 0.582157C7.09949 0.307532 6.86778 0.101562 6.59315 0.101562H5.31228C5.03766 0.101562 4.80594 0.307532 4.77376 0.582157L4.68794 1.31807C4.26313 1.43178 3.85763 1.60342 3.48002 1.8287L2.89 1.36098C2.67331 1.18934 2.36435 1.20865 2.16911 1.40174L1.26371 2.30715C1.06846 2.50239 1.0513 2.81134 1.22294 3.02804L1.71641 3.65238C1.51902 4.00854 1.36884 4.38829 1.27014 4.78307L0.480594 4.87318C0.205969 4.90536 0 5.13708 0 5.4117V6.69257C0 6.9672 0.205969 7.19891 0.480594 7.23109L1.31303 7.32766ZM5.95377 3.86266C7.12093 3.86266 8.07139 4.81313 8.07139 5.98028C8.07139 7.14744 7.12093 8.0979 5.95377 8.0979C4.78663 8.0979 3.83615 7.14744 3.83615 5.98028C3.83615 4.81313 4.78661 3.86266 5.95377 3.86266Z" fill="white"/>
                                <path d="M18.6167 7.64305L17.9408 7.07234C17.7328 6.89641 17.4259 6.90499 17.2286 7.09165L16.8552 7.44137C16.5399 7.28904 16.2052 7.18176 15.8597 7.11954L15.7546 6.60462C15.701 6.33858 15.4542 6.15407 15.1839 6.17552L14.3021 6.25061C14.0317 6.27422 13.8193 6.4952 13.8107 6.76768L13.7936 7.29118C13.4546 7.41348 13.1349 7.58083 12.8431 7.79109L12.3969 7.49501C12.1694 7.34482 11.8669 7.38773 11.691 7.59585L11.1203 8.27597C10.9443 8.48408 10.9529 8.79089 11.1395 8.98828L11.53 9.40448C11.3949 9.70915 11.2983 10.0288 11.2425 10.3571L10.6847 10.4708C10.4187 10.5244 10.2341 10.7712 10.2556 11.0415L10.3307 11.9233C10.3543 12.1937 10.5753 12.4061 10.8478 12.4146L11.4507 12.4339C11.5601 12.7214 11.7039 12.9939 11.8776 13.2492L11.5408 13.7577C11.3906 13.9851 11.4335 14.2877 11.6416 14.4636L12.3174 15.0343C12.5256 15.2102 12.8324 15.2016 13.0298 15.015L13.4718 14.6009C13.7614 14.7361 14.0661 14.8369 14.3793 14.897L14.5016 15.502C14.5553 15.768 14.802 15.9526 15.0723 15.9311L15.9541 15.856C16.2245 15.8324 16.4369 15.6114 16.4455 15.3389L16.4648 14.7468C16.7866 14.6331 17.0912 14.4786 17.3723 14.2877L17.8594 14.6095C18.0868 14.7597 18.3893 14.7168 18.5652 14.5086L19.1359 13.8328C19.3119 13.6247 19.3033 13.3179 19.1166 13.1205L18.724 12.7043C18.8678 12.3996 18.9729 12.0778 19.0329 11.7474L19.5693 11.638C19.8354 11.5843 20.0199 11.3376 19.9984 11.0672L19.9233 10.1854C19.8997 9.91509 19.6787 9.70269 19.4063 9.69411L18.8677 9.67694C18.7561 9.3637 18.606 9.06764 18.4193 8.79299L18.7132 8.35102C18.8677 8.12364 18.8248 7.81898 18.6167 7.64305ZM15.2933 12.7407C14.3407 12.8223 13.4996 12.1121 13.4202 11.1595C13.3387 10.2069 14.0489 9.36587 15.0015 9.28648C15.9541 9.20495 16.7952 9.91514 16.8745 10.8677C16.9561 11.8203 16.2459 12.6614 15.2933 12.7407Z" fill="white"/>
                                <path d="M4.39921 15.1144C4.12887 15.1423 3.92076 15.3697 3.91861 15.6422L3.91218 16.185C3.90789 16.4575 4.10956 16.6892 4.3799 16.7235L4.77896 16.775C4.84547 17.0174 4.93988 17.2492 5.06217 17.468L4.80471 17.7855C4.63307 17.9979 4.64594 18.3026 4.83689 18.4978L5.21665 18.8862C5.4076 19.0814 5.71226 19.1029 5.92896 18.9355L6.24862 18.6888C6.4739 18.8218 6.71207 18.927 6.96093 18.9999L7.00384 19.4118C7.03173 19.6822 7.25915 19.8903 7.53163 19.8924L8.07447 19.8989C8.34693 19.9032 8.57866 19.7015 8.61299 19.4311L8.66234 19.0407C8.93269 18.9741 9.19016 18.8733 9.43472 18.7403L9.73509 18.9827C9.9475 19.1544 10.2522 19.1415 10.4474 18.9505L10.8358 18.5708C11.031 18.3799 11.0525 18.0752 10.8851 17.8585L10.6555 17.5602C10.7971 17.3242 10.9066 17.0732 10.9817 16.8093L11.3378 16.7728C11.6081 16.7449 11.8162 16.5175 11.8184 16.245L11.8248 15.7022C11.8291 15.4298 11.6275 15.198 11.3571 15.1637L11.0095 15.1186C10.943 14.8569 10.8443 14.6037 10.7156 14.3677L10.9323 14.1017C11.104 13.8893 11.0911 13.5846 10.9001 13.3894L10.5204 13.001C10.3294 12.8058 10.0247 12.7843 9.80806 12.9517L9.54843 13.1512C9.30387 13.0032 9.04209 12.8895 8.76749 12.8122L8.73314 12.4754C8.70525 12.205 8.47785 11.9969 8.20534 11.9948L7.66253 11.9883C7.39005 11.9841 7.15833 12.1857 7.12398 12.4561L7.08107 12.7908C6.79789 12.8637 6.52541 12.9753 6.27224 13.1212L6.00405 12.9023C5.79164 12.7307 5.48696 12.7436 5.29172 12.9345L4.90124 13.3164C4.70599 13.5074 4.68454 13.812 4.85189 14.0287L5.08146 14.3248C4.94844 14.5608 4.84331 14.8118 4.77465 15.0757L4.39921 15.1144ZM7.90283 14.5007C8.68165 14.5093 9.30597 15.1508 9.29741 15.9297C9.28883 16.7085 8.6473 17.3328 7.86848 17.3242C7.08966 17.3157 6.46533 16.6741 6.4739 15.8953C6.4825 15.1165 7.12401 14.4922 7.90283 14.5007Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="account_clip">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg><?php echo esc_html__('Account Settings', 'arc'); ?></a>
				</div>
				<div id="favorite-content" style="padding-top: 40px">
                    <div class="accordeon">
                        <div id="favorite-tabs" class="tabs">
                            <p id="favorite_p" style="display:none;margin: 0;padding:0;">Favorite</p>
                            <div>
                                <button style="cursor: pointer;" class="tab-link active favorite_videos" data-tab-id="favorite_videos">
                                    <span id="desktop_favorite_videos"><?php echo esc_html__('Favorite videos', 'arc'); ?></span>
                                    <span id="mobile_favorite_videos" style="display:none"><?php echo esc_html__('Videos', 'arc'); ?></span>
                                </button>
                                <button style="cursor: pointer;" class="tab-link favorite_photos" data-tab-id="favorite_photos">
                                    <span id="desktop_favorite_photos"><?php echo esc_html__('Favorite photos', 'arc'); ?></span>
                                    <span id="mobile_favorite_photos" style="display:none"><?php echo esc_html__('Photos', 'arc'); ?></span>
                                </button>
                            </div>
                        </div>
                        <div id="favorite_tab_content">
                            <div class="favorite-list" id="favorite_videos" style="display:block">
                                <div class="videos-list">
                                    <?php
                                    $favorites_videos = explode(',',get_user_meta($curr->ID, 'favorites_video', true));
                                    $args_query = array(
	                                    'post_type'      => 'post',
	                                    'posts_per_page' 	=> 20,
	                                    'orderby'        => 'date',
	                                    'order'          => 'DESC',
	                                    'post__in' => $favorites_videos,
	                                    'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
                                    );
                                    $home_query = new WP_Query($args_query);
                                    if($home_query->have_posts()) {
	                                    while ( $home_query->have_posts() ) : $home_query->the_post();
		                                    get_template_part( 'template-parts/loop', 'favorite-video');
	                                    endwhile;
                                    } else { ?>
                                        <div class="alert">You have not added any videos to favorites.</div>
                                    <?php }
                                    if(count($favorites_videos) > 20){?>
                                        <div class="clear"></div>
                                        <div class="separator-pagination"></div>
	                                    <?php albums_page_navi(ceil(count($favorites_videos) /20));?>
	                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="favorite-list" id="favorite_photos" style="display:none">
                                <?php
                                $favorite_photos = get_user_meta($userID, 'favorite_photos', true);
                                $favorite_photos = unserialize($favorite_photos);
                                ?>
                                <div class="photos-list">
                                    <?php
                                    if(!empty($favorite_photos)):?>
                                        <article>
                                            <div class="entry-content photo-content">
                                                <figure style="opacity: 100%; margin-top: 0;">
                                                    <div class="blocks-gallery-grid">
                                                        <?php foreach ($favorite_photos as $photo):?>
                                                            <div class="photo_div_item" data-photo_id="<?=$photo?>" style="background: url('<?php echo wp_get_attachment_image_url($photo, 'full');?>');background-repeat: no-repeat;
                                                                    background-position: center;
                                                                    background-size: cover;">
                                                                <span style="margin-top: 5px;float:left;margin-left: 5px;" class="remove_from_photo heart-photos" data-post="<?=$photo?>" data-user="<?=$userID?>">
                                                                    <svg width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect x="0.5" width="25" height="22" rx="4" fill="#1E2739" fill-opacity="0.8"/>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.6129 5.06891C18.32 4.77602 17.8451 4.77602 17.5522 5.06891L12.9992 9.62196L8.44623 5.06899C8.15334 4.77609 7.67847 4.77609 7.38557 5.06899C7.09268 5.36188 7.09268 5.83675 7.38557 6.12965L11.9385 10.6826L6.75092 15.8702C6.45803 16.1631 6.45803 16.638 6.75092 16.9309C7.04381 17.2238 7.51869 17.2238 7.81158 16.9309L12.9992 11.7433L18.1869 16.931C18.4798 17.2239 18.9547 17.2239 19.2476 16.931C19.5405 16.6381 19.5405 16.1632 19.2476 15.8703L14.0599 10.6826L18.6129 6.12957C18.9058 5.83668 18.9058 5.36181 18.6129 5.06891Z" fill="white"/>
                                                                    </svg>
                                                                </span>
                                                                <p style="height: 200px;margin-top: 40px;margin-bottom: 0;"><a href="<?= site_url() . '/?attachment_id=' . $photo;?>"></a></p>
                                                            </div>
                                                        <?php endforeach;?>
                                                    </div>
                                                </figure>
                                            </div>
                                        </article>
                                    <?php else:?>
                                        <div class="alert">You have not added any images to favorites.</div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			<?php endif;?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
            <style>
                /*@media (max-width: 1745px) {
                    div#favorite-content {
                        min-height: 100vw !important;
                        max-height: 1280px!important;
                    }
                }
                @media (min-width: 1745px) {
                    div#favorite-content {
                        min-height: 0!important;
                        max-height: 1280px!important;
                    }
                }*/
            </style>
		</main>
	</div>
<script>
    jQuery(document).ready(function($){
        $('.heart-photos').on('click', function(){
            var user_id  =    $(this).attr('data-user');
            var photo_id =    $(this).attr('data-post');
            var count_photo = $('#count-photo').html();
            $.ajax({
                url: arc_ajax_var.url,
                type: 'POST',
                data: {
                    action      : 'delete_photo_from_favorite',
                    user_id     : user_id,
                    photo_id    : photo_id,
                    nonce       : arc_ajax_var.nonce,
                },
                beforeSend: function(){

                },
                success: function( response ) {
                    $('div[data-photo_id='+photo_id+']').remove();
                    count_photo--;
                    //$('#count-photo').html(count_photo);
                },
            });
        });

        $('div.blocks-gallery-grid div p').on('click', function (){
            var redirect_link = $(this).find('a').attr('href');
            window.location.href = redirect_link;
        });
    });
</script>
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-favorite-photos' ) == 'on') {
	get_sidebar();
}
get_footer();
?>
