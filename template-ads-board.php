<?php
/**
Template Name: Ads Board
 **/
get_header(); ?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-ads-board-page' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' ) { $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
	<header class="page-header">
		<?php the_title( '<h2 class="widget-title"><i class="fa fa-list"></i>', '</h2>' ); ?>
		<?php if(is_user_logged_in()) :?>
        <div id="filters" class="add_new_ads">
            <div class="filters-select">
				<?php echo __('Add new ad', 'arc');?>
            </div>
        </div>
        <?php endif;?>
	</header>
    <div class="ads_form" style="display: none;">
        <form>
            <label for="select_ad_type"><?php echo __('Select Ads type:','arc');?></label>
            <br>
            <select name="select" id="select_ad_type">
                <option value="acquaintances" selected><?php echo __('Acquaintances', 'arc');?></option>
                <option value="services"><?php echo __('Services', 'arc');?></option>
            </select>
            <p><textarea style="min-height: 7em" rows="2" name="text_message" id="text_message"></textarea></p>
        </form>
        <button type="button" class="button" id="send_message"><?php echo __('Post Ad');?></button>
        <p id="ads_response" style="display:none; color: green"><?php echo __('Your ad on moderation', 'arc');?></p>
    </div>
	<div class="ads-list">
        <div class="clearfix"></div>
        <br>
        <!-- List ads -->
        <header class="entry-header">
            <h2 class="widget-title"><?php echo __('New advertisements', 'arc'); ?></h2>
        </header>
        <style>
            .ads-wrap {
                margin-bottom: 20px;
                display: flex;
                /*width: 90%;*/
                flex-direction: row;
                justify-content: normal;
            }

            .photo {
                padding-top: 10px;
                margin-right: 10px;
            }
            .avatar img {
                border-radius: 50%;
            }

            .ads-block {
                width: 100%;
                padding: 15px;
                padding-left: 40px;
                background-color: #282828;
                vertical-align: top;
                border-radius: 5px;
                box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 6px 0 rgba(0, 0, 0, 0.19);
            }

            .ads-text {
                margin-bottom: 20px;
            }
            .ads-date {
                float: right;
                font-style: italic;
                font-size: 14px;
            }
        </style>
        <div id="list_ads"></div>
        <button id="load_more_ads" class="button large" style="width: 30%;display: none;clear: both;margin: 0 auto;margin-top: 35px;"><?php echo __('Load more', 'arc');?></button>
	</div>
	<script>
        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
        /*var true_posts = '<?php //echo serialize($wp_query->query_vars); ?>';*/
        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
	</script>
	</main><!-- #main -->
	</div><!-- #primary -->
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-ads-board-page' ) == 'on') {
	get_sidebar();
}
get_footer();
