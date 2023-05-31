<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <div style="display: flex;flex-wrap: wrap;justify-content: space-between;border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;padding-bottom: 20px;margin-bottom: 40px;align-items:center;">
            <div>
                <h1 class="widget-title h1_photo_title" style="border-bottom: none !important;padding-bottom: 0;margin-bottom:0"><?php the_title();?></h1>
            </div>
            <div class="author_info" style="display: inline-flex;flex-direction: row-reverse;align-items: center;">
		        <?php if($post->post_author == get_current_user_id()) : ?>
			        <?php if(!post_password_required()):?>
                        <div style="white-space: nowrap;margin: 20px; margin-bottom: 0px; margin-top: 0px;"><a id="btn_delete_album" style="float:right; cursor:pointer;" data-gallery_id="<?=$post->ID?>">Delete album</a>
                            <a class="btn_upload_to_album" style="float:right; cursor:pointer;margin-right: 10px">Add images</a></div>
			        <?php endif;?>
		        <?php endif;?>
		        <?php
		        /** Algoritm for date "ago" [start] **/
		        $amount_of_elapsed_time = '';
		        $start = get_the_date('Y-m-d H:i:s');
		        $startTime = new Datetime($start);
		        $endTime = new DateTime();
		        $diff = $endTime->diff($startTime);
		        if ($diff->format('%y') !== '0')
		        {
			        $y = true;
			        if ($diff->format('%y') === '1') {
				        $amount_of_elapsed_time = $diff->format('%y') . ' year ago ';
			        } else {
				        $amount_of_elapsed_time = $diff->format('%y') . ' years ago ';
			        }
		        }
		        if ($diff->format('%m') !== '0')
		        {
			        if ($amount_of_elapsed_time != '') {
				        $amount_of_elapsed_time = str_replace('ago', 'and', $amount_of_elapsed_time);
				        $m = true;
				        if ($diff->format('%m') === '1') {
					        $amount_of_elapsed_time .= $diff->format('%m') . ' month ago';
				        } else {
					        $amount_of_elapsed_time .= $diff->format('%m') . ' months ago';
				        }
			        } else {
				        $m = true;
				        if ($diff->format('%m') === '1') {
					        $amount_of_elapsed_time .= $diff->format('%m') . ' month ago';
				        } else {
					        $amount_of_elapsed_time .= $diff->format('%m') . ' months ago';
				        }
			        }
		        }

		        if ($y == false && $m == false)
		        {
			        if ($diff->format('%d') !== '0') {
				        if ($diff->format('%d') === '1') {
					        $amount_of_elapsed_time = $diff->format('%d') . ' day ago';
				        } else {
					        $amount_of_elapsed_time = $diff->format('%d') . ' days ago';
				        }
				        $stop = true;
			        }
			        if ($diff->format('%h') !== '0' && $stop !== true) {
				        if ($diff->format('%h') === '1') {
					        $amount_of_elapsed_time = $diff->format('%h') . ' hour ago' ;
				        } else {
					        $amount_of_elapsed_time = $diff->format('%h') . ' hours ago';
				        }
				        $stop = true;
			        }
			        if ($diff->format('%i') !== '0' && $stop !== true) {
				        if ($diff->format('%i') === '1') {
					        $amount_of_elapsed_time = $diff->format('%i') . ' minute ago';
				        } else {
					        $amount_of_elapsed_time = $diff->format('%i') . ' minutes ago';
				        }
				        $stop = true;
			        }
			        if ($diff->format('%s') !== '0' && $stop !== true) {
				        if ($diff->format('%s') === '1') {
					        $amount_of_elapsed_time = $diff->format('%s') . ' second ago' ;
				        } else {
					        $amount_of_elapsed_time = $diff->format('%s') . ' seconds ago' ;
				        }
			        }
			        $stop = true;
		        }
		        /** Algoritm for date "ago" [end]**/
		        ?>
                <span class="span_time_upload" style="white-space: nowrap;"><?php echo $amount_of_elapsed_time;?></span>
                <span class="span_author" style="margin: 40px; margin-bottom: 0px; margin-top: 0px; white-space: nowrap;">Uploaded by <a href="<?php echo site_url() . '/public-profile/?xxx=' . get_post($post->ID, ARRAY_A)['post_author'];?>">
                        <?php echo get_userdata(get_post($post->ID, ARRAY_A)['post_author'])->display_name;?></a>
                </span>
            </div>
        </div>
	</header>
	<?php if($post->post_author == get_current_user_id()):?>
        <form style="margin-left: 5px;
                    clear:both;
                    display: none;" enctype="multipart/form-data" method="POST" class="upload_to_album_form">
            <script>
                jQuery(document).ready(function($) {
                    $(document).on('click', '#video_file_upload #btn', () => {
                        $('.upload_to_album_form input[type="file"]').trigger('click');
                    });
                    $('.upload_to_album_form input[type="file"]').on('change', function (event, files, label) {
                        var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '');
                        //console.log(event);
                        if(this.files.length > 1) $('div#upload_text p').text('Upload ' + this.files.length + ' files');
                        else $('div#upload_text p').text(file_name);
                    });
                });
            </script>
            <fieldset class="fieldset" id="add_images_fieldset">
                <div id="video_file_upload">
                    <div id="btn">+ Select a file</div>
                    <div id="upload_text" class="upload_text_desktop">
                        <p>Upload to album "<?=$post->post_title?>"</p>
                        <span><?php echo esc_html__('Accept: .jpg, .jpeg, .png, .gif', 'arc') ?></span>
                    </div>
                </div>
				<?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
                <input style="display:none" type="file" name="userfile[]" multiple="multiple" accept="image/jpeg, image/jpg, image/png" id="array_photos"/>
				<?php echo apply_filters('update_button', '<button name="submit_photo" style="max-height: 38px;white-space: nowrap;" value="submit_photo" class="button button-primary" type="submit">' . __('Add images', 'arc') . '</button>', 'submit_photos' ); ?>
                <div id="upload_text" class="upload_text_mobile" style="display:none">
                    <span><?php echo esc_html__('Accept: .jpg, .jpeg, .png, .gif', 'arc') ?></span>
                    <p>Upload to album "<?=$post->post_title?>"</p>
                </div>
            </fieldset>
        </form>
	<?php endif;?>
    <!---modal for delete btn---->
    <style>
        .modalDelMsg {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            max-width: 600px;
            width: 100%;
            z-index: 999999;
            display: none;
        }
        .modalDelMsg.closed {
            display: none;
        }
        .modal-guts-del {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            padding: 20px 50px 20px 20px;
            display: contents;
        }
        .modal-overlay-del {
            z-index: -1000;
            position: fixed;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
        }
        #close-button-del {
            position: absolute;
            right: 0;
            top: 0;
            border-color: transparent !important;
            background-color: transparent !important;
            z-index: 999999;
        }

        #modalDelMsg {
            background: <?=get_theme_mod('secondary_color_setting')?>;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            padding: 40px 85px;
            border: none !important;
        }
        #modalDelMsg div.modal-guts-del div {
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            text-align: center;
        }
        #modalDelMsg div.modal-guts-del div h2{
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 36px;
            line-height: 42px;
            text-align: center;
            color: <?=get_theme_mod('text_site_color')?>;
            margin-top: 15px;
        }
        #modalDelMsg div.modal-guts-del div span.confirm{
            font-family: 'Roboto',sans-serif;
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 21px;
            text-align: center;
            color: <?=get_theme_mod('text_site_color')?>;
            margin: 0 auto;
        }
        #modalDelMsg #close-button-del svg{
            position: absolute;
            margin-top: -30px;
            margin-left: 20px;
        }
    </style>
    <div class="modalDelMsg alert alert-success" id="modalDelMsg">
        <button class="class-button" id="close-button-del">
            <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
            </svg>
        </button>
        <div class="modal-guts-del">
            <div>
            </div>
        </div>
    </div>
    <div class="modal-overlay-del" id="modal-overlay-del"></div>
    <!--- [end] modal for delete btn---->
    <script>
        jQuery(document).ready(function ($) {

        });
    </script>
    <!--- [end] modal for delete album--->

	<?php if(post_password_required()){
		$password_protected = 'display:block';
		$password_protected_form = 'display:block';
		$z_index = '-11111';
	} else {
		$password_protected_form = 'display:none';
		$back_password = 'transparent !important';
		$z_index = 'inherit';
	}?>
    <div class="password_protected" style="<?=$password_protected?>; background-color: <?=$back_password?>">
        <div style="z-index:1;<?=$password_protected_form?>;">
			<?=get_the_password_form($post);?>
        </div>
	    <div class="entry-content photo-content" style="z-index:<?=$z_index?>">
		<?php
		$get_ids_images = parse_blocks($post->post_content);

		foreach ($get_ids_images as $block ) {
			if ( $block['blockName'] === 'core/gallery' && ! empty( $block['attrs']['ids'] ) ) {
				$arr_images_id = array_map(function ($image_id) {
					return $image_id;
				}, $block['attrs']['ids'] );
			}
		}
		$image_per_page = xbox_get_field_value('my-theme-options', 'number_images_per_page');
		$image_count = 1;
		$all_pages = ceil(count($arr_images_id)/$image_per_page); //count of all pages
		?>

        <style>
            ul.blocks-gallery-grid {
                /*justify-content: space-evenly !important;*/
            }
            .wp-block-gallery.is-cropped .blocks-gallery-item {
                margin-right: 0!important;
            }
            li.blocks-gallery-item,
            li.blocks-gallery-item figure{
                float: left !important;
                /*margin-right: 8px !important;*/
                margin-bottom: 10px !important;
                clear: both;
                width: 100% !important;
                max-width: 200px !important;
            }
            li.blocks-gallery-item span {
               /* width: 200px !important;*/
                position: absolute;
                top: 10px !important;
                text-align: left !important;
                margin-left: 10px!important;
            }
            li.blocks-gallery-item span svg:hover rect{
                fill: <?=get_theme_mod('btn_hover_color_setting')?>;
            }
            li.blocks-gallery-item figure {
                width: 200px !important;
                border-radius: 4px !important;
            }
            li.blocks-gallery-item figure img {
                width: 200px !important;
                height: 250px !important;
                object-fit: cover!important;
                border-radius: 4px !important;
            }
        </style>
        <figure class="wp-block-gallery columns-4 is-cropped">
            <ul class="blocks-gallery-grid">
        <?php
        foreach($arr_images_id as $key => $id):
            if($_GET['pg'] > 1) {
                if($key < $image_per_page * ($_GET['pg'] - 1)) continue;
            }
            if($image_count > $image_per_page): break;
            else:?>
			<li class="blocks-gallery-item">

                <figure>
                    <a href="<?=site_url()?>/?attachment_id=<?=$id?>">
                        <img src="<?=wp_get_attachment_image_url($id, 'large')?>"
                             alt=""
                             data-id="<?=$id?>"
                             data-full-url="<?=wp_get_attachment_image_url($id, 'full')?>"
                             data-link="<?=site_url()?>/?attachment_id=<?=$id?>"
                             class="wp-image-<?=$id?>"/>
                    </a>
                </figure>
            </li>
        <?php
        $image_count++;
        endif;
        endforeach; ?>
            </ul>
        </figure>
        <!-- [start] pagination---->
        <?php
        if (!isset($_GET['pg'])) {
	        $current_page = 1;
        } else $current_page = (int)$_GET['pg'];
        $range = 1;//range of element pagination
        $showitems = $range + 3;// how many show
        ?>
		<?php
		if ($all_pages > 1):?>
            <div class="separator-pagination"></div>
        <div class="pagination">
            <ul>
	            <?php if($current_page > 1 && $current_page !== 2):?>
                    <li class="li_first"><a href="<?=get_the_permalink($post->ID)?>"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.35627 5.49505L9.65612 9.79476C9.92964 10.0684 10.3731 10.0684 10.6465 9.79476C10.9199 9.52135 10.9199 9.0779 10.6465 8.80451L6.8418 4.99993L10.6464 1.19548C10.9198 0.921955 10.9198 0.478552 10.6464 0.205141C10.373 -0.0683805 9.92953 -0.0683805 9.65601 0.205141L5.35616 4.50492C5.21946 4.64169 5.15118 4.82075 5.15118 4.99991C5.15118 5.17915 5.21959 5.35835 5.35627 5.49505Z" fill="white"/>
                                <path d="M0.692211 5.49505L4.99206 9.79476C5.26558 10.0684 5.70905 10.0684 5.98244 9.79476C6.25585 9.52135 6.25585 9.0779 5.98244 8.80451L2.17774 4.99993L5.98233 1.19548C6.25574 0.921955 6.25574 0.478552 5.98233 0.205141C5.70892 -0.0683805 5.26547 -0.0683805 4.99195 0.205141L0.6921 4.50492C0.555394 4.64169 0.487119 4.82075 0.487119 4.99991C0.487119 5.17915 0.555527 5.35835 0.692211 5.49505Z" fill="white"/>
                            </svg></a></li> <!--first-->
                    <li class="li_prev"><a href="<?=get_the_permalink($post->ID)?>?pg=<?=$current_page-1?>"><svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.504711 5.49505L4.80456 9.79476C5.07808 10.0684 5.52155 10.0684 5.79494 9.79476C6.06835 9.52135 6.06835 9.0779 5.79494 8.80451L1.99024 4.99993L5.79483 1.19548C6.06824 0.921955 6.06824 0.478552 5.79483 0.205141C5.52142 -0.0683805 5.07797 -0.0683805 4.80445 0.205141L0.5046 4.50492C0.367894 4.64169 0.299619 4.82075 0.299619 4.99991C0.299619 5.17915 0.368027 5.35835 0.504711 5.49505Z" fill="white"/>
                            </svg></a></li> <!--prev-->
	            <?php elseif($current_page == 2):?>
                    <li class="li_first"><a href="<?=get_the_permalink($post->ID)?>"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.35627 5.49505L9.65612 9.79476C9.92964 10.0684 10.3731 10.0684 10.6465 9.79476C10.9199 9.52135 10.9199 9.0779 10.6465 8.80451L6.8418 4.99993L10.6464 1.19548C10.9198 0.921955 10.9198 0.478552 10.6464 0.205141C10.373 -0.0683805 9.92953 -0.0683805 9.65601 0.205141L5.35616 4.50492C5.21946 4.64169 5.15118 4.82075 5.15118 4.99991C5.15118 5.17915 5.21959 5.35835 5.35627 5.49505Z" fill="white"/>
                                <path d="M0.692211 5.49505L4.99206 9.79476C5.26558 10.0684 5.70905 10.0684 5.98244 9.79476C6.25585 9.52135 6.25585 9.0779 5.98244 8.80451L2.17774 4.99993L5.98233 1.19548C6.25574 0.921955 6.25574 0.478552 5.98233 0.205141C5.70892 -0.0683805 5.26547 -0.0683805 4.99195 0.205141L0.6921 4.50492C0.555394 4.64169 0.487119 4.82075 0.487119 4.99991C0.487119 5.17915 0.555527 5.35835 0.692211 5.49505Z" fill="white"/>
                            </svg></a></li> <!--first-->
                    <li class="li_prev"><a href="<?=get_the_permalink($post->ID)?>"><svg width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.504711 5.49505L4.80456 9.79476C5.07808 10.0684 5.52155 10.0684 5.79494 9.79476C6.06835 9.52135 6.06835 9.0779 5.79494 8.80451L1.99024 4.99993L5.79483 1.19548C6.06824 0.921955 6.06824 0.478552 5.79483 0.205141C5.52142 -0.0683805 5.07797 -0.0683805 4.80445 0.205141L0.5046 4.50492C0.367894 4.64169 0.299619 4.82075 0.299619 4.99991C0.299619 5.17915 0.368027 5.35835 0.504711 5.49505Z" fill="white"/>
                            </svg></a></li> <!--prev-->
	            <?php endif;?>
        <?php for ($j = 1; $j <= $all_pages; $j++):?>
            <?php if ( 1 !== $all_pages && ( ! ($j >= $current_page + $range + 1 || $j<= $current_page - $range - 1 ) || $all_pages <= $showitems ) ) :?>
                <?php if ($current_page === $j):?>
                    <li class="li_current_<?=$j?>"><a class="current"><?=$j?></a></li>
                <?php elseif($j === 1):?>
                    <li class="li_current_<?=$j?>"><a href="<?=get_the_permalink($post->ID)?>" class="inactive"><?=$j?></a></li>
                <?php else:?>
                    <li class="li_current_<?=$j?>"><a href="<?=get_the_permalink($post->ID)?>?pg=<?=$j?>" class="inactive"><?=$j?></a></li>
                <?php endif;?>
            <?php endif;?>
                <?php
            endfor;?>
	            <?php if ($current_page < ceil(count($arr_images_id)/$image_per_page)):?>
                    <li class="li_next"><a href="<?=get_the_permalink($post->ID)?>?pg=<?=$current_page+1?>"><svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.49529 5.49505L1.19544 9.79476C0.921918 10.0684 0.478448 10.0684 0.205059 9.79476C-0.0683529 9.52135 -0.0683529 9.0779 0.205059 8.80451L4.00976 4.99993L0.205169 1.19548C-0.0682423 0.921955 -0.0682423 0.478552 0.205169 0.205141C0.478581 -0.0683805 0.922028 -0.0683805 1.19555 0.205141L5.4954 4.50492C5.63211 4.64169 5.70038 4.82075 5.70038 4.99991C5.70038 5.17915 5.63197 5.35835 5.49529 5.49505Z" fill="white"/>
                            </svg></a></li> <!--next-->
                    <li class="li_last"><a href='<?=get_the_permalink($post->ID)?>?pg=<?=ceil(count($arr_images_id)/$image_per_page)?>'><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.64373 5.49505L1.34388 9.79476C1.07036 10.0684 0.626886 10.0684 0.353496 9.79476C0.0800846 9.52135 0.0800846 9.0779 0.353496 8.80451L4.1582 4.99993L0.353607 1.19548C0.0801952 0.921955 0.0801952 0.478552 0.353607 0.205141C0.627019 -0.0683805 1.07047 -0.0683805 1.34399 0.205141L5.64384 4.50492C5.78054 4.64169 5.84882 4.82075 5.84882 4.99991C5.84882 5.17915 5.78041 5.35835 5.64373 5.49505Z" fill="white"/>
                                <path d="M10.3078 5.49505L6.00794 9.79476C5.73442 10.0684 5.29095 10.0684 5.01756 9.79476C4.74415 9.52135 4.74415 9.0779 5.01756 8.80451L8.82226 4.99993L5.01767 1.19548C4.74426 0.921955 4.74426 0.478552 5.01767 0.205141C5.29108 -0.0683805 5.73453 -0.0683805 6.00805 0.205141L10.3079 4.50492C10.4446 4.64169 10.5129 4.82075 10.5129 4.99991C10.5129 5.17915 10.4445 5.35835 10.3078 5.49505Z" fill="white"/>
                            </svg></a></li><!--last-->
	            <?php endif;?>
            </ul>
        </div>
        <?php endif;?>
        <!-- [end] pagination---->
		<?php //the_content();?>
	</div>

    </div>
    <?php if(is_user_logged_in() && get_current_user_id() == $post->post_author):
    ?>
    <!---close btn--->
    <script>
        jQuery(document).ready(function ($){
            $('figure.wp-block-gallery ul li.blocks-gallery-item').each(function () {
                $(this).prepend('<span class="delete_image" style="cursor:pointer;text-align: right;" data-photo_id data-gallery_id>' +
                    '<span class="confirm_msg" style="display: none">Delete image ?</span><svg data-clicked="off" class="svg_left_photo" width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">'+
                    '<rect width="25" height="22" rx="4" fill="#1E2739" fill-opacity="0.8"/>'+
                    '<path fill-rule="evenodd" clip-rule="evenodd" d="M18.1129 5.06928C17.82 4.77639 17.3451 4.77639 17.0522 5.06928L12.4992 9.62232L7.94623 5.06935C7.65334 4.77646 7.17847 4.77646 6.88557 5.06935C6.59268 5.36224 6.59268 5.83712 6.88557 6.13001L11.4385 10.683L6.25092 15.8706C5.95803 16.1635 5.95803 16.6384 6.25092 16.9313C6.54381 17.2242 7.01869 17.2242 7.31158 16.9313L12.4992 11.7436L17.6869 16.9313C17.9798 17.2242 18.4547 17.2242 18.7476 16.9313C19.0405 16.6384 19.0405 16.1636 18.7476 15.8707L13.5599 10.683L18.1129 6.12994C18.4058 5.83705 18.4058 5.36217 18.1129 5.06928Z" fill="white"/>'+
                    '</svg><i class="fa fa-check svg_delete_photo" style="display: none; float: right;font-size: 21px"></i>' +
                    '</span>');
            });

            $(document).on('click', 'svg.svg_left_photo', function() {
                if('off' == $(this).attr('data-clicked')) {
                    $(this).closest('span.delete_image').animate({
                        'width' : '<?php
                            switch(xbox_get_field_value( 'my-theme-options', 'number_photos_per_row' )) {
                                case '2': echo '97%'; break;
                                case '3': echo '95%'; break;
                                case '4': echo '94%'; break;
                                case '5': echo '92%'; break;
                                case '6': echo '92%'; break;
                                default: echo '90%';break;}?>',
                        'border-radius': '4px',
                        'padding-left': '4px',
                        'padding-top': '2px',
                        'padding-right': '3px'
                    },500).css({
                        'background-color' : arc_ajax_var.secondaryColor,
                    });
                    $(this).css('float', 'right');
                    $(this).closest('span.delete_image').find('i.fa.fa-check').css('display', 'block');
                    $(this).closest('span.delete_image').find('span.confirm_msg').css('display', 'contents');
                    $(this).attr('data-clicked', 'on');
                    $(this).closest('li.blocks-gallery-item').find('figure > a').wrap('<div class="wrap_image_div"></div>');
                    $(this).closest('span.delete_image').css('z-index', 999);
                } else {
                    $(this).closest('span.delete_image').css({
                        'width' : 'auto',
                        'border-radius': '0px',
                        'padding-left': '0px',
                        'padding-top': '0px',
                        'padding-right': '0px',
                        'background-color': 'transparent'

                    });
                    $(this).css('float', 'unset');
                    $(this).closest('span.delete_image').find('i.fa.fa-check').css('display', 'none');
                    $(this).closest('span.delete_image').find('span.confirm_msg').css('display', 'none');
                    $(this).closest('span.delete_image').css('z-index', 'inherit');
                    $(this).closest('li.blocks-gallery-item').find('figure').find('a').unwrap();
                    $(this).attr('data-clicked', 'off');
                }
            });
        });
    </script>
    <?php endif;?>
    <?php
    $picture_on_row = xbox_get_field_value('my-theme-options', 'number_photos_per_row');
    $count_imgs_on_fact = count($arr_images_id);
    if($count_imgs_on_fact >= $picture_on_row):?>
        <script>
            jQuery(document).ready(function ($){
                var figure_class = $('div.photo-content > figure').attr('class').split(' ');
                var new_figure_class = figure_class[0] + ' columns-' + arc_ajax_var.photos_per_row + ' '+ figure_class[2];
                $('div.photo-content > figure').attr('class', new_figure_class);
            });
        </script>
    <?php else:?>
        <script>
            jQuery(document).ready(function ($){
                var figure_class = $('div.photo-content > figure').attr('class').split(' ');
                var new_figure_class = figure_class[0] + ' columns-' + arc_ajax_var.count_imgs + ' '+ figure_class[2];
                $('div.photo-content > figure').attr('class', new_figure_class);
            });
        </script>
    <?php endif;?>
    <?php if($count_imgs_on_fact == 1 || $count_imgs_on_fact == $picture_on_row):  ?>
        <style>
            .wp-block-gallery .blocks-gallery-item {
                flex-grow: 1 !important;
            }
        </style>
    <?php elseif($count_imgs_on_fact == 2):  ?>
        <style>
            .wp-block-gallery .blocks-gallery-item {
                flex-grow: .3 !important;
            }
        </style>
    <?php endif;?>
    <script>
        jQuery(document).ready(function ($){
            var form_flag = false;
            $('.btn_upload_to_album').on('click', function (){
                if(false === form_flag) {
                    $('.upload_to_album_form').fadeIn(300);
                    form_flag = true;
                } else {
                    $('.upload_to_album_form').fadeOut(200);
                    form_flag = false;
                }
            });
        });
    </script>
    <!--Gallery tags--->
        <style>
            #galleries_tags_div {
                margin: 0;
                padding: 0;
                width: 100%;
                border-top: 1px solid <?=get_theme_mod('primary_color_setting');?>;
                border-bottom: 1px solid <?=get_theme_mod('primary_color_setting');?>;
                padding-top: 15px;
                padding-bottom: 15px;
                margin-top: 24px;
                display: inline-flex !important;
                font-family: 'Roboto',sans-serif;
                font-style: normal;
                font-weight: normal;
                font-size: 18px!important;
                line-height: 21px!important;
            }
            #galleries_tags {
                display: flex;
                flex-wrap: wrap;
                margin: 0;
                padding: 0;
                width: 100%;
                margin-left: 20px;
            }
            li.gal_tag {
                list-style: none;
                margin: 7px;
                padding-left: 10px !important;
                padding-right: 10px !important;
                border: none !important;
                background: <?=get_theme_mod('primary_color_setting')?> !important;
                border-radius: 4px!important;
                padding-top: 4px;
                padding-bottom: 4px;
                font-family: 'Roboto',sans-serif;
                font-style: normal;
                font-weight: normal;
                font-size: 18px;
                line-height: 21px;
            }
            li.gal_tag:first-child {
                margin-left: 0px;
            }
        </style>
	<?php
	$galleries_tags = wp_get_post_terms($post->ID, 'photos_tag');
	if(count($galleries_tags) > 0):?>
        <div id="galleries_tags_div">
            <p style="margin: 0;padding: 0;margin-top: 10px;">Tags: </p>
            <ul id="galleries_tags">
			    <?php foreach($galleries_tags as $tag):?>
                <?php $tag_name = restyle_tag($tag->name);?>
                    <li class="label gal_tag"><a href="/photos/?tags=<?=$tag->slug;?>"><?=$tag_name;?></a></li>
			    <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>

    <!--galleries tags--->
	<?php // If comments are open or we have at least one comment, load up the comment template.
	if( get_option('allow_comments_to_all')['allow_comments_to_all'] == 'on' ) {
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	} ?>
    <?php
    $images_per_row = xbox_get_field_value( 'my-theme-options', 'number_photos_per_row' );
    switch($images_per_row) {
        case '2':?>
            <style>
                li.blocks-gallery-item {
                   /* width: calc(50% - 1em) !important;*/
                    width: calc(50%) !important;
                    max-width: inherit !important;
                    min-width: 200px;
                }
                li.blocks-gallery-item figure {
                    width: 100% !important;
                    max-width: inherit !important;
                }
                li.blocks-gallery-item figure img {
                    width: 100% !important;
                    height: 250px !important;
                }
                div.wrap_image_div {
                    width: 100% !important;
                    max-width: inherit !important;
                }
                div.wrap_image_div::after {
                    animation-duration: .5s;
                    animation-name: slideright;
                    max-width: inherit !important;
                }
                span.delete_image {
                    animation-duration: .5s;
                    animation-name: sliderightspan;
                }
            </style>
            <?php
            break;
        case '3':?>
            <style>
                li.blocks-gallery-item {
                    /*width: calc(33.3% - 1em) !important;*/
                    width: calc(33.3%) !important;
                    max-width: inherit !important;
                    min-width: 200px;
                }
                li.blocks-gallery-item figure {
                    width: 100% !important;
                    max-width: inherit !important;
                }
                li.blocks-gallery-item figure img {
                    width: 100% !important;
                    height: 250px !important;
                }
                div.wrap_image_div {
                    width: 100% !important;
                    max-width: inherit !important;
                }
                div.wrap_image_div::after {
                    animation-duration: .5s;
                    animation-name: slideright;
                    max-width: inherit !important;
                }
                span.delete_image {
                    animation-duration: .5s;
                    animation-name: sliderightspan;
                }
            </style>
            <?php
            break;
        case '4': ?>
            <style>
                .columns-4 li.blocks-gallery-item{
                    /*width: calc(25% - 1em) !important;*/
                    width: calc(25%) !important;
                }
                li.blocks-gallery-item {
                    /*width: calc(25% - 1em) !important;*/
                    width: calc(25%) !important;
                    max-width: inherit !important;
                    min-width: 200px;
                }
                li.blocks-gallery-item figure {
                    width: 100% !important;
                    max-width: inherit !important;
                }
                li.blocks-gallery-item figure img {
                    width: 100% !important;
                    height: 250px !important;
                }
                div.wrap_image_div {
                    width: 100% !important;
                    max-width: inherit !important;
                }
                div.wrap_image_div::after {
                    animation-duration: .5s;
                    animation-name: slideright;
                    max-width: inherit !important;
                }
                span.delete_image {
                    animation-duration: .5s;
                    animation-name: sliderightspan;
                }
            </style>
        <?php
        case '5':?>
            <style>
                li.blocks-gallery-item {
                    /*width: calc(20% - 1em) !important;*/
                    width: calc(20%) !important;
                    max-width: inherit !important;
                    min-width: 200px;
                }
                li.blocks-gallery-item figure {
                    width: 100% !important;
                    max-width: inherit !important;
                }
                li.blocks-gallery-item figure img {
                    width: 100% !important;
                    height: 250px !important;
                }
                div.wrap_image_div {
                    width: 100% !important;
                    max-width: inherit !important;
                }
                div.wrap_image_div::after {
                    animation-duration: .5s;
                    animation-name: slideright;
                    max-width: inherit !important;
                }
                span.delete_image {
                    animation-duration: .5s;
                    animation-name: sliderightspan;
                }
            </style>
            <?php
            break;
        case '6':?>
            <style>
                li.blocks-gallery-item {
                    /*width: calc(16.6% - 1em) !important;*/
                    width: calc(16.66%) !important;
                    max-width: inherit !important;
                    min-width: 200px;
                }
                li.blocks-gallery-item figure {
                    width: 100% !important;
                    max-width: inherit !important;
                }
                li.blocks-gallery-item figure img {
                    width: 100% !important;
                    height: 250px !important;
                }
                div.wrap_image_div {
                    width: 100% !important;
                    max-width: inherit !important;
                }
                div.wrap_image_div::after {
                    animation-duration: .5s;
                    animation-name: slideright_six;
                    max-width: inherit !important;
                    width: 96%;
                }
                span.delete_image {
                    animation-duration: .5s;
                    animation-name: sliderightspan;
                }
            </style>
            <?php
            break;
        default:?>
            <style>
                li.blocks-gallery-item {
                    width: 100% !important;
                    max-width: 200px !important;
                    min-width: 200px;
                }
                li.blocks-gallery-item figure {
                    width: 100% !important;
                    max-width: inherit !important;
                }
                li.blocks-gallery-item figure img {
                    width: 100% !important;
                    height: 250px !important;
                }
                div.wrap_image_div {
                    width: 100% !important;
                    max-width: 200px !important;
                }
                div.wrap_image_div::after {
                    animation-duration: .5s;
                    animation-name: slideright;
                    max-width: 200px !important;
                }
                span.delete_image {
                    animation-duration: .5s;
                    animation-name: sliderightspan;
                    max-width: 190px !important;
                }
            </style>
            <?php break;
    }
    ?>
    <style>
        @keyframes slideright {
            from {
                width: 0%;
            }
            to {
                width: calc(100%) !important;
            }
        }
        @keyframes slideright_six {
            from {
                width: 0%;
            }
            to {
                width: calc(96%) !important;
            }
        }
        @keyframes sliderightspan {
            from {
                width: 0%;
            }
            to {
                width: 92% !important;
            }
        }

        .wp-block-gallery .blocks-gallery-item,
        .blocks-gallery-grid .blocks-gallery-item {
            margin: 0 !important;
        }
        li.blocks-gallery-item figure {
            margin-bottom: 0 !important;
        }
    </style>
</article>
