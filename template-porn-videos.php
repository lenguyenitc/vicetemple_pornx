<?php
/**
 * Template Name: Videos
 **/
get_header();
if(!is_user_logged_in()) {
	$favoriteLogin = ' favoriteLoggedOut';
} else $favoriteLogin = '';
?>
<?php
$sidebar_pos = '';
if ( 'right' === xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) ) {
	$sidebar_pos = 'with-sidebar-right';
} else {
	$sidebar_pos = 'with-sidebar-left';
}
if(wp_is_mobile()) {
	get_template_part('template-parts/filter', 'sidebar');
}
?>

	<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
			<header class="entry-header">
				<?php the_title('<h2 class="widget-title videos-title">', '</h2>'); ?>
			</header>
			<div class="videos-list">
                <?php
                if((int)xbox_get_field_value('my-theme-options', 'number_videos_per_page') % (int)xbox_get_field_value('my-theme-options', 'number_videos_per_row') == 0) {
	                $per_page = xbox_get_field_value('my-theme-options', 'number_videos_per_page');
                } else {
	                $per_page = xbox_get_field_value('my-theme-options', 'number_videos_per_page') + 1;
                }
                if(!isset($_GET['adv_filter']) && empty($_GET['adv_filter'])) {
	                delete_option('filter_porn_videos');
	                $args_query = array(
		                'orderby'     => 'date',
		                'order'       => 'DESC',
		                'post_type'   => 'post',
		                'suppress_filters' => true,
		                'numberposts' => -1,
		                'posts_per_page' => $per_page,
		                'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
	                );
	                query_posts($args_query);
	                while (have_posts() ) : the_post();
		                get_template_part( 'template-parts/loop', 'video' );
	                endwhile;?>
                    <style>
                        ul.single {
                            margin-bottom:0px !important;
                            padding-bottom:0px !important;
                        }
                    </style>
                    <div class="clear"></div>
                    <div class="separator-pagination"></div>
	                <?php main_arc_page_navi();
                }
                else {
	                $result = '';
	                if(!empty($_GET['cat_video'])) {
		                $cat = $_GET['cat_video'];
	                } else $cat = 0;

	                if($_GET['adv_filter'] == 'all_videos') {
		                $result = '';
		                $filter_posts = get_posts( array(
			                'numberposts' => -1,
			                'orderby'     => 'date',
			                'order'       => 'DESC',
			                'post_type'   => 'post',
			                'category'   => $cat,
			                'suppress_filters' => true,
                            'paged' => get_query_var('paged')  ? get_query_var('paged') : 1
		                ));
		                foreach ($filter_posts as $filter) {
			                $result .= $filter->ID . ',';
		                }
	                }
	                if($_GET['adv_filter'] == 'hd_video') {
		                $filter_posts = get_posts( array(
			                'numberposts'      => - 1,
			                'orderby'          => 'date',
			                'order'            => 'DESC',
			                'meta_key'         => 'hd_video',
			                'meta_value'       => 'on',
			                'post_type'        => 'post',
			                'category'   => $cat,
			                'suppress_filters' => true,
			                'paged' => get_query_var('paged')  ? get_query_var('paged') : 1

		                ) );
		                foreach ( $filter_posts as $filter ) {
			                $result .= $filter->ID . ',';
		                }
	                }
	                if($_GET['adv_filter'] == 'premium') {
		                $result = '';
		                $filter_posts = get_posts( array(
			                'numberposts' => -1,
			                'orderby'     => 'date',
			                'order'       => 'DESC',
			                'meta_key'         => 'premium_video',
			                'meta_value'       => 'on',
			                'post_type'   => 'post',
			                'category'   => $cat,
			                'suppress_filters' => true,
			                'paged' => get_query_var('paged')  ? get_query_var('paged') : 1
		                ));
		                foreach ($filter_posts as $filter) {
			                $result .= $filter->ID . ',';
		                }
	                }
	                if($_GET['adv_filter'] == 'featured') {
		                $result = '';
		                $filter_posts = get_posts( array(
			                'numberposts' => -1,
			                'orderby'     => 'date',
			                'order'       => 'DESC',
			                'meta_key'         => 'featured_video',
			                'meta_value'       => 'on',
			                'post_type'   => 'post',
			                'category'   => $cat,
			                'suppress_filters' => true,
			                'paged' => get_query_var('paged')  ? get_query_var('paged') : 1
		                ));
		                foreach ($filter_posts as $filter) {
			                $result .= $filter->ID . ',';
		                }
	                }
	                if(!empty($_GET['production'])) {
		                $result2 = '';
		                foreach (explode(',', $result) as $res) {
			                if(get_post_meta($res, 'production', true) == $_GET['production']) {
				                $result2 .= $res . ',';
			                } else continue;
		                }
		                $result = $result2;
	                }
	                if(!empty($_GET['duration'])) {
		                $result2 = '';
		                $duration = explode('-', $_GET['duration']);
		                $dur_min = $duration[0];
		                $dur_max = $duration[1];
		                foreach (explode(',', $result) as $res) {
			                $dur_res[$res] = get_post_meta($res, 'duration', true);
		                }
		                function duration($min, $max, $arr_all_duration){
			                $duration_in_minutes = [];
			                foreach($arr_all_duration as $k => $v){
				                if(strpos($v, 'min')){
					                $duration_in_minutes[] = [$k => explode(' ' , $v)[0]];
				                }elseif(strpos($v, 'sec')){
					                $prepare = explode(' ' , $v)[0];
					                if($prepare < 60){
						                $duration_in_minutes[] = [$k => 0];
						                continue;
					                }
					                $prepare = round($prepare/60);
					                $duration_in_minutes[] = [$k => $prepare];
				                }else{
					                if($v < 60){
						                $duration_in_minutes[] = [$k => 0];
						                continue;
					                }
					                $v = round($v/60);
					                $duration_in_minutes[] = [$k => $v];
				                }
			                }
			                $res = [];
			                foreach($duration_in_minutes as $value){
				                if(current($value) >= $min && current($value) <= $max){
					                $res[] = key($value);
				                }
			                }
			                return $res;
		                }
		                $duration_in_minutes = duration($dur_min, $dur_max, $dur_res);
		                foreach ($duration_in_minutes as $dur) {
			                $result2 .= $dur . ',';
		                }
		                $result = $result2;
	                }
	                if(!empty($_GET['video_orientation'])) {
		                $result2 = '';
		                foreach (explode(',', $result) as $res) {
			                if(get_post_meta($res, 'video_orientation', true) == $_GET['video_orientation']) {
				                $result2 .= $res . ',';
			                } else continue;
		                }
		                $result = $result2;
	                }
	                if($_GET['tattoo'] == 'Yes') {
		                $result2 = '';
		                foreach (explode(',', $result) as $res) {
			                if(get_post_meta($res, 'tattoo', true) == 'on') {
				                $result2 .= $res . ',';
			                } else continue;
		                }
		                $result = $result2;
	                }
	                if($_GET['tattoo'] == 'No') {
		                $result2 = '';
		                foreach (explode(',', $result) as $res) {
			                if(get_post_meta($res, 'tattoo', true) == 'off') {
				                $result2 .= $res . ',';
			                } else continue;
		                }
		                $result = $result2;
	                }
	                if($_GET['piercing'] == 'Yes') {
		                $result2 = '';
		                foreach (explode(',', $result) as $res) {
			                if(get_post_meta($res, 'piercing', true) == 'on') {
				                $result2 .= $res . ',';
			                } else continue;
		                }
		                $result = $result2;
	                }
	                if($_GET['piercing'] == 'No') {
		                $result2 = '';
		                foreach (explode(',', $result) as $res) {
			                if(get_post_meta($res, 'piercing', true) == 'off') {
				                $result2 .= $res . ',';
			                } else continue;
		                }
		                $result = $result2;
	                }
	                if(!empty($_GET['hair_color'])) {
		                $result2 = '';
		                foreach (explode(',', $result) as $res) {
			                if(get_post_meta($res, 'hair_color', true) == $_GET['hair_color']) {
				                $result2 .= $res . ',';
			                } else continue;
		                }
		                $result = $result2;
	                }
	                if(!empty($_GET['ethnicity'])) {
		                $result2 = '';
		                foreach (explode(',', $result) as $res) {
			                if(get_post_meta($res, 'ethnicity', true) == $_GET['ethnicity']) {
				                $result2 .= $res . ',';
			                } else continue;
		                }
		                $result = $result2;
	                }
	                if(!empty($_GET['bust'])) {
		                $result2 = '';
		                foreach (explode(',', $result) as $res) {
			                if(get_post_meta($res, 'bust', true) == $_GET['bust']) {
				                $result2 .= $res . ',';
			                } else continue;
		                }
		                $result = $result2;
	                }
	                $result2 = implode(',', array_unique(explode(',', $result)));
	                if($result2 == '') {?>
                        <article>
                            <div class="alert"><?php echo __('No match for your filter query. ', 'arc');?></div>
                        </article>
		                <?php
	                } else {
		                $mime_type_thumb = ['jpg|jpeg|jpe' => 'image/jpeg', 'png' => 'image/png'];
		                $filter_videos = explode(',', $result2);
		                $array_part = array_chunk($filter_videos, xbox_get_field_value('my-theme-options', 'number_videos_per_page'));
		                ?>
		                <?php
		                if(get_query_var('paged') < 2):
		                foreach($array_part[0] as $item => $videos){
			                if($videos == '') continue;?>
			                <?php
			                if(get_post_meta($videos, 'hd_video', true) == 'on' && get_post_meta($videos, 'premium_video', true) == 'on') {
				                $premium_margin = 'right: 40px;';
			                }
			                ?>
                            <article id="post-<?php echo $videos; ?>" <?php if(xbox_get_field_value( 'my-theme-options', 'mob-number_videos_per_row' ) == '1') { post_class('thumb-block post full-width'); }else{ post_class('thumb-block post'); } ?>>
				                <?php
				                $user = wp_get_current_user();
				                if(get_post_meta($videos, 'premium_video', true) == 'on') {
					                if(!is_user_logged_in()) {
						                $permalink   = '#';
						                $data_toggle = "modal";
						                $data_target = "#subscribeModal";
					                } else {
						                //if('on' === xbox_get_field_value('my-theme-options', 'enable-membership')) {
							                $permalink  = get_the_permalink($videos);
							                $data_toggle=""; $data_target="";
						                //}
					                }
				                } else {
					                $permalink  = get_the_permalink($videos);
					                $data_toggle=""; $data_target="";
				                }
				                ?>
                                <a href="<?php echo $permalink; ?>" data-toggle="<?php echo $data_toggle;?>" data-target="<?php echo $data_target;?>">
                                    <!-- Trailer -->
					                <?php $trailer_url = get_post_meta($videos, 'trailer_url', true);
					                $trailer_format = explode( '.',  $trailer_url);
					                $trailer_format = $trailer_format[ count( $trailer_format ) - 1];
					                $thumb_url = get_post_meta($videos, 'thumb', true);

					                $thumb_parts = explode('.', $thumb_url);
					                if(count($thumb_parts) <= array_key_last($thumb_parts) || count($thumb_parts) == 1) {
						                $allow = wp_check_filetype($thumb_url, $mime_type_thumb);
						                if(!$allow['type']) {
							                $thumb_url = get_template_directory_uri() . '/assets/img/no-image.png';
						                }
					                }
					                ?>
					                <?php if( $trailer_url != '' && !wp_is_mobile() && $trailer_url !== false && $trailer_url !== 'false' && $trailer_url !== 'http://false' && $trailer_url !== 'https://false') : ?>
						                <?php
						                if ( get_the_post_thumbnail() != '' ) {
							                $poster_url = get_the_post_thumbnail_url($videos, xbox_get_field_value( 'my-theme-options', 'thumb_quality' ));
						                }elseif( $thumb_url != '' ){
							                $poster_url = $thumb_url;
						                } ?>
                                        <div class="post-thumbnail video-with-trailer">
                                            <div class="post-thumbnail <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>thumbs-rotation<?php endif; ?>"
	                                             <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>data-thumbs='<?php echo arc_get_multithumbs($videos);?>'<?php endif; ?>>
		                                        <?php if(xbox_get_field_value( 'my-theme-options', 'enable_duration' ) == 'on' && get_post_meta($videos, 'duration', true) !== false) : ?><span class="duration">
			                                        <?php if((int)get_post_meta($videos, 'hours', true) > 0 && (int)get_post_meta($videos, 'hours', true) <= 9) {echo '0' . (int)get_post_meta($videos, 'hours', true) . ':'; }if((int)get_post_meta($videos, 'hours', true) >= 10 && (int)get_post_meta($videos, 'hours', true) < 23) {echo (int)get_post_meta($videos, 'hours', true) . ':'; }  if((int)get_post_meta($videos, 'minute', true) >= 0 && (int)get_post_meta($videos, 'minute', true) <= 9) {echo '0'. (int)get_post_meta($videos, 'minute', true) . ":"; } else echo (int)get_post_meta($videos, 'minute', true) . ":";  if((int)get_post_meta($videos, 'second', true) >= 0 && (int)get_post_meta($videos, 'second', true) < 10) echo '0' . (int)get_post_meta($videos, 'second', true); else echo (int)get_post_meta($videos, 'second', true);?></span><?php endif; ?>
                                                <div class="play-icon">
                                                    <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.7031 0C7.41884 0 0.703125 6.71572 0.703125 15C0.703125 23.2842 7.41884 29.9999 15.7031 29.9999C23.9873 29.9999 30.7031 23.2842 30.7031 15C30.6943 6.71942 23.9837 0.00885184 15.7031 0ZM22.0202 15.4779C21.9163 15.6862 21.7475 15.8551 21.5392 15.9589V15.9643L12.9678 20.25C12.4384 20.5145 11.7949 20.2998 11.5304 19.7705C11.4552 19.62 11.4164 19.4539 11.4174 19.2857V10.7143C11.4171 10.1225 11.8966 9.64266 12.4883 9.64235C12.6547 9.64228 12.8189 9.68096 12.9678 9.75535L21.5392 14.0411C22.0688 14.305 22.2842 14.9483 22.0202 15.4779Z" fill="white" fill-opacity="0.5"/>
                                                    </svg>
                                                </div>
                                                <div class="lds-dual-ring"></div>
                                            <video class="arc-trailer" preload="none" muted loop poster="<?php echo $poster_url; ?>">
                                                <source src="<?php echo $trailer_url; ?>" type='video/<?php echo $trailer_format; ?>' />
                                            </video>
							                <?php if(get_post_meta($videos, 'hd_video', true) == 'on') : ?>
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
							                <?php if(get_post_meta($videos, 'premium_video', true) == 'on') :
								                if(xbox_get_field_value('my-theme-options', 'use-premium-label') == 'off'){
									                $premium_icon = (xbox_get_field_value('my-theme-options', 'thumb-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'thumb-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
								                } else {
									                $premium_icon = (xbox_get_field_value('my-theme-options', 'dashboard-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'dashboard-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
								                }
                                                ?><span class="premium-video" style="<?=$premium_margin?>">
                                                <img class="img-responsive svg-crown" src="<?php echo $premium_icon;?>" /></span>
							                <?php endif; ?>
							                <?php if(has_term('watchlater'.$user->ID, 'playlists', $videos)):?>
                                                <span data-add="add" data-user="<?php echo $user->ID;?>" class="watchLaterIcon <?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="padding-top: calc(1vh); display: none"><i class="fa fa-check" style="font-size: 24px"></i></span>
							                <?php else: ?>
                                                <span data-add="" data-user="<?php echo $user->ID;?>" class="watchLaterIcon <?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="padding-top: calc(1vh); display: none"><i class="fa fa-plus" style="font-size: 24px"></i></span>
							                <?php endif;?>
                                        </div>
					                <?php else : ?>
                                        <!-- Thumbnail -->
                                        <div class="post-thumbnail <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>thumbs-rotation<?php endif; ?>"
						                     <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>data-thumbs='<?php echo arc_get_multithumbs($videos);?>'<?php endif; ?>>
	                                        <?php if(xbox_get_field_value( 'my-theme-options', 'enable_duration' ) == 'on' && get_post_meta($videos, 'duration', true) !== false) : ?><span class="duration">
		                                        <?php if((int)get_post_meta($videos, 'hours', true) > 0 && (int)get_post_meta($videos, 'hours', true) <= 9) {echo '0' . (int)get_post_meta($videos, 'hours', true) . ':'; }if((int)get_post_meta($videos, 'hours', true) >= 10 && (int)get_post_meta($videos, 'hours', true) < 23) {echo (int)get_post_meta($videos, 'hours', true) . ':'; }  if((int)get_post_meta($videos, 'minute', true) >= 0 && (int)get_post_meta($videos, 'minute', true) <= 9) {echo '0'. (int)get_post_meta($videos, 'minute', true) . ":"; } else echo (int)get_post_meta($videos, 'minute', true) . ":";  if((int)get_post_meta($videos, 'second', true) >= 0 && (int)get_post_meta($videos, 'second', true) < 10) echo '0' . (int)get_post_meta($videos, 'second', true); else echo (int)get_post_meta($videos, 'second', true);?></span><?php endif; ?>
                                            <div class="play-icon">
                                                <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.7031 0C7.41884 0 0.703125 6.71572 0.703125 15C0.703125 23.2842 7.41884 29.9999 15.7031 29.9999C23.9873 29.9999 30.7031 23.2842 30.7031 15C30.6943 6.71942 23.9837 0.00885184 15.7031 0ZM22.0202 15.4779C21.9163 15.6862 21.7475 15.8551 21.5392 15.9589V15.9643L12.9678 20.25C12.4384 20.5145 11.7949 20.2998 11.5304 19.7705C11.4552 19.62 11.4164 19.4539 11.4174 19.2857V10.7143C11.4171 10.1225 11.8966 9.64266 12.4883 9.64235C12.6547 9.64228 12.8189 9.68096 12.9678 9.75535L21.5392 14.0411C22.0688 14.305 22.2842 14.9483 22.0202 15.4779Z" fill="white" fill-opacity="0.5"/>
                                                </svg>
                                            </div>
                                            <div class="lds-dual-ring"></div>
							                <?php
							                if ( get_the_post_thumbnail($videos) != '' ) {
								                if( wp_is_mobile() ){
									                echo '<img src="' . get_the_post_thumbnail_url($videos, xbox_get_field_value( 'my-theme-options', 'thumb_quality' )) . '" alt="' . get_the_title($videos) . '">';
								                }else{
									                echo '<img data-src="' . get_the_post_thumbnail_url($videos, xbox_get_field_value( 'my-theme-options', 'thumb_quality' )) . '" alt="' . get_the_title($videos) . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
								                }
							                }elseif( $thumb_url != '' ){
								                echo '<img data-src="' . $thumb_url . '" alt="' . get_the_title($videos) . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
							                }else{
								                echo '<img data-src="' . get_template_directory_uri() . '/assets/img/no-image.png' . '" src="' . get_template_directory_uri() . '/assets/img/no-image.jpg' . '">';
							                } ?>
							                <?php if(get_post_meta($videos, 'hd_video', true) == 'on') : ?>
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
							                <?php if(get_post_meta($videos, 'premium_video', true) == 'on') :
								                if(xbox_get_field_value('my-theme-options', 'use-premium-label') == 'off'){
									                $premium_icon = (xbox_get_field_value('my-theme-options', 'thumb-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'thumb-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
								                } else {
									                $premium_icon = (xbox_get_field_value('my-theme-options', 'dashboard-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'dashboard-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
								                }?><span class="premium-video" style="<?=$premium_margin?>"><img class="img-responsive svg-crown" data-src="<?php echo $premium_icon;?>" srcset="<?php echo $premium_icon;?>" src="<?php echo $premium_icon;?>" /></span>
							                <?php endif; ?>
							                <?php if(has_term('watchlater'.$user->ID, 'playlists', $videos)):?>
                                                <span data-add="add" data-user="<?php echo $user->ID;?>" class="watchLaterIcon <?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="padding-top: calc(1vh); display: none"><i class="fa fa-check" style="font-size: 24px"></i></span>
							                <?php else: ?>
                                                <span data-add="" data-user="<?php echo $user->ID;?>" class="watchLaterIcon <?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="padding-top: calc(1vh); display: none"><i class="fa fa-plus" style="font-size: 24px"></i></span>
							                <?php endif;?>
                                        </div>
					                <?php endif; ?>
                                    <div class="video-debounce-bar-back">
                                        <div class="video-debounce-bar"></div>
                                    </div>
                                    <div class="rating-bar <?php if(arc_getPostLikeRate($videos) == false) : ?>no-rate<?php endif;?>">
		                                <?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
                                            <span><i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php if(arc_getPostLikeRate($videos) == false) : ?>0%<?php else : ?>
					                                <?php echo arc_getPostLikeRate($videos);?><?php endif; ?></span>
		                                <?php endif; ?>
                                    </div>
                                </a>
                                <header class="entry-header categoryVideoWatchLater">
                                    <p style="text-align: left; width: 100%;"><?php echo get_the_title($videos); ?></p>
                                    <p class="video_block_delimiter"></p>
                                    <p class="rating-bar">
			                            <?php if(xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on') : ?><span class="views">
				                            <?php echo arc_getPostViews($videos); ?> <span class="viewers">views</span></span><?php endif; ?>
			                            <?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
                                            <span><i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php if(arc_getPostLikeRate($videos) == false) : ?>0%<?php else : ?>
						                            <?php echo arc_getPostLikeRate($videos);?><?php endif; ?></span>
			                            <?php endif; ?>
                                    </p>
                                </header>
                            </article>
		                <?php }
		                else:
			                foreach($array_part[get_query_var('paged')-1] as $videos){
				                if($videos == '') continue;?>
				                <?php
				                if(get_post_meta($videos, 'hd_video', true) == 'on' && get_post_meta($videos, 'premium_video', true) == 'on') {
					                $premium_margin = 'right: 40px;';
				                }
				                ?>
                                <article id="post-<?php echo $videos; ?>" <?php if(xbox_get_field_value( 'my-theme-options', 'mob-number_videos_per_row' ) == '1') { post_class('thumb-block post full-width'); }else{ post_class('thumb-block post'); } ?>>
					                <?php
					                $user = wp_get_current_user();
					                if(get_post_meta($videos, 'premium_video', true) == 'on') {
						                if(!is_user_logged_in()) {
							                $permalink   = '#';
							                $data_toggle = "modal";
							                $data_target = "#subscribeModal";
						                } else {
							                //if('on' === xbox_get_field_value('my-theme-options', 'enable-membership')) {
								                $permalink  = get_the_permalink($videos);
								                $data_toggle=""; $data_target="";
							               // }
						                }
					                } else {
						                $permalink  = get_the_permalink($videos);
						                $data_toggle=""; $data_target="";
					                }
					                ?>
                                    <a href="<?php echo $permalink; ?>" data-toggle="<?php echo $data_toggle;?>" data-target="<?php echo $data_target;?>">
                                        <!-- Trailer -->
						                <?php $trailer_url = get_post_meta($videos, 'trailer_url', true);
						                $trailer_format = explode( '.',  $trailer_url);
						                $trailer_format = $trailer_format[ count( $trailer_format ) - 1];
						                $thumb_url = get_post_meta($videos, 'thumb', true);

						                $thumb_parts = explode('.', $thumb_url);
						                if(count($thumb_parts) <= array_key_last($thumb_parts) || count($thumb_parts) == 1) {
							                $allow = wp_check_filetype($thumb_url, $mime_type_thumb);
							                if(!$allow['type']) {
								                $thumb_url = get_template_directory_uri() . '/assets/img/no-image.png';
							                }
						                }
						                ?>
						                <?php if( $trailer_url != '' && !wp_is_mobile() && $trailer_url !== false && $trailer_url !== 'false' && $trailer_url !== 'http://false' && $trailer_url !== 'https://false') : ?>
							                <?php
							                if ( get_the_post_thumbnail() != '' ) {
								                $poster_url = get_the_post_thumbnail_url($videos, xbox_get_field_value( 'my-theme-options', 'thumb_quality' ));
							                }elseif( $thumb_url != '' ){
								                $poster_url = $thumb_url;
							                } ?>
                                            <div class="post-thumbnail video-with-trailer">
                                                <div class="post-thumbnail <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>thumbs-rotation<?php endif; ?>"
	                                                 <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>data-thumbs='<?php echo arc_get_multithumbs($videos);?>'<?php endif; ?>>
	                                            <?php if(xbox_get_field_value( 'my-theme-options', 'enable_duration' ) == 'on' && get_post_meta($videos, 'duration', true) !== false) : ?><span class="duration">
		                                            <?php if((int)get_post_meta($videos, 'hours', true) > 0 && (int)get_post_meta($videos, 'hours', true) <= 9) {echo '0' . (int)get_post_meta($videos, 'hours', true) . ':'; }if((int)get_post_meta($videos, 'hours', true) >= 10 && (int)get_post_meta($videos, 'hours', true) < 23) {echo (int)get_post_meta($videos, 'hours', true) . ':'; }  if((int)get_post_meta($videos, 'minute', true) >= 0 && (int)get_post_meta($videos, 'minute', true) <= 9) {echo '0'. (int)get_post_meta($videos, 'minute', true) . ":"; } else echo (int)get_post_meta($videos, 'minute', true) . ":";  if((int)get_post_meta($videos, 'second', true) >= 0 && (int)get_post_meta($videos, 'second', true) < 10) echo '0' . (int)get_post_meta($videos, 'second', true); else echo (int)get_post_meta($videos, 'second', true);?></span><?php endif; ?>
                                                <div class="play-icon">
                                                    <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.7031 0C7.41884 0 0.703125 6.71572 0.703125 15C0.703125 23.2842 7.41884 29.9999 15.7031 29.9999C23.9873 29.9999 30.7031 23.2842 30.7031 15C30.6943 6.71942 23.9837 0.00885184 15.7031 0ZM22.0202 15.4779C21.9163 15.6862 21.7475 15.8551 21.5392 15.9589V15.9643L12.9678 20.25C12.4384 20.5145 11.7949 20.2998 11.5304 19.7705C11.4552 19.62 11.4164 19.4539 11.4174 19.2857V10.7143C11.4171 10.1225 11.8966 9.64266 12.4883 9.64235C12.6547 9.64228 12.8189 9.68096 12.9678 9.75535L21.5392 14.0411C22.0688 14.305 22.2842 14.9483 22.0202 15.4779Z" fill="white" fill-opacity="0.5"/>
                                                    </svg>
                                                </div>
                                                <div class="lds-dual-ring"></div>
                                                <video class="arc-trailer" preload="none" muted loop poster="<?php echo $poster_url; ?>">
                                                    <source src="<?php echo $trailer_url; ?>" type='video/<?php echo $trailer_format; ?>' />
                                                </video>
								                <?php if(get_post_meta($videos, 'hd_video', true) == 'on') : ?>
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
								                <?php if(get_post_meta($videos, 'premium_video', true) == 'on') :
									                if(xbox_get_field_value('my-theme-options', 'use-premium-label') == 'off'){
										                $premium_icon = (xbox_get_field_value('my-theme-options', 'thumb-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'thumb-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
									                } else {
										                $premium_icon = (xbox_get_field_value('my-theme-options', 'dashboard-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'dashboard-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
									                }?><span class="premium-video" style="<?=$premium_margin?>"><img class="img-responsive svg-crown" src="<?php echo $premium_icon;?>" /></span>
								                <?php endif; ?>
	                                            <?php if(has_term('watchlater'.$user->ID, 'playlists', $videos)):?>
                                                    <span data-add="add" data-user="<?php echo $user->ID;?>" class="watchLaterIcon <?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="padding-top: calc(1vh); display: none"><i class="fa fa-check" style="font-size: 24px"></i></span>
	                                            <?php else: ?>
                                                    <span data-add="" data-user="<?php echo $user->ID;?>" class="watchLaterIcon <?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="padding-top: calc(1vh); display: none"><i class="fa fa-plus" style="font-size: 24px"></i></span>
	                                            <?php endif;?>
                                            </div>
						                <?php else : ?>
                                            <!-- Thumbnail -->
                                            <div class="post-thumbnail <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>thumbs-rotation<?php endif; ?>"
							                     <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>data-thumbs='<?php echo arc_get_multithumbs($videos);?>'<?php endif; ?>>
	                                            <?php if(xbox_get_field_value( 'my-theme-options', 'enable_duration' ) == 'on' && get_post_meta($videos, 'duration', true) !== false) : ?><span class="duration">
		                                            <?php if((int)get_post_meta($videos, 'hours', true) > 0 && (int)get_post_meta($videos, 'hours', true) <= 9) {echo '0' . (int)get_post_meta($videos, 'hours', true) . ':'; }if((int)get_post_meta($videos, 'hours', true) >= 10 && (int)get_post_meta($videos, 'hours', true) < 23) {echo (int)get_post_meta($videos, 'hours', true) . ':'; }  if((int)get_post_meta($videos, 'minute', true) >= 0 && (int)get_post_meta($videos, 'minute', true) <= 9) {echo '0'. (int)get_post_meta($videos, 'minute', true) . ":"; } else echo (int)get_post_meta($videos, 'minute', true) . ":";  if((int)get_post_meta($videos, 'second', true) >= 0 && (int)get_post_meta($videos, 'second', true) < 10) echo '0' . (int)get_post_meta($videos, 'second', true); else echo (int)get_post_meta($videos, 'second', true);?></span><?php endif; ?>
                                                <div class="play-icon">
                                                    <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.7031 0C7.41884 0 0.703125 6.71572 0.703125 15C0.703125 23.2842 7.41884 29.9999 15.7031 29.9999C23.9873 29.9999 30.7031 23.2842 30.7031 15C30.6943 6.71942 23.9837 0.00885184 15.7031 0ZM22.0202 15.4779C21.9163 15.6862 21.7475 15.8551 21.5392 15.9589V15.9643L12.9678 20.25C12.4384 20.5145 11.7949 20.2998 11.5304 19.7705C11.4552 19.62 11.4164 19.4539 11.4174 19.2857V10.7143C11.4171 10.1225 11.8966 9.64266 12.4883 9.64235C12.6547 9.64228 12.8189 9.68096 12.9678 9.75535L21.5392 14.0411C22.0688 14.305 22.2842 14.9483 22.0202 15.4779Z" fill="white" fill-opacity="0.5"/>
                                                    </svg>
                                                </div>
                                                <div class="lds-dual-ring"></div>
								                <?php
								                if ( get_the_post_thumbnail($videos) != '' ) {
									                if( wp_is_mobile() ){
										                echo '<img src="' . get_the_post_thumbnail_url($videos, xbox_get_field_value( 'my-theme-options', 'thumb_quality' )) . '" alt="' . get_the_title($videos) . '">';
									                }else{
										                echo '<img data-src="' . get_the_post_thumbnail_url($videos, xbox_get_field_value( 'my-theme-options', 'thumb_quality' )) . '" alt="' . get_the_title($videos) . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
									                }
								                }elseif( $thumb_url != '' ){
									                echo '<img data-src="' . $thumb_url . '" alt="' . get_the_title($videos) . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
								                }else{
									                echo '<img data-src="' . get_template_directory_uri() . '/assets/img/no-image.png' . '" src="' . get_template_directory_uri() . '/assets/img/no-image.jpg' . '">';
								                } ?>
								                <?php if(get_post_meta($videos, 'hd_video', true) == 'on') : ?>
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
								                <?php if(get_post_meta($videos, 'premium_video', true) == 'on') :
									                if(xbox_get_field_value('my-theme-options', 'use-premium-label') == 'off'){
										                $premium_icon = (xbox_get_field_value('my-theme-options', 'thumb-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'thumb-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
									                } else {
										                $premium_icon = (xbox_get_field_value('my-theme-options', 'dashboard-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'dashboard-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
									                }?><span class="premium-video" style="<?=$premium_margin?>"><img class="img-responsive svg-crown" data-src="<?php echo $premium_icon;?>" srcset="<?php echo $premium_icon;?>" src="<?php echo $premium_icon;?>" /></span>
								                <?php endif; ?>
	                                            <?php if(has_term('watchlater'.$user->ID, 'playlists', $videos)):?>
                                                    <span data-add="add" data-user="<?php echo $user->ID;?>" class="watchLaterIcon <?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="padding-top: calc(1vh); display: none"><i class="fa fa-check" style="font-size: 24px"></i></span>
	                                            <?php else: ?>
                                                    <span data-add="" data-user="<?php echo $user->ID;?>" class="watchLaterIcon <?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="padding-top: calc(1vh); display: none"><i class="fa fa-plus" style="font-size: 24px"></i></span>
	                                            <?php endif;?>
                                            </div>
						                <?php endif; ?>
                                        <div class="video-debounce-bar-back">
                                            <div class="video-debounce-bar"></div>
                                        </div>
                                        <div class="rating-bar <?php if(arc_getPostLikeRate($videos) == false) : ?>no-rate<?php endif;?>">
		                                    <?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
                                                <span><i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php if(arc_getPostLikeRate($videos) == false) : ?>0%<?php else : ?>
					                                    <?php echo arc_getPostLikeRate($videos);?><?php endif; ?></span>
		                                    <?php endif; ?>
                                        </div>
                                    </a>
                                    <header class="entry-header categoryVideoWatchLater">
                                        <p style="text-align: left; width: 100%;"><?php echo get_the_title($videos); ?></p>
                                        <p class="video_block_delimiter"></p>
                                        <p class="rating-bar">
			                                <?php if(xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on') : ?><span class="views">
				                                <?php echo arc_getPostViews($videos); ?> <span class="viewers">views</span></span><?php endif; ?>
			                                <?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
                                                <span><i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php if(arc_getPostLikeRate($videos) == false) : ?>0%<?php else : ?>
						                                <?php echo arc_getPostLikeRate($videos);?><?php endif; ?></span>
			                                <?php endif; ?>
                                        </p>
                                    </header>
                                </article>
			                <?php }
		                endif;
			                $count_parts = count($array_part);
			                if($count_parts > 1 && get_query_var('paged') !== $count_parts) {
			                    echo '<button class="button large" id="filterLoadMore" style="
                                        width: 30%;
                                        display: table;
                                        clear: both;
                                        margin: 0 auto;
                                        margin-top: 35px;">Load more</button>';
			                }
			                if(empty($array_part[$count_parts - 1][0])) {?>
                                <style>
                                    div.pagination ul {
                                        margin-bottom:0px !important;
                                        padding-bottom:0px !important;
                                    }
                                </style>
                                <div class="clear"></div>
                                <div class="separator-pagination"></div>
				                <?php
                                filter_navi(count($array_part) - 1);
				                $data = [
					                (get_query_var('paged')) ? get_query_var('paged') : 1,
					                $cat,
					                $count_parts - 1
				                ];
			                }
			                else { ?>
                                <style>
                                    div.pagination ul {
                                        margin-bottom:0px !important;
                                        padding-bottom:0px !important;
                                    }
                                </style>
                                <div class="clear"></div>
                                <div class="separator-pagination"></div>
			                    <?php
                                filter_navi(count($array_part));
				                $data = [
					                (get_query_var('paged')) ? get_query_var('paged') : 1,
					                $cat,
					                $count_parts
				                ];
			                }
		                update_option('filter_porn_videos', $data, true);
	                }
                }
                ?>
            </div>
			<div class="clear"></div>
		</main>
        <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            /* var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';*/
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            var cat_value = '<?php (!empty($_GET['cat_video'])) ?$_GET['cat_video']: 0;?>';
        </script>
	</div>
<?php
if(!wp_is_mobile()) {
	get_template_part('template-parts/filter', 'sidebar');
}
get_footer();