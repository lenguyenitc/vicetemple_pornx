<?php
get_header();
if(!is_user_logged_in()) {
	$favoriteLogin = ' favoriteLoggedOut';
} else $favoriteLogin = '';
?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-search-page' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' )
	{ $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<section id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
			<?php
			if( get_theme_mod( 'title_desc_search_pos' ) == 'top') {?>
                <div class="customizer_content" style="margin-top: 0!important;margin-bottom: 40px;">
				<?php
                if ( get_theme_mod( 'seo_search_title' ) !== '' ) : ?>
					<?php echo get_theme_mod( 'seo_search_title' ); ?>
				<?php endif;?>
					<?php if(get_theme_mod('seo_search_text')) { echo get_theme_mod('seo_search_text'); } ?>
				</div>
			<?php }?>
			<?php $s = htmlentities(sanitize_text_field(get_search_query()));?>
            <?php if(empty($_GET['s'])):?>
                <h1 class="widget-title"><?php echo esc_html__( 'Nothing found', 'arc' ); ?></h1>
                <p><?php echo esc_html__( 'It looks like nothing was found for this search.', 'arc' ); ?></p>
            <?php else:?>
                <header class="page-header">
                    <h2 class="widget-title"><?php printf( __( 'Search results for: %s', 'arc' ), '<span>' . explode('&', get_search_query())[0] . '</span>' ); ?></h2>
                </header>
			<!--videos--->
			<div class="videos-list">
				<?php global $wpdb; ?>
				<h2 class="widget-title"><?php echo __('Videos', 'arc' );?></h2>
				<?php
				query_posts([
					'post_type'=>'post',
					'orderby'  => 'meta_value_num',
					'order'    => 'ASC',
					's'        => $s,
				]);
				if(have_posts()):
					$count_video = 0;
					while ( have_posts() ) : the_post(); $count_video++;
						if($count_video >= 9) break;
						else {
							get_template_part( 'template-parts/loop', 'video' );

						}
					endwhile;
					?>
				<?php else:?>
                    <p style="margin-left: 15px">Videos not found</p>
				<?php endif;?>
				<?php if($count_video > 8):?>
                    <a class="button button-primary" style="margin: 10px; float: right" href="?s=<?php echo $s;?>&search-type=normal"><?php echo __('All results', 'arc')?></a>
				<?php endif;
				wp_reset_query();
				?>
			</div>
			<div class="clear"></div>
                <div style="margin-bottom: 20px;"></div>
            <!--photos--->
            <div class="gallery-list">
                <h2 class="widget-title"><?php echo __('Galleries', 'arc' );?></h2>
                <?php
                query_posts([
	                'post_type'=>'photos',
	                'orderby'  => 'meta_value_num',
	                'order'    => 'ASC',
	                's'        => $s,
                ]);
                if(have_posts()):
                $count_gal = 0;
                while ( have_posts() ) : the_post(); $count_gal++;
                    if($count_gal >= 5) break;
                    else {
		                get_template_part( 'template-parts/loop', 'photo' );
                    }

                endwhile;
                ?>
                <?php else:?>
                    <p style="margin-left: 15px">Galleries not found</p>
                <?php endif;?>
                <?php if($count_gal > 5):?>
                    <a class="button button-primary" style="margin: 10px; float: right" href="?s=<?php echo $s;?>&search-type=photo"><?php echo __('All results', 'arc')?></a>
                <?php endif;
                wp_reset_query();?>
            </div>
            <div class="clear"></div>
                <div style="margin-bottom: 20px;"></div>
			<!--actors--->
			<div class="actors-list">
				<h2 class="widget-title"><?php echo __('Pornstars', 'arc' );?></h2>
				<?php
				$q_actors = "SELECT `wp_terms`.`name`, 
								`wp_terms`.`slug`, 
								`wp_terms`.`term_id` 
							FROM `wp_terms` 
							JOIN `wp_term_taxonomy` 
							ON `wp_term_taxonomy`.`term_id` = `wp_terms`.`term_id` 
							WHERE `wp_terms`.`name` 
							LIKE '{$s}%' 
							AND `wp_term_taxonomy`.`taxonomy` = 'pornstars'
							AND `wp_term_taxonomy`.`count` > 0";
				$actors = $wpdb->get_results($q_actors);
				if(count($actors) == 0):
					echo '<p style="margin-left: 15px">Pornstars not found</p>';
				?>
				<?php else:
					$i = 0;
					foreach ($actors as $actor) {
						$i++;
						if($i >= 5): break;
						else:?>
					<div class="videos-list">
                        <article id="post-<?php echo $actor->term_id;?>" class="thumb-block actors post-<?php the_ID(); ?> type-post">
                            <a href="<?php echo esc_url(home_url()); ?>/pornstar/<?php echo $actor->slug; ?>/" title="<?php echo $actor->name; ?>">
                                <!-- Thumbnail -->
								<?php
								$objects = get_objects_in_term($actor->term_id, 'pornstars');
								$thumb_url = get_post_meta($objects[0], 'thumb', true);
								$image_id = get_term_meta($actor->term_id, 'actors-image-id', true );
								$back_img_url = wp_get_attachment_image_url($image_id, 'full');
								if($image_id) {
									$back_img_url = wp_get_attachment_image_url($image_id, 'full');
								}
                                elseif ($image_id === false || $thumb_url === false) {
									$back_img_url = get_template_directory_uri() .'/assets/img/no-image.jpg';
								}
                                elseif ($thumb_url) {
									$back_img_url = $thumb_url;
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
                                <div class="post-thumbnail" style="background-image: url(<?=$back_img_url;?>) !important;">
                                </div>
                                <header class="entry-header actors-entry-header">
                                    <p style="text-align: left; width: 100%;" class="actor-title"><?php echo $actor->name; ?></p>
                                    <p class="video_block_delimiter"></p>
                                    <p class="rating-bar">
										<?php if(xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on') : ?><span class="views">
											<?php echo get_term_meta($actor->term_id, 'actors_views_count', true); ?> <span class="viewers">views</span></span><?php endif; ?>
                                        <span class="actors-video-count"><?php echo get_term($actor->term_id)->count;?> <span> video</span></span>
                                    </p>
                                </header>
                            </a>
                        </article>
					</div>
						<?php
						endif;
					}
					?>
					<?php if(count($actors) > 4):?>
					<a class="button button-primary" style="margin: 10px; float: right" href="?s=<?php echo $s;?>&search-type=pornstars"><?php echo __('All results', 'arc')?></a>
					<?php endif;?>
				<?php endif;?>

			</div>
			<div class="clear"></div>
                <div style="margin-bottom: 20px;"></div>
			<!--members--->
			<div class="community-list">
				<h2 class="widget-title"><?php echo __('Members', 'arc' );?></h2>
				<?php
				$q_members = "SELECT `ID` FROM `wp_users` WHERE `user_login` LIKE '{$s}%'";
				$members = $wpdb->get_results($q_members);
				if(count($members) == 0):
					echo '<p style="margin-left: 15px">Members not found</p>';
				else:
					$i = 0;?>
                    <article class="searched_users">
                    <div class="users_list2" style="justify-content: center;">
					<?php
                    foreach ($members as $member) {
						if($i >= 8): break;
						else:?>
                            <div class="item_user2">
                                <div style="display: inline-flex;align-items: center;">
                                    <p class="user_pic" style="margin-bottom: 0">
										<?php
										if(get_user_meta($member->ID, 'personal_foto', true) == false) :?>
                                            <a href="/public-profile/?xxx=<?php echo $member->ID;?>">
                                                <svg width="40" height="40" viewBox="0 0 212 212" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                            </a>
										<?php else:?>
                                            <a href="/public-profile/?xxx=<?php echo $member->ID;?>">
                                                <img src="<?php echo get_user_meta($member->ID,'personal_foto', true);?>" alt=""/>
                                            </a>
										<?php endif;?>
                                    </p>
                                    <a style="white-space: nowrap;
                                                    text-overflow: ellipsis;
                                                    overflow: hidden;" href="/public-profile/?xxx=<?php echo $member->ID;?>"><?php echo get_userdata($member->ID)->display_name;?> </a>
                                </div>
                                <!--<a href="/public-profile/?xxx=<?php /*echo $member->ID;*/?>"><span>
                                                        <svg width="4" height="17" viewBox="0 0 4 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2" cy="2" r="2" fill="white" fill-opacity="0.5"/>
                                                        <circle cx="2" cy="8.5" r="2" fill="white" fill-opacity="0.5"/>
                                                        <circle cx="2" cy="15" r="2" fill="white" fill-opacity="0.5"/>
                                                       </svg>
                                                </span></a>-->
                            </div>
							<?php
							$i++;
							endif;
					}?>
                    </div>
                </article>
					<?php if(count($members) >= 8):?>
						<a class="button button-primary" style="margin: 10px; float: right" href="?s=<?php echo $s;?>&search-type=members"><?php echo __('All results', 'arc')?></a>
					<?php endif;?>
				<?php endif;?>
			</div>
			<div class="clear"></div>
			<div style="margin-bottom: 20px;"></div>
			<!--articles--->
			<div class="videos-list">
				<h2 class="widget-title"><?php echo __('Articles', 'arc' );?></h2>
				<?php
				query_posts([
					'post_type'=>'blog',
					'orderby'  => 'meta_value_num',
					'order'    => 'ASC',
					's'        => $s,
				]);
				if(have_posts()):
					$count_article = 0;?>
                <div id="articles_container">
					<?php
                    while ( have_posts() ) : the_post();$count_article++;
						if($count_article >= 5) break;
						else {
							get_template_part( 'template-parts/loop', 'blog' );
						}

					endwhile;
					?>
                </div>
				<?php else:?>
                    <p style="margin-left: 15px">Articles not found</p>
				<?php endif;?>
				<?php if($count_article > 4):?>
                    <a class="button button-primary" style="margin: 10px; float: right" href="?s=<?php echo $s;?>&search-type=blog"><?php echo __('All results', 'arc')?></a>
				<?php endif;
				wp_reset_query();?>
			</div>
            <?php endif;?>
			<script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                //var true_posts = <?php //echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
            <div class="clear"></div>
            <div class="separator-pagination"></div>
			<?php
			if( get_theme_mod( 'title_desc_search_pos' ) == 'bottom') {?>
            <div class="customizer_content" style="margin-bottom: 0 !important;">
                <?php
				if ( get_theme_mod( 'seo_search_title' ) !== '' ) : ?>
					<?php echo get_theme_mod( 'seo_search_title' ); ?>
				<?php endif;?>
					<?php if(get_theme_mod('seo_search_text')) { echo get_theme_mod('seo_search_text'); } ?>
				</div>
			<?php } ?>
		</main>
	</section>
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-search-page' ) == 'on') {
	get_sidebar();
}
get_footer();