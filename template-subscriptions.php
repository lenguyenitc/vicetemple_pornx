<?php
/**
 * Template Name: Subscriptions
 **/
get_header();
?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-subscriptions' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; }
	else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?> actors-list">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
			<?php
			if(!is_user_logged_in()) :?>
                <p><?php echo 'You need to ';?>
                    <a style="cursor: pointer" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');">Login </a>
					<?php echo wp_register(" or ", "") . ' to see this page.'?>
                </p>
			<?php else :  ?>
				<div id="profile-tabs" class="tabs">
                    <?php $curr = wp_get_current_user();?>
					<a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/profile/'. $curr->user_login . '/'?>'" class="tab-link"><i class="fa fa-upload"></i> <?php echo esc_html__('Uploaded videos', 'arc'); ?></a>
					<a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/my-profile/'?>'" class="tab-link"><i class="fa fa-user"></i> <?php echo esc_html__('My profile', 'arc'); ?></a>
					<a style="cursor: pointer;" onclick="location.href='<?php echo site_url().'/watched-videos/'?>'" class="tab-link"><i class="fa fa-eye"></i> <?php echo esc_html__('Watched videos', 'arc'); ?></a>
					<a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/playlists/'?>'"><i class="fa fa-plus"></i> <?php echo esc_html__('My playlist', 'arc'); ?></a>
					<!--<a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php /*echo site_url().'/chat/?xxx=' . $curr->ID; */?>'"><i class="fa fa-comment"></i> <?php /*echo esc_html__('My chat', 'arc'); */?></a>-->
					<button class="tab-link active subscriptions"><i class="fa fa-user-plus"></i> <?php echo esc_html__('My subscriptions', 'arc'); ?></button>
                    <a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/my-payments/'?>'"><i class="fa fa-paypal"></i> <?php echo esc_html__('My payments', 'arc'); ?></a>
				</div>
				<div class="tab-content" style="margin-top: 20px">
					<h2 class="widget-title"><i class="fa fa-user-plus"></i><?php echo esc_html__('My subscriptions', 'arc'); ?>
					</h2>
					<div id="subscriptions_page" style="display: block">
						<?php if(!is_user_logged_in()) :
								?>
								<p> <?php echo __('You need to ');?>
									<span class="login"><a href="<?php echo wp_login_url(); ?>"><?php echo esc_html__('Login', 'arc'); ?></a></span>
									<!--<span class="or"><?php /*echo esc_html__('Or', 'arc');*/?></span>-->
									<span class="login"><?php wp_register(' or ', ''); ?>to see this page.</span>
								</p>
						<?php
						else:
							the_content();
							$subscriptions = get_user_meta(get_current_user_id(), "subscribe_author");
							if(count($subscriptions) == 0) :?>
								<div class="videos-list">
									<div class="alert"><?php echo __('You don`t have any subscriptions yet', 'arc');?></div>
								</div>
							<?php else: ?>
								<div class="videos-list">
                                    <article>
                                        <div id="subscriptions_content">
									<?php
									foreach ($subscriptions as $subscription) {?>
                                        <div class="subscription-item" data-remove-item="<?php echo $subscription?>">
                                            <p>
                                                <a href="/public-profile/?xxx=<?php echo $subscription;?>">
		                                            <?php
		                                            if(get_user_meta($subscription, 'personal_foto', true) != false) :?>
                                                        <img style="width: 100%; max-width: 150px" src="<?php echo get_user_meta($subscription,'personal_foto', true);?>" />
		                                            <?php else:?>
                                                        <img style="width: 100%; max-width: 150px" src="<?php echo get_template_directory_uri(). '/assets/img/picture.png'?>" />
		                                            <?php endif;?>
		                                            <?php
		                                            if(!empty(get_userdata($subscription)->display_name)):?>
                                                        <span id="user_name"><?php echo get_userdata($subscription)->display_name;?></span>
		                                            <?php endif; ?>
                                                </a>
                                            </p>
                                            <button class="unsubscribe_on_author" data-subscribe="profile" data-author="<?php echo $subscription?>" class="button button-primary"><?php echo __('Unsubscribe', 'arc');?></button>
                                        </div>
									<?php } ?>
                                        </div>
                                    </article>
								</div>
							<?php endif;?>
						<?php endif;?>
					</div>
				</div>
			<?php endif;?>
			<script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-subscriptions' ) == 'on') {
	get_sidebar();
}
get_footer();
