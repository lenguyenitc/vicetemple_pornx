<div class="under-video-block">
	<?php if ( is_active_sidebar( 'under_video' ) && is_single() ) :
		dynamic_sidebar( 'under_video' ); ?>
	<?php else : ?>
		<?php
		$related = get_posts( array(
				'category__in' => wp_get_post_categories($post->ID),
				'numberposts' => xbox_get_field_value( 'my-theme-options', 'related-videos-settings' ),
				'post__not_in' => array($post->ID)
			)
		); ?>
		<?php if ($related) : ?>
			<div style="align-items: flex-end;display: flex;justify-content: space-between;border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>!important;padding-bottom: 20px;
                    margin-bottom: 30px;">
                <h2 class="widget-title" style="padding-bottom: 0px;
    margin-bottom: 0px;border-bottom: none !important;"><?php echo esc_html__( 'Related videos', 'arc' ); ?></h2>
				<?php wp_reset_postdata();
				$category = get_the_category($post->ID); ?>
                <div class="show-more-related">
                    <a class="button" style="white-space:nowrap" href="<?php echo get_category_link($category[0]->term_id); ?>">
						<?php echo esc_html__('Show more', 'arc'); ?></a>
                </div>
            </div>
            <div class="videos-list">
				<?php
				if( $related ) foreach( $related as $post ) {
					setup_postdata($post);
					get_template_part( 'template-parts/loop', 'video' );
				}
				wp_reset_postdata();
				?>
			</div>
			<div class="clear"></div>
		<?php endif; ?>
	<?php endif; ?>
</div>
<div class="clear"></div>