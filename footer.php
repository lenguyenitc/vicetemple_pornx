</div><!-- #content -->
<footer id="colophon" class="site-footer <?php if ( xbox_get_field_value( 'my-theme-options', 'layout' ) == 'boxed' ) :?>br-bottom-10<?php endif; ?>" role="contentinfo">
	<div class="row">
		<?php if(xbox_get_field_value( 'my-theme-options', 'show-sidebar-footer' ) == 'off'):?>
			<?php if ( function_exists( 'dynamic_sidebar' ) && is_active_sidebar( 'footer' ) ) : ?>
				<?php if ( get_theme_mod('mob_advertising_setting_footer') && wp_is_mobile()) : ?>
					<div class="happy-footer-mobile">
						<?php echo get_theme_mod('mob_advertising_setting_footer'); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>
				<?php if(get_theme_mod('main_advertising_setting_footer') && !wp_is_mobile()):?>
					<div class="happy-footer">
						<?php echo get_theme_mod('main_advertising_setting_footer'); ?>
					</div>
				<?php endif; ?>
		<?php endif;?>
		<?php if(xbox_get_field_value( 'my-theme-options', 'show-sidebar-footer' ) == 'on'):?>
			<?php if ( function_exists( 'dynamic_sidebar' ) && is_active_sidebar( 'footer' ) ) : ?>
				<div class="<?php echo xbox_get_field_value( 'my-theme-options', 'footer-columns' ); ?>">
					<?php dynamic_sidebar( 'footer' ); ?>
				</div>
			<?php endif; ?>
		<?php endif;?>
		<div class="clear"></div>
		<?php if ( xbox_get_field_value( 'my-theme-options', 'footer-logo' ) == 'on') : ?>
		<?php
			   if(get_theme_mod('enable_demos_logos') == 'demos'):?>
		<div class="logo-footer">
				   <a href="<?=site_url();?>" class="custom-logo-link" rel="home" aria-current="page">
			<?php
			if ('lesbian' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$logo_link = get_template_directory_uri() . '/assets/logos/LesbianX.png';
			}
			//teens
			if ('college' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$logo_link = get_template_directory_uri() . '/assets/logos/teens.png';
			}
			if ('milf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$logo_link = get_template_directory_uri() . '/assets/logos/MilfX.png';
			}
			if ('hentai' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$logo_link = get_template_directory_uri() . '/assets/logos/HentaiX.png';
			}
			//gay
			if ('livexcams' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$logo_link = get_template_directory_uri() . '/assets/logos/GayX.png';
			}
			//pornx default
			if ('trans' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$logo_link = get_template_directory_uri() . '/assets/logos/PornX-trans.png';
			}
			//trans
			if ('transs' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$logo_link = get_template_directory_uri() . '/assets/logos/TransX.png';
			}
			//fetish
			if ('filf' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$logo_link = get_template_directory_uri() . '/assets/logos/FetishX.png';
			}
			//porn light
			if ('light' == xbox_get_field_value( 'my-theme-options', 'choose-niche' )) {
				$logo_link = get_template_directory_uri() . '/assets/logos/PornX-trans.png';
			} ?>
			<img width="200" height="80" src="<?=$logo_link?>" class="custom-logo lazyloaded" alt="PornX">
		</a>
		</div>
		<?php else:
			if(has_custom_logo() && get_theme_mod('enable_demos_logos') == 'custom'):?>
			<div class="logo-footer">
				<?php echo get_custom_logo(); ?>
			</div>
			<?php endif;?>
			<?php endif;?>
		<?php endif;?>
		<?php if(xbox_get_field_value( 'my-theme-options', 'display_trending_tags' ) == 'on'):?>
		<div id="trending">
			<?php
			$all_countries = [
				'Algeria',
				'Argentina',
				'Australia',
				'Austria',
				'Bangladesh',
				'Belgium',
				'Brazil',
				'Canada',
				'Chile',
				'China',
				'Colombia',
				'Croatia',
				'Czech Republic',
				'Denmark',
				'Egypt',
				'France',
				'Germany',
				'Greece',
				'Hungary',
				'India',
				'Indonesia',
				'Ireland',
				'Israel',
				'Italy',
				'Japan',
				'Malaysia',
				'Mexico',
				'Morocco',
				'Netherlands',
				'New Zealand',
				'Norway',
				'Peru',
				'Philippines',
				'Poland',
				'Portugal',
				'Romania',
				'Serbia',
				'Singapore',
				'South Korea',
				'Sri Lanka',
				'Sweden',
				'Switzerland',
				'Taiwan',
				'Thailand',
				'Ukraine',
				'United Kingdom',
				'United States',
				'Venezuela',
				'Vietnam'
			];
			$ip = $_SERVER['REMOTE_ADDR'];
			if($curl = curl_init()) {
				curl_setopt($curl,CURLOPT_URL, 'http://ip-api.com/json/' . $ip);
				curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
				curl_setopt($curl,CURLOPT_HEADER,false);
				$out = curl_exec($curl);
				$out = json_decode($out);
				curl_close($curl);
			}?>
			<?php
			if(xbox_get_field_value( 'my-theme-options', 'display_trending_tags_by_country' ) == 'on') {
				$display_trending_country = 'block';
			} else $display_trending_country = 'none';
			?>
			<h3 style="text-align: center;display:<?=$display_trending_country?>"><?php echo __('Trending in ', 'arc');?>
				<select id="select_trending_country" style="display:<?=$display_trending_country?>">
				<?php foreach($all_countries as $value):
					if($out->country == $value):
					?>
				<option selected class="<?php echo mb_strtolower(str_replace(' ', '_', $value));?>" value="<?php echo $value;?>"><?php echo $value;?></option>
				<?php else:?>
					<option class="<?php echo mb_strtolower(str_replace(' ', '_', $value));?>" value="<?php echo $value;?>"><?php echo $value;?></option>
				<?php
					endif;
					endforeach;?>
				</select>
			</h3>
				<div id="trending_tags" style="margin-top: 20px;display: flex;justify-content: center;flex-wrap: wrap">
				<?php
				global $wpdb;
				$table_ip_country_trend = $wpdb->prefix . 'ip_country_trend';
				$country = $out->country;
				$res = $wpdb->get_row( "SELECT * FROM $table_ip_country_trend WHERE `country` = '" .$country. "'" );
				if($res){
					$arr_tag = $wpdb->get_col("SELECT `arr_tag` FROM $table_ip_country_trend WHERE `country` = '" .$country. "'");
					$arr_tag = unserialize($arr_tag[0]);
					if(count($arr_tag) < 15){
						$num_rand = 15 - count($arr_tag);
						$all_tags = get_tags('orderby=name&order=ASC&hide_empty=1');
						shuffle($all_tags);
						$i = 0;
						foreach ($all_tags as $value) {
							if(!in_array($value->slug, $arr_tag)) {
								if($i >= $num_rand) break;
								$i++;
								$rand_tag[] = $value->slug;
							}
						}
						$arr_tag = array_merge($arr_tag, $rand_tag);
						//print_r($arr_tag);
						foreach ($arr_tag as $tag):?>
							<?php $tag_name = restyle_tag(get_term_by('slug', $tag, 'post_tag')->name); ?>
						<?php if($tag_name != ''):?>
						<a href="<?php echo get_tag_link(get_term_by('slug', $tag, 'post_tag')->term_id);?>"><?php echo $tag_name;?></a>
							<?php endif;?>
					<?php
					endforeach;
					} else{
						$i = 0;
						shuffle($arr_tag);
						foreach ($arr_tag as $tag):
							$tag_name = restyle_tag(get_term_by('slug', $tag, 'post_tag')->name);
						if($i >= 15): break;
							else:
								?>
								<?php if($tag_name != ''):?>
								<a href="<?php echo get_tag_link(get_term_by('slug', $tag, 'post_tag')->term_id);?>"><?php echo $tag_name;?></a>
							<?php endif;?>
								<?php
								$i++;
							endif;
						endforeach;
					}
				}else{
					$all_tags = get_tags('orderby=name&order=ASC&hide_empty=1');
					if($all_tags && !is_wp_error($all_tags)){
						$i = 0;
						shuffle($all_tags);
						foreach ($all_tags as $tag):
							$tag_name = restyle_tag(get_term_by('slug', $tag->slug, 'post_tag')->name);
							if($i >= 15): break;
							else:
							?>
								<?php if($tag_name != ''):?>
							<a href="<?php echo get_tag_link($tag->term_id);?>"><?php echo $tag_name;?></a>
							<?php endif;?>
						<?php
						   $i++;
						endif;
						endforeach;
					} else echo 'There are no trending tags for your country yet';
				}
				?>
			</div>
		</div>
		<?php endif;?>
	</div>
	<div class="footer-menu-row">
		<div class="row">
			<?php if ( has_nav_menu( 'arc-footer-menu' ) ) : ?>
				<div class="footer-menu-container">
					<?php wp_nav_menu( array( 'theme_location' => 'arc-footer-menu' ) ); ?>

				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<div class="site-info copyright">
			<?php
			if(get_theme_mod('copyright_setting')):
				echo get_theme_mod('copyright_setting');
			endif;
			?>
		</div><!-- .site-info -->
		<p class="footer_rta" style="text-align: center;"><a href="<?php echo site_url( '/rta/' );?>"><img width="88" height="31" src="<?php echo get_template_directory_uri();?>/assets/img/rta.png"></a></p>
	</div>
</footer>
</div>

<a class="button" href="#" id="back-to-top" title="Back to top"><i class="fa fa-chevron-up"></i></a>

<?php wp_footer(); ?>

<!-- Other scripts -->
<?php if(get_theme_mod('other_code_setting')) echo get_theme_mod('other_code_setting'); ?>
<!-- Mobile scripts -->
<?php if(wp_is_mobile()) {
	if(get_theme_mod('mob_code_setting')) echo get_theme_mod('mob_code_setting');
} ?>

<!-- Premium Modal for logout user -->
<?php if(!is_customize_preview()) {
	get_template_part('template-parts/modal', 'subscribe');
}?>
<!-- Premium Modal Preview for logout user -->
<?php if(is_customize_preview() && get_theme_mod('subscribe_preview_show') == 'on') {
	get_template_part('template-parts/preview', 'subscribe');
}?>
<!-- Popup Modal -->
<?php
if(get_theme_mod('popup_show') == 'on' && !is_customize_preview()){
	if('main' == get_theme_mod('popup_page')) {
		if(is_front_page()) {
			require_once get_template_directory() . '/popup-style.php';
			get_template_part('template-parts/popup', 'show');
		}
	}
	if('category' == get_theme_mod('popup_page')) {
		if(is_page_template('template-categories.php')) {
			require_once get_template_directory() . '/popup-style.php';
			get_template_part('template-parts/popup', 'show');
		}
	}
	if('videos' == get_theme_mod('popup_page')) {
		if(is_single()) {
			require_once get_template_directory() . '/popup-style.php';
			get_template_part('template-parts/popup', 'show');
		}
	}
	if('all' == get_theme_mod('popup_page')) {
		require_once get_template_directory() . '/popup-style.php';
		get_template_part('template-parts/popup', 'show');
	}
}
?>
<!----Disclamer modal---->
<?php
if(get_theme_mod('disc_show') == "1" && !is_page_template('template-premium.php')) {
	get_template_part('template-parts/disclaimer', 'modal');
}
?>
<!-- Popup Modal Preview-->
<?php if(is_customize_preview() && get_theme_mod('popup_preview_show') == 'on') {
	get_template_part('template-parts/preview', 'popup');
}?>
<!----Cookie block---->
<?php
if(get_theme_mod('show_cookie') == "1" && !is_page_template('template-premium.php')) {
	get_template_part('template-parts/modal', 'cookie');
}?>
<!-- Premium Page Preview-->
<?php if(is_customize_preview() && get_theme_mod('premium_preview_page') == 'on') {
	get_template_part('template-parts/preview', 'premiumpage');
}?>
<!-- Login Modal Preview-->
<?php if(is_customize_preview() && get_theme_mod('login_form_preview') == 1) {
	get_template_part('template-parts/preview', 'login');
}?>
<!-- Register Modal Preview-->
<?php if(is_customize_preview() && get_theme_mod('reg_form_preview') == 1) {
	get_template_part('template-parts/preview', 'register');
}?>
<!-- Require Auth Modal-->
<?php if(!is_customize_preview()) {
	get_template_part('template-parts/auth', 'modal');
}
?>
<!-- Auth Modal Preview-->
<?php if(is_customize_preview() && get_theme_mod('login_popup_preview') == 1) {
	get_template_part('template-parts/preview-auth', 'modal');
}?>
<script>
	jQuery(document).ready(function($) {
		$('.favoriteLoggedOut').on('click', function (){
			$('#auth_modal').show().css('z-index', '9999999');
		});
		jQuery('#wpadminbar #wp-admin-bar-my-account.with-avatar>a img').remove();
		jQuery('li#wp-admin-bar-user-info a.ab-item img').remove();
		jQuery('li#wp-admin-bar-user-info a.ab-item').append("<img src='"+arc_ajax_var.defUserAvatar+"' srcset='"+arc_ajax_var.defUserAvatar+"' class='avatar avatar-64 photo avatar-default' height='64' width='64' />");
		jQuery('#wpadminbar #wp-admin-bar-my-account.with-avatar>a').append("<img src='"+arc_ajax_var.defUserAvatar+"' srcset='"+arc_ajax_var.defUserAvatar+"' class='avatar avatar-26 photo avatar-default lazyloaded' height='26' width='26' />");
	});
</script>
<script>
		/***Set default user avatar because of bug****/
		jQuery('p.photo_position img.gallery_photo').on('load', function () {
			jQuery('li#wp-admin-bar-my-account a.ab-item img, #wpadminbar #wp-admin-bar-my-account.with-avatar>a img').attr({
				'src': arc_ajax_var.defUserAvatar,
				'srcset': arc_ajax_var.defUserAvatar,
				'data-lazy-srcset': arc_ajax_var.defUserAvatar,
				'data-lazy-src': arc_ajax_var.defUserAvatar
			});

			jQuery('li#wp-admin-bar-user-info a img, #wpadminbar #wp-admin-bar-my-account.with-avatar>a img').attr({
				'src': arc_ajax_var.defUserAvatar,
				'srcset': arc_ajax_var.defUserAvatar,
				'data-lazy-srcset': arc_ajax_var.defUserAvatar,
				'data-lazy-src': arc_ajax_var.defUserAvatar
			});
			jQuery('#wpadminbar #wp-admin-bar-my-account.with-avatar>a img').remove();
			jQuery('li#wp-admin-bar-user-info a.ab-item img').remove();
			jQuery('li#wp-admin-bar-user-info a.ab-item').append("<img src='"+arc_ajax_var.defUserAvatar+"' srcset='"+arc_ajax_var.defUserAvatar+"' class='avatar avatar-64 photo avatar-default' height='64' width='64' />");
			jQuery('#wpadminbar #wp-admin-bar-my-account.with-avatar>a').append("<img src='"+arc_ajax_var.defUserAvatar+"' srcset='"+arc_ajax_var.defUserAvatar+"' class='avatar avatar-26 photo avatar-default lazyloaded' height='26' width='26' />");
		});
	/*** [end] set default user avatar because of bug****/
</script>
<style>
	/*#wpadminbar #wp-admin-bar-my-account.with-avatar>a img{
		display:none !important;
	}*/
	span#search_select-button > span.ui-icon.ui-icon-triangle-1-s {
		opacity: 0.5 !important;
	}
	span.ui-corner-all.ui-button.ui-widget > span.ui-icon.ui-icon-triangle-1-s {
		/*background-image: url("<?//=get_template_directory_uri().'/assets/svg/arrow-down-select.svg'?>") !important;*/
		background-image: url('data:image/svg+xml; utf-8,<svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.83927 5.68659C6.6477 5.86356 6.35229 5.86355 6.16072 5.68659L0.943663 0.867276C0.609394 0.558491 0.827874 -1.9787e-07 1.28294 -1.58086e-07L11.7171 7.54093e-07C12.1721 7.93877e-07 12.3906 0.558493 12.0563 0.867277L6.83927 5.68659Z" fill="<?=str_replace('#','%23', get_theme_mod('secondary_text_site_color'));?>" /></svg>') !important;
		background-position: 0px 3px !important;
	}

	span.ui-selectmenu-button-open.ui-corner-top > span.ui-icon.ui-icon-triangle-1-s {
		/*background-image: url("<?=get_template_directory_uri().'/assets/svg/arrow-up-select.svg'?>") !important;*/
		background-image: url('data:image/svg+xml; utf-8,<svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.83927 1.11858C6.6477 0.94162 6.35229 0.941621 6.16072 1.11859L0.943663 5.9379C0.609394 6.24668 0.827874 6.80518 1.28294 6.80518L11.7171 6.80518C12.1721 6.80517 12.3906 6.24668 12.0563 5.9379L6.83927 1.11858Z" fill="<?=str_replace('#','%23', get_theme_mod('text_site_color'));?>"/></svg>') !important;
		background-position: 0px 0px !important;
	}
	span#search_select-button.ui-selectmenu-button-open.ui-corner-top > span.ui-icon.ui-icon-triangle-1-s {
		opacity: 1 !important;
	}
	.woocommerce-store-notice, p.demo_store {
		display: none !important;
	}
	<?php
if('full-width' === xbox_get_field_value( 'my-theme-options', 'layout' )):?>
	body.custom-background {
		background-color: <?=get_theme_mod('background_color');?> !important;
	}
	<?php endif;?>
</style>
<script>
	jQuery(document).ready(function($){
		var submit_select_category = $("#submit_select_category").attr('required');
		var category_selected = '';
		$("#submit_select_category").selectmenu({
			change: function(event, data) {
				category_selected = data.item.label;

			}
		});

		$("#SubmitVideo button.large").on("click", function(e){
			if(submit_select_category == 'required' && !category_selected) {
				$('html, body').stop().animate({
					scrollTop: $('#submit_select_category-button').offset().top - 260
				}, 300);
				$('#submit_select_category-button').trigger('click');
		   }
		});
		var visible_a_prev = $('div.pagination ul li a[data-class="prev"]').css('display');
		var visible_a_first = $('div.pagination ul li a[data-class="first"]').css('display');
		var visible_a_next = $('div.pagination ul li a[data-class="next"]').css('display');
		var visible_a_last = $('div.pagination ul li a[data-class="last"]').css('display');
		if(visible_a_prev == 'none')  $('div.pagination ul li.li_prev').addClass('importantRule');
		else $('div.pagination ul li.li_prev').removeClass('importantRule');
		if(visible_a_first == 'none') $('div.pagination ul li.li_first').addClass('importantRule');
		else $('div.pagination ul li.li_first').removeClass('importantRule');
		if(visible_a_next == 'none') $('div.pagination ul li.li_next').addClass('importantRule');
		else $('div.pagination ul li.li_next').removeClass('importantRule');
		if(visible_a_last == 'none') $('div.pagination ul li.li_last').addClass('importantRule');
		else $('div.pagination ul li.li_last').removeClass('importantRule');

	});
</script>
</body>
</html>
