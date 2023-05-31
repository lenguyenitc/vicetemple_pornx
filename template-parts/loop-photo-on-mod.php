<?php
$post = get_post($post->ID);
$post_blocks = parse_blocks($post->post_content);
foreach ( $post_blocks as $block ) {
    if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
        $blocks = array_map( function ( $image_id ) {
            return wp_get_attachment_image_url( $image_id, 'full' );
        }, $block['attrs']['ids'] );
    }
}
$photos_list = get_post_gallery_images($post->ID);
$photos_count = count($blocks);
if($photos_count === 0){
    $photos_count = 1;
} ?>
<article id="post-<?php the_ID(); ?>" <?php if(xbox_get_field_value( 'my-theme-options', 'mob-number_videos_per_row' ) == '1')
{ post_class('thumb-block full-width album'); }else{ post_class('thumb-block album'); } ?>>
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php
        if(get_the_post_thumbnail() != '') {
            $back_img_url = get_the_post_thumbnail_url($post->ID, xbox_get_field_value( 'my-theme-options', 'album_thumb_quality' ));
        }
        elseif(count($blocks) != 0){
            $back_img_url = $blocks[0];
        }
        else{
            $back_img_url = get_template_directory_uri() .'/assets/img/no-album-Image.png';
        }
        ?>
        <div class="post-thumbnail" style="height: 291px;border-radius: 4px 4px 0  0;background-image: url(<?=$back_img_url;?>) !important;" >
            <div class="photos-count <?=(get_post_meta($post->ID, 'admin-gallery-type', true) == 'on') ? 'gif-mark' : 'image-mark';?>">
                <span class="photo-count-span"><?php echo $photos_count; ?> <?=(get_post_meta($post->ID, 'admin-gallery-type', true) == 'on') ? (($photos_count == 1) ? 'gif' : 'gifs' ) : (($photos_count == 1) ? 'photo' : 'photos');?></span>
            </div>
        </div>
        <header class="entry-header photos-entry-header" style="padding-top: 0 !important; padding-bottom: 0 !important;">
            <p style="text-align: left; width: 100%;" class="photo-title"><?php the_title(); ?></p>
        </header>
    </a>
</article>