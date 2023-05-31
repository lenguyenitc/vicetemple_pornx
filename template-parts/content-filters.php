<?php if(!is_single() && !is_page()) : ?>
	<div id="filters">
		<div class="filters-select general-select"><?php echo arc_get_filter_title(); ?><?php /*if( !wp_is_mobile() ) : */?><!--<?php /*echo arc_get_filter_title(); */?><?php /*else : */?><i class="fa fa-filter"></i>
			--><?php /*endif; */?>
			<div class="filters-options general">
				<?php $paged = get_query_var( 'paged', 1 ); ?>
				<?php if( $paged === 0 ) : ?>
                    <span><a class="<?php echo arc_selected_filter('random'); ?>" href="<?php echo add_query_arg('filter', 'random'); ?>">
							<?php echo esc_html__('Random videos', 'arc'); ?></a></span>
                    <span><a class="<?php echo arc_selected_filter('featured'); ?>" href="<?php echo add_query_arg('filter', 'featured'); ?>">
							<?php echo esc_html__('Featured videos', 'arc'); ?></a></span>
					<span><a class="<?php echo arc_selected_filter('latest'); ?>" href="<?php echo add_query_arg('filter', 'latest'); ?>">
							<?php echo esc_html__('Latest videos', 'arc'); ?></a></span>
					<?php if( xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on' ) : ?><span>
						<a class="<?php echo arc_selected_filter('most-viewed'); ?>" href="<?php echo add_query_arg('filter', 'most-viewed'); ?>">
							<?php echo esc_html__('Most viewed videos', 'arc'); ?></a></span><?php endif; ?>
                    <span><a class="<?php echo arc_selected_filter('popular'); ?>" href="<?php echo add_query_arg('filter', 'popular');?>">
							<?php echo esc_html__('Popular videos', 'arc'); ?></a></span>
					<?php if( xbox_get_field_value( 'my-theme-options', 'enable_duration' ) == 'on' ) : ?><span>
						<a class="<?php echo arc_selected_filter('longest'); ?>" href="<?php echo add_query_arg('filter', 'longest'); ?>">
							<?php echo esc_html__('Longest videos', 'arc'); ?></a></span><?php endif; ?>
					<?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?><span>
						<a class="<?php echo arc_selected_filter('all'); ?>" href="<?php echo add_query_arg('filter', 'all'); ?>">
							<?php echo esc_html__('All videos', 'arc'); ?></a></span><?php endif; ?>
				<?php else: ?>
                    <span><a class="<?php echo arc_selected_filter('random'); ?>" href="<?php echo arc_get_nopaging_url(); ?>?filter=random">
							<?php echo esc_html__('Random videos', 'arc'); ?></a></span>
                    <span><a class="<?php echo arc_selected_filter('featured'); ?>" href="<?php echo arc_get_nopaging_url(); ?>?filter=featured">
							<?php echo esc_html__('Featured videos', 'arc'); ?></a></span>
					<span><a class="<?php echo arc_selected_filter('latest'); ?>" href="<?php echo arc_get_nopaging_url(); ?>?filter=latest">
							<?php echo esc_html__('Latest videos', 'arc'); ?></a></span>
					<?php if( xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on' ) : ?><span>
						<a class="<?php echo arc_selected_filter('most-viewed'); ?>" href="<?php echo arc_get_nopaging_url(); ?>?filter=most-viewed">
							<?php echo esc_html__('Most viewed videos', 'arc'); ?></a></span><?php endif; ?>
                    <span><a class="<?php echo arc_selected_filter('popular'); ?>" href="<?php echo arc_get_nopaging_url(); ?>?filter=popular">
							<?php echo esc_html__('Popular videos', 'arc'); ?></a></span>
					<?php if( xbox_get_field_value( 'my-theme-options', 'enable_duration' ) == 'on' ) : ?><span>
						<a class="<?php echo arc_selected_filter('longest'); ?>" href="<?php echo arc_get_nopaging_url(); ?>?filter=longest">
							<?php echo esc_html__('Longest videos', 'arc'); ?></a></span><?php endif; ?>
					<?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?><span>
						<a class="<?php echo arc_selected_filter('all'); ?>" href="<?php echo arc_get_nopaging_url(); ?>?filter=all">
							<?php echo esc_html__('All videos', 'arc'); ?></a></span><?php endif; ?>
				<?php endif; ?>
			</div>
            <span class="filter-angle">
                <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.83927 5.68659C6.64771 5.86356 6.35229 5.86355 6.16072 5.68659L0.943664 0.867275C0.609395 0.55849 0.827875 -1.15154e-06 1.28294 -1.11176e-06L11.7171 -1.99581e-07C12.1721 -1.59798e-07 12.3906 0.558491 12.0563 0.867276L6.83927 5.68659Z" fill="white"></path>
                </svg>
            </span>
		</div>
	</div>
<?php endif; ?>
