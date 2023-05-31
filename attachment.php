<?php
get_header();
/** Get all photos from gallery [end] */
if ( !empty($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== site_url() . '/favorites/') {
    $title_gallery = explode(site_url().'/photos/', $_SERVER['HTTP_REFERER'])[1];
    $title_gallery = explode('/', $title_gallery)[0];
    global $wpdb;
    $res = $wpdb->get_row( "SELECT `post_content` FROM `wp_posts` WHERE `post_type` = 'photos' AND `post_name`= '" . $title_gallery . "'", ARRAY_A );
    $res = $res['post_content'];
    if (is_local_attachment($_SERVER['HTTP_REFERER']) === false && $res !== null) {

        function get_post_block_gallery_images_REFERER($res) {
            $post_blocks = parse_blocks( $res );
            foreach ( $post_blocks as $block ) {

                if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
                    $all_id_for_each_gallery = array_map( function ( $image_id ) {

                        return $image_id;
                    }, $block['attrs']['ids'] );
                }
            }
            return $all_id_for_each_gallery;
        }
        $all_photos_id_from_gallery = get_post_block_gallery_images_REFERER($res);
    } else {
        $all_photos_id_from_gallery = get_post_block_gallery_images($post->ID);
    }

} else {
    $all_photos_id_from_gallery = get_post_block_gallery_images($post->ID);
}
/** Get all photos from gallery [end] */

/** Get gallery id [start]*/
$gallery_id = get_gallery_id($post->ID);
/** Get gallery id [end]*/
?>
    <style>
        progress {
            display: none;
            position: absolute;
        }

        p.photo_position {
            padding-left: 5px;
            padding-right: 5px;
            text-align: center;
            display: contents;
            margin: 0 auto;
        }

        .close {
            font-size: 30px;
            text-decoration: none;
            color: <?php echo get_theme_mod('text_site_color')?>!important;
            font-weight: bold;
        }
        .fig {
            text-align: center;
        }
        .wrapper {
            position: relative;
            overflow: hidden;
        }
        .wrapper img {
            vertical-align: middle;
        }

        .wrapper .chevron-left {
            position: absolute;
            top: 0;
            left: 20px;
            display: flex;
            height: 100%;
            align-items: center;
            /*display:none;*/
        }
        .wrapper .chevron-right {
            position: absolute;
            top: 0;
            right: 20px;
            display: flex;
            height: 100%;
            align-items: center;
            /*display:none;*/
        }
        .wrapper:hover .chevron-right,
        .wrapper:hover .chevron-left {
            display: flex;
        }
        /***arrows on big photo***/
        .wrapper div.chevron-left i.fa-chevron-left,
        .wrapper div.chevron-right i.fa-chevron-right{
            font-size: 45px;
            background: <?php echo get_theme_mod( 'secondary_color_setting' )?>!important;
            padding-left: 5px;
            padding-bottom: 10px;
            padding-right: 15px;
            padding-top: 10px;
        }
        svg.fa-chevron-left:hover,
        svg.hidden_thumbs:hover{
            cursor: pointer;
        }
        #modalWindowAlyaFancybox .chevron-right-full-screen,
        #modalWindowAlyaFancybox .chevron-left-full-screen{
            background: transparent!important;
            padding-left: 5px;
            padding-bottom: 10px;
            padding-top: 10px;
        }
        #modalWindowAlyaFancybox .chevron-right-full-screen {
            padding-left: 10px;
        }
        #modalWindowAlyaFancybox .chevron-left-full-screen{
            padding-right: 5px;
        }
        .wrapper div.chevron-right i.fa-chevron-right {
            padding-left: 15px;
            padding-right: 5px;
        }
        p.photo_position {
            width: 100%;
            margin: 0 auto;
        }
        div.thumbs_container {
            overflow-x: hidden;
            max-width: 1600px;
            display: flex;
            height: 100px;
            width: 100%;
            margin-left: 20px !important;
            margin-right: 20px !important;
        }

        div.thumb_inner {
            display: inline-flex;
        }
        span#btn_left,
        span#btn_right {
            background: linear-gradient(90deg, rgba(15, 23, 37, 0) 0%, <?=get_theme_mod('secondary_background_color')?> 100%), transparent !important;
            width: 50px !important;
            position: absolute!important;
            height: 100px!important;
            z-index: 1!important;
        }
        span#btn_left_full,
        span#btn_right_full {
            background: linear-gradient(90deg, <?=get_theme_mod('secondary_background_color')?> -1.84%, rgba(3, 11, 26, 0) 19.7%) !important;
            width: 10px !important;
        }
        span#btn_left:hover,
        span#btn_right:hover {
            cursor: pointer;
        }
        span#btn_right {
            right: 0;
        }
        span#btn_right_full {
            background: linear-gradient(270deg, <?=get_theme_mod('secondary_background_color')?> -1.84%, rgba(3, 11, 26, 0) 19.7%) !important;
            width: 10px !important;
        }
        div#video-rate-full-screen {
            display: inherit !important;
        }
        span#video-rate-full-screen {
            display: inherit!important;
        }
        span#btn_left {
            background: linear-gradient(270deg, rgba(15, 23, 37, 0) 0%, <?=get_theme_mod('secondary_background_color')?> 100%), transparent !important;
        }
        svg.fa-play:hover,
        svg.a-chevron-left:hover,
        svg.fa-th-large:hover,
        span#btn_left_full:hover,
        span#btn_right_full:hover{
            cursor: pointer;
        }
        div#thumbnail {
            max-width: 1600px;
            display: flex;
            padding-top: 10px;
            background: <?php echo get_theme_mod( 'secondary_color_setting' )?>!important;;
            padding-left: 10px;
            padding-right: 10px;
        }
        i.fa.fa-th-large,
        i.fa.fa-caret-square-o-right,
        i.fa.fa-heart,
        i.fa.fa-heart-o,
        i.fa.fa-share-alt,
        i.fa.fa-flag,
        i.fa.fa-chevron-right,
        i.fa.fa-chevron-left {
            cursor: pointer;
        }
        div.thumbs_container img {
            cursor:pointer;
        }

        div.thumbs_container img.noactive-photo {
            opacity: .5;
        }
        div.thumbs_container img.active-photo {
            opacity: 1;
        }
        div.thumbs_container img.noactive-photo:hover {
            opacity: 1;
        }

        ul#control_fullscreen_panel {
            display: inline-flex;
            position: absolute;
            right: 0;
            justify-content: flex-end;
            list-style:none;
            flex-direction: row;
        }
        div#fullscreen_info {
            display: inline-flex;
            justify-content: space-between;
            align-content: center;
            flex-wrap: nowrap;
            flex-direction: row;
            width: 100%;
            position: absolute;
            margin-top: -40px;
        }
        div#fullscreen_info span.like,
        div#fullscreen_info span.dislike,
        div#fullscreen_info span#change{
            font-size: 16px !important;
        }
        div#fullscreen_info span#change {
            display:none !important;
        }
        div.thumbs_container {
            margin-right: 20px !important;
            margin-left: 20px !important;
            padding-left: 0;
        }
        div.uploaded_by {
            font-family: 'Roboto',sans-serif !important;
            font-style: normal!important;
            font-weight: normal!important;
            font-size: 18px!important;
            line-height: 21px!important;
            color: rgba(<?php
            $hex = get_theme_mod('secondary_text_site_color');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 0.5)!important;
            margin: 0 !important;
        }
        div.uploaded_by a {
            color: rgba(<?php
            $hex = get_theme_mod('links_color_setting');
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            echo $r.",".$g.",". $b;
            ?>, 1)!important;
        }
        div#main_photo {
            left: 0 !important;
            margin-left: 0 !important;
        }
        div.chevron-left-full-screen {
            left: 20px !important;
        }
    </style>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <article id="post-<?php echo $post->ID;?>" class="post post-<?php echo $post->ID;?> attachment type-attachment status-inherit hentry" style="margin-bottom: 0" >
                <header class="entry-header">
                    <div  id="div_photo_name" style="text-overflow: ellipsis;
                                overflow: hidden;
                                width: 100%;
                                align-items: center;
                                display: inline-flex;
                                justify-content: space-between;margin-bottom:30px;padding-bottom:20px;
                                flex-wrap: wrap;border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;">
                        <h1 id="h1_photo_title" class="widget-title" data-gallery_id="<?php echo $gallery_id; ?>" style="border-bottom: none !important;margin-bottom:0;padding-bottom:0">
                            <?php
                            $gallery_title = get_post($gallery_id, ARRAY_A)['post_title'];
                            $photo_title = get_post($post->ID, ARRAY_A)['post_title'];
                            echo "$gallery_title - $photo_title";
                            ?>
                        </h1>
                        <div>
	                        <?php
	                        $id_author_gallery = get_post($gallery_id, ARRAY_A)['post_author'];
	                        $uploaded_by = get_userdata($id_author_gallery);
	                        ?>
                            <div class="uploaded_by"> Uploaded by <a href='<?=site_url()?>/public-profile/?xxx=<?php echo $id_author_gallery?>'><?php echo $uploaded_by->display_name;?></a></div>
                        </div>
                    </div>
                </header>
                <div class="videos-list">
                    <div class="photo_container">
                        <div class="pagin_photo">
                                <?php
                                $key = array_search($post->ID, $all_photos_id_from_gallery);
                                if ($key === 0) {
                                    $key = (count($all_photos_id_from_gallery)-1);
                                } else {
                                    $key--;
                                }
                                echo '<div class="wrapper">';
                                $parent_id = get_post( $all_photos_id_from_gallery[$key], ARRAY_A )['post_parent'];
                                if ($parent_id === 0) {
                                    $url_part_one = get_post( $all_photos_id_from_gallery[$key], ARRAY_A )['post_name'];
                                    echo '<div style="overflow-x: auto; display: flex"><div class="chevron-left" data-urn="' . $url_part_one . '" data-parent="gallery"><svg class="fa-chevron-left" width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter_bb)">
                                        <circle cx="20.0078" cy="20.0078" r="20" fill="#1E2739" fill-opacity="0.8"/>
                                        </g>
                                        <path d="M13.4118 20.9901L22.0115 29.5895C22.5585 30.1368 23.4454 30.1368 23.9922 29.5895C24.539 29.0427 24.539 28.1558 23.9922 27.609L16.3828 19.9999L23.992 12.391C24.5388 11.8439 24.5388 10.9571 23.992 10.4103C23.4452 9.86324 22.5583 9.86324 22.0112 10.4103L13.4115 19.0098C13.1381 19.2834 13.0016 19.6415 13.0016 19.9998C13.0016 20.3583 13.1384 20.7167 13.4118 20.9901Z" fill="white" fill-opacity="0.5"/>
                                        <defs>
                                        <filter id="filter_bb" x="-14.9922" y="-14.9922" width="70" height="70" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>
                                        <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>
                                        </filter>
                                        </defs>
                                        </svg><svg class="hidden_thumbs" style="position: absolute;bottom: 10px;" width="40" height="40" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g filter="url(#filter1_b)">
                                            <circle r="15" transform="matrix(1 0 0 -1 15 15)" fill="#1E2739" fill-opacity="0.8"/>
                                            </g>
                                            <rect x="8.25" y="8.25" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>
                                            <rect x="8.25" y="16.3516" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>
                                            <rect x="16.3516" y="8.25" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>
                                            <rect x="16.3516" y="16.3516" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>
                                            <defs>
                                            <filter id="filter1_b" x="-15" y="-15" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                            <feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>
                                            <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>
                                            </filter>
                                            </defs>
                                            </svg></div>';
                                } else {
                                    $parent_id = get_post( $all_photos_id_from_gallery[$key], ARRAY_A )['post_parent'];
                                    $url_part_one = get_post( $parent_id, ARRAY_A )['post_name'];
                                    $url_part_two = get_post( $all_photos_id_from_gallery[$key], ARRAY_A )['post_name'];
                                    echo '<div style="overflow-x: auto;display: flex"><div class="chevron-left" data-urn="' . $url_part_one .'/'. $url_part_two  . '" data-parent="gallery"><svg class="fa-chevron-left" width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter2_b)">
                                        <circle cx="20.0078" cy="20.0078" r="20" fill="#1E2739" fill-opacity="0.8"/>
                                        </g>
                                        <path d="M13.4118 20.9901L22.0115 29.5895C22.5585 30.1368 23.4454 30.1368 23.9922 29.5895C24.539 29.0427 24.539 28.1558 23.9922 27.609L16.3828 19.9999L23.992 12.391C24.5388 11.8439 24.5388 10.9571 23.992 10.4103C23.4452 9.86324 22.5583 9.86324 22.0112 10.4103L13.4115 19.0098C13.1381 19.2834 13.0016 19.6415 13.0016 19.9998C13.0016 20.3583 13.1384 20.7167 13.4118 20.9901Z" fill="white" fill-opacity="0.5"/>
                                        <defs>
                                        <filter id="filter2_b" x="-14.9922" y="-14.9922" width="70" height="70" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>
                                        <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>
                                        </filter>
                                        </defs>
                                        </svg><svg class="hidden_thumbs" style="position: absolute;bottom: 10px;" width="40" height="40" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter3_b)">
                                        <circle r="15" transform="matrix(1 0 0 -1 15 15)" fill="#1E2739" fill-opacity="0.8"/>
                                        </g>
                                        <rect x="8.25" y="8.25" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>
                                        <rect x="8.25" y="16.3516" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>
                                        <rect x="16.3516" y="8.25" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>
                                        <rect x="16.3516" y="16.3516" width="5.4" height="5.4" rx="1" fill="white" fill-opacity="0.5"/>
                                        <defs>
                                        <filter id="filter3_b" x="-15" y="-15" width="60" height="60" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>
                                        <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>
                                        </filter>
                                        </defs>
                                        </svg></div>';
                                }
                                $number_of_photos_in_album = sizeof($all_photos_id_from_gallery);
                                $number_of_current_photo = array_search($post->ID, $all_photos_id_from_gallery);
                                $number_of_current_photo++;

                                //echo '<p class="photo_position" style="text-align: center"><div class="number_of_photos_in_album">'.$number_of_current_photo .' of '. $number_of_photos_in_album.'</div><img style="height: 100%;max-width: 963px;width: 100%;margin: 0 auto!important;border-radius: 4px!important;" class="gallery_photo" src="'.wp_get_attachment_image_url($post->ID, 'large',) .'" /></p>';
                                echo '<div class="number_of_photos_in_album">'.$number_of_current_photo .' of '. $number_of_photos_in_album.'</div><img style="height: 100%;max-width: 963px;width: 100%;margin: 0 auto!important;border-radius: 4px!important;" class="gallery_photo" src="'.wp_get_attachment_image_url($post->ID, 'large',) .'" />';

                                ?>
                                <?php
                                $key = array_search($post->ID, $all_photos_id_from_gallery);
                                if ((count($all_photos_id_from_gallery)-1) == $key) {
                                    $key = 0;
                                } else {
                                    $key++;
                                }
                                $parent_id = get_post( $all_photos_id_from_gallery[$key], ARRAY_A )['post_parent'];
                                if ($parent_id === 0) {
                                    $url_part_one = get_post( $all_photos_id_from_gallery[$key], ARRAY_A )['post_name'];
                                    echo '<div class="chevron-right" data-urn="' . $url_part_one . '"><svg class="fa-chevron-right" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter4_b)">
                                        <circle cx="20" cy="20" r="20" fill="#1E2739" fill-opacity="0.8"/>
                                        </g>
                                        <path d="M25.9906 20.9901L17.3909 29.5895C16.8438 30.1368 15.9569 30.1368 15.4101 29.5895C14.8633 29.0427 14.8633 28.1558 15.4101 27.609L23.0195 19.9999L15.4103 12.391C14.8635 11.8439 14.8635 10.9571 15.4103 10.4103C15.9572 9.86324 16.8441 9.86324 17.3911 10.4103L25.9908 19.0098C26.2642 19.2834 26.4008 19.6415 26.4008 19.9998C26.4008 20.3583 26.2639 20.7167 25.9906 20.9901Z" fill="white" fill-opacity="0.5"/>
                                        <defs>
                                        <filter id="filter4_b" x="-15" y="-15" width="70" height="70" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>
                                        <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>
                                        </filter>
                                        </defs>
                                        </svg>
                                        <svg class="fa-expand" style="position: absolute;bottom: 10px;" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter5_b)">
                                        <circle cx="20" cy="20" r="20" fill="#1E2739" fill-opacity="0.8"/>
                                        </g>
                                        <path d="M29.5269 10.0698H25.0364C24.7752 10.0698 24.5635 10.2815 24.5635 10.5427V11.8037C24.5635 12.0648 24.7752 12.2765 25.0364 12.2765H26.2326L22.6307 15.8783C22.5421 15.967 22.4922 16.0873 22.4922 16.2127C22.4922 16.3381 22.5421 16.4584 22.6307 16.547L23.5224 17.4387C23.6148 17.5311 23.7358 17.5772 23.8568 17.5772C23.9778 17.5772 24.0989 17.531 24.1912 17.4387L27.7931 13.8369V15.0332C27.7931 15.2944 28.0048 15.5061 28.266 15.5061H29.527C29.7882 15.5061 29.9998 15.2944 29.9998 15.0332V10.5427C29.9998 10.2815 29.7881 10.0698 29.5269 10.0698Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M13.7672 12.2775H14.9634C15.2246 12.2775 15.4362 12.0658 15.4362 11.8046V10.5437C15.4362 10.2825 15.2246 10.0708 14.9634 10.0708H10.4729C10.2117 10.0708 10 10.2825 10 10.5437V15.0342C10 15.2953 10.2117 15.5071 10.4729 15.5071H11.7338C11.9951 15.5071 12.2067 15.2953 12.2067 15.0342V13.838L15.8084 17.4397C15.9007 17.532 16.0218 17.5782 16.1428 17.5782C16.2638 17.5782 16.3849 17.532 16.4773 17.4397L17.3689 16.548C17.4576 16.4593 17.5074 16.339 17.5074 16.2136C17.5074 16.0882 17.4576 15.9679 17.3689 15.8793L13.7672 12.2775Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M16.4772 22.5614C16.2925 22.3767 15.9932 22.3767 15.8084 22.5614L12.2067 26.163V24.9667C12.2067 24.7056 11.9951 24.4939 11.7338 24.4939H10.4729C10.2117 24.4939 10 24.7056 10 24.9667V29.4572C10 29.7184 10.2117 29.9301 10.4729 29.9301H14.9634C15.2246 29.9301 15.4362 29.7184 15.4362 29.4572V28.1963C15.4362 27.9351 15.2246 27.7234 14.9634 27.7234H13.7672L17.3689 24.1217C17.4575 24.0331 17.5073 23.9128 17.5073 23.7874C17.5073 23.662 17.4575 23.5417 17.3689 23.4531L16.4772 22.5614Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M29.5269 24.4939H28.2659C28.0047 24.4939 27.7931 24.7056 27.7931 24.9667V26.1631L24.1911 22.5614C24.0064 22.3767 23.7071 22.3767 23.5224 22.5614L22.6307 23.4531C22.5421 23.5417 22.4922 23.662 22.4922 23.7874C22.4922 23.9128 22.5421 24.0331 22.6308 24.1217L26.2326 27.7234H25.0364C24.7752 27.7234 24.5635 27.9351 24.5635 28.1963V29.4572C24.5635 29.7184 24.7752 29.9301 25.0364 29.9301H29.5269C29.7881 29.9301 29.9998 29.7184 29.9998 29.4572V24.9667C29.9998 24.7056 29.7881 24.4939 29.5269 24.4939Z" fill="white" fill-opacity="0.5"/>
                                        <defs>
                                        <filter id="filter5_b" x="-15" y="-15" width="70" height="70" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>
                                        <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>
                                        </filter>
                                        </defs>
                                        </svg>
                                        </div></div>';
                                } else {
                                    $parent_id = get_post( $all_photos_id_from_gallery[$key], ARRAY_A )['post_parent'];
                                    $url_part_one = get_post( $parent_id, ARRAY_A )['post_name'];
                                    $url_part_two = get_post( $all_photos_id_from_gallery[$key], ARRAY_A )['post_name'];
                                    echo '<div class="chevron-right" data-urn="' . $url_part_one .'/'. $url_part_two . '"><svg class="fa-chevron-right" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter6_b)">
                                        <circle cx="20" cy="20" r="20" fill="#1E2739" fill-opacity="0.8"/>
                                        </g>
                                        <path d="M25.9906 20.9901L17.3909 29.5895C16.8438 30.1368 15.9569 30.1368 15.4101 29.5895C14.8633 29.0427 14.8633 28.1558 15.4101 27.609L23.0195 19.9999L15.4103 12.391C14.8635 11.8439 14.8635 10.9571 15.4103 10.4103C15.9572 9.86324 16.8441 9.86324 17.3911 10.4103L25.9908 19.0098C26.2642 19.2834 26.4008 19.6415 26.4008 19.9998C26.4008 20.3583 26.2639 20.7167 25.9906 20.9901Z" fill="white" fill-opacity="0.5"/>
                                        <defs>
                                        <filter id="filter6_b" x="-15" y="-15" width="70" height="70" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>
                                        <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>
                                        </filter>
                                        </defs>
                                        </svg>
                                        <svg class="fa-expand" style="position: absolute;bottom: 10px;" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g filter="url(#filter7_b)">
                                        <circle cx="20" cy="20" r="20" fill="#1E2739" fill-opacity="0.8"/>
                                        </g>
                                        <path d="M29.5269 10.0698H25.0364C24.7752 10.0698 24.5635 10.2815 24.5635 10.5427V11.8037C24.5635 12.0648 24.7752 12.2765 25.0364 12.2765H26.2326L22.6307 15.8783C22.5421 15.967 22.4922 16.0873 22.4922 16.2127C22.4922 16.3381 22.5421 16.4584 22.6307 16.547L23.5224 17.4387C23.6148 17.5311 23.7358 17.5772 23.8568 17.5772C23.9778 17.5772 24.0989 17.531 24.1912 17.4387L27.7931 13.8369V15.0332C27.7931 15.2944 28.0048 15.5061 28.266 15.5061H29.527C29.7882 15.5061 29.9998 15.2944 29.9998 15.0332V10.5427C29.9998 10.2815 29.7881 10.0698 29.5269 10.0698Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M13.7672 12.2775H14.9634C15.2246 12.2775 15.4362 12.0658 15.4362 11.8046V10.5437C15.4362 10.2825 15.2246 10.0708 14.9634 10.0708H10.4729C10.2117 10.0708 10 10.2825 10 10.5437V15.0342C10 15.2953 10.2117 15.5071 10.4729 15.5071H11.7338C11.9951 15.5071 12.2067 15.2953 12.2067 15.0342V13.838L15.8084 17.4397C15.9007 17.532 16.0218 17.5782 16.1428 17.5782C16.2638 17.5782 16.3849 17.532 16.4773 17.4397L17.3689 16.548C17.4576 16.4593 17.5074 16.339 17.5074 16.2136C17.5074 16.0882 17.4576 15.9679 17.3689 15.8793L13.7672 12.2775Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M16.4772 22.5614C16.2925 22.3767 15.9932 22.3767 15.8084 22.5614L12.2067 26.163V24.9667C12.2067 24.7056 11.9951 24.4939 11.7338 24.4939H10.4729C10.2117 24.4939 10 24.7056 10 24.9667V29.4572C10 29.7184 10.2117 29.9301 10.4729 29.9301H14.9634C15.2246 29.9301 15.4362 29.7184 15.4362 29.4572V28.1963C15.4362 27.9351 15.2246 27.7234 14.9634 27.7234H13.7672L17.3689 24.1217C17.4575 24.0331 17.5073 23.9128 17.5073 23.7874C17.5073 23.662 17.4575 23.5417 17.3689 23.4531L16.4772 22.5614Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M29.5269 24.4939H28.2659C28.0047 24.4939 27.7931 24.7056 27.7931 24.9667V26.1631L24.1911 22.5614C24.0064 22.3767 23.7071 22.3767 23.5224 22.5614L22.6307 23.4531C22.5421 23.5417 22.4922 23.662 22.4922 23.7874C22.4922 23.9128 22.5421 24.0331 22.6308 24.1217L26.2326 27.7234H25.0364C24.7752 27.7234 24.5635 27.9351 24.5635 28.1963V29.4572C24.5635 29.7184 24.7752 29.9301 25.0364 29.9301H29.5269C29.7881 29.9301 29.9998 29.7184 29.9998 29.4572V24.9667C29.9998 24.7056 29.7881 24.4939 29.5269 24.4939Z" fill="white" fill-opacity="0.5"/>
                                        <defs>
                                        <filter id="filter7_b" x="-15" y="-15" width="70" height="70" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feGaussianBlur in="BackgroundImage" stdDeviation="7.5"/>
                                        <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur" result="shape"/>
                                        </filter>
                                        </defs>
                                        </svg>
                                        </div></div>';
                                }
                                echo '</div>';

                                ?>
                        </div>
                        <!-- Thumbnail line [start] -->
                        <div class="thumb_inner" style="position: relative">
                            <span id="btn_left"></span>
                            <div class="thumbs_container">
			                    <?php
			                    foreach ($all_photos_id_from_gallery as $id) {
				                    $parent_id = get_post( $id, ARRAY_A )['post_parent'];
				                    if ($parent_id === 0) {
					                    $url_part_one = get_post( $id, ARRAY_A )['post_name'];
					                    echo '<img data-post-curr-id="'.$id.'" src="' . wp_get_attachment_url($id) . '" style="max-width: 100%; height: 100px; margin-right:5px;" data-urn="' . $url_part_one . '" data-parent="gallery" class="thumbnail_gallery noactive-photo">';
				                    }else {
					                    $url_part_one = get_post( $id, ARRAY_A )['post_name'];
					                    $url_part_two = get_post( $parent_id, ARRAY_A )['post_name'];
					                    echo '<img data-post-curr-id="'.$id.'" src="' . wp_get_attachment_url($id) . '" style="max-width: 100%; height: 100px;margin-right:5px;" data-urn="' . $url_part_two .'/'. $url_part_one . '" data-parent="video" class="thumbnail_gallery noactive-photo">';
				                    }
			                    }?>
                            </div>
                            <span id="btn_right"></span>
                        </div>
                        <!-- Thumbnail line  [end]-->
                    </div>
                </div>
            </article>
            <script>
                jQuery(document).ready(function ($){
                    $('div.thumbs_container img[data-post-curr-id="' + arc_ajax_var.attachId + '"]').removeClass('noactive-photo').addClass('active-photo');
                });
            </script>

            <!-- Control interface [start]-->
            <div id="control_interface" style="flex-wrap: wrap;display: flex; justify-content: space-between;padding-top: 20px;padding-bottom: 20px;align-items: center;">
                <!-- Like-Dislike-Views [start] -->
                <div id="rating" style="padding-top: 0!important;padding-left: 0!important;padding-bottom: 0!important; width:50%">
                    <div style="display:inline-flex;align-items: flex-end;font-size: 16px !important;flex-wrap:nowrap">
                        <?php if( xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on' ) : ?>
                            <span id="video-views" style="white-space: nowrap;margin-right: 40px"><strong><span><?php echo (int)get_post_meta($post->ID, 'post_views_count', true) ?></span></strong> <?php echo esc_html__('views', 'arc'); ?></span>
                        <?php endif;?>
                        <?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
                            <span class="percentage" style="white-space: nowrap;font-size: 16px !important;margin-right: 40px">0%</span>
                            <span id="video-rate" style="white-space: nowrap;font-size: 16px !important;"><?php echo arc_getPostLikeLink($post->ID); ?></span>
                            <?php $is_rated_yet = arc_getPostLikeRate($post->ID) === false ? " not-rated-yet" : ''; ?>
                        <?php endif;?>
                    </div>
                </div>
                <!-- Like-Dislike-Views [end] -->



                 <!-- Favorite-Share-Comment-Report [start]-->
                <div class="comments_link" style="display: flex;flex-wrap: wrap;justify-content: center;">
	                <?php
	                $arr_favorite_photos = get_user_meta( get_current_user_id(), 'favorite_photos', true );
	                $arr_favorite_photos = unserialize($arr_favorite_photos);
	                if (gettype($arr_favorite_photos) == 'boolean' || array_search($post->ID, $arr_favorite_photos) === false || !is_user_logged_in()): ?>
                        <span style="display: inline-flex;align-items: center;cursor: pointer">
                            <i id="heart" class="fa fa-heart-o" data-photo_id="<?php echo $post->ID;?>" data-user_id="<?php echo get_current_user_id();?>"
                               style="color: <?=get_theme_mod('secondary_text_site_color');?>; font-size: 18px;margin-right: 39px;"></i>
                        </span>
	                <?php else: ?>
                        <span style="display: inline-flex;align-items: center;cursor: pointer">
                            <i id="heart" class="fa fa-heart red-heart" data-photo_id="<?php echo $post->ID;?>" data-user_id="<?php echo get_current_user_id();?>"
                               style="color: <?=get_theme_mod('secondary_text_site_color');?>; font-size: 18px;margin-right: 39px;"></i>
                        </span>
	                <?php endif; ?>
                     <a href="#reply-title" style="margin-right: 39px;display: inline-flex;align-items: center;cursor: pointer">
                         <svg style="margin-right: 10px;" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M18.5958 6.79102H18.048V12.8119C18.048 13.7493 17.5022 14.597 16.408 14.597H5.6875V14.8833C5.6875 15.7121 6.63015 16.5487 7.59818 16.5487H15.7945L18.9302 18.3924L18.4755 16.5487H18.5958C19.5632 16.5487 19.9997 15.714 19.9997 14.8833V8.22028C19.9997 7.39148 19.5632 6.79102 18.5958 6.79102Z" fill="white"/>
                             <path d="M14.8079 2.60742H2.35631C1.26077 2.60742 0 3.58065 0 4.51875V12.0652C0 12.9291 1.06821 13.553 2.09283 13.6493L1.42602 16.1806L5.69886 13.6669H14.8079C15.9035 13.6669 16.9144 13.0026 16.9144 12.0652V5.95973V4.51875C16.9144 3.58065 15.9028 2.60742 14.8079 2.60742ZM4.25593 8.97765C3.63465 8.97765 3.13112 8.47412 3.13112 7.85284C3.13112 7.23156 3.63465 6.72803 4.25593 6.72803C4.87656 6.72803 5.38074 7.23156 5.38074 7.85284C5.38074 8.47412 4.87656 8.97765 4.25593 8.97765ZM8.45721 8.97765C7.83593 8.97765 7.3324 8.47412 7.3324 7.85284C7.3324 7.23156 7.83593 6.72803 8.45721 6.72803C9.07849 6.72803 9.58202 7.23156 9.58202 7.85284C9.58202 8.47412 9.07849 8.97765 8.45721 8.97765ZM12.6591 8.97765C12.0379 8.97765 11.5337 8.47412 11.5337 7.85284C11.5337 7.23156 12.0379 6.72803 12.6591 6.72803C13.2791 6.72803 13.784 7.23156 13.784 7.85284C13.784 8.47412 13.2791 8.97765 12.6591 8.97765Z" fill="white"/>
                         </svg><span>Comment</span>
                     </a>
                    <span class="share-alt-not-fullscreen" style="margin-right: 39px;display: inline-flex;align-items: center;cursor: pointer">
                        <svg style="margin-right: 10px;" class="fa-share-alt" width="19" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.7881 6.49862L14.0737 0.784373C13.9323 0.642981 13.765 0.572266 13.5715 0.572266C13.3781 0.572266 13.2106 0.642981 13.0693 0.784373C12.9279 0.925844 12.8571 1.09327 12.8571 1.28669V4.14382H10.3572C5.05189 4.14382 1.79686 5.64311 0.591329 8.64163C0.197097 9.63853 0 10.8775 0 12.3582C0 13.5932 0.472493 15.271 1.4174 17.3916C1.43968 17.4438 1.47862 17.5329 1.53452 17.6593C1.59038 17.7857 1.64053 17.8973 1.68517 17.9942C1.72997 18.0907 1.77837 18.1726 1.8304 18.2395C1.9196 18.366 2.02382 18.4294 2.14289 18.4294C2.25449 18.4294 2.34194 18.3923 2.40523 18.3179C2.46836 18.2435 2.49999 18.1504 2.49999 18.0391C2.49999 17.9719 2.49068 17.8735 2.47204 17.7432C2.45343 17.6129 2.44409 17.5257 2.44409 17.481C2.40683 16.9752 2.38823 16.5173 2.38823 16.1083C2.38823 15.3569 2.45343 14.6835 2.58352 14.0883C2.71381 13.493 2.89422 12.9778 3.12493 12.5425C3.35561 12.107 3.65313 11.7316 4.01781 11.4153C4.38234 11.0991 4.77477 10.8406 5.19515 10.6397C5.61562 10.4387 6.11039 10.2806 6.6796 10.1653C7.24876 10.05 7.82164 9.96998 8.39835 9.9253C8.97506 9.88062 9.62796 9.85841 10.3572 9.85841H12.8571V12.7156C12.8571 12.909 12.9278 13.0765 13.0691 13.2178C13.2106 13.3591 13.3779 13.4298 13.5713 13.4298C13.7647 13.4298 13.9321 13.3591 14.0737 13.2178L19.788 7.50338C19.9294 7.36198 20 7.19463 20 7.00117C20 6.80775 19.9294 6.64029 19.7881 6.49862Z" fill="white"/>
                        </svg><span>Share</span></span>
                    <span id="not_fullscreen_flag" style="display: inline-flex;align-items: center;cursor: pointer">
                        <svg class="fa-flag" style="margin-right: 10px;" width="18" height="17" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.8814 9.79415C15.6652 9.53344 15.6652 9.15571 15.8814 8.89508L18.2135 6.08426C18.3877 5.87425 18.4249 5.58243 18.3089 5.3354C18.1928 5.08838 17.9446 4.93066 17.6716 4.93066H13.6682V9.16558C13.6682 10.3197 12.7293 11.2586 11.5752 11.2586H8.30469V13.0545C8.30469 13.4433 8.61991 13.7586 9.00875 13.7586H17.6716C17.9446 13.7586 18.1928 13.6008 18.3089 13.3538C18.4249 13.1068 18.3877 12.815 18.2135 12.605L15.8814 9.79415Z" fill="white"/>
                            <path d="M12.2787 9.16555V1.74577C12.2787 1.35694 11.9634 1.04171 11.5746 1.04171H3.70452C3.70452 0.46641 3.23811 0 2.66281 0C2.0875 0 1.62109 0.46641 1.62109 1.04171C1.62109 1.58528 1.62109 18.6751 1.62109 18.9583C1.62109 19.5336 2.0875 20 2.66281 20C3.23811 20 3.70452 19.5336 3.70452 18.9583C3.70452 18.4761 3.70452 10.2005 3.70452 9.86961H11.5746C11.9634 9.86961 12.2787 9.55439 12.2787 9.16555Z" fill="white"/>
                        </svg><span>Report</span>
                    </span>
                </div>

                <!---add to favorite modal [start]--->
                <script>
                    jQuery(document).ready(function($) {
                        $('#add_to_photo_to_favorite button.close').on('click', function (){
                            $('#add_to_photo_to_favorite').hide();
                        });
                        $('#report_photo button.close').on('click', function (){
                            $('#report_photo').hide();
                            $('body').css('overflow', 'auto');
                        });
                    });
                </script>
                <div class="modal" style="display: none;z-index: 9999999" id="add_to_photo_to_favorite" tabindex="-1" role="dialog" aria-labelledby="subscribeUserLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute; top:0; right:0; border-color: transparent !important;background-color: transparent !important;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <p>You need to
                                    <span class="login"><a href="<?php echo wp_login_url();?>"><?php echo esc_html__('Login', 'arc'); ?></a></span>
                                    <span class="login"><?php wp_register(' or ', ''); ?> to add photo to favorites.</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" style="padding-top: 30px;display: none;z-index: 99999" id="report_photo" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-footer">
                                <h2 style="padding-left:20px;padding-top:20px" class="modal-title" id="header">Report<span></span></h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;
                                    top:-39px;
                                    right:-25px;
                                    border-color: transparent !important;
                                    background-color: transparent !important;box-shadow: none !important;">
                                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                                        <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                                    </svg>
                                </button>
                                <div id="photo-report">
                                    <table style="width: 100%">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <!--<label style="margin-left: 20px;" for="user_post_report_type" id="report_reason">Report reason</label><br>-->
                                                <select name="photo_report" id="photo_report_type">
                                                    <option value="wrong"><?php echo __('Inappropriate content','arc');?></option>
                                                    <option value="underagePhoto"><?php echo __('Underage nudity','arc');?></option>
                                                    <option value="violent"><?php echo __('Violent or harmful acts','arc');?></option>
                                                    <option value="spam"><?php echo __('Spam','arc');?></option>
                                                    <option value="otherPhoto"><?php echo __('Other','arc');?></option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <br>
                                                <textarea id="photoReportMsg" style="min-height: 120px;" rows="1" cols="10" placeholder="Describe the problem"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-info" id="sendPhotoReport"><?php echo __('Report', 'arc')?></button>
                                                <p id="photoReportSendMsg" style="display: none"><?php echo __('Thanks! We got your report.');?></p></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---add to favorite modal [end]--->
                <!-- Favorite-Share-Comment-Report [end]-->
            </div>
            <!-- Control interface [end] -->

            <!-- Share Buttons [start]-->
            <div id="video-share" style="margin-bottom: 10px; display: none;" class="fig share-not-fullscreen">
                <!-- Facebook -->
                <?php if( xbox_get_field_value( 'my-theme-options', 'facebook' ) == 'on' ) : ?>
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.12';
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo wp_get_attachment_url($post->ID); ?>&amp;src=sdkpreparse">
	                    <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#3B5998"/>
                                <rect width="40" height="40" rx="4" fill="url(#facebook_gradient2)"/>
                                <path d="M21.5502 30V20.8777H24.6109L25.0701 17.3216H21.5502V15.0515C21.5502 14.0222 21.8348 13.3208 23.3125 13.3208L25.194 13.32V10.1392C24.8686 10.0969 23.7517 10 22.4517 10C19.7371 10 17.8786 11.657 17.8786 14.6993V17.3216H14.8086V20.8777H17.8786V30H21.5502Z" fill="white"/>
                                <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                <defs>
                                    <linearGradient id="facebook_gradient2" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#29498C"/>
                                        <stop offset="0.71046" stop-color="#3B5998"/>
                                    </linearGradient>
                                </defs>
                            </svg>
	                    <?php else:?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#3B5998"/>
                                <path d="M21.5502 30V20.8777H24.6109L25.0701 17.3216H21.5502V15.0515C21.5502 14.0222 21.8348 13.3208 23.3125 13.3208L25.194 13.32V10.1392C24.8686 10.0969 23.7517 10 22.4517 10C19.7371 10 17.8786 11.657 17.8786 14.6993V17.3216H14.8086V20.8777H17.8786V30H21.5502Z" fill="white"/>
                            </svg>
	                    <?php endif;?>
                    </a>
                <?php endif; ?>
                <!-- Twitter -->
                <?php if( xbox_get_field_value( 'my-theme-options', 'twitter' ) == 'on' ) : ?>
                    <a target="_blank" href="https://twitter.com/home?status=<?php echo wp_get_attachment_url($post->ID);?>">
	                    <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#55ACEE"/>
                                <rect width="40" height="40" rx="4" fill="url(#twitter_linear2)"/>
                                <g clip-path="url(#twitter_gradient3)">
                                    <path d="M27.945 15.9275C28.7583 15.35 29.4425 14.6292 30 13.7992V13.7983C29.2558 14.1242 28.4642 14.3408 27.6375 14.4458C28.4875 13.9383 29.1367 13.1408 29.4417 12.18C28.6492 12.6525 27.7742 12.9858 26.8417 13.1725C26.0892 12.3708 25.0167 11.875 23.8467 11.875C21.5767 11.875 19.7492 13.7175 19.7492 15.9758C19.7492 16.3008 19.7767 16.6133 19.8442 16.9108C16.4358 16.7442 13.4192 15.1108 11.3925 12.6217C11.0392 13.2358 10.8308 13.9383 10.8308 14.6942C10.8308 16.1142 11.5617 17.3725 12.6525 18.1017C11.9933 18.0892 11.3475 17.8975 10.8 17.5967V17.6417C10.8 19.6342 12.2208 21.2892 14.085 21.6708C13.7508 21.7625 13.3875 21.8058 13.01 21.8058C12.7475 21.8058 12.4825 21.7908 12.2342 21.7358C12.765 23.3592 14.2733 24.5533 16.065 24.5925C14.67 25.6833 12.8983 26.3408 10.9808 26.3408C10.645 26.3408 10.3225 26.3258 10 26.285C11.8167 27.4558 13.9683 28.125 16.29 28.125C23.5258 28.125 28.2417 22.0883 27.945 15.9275Z" fill="white"/>
                                </g>
                                <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                <defs>
                                    <linearGradient id="twitter_linear2" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#3894DA"/>
                                        <stop offset="0.71046" stop-color="#55ACEE"/>
                                    </linearGradient>
                                    <clipPath id="twitter_gradient3">
                                        <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                    </clipPath>
                                </defs>
                            </svg>
	                    <?php else:?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#55ACEE"/>
                                <g clip-path="url(#tw_flat)">
                                    <path d="M27.945 15.9275C28.7583 15.35 29.4425 14.6292 30 13.7992V13.7983C29.2558 14.1242 28.4642 14.3408 27.6375 14.4458C28.4875 13.9383 29.1367 13.1408 29.4417 12.18C28.6492 12.6525 27.7742 12.9858 26.8417 13.1725C26.0892 12.3708 25.0167 11.875 23.8467 11.875C21.5767 11.875 19.7492 13.7175 19.7492 15.9758C19.7492 16.3008 19.7767 16.6133 19.8442 16.9108C16.4358 16.7442 13.4192 15.1108 11.3925 12.6217C11.0392 13.2358 10.8308 13.9383 10.8308 14.6942C10.8308 16.1142 11.5617 17.3725 12.6525 18.1017C11.9933 18.0892 11.3475 17.8975 10.8 17.5967V17.6417C10.8 19.6342 12.2208 21.2892 14.085 21.6708C13.7508 21.7625 13.3875 21.8058 13.01 21.8058C12.7475 21.8058 12.4825 21.7908 12.2342 21.7358C12.765 23.3592 14.2733 24.5533 16.065 24.5925C14.67 25.6833 12.8983 26.3408 10.9808 26.3408C10.645 26.3408 10.3225 26.3258 10 26.285C11.8167 27.4558 13.9683 28.125 16.29 28.125C23.5258 28.125 28.2417 22.0883 27.945 15.9275Z" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="tw_flat">
                                        <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                    </clipPath>
                                </defs>
                            </svg>
	                    <?php endif;?>
                    </a>
                <?php endif; ?>
                <!-- Linkedin -->
                <?php if( xbox_get_field_value( 'my-theme-options', 'linkedin' ) == 'on' ) : ?>
                    <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo wp_get_attachment_url($post->ID);?>&amp;title=<?php echo $post->post_title;?>&amp;summary=<?php echo 'photo';?>&amp;source=<?php print home_url();?>">
	                    <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#007BB5"/>
                                <rect width="40" height="40" rx="4" fill="url(#linkein_linear2)"/>
                                <g clip-path="url(#linkein_gradient2)">
                                    <path d="M10.6495 29.1346H13.2495C13.6082 29.1346 13.8989 28.8438 13.8989 28.4851V17.1204C13.8989 16.7617 13.6082 16.4709 13.2495 16.4709H10.6495C10.2907 16.4709 10 16.7617 10 17.1204V28.4851C10 28.8438 10.2907 29.1346 10.6495 29.1346Z" fill="white"/>
                                    <path d="M10.6495 14.473H13.2495C13.6082 14.473 13.8989 14.1822 13.8989 13.8235V11.5147C13.8989 11.156 13.6082 10.8652 13.2495 10.8652H10.6495C10.2907 10.8652 10 11.156 10 11.5147V13.8235C10 14.1822 10.2907 14.473 10.6495 14.473Z" fill="white"/>
                                    <path d="M29.0235 17.7892C28.6582 17.3082 28.1194 16.9127 27.4071 16.6027C26.6947 16.2929 25.9084 16.1379 25.0482 16.1379C23.3018 16.1379 21.8219 16.8044 20.6087 18.1377C20.3673 18.403 20.1918 18.345 20.1918 17.9862V17.1204C20.1918 16.7617 19.901 16.471 19.5423 16.471H17.2198C16.861 16.471 16.5703 16.7617 16.5703 17.1204V28.4851C16.5703 28.8438 16.8611 29.1346 17.2198 29.1346H19.8198C20.1785 29.1346 20.4693 28.8438 20.4693 28.4851V24.5328C20.4693 22.8862 20.5687 21.7576 20.7675 21.1471C20.9663 20.5367 21.3341 20.0464 21.8706 19.6764C22.4072 19.3064 23.013 19.1213 23.6884 19.1213C24.2156 19.1213 24.6666 19.2508 25.0413 19.5099C25.416 19.769 25.6866 20.1319 25.8531 20.5991C26.0197 21.0663 26.1029 22.0954 26.1029 23.6865V28.4851C26.1029 28.8438 26.3936 29.1346 26.7523 29.1346H29.3523C29.711 29.1346 30.0017 28.8438 30.0017 28.4851V22.0491C30.0017 20.9114 29.93 20.0371 29.7868 19.4266C29.6436 18.8162 29.3891 18.2703 29.0235 17.7892Z" fill="white"/>
                                </g>
                                <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                <defs>
                                    <linearGradient id="linkein_linear2" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#00618F"/>
                                        <stop offset="0.71046" stop-color="#007BB5"/>
                                    </linearGradient>
                                    <clipPath id="linkein_gradient2">
                                        <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                    </clipPath>
                                </defs>
                            </svg>
	                    <?php else: ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#007BB5"/>
                                <g clip-path="url(linkedin_svg2)">
                                    <path d="M10.6495 29.1346H13.2495C13.6082 29.1346 13.8989 28.8438 13.8989 28.4851V17.1204C13.8989 16.7617 13.6082 16.4709 13.2495 16.4709H10.6495C10.2907 16.4709 10 16.7617 10 17.1204V28.4851C10 28.8438 10.2907 29.1346 10.6495 29.1346Z" fill="white"/>
                                    <path d="M10.6495 14.473H13.2495C13.6082 14.473 13.8989 14.1822 13.8989 13.8235V11.5147C13.8989 11.156 13.6082 10.8652 13.2495 10.8652H10.6495C10.2907 10.8652 10 11.156 10 11.5147V13.8235C10 14.1822 10.2907 14.473 10.6495 14.473Z" fill="white"/>
                                    <path d="M29.0235 17.7892C28.6582 17.3082 28.1194 16.9127 27.4071 16.6027C26.6947 16.2929 25.9084 16.1379 25.0482 16.1379C23.3018 16.1379 21.8219 16.8044 20.6087 18.1377C20.3673 18.403 20.1918 18.345 20.1918 17.9862V17.1204C20.1918 16.7617 19.901 16.471 19.5423 16.471H17.2198C16.861 16.471 16.5703 16.7617 16.5703 17.1204V28.4851C16.5703 28.8438 16.8611 29.1346 17.2198 29.1346H19.8198C20.1785 29.1346 20.4693 28.8438 20.4693 28.4851V24.5328C20.4693 22.8862 20.5687 21.7576 20.7675 21.1471C20.9663 20.5367 21.3341 20.0464 21.8706 19.6764C22.4072 19.3064 23.013 19.1213 23.6884 19.1213C24.2156 19.1213 24.6666 19.2508 25.0413 19.5099C25.416 19.769 25.6866 20.1319 25.8531 20.5991C26.0197 21.0663 26.1029 22.0954 26.1029 23.6865V28.4851C26.1029 28.8438 26.3936 29.1346 26.7523 29.1346H29.3523C29.711 29.1346 30.0017 28.8438 30.0017 28.4851V22.0491C30.0017 20.9114 29.93 20.0371 29.7868 19.4266C29.6436 18.8162 29.3891 18.2703 29.0235 17.7892Z" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="linkedin_svg2">
                                        <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                    </clipPath>
                                </defs>
                            </svg>
	                    <?php endif; ?>
                    </a>
                <?php endif; ?>
                <!-- Tumblr -->
                <?php if( xbox_get_field_value( 'my-theme-options', 'tumblr' ) == 'on' ) : ?>
                    <a target="_blank" href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo wp_get_attachment_url($post->ID);?>">
	                    <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#36465D"/>
                                <rect width="40" height="40" rx="4" fill="url(#thumbr_linear2)"/>
                                <path d="M23.6275 26.74C23.0725 26.74 22.5525 26.61 22.1225 26.3475C21.7788 26.1475 21.4763 25.8075 21.3563 25.4838C21.2363 25.1538 21.2488 24.4788 21.2488 23.3238V18.7437H26.2525V15.0012H21.2488V10H18.025C17.895 11.0288 17.6613 11.8825 17.3175 12.5425C16.9888 13.215 16.5263 13.7838 15.98 14.265C15.415 14.7413 14.54 15.105 13.75 15.3637V18.1975H16.4338V25.2063C16.4338 26.125 16.5262 26.8263 16.7237 27.305C16.9175 27.7875 17.2488 28.2412 17.755 28.6663C18.2525 29.0962 18.8475 29.4263 19.5588 29.6588C20.2513 29.8875 20.7963 30 21.7125 30C22.5163 30 23.2675 29.9237 23.955 29.755C24.6438 29.5987 25.3925 29.3612 26.2525 28.96V25.9537C25.2475 26.61 24.6413 26.74 23.6275 26.74Z" fill="white"/>
                                <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                <defs>
                                    <linearGradient id="thumbr_linear2" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#28374D"/>
                                        <stop offset="0.71046" stop-color="#36465D"/>
                                    </linearGradient>
                                </defs>
                            </svg>
	                    <?php else: ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#36465D"/>
                                <path d="M23.6275 26.74C23.0725 26.74 22.5525 26.61 22.1225 26.3475C21.7788 26.1475 21.4763 25.8075 21.3563 25.4838C21.2363 25.1538 21.2488 24.4788 21.2488 23.3238V18.7437H26.2525V15.0012H21.2488V10H18.025C17.895 11.0288 17.6613 11.8825 17.3175 12.5425C16.9888 13.215 16.5263 13.7838 15.98 14.265C15.415 14.7413 14.54 15.105 13.75 15.3637V18.1975H16.4338V25.2063C16.4338 26.125 16.5262 26.8263 16.7237 27.305C16.9175 27.7875 17.2488 28.2412 17.755 28.6663C18.2525 29.0962 18.8475 29.4263 19.5588 29.6588C20.2513 29.8875 20.7963 30 21.7125 30C22.5163 30 23.2675 29.9237 23.955 29.755C24.6438 29.5987 25.3925 29.3612 26.2525 28.96V25.9537C25.2475 26.61 24.6413 26.74 23.6275 26.74Z" fill="white"/>
                            </svg>
	                    <?php endif; ?>
                    </a>
                <?php endif; ?>
                <!-- Reddit -->
                <?php if( xbox_get_field_value( 'my-theme-options', 'reddit' ) == 'on' ) : ?>
                    <a target="_blank" href="http://www.reddit.com/submit?url=<?php echo wp_get_attachment_url($post->ID);?>&amp;title=<?php echo $post->post_title;?>">
	                    <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#FF4500"/>
                                <rect width="40" height="40" rx="4" fill="url(#reddit_linear2)"/>
                                <path d="M16.8438 21.2434V21.2447H17.466L16.8438 21.2434Z" fill="white"/>
                                <path d="M23.0664 21.2434V21.2447H23.6887L23.0664 21.2434Z" fill="white"/>
                                <path d="M30 19.3778C30 18.005 28.8836 16.8887 27.5109 16.8887C26.962 16.8887 26.4406 17.0679 26.0149 17.3927C24.626 16.4282 22.8065 15.8532 20.8712 15.7076L21.9154 13.2583L24.9533 13.9677C25.0504 14.9073 25.837 15.6441 26.8015 15.6441C27.8307 15.6441 28.6683 14.8065 28.6683 13.7773C28.6683 12.748 27.8307 11.9105 26.8015 11.9105C26.1493 11.9105 25.5756 12.2477 25.2421 12.7568L21.6914 11.9266C21.3902 11.8582 21.0952 12.0113 20.9757 12.2888L19.532 15.674C17.4424 15.7462 15.4512 16.3349 13.9477 17.3604C13.5383 17.0567 13.0305 16.8887 12.4891 16.8887C11.1164 16.8887 10 18.005 10 19.3778C10 20.2876 10.4966 21.1102 11.2582 21.5321C11.2483 21.6416 11.2446 21.7536 11.2446 21.8669C11.2446 25.2981 15.1525 28.0897 19.9564 28.0897C24.7592 28.0897 28.6683 25.2981 28.6683 21.8669C28.6683 21.7698 28.6646 21.674 28.6584 21.5782C29.4698 21.165 30 20.3224 30 19.3778ZM26.8015 13.155C27.1437 13.155 27.4238 13.4338 27.4238 13.7773C27.4238 14.1208 27.1437 14.3996 26.8015 14.3996C26.4592 14.3996 26.1792 14.1208 26.1792 13.7773C26.1792 13.4338 26.4592 13.155 26.8015 13.155ZM15.6005 21.2446C15.6005 20.5589 16.1593 20.0001 16.8451 20.0001C17.5308 20.0001 18.0896 20.5589 18.0896 21.2446C18.0896 21.9316 17.5308 22.4892 16.8451 22.4892C16.1593 22.4892 15.6005 21.9316 15.6005 21.2446ZM22.8301 25.3728C21.9714 25.9938 20.9633 26.305 19.9564 26.305C18.9496 26.305 17.9415 25.9938 17.0828 25.3728C16.804 25.1712 16.7418 24.7816 16.9434 24.5041C17.145 24.2266 17.5345 24.1644 17.8121 24.3647C19.0952 25.2919 20.8177 25.2944 22.1008 24.3647C22.3783 24.1644 22.7666 24.2241 22.9695 24.5041C23.1711 24.7829 23.1077 25.1712 22.8301 25.3728ZM23.0678 22.4892C22.3808 22.4892 21.8233 21.9316 21.8233 21.2446C21.8233 20.5589 22.3808 20.0001 23.0678 20.0001C23.7548 20.0001 24.3124 20.5589 24.3124 21.2446C24.3124 21.9316 23.7548 22.4892 23.0678 22.4892Z" fill="white"/>
                                <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                <defs>
                                    <linearGradient id="reddit_linear2" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#D93B00"/>
                                        <stop offset="0.71046" stop-color="#FF4500"/>
                                    </linearGradient>
                                </defs>
                            </svg>
	                    <?php else: ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#FF4500"/>
                                <path d="M16.8438 21.2434V21.2447H17.466L16.8438 21.2434Z" fill="white"/>
                                <path d="M23.0664 21.2434V21.2447H23.6887L23.0664 21.2434Z" fill="white"/>
                                <path d="M30 19.3778C30 18.005 28.8836 16.8887 27.5109 16.8887C26.962 16.8887 26.4406 17.0679 26.0149 17.3927C24.626 16.4282 22.8065 15.8532 20.8712 15.7076L21.9154 13.2583L24.9533 13.9677C25.0504 14.9073 25.837 15.6441 26.8015 15.6441C27.8307 15.6441 28.6683 14.8065 28.6683 13.7773C28.6683 12.748 27.8307 11.9105 26.8015 11.9105C26.1493 11.9105 25.5756 12.2477 25.2421 12.7568L21.6914 11.9266C21.3902 11.8582 21.0952 12.0113 20.9757 12.2888L19.532 15.674C17.4424 15.7462 15.4512 16.3349 13.9477 17.3604C13.5383 17.0567 13.0305 16.8887 12.4891 16.8887C11.1164 16.8887 10 18.005 10 19.3778C10 20.2876 10.4966 21.1102 11.2582 21.5321C11.2483 21.6416 11.2446 21.7536 11.2446 21.8669C11.2446 25.2981 15.1525 28.0897 19.9564 28.0897C24.7592 28.0897 28.6683 25.2981 28.6683 21.8669C28.6683 21.7698 28.6646 21.674 28.6584 21.5782C29.4698 21.165 30 20.3224 30 19.3778ZM26.8015 13.155C27.1437 13.155 27.4238 13.4338 27.4238 13.7773C27.4238 14.1208 27.1437 14.3996 26.8015 14.3996C26.4592 14.3996 26.1792 14.1208 26.1792 13.7773C26.1792 13.4338 26.4592 13.155 26.8015 13.155ZM15.6005 21.2446C15.6005 20.5589 16.1593 20.0001 16.8451 20.0001C17.5308 20.0001 18.0896 20.5589 18.0896 21.2446C18.0896 21.9316 17.5308 22.4892 16.8451 22.4892C16.1593 22.4892 15.6005 21.9316 15.6005 21.2446ZM22.8301 25.3728C21.9714 25.9938 20.9633 26.305 19.9564 26.305C18.9496 26.305 17.9415 25.9938 17.0828 25.3728C16.804 25.1712 16.7418 24.7816 16.9434 24.5041C17.145 24.2266 17.5345 24.1644 17.8121 24.3647C19.0952 25.2919 20.8177 25.2944 22.1008 24.3647C22.3783 24.1644 22.7666 24.2241 22.9695 24.5041C23.1711 24.7829 23.1077 25.1712 22.8301 25.3728ZM23.0678 22.4892C22.3808 22.4892 21.8233 21.9316 21.8233 21.2446C21.8233 20.5589 22.3808 20.0001 23.0678 20.0001C23.7548 20.0001 24.3124 20.5589 24.3124 21.2446C24.3124 21.9316 23.7548 22.4892 23.0678 22.4892Z" fill="white"/>
                            </svg>
	                    <?php endif; ?>
                    </a>
                <?php endif; ?>
                <!-- Odnoklassniki -->
                <?php if( xbox_get_field_value( 'my-theme-options', 'odnoklassniki' ) == 'on' ) : ?>
                    <a target="_blank" href="https://connect.ok.ru/offer?url=<?php echo wp_get_attachment_url($post->ID);?>&title=<?php echo $post->post_title;?>">
	                    <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#F7931E"/>
                                <rect width="40" height="40" rx="4" fill="url(#odnoklassniki_linear2)"/>
                                <g clip-path="url(#odnoklassniki_gradient2)">
                                    <path d="M13.9341 20.7342C13.4233 21.7384 14.0033 22.2184 15.3266 23.0384C16.4516 23.7334 18.0058 23.9875 19.0041 24.0892C18.595 24.4825 20.47 22.6792 15.07 27.8734C13.925 28.9709 15.7683 30.7317 16.9125 29.6575L20.01 26.67C21.1958 27.8109 22.3325 28.9042 23.1075 29.6617C24.2525 30.74 26.095 28.9942 24.9625 27.8775C24.8775 27.7967 20.765 23.8517 21.0158 24.0934C22.0266 23.9917 23.5575 23.7225 24.6691 23.0425L24.6683 23.0417C25.9916 22.2175 26.5716 21.7384 26.0683 20.7342C25.7641 20.1642 24.9441 19.6875 23.8525 20.5117C23.8525 20.5117 22.3783 21.6409 20.0008 21.6409C17.6225 21.6409 16.1491 20.5117 16.1491 20.5117C15.0583 19.6834 14.235 20.1642 13.9341 20.7342Z" fill="white"/>
                                    <path d="M20.0002 20.1183C22.8985 20.1183 25.2652 17.8533 25.2652 15.065C25.2652 12.265 22.8985 10 20.0002 10C17.101 10 14.7344 12.265 14.7344 15.065C14.7344 17.8533 17.101 20.1183 20.0002 20.1183ZM20.0002 12.5658C21.4244 12.5658 22.586 13.6833 22.586 15.065C22.586 16.435 21.4244 17.5525 20.0002 17.5525C18.576 17.5525 17.4144 16.435 17.4144 15.065C17.4135 13.6825 18.5752 12.5658 20.0002 12.5658Z" fill="white"/>
                                </g>
                                <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                <defs>
                                    <linearGradient id="odnoklassniki_linear2" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#E87D00"/>
                                        <stop offset="0.71046" stop-color="#F7931E"/>
                                    </linearGradient>
                                    <clipPath id="odnoklassniki_gradient2">
                                        <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                    </clipPath>
                                </defs>
                            </svg>

	                    <?php else: ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#F7931E"/>
                                <g clip-path="url(#odnoklassniki_flat)">
                                    <path d="M13.9341 20.7341C13.4233 21.7382 14.0033 22.2182 15.3266 23.0382C16.4516 23.7332 18.0058 23.9874 19.0041 24.0891C18.595 24.4824 20.47 22.6791 15.07 27.8732C13.925 28.9707 15.7683 30.7316 16.9125 29.6574L20.01 26.6699C21.1958 27.8107 22.3325 28.9041 23.1075 29.6616C24.2525 30.7399 26.095 28.9941 24.9625 27.8774C24.8775 27.7966 20.765 23.8516 21.0158 24.0932C22.0266 23.9916 23.5575 23.7224 24.6691 23.0424L24.6683 23.0416C25.9916 22.2174 26.5716 21.7382 26.0683 20.7341C25.7641 20.1641 24.9441 19.6874 23.8525 20.5116C23.8525 20.5116 22.3783 21.6407 20.0008 21.6407C17.6225 21.6407 16.1491 20.5116 16.1491 20.5116C15.0583 19.6832 14.235 20.1641 13.9341 20.7341Z" fill="white"/>
                                    <path d="M20.0002 20.1183C22.8985 20.1183 25.2652 17.8533 25.2652 15.065C25.2652 12.265 22.8985 10 20.0002 10C17.101 10 14.7344 12.265 14.7344 15.065C14.7344 17.8533 17.101 20.1183 20.0002 20.1183ZM20.0002 12.5658C21.4244 12.5658 22.586 13.6833 22.586 15.065C22.586 16.435 21.4244 17.5525 20.0002 17.5525C18.576 17.5525 17.4144 16.435 17.4144 15.065C17.4135 13.6825 18.5752 12.5658 20.0002 12.5658Z" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="odnoklassniki_flat">
                                        <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                    </clipPath>
                                </defs>
                            </svg>
	                    <?php endif; ?>
                    </a>
                <?php endif; ?>

                <!-- Email -->
                <?php if( xbox_get_field_value( 'my-theme-options', 'email' ) == 'on' ) : ?>
                    <a target="_blank" href="mailto:?subject=&amp;body=<?php the_permalink(); ?>">
	                    <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#2F5DBD"/>
                                <rect width="40" height="40" rx="4" fill="url(#email_linear2)"/>
                                <g clip-path="url(#email_gradient2)">
                                    <path d="M28.216 27.8572C28.6656 27.8572 29.0551 27.7087 29.3863 27.4156L23.72 21.7491C23.584 21.8464 23.4522 21.9411 23.3278 22.0311C22.9037 22.3435 22.5596 22.5873 22.2953 22.762C22.0311 22.9371 21.6795 23.1156 21.2406 23.2978C20.8015 23.4802 20.3924 23.5711 20.0128 23.5711H20.0017H19.9906C19.6111 23.5711 19.2019 23.4803 18.7628 23.2978C18.3237 23.1156 17.9722 22.9371 17.7082 22.762C17.4439 22.5873 17.1 22.3436 16.6757 22.0311C16.5575 21.9444 16.4264 21.8493 16.2846 21.7476L10.6172 27.4156C10.9483 27.7087 11.3381 27.8572 11.7876 27.8572H28.216Z" fill="white"/>
                                    <path d="M11.1274 18.1808C10.7033 17.8981 10.3273 17.5744 10 17.2097V25.8309L14.9943 20.8366C13.9951 20.1391 12.7078 19.2548 11.1274 18.1808Z" fill="white"/>
                                    <path d="M28.884 18.1808C27.3639 19.2097 26.0718 20.0955 25.0078 20.8386L30.0001 25.8311V17.2097C29.68 17.5671 29.308 17.8906 28.884 18.1808Z" fill="white"/>
                                    <path d="M28.2139 12.1428H11.7856C11.2125 12.1428 10.7718 12.3364 10.4631 12.723C10.1542 13.1099 10 13.5937 10 14.1739C10 14.6426 10.2046 15.1504 10.6138 15.6975C11.0229 16.2444 11.4582 16.6739 11.9196 16.9864C12.1725 17.1651 12.9351 17.6953 14.2076 18.5769C14.8945 19.0529 15.4918 19.4678 16.0052 19.8258C16.4427 20.1307 16.8201 20.3947 17.1316 20.6138C17.1674 20.6389 17.2236 20.6791 17.2983 20.7325C17.3787 20.7902 17.4805 20.8636 17.6061 20.9542C17.8479 21.1291 18.0487 21.2705 18.2087 21.3785C18.3685 21.4865 18.5621 21.6071 18.7891 21.7411C19.0161 21.8749 19.2301 21.9756 19.4309 22.0425C19.6319 22.1094 19.8178 22.1429 19.9889 22.1429H20.0001H20.0112C20.1822 22.1429 20.3682 22.1094 20.5692 22.0425C20.77 21.9756 20.9839 21.8752 21.211 21.7411C21.4378 21.6071 21.6312 21.4862 21.7914 21.3785C21.9514 21.2705 22.1523 21.1291 22.3941 20.9542C22.5194 20.8636 22.6212 20.7902 22.7016 20.7327C22.7763 20.6791 22.8325 20.6391 22.8685 20.6138C23.1112 20.4449 23.4894 20.182 23.9979 19.8289C24.9232 19.186 26.2859 18.2398 28.0917 16.9864C28.6348 16.6071 29.0886 16.1493 29.4533 15.6137C29.8173 15.0782 29.9998 14.5164 29.9998 13.9286C29.9998 13.4375 29.8228 13.0173 29.4697 12.6673C29.1162 12.3177 28.6976 12.1428 28.2139 12.1428Z" fill="white"/>
                                </g>
                                <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                <defs>
                                    <linearGradient id="email_linear2" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#1F4CA8"/>
                                        <stop offset="0.71046" stop-color="#2F5DBD"/>
                                    </linearGradient>
                                    <clipPath id="email_gradient2">
                                        <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                    </clipPath>
                                </defs>
                            </svg>

	                    <?php else:?>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="4" fill="#2F5DBD"/>
                                <g clip-path="url(#email_flat)">
                                    <path d="M28.216 27.8572C28.6656 27.8572 29.0551 27.7087 29.3863 27.4156L23.72 21.7491C23.584 21.8464 23.4522 21.9411 23.3278 22.0311C22.9037 22.3435 22.5596 22.5873 22.2953 22.762C22.0311 22.9371 21.6795 23.1156 21.2406 23.2978C20.8015 23.4802 20.3924 23.5711 20.0128 23.5711H20.0017H19.9906C19.6111 23.5711 19.2019 23.4803 18.7628 23.2978C18.3237 23.1156 17.9722 22.9371 17.7082 22.762C17.4439 22.5873 17.1 22.3436 16.6757 22.0311C16.5575 21.9444 16.4264 21.8493 16.2846 21.7476L10.6172 27.4156C10.9483 27.7087 11.3381 27.8572 11.7876 27.8572H28.216Z" fill="white"/>
                                    <path d="M11.1274 18.1808C10.7033 17.8981 10.3273 17.5744 10 17.2097V25.8309L14.9943 20.8366C13.9951 20.1391 12.7078 19.2548 11.1274 18.1808Z" fill="white"/>
                                    <path d="M28.884 18.1808C27.3639 19.2097 26.0718 20.0955 25.0078 20.8386L30.0001 25.8311V17.2097C29.68 17.5671 29.308 17.8906 28.884 18.1808Z" fill="white"/>
                                    <path d="M28.2139 12.1428H11.7856C11.2125 12.1428 10.7718 12.3364 10.4631 12.723C10.1542 13.1099 10 13.5937 10 14.1739C10 14.6426 10.2046 15.1504 10.6138 15.6975C11.0229 16.2444 11.4582 16.6739 11.9196 16.9864C12.1725 17.1651 12.9351 17.6953 14.2076 18.5769C14.8945 19.0529 15.4918 19.4678 16.0052 19.8258C16.4427 20.1307 16.8201 20.3947 17.1316 20.6138C17.1674 20.6389 17.2236 20.6791 17.2983 20.7325C17.3787 20.7902 17.4805 20.8636 17.6061 20.9542C17.8479 21.1291 18.0487 21.2705 18.2087 21.3785C18.3685 21.4865 18.5621 21.6071 18.7891 21.7411C19.0161 21.8749 19.2301 21.9756 19.4309 22.0425C19.6319 22.1094 19.8178 22.1429 19.9889 22.1429H20.0001H20.0112C20.1822 22.1429 20.3682 22.1094 20.5692 22.0425C20.77 21.9756 20.9839 21.8752 21.211 21.7411C21.4378 21.6071 21.6312 21.4862 21.7914 21.3785C21.9514 21.2705 22.1523 21.1291 22.3941 20.9542C22.5194 20.8636 22.6212 20.7902 22.7016 20.7327C22.7763 20.6791 22.8325 20.6391 22.8685 20.6138C23.1112 20.4449 23.4894 20.182 23.9979 19.8289C24.9232 19.186 26.2859 18.2398 28.0917 16.9864C28.6348 16.6071 29.0886 16.1493 29.4533 15.6137C29.8173 15.0782 29.9998 14.5164 29.9998 13.9286C29.9998 13.4375 29.8228 13.0173 29.4697 12.6673C29.1162 12.3177 28.6976 12.1428 28.2139 12.1428Z" fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="email_flat">
                                        <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                    </clipPath>
                                </defs>
                            </svg>
	                    <?php endif;?>
                    </a>
                <?php endif; ?>
            </div>
            <!-- Share Buttons [end]-->

            <!-- Tags [start]-->
            <style>
                #galleries_tags_div {
                    margin: 0;
                    padding: 0;
                    width: 100%;
                    border-top: 1px solid <?=get_theme_mod('primary_color_setting');?>;
                    border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
                    padding-top: 15px;
                    padding-bottom: 15px;
                    display: inline-flex !important;
                    font-family: 'Roboto',sans-serif;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 18px!important;
                    line-height: 21px!important;
                    padding-left: 5px
                }
                #galleries_tags {
                    display: flex;
                    flex-wrap: wrap;
                    margin: 0;
                    padding: 0;
                    width: 100%;
                    margin-left: 20px;
                }
                li.gal_tag {
                    list-style: none;
                    margin: 7px;
                    padding-left: 10px !important;
                    padding-right: 10px !important;
                    border: none !important;
                    background: <?=get_theme_mod('primary_color_setting')?> !important;
                    border-radius: 4px!important;
                    padding-top: 4px;
                    padding-bottom: 4px;
                    font-family: 'Roboto',sans-serif;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 18px;
                    line-height: 21px;
                }
                li.gal_tag:first-child {
                    margin-left: 0px;
                }
                #modalWindowAlyaFancybox {
                    background: linear-gradient(180deg,
                    rgba(<?php
                    $hex = get_theme_mod('secondary_background_color');
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>, .7)
                            0%,
                            rgba(<?php
                    $hex = get_theme_mod('secondary_background_color');
                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                    echo $r.",".$g.",". $b;
                    ?>, .9)
                    100%);
                    backdrop-filter: blur(15px);
                }
                #modalWindowAlyaFancybox .modal-content {
                    background: none!important;
                    background-color: transparent !important;
                    box-shadow: none !important;
                    border: none !important;
                }
            </style>
            <?php
            $galleries_tags = wp_get_post_terms($gallery_id, 'photos_tag');
            if(count($galleries_tags) > 0):?>
                <div id="galleries_tags_div">
                    <p style="margin: 0;padding: 0;margin-top: 10px;">Tags: </p>
                    <ul id="galleries_tags">
                        <?php foreach($galleries_tags as $tag):?>
	                        <?php $tag_name = restyle_tag($tag->name);?>
                            <li class="label gal_tag"><a href="/photos/?tags=<?=$tag->slug;?>/"><?=$tag_name;?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            <?php endif;?>
            <!-- Tags [end]-->
            <style>
                div#rating.rating_full_screen {
                    width: 33.3% !important;
                }
                div#photo_counter span {
                    font-family: 'Roboto';
                    font-style: normal;
                    font-weight: normal;
                    font-size: 18px;
                    line-height: 21px;
                    color: <?=get_theme_mod('secondary_text_site_color')?>;
                    width: 33.3%;
                }
                div.div_control_fullscreen a,
                div.div_control_fullscreen i.fa-heart-o,
                div.div_control_fullscreen i.fa-heart{
                    color:rgba(<?php
                        $hex = get_theme_mod('secondary_text_site_color');
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                        echo $r.",".$g.",". $b;
                        ?>, 0.5) !important;
                }
                div.div_control_fullscreen svg path,
                div.div_control_fullscreen button.close svg path{
                    fill:<?=get_theme_mod('secondary_text_site_color');?>!important;
                    fill-opacity: 0.5!important;
                }
                div#main_photo img {
                    border-radius: 4px;
                }
            </style>
            <!-- Full screen modal [start]-->
            <div class="modal" style="display: none" id="modalWindowAlyaFancybox" tabindex="-1" role="dialog" aria-labelledby="subscribeUserLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <progress value="0" max="100" style="width: 100%"></progress>
                            <div style="display:flex;justify-content: space-between;align-items: center;">
                                <!-- Like-Dislike-Views [end] -->
                                <div id="rating" class="rating_full_screen" style="flex-wrap:nowrap;padding-top: 0.9em; width:33.3%;">
                                    <div style="display:inline-flex;align-items: flex-end;font-size: 16px !important;flex-wrap:nowrap">
			                            <?php if( xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on' ) : ?>
                                            <span id="video-views" style="margin-right: 10px;white-space: nowrap"><span><?php echo (int)get_post_meta($post->ID, 'post_views_count', true) ?></span>
                                                <?php echo esc_html__('views', 'arc'); ?></span>
			                            <?php endif;?>

			                            <?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
			                            <?php if(is_user_logged_in()):?>
                                        <span class="percentage" style="margin-right: 10px;white-space: nowrap;font-size: 16px !important;">0%</span>
                                        <span id="video-rate-full-screen" style="display: inherit;margin-right: 10px; white-space: nowrap;font-size: 16px !important;">
                                            <span class="post-like" style="white-space: nowrap;display: flex;font-size: 16px !important;">
                                                <a href="#" data-post_id="" class="a_like" data-post_like="like">
                                                <span class="like">
                                                    <span id="more">
                                                        <i class="fa fa-thumbs-up" style=""></i>
                                                        <span class="likes_count">0</span>
                                                        <span class="grey-link"></span>
                                                    </span>
                                                </span>
                                                </a>
                                            </span>
                                                <a href="#" data-post_id="" class="a_dislike" data-post_like="dislike">
                                                    <span class="qtip dislike">
                                                        <span id="less">
                                                            <i class="fa fa-thumbs-down fa-flip-horizontal" style=""></i>
                                                            <span class="dislikes_count">0</span>
                                                        </span>
                                                    </span>
                                                </a>
                                        </span>
                                        <?php else:?>
	                                            <?php if(xbox_get_field_value('my-theme-options', 'allow_rating') == 'on'):?>
                                                <span class="percentage" style="margin-right: 10px;white-space: nowrap;font-size: 16px !important;">0%</span>
                                                <span id="video-rate-full-screen" style="display:inherit;margin-right: 10px;white-space: nowrap;font-size: 16px !important;">
                                                    <span class="post-like" style="white-space: nowrap;display: flex;font-size: 16px !important;">
                                                        <a href="#" data-post_id="" class="a_like" data-post_like="like">
                                                        <span class="like">
                                                            <span id="more">
                                                                <i class="fa fa-thumbs-up" style=""></i>
                                                                <span class="likes_count">0</span>
                                                                <span class="grey-link"></span>
                                                            </span>
                                                        </span>
                                                        </a>
                                                    </span>
                                                    <a href="#" data-post_id="" class="a_dislike" data-post_like="dislike">
                                                        <span class="qtip dislike">
                                                            <span id="less">
                                                                <i class="fa fa-thumbs-down fa-flip-horizontal" style=""></i>
                                                                <span class="dislikes_count">0</span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </span>
                                            <?php else:?>
                                                <script>
                                                    jQuery(document).ready(function ($) {
                                                        $('#modalWindowAlyaFancybox .post-like a').removeAttr('data-post_id');
                                                        $('#modalWindowAlyaFancybox .post-like a').on('click', function(e){e.stopPropagation()});
                                                    });
                                                </script>
                                                <span class="percentage" style="margin-right: 10px;white-space: nowrap;font-size: 16px !important;">0%</span>
                                                <span id="video-rate-full-screen" style="display: inherit;margin-right: 10px;font-size: 16px !important;">
                                                <span class="post-like" style="margin-right: 10px;white-space: nowrap;display: flex;font-size: 16px !important;">
                                                    <a href="#" onclick="jQuery(document).ready(($)=>{
                                                        $(this).removeAttr('data-post_id');
                                                        $('#auth_modal').show().css('z-index', '9999999');
                                                        return false;
                                                });" class="a_like">
                                                    <span class="like">
                                                        <span id="more">
                                                            <i class="fa fa-thumbs-up" style="color: inherit"></i>
                                                            <span class="likes_count">0</span>
                                                            <span class="grey-link"></span>
                                                        </span>
                                                    </span>
                                                    </a>
                                                </span>
                                                    <a href="#" onclick="jQuery(document).ready(($)=>{
                                                            $(this).removeAttr('data-post_id');
                                                            $('#auth_modal').show().css('z-index', '9999999');
                                                             return false;
                                                        });" class="a_dislike">
                                                        <span class="qtip dislike">
                                                            <span id="less">
                                                                <i class="fa fa-thumbs-down fa-flip-horizontal" style="color:inherit"></i>
                                                                <span class="dislikes_count">0</span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </span>
                                            <?php endif;?><?php endif;?><?php endif;?>
                                    </div>
                                </div>
                                <!-- Like-Dislike-Views [end] -->
                                <div id="photo_counter" style="width:33.3%;text-align:center;"></div>
                                <!-- Control interface [start]-->
                                <div id="control_interface" class="div_control_fullscreen" style="width: 33.3%;float: right;text-align: end;">
                                    <!-- Like-Dislike-Views [start] -->
                                    <!-- Favorite-Share-Comment-Report [start]-->
                                    <div style="display: flex;justify-content: flex-end;">
                                        <span style="cursor:pointer;">
			                            <?php
			                            $arr_favorite_photos = get_user_meta( get_current_user_id(), 'favorite_photos', true );
			                            $arr_favorite_photos = unserialize($arr_favorite_photos);
			                            if (array_search($post->ID, $arr_favorite_photos) === false || !is_user_logged_in()): ?>
                                            <i id="heart-full-screen" class="fa fa-heart-o" data-photo_id="<?php echo $post->ID;?>" data-user_id="<?php echo get_current_user_id();?>"
                                               style="margin-right: 20px;color: <?=get_theme_mod('secondary_text_site_color');?>; font-size: 18px;"></i>
			                            <?php else: ?>
                                            <i id="heart-full-screen" class="fa fa-heart red-heart" data-photo_id="<?php echo $post->ID;?>" data-user_id="<?php echo get_current_user_id();?>"
                                               style="margin-right: 20px;color: <?=get_theme_mod('secondary_text_site_color');?>; font-size: 18px;"></i>
			                            <?php endif; ?>
                                        </span>
                                        <a href="#reply-title" style="margin-right: 20px;cursor:pointer;">
                                            <svg class="fa-comment" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.5958 6.79102H18.048V12.8119C18.048 13.7493 17.5022 14.597 16.408 14.597H5.6875V14.8833C5.6875 15.7121 6.63015 16.5487 7.59818 16.5487H15.7945L18.9302 18.3924L18.4755 16.5487H18.5958C19.5632 16.5487 19.9997 15.714 19.9997 14.8833V8.22028C19.9997 7.39148 19.5632 6.79102 18.5958 6.79102Z" fill="white"/>
                                                <path d="M14.8079 2.60742H2.35631C1.26077 2.60742 0 3.58065 0 4.51875V12.0652C0 12.9291 1.06821 13.553 2.09283 13.6493L1.42602 16.1806L5.69886 13.6669H14.8079C15.9035 13.6669 16.9144 13.0026 16.9144 12.0652V5.95973V4.51875C16.9144 3.58065 15.9028 2.60742 14.8079 2.60742ZM4.25593 8.97765C3.63465 8.97765 3.13112 8.47412 3.13112 7.85284C3.13112 7.23156 3.63465 6.72803 4.25593 6.72803C4.87656 6.72803 5.38074 7.23156 5.38074 7.85284C5.38074 8.47412 4.87656 8.97765 4.25593 8.97765ZM8.45721 8.97765C7.83593 8.97765 7.3324 8.47412 7.3324 7.85284C7.3324 7.23156 7.83593 6.72803 8.45721 6.72803C9.07849 6.72803 9.58202 7.23156 9.58202 7.85284C9.58202 8.47412 9.07849 8.97765 8.45721 8.97765ZM12.6591 8.97765C12.0379 8.97765 11.5337 8.47412 11.5337 7.85284C11.5337 7.23156 12.0379 6.72803 12.6591 6.72803C13.2791 6.72803 13.784 7.23156 13.784 7.85284C13.784 8.47412 13.2791 8.97765 12.6591 8.97765Z" fill="white"/>
                                            </svg>
                                        </a>
                                        <!-- Share Buttons [end]-->
                                        <span style="margin-right: 20px;cursor:pointer;">
                                            <svg class="fa-share-alt share-alt-fullscreen" width="19" height="18" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19.7881 6.49862L14.0737 0.784373C13.9323 0.642981 13.765 0.572266 13.5715 0.572266C13.3781 0.572266 13.2106 0.642981 13.0693 0.784373C12.9279 0.925844 12.8571 1.09327 12.8571 1.28669V4.14382H10.3572C5.05189 4.14382 1.79686 5.64311 0.591329 8.64163C0.197097 9.63853 0 10.8775 0 12.3582C0 13.5932 0.472493 15.271 1.4174 17.3916C1.43968 17.4438 1.47862 17.5329 1.53452 17.6593C1.59038 17.7857 1.64053 17.8973 1.68517 17.9942C1.72997 18.0907 1.77837 18.1726 1.8304 18.2395C1.9196 18.366 2.02382 18.4294 2.14289 18.4294C2.25449 18.4294 2.34194 18.3923 2.40523 18.3179C2.46836 18.2435 2.49999 18.1504 2.49999 18.0391C2.49999 17.9719 2.49068 17.8735 2.47204 17.7432C2.45343 17.6129 2.44409 17.5257 2.44409 17.481C2.40683 16.9752 2.38823 16.5173 2.38823 16.1083C2.38823 15.3569 2.45343 14.6835 2.58352 14.0883C2.71381 13.493 2.89422 12.9778 3.12493 12.5425C3.35561 12.107 3.65313 11.7316 4.01781 11.4153C4.38234 11.0991 4.77477 10.8406 5.19515 10.6397C5.61562 10.4387 6.11039 10.2806 6.6796 10.1653C7.24876 10.05 7.82164 9.96998 8.39835 9.9253C8.97506 9.88062 9.62796 9.85841 10.3572 9.85841H12.8571V12.7156C12.8571 12.909 12.9278 13.0765 13.0691 13.2178C13.2106 13.3591 13.3779 13.4298 13.5713 13.4298C13.7647 13.4298 13.9321 13.3591 14.0737 13.2178L19.788 7.50338C19.9294 7.36198 20 7.19463 20 7.00117C20 6.80775 19.9294 6.64029 19.7881 6.49862Z" fill="white"/>
                                            </svg>
                                        </span>
                                        <span style="margin-right: 20px;cursor:pointer;" id="fullscreen_flag">
                                            <svg class="fa-flag" width="18" height="17" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.8814 9.79415C15.6652 9.53344 15.6652 9.15571 15.8814 8.89508L18.2135 6.08426C18.3877 5.87425 18.4249 5.58243 18.3089 5.3354C18.1928 5.08838 17.9446 4.93066 17.6716 4.93066H13.6682V9.16558C13.6682 10.3197 12.7293 11.2586 11.5752 11.2586H8.30469V13.0545C8.30469 13.4433 8.61991 13.7586 9.00875 13.7586H17.6716C17.9446 13.7586 18.1928 13.6008 18.3089 13.3538C18.4249 13.1068 18.3877 12.815 18.2135 12.605L15.8814 9.79415Z" fill="white"/>
                                            <path d="M12.2787 9.16555V1.74577C12.2787 1.35694 11.9634 1.04171 11.5746 1.04171H3.70452C3.70452 0.46641 3.23811 0 2.66281 0C2.0875 0 1.62109 0.46641 1.62109 1.04171C1.62109 1.58528 1.62109 18.6751 1.62109 18.9583C1.62109 19.5336 2.0875 20 2.66281 20C3.23811 20 3.70452 19.5336 3.70452 18.9583C3.70452 18.4761 3.70452 10.2005 3.70452 9.86961H11.5746C11.9634 9.86961 12.2787 9.55439 12.2787 9.16555Z" fill="white"/>
                                        </svg>
                                        </span>
                                        <!-- Favorite-Share-Comment-Report [end]-->
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="height:18px;font-size: 12px;cursor:pointer;margin-right: 20px;padding:0;border-color: transparent !important;background-color: transparent !important;">
                                            <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.268677 18.4307C-0.0895589 18.7889 -0.089559 19.3697 0.268677 19.728C0.626913 20.0862 1.20773 20.0862 1.56596 19.728L9.99959 11.2943L18.434 19.7287C18.7922 20.087 19.373 20.087 19.7313 19.7287C20.0895 19.3705 20.0895 18.7897 19.7313 18.4314L11.2969 9.99706L19.728 1.56596C20.0862 1.20773 20.0862 0.626912 19.728 0.268677C19.3697 -0.0895592 18.7889 -0.0895587 18.4307 0.268677L9.99959 8.69977L1.56926 0.269436C1.21102 -0.0887998 0.630208 -0.0887998 0.271972 0.269436C-0.0862633 0.627672 -0.0862627 1.20849 0.271973 1.56672L8.70231 9.99706L0.268677 18.4307Z" fill="white" fill-opacity="0.5"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <!-- Control interface [end] -->
                            </div>
                        </div>
                        <!-- Share Buttons [start]-->
                        <div id="video-share" style="margin-right: 20px;margin-bottom: 10px; display: none;" class="fig share-fullscreen">
                            <!-- Facebook -->
		                    <?php if( xbox_get_field_value( 'my-theme-options', 'facebook' ) == 'on' ) : ?>
                                <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.12';
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo wp_get_attachment_url($post->ID); ?>&amp;src=sdkpreparse">
	                                <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#3B5998"/>
                                            <rect width="40" height="40" rx="4" fill="url(#facebook_gradient)"/>
                                            <path d="M21.5502 30V20.8777H24.6109L25.0701 17.3216H21.5502V15.0515C21.5502 14.0222 21.8348 13.3208 23.3125 13.3208L25.194 13.32V10.1392C24.8686 10.0969 23.7517 10 22.4517 10C19.7371 10 17.8786 11.657 17.8786 14.6993V17.3216H14.8086V20.8777H17.8786V30H21.5502Z" fill="white"/>
                                            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                            <defs>
                                                <linearGradient id="facebook_gradient" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#29498C"/>
                                                    <stop offset="0.71046" stop-color="#3B5998"/>
                                                </linearGradient>
                                            </defs>
                                        </svg>
	                                <?php else:?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#3B5998"/>
                                            <path d="M21.5502 30V20.8777H24.6109L25.0701 17.3216H21.5502V15.0515C21.5502 14.0222 21.8348 13.3208 23.3125 13.3208L25.194 13.32V10.1392C24.8686 10.0969 23.7517 10 22.4517 10C19.7371 10 17.8786 11.657 17.8786 14.6993V17.3216H14.8086V20.8777H17.8786V30H21.5502Z" fill="white"/>
                                        </svg>
	                                <?php endif;?>
                                </a>
		                    <?php endif; ?>
                            <!-- Twitter -->
		                    <?php if( xbox_get_field_value( 'my-theme-options', 'twitter' ) == 'on' ) : ?>
                                <a target="_blank" href="https://twitter.com/home?status=<?php echo wp_get_attachment_url($post->ID);?>">
	                                <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#55ACEE"/>
                                            <rect width="40" height="40" rx="4" fill="url(#twitter_linear)"/>
                                            <g clip-path="url(#twitter_gradient2)">
                                                <path d="M27.945 15.9275C28.7583 15.35 29.4425 14.6292 30 13.7992V13.7983C29.2558 14.1242 28.4642 14.3408 27.6375 14.4458C28.4875 13.9383 29.1367 13.1408 29.4417 12.18C28.6492 12.6525 27.7742 12.9858 26.8417 13.1725C26.0892 12.3708 25.0167 11.875 23.8467 11.875C21.5767 11.875 19.7492 13.7175 19.7492 15.9758C19.7492 16.3008 19.7767 16.6133 19.8442 16.9108C16.4358 16.7442 13.4192 15.1108 11.3925 12.6217C11.0392 13.2358 10.8308 13.9383 10.8308 14.6942C10.8308 16.1142 11.5617 17.3725 12.6525 18.1017C11.9933 18.0892 11.3475 17.8975 10.8 17.5967V17.6417C10.8 19.6342 12.2208 21.2892 14.085 21.6708C13.7508 21.7625 13.3875 21.8058 13.01 21.8058C12.7475 21.8058 12.4825 21.7908 12.2342 21.7358C12.765 23.3592 14.2733 24.5533 16.065 24.5925C14.67 25.6833 12.8983 26.3408 10.9808 26.3408C10.645 26.3408 10.3225 26.3258 10 26.285C11.8167 27.4558 13.9683 28.125 16.29 28.125C23.5258 28.125 28.2417 22.0883 27.945 15.9275Z" fill="white"/>
                                            </g>
                                            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                            <defs>
                                                <linearGradient id="twitter_linear" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#3894DA"/>
                                                    <stop offset="0.71046" stop-color="#55ACEE"/>
                                                </linearGradient>
                                                <clipPath id="twitter_gradient2">
                                                    <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
	                                <?php else:?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#55ACEE"/>
                                            <g clip-path="url(#tw_clip)">
                                                <path d="M27.945 15.9275C28.7583 15.35 29.4425 14.6292 30 13.7992V13.7983C29.2558 14.1242 28.4642 14.3408 27.6375 14.4458C28.4875 13.9383 29.1367 13.1408 29.4417 12.18C28.6492 12.6525 27.7742 12.9858 26.8417 13.1725C26.0892 12.3708 25.0167 11.875 23.8467 11.875C21.5767 11.875 19.7492 13.7175 19.7492 15.9758C19.7492 16.3008 19.7767 16.6133 19.8442 16.9108C16.4358 16.7442 13.4192 15.1108 11.3925 12.6217C11.0392 13.2358 10.8308 13.9383 10.8308 14.6942C10.8308 16.1142 11.5617 17.3725 12.6525 18.1017C11.9933 18.0892 11.3475 17.8975 10.8 17.5967V17.6417C10.8 19.6342 12.2208 21.2892 14.085 21.6708C13.7508 21.7625 13.3875 21.8058 13.01 21.8058C12.7475 21.8058 12.4825 21.7908 12.2342 21.7358C12.765 23.3592 14.2733 24.5533 16.065 24.5925C14.67 25.6833 12.8983 26.3408 10.9808 26.3408C10.645 26.3408 10.3225 26.3258 10 26.285C11.8167 27.4558 13.9683 28.125 16.29 28.125C23.5258 28.125 28.2417 22.0883 27.945 15.9275Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="tw_clip">
                                                    <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
	                                <?php endif;?>
                                </a>
		                    <?php endif; ?>
                            <!-- Linkedin -->
		                    <?php if( xbox_get_field_value( 'my-theme-options', 'linkedin' ) == 'on' ) : ?>
                                <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo wp_get_attachment_url($post->ID);?>&amp;title=<?php echo $post->post_title;?>&amp;summary=<?php echo 'photo';?>&amp;source=<?php print home_url();?>">
	                                <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#007BB5"/>
                                            <rect width="40" height="40" rx="4" fill="url(#linkein_linear)"/>
                                            <g clip-path="url(#linkein_gradient)">
                                                <path d="M10.6495 29.1346H13.2495C13.6082 29.1346 13.8989 28.8438 13.8989 28.4851V17.1204C13.8989 16.7617 13.6082 16.4709 13.2495 16.4709H10.6495C10.2907 16.4709 10 16.7617 10 17.1204V28.4851C10 28.8438 10.2907 29.1346 10.6495 29.1346Z" fill="white"/>
                                                <path d="M10.6495 14.473H13.2495C13.6082 14.473 13.8989 14.1822 13.8989 13.8235V11.5147C13.8989 11.156 13.6082 10.8652 13.2495 10.8652H10.6495C10.2907 10.8652 10 11.156 10 11.5147V13.8235C10 14.1822 10.2907 14.473 10.6495 14.473Z" fill="white"/>
                                                <path d="M29.0235 17.7892C28.6582 17.3082 28.1194 16.9127 27.4071 16.6027C26.6947 16.2929 25.9084 16.1379 25.0482 16.1379C23.3018 16.1379 21.8219 16.8044 20.6087 18.1377C20.3673 18.403 20.1918 18.345 20.1918 17.9862V17.1204C20.1918 16.7617 19.901 16.471 19.5423 16.471H17.2198C16.861 16.471 16.5703 16.7617 16.5703 17.1204V28.4851C16.5703 28.8438 16.8611 29.1346 17.2198 29.1346H19.8198C20.1785 29.1346 20.4693 28.8438 20.4693 28.4851V24.5328C20.4693 22.8862 20.5687 21.7576 20.7675 21.1471C20.9663 20.5367 21.3341 20.0464 21.8706 19.6764C22.4072 19.3064 23.013 19.1213 23.6884 19.1213C24.2156 19.1213 24.6666 19.2508 25.0413 19.5099C25.416 19.769 25.6866 20.1319 25.8531 20.5991C26.0197 21.0663 26.1029 22.0954 26.1029 23.6865V28.4851C26.1029 28.8438 26.3936 29.1346 26.7523 29.1346H29.3523C29.711 29.1346 30.0017 28.8438 30.0017 28.4851V22.0491C30.0017 20.9114 29.93 20.0371 29.7868 19.4266C29.6436 18.8162 29.3891 18.2703 29.0235 17.7892Z" fill="white"/>
                                            </g>
                                            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                            <defs>
                                                <linearGradient id="linkein_linear" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#00618F"/>
                                                    <stop offset="0.71046" stop-color="#007BB5"/>
                                                </linearGradient>
                                                <clipPath id="linkein_gradient">
                                                    <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
	                                <?php else: ?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#007BB5"/>
                                            <g clip-path="url(linkedin_svg)">
                                                <path d="M10.6495 29.1346H13.2495C13.6082 29.1346 13.8989 28.8438 13.8989 28.4851V17.1204C13.8989 16.7617 13.6082 16.4709 13.2495 16.4709H10.6495C10.2907 16.4709 10 16.7617 10 17.1204V28.4851C10 28.8438 10.2907 29.1346 10.6495 29.1346Z" fill="white"/>
                                                <path d="M10.6495 14.473H13.2495C13.6082 14.473 13.8989 14.1822 13.8989 13.8235V11.5147C13.8989 11.156 13.6082 10.8652 13.2495 10.8652H10.6495C10.2907 10.8652 10 11.156 10 11.5147V13.8235C10 14.1822 10.2907 14.473 10.6495 14.473Z" fill="white"/>
                                                <path d="M29.0235 17.7892C28.6582 17.3082 28.1194 16.9127 27.4071 16.6027C26.6947 16.2929 25.9084 16.1379 25.0482 16.1379C23.3018 16.1379 21.8219 16.8044 20.6087 18.1377C20.3673 18.403 20.1918 18.345 20.1918 17.9862V17.1204C20.1918 16.7617 19.901 16.471 19.5423 16.471H17.2198C16.861 16.471 16.5703 16.7617 16.5703 17.1204V28.4851C16.5703 28.8438 16.8611 29.1346 17.2198 29.1346H19.8198C20.1785 29.1346 20.4693 28.8438 20.4693 28.4851V24.5328C20.4693 22.8862 20.5687 21.7576 20.7675 21.1471C20.9663 20.5367 21.3341 20.0464 21.8706 19.6764C22.4072 19.3064 23.013 19.1213 23.6884 19.1213C24.2156 19.1213 24.6666 19.2508 25.0413 19.5099C25.416 19.769 25.6866 20.1319 25.8531 20.5991C26.0197 21.0663 26.1029 22.0954 26.1029 23.6865V28.4851C26.1029 28.8438 26.3936 29.1346 26.7523 29.1346H29.3523C29.711 29.1346 30.0017 28.8438 30.0017 28.4851V22.0491C30.0017 20.9114 29.93 20.0371 29.7868 19.4266C29.6436 18.8162 29.3891 18.2703 29.0235 17.7892Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="linkedin_svg">
                                                    <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
	                                <?php endif; ?>
                                </a>
		                    <?php endif; ?>
                            <!-- Tumblr -->
		                    <?php if( xbox_get_field_value( 'my-theme-options', 'tumblr' ) == 'on' ) : ?>
                                <a target="_blank" href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?php echo wp_get_attachment_url($post->ID);?>">
	                                <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#36465D"/>
                                            <rect width="40" height="40" rx="4" fill="url(#thumbr_linear)"/>
                                            <path d="M23.6275 26.74C23.0725 26.74 22.5525 26.61 22.1225 26.3475C21.7788 26.1475 21.4763 25.8075 21.3563 25.4838C21.2363 25.1538 21.2488 24.4788 21.2488 23.3238V18.7437H26.2525V15.0012H21.2488V10H18.025C17.895 11.0288 17.6613 11.8825 17.3175 12.5425C16.9888 13.215 16.5263 13.7838 15.98 14.265C15.415 14.7413 14.54 15.105 13.75 15.3637V18.1975H16.4338V25.2063C16.4338 26.125 16.5262 26.8263 16.7237 27.305C16.9175 27.7875 17.2488 28.2412 17.755 28.6663C18.2525 29.0962 18.8475 29.4263 19.5588 29.6588C20.2513 29.8875 20.7963 30 21.7125 30C22.5163 30 23.2675 29.9237 23.955 29.755C24.6438 29.5987 25.3925 29.3612 26.2525 28.96V25.9537C25.2475 26.61 24.6413 26.74 23.6275 26.74Z" fill="white"/>
                                            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                            <defs>
                                                <linearGradient id="thumbr_linear" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#28374D"/>
                                                    <stop offset="0.71046" stop-color="#36465D"/>
                                                </linearGradient>
                                            </defs>
                                        </svg>
	                                <?php else: ?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#36465D"/>
                                            <path d="M23.6275 26.74C23.0725 26.74 22.5525 26.61 22.1225 26.3475C21.7788 26.1475 21.4763 25.8075 21.3563 25.4838C21.2363 25.1538 21.2488 24.4788 21.2488 23.3238V18.7437H26.2525V15.0012H21.2488V10H18.025C17.895 11.0288 17.6613 11.8825 17.3175 12.5425C16.9888 13.215 16.5263 13.7838 15.98 14.265C15.415 14.7413 14.54 15.105 13.75 15.3637V18.1975H16.4338V25.2063C16.4338 26.125 16.5262 26.8263 16.7237 27.305C16.9175 27.7875 17.2488 28.2412 17.755 28.6663C18.2525 29.0962 18.8475 29.4263 19.5588 29.6588C20.2513 29.8875 20.7963 30 21.7125 30C22.5163 30 23.2675 29.9237 23.955 29.755C24.6438 29.5987 25.3925 29.3612 26.2525 28.96V25.9537C25.2475 26.61 24.6413 26.74 23.6275 26.74Z" fill="white"/>
                                        </svg>
	                                <?php endif; ?>
                                </a>
		                    <?php endif; ?>
                            <!-- Reddit -->
		                    <?php if( xbox_get_field_value( 'my-theme-options', 'reddit' ) == 'on' ) : ?>
                                <a target="_blank" href="http://www.reddit.com/submit?url=<?php echo wp_get_attachment_url($post->ID);?>&amp;title=<?php echo $post->post_title;?>">
	                                <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#FF4500"/>
                                            <rect width="40" height="40" rx="4" fill="url(#reddit_linear)"/>
                                            <path d="M16.8438 21.2434V21.2447H17.466L16.8438 21.2434Z" fill="white"/>
                                            <path d="M23.0664 21.2434V21.2447H23.6887L23.0664 21.2434Z" fill="white"/>
                                            <path d="M30 19.3778C30 18.005 28.8836 16.8887 27.5109 16.8887C26.962 16.8887 26.4406 17.0679 26.0149 17.3927C24.626 16.4282 22.8065 15.8532 20.8712 15.7076L21.9154 13.2583L24.9533 13.9677C25.0504 14.9073 25.837 15.6441 26.8015 15.6441C27.8307 15.6441 28.6683 14.8065 28.6683 13.7773C28.6683 12.748 27.8307 11.9105 26.8015 11.9105C26.1493 11.9105 25.5756 12.2477 25.2421 12.7568L21.6914 11.9266C21.3902 11.8582 21.0952 12.0113 20.9757 12.2888L19.532 15.674C17.4424 15.7462 15.4512 16.3349 13.9477 17.3604C13.5383 17.0567 13.0305 16.8887 12.4891 16.8887C11.1164 16.8887 10 18.005 10 19.3778C10 20.2876 10.4966 21.1102 11.2582 21.5321C11.2483 21.6416 11.2446 21.7536 11.2446 21.8669C11.2446 25.2981 15.1525 28.0897 19.9564 28.0897C24.7592 28.0897 28.6683 25.2981 28.6683 21.8669C28.6683 21.7698 28.6646 21.674 28.6584 21.5782C29.4698 21.165 30 20.3224 30 19.3778ZM26.8015 13.155C27.1437 13.155 27.4238 13.4338 27.4238 13.7773C27.4238 14.1208 27.1437 14.3996 26.8015 14.3996C26.4592 14.3996 26.1792 14.1208 26.1792 13.7773C26.1792 13.4338 26.4592 13.155 26.8015 13.155ZM15.6005 21.2446C15.6005 20.5589 16.1593 20.0001 16.8451 20.0001C17.5308 20.0001 18.0896 20.5589 18.0896 21.2446C18.0896 21.9316 17.5308 22.4892 16.8451 22.4892C16.1593 22.4892 15.6005 21.9316 15.6005 21.2446ZM22.8301 25.3728C21.9714 25.9938 20.9633 26.305 19.9564 26.305C18.9496 26.305 17.9415 25.9938 17.0828 25.3728C16.804 25.1712 16.7418 24.7816 16.9434 24.5041C17.145 24.2266 17.5345 24.1644 17.8121 24.3647C19.0952 25.2919 20.8177 25.2944 22.1008 24.3647C22.3783 24.1644 22.7666 24.2241 22.9695 24.5041C23.1711 24.7829 23.1077 25.1712 22.8301 25.3728ZM23.0678 22.4892C22.3808 22.4892 21.8233 21.9316 21.8233 21.2446C21.8233 20.5589 22.3808 20.0001 23.0678 20.0001C23.7548 20.0001 24.3124 20.5589 24.3124 21.2446C24.3124 21.9316 23.7548 22.4892 23.0678 22.4892Z" fill="white"/>
                                            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                            <defs>
                                                <linearGradient id="reddit_linear" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#D93B00"/>
                                                    <stop offset="0.71046" stop-color="#FF4500"/>
                                                </linearGradient>
                                            </defs>
                                        </svg>
	                                <?php else: ?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#FF4500"/>
                                            <path d="M16.8438 21.2434V21.2447H17.466L16.8438 21.2434Z" fill="white"/>
                                            <path d="M23.0664 21.2434V21.2447H23.6887L23.0664 21.2434Z" fill="white"/>
                                            <path d="M30 19.3778C30 18.005 28.8836 16.8887 27.5109 16.8887C26.962 16.8887 26.4406 17.0679 26.0149 17.3927C24.626 16.4282 22.8065 15.8532 20.8712 15.7076L21.9154 13.2583L24.9533 13.9677C25.0504 14.9073 25.837 15.6441 26.8015 15.6441C27.8307 15.6441 28.6683 14.8065 28.6683 13.7773C28.6683 12.748 27.8307 11.9105 26.8015 11.9105C26.1493 11.9105 25.5756 12.2477 25.2421 12.7568L21.6914 11.9266C21.3902 11.8582 21.0952 12.0113 20.9757 12.2888L19.532 15.674C17.4424 15.7462 15.4512 16.3349 13.9477 17.3604C13.5383 17.0567 13.0305 16.8887 12.4891 16.8887C11.1164 16.8887 10 18.005 10 19.3778C10 20.2876 10.4966 21.1102 11.2582 21.5321C11.2483 21.6416 11.2446 21.7536 11.2446 21.8669C11.2446 25.2981 15.1525 28.0897 19.9564 28.0897C24.7592 28.0897 28.6683 25.2981 28.6683 21.8669C28.6683 21.7698 28.6646 21.674 28.6584 21.5782C29.4698 21.165 30 20.3224 30 19.3778ZM26.8015 13.155C27.1437 13.155 27.4238 13.4338 27.4238 13.7773C27.4238 14.1208 27.1437 14.3996 26.8015 14.3996C26.4592 14.3996 26.1792 14.1208 26.1792 13.7773C26.1792 13.4338 26.4592 13.155 26.8015 13.155ZM15.6005 21.2446C15.6005 20.5589 16.1593 20.0001 16.8451 20.0001C17.5308 20.0001 18.0896 20.5589 18.0896 21.2446C18.0896 21.9316 17.5308 22.4892 16.8451 22.4892C16.1593 22.4892 15.6005 21.9316 15.6005 21.2446ZM22.8301 25.3728C21.9714 25.9938 20.9633 26.305 19.9564 26.305C18.9496 26.305 17.9415 25.9938 17.0828 25.3728C16.804 25.1712 16.7418 24.7816 16.9434 24.5041C17.145 24.2266 17.5345 24.1644 17.8121 24.3647C19.0952 25.2919 20.8177 25.2944 22.1008 24.3647C22.3783 24.1644 22.7666 24.2241 22.9695 24.5041C23.1711 24.7829 23.1077 25.1712 22.8301 25.3728ZM23.0678 22.4892C22.3808 22.4892 21.8233 21.9316 21.8233 21.2446C21.8233 20.5589 22.3808 20.0001 23.0678 20.0001C23.7548 20.0001 24.3124 20.5589 24.3124 21.2446C24.3124 21.9316 23.7548 22.4892 23.0678 22.4892Z" fill="white"/>
                                        </svg>
	                                <?php endif; ?>
                                </a>
		                    <?php endif; ?>
                            <!-- Odnoklassniki -->
		                    <?php if( xbox_get_field_value( 'my-theme-options', 'odnoklassniki' ) == 'on' ) : ?>
                                <a target="_blank" href="https://connect.ok.ru/offer?url=<?php echo wp_get_attachment_url($post->ID);?>&title=<?php echo $post->post_title;?>">
	                                <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#F7931E"/>
                                            <rect width="40" height="40" rx="4" fill="url(#odnoklassniki_linear)"/>
                                            <g clip-path="url(#odnoklassniki_gradient)">
                                                <path d="M13.9341 20.7342C13.4233 21.7384 14.0033 22.2184 15.3266 23.0384C16.4516 23.7334 18.0058 23.9875 19.0041 24.0892C18.595 24.4825 20.47 22.6792 15.07 27.8734C13.925 28.9709 15.7683 30.7317 16.9125 29.6575L20.01 26.67C21.1958 27.8109 22.3325 28.9042 23.1075 29.6617C24.2525 30.74 26.095 28.9942 24.9625 27.8775C24.8775 27.7967 20.765 23.8517 21.0158 24.0934C22.0266 23.9917 23.5575 23.7225 24.6691 23.0425L24.6683 23.0417C25.9916 22.2175 26.5716 21.7384 26.0683 20.7342C25.7641 20.1642 24.9441 19.6875 23.8525 20.5117C23.8525 20.5117 22.3783 21.6409 20.0008 21.6409C17.6225 21.6409 16.1491 20.5117 16.1491 20.5117C15.0583 19.6834 14.235 20.1642 13.9341 20.7342Z" fill="white"/>
                                                <path d="M20.0002 20.1183C22.8985 20.1183 25.2652 17.8533 25.2652 15.065C25.2652 12.265 22.8985 10 20.0002 10C17.101 10 14.7344 12.265 14.7344 15.065C14.7344 17.8533 17.101 20.1183 20.0002 20.1183ZM20.0002 12.5658C21.4244 12.5658 22.586 13.6833 22.586 15.065C22.586 16.435 21.4244 17.5525 20.0002 17.5525C18.576 17.5525 17.4144 16.435 17.4144 15.065C17.4135 13.6825 18.5752 12.5658 20.0002 12.5658Z" fill="white"/>
                                            </g>
                                            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                            <defs>
                                                <linearGradient id="odnoklassniki_linear" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#E87D00"/>
                                                    <stop offset="0.71046" stop-color="#F7931E"/>
                                                </linearGradient>
                                                <clipPath id="odnoklassniki_gradient">
                                                    <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>

	                                <?php else: ?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#F7931E"/>
                                            <g clip-path="url(#odn_clip)">
                                                <path d="M13.9341 20.7341C13.4233 21.7382 14.0033 22.2182 15.3266 23.0382C16.4516 23.7332 18.0058 23.9874 19.0041 24.0891C18.595 24.4824 20.47 22.6791 15.07 27.8732C13.925 28.9707 15.7683 30.7316 16.9125 29.6574L20.01 26.6699C21.1958 27.8107 22.3325 28.9041 23.1075 29.6616C24.2525 30.7399 26.095 28.9941 24.9625 27.8774C24.8775 27.7966 20.765 23.8516 21.0158 24.0932C22.0266 23.9916 23.5575 23.7224 24.6691 23.0424L24.6683 23.0416C25.9916 22.2174 26.5716 21.7382 26.0683 20.7341C25.7641 20.1641 24.9441 19.6874 23.8525 20.5116C23.8525 20.5116 22.3783 21.6407 20.0008 21.6407C17.6225 21.6407 16.1491 20.5116 16.1491 20.5116C15.0583 19.6832 14.235 20.1641 13.9341 20.7341Z" fill="white"/>
                                                <path d="M20.0002 20.1183C22.8985 20.1183 25.2652 17.8533 25.2652 15.065C25.2652 12.265 22.8985 10 20.0002 10C17.101 10 14.7344 12.265 14.7344 15.065C14.7344 17.8533 17.101 20.1183 20.0002 20.1183ZM20.0002 12.5658C21.4244 12.5658 22.586 13.6833 22.586 15.065C22.586 16.435 21.4244 17.5525 20.0002 17.5525C18.576 17.5525 17.4144 16.435 17.4144 15.065C17.4135 13.6825 18.5752 12.5658 20.0002 12.5658Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="odn_clip">
                                                    <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
	                                <?php endif; ?>
                                </a>
		                    <?php endif; ?>

                            <!-- Email -->
		                    <?php if( xbox_get_field_value( 'my-theme-options', 'email' ) == 'on' ) : ?>
                                <a target="_blank" href="mailto:?subject=&amp;body=<?php the_permalink(); ?>">
	                                <?php if ( 'gradient' === xbox_get_field_value( 'my-theme-options', 'rendering')) : ?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#2F5DBD"/>
                                            <rect width="40" height="40" rx="4" fill="url(#email_linear)"/>
                                            <g clip-path="url(#email_gradient)">
                                                <path d="M28.216 27.8572C28.6656 27.8572 29.0551 27.7087 29.3863 27.4156L23.72 21.7491C23.584 21.8464 23.4522 21.9411 23.3278 22.0311C22.9037 22.3435 22.5596 22.5873 22.2953 22.762C22.0311 22.9371 21.6795 23.1156 21.2406 23.2978C20.8015 23.4802 20.3924 23.5711 20.0128 23.5711H20.0017H19.9906C19.6111 23.5711 19.2019 23.4803 18.7628 23.2978C18.3237 23.1156 17.9722 22.9371 17.7082 22.762C17.4439 22.5873 17.1 22.3436 16.6757 22.0311C16.5575 21.9444 16.4264 21.8493 16.2846 21.7476L10.6172 27.4156C10.9483 27.7087 11.3381 27.8572 11.7876 27.8572H28.216Z" fill="white"/>
                                                <path d="M11.1274 18.1808C10.7033 17.8981 10.3273 17.5744 10 17.2097V25.8309L14.9943 20.8366C13.9951 20.1391 12.7078 19.2548 11.1274 18.1808Z" fill="white"/>
                                                <path d="M28.884 18.1808C27.3639 19.2097 26.0718 20.0955 25.0078 20.8386L30.0001 25.8311V17.2097C29.68 17.5671 29.308 17.8906 28.884 18.1808Z" fill="white"/>
                                                <path d="M28.2139 12.1428H11.7856C11.2125 12.1428 10.7718 12.3364 10.4631 12.723C10.1542 13.1099 10 13.5937 10 14.1739C10 14.6426 10.2046 15.1504 10.6138 15.6975C11.0229 16.2444 11.4582 16.6739 11.9196 16.9864C12.1725 17.1651 12.9351 17.6953 14.2076 18.5769C14.8945 19.0529 15.4918 19.4678 16.0052 19.8258C16.4427 20.1307 16.8201 20.3947 17.1316 20.6138C17.1674 20.6389 17.2236 20.6791 17.2983 20.7325C17.3787 20.7902 17.4805 20.8636 17.6061 20.9542C17.8479 21.1291 18.0487 21.2705 18.2087 21.3785C18.3685 21.4865 18.5621 21.6071 18.7891 21.7411C19.0161 21.8749 19.2301 21.9756 19.4309 22.0425C19.6319 22.1094 19.8178 22.1429 19.9889 22.1429H20.0001H20.0112C20.1822 22.1429 20.3682 22.1094 20.5692 22.0425C20.77 21.9756 20.9839 21.8752 21.211 21.7411C21.4378 21.6071 21.6312 21.4862 21.7914 21.3785C21.9514 21.2705 22.1523 21.1291 22.3941 20.9542C22.5194 20.8636 22.6212 20.7902 22.7016 20.7327C22.7763 20.6791 22.8325 20.6391 22.8685 20.6138C23.1112 20.4449 23.4894 20.182 23.9979 19.8289C24.9232 19.186 26.2859 18.2398 28.0917 16.9864C28.6348 16.6071 29.0886 16.1493 29.4533 15.6137C29.8173 15.0782 29.9998 14.5164 29.9998 13.9286C29.9998 13.4375 29.8228 13.0173 29.4697 12.6673C29.1162 12.3177 28.6976 12.1428 28.2139 12.1428Z" fill="white"/>
                                            </g>
                                            <rect x="0.5" y="0.5" width="39" height="39" rx="3.5" stroke="white" stroke-opacity="0.1"/>
                                            <defs>
                                                <linearGradient id="email_linear" x1="20" y1="0" x2="20" y2="40" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#1F4CA8"/>
                                                    <stop offset="0.71046" stop-color="#2F5DBD"/>
                                                </linearGradient>
                                                <clipPath id="email_gradient">
                                                    <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>

	                                <?php else:?>
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="40" height="40" rx="4" fill="#2F5DBD"/>
                                            <g clip-path="url(#email_clip)">
                                                <path d="M28.216 27.8572C28.6656 27.8572 29.0551 27.7087 29.3863 27.4156L23.72 21.7491C23.584 21.8464 23.4522 21.9411 23.3278 22.0311C22.9037 22.3435 22.5596 22.5873 22.2953 22.762C22.0311 22.9371 21.6795 23.1156 21.2406 23.2978C20.8015 23.4802 20.3924 23.5711 20.0128 23.5711H20.0017H19.9906C19.6111 23.5711 19.2019 23.4803 18.7628 23.2978C18.3237 23.1156 17.9722 22.9371 17.7082 22.762C17.4439 22.5873 17.1 22.3436 16.6757 22.0311C16.5575 21.9444 16.4264 21.8493 16.2846 21.7476L10.6172 27.4156C10.9483 27.7087 11.3381 27.8572 11.7876 27.8572H28.216Z" fill="white"/>
                                                <path d="M11.1274 18.1808C10.7033 17.8981 10.3273 17.5744 10 17.2097V25.8309L14.9943 20.8366C13.9951 20.1391 12.7078 19.2548 11.1274 18.1808Z" fill="white"/>
                                                <path d="M28.884 18.1808C27.3639 19.2097 26.0718 20.0955 25.0078 20.8386L30.0001 25.8311V17.2097C29.68 17.5671 29.308 17.8906 28.884 18.1808Z" fill="white"/>
                                                <path d="M28.2139 12.1428H11.7856C11.2125 12.1428 10.7718 12.3364 10.4631 12.723C10.1542 13.1099 10 13.5937 10 14.1739C10 14.6426 10.2046 15.1504 10.6138 15.6975C11.0229 16.2444 11.4582 16.6739 11.9196 16.9864C12.1725 17.1651 12.9351 17.6953 14.2076 18.5769C14.8945 19.0529 15.4918 19.4678 16.0052 19.8258C16.4427 20.1307 16.8201 20.3947 17.1316 20.6138C17.1674 20.6389 17.2236 20.6791 17.2983 20.7325C17.3787 20.7902 17.4805 20.8636 17.6061 20.9542C17.8479 21.1291 18.0487 21.2705 18.2087 21.3785C18.3685 21.4865 18.5621 21.6071 18.7891 21.7411C19.0161 21.8749 19.2301 21.9756 19.4309 22.0425C19.6319 22.1094 19.8178 22.1429 19.9889 22.1429H20.0001H20.0112C20.1822 22.1429 20.3682 22.1094 20.5692 22.0425C20.77 21.9756 20.9839 21.8752 21.211 21.7411C21.4378 21.6071 21.6312 21.4862 21.7914 21.3785C21.9514 21.2705 22.1523 21.1291 22.3941 20.9542C22.5194 20.8636 22.6212 20.7902 22.7016 20.7327C22.7763 20.6791 22.8325 20.6391 22.8685 20.6138C23.1112 20.4449 23.4894 20.182 23.9979 19.8289C24.9232 19.186 26.2859 18.2398 28.0917 16.9864C28.6348 16.6071 29.0886 16.1493 29.4533 15.6137C29.8173 15.0782 29.9998 14.5164 29.9998 13.9286C29.9998 13.4375 29.8228 13.0173 29.4697 12.6673C29.1162 12.3177 28.6976 12.1428 28.2139 12.1428Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="email_clip">
                                                    <rect width="20" height="20" fill="white" transform="translate(10 10)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
	                                <?php endif;?>
                                </a>
		                    <?php endif; ?>
                        </div>
                        <div class="modal-footer" data-current_photo_id="<?php echo $post->ID?>"></div>
                    </div>
                </div>
            </div>
            <!-- Full screen modal [end]-->
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( get_option( 'allow_comments_to_all' )['allow_comments_to_all'] == 'on' ) {
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            }?>
            <style>
                #comments {
                    margin-top: 0px !important;
                }

                @media (min-width: 320px) and (max-width: 630px) {
                    div.chevron-right-full-screen svg.fa-chevron-right,
                    div.chevron-left-full-screen svg.a-chevron-left,
                    div.modal-footer svg.fa-play,
                    div.modal-footer svg.fa-pause,
                    div.modal-footer svg.fa-th-large{
                        width: 40px!important;
                        height: 40px!important;
                    }

                    #modalWindowAlyaFancybox > div > div > div.modal-header {
                        line-height: 20px !important;
                    }
                    #modalWindowAlyaFancybox > div > div > div.modal-header > div {
                        flex-wrap: wrap !important;
                        padding-top: 5px !important;
                    }
                    #modalWindowAlyaFancybox div#rating,
                    #modalWindowAlyaFancybox div#control_interface{
                        width: 50% !important;
                    }
                    #modalWindowAlyaFancybox div#photo_counter {
                        width: 100% !important;
                    }
                    #modalWindowAlyaFancybox div#photo_counter {
                        order: 1 !important;
                    }
                    #modalWindowAlyaFancybox div#rating {
                        order: 2 !important;
                        text-align: left !important;
                    }
                    #modalWindowAlyaFancybox div#control_interface {
                        order: 3 !important;
                    }
                    #modalWindowAlyaFancybox div#main_photo {
                        top: 65px !important;
                    }
                    #modalWindowAlyaFancybox  #main_photo {
                        height: calc(100% - 25px) !important;
                    }
                    #modalWindowAlyaFancybox  div#main_photo.hidden_thumnails_fullscreen {
                        height: 100%!important;
                    }
                    #modalWindowAlyaFancybox  div#main_photo.visible_thumnails_fullscreen {
                        height: calc(100% - 55px) !important;
                    }
                    #modalWindowAlyaFancybox  div#main_photo.hidden_thumnails_fullscreen img {
                        height: calc(100% - 85px) !important;
                    }
                    #modalWindowAlyaFancybox  div#main_photo.visible_thumnails_fullscreen img{
                        height: calc(100% - 135px) !important;
                    }
                }
                @media (min-width: 320px) and (max-width: 465px) {
                    #modalWindowAlyaFancybox div#rating,
                    #modalWindowAlyaFancybox div#control_interface{
                        width: 100% !important;
                        text-align: center!important;
                    }
                    #modalWindowAlyaFancybox div#main_photo {
                        top: 95px !important;
                    }
                    #modalWindowAlyaFancybox > div > div > div.modal-header > div {
                        justify-content: center !important;
                    }
                    #modalWindowAlyaFancybox #control_interface > div {
                        justify-content: center !important;
                    }
                    #modalWindowAlyaFancybox #control_interface > div > button.close {
                        margin-right: 0 !important;
                    }
                    #modalWindowAlyaFancybox  #main_photo {
                        height: calc(100% - 55px) !important;
                    }
                    #modalWindowAlyaFancybox  div#main_photo.hidden_thumnails_fullscreen {
                        height: 100%!important;
                    }
                    #modalWindowAlyaFancybox  div#main_photo.visible_thumnails_fullscreen {
                        height: calc(100% - 55px) !important;
                    }

                    #modalWindowAlyaFancybox  div#main_photo.hidden_thumnails_fullscreen img {
                        height: calc(100% - 115px) !important;
                    }
                    #modalWindowAlyaFancybox  div#main_photo.visible_thumnails_fullscreen img{
                        height: calc(100% - 135px) !important;
                    }
                }
                @media (min-width: 631px){
                    #modalWindowAlyaFancybox  div#main_photo.hidden_thumnails_fullscreen {
                        height: 100%!important;
                    }
                    #modalWindowAlyaFancybox  div#main_photo.visible_thumnails_fullscreen {
                        height: calc(100% - 5px) !important;
                    }
                    #modalWindowAlyaFancybox  div#main_photo.hidden_thumnails_fullscreen img {
                        height: calc(100% - 70px) !important;
                    }
                    #modalWindowAlyaFancybox  div#main_photo.visible_thumnails_fullscreen img{
                        height: calc(100% - 135px) !important;
                    }
                }
            </style>
            <script>
                jQuery(document).ready(function($){
                    /** Hide/show thumbnail FULLSCREEN [start]**/
                    var share_flag = false;
                    $(document).on('click', '.modal-footer svg.fa-th-large', function(){
                        if (share_flag === false) {
                            $('#full_thumbnails').hide();
                            $('#modalWindowAlyaFancybox div#main_photo').removeClass('visible_thumnails_fullscreen');
                            $('#modalWindowAlyaFancybox div#main_photo').addClass('hidden_thumnails_fullscreen');
                            $('#modalWindowAlyaFancybox div.chevron-left-full-screen').css('margin-top', '115px');
                            $('#modalWindowAlyaFancybox div.chevron-right-full-screen').css('margin-top', '115px');
                            share_flag = true;
                        } else {
                            $('#full_thumbnails').show();
                            $('#modalWindowAlyaFancybox div#main_photo').removeClass('hidden_thumnails_fullscreen');
                            $('#modalWindowAlyaFancybox div#main_photo').addClass('visible_thumnails_fullscreen');
                            $('#modalWindowAlyaFancybox div.chevron-left-full-screen').css('margin-top', '40px');
                            $('#modalWindowAlyaFancybox div.chevron-right-full-screen').css('margin-top', '40px');
                            share_flag = false;
                        }
                    })
                    /** Hide/show thumbnail FULLSCREEN [end]**/
                });
            </script>
        </main>
    </div>
<?php
get_footer();
