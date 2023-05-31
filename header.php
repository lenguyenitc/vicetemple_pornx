<?php
header('Cache-control: no-store');
header("X-Frame-Options: SAMEORIGIN");
/**Check user [start]*/
$ip = $_SERVER['REMOTE_ADDR'];
if($list_ip = get_option('ban_ip')){
	if(in_array($ip, $list_ip)){
		if($_SERVER['HTTP_REFERER'] !== site_url() . '/forbidden' || $_SERVER['HTTP_REFERER'] !== site_url() . '/forbidden/'){
			header('Location: ' . site_url() . '/forbidden/');
			//die();
		}
	}
}
/**
 * Check if plugins active
 */
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if (!is_plugin_active('dev-core-plugin/dev-core-plugin.php') ||
	!is_plugin_active('woocommerce/woocommerce.php') ||
	!is_plugin_active('meta-box/meta-box.php') ||
	!is_plugin_active('nextend-facebook-connect/nextend-facebook-connect.php') ||
	!is_plugin_active('wp-mail-smtp/wp_mail_smtp.php') ||
	!is_plugin_active('tinymce-advanced/tinymce-advanced.php') ||
	!is_plugin_active('blockonomics-bitcoin-payments/blockonomics-woocommerce.php') ||
	!is_plugin_active('rocket-lazy-load/rocket-lazy-load.php')) : ?>
	<style>
		body {
			background: #181c26;
		}
		body div:nth-child(1){
			position:fixed;
			top:0;
			left:0;
			right:0;
			bottom:0;
			text-align:center;
		}
		body div:nth-child(1) > div{
			position: absolute;
			top: 50%;
			left:0;
			right:0;
			transform: translateY(-50%);
			display:block;
			text-align:center;
		}
		p#msg {
			color: white;
			font-family: "Open Sans", sans-serif;
			font-size: 72pt;
			text-align: center;
			display: inline-flex;
			font-weight: 600;
			align-items: center;
			margin-bottom: 0;
			margin-top: 0;
		}
		a {
			border: 1px solid #c32ce2;
			border-radius: 4px;
			background: transparent;
			padding: 10px 20px;
			color: #c32ce2;
			outline: none;
			text-decoration: none;
			font-family: "Open Sans", sans-serif;
			font-size: 26pt;
			text-align: center;
			display: inline-flex;
			font-weight: 400;
			justify-content: center;
		}
	</style>
	<div>
		<div>
			<p id="msg">You need to Install and Activate required plugins for Theme</p>
			<p style="text-align: center">
				<a href="<?=admin_url() . 'themes.php?page=tgmpa-install-plugins&plugin_status=install'?>">Install Plugins</a>
			</p>
		</div>
	</div>
	<?php die();
endif;

/**Check user [end] */
/***check premium access***/
$premium_access = false;
if (is_user_logged_in() && $premium_access !== true) {
	$input_data = get_all_orders_current_user(get_current_user_id());
	if ($input_data !== false){
		$final = get_final_expires_time_of_active_user_order($input_data, false, get_current_user_id());
		if($final > time()){
			$premium_access = true;
		}
	}
}

$premium_duration = get_user_meta(get_current_user_id(), 'premium_duration', true);

if ( $premium_duration !== '' && $premium_access !== true) {
	$active_time = (($premium_duration['premium_duration'] * 86400) + $premium_duration['start']) - time();
	if ($active_time > 0) {
		$input_data = [];
		$final = get_final_expires_time_of_active_user_order($input_data, false, get_current_user_id());
		if($final > time()){
			$premium_access = true;
		}
	}
}

if(is_user_logged_in() && !current_user_can('administrator'))
	update_user_meta(get_current_user_id(), 'payed', $premium_access);

if(is_category()) {
	global $post;
	$category = get_queried_object();
	$current_cat_id = $category->term_id;
	if(get_term_meta($current_cat_id, 'category-premium-id', true) == 'on') {
		if ($premium_access || current_user_can('administrator')){
		} else {
			wp_redirect(site_url('/account-settings/?upgrade=plan'));
		}
	}
}
if(is_single()){
	if(get_post_meta($post->ID, 'premium_video', true) == 'on') {
		if ($premium_access || current_user_can('administrator')){
		} else {
			wp_redirect(site_url('/account-settings/?upgrade=plan'));
		}
	}
}
/*** [end] check premium access***/

/** Identify users who are online [start]**/
if (is_user_logged_in()) {
	update_user_meta(get_current_user_id(), 'last_active', time());
}
/** Identify users who are online [end]**/
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- RTA -->
	<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA" />
	<!-- Meta social networks -->
	<?php if(is_single()){
		require get_template_directory() . '/inc/additional-functions/front/meta-social.php';
	} ?>
	<!-- Temp Style -->
	<?php require get_template_directory() . '/temp-style.php'; ?>
	<?php
	if(get_theme_mod('code_setting')) echo get_theme_mod('code_setting');
	if(get_theme_mod('meta_setting')) echo get_theme_mod('meta_setting');
	?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
	<?php wp_head(); ?>
	<?php
	wp_site_icon();
	?>
	<style>
		i, a {
			color: <?php echo esc_html(get_theme_mod('main_color_setting'));?>
		}
		div#trending {
			display: none;
		}
		span.hd-video {
			display: none;
		}
	</style>
</head>
<body <?php if(xbox_get_field_value('my-theme-options','choose-niche')) { body_class('custom-background'); } else{ body_class(''); } ?>>
<div id="page" class="<?php if('boxed' == xbox_get_field_value('my-theme-options','layout')) { echo 'boxed';} else{ echo 'full-width'; } ?>">
	<header id="masthead" class="site-header" role="banner">
		<?php get_template_part( 'template-parts/content', 'top-bar' ); ?>
		<div class="site-branding row">
			<div class="logo">
				<?php
			   if(get_theme_mod('enable_demos_logos') == 'demos'):?>
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
				<img width="2000" height="406" src="<?=$logo_link?>" class="custom-logo lazyloaded" alt="PornX">
			   </a>
				<?php else:
				if(true === has_custom_logo() && get_theme_mod('enable_demos_logos') == 'custom'): echo get_custom_logo();
				elseif(display_header_text() == true && false === has_custom_logo()): ?>
					<?php if(get_theme_mod('under_title_tagline') == true)  {
						$line_height = 'line-height: 18px';
						$site_title_margin = '0px';
					} else $line_height = '';$site_title_margin = '-5px';?>
					<div style="margin-left: 24px;<?=$line_height?>">
						<a href="<?php echo esc_url(home_url());?>" style="margin-top:<?=$site_title_margin?>"><?php bloginfo('name');?></a>
						<?php if(get_theme_mod('under_title_tagline') == true): ?>
							<p style="margin: 0; font-size: 16px;"><?php bloginfo('description');?></p>
						<?php endif;?>
					</div>
				<?php endif;
				endif;
				?>
			</div>
			<?php if(xbox_get_field_value( 'my-theme-options', 'search-bar' ) == 'on') : ?>
				<?php get_template_part( 'template-parts/content', 'header-search' ); ?>
			<?php endif; ?>
			<?php if(xbox_get_field_value( 'my-theme-options', 'display_upgrade_btn' ) == 'on') : ?>
			<?php if(!$premium_access || current_user_can('administrator')):?>
			<div class="upgrade" style="align-self: center;height: auto !important">
				<?php if(!is_user_logged_in()):
					$items_wrap = '<ul id="%1$s" class="%2$s">%3$s
						<li id="menu-item-upgrade" class="upgrade-icon menu-item menu-item-type-post_type menu-item-object-page menu-item-upgrade">
						<a onclick="jQuery(\'#auth_modal\').show().css(\'z-index\', \'9999999\');">
						<span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.16289 16.0076C4.26706 16.0076 4.37123 15.9818 4.46539 15.9293L8.44539 13.7293L12.4254 15.9293C12.6346 16.0459 12.8921 16.0309 13.0879 15.8934C13.2837 15.7551 13.3829 15.5176 13.3446 15.2818L12.5779 10.5784L15.8221 7.25344C15.9854 7.08594 16.0421 6.8401 15.9679 6.61844C15.8937 6.39594 15.7012 6.2351 15.4696 6.19927L11.0112 5.5176L9.01123 1.2576C8.90789 1.03844 8.68706 0.898438 8.44539 0.898438C8.20289 0.898438 7.98289 1.03844 7.87956 1.2576L5.88039 5.5176L1.42206 6.19927C1.19039 6.23427 0.997894 6.39594 0.923728 6.61844C0.849561 6.84094 0.906227 7.08594 1.06956 7.25344L4.31373 10.5784L3.54706 15.2818C3.50873 15.5176 3.60873 15.7551 3.80373 15.8934C3.91039 15.9693 4.03623 16.0076 4.16289 16.0076Z" fill="white"/> </svg> </span>'.
						mb_substr(xbox_get_field_value('my-theme-options', 'upgrade-button-text'), 0, 20)
						.'</a></li></ul>';

					?>
				<button style="justify-content: center;white-space: nowrap;display: inline-flex;padding: 8px 30px 8px 30px;" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');" type="button"><i style="padding-top: 2px;" class="fa fa-star"></i><?=mb_substr(xbox_get_field_value( 'my-theme-options', 'upgrade-button-text'), 0, 20)?></button>
				<?php else:
					$items_wrap = '<ul id="%1$s" class="%2$s">%3$s
						<li style="background:'. get_theme_mod( 'primary_color_setting' ).'!important;" id="menu-item-upgrade" class="upgrade-icon menu-item menu-item-type-post_type menu-item-object-page menu-item-upgrade">
						<a style="box-shadow:none!important;border:none!important;background:'. get_theme_mod( 'primary_color_setting' ).'!important;" href="'.site_url('/account-settings/') . '?upgrade=plan'.'">
						<span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.16289 16.0076C4.26706 16.0076 4.37123 15.9818 4.46539 15.9293L8.44539 13.7293L12.4254 15.9293C12.6346 16.0459 12.8921 16.0309 13.0879 15.8934C13.2837 15.7551 13.3829 15.5176 13.3446 15.2818L12.5779 10.5784L15.8221 7.25344C15.9854 7.08594 16.0421 6.8401 15.9679 6.61844C15.8937 6.39594 15.7012 6.2351 15.4696 6.19927L11.0112 5.5176L9.01123 1.2576C8.90789 1.03844 8.68706 0.898438 8.44539 0.898438C8.20289 0.898438 7.98289 1.03844 7.87956 1.2576L5.88039 5.5176L1.42206 6.19927C1.19039 6.23427 0.997894 6.39594 0.923728 6.61844C0.849561 6.84094 0.906227 7.08594 1.06956 7.25344L4.31373 10.5784L3.54706 15.2818C3.50873 15.5176 3.60873 15.7551 3.80373 15.8934C3.91039 15.9693 4.03623 16.0076 4.16289 16.0076Z" fill="white"/> </svg> </span>'.
						mb_substr(xbox_get_field_value('my-theme-options', 'upgrade-button-text'), 0, 20)
						.'</a></li></ul>';

					?>
				<button id="upgrade_btn" style="justify-content: center;white-space: nowrap;display: inline-flex;padding: 8px 30px 8px 30px;" data-href="<?=site_url('/account-settings/') . '?upgrade=plan'?>" type="button"><i style="padding-top: 2px;" class="fa fa-star"></i><?=mb_substr(xbox_get_field_value( 'my-theme-options', 'upgrade-button-text'), 0, 20)?></button>
				<?php endif;?>
			</div>
			<?php endif;?>
			<?php else: $items_wrap = '<ul id="%1$s" class="%2$s">%3$s</ul>'?>
			<?php endif;?>

			<?php if(get_theme_mod('main_advertising_setting_header')): ?>
				<div class="happy-header" style="height: 60px">
					<?php echo get_theme_mod('main_advertising_setting_header'); ?>
				</div>
			<?php endif; ?>
		</div><!-- .site-branding -->
		<nav id="site-navigation" class="main-navigation membership-enabled" role="navigation">
			<?php
			if (has_nav_menu('arc-main-menu'))
				wp_nav_menu(['theme_location' => 'arc-main-menu', 'menu_class' => 'row', 'container' => false, 'items_wrap'=> $items_wrap]);
			?>
			<script>
			jQuery(document).ready(function($){
				$('#site-navigation #menu-main-menu li').each(function (){
					var arrClass = $(this).attr("class").split(' ');
					if (arrClass.indexOf( 'home-icon' ) != -1) {
						$(this).find('a').prepend('<span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">' + '<path d="M19.4608 8.69904C19.4603 8.69858 19.4599 8.69812 19.4594 8.69766L11.301 0.539551C10.9532 0.19165 10.4909 0 9.9991 0C9.50731 0 9.04497 0.191498 8.69707 0.539398L0.542928 8.69339C0.540182 8.69614 0.537435 8.69904 0.534688 8.70178C-0.179423 9.42001 -0.178202 10.5853 0.538198 11.3017C0.865499 11.6292 1.29778 11.8188 1.75997 11.8387C1.77874 11.8405 1.79766 11.8414 1.81673 11.8414H2.1419V17.8453C2.1419 19.0334 3.10854 20 4.2969 20H7.48873C7.81221 20 8.07467 19.7377 8.07467 19.4141V14.707C8.07467 14.1649 8.51565 13.7239 9.05779 13.7239H10.9404C11.4826 13.7239 11.9235 14.1649 11.9235 14.707V19.4141C11.9235 19.7377 12.1858 20 12.5095 20H15.7013C16.8897 20 17.8563 19.0334 17.8563 17.8453V11.8414H18.1578C18.6495 11.8414 19.1118 11.6499 19.4599 11.302C20.177 10.5844 20.1773 9.41711 19.4608 8.69904Z" fill="white"/> </svg></span>');
					} else if (arrClass.indexOf( 'video-icon' ) != -1) {
						$(this).find('a').prepend('<span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.99998 0C4.47715 0 0 4.47715 0 9.99998C0 15.5228 4.47715 20 9.99998 20C15.5228 20 20 15.5228 20 9.99998C19.9941 4.47961 15.5204 0.00590122 9.99998 0ZM14.2114 10.3186C14.1421 10.4575 14.0296 10.5701 13.8907 10.6393V10.6428L8.17642 13.5C7.82352 13.6763 7.39453 13.5332 7.21816 13.1803C7.16802 13.08 7.1422 12.9693 7.14282 12.8571V7.14287C7.14266 6.74836 7.46229 6.42844 7.85679 6.42823C7.96774 6.42819 8.07718 6.45397 8.17642 6.50357L13.8907 9.36072C14.2438 9.53667 14.3874 9.96553 14.2114 10.3186Z" fill="white"/></svg></span>');
					} else if (arrClass.indexOf( 'cat-icon' ) != -1) {
						$(this).find('a').prepend('<span><svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.7367 5.88184C19.5454 5.672 19.2746 5.55229 18.9906 5.55229H1.00938C0.725445 5.55229 0.454532 5.672 0.263258 5.88184C0.0719842 6.09169 -0.0219874 6.37249 0.00435694 6.65522L0.963755 16.9607C1.0121 17.4797 1.44754 17.8765 1.96878 17.8765H18.0312C18.5524 17.8765 18.9878 17.4796 19.0362 16.9607L19.9956 6.65522C20.0219 6.37249 19.9279 6.09169 19.7367 5.88184ZM13.3666 15.7628H13.3646H6.63546C6.07799 15.7628 5.6261 15.3108 5.6261 14.7534C5.6261 13.3827 6.74124 12.2676 8.11195 12.2676H8.83637C8.09136 11.856 7.58547 11.0624 7.58547 10.1528C7.58547 8.82141 8.66862 7.73816 10.0001 7.73816C11.3315 7.73816 12.4147 8.82131 12.4147 10.1528C12.4147 11.0624 11.9088 11.856 11.1638 12.2676H11.8882C13.2309 12.2676 14.3284 13.3378 14.3726 14.6701C14.3748 14.6975 14.3761 14.7254 14.3761 14.7534C14.376 15.3109 13.9241 15.7628 13.3666 15.7628ZM18.0581 3.67316C18.0581 4.09134 17.7192 4.43018 17.3011 4.43018H2.69895C2.28087 4.43018 1.94193 4.09134 1.94193 3.67316C1.94193 3.25498 2.28087 2.91614 2.69895 2.91614C8.40144 2.91614 11.5986 2.91614 17.3011 2.91614C17.7192 2.91614 18.0581 3.25498 18.0581 3.67316ZM16.0596 0.880557C16.0596 1.29874 15.7206 1.63758 15.3025 1.63758H4.69749C4.27941 1.63758 3.94046 1.29874 3.94046 0.880557C3.94046 0.462378 4.27941 0.123535 4.69749 0.123535H15.3024C15.7206 0.123535 16.0596 0.462378 16.0596 0.880557Z" fill="white"/> </svg></span>');
					} else if (arrClass.indexOf( 'tag-icon' ) != -1) {
						$(this).find('a').prepend('<span><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.3447 0.654297H10.8086C10.2768 0.654297 9.77695 0.861367 9.40098 1.23738L1.57137 9.06704C1.19535 9.44302 0.988281 9.9429 0.988281 10.4746C0.988281 11.0063 1.19535 11.5062 1.57137 11.8822L7.10746 17.4181C7.49551 17.8062 8.00527 18.0002 8.515 18.0002C9.02473 18.0002 9.53449 17.8061 9.92254 17.4181L17.7522 9.58837C18.1282 9.21235 18.3353 8.71251 18.3353 8.18079V2.64485C18.3353 1.54727 17.4423 0.654297 16.3447 0.654297ZM13.6906 7.28962C12.593 7.28962 11.7 6.39665 11.7 5.29903C11.7 4.20141 12.593 3.30844 13.6906 3.30844C14.7882 3.30844 15.6812 4.20141 15.6812 5.29903C15.6812 6.39665 14.7882 7.28962 13.6906 7.28962Z" fill="white"/> </svg></span>');
					} else if (arrClass.indexOf( 'star-icon' ) != -1) {
						$(this).find('a').prepend('<span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.16289 16.0076C4.26706 16.0076 4.37123 15.9818 4.46539 15.9293L8.44539 13.7293L12.4254 15.9293C12.6346 16.0459 12.8921 16.0309 13.0879 15.8934C13.2837 15.7551 13.3829 15.5176 13.3446 15.2818L12.5779 10.5784L15.8221 7.25344C15.9854 7.08594 16.0421 6.8401 15.9679 6.61844C15.8937 6.39594 15.7012 6.2351 15.4696 6.19927L11.0112 5.5176L9.01123 1.2576C8.90789 1.03844 8.68706 0.898438 8.44539 0.898438C8.20289 0.898438 7.98289 1.03844 7.87956 1.2576L5.88039 5.5176L1.42206 6.19927C1.19039 6.23427 0.997894 6.39594 0.923728 6.61844C0.849561 6.84094 0.906227 7.08594 1.06956 7.25344L4.31373 10.5784L3.54706 15.2818C3.50873 15.5176 3.60873 15.7551 3.80373 15.8934C3.91039 15.9693 4.03623 16.0076 4.16289 16.0076Z" fill="white"/> </svg> </span>');
					} else if (arrClass.indexOf( 'photo-icon' ) != -1) {
						$(this).find('a').prepend('<span><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path=""><path d="M15.3426 10.3128C14.9753 10.3128 14.6774 10.015 14.6774 9.64761C14.6774 9.28024 14.9753 8.98242 15.3426 8.98242C15.71 8.98242 16.0078 9.28024 16.0078 9.64761C16.0078 10.015 15.71 10.3128 15.3426 10.3128Z" fill="white"/> <path d="M13.5422 15.4392C13.8021 15.6991 14.223 15.6991 14.4829 15.4392L15.3429 14.5792L19.0586 18.2949H3.64497L10.0214 11.9185L13.5422 15.4392Z" fill="white"/> <path d="M15.814 13.1684C15.5542 12.9085 15.1332 12.9085 14.8734 13.1684L14.0133 14.0284L10.4925 10.5076C10.2327 10.2477 9.81169 10.2477 9.55187 10.5076L2.70514 17.3543V5.6564C2.70514 5.28873 3.00266 4.99121 3.37033 4.99121H19.3348C19.7025 4.99121 20 5.28873 20 5.6564V17.3543L15.814 13.1684ZM15.3437 7.65196C14.2433 7.65196 13.3481 8.54712 13.3481 9.64752C13.3481 10.7479 14.2433 11.6431 15.3437 11.6431C16.4441 11.6431 17.3393 10.7479 17.3393 9.64752C17.3393 8.54712 16.4441 7.65196 15.3437 7.65196Z" fill="white"/> <path d="M0.665825 1H16.6747C17.0423 1 17.3398 1.29752 17.3398 1.66519V3.66075H3.37092C2.27052 3.66075 1.37536 4.55591 1.37536 5.65631V14.3037H0.665825C0.298155 14.3037 0.000638962 14.0062 0.000638962 13.6386V1.66519C0.000638962 1.29752 0.298155 1 0.665825 1Z" fill="white"/> </g> <defs> <clipPath > <rect width="20" height="20" fill="white" transform="matrix(-1 0 0 1 20 0)"/> </clipPath> </defs> </svg></span>');
					} else if (arrClass.indexOf( 'user-icon' ) != -1) {
						$(this).find('a').prepend('<span><svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M11.5 9C13.4329 9 15 6.98526 15 4.50003C15 2.01474 14.4854 0 11.5 0C8.51448 0 8 2.01474 8 4.50003C8.00005 6.98526 9.56709 9 11.5 9Z" fill="white"/> <path d="M18.9915 17.0044C18.9181 12.2243 18.312 10.8622 13.6745 10C13.6745 10 13.0216 10.8569 11.5001 10.8569C9.97852 10.8569 9.32572 10 9.32572 10C4.7388 10.8527 4.09581 12.1947 4.0113 16.8491C4.00442 17.2292 4.00126 17.2491 4 17.205C4.00024 17.2876 4.0006 17.4405 4.0006 17.7072C4.0006 17.7072 5.10471 20 11.5001 20C17.8955 20 18.9998 17.7072 18.9998 17.7072C18.9998 17.5359 18.9999 17.4167 19 17.3357C18.9987 17.363 18.9962 17.3101 18.9915 17.0044Z" fill="white"/> <path d="M6.43334 9C6.99794 9 7.53008 8.84028 8 8.55898C7.3166 7.521 6.94551 6.2674 6.94551 4.95435C6.94551 3.79461 7.03822 2.3418 7.71455 1.14575C7.34995 1.05084 6.9261 1 6.43334 1C3.50459 1 3 2.79087 3 5.00006C3 7.20913 4.5372 9 6.43334 9Z" fill="white"/> <path d="M6 9.7051C5.95322 9.70742 5.90559 9.70905 5.85634 9.70905C4.6682 9.70905 4.15843 9 4.15843 9C0.537237 9.71344 0.0639582 10.8404 0.00660844 14.7956C0.00287323 15.0504 0.000976899 15.0926 0 15.0689C0.000114929 15.136 0.000229859 15.2341 0.000229859 15.3771C0.000229859 15.3771 0.499598 16.4745 2.93575 17C2.97742 14.4175 3.17831 12.6595 4.05275 11.3508C4.55844 10.594 5.24509 10.0766 6 9.7051Z" fill="white"/> </svg> </span>');
					} else if (arrClass.indexOf( 'blog-icon' ) != -1) {
						$(this).find('a').prepend('<span><svg width="15" height="18" xmlns="http://www.w3.org/2000/svg" fill="none" x="0px" y="0px" viewBox="0 0 202 202"> <path fill="white" d="M148.004,94.812c18.332-8.126,28.671-23.362,28.671-42.752c0-17.261-6.954-31.206-20.11-40.328 C145.653,4.166,130.438,0,113.721,0H16.957v34h17v134h-17v34h90.905c14.819,0,35.992-2.245,52.705-12.94 c16.241-10.393,24.476-26.161,24.476-46.868C185.043,118.342,171.057,100.763,148.004,94.812z M103.12,80H73.957V34h26.096 c25.961,0,36.551,6.34,36.551,21.884C136.604,75.816,118.396,80,103.12,80z M73.957,115h30.838c28.537,0,40.177,7.436,40.177,25.663 c0,18.14-13.987,27.337-41.572,27.337H73.957V115z"/></svg></span>');
					}
				});
			});
			</script>
		</nav><!-- #site-navigation -->
		<div class="clear"></div>
		<?php if(get_theme_mod('mob_advertising_setting_header')): ?>
			<div class="happy-header-mobile" style="margin-bottom: 20px;">
				<?php echo get_theme_mod('mob_advertising_setting_header'); ?>
			</div>
		<?php endif; ?>
	</header><!-- #masthead -->

	<?php if ( function_exists('arc_breadcrumbs') && xbox_get_field_value( 'my-theme-options', 'enable_breadcrumbs' ) == 'on' ) {
		arc_breadcrumbs();
	} ?>

	<?php if( xbox_get_field_value( 'my-theme-options', 'show-carousel-of-videos' ) == 'on' && is_home() ) {
		get_template_part( 'template-parts/content', 'featured-carousel' ); } ?>
	<div id="content" class="site-content row">