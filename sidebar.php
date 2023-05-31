<?php
if (wp_is_mobile() && xbox_get_field_value( 'my-theme-options', 'mob-show-sidebar' ) == 'off' ) {
	return; } ?>

<?php if( is_home() || is_front_page()) {
	$show_sidebar = xbox_get_field_value( 'my-theme-options', 'show-sidebar-content' );
} elseif( is_single() ) {
	$show_sidebar = xbox_get_field_value( 'my-theme-options', 'show-sidebar-video-post' );
} elseif( is_page_template('template-categories.php') ) {
	$show_sidebar = xbox_get_field_value( 'my-theme-options', 'show-sidebar-in-content' );
} else {
	$show_sidebar = 'on';
} ?>

<?php if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) {
	$sidebar_pos = 'with-sidebar-right';
} else {
	$sidebar_pos = 'with-sidebar-left';
} ?>
<?php if( $show_sidebar == 'on' ) : ?>
	<aside id="sidebar" class="widget-area <?php echo $sidebar_pos; ?>" role="complementary">
		<?php if(wp_is_mobile() && get_theme_mod('mob_advertising_setting_sidebar')) : ?>
			<div class="happy-sidebar">
				<?php echo get_theme_mod('mob_advertising_setting_sidebar'); ?>
			</div>
		<?php elseif(get_theme_mod('main_advertising_setting_sidebar')) : ?>
			<div class="happy-sidebar">
				<?php echo get_theme_mod('main_advertising_setting_sidebar'); ?>
			</div>
		<?php endif; ?>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside><!-- #sidebar -->
<?php endif; ?>


