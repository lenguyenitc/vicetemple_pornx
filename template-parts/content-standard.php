<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header article-title" style="">
	    <h1 class="widget-title" style="margin-bottom: 10px;border-bottom: 1px solid <?=get_theme_mod('primary_color_setting')?> !important;padding-bottom: 10px !important;"><?=the_title();?></h1>
        <div style=" width: 100%">
            <div style="display:flex; justify-content: space-between; width: 100%;margin-bottom: 10px;">
                <p class="entry-meta">
                    <span class="author"><?php echo __('Author: ', 'arc');?><a href="/public-profile?xxx=<?=$post->post_author?>"><?=get_user_by('ID', $post->post_author)->display_name?></a></span><br>
                </p>
                <p class="entry-meta">
		            <?php arc_posted_on();	?>
                </p>
            </div>
        </div>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_content( sprintf(
		/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'arc' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'arc' ),
			'after'  => '</div>',
		) );
		?>
    </div><!-- .entry-content -->
    <!--Article tags--->
	<?php
	$article_tags = wp_get_post_terms($post->ID, 'blog_tag');
	if(count($article_tags) > 0):
		?>
        <div class="blog-tags-title">
    <style>
        #article_tags {
            display: flex;
            flex-wrap: wrap;
            margin: 0;
            padding: 0;
            width: 100%;
            margin-left: 20px;
        }
        li.article_tags {
            list-style: none;
            margin: 7px;
            padding-left: 10px !important;
            padding-right: 10px !important;
        }
        li.article_tags:first-child {
            margin-left: 0px;
        }
    </style>
        <p style="margin: 0;padding: 0;margin-top: 10px;">Tags: </p>
        <ul id="article_tags">
            <?php foreach($article_tags as $tag):?>
                <?php $tag_name = restyle_tag( $tag->name );?>
                <li class="label article_tags"><a href="/blog-tag/<?=$tag->slug;?>/"><?=$tag_name;?></a></li>
            <?php endforeach;?>
        </ul></div>
	<?php endif;?>
    <!--article tags--->
	<?php // If comments are open or we have at least one comment, load up the comment template.
	if( get_option('allow_comments_to_all')['allow_comments_to_all'] == 'on') {
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	} ?>
</article><!-- #post-## -->

