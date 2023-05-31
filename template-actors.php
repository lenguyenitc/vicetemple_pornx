<?php
/**
 * Template Name: Actors
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
                        border-bottom: 1px solid #293346;
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
                    #letters_actors_container .letters_item p a:hover {
                        color: #C32CE2!important;
                    }
                    #popular_actress .popular_item p a:hover {
                        color: #C32CE2 !important;
                    }
                    #letters_actors_container .letters_item p a.active {
                        color:  #C32CE2 !important;
                    }
                </style>
                <div id="letters_actors_container" style="padding-top: 0!important;margin-bottom: 20px!important;">
                    <div class="letters_item">
                        <p class="letter_header"><?php echo strtoupper(__('Filter: ', 'arc'))?></p>
                    </div>
                    <div class="letters_item">
                        <p>
                            <?php if(!isset($_GET['f']) && empty($_GET['f'])) :?>
                            <a class="active" style="cursor: pointer" onclick="window.location.href = '<?php echo site_url('/actors/'); ?>'"><?php echo strtoupper(__('All', 'arc'))?></a>
                            <?php else:?>
                            <a style="cursor: pointer" onclick="window.location.href = '<?php echo site_url('/actors/'); ?>'"><?php echo strtoupper(__('All', 'arc'))?></a>
                            <?php endif;?>
                        </p>
                    </div>
                    <?php
                    foreach ($arr_en as $value): ?>
                    <div class="letters_item">
                        <?php if(isset($_GET['f']) && !empty($_GET['f']) && $_GET['f'] == strtoupper($value)):?>
                            <p><a class="active" href="?f=<?php echo strtoupper($value);?>"><?php echo strtoupper($value);?></a></p>
                        <?php else:?>
                        <p><a href="?f=<?php echo strtoupper($value);?>"><?php echo strtoupper($value);?></a></p>
                        <?php endif;?>
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
                <div class="separator-tags"></div>
				<?php
				$page = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$per_page = xbox_get_field_value( 'my-theme-options', 'number-actors-per-page' );
				$number_of_series = count(get_terms('actors'));
				$offset = ( $page - 1 ) * $per_page;

				if(!isset($_GET['f']) && empty($_GET['f'])) {
					$term_args = array(
						'number' => $per_page,
						'offset' => $offset,
						'hide_empty' => true
					);
					$terms = get_terms('actors', $term_args);
                }
				if(isset($_GET['f']) && !empty($_GET['f'])) {
					global $wpdb;
					$q = "SELECT * FROM `wp_terms` 
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '{$_GET['f']}%' 
                            AND `wp_term_taxonomy`.`taxonomy` = 'actors' 
                            AND `wp_term_taxonomy`.`count` > 0 LIMIT {$per_page} OFFSET {$offset}";
					$terms = $wpdb->get_results($q);
					$count_terms_query = count($terms);
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
									'taxonomy' => 'actors',
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
							<a href="<?php echo esc_url(home_url()); ?>?actors=<?php echo $term->slug; ?>" title="<?php echo $term->name; ?>">
                                <!-- Thumbnail -->
                                    <?php
                                    $query_post_ids = $wpdb->get_results("SELECT `wp_posts`.`ID` FROM `wp_posts`
    LEFT JOIN `wp_term_relationships` ON `wp_posts`.`ID` = `wp_term_relationships`.`object_id`
WHERE `wp_posts`.`post_type` = 'post' AND `wp_posts`.`post_status` = 'publish'
  AND `wp_term_relationships`.`term_taxonomy_id` = ". $term->term_id, ARRAY_A);
                                    /*echo '<pre>';
                                    print_r($query_post_ids);
                                    echo '</pre>';*/

									$thumb_url = get_post_meta($post->ID, 'thumb', true);
									$image_id = get_term_meta($term->term_id, 'actors-image-id', true );

									$back_img_url = wp_get_attachment_image_url($image_id, 'full');
									if($image_id) {
										$back_img_url = wp_get_attachment_image_url($image_id, 'full');
									}
									elseif (has_post_thumbnail($post->ID)) {
										$back_img_url = get_the_post_thumbnail_url($post->ID, 'full');
									}
									elseif (!has_post_thumbnail() || $image_id === false || $thumb_url === false) {
										$back_img_url = get_template_directory_uri() .'/assets/img/no-image.jpg';
									}
									elseif (!has_post_thumbnail()/* && $thumb_url*/) {
									    $back_img_url = $thumb_url;
									}
									?>
								<div class="post-thumbnail" style="border-radius: 4px; background-image: url(<?=$back_img_url;?>) !important;">
								</div>
								<header class="entry-header actors-entry-header">
                                    <p style="text-align: left; width: 100%;" class="actor-title"><?php echo $term->name; ?></p>
                                    <p class="video_block_delimiter"></p>
                                    <p class="rating-bar">
										<?php if(xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on') : ?><span class="views">
                                            <?=(get_term_meta($term->term_id,'actors_views_count', true) == false) ? '0': ((get_term_meta($term->term_id,'actors_views_count', true) > 999) ?number_format(get_term_meta($term->term_id,'actors_views_count', true), 0, ',', ','):get_term_meta($term->term_id,'actors_views_count', true));?>
                                            <span class="viewers">views</span></span><?php endif; ?>
                                        <span class="actors-video-count"><?php echo get_term($term->term_id)->count;?> <span> video</span></span>
                                    </p>
								</header>
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
	                    arc_actors_navi(ceil($number_of_series / $per_page));
                    }
				} else {
				    echo '<div class="alert">No actors found</div>';
				}?>
			</div>
            <div class="clear"></div>
            <h3 class="widget-title" style="margin-bottom: 20px"><?php echo __('Popular actress', 'arc');?></h3>
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
                <div class="popular_item">
                    <p>
                        <a href="<?php echo get_term_link($key, 'actors');?>">
                            <?php echo get_term_by('ID', $key, 'actors', ARRAY_A)['name'];?>
                        </a>
                    </p>
                </div>
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
