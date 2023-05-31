<?php
/**
 * Template Name: Pornstars
 **/
get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-actors' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; }
	else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
}
?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?> actors-list">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <?php
			if( get_theme_mod( 'title_desc_pos_actors' ) == 'top') {?>
            <div class="customizer_content" style="margin-top: 0!important;margin-bottom: 40px;">
				<?php
                if ( get_theme_mod( 'seo_actors_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_actors_title' ); ?>
				<?php endif;?>
            </div>
					<?php if(get_theme_mod('seo_actors_text')) { echo get_theme_mod('seo_actors_text'); } ?>
			<?php }?>
			<header class="entry-header">
				<?php the_title( '<h2 class="widget-title actors-title">', '</h2>' ); ?>
			</header>
			<?php the_content(); ?>
			<div class="videos-list">
                <?php
                $arr_en = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
                ?>
                <style>
                    #letters_actors_container,
                    #popular_actress{
                        display: flex;
                        width: 100%;
                        margin-top:  0px !important;
                        padding-top: 10px !important;
                        padding-bottom: 0!important;
                        justify-content: center;
                        flex-wrap: wrap;
                        margin-bottom: 20px;
                        font-family: 'Roboto',sans-serif;
                        font-style: normal;
                        font-weight: normal;
                        font-size: 18px;
                        line-height: 21px;
                    }
                    #popular_actress {
                        justify-content: flex-start;
                        border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
                        padding-bottom: 20px !important;
                        margin-bottom: 40px !important;
                    }
                    #letters_actors_container .letters_item p,
                    #popular_actress .popular_item p{
                        margin: 0 !important;
                        margin-right: 20px !important;
                    }

                    #popular_actress .popular_item p {
                        margin-bottom: 10px !important;
                        margin-right: 20px !important;
                    }
                    #letters_actors_container .letters_item p a.active {
                        color:  <?=get_theme_mod( 'btn_color_setting'); ?> !important;
                    }
                    #letters_actors_container .letters_item p a:hover {
                        color: <?=get_theme_mod( 'btn_hover_color_setting'); ?>!important;
                    }

                    #popular_actress .popular_item p a:hover {
                        color: <?=get_theme_mod( 'btn_hover_color_setting'); ?> !important;
                    }

                </style>
                <div id="letters_actors_container" style="margin-top: -9px !important;margin-bottom: 0 !important; padding-top: 0 !important;">
                    <div class="letters_item">
                        <p>
                            <?php if(!isset($_GET['f']) && empty($_GET['f'])) :?>
                            <a class="active" style="cursor: pointer" onclick="window.location.href = '<?php echo site_url('/pornstars/'); ?>'"><?php echo strtoupper(__('All', 'arc'))?></a>
                            <?php else:?>
                            <a style="cursor: pointer" onclick="window.location.href = '<?php echo site_url('/pornstars/'); ?>'"><?php echo strtoupper(__('All', 'arc'))?></a>
                            <?php endif;?>
                        </p>
                    </div>
                    <?php
                    foreach ($arr_en as $value): ?>
                    <div class="letters_item">
                        <?php if(isset($_GET['f']) && !empty($_GET['f']) && $_GET['f'] == strtoupper($value)):?>
                            <p><a class="active" href="<?=site_url('/pornstars/')?>?f=<?php echo strtoupper($value);?>"><?php echo strtoupper($value);?></a></p>
                        <?php else:?>
                        <p><a href="<?=site_url('/pornstars/')?>?f=<?php echo strtoupper($value);?>"><?php echo strtoupper($value);?></a></p>
                        <?php endif;?>
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                <div class="separator-tags" style="margin-left: 5px;margin-right: 5px;margin-top: 20px !important;"></div>
				<?php
				$page = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$per_page = xbox_get_field_value( 'my-theme-options', 'number-actors-per-page' );
				$number_of_series = count(get_terms('pornstars'));
				$offset = ( $page - 1 ) * $per_page;

				if(!isset($_GET['f']) && empty($_GET['f'])) {
					$term_args = array(
						'number' => $per_page,
						'offset' => $offset,
						'hide_empty' => true
					);
					$terms = get_terms('pornstars', $term_args);
                }
				if(isset($_GET['f']) && !empty($_GET['f'])) {
					global $wpdb;
					$q = "SELECT * FROM `wp_terms` 
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '{$_GET['f']}%' 
                            AND `wp_term_taxonomy`.`taxonomy` = 'pornstars' 
                            AND `wp_term_taxonomy`.`count` > 0 ORDER BY `name` ASC LIMIT {$per_page} OFFSET {$offset}";
					$terms = $wpdb->get_results($q);

					$terms_all = $wpdb->get_results("SELECT * FROM `wp_terms` 
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '{$_GET['f']}%' 
                            AND `wp_term_taxonomy`.`taxonomy` = 'pornstars' 
                            AND `wp_term_taxonomy`.`count` > 0 ORDER BY `name` ASC");
					$count_terms_query = count($terms_all);
				}
				if($terms) {
                    foreach ($terms as $term) {
						$args = array(
							'post_type'        => 'post',
							'show_count'       => 1,
							'orderby'          => 'rand',
							'post_status'      => 'publish',
							'tax_query' => array(
								array(
									'taxonomy' => 'pornstars',
									'field' => 'slug',
									'terms' => $term->slug
								)
							)
						);
						$video_from_actor = new WP_Query( $args );
	                    $count_video_actors = 0;
						if( $video_from_actor->have_posts() ){
							$video_from_actor->the_post();
						}else{}
						$term->slug;
						$term->name;
	                    ?>
						<article id="post-<?php the_ID(); ?>" class="thumb-block actors post-<?php the_ID(); ?> type-post">
							<a href="<?php echo esc_url(home_url()); ?>/pornstar/<?php echo $term->slug; ?>" title="<?php echo $term->name; ?>">
                                <!-- Thumbnail -->
                                    <?php
                                    $thumbnail_id = get_term_meta($term->term_id, 'pornstars-image-id', true) ?? false;

                                    if (!empty($thumbnail_id)) {
                                        $back_img_url = wp_get_attachment_image_url($thumbnail_id);
                                    } else {
                                        $thumb_url = get_post_meta(get_the_ID(), 'thumb', true);
                                        $image_id = get_term_meta($term->term_id, 'actors-image-id', true );
                                        if ($thumb_url) {
                                            $response = wp_remote_get($thumb_url);
                                            $code = wp_remote_retrieve_response_code( $response );
                                            if($code != 200) {
                                                $back_img_url = get_template_directory_uri() .'/assets/img/no-album-Image.png';
                                            } else {
                                                $back_img_url = $thumb_url;
                                            }

                                        } else {
                                            if($image_id === false) {
                                                $back_img_url = get_template_directory_uri() .'/assets/img/no-album-Image.png';
                                            } else {
                                                $res = wp_remote_get(wp_get_attachment_image_url($image_id, 'full'));
                                                $code = wp_remote_retrieve_response_code( $res);
                                                if($code != 200) {
                                                    $back_img_url = get_template_directory_uri() .'/assets/img/no-album-Image.png';
                                                } else {
                                                    $back_img_url = wp_get_attachment_image_url($image_id, 'full');
                                                }
                                            }
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
                                    }
									?>
								<div class="post-thumbnail" style="border-radius: 4px;background-image: url(<?php echo $back_img_url;?>) !important;">
								</div>
                                <?php if(xbox_get_field_value('my-theme-options','display_pornstars_views') == 'on'):?>
								<header class="entry-header actors-entry-header">
                                    <p style="text-align: left; width: 100%;" class="actor-title"><span><?php echo $term->name; ?></span></p>
                                    <p class="video_block_delimiter"></p>
                                    <p class="rating-bar">
										<span class="views">
                                            <?=count_views_by_pornstars($term->term_id)?><span class="viewers"> views</span></span>
                                        <span class="actors-video-count"><?php echo get_term($term->term_id)->count;?> <span> <?=(get_term($term->term_id)->count == 1) ? ' video': ' videos';?></span></span>
                                    </p>
								</header>
                            <?php else: ?>
                                    <header class="entry-header actors-entry-header">
                                        <p style="text-align: left;width: 100%;display: flex;
                                            flex-wrap: nowrap;
                                            justify-content: space-between;
                                            align-items: center; height: 30px !important;" class="actor-title">
                                            <span>
		                                        <?php echo $term->name; ?>
                                            </span>
                                        <!--<p style="/*width: 100% !important;
                                            text-overflow: ellipsis;
                                            overflow: hidden;
                                            white-space: pre-wrap;
                                            line-height: 12px;*/"></p>-->
                                            <span class="actors-video-count" style="float: right;display: flex;"><?php echo get_term($term->term_id)->count;?> <span style="
margin-left: 5px;"> <?=(get_term($term->term_id)->count == 1) ? ' video': ' videos';?></span></span>
                                        </p>
                                    </header>
                            <?php endif; ?>
							</a>
						</article>
                    <?php }
					 if($number_of_series > $per_page):?>
                    <div class="clear"></div>
                    <div class="separator-pagination"></div>
                     <style>
                         div.pagination ul {
                             margin-bottom: 0 !important;
                             padding-bottom: 0 !important;
                         }
                         div.pagination {
                             margin-bottom: 40px !important;
                         }
                     </style>
				    <?php endif;
                    if(!isset($_GET['f']) && empty($_GET['f'])) {
					    arc_actors_navi(ceil($number_of_series / $per_page));
					} else {
	                    arc_actors_navi(ceil($count_terms_query / $per_page));
                    }
				} else {
				    echo '<div class="alert">No pornstars found.</div>';
				}?>
			</div>
            <div class="clear"></div>
            <h3 class="widget-title" style="margin-bottom: 20px"><?php echo __('Popular pornstars', 'arc');?></h3>
            <div id="popular_actress">
                <?php
                $popular_terms = $wpdb->get_results("SELECT `term_id`,`meta_value` FROM `wp_termmeta` WHERE `meta_key` = 'actors_views_count'");
                $new_popular_terms = [];
                foreach ($popular_terms as $popular_term) {
                    $new_popular_terms[$popular_term->term_id] = $popular_term->meta_value;
                }
                arsort($new_popular_terms);
                $i = 0;
                foreach ($new_popular_terms as $key => $value):
                    if($i >= 16): break;
                    else:
                ?>
                        <?php
                        $args2 = array(
                            'post_type'        => 'post',
                            'orderby'          => 'rand',
                            'post_status'      => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'pornstars',
                                    'field' => 'slug',
                                    'terms' => get_term_by('ID', $key, 'pornstars', ARRAY_A)['slug']
                                )
                            )
                        );
                        $count_video_in_pornstars = new WP_Query( $args2 );
                        if(!$count_video_in_pornstars->have_posts()):
                        else: ?>
                <div class="popular_item">
                    <p>
                        <a href="<?php echo get_term_link($key, 'pornstars');?>">
                            <?php echo get_term_by('ID', $key, 'pornstars', ARRAY_A)['name'];?>
                        </a>
                    </p>
                </div>
                    <?php endif;?>
                <?php
                    $i++;
                    endif;
                    endforeach;?>
            </div>
            <div class="customizer_content" style="margin-bottom: 0 !important;">
			<?php
			if( get_theme_mod( 'title_desc_pos_actors' ) == 'bottom') {
				if ( get_theme_mod( 'seo_actors_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_actors_title' ); ?>
				<?php endif;?>
					<?php if(get_theme_mod('seo_actors_text')) { echo get_theme_mod('seo_actors_text'); } ?>
			<?php } ?>
            </div>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-actors' ) == 'on') {
	get_sidebar();
}
get_footer();
