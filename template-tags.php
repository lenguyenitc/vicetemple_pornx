<?php
/**
 * Template Name: Tags
 **/
get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-tags' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' )
	{ $sidebar_pos = 'with-sidebar-right'; }
	else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?> categories-list">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <?php
			if( get_theme_mod( 'title_desc_tags_pos' ) == 'top') {?>
            <div class="customizer_content" style="margin-top: 0!important;margin-bottom: 40px;">
				<?php
                if ( get_theme_mod( 'seo_tags_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_tags_title' ); ?>
				<?php endif;?>
                <p >
					<?php if(get_theme_mod('seo_tags_text')) { echo get_theme_mod('seo_tags_text'); } ?>
                </p>
            </div>
			<?php }?>
			<header class="entry-header">
				<?php the_title( '<h2 class="widget-title tags-title">', '</h2>' ); ?>
			</header>
			<?php the_content(); ?>
			<?php
			$arr_filter = ['symbol', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
			?>
            <style>
                #letters_actors_container {
                    display: flex;
                    width: 100%;
                    margin-top:  -9px !important;
                    padding-top: 0px !important;
                    padding-bottom: 0!important;
                    justify-content: center;
                    flex-wrap: wrap;
                    font-family: 'Roboto',sans-serif;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 18px;
                    line-height: 21px;
                    margin-bottom: 0!important;
                }
                #letters_actors_container .letters_item p{
                    margin: 0 !important;
                    margin-right: 20px !important;
                }
                #letters_actors_container .letters_item p a.active {
                    color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
                }
                #letters_actors_container .letters_item p a:hover {
                    color: <?=get_theme_mod( 'btn_color_setting'); ?>!important;
                }
                #popular_actress .popular_item p a{
                    border-bottom: 1px solid <?php echo get_theme_mod( 'btn_color_setting'); ?>!important;
                }
                #popular_actress .popular_item p a:hover {
                    border-bottom: 1px solid <?php echo get_theme_mod( 'btn_hover_color_setting'); ?>!important;
                }
                #letters_actors_container .letters_item p a:hover {
                    color: <?=get_theme_mod( 'btn_hover_color_setting'); ?>!important;
                }
            </style>
            <div id="letters_actors_container">
                <div class="letters_item">
                    <p>
						<?php if(!isset($_GET['f_tag']) && empty($_GET['f_tag'])) :?>
                            <a class="active" style="cursor: pointer" onclick="window.location.href = '<?php echo site_url('/tags/'); ?>'"><?php echo strtoupper(__('All', 'arc'))?></a>
						<?php else:?>
                            <a style="cursor: pointer" onclick="window.location.href = '<?php echo site_url('/tags/'); ?>'"><?php echo strtoupper(__('All', 'arc'))?></a>
						<?php endif;?>
                    </p>
                </div>
				<?php
				foreach ($arr_filter as $value): ?>
                    <div class="letters_item">
						<?php if(isset($_GET['f_tag']) && !empty($_GET['f_tag']) && $_GET['f_tag'] == $value):?>
                            <?php if($_GET['f_tag'] == 'symbol'):?>
                                <p><a class="active" href="?f_tag=<?=$value;?>"><?='#';?></a></p>
                            <?php else:?>
                                <p><a class="active" href="?f_tag=<?=$value;?>"><?=strtoupper($value);?></a></p>
                            <?php endif;?>
						<?php else:?>
							<?php if($value == 'symbol'):?>
                                <p><a href="?f_tag=<?=$value;?>"><?='#';?></a></p>
							<?php else:?>
                                <p><a href="?f_tag=<?=$value;?>"><?=strtoupper($value);?></a></p>
							<?php endif;?>
						<?php endif;?>
                    </div>
				<?php
				endforeach;
				?>
            </div>
			<?php
			$arr_en = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
			global $wpdb;
            if(isset($_GET['f_tag']) && !empty($_GET['f_tag'])) {
                if($_GET['f_tag'] == 'symbol') {
	                $tag_query = "SELECT * FROM `wp_terms`
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '1%' AND `wp_term_taxonomy`.`taxonomy` = 'post_tag' AND `wp_term_taxonomy`.`count` > 0 
                            UNION
                            SELECT * FROM `wp_terms`
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '2%' AND `wp_term_taxonomy`.`taxonomy` = 'post_tag' AND `wp_term_taxonomy`.`count` > 0 
                            UNION
                            SELECT * FROM `wp_terms`
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '3%' AND `wp_term_taxonomy`.`taxonomy` = 'post_tag' AND `wp_term_taxonomy`.`count` > 0 
                            UNION
                            SELECT * FROM `wp_terms`
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '4%' AND `wp_term_taxonomy`.`taxonomy` = 'post_tag' AND `wp_term_taxonomy`.`count` > 0 
                            UNION
                            SELECT * FROM `wp_terms`
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '5%' AND `wp_term_taxonomy`.`taxonomy` = 'post_tag' AND `wp_term_taxonomy`.`count` > 0 
                            UNION
                            SELECT * FROM `wp_terms`
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '6%' AND `wp_term_taxonomy`.`taxonomy` = 'post_tag' AND `wp_term_taxonomy`.`count` > 0 
                            UNION
                            SELECT * FROM `wp_terms`
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '7%' AND `wp_term_taxonomy`.`taxonomy` = 'post_tag' AND `wp_term_taxonomy`.`count` > 0 
                            UNION
                            SELECT * FROM `wp_terms`
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '8%' AND `wp_term_taxonomy`.`taxonomy` = 'post_tag' AND `wp_term_taxonomy`.`count` > 0 
                            UNION
                            SELECT * FROM `wp_terms`
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '9%' AND `wp_term_taxonomy`.`taxonomy` = 'post_tag' AND `wp_term_taxonomy`.`count` > 0 
                            UNION
                            SELECT * FROM `wp_terms`
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '0%' AND `wp_term_taxonomy`.`taxonomy` = 'post_tag' AND `wp_term_taxonomy`.`count` > 0";
	                $tags= $wpdb->get_results($tag_query);
                }
                /*elseif($_GET['f_tag'] == 'other') {
	                $tags = get_tags('orderby=name&order=ASC');
                }*/
                else {
	                $tag_query = "SELECT * FROM `wp_terms` 
                            INNER JOIN `wp_term_taxonomy` ON `wp_terms`.`term_id` = `wp_term_taxonomy`.`term_id` 
                            WHERE `wp_terms`.`name` LIKE '{$_GET['f_tag']}%' 
                            AND `wp_term_taxonomy`.`taxonomy` = 'post_tag' 
                            AND `wp_term_taxonomy`.`count` > 0";
	                $tags= $wpdb->get_results($tag_query);
                }
            } else {
	            $tags = get_tags('orderby=name&order=ASC');
            }

			$capital = '';
			$letter_i = 0;
			$j = 0;
			$non_lat = 0;
			$symbols = ['`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '\\', '|', '/', '\'', '[', ']', '{', '}', '<', '>', '"', ':', ';', ',', '.', '?', ' ' ];
			$output = '<div class="separator-tags" style="margin-top: 20px !important;"></div><div class="tags-letter-block">';
			foreach ($tags as $tag) {
				$tag_name = restyle_tag( $tag->name);
                $flag = false;
                for($i = 0; $i < strlen($tag_name); $i++){
                    if (array_search($tag_name[$i], $symbols) === false) {
                        $flag = true;
                    }
                }
                if ($flag === false && (xbox_get_field_value('my-theme-options', 'tag_symbols') == 'remove_symbols' || xbox_get_field_value('my-theme-options', 'tag_symbols') == 'replace_symbols'))
                    continue;
				$firstletter = mb_strtolower(mb_substr($tag->name, 0, 1));
				if($firstletter !== $capital) {
					if(in_array($firstletter, $arr_en) !== false) {
						$capital = $firstletter;
						$letter_i++;
						if($letter_i == 1) {
							$output .= '<div class="tag-letter">' . mb_strtoupper($capital) . '</div><div class="tag-items">';
						} else if($letter_i > 1){
							$output .= '</div><div class="separator-tags"></div>';
							$output .= '<div class="tag-letter">' . mb_strtoupper($capital) . '</div><div class="tag-items">';
						}
						$term = get_term_by('id', (int)$tag->term_id, 'post_tag');
						$output .= '<div class="tag-item"><a href="' . get_term_link( (int)$tag->term_id,
								'post_tag' ) . '">' . $tag_name . '<span class="count"> ' . $term->count . '</span></a></div>';
					} else {
						if (preg_match("/\p{Han}+/u", $firstletter) || preg_match('/\p{Cyrillic}/u', $firstletter) || preg_match('/[أ-ي]/ui', $firstletter)) {
							$capital = 'NON<br>LAT.';
							$letter_i++;
							if($letter_i > 1) {
								if($non_lat == 0) {
									$output .= '</div><div class="separator-tags"></div>';
									$output .= '<div class="tag-letter">' . $capital . '</div><div class="tag-items">';
								}
								$term = get_term_by('id', (int)$tag->term_id, 'post_tag');
								$output .= '<div class="tag-item"><a href="' . get_term_link( (int)$tag->term_id,
										'post_tag' ) . '">' . $tag_name . '<span class="count"> ' . $term->count . '</span></a></div>';
								$non_lat++;
							}
						} else {
							$capital = '#';
							$letter_i++;
							if($letter_i == 1) {
								$output .= '<div class="tag-letter">' . $capital . '</div><div class="tag-items">';
							}
							$term = get_term_by('id', (int)$tag->term_id, 'post_tag');
							$output .= '<div class="tag-item"><a href="' . get_term_link( (int)$tag->term_id,
									'post_tag' ) . '">' . $tag_name . '<span class="count"> ' . $term->count . '</span></a></div>';
						}
					}
				} else {
					$term = get_term_by('id', (int)$tag->term_id, 'post_tag');
					$output .= '<div class="tag-item"><a href="' . get_term_link( (int)$tag->term_id,
							'post_tag' ) . '">' . $tag_name . '<span class="count"> ' . $term->count . '</span></a></div>';
				}
			}
			$output .= '</div><div class="separator-tags"></div>';
			echo $output;

?>
            <div class="clear"></div>
            <div class="customizer_content" style="padding-top: 20px">
            <?php
            if( get_theme_mod( 'title_desc_tags_pos' ) == 'bottom') {
				if ( get_theme_mod( 'seo_tags_title' ) !== '' ) : ?>
                   <?php echo get_theme_mod( 'seo_tags_title' ); ?>
				<?php endif;?>
                <p>
					<?php if(get_theme_mod('seo_tags_text')) { echo get_theme_mod('seo_tags_text'); } ?>
                </p>
			<?php }?>
            </div>
		</main><!-- #main -->
        <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
        </script>
        <style>
            @media (min-width: 320px) and (max-width: 450px) {
                div.tags-letter-block div.tag-letter {
                    width: 100%!important;
                    clear: both!important;
                    margin-bottom: 20px!important;
                    border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
                    text-align: center !important;
                    padding-left: 0px !important;
                }

                div.tags-letter-block div.tag-items {
                    margin-left: 60px !important;
                }

                div.tags-letter-block div.tag-items a{
                    text-align: left !important;
                }

                div.separator-tags {
                    margin-bottom: 0px !important;
                }
            }
            @media (max-width: 330px) {
                div.tags-letter-block div.tag-items {
                    margin-left: 45px !important;
                }
            }
        </style>
	</div><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-tags' ) == 'on') {
	get_sidebar();
}
get_footer();