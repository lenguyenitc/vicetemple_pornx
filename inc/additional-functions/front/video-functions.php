<?php
if ( ! function_exists( 'arc_get_video_duration' ) ) {
	function arc_get_video_duration( $type_length = '' ) {
		global $post;
		$duration = intval( get_post_meta( $post->ID, 'duration', true ) );
		if ( $duration > 0 ) {
			if ( $duration >= 3600 ) {
				return gmdate( 'H:i:s', $duration );
			} else {
				return gmdate( 'i:s', $duration );
			}
		} else {
			return false;
		}
	}
}
if ( ! function_exists( 'arc_get_duration_sec' ) ) {
	function arc_get_duration_sec( $duration, $sponsor ) {
		switch ( $sponsor ) {
			case 'pornhub':
			case 'redtube':
			case 'spankwire':
			case 'tube8':
			case 'xhamster':
			case 'youporn':
				$min = explode( ':', $duration );
				$sec = explode( ':', $duration );
				return (int) $min[0] * 60 + (int) $sec[1];
				break;
			case 'xvideos':
				$duration = str_replace( array( '- ', 'h', 'min', 'sec' ), array( '', 'hours', 'minutes', 'seconds' ), $duration );
				return strtotime( $duration ) - strtotime( 'NOW' );
				break;
			default:
				return false;
		}
	}
}
if ( ! function_exists( 'arc_getPostViews' ) ) {
	function arc_getPostViews( $postID ) {
		$count_key = 'post_views_count';
		$count     = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
			return '0';
		}
		if($count > 999) $count = number_format($count, 0, ',', ',');
		return $count;
	}
}
// Duration in ISO 8601

if ( ! function_exists( 'arc_iso8601_duration' ) ) {
	function arc_iso8601_duration( $seconds ) {
		$seconds = (int) $seconds;
		$days    = floor( $seconds / 86400 );
		$seconds = $seconds % 86400;
		$hours   = floor( $seconds / 3600 );
		$seconds = $seconds % 3600;
		$minutes = floor( $seconds / 60 );
		$seconds = $seconds % 60;
		return sprintf( 'P%dDT%dH%dM%dS', $days, $hours, $minutes, $seconds );
	}
}
if ( ! function_exists( 'arc_get_multithumbs' ) ) {
	function arc_get_multithumbs( $post_id ) {
		global $post;
		$thumbs = null;
		if ( has_post_thumbnail() ) {
			$args       = array(
				'post_type'   => 'attachment',
				'numberposts' => -1,
				'post_status' => 'any',
				'post_parent' => $post->ID,
			);
			$thumb_size = 'arc_thumb_small';
			$attachments = get_attached_media( 'image' );
			if ( count( $attachments ) > 1 ) {
				foreach ( (array) $attachments as $attachment ) {
					$thumbs_array = wp_get_attachment_image_src( $attachment->ID, $thumb_size );
					$thumbs[]     = $thumbs_array[0];
				}
				sort( $thumbs );
			} else {
				$thumbs1 = get_post_meta( $post_id, 'thumbnails', false );
				foreach ($thumbs1 as $thumb) {
					$thumbs[] = wp_get_attachment_image_url($thumb, 'arc_thumb_small');
				}
			}
		} else {
			$thumbs1 = get_post_meta( $post_id, 'thumbnails', false );
			foreach ($thumbs1 as $thumb) {
				$thumbs[] = wp_get_attachment_image_url($thumb, 'arc_thumb_small');
			}
		}
		if ( is_ssl() ) {
			$thumbs = str_replace( 'http://', 'https://', $thumbs );
		}
		if ( is_array( $thumbs ) ) {
			return implode( ',', $thumbs );
		}
		return false;
	}
}
if ( ! function_exists( 'arc_entry_footer' ) ) {
	function arc_entry_footer() {
		$symbols = ['`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '\\', '|', '/', '\'', '[', ']', '{', '}', '<', '>', '"', ':', ';', ',', '.', '?', ' ' ];
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$posttags = get_the_tags();
			if (/* $postcats ||*/ $posttags ) {
				echo '<div class="tags-header"><span>Tags:</span>';
				echo '<div class="tags-list"><div class="hidden-tags-list">';
				if ( $posttags !== false && xbox_get_field_value( 'my-theme-options', 'show-tags' ) == 'on' ) {
					foreach ( (array) $posttags as $tag ) {
						$tag_name = restyle_tag( $tag->name );
						$flag = false;
						for($i = 0; $i < strlen($tag_name); $i++){
							if (array_search($tag_name[$i], $symbols) === false) {
								$flag = true;
							}
						}
						if ($flag === false && (xbox_get_field_value('my-theme-options', 'tag_symbols') == 'remove_symbols' || xbox_get_field_value('my-theme-options', 'tag_symbols') == 'replace_symbols'))
							continue;
                        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
						echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="label a-tags" title="' . $tag->name . '">' . $tag_name . '</a> ';
					}
				}
				echo '</div></div></div>';
			}
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'arc' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}
	}
}

if (! function_exists('arc_get_tags_for_form')) {
    function arc_get_tags_for_form() {
	    $symbols = ['`', '~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '\\', '|', '/', '\'', '[', ']', '{', '}', '<', '>', '"', ':', ';', ',', '.', '?', ' ' ];
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            //$postcats = get_the_category();
            $posttags = get_the_tags();
            if (/* $postcats ||*/ $posttags ) {
                echo '<div class="tags-list" style="display: flex;width: 100%">';

                if ( true ) {
                    foreach ( (array) $posttags as $tag ) {
	                    $tag_name = restyle_tag( $tag->name );
	                    $flag = false;
	                    for($i = 0; $i < strlen($tag_name); $i++){
		                    if (array_search($tag_name[$i], $symbols) === false) {
			                    $flag = true;
		                    }
	                    }
	                    if ($flag === false && (xbox_get_field_value('my-theme-options', 'tag_symbols') == 'remove_symbols' || xbox_get_field_value('my-theme-options', 'tag_symbols') == 'replace_symbols'))
		                    continue;
                        //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
                        echo '<div class="render-x">';
                        echo '<a href="' . get_tag_link( $tag->term_id ) . '" class="label a-tags" title="' . $tag->name . '">' . $tag_name . '</a>';
                        echo '<span><svg class="fa-close" data-tag_slug="'.$tag->slug.'" width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M7.46688 9.02308C7.66888 9.22507 7.99638 9.22507 8.19837 9.02308C8.40037 8.82108 8.40037 8.49358 8.19837 8.29159L4.90645 4.99966L8.19788 1.70823C8.39988 1.50623 8.39988 1.17873 8.19788 0.976736C7.99589 0.774741 7.66839 0.774741 7.46639 0.976736L4.17496 4.26817L0.883474 0.976692C0.681478 0.774696 0.353979 0.774696 0.151984 0.976692C-0.0500114 1.17869 -0.0500113 1.50619 0.151984 1.70818L3.44347 4.99966L0.151497 8.29163C-0.0504988 8.49363 -0.0504988 8.82113 0.151496 9.02312C0.353492 9.22512 0.680991 9.22512 0.882986 9.02312L4.17496 5.73115L7.46688 9.02308Z" fill="#C4C4C4"/>
								</svg></span></div>';
                    }
                }
                echo '</div>';
            }
        }
        if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
            echo '<span class="comments-link">';
            /* translators: %s: post title */
            comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'arc' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
            echo '</span>';
        }
    }
}

if ( ! function_exists( 'arc_entry_categories' ) ) {
	function arc_entry_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$postcats = get_the_category();
			if ( $postcats) {
				echo '<div class="cat-header"><span>Categories:</span>';
				echo '<div class="cat-list okoko">';
				if ( $postcats !== false && xbox_get_field_value( 'my-theme-options', 'show-categories' ) == 'on' ) {
					foreach ( (array) $postcats as $cat ) {
						echo '<a href="' . get_category_link( $cat->term_id ) . '" class="label a-cats" title="' . $cat->name . '">' . $cat->name . '</a> ';
					}
				}
				echo '</div></div>';
			}
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'arc' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}
	}
}
