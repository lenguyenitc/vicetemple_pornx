<?php
/***
 * Template Name: Submit Images
 */
ob_start();
get_header();
 if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-submit-photo-page' ) == 'on' ) {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' )
	{ $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
}
$siteKey = xbox_get_field_value( 'my-theme-options', 'reCaptcha-settings1' );
$secret = xbox_get_field_value( 'my-theme-options', 'reCaptcha-settings2' );
 ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?> video-submit-area">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <header class="entry-header">
                <h1 class="widget-title" style="text-align: center;"><?php echo __('Album Upload', 'arc');?></h1>
            </header>
            <?php if( xbox_get_field_value( 'my-theme-options', 'display-submit-photo' ) == 'on' || current_user_can('administrator')) :?>
            <?php if(is_user_logged_in()):?>
            <!---modal for delete btn---->
            <style>
                .modalDelMsg3 {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    max-width: 600px;
                    width: 100%;
                    z-index: 999999;
                    display: none;
                }
                .modalDelMsg3.closed {
                    display: none;
                }
                .modal-guts-del3 {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    padding: 20px 50px 20px 20px;
                    display: contents;
                }
                .modal-overlay-del3 {
                    z-index: -1000;
                    position: fixed;
                    top:0;
                    left:0;
                    width: 100%;
                    height: 100%;
                   /* background: rgba(15, 23, 37, 0.9);*/
                    backdrop-filter: blur(5px);
                }
                #close-button-del3 {
                    position: absolute;
                    right: 0;
                    top: 0;
                    border-color: transparent !important;
                    background-color: transparent !important;
                    z-index: 999999;
                }

                #modalDelMsg3{
                    background: <?=get_theme_mod('secondary_color_setting')?>;
                    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
                    border-radius: 10px;
                    padding: 40px 85px;
                    border: none !important;
                }
                #modalDelMsg3 div.modal-guts-del3 div {
                    font-family: 'Roboto',sans-serif;
                    font-style: normal;
                    font-weight: normal;
                    text-align: center;
                }
                #modalDelMsg3 div.modal-guts-del3 div h2{
                    font-family: 'Roboto',sans-serif;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 36px;
                    line-height: 42px;
                    text-align: center;
                    color: <?=get_theme_mod('text_site_color')?>;
                    margin-top: 15px;
                }
                #modalDelMsg3 div.modal-guts-del3 div span.confirm3{
                    font-family: 'Roboto',sans-serif;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 18px;
                    line-height: 21px;
                    text-align: center;
                    color: <?=get_theme_mod('text_site_color')?>;
                    margin: 0 auto;
                }
                #modalDelMsg3 #close-button-del3 svg{
                    position: absolute;
                    margin-top: -30px;
                    margin-left: 20px;
                }
                #close-button-del3 {
                    border: none !important;
                    background: transparent !important;
                    box-shadow: none !important;
                }

            </style>
            <div class="modalDelMsg3 alert alert-success" id="modalDelMsg3">
                <button class="class-button" id="close-button-del3">
                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                        <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                    </svg>
                </button>
                <div class="modal-guts-del3">
                    <div>
                        <h2>Uploaded successfully!</h2>
                        <span class="confirm3">Your album is being moderated.</span>
                    </div>
                </div>
            </div>
            <div class="modal-overlay-del3" id="modal-overlay-del3"></div>
            <!--- [end] modal for delete btn---->
                <form enctype="multipart/form-data" method="POST" id="forms" class="create_an_album" onsubmit="return false">
                    <legend><?php echo esc_html__('Album information', 'arc'); ?></legend>
                    <fieldset class="fieldset">
                        <label for="input_album" style="font-family: 'Roboto',sans-serif;
                            font-style: normal !important;
                            font-weight: normal !important;
                            font-size: 14px !important;
                            line-height: 16px !important;">Title <span class="required">*</span></label>
                        <input type="text" placeholder="Album title" name="album" value="" id="input_album" style="width: 100%;"  required="required" />
                        <!-- Tags -->
                        <label for="tags" style="font-family: 'Roboto',sans-serif;
                            font-style: normal !important;
                            font-weight: normal !important;
                            font-size: 14px !important;
                            line-height: 16px !important;">Tags <span class="required">*</span></label>
                        <input type="text" style="width: 100%" name="photo-tags" id="tags" required="required" placeholder="Tags (separated by commas)" />
                        <!-- Category -->
                        <label for="arc-category"><?php echo esc_html__('Category', 'arc') ?> <?php if( xbox_get_field_value( 'my-theme-options', 'category-required' ) == 'on' ) : ?><span class="required">*</span><?php endif; ?></label>
                        <select style="display: block !important;" <?php if( xbox_get_field_value( 'my-theme-options', 'category-required' ) == 'on' ) : ?>required<?php endif; ?> name="arc-category_selected" data-width="auto" id="submit_select_category">
                            <option value="" selected disabled ><?php echo __('Please select category', 'arc');?></option>
                            <?php $categories = get_terms( 'photos_category', array( 'hide_empty' => 0 ) );
                            foreach ( (array)$categories as $category ): ?>
                                <option value="<?php echo $category->term_id; ?>"><?php echo $category->name;?></option>
                            <?php endforeach;?>
                        </select>
                    </fieldset>
                    <legend><?php echo esc_html__('Upload images', 'arc'); ?> <span class="required">*</span></legend>
                    <fieldset class="fieldset">
                        <ul id="upload_photos_area"></ul>
                        <div id="dropbox">
                            <div class="tooltip">
                                <span class="tooltiptext" style="padding-left:5px; padding-right:5px">Please select images for upload</span>
                            </div>
                            <p style="text-align: center;margin-top: 75px;"><?php echo __('Drag files here or ')?><a id="browse_files">browse</a>
                                <br><br>
                                <span><?php echo __('Accepted formats .jpg, .jpeg, .png, .gif','arc');?></span>
                            </p>
                        </div>
                        <?php wp_nonce_field( 'my_image_upload', 'my_image_upload_nonce' ); ?>
                        <input style="display:none" required="required" type="file" name="userfile" multiple accept="image/jpeg, image/jpg, image/png" id="array_photos"/>
                    </fieldset>
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
                    <button class="large" <?=$disabled_btn;?> type="submit"><?php echo __('Upload', 'arc');?></button>
                </form>
                <style>
                    ul#upload_photos_area {
                        list-style-position: inside;
                        -moz-column-count: 2;
                        -webkit-column-count: 2;
                        column-count: 2;
                        list-style: none;
                    }
                    img.obj {
                        width: 50px;
                        height: 50px;
                        margin-right: 10px;
                        border-radius: 5px;
                    }
                    li.img_item {
                        display: inline-flex;
                        vertical-align: middle;
                        margin-bottom: 25px;
                        width: calc((100% - 20px)/1);
                    }
                    li.img_item p {
                        display: flex;
                        justify-content: space-between;
                        width: calc(100% - 70px);
                    }
                    span.img_edit_delete i.fa-edit {
                        color: <?php echo get_theme_mod( 'icons_color_setting'); ?>!important;
                        font-size: 20px;
                        cursor: pointer;
                    }

                    span.img_edit_delete i.fa-close {
                        color: red;
                        font-size: 20px;
                        cursor: pointer;
                    }
                    span.img_edit_delete i.fa-check {
                        cursor: pointer;
                        font-size: 20px;
                    }
                    span.img_name {
                        margin-right: 10px;
                        width: 100%;
                        max-width: 150px;
                    }
                    span.img_name > span {
                        float: left;
                        max-width: 150px;
                        text-overflow: ellipsis;
                        overflow: hidden;
                        white-space: nowrap;
                    }
                    span.img_name i.fa-spinner.fa-pulse {
                        color: <?=get_theme_mod('icons_color_setting')?> !important;
                        display:none;
                        margin-left: 10px;
                        font-size: 20px;
                    }
                    #dropbox {
                        width: 100%;
                        height: 125px;
                    }
                    #browse_files {
                        cursor: pointer;
                        color: <?=get_theme_mod('btn_color_setting')?> !important;
                    }
                </style>
                <?php else : ?>
	        <?php if(xbox_get_field_value('my-theme-options','upload_images_login') == 'popup'):?>
            <div class="alert"><?php echo 'You need to ';?>
                <a style="cursor: pointer" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');">Login </a>
	            <?php echo wp_register(" or ", "") . ' to see this page.'?>
            </div>
        <?php else:?>
            <div class="alert"><?php echo 'You need to ' . '<a href="'. wp_login_url().'"> Login </a>'; ?> <?php echo wp_register(" or ", "") . ' to see this page.'?></div>
        <?php endif;?>
                <?php endif; ?>
                <script>
                    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                    /*var true_posts = '<?php //echo serialize($wp_query->query_vars); ?>';*/
                    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                    var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                </script>
			<?php else : ?>
                <div style="font-size: 20px;text-align: center;" class="alert"><?php echo esc_html__('Image uploading is currently disabled.', 'arc'); ?></div>
                <script>
                    jQuery(document).ready(function ($) {
                        setTimeout(() => {
                            window.location.href = '/';
                        }, 5000);
                    });
                </script>
			<?php endif; ?>
            <style>
                /* Tooltip container */
                .tooltip {
                    display: none;
                    position: absolute;
                    left: 53%;
                    margin-top: -10px;
                }

                /* Tooltip text */
                .tooltip .tooltiptext {
                    visibility: hidden;
                    width: 150px;
                    background-color:#0F1725;
                    color:<?=get_theme_mod('text_site_color');?>;
                    font-family: 'Roboto',sans-serif !important;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 14px;
                    line-height: 16px;
                    text-align: center;
                    padding: 5px 0;
                    border-radius: 4px;
                    /* Position the tooltip text */
                    position: absolute;
                    z-index: 1;
                    bottom: 125%;
                    left: 50%;
                    margin-left: -60px;
                    /* Fade in tooltip */
                    opacity: 0;
                    transition: opacity 0.3s;
                    padding-left:5px;
                    padding-right:5px
                }

                /* Tooltip arrow */
                .tooltip .tooltiptext::after {
                    content: "";
                    position: absolute;
                    top: 100%;
                    left: 50%;
                    margin-left: -5px;
                    border-width: 5px;
                    border-style: solid;
                    border-color: #0F1725 transparent transparent transparent;
                }
            </style>
        </main>
    </div>

<?php
    if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-submit-photo-page' ) == 'on' ) {
		get_sidebar();
    }
get_footer();