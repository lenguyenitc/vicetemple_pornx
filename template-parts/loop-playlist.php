<article <?php post_class('thumb-block'); ?> data-list="<?php echo $playlist['term_id']; ?>">
	<a href="<?php echo esc_url(home_url()); ?>?playlists=<?php echo $playlist['slug']; ?>" title="<?php echo $playlist['name']; ?>">
		<!-- Thumbnail -->
		<div class="post-thumbnail">
			<?php
			$image = get_term_meta($playlist['term_id'], 'playlist-image', true);
			echo '<img src="' . get_template_directory_uri() . '/assets/img/px.gif" data-src="' . $image . '">';?>
			<?php if( !wp_is_mobile() ) : ?><div class="play-icon-hover"><i class="fa fa-eye"></i></div><?php endif; ?>
		</div>
		<div class="rating-bar no-rate">
			<span><?php echo $playlist['name']; ?></span>
		</div><!-- .entry-header -->
	</a>
</article><!-- #post-## -->
