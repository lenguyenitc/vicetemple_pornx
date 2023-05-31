<?php get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-blog' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' )
	{ $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?> blog_page_div">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
			<?php
			if( get_theme_mod( 'title_desc_blog_pos' ) == 'top') {?>
            <div class="customizer_content" style="margin-top: 0!important;margin-bottom: 40px;">
				<?php
                if ( get_theme_mod( 'seo_blog_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_blog_title' ); ?>
				<?php endif;?>
					<?php if(get_theme_mod('seo_blog_text')) { echo get_theme_mod('seo_blog_text'); } ?>
            </div>
			<?php }?>

				<header class="page-header">
                    <h2 class="widget-title" id="archive_blog_header" style="text-align: right;
                        display: flex;
                        justify-content: space-between;">
                        <span style="float: left;"><?php echo __('Blog', 'arc');?></span>
                        <div class="searchFormBlog" style="display: inline-flex;
                            max-width: 300px;
                            width: 100%;">
                            <form method="get" id="searchforblog" action="" style="
                                    width: 100%;
                                    max-width: 260px;
                                    margin-right: 5px;">
                                <input type="text" style="top: -5px;" class="field" name="s" id="searchQueryBlog" placeholder="<?php esc_attr_e('Search', 'arc'); ?>" />
                                <input type="hidden" value="blog" name="search-type" />
                                <input id="blogSearchBtn" disabled="disabled" type="submit" class="button fa-input" value="" style="position: absolute;
                                        right: 0;
                                        top: 0.75em;
                                    "/>
                                <div class="search-btn-icon2" style="
                                        position: absolute;
                                        right: 0.2em;
                                        top: 0.1em;">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3167 14.434L11.0511 10.1684C11.8774 9.14777 12.3749 7.8509 12.3749 6.43843C12.3749 3.16471 9.71114 0.500977 6.43742 0.500977C3.1637 0.500977 0.5 3.16468 0.5 6.4384C0.5 9.71211 3.16373 12.3758 6.43745 12.3758C7.84993 12.3758 9.1468 11.8784 10.1674 11.0521L14.433 15.3177C14.5549 15.4396 14.7149 15.5008 14.8749 15.5008C15.0349 15.5008 15.1949 15.4396 15.3168 15.3177C15.5611 15.0733 15.5611 14.6783 15.3167 14.434ZM6.43745 11.1258C3.85247 11.1258 1.75 9.02338 1.75 6.4384C1.75 3.85341 3.85247 1.75094 6.43745 1.75094C9.02244 1.75094 11.1249 3.85341 11.1249 6.4384C11.1249 9.02338 9.02241 11.1258 6.43745 11.1258Z" fill="white"/>
                                    </svg>
                                </div>
                            </form>
                        </div>
                    </h2>
					<?php
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->
            <?php
            $categories = get_terms( array(
                'taxonomy'      => ['blog_category'],
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => true,
            ));
            if(!$categories) $blog_width = 'width: 100%';
            else $blog_width = 'width: 100%';
            ?>
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
                                            <li>
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
                    <div id="articles_container" style="<?=$blog_width?>">
                        <?php
                        /* Start the Loop */
                        if(have_posts()):
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/loop', 'blog' );
                        endwhile;
                        else: echo '<p>There are no blog posts to display.</p>';
                        endif;
                        ?>
                    </div>
                    <div class="clear"></div>
                    <div class="separator-pagination"></div>
                        <?php
                        arc_page_navi();
                      ?>
                </div>
            <div class="clear"></div>
			<?php
			if( get_theme_mod( 'title_desc_blog_pos' ) == 'bottom') {?>
            <div class="customizer_content" style="margin-bottom: 0 !important;">
				<?php
                if ( get_theme_mod( 'seo_blog_title' ) !== '' ) : ?>
                    <?php echo get_theme_mod( 'seo_blog_title' ); ?>
				<?php endif;?>
					<?php if(get_theme_mod('seo_blog_text')) { echo get_theme_mod('seo_blog_text'); } ?>
			<?php } ?>
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