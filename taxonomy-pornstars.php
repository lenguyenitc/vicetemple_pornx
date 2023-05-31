<?php get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-actors' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; }
	else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <header class="page-header">
				<?php
				echo '<h1 class="widget-title actor-title">'.str_replace('Pornstar: ', '', get_the_archive_title()). '</h1>';

				if(xbox_get_field_value( 'my-theme-options', 'actors-desc-position' ) == 'top') : ?><div class="clear"></div>
					<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?><?php endif; ?>
            </header>
            <?php
            $page = ( get_query_var( 'paged' ) ) ? (int) get_query_var( 'paged' ) : 1;
            if ( have_posts() ): ?>
				<div class="videos-list">
					<?php
					$termID = get_queried_object_id();
					$count_key = 'actors_views_count';
					$count = get_term_meta($termID, $count_key, true);
					if($count == ''){
						$count = 0;
						delete_term_meta($termID, $count_key);
						add_term_meta($termID, $count_key, '1');
					}else{
						$count++;
						update_term_meta($termID, $count_key, $count);
					}
                    $args_count = array(
                        'post_type'     => 'post',
                        'post_status'   => 'publish',
                        'numberposts' => -1,
                        'hidden_empty' => 1,
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'pornstars',
                                'field' => 'id',
                                'terms' => $termID
                            )
                        ),
                    );
                    $query_count = new WP_Query($args_count);
                    $count_videos = (int)$query_count->post_count;

					$args = array(
						'post_type'     => 'post',
						'post_status'   => 'publish',
						'posts_per_page' => xbox_get_field_value( 'my-theme-options', 'number-video-per-actors-page' ),
                        'paged' => $page,
						'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'pornstars',
								'field' => 'term_id',
								'terms' => $termID
							)
						),
					);
					$query2 = new WP_Query( $args);

					while ( $query2->have_posts() ) : $query2->the_post();
						get_template_part( 'template-parts/loop', 'video' );
					endwhile; ?>
				</div>
            <?php
                wp_reset_postdata();
                if($count_videos > xbox_get_field_value( 'my-theme-options', 'number-video-per-actors-page' )):?>
                <div class="clear"></div>
                <div class="separator-pagination"></div>
				<?php albums_page_navi(ceil($count_videos/xbox_get_field_value( 'my-theme-options', 'number-video-per-actors-page' )));?>
                <?php endif;?>
                <br>
                <br>
                <br>
				 <div class="clearfix"></div>
				<?php
			 else :?>
                <div class="videos-list">
                    <p><?php echo __('No pornstar has been created yet.', 'arc');?></p>
                </div>
			<?php endif; ?>

            <?php if(xbox_get_field_value( 'my-theme-options', 'actors-desc-position' ) == 'bottom') : ?><div class="clear"></div>
            <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?><?php endif; ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-actors' ) == 'on' ) {
	get_sidebar();
}
get_footer();