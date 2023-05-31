<?php if ( post_password_required() ) {
	return;
}?>
<div id="comments" class="comments-area" name="comments">
    <?php if(is_user_logged_in()):?>
    <script>
        jQuery(document).ready(function ($){
            function getCookie(name) {
                let matches = document.cookie.match(new RegExp(
                    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
                ));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            }

            if (getCookie('timestamp_comment') !== undefined) {
                if ((Number(getCookie('timestamp_comment')) + 300) > Math.floor(Date.now() / 1000)) {
                    $('p#new_comment_posted').css('display', 'block');
                    $('div#comments input#submit').attr('disabled', true).css('cursor', 'not-allowed');
                }
            }

            if (getCookie('timestamp_comment') !== undefined) {
                let comment_timer = setInterval(function () {
                        if ((Number(getCookie('timestamp_comment')) + 300) < Math.floor(Date.now() / 1000)) {
                            $('p#new_comment_posted').css('display', 'none');
                            $('div#comments input#submit').attr('disabled', false).css('cursor', 'pointer');
                            document.cookie = "timestamp_comment=0" + ';' + 'max-age=0';
                            clearInterval(comment_timer);
                        }
                }, 10000);
            }

            $(document).on('click', 'div#comments input#submit', function(e) {
                if($('textarea#comment').val() == '') {
                    $('textarea#comment').focus();
                    return false;
                }
                let timeStamp = String(Math.floor(Date.now() / 1000));
                document.cookie = `timestamp_comment=${timeStamp}; max-age=600`;
            });

        });
    </script>
    <?php endif;?>
<script>
jQuery(document).ready(function ($){
   $('div#comment_tab_content').find('ol.children').before('<span class="hide_replays">' +
       '<svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">' +
        '<path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="#C32CE2"/>' +
         '</svg>Hide replies</span>');

   $(document).on('click', 'span.hide_replays,span.show_replays', function () {
      var this_class = $(this).attr('class');
      if(this_class == 'hide_replays') {
        $(this).next('ol.children').slideUp(200);
        $(this).html('<svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">' +
         '<path d="M6.83927 5.68659C6.64771 5.86356 6.35229 5.86355 6.16072 5.68659L0.943664 0.867275C0.609395 0.55849 0.827875 -1.15154e-06 1.28294 -1.11176e-06L11.7171 -1.99581e-07C12.1721 -1.59798e-07 12.3906 0.558491 12.0563 0.867276L6.83927 5.68659Z" fill="#C32CE2"/>' +
          '</svg>View replies').attr('class', 'show_replays');
      } else {
        $(this).next('ol.children').slideDown(200);
        $(this).html('<svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">' +
        '<path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="#C32CE2"/>' +
         '</svg>Hide replies').attr('class', 'hide_replays');
      }
   });
});
</script>
	<?php
	if ( have_comments() ) : ?>
	<style>
            #comment_tab_content #approve_comments {
                display: block;
            }
            #comment_tab_content #pending_comments {
                display: none;
            }
            div#comment_tabs button.tab-link {
                font-family: 'Roboto',sans-serif;
                font-style: normal!important;
                font-weight: normal!important;
                font-size: 18px!important;
                line-height: 21px !important;
                color:rgba(<?php
                $hex = get_theme_mod('secondary_text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, .5)!important;
                margin-bottom: 0!important;
                padding: 0!important;
                padding-bottom: 25px !important;
                border-bottom: 1px solid rgba(<?php
                $hex = get_theme_mod('secondary_text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, .5)!important;
            }
            div#comment_tabs button.tab-link.active {
                color:rgba(<?php
                $hex = get_theme_mod('text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1)!important;
                border-bottom: 1px solid rgba(<?php
                $hex = get_theme_mod('text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, 1)!important;
            }
            em.comment-awaiting-moderation {
                margin-left: 60px;
                font-family: 'Roboto',sans-serif;
                font-style: normal!important;
                font-weight: normal!important;
                font-size: 14px!important;
                line-height: 16px !important;
                color:rgba(<?php
                $hex = get_theme_mod('secondary_text_site_color');
                list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                echo $r.",".$g.",". $b;
                ?>, .5)!important;
            }
        </style>
		<?php
		$pending_comments = get_comments([
			'post_id' => $post->ID,
			'status' => 'hold',
			'orderby' => 'comment_date',
			'order' => get_option('comment_order'),
			'hierarchical' => false
		    ]);
        $count_pending_comments = count($pending_comments);?>

        <div class="widget-title" style="margin-top: 20px;width: 100%;display: inline-flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: baseline;padding-bottom: 0;">
            <h2 class="h2_comments">Comments</h2>

            <div id="comment_tabs" class="comment_tabs_desktop">
            <?php if(is_user_logged_in() && current_user_can('administrator')):?>
                <button class="tab-link active approve_comments" data-tab-id="approve_comments" style="margin-bottom: 10px">Approved comments</button>
                <?php if($count_pending_comments > 0):?>
                <button class="tab-link pending_comments" data-tab-id="pending_comments" style="margin-left: 30px;margin-bottom: 10px">Pending comments (<?=$count_pending_comments?>)</button>
                <?php endif;?>
                <?php endif;?>
            </div>
            <?php if(wp_is_mobile()):?>
            <div id="comment_tabs" class="comment_tabs_mobile" style="display: none">
            <?php if(is_user_logged_in() && current_user_can('administrator')):?>
                <button class="tab-link active approve_comments" data-tab-id="approve_comments" style="margin-bottom: 10px">Approved</button>
                <?php if($count_pending_comments > 0):?>
                <button class="tab-link pending_comments" data-tab-id="pending_comments" style="margin-left: 30px;margin-bottom: 10px">Pending (<?=$count_pending_comments?>)</button>
                <?php endif;?>
                <?php endif;?>
            </div>
	        <?php endif;?>
        </div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>

            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">

                <h2 class="screen-reader-text"><?php echo esc_html__( 'Comment navigation', 'arc' ); ?></h2>

                <div class="nav-links">
                    <div class="nav-previous"><?php echo previous_comments_link( esc_html__( 'Older Comments', 'arc' ) ); ?></div>
                    <div class="nav-next"><?php echo next_comments_link( esc_html__( 'Newer Comments', 'arc' ) ); ?></div>
                </div><!-- .nav-links -->
            </nav>
		<?php endif;  ?>

        <div id="comment_tab_content">
            <ul class="comment-list" id="approve_comments" style="padding-left:0">
                <?php
                //echo get_the_ID();
                $comments = get_comments(array(
                'post_id' => $post->ID,
                'status' => 'approve',
                'orderby' => 'comment_date',
                'order' => get_option('comment_order'),
                'hierarchical' => false
                ));


                wp_list_comments( array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'callback'   => 'callback_comment_likes_dislikes',
                ), $comments );
                ?>
            </ul>
            <ul class="comment-list" id="pending_comments" style="padding-left:0">
            <?php
            wp_list_comments( array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'callback'   => 'callback_comment_pending',
                ), $pending_comments );
            ?>
            </ul>
        </div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html__( 'Comment navigation', 'arc' ); ?></h2>
                <div class="nav-links">
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'arc' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'arc' ) ); ?></div>
                </div>
            </nav>
		<?php
		endif;
	endif;
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html__( 'Comments are closed.', 'arc' ); ?></p>
	<?php
	endif;
	$require_chars = (get_option('min_required_characters') !== false) ? get_option('min_required_characters') : 5;
	$linkpage = esc_url( 'https://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
	if ( is_user_logged_in() ) {
		$comments_args = array(
			'fields' => apply_filters(
				'comment_form_default_fields', array(
				'author' =>'<div class="comment-form-author"><label for="author">' . __( 'Name', 'arc' ) . ' <span class="required">*</span></label><input id="author" name="author" type="text" value="' .
				           esc_attr( $commenter['comment_author'] ) . '" size="30" /></div>',
				'email' =>'<div class="comment-form-email"><label for="email">' . __( 'Email', 'arc' ) . ' <span class="required">*</span></label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				          '" size="30" /></div>',
				'url' =>'<div class="comment-form-url"><label for="url">' . __( 'Website', 'arc' ) . '</label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
			) ),
			'comment_field' => '<div class="comment-form-comment full-width">' .
			                   '<label for="comment"></label>' .
			                   '<textarea style="resize: none;" id="comment" name="comment" rows="8" aria-required="true" placeholder="Minimum characters required for comments is '.$require_chars.'"></textarea>' .
			                   '<p id="new_comment_posted" style="display:none">You can post a new comment after 5 minutes</p></div>',
			'comment_notes_after' => '',
			'class_submit'=>'button large margin-top-2 post-comment',
			'title_reply'          => __( 'Leave a Reply' ),
            'title_reply_before'   => '<h2 id="reply-title" class="widget-title">',
            'title_reply_after'    => '<p style="margin-top: 20px!important;">Logged in as <a class="user-profile" href="'.site_url(). '/public-profile/?xxx='.get_current_user_id().'" >'. get_userdata(get_current_user_id())->display_name . '</a><span class="logout">' . sprintf( '<a class="exit" href="%s">Log out?</a>',  wp_logout_url( $linkpage ) ).'</span></p></h2>',
            'cancel_reply_before'  => '<span>',
            'cancel_reply_after'   => '</span>',
            'cancel_reply_link'    => __('Cancel reply'),
		);
	}else{
		$comments_args = array(
			'fields' => apply_filters(
				'comment_form_default_fields', array(
				'author' =>'<div class="comment-form-author"><label for="author">' . __( 'Name', 'arc' ) . ' <span class="required">*</span></label><input id="author" name="author" type="text" value="' .
				           esc_attr( $commenter['comment_author'] ) . '" size="30" /></div>',
				'email' =>'<div class="comment-form-email"><label for="email">' . __( 'Email', 'arc' ) . ' <span class="required">*</span></label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				          '" size="30" /></div>',
				'url' =>'<div class="comment-form-url"><label for="url">' . __( 'Website', 'arc' ) . '</label><input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div>'
			) ),
			'comment_field' => '<div class="row"><div class="comment-form-comment">' .
			                   '<label for="comment"></label>' .
			                   '<textarea style="resize: none;" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Minimum characters required for comments is '.$require_chars.'"></textarea>' .
			                   '</div>',
			'comment_notes_after' => '',
			'class_submit'=>'button large margin-top-2 post-comment',
			'title_reply'          => '',
            'title_reply_before'   => '',
            'title_reply_after'    => '',
            /*'cancel_reply_before'  => '<span>',
            'cancel_reply_after'   => '</span>',
            'cancel_reply_link'    => __( 'Cancel reply' ),*/
			'must_log_in' => '<p style="float: left;margin-top: 8px;" class="must-log-in must-p">You must be <a style="cursor:pointer" onclick="jQuery(\'#auth_modal\').show().css(\'z-index\', \'9999999\');">logged in</a> to post a comment</p>'
		);
	}
	comment_form( $comments_args ); ?>
<?php
function callback_comment_likes_dislikes($comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
	?>
	<style>
        ol.children {
            list-style: none;
            width: calc(100% - 50px);
            margin-left: 55px !important;
        }
        #approve_comments li.comment/*,
        div.comment-list li.parent */{
            padding-top: 15px;
            padding-bottom: 15px;
        }
        #approve_comments ol.children li.comment {
            border-bottom:none;
            padding-bottom: 0;
        }
        #approve_comments ol.children li.parent {
            border-bottom: none;
            padding-bottom: 0px;
        }
    </style>
    <<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
            } ?>
            <div class="comment-author vcard">
                <?php
                if(get_user_meta($GLOBALS['comment']->user_id, 'personal_foto', true) == false) {
                    echo '<svg width="150" height="150" viewBox="0 0 212 212" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="212" height="212" rx="4" fill="#200437"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M81.0001 0H8L69.5808 106.661L8.76343 212H81.7635L106.081 169.881L130.398 212H203.398L142.581 106.661L204.162 0H131.162L106.081 43.4412L81.0001 0Z" fill="#C32CE2" fill-opacity="0.1"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2" fill-opacity="0.5"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="url(#paint0_linear)"/>
                    <defs>
                    <linearGradient id="paint0_linear" x1="79.4282" y1="68.8369" x2="159.667" y2="207.876" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#BA25D6"/>
                    <stop offset="1" stop-color="#200437"/>
                    </linearGradient>
                    </defs>
                    </svg>';
                } else {
                    echo '<img src="'. get_user_meta($GLOBALS['comment']->user_id, 'personal_foto', true).'" width="150">';
                }
                ?>
            </div>
            <div class="comment-meta commentmetadata">
            <div>
            <?php
                $authorID = $GLOBALS['comment']->user_id;
                printf(
                    __( '<cite class="fn">%s</cite> ' ),
                    '<a href="/public-profile/?xxx=' . $authorID.'" class="says">'.get_comment_author().'</a>'
                );
                ?>
                <a class="comment-date" style="margin-right: 60px;" href="<?php echo htmlspecialchars( get_comment_link($comment->comment_ID)); ?>">
                    <?php echo time_ago(get_comment_date("Y-m-d H:i:s",$comment->comment_ID));
                            ?>
                        </a>

                        <?php if(current_user_can('administrator')):  ?>
                        <div class="front-edit-comments" style="display: contents;">
                        <?php echo '<a class="hold" data-comments-id-hold="'. $comment->comment_ID .'" href="#" style="">
<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.9375 5.14062H9.95211V2.89215C9.95211 1.29741 8.62734 0 6.99899 0C5.37064 0 4.04586 1.29741 4.04586 2.89215V5.14062H3.0625C2.15786 5.14062 1.42188 5.87661 1.42188 6.78125V12.3594C1.42188 13.264 2.15786 14 3.0625 14H10.9375C11.8421 14 12.5781 13.264 12.5781 12.3594V6.78125C12.5781 5.87661 11.8421 5.14062 10.9375 5.14062ZM5.13961 2.89215C5.13961 1.9005 5.97373 1.09375 6.99899 1.09375C8.02424 1.09375 8.85836 1.9005 8.85836 2.89215V5.14062H5.13961V2.89215ZM5.98828 8.83203C5.98828 8.27326 6.44123 7.82031 7 7.82031C7.55877 7.82031 8.01172 8.27326 8.01172 8.83203C8.01172 9.18969 7.82597 9.50373 7.54586 9.68365V10.8828C7.54586 11.1848 7.301 11.4297 6.99899 11.4297C6.69695 11.4297 6.45211 11.1848 6.45211 10.8828V9.68237C6.17312 9.50223 5.98828 9.18881 5.98828 8.83203Z" fill="white"/>
</svg></a>'; ?>
                        <?php echo '<a class="comment-edit-link" href="' . get_edit_comment_link( $comment->comment_ID) . '" style="">
<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.3499 6.20002C11.9905 6.20002 11.7 6.49126 11.7 6.84998V12.05C11.7 12.4081 11.4087 12.7 11.05 12.7H1.94999C1.59115 12.7 1.30004 12.4081 1.30004 12.05V2.94999C1.30004 2.59187 1.59115 2.30004 1.94999 2.30004H7.15002C7.50945 2.30004 7.79998 2.0088 7.79998 1.65008C7.79998 1.29124 7.50945 1 7.15002 1H1.94999C0.874903 1 0 1.8749 0 2.94999V12.05C0 13.1251 0.874903 14 1.94999 14H11.05C12.1251 14 13 13.1251 13 12.05V6.84998C13 6.49055 12.7094 6.20002 12.3499 6.20002Z" fill="white" fill-opacity="0.5"/>
                    <path d="M5.48576 6.50245C5.44595 6.54225 5.41918 6.59289 5.40782 6.64749L5.00554 8.65979C4.98678 8.75305 5.01637 8.84922 5.08347 8.91695C5.13755 8.97103 5.21038 9 5.28498 9C5.30311 9 5.32197 8.99833 5.34072 8.99437L7.35224 8.59206C7.40798 8.5806 7.45862 8.55392 7.4979 8.51401L12 4.01157L9.98848 2L5.48576 6.50245Z" fill="white" fill-opacity="0.5"/>
                    <path d="M13.6114 0.388274C13.0938 -0.129425 12.2518 -0.129425 11.7347 0.388274L11 1.12306L12.8767 3L13.6114 2.26511C13.862 2.01506 14 1.6816 14 1.32694C14 0.972276 13.862 0.63881 13.6114 0.388274Z" fill="white" fill-opacity="0.5"/>
                    </svg>
</a>'; ?>

<?php echo '<a href="#" style="" class="delete" data-comments-id-delete="'.$comment->comment_ID.'">
<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0817 1.06879C11.7888 0.775898 11.3139 0.775898 11.021 1.06879L6.46795 5.62183L1.91498 1.06886C1.62209 0.77597 1.14722 0.77597 0.854323 1.06886C0.56143 1.36176 0.56143 1.83663 0.854323 2.12952L5.40729 6.68249L0.21967 11.8701C-0.0732233 12.163 -0.0732232 12.6379 0.21967 12.9308C0.512563 13.2237 0.987437 13.2237 1.28033 12.9308L6.46795 7.74315L11.6556 12.9309C11.9485 13.2237 12.4234 13.2237 12.7163 12.9309C13.0092 12.638 13.0092 12.1631 12.7163 11.8702L7.52861 6.68249L12.0817 2.12945C12.3745 1.83656 12.3745 1.36168 12.0817 1.06879Z" fill="white" fill-opacity="0.5"/>
                        </svg></a>';?>
                        </div>
                        <?php endif; ?>

                </div>
                <?php comment_text(); ?>
                <div class="reply">
                    <ul class="comment_votes_statistic">
                    <?php $vote = alreadyVotedComment(get_comment_ID());
                        if($vote[1] == 'like') :?>
                            <script>
                                jQuery(document).ready(function ($) {
                                    $("div#div-comment-<?php echo $vote[0]?> li[data-comment_like='dislike'] span i").css('color', '#ccc !important');
                                    $("div#div-comment-<?php echo $vote[0]?> li[data-comment_like='like'] span i").css('color', arc_ajax_var.buttonsColor + ' !important');
                                });
                            </script>
                        <?php elseif($vote[1] == 'dislike'):?>
                            <script>
                                jQuery(document).ready(function ($) {
                                    $("div#div-comment-<?php echo $vote[0]?> li[data-comment_like='like'] span i").css('color', '#ccc !important');
                                    $("div#div-comment-<?php echo $vote[0]?> li[data-comment_like='dislike'] span i").css('color', arc_ajax_var.buttonsColor + ' !important');
                                });
                            </script>
                        <?php endif;
                    ?>
                    <?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
                        <?php
                        $like_count     = intval(get_comment_meta(get_comment_ID(), "likes_count", true));
                        $dislike_count  = intval(get_comment_meta(get_comment_ID(), "dislikes_count", true));
                        $total_count    =  $like_count + abs($dislike_count);
                        ?>
                        <?php if(is_user_logged_in()):?>
                            <li style="/*display: <?php //echo $likes;?>;*/ cursor: pointer;" class="li_likes" data-comment_like="like" data-comment_id="<?php echo get_comment_ID()?>"><span><i class="fa fa-thumbs-up" style="color: #cccccc !important; opacity:0.5"></i> <span class="comment_likes" data-comment_id="<?php echo get_comment_ID()?>"><?php echo get_comment_meta(get_comment_ID(), 'likes_count', true) ?></span></span></li>
                            <li style="/*display: <?php //echo $dislikes;?>;*/ cursor: pointer;" class="li_likes" data-comment_like="dislike" data-comment_id="<?php echo get_comment_ID()?>"><span><i class="fa fa-thumbs-down" style="color: #cccccc !important;opacity:0.5"></i> <span class="comment_dislikes" data-comment_id="<?php echo get_comment_ID()?>"><?php echo get_comment_meta(get_comment_ID(), 'dislikes_count', true) ?></span></span></li>
                        <?php else:?>
                            <?php if(xbox_get_field_value('my-theme-options', 'allow_rating') == 'off'):?>
                                <li style="cursor: pointer;" class="li_likes"><span><i class="fa fa-thumbs-up" style="color: inherit;" onclick="jQuery(document).ready(($)=>{
                                    $('#auth_modal').show();
                                });"></i> <span class="comment_likes"><?php echo get_comment_meta(get_comment_ID(), 'likes_count', true) ?></span></span></li>
                                <li style="cursor: pointer;" class="li_likes"><span><i class="fa fa-thumbs-down" style="color: inherit;" onclick="jQuery(document).ready(($)=>{
                                    $('#auth_modal').show();
                                });"></i> <span class="comment_dislikes"><?php echo get_comment_meta(get_comment_ID(), 'dislikes_count', true) ?></span></span></li>
                            <?php else:?>
                                <li style="/*display: <?php //echo $likes;?>;*/ cursor: pointer;" class="li_likes" data-comment_like="like" data-comment_id="<?php echo get_comment_ID()?>"><span><i class="fa fa-thumbs-up" style="color: #cccccc !important;opacity:0.5"></i> <span class="comment_likes" data-comment_id="<?php echo get_comment_ID()?>"><?php echo get_comment_meta(get_comment_ID(), 'likes_count', true) ?></span></span></li>
                                <li style="/*display: <?php //echo $dislikes;?>;*/ cursor: pointer;" class="li_likes" data-comment_like="dislike" data-comment_id="<?php echo get_comment_ID()?>"><span><i class="fa fa-thumbs-down" style="color: #cccccc !important;opacity:0.5"></i> <span class="comment_dislikes" data-comment_id="<?php echo get_comment_ID()?>"><?php echo get_comment_meta(get_comment_ID(), 'dislikes_count', true) ?></span></span></li>
                            <?php endif;?>
                        <?php endif;?>
                        <?php endif;?>
                        <style>
                            a.comment-reply-login {
                                margin-top: 5px !important;
                                margin-left: 10px;
                            }
                        </style>
                        <?php
                        comment_reply_link(
                            array_merge(
                                $args,
                                array( 'before' => '<li>',
                                    'after' => '</li>',
                                    'add_below' => $add_below,
                                    'depth'     => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'reply_text' => __('Reply', 'arc'),
                                    'login_text' => __('Reply', 'arc'),
                                )
                            )
                        ); ?>
                        <?php if(!is_user_logged_in()):?>
                        <script>
                            jQuery(document).ready(($)=>{
                                $('a.comment-reply-login').on('click', function (e) {
                                    e.preventDefault();
                                    $('#auth_modal').show();
                                });
                            });
                        </script>
                        <?php endif;?>

                        <?php
                        $all_id = explode('|,', $_COOKIE['antispam_for_comment']);

                        if(array_search(get_comment_ID(), $all_id) === false):?>
                            <li class="li_report" data-comment_id="<?php echo get_comment_ID()?>" style="display: inline-flex; cursor: pointer;padding: 0em 0em;">
                                <a style="cursor: pointer;"><?php echo __('Report', 'arc');?></a></li>
                        <?php else:?>
                            <li style="display: inline-flex; padding: 0em 0em;">
                                <span><?php echo __('Reported', 'arc');?></span></li>
                        <?php endif;?>

                    </ul>
                </div>
            </div>
	<?php if ( 'div' != $args['style'] ) { ?>
        </div>
	<?php }
}

function callback_comment_pending($comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	$classes = ' ' . comment_class( empty( $args['has_children'] ) ? '' : 'parent', null, null, false );
	?>
	<style>
        ol.children {
            list-style: none;
            width: calc(100% - 50px);
            margin-left: 55px !important;
        }
        #pending_comments li.comment /*,
        div.comment-list li.parent */{
            padding-top: 5px;
            padding-bottom: 15px;
        }
        #pending_comments li:last-child{
            padding-bottom: 15px;
        }
        #pending_comments ol.children li.comment {
            border-bottom:none;
        }
        #pending_comments ol.children li.parent {
            border-bottom: none;
            padding-bottom: 0px;
        }
    </style>
    <<?php echo $tag, $classes; ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
            } ?>
            <div class="comment-author vcard">
                <?php
                if(get_user_meta($GLOBALS['comment']->user_id, 'personal_foto', true) == false) {
                    echo '<svg width="150" height="150" viewBox="0 0 212 212" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="212" height="212" rx="4" fill="#200437"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M81.0001 0H8L69.5808 106.661L8.76343 212H81.7635L106.081 169.881L130.398 212H203.398L142.581 106.661L204.162 0H131.162L106.081 43.4412L81.0001 0Z" fill="#C32CE2" fill-opacity="0.1"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2" fill-opacity="0.5"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="url(#paint0_linear)"/>
                    <defs>
                    <linearGradient id="paint0_linear" x1="79.4282" y1="68.8369" x2="159.667" y2="207.876" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#BA25D6"/>
                    <stop offset="1" stop-color="#200437"/>
                    </linearGradient>
                    </defs>
                    </svg>';
                } else {
                    echo '<img src="'. get_user_meta($GLOBALS['comment']->user_id, 'personal_foto', true).'" width="150">';
                }
                ?>
            </div>
            <div class="comment-meta commentmetadata">
                <?php
                $authorID = $GLOBALS['comment']->user_id;
                printf(
                    __( '<cite class="fn">%s</cite> ' ),
                    '<a href="/public-profile/?xxx=' . $authorID.'" class="says">'.get_comment_author().'</a>'
                );
                ?>
                <a class="comment-date" style="margin-right: 60px;" href="<?php echo htmlspecialchars( get_comment_link($comment->comment_ID)); ?>">
                            <?php echo time_ago(get_comment_date('Y-m-d H:i:s',$comment->comment_ID));
                            ?>
                        </a>
                <?php if(current_user_can('administrator')):  ?>
                <div class="front-edit-comments" style="display: contents;">
                <?php echo '<a class="approved" data-comments-id-approve="'. $comment->comment_ID .'" href="#" style="">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url()">
                <path d="M10.9375 5.14062H5.13961V2.89215C5.13961 1.9005 5.97373 1.09375 6.99899 1.09375C8.02424 1.09375 8.85836 1.9005 8.85836 2.89215V2.9375H9.95211V2.89215C9.95211 1.29741 8.62734 0 6.99899 0C5.37064 0 4.04586 1.29741 4.04586 2.89215V5.14062H3.0625C2.15786 5.14062 1.42188 5.87661 1.42188 6.78125V12.3594C1.42188 13.264 2.15786 14 3.0625 14H10.9375C11.8421 14 12.5781 13.264 12.5781 12.3594V6.78125C12.5781 5.87661 11.8421 5.14062 10.9375 5.14062ZM11.4844 12.3594C11.4844 12.6609 11.239 12.9062 10.9375 12.9062H3.0625C2.76095 12.9062 2.51562 12.6609 2.51562 12.3594V6.78125C2.51562 6.4797 2.76095 6.23438 3.0625 6.23438H10.9375C11.239 6.23438 11.4844 6.4797 11.4844 6.78125V12.3594Z" fill="white" fill-opacity="0.5"/>
                <path d="M7 7.82031C6.44123 7.82031 5.98828 8.27326 5.98828 8.83203C5.98828 9.18881 6.17312 9.50223 6.45211 9.68237V10.8828C6.45211 11.1848 6.69695 11.4297 6.99899 11.4297C7.301 11.4297 7.54586 11.1848 7.54586 10.8828V9.68365C7.82597 9.50373 8.01172 9.18969 8.01172 8.83203C8.01172 8.27326 7.55877 7.82031 7 7.82031Z" fill="white" fill-opacity="0.5"/>
                </g>
                <defs>
                <clipPath >
                <rect width="14" height="14" fill="white"/>
                </clipPath>
                </defs>
                </svg>
                </a>'; ?>

                <?php echo '<a class="comment-edit-link" href="' . get_edit_comment_link( $comment->comment_ID) . '" style="">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.3499 6.20002C11.9905 6.20002 11.7 6.49126 11.7 6.84998V12.05C11.7 12.4081 11.4087 12.7 11.05 12.7H1.94999C1.59115 12.7 1.30004 12.4081 1.30004 12.05V2.94999C1.30004 2.59187 1.59115 2.30004 1.94999 2.30004H7.15002C7.50945 2.30004 7.79998 2.0088 7.79998 1.65008C7.79998 1.29124 7.50945 1 7.15002 1H1.94999C0.874903 1 0 1.8749 0 2.94999V12.05C0 13.1251 0.874903 14 1.94999 14H11.05C12.1251 14 13 13.1251 13 12.05V6.84998C13 6.49055 12.7094 6.20002 12.3499 6.20002Z" fill="white" fill-opacity="0.5"/>
                    <path d="M5.48576 6.50245C5.44595 6.54225 5.41918 6.59289 5.40782 6.64749L5.00554 8.65979C4.98678 8.75305 5.01637 8.84922 5.08347 8.91695C5.13755 8.97103 5.21038 9 5.28498 9C5.30311 9 5.32197 8.99833 5.34072 8.99437L7.35224 8.59206C7.40798 8.5806 7.45862 8.55392 7.4979 8.51401L12 4.01157L9.98848 2L5.48576 6.50245Z" fill="white" fill-opacity="0.5"/>
                    <path d="M13.6114 0.388274C13.0938 -0.129425 12.2518 -0.129425 11.7347 0.388274L11 1.12306L12.8767 3L13.6114 2.26511C13.862 2.01506 14 1.6816 14 1.32694C14 0.972276 13.862 0.63881 13.6114 0.388274Z" fill="white" fill-opacity="0.5"/>
                    </svg>
                    </a>'; ?>
                <?php echo '<a href="#" style="" class="delete" data-comments-id-delete="'.$comment->comment_ID.'"><svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0817 1.06879C11.7888 0.775898 11.3139 0.775898 11.021 1.06879L6.46795 5.62183L1.91498 1.06886C1.62209 0.77597 1.14722 0.77597 0.854323 1.06886C0.56143 1.36176 0.56143 1.83663 0.854323 2.12952L5.40729 6.68249L0.21967 11.8701C-0.0732233 12.163 -0.0732232 12.6379 0.21967 12.9308C0.512563 13.2237 0.987437 13.2237 1.28033 12.9308L6.46795 7.74315L11.6556 12.9309C11.9485 13.2237 12.4234 13.2237 12.7163 12.9309C13.0092 12.638 13.0092 12.1631 12.7163 11.8702L7.52861 6.68249L12.0817 2.12945C12.3745 1.83656 12.3745 1.36168 12.0817 1.06879Z" fill="white" fill-opacity="0.5"/>
                        </svg></a>';?>
                </div>
                <?php endif; ?>
                <?php comment_text(); ?>
                <?php if ( $comment->comment_approved == '0' ) { ?>
                <em class="comment-awaiting-moderation">
                    <?php _e( 'Comment is awaiting moderation.' ); ?>
                </em><br/>
            <?php } ?>
            </div>
	<?php if ( 'div' != $args['style'] ) { ?>
        </div>
	<?php }
}
?>
</div><!---comments---->
