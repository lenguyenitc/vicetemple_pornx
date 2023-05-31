<?php
class arc_WP_Widget_Playlist_Block extends WP_Widget {
	public function __construct() {
		$widget_options = array(
			'classname'   => 'widget_playlists_block',
			'description' => __( 'Display blocks of playlists', 'arc' ),
		);
		parent::__construct( 'widget_playlists_block', 'PornX - Playlists Blocks', $widget_options );
	}
	public function form( $instance ) {
	    extract($instance);
		$instance  = wp_parse_args( (array) $instance , array( 'title' => '' ) );
		$title     = !empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Recent playlists';
		$playlist_number = !empty( $instance['playlist_number'] ) ? esc_attr( $instance['playlist_number'] ) : '';
        $current_playlist_type = isset( $instance['playlist_type'] ) ? esc_attr( $instance['playlist_type'] ) : '';?>
		<?php if( $playlist_number == "" ) $playlist_number = 4; ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'arc' ); ?> :</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id( 'playlist_number' ); ?>"><?php _e( 'Total playlists', 'arc' ); ?> :</label>
            <input style="width:40px;" class="widefat" id="<?php echo $this->get_field_id( 'playlist_number' ); ?>" name="<?php echo $this->get_field_name( 'playlist_number' ); ?>" type="text" value="<?php echo $playlist_number; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id( 'playlist_type' ); ?>"><?php _e( 'Display', 'arc' ) ?> :</label>
            <select class="widefat video-sort" id="<?php echo $this->get_field_id( 'playlist_type' ); ?>" name="<?php echo $this->get_field_name( 'playlist_type' ); ?>">
                <?php
                $types_videos = array(
                    'recent' => __('Most recent', 'arc'),
                    'oldest' => __('Oldest', 'arc'),
                    'random' => __('Random', 'arc'),
                );
                foreach( $types_videos as $key => $value ) :
                    ?>
                    <option class="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php selected( $key , $current_playlist_type ); ?>><?php echo ucfirst( $value ); ?></option>
                <?php
                endforeach;
                ?>
            </select></p>
		<?php
	}

	public function widget( $args, $instance ) {
			extract( $args );
            global $wpdb;
			//extract($instance);
            $title = isset($instance['title']) ? $instance['title'] : 'Recent playlists';
            $tv = isset( $instance['playlist_type'] ) ? $instance['playlist_type'] : 'random';
            $nv = isset( $instance['playlist_number'] ) ? $instance['playlist_number'] : 4;
			echo $args['before_widget'];
			if ( $title )
				echo $args['before_title'] . $title . $args['after_title'];
			switch($tv) {
                case 'random':
                    $all_playlists = $wpdb->get_results("SELECT `wp_termmeta`.`term_id`, 
                                                        `wp_termmeta`.`meta_value` FROM `wp_termmeta` 
                                                            LEFT JOIN `wp_usermeta` ON `wp_termmeta`.`term_id` = `wp_usermeta`.`meta_value` 
                                                            WHERE `wp_usermeta`.`meta_key` = 'userPlaylists' 
                                                              AND `wp_termmeta`.`meta_key` = 'playlist_data' 
                                                                ORDER BY RAND() LIMIT ".$nv.";", ARRAY_A);
                    break;
                case 'oldest':
                    $all_playlists = $wpdb->get_results("SELECT `wp_termmeta`.`term_id`, 
                                                        `wp_termmeta`.`meta_value` FROM `wp_termmeta` 
                                                            LEFT JOIN `wp_usermeta` ON `wp_termmeta`.`term_id` = `wp_usermeta`.`meta_value` 
                                                            WHERE `wp_usermeta`.`meta_key` = 'userPlaylists' 
                                                              AND `wp_termmeta`.`meta_key` = 'playlist_data' 
                                                                ORDER BY `wp_termmeta`.`meta_value` ASC LIMIT ".$nv.";", ARRAY_A);
                    break;
                case 'recent':
                    $all_playlists = $wpdb->get_results("SELECT `wp_termmeta`.`term_id`, 
                                                        `wp_termmeta`.`meta_value` FROM `wp_termmeta` 
                                                            LEFT JOIN `wp_usermeta` ON `wp_termmeta`.`term_id` = `wp_usermeta`.`meta_value` 
                                                            WHERE `wp_usermeta`.`meta_key` = 'userPlaylists' 
                                                              AND `wp_termmeta`.`meta_key` = 'playlist_data' 
                                                                ORDER BY `wp_termmeta`.`meta_value` DESC LIMIT ".$nv.";", ARRAY_A);
                    break;
            }
            $users_playlists = [];
			foreach($all_playlists as $playlist) {
                if(get_term_by('id', $playlist['term_id'], 'playlists')->count == 0) continue;
                else {
                    if(strpos(get_term_by('id', $playlist['term_id'], 'playlists')->slug, 'watchlater') === false) {
                        $users_playlists[] = $playlist['term_id'];
                    }
                }
            }
			if(count($users_playlists) > 0):?>
                <div class="playlists-widget-list">
			<?php
            foreach ($users_playlists as $users_playlist):?>
                <article id="post-<?php the_ID(); ?>" <?php if(xbox_get_field_value( 'my-theme-options', 'mob-number_videos_per_row' ) == '1') {
                    post_class('thumb-block full-width one-playlist'); }else{
                    post_class('thumb-block one-playlist'); } ?>>
                    <a href="<?php echo esc_url(home_url()); ?>?playlists=<?php echo get_term_by('id', $users_playlist, 'playlists')->slug; ?>" title="<?php echo get_term_by('id', $users_playlist, 'playlists')->name; ?>">
                        <?php
                        $image = get_term_meta($users_playlist, 'playlist-image', true);
                        if($image == false) {
                            $back_img_url = get_template_directory_uri() .'/assets/img/no-cat-image.png';
                        } else {
                            $back_img_url = $image;
                        }
                        if(strpos($back_img_url, '(') !== false || strpos($back_img_url, ')') !== false) {
                            $host         = parse_url($back_img_url, PHP_URL_HOST);
                            $protocol     = parse_url($back_img_url, PHP_URL_SCHEME);
                            $part_one     = $protocol .'://'. $host . '/';
                            $part_twoo    = explode($part_one, $back_img_url)[1];
                            $part_twoo    = urlencode($part_twoo);
                            $res = $part_one . $part_twoo;
                            $back_img_url = $res;
                        }
                        ?>
                        <div class="post-thumbnail">
                            <img data-src="<?=$back_img_url?>" alt="<?=get_the_title()?>" src="<?=$back_img_url?>">
                        </div>
                    </a>
                    <header class="entry-header playlistsWidgetHeader" style="padding-bottom: 2px; padding-top:2px">
                        <p style="overflow: hidden;text-align: left; width: 100%;padding: 0px 10px;text-overflow: ellipsis;">
                            <?php echo get_term_by('id', $users_playlist, 'playlists')->name; ?>
                        </p>
                    </header>
                </article>
			<?php
                endforeach;?>
                </div>
                <div class="clear"></div>
            <?php
            endif;
        echo $args['after_widget'];
			wp_reset_query();
	}



	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['title']         = isset($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '';
        $instance['playlist_type']    = isset($new_instance['playlist_type']) ? stripslashes( $new_instance['playlist_type'] ) : '';
        $instance['playlist_number']  = isset($new_instance['playlist_number']) ? stripslashes( preg_replace("[^0-9]","", $new_instance['playlist_number'] ) ) : '';
		return $instance;
	}
}
function arc_register_widget_playlist() {
	register_widget( 'arc_WP_Widget_Playlist_Block' );
}
add_action( 'widgets_init', 'arc_register_widget_playlist' );