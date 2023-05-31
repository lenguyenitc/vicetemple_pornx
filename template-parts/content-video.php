<?php
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

	if (!empty($_POST['tag'])) {
		$tag = explode(',', $_POST['tag']);
		wp_set_object_terms( $post_id, $tag, 'post_tag', true );
	}

	if (!empty($_POST['category'])) {
		wp_set_object_terms( $post_id, $_POST['category'], 'category', false );
	}

	if (empty($_POST['delete_video'])) {
		wp_redirect(site_url() . '/' . $_SERVER['REQUEST_URI']);
	}
}
//Autoplay
if( xbox_get_field_value( 'my-theme-options', 'autoplay' ) == 'on' ) {
	$autoplay = 'autoplay';
}else{
	$autoplay = '';
}
//Thumbnail
$thumb = get_post_meta($post->ID, 'thumb', true);
if ( has_post_thumbnail() ) {
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id, 'arc_thumb_large', true);
	$poster = $thumb_url[0];
}else{
	$poster = $thumb;
}
//Video URL
$video_url = get_post_meta($post->ID, 'video_url', true);
$format = explode( '.',  $video_url);
$format = $format[ count( $format ) - 1];?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="video" itemscope itemtype="http://schema.org/VideoObject">
	<header class="entry-header">
		<?php get_template_part( 'template-parts/content', 'video-player' ); ?>
		<!--thumbnails below --->
		<?php
		$thumbs2 = null;
		if (has_post_thumbnail()) {
			$args       = array(
				'post_type'   => 'attachment',
				'numberposts' => -1,
				'post_status' => 'any',
				'post_parent' => $post->ID,
			);
			$thumb2_size = 'arc_thumb_small';
			$full = 'full';
			$attachments = get_attached_media( 'image' );
			if ( count( $attachments ) > 1 ) {
				foreach ( (array) $attachments as $attachment ) {
					$thumbs_array = wp_get_attachment_image_src( $attachment->ID, $thumb2_size );
					$full_array = wp_get_attachment_image_src( $attachment->ID, $full );
					$thumbs2[$full_array[0]] = $thumbs_array[0];
				}
			} else {
				$thumbs1 = get_post_meta( $post->ID, 'thumbnails', false );
				foreach ($thumbs1 as $thumb) {
					$thumbs2[wp_get_attachment_image_url($thumb, 'full')] = wp_get_attachment_image_url($thumb, 'arc_thumb_small');
				}
			}
		} else {
			$thumbs1 = get_post_meta( $post->ID, 'thumbnails', false );
			foreach ($thumbs1 as $thumb) {
				$thumbs2[wp_get_attachment_image_url($thumb, 'full')] = wp_get_attachment_image_url($thumb, 'arc_thumb_small');
			}
		}
		if ( is_ssl() ) {
			$thumbs2 = str_replace( 'http://', 'https://', $thumbs2 );
		}
		if($thumbs2 != null) $thumb_visible = 'flex';
		else $thumb_visible = 'none';
		?>
		<?php if(xbox_get_field_value('my-theme-options', 'enable_thumbs_below') == 'on'):?>
			<div id="video_thumbnails_below" style="display: <?=$thumb_visible?>">
				<?php
				$thumbs_count = 0;
				foreach ($thumbs2 as $key => $value):
					if($thumbs_count >= 6): break;
					else:
					?>
				<p>
					<a href="<?php echo $key;?>" onclick="return false;" style="cursor: auto;">
						<!--<img src="<?php /*echo $value;*/?>" />-->
						<span style="display: block;width: 150px;height: 100px;
							background-image: url('<?=$value?>');
								background-position: center;
								background-repeat: no-repeat;
								background-size: cover"></span>
					</a>
				</p>
				<?php
				$thumbs_count++;
				endif;
				endforeach; ?>
			</div>
		<?php
		endif;
		?>
		<?php if( get_theme_mod('main_advertising_setting_video_under')) : ?>
			<div class="happy-under-player">
				<?php echo get_theme_mod('main_advertising_setting_video_under'); ?>
			</div>
		<?php endif; ?>
		<?php if( get_theme_mod('mob_advertising_setting_under')) : ?>
			<div class="happy-under-player-mobile">
				<?php echo get_theme_mod('mob_advertising_setting_under'); ?>
			</div>
		<?php endif; ?>
		<div class="title-block box-shadow">
			<h1 class="entry-title video-title" itemprop="name" style="margin: 0;white-space: break-spaces; max-width: 100%;"><?php the_title();?></h1>
		</div>
	</header>
	<div class="clear"></div>
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
			/*height: 100px !important;*/
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
		<button class="class-button" id="close-button" onclick="window.location.href = location;">
			<svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
				<line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
				<line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
			</svg>
		</button>
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
			/*background: <?=get_theme_mod('boxed_layout_background')?>;*/
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
	<div class="like_legend">
		<div>
				<div id="rating" style="padding-top: 0.9em;">
					<div style="display:inline-flex;align-items: flex-end;font-size: 16px !important;">
						<?php if( xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on' ) : ?>
							<span id="video-views"><span>0</span><?php echo esc_html__(' views', 'arc'); ?></span>
						<?php endif;?>
						<?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
							<span style="margin-right: 10px;margin-left: 10px;"></span>
							<span class="percentage" style="font-size: 16px !important;">0%</span>
							<span style="margin-right: 10px;margin-left: 10px;"></span>
							<span id="video-rate" style="font-size: 16px !important;"><?php echo arc_getPostLikeLink(get_the_ID()); ?></span>
							<?php $is_rated_yet = arc_getPostLikeRate(get_the_ID()) === false ? " not-rated-yet" : ''; ?>
						<?php endif;?>
					</div>
				</div>
		</div>
		<div>
			<div id="video-tabs" class="tabs" style="width: 100%; float: none;display: inline-flex;flex-flow: nowrap;">
				<button class="tab-link active about" data-tab-id="video-about">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0.820312 11.6636V17.9158C0.820312 19.0654 1.75565 19.9999 2.90438 19.9999H17.9098C19.0594 19.9999 19.9938 19.0654 19.9938 17.9158V11.6636H0.820312Z" fill="white"/>
						<path d="M9.87729 1.90576L6.75781 2.64603L9.37125 6.49159L12.75 5.72299L9.87729 1.90576Z" fill="white"/>
						<path d="M5.88941 2.85205L2.52734 3.64898L5.11327 7.45871L8.49699 6.68926L5.88941 2.85205Z" fill="white"/>
						<path d="M19.9778 3.63746L19.2684 0.94649C19.105 0.292075 18.4348 -0.119713 17.7737 0.0311611L14.9727 0.6964L17.6303 4.61449L19.6669 4.151C19.7777 4.12599 19.8728 4.05679 19.9311 3.96011C19.9895 3.86344 20.0062 3.7475 19.9778 3.63746Z" fill="white"/>
						<path d="M14.1054 0.902344L10.7617 1.69595L13.6394 5.5215L16.758 4.81207L14.1054 0.902344Z" fill="white"/>
						<path d="M5.0174 7.49658L3.68359 10.8303H6.95395L8.28776 7.49658H5.0174Z" fill="white"/>
						<path d="M9.18926 7.49658L7.85547 10.8303H11.1258L12.4596 7.49658H9.18926Z" fill="white"/>
						<path d="M19.5768 7.49658H17.5252L16.1914 10.8311H19.9936V7.91337C19.9936 7.68247 19.8077 7.49658 19.5768 7.49658Z" fill="white"/>
						<path d="M13.3573 7.49658L12.0234 10.8303H15.293L16.6276 7.49658H13.3573Z" fill="white"/>
						<path d="M1.66151 3.85596L0.982086 4.01684C0.651146 4.09186 0.371046 4.29275 0.193482 4.58122C0.0159181 4.8705 -0.0366007 5.21062 0.0459289 5.53988L0.818707 8.5943V10.8301H2.78773L4.039 7.70316L4.2424 7.65732L1.66151 3.85596Z" fill="white"/>
					</svg><span><?php echo esc_html__('About', 'arc'); ?></span></button>
				<?php /*if(xbox_get_field_value('my-theme-options', 'enable-membership') == 'on') :*/
				if(xbox_get_field_value('my-theme-options', 'enable_playlists_tab') == 'on') :?>
					<?php if(is_user_logged_in()) :?>
						<button class="tab-link playlist" data-tab-id="video-playlist" style="padding-top: 14px !important; padding-bottom: 13px !important;">
							<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect y="7" width="16" height="2" rx="1" fill="white"/>
								<rect x="7" y="16" width="16" height="2" rx="1" transform="rotate(-90 7 16)" fill="white"/>
							</svg><span><?php echo esc_html__('Add to playlist', 'arc'); ?></span></button>
					<?php else:?>
						<?php if(xbox_get_field_value('my-theme-options','video_login') == 'popup'):?>
							<button class="tab-link playlist" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');" style="padding-top: 14px !important; padding-bottom: 13px !important;">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect y="7" width="16" height="2" rx="1" fill="white"/>
									<rect x="7" y="16" width="16" height="2" rx="1" transform="rotate(-90 7 16)" fill="white"/>
								</svg>
								<span><?php echo esc_html__('Add to playlist', 'arc'); ?></span></button>
						<?php else:?>
							<button class="tab-link playlist" onclick="location.href = arc_ajax_var.loginUrl" style="padding-top: 14px !important; padding-bottom: 13px !important;">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<rect y="7" width="16" height="2" rx="1" fill="white"/>
									<rect x="7" y="16" width="16" height="2" rx="1" transform="rotate(-90 7 16)" fill="white"/>
								</svg><span><?php echo esc_html__('Add to playlist', 'arc'); ?></span></button>
						<?php endif;?>
					<?php endif;?>
				<?php endif;?>
				<?php //endif;?>
				<?php if( xbox_get_field_value( 'my-theme-options', 'video-share' ) == 'on' ) : ?>
					<button class="tab-link share" data-tab-id="video-share">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#share_clip)">
								<path d="M19.7881 6.99764L14.0737 1.2834C13.9323 1.142 13.765 1.07129 13.5715 1.07129C13.3781 1.07129 13.2106 1.142 13.0693 1.2834C12.9279 1.42487 12.8571 1.59229 12.8571 1.78572V4.64284H10.3572C5.05189 4.64284 1.79686 6.14214 0.591329 9.14065C0.197097 10.1376 0 11.3765 0 12.8572C0 14.0922 0.472493 15.77 1.4174 17.8906C1.43968 17.9428 1.47862 18.0319 1.53452 18.1584C1.59038 18.2847 1.64053 18.3963 1.68517 18.4932C1.72997 18.5898 1.77837 18.6716 1.8304 18.7385C1.9196 18.865 2.02382 18.9285 2.14289 18.9285C2.25449 18.9285 2.34194 18.8913 2.40523 18.8169C2.46836 18.7425 2.49999 18.6494 2.49999 18.5381C2.49999 18.4709 2.49068 18.3725 2.47204 18.2422C2.45343 18.1119 2.44409 18.0247 2.44409 17.98C2.40683 17.4742 2.38823 17.0163 2.38823 16.6073C2.38823 15.8559 2.45343 15.1825 2.58352 14.5873C2.71381 13.992 2.89422 13.4769 3.12493 13.0415C3.35561 12.6061 3.65313 12.2306 4.01781 11.9144C4.38234 11.5981 4.77477 11.3396 5.19515 11.1387C5.61562 10.9377 6.11039 10.7796 6.6796 10.6643C7.24876 10.549 7.82164 10.469 8.39835 10.4243C8.97506 10.3796 9.62796 10.3574 10.3572 10.3574H12.8571V13.2146C12.8571 13.4081 12.9278 13.5755 13.0691 13.7168C13.2106 13.8581 13.3779 13.9289 13.5713 13.9289C13.7647 13.9289 13.9321 13.8581 14.0737 13.7168L19.788 8.0024C19.9294 7.86101 20 7.69366 20 7.5002C20 7.30677 19.9294 7.13931 19.7881 6.99764Z" fill="white"/>
							</g>
							<defs>
								<clipPath id="share_clip">
									<rect width="20" height="20" fill="white"/>
								</clipPath>
							</defs>
						</svg><span><?php echo esc_html__('Share', 'arc'); ?></span></button>
				<?php endif; ?>

				<?php if(xbox_get_field_value('my-theme-options', 'enable_report_video') == 'on') : ?>
					<button class="tab-link report" data-tab-id="video-report">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15.8814 9.79415C15.6652 9.53344 15.6652 9.15571 15.8814 8.89508L18.2135 6.08426C18.3877 5.87425 18.4249 5.58243 18.3089 5.3354C18.1928 5.08838 17.9446 4.93066 17.6716 4.93066H13.6682V9.16558C13.6682 10.3197 12.7293 11.2586 11.5752 11.2586H8.30469V13.0545C8.30469 13.4433 8.61991 13.7586 9.00875 13.7586H17.6716C17.9446 13.7586 18.1928 13.6008 18.3089 13.3538C18.4249 13.1068 18.3877 12.815 18.2135 12.605L15.8814 9.79415Z" fill="white"/>
							<path d="M12.2787 9.16555V1.74577C12.2787 1.35694 11.9634 1.04171 11.5746 1.04171H3.70452C3.70452 0.46641 3.23811 0 2.66281 0C2.0875 0 1.62109 0.46641 1.62109 1.04171C1.62109 1.58528 1.62109 18.6751 1.62109 18.9583C1.62109 19.5336 2.0875 20 2.66281 20C3.23811 20 3.70452 19.5336 3.70452 18.9583C3.70452 18.4761 3.70452 10.2005 3.70452 9.86961H11.5746C11.9634 9.86961 12.2787 9.55439 12.2787 9.16555Z" fill="white"/>
						</svg><span><?php echo esc_html__('Report', 'arc'); ?></span></button>
				<?php endif;?>
				<div class="video_tab_separator">
					<div class="separator"></div>
				</div>

				<!--download video button-->
				<?php
				if ($format == 'mp4' || $format == 'webm') {
					$video_download_url = get_post_meta($post->ID, 'video_url', true);
				if( $video_download_url != '' && xbox_get_field_value( 'my-theme-options', 'display-tracking-button' ) == 'on' ) : ?>
					<a class="tab-link download_video" id="tracking-url" href="<?php echo $video_download_url; ?>" data-format="<?=$format?>">
						<svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#download_clip)">
								<path d="M17.8328 12.3374C17.4135 12.3374 17.0758 12.6751 17.0758 13.0944V17.5735H1.92031V13.0944C1.92031 12.6751 1.58262 12.3374 1.16328 12.3374C0.743945 12.3374 0.40625 12.6751 0.40625 13.0944V18.3343C0.40625 18.7536 0.743945 19.0913 1.16328 19.0913H17.8328C18.2521 19.0913 18.5898 18.7536 18.5898 18.3343V13.0944C18.5898 12.6751 18.2521 12.3374 17.8328 12.3374Z" fill="white"/>
								<path d="M8.96426 13.5878C9.37617 13.9849 9.86973 13.7808 10.0367 13.5878L14.6457 8.98252C14.9426 8.68564 14.9426 8.20693 14.6457 7.91006C14.3488 7.61318 13.8701 7.61318 13.5732 7.91006L10.2557 11.2239V1.60518C10.2557 1.18584 9.91797 0.848145 9.49863 0.848145C9.0793 0.848145 8.7416 1.18584 8.7416 1.60518V11.2202L5.42402 7.90635C5.12715 7.60947 4.64844 7.60947 4.35156 7.90635C4.05469 8.20322 4.05469 8.68193 4.35156 8.97881L8.96426 13.5878Z" fill="white"/>
							</g>
							<defs>
								<clipPath id="download_clip">
									<rect width="19" height="19" fill="white" transform="translate(0 0.499512)"/>
								</clipPath>
							</defs>
						</svg>
						<?php echo xbox_get_field_value( 'my-theme-options', 'tracking-button-text' ); ?>
					</a>
				<?php endif; ?>
				<?php } else {
				if( xbox_get_field_value( 'my-theme-options', 'tracking-button-link' ) != '' ){
					$tracking_url = xbox_get_field_value( 'my-theme-options', 'tracking-button-link' );
				} else{
					$tracking_url = get_post_meta($post->ID, 'tracking_url', true);
				}
				if( $tracking_url != '' && xbox_get_field_value( 'my-theme-options', 'display-tracking-button' ) == 'on' ) : ?>
					<a target="_blank" id="tracking-url2" href="<?php echo $tracking_url; ?>" title="<?php the_title(); ?>" class="tab-link video-download" data-format="<?=$format?>">
						<svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g clip-path="url(#track_clip)">
								<path d="M17.8328 12.3374C17.4135 12.3374 17.0758 12.6751 17.0758 13.0944V17.5735H1.92031V13.0944C1.92031 12.6751 1.58262 12.3374 1.16328 12.3374C0.743945 12.3374 0.40625 12.6751 0.40625 13.0944V18.3343C0.40625 18.7536 0.743945 19.0913 1.16328 19.0913H17.8328C18.2521 19.0913 18.5898 18.7536 18.5898 18.3343V13.0944C18.5898 12.6751 18.2521 12.3374 17.8328 12.3374Z" fill="white"/>
								<path d="M8.96426 13.5878C9.37617 13.9849 9.86973 13.7808 10.0367 13.5878L14.6457 8.98252C14.9426 8.68564 14.9426 8.20693 14.6457 7.91006C14.3488 7.61318 13.8701 7.61318 13.5732 7.91006L10.2557 11.2239V1.60518C10.2557 1.18584 9.91797 0.848145 9.49863 0.848145C9.0793 0.848145 8.7416 1.18584 8.7416 1.60518V11.2202L5.42402 7.90635C5.12715 7.60947 4.64844 7.60947 4.35156 7.90635C4.05469 8.20322 4.05469 8.68193 4.35156 8.97881L8.96426 13.5878Z" fill="white"/>
							</g>
							<defs>
								<clipPath id="track_clip">
									<rect width="19" height="19" fill="white" transform="translate(0 0.499512)"/>
								</clipPath>
							</defs>
						</svg>
						<?php echo xbox_get_field_value( 'my-theme-options', 'tracking-button-text' ); ?>
					</a>
					<script>
						jQuery(document).ready(function ($){
							$('#tracking-url2').on('click', function (){
								$(this).target = "_blank";
								window.open($(this).prop('href'));
							});

						});
					</script>
				<?php endif;
				}?>

				<?php if(is_user_logged_in()):?>
					<?php
					$favorite_videos = get_user_meta(get_current_user_id(), 'favorites_video', true);
					if($favorite_videos === false) {
						$data_add = 'off';
						$i_code = '<i class="fa fa-heart-o"></i>';
					} else {
						$favorite_videos = explode(',', $favorite_videos);
						foreach ($favorite_videos as $favorite_video) {
							if($post->ID == $favorite_video) {
								$data_add = 'on';
								$i_code = '<i class="fa fa-heart"></i>';
								break;
							} else {
								$data_add = 'off';
								$i_code = '<i class="fa fa-heart-o"></i>';
							}
						}
					}
					?>
					<a id="add_to_fav_video" href="#"
					   data-post="<?=$post->ID?>"
					   data-user="<?=get_current_user_id()?>"
					   data-add="<?=$data_add?>"
					><?php echo $i_code;?></a>
				<?php else:?>
					<?php if(xbox_get_field_value('my-theme-options','video_login') == 'popup'):?>
						<a id="add_to_fav_video2" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');" ><i class="fa fa-heart-o"></i></a>
					<?php else:?>
						<a id="add_to_fav_video2" href="<?php echo wp_login_url();?>"><i class="fa fa-heart-o"></i></a>
					<?php endif;?>
				<?php endif;?>
			</div>
		</div>
	</div>
	<div class="entry-content under_video">
		<div class="tab-content">
			<?php if( xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on' || xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
				<?php if( xbox_get_field_value( 'my-theme-options', 'show-author' ) == 'on' ) :
					?>
					<?php
					$authorID = $post->post_author;
					?>
					<div id="video_info_about_user" style="display: block">
						<div>
							<div class="user_pic" style="text-align: center;margin-top:0; height: 80px; width: 80px;clear: both;float: left;">
								<a href="/public-profile/?xxx=<?=$authorID?>">
									<?php
									if(get_user_meta($authorID, 'personal_foto', true) != false) :?>
										<img style="width: 80px; height: 80px; border-radius: 4px" src="<?php echo get_user_meta($authorID,'personal_foto', true);?>" />
										<!--<div style="width:100%;margin: 0 auto;
												background: url('<?php /*echo get_user_meta($authorID,'personal_foto', true);*/?>') no-repeat;
												background-size: contain;
												background-position: center;"></div>-->
									<?php else:?>
										<svg width="80" height="80" viewBox="0 0 212 212" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect width="212" height="212" rx="4" fill="#200437"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M81.0001 0H8L69.5808 106.661L8.76343 212H81.7635L106.081 169.881L130.398 212H203.398L142.581 106.661L204.162 0H131.162L106.081 43.4412L81.0001 0Z" fill="#C32CE2" fill-opacity="0.1"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2" fill-opacity="0.5"/>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="url(#paint0_linear)"/>
											<defs>
												<linearGradient id="paint0_linear" x1="79.4282" y1="68.8369" x2="159.667" y2="207.876" gradientUnits="userSpaceOnUse">
													<stop stop-color="#BA25D6"/>
													<stop offset="1" stop-color="#200437"/>
												</linearGradient>
											</defs>
										</svg>
									   <!-- <div style="width:100%;margin: 0 auto;
												background: url('<?php /*echo get_template_directory_uri(). '/assets/img/picture.png'*/?>') no-repeat;
												background-size: contain;
												background-position: center;"></div>-->
									<?php endif;?>
								</a>
							</div>
							<div id="video_subs_edit_btn" style="display: flex;
									justify-content: space-between;
									flex-wrap: wrap;
									align-items: center;">
								<div style="margin-top: 15px;">
									<?php
									if(!empty(get_userdata($authorID)->display_name)):?>
										<span class="user"><a href="/public-profile/?xxx=<?=$authorID?>"><?php echo get_userdata($authorID)->display_name;?></a></span><br>
										<span class="count_videos" style="white-space: nowrap;"><?=(count_user_posts($authorID) == 0) ? '0 <span>videos</span>': my_number_format(count_user_posts($authorID)) .'<span> videos</span>';?></span>
										<?php $get_subscribers_count = $wpdb->get_var("SELECT COUNT(*) FROM `wp_usermeta` WHERE `meta_key`= 'subscribe_author' AND `meta_value`= ". $authorID); ?>
										<span class="count_subs" style="white-space: nowrap;"><?=($get_subscribers_count == 0) ? '0 <span> subscribers</span>' : my_number_format($get_subscribers_count) . ' <span> subscribers</span>'?></span>
									<?php endif; ?>
								</div>
								<div style="margin-top: 10px;/*margin-right: 20px;*/ display: inline-flex" id="user_buttons_desktop">
									<!--edit video button---->
									<?php if(is_user_logged_in() && get_the_author_meta('ID') == wp_get_current_user()->ID || current_user_can('administrator')):?>
										<button style="white-space: nowrap;margin-right: 20px;" id="edit_user_video" class="button button-primary"><?php echo __('Edit video', 'arc');?></button>
									<?php endif;?>
									<!--subscribe user button---->
									<?php
									if(xbox_get_field_value( 'my-theme-options', 'show_subscribe_button' ) == 'on'):
										?>
										<?php
										if(is_user_logged_in()):
											if($authorID != wp_get_current_user()->ID):
												$subscriptions = get_user_meta(get_current_user_id(), 'subscribe_author');
												if(count($subscriptions) == 0)$subs_text = 'Subscribe';
												else {
													foreach($subscriptions as $subscription):
														if($authorID == $subscription){
															$subs_text = 'Unsubscribe';
															$data_subs = 'on';
														} else {
															$subs_text = 'Subscribe';
															$data_subs = 'off';
														}
													endforeach;
												}
												?>
												<button style="margin-right: 20px;" id="subscribe_on_author" data-author="<?php echo $authorID?>" data-subscribe="<?=$data_subs?>" class="button button-primary"><?php echo $subs_text;?></button>
											<?php endif;?>
										<?php else:?>
											<?php if(xbox_get_field_value('my-theme-options','video_login') == 'popup'):?>
												<button style="margin-right: 20px;" id="subscribe_on_author" class="button button-primary forLoggedOut" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');"><?php echo __('Subscribe', 'arc');?></button>
											<?php else:?>
												<a style="margin-right: 20px;" id="subscribe_on_author" class="button button-primary forLoggedOut" href="<?php echo wp_login_url(); ?>"><?php echo __('Subscribe', 'arc');?></a>
											<?php endif;?>
										<?php endif;?>
									<?php endif;?>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<div id="video-about" class="width100">
				<div class="video_about_container">
					<?php if(is_user_logged_in() && get_the_author_meta('ID') == wp_get_current_user()->ID || current_user_can('administrator')):
						$categories = get_categories([
							'taxonomy'     => 'category',
							'type'         => 'post',
							'child_of'     => 0,
							'orderby'      => 'name',
							'order'        => 'ASC',
							'hide_empty'   => 0,
							'hierarchical' => 1,
							'number'       => 0,
							'pad_counts'   => false,
						]);
						?>
						<form id="message" style="display: none;" enctype="multipart/form-data" method="POST">
							<fieldset class="fieldset">
								<div class="form_edit_video_container" style="display: flex; justify-content: space-between; flex-wrap: wrap;margin-bottom: 20px;">
									<div style="width: 50%" class="div_video_form_title_desc">
										<label for="title-video">Title</label><br>
										<input type="text" name="title" id="title-video" style="width:15em" placeholder="Title" value="<?=$post->post_title;?>" /><br>
										<label for="description-video">Description</label><br>
										<textarea name="description" id="description-video" style="width:15em;min-height: 84px" placeholder="Description"><?=$post->post_content;?></textarea><br>
									</div>
									<div style="width: 50%" class="div_video_form_cat_thumb">
										<div style="display: inline-flex; justify-content: space-between; flex-wrap: wrap;">
											<div style="width: 50%">
												<label for="video_category_select">Category</label><br>
												<select size="1" name="category" id="video_category_select">
													<?php
													if($categories) {
														foreach($categories as $cat) {
															echo '<option value="'. $cat->name .'">'. $cat->name .'</option>';
														}
													}
													?>
												</select><br>
											</div>
											<div style="width: 50%">
												<label for="thumbnail-video">Thumbnail</label><br>
												<script>
													jQuery(document).ready(function ($) {
														$('#video_file_upload #btn').on('click', () => {
															$('input#thumbnail-video').trigger('click');
														});
														$('input[type="file"]').on('change', function (event, files, label) {
															var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '')
															$('div#btn').text(file_name);
														});
													});
												</script>
												<div id="video_file_upload">
													<div id="btn" style="height: 38px;padding: 11px 12px !important;">+ Select a Thumbnail</div>
												</div>
												<?php wp_nonce_field( 'arc_file_upload', 'fileup_nonce' ); ?>
												<input style="display: none" type="file" accept="image/png, image/jpg, image/jpeg" name="arc_file_upload" id="thumbnail-video" value="<?php if(isset($FILES['arc-video_file'])) echo $FILES['arc-video_file'];?>"/><br>
											</div>
										</div>

										<div style="/*display: inline-flex; justify-content: space-between; flex-wrap: wrap;*/" class="div_video_form_tags">
											<div style="width: 100%;" >
												<label for="tag-video">Tags</label><br>
												<input type="text" name="tag" id="tag-video" placeholder="Tags (separated by commas)" style="margin-right: 10px !important;max-width:205px!important;">
												<span id="remove_video_tags" style="max-width:150px!important;cursor:pointer; font-size: 16px;display: contents;" data-post-id="<?=$post->ID?>">
														<svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
															<g clip-path="url(#tags_clip)">
															<path d="M2.03469 0.677187C2.37969 0.677187 2.65969 0.957187 2.65969 1.30219V1.82312C4.00219 0.6525 5.71437 0 7.53906 0C11.6531 0 15 3.35906 15 7.4875C15 7.8325 14.72 8.1125 14.375 8.1125C14.03 8.1125 13.75 7.8325 13.75 7.4875C13.75 4.04812 10.9637 1.25 7.53906 1.25C6.03687 1.25 4.62563 1.78187 3.51313 2.73719H4.08594C4.43094 2.73719 4.71094 3.01719 4.71094 3.36219C4.71094 3.70719 4.43094 3.98719 4.08594 3.98719H2.03469C1.68969 3.98719 1.40969 3.70719 1.40969 3.36219V1.30219C1.40969 0.957187 1.68969 0.677187 2.03469 0.677187Z" fill="white" fill-opacity="0.5"/>
															<path d="M0.624062 6.8877C0.969061 6.8877 1.24906 7.1677 1.24906 7.5127C1.24906 10.9521 4.03531 13.7502 7.46 13.7502C8.94469 13.7502 10.3409 13.2314 11.4472 12.2971H10.8469C10.5019 12.2971 10.2219 12.0171 10.2219 11.6721C10.2219 11.3271 10.5019 11.0471 10.8469 11.0471H12.8984C12.9041 11.0471 12.9091 11.0486 12.9144 11.0486C12.9381 11.0493 12.9616 11.0524 12.9853 11.0558C13.0028 11.0583 13.0203 11.0599 13.0375 11.0639C13.0581 11.0686 13.0784 11.0761 13.0988 11.083C13.1175 11.0896 13.1366 11.0952 13.1547 11.1033C13.1719 11.1111 13.1881 11.1211 13.2047 11.1305C13.2244 11.1418 13.2437 11.1527 13.2622 11.1658C13.2669 11.1693 13.2722 11.1711 13.2769 11.1749C13.2875 11.183 13.2956 11.193 13.3056 11.2018C13.3222 11.2161 13.3388 11.2305 13.3538 11.2468C13.3678 11.2618 13.38 11.2774 13.3922 11.2933C13.4044 11.3093 13.4162 11.3252 13.4272 11.3421C13.4381 11.3596 13.4475 11.3777 13.4566 11.3958C13.4656 11.4136 13.4741 11.4318 13.4813 11.4505C13.4884 11.4699 13.4941 11.4893 13.4994 11.5093C13.5044 11.5283 13.5097 11.5474 13.5128 11.5671C13.5166 11.5893 13.5181 11.6114 13.5197 11.6339C13.5206 11.6468 13.5234 11.6593 13.5234 11.6724V13.7324C13.5234 14.0774 13.2434 14.3574 12.8984 14.3574C12.5534 14.3574 12.2734 14.0774 12.2734 13.7324V13.2355C10.9412 14.3696 9.25469 15.0002 7.46 15.0002C3.34594 15.0002 -0.000938416 11.6411 -0.000938416 7.5127C-0.000938416 7.1677 0.279061 6.8877 0.624062 6.8877Z" fill="white" fill-opacity="0.5"/>
															</g>
															<defs>
															<clipPath id="tags_clip">
															<rect width="15" height="15" fill="white" transform="matrix(-1 0 0 1 15 0)"/>
															</clipPath>
															</defs>
															</svg> Remove</span>
											</div>
											<div>
												<br>
												<div class="remove-all-tag"><?php arc_get_tags_for_form(); ?> <?php if (get_the_tags($post->ID)):?><?php endif;?></div><br>
											</div>
										</div>
									</div>
								</div>
								<input type="hidden" name="post_id" value="<?=$post->ID?>">
								<input type="submit" value="Apply" id="apply_btn">
								<input id="close_btn" type="button" value="Close" onclick="document.getElementById('message').style.display = 'none';document.getElementById('edit_user_video').style.display='block'">
								<div style="float:right;display: flex;align-items: center; flex-wrap: nowrap;">
									<svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#close_clip)">
											<path d="M11.8295 2.19544H10.2232V2.11133C10.2232 1.22281 9.50043 0.5 8.61191 0.5H6.38168C5.49316 0.5 4.77036 1.22281 4.77036 2.11133V2.19544H3.16406C2.67872 2.19544 2.28516 2.58889 2.28516 3.07435V3.74429C2.28516 3.90611 2.41631 4.03725 2.57812 4.03725H12.4155C12.5773 4.03725 12.7084 3.90611 12.7084 3.74429V3.07435C12.7084 2.58889 12.315 2.19544 11.8295 2.19544ZM5.64926 2.11133C5.64926 1.70747 5.97782 1.37891 6.38168 1.37891H8.61191C9.01577 1.37891 9.34433 1.70747 9.34433 2.11133V2.19544H5.64926V2.11133Z" fill="white"/>
											<path d="M2.66406 4.91602L3.37417 15.091C3.3903 15.3212 3.58176 15.4999 3.81259 15.4999H11.1802C11.411 15.4999 11.6025 15.3212 11.6185 15.091L12.3285 4.91602H2.66406ZM5.75717 14.0053C5.75088 14.0056 5.74447 14.0057 5.73817 14.0057C5.50414 14.0057 5.30948 13.821 5.29952 13.5849L5.00655 6.70015C4.99614 6.45765 5.18439 6.25269 5.4269 6.24239C5.66951 6.23243 5.87436 6.42034 5.88466 6.66284L6.17763 13.5476C6.18793 13.7901 5.99967 13.995 5.75717 14.0053ZM7.93578 13.5663C7.93578 13.809 7.73906 14.0057 7.49633 14.0057C7.2536 14.0057 7.05688 13.809 7.05688 13.5663V6.68149C7.05688 6.43877 7.2536 6.24204 7.49633 6.24204C7.73906 6.24204 7.93578 6.43877 7.93578 6.68149V13.5663ZM9.69325 13.5849C9.68318 13.8211 9.48852 14.0057 9.25449 14.0057C9.24819 14.0057 9.24178 14.0056 9.23549 14.0054C8.99299 13.9951 8.80473 13.7901 8.81503 13.5476L9.108 6.66284C9.11842 6.42034 9.32361 6.2322 9.56577 6.2425C9.80827 6.2528 9.99652 6.45765 9.98622 6.70015L9.69325 13.5849Z" fill="white"/>
										</g>
										<defs>
											<clipPath id="close_clip">
												<rect width="15" height="15" fill="white" transform="translate(0 0.5)"/>
											</clipPath>
										</defs>
									</svg>
									<input id="delete_user_video" data-post="<?=$post->ID;?>" type="button" value="Delete video" name="delete_video" >
								</div>

							</fieldset>
							<div class="separator_video"></div>
						</form>
					<?php endif;?>
					<?php if(wp_is_mobile()):?>
					<div id="user_buttons_mobile" style="width: 100%;margin: 0 auto;text-align: center;display: none;">
						<div style="margin-bottom: 25px;display: inline-flex;">
						<!--edit video button---->
						<?php if(is_user_logged_in() && get_the_author_meta('ID') == wp_get_current_user()->ID || current_user_can('administrator')):?>
							<button style="white-space: nowrap;margin-right: 20px;" id="edit_user_video" class="button button-primary"><?php echo __('Edit video', 'arc');?></button>
						<?php endif;?>
						<!--subscribe user button---->
						<?php if(xbox_get_field_value( 'my-theme-options', 'show_subscribe_button' ) == 'on'):?>
							<?php if(is_user_logged_in()):
								if($authorID != wp_get_current_user()->ID):
									$subscriptions = get_user_meta(get_current_user_id(), 'subscribe_author');
									foreach($subscriptions as $subscription):
										if($authorID == $subscription){
											$subs_text = 'Unsubscribe';
											$data_subs = 'on';
										} else {
											$subs_text = 'Subscribe';
											$data_subs = 'off';
										}
									endforeach;?>
									<button id="subscribe_on_author" data-author="<?php echo $authorID?>" data-subscribe="<?=$data_subs?>" class="button button-primary"><?php echo $subs_text;?></button>
								<?php endif;?>
							<?php else:?>
								<?php if(xbox_get_field_value('my-theme-options','video_login') == 'popup'):?>
									<button id="subscribe_on_author" class="button button-primary forLoggedOut" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');"><?php echo __('Subscribe', 'arc');?></button>
								<?php else:?>
									<a id="subscribe_on_author" class="button button-primary forLoggedOut" href="<?php echo wp_login_url(); ?>"><?php echo __('Subscribe', 'arc');?></a>
								<?php endif;?>
							<?php endif;?>
						<?php endif;?>
						</div>
					</div>
					<?php endif;?>


					<div style="width: 100%">
						<?php if( xbox_get_field_value( 'my-theme-options', 'show-date' ) == 'on' ) : ?>
							<div id="video-date"><?php echo esc_html__('Uploaded on', 'arc'); ?>: <?php the_time('F j, Y') ?></div>
						<?php endif; ?>
					</div>
					<div style="width: 100%;display: inline-flex;">
						<?php $content = get_the_content();
						$video_in_content = false;
						$video_code = array();
						if( preg_match("/\[video.+\]/", get_the_content(), $video_code) ){
							$video_in_content = "/\[video.+\]/";
						}
						elseif( preg_match("/<iframe.+<\/iframe>/", get_the_content(), $video_code) ){
							$video_in_content = "/<iframe.+<\/iframe>/";
						}
						elseif( preg_match("/<video.+<\/video>/", get_the_content(), $video_code) ){
							$video_in_content = "/<video.+<\/video>/";
						}
						elseif( preg_match("/<object.+<\/object>/", get_the_content(), $video_code) ){
							$video_in_content = "/<object.+<\/object>/";
						}
						elseif( preg_match("/https:\/\/www.youtube.com\/watch\?v=.+?\b/", get_the_content(), $video_code) ){
							$video_in_content = "/https:\/\/www.youtube.com\/watch\?v=.+?\b/";
						}
						if(!empty($content)) : ?>
							<div class="video-description" style="width: 100%;">
								<?php if( xbox_get_field_value( 'my-theme-options', 'show-desc' ) == 'on' ) : ?>
									<?php if( xbox_get_field_value( 'my-theme-options', 'show-more-settings' ) == 'off' ){
										$content_max_height = 'max-height:none';
										$border_bottom = '1px solid ' . get_theme_mod( 'text_site_color' );
									} else {
										$content_max_height = 'max-height:70px';
										$border_bottom = 'none';
									}  ?>
									<div class="read-more-container">
										<input type="checkbox" id="read-more"/>
										<div class="content-video" style="<?=$content_max_height;?>;width: 100%; margin-top: 0px; margin-bottom: 10px; border-bottom: <?=$border_bottom?> !important;margin-left: 0;">
											<div class="read-more-list">
												<div id="check_content_height" style="font-family: 'Roboto',sans-serif!important;">
													<?php
													$embed_code = get_post_meta($post->ID, 'embed', true);
													$video_url = get_post_meta($post->ID, 'video_url', true);
													$video_shortcode = get_post_meta($post->ID, 'shortcode', true);
													if( $video_in_content != false && ($embed_code == '' && $video_shortcode == '' && $video_url == '' )  ):
														$content = preg_replace($video_in_content, "", get_the_content());
													endif;
													echo apply_filters('the_content', $content); ?>
												</div>
											</div>
										</div>
										<?php if( xbox_get_field_value( 'my-theme-options', 'show-more-settings' ) == 'on' ) : ?>
											<script>
												jQuery(document).ready(function ($){
													var h = $('#check_content_height').height();
													if(h > 69) $('div.read-more-container label.read-more-btn').css('display', 'block');
													else $('div.read-more-container label.read-more-btn').css('display', 'none');
												});
											</script>
											<label class="read-more-btn" for="read-more" style="display: none">
												<span class="readed">Read more <i class="fa fa-chevron-down"></i></span>
												<span class="read">Read less <i class="fa fa-chevron-up"></i></span>
											</label>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<!--<div class="separator_video"></div>-->
				<div id="pornstars_categ_video" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
					<?php $actors = wp_get_post_terms($post->ID, "pornstars"); ?>
					<?php if( xbox_get_field_value( 'my-theme-options', 'show-actors' ) == 'on' && !empty($actors) ) : ?>
						<div style="width: 48%">
								<div id="video-actors">
									<span><?php echo xbox_get_field_value( 'my-theme-options', 'actors-label' ); ?>:</span>
									<?php
									$w = xbox_get_field_value( 'my-theme-options', 'show-actors-pixels');
									$h = $w;
									if(xbox_get_field_value( 'my-theme-options', 'show-actors-thumb' ) == 'on'){
										$img_show = 'block';
										$mleft = 5;
										$pleft = xbox_get_field_value( 'my-theme-options', 'show-actors-pixels');
										$mbottom = ceil(xbox_get_field_value( 'my-theme-options', 'show-actors-pixels') / 2 - 2.5);
										$mtop = 2;
										if($pleft > 35) {
											$mbottom += 5;
										}
									 } else {
										$img_show = 'none';
										$mleft = 0;
										$pleft = 10;
										$mbottom  = 10;
										$mtop = 0;
									}?>
									<div class="pornstars_list">
									<?php foreach($actors as $actor) {
										$thumb_actor_url = get_post_meta($post->ID, 'thumb', true);
										$image_id = get_term_meta($actor->term_id, 'pornstars-image-id', true);
										if($thumb_actor_url) {
											$response = wp_remote_get($thumb_actor_url);
											$code = wp_remote_retrieve_response_code($response);
											if ($code != 200) {
												$back_img_url = get_template_directory_uri() . '/assets/img/no-image.jpg';
											} else {
												$back_img_url = $thumb_actor_url;
											}
										} else {
											if ($image_id === false) {
												$back_img_url = get_template_directory_uri() . '/assets/img/no-image.jpg';
											} else {
												$res = wp_remote_get(wp_get_attachment_image_url($image_id, 'full'));
												$code = wp_remote_retrieve_response_code($res);
												if ($code != 200) {
													$back_img_url = get_template_directory_uri() . '/assets/img/no-image.jpg';
												} else {
													$back_img_url = wp_get_attachment_image_url($image_id, 'full');
												}
											}
										}
										$actor_list[] = '<div style="margin-bottom: '.$mbottom.'px !important;float: left;display: inline-flex;align-items: baseline;"><div style="clear: both;
											float: left;
											position: absolute;
											background: url('.$back_img_url.');
											background-size: cover;
											background-repeat: no-repeat;
											background-position: center;
											object-fit: cover;
											width:'.$w.'px;
											height:'.$h.'px;
											border-radius: '.$w.'px;
											display:'.$img_show.'"></div>
											<div style="margin-top: '.$mtop.'px !important;"><a style="margin-left: '.$mleft.'px !important;float: left;padding-left: '.$pleft.'px !important;" href="' . get_term_link($actor->term_id) . '" title="' . $actor->name . '">' . $actor->name . '</a></div></div>';
									}
									foreach ($actor_list as $item) {
										echo $item;
									} ?>
									</div>
								</div>
						</div>
					<?php endif; ?>
					<?php if(xbox_get_field_value( 'my-theme-options', 'show-categories' ) == 'on' ):?>
					<div style="width: 48%">
						<div class="categories">
							<?php arc_entry_categories();?>
						</div>
					</div>
					<?php endif;?>
				</div>



				<?php if(xbox_get_field_value( 'my-theme-options', 'show-tags' ) == 'on') : ?>
				<?php if(get_the_tags()):?>
					<div class="load-more-tags-container">
						<input type="checkbox" id="load-more-tags"/>
						<?php arc_entry_footer(); ?>
						<?php if(get_the_tags()):?>
							<script>
								jQuery(document).ready(function ($){
									var a_tag_height = 0;
									var h_tag = $('.load-more-tags-container .tags-list').height();
									// $('.load-more-tags-container .tags-list a').each(function() {
									//     a_tag_height += $(this).height();
									// });
									//console.log(a_tag_height);

									var hidden_tag = $('.load-more-tags-container .tags-list .hidden-tags-list').height();
									/*console.log(h_tag);
									console.log(hidden_tag);*/
									if(h_tag > 60) $('div.load-more-tags-container label.load-more-tags-btn').css('display', 'block');
									else $('div.load-more-tags-container label.load-more-tags-btn').css('display', 'none');
								});
							</script>
						<label class="load-more-tags-btn" for="load-more-tags" style="display: none">
							<span class="unloaded">See more tags <i class="fa fa-chevron-down"></i> </span>
							<span class="loaded">See less tags <i class="fa fa-chevron-up"></i></span>
						</label>
						<?php endif;?>
					</div>
				<?php endif;?>
				<?php endif; ?>
			</div>
			<?php if( xbox_get_field_value( 'my-theme-options', 'video-share' ) == 'on' ) : ?>
				<?php get_template_part( 'template-parts/content', 'share-buttons' ); ?>
			<?php endif; ?>
			<?php
			//if(xbox_get_field_value('my-theme-options', 'enable-membership') == 'on') :
				if(!is_user_logged_in()) : ?>
					<div id="video-playlist" class="width70" style="padding-left: 10px;">
						<p> <?php echo __('You need to ');?>
							<span class="login"><a href="<?php echo wp_login_url();?>"><?php echo esc_html__('Login', 'arc'); ?></a></span>
							<span class="login"><?php wp_register(' or ', ''); ?></span>
						</p>
					</div>
				<?php
				else :
					get_template_part( 'template-parts/content', 'playlist' );
					?>
				<?php
				endif;
			//endif;
			?>
			<div id="video-report">
				<script>
					jQuery(document).ready(function($) {
						/*antispam read [start]*/
						function getCookie(name) {
							let matches = document.cookie.match(new RegExp(
								"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
							));
							return matches ? decodeURIComponent(matches[1]) : undefined;
						}
						if (getCookie('antispam_for_video') !== undefined) {
							let allId = getCookie('antispam_for_video').split("|,");
							for (let id in allId) {
								if (allId[id] === arc_ajax_var.postId) {
									$('#sendReport').remove();
									$('#reportSendMsg').css('display', 'block').text('The administrator has already received your report.');
									return;
								}
							}

						}
						if (Number(getCookie('timestamp_for_video')) + 300 > Math.floor(Date.now() / 1000) ){
							$('#sendReport').remove();
							$('#reportSendMsg').css('display', 'block').text('The report can be sent no more than once every 5 minutes.');
							return;
						}
						/*antispam read [end]*/
					});
				</script>
				<table>
					<tbody>
					<tr>
						<td>
							<p id="report_reason"><?php echo __('Report reason', 'arc');?></p>
							<select name="reportType" class="form-control" id="reportType">
								<option value="wrong"><?php echo __('Inappropriate content','arc');?></option>
								<option value="underage"><?php echo __('Underage nudity','arc');?></option>
								<option value="notWork"><?php echo __('Technical issues','arc');?></option>
								<option value="violent"><?php echo __('Violent or harmful acts','arc');?></option>
								<option value="spam"><?php echo __('Spam','arc');?></option>
								<option value="other"><?php echo __('Other','arc');?></option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<br>
						<textarea id="reportMsg" style="min-height: 120px;" rows="1" cols="10" placeholder="Describe the problem"></textarea></td>
					</tr>
					<tr>
						<td><button class="btn btn-info" id="sendReport"><?php echo __('Report', 'arc')?></button>
						<p id="reportSendMsg" style="display: none"><?php echo __('Thanks! We got your report.');?></p></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div><!-- .entry-content -->
	<?php if( xbox_get_field_value( 'my-theme-options', 'display-related-videos' ) == 'on' ) :
		get_template_part( 'template-parts/content', 'related' );
	endif; ?>
	<div class="clear"></div>
	<?php
	$i = 0;
	$k = 0;
	$terms = get_terms([
		'taxonomy' => 'playlists',
		'hide_empty'    => true,
		'fields'        => 'all',
		'count'         => true,
	]);
	if(count($terms) !== 0):
	foreach ($terms as $term):
		if(is_object_in_term($post->ID, 'playlists', $term->slug)):
			if($i >= 1): break;
			else:  ?>
		<?php
				$i++;
			endif;
		endif;
		endforeach;?>
	<?php
	echo '<div class="videos-list">';
		foreach ($terms as $term) {
		if(stripos($term->slug, 'watchlater') !== false) continue;
		else {
		 if(is_object_in_term($post->ID, 'playlists', $term->slug)):
			 if(in_array($term->term_id, get_user_meta(wp_get_current_user()->ID, 'userPlaylists')) === false):
				 if($k <= 0) {
					 echo '<h2 class="widget-title" style="margin-top: 20px;" id="playlists_that_contain">Playlists that contain this video</h2>';
					 $k++;
				 }
			 ?>
			 <article id="post-<?php the_ID();?>" class="thumb-block category-block post post-<?php the_ID(); ?>">
					<a href="<?php echo esc_url(home_url());?>/playlist/<?php echo $term->slug;?>/">
						<?php
						global $wpdb;
						$qw = "SELECT `object_id` FROM `wp_term_relationships` WHERE `term_taxonomy_id` =" . $term->term_id ." LIMIT 1";
						$object_id = $wpdb->get_var($qw);
						$image_post = get_post_meta($object_id, 'thumb', true);
						$image = get_term_meta($term->term_id, 'playlist-image', true);
						if($image == false && $image_post === false) {
							$back_img_url = get_template_directory_uri() .'/assets/img/no-cat-image.png';
						} elseif ($image_post){
							$back_img_url = $image_post;
						} else {
							$back_img_url = $image;
						}
						if(strpos($back_img_url, '(') !== false || strpos($back_img_url, ')') !== false) {
							$host         = parse_url($back_img_url, PHP_URL_HOST);
							$protocol     = parse_url($back_img_url, PHP_URL_SCHEME);
							$part_one     = $protocol .'://'. $host . '/';
							$part_twoo    = explode($part_one, $back_img_url)[1];
							$part_twoo    = urlencode($part_twoo);
							$res = $part_one . $part_twoo;
							$back_img_url = $res;
						}
						?>
						<div class="post-thumbnail" style="background-image: url(<?=$back_img_url;?>) !important;
								height: 204px;
								background-repeat: no-repeat;
								background-size: cover;
								object-fit: fill;
								background-position: top center;
								border-radius: 4px">
						</div>
						<header class="entry-header categories-entry-header" style="position: relative !important;
							display: inline-flex;
							justify-content: space-between;
							align-items: center;
							flex-wrap: wrap;">
							<span style="text-align: left;float: left;
									white-space: nowrap;
									text-overflow: ellipsis;
									overflow: hidden;
									width: 50%;" class="cat-title"><?php echo $term->name; ?></span>
							<span style="float: right;" class="cat-video-count"><?php echo $term->count;?><span><?=($term->count == 1) ? ' video': ' videos';?></span></span>
						</header>
					</a>
			 </article>
			<?php
				 endif;
		 endif;
		}
	} echo '</div>';
	?>
	<?php endif;?>
	<!---playlists--->
	<?php
	//echo $post->ID;
	// If comments are open or we have at least one comment, load up the comment template.
	if( get_option('allow_comments_to_all')['allow_comments_to_all'] == 'on') {
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	} ?>
</article>