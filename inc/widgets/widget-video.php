<?php
class arc_WP_Widget_Videos_Block extends WP_Widget {
	/**
	 * To create the example widget all four methods will be
	 * nested inside this single instance of the WP_Widget class.
	 **/
	public function __construct() {
		$widget_options = array(
			'classname' => 'widget_videos_block',
			'description' => __('Display blocks of videos sorted by views, date, popularity, category, etc.', 'arc'),
		);
		parent::__construct( 'widget_videos_block', 'PornX - Video Blocks', $widget_options );
	}

	public function widget( $args, $instance ) {
// Widget output
		extract( $args );
		$title = $instance['title'];
		$args_query = array();
		global $t;
		$tv = isset( $instance['video_type'] ) ? $instance['video_type'] : null;
		$nv = isset( $instance['video_number'] ) ? $instance['video_number'] : null;
		$cv = isset( $instance['video_category'] ) ? $instance['video_category'] : null;
		$w = isset( $instance['widget_id'] ) ? $instance['widget_id'] : null;
		$w = 'ttw' . str_replace( 'video_blocks-' , '' , $w );
		echo $args['before_widget'];
		if ( $title )
			echo $args['before_title'] . '<span>'.$title. '</span>'. $args['after_title'];
		switch( $tv ){
			case 'related':
				global $post;
				$current_postID = $post->ID;
				$categories     = get_the_terms( $current_postID, 'category' );
				if( $categories ){
					$args_query = array(
						'post_type'         => 'post',
						'posts_per_page'    => $nv,
						'orderby'           => 'name',
						'post__not_in'      => array( $current_postID ),
						'tax_query'         => array(
							'relation'        => 'AND',
							// cat
							array(
								'taxonomy' => 'category',
								'field'    => 'id',
								'terms'    => $categories[0]->term_id,
								'operator' => 'IN',
							)
						)
					);
				}
				break;
			case 'latest':
				$args_query = array(
					'post_type'      => 'post',
					'orderby'        => 'date',
					'order'          => 'DESC',
					'posts_per_page' => $nv,
					'cat'            => $cv
				);
				break;
			case 'random':
				$args_query = array(
					'post_type'      => 'post',
					'orderby'        => 'rand',
					'posts_per_page' => $nv,
					'cat'            => $cv
				);
				break;
			case 'featured':
				$args_query = array(
					'post_type'      => 'post',
					'orderby'        => 'featured_video',
					'order'          => 'ASC',
					'meta_query'     => array(
						'relation' => 'OR',
						array(
							'key'=> 'featured_video',
							'value' => 'on',
							'compare' => '='
						),
						array(
							'key'=> 'featured_video',
							'compare' => 'NOT EXISTS'
						),
					),
					'posts_per_page' => $nv,
				);
				break;
			case 'popular':
				$args_query = array(
					'post_type'      => 'post',
					'orderby'        => 'meta_value_num',
					'order'          => 'DESC',
					'meta_query'     => array(
						'relation'  => 'OR',
						array(
							'key'     => 'likes_count',
							'compare' => 'NOT EXISTS'
						),
						array(
							'key'     => 'likes_count',
							'compare' => 'EXISTS'
						)
					),
					'posts_per_page' => $nv,
					'cat'            => $cv
				);
				break;
			case 'most-viewed':
				$args_query = array(
					'post_type'      => 'post',
					'meta_key'       => 'post_views_count',
					'orderby'        => 'meta_value_num',
					'order'          => 'DESC',
					'posts_per_page' => $nv,
					'cat'            => $cv
				);
				break;
			case 'longest':
				$args_query = array(
					'post_type'      => 'post',
					'meta_key'       => 'duration',
					'orderby'        => 'meta_value_num',
					'meta_query'     => array(
						'relation' => 'OR',
						array(
							'key'=> 'duration',
							'compare' => 'EXISTS'
						),
						array(
							'key'=> 'duration',
							'compare' => 'NOT EXISTS'
						)
					),
					'order'          => 'DESC',
					'posts_per_page' => $nv,
					'cat'            => $cv
				);
				break;
			case 'all':
				$args_query = array(
					'post_type'      => 'post',
					'orderby'        => 'meta_value_num',
					'meta_key'       => 'post_views_count',
					'order'          => 'DESC',
					'meta_query'     => array(
						'relation'  => 'OR',
						array(
							'key'     => 'post_views_count',
							'compare' => 'NOT EXISTS'
						),
						array(
							'key'     => 'post_views_count',
							'compare' => 'EXISTS'
						)
					),
					'posts_per_page' => $nv,
					'cat'            => $cv
				);
				break;
		}
		$home_query = new WP_Query($args_query);
		if( $home_query->have_posts() ): ?>
			<?php if( $tv == 'related' ){
				global $post;
				$post_cat = wp_get_post_categories( $post->ID );
			}
			if ( $tv == 'featured' ) :?>
                <a class="more-videos label desktop" href="<?php echo esc_url(home_url());?>/?filter=<?php echo $tv;?>">
                    <span style="display: block;"><?php _e('More videos', 'arc');?></span>
                </a>
                <?php //echo $args['after_title'];?>
			<?php endif; ?>
            <?php if( $tv !== 'featured' ) : ?>
                <a class="more-videos label desktop" href="<?php echo esc_url(home_url());?>/?filter=<?php echo $tv;?><?php if($cv != 0) : ?>&amp;cat=<?php echo $cv;?><?php endif; ?>">
                    <span style="display: block;"><?php _e('More videos', 'arc'); ?></span>
                </a>
            <?php //echo $args['after_title'];?>
			<?php endif;?>
                <div class="videos-list">
				<?php
                while ( $home_query->have_posts() ) : $home_query->the_post(); ?>
					<?php get_template_part( 'template-parts/loop', 'video' ); ?>
				<?php endwhile; ?>
			    </div>
			    <div class="clear"></div>
            <div style="margin:0;margin-left: 10px;padding:0">
			<?php if ( $tv == 'featured' ) :?>
                <a style="position:relative;display:none;" class="more-videos label mobile" href="<?php echo esc_url(home_url());?>/?filter=<?php echo $tv;?>">
                    <span style="display: block;"><?php _e('More videos', 'arc');?></span>
                </a>
			<?php endif; ?>
			<?php if( $tv !== 'featured' ) : ?>
                <a style="position:relative;display:none;" class="more-videos label mobile" href="<?php echo esc_url(home_url());?>/?filter=<?php echo $tv;?><?php if($cv != 0) : ?>&amp;cat=<?php echo $cv;?><?php endif; ?>">
                    <span style="display: block;"><?php _e('More videos', 'arc'); ?></span>
                </a>
			<?php endif;?>
            </div>
		<?php endif;
		echo $args['after_widget'];
		wp_reset_query();
	}
	public function form( $instance ) {
		$instance                   = wp_parse_args( (array) $instance , array( 'title' => '' ) );
		$title                      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$current_video_type         = isset( $instance['video_type'] ) ? esc_attr( $instance['video_type'] ) : '';
		$video_number               = isset( $instance['video_number'] ) ? esc_attr( $instance['video_number'] ) : '';
		$video_category             = isset( $instance['video_category'] ) ? esc_attr( $instance['video_category'] ) : '';
		?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'arc' ); ?> :</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<?php if( $video_number == "" ) $video_number = 8; ?>
		<p><label for="<?php echo $this->get_field_id( 'video_number' ); ?>"><?php _e( 'Total videos', 'arc' ); ?> :</label>
			<input style="width:40px;" class="widefat" id="<?php echo $this->get_field_id( 'video_number' ); ?>" name="<?php echo $this->get_field_name( 'video_number' ); ?>" type="text" value="<?php echo $video_number; ?>" /></p>
		<p><label for="<?php echo $this->get_field_id( 'video_type' ); ?>"><?php _e( 'Display', 'arc' ) ?> :</label>
			<select class="widefat video-sort" id="<?php echo $this->get_field_id( 'video_type' ); ?>" name="<?php echo $this->get_field_name( 'video_type' ); ?>">
				<?php
				$types_videos = array(
					'latest'              => __('Latest videos', 'arc'),
					'most-viewed'         => __('Most viewed videos', 'arc'),
					'popular'         => __('Popular videos', 'arc'),
					'longest'             => __('Longest videos', 'arc'),
					'featured'              => __('Featured videos', 'arc'),
					'random'             => __('Random videos', 'arc'),
					'related'             => __('Related videos', 'arc'),
					'all'             => __('All videos', 'arc'),
				);
				foreach( $types_videos as $key => $value ) :
					?>
					<option class="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php selected( $key , $current_video_type ); ?>><?php echo ucfirst( $value ); ?></option>
				<?php
				endforeach;
				?>
			</select></p>
		<p class="cat_display"><label for="<?php echo $this->get_field_id( 'video_category' ); ?>"><?php _e( 'Category', 'arc' ); ?> :</label>
			<?php
			$args = array(
				'show_option_all'    => __('All', 'arc'),
				'show_option_none'   => '',
				'show_last_update'   => 0,
				'show_count'         => 1,
				'hide_empty'         => 1,
				'child_of'           => 0,
				'exclude'            => '',
				'echo'               => 1,
				'selected'           => $video_category,
				'hierarchical'       => 1,
				'name'               => $this->get_field_name( 'video_category' ),
				'id'                 => $this->get_field_id( 'video_category' ),
				'class'              => 'widefat',
				'depth'              => -1,
				'tab_index'          => 0,
				'taxonomy'           => 'category',
				'order'              => 'ASC',
				'orderby'            => 'title'
			);
			wp_dropdown_categories( $args );
			?>
		</p>
		<?php
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']         = isset($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '';
		$instance['video_type']    = isset($new_instance['video_type']) ? stripslashes( $new_instance['video_type'] ) : '';
		$instance['video_number']  = isset($new_instance['video_number']) ? stripslashes( preg_replace("[^0-9]","", $new_instance['video_number'] ) ) : '';
		$instance['video_category']= isset($new_instance['video_category']) ? stripslashes( $new_instance['video_category'] ) : '';
		return $instance;
	}
}
function arc_register_widgets() {
	register_widget( 'arc_WP_Widget_Videos_Block' );
}
add_action( 'widgets_init', 'arc_register_widgets' );