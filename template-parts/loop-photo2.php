<?php
//for display all photos from galleries
while(have_posts()) {
	the_post();
	$galleries = get_posts([
		'hide_empty' => 1,
		'post_type' => 'photos',
		'orderby'     => 'date',
		'order'       => 'ASC',
	]);
}
foreach($galleries as $gallery) {
	$all_photos = get_post($gallery->ID);
	$post_blocks = parse_blocks($all_photos->post_content);
	foreach ($post_blocks as $block) {
		if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
			$blocks[] = array_map( function ( $image_id ) {
				return $image_id . 'MY_SEP' . wp_get_attachment_image_url( $image_id, 'full' );
			}, $block['attrs']['ids'] );
		}
	}
}
$photos_count = count($blocks);
if($photos_count === 0){
	$photos_count = 1;
} ?>
<article>
	<div class="entry-content photo-content">
        <!--<div class="loading-photos"><?php /*echo esc_html__('Loading photos', 'arc'); */?>... (<span></span>)</div>-->
		<figure class="wp-block-gallery columns-3 is-cropped" style="opacity: 100%; margin-top: 0">
			<ul class="blocks-gallery-grid">
			<?php foreach ($blocks as $block) {
				foreach ($block as $img) {
					$clear_img = explode('MY_SEP', $img)[1];
					$urlID = explode('MY_SEP', $img)[0]
				?>
				<li class="blocks-gallery-item">
					<figure>
						<a href="<?php echo $clear_img?>" data-type="image" data-fancybox="gallery">
							<img loading="lazy"
                                 data-src="<?php echo $clear_img?>"
                                 src="<?php echo $clear_img?>"
                                 data-id="<?php echo $urlID;?>"
                                 class="wp-image-<?php echo $urlID;?> fancybox-zoom"
                                 data-full-url="<?php echo $clear_img?>"
                                 data-link="<?php echo get_attachment_link($urlID);?>"
                                 srcset="<?php echo wp_get_attachment_image_srcset($urlID, 'full' ) ?>"
                                 sizes="<?php echo wp_get_attachment_image_sizes($urlID, 'full' ) ?>"
                            />
						</a>
					</figure>
				</li>
			<?php
				}
			}?></ul>
		</figure>
	</div><!-- .entry-content -->
</article><!-- #post-## -->