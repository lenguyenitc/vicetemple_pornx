<article class="blog-article" id="post-<?php the_ID(); ?>">
    <?php
        if (get_the_post_thumbnail() != '') {
	        $back_img_url = get_the_post_thumbnail_url($post->ID, 'arc_thumb_medium');
        } else {
	        $back_img_url = get_template_directory_uri() .'/assets/img/no-album-Image.png';
        }
    ?>
	<div class="article_image" style="background-image: url(<?=$back_img_url;?>) !important;">
	</div>
	<div class="article_content" style="width: 100%">
		<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php echo apply_filters( 'the_content', wp_trim_words( strip_tags( $post->post_content ), 20 ) ); ?>
		<div class="entry-meta">
			<?php arc_posted_on();	?> <?php echo esc_html__('in', 'arc'); ?> <?php echo get_the_term_list( $post->ID, 'blog_category', '', ', ' ); ?>
            <span class="read_more"><a href="<?=get_the_permalink()?>">More</a></span>
		</div><!-- .entry-meta -->
	</div>
</article><!-- #post-## -->