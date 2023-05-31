<article id="post-<?php the_ID(); ?>" <?php if(xbox_get_field_value( 'my-theme-options', 'mob-number_videos_per_row' ) == '1') { post_class('thumb-block full-width'); }else{ post_class('thumb-block'); } ?>>
    <a href="<?=get_the_permalink()?>" title="<?php the_title(); ?>">
        <div class="post-thumbnail">
            <?php
            if (get_the_post_thumbnail() != '') {
                $back_img_url = get_the_post_thumbnail_url($post->ID, 'arc_thumb_medium');
            } else {
                $back_img_url = get_template_directory_uri() .'/assets/img/no-album-Image.png';
            } ?>
            <img data-src="<?=$back_img_url?>" alt="<?=get_the_title()?>" src="<?=$back_img_url?>">
        </div>
    </a>
    <header class="entry-header categoryVideoWatchLater" style="padding-bottom: 2px; padding-top:2px">
        <p style="overflow: hidden;text-align: left; width: 100%;padding: 0px 10px;"><?php the_title(); ?></p>
    </header>
</article>