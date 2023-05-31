<?php
get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-video-post' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; }
	else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
}
?>
<?php
/** Additional attribute for redirect pages [start]**/
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['submit_photo']))
{
	echo '<div id="do_redirect" class="find_redirect"></div>';?>
    <script>
        jQuery(document).ready(function($){
            if ($('body').find('div.find_redirect').attr('id') == 'do_redirect')
            {
                window.location.href = location;
            }
        });
    </script>
	<?php
}
/** Additional attribute for redirect pages [end]**/
?>
    <div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
        <main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'video' );
			endwhile; // End of the loop.
			?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-video-post' ) == 'on' ) {
	get_sidebar();
}
get_footer();
/**get user country and save it to db**/
$ip = $_SERVER['REMOTE_ADDR'];
if($curl = curl_init()) {
	curl_setopt($curl,CURLOPT_URL, 'http://ip-api.com/json/' . $ip);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl,CURLOPT_HEADER,false);

	$out = curl_exec($curl);
	$out = json_decode($out);
	curl_close($curl);
}
global $wpdb, $post;
$table_ip_country_trend = $wpdb->prefix . 'ip_country_trend';
$country = $out->country;
if(false != $country) {
	$res = $wpdb->get_row( "SELECT * FROM $table_ip_country_trend WHERE `country` = '" .$country. "'" );
	$posttags = get_the_tags();
	if(false != $posttags) {
		foreach ((array)$posttags as $tag) {
			$tag_list[] = $tag->slug;
		}
		if($res){
			$arr_tag = $wpdb->get_col("SELECT `arr_tag` FROM $table_ip_country_trend WHERE `country` = '" .$country. "'");
			$arr_tag = unserialize($arr_tag[0]);
			foreach($tag_list as $k => $v){
				if(in_array($v, $arr_tag)){
					unset($tag_list[$k]);
				}
			}
			$arr_tag = array_merge($arr_tag, $tag_list);
			$arr_tag = serialize($arr_tag);
			$wpdb->update( $table_ip_country_trend,
				array( 'arr_tag' => $arr_tag ),
				array( 'country' => $country )
			);
		} else {
			$tag_list = serialize($tag_list);
			$wpdb->insert(
				$table_ip_country_trend,
				array( 'country' => $country, 'ip' => (string)$out->query, 'arr_tag' =>  $tag_list),
				array( '%s', '%s', '%s' )
			);
		}
    }
}
/** end get user country and save it to db**/