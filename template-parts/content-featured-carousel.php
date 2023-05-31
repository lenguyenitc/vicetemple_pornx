<?php
if (wp_is_mobile() && xbox_get_field_value('my-theme-options', 'show-carousel-on-mobile') == 'off') {
	return; } ?>
<?php if(is_home() && xbox_get_field_value('my-theme-options', 'show-carousel-of-videos') == 'on') : ?>
	<?php $the_query = new WP_Query(array(
                'posts_per_page' 	=> xbox_get_field_value('my-theme-options', 'videos-amount'),
                'meta_key'			=> 'featured_video',
                'meta_value'		=> 'on'
            )); ?>
	<?php if ($the_query->have_posts()) : ?>
		<div class="featured-carousel">
			<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<?php $trailer_url = get_post_meta($post->ID, 'trailer_url', true);
				$thumb_url = get_post_meta($post->ID, 'thumb', true); ?>
                    <div class="slide">
	                    <?php if($trailer_url != '' && !wp_is_mobile() && $trailer_url !== false && $trailer_url !== 'false' && $trailer_url !== 'http://false' && $trailer_url !== 'https://false') : ?>
		                    <?php
		                    if (get_the_post_thumbnail() != '') {
			                    $poster_url = get_the_post_thumbnail_url($post->ID, xbox_get_field_value('my-theme-options', 'thumb_quality'));
		                    }elseif($thumb_url != ''){
			                    $poster_url = $thumb_url;
		                    }
		                    ?>
                            <a class="<?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>thumbs-rotation<?php endif; ?>"
                               <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>data-thumbs='<?php echo arc_get_multithumbs($post->ID);?>'<?php endif; ?> href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <div class="background-slide-main"></div>
                                <div class="background-slide-hover"></div>
			                    <?php $thumb_url = get_post_meta($post->ID, 'thumb', true);
			                    if ( get_the_post_thumbnail() != '' ) {
				                    if( wp_is_mobile() ){
					                    echo '<img alt="' . get_the_title() . '" src="' . get_the_post_thumbnail_url($post->ID, 'arc_thumb_medium') . '" title="' . get_the_title() . '">';
				                    }else{
					                    echo '<img alt="' . get_the_title() . '" data-src="' . get_the_post_thumbnail_url($post->ID, 'arc_thumb_medium') . '" src="' . get_template_directory_uri() . '/assets/img/px.gif" title="' . get_the_title() . '">';
				                    }
			                    }elseif( $thumb_url != '' ){
				                    echo '<img data-src="' . $thumb_url . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
			                    }else{
				                    echo '<div class="no-thumb"><span><i class="fa fa-image"></i> ' . esc_html__('No image', 'arc') . '</span></div>';
			                    } ?>
			                    <?php if(get_post_meta($post->ID, 'hd_video', true) == 'on') : ?><span class="hd-video">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="">
                                    <rect x="1.5" y="4.5" width="27" height="21" fill="white"/>
                                    <path d="M28.8095 3.47412H1.19055C0.533001 3.47412 0 4.00723 0 4.66467V25.3356C0 25.9931 0.533001 26.5262 1.19055 26.5262H28.8096C29.467 26.5262 30.0001 25.9932 30.0001 25.3356V4.66467C30 4.00723 29.4669 3.47412 28.8095 3.47412ZM10.7554 19.6511L11.7878 16.0365H7.93466L6.90183 19.6511H4.53687L7.19402 10.3492H9.5596L8.46621 14.1763H12.3192L13.4126 10.3492H15.7784L13.1206 19.6511H10.7554ZM25.2527 15.0002C24.4668 17.7507 21.8773 19.6511 18.8876 19.6511H14.9812L16.7368 13.5055H19.1017L17.8855 17.7637H19.5729C21.0214 17.7637 22.3767 16.6477 22.8435 15.0137C23.3143 13.3657 22.5474 12.2364 21.0458 12.2364H17.0989L17.6381 10.3492H21.638C24.5614 10.3492 26.0418 12.2364 25.2527 15.0002Z" fill="#172030"/>
                                    </g>
                                    <defs>
                                    <clipPath >
                                    <rect width="30" height="30" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                </span><?php endif; ?></a>
	                    <?php else : ?>
                            <a class="<?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>thumbs-rotation<?php endif; ?>"
		                       <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>data-thumbs='<?php echo arc_get_multithumbs($post->ID);?>'<?php endif; ?> href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <div class="background-slide-main"></div>
                                <div class="background-slide-hover"></div>
			                    <?php $thumb_url = get_post_meta($post->ID, 'thumb', true);
			                    if ( get_the_post_thumbnail() != '' ) {
				                    if( wp_is_mobile() ){
					                    echo '<img alt="' . get_the_title() . '" src="' . get_the_post_thumbnail_url($post->ID, 'arc_thumb_medium') . '" title="' . get_the_title() . '">';
				                    }else{
					                    echo '<img alt="' . get_the_title() . '" data-src="' . get_the_post_thumbnail_url($post->ID, 'arc_thumb_medium') . '" src="' . get_template_directory_uri() . '/assets/img/px.gif" title="' . get_the_title() . '">';
				                    }
			                    }elseif( $thumb_url != '' ){
				                    echo '<img data-src="' . $thumb_url . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
			                    }else{
				                    echo '<div class="no-thumb"><span><i class="fa fa-image"></i> ' . esc_html__('No image', 'arc') . '</span></div>';
			                    } ?>
			                    <?php if(get_post_meta($post->ID, 'hd_video', true) == 'on') : ?><span class="hd-video">
                                    <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="">
                                    <rect x="1.5" y="4.5" width="27" height="21" fill="white"/>
                                    <path d="M28.8095 3.47412H1.19055C0.533001 3.47412 0 4.00723 0 4.66467V25.3356C0 25.9931 0.533001 26.5262 1.19055 26.5262H28.8096C29.467 26.5262 30.0001 25.9932 30.0001 25.3356V4.66467C30 4.00723 29.4669 3.47412 28.8095 3.47412ZM10.7554 19.6511L11.7878 16.0365H7.93466L6.90183 19.6511H4.53687L7.19402 10.3492H9.5596L8.46621 14.1763H12.3192L13.4126 10.3492H15.7784L13.1206 19.6511H10.7554ZM25.2527 15.0002C24.4668 17.7507 21.8773 19.6511 18.8876 19.6511H14.9812L16.7368 13.5055H19.1017L17.8855 17.7637H19.5729C21.0214 17.7637 22.3767 16.6477 22.8435 15.0137C23.3143 13.3657 22.5474 12.2364 21.0458 12.2364H17.0989L17.6381 10.3492H21.638C24.5614 10.3492 26.0418 12.2364 25.2527 15.0002Z" fill="#172030"/>
                                    </g>
                                    <defs>
                                    <clipPath >
                                    <rect width="30" height="30" fill="white"/>
                                    </clipPath>
                                    </defs>
                                    </svg>
                                </span><?php endif; ?></a>
	                    <?php endif; ?>
                    </div>				<!-- .slide -->
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.featured-carousel').bxSlider({
                    slideWidth: 330, //4
                    adaptiveHeight: true,
                    maxSlides: <?php if(xbox_get_field_value('my-theme-options', 'videos-amount') !== false) { echo (int)xbox_get_field_value('my-theme-options', 'videos-amount');} else { echo 40;} ?>,
                    randomStart: true,
                    moveSlides: 1,
                    pager: false,
					<?php if(xbox_get_field_value( 'my-theme-options', 'show-video-title' ) == 'on') : ?>
                    captions: true,
					<?php endif; ?>
					<?php if(xbox_get_field_value( 'my-theme-options', 'autoplay' ) == 'on') : ?>
                    auto: true,
                    pause: 2000,
                    autoHover: true,
					<?php endif; ?>
                    prevText: '<svg width="15" height="29" viewBox="0 0 15 29" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.686999 15.2003C0.305468 14.8114 0.305468 14.1886 0.686998 13.7997L13.1538 1.09158C13.781 0.4523 14.8677 0.896343 14.8677 1.79188L14.8677 27.2081C14.8677 28.1037 13.781 28.5477 13.1538 27.9084L0.686999 15.2003Z" fill="white" fill-opacity="0.5"/></svg>',
                    nextText: '<svg width="15" height="29" viewBox="0 0 15 29" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.313 15.2003C14.6945 14.8114 14.6945 14.1886 14.313 13.7997L1.84619 1.09158C1.21905 0.4523 0.132335 0.896343 0.132335 1.79188L0.132334 27.2081C0.132334 28.1037 1.21905 28.5477 1.84619 27.9084L14.313 15.2003Z" fill="white" fill-opacity="0.5"/></svg>',
                    onSliderLoad: function(){
                        jQuery(".featured-carousel").css("visibility", "visible");
                    }
                });
            });
		</script>
	<?php endif; ?>
<?php endif; ?>