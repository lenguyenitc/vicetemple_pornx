<?php get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-blog' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?> blog_page_div">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <header class="page-header">
                <?php
                $current_tax_cat = get_queried_object()->term_id;
                $current_tax_cat_name = get_queried_object()->name;
                ?>
                <h1 class="widget-title" id="archive_blog_header" style="
                        display: flex;
                        justify-content: space-between;">
                    <span id="desktop_archive_blog_header" style="float: left;"><?php echo __('Category: ','arc') . $current_tax_cat_name;?></span>
                    <span id="mobile_archive_blog_header" style="text-align:center;display: none"><?php echo __('Category ','arc') .'<br>'. $current_tax_cat_name;?></span>
                </h1>
				<?php
				if(xbox_get_field_value( 'my-theme-options', 'categories-desc-position' ) == 'top') { the_archive_description( '<div class="archive-description">', '</div>' ); }
				?>
            </header>
			<?php

            if ( have_posts() ) { ?>
            <div class="row" id="blog_page_container">
				<?php
				/*****display categories****/
				$categories = get_terms( array(
					'taxonomy'      => ['blog_category'],
					'orderby'       => 'name',
					'order'         => 'ASC',
					'hide_empty'    => true,
				));
				if($categories):?>
                    <div style="margin-bottom: 20px;">
                        <div id="blog_cat_header" class="col-1-blog" style="margin-bottom: 3px">Categories</div>
                        <div id="categories_list_content" style="clear: both">
                            <ul id="cat_ul_blog">
                                <?php
                                $args1 = array(
	                                'post_type'     => 'blog',
	                                'post_status'   => 'publish',);
                                $query1 = new WP_Query( $args1);
                                $all_count = (int)$query1->post_count;
                                ?>
                                <li><a href="<?=site_url('blog')?>">All Categories</a>
                                    <span class="count_articles"><?php echo $all_count;?></span></li>
								<?php
								foreach($categories as $cat){
									$args = array(
										'post_type'     => 'blog',
										'post_status'   => 'publish',
										'posts_per_page' => -1,
										'tax_query' => array(
											'relation' => 'AND',
											array(
												'taxonomy' => 'blog_category',
												'field' => 'id',
												'terms' => array($cat->term_id)
											)
										)
									);

									$query = new WP_Query( $args);
									$count = (int)$query->post_count;
									?>
                                    <li <?php echo ($current_tax_cat == $cat->term_id) ? 'class="current_cat_article"' : '';?>>
                                        <a href="<?php echo esc_url(home_url()); ?>/blog-category/<?php echo $cat->slug; ?>/" >
											<?php echo $cat->name; ?>
                                        </a><span class="count_articles"><?php echo $count;?></span>
                                    </li>
									<?php
								}
								?>
                            </ul>
                        </div>
                    </div>
				<?php endif;?>
                <div id="articles_container">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/loop', 'blog' );
					endwhile;
					?>
                </div>
                <div class="clear"></div>
                <div class="separator-pagination"></div>
				<?php
				arc_page_navi();
				} else {
					get_template_part( 'template-parts/content', 'none' );
				} ?>
            </div>
            <?php
			if(xbox_get_field_value( 'my-theme-options', 'categories-desc-position' ) == 'bottom')
			{ the_archive_description( '<div class="archive-description">', '</div>' ); } ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-blog' ) == 'on') {
	get_sidebar();
}
get_footer();