<?php //// begin breadcrumbs

function arc_breadcrumbs() {
	$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter = '<i class="fa fa-caret-right"></i>'; // delimiter between crumbs
	$home = 'Home'; // text for the 'Home' link
	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before = '<span class="current">'; // tag before the current crumb
	$after = '</span>'; // tag after the current crumb

	global $post;
	$homeLink = home_url();
	if (is_home() || is_front_page()) {
		if ($showOnHome == 1) echo '<div class="breadcrumbs-area"><div id="breadcrumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';
	} else {
		echo '<div class="breadcrumbs-area"><div class="row"><div id="breadcrumbs">
				<a href="' . $homeLink . '">' . $home . '</a><span class="separator">' . $delimiter . '</span>';
		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, '<span class="separator">' . $delimiter . '</span>');
			echo $before . 'Category: ' . single_cat_title('', false) . $after;
		} elseif ( is_search() ) {
			echo $before . 'Search results for "' . get_search_query() . '"' . $after;

		} elseif ( is_day() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a><span class="separator">' . $delimiter . '</span>';
			echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a><span class="separator">' . $delimiter . '</span>';
			echo $before . get_the_time('d') . $after;
		} elseif ( is_month() ) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a><span class="separator">' . $delimiter . '</span>';
			echo $before . get_the_time('F') . $after;
		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
				if ($showCurrent == 1) echo '<span class="separator">' . $delimiter . '</span>' . $before . get_the_title() . $after;
			} else {
				$main_cat = get_post_meta($post->ID);
				if(!isset($main_cat['ppc_primary_category'])) {
					$cat = get_the_category($post->ID);
					$count_cat = count($cat);
					$cat = $cat[$count_cat - 1]->term_id;
					$cats = get_category_parents($cat, TRUE, '<span class="separator">' . $delimiter . '</span>');
				}
				else {
					$main_cat = get_post_meta($post->ID, 'ppc_primary_category', true);
					$category_link = get_category_link($main_cat);
					$cats = '<a href="'. $category_link .'">' . get_cat_name($main_cat) . '</a><span class="separator">' . $delimiter . '</span>';
				}
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
				echo $cats;
				if ($showCurrent == 1) echo $before . get_the_title() . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;
		} elseif ( is_attachment() ) {
			$gallery_id = get_gallery_id($post->ID);
			$gallery_title = get_post($gallery_id, ARRAY_A)['post_title'];
			$gallery_link = get_post($gallery_id, ARRAY_A)['guid'];
			//echo get_category_parents($cat, TRUE, '<span class="separator">' . $delimiter . '</span>');
			echo '<a href="' . $gallery_link . '">' . $gallery_title . '</a>';
			if ($showCurrent == 1) echo '<span class="separator">' . $delimiter . '</span>' . $before . get_the_title($post->ID) . $after;
		} elseif ( is_page() && !$post->post_parent ) {
			if ($showCurrent == 1) echo $before . get_the_title() . $after;
		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_post($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				echo $breadcrumbs[$i];
				if ($i != count($breadcrumbs)-1) echo '<span class="separator">' . $delimiter . '</span>';
			}
			if ($showCurrent == 1) echo '<span class="separator">' . $delimiter . '</span>' . $before . get_the_title() . $after;
		} elseif ( is_tag() ) {
			echo $before . 'Tag: ' . single_tag_title('', false) . $after;
		} elseif ( is_tax('pornstars') ) {
			echo $before . 'Pornstar: ' . single_tag_title('', false) . $after;
		} elseif ( is_tax('playlists') ) {
			echo $before . 'Playlist: ' . single_tag_title('', false) . $after;
		}elseif (is_author()) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . 'Profile: ' . get_the_author_meta('user_login', wp_get_current_user()->ID). $after;
		} elseif ( is_404() ) {
			echo $before . 'Error 404' . $after;
		}
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) ;
			echo '<span class="separator"> ' . $delimiter .  ' </span>'.   $before . esc_html__('Page', 'arc') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() );
		}
		echo '</div></div></div>';
	}
} // end the_breadcrumb()


