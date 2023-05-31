<article id="post-<?php the_ID(); ?>" <?php if(xbox_get_field_value( 'my-theme-options', 'mob-number_videos_per_row' ) == '1') { post_class('thumb-block full-width'); }else{ post_class('thumb-block'); } ?>>
	<?php if(is_user_logged_in() && get_current_user_id() == $post->post_author) :?>
    <style>
        .video-debounce-bar--wait {
            top: 0!important;
        }
    </style>
	<?php endif;?>
    <?php
	if(!is_user_logged_in()) {
		$favoriteLogin = ' favoriteLoggedOut';
	} else $favoriteLogin = '';

	$user = wp_get_current_user();
	if(get_post_meta($post->ID, 'premium_video', true) == 'on') {
		if(!is_user_logged_in()) {
			$permalink   = '#';
			$data_toggle = "modal";
			$data_target = "#subscribeModal";
		} else {
			//if('on' === xbox_get_field_value('my-theme-options', 'enable-membership')) {
				$permalink  = get_the_permalink();
				$data_toggle=""; $data_target="";
			//}
		}
	} else {
		$permalink  = get_the_permalink();
		$data_toggle=""; $data_target="";
	}
	$mime_type_thumb = ['jpg|jpeg|jpe' => 'image/jpeg', 'png' => 'image/png'];
    if(get_post_meta($post->ID, 'hd_video', true) == 'on' && get_post_meta($post->ID, 'premium_video', true) == 'on') {
	    $premium_margin = 'right: 40px;';
    }
	?>
	<a href="<?php echo $permalink; ?>" title="<?php the_title(); ?>" data-toggle="<?php echo $data_toggle;?>" data-target="<?php echo $data_target;?>">
        <!-- Trailer -->
		<?php $trailer_url = get_post_meta($post->ID, 'trailer_url', true);
		$trailer_format = explode( '.',  $trailer_url);
		$trailer_format = $trailer_format[ count( $trailer_format ) - 1];
		$thumb_url = get_post_meta($post->ID, 'thumb', true);
		$thumb_parts = explode('.', $thumb_url);
		if(count($thumb_parts) <= array_key_last($thumb_parts) || count($thumb_parts) == 1) {
			$allow = wp_check_filetype($thumb_url, $mime_type_thumb);
			if(!$allow['type']) {
				$thumb_url = get_template_directory_uri() . '/assets/img/no-image.png';
			}
		}
		?>
		<?php if( $trailer_url != '' /*&& !wp_is_mobile()*/ && $trailer_url !== false && $trailer_url !== 'false' && $trailer_url !== 'http://false' && $trailer_url !== 'https://false') : ?>
			<?php
			if ( get_the_post_thumbnail() != '' ) {
				$poster_url = get_the_post_thumbnail_url($post->ID, xbox_get_field_value( 'my-theme-options', 'thumb_quality' ));
			}elseif( $thumb_url != '' ){
				$poster_url = $thumb_url;
			} ?>
			<div class="post-thumbnail video-with-trailer">
				<?php if(xbox_get_field_value( 'my-theme-options', 'enable_duration' ) == 'on' && get_post_meta($post->ID, 'duration', true) !== false) : ?><span class="duration">
					<?php if((int)get_post_meta($post->ID, 'hours', true) > 0 && (int)get_post_meta($post->ID, 'hours', true) <= 9) {echo '0' . (int)get_post_meta($post->ID, 'hours', true) . ':'; }if((int)get_post_meta($post->ID, 'hours', true) >= 10 && (int)get_post_meta($post->ID, 'hours', true) < 23) {echo (int)get_post_meta($post->ID, 'hours', true) . ':'; }  if((int)get_post_meta($post->ID, 'minute', true) >= 0 && (int)get_post_meta($post->ID, 'minute', true) <= 9) {echo '0'. (int)get_post_meta($post->ID, 'minute', true) . ":"; } else echo (int)get_post_meta($post->ID, 'minute', true) . ":";  if((int)get_post_meta($post->ID, 'second', true) >= 0 && (int)get_post_meta($post->ID, 'second', true) < 10) echo '0' . (int)get_post_meta($post->ID, 'second', true); else echo (int)get_post_meta($post->ID, 'second', true);?></span><?php endif; ?>
                <div class="play-icon">
                    <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.7031 0C7.41884 0 0.703125 6.71572 0.703125 15C0.703125 23.2842 7.41884 29.9999 15.7031 29.9999C23.9873 29.9999 30.7031 23.2842 30.7031 15C30.6943 6.71942 23.9837 0.00885184 15.7031 0ZM22.0202 15.4779C21.9163 15.6862 21.7475 15.8551 21.5392 15.9589V15.9643L12.9678 20.25C12.4384 20.5145 11.7949 20.2998 11.5304 19.7705C11.4552 19.62 11.4164 19.4539 11.4174 19.2857V10.7143C11.4171 10.1225 11.8966 9.64266 12.4883 9.64235C12.6547 9.64228 12.8189 9.68096 12.9678 9.75535L21.5392 14.0411C22.0688 14.305 22.2842 14.9483 22.0202 15.4779Z" fill="white" fill-opacity="0.5"/>
                    </svg>
                </div>
				<div class="lds-dual-ring"></div>
				<video class="arc-trailer" preload="none" muted loop poster="<?php echo $poster_url; ?>">
					<source src="<?php echo $trailer_url; ?>" type='video/<?php echo $trailer_format; ?>' />
				</video>
				<?php if(get_post_meta($post->ID, 'hd_video', true) == 'on') : ?>
                    <span class="hd-video">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="">
                                    <rect x="1.5" y="4.5" width="27" height="21" fill="white"/>
                                    <path d="M28.8095 3.47412H1.19055C0.533001 3.47412 0 4.00723 0 4.66467V25.3356C0 25.9931 0.533001 26.5262 1.19055 26.5262H28.8096C29.467 26.5262 30.0001 25.9932 30.0001 25.3356V4.66467C30 4.00723 29.4669 3.47412 28.8095 3.47412ZM10.7554 19.6511L11.7878 16.0365H7.93466L6.90183 19.6511H4.53687L7.19402 10.3492H9.5596L8.46621 14.1763H12.3192L13.4126 10.3492H15.7784L13.1206 19.6511H10.7554ZM25.2527 15.0002C24.4668 17.7507 21.8773 19.6511 18.8876 19.6511H14.9812L16.7368 13.5055H19.1017L17.8855 17.7637H19.5729C21.0214 17.7637 22.3767 16.6477 22.8435 15.0137C23.3143 13.3657 22.5474 12.2364 21.0458 12.2364H17.0989L17.6381 10.3492H21.638C24.5614 10.3492 26.0418 12.2364 25.2527 15.0002Z" fill="#172030"/>
                                    </g>
                                    <defs>
                                    <clipPath >
                                    <rect width="30" height="30" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                    </span>
				<?php endif; ?>
				<?php if(get_post_meta($post->ID, 'premium_video', true) == 'on') :
					$premium_icon = px_get_premium_label_url();
					if(xbox_get_field_value('my-theme-options', 'use-premium-label') == 'off'){
						$premium_icon = (xbox_get_field_value('my-theme-options', 'thumb-premium-label')) ? xbox_get_field_value('my-theme-options', 'thumb-premium-label') : $premium_icon;
					} else {
						$premium_icon = (xbox_get_field_value('my-theme-options', 'dashboard-premium-label')) ? xbox_get_field_value('my-theme-options', 'dashboard-premium-label') : $premium_icon;
					}?><span class="premium-video"  style="<?=$premium_margin?>"><img class="img-responsive svg-crown" src="<?php echo $premium_icon;?>" /></span>
				<?php endif; ?>
				<?php if(has_term('watchlater'.$user->ID, 'playlists', get_the_ID())):?>
                    <span data-add="add" data-user="<?php echo $user->ID;?>" class="watchLaterIcon<?=$favoriteLogin?>" data-post="<?php the_ID(); ?>" style="display: none"><i class="fa fa-check" style="font-size: 24px"></i></span>
				<?php else: ?>
                    <span data-add="" data-user="<?php echo $user->ID;?>" class="watchLaterIcon<?=$favoriteLogin?>" data-post="<?php the_ID(); ?>" style="display: none"><i class="fa fa-plus" style="font-size: 24px"></i></span>
				<?php endif;?>
                <span class="edit_video_from_my_uploads" data-post-id="<?=$post->ID?>" style="
                                cursor:pointer;
                                position: absolute;
                                left: 5px;
                                top: 5px;" data-post-title="<?php the_title(); ?>" data-post-desc="<?=$post->post_content; ?>">
                    <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.601562" width="24" height="22" rx="4" fill="#1E2739" fill-opacity="0.8"/>
                        <g clip-path="url()">
                            <path d="M17.9515 10.2C17.5921 10.2 17.3015 10.4913 17.3015 10.85V16.05C17.3015 16.4081 17.0103 16.7 16.6516 16.7H7.55156C7.19272 16.7 6.9016 16.4081 6.9016 16.05V6.94999C6.9016 6.59187 7.19272 6.30004 7.55156 6.30004H12.7516C13.111 6.30004 13.4015 6.0088 13.4015 5.65008C13.4015 5.29124 13.111 5 12.7516 5H7.55156C6.47647 5 5.60156 5.8749 5.60156 6.94999V16.05C5.60156 17.1251 6.47647 18 7.55156 18H16.6516C17.7267 18 18.6016 17.1251 18.6016 16.05V10.85C18.6016 10.4905 18.3109 10.2 17.9515 10.2Z" fill="white"/>
                            <path d="M11.0873 10.5024C11.0475 10.5423 11.0207 10.5929 11.0094 10.6475L10.6071 12.6598C10.5883 12.753 10.6179 12.8492 10.685 12.917C10.7391 12.971 10.8119 13 10.8865 13C10.9047 13 10.9235 12.9983 10.9423 12.9944L12.9538 12.5921C13.0095 12.5806 13.0602 12.5539 13.0995 12.514L17.6016 8.01157L15.59 6L11.0873 10.5024Z" fill="white"/>
                            <path d="M19.2129 4.38827C18.6954 3.87058 17.8534 3.87058 17.3363 4.38827L16.6016 5.12306L18.4782 7L19.2129 6.26511C19.4635 6.01506 19.6016 5.6816 19.6016 5.32694C19.6016 4.97228 19.4635 4.63881 19.2129 4.38827Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath >
                                <rect width="14" height="14" fill="white" transform="translate(5.60156 4)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </span>
            </div>
		<?php else : ?>
			<!-- Thumbnail -->
			<div class="post-thumbnail <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>thumbs-rotation<?php endif; ?>"
			     <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>data-thumbs='<?php echo arc_get_multithumbs($post->ID);?>'<?php endif; ?>>
				<?php if(xbox_get_field_value( 'my-theme-options', 'enable_duration' ) == 'on' && get_post_meta($post->ID, 'duration', true) !== false) : ?><span class="duration">
					<?php if((int)get_post_meta($post->ID, 'hours', true) > 0 && (int)get_post_meta($post->ID, 'hours', true) <= 9) {echo '0' . (int)get_post_meta($post->ID, 'hours', true) . ':'; }if((int)get_post_meta($post->ID, 'hours', true) >= 10 && (int)get_post_meta($post->ID, 'hours', true) < 23) {echo (int)get_post_meta($post->ID, 'hours', true) . ':'; }  if((int)get_post_meta($post->ID, 'minute', true) >= 0 && (int)get_post_meta($post->ID, 'minute', true) <= 9) {echo '0'. (int)get_post_meta($post->ID, 'minute', true) . ":"; } else echo (int)get_post_meta($post->ID, 'minute', true) . ":";  if((int)get_post_meta($post->ID, 'second', true) >= 0 && (int)get_post_meta($post->ID, 'second', true) < 10) echo '0' . (int)get_post_meta($post->ID, 'second', true); else echo (int)get_post_meta($post->ID, 'second', true);?></span><?php endif; ?>
                <div class="play-icon">
                    <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.7031 0C7.41884 0 0.703125 6.71572 0.703125 15C0.703125 23.2842 7.41884 29.9999 15.7031 29.9999C23.9873 29.9999 30.7031 23.2842 30.7031 15C30.6943 6.71942 23.9837 0.00885184 15.7031 0ZM22.0202 15.4779C21.9163 15.6862 21.7475 15.8551 21.5392 15.9589V15.9643L12.9678 20.25C12.4384 20.5145 11.7949 20.2998 11.5304 19.7705C11.4552 19.62 11.4164 19.4539 11.4174 19.2857V10.7143C11.4171 10.1225 11.8966 9.64266 12.4883 9.64235C12.6547 9.64228 12.8189 9.68096 12.9678 9.75535L21.5392 14.0411C22.0688 14.305 22.2842 14.9483 22.0202 15.4779Z" fill="white" fill-opacity="0.5"/>
                    </svg>
                </div>
                <div class="lds-dual-ring"></div>
				<?php
				if ( get_the_post_thumbnail() != '' ) {
					if( wp_is_mobile() ){
						echo '<img src="' . get_the_post_thumbnail_url($post->ID, xbox_get_field_value( 'my-theme-options', 'thumb_quality' )) . '" alt="' . get_the_title() . '">';
					}else{
						echo '<img data-src="' . get_the_post_thumbnail_url($post->ID, xbox_get_field_value( 'my-theme-options', 'thumb_quality' )) . '" alt="' . get_the_title() . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
					}
				}elseif( $thumb_url != '' ){
					echo '<img data-src="' . $thumb_url . '" alt="' . get_the_title() . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
				}else{
					echo '<img data-src="' . get_template_directory_uri() . '/assets/img/no-image.png' . '" src="' . get_template_directory_uri() . '/assets/img/no-image.jpg' . '">';
				} ?>
				<?php  if(!wp_is_mobile()) : ?><div class="play-icon-hover"><i class="fa fa-play-circle"></i></div><?php endif;  ?>
				<?php if(get_post_meta($post->ID, 'hd_video', true) == 'on') : ?>
                    <span class="hd-video">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="">
                                    <rect x="1.5" y="4.5" width="27" height="21" fill="white"/>
                                    <path d="M28.8095 3.47412H1.19055C0.533001 3.47412 0 4.00723 0 4.66467V25.3356C0 25.9931 0.533001 26.5262 1.19055 26.5262H28.8096C29.467 26.5262 30.0001 25.9932 30.0001 25.3356V4.66467C30 4.00723 29.4669 3.47412 28.8095 3.47412ZM10.7554 19.6511L11.7878 16.0365H7.93466L6.90183 19.6511H4.53687L7.19402 10.3492H9.5596L8.46621 14.1763H12.3192L13.4126 10.3492H15.7784L13.1206 19.6511H10.7554ZM25.2527 15.0002C24.4668 17.7507 21.8773 19.6511 18.8876 19.6511H14.9812L16.7368 13.5055H19.1017L17.8855 17.7637H19.5729C21.0214 17.7637 22.3767 16.6477 22.8435 15.0137C23.3143 13.3657 22.5474 12.2364 21.0458 12.2364H17.0989L17.6381 10.3492H21.638C24.5614 10.3492 26.0418 12.2364 25.2527 15.0002Z" fill="#172030"/>
                                    </g>
                                    <defs>
                                    <clipPath >
                                    <rect width="30" height="30" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                    </span>
				<?php endif; ?>
				<?php if(get_post_meta($post->ID, 'premium_video', true) == 'on') :
					$premium_icon = px_get_premium_label_url();
					if(xbox_get_field_value('my-theme-options', 'use-premium-label') == 'off'){
						$premium_icon = (xbox_get_field_value('my-theme-options', 'thumb-premium-label')) ? xbox_get_field_value('my-theme-options', 'thumb-premium-label') : $premium_icon;
					} else {
						$premium_icon = (xbox_get_field_value('my-theme-options', 'dashboard-premium-label')) ? xbox_get_field_value('my-theme-options', 'dashboard-premium-label') : $premium_icon;
					}?><span class="premium-video" style="<?=$premium_margin?>"><img class="img-responsive svg-crown" data-src="<?php echo $premium_icon;?>" srcset="<?php echo $premium_icon;?>" src="<?php echo $premium_icon;?>" /></span>
				<?php endif; ?>
				<?php if(has_term('watchlater'.$user->ID, 'playlists', get_the_ID())):?>
                    <span data-add="add" data-user="<?php echo $user->ID;?>" class="watchLaterIcon<?=$favoriteLogin?>" data-post="<?php the_ID(); ?>" style="display: none"><i class="fa fa-check" style="font-size: 24px"></i></span>
				<?php else: ?>
                    <span data-add="" data-user="<?php echo $user->ID;?>" class="watchLaterIcon<?=$favoriteLogin?>" data-post="<?php the_ID(); ?>" style="display: none"><i class="fa fa-plus" style="font-size: 24px"></i></span>
				<?php endif;?>
                <span class="edit_video_from_my_uploads" data-post-id="<?=$post->ID?>" style="
                                cursor:pointer;
                                position: absolute;
                                left: 5px;
                                top: 5px;" data-post-title="<?php the_title(); ?>" data-post-desc="<?=$post->post_content; ?>">
                    <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.601562" width="24" height="22" rx="4" fill="#1E2739" fill-opacity="0.8"/>
                        <g clip-path="url()">
                            <path d="M17.9515 10.2C17.5921 10.2 17.3015 10.4913 17.3015 10.85V16.05C17.3015 16.4081 17.0103 16.7 16.6516 16.7H7.55156C7.19272 16.7 6.9016 16.4081 6.9016 16.05V6.94999C6.9016 6.59187 7.19272 6.30004 7.55156 6.30004H12.7516C13.111 6.30004 13.4015 6.0088 13.4015 5.65008C13.4015 5.29124 13.111 5 12.7516 5H7.55156C6.47647 5 5.60156 5.8749 5.60156 6.94999V16.05C5.60156 17.1251 6.47647 18 7.55156 18H16.6516C17.7267 18 18.6016 17.1251 18.6016 16.05V10.85C18.6016 10.4905 18.3109 10.2 17.9515 10.2Z" fill="white"/>
                            <path d="M11.0873 10.5024C11.0475 10.5423 11.0207 10.5929 11.0094 10.6475L10.6071 12.6598C10.5883 12.753 10.6179 12.8492 10.685 12.917C10.7391 12.971 10.8119 13 10.8865 13C10.9047 13 10.9235 12.9983 10.9423 12.9944L12.9538 12.5921C13.0095 12.5806 13.0602 12.5539 13.0995 12.514L17.6016 8.01157L15.59 6L11.0873 10.5024Z" fill="white"/>
                            <path d="M19.2129 4.38827C18.6954 3.87058 17.8534 3.87058 17.3363 4.38827L16.6016 5.12306L18.4782 7L19.2129 6.26511C19.4635 6.01506 19.6016 5.6816 19.6016 5.32694C19.6016 4.97228 19.4635 4.63881 19.2129 4.38827Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath >
                                <rect width="14" height="14" fill="white" transform="translate(5.60156 4)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </span>
			</div>
		<?php endif; ?>
        <div class="video-debounce-bar-back">
            <div class="video-debounce-bar"></div>
        </div>
        <div class="rating-bar <?php if(arc_getPostLikeRate($post->ID) == false) : ?>no-rate<?php endif;?>">
			<?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
                <span><i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php if(arc_getPostLikeRate($post->ID) == false) : ?>0%<?php else : ?>
						<?php echo arc_getPostLikeRate($post->ID);?><?php endif; ?></span>
			<?php endif; ?>
        </div>
	</a>
    <header class="entry-header categoryVideoWatchLater">
        <p style="text-align: left; width: 100%;"><?php the_title(); ?></p>
        <p class="video_block_delimiter"></p>
        <p class="rating-bar">
			<?php if(xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on') : ?><span class="views">
				<?php echo arc_getPostViews($post->ID); ?> <span class="viewers">views</span></span><?php endif; ?>
			<?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
                <span><i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php if(arc_getPostLikeRate($post->ID) == false) : ?>0%<?php else : ?>
						<?php echo arc_getPostLikeRate($post->ID);?><?php endif; ?></span>
			<?php endif; ?>
        </p>
    </header>
</article>