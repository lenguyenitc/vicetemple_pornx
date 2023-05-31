<?php
/**** add filter by playlists*****/
global $pagenow;
if($_GET['taxonomy'] == 'playlists' && $pagenow == 'edit-tags.php' && is_admin()) {
	$taxonomy = 'playlists';
	add_action( "{$taxonomy}_add_form", function($taxonomy){
		ob_start();
	});
	add_action( "after-{$taxonomy}-table", function($taxonomy){
		$html = ob_get_clean();
		$__preg_replace_callback = function( $match ){
			$val = @$_GET['type'];
			ob_start();
			?>
			<div class="alignleft actions" style="margin-left: -10px;">
				<select name="type" onchange="window.add_param_to_URL(this)">
					<option value="all" <?php selected('all', $val) ?>>All playlists</option>
					<option value="users" <?php selected('users', $val) ?> >User playlists</option>
					<option value="watchlater" <?php selected('watchlater', $val) ?> >Watch Later</option>
				</select>
			</div>
			<script>
	            window.add_param_to_URL = function(el){
	                var href = window.location.href, sep = /[?]/.test(href) ? "&" : "?", name = el.name.replace(/[^a-z_-]/i,'');
	                window.location = (new RegExp(name+'=?')).test(href) ? href.replace( (new RegExp('([?&]'+name+'=?)[^&]*')), (el.value ? "$1"+ el.value : '') ) : (href + sep + name + "="+ el.value);
	            }
			</script>
			<?php
			return $match[1] . ob_get_clean();
		};
		echo preg_replace_callback('~(id="doaction[^<]+</div>)~', $__preg_replace_callback, $html );
	});

	add_filter('terms_clauses', 'filter_by_playlists', 10, 3 );
	function filter_by_playlists( $pieces, $taxonomies, $args ){
		global $pagenow;
		if(!is_admin() || ($_GET['taxonomy'] != 'playlists' && $pagenow != 'edit-tags.php'))
			return $pieces;

		$backtrace = debug_backtrace(false);
		$backtrace = array_pop( $backtrace );
		if(
			( @$backtrace['class'] != 'WP_List_Table') &&
			( @$backtrace['class'] != 'WP_Terms_List_Table' )
		)
			return $pieces;


		global $wpdb;
		if(@$_GET['type'] == 'watchlater'){
			$pieces['join'] .= " LEFT JOIN $wpdb->termmeta AS tm ON t.term_id = tm.term_id ";
			$pieces['where'] .= " AND t.slug LIKE 'watchlater%'";
		}
		if(@$_GET['type'] == 'users'){
			$pieces['join'] .= " LEFT JOIN $wpdb->termmeta AS tm ON t.term_id = tm.term_id ";
			$pieces['where'] .= " AND t.slug NOT LIKE 'watchlater%' AND t.slug NOT LIKE '%1'";
		}

		return $pieces;
	}
}/**** [end] add filter by playlists*****/

/***delete users playlists if deletion happen in admin panel***/
function delete_user_terms_from_admin($user_id) {
    $playlists = get_user_meta($user_id, 'userPlaylists');
	$taxonomy = 'playlists';
	if ($playlists === false || empty($playlists)) {
		return;
	}
	foreach ($playlists as $playlist) {
		wp_delete_term($playlist, $taxonomy );
	}
}
add_action( 'delete_user', 'delete_user_terms_from_admin', 10, 1 );
/*** [end] delete users playlists if deletion happen in admin panel***/