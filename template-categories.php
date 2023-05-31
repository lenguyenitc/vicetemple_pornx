<?php
/**
 * Template Name: Categories
 **/
get_header(); ?>
<?php
$sidebar_pos = '';
if( 'on' === xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-content' ) ) {
    if ( 'right' === xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) ) {
        $sidebar_pos = 'with-sidebar-right';
    } else {
        $sidebar_pos = 'with-sidebar-left';
    }
}
?>
<?php
// get_query_var to get page id from url.
$page = ( get_query_var( 'paged' ) ) ? (int) get_query_var( 'paged' ) : 1;
// number of categories to show per-page.
$per_page = xbox_get_field_value( 'my-theme-options', 'number-categ-per-page' ) ? (int) xbox_get_field_value( 'my-theme-options', 'number-categ-per-page' ) : 20;
// category thumb quality
$catThumbQuality = xbox_get_field_value( 'my-theme-options', 'categories-thumb-quality' );
// count total number of terms related to passed taxonomy.
$categories       = get_terms( 'category' );
$number_of_series = is_array( $categories ) ? count( $categories ) : 0;
$offset           = ( $page - 1 ) * $per_page;
if($number_of_series > $per_page):?>
<style>
    div.customizer_content {
        margin-top: 0px !important;
    }
</style>
<?php else:?>
    <style>
        div.customizer_content {
            margin-top: 40px !important;
        }
    </style>
<?php endif;?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?> categories-list">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
			<?php
			if( get_theme_mod( 'title_desc_categ_pos' ) == 'topCat') {?>
            <div class="customizer_content" style="margin-top: 0!important;margin-bottom: 40px;">
				<?php
                if ( get_theme_mod( 'seo_cat_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_cat_title' ); ?>
				<?php endif;?>
                <?php if(get_theme_mod('seo_cat_text')) { echo get_theme_mod('seo_cat_text'); } ?>
            </div>
			<?php } ?>
            <?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<header class="entry-header">
						<?php the_title( '<h2 class="widget-title categories-title">', '</h2>' ); ?>
					</header>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			<div class="videos-list">
				<?php
				$terms = get_terms(
					array(
						'taxonomy'   => 'category',
						'hide_empty' => true,
						'number'     => $per_page,
						'offset'     => $offset,
					)
				);
				$count = is_array( $terms ) ? count( $terms ) : 0;
				if ( $count > 0 ) :
					foreach ( $terms as $term ) {
						$args = array(
							'post_type'      => 'post',
							'posts_per_page' => 1,
							'show_count'     => 1,
							'orderby'        => 'title',
							'post_status'    => 'publish',
							'tax_query'      => array(
								array(
									'taxonomy' => 'category',
									'field'    => 'slug',
									'terms'    => $term->slug,
								),
							),
						);
						$video_from_category = new WP_Query( $args );
						if ( $video_from_category->have_posts() ) {
							$video_from_category->the_post();
						}
						$term->slug;
						$term->name;
						?>
						<?php
						$user = wp_get_current_user();
						if(get_term_meta($term->term_id, 'category-premium-id', true ) == 'on') {
							if(!is_user_logged_in()) {
								$permalink  = '#';
								$data_toggle="modal"; $data_target="#subscribeModal";
							} else {
							    $permalink  = get_category_link( get_cat_ID( $term->name ) );
							    $data_toggle=""; $data_target="";
							}
						} else {
							$permalink  = get_category_link( get_cat_ID( $term->name ) );
							$data_toggle=""; $data_target="";
						}
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('thumb-block category-block'); ?>>
							<a href="<?php echo $permalink; ?>" title="<?php echo $term->name; ?>" data-toggle="<?php echo $data_toggle;?>" data-target="<?php echo $data_target;?>">
								<!-- Thumbnail -->
                                <style>
                                    div.post-thumbnail {
                                        border-radius: 4px;
                                    }
                                    div.post-thumbnail img {
                                        border-radius: 4px;
                                    }
                                    article.thumb-block.category-block div.post-thumbnail {
                                        height: 204px;
                                        background-repeat: no-repeat;
                                        background-size: cover;
                                        object-fit: fill;
                                        background-position: top center;
                                    }
                                </style>
								<?php
								$thumb_url = get_post_meta($post->ID, 'thumb', true);
								//echo $thumb_url;
								$image_id = get_term_meta($term->term_id, 'category-image-id', true );
								$back_img_url = wp_get_attachment_image_url($image_id, $catThumbQuality);
								$response = wp_remote_get($thumb_url);
                                $code = wp_remote_retrieve_response_code( $response );
								if($image_id) {
									$response2 = wp_remote_get($back_img_url);
									$code2 = wp_remote_retrieve_response_code( $response2 );
                                    if ($code2 != 200) {
                                        $back_img_url = get_template_directory_uri() .'/assets/img/no-cat-image.png';
                                    } else {
	                                    $back_img_url = wp_get_attachment_image_url($image_id, $catThumbQuality);
                                    }
								} elseif ($thumb_url) {
									//$back_img_url = get_the_post_thumbnail_url($post->ID, 'full');
									//$back_img_url = get_the_post_thumbnail_url($post->ID, 'full');
									$response2 = wp_remote_get($thumb_url);
									$code2 = wp_remote_retrieve_response_code( $response2 );
									//echo $code2;
									if ($code2 != 200) {
										$back_img_url = get_template_directory_uri() .'/assets/img/no-cat-image.png';
									} else {
										$back_img_url = $thumb_url;
									}
								} elseif (!has_post_thumbnail() && $image_id === false || $thumb_url === false) {
									$back_img_url = get_template_directory_uri() .'/assets/img/no-cat-image.png';
								} elseif (!has_post_thumbnail() && $thumb_url) {
									$back_img_url = $thumb_url;
									$response2 = wp_remote_get($back_img_url);
									$code2 = wp_remote_retrieve_response_code( $response2 );
									//echo $code2;
									if ($code2 != 200) {
										$back_img_url = get_template_directory_uri() .'/assets/img/no-cat-image.png';
									} else {
										$back_img_url = $thumb_url;
									}
								} elseif ($code != 200) {
									$back_img_url = get_template_directory_uri() .'/assets/img/no-cat-image.png';
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
								<div class="post-thumbnail" style="background-image: url('<?php echo $back_img_url?>')" >
                                    <header class="entry-header categories-entry-header" style="display: inline-flex;
    justify-content: space-between;
    align-items: center;">
                                        <span style="float: left;" class="cat-title"><?php echo $term->name; ?></span>
                                        <span style="float: right;" class="cat-video-count"><?php echo get_category($term->term_id)->category_count;?><span><?=(get_category($term->term_id)->category_count == 1) ? ' video': ' videos';?></span></span>
                                    </header>
								</div>

							</a>
						</article>
						<?php
					}?>
                <?php if($number_of_series > $per_page):?>
                    <div class="clear"></div>
                    <div class="separator-pagination"></div>
                <?php endif;?>
					<?php arc_cat_navi(ceil( (int) $number_of_series / (int) $per_page ), $per_page);
				endif;
				?>

			</div>
            <div class="clear"></div>
            <div class="customizer_content">
			<?php
            if( get_theme_mod( 'title_desc_categ_pos' ) == 'bottomCat') {
				if ( get_theme_mod( 'seo_cat_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_cat_title' ); ?>
				<?php endif;?>
                <?php if(get_theme_mod('seo_cat_text')) { echo get_theme_mod('seo_cat_text'); } ?>
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
get_sidebar();
get_footer();