<?php
class arc_WP_Widget_Articles_Block extends WP_Widget {
    /**
     * To create the example widget all four methods will be
     * nested inside this single instance of the WP_Widget class.
     **/
    public function __construct() {
        $widget_options = array(
            'classname' => 'widget_articles_block',
            'description' => __('Display blocks of articles sorted by date.', 'arc'),
        );
        parent::__construct( 'widget_articles_block', 'PornX - Articles Blocks', $widget_options );
    }

    public function widget( $args, $instance ) {
        // Widget output
        extract( $args );
        $title = $instance['title'];
        $args_query = array();
        global $t;
        $tv = isset( $instance['article_type'] ) ? $instance['article_type'] : null;
        $nv = isset( $instance['article_number'] ) ? $instance['article_number'] : null;
        $cv = isset( $instance['article_category'] ) ? $instance['article_category'] : null;
        $w = isset( $instance['widget_id'] ) ? $instance['widget_id'] : null;
        $w = 'ttw' . str_replace( 'articles_block-' , '' , $w );
        echo $args['before_widget'];
        if ( $title )
            echo $args['before_title'] . '<span>'.$title. '</span>'. $args['after_title'];
        switch( $tv ){
            case 'latest':
                $args_query = array(
                    'post_type'      => 'blog',
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                    'posts_per_page' => $nv,
                    'cat'            => $cv,
                    /*'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'blog_category',
                            'field' => 'id',
                            'terms' => $cv,
                        )
                    ),*/
                );
                break;
            case 'newest':
                $args_query = array(
                    'post_type'      => 'blog',
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                    'cat'            => $cv,
                    /*'posts_per_page' => $nv,
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'blog_category',
                            'field' => 'id',
                            'terms' => $cv,
                        )
                    ),*/
                );
                break;
        }
        $home_query = new WP_Query($args_query);
        if( $home_query->have_posts() ):?>
            <div class="articles-widget-list">
                <?php
                while ( $home_query->have_posts() ) : $home_query->the_post(); ?>
                    <?php get_template_part( 'template-parts/loop', 'articles' ); ?>
                <?php endwhile; ?>
            </div>
            <div class="clear"></div>
        <?php endif;
        echo $args['after_widget'];
        wp_reset_query();
    }
    public function form( $instance ) {
        $instance                   = wp_parse_args( (array) $instance , array( 'title' => '' ) );
        $title                      = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $current_video_type         = isset( $instance['article_type'] ) ? esc_attr( $instance['article_type'] ) : '';
        $article_number               = isset( $instance['article_number'] ) ? esc_attr( $instance['article_number'] ) : '';
        $article_category             = isset( $instance['article_category'] ) ? esc_attr( $instance['article_category'] ) : '';
        ?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'arc' ); ?> :</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <?php if( $article_number == "" ) $article_number = 8; ?>
        <p><label for="<?php echo $this->get_field_id( 'article_number' ); ?>"><?php _e( 'Total videos', 'arc' ); ?> :</label>
            <input style="width:40px;" class="widefat" id="<?php echo $this->get_field_id( 'article_number' ); ?>" name="<?php echo $this->get_field_name( 'article_number' ); ?>" type="text" value="<?php echo $article_number; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id( 'article_type' ); ?>"><?php _e( 'Display', 'arc' ) ?> :</label>
            <select class="widefat video-sort" id="<?php echo $this->get_field_id( 'article_type' ); ?>" name="<?php echo $this->get_field_name( 'article_type' ); ?>">
                <?php
                $types_videos = array(
                    'latest'              => __('Starting from the oldest', 'arc'),
                    'newest'         => __('Starting from the newest', 'arc'),
                );
                foreach( $types_videos as $key => $value ) :
                    ?>
                    <option class="<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php selected( $key , $current_video_type ); ?>><?php echo ucfirst( $value ); ?></option>
                <?php
                endforeach;
                ?>
            </select></p>
        <p class="cat_display"><label for="<?php echo $this->get_field_id( 'article_category' ); ?>"><?php _e( 'Category', 'arc' ); ?> :</label>
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
                'selected'           => $article_category,
                'hierarchical'       => 1,
                'name'               => $this->get_field_name( 'article_category' ),
                'id'                 => $this->get_field_id( 'article_category' ),
                'class'              => 'widefat',
                'depth'              => -1,
                'tab_index'          => 0,
                'taxonomy'           => 'blog_category',
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
        $instance['article_type']    = isset($new_instance['article_type']) ? stripslashes( $new_instance['article_type'] ) : '';
        $instance['article_number']  = isset($new_instance['article_number']) ? stripslashes( preg_replace("[^0-9]","", $new_instance['article_number'] ) ) : '';
        $instance['article_category']= isset($new_instance['article_category']) ? stripslashes( $new_instance['article_category'] ) : '';
        return $instance;
    }
}
function arc_register_widgets_articles() {
    register_widget( 'arc_WP_Widget_Articles_Block' );
}
add_action( 'widgets_init', 'arc_register_widgets_articles' );