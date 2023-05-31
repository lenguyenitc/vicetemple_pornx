<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php echo esc_html__( 'Nothing found', 'arc' ); ?></h1>
    </header><!-- .page-header -->
    <div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'arc' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
		<?php elseif ( is_search() ) : ?>
            <p><?php echo esc_html__( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'arc' ); ?></p>
			<?php
			get_search_form(); ?>
            <div class="videos-list">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/loop', get_post_format() ? : 'video' );
				endwhile; ?>
            </div>
		<?php else : ?>
            <p><?php echo esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'arc' ); ?></p>
			<?php
			get_search_form();
		endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
