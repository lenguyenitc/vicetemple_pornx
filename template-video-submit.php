<?php /* Template Name: Upload a Video */
$siteKey = xbox_get_field_value( 'my-theme-options', 'reCaptcha-settings1' );
$secret = xbox_get_field_value( 'my-theme-options', 'reCaptcha-settings2' );

$user = wp_get_current_user();

if(isset($_POST['arc-submitted']) && isset($_POST['arc-post_nonce_field']) && wp_verify_nonce($_POST['arc-post_nonce_field'], 'post_nonce')) :
    if ( xbox_get_field_value( 'my-theme-options', 'enable-recaptcha' ) == 'on' && $siteKey != '' && $secret != '' ) :
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) :
            $captcha = urlencode($_POST['g-recaptcha-response']);
            //$ip = $_SERVER['REMOTE_ADDR'];
            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $captcha);
            $responseData = json_decode($verifyResponse);
            $flag = false;
            if($responseData->success) :
                $flag = true;
                ?>
            <?php /*else :
				$errMsg = esc_html__( 'Captcha verification failed, please try again.', 'arc' );*/
            endif; ?>
        <?php else:
            $errMsg = esc_html__( 'Please click on the reCAPTCHA box.', 'arc' );
        endif;
        if($flag) {
            $post_information = array(
                'post_title'    => esc_attr(strip_tags($_POST['arc-video_title'])),
                'post_content'  => esc_attr(strip_tags($_POST['arc-video_description'])),
                'post-type'     => 'post',
                'post_status'   => 'pending',
                'post_author'   => get_current_user_id(),
                'post_category' => array( $_POST['arc-category_selected'] )
            );
            $post_id = wp_insert_post($post_information);
            if(!empty($_POST['arc-tags'])) {
                $arr_tags = explode(',', $_POST['arc-tags']);
                if($arr_tags == 1) $arr_tags = strip_tags($_POST['arc-tags']);
                if($arr_tags > 2) $arr_tags = explode(',', $_POST['arc-tags']);
                wp_set_object_terms($post_id, $arr_tags, 'post_tag', true);
            }
            if(!empty($_POST['arc-actors'])) {
                $arr_actors = explode(',', $_POST['arc-actors']);
                if($arr_actors == 1) $arr_actors = strip_tags($_POST['arc-actors']);
                if($arr_actors > 2) $arr_actors = explode(',', $_POST['arc-actors']);
                wp_set_object_terms($post_id, $arr_actors, 'pornstars', true);
            }
            if($post_id){
                // Update Custom Meta
                if(isset($_POST['arc-video_url']) && !empty($_POST['arc-video_url'])) {
                    update_post_meta($post_id, 'video_url', esc_attr(strip_tags($_POST['arc-video_url'])));
                }
                if(!empty($_FILES['arc_file_upload'])) {
                    if(wp_verify_nonce( $_POST['fileup_nonce'], 'arc_file_upload')){
                        if (!function_exists( 'wp_handle_upload')) {
                            require_once ABSPATH . 'wp-admin/includes/image.php';
                            require_once ABSPATH . 'wp-admin/includes/file.php';
                            require_once ABSPATH . 'wp-admin/includes/media.php';
                        }
                            $file = &$_FILES['arc_file_upload'];
                            $file['name'] = str_replace('.m4v', '.mp4', $file['name']);
                            $overrides = [ 'test_form' => false ];
                            $movefile = wp_handle_upload( $file, $overrides);
                            if ( $movefile && empty($movefile['error']) ) {
                                update_post_meta($post_id, 'video_url', $movefile['url']);

                                $wp_upload_dir = wp_upload_dir();
                                $filetype = wp_check_filetype($movefile['url'], null);
                                $attachment_preview = array(
                                    'guid'           => $movefile['url'],
                                    'post_mime_type' => $movefile['type'],
                                    'post_title'     => preg_replace( '/\.[^.]+$/', '', $movefile['url']),
                                    'post_content'   => '',
                                    'post_status'    => 'inherit'
                                );
                                $scaled_video_attachment_id = wp_insert_attachment($attachment_preview, $movefile['url'], 0);
                                $scaled_video_attachment_data = wp_generate_attachment_metadata($scaled_video_attachment_id, $movefile['url']);
                                wp_update_attachment_metadata($scaled_video_attachment_id, $scaled_video_attachment_data);

                                //get the duration
                                ob_start();
                                passthru("ffmpeg -i ".$movefile['url']."  2>&1");
                                $duration = ob_get_contents();
                                $full = ob_get_contents();
                                ob_end_clean();
                                $search = "/duration.*?([0-9]{1,})/";
                                $duration = preg_match($search, $duration, $matches, PREG_OFFSET_CAPTURE, 3);
                                $get_duration = trim(explode('.',explode('Duration:', $full)[1])[0]);
                                $hours = (int)explode(':', $get_duration)[0];
                                $min = (int)explode(':', $get_duration)[1];
                                $sec = (int)explode(':', $get_duration)[2];

                                $duration_seconds = $hours * 3600 + $min * 60 + $sec;
                                update_post_meta($post_id, 'hours', $hours);
                                update_post_meta($post_id, 'minute', $min);
                                update_post_meta($post_id, 'second', $sec);
                                update_post_meta($post_id, 'duration', $duration_seconds);
                            }

                    }
                }

                if(!empty($_POST['arc-embed'])) {
                    update_post_meta( $post_id, 'embed', esc_attr( $_POST['arc-embed'] ) );
                }

                if(empty($_POST['arc-thumb'])) {
                    require_once ABSPATH . 'wp-admin/includes/image.php';
                    require_once ABSPATH . 'wp-admin/includes/file.php';
                    require_once ABSPATH . 'wp-admin/includes/media.php';
                    $data = substr($_POST['canvas_thumb'], strpos($_POST['canvas_thumb'], ",") + 1);
                    $decodeData = base64_decode($data);
                    $fp = fopen( esc_attr(strip_tags($_POST['arc-video_title'])) . ".png", 'wb');
                    fwrite($fp, $decodeData);
                    fclose($fp);
                    $url = site_url() . '/' . esc_attr(strip_tags($_POST['arc-video_title'])) . ".png";
                    $img_src = media_sideload_image($url, $post_id, '', 'src');
                    @unlink(esc_attr(strip_tags($_POST['arc-video_title'])) . ".png");
                    update_post_meta($post_id, 'thumb', esc_attr(strip_tags($img_src)));
                } else {
                    update_post_meta($post_id, 'thumb', esc_attr(strip_tags($_POST['arc-thumb'])));
                }

                update_post_meta($post_id, 'featured_video', 'off');

                if(!empty($_POST['arc_hd_video'])) {
                    update_post_meta($post_id, 'hd_video', $_POST['arc_hd_video']);
                }
                if(!empty($_POST['production'])) {
                    update_post_meta($post_id, 'production', $_POST['production']);
                }

                if(!empty($_POST['video_orientation'])) {
                    update_post_meta($post_id, 'video_orientation', $_POST['video_orientation']);
                }

                if(!empty($_POST['tattoo'])) {
                    update_post_meta($post_id, 'tattoo', $_POST['tattoo']);
                }

                if(!empty($_POST['piercing'])) {
                    update_post_meta($post_id, 'piercing', $_POST['piercing']);
                }

                if(isset($_POST['ethnicity'])) {
                    update_post_meta($post_id, 'ethnicity', $_POST['ethnicity']);
                }

                if(isset($_POST['hair_color'])) {
                    update_post_meta($post_id, 'hair_color', $_POST['hair_color']);
                }

                if(!empty($_POST['bust'])) {
                    update_post_meta($post_id, 'bust', esc_attr(strip_tags($_POST['bust'])));
                }
                set_post_format($post_id, 'video' );
            }

            /****letter for admin****/
            send_letter_submit_video_adm($post_id);
            /****end letter for admin****/


            /****letter for current user****/
            send_letter_submit_video_user(wp_get_current_user());
            /****end letter for current user****/

            wp_redirect( site_url('/upload/?uploaded=yes'));
            exit;
        }
        ?>
    <?php else:
        $post_information = array(
            'post_title'    => esc_attr(strip_tags($_POST['arc-video_title'])),
            'post_content'  => esc_attr(strip_tags($_POST['arc-video_description'])),
            'post-type'     => 'post',
            'post_status'   => 'pending',
            'post_category' => array( $_POST['arc-category_selected'] ),
        );
        $post_id = wp_insert_post($post_information);
        if(!empty($_POST['arc-tags'])) {
            $arr_tags = explode(',', $_POST['arc-tags']);
            if($arr_tags == 1) $arr_tags = strip_tags($_POST['arc-tags']);
            if($arr_tags > 2) $arr_tags = explode(',', $_POST['arc-tags']);
            wp_set_object_terms($post_id, $arr_tags, 'post_tag', true);
        }

        if(!empty($_POST['arc-actors'])) {
            $arr_actors = explode(',', $_POST['arc-actors']);
            if($arr_actors == 1) $arr_actors = strip_tags($_POST['arc-actors']);
            if($arr_actors > 2) $arr_actors = explode(',', $_POST['arc-actors']);
            wp_set_object_terms($post_id, $arr_actors, 'pornstars', true);
        }

        if($post_id){
            // Update Custom Meta
            if(isset($_POST['arc-video_url']) && !empty($_POST['arc-video_url'])) {
                update_post_meta($post_id, 'video_url', esc_attr(strip_tags($_POST['arc-video_url'])));
            }
            if(!empty($_FILES['arc_file_upload'])) {
                if(wp_verify_nonce( $_POST['fileup_nonce'], 'arc_file_upload')){
                    if (!function_exists( 'wp_handle_upload')) {
                        require_once ABSPATH . 'wp-admin/includes/image.php';
                        require_once ABSPATH . 'wp-admin/includes/file.php';
                        require_once ABSPATH . 'wp-admin/includes/media.php';
                    }
                        $file = &$_FILES['arc_file_upload'];
                        $file['name'] = str_replace('.m4v', '.mp4', $file['name']);
                        $overrides = [ 'test_form' => false ];
                        $movefile = wp_handle_upload( $file, $overrides);
                        if ( $movefile && empty($movefile['error']) ) {
                            update_post_meta($post_id, 'video_url', $movefile['url']);

                            $wp_upload_dir = wp_upload_dir();
                            $filetype = wp_check_filetype($movefile['url'], null);
                            $attachment_preview = array(
                                'guid'           => $movefile['url'],
                                'post_mime_type' => $movefile['type'],
                                'post_title'     => preg_replace( '/\.[^.]+$/', '', $movefile['url']),
                                'post_content'   => '',
                                'post_status'    => 'inherit'
                            );
                            $scaled_video_attachment_id = wp_insert_attachment($attachment_preview, $movefile['url'], 0);
                            $scaled_video_attachment_data = wp_generate_attachment_metadata($scaled_video_attachment_id, $movefile['url']);
                            wp_update_attachment_metadata($scaled_video_attachment_id, $scaled_video_attachment_data);

                            //get the duration
                            ob_start();
                            passthru("ffmpeg -i ".$movefile['url']."  2>&1");
                            $duration = ob_get_contents();
                            $full = ob_get_contents();
                            ob_end_clean();
                            $search = "/duration.*?([0-9]{1,})/";
                            $duration = preg_match($search, $duration, $matches, PREG_OFFSET_CAPTURE, 3);
                            $get_duration = trim(explode('.',explode('Duration:', $full)[1])[0]);
                            $hours = (int)explode(':', $get_duration)[0];
                            $min = (int)explode(':', $get_duration)[1];
                            $sec = (int)explode(':', $get_duration)[2];

                            $duration_seconds = $hours * 3600 + $min * 60 + $sec;
                            update_post_meta($post_id, 'hours', $hours);
                            update_post_meta($post_id, 'minute', $min);
                            update_post_meta($post_id, 'second', $sec);
                            update_post_meta($post_id, 'duration', $duration_seconds);
                        }

                }
            }
            if(!empty($_POST['arc-embed'])) {
                update_post_meta( $post_id, 'embed', esc_attr( $_POST['arc-embed'] ) );
            }

            if(empty($_POST['arc-thumb'])) {
                require_once ABSPATH . 'wp-admin/includes/image.php';
                require_once ABSPATH . 'wp-admin/includes/file.php';
                require_once ABSPATH . 'wp-admin/includes/media.php';
                $data = substr($_POST['canvas_thumb'], strpos($_POST['canvas_thumb'], ",") + 1);
                $decodeData = base64_decode($data);
                $fp = fopen( esc_attr(strip_tags($_POST['arc-video_title'])) . ".png", 'wb');
                fwrite($fp, $decodeData);
                fclose($fp);
                $url = site_url() . '/' . esc_attr(strip_tags($_POST['arc-video_title'])) . ".png";
                $img_src = media_sideload_image($url, $post_id, '', 'src');
                @unlink(esc_attr(strip_tags($_POST['arc-video_title'])) . ".png");
                update_post_meta($post_id, 'thumb', esc_attr(strip_tags($img_src)));
            } else {
                update_post_meta($post_id, 'thumb', esc_attr(strip_tags($_POST['arc-thumb'])));
            }
            update_post_meta($post_id, 'featured_video', 'off');

            if(!empty($_POST['arc_hd_video'])) {
                update_post_meta($post_id, 'hd_video', $_POST['arc_hd_video']);
            }
            if(!empty($_POST['production'])) {
                update_post_meta($post_id, 'production', $_POST['production']);
            }

            if(!empty($_POST['video_orientation'])) {
                update_post_meta($post_id, 'video_orientation', $_POST['video_orientation']);
            }

            if(!empty($_POST['tattoo'])) {
                update_post_meta($post_id, 'tattoo', $_POST['tattoo']);
            }

            if(!empty($_POST['piercing'])) {
                update_post_meta($post_id, 'piercing', $_POST['piercing']);
            }

            if(isset($_POST['ethnicity'])) {
                update_post_meta($post_id, 'ethnicity', $_POST['ethnicity']);
            }

            if(isset($_POST['hair_color'])) {
                update_post_meta($post_id, 'hair_color', $_POST['hair_color']);
            }

            if(!empty($_POST['bust'])) {
                update_post_meta($post_id, 'bust', esc_attr(strip_tags($_POST['bust'])));
            }

            set_post_format($post_id, 'video' );

            /****letter for admin****/
            send_letter_submit_video_adm($post_id);
            /****end letter for admin****/


            /****letter for current user****/
            send_letter_submit_video_user(wp_get_current_user());
            /****end letter for current user****/

            wp_redirect( site_url('/upload/?uploaded=yes'));
            exit;

        }
    endif; ?>
<?php else:
    $errMsg = '';
    $succMsg = '';
endif;
get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-submit-page' ) == 'on' ) {
    if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' )
    { $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
    $sidebar_pos = '';
} ?>
    <style>
        .video-submit-area input, .video-submit-area textarea {
            width: 100%;
            max-width: 581px;
            margin: 0 auto;
        }
    </style>
    <div id="primary" class="content-area <?php echo $sidebar_pos; ?> video-submit-area">
        <main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <header class="entry-header">
                <h1 class="widget-title upload_a_video"><?php echo __('Upload', 'arc');?></h1>
            </header>
            <script>
                jQuery(document).ready(function($) {
                    $('#SubmitVideo input[type=radio], #SubmitVideo input[type=checkbox]').checkboxradio();

                    var arr_files = '';
                    var video_url_link = '';
                    var embed_code = '';


                    $('#video_url').on('input', function(){
                        if($(this).val().length > 0)  video_url_link = $(this).val();
                        else video_url_link = '';
                        if(video_url_link || embed_code || arr_files) {
                            $('#embed').attr('required', false);
                            $('input[type="file"]').attr('required', false);
                        } else {
                            $('#embed').attr('required', true);
                            $('input[type="file"]').attr('required', true);
                        }
                    });

                    $('#embed').on('input', function(){
                        if($(this).val().length > 0)  embed_code = $(this).val();
                        else embed_code = '';
                        if(video_url_link || embed_code || arr_files) {
                            $('#video_url').attr('required', false);
                            $('input[type="file"]').attr('required', false);
                        } else {
                            $('#video_url').attr('required', true);
                            $('input[type="file"]').attr('required', true);
                        }
                    });

                    $('input[type="file"]').on('change', function() {
                        if(this.value.length > 0)  arr_files = this.value.length;
                        else arr_files = '';
                        if(video_url_link || embed_code || arr_files) {
                            $('#video_url').attr('required', false);
                            $('#embed').attr('required', false);
                        } else {
                            $('#video_url').attr('required', true);
                            $('#embed').attr('required', true);
                        }
                    });
                });
            </script>
            <?php if( xbox_get_field_value( 'my-theme-options', 'display-submit-video' ) == 'on' || current_user_can('administrator')) : ?>
                <?php if(!empty($errMsg)): ?><div class="alert alert-danger" id="errMsg"><?php echo $errMsg; ?></div><?php endif; ?>


                <?php if(!empty($_SERVER['HTTP_REFERER'])
                && $_SERVER['HTTP_REFERER'] == site_url('/upload/')
                && $_GET['uploaded'] == 'yes'): ?>

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
                        display: block;
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
                        z-index: 99999;
                        position: fixed;
                        top:0;
                        left:0;
                        width: 100%;
                        height: 100%;
                        /* background: rgba(15, 23, 37, 0.9);*/
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
                    <button class="class-button" id="close-button-del" onclick="window.location.href='<?=site_url('/upload/')?>'">
                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                            <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                        </svg>
                    </button>
                    <div class="modal-guts-del">
                        <div>
                            <h2>Uploaded successfully!</h2>
                            <span class="confirm"><?//=$succMsg?>Your video is being moderated.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-overlay-del" id="modal-overlay-del"></div>
            <?php
            endif;
            ?>
                <?php if (is_user_logged_in()) : ?>
                <form data-abide action="" id="SubmitVideo" method="post" enctype="multipart/form-data">
                    <div id="html_element"></div>
                    <input type="hidden" name="randtime" value="<?=time()?>" />

                    <legend><?php echo esc_html__( 'Video information', 'arc' ); ?></legend>
                    <fieldset class="fieldset">
                        <!-- Title -->
                        <label for="video_title" style="font-family: 'Roboto',sans-serif;
                            font-style: normal !important;
                            font-weight: normal !important;
                            font-size: 14px !important;
                            line-height: 16px !important;">Title <?php if( xbox_get_field_value( 'my-theme-options', 'title-required' ) == 'on' ) : ?><span class="required">*</span><?php endif; ?></label>
                        <input type="text" placeholder="Video title" name="arc-video_title" id="video_title" value="<?php if(isset($_POST['arc-video_title'])) echo $_POST['arc-video_title'];?>" <?php if( xbox_get_field_value( 'my-theme-options', 'title-required' ) == 'on' ) : ?>required="required"<?php endif; ?> />
                        <!-- Description -->
                        <label for="video_description" style="font-family: 'Roboto',sans-serif;
                            font-style: normal !important;
                            font-weight: normal !important;
                            font-size: 14px !important;
                            line-height: 16px !important;">Description <?php if( xbox_get_field_value( 'my-theme-options', 'desc-required' ) == 'on' ) : ?><span class="required">*</span><?php endif; ?></label>
                        <textarea name="arc-video_description" placeholder="Video description" id="video_description" rows="6" cols="30" <?php if( xbox_get_field_value( 'my-theme-options', 'desc-required' ) == 'on' ) : ?>required="required"<?php endif; ?>><?php if(isset($_POST['arc-video_description'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['arc-video_description']); } else { echo $_POST['arc-video_description']; } } ?></textarea>
                    </fieldset>

                    <legend><?php echo esc_html__( 'Video source', 'arc' ); ?> <?php if( xbox_get_field_value( 'my-theme-options', 'video-required' ) == 'on' ) : ?><span class="required">*</span><?php endif; ?></legend>
                    <fieldset class="fieldset">
                        <!-- Video URL -->
                        <label for="arc-video_url"><?php echo esc_html__('Video URL', 'arc') ?> <?php /*if( xbox_get_field_value( 'my-theme-options', 'video-required' ) == 'on' ) : */?><!--<span class="required">*</span>--><?php /*endif; */?></label>
                        <input type="text" <?php if( xbox_get_field_value( 'my-theme-options', 'video-required' ) == 'on' ) : ?>required="required"<?php endif; ?> name="arc-video_url" id="video_url" placeholder="<?php echo __('Direct link to an mp4, mov, m4v, or webm file', 'arc');?>" value="<?php if(isset($_POST['arc-video_url'])) echo $_POST['arc-video_url'];?>" <?php if( xbox_get_field_value( 'my-theme-options', 'video-required' ) == 'on' ) : ?>required="required"<?php endif; ?> />
                        <!-- Embed code -->
                        <label for="embed" style="font-family: 'Roboto',sans-serif;
                            font-style: normal !important;
                            font-weight: normal !important;
                            font-size: 14px !important;
                            line-height: 16px !important;">Embed code</label>
                        <textarea name="arc-embed" <?php if( xbox_get_field_value( 'my-theme-options', 'video-required' ) == 'on' ) : ?>required="required"<?php endif; ?> placeholder="Paste an iframe or embed code" id="embed" rows="4" cols="30" <?php if( xbox_get_field_value( 'arc-options', 'embed-required' ) == 'on' ) : ?>required="required"<?php endif; ?>><?php if(isset($_POST['arc-embed'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['arc-embed']); } else { echo $_POST['arc-embed']; } } ?></textarea>
                        <!-- Video file -->
                        <script>
                            jQuery(document).ready(function ($) {
                                $('#video_file_upload #btn').on('click', () => {
                                    $('input#file').trigger('click');
                                });
                                $('input[type="file"]').on('change', function (event, files, label) {
                                    var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '')
                                    $('div#upload_text p').text(file_name);
                                });
                            });
                        </script>
                        <div id="video_file_upload">
                            <div id="btn">+ Select a file</div>
                            <div id="upload_text">
                                <p>Upload file</p>
                                <span>Supported formats: mp4, mov, m4v, webm (Maximum file size: <?php echo size_format(wp_convert_hr_to_bytes(ini_get( 'upload_max_filesize'))); ?>)</span>
                            </div>
                        </div>
                        <?php wp_nonce_field( 'arc_file_upload', 'fileup_nonce' ); ?>
                        <input <?php if( xbox_get_field_value( 'my-theme-options', 'video-required' ) == 'on' ) : ?>required="required"<?php endif; ?> style="display: none" name="arc_file_upload" id="file" type="file" accept="video/mp4,video/webm,video/quicktime" value="<?php if(isset($FILES['arc-video_file'])) echo $FILES['arc-video_file'];?>"/>
                    </fieldset>
                    <legend id="snapshot" style="display: none"><?php echo esc_html__( 'Snapshot', 'arc' ); ?></legend>
                    <fieldset class="fieldset" id="fieldset_shapshot" style="display: none">
                        <script>
                            jQuery(document).ready(function($) {
                                var video = document.createElement("video");

                                video.addEventListener('loadeddata', function() {
                                    reloadRandomFrame();
                                }, false);

                                video.addEventListener('seeked', function() {
                                    /* $('label[for="canvas_thumb"]').css('display', 'block');
                                     $('#reloadRandomFrame').css('display', 'block');
                                     $('#prevImgCanvas').css('display', 'block');*/
                                    $('legend#snapshot').css('display', 'block');
                                    $('fieldset#fieldset_shapshot').css('display', 'block');
                                    var canvas = document.getElementById("prevImgCanvas");
                                    canvas.width = 580;
                                    canvas.height = 300;
                                    var context = canvas.getContext('2d');
                                    context.drawImage(video, 0, 0, canvas.width, canvas.height);

                                    var image = canvas.toDataURL("image/png");
                                    document.getElementById('canvas_thumb').value = image;
                                    //console.log(image);
                                }, false);

                                var playSelectedFile = function(event) {
                                    var file = this.files[0];
                                    var fileURL = URL.createObjectURL(file);
                                    video.src = fileURL;
                                    //document.getElementById('canvas_thumb').value = fileURL;
                                }
                                var input = document.querySelector('#file');
                                input.addEventListener('change', playSelectedFile, false);

                                function reloadRandomFrame() {
                                    if (!isNaN(video.duration)) {
                                        var rand = Math.round(Math.random() * video.duration * 1000) + 1;
                                        video.currentTime = rand / 1000;
                                    }
                                }
                                $(document).on('click', 'div#reloadRandomFrame', function () {
                                    reloadRandomFrame();
                                })
                            });
                        </script>
                        <style>
                            #reloadRandomFrame {
                                background-color: <?=get_theme_mod('input_color')?>;
                                border-radius: 4px;
                                padding: 11px;
                                font-family: 'Roboto',sans-serif;
                                font-style: normal;
                                font-weight: normal;
                                font-size: 12px;
                                line-height: 14px;
                                color: <?=get_theme_mod('text_site_color');?>;
                                margin-right: 10px;
                                height: 36px;
                                cursor: pointer;
                                white-space: nowrap;
                                max-width: 131px;
                                width: 100%;
                                text-align: center;
                                margin-bottom: 10px;
                                /*display: none;*/
                            }
                            #prevImgCanvas {
                                /*display: none;*/
                                border-radius: 4px;
                                widht: 100%;
                            }
                        </style>
                        <div id="reloadRandomFrame">Random snapshot</div>
                        <canvas id="prevImgCanvas"></canvas>
                    </fieldset>
                    <legend><?php echo esc_html__( 'Video details', 'arc' ); ?></legend>
                    <fieldset class="fieldset">
                        <div id="video_details">
                            <div>
                                <legend><?php echo esc_html__('HD video', 'arc') ?></legend>
                                <div>
                                    <!-- HD video -->
                                    <input style="width: auto; display: inline-block" type="radio" name="arc_hd_video" class="arc_hd_video" value="on" id="on_hd"/>
                                    <label style="display: inline" for="on_hd"><?php echo __('Yes', 'arc'); ?></label> <br>
                                    <input style="width: auto; display: inline-block; margin-left: 10px" type="radio" name="arc_hd_video" class="arc_hd_video" value="off" id="off_hd"/>
                                    <label style="display: inline" for="off_hd"><?php echo __('No', 'arc'); ?></label> <br>
                                </div>
                            </div>
                            <div>
                                <legend><?php echo esc_html__('Production', 'arc') ?></legend>
                                <div>
                                    <!-- Production -->
                                    <input style="width: auto; display: inline-block" type="radio" name="production"  class="arc_production" value="professional" id="professional"/>
                                    <label style="display: inline" for="professional"> <?php echo __('Professional', 'arc');?></label> <br>
                                    <input style="width: auto; display: inline-block;margin-left: 10px" type="radio" name="production"  class="arc_production" value="homemade" id="homemade"/>
                                    <label style="display: inline" for="homemade"><?php echo __('Homemade', 'arc');?></label> <br>
                                </div>
                            </div>
                            <div>
                                <legend><?php echo esc_html__('Orientation', 'arc') ?> <?php if( xbox_get_field_value( 'my-theme-options', 'orientation-required' ) == 'on' ) : ?><span class="required">*</span><?php endif; ?></legend>
                                <div>
                                    <!-- Video orientation--->
                                    <input <?php if( xbox_get_field_value( 'my-theme-options', 'orientation-required' ) == 'on' ) : ?>required="required"<?php endif; ?> style="width: auto; display: inline-block" type="radio" name="video_orientation" value="straight"  class="video_orientation" id="straight" />
                                    <label style="display: inline" for="straight"> <?php echo __('Straight', 'arc');?></label> <br>
                                    <input <?php if( xbox_get_field_value( 'my-theme-options', 'orientation-required' ) == 'on' ) : ?>required="required"<?php endif; ?> style="width: auto; display: inline-block; margin-left: 10px" type="radio" name="video_orientation" value="gay"  class="video_orientation" id="gay" />
                                    <label style="display: inline" for="gay"> <?php echo __('Gay', 'arc');?></label> <br>
                                    <input <?php if( xbox_get_field_value( 'my-theme-options', 'orientation-required' ) == 'on' ) : ?>required="required"<?php endif; ?> style="width: auto; display: inline-block; margin-left: 10px" type="radio" name="video_orientation" value="bi"  class="video_orientation" id="bi" />
                                    <label style="display: inline" for="bi"> <?php echo __('Bi', 'arc');?></label> <br>
                                    <input <?php if( xbox_get_field_value( 'my-theme-options', 'orientation-required' ) == 'on' ) : ?>required="required"<?php endif; ?> style="width: auto; display: inline-block; margin-left: 10px" type="radio" name="video_orientation" value="trans" class="video_orientation" id="trans" />
                                    <label style="display: inline" for="trans"> <?php echo __('Trans', 'arc');?></label> <br>
                                </div>
                            </div>
                        </div>
                        <!-- Thumbnail URL -->
                        <label for="arc-thumb"><?php echo esc_html__('Thumbnail URL', 'arc') ?> <?php if( xbox_get_field_value( 'my-theme-options', 'thumb-required' ) == 'on' ) : ?><span class="required">*</span><?php endif; ?></label>
                        <input type="text" name="arc-thumb" id="thumb" placeholder="<?php echo __('Direct link to the .jpg or .png image', 'arc');?>" value="<?php if(isset($_POST['arc-thumb'])) echo $_POST['arc-thumb'];?>" <?php if( xbox_get_field_value( 'my-theme-options', 'thumb-required' ) == 'on' ) : ?>required="required"<?php endif; ?> />

                        <!----Hidden thumbnail---->
                        <input type="hidden" name="canvas_thumb" id="canvas_thumb" value="" />

                        <!-- Category -->
                        <label for="arc-category"><?php echo esc_html__('Category', 'arc') ?> <?php if( xbox_get_field_value( 'my-theme-options', 'category-required' ) == 'on' ) : ?><span class="required">*</span><?php endif; ?></label>
                        <select style="display: block !important;" <?php if( xbox_get_field_value( 'my-theme-options', 'category-required' ) == 'on' ) : ?>required<?php endif; ?> name="arc-category_selected" data-width="auto" id="submit_select_category">
                            <option value="" selected disabled ><?php echo __('Please select category', 'arc');?></option>
                            <?php $categories = get_terms( 'category', array( 'hide_empty' => 0 ) );
                            foreach ( (array)$categories as $category ): ?>
                                <option value="<?php echo $category->term_id; ?>"><?php echo $category->name;?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="upload_separator"></div>
                        <!-- Tags -->
                        <label for="tags" style="font-family: 'Roboto',sans-serif;
                            font-style: normal !important;
                            font-weight: normal !important;
                            font-size: 14px !important;
                            line-height: 16px !important;">Tags <?php if( xbox_get_field_value( 'my-theme-options', 'tags-required' ) == 'on' ) : ?><span class="required">*</span><?php endif; ?></label>
                        <input type="text" name="arc-tags" id="tags" placeholder="Tags (separated by commas)" value="<?php if(isset($_POST['arc-tags'])) echo $_POST['arc-tags'];?>" <?php if( xbox_get_field_value( 'my-theme-options', 'tags-required' ) == 'on' ) : ?>required="required"<?php endif; ?> />
                        <!-- Actors -->
                        <label for="actors" style="font-family: 'Roboto',sans-serif;
                            font-style: normal !important;
                            font-weight: normal !important;
                            font-size: 14px !important;
                            line-height: 16px !important;">Pornstars <?php if( xbox_get_field_value( 'my-theme-options', 'actors-required' ) == 'on' ) : ?><span class="required">*</span><?php endif; ?></label>
                        <input type="text" name="arc-actors" id="actors" placeholder="Pornstars (separated by commas)" value="<?php if(isset($_POST['arc-actors'])) echo $_POST['arc-actors'];?>" <?php if( xbox_get_field_value( 'my-theme-options', 'actors-required' ) == 'on' ) : ?>required="required"<?php endif; ?> />
                    </fieldset>

                    <legend><?php echo esc_html__( 'Pornstar details', 'arc' ); ?></legend>
                    <fieldset class="fieldset">
                        <!-- Tattoo--->
                        <div id="pornstars_details_div">
                            <div>
                                <legend id="pornstars_details_legend_desktop">Tattoos</legend>
                                <legend id="pornstars_details_legend_mobile" style="display: none">Tattoos</legend>
                                <div>
                                    <input style="width: auto; display: inline-block" type="radio" name="tattoo" class="tattoo" value="on" id="on_tattoo" />
                                    <label style="display: inline" for="on_tattoo"> <?php echo __('Yes', 'arc'); ?></label><br>
                                    <input style="width: auto; display: inline-block;margin-left: 10px" type="radio" name="tattoo" class="tattoo" value="off" id="off_tattoo"/>
                                    <label style="display: inline" for="off_tattoo"> <?php echo __('No', 'arc'); ?></label><br>
                                </div>
                            </div>
                            <div>
                                <!-- Piercing--->
                                <legend><?php echo esc_html__('Piercings', 'arc') ?></legend>
                                <div>
                                    <input style="width: auto; display: inline-block" type="radio" name="piercing" class="piercing" value="on" id="on_piercing"/>
                                    <label style="display: inline" for="on_piercing"> <?php echo __('Yes', 'arc'); ?></label><br>
                                    <input style="width: auto; display: inline-block;margin-left: 10px" type="radio" name="piercing" class="piercing" value="off" id="off_piercing"/>
                                    <label style="display: inline" for="off_piercing"> <?php echo __('No', 'arc'); ?></label><br>
                                </div>
                            </div>
                            <div id="ethnicity_hair">
                                <!--Ethnicity--->
                                <label style="clear:both;padding-left:3px" class="margin-bottom-1" for="ethnicity"><?php echo esc_html__('Ethnicity', 'arc') ?></label>
                                <select name="ethnicity" id="ethnicity"><br/>
                                    <?php $ethnicity = '';?>
                                    <option selected disabled value="0"><?php echo __('Choose ethnicity', 'arc'); ?></option>
                                    <option value="Asian"  <?php if ($ethnicity == "Asian") echo ' selected="selected"';?>><?php echo __('Asian', 'arc'); ?></option>
                                    <option value="Ebony"  <?php if ($ethnicity == "Ebony") echo ' selected="selected"';?>><?php echo __('Ebony', 'arc'); ?></option>
                                    <option value="Indian"  <?php if ($ethnicity == "Indian") echo ' selected="selected"';?>><?php echo __('Indian', 'arc'); ?></option>
                                    <option value="Latino"  <?php if ($ethnicity == "Latino") echo ' selected="selected"';?>><?php echo __('Latino', 'arc'); ?></option>
                                    <option value="Middle Eastern"  <?php if ($ethnicity == "Middle Eastern") echo ' selected="selected"';?>><?php echo __('Middle Eastern', 'arc'); ?></option>
                                    <option value="Mixed"  <?php if ($ethnicity == "Mixed") echo ' selected="selected"';?>><?php echo __('Mixed', 'arc'); ?></option>
                                    <option value="White"  <?php if ($ethnicity == "White") echo ' selected="selected"';?>><?php echo __('White', 'arc'); ?></option>
                                </select>
                                <!--Hair color--->
                                <label style="margin-top: 5px !important;clear:both;padding-left:3px" class="margin-bottom-1" for="hair_color"><?php echo esc_html__('Hair color', 'arc') ?></label>
                                <?php $hair_color = ''; ?>
                                <select name="hair_color" id="hair_color"><br/>
                                    <option selected disabled value="0"><?php echo __('Choose hair color', 'arc'); ?></option>
                                    <option value="Blonde" <?php if ($hair_color == "Blonde") echo ' selected="selected"';?>><?php echo __('Blonde', 'arc'); ?></option>
                                    <option value="Brown" <?php if ($hair_color == "Brown") echo ' selected="selected"';?>><?php echo __('Brown', 'arc'); ?></option>
                                    <option value="Red" <?php if ($hair_color == "Red") echo ' selected="selected"';?>><?php echo __('Red', 'arc'); ?></option>
                                    <option value="Black" <?php if ($hair_color == "Black") echo ' selected="selected"';?>><?php echo __('Black', 'arc'); ?></option>
                                    <option value="Other" <?php if ($hair_color == "Other") echo ' selected="selected"';?>><?php echo __('Other', 'arc'); ?></option>
                                </select>
                            </div>
                        </div>
                        <!-- Bust size-->
                        <label style="clear:both" class="margin-bottom-1" for="bust"><?php echo __('Bust size', 'arc');?></label>
                        <input type="text" name="bust" value="<?php echo $_POST['bust'] ?>" placeholder="<?php echo __('A-K', 'arc') ?>" />
                    </fieldset>
                    <div>
                        <?php wp_nonce_field('post_nonce', 'arc-post_nonce_field'); ?>
                        <?php if ( xbox_get_field_value( 'my-theme-options', 'enable-recaptcha' ) == 'on' && $siteKey != '' && $secret != '' ) : ?>
                            <div class="g-recaptcha" id="captchaHide" data-sitekey="<?php echo $siteKey; ?>" data-callback="hideBlock"></div>
                            <script>
                                function hideBlock() {
                                    setTimeout(function () {
                                        document.getElementById('captchaHide').style.display = 'none';
                                        jQuery('button.large').attr('disabled', false).css('cursor', 'pointer');
                                    }, 500);
                                }
                            </script>
                            <style>
                                button.large {
                                    cursor: not-allowed;
                                }
                            </style>
                            <?php
                            $disabled_btn = 'disabled="disabled"';
                        endif; ?>
                        <?php /*<script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        */ ?>

                        <input type="hidden" name="arc-submitted" id="submitted" value="true" />
                        <?php echo apply_filters('update_button', '<button class="large" type="submit" '.$disabled_btn.'>' . __('Upload', 'arc') . '</button>', 'submit_video' ); ?>
                    </div>
                </form>
            <?php else : ?>
                <?php if(xbox_get_field_value('my-theme-options','upload_video_login') == 'popup'):?>
                <div class="alert"><?php echo 'You need to ';?>
                    <a style="cursor: pointer" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');">Login </a>
                    <?php echo wp_register(" or ", "") . ' to see this page.'?>
                </div>
            <?php else:?>
                <div class="alert"><?php echo 'You need to ' . '<a href="'.wp_login_url() .'">Login </a>'; ?> <?php echo wp_register(" or ", "") . ' to see this page.'?></div>
            <?php endif;?>
            <?php endif; ?>
            <?php else : ?>
                <div style="font-size: 20px;text-align: center;" class="alert"><?php echo esc_html__('Video uploading is currently disabled.', 'arc'); ?></div>
                <script>
                    jQuery(document).ready(function ($) {
                        setTimeout(() => {
                            window.location.href = '/';
                        }, 5000);
                    });
                </script>
            <?php endif; ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-submit-page' ) == 'on' ) {
    get_sidebar();
}
get_footer();