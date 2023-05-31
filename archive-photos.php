<?php get_header(); ?>
<?php
if(xbox_get_field_value( 'my-theme-options', 'layout') == 'full-width') {
	if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-photos' ) == 'on' ) {
		$filter_max_width = '1217px';
	} else {
		$filter_max_width = '1553px';
	}
} else {
	if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-photos' ) == 'on' ) {
		$filter_max_width = '916px';
	} else {
		$filter_max_width = '1253px';
	}
}
?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-photos' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) {
	    $sidebar_pos = 'with-sidebar-right';
	}
	else { $sidebar_pos = 'with-sidebar-left';}
}else{
	$sidebar_pos = '';
} ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?> gallery-list">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
			<?php
			if( get_theme_mod( 'title_desc_photos_pos' ) == 'top') {?>
            <div class="customizer_content" style="margin-top: 0!important;margin-bottom: 40px;">
				<?php if ( get_theme_mod( 'seo_photos_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_photos_title' ); ?>
				<?php endif;?>
					<?php if(get_theme_mod('seo_photos_text')) { echo get_theme_mod('seo_photos_text'); } ?>
            </div>
			<?php }?>
				<header class="page-header header-photos-title">
                    <h2 class="widget-title photos-title" style="border-bottom: none !important;"><?php echo __('Porn albums', 'arc');?></h2>
                        <div id="photos_h2_filter" style="">
                            <div class="filter_buttons" style="
                            position: absolute;
                            right: 0em;
                            top: 0px;
                            display: inline-flex;
                            justify-content: flex-end;
                            align-items: baseline;
                        ">
		                        <?php if(isset($_GET['a']) && !empty($_GET['a'])):?>
                                    <div style="margin-right: 32px;margin-top: 1px">
                                        <a id="gallery_link" style="float: right; color: rgb(255, 255, 255);" href="/public-profile/?xxx=<?=$_GET['a']?>">
					                        <?=get_userdata($_GET['a'])->display_name?>'s profile</a>
                                    </div>
		                        <?php endif; ?>
                                <div id="adv_filter" class="tag_filter" style="margin-right: 0;">
                                    <div class="filters-select" style="left: -20px;position: relative;display: inline-block;cursor: pointer;height: auto;">
				                        <?php echo __('Tags', 'arc');?>
                                        <span class="adv-filter-tags">
                                    <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.83927 5.68659C6.64771 5.86356 6.35229 5.86355 6.16072 5.68659L0.943664 0.867275C0.609395 0.55849 0.827875 -1.15154e-06 1.28294 -1.11176e-06L11.7171 -1.99581e-07C12.1721 -1.59798e-07 12.3906 0.558491 12.0563 0.867276L6.83927 5.68659Z" fill="white"></path>
                                    </svg>
                                </span>
                                    </div>
                                </div>
                                <div id="filters" style="position: relative; top: 0;">
                                    <div class="filters-select">
				                        <?php
				                        if(!isset($_GET['photo-filter'])) echo __('Latest', 'arc') . ' albums';
				                        else echo $_GET['photo-filter'] . ' albums';
				                        ?>
                                        <style>
                                            #filters .filters-options {
                                                top: 105%!important;
                                            }
                                            #filters .filters-options span {
                                                width: 135px !important;
                                            }
                                        </style>
                                        <div class="filters-options">
                                    <span><a href="<?=site_url('/photos/').'?photo-filter=Latest'?>">
                                            <?php echo esc_html__('Latest albums', 'arc'); ?>
                                        </a>
                                    </span>
                                            <span><a href="<?=site_url('/photos/').'?photo-filter=Popular'?>">
                                            <?php echo esc_html__('Popular albums', 'arc'); ?></a>
                                    </span>
                                            <span><a href="<?=site_url('/photos/').'?photo-filter=GIF'?>">
                                            <?php echo esc_html__('GIF-only albums', 'arc'); ?></a>
                                    </span>
                                            <span><a href="<?=site_url('/photos/').'?photo-filter=Image'?>">
                                            <?php echo esc_html__('Image-only albums', 'arc'); ?></a>
                                    </span>
                                        </div>
                                        <span class="adv-filter-photos">
                                    <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.83927 5.68659C6.64771 5.86356 6.35229 5.86355 6.16072 5.68659L0.943664 0.867275C0.609395 0.55849 0.827875 -1.15154e-06 1.28294 -1.11176e-06L11.7171 -1.99581e-07C12.1721 -1.59798e-07 12.3906 0.558491 12.0563 0.867276L6.83927 5.68659Z" fill="white"></path>
                                    </svg>
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
				</header>
                <div id="filter_users_area" style="max-width: <?=$filter_max_width?>;width:95%;margin-top: -40px;">
                    <form method="get">
                        <fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;">
                            <div style="display: inline-flex; flex-wrap: wrap">
                                <?php $galleries_tags = get_terms('photos_tag',['hide_empty' => 1,]);
                                foreach ($galleries_tags as $tag):?>
	                                <?php $tag_name = restyle_tag($tag->name);?>
                                    <?php if($tag->slug == $_GET['tags']):?>
                                        <a class="a_selected_tag" href="<?php echo site_url() . '/photos/?tags='.$tag->slug;?>">
                                            <?php echo $tag_name;?>
                                        </a>
                                    <?php else:?>
                                        <a class="a_noselected_tag" href="<?php echo site_url() . '/photos/?tags='.$tag->slug;?>">
                                            <?php echo $tag_name;?>
                                        </a>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </div>
                        </fieldset>
                        <div class="separator-filter-tag"></div>
                        <div id="selected_tag_div" style="display: inline-flex;
                            flex-wrap: nowrap;
                            justify-content: space-between;
                            align-items: baseline;width: 100%;">
                            <span style="float:left;"><span>Selected tag:</span> <?php if(!empty($_GET['tags'])){?><span class="selected_tag" style="text-align: center;white-space: nowrap"><?=restyle_tag($_GET['tags']);?></span><?php }?>
                            </span>
                            <?php if(!empty($_GET['tags'])):?>
                            <input style="float: right;" type="button" id="clear_tag_filter" value="<?php echo __('Clear tag', 'arc');?>" onclick="window.location.href = '<?php echo site_url() . '/photos/'; ?>'">
                            <?php endif;?>
                        </div>

                    </form>
                </div>
				<?php
				$filter = $_GET['photo-filter'];
				if(isset($_GET['a']) && !empty($_GET['a'])) $author = $_GET['a'];
				else $author = '';
				if(isset($_GET['tags']) && !empty($_GET['tags'])) $photo_tags = $_GET['tags'];
				else $photo_tags = '';
				switch ($filter) {
					case 'Latest':
						$args_query = array(
							'post_type'      => 'photos',
							'orderby'        => 'date',
							'order'          => 'DESC',
							'author'    => $author,
							'photos_tag'   => $photo_tags,
							'posts_per_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
							'posts_per_archive_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
							'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
						);
						$count_filter_albums = count(get_posts([
                            'post_type'      => 'photos',
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'photos_tag'   => $photo_tags,
                            'numberposts' => -1,
                            'hidden_empty' => 1,
                            'author'    => $author,
                            'suppress_filters' => true
                        ]));
						break;
					case 'Popular':
						$args_query = array(
							'post_type'      => 'photos',
							'meta_key'       => 'photo_gallery_views',
							'orderby'        => 'meta_value_num',
							'order'          => 'DESC',
							'author'    => $author,
							'photos_tag'   => $photo_tags,
							'posts_per_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
							'posts_per_archive_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
							'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
						);
                        $count_filter_albums = count(get_posts([
                            'post_type'      => 'photos',
                            'meta_key'       => 'photo_gallery_views',
                            'orderby'        => 'meta_value_num',
                            'order'          => 'DESC',
                            'photos_tag'   => $photo_tags,
                            'numberposts' => -1,
                            'hidden_empty' => 1,
                            'author'    => $author,
                            'suppress_filters' => true
                        ]));
						break;
					case 'GIF':
						$args_query = array(
							'post_type'      => 'photos',
							'meta_key'       => 'admin-gallery-type',
							'meta_value'     => 'on',
							'order'          => 'DESC',
							'author'    => $author,
							'photos_tag'   => $photo_tags,
							'posts_per_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
							'posts_per_archive_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
							'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
						);
                        $count_filter_albums = count(get_posts([
                            'post_type'      => 'photos',
                            'meta_key'       => 'admin-gallery-type',
                            'meta_value'     => 'on',
                            'order'          => 'DESC',
                            'photos_tag'   => $photo_tags,
                            'numberposts' => -1,
                            'hidden_empty' => 1,
                            'author'    => $author,
                            'suppress_filters' => true
                        ]));
						break;
					case 'Image':
						$args_query = array(
							'post_type'      => 'photos',
							'meta_key'       => 'admin-gallery-type',
							'meta_value'     => 'off',
							'order'          => 'DESC',
							'author'    => $author,
							'photos_tag'   => $photo_tags,
							'posts_per_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
							'posts_per_archive_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
							'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
						);
                        $count_filter_albums = count(get_posts([
                            'post_type'      => 'photos',
                            'meta_key'       => 'admin-gallery-type',
                            'meta_value'     => 'off',
                            'order'          => 'DESC',
                            'photos_tag'   => $photo_tags,
                            'numberposts' => -1,
                            'hidden_empty' => 1,
                            'author'    => $author,
                            'suppress_filters' => true
                        ]));
						break;
					default:
						$args_query = array(
							'post_type'      => 'photos',
							'orderby'        => 'date',
							'order'          => 'DESC',
							'author'    => $author,
							'photos_tag'   => $photo_tags,
							'posts_per_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
							'posts_per_archive_page' => xbox_get_field_value('my-theme-options', 'number_albums_per_page'),
							'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1,
							'suppress_filters' => true
						);
                        $count_filter_albums = count(get_posts([
                            'post_type'      => 'photos',
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'photos_tag'   => $photo_tags,
                            'numberposts' => -1,
                            'hidden_empty' => 1,
                            'author'    => $author,
                            'suppress_filters' => true
                        ]));
						break;
				}
				$home_query = new WP_Query($args_query);
                if($home_query->have_posts()) {
	                while ( $home_query->have_posts() ) :  $home_query->the_post();
		                get_template_part( 'template-parts/loop', 'photo' );
	                endwhile;
	                wp_reset_postdata();
	                if($count_filter_albums > xbox_get_field_value('my-theme-options', 'number_albums_per_page')):?>
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
	                albums_page_navi(ceil($count_filter_albums/xbox_get_field_value('my-theme-options', 'number_albums_per_page')));
                }
			?>
            <div class="clear"></div>
            <div class="customizer_content" style="margin-bottom: 0 !important;">
			<?php
			if( get_theme_mod( 'title_desc_photos_pos' ) == 'bottom') {
				if ( get_theme_mod( 'seo_photos_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_photos_title' ); ?>
				<?php endif;?>
					<?php if(get_theme_mod('seo_photos_text')) { echo get_theme_mod('seo_photos_text'); } ?>
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
if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-photos' ) == 'on' ) {
	get_sidebar();
}
get_footer();