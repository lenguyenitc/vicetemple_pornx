<?php
/**
* Template name: Photo separate page
*/

get_header();
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="videos-list">

                <?php
                $photo_id = $_GET['photo_id'];
                $gallery_id = (int)$_GET['gallery_id'];
                $photo_url = wp_get_attachment_url($photo_id);
                $photo_name = get_post( $photo_id, 'ARRAY_A' )['post_title'];

                /** Get all photos from gallery [end] */
                function get_post_block_gallery_images( $post = 0 ) {
                    $post = get_post( $post );


                    if ( ! is_a( $post, 'WP_Post' ) ) {
                        return [];
                    }


                    if ( ! has_block( 'gallery', $post->post_content ) ) {
                        return [];
                    }


                    $post_blocks = parse_blocks( $post->post_content );


                    foreach ( $post_blocks as $block ) {

                        if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
                            return array_map( function ( $image_id ) {
                                return $image_id;
                            }, $block['attrs']['ids'] );
                        }
                    }


                    return [];
                }
                $all_photos_id_from_gallery = get_post_block_gallery_images($gallery_id);
                /** Get all photos from gallery [end] */

                /** Counter [start]*/
                $count_key = 'photo_separate_views';
                $count = get_post_meta($photo_id, $count_key, true);
                if($count == ''){
                    $count = 1;
                    /*delete_post_meta($photo_id, $count_key);*/
                    add_post_meta($photo_id, $count_key, '1');
                }else{
                    $count++;
                    update_post_meta($photo_id, $count_key, $count);
                }
                /** Counter [end]*/

                /** Full screen [start]*/
                ?>
                <style>
                    * {
                        box-sizing: border-box
                    }

                    html,
                    body {
                        height: 100%;
                        padding: 0;
                        margin: 0;
                    }

                    .popup:not(:target) {
                        display: none;
                    }

                    .popup:target {
                        display: block;
                        position: fixed;
                        top: 0;
                        left: 0;
                        bottom: 0;
                        right: 0;
                        background: rgba(0,0,0,0.9);
                    }
                    .full-img {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    }
                    .close {
                        position: absolute;
                        top: 20px;
                        right: 20px;
                        font-size: 30px;
                        text-decoration: none;
                        color: red;

                    a img {
                        width:150px;
                    }
                    }

                    .fig {
                        text-align: center;
                    }
                    .wrapper {
                        position: relative;    /* Establish a containing block for the absolute element */
                        /*display: inline-block; !* To make width fit to the content *!*/
                        /*height:700px;*/
                        overflow: hidden;
                    }
                    .wrapper img {
                        vertical-align: middle; /* Fix the gap under the inline level element */
                    }

                    .wrapper .chevron-left {
                        position: absolute;
                        top: 0; left: 0;
                        display: flex;
                        height: 100%;
                        align-items: center;
                        display:none;
                    }
                    .wrapper .chevron-right {
                        position: absolute;
                        top: 0; right: 0;
                        display: flex;
                        height: 100%;
                        align-items: center;
                        display:none;
                    }
                    .wrapper:hover .chevron-right,
                    .wrapper:hover .chevron-left {
                        display: flex;
                    }


                </style>
                <?php
                $key = array_search($photo_id, $all_photos_id_from_gallery);
                if ($key === 0) {
                    $key = (count($all_photos_id_from_gallery)-1);
                } else {
                    $key--;
                }
                echo '<div class="wrapper">';
                echo '<div class="chevron-left" data-photo_id="'. $all_photos_id_from_gallery[$key] .'" data-gallery_id="'.$gallery_id.'"><i class="fa fa-chevron-left" style="font-size: 35px;"></i></div>';
                echo '<div class="fig"><a href="#img1"><img src="'. $photo_url .'" style="max-width: 1300px"></a></div>';
                $key = array_search($photo_id, $all_photos_id_from_gallery);
                if ((count($all_photos_id_from_gallery)-1) == $key) {
                    $key = 0;
                } else {
                    $key++;
                }
                echo '<div class="chevron-right" data-photo_id="'. $all_photos_id_from_gallery[$key] .'" data-gallery_id="'.$gallery_id.'"><i class="fa fa-chevron-right" style="font-size: 35px;"></i></div>';
                echo '</div>';
                echo '<div id="img1" class="popup"><a href="#" class="close">X</a><img class="full-img" src="'. $photo_url .'" alt=""></div>';
                /** Full screen [end]*/
                ?>

                <!-- Thumbnail line [star]-->
                <?php
                $key = array_search($photo_id, $all_photos_id_from_gallery);
                if ($key === 0) {
                    $key = (count($all_photos_id_from_gallery)-1);
                } else {
                    $key--;
                }
                echo '<div style="overflow-x: auto; max-width: 600px; display: flex"> <div class="chevron-left" data-photo_id="'. $all_photos_id_from_gallery[$key] .'" data-gallery_id="'.$gallery_id.'"><i class="fa fa-chevron-left" style="margin-top: 35px;"></i></div>';
                foreach($all_photos_id_from_gallery as $id){
                    echo '<img src="'.wp_get_attachment_url($id).'" style="width: 60px; margin-right:5px;" data-photo_id="'.$id.'" data-gallery_id="'.$gallery_id.'" class="thumbnail_gallery">';
                }
                $key = array_search($photo_id, $all_photos_id_from_gallery);
                if ((count($all_photos_id_from_gallery)-1) == $key) {
                    $key = 0;
                } else {
                    $key++;
                }
                echo '<div class="chevron-right" data-photo_id="'. $all_photos_id_from_gallery[$key] .'" data-gallery_id="'.$gallery_id.'"><i class="fa fa-chevron-right" style="margin-top: 35px;"></i></div></div>';
                ?>
                <!-- Thumbnail line [end]-->

                <!-- Like-Dislike [start] -->
                <div id="rating">
                    <span id="video-rate"><?php echo arc_getPostLikeLink($photo_id); ?></span>
                    <?php $is_rated_yet = arc_getPostLikeRate($photo_id) === false ? " not-rated-yet" : ''; ?>
                </div>
                <br>
                <div id="rating-col">
                    <?php if( xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on' ) : ?>
                        <div id="video-views"><span>0</span> <?php echo esc_html__('views', 'arc'); ?></div>
                    <?php endif; ?>
                    <?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
                        <div class="rating-bar">
                            <div class="rating-bar-meter"></div>
                        </div>
                        <div class="rating-result">
                            <div class="percentage">0%</div>
                            <div class="likes">
                                <i class="fa fa-thumbs-up"></i> <span class="likes_count">0</span>
                                <i class="fa fa-thumbs-down fa-flip-horizontal"></i> <span class="dislikes_count">0</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Like-Dislike [end] -->


                <!-- Share [start]-->
                <div id="video-share" style="margin-bottom: 10px" class="fig">
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
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url; ?>&amp;src=sdkpreparse"><i id="facebook" class="fa fa-facebook"></i></a>
                    <?php endif; ?>
                    <!-- Twitter -->
                    <?php if( xbox_get_field_value( 'my-theme-options', 'twitter' ) == 'on' ) : ?>
                        <a target="_blank" href="https://twitter.com/home?status=<?php print $current_url;?>"><i id="twitter" class="fa fa-twitter"></i></a>
                    <?php endif; ?>
                    <!-- Linkedin -->
                    <?php if( xbox_get_field_value( 'my-theme-options', 'linkedin' ) == 'on' ) : ?>
                        <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php print $current_url;?>&amp;title=<?php print $current_title;?>&amp;summary=<?php print $current_desc;?>&amp;source=<?php print home_url();?>"><i id="linkedin" class="fa fa-linkedin"></i></a>
                    <?php endif; ?>
                    <!-- Tumblr -->
                    <?php if( xbox_get_field_value( 'my-theme-options', 'tumblr' ) == 'on' ) : ?>
                        <a target="_blank" href="http://tumblr.com/widgets/share/tool?canonicalUrl=<?php print $current_url;?>"><i id="tumblr" class="fa fa-tumblr-square"></i></a>
                    <?php endif; ?>
                    <!-- Reddit -->
                    <?php if( xbox_get_field_value( 'my-theme-options', 'reddit' ) == 'on' ) : ?>
                        <a target="_blank" href="http://www.reddit.com/submit?url"><i id="reddit" class="fa fa-reddit-square"></i></a>
                    <?php endif; ?>
                    <!-- Odnoklassniki -->
                    <?php if( xbox_get_field_value( 'my-theme-options', 'odnoklassniki' ) == 'on' ) : ?>
                        <a target="_blank" href="https://connect.ok.ru/offer?url=<?php print $current_url;?>&title=<?php print $current_title;?>"><i id="odnoklassniki" class="fa fa-odnoklassniki"></i></a>
                    <?php endif; ?>

                    <!-- VK -->
                    <?php /*if( xbox_get_field_value( 'my-theme-options', 'vk' ) == 'on' ) : ?>
		<script type="text/javascript" src="https://vk.com/js/api/share.js?95" charset="windows-1251"></script>
		<a href="http://vk.com/share.php?url=<?php print $current_url;?>" target="_blank"><i id="vk" class="fa fa-vk"></i></a>
	<?php endif;*/ ?>
                    <!-- Email -->
                    <?php if( xbox_get_field_value( 'my-theme-options', 'email' ) == 'on' ) : ?>
                        <a target="_blank" href="mailto:?subject=&amp;body=<?php the_permalink(); ?>"><i id="email" class="fa fa-envelope"></i></a>
                    <?php endif; ?>
                    <?php
                    if(get_post_meta($post->ID, 'video_url', true) !== false && get_post_meta($post->ID, 'video_url', true) !== '' && (get_post_meta($post->ID, 'embed', true) == false || get_post_meta($post->ID, 'embed', true) == '')){
                        //$frame = esc_html((string)trim('<iframe src="'. get_post_meta($post->ID, 'video_url', true) . '" frameborder="0" scrolling="no" allowfullscreen width="560px" height="315px"></iframe>'));
                        $frame = esc_html((string)trim('<iframe src="'. site_url() . '/?id='  .$post->ID . '&from=frame" frameborder="0" scrolling="no" allowfullscreen width="560px" height="315px"></iframe>'));
                    }
                    if(get_post_meta($post->ID, 'embed', true) !== false && get_post_meta($post->ID, 'embed', true) !== '' && (get_post_meta($post->ID, 'video_url', true) == false || get_post_meta($post->ID, 'video_url', true) == '')) {
                        $frame = esc_html((string)trim(get_post_meta($post->ID, 'embed', true)));
                    }
                    ?>
                </div>
                <div> <?php echo '<h1>'.$photo_name.'</h1>'?> </div>
                <div>views: <strong><?php echo $count ?></strong></div>
                <!-- Share [end]-->

                <?php
                /** Favorite [start]**/
                echo '<div id="heart" data-photo_id="' .$photo_id. '"> <i class="fa fa-heart" style="color:#ff0000;"></i> </div>';
                /** Favorite [end]**/
                ?>

                <?php /** Tag [start]*/
                $galleries_tags = wp_get_post_terms($gallery_id, 'photos_tag');
                if(count($galleries_tags) > 0):
                    ?>
                    <h2 class="widget-title">Tags</h2>
                <?php endif;?>
                <style>
                    #galleries_tags {
                        display: flex;
                        flex-wrap: wrap;
                        margin: 0;
                        padding: 0;
                        margin-top: 2em;
                    }
                    li.gal_tag {
                        list-style: none;
                        margin: 7px;
                    }
                    li.gal_tag:first-child {
                        margin-left: 0px;
                    }
                </style>
                <ul id="galleries_tags">
                    <?php foreach($galleries_tags as $tag):?>
                        <li class="label gal_tag"><a href="/photos-tag/<?=$tag->slug;?>/"><i class="fa fa-tag"></i><?=$tag->name;?></a></li>
                    <?php endforeach;?>
                </ul>
                <!-- Tag [end]-->
            </div>
            <div class="clear"></div>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
            <?php
            /** Comments [start]*/
            // If comments are open or we have at least one comment, load up the comment template.
            if (get_option('allow_comments_to_all')['allow_comments_to_all'] == 'on') {
            if (comments_open() || get_comments_number()) :
            comments_template();
            endif;
            }
            echo 'www';
            /** Comments [start]*/
            ?>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();

