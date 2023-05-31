<?php
/**
Template Name: Community
 **/
get_header(); ?>
<?php $filter_max_width = '1253px';?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<header class="page-header community-header">
				<h2 class="widget-title" style="text-align: center">Community</h2>
			</header>
            <div id="community-tabs" class="tabs">
				<?php if(isset($_GET['users'])):?>
                    <button class="tab-link feed" data-tab-id="feed">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip_remove_user_post11)">
                                <rect x="-0.00390625" y="4" width="20" height="2" rx="1" fill="white"/>
                                <rect x="-0.00390625" y="9" width="20" height="2" rx="1" fill="white"/>
                                <rect x="-0.00390625" y="14" width="20" height="2" rx="1" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip_remove_user_post11">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg> <?php echo esc_html__('Feed', 'arc'); ?></button>
                    <button class="tab-link members" data-tab-id="members">
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.5 9C13.4329 9 15 6.98526 15 4.50003C15 2.01474 14.4854 0 11.5 0C8.51448 0 8 2.01474 8 4.50003C8.00005 6.98526 9.56709 9 11.5 9Z" fill="white"/>
                            <path d="M18.9915 17.0044C18.9181 12.2243 18.312 10.8622 13.6745 10C13.6745 10 13.0216 10.8569 11.5001 10.8569C9.97852 10.8569 9.32572 10 9.32572 10C4.7388 10.8527 4.09581 12.1947 4.0113 16.8491C4.00442 17.2292 4.00126 17.2491 4 17.205C4.00024 17.2876 4.0006 17.4405 4.0006 17.7072C4.0006 17.7072 5.10471 20 11.5001 20C17.8955 20 18.9998 17.7072 18.9998 17.7072C18.9998 17.5359 18.9999 17.4167 19 17.3357C18.9987 17.363 18.9962 17.3101 18.9915 17.0044Z" fill="white"/>
                            <path d="M6.43334 9C6.99794 9 7.53008 8.84028 8 8.55898C7.3166 7.521 6.94551 6.2674 6.94551 4.95435C6.94551 3.79461 7.03822 2.3418 7.71455 1.14575C7.34995 1.05084 6.9261 1 6.43334 1C3.50459 1 3 2.79087 3 5.00006C3 7.20913 4.5372 9 6.43334 9Z" fill="white"/>
                            <path d="M6 9.7051C5.95322 9.70742 5.90559 9.70905 5.85634 9.70905C4.6682 9.70905 4.15843 9 4.15843 9C0.537237 9.71344 0.0639582 10.8404 0.00660844 14.7956C0.00287323 15.0504 0.000976899 15.0926 0 15.0689C0.000114929 15.136 0.000229859 15.2341 0.000229859 15.3771C0.000229859 15.3771 0.499598 16.4745 2.93575 17C2.97742 14.4175 3.17831 12.6595 4.05275 11.3508C4.55844 10.594 5.24509 10.0766 6 9.7051Z" fill="white"/>
                        </svg><?php echo esc_html__('Members', 'arc'); ?></button>
                    <button class="tab-link active advanced_search" data-tab-id="advanced_search">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip_remove_user_post10)">
                                <path d="M11.6719 13.9561C11.2131 13.9561 10.8398 14.3293 10.8398 14.7881C10.8398 15.2469 11.2131 15.6202 11.6719 15.6202C12.1307 15.6202 12.504 15.2469 12.504 14.7881C12.504 14.3293 12.1307 13.9561 11.6719 13.9561Z" fill="white"/>
                                <path d="M6.50784 10.8262C6.96652 10.8262 7.3399 10.4529 7.3399 9.99417C7.3399 9.53534 6.96652 9.16211 6.50784 9.16211C6.04901 9.16211 5.67578 9.53534 5.67578 9.99417C5.67578 10.4529 6.04901 10.8262 6.50784 10.8262Z" fill="white"/>
                                <path d="M11.5938 6.03214C12.0526 6.03214 12.4258 5.65891 12.4258 5.20007C12.4258 4.74139 12.0526 4.36816 11.5938 4.36816C11.1349 4.36816 10.7617 4.74139 10.7617 5.20007C10.7617 5.65891 11.1349 6.03214 11.5938 6.03214Z" fill="white"/>
                                <path d="M17.2386 0.703125H2.76138C1.23871 0.703125 0 1.94183 0 3.46451V16.5739C0 18.0966 1.23871 19.3355 2.76138 19.3355H17.2386C18.7613 19.3355 20 18.0966 20 16.5739V3.46451C20 1.94183 18.7613 0.703125 17.2386 0.703125V0.703125ZM3.07388 4.61304H9.67438C9.92584 3.79257 10.6905 3.19412 11.5924 3.19412C12.4942 3.19412 13.2588 3.79257 13.5104 4.61304H16.9243C17.2484 4.61304 17.5113 4.87595 17.5113 5.20004C17.5113 5.52414 17.2484 5.7869 16.9243 5.7869H13.5104C13.2588 6.60751 12.4942 7.20581 11.5924 7.20581C10.6905 7.20581 9.92584 6.60751 9.67438 5.7869H3.07388C2.74979 5.7869 2.48703 5.52414 2.48703 5.20004C2.48703 4.87595 2.74979 4.61304 3.07388 4.61304ZM3.07388 9.4072H4.58786C4.83948 8.58673 5.6041 7.98828 6.50589 7.98828C7.40784 7.98828 8.17245 8.58673 8.42407 9.4072H16.9243C17.2484 9.4072 17.5111 9.6701 17.5111 9.9942C17.5111 10.3183 17.2484 10.5811 16.9243 10.5811H8.42407C8.17245 11.4017 7.40784 12 6.50604 12C5.6041 12 4.83948 11.4017 4.58801 10.5811H3.07388C2.74979 10.5811 2.48703 10.3183 2.48703 9.9942C2.48703 9.6701 2.74979 9.4072 3.07388 9.4072ZM17.0032 15.3752H13.5892C13.3376 16.1958 12.5729 16.7941 11.6711 16.7941C10.7692 16.7941 10.0047 16.1958 9.75311 15.3752H3.15277C2.82852 15.3752 2.56577 15.1125 2.56577 14.7884C2.56577 14.4643 2.82852 14.2014 3.15277 14.2014H9.75311C10.0047 13.3809 10.7693 12.7824 11.6711 12.7824C12.5729 12.7824 13.3376 13.3809 13.5892 14.2014H17.0032C17.3273 14.2014 17.59 14.4643 17.59 14.7884C17.59 15.1125 17.3273 15.3752 17.0032 15.3752Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip_remove_user_post10">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="big_screen_span"><?php echo esc_html__('Advanced Search', 'arc'); ?></span>
                        <span class="middle_screen_span" style="display:none"><?php echo esc_html__('Adv. Search', 'arc'); ?></span>
                        <span class="small_screen_span" style="display:none"><?php echo esc_html__('Search', 'arc'); ?></span>
                    </button>
				<?php else: ?>
                    <button class="tab-link active feed" data-tab-id="feed">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip_remove_user_post9)">
                                <rect x="-0.00390625" y="4" width="20" height="2" rx="1" fill="white"/>
                                <rect x="-0.00390625" y="9" width="20" height="2" rx="1" fill="white"/>
                                <rect x="-0.00390625" y="14" width="20" height="2" rx="1" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip_remove_user_post9">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg><?php echo esc_html__('Feed', 'arc'); ?></button>
                    <button class="tab-link members" data-tab-id="members">
                        <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.5 9C13.4329 9 15 6.98526 15 4.50003C15 2.01474 14.4854 0 11.5 0C8.51448 0 8 2.01474 8 4.50003C8.00005 6.98526 9.56709 9 11.5 9Z" fill="white"/>
                            <path d="M18.9915 17.0044C18.9181 12.2243 18.312 10.8622 13.6745 10C13.6745 10 13.0216 10.8569 11.5001 10.8569C9.97852 10.8569 9.32572 10 9.32572 10C4.7388 10.8527 4.09581 12.1947 4.0113 16.8491C4.00442 17.2292 4.00126 17.2491 4 17.205C4.00024 17.2876 4.0006 17.4405 4.0006 17.7072C4.0006 17.7072 5.10471 20 11.5001 20C17.8955 20 18.9998 17.7072 18.9998 17.7072C18.9998 17.5359 18.9999 17.4167 19 17.3357C18.9987 17.363 18.9962 17.3101 18.9915 17.0044Z" fill="white"/>
                            <path d="M6.43334 9C6.99794 9 7.53008 8.84028 8 8.55898C7.3166 7.521 6.94551 6.2674 6.94551 4.95435C6.94551 3.79461 7.03822 2.3418 7.71455 1.14575C7.34995 1.05084 6.9261 1 6.43334 1C3.50459 1 3 2.79087 3 5.00006C3 7.20913 4.5372 9 6.43334 9Z" fill="white"/>
                            <path d="M6 9.7051C5.95322 9.70742 5.90559 9.70905 5.85634 9.70905C4.6682 9.70905 4.15843 9 4.15843 9C0.537237 9.71344 0.0639582 10.8404 0.00660844 14.7956C0.00287323 15.0504 0.000976899 15.0926 0 15.0689C0.000114929 15.136 0.000229859 15.2341 0.000229859 15.3771C0.000229859 15.3771 0.499598 16.4745 2.93575 17C2.97742 14.4175 3.17831 12.6595 4.05275 11.3508C4.55844 10.594 5.24509 10.0766 6 9.7051Z" fill="white"/>
                        </svg>
                        <?php echo esc_html__('Members', 'arc'); ?></button>
                    <button class="tab-link advanced_search" data-tab-id="advanced_search">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip_remove_user_post8)">
                                <path d="M11.6719 13.9561C11.2131 13.9561 10.8398 14.3293 10.8398 14.7881C10.8398 15.2469 11.2131 15.6202 11.6719 15.6202C12.1307 15.6202 12.504 15.2469 12.504 14.7881C12.504 14.3293 12.1307 13.9561 11.6719 13.9561Z" fill="white"/>
                                <path d="M6.50784 10.8262C6.96652 10.8262 7.3399 10.4529 7.3399 9.99417C7.3399 9.53534 6.96652 9.16211 6.50784 9.16211C6.04901 9.16211 5.67578 9.53534 5.67578 9.99417C5.67578 10.4529 6.04901 10.8262 6.50784 10.8262Z" fill="white"/>
                                <path d="M11.5938 6.03214C12.0526 6.03214 12.4258 5.65891 12.4258 5.20007C12.4258 4.74139 12.0526 4.36816 11.5938 4.36816C11.1349 4.36816 10.7617 4.74139 10.7617 5.20007C10.7617 5.65891 11.1349 6.03214 11.5938 6.03214Z" fill="white"/>
                                <path d="M17.2386 0.703125H2.76138C1.23871 0.703125 0 1.94183 0 3.46451V16.5739C0 18.0966 1.23871 19.3355 2.76138 19.3355H17.2386C18.7613 19.3355 20 18.0966 20 16.5739V3.46451C20 1.94183 18.7613 0.703125 17.2386 0.703125V0.703125ZM3.07388 4.61304H9.67438C9.92584 3.79257 10.6905 3.19412 11.5924 3.19412C12.4942 3.19412 13.2588 3.79257 13.5104 4.61304H16.9243C17.2484 4.61304 17.5113 4.87595 17.5113 5.20004C17.5113 5.52414 17.2484 5.7869 16.9243 5.7869H13.5104C13.2588 6.60751 12.4942 7.20581 11.5924 7.20581C10.6905 7.20581 9.92584 6.60751 9.67438 5.7869H3.07388C2.74979 5.7869 2.48703 5.52414 2.48703 5.20004C2.48703 4.87595 2.74979 4.61304 3.07388 4.61304ZM3.07388 9.4072H4.58786C4.83948 8.58673 5.6041 7.98828 6.50589 7.98828C7.40784 7.98828 8.17245 8.58673 8.42407 9.4072H16.9243C17.2484 9.4072 17.5111 9.6701 17.5111 9.9942C17.5111 10.3183 17.2484 10.5811 16.9243 10.5811H8.42407C8.17245 11.4017 7.40784 12 6.50604 12C5.6041 12 4.83948 11.4017 4.58801 10.5811H3.07388C2.74979 10.5811 2.48703 10.3183 2.48703 9.9942C2.48703 9.6701 2.74979 9.4072 3.07388 9.4072ZM17.0032 15.3752H13.5892C13.3376 16.1958 12.5729 16.7941 11.6711 16.7941C10.7692 16.7941 10.0047 16.1958 9.75311 15.3752H3.15277C2.82852 15.3752 2.56577 15.1125 2.56577 14.7884C2.56577 14.4643 2.82852 14.2014 3.15277 14.2014H9.75311C10.0047 13.3809 10.7693 12.7824 11.6711 12.7824C12.5729 12.7824 13.3376 13.3809 13.5892 14.2014H17.0032C17.3273 14.2014 17.59 14.4643 17.59 14.7884C17.59 15.1125 17.3273 15.3752 17.0032 15.3752Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip_remove_user_post8">
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span class="big_screen_span"><?php echo esc_html__('Advanced Search', 'arc'); ?></span>
                        <span class="middle_screen_span" style="display:none"><?php echo esc_html__('Adv. Search', 'arc'); ?></span>
                        <span class="small_screen_span" style="display:none"><?php echo esc_html__('Search', 'arc'); ?></span>
                    </button>
				<?php endif;?>
            </div>
            <div id="community_tab_content">
                <!--feed tab--->
                <div class="community-list" id="feed" style="display:<?=(isset($_GET['users'])) ? 'none' : 'flex'?>">
                    <?php
                    if(xbox_get_field_value('my-theme-options', 'display_activity_sidebar') == 'on'):
                        $user_feeds = 71.6;?>
                    <?php else:
	                    $user_feeds = 100;
	                    $activity = 'display:none';?>
	                    <style>
                            #community_tab_content {
                                padding-left: 24px !important;
                            }
                        </style>
                    <?php endif;?>

                    <div id="users_feeds" style="width: <?=$user_feeds?>%">
                        <!-- FORM for write a post [start]-->
	                    <?php if (is_user_logged_in()) :?>
                            <button type="button" id="write_a_post">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip_remove_user_post7)">
                                        <path d="M10.7508 4.98373C10.9462 5.12053 10.9938 5.39205 10.8569 5.58722L5.27532 13.5415C5.13836 13.7366 4.84058 13.9558 4.61347 14.0285L1.98786 14.8689C1.76076 14.9416 1.56732 14.8062 1.55802 14.568L1.4498 11.8132C1.44042 11.575 1.54485 11.2204 1.68181 11.0253L7.26328 3.07093C7.40025 2.87577 7.67203 2.82799 7.86737 2.9647L10.7508 4.98373Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M12.7628 2.09698C12.9582 2.23377 13.006 2.50538 12.8693 2.70072L12.074 3.83657C11.9372 4.03191 11.6656 4.07977 11.4702 3.94306L8.58678 1.92403C8.39144 1.78723 8.34358 1.51562 8.48028 1.32029L9.27566 0.184432C9.41245 -0.0109029 9.68406 -0.0587682 9.8794 0.0779406L12.7628 2.09698Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M13.5504 14.5445C13.5504 14.783 13.3554 14.9787 13.117 14.9796L7.52776 15.0001C7.28938 15.0009 7.20639 14.8421 7.34353 14.647L8.86187 12.4864C8.99893 12.2913 9.30618 12.1307 9.54455 12.1294L13.117 12.1104C13.3554 12.1091 13.5504 12.3031 13.5504 12.5416V14.5445Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M13.5477 10.7409C13.5477 10.9793 13.3526 11.1756 13.1142 11.177L9.9926 11.1955C9.75422 11.1968 9.67123 11.0384 9.80837 10.8434L11.3267 8.68271C11.4638 8.48763 11.771 8.3257 12.0094 8.32286L13.1143 8.3096C13.3527 8.30676 13.5478 8.49943 13.5478 8.73789V10.7409H13.5477Z" fill="white" fill-opacity="0.5"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip_remove_user_post7">
                                            <rect width="15" height="15" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg><?php echo __('Write a post');?></button>
	                    <?php else:?>
                            <button type="button" id="write_a_post" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');return false;">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip_remove_user_post6)">
                                        <path d="M10.7508 4.98373C10.9462 5.12053 10.9938 5.39205 10.8569 5.58722L5.27532 13.5415C5.13836 13.7366 4.84058 13.9558 4.61347 14.0285L1.98786 14.8689C1.76076 14.9416 1.56732 14.8062 1.55802 14.568L1.4498 11.8132C1.44042 11.575 1.54485 11.2204 1.68181 11.0253L7.26328 3.07093C7.40025 2.87577 7.67203 2.82799 7.86737 2.9647L10.7508 4.98373Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M12.7628 2.09698C12.9582 2.23377 13.006 2.50538 12.8693 2.70072L12.074 3.83657C11.9372 4.03191 11.6656 4.07977 11.4702 3.94306L8.58678 1.92403C8.39144 1.78723 8.34358 1.51562 8.48028 1.32029L9.27566 0.184432C9.41245 -0.0109029 9.68406 -0.0587682 9.8794 0.0779406L12.7628 2.09698Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M13.5504 14.5445C13.5504 14.783 13.3554 14.9787 13.117 14.9796L7.52776 15.0001C7.28938 15.0009 7.20639 14.8421 7.34353 14.647L8.86187 12.4864C8.99893 12.2913 9.30618 12.1307 9.54455 12.1294L13.117 12.1104C13.3554 12.1091 13.5504 12.3031 13.5504 12.5416V14.5445Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M13.5477 10.7409C13.5477 10.9793 13.3526 11.1756 13.1142 11.177L9.9926 11.1955C9.75422 11.1968 9.67123 11.0384 9.80837 10.8434L11.3267 8.68271C11.4638 8.48763 11.771 8.3257 12.0094 8.32286L13.1143 8.3096C13.3527 8.30676 13.5478 8.49943 13.5478 8.73789V10.7409H13.5477Z" fill="white" fill-opacity="0.5"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip_remove_user_post6">
                                            <rect width="15" height="15" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg><?php echo __('Write a post');?></button>
	                    <?php endif;?>
                        <?php if(is_user_logged_in()):?>
                        <div id="form" style="display: none">
                        <form id="write_a_post_form">
                            <label for="textarea">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip_remove_user_post5)">
                                        <path d="M10.7508 4.98373C10.9462 5.12053 10.9938 5.39205 10.8569 5.58722L5.27532 13.5415C5.13836 13.7366 4.84058 13.9558 4.61347 14.0285L1.98786 14.8689C1.76076 14.9416 1.56732 14.8062 1.55802 14.568L1.4498 11.8132C1.44042 11.575 1.54485 11.2204 1.68181 11.0253L7.26328 3.07093C7.40025 2.87577 7.67203 2.82799 7.86737 2.9647L10.7508 4.98373Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M12.7628 2.09698C12.9582 2.23377 13.006 2.50538 12.8693 2.70072L12.074 3.83657C11.9372 4.03191 11.6656 4.07977 11.4702 3.94306L8.58678 1.92403C8.39144 1.78723 8.34358 1.51562 8.48028 1.32029L9.27566 0.184432C9.41245 -0.0109029 9.68406 -0.0587682 9.8794 0.0779406L12.7628 2.09698Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M13.5504 14.5445C13.5504 14.783 13.3554 14.9787 13.117 14.9796L7.52776 15.0001C7.28938 15.0009 7.20639 14.8421 7.34353 14.647L8.86187 12.4864C8.99893 12.2913 9.30618 12.1307 9.54455 12.1294L13.117 12.1104C13.3554 12.1091 13.5504 12.3031 13.5504 12.5416V14.5445Z" fill="white" fill-opacity="0.5"/>
                                        <path d="M13.5477 10.7409C13.5477 10.9793 13.3526 11.1756 13.1142 11.177L9.9926 11.1955C9.75422 11.1968 9.67123 11.0384 9.80837 10.8434L11.3267 8.68271C11.4638 8.48763 11.771 8.3257 12.0094 8.32286L13.1143 8.3096C13.3527 8.30676 13.5478 8.49943 13.5478 8.73789V10.7409H13.5477Z" fill="white" fill-opacity="0.5"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip_remove_user_post5">
                                            <rect width="15" height="15" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>Write a post
                            </label>
                            <p style="margin-left:10px;display: none" id="send_after">A new post can be sent in <?=xbox_get_field_value('my-theme-options', 'user_post_interval')?> seconds</p>
                            <textarea name="text_post" id="textarea" style="resize: none;" maxlength="<?=xbox_get_field_value('my-theme-options', 'post_character')?>" placeholder="Maximum characters allowed per post is <?=xbox_get_field_value('my-theme-options', 'post_character')?>"></textarea>
                        </form>
                            <button id="to_publish">Post</button>
                            <button id="сancel">Cancel</button>
                        </div>
                        <?php endif;?>
                        <!-- FORM for write a post [end]-->
                        <?php
                        if(xbox_get_field_value('my-theme-options', 'display_recent_activity') == 'on') {
                            $post_types = ['user_post', 'post', 'photos'];
                        } else {
	                        $post_types = ['user_post'];
                        }
                        $args_query = array(
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'post_type'   => $post_types,
                            'post_status' => 'publish',
                            'suppress_filters' => true,
                            'numberposts' => -1,
                            'posts_per_page' => 20,
                            'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
                        );
                        query_posts($args_query);
                        while (have_posts() ) : the_post();?>
                            <?php if($post->post_type == 'user_post'):?>
                                <div class="feeds" data-post-id="<?=$post->ID?>">
                                    <div class="users_info" style="display:flex;">
	                                    <?php
	                                    if(get_user_meta($post->post_author, 'personal_foto', true) == false) :?>
                                            <a href="/public-profile/?xxx=<?php echo $post->post_author;?>">
                                                <img src="<?php echo get_template_directory_uri(). '/assets/img/picture.png'?>" alt=""/>
                                            </a>
	                                    <?php else:?>
                                            <a href="/public-profile/?xxx=<?php echo $post->post_author;?>">
                                                <img src="<?php echo get_user_meta($post->post_author,'personal_foto', true);?>" alt=""/>
                                            </a>
	                                    <?php endif;?>
                                        <p style="width: 100%">
                                            <a href="/public-profile/?xxx=<?=$post->post_author;?>"><?=get_userdata($post->post_author)->display_name;?></a>
                                            <span class="wrote">wrote a post</span>
                                            <span class="users_control_btns desktop" data-post-report="<?=$post->ID;?>">
                                                <?php if($post->post_author != get_current_user_id()):?>
                                                <span style="display: inline-flex;" class="report_user_post" data-post-report="<?=$post->ID;?>">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.8814 9.79415C15.6652 9.53344 15.6652 9.15571 15.8814 8.89508L18.2135 6.08426C18.3877 5.87425 18.4249 5.58243 18.3089 5.3354C18.1928 5.08838 17.9446 4.93066 17.6716 4.93066H13.6682V9.16558C13.6682 10.3197 12.7293 11.2586 11.5752 11.2586H8.30469V13.0545C8.30469 13.4433 8.61991 13.7586 9.00875 13.7586H17.6716C17.9446 13.7586 18.1928 13.6008 18.3089 13.3538C18.4249 13.1068 18.3877 12.815 18.2135 12.605L15.8814 9.79415Z" fill="white"/>
                                                    <path d="M12.2787 9.16555V1.74577C12.2787 1.35694 11.9634 1.04171 11.5746 1.04171H3.70452C3.70452 0.46641 3.23811 0 2.66281 0C2.0875 0 1.62109 0.46641 1.62109 1.04171C1.62109 1.58528 1.62109 18.6751 1.62109 18.9583C1.62109 19.5336 2.0875 20 2.66281 20C3.23811 20 3.70452 19.5336 3.70452 18.9583C3.70452 18.4761 3.70452 10.2005 3.70452 9.86961H11.5746C11.9634 9.86961 12.2787 9.55439 12.2787 9.16555Z" fill="white"/>
                                                </svg>Report
                                                </span><?php endif;?>
                                                <?php if(is_user_logged_in()):?>
		                                            <?php if(current_user_can('administrator') || $post->post_author == get_current_user_id()):?>
                                                    <span class="remove_user_post" style="margin-left: 10px;" data-post-id="<?=$post->ID?>">
                                                            <svg width="20" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip_remove_user_post4)">
                                                            <path d="M11.8295 2.19544H10.2232V2.11133C10.2232 1.22281 9.50043 0.5 8.61191 0.5H6.38168C5.49316 0.5 4.77036 1.22281 4.77036 2.11133V2.19544H3.16406C2.67872 2.19544 2.28516 2.58889 2.28516 3.07435V3.74429C2.28516 3.90611 2.41631 4.03725 2.57812 4.03725H12.4155C12.5773 4.03725 12.7084 3.90611 12.7084 3.74429V3.07435C12.7084 2.58889 12.315 2.19544 11.8295 2.19544ZM5.64926 2.11133C5.64926 1.70747 5.97782 1.37891 6.38168 1.37891H8.61191C9.01577 1.37891 9.34433 1.70747 9.34433 2.11133V2.19544H5.64926V2.11133Z" fill="white"/>
                                                            <path d="M2.66406 4.91602L3.37417 15.091C3.3903 15.3212 3.58176 15.4999 3.81259 15.4999H11.1802C11.411 15.4999 11.6025 15.3212 11.6185 15.091L12.3285 4.91602H2.66406ZM5.75717 14.0053C5.75088 14.0056 5.74447 14.0057 5.73817 14.0057C5.50414 14.0057 5.30948 13.821 5.29952 13.5849L5.00655 6.70015C4.99614 6.45765 5.18439 6.25269 5.4269 6.24239C5.66951 6.23243 5.87436 6.42034 5.88466 6.66284L6.17763 13.5476C6.18793 13.7901 5.99967 13.995 5.75717 14.0053ZM7.93578 13.5663C7.93578 13.809 7.73906 14.0057 7.49633 14.0057C7.2536 14.0057 7.05688 13.809 7.05688 13.5663V6.68149C7.05688 6.43877 7.2536 6.24204 7.49633 6.24204C7.73906 6.24204 7.93578 6.43877 7.93578 6.68149V13.5663ZM9.69325 13.5849C9.68318 13.8211 9.48852 14.0057 9.25449 14.0057C9.24819 14.0057 9.24178 14.0056 9.23549 14.0054C8.99299 13.9951 8.80473 13.7901 8.81503 13.5476L9.108 6.66284C9.11842 6.42034 9.32361 6.2322 9.56577 6.2425C9.80827 6.2528 9.99652 6.45765 9.98622 6.70015L9.69325 13.5849Z" fill="white"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath id="clip_remove_user_post4">
                                                            <rect width="15" height="15" fill="white" transform="translate(0 0.5)"/>
                                                            </clipPath>
                                                            </defs>
                                                            </svg>
                                                        </span><?php endif;?><?php endif;?>
                                            </span>
                                            <br>
                                            <span><?php printf(
							                        __( '%1$s at %2$s' ),
							                        get_the_date(),
							                        get_the_time()
						                        );?></span>
                                        </p>
                                    </div>
                                    <p class="users_post">
				                        <?=$post->post_content;?>
                                    </p>
                                    <p id="mobile_report_delete" style="display: none;margin:0; padding:0;">
                                    <span class="users_control_btns mobile"  data-post-report="<?=$post->ID;?>">
                                                <?php if($post->post_author != get_current_user_id()):?>
                                                <span style="display: inline-flex;" class="report_user_post" data-post-report="<?=$post->ID;?>">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.8814 9.79415C15.6652 9.53344 15.6652 9.15571 15.8814 8.89508L18.2135 6.08426C18.3877 5.87425 18.4249 5.58243 18.3089 5.3354C18.1928 5.08838 17.9446 4.93066 17.6716 4.93066H13.6682V9.16558C13.6682 10.3197 12.7293 11.2586 11.5752 11.2586H8.30469V13.0545C8.30469 13.4433 8.61991 13.7586 9.00875 13.7586H17.6716C17.9446 13.7586 18.1928 13.6008 18.3089 13.3538C18.4249 13.1068 18.3877 12.815 18.2135 12.605L15.8814 9.79415Z" fill="white"/>
                                                    <path d="M12.2787 9.16555V1.74577C12.2787 1.35694 11.9634 1.04171 11.5746 1.04171H3.70452C3.70452 0.46641 3.23811 0 2.66281 0C2.0875 0 1.62109 0.46641 1.62109 1.04171C1.62109 1.58528 1.62109 18.6751 1.62109 18.9583C1.62109 19.5336 2.0875 20 2.66281 20C3.23811 20 3.70452 19.5336 3.70452 18.9583C3.70452 18.4761 3.70452 10.2005 3.70452 9.86961H11.5746C11.9634 9.86961 12.2787 9.55439 12.2787 9.16555Z" fill="white"/>
                                                </svg>Report
                                                    </span><?php endif;?>
		                                <?php if(is_user_logged_in()):?>
			                                <?php if(current_user_can('administrator') || $post->post_author == get_current_user_id()):?>
                                            <span class="remove_user_post" style="margin-left: 10px;" data-post-id="<?=$post->ID?>">
                                                    <svg width="20" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip_remove_user_post3)">
                                                            <path d="M11.8295 2.19544H10.2232V2.11133C10.2232 1.22281 9.50043 0.5 8.61191 0.5H6.38168C5.49316 0.5 4.77036 1.22281 4.77036 2.11133V2.19544H3.16406C2.67872 2.19544 2.28516 2.58889 2.28516 3.07435V3.74429C2.28516 3.90611 2.41631 4.03725 2.57812 4.03725H12.4155C12.5773 4.03725 12.7084 3.90611 12.7084 3.74429V3.07435C12.7084 2.58889 12.315 2.19544 11.8295 2.19544ZM5.64926 2.11133C5.64926 1.70747 5.97782 1.37891 6.38168 1.37891H8.61191C9.01577 1.37891 9.34433 1.70747 9.34433 2.11133V2.19544H5.64926V2.11133Z" fill="white"/>
                                                            <path d="M2.66406 4.91602L3.37417 15.091C3.3903 15.3212 3.58176 15.4999 3.81259 15.4999H11.1802C11.411 15.4999 11.6025 15.3212 11.6185 15.091L12.3285 4.91602H2.66406ZM5.75717 14.0053C5.75088 14.0056 5.74447 14.0057 5.73817 14.0057C5.50414 14.0057 5.30948 13.821 5.29952 13.5849L5.00655 6.70015C4.99614 6.45765 5.18439 6.25269 5.4269 6.24239C5.66951 6.23243 5.87436 6.42034 5.88466 6.66284L6.17763 13.5476C6.18793 13.7901 5.99967 13.995 5.75717 14.0053ZM7.93578 13.5663C7.93578 13.809 7.73906 14.0057 7.49633 14.0057C7.2536 14.0057 7.05688 13.809 7.05688 13.5663V6.68149C7.05688 6.43877 7.2536 6.24204 7.49633 6.24204C7.73906 6.24204 7.93578 6.43877 7.93578 6.68149V13.5663ZM9.69325 13.5849C9.68318 13.8211 9.48852 14.0057 9.25449 14.0057C9.24819 14.0057 9.24178 14.0056 9.23549 14.0054C8.99299 13.9951 8.80473 13.7901 8.81503 13.5476L9.108 6.66284C9.11842 6.42034 9.32361 6.2322 9.56577 6.2425C9.80827 6.2528 9.99652 6.45765 9.98622 6.70015L9.69325 13.5849Z" fill="white"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath id="clip_remove_user_post3">
                                                            <rect width="15" height="15" fill="white" transform="translate(0 0.5)"/>
                                                            </clipPath>
                                                            </defs>
                                                            </svg>
                                                </span><?php endif;?><?php endif;?>
                                            </span>
                                    </p>
                                </div>
                            <?php elseif($post->post_type == 'post'):?>
                                <div class="feeds">
                                    <div class="users_info" style="display:flex;">
	                                    <?php
	                                    if(get_user_meta($post->post_author, 'personal_foto', true) == false) :?>
                                            <a href="/public-profile/?xxx=<?php echo $post->post_author;?>">
                                                <img src="<?php echo get_template_directory_uri(). '/assets/img/picture.png'?>" alt=""/>
                                            </a>
	                                    <?php else:?>
                                            <a href="/public-profile/?xxx=<?php echo $post->post_author;?>">
                                                <img src="<?php echo get_user_meta($post->post_author,'personal_foto', true);?>" alt=""/>
                                            </a>
	                                    <?php endif;?>
                                        <p style="width: 100%">
                                            <a href="/public-profile/?xxx=<?=$post->post_author;?>"><?=get_userdata($post->post_author)->display_name;?></a>
                                            <span class="wrote">uploaded a video</span>
	                                        <?php if($post->post_author != get_current_user_id()):?>
                                            <span class="users_control_btns desktop" data-post-report="<?=$post->ID;?>">
                                                <span style="display: inline-flex;" class="report_user_post" data-post-report="<?=$post->ID;?>">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.8814 9.79415C15.6652 9.53344 15.6652 9.15571 15.8814 8.89508L18.2135 6.08426C18.3877 5.87425 18.4249 5.58243 18.3089 5.3354C18.1928 5.08838 17.9446 4.93066 17.6716 4.93066H13.6682V9.16558C13.6682 10.3197 12.7293 11.2586 11.5752 11.2586H8.30469V13.0545C8.30469 13.4433 8.61991 13.7586 9.00875 13.7586H17.6716C17.9446 13.7586 18.1928 13.6008 18.3089 13.3538C18.4249 13.1068 18.3877 12.815 18.2135 12.605L15.8814 9.79415Z" fill="white"/>
                            <path d="M12.2787 9.16555V1.74577C12.2787 1.35694 11.9634 1.04171 11.5746 1.04171H3.70452C3.70452 0.46641 3.23811 0 2.66281 0C2.0875 0 1.62109 0.46641 1.62109 1.04171C1.62109 1.58528 1.62109 18.6751 1.62109 18.9583C1.62109 19.5336 2.0875 20 2.66281 20C3.23811 20 3.70452 19.5336 3.70452 18.9583C3.70452 18.4761 3.70452 10.2005 3.70452 9.86961H11.5746C11.9634 9.86961 12.2787 9.55439 12.2787 9.16555Z" fill="white"/>
                                                </svg>Report</span></span><?php endif;?>
                                            <br>
                                            <span><?php printf(
							                        __( '%1$s at %2$s' ),
							                        get_the_date(),
							                        get_the_time()
						                        );?></span>
                                        </p>
                                    </div>
                                    <div class="user_post_activity_video">
                                        <div class="videos-list">
	                                        <?php
	                                        get_template_part( 'template-parts/loop', 'video-post');
	                                        ?>
                                        </div>
                                    </div>
                                    <p id="mobile_report_delete" style="display: none;margin:0; padding:0;">
                                    <span class="users_control_btns mobile"  data-post-report="<?=$post->ID;?>">
                                                <?php if($post->post_author != get_current_user_id()):?>
                                                <span style="display: inline-flex;" class="report_user_post" data-post-report="<?=$post->ID;?>">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.8814 9.79415C15.6652 9.53344 15.6652 9.15571 15.8814 8.89508L18.2135 6.08426C18.3877 5.87425 18.4249 5.58243 18.3089 5.3354C18.1928 5.08838 17.9446 4.93066 17.6716 4.93066H13.6682V9.16558C13.6682 10.3197 12.7293 11.2586 11.5752 11.2586H8.30469V13.0545C8.30469 13.4433 8.61991 13.7586 9.00875 13.7586H17.6716C17.9446 13.7586 18.1928 13.6008 18.3089 13.3538C18.4249 13.1068 18.3877 12.815 18.2135 12.605L15.8814 9.79415Z" fill="white"/>
                                                    <path d="M12.2787 9.16555V1.74577C12.2787 1.35694 11.9634 1.04171 11.5746 1.04171H3.70452C3.70452 0.46641 3.23811 0 2.66281 0C2.0875 0 1.62109 0.46641 1.62109 1.04171C1.62109 1.58528 1.62109 18.6751 1.62109 18.9583C1.62109 19.5336 2.0875 20 2.66281 20C3.23811 20 3.70452 19.5336 3.70452 18.9583C3.70452 18.4761 3.70452 10.2005 3.70452 9.86961H11.5746C11.9634 9.86961 12.2787 9.55439 12.2787 9.16555Z" fill="white"/>
                                                </svg>Report
                                                    </span><?php endif;?>
	                                    <?php if(is_user_logged_in()):?>
		                                    <?php if(current_user_can('administrator') || $post->post_author == get_current_user_id()):?>
                                            <span class="remove_user_post" style="margin-left: 10px;" data-post-id="<?=$post->ID?>">
                                                    <svg width="20" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip_remove_user_post2)">
                                                            <path d="M11.8295 2.19544H10.2232V2.11133C10.2232 1.22281 9.50043 0.5 8.61191 0.5H6.38168C5.49316 0.5 4.77036 1.22281 4.77036 2.11133V2.19544H3.16406C2.67872 2.19544 2.28516 2.58889 2.28516 3.07435V3.74429C2.28516 3.90611 2.41631 4.03725 2.57812 4.03725H12.4155C12.5773 4.03725 12.7084 3.90611 12.7084 3.74429V3.07435C12.7084 2.58889 12.315 2.19544 11.8295 2.19544ZM5.64926 2.11133C5.64926 1.70747 5.97782 1.37891 6.38168 1.37891H8.61191C9.01577 1.37891 9.34433 1.70747 9.34433 2.11133V2.19544H5.64926V2.11133Z" fill="white"/>
                                                            <path d="M2.66406 4.91602L3.37417 15.091C3.3903 15.3212 3.58176 15.4999 3.81259 15.4999H11.1802C11.411 15.4999 11.6025 15.3212 11.6185 15.091L12.3285 4.91602H2.66406ZM5.75717 14.0053C5.75088 14.0056 5.74447 14.0057 5.73817 14.0057C5.50414 14.0057 5.30948 13.821 5.29952 13.5849L5.00655 6.70015C4.99614 6.45765 5.18439 6.25269 5.4269 6.24239C5.66951 6.23243 5.87436 6.42034 5.88466 6.66284L6.17763 13.5476C6.18793 13.7901 5.99967 13.995 5.75717 14.0053ZM7.93578 13.5663C7.93578 13.809 7.73906 14.0057 7.49633 14.0057C7.2536 14.0057 7.05688 13.809 7.05688 13.5663V6.68149C7.05688 6.43877 7.2536 6.24204 7.49633 6.24204C7.73906 6.24204 7.93578 6.43877 7.93578 6.68149V13.5663ZM9.69325 13.5849C9.68318 13.8211 9.48852 14.0057 9.25449 14.0057C9.24819 14.0057 9.24178 14.0056 9.23549 14.0054C8.99299 13.9951 8.80473 13.7901 8.81503 13.5476L9.108 6.66284C9.11842 6.42034 9.32361 6.2322 9.56577 6.2425C9.80827 6.2528 9.99652 6.45765 9.98622 6.70015L9.69325 13.5849Z" fill="white"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath id="clip_remove_user_post2">
                                                            <rect width="15" height="15" fill="white" transform="translate(0 0.5)"/>
                                                            </clipPath>
                                                            </defs>
                                                            </svg>
                                                </span><?php endif;?><?php endif;?>
                                            </span>
                                    </p>
                                </div>
                            <?php elseif($post->post_type == 'photos'):?>
                                <div class="feeds">
                                    <div class="users_info" style="display:flex;">
	                                    <?php
	                                    if(get_user_meta($post->post_author, 'personal_foto', true) == false) :?>
                                            <a href="/public-profile/?xxx=<?php echo $post->post_author;?>">
                                                <svg width="40" height="40" viewBox="0 0 212 212" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="212" height="212" rx="4" fill="#200437"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M81.0001 0H8L69.5808 106.661L8.76343 212H81.7635L106.081 169.881L130.398 212H203.398L142.581 106.661L204.162 0H131.162L106.081 43.4412L81.0001 0Z" fill="#C32CE2" fill-opacity="0.1"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2" fill-opacity="0.5"/>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="url(#paint_linear_d)"/>
                                                    <defs>
                                                        <linearGradient id="paint_linear_d" x1="79.4282" y1="68.8369" x2="159.667" y2="207.876" gradientUnits="userSpaceOnUse">
                                                            <stop offset="0.1" stop-color="#BA25D6"/>
                                                            <stop offset="1" stop-color="#200437"/>
                                                        </linearGradient>
                                                    </defs>
                                                </svg>
                                            </a>
	                                    <?php else:?>
                                            <a href="/public-profile/?xxx=<?php echo $post->post_author;?>">
                                                <img src="<?php echo get_user_meta($post->post_author,'personal_foto', true);?>" alt=""/>
                                            </a>
	                                    <?php endif;?>
                                        <p style="width: 100%">
                                            <?php
                                            $get_ids_images = parse_blocks($post->post_content);
                                            $text_how_much_download = "<span class='wrote'>uploaded " .sizeof($get_ids_images[0]['attrs']['ids']). " images</span>";
                                            if (sizeof($get_ids_images[0]['attrs']['ids']) <= 1)
	                                            $text_how_much_download = "<span class='wrote'>uploaded " . sizeof($get_ids_images[0]['attrs']['ids']) . " image</span>";
                                            $how_much_time_ago = time_ago($post->post_date);
                                            ?>
                                            <a href="/public-profile/?xxx=<?=$post->post_author;?>"><?=get_userdata($post->post_author)->display_name;?></a>
                                            <?=$text_how_much_download?>
	                                        <?php if($post->post_author != get_current_user_id()):?>
                                            <span class="users_control_btns desktop" data-post-report="<?=$post->ID;?>">
                                                <span style="display: inline-flex;" class="report_user_post" data-post-report="<?=$post->ID;?>">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.8814 9.79415C15.6652 9.53344 15.6652 9.15571 15.8814 8.89508L18.2135 6.08426C18.3877 5.87425 18.4249 5.58243 18.3089 5.3354C18.1928 5.08838 17.9446 4.93066 17.6716 4.93066H13.6682V9.16558C13.6682 10.3197 12.7293 11.2586 11.5752 11.2586H8.30469V13.0545C8.30469 13.4433 8.61991 13.7586 9.00875 13.7586H17.6716C17.9446 13.7586 18.1928 13.6008 18.3089 13.3538C18.4249 13.1068 18.3877 12.815 18.2135 12.605L15.8814 9.79415Z" fill="white"/>
                            <path d="M12.2787 9.16555V1.74577C12.2787 1.35694 11.9634 1.04171 11.5746 1.04171H3.70452C3.70452 0.46641 3.23811 0 2.66281 0C2.0875 0 1.62109 0.46641 1.62109 1.04171C1.62109 1.58528 1.62109 18.6751 1.62109 18.9583C1.62109 19.5336 2.0875 20 2.66281 20C3.23811 20 3.70452 19.5336 3.70452 18.9583C3.70452 18.4761 3.70452 10.2005 3.70452 9.86961H11.5746C11.9634 9.86961 12.2787 9.55439 12.2787 9.16555Z" fill="white"/>
                                                </svg>Report</span></span><?php endif;?>
                                            <br>
                                            <span><?php printf(
							                        __( '%1$s at %2$s' ),
							                        get_the_date(),
							                        get_the_time()
						                        );?></span>
                                        </p>
                                    </div>
                                    <div class="users_post" style="display: flex;flex-wrap: wrap;">
                                        <div class="user_post_activity_image">
                                            <?php foreach($get_ids_images[0]['attrs']['ids'] as $k => $photo_id):?>
                                                <?php if ($k > 2) break;?>
                                                <a style="height: 200px;
                                                        width: 200px;
                                                        background: url(<?php echo get_post($photo_id, ARRAY_A)['guid']; ?>);
                                                        background-position: center;
                                                        background-repeat: no-repeat;
                                                        background-size: cover;
                                                        border-radius: 4px;"
                                                        href="<?php echo $post->guid;?>"></a>
                                            <?php endforeach;?>
                                        </div>
                                        <div class="image_in_feed">
                                            <p style="text-align: center;margin-top: 15px;"><?php echo $post->post_title;?><br>
                                                <span>
                                                        <?php if (sizeof($get_ids_images[0]['attrs']['ids']) >= (int)xbox_get_field_value('my-theme-options', 'uploaded_images_shown')): ?>
                                                            <a class="see_more_in_feed" href="<?php echo $post->guid;?>" target="_blank">
                                                            See more
                                                        </a>
                                                        <?php else:?>
                                                            <a class="see_more_in_feed" href="<?php echo $post->guid;?>" target="_blank">
                                                            See more
                                                        </a>
                                                        <?php endif;?>
                                                    </span>
                                            </p>
                                        </div>
                                    </div>
                                    <p id="mobile_report_delete" style="display: none;margin:0; padding:0;">
                                    <span class="users_control_btns mobile"  data-post-report="<?=$post->ID;?>">
                                                <?php if($post->post_author != get_current_user_id()):?>
                                                <span style="display: inline-flex;" class="report_user_post" data-post-report="<?=$post->ID;?>">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.8814 9.79415C15.6652 9.53344 15.6652 9.15571 15.8814 8.89508L18.2135 6.08426C18.3877 5.87425 18.4249 5.58243 18.3089 5.3354C18.1928 5.08838 17.9446 4.93066 17.6716 4.93066H13.6682V9.16558C13.6682 10.3197 12.7293 11.2586 11.5752 11.2586H8.30469V13.0545C8.30469 13.4433 8.61991 13.7586 9.00875 13.7586H17.6716C17.9446 13.7586 18.1928 13.6008 18.3089 13.3538C18.4249 13.1068 18.3877 12.815 18.2135 12.605L15.8814 9.79415Z" fill="white"/>
                                                    <path d="M12.2787 9.16555V1.74577C12.2787 1.35694 11.9634 1.04171 11.5746 1.04171H3.70452C3.70452 0.46641 3.23811 0 2.66281 0C2.0875 0 1.62109 0.46641 1.62109 1.04171C1.62109 1.58528 1.62109 18.6751 1.62109 18.9583C1.62109 19.5336 2.0875 20 2.66281 20C3.23811 20 3.70452 19.5336 3.70452 18.9583C3.70452 18.4761 3.70452 10.2005 3.70452 9.86961H11.5746C11.9634 9.86961 12.2787 9.55439 12.2787 9.16555Z" fill="white"/>
                                                </svg>Report
                                                    </span><?php endif;?>
	                                    <?php if(is_user_logged_in()):?>
		                                    <?php if(current_user_can('administrator') || $post->post_author == get_current_user_id()):?>
                                            <span class="remove_user_post" style="margin-left: 10px;" data-post-id="<?=$post->ID?>">
                                                    <svg width="20" height="20" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip_remove_user_post)">
                                                            <path d="M11.8295 2.19544H10.2232V2.11133C10.2232 1.22281 9.50043 0.5 8.61191 0.5H6.38168C5.49316 0.5 4.77036 1.22281 4.77036 2.11133V2.19544H3.16406C2.67872 2.19544 2.28516 2.58889 2.28516 3.07435V3.74429C2.28516 3.90611 2.41631 4.03725 2.57812 4.03725H12.4155C12.5773 4.03725 12.7084 3.90611 12.7084 3.74429V3.07435C12.7084 2.58889 12.315 2.19544 11.8295 2.19544ZM5.64926 2.11133C5.64926 1.70747 5.97782 1.37891 6.38168 1.37891H8.61191C9.01577 1.37891 9.34433 1.70747 9.34433 2.11133V2.19544H5.64926V2.11133Z" fill="white"/>
                                                            <path d="M2.66406 4.91602L3.37417 15.091C3.3903 15.3212 3.58176 15.4999 3.81259 15.4999H11.1802C11.411 15.4999 11.6025 15.3212 11.6185 15.091L12.3285 4.91602H2.66406ZM5.75717 14.0053C5.75088 14.0056 5.74447 14.0057 5.73817 14.0057C5.50414 14.0057 5.30948 13.821 5.29952 13.5849L5.00655 6.70015C4.99614 6.45765 5.18439 6.25269 5.4269 6.24239C5.66951 6.23243 5.87436 6.42034 5.88466 6.66284L6.17763 13.5476C6.18793 13.7901 5.99967 13.995 5.75717 14.0053ZM7.93578 13.5663C7.93578 13.809 7.73906 14.0057 7.49633 14.0057C7.2536 14.0057 7.05688 13.809 7.05688 13.5663V6.68149C7.05688 6.43877 7.2536 6.24204 7.49633 6.24204C7.73906 6.24204 7.93578 6.43877 7.93578 6.68149V13.5663ZM9.69325 13.5849C9.68318 13.8211 9.48852 14.0057 9.25449 14.0057C9.24819 14.0057 9.24178 14.0056 9.23549 14.0054C8.99299 13.9951 8.80473 13.7901 8.81503 13.5476L9.108 6.66284C9.11842 6.42034 9.32361 6.2322 9.56577 6.2425C9.80827 6.2528 9.99652 6.45765 9.98622 6.70015L9.69325 13.5849Z" fill="white"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath id="clip_remove_user_post">
                                                            <rect width="15" height="15" fill="white" transform="translate(0 0.5)"/>
                                                            </clipPath>
                                                            </defs>
                                                            </svg>
                                                </span><?php endif;?><?php endif;?>
                                            </span>
                                    </p>
                                </div>
                            <?php endif;?>
                        <?php endwhile;
                        main_arc_page_navi();
                        ?>
                    </div>

                    <div id="users_activity" style="width: 27.8%;<?=$activity?>">
                        <div id="activity_list">
                            <h2 class="widget-title recent_activity"><?php echo __('Recent activity', 'arc');?></h2>
                            <div id="activity_container">
	                            <?php if (current_user_can('administrator')){
                                    $padding = 'style="padding-top:0px;"';
	                            } else {
		                            $padding = 'style="padding-top:15px;"';
	                            }?>
                                <?php
                                global $wpdb;
                                $id_list_final = [];
                                $count = 150;
                                $offset = 0;
                                do {
                                    $query = "SELECT `ID` FROM `wp_posts` WHERE NOT `post_status` = 'auto-draft' AND NOT `post_status` = 'pending' AND NOT `post_status` = 'draft' AND (`post_type` = 'post' OR `post_type` = 'photos' AND `post_status` = 'publish') ORDER BY `post_date` DESC LIMIT " . $count . " OFFSET " . $offset;
                                    $id_list = $wpdb->get_results( $query );

                                    foreach ($id_list as $id){
                                        if (get_post_meta( $id->ID, 'recent_activity', true ) === 'invisible')
                                            continue;
                                        $id_list_final[] = $id;
                                        if (count($id_list_final) >= (int)xbox_get_field_value('my-theme-options', 'number_of_recent_uploads'))
                                            break;
                                    }
                                    $offset += $count;
                                } while (count($id_list) > 0 && count($id_list_final) < (int)xbox_get_field_value('my-theme-options', 'number_of_recent_uploads'));

                                ?>

                                <?php foreach ($id_list_final as $id) :?>
                                <?php if (get_post_meta( $id->ID, 'recent_activity', true ) !== 'invisible') : ?>
                                    <?php if (get_post($id->ID, ARRAY_A)['post_type'] === 'photos'):?>
                                    <?php
                                        $get_ids_images = parse_blocks(get_post($id->ID, ARRAY_A)['post_content']);
                                        $text_how_much_download = "Uploaded " .sizeof($get_ids_images[0]['attrs']['ids']). " images";
                                        if (sizeof($get_ids_images[0]['attrs']['ids']) <= 1)
                                            $text_how_much_download = "Uploaded " . sizeof($get_ids_images[0]['attrs']['ids']) . " image";
                                        $how_much_time_ago = time_ago(get_post($id->ID, ARRAY_A)['post_date']);
                                    ?>
                                        <div class="activity_block" data-id-for-hidden="<?=$id->ID;?>">
                                            <p class="recent_user_info">
                                                <span>
                                                    <a href="/public-profile/?xxx=<?php echo get_post($id->ID, ARRAY_A)['post_author']; ?>">
                                                        <?php echo get_userdata(get_post($id->ID, ARRAY_A)['post_author'])->display_name;?></a><br>
                                                    <?=$text_how_much_download;?>
                                                </span>

                                                <span class="recent_time_ago" <?=$padding?>>
                                                    <?php if (current_user_can('administrator')) :?>
                                                        <a href="#" class="de-listing" data-id-for-remove="<?php echo $id->ID;?>">Remove update</a><br>
                                                    <?php endif;?>
                                                    <?php echo $how_much_time_ago;?>
                                                </span>

                                            </p>
                                            <div class="activity_content image">
                                                <div>
                                                    <?php foreach($get_ids_images[0]['attrs']['ids'] as $k => $photo_id):?>
                                                    <?php if ($k > ((int)xbox_get_field_value('my-theme-options', 'uploaded_images_shown') - 1)) break;?>
                                                        <a style="height: 60px;
                                                                width: 60px;
                                                                background: url(<?php echo get_post($photo_id, ARRAY_A)['guid']; ?>);
                                                                background-position: center;
                                                                background-repeat: no-repeat;
                                                                background-size: cover;"
                                                           href="<?php echo get_post($id->ID, ARRAY_A)['guid'];?>"></a>
                                                    <?php endforeach;?>
                                                    <p class="post_title"><?php echo get_post($id->ID, ARRAY_A)['post_title'];?></p>
                                                </div>
                                                <div>
                                                    <p>
                                                        <span>
                                                        <?php if (sizeof($get_ids_images[0]['attrs']['ids']) >= (int)xbox_get_field_value('my-theme-options', 'uploaded_images_shown')): ?>
                                                        <a style="font-size: 16px;" href="<?php echo get_post($id->ID, ARRAY_A)['guid'];?>" target="_blank">
                                                            See more
                                                        </a>
                                                        <?php else:?>
                                                            <a style="font-size: 16px;" href="<?php echo get_post($id->ID, ARRAY_A)['guid'];?>" target="_blank">
                                                            See more
                                                        </a>
                                                        <?php endif;?>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                    <?php $how_much_time_ago = time_ago(get_post($id->ID, ARRAY_A)['post_date']);?>
                                        <div class="activity_block" data-id-for-hidden="<?=$id->ID;?>">
                                            <p class="recent_user_info">
                                                <span>
                                                    <a href="/public-profile/?xxx=<?php echo get_post($id->ID, ARRAY_A)['post_author']; ?>">
                                                        <?=get_userdata(get_post($id->ID, ARRAY_A)['post_author'])->display_name;?></a><br>
                                                    Uploaded a video
                                                </span>
                                                <span class="recent_time_ago" <?=$padding?>>
                                                    <?php if (current_user_can('administrator')) :?>
                                                        <a href="#" class="de-listing" data-id-for-remove="<?php echo $id->ID;?>">Remove update</a><br>
                                                    <?php endif;?>
                                                    <?php echo $how_much_time_ago;?>
                                                </span>
                                            </p>
                                            <div class="activity_content video">
                                                <div>
                                                    <div>
                                                        <a href="<?php echo get_post($id->ID, ARRAY_A)['guid']; ?>">
                                                            <img class="video" src="<?php echo (get_post_meta($id->ID, 'thumb', true) != false) ? get_post_meta($id->ID, 'thumb', true) : get_template_directory_uri() . '/assets/img/no-image.png';?>"/>
                                                        </a>
                                                    </div>
                                                    <div class="recent_video_watchlater">
                                                        <p class="post_title"><?php echo get_post($id->ID, ARRAY_A)['post_title'];?></p>
                                                        <p class="post_watchlater"><?php if(!is_user_logged_in()):?><span style="cursor:pointer"><i class="fa fa-plus" onclick="jQuery('#auth_modal').show().css('z-index', '9999999');"></i> </span><?php else:?>
		                                                        <?php if(has_term('watchlater'.get_current_user_id(), 'playlists', $id->ID)):?>
                                                                    <span style="cursor:pointer" data-add="add" data-user="<?=get_current_user_id()?>" data-post="<?=$id->ID?>" class="watchLaterCommunity"><i class="fa fa-check"></i> </span>
		                                                        <?php else: ?>
                                                                    <span style="cursor:pointer" data-add data-user="<?=get_current_user_id()?>" data-post="<?=$id->ID?>" class="watchLaterCommunity"><i class="fa fa-plus"></i> </span>
		                                                        <?php endif;?>
	                                                        <?php endif;?></p>
                                                    </div>
                                                </div>
                                                <div class="recent_video_info">
                                                    <p>
                                                        <span><?php echo get_post_meta($id->ID, 'post_views_count', true);?>
                                                            <span>views</span>
                                                        </span>
                                                        <span><?php echo arc_getPostLikeRate($id->ID) === false ? '0%' : arc_getPostLikeRate($id->ID)?></span>
                                                    </p>
                                                    <p><a href="<?php echo get_post($id->ID, ARRAY_A)['guid']; ?>">watch</a></p>
                                                </div>
                                            </div>

                                        </div>
                                    <?php endif;?>
                                <?php endif;?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php if(is_user_logged_in()):?>
                        <!---modal for delete btn---->
                        <style>
                            .modalDelMsg3 {
                                position: fixed;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                max-width: 600px;
                                width: 100%;
                                z-index: 999999;
                                display: none;
                            }
                            .modalDelMsg3.closed {
                                display: none;
                            }
                            .modal-guts-del3 {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                padding: 20px 50px 20px 20px;
                                display: contents;
                            }
                            .modal-overlay-del3 {
                                z-index: -1000;
                                position: fixed;
                                top:0;
                                left:0;
                                width: 100%;
                                height: 100%;
                                /*background: rgba(15, 23, 37, 0.9);*/
                                backdrop-filter: blur(5px);
                            }
                            #close-button-del3 {
                                position: absolute;
                                right: 0;
                                top: 0;
                                border-color: transparent !important;
                                background-color: transparent !important;
                                z-index: 999999;
                            }

                            #modalDelMsg3{
                                background: <?=get_theme_mod('secondary_color_setting')?>;
                                box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.25);
                                border-radius: 10px;
                                padding: 40px 85px;
                                border: none !important;
                            }
                            #modalDelMsg3 div.modal-guts-del3 div {
                                font-family: 'Roboto',sans-serif;
                                font-style: normal;
                                font-weight: normal;
                                text-align: center;
                            }
                            #modalDelMsg3 div.modal-guts-del3 div h2{
                                font-family: 'Roboto',sans-serif;
                                font-style: normal;
                                font-weight: normal;
                                font-size: 36px;
                                line-height: 42px;
                                text-align: center;
                                color: <?=get_theme_mod('text_site_color')?>;
                                margin-top: 15px;
                            }
                            #modalDelMsg3 div.modal-guts-del3 div span.confirm3{
                                font-family: 'Roboto',sans-serif;
                                font-style: normal;
                                font-weight: normal;
                                font-size: 18px;
                                line-height: 21px;
                                text-align: center;
                                color: <?=get_theme_mod('text_site_color')?>;
                                margin: 0 auto;
                            }
                            #modalDelMsg3 #close-button-del3 svg{
                                position: absolute;
                                margin-top: -30px;
                                margin-left: 20px;
                            }
                            #close-button-del3 {
                                border: none !important;
                                background: transparent !important;
                                box-shadow: none !important;
                            }

                        </style>
                        <div class="modalDelMsg3 alert alert-success" id="modalDelMsg3">
                            <button class="class-button" id="close-button-del3" onclick="jQuery(document).ready(($)=>{$('#modalDelMsg3').hide();$('.modal-overlay-del3').css('z-index', -1000);})">
                                <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                                    <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                                </svg>
                            </button>
                            <div class="modal-guts-del3">
                                <div>
                                    <h2>Submitted successfully!</h2>
                                    <span class="confirm3">Your post is being moderated.</span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-overlay-del3" id="modal-overlay-del3"></div>
                        <?php endif;?>

                    <script>
                        jQuery(document).ready(function($) {
                            $('#report_user_post button.close').on('click', function (){
                                $('#report_user_post').hide();
                                $('body').css('overflow', 'auto');
                            });
                        });
                    </script>
                    <div class="modal" style="/*margin-top: 30px;*/display: none;z-index: 99999;" id="report_user_post" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="padding-top: 30px;">
                            <div class="modal-content">
                                <div class="modal-footer">
                                    <h2 style="padding-left:20px;padding-top:20px" class="modal-title" id="header">Report<span></span></h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: absolute;
                                    top:-25px;
                                    right:-27px;
                                    border-color: transparent !important;
                                    background-color: transparent !important;box-shadow: none !important;">
                                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <line x1="1.35355" y1="0.646447" x2="21.3535" y2="20.6464" stroke="#8E939C"/>
                                            <line y1="-0.5" x2="28.2842" y2="-0.5" transform="matrix(-0.707107 0.707107 0.707107 0.707107 21 1)" stroke="#8E939C"/>
                                        </svg>
                                    </button>
                                    <div id="user-post-report">
                                        <table style="width: 100%">
                                            <tbody>
                                            <tr>
                                                <td style="text-align: left">
                                                    <!--<label style="margin-left: 20px;" for="user_post_report_type" id="report_reason">Report reason</label><br>-->
                                                    <select name="user_post_report" id="user_post_report_type">
                                                        <option value="wrong"><?php echo __('Hate speech','arc');?></option>
                                                        <option value="spam"><?php echo __('Spam','arc');?></option>
                                                        <option value="otherPost"><?php echo __('Other','arc');?></option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <br>
                                                    <textarea id="userPostReportMsg" style="min-height: 120px;" rows="1" cols="10" placeholder="Describe the problem"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td><button class="btn btn-info" id="sendPostReport" style="margin: 0 auto;"><?php echo __('Report', 'arc')?></button>
                                                    <p id="userPostReportSendMsg" style="display: none"><?php echo __('Thanks! We got your report.');?></p></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--feed tab [end]--->
                <script>
                    jQuery(document).ready(function ($){
                       $(document).on('click', 'button.members', function() {
                          var active = $(this);
                          if(active.hasClass('active')) {
                              $('div#members').css('display', 'flex');
                          } else {
                              $('div#members').css('display', 'none');
                          }
                       });
                       $('div#members').css('display', 'none');

                        $(document).on('click', 'button.feed', function() {
                            var active = $(this);
                            if(active.hasClass('active')) {
                                $('div#feed').css('display', 'flex');
                            } else {
                                $('div#feed').css('display', 'none');
                            }
                        });
                    });
                </script>
                <!--members tab-->
                <div class="community-list" id="members">
                    <div id="members_list" style="width: 76%">
	                    <?php
		                    $args = [ 'fields' => ['ID', 'user_login', 'display_name']];
		                    $users = get_users($args);?>
                            <article>
                                <div class="users_list" style="text-align: center;">
				                    <?php foreach($users as $user){ ?>
                                        <div class="item_user">
                                            <div style="display: inline-flex;align-items: center;">
                                                <p class="user_pic" style="margin-bottom: 0">
		                                            <?php
		                                            if(get_user_meta($user->ID, 'personal_foto', true) == false) :?>
                                                        <a href="/public-profile/?xxx=<?php echo $user->ID;?>">
                                                            <svg width="40" height="40" viewBox="0 0 212 212" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="212" height="212" rx="4" fill="#200437"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M81.0001 0H8L69.5808 106.661L8.76343 212H81.7635L106.081 169.881L130.398 212H203.398L142.581 106.661L204.162 0H131.162L106.081 43.4412L81.0001 0Z" fill="#C32CE2" fill-opacity="0.1"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2" fill-opacity="0.5"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="url(#paint_linear_a)"/>
                                                                <defs>
                                                                    <linearGradient id="paint_linear_a" x1="79.4282" y1="68.8369" x2="159.667" y2="207.876" gradientUnits="userSpaceOnUse">
                                                                        <stop offset="0.1" stop-color="#BA25D6"/>
                                                                        <stop offset="1" stop-color="#200437"/>
                                                                    </linearGradient>
                                                                </defs>
                                                            </svg>
                                                        </a>
		                                            <?php else:?>
                                                        <a href="/public-profile/?xxx=<?php echo $user->ID;?>">
                                                            <img src="<?php echo get_user_meta($user->ID,'personal_foto', true);?>" alt=""/>
                                                        </a>
		                                            <?php endif;?>
                                                </p>
                                                <a style="white-space: nowrap;
                                                    text-overflow: ellipsis;
                                                    overflow: hidden;" href="/public-profile/?xxx=<?php echo $user->ID;?>"><?php echo $user->display_name;?> </a>
                                            </div>
                                            <!--<a href="/public-profile/?xxx=<?php /*echo $user->ID;*/?>">
                                                <span>
                                                            <svg width="4" height="17" viewBox="0 0 4 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="2" cy="2" r="2" fill="white" fill-opacity="0.5"/>
                                                            <circle cx="2" cy="8.5" r="2" fill="white" fill-opacity="0.5"/>
                                                            <circle cx="2" cy="15" r="2" fill="white" fill-opacity="0.5"/>
                                                           </svg>
                                                </span>
                                            </a>-->
                                        </div>
				                    <?php }?>
                                </div>
                            </article>
                    </div>

                    <div id="users_suggested" style="width: 24%;margin-top: 30px">
                        <div id="suggested_list">
                            <div class="community-list suggested-com-list">
		                        <?php
			                        global $wpdb;
			                        $get_all_users = $wpdb->get_results("SELECT `ID` FROM `wp_users`", ARRAY_A);
			                        $suggested = [];
                                    foreach ($get_all_users as $user) {
	                                    $count_user_videos = count_user_posts($user['ID'], 'post', true);
	                                    $count_user_photos = count_user_posts($user['ID'], 'photos', true);
	                                    $get_subscribers_count = $wpdb->get_var( "SELECT COUNT(*) FROM `wp_usermeta` WHERE `meta_key`= 'subscribe_author' AND `meta_value`= " . $user['ID']);
	                                    if($count_user_videos > 0 || $count_user_photos > 0 || $get_subscribers_count > 0) {
		                                    $suggested[] = $user['ID'];
	                                    }
                                    }
                                    shuffle($suggested);
			                        ?>
                                    <article>
                                        <h2 class="widget-title suggested_list"><?php echo __('Suggested members', 'arc');?></h2>
                                        <div class="users_list" style="padding: 0 !important;">
					                        <?php foreach($suggested as $suggest){ ?>
                                                <div class="item_user sidebar">
                                                    <div style="display: inline-flex;align-items: center;">
                                                        <p class="user_pic" style="margin-bottom: 0">
		                                                    <?php
		                                                    if(get_user_meta($suggest, 'personal_foto', true) == false) :?>
                                                                <a href="/public-profile/?xxx=<?php echo $suggest;?>">
                                                                    <svg width="40" height="40" viewBox="0 0 212 212" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <rect width="212" height="212" rx="4" fill="#200437"/>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M81.0001 0H8L69.5808 106.661L8.76343 212H81.7635L106.081 169.881L130.398 212H203.398L142.581 106.661L204.162 0H131.162L106.081 43.4412L81.0001 0Z" fill="#C32CE2" fill-opacity="0.1"/>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2"/>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2" fill-opacity="0.5"/>
                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="url(#paint_linear_b)"/>
                                                                        <defs>
                                                                            <linearGradient id="paint_linear_b" x1="79.4282" y1="68.8369" x2="159.667" y2="207.876" gradientUnits="userSpaceOnUse">
                                                                                <stop offset="0.1" stop-color="#BA25D6"/>
                                                                                <stop offset="1" stop-color="#200437"/>
                                                                            </linearGradient>
                                                                        </defs>
                                                                    </svg>
                                                                </a>
		                                                    <?php else:?>
                                                                <a href="/public-profile/?xxx=<?php echo $suggest;?>">
                                                                    <img src="<?php echo get_user_meta($suggest,'personal_foto', true);?>" alt=""/>
                                                                </a>
		                                                    <?php endif;?>
                                                        </p>
                                                        <a style="white-space: nowrap;
                                                    text-overflow: ellipsis;
                                                    overflow: hidden;" href="/public-profile/?xxx=<?php echo $suggest;?>"><?php echo get_userdata($suggest)->display_name;?></a>
                                                    </div>
                                                    <!--<a href="/public-profile/?xxx=<?php /*echo $suggest;*/?>"><span>
                                                        <svg width="4" height="17" viewBox="0 0 4 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2" cy="2" r="2" fill="white" fill-opacity="0.5"/>
                                                        <circle cx="2" cy="8.5" r="2" fill="white" fill-opacity="0.5"/>
                                                        <circle cx="2" cy="15" r="2" fill="white" fill-opacity="0.5"/>
                                                        </svg>
                                                    </span></a>-->
                                                </div>
					                        <?php }?>
                                        </div>
                                    </article>
                            </div>
                        </div>
                    </div>
                </div>
                <!--members tab [end]--->

                <!--advanced search tab--->
                <div class="community-list" id="advanced_search" style="padding-left: 20px;width: -webkit-fill-available;display:<?=(isset($_GET['users'])) ? 'block' : 'none'?>">
                     <?php if(isset($_GET['users']) && !empty($_GET['users'])){
			                $args = ['fields' => 'all'];
			                $result = '';
			                if($_GET['users'] == 'all') {
				                $result = '';
				                $users = get_users($args);
				                foreach ($users as $user) {
					                $result .= $user->ID . ',';
				                }
			                }
			                if($_GET['users'] == 'newest') {
				                $users = get_users($args);
				                foreach ($users as $user) {
					                $reg_in_sec = strtotime($user->user_registered);
					                $current_time_stamp = time();
					                $reg = $current_time_stamp - $reg_in_sec;
					                if(($current_time_stamp - $reg_in_sec) <= 2592000){ //30 days
						                $result .= $user->ID . ',';
					                }
				                }
			                }
			                if($_GET['users'] == 'online') {
				                $users = get_users($args);
                                global $wpdb;
                                $time = time() - 900;
                                $query = "SELECT user_id FROM wp_usermeta WHERE `meta_key` = 'last_active' AND `meta_value` >" . $time;
                                $id_users_online = $wpdb->get_results($query, ARRAY_A);
				                foreach ($id_users_online as $user) {
				                    $result .= $user['user_id'] . ',';
				                }
			                }

			                if(isset($_GET['username']) && !empty($_GET['username'])) {
				                global $wpdb;
				                $username = htmlentities(trim($_GET['username']));
				                $q = "SELECT `ID` FROM `wp_users` WHERE `user_login` LIKE '%".$username."%' OR `user_nicename` LIKE '%".$username."%'";
				                $ids = $wpdb->get_results($q, ARRAY_A);
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($ids as $ID) {
					                if(array_search($ID['ID'], $result) !== false) {
						                $result2 .= $ID['ID'] . ',';
                                    }
				                }
				                $result = $result2;
                            }
                            /*print_r($ids);
                            print_r($result);*/
			                if(isset($_GET['has_contacts']) && $_GET['has_contacts'] == 'on') {
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                if(get_user_meta($ID, 'phone', true) !== false && !empty(get_user_meta($ID, 'phone', true)) || get_user_meta($ID, 'show_email', true) == 'on') {
							                $result2 .= $ID . ',';
						                }
					                }
				                }
				                $result = $result2;
			                }
			                if(isset($_GET['has_avatar']) && $_GET['has_avatar'] == 'on') {
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                if(get_user_meta($ID, 'personal_foto', true) && !empty(get_user_meta($ID, 'personal_foto', true))) {
							                $result2 .= $ID . ',';
						                }
					                }
				                }
				                $result = $result2;
			                }
			                if(isset($_GET['has_videos'])) {
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                $countVideos = count_user_posts($ID, 'post', true );
						                if($countVideos > 0) {
							                $result2 .= $ID . ',';
						                }
					                }
				                }
				                $result = $result2;
			                }
			                if(isset($_GET['has_images'])) {
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                $author_imgs = count_user_posts($ID, 'photos', true );
						                if($author_imgs > 0) {
							                $result2 .= $ID . ',';
						                }
					                }
				                }
				                $result = $result2;
			                }
			                if(isset($_GET['gender']) && !empty($_GET['gender']) && $_GET['gender'] != '-1') {
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                if(get_user_meta($ID, 'i_am', true) == $_GET['gender'] && get_user_meta($ID, 'i_am', true) !== false) {
							                $result2 .= $ID . ',';
						                }
					                }
				                }
				                $result = $result2;
			                }
			                if(isset($_GET['orientation']) && !empty($_GET['orientation']) && $_GET['orientation'] != '-1') {
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                if(get_user_meta($ID, 'orientation', true) == $_GET['orientation'] && get_user_meta($ID, 'orientation', true) !== false) {
							                $result2 .= $ID . ',';
						                }
					                }
				                }
				                $result = $result2;
			                }
	                        if(isset($_GET['relationship']) && !empty($_GET['relationship']) && $_GET['relationship'] != 'All' && $_GET['relationship'] != '-1') {
		                        $result2 = '';
		                        $result = explode(',', $result);
		                        foreach ($result as $ID) {
			                        if($ID == '') continue;
			                        else {
				                        if(get_user_meta($ID, 'relation', true) == $_GET['relationship'] && get_user_meta($ID, 'relation', true) !== false) {
					                        $result2 .= $ID . ',';
				                        }
			                        }
		                        }
		                        $result = $result2;
	                        }
			                if(isset($_GET['age']) && !empty($_GET['age'])) {
				                $age = explode('-', $_GET['age']);
				                $ageMin = trim($age[0]);
				                $ageMax = trim($age[1]);
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                if(get_user_meta($ID, 'birthday', true) !== false) {
							                $bday = explode('/', get_user_meta($ID, 'birthday', true))[2];
							                $profileAge = date('Y') - $bday;
							                if((int)$profileAge >= (int)$ageMin && (int)$profileAge <= (int)$ageMax) {
								                $result2 .= $ID . ',';
							                }
						                }
					                }
				                }
				                $result = $result2;
			                }
			                if(isset($_GET['user_eye_color']) && !empty($_GET['user_eye_color']) && $_GET['user_eye_color'] != 'All' && $_GET['user_eye_color'] != '-1') {
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                if(get_user_meta($ID, 'eye_color', true) == $_GET['user_eye_color'] && get_user_meta($ID, 'eye_color', true) !== false) {
							                $result2 .= $ID . ',';
						                }
					                }
				                }
				                $result = $result2;
			                }
			                if(isset($_GET['hair_color']) && !empty($_GET['hair_color']) && $_GET['hair_color'] != '-1') {
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                if(get_user_meta($ID, 'hair_color', true) == $_GET['hair_color'] && get_user_meta($ID, 'hair_color', true) !== false) {
							                $result2 .= $ID . ',';
						                }
					                }
				                }
				                $result = $result2;
			                }
			                if(isset($_GET['height']) && !empty($_GET['height'])) {
				                $height = explode('-', $_GET['height']);
				                $heightMin = trim($height[0]);
				                $heightMax = trim($height[1]);
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                if(get_user_meta($ID, 'height', true) !== false) {
							                $userHeight = get_user_meta( $ID, 'height', true );
							                if ((int)$userHeight >= (int)$heightMin && (int)$userHeight <= (int)$heightMax) {
								                $result2 .= $ID . ',';
							                }
						                }
					                }
				                }
				                $result = $result2;
			                }
			                if(isset($_GET['weight']) && !empty($_GET['weight'])) {
				                $weight = explode('-', $_GET['weight']);
				                $weightMin = trim($weight[0]);
				                $weightMax = trim($weight[1]);
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                if(get_user_meta($ID, 'weight', true) !== false) {
							                $userWeight = get_user_meta( $ID, 'weight', true );
							                if ((int)$userWeight >= (int)$weightMin && (int)$userWeight <= (int)$weightMax) {
								                $result2 .= $ID . ',';
							                }
						                }
					                }
				                }
				                $result = $result2;
			                }
			                if(isset($_GET['tattoo']) && $_GET['tattoo'] == 'on') {
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                if(get_user_meta($ID, 'tattoo', true) == 'Yes' && get_user_meta($ID, 'tattoo', true) !== false) {
							                $result2 .= $ID . ',';
						                }
					                }
				                }
				                $result = $result2;
			                }
			                if(isset($_GET['piercing']) && $_GET['piercing'] == 'on') {
				                $result2 = '';
				                $result = explode(',', $result);
				                foreach ($result as $ID) {
					                if($ID == '') continue;
					                else {
						                if(get_user_meta($ID, 'piercing', true) == 'Yes' && get_user_meta($ID, 'piercing', true) !== false) {
							                $result2 .= $ID . ',';
						                }
					                }
				                }
				                $result = $result2;
			                }

	                     if(isset($_GET['city']) && !empty($_GET['city'])) {
		                     global $wpdb;
		                     $usercity = htmlentities(trim($_GET['city']));
		                     $q = "SELECT `user_id` FROM `wp_usermeta` WHERE `meta_key` = 'city' AND `meta_value` LIKE '%".$usercity."%'";
		                     $u_ids = $wpdb->get_results($q, ARRAY_A);
		                     $result2 = '';
		                     $result = explode(',', $result);
		                     foreach ($u_ids as $ID) {
			                     if(array_search($ID['user_id'], $result) !== false) {
				                     $result2 .= $ID['user_id'] . ',';
			                     }
		                     }
		                     $result = $result2;
	                     }
	                     if(isset($_GET['country']) && !empty($_GET['country']) && $_GET['country'] != '-1') {
		                     global $wpdb;
		                     $usercountry= htmlentities($_GET['country']);
		                     $q = "SELECT `user_id` FROM `wp_usermeta` WHERE `meta_key` = 'country' AND `meta_value` LIKE '%".$usercountry."%'";
		                     $u_ids = $wpdb->get_results($q, ARRAY_A);
		                     $result2 = '';
		                     $result = explode(',', $result);
		                     foreach ($u_ids as $ID) {
			                     if(array_search($ID['user_id'], $result) !== false) {
				                     $result2 .= $ID['user_id'] . ',';
			                     }
		                     }
		                     $result = $result2;
	                     }

		                }?>
                    <div id="filter_users_area" style="display:block;position: relative;">
                        <form method="get" id="form_filter_area" style="width: 100%;">
                            <div style="display: flex;
                                justify-content: space-between;
                                flex-wrap: wrap;">
                                <fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;">
                                    <div class="filter-block" style="display: flex;
                                        flex-wrap: wrap;
                                        width: 233px;">
                                        <div class="form-display_name" id="user_status" style="margin-bottom: 13px;width: 233px;
                                                border-radius: 4px!important;
                                                padding: 20px!important;background: <?=get_theme_mod('primary_color_setting')?>;">
				                            <?php
				                            if(empty($_GET['users']) || !isset($_GET['users'])):?>
                                                <input type="radio" name="users" value="all" class="user_status" id="all_users" checked/>
                                                <label for="all_users"><?php echo __('All', 'arc');?></label><br>
                                                <input type="radio" name="users" value="newest" class="user_status" id="newest_users" />
                                                <label for="newest_users"><?php echo __('Newest', 'arc');?></label><br>
                                                <input type="radio" name="users" value="online" class="user_status" id="active_users"/>
                                                <label for="active_users"><?php echo __('Online', 'arc');?></label><br>
				                            <?php
                                            elseif(!empty($_GET['users']) && $_GET['users'] == 'all'):?>
                                                <input type="radio" name="users" value="all" class="user_status" id="all_users" checked/>
                                                <label for="all_users"><?php echo __('All', 'arc');?></label><br>
                                                <input type="radio" name="users" value="newest" class="user_status" id="newest_users" />
                                                <label for="newest_users"><?php echo __('Newest', 'arc');?></label><br>
                                                <input type="radio" name="users" value="online" class="user_status" id="active_users"/>
                                                <label for="active_users"><?php echo __('Online', 'arc');?></label>
				                            <?php elseif($_GET['users'] == 'newest'):?>
                                                <input type="radio" name="users" value="all" class="user_status" id="all_users"/>
                                                <label for="all_users"><?php echo __('All', 'arc');?></label><br>
                                                <input type="radio" name="users" value="newest" class="user_status" id="newest_users" checked/>
                                                <label for="newest_users"><?php echo __('Newest', 'arc');?></label><br>
                                                <input type="radio" name="users" value="online" class="user_status" id="active_users"/>
                                                <label for="active_users"><?php echo __('Online', 'arc');?></label>
				                            <?php else:?>
                                                <input type="radio" name="users" value="all" class="user_status" id="all_users"/>
                                                <label for="all_users"><?php echo __('All', 'arc');?></label><br>
                                                <input type="radio" name="users" value="newest" class="user_status" id="newest_users" />
                                                <label for="newest_users"><?php echo __('Newest', 'arc');?></label><br>
                                                <input type="radio" name="users" value="online" class="user_status" id="active_users" checked/>
                                                <label for="active_users"><?php echo __('Online', 'arc');?></label>
				                            <?php endif;?>
                                        </div>
                                        <div id="div_avatar_contacts" class="form-display_name" style="margin-bottom: 13px;width: 233px;
                                                border-radius: 4px!important;
                                                padding: 20px!important;background: <?=get_theme_mod('primary_color_setting')?>;">
                                            <input type="checkbox" name="has_avatar" id="has_avatar" <?php checked($_GET['has_avatar'], 'on'); ?>/>
                                            <label for="has_avatar"><?php echo __('Has avatar', 'arc');?></label><br>
                                            <input type="checkbox" name="has_contacts" id="has_contacts" <?php checked($_GET['has_contacts'], 'on'); ?>/>
                                            <label for="has_contacts"><?php echo __('Has contacts', 'arc');?></label><br>
                                            <input type="checkbox" name="has_videos" id="has_videos" <?php checked($_GET['has_videos'], 'on'); ?>/>
                                            <label for="has_videos"><?php echo __('Has submitted videos', 'arc');?></label><br>
                                            <input type="checkbox" name="has_images" id="has_images" <?php checked($_GET['has_images'], 'on'); ?>/>
                                            <label for="has_images"><?php echo __('Has submitted images', 'arc');?></label><br>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;">
                                    <div class="filter-block" id="div_age_height" style="display: flex;
                                        flex-wrap: wrap;
                                        width: 233px;">
                                        <style>
                                            .slidecontainer {
                                                width: 100%;
                                                margin-bottom: 30px;
                                            }

                                            .slider {
                                                -webkit-appearance: none;
                                                width: 100%;
                                                height: 25px;
                                                background: #d3d3d3;
                                                outline: none;
                                                opacity: 0.7;
                                                -webkit-transition: .2s;
                                                transition: opacity .2s;
                                            }

                                            .slider:hover {
                                                opacity: 1;
                                            }

                                            .slider::-webkit-slider-thumb {
                                                -webkit-appearance: none;
                                                appearance: none;
                                                width: 25px;
                                                height: 25px;
                                                background: #4CAF50;
                                                cursor: pointer;
                                            }

                                            .slider::-moz-range-thumb {
                                                width: 25px;
                                                height: 25px;
                                                background: #4CAF50;
                                                cursor: pointer;
                                            }
                                            #amount {
                                                width: 40%;
                                            }
                                        </style>
                                        <style>
                                            .slideheight {
                                                width: 100%;
                                                margin-bottom: 30px;
                                            }
                                            .slider {
                                                -webkit-appearance: none;
                                                width: 100%;
                                                height: 25px;
                                                background: #d3d3d3;
                                                outline: none;
                                                opacity: 0.7;
                                                -webkit-transition: .2s;
                                                transition: opacity .2s;
                                            }
                                            .slider:hover {
                                                opacity: 1;
                                            }
                                            .slider::-webkit-slider-thumb {
                                                -webkit-appearance: none;
                                                appearance: none;
                                                width: 25px;
                                                height: 25px;
                                                background: #4CAF50;
                                                cursor: pointer;
                                            }
                                            .slider::-moz-range-thumb {
                                                width: 25px;
                                                height: 25px;
                                                background: #4CAF50;
                                                cursor: pointer;
                                            }
                                            #height {
                                                width: 40%;
                                            }
                                        </style>
                                        <div class="form-display_name" id="div_user_gender" style="margin-bottom: 13px;width: 233px;
                                                border-radius: 4px!important;
                                                padding: 20px!important;background: <?=get_theme_mod('primary_color_setting')?>;">
                                            <p style="width: 100%;text-align: center; margin:0;padding:0">
                                                <label for="amount" style="font-family: Roboto;
                                                        font-style: normal;
                                                        font-weight: normal;
                                                        font-size: 14px;
                                                        line-height: 16px;
                                                        /* Icons 50% */
                                                        color: rgba(<?php
	                                            $hex = get_theme_mod('text_site_color');
	                                            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	                                            echo $r.",".$g.",". $b;
	                                            ?>, 1)!important;">Age</label>
                                            </p>
	                                        <?php if(!empty($_GET['age'])):?>
                                                <script>
                                                    jQuery(document).ready(function($){
                                                        var location_search = location.search;
                                                        var get_age = location_search.split('age=')[1].split('&height=')[0];
                                                        var get_min_age = parseInt(get_age.split('-')[0]);
                                                        var get_max_age = parseInt(get_age.split('-')[1]);
                                                        $("#slider-range").slider({
                                                            values: [get_min_age, get_max_age]
                                                        });
                                                    });
                                                </script>
	                                        <?php else:?>
                                                <script>
                                                    jQuery(document).ready(function($){
                                                        $("#slider-range").slider({ values: [18, 99]});
                                                    });
                                                </script>
	                                        <?php endif; ?>
                                            <p style="width: 100%;display: inline;font-family: Roboto;
                                                font-style: normal;
                                                font-weight: normal;
                                                font-size: 14px;text-align: center; margin:0;padding:0;
                                                line-height: 16px;
                                                color: <?=get_theme_mod('text_site_color')?>;">
                                                <input type="text" name="age" id="amount" value="<?php echo $_GET['age'];?>" readonly
                                                       style="
                                                       padding-right: 0;
                                                       padding-left: 0;
                                                       text-align: right;
                                                               width: 50%;
                                                               margin-left: 0;
                                                               border:0;
                                                               background: transparent !important;
                                                               border: none !important;">
                                                <span style="margin-left: 5px;" class="age-amount"><?=(!empty($_GET['age'])) ? 'years': '';?></span>
                                            </p>
                                            <div id="slider-range" style="width:100%;display: inline-block;"></div>
                                        </div>

                                        <div class="form-display_name slideheight" id="div_user_height" style="margin-bottom: 13px;width: 233px;
                                                border-radius: 4px!important;
                                                padding: 20px!important;background: <?=get_theme_mod('primary_color_setting')?>;">
                                            <p style="width: 100%;text-align: center; margin:0;padding:0">
                                                <label for="height" style="font-family: Roboto;
                                                        font-style: normal;
                                                        font-weight: normal;
                                                        font-size: 14px;
                                                        line-height: 16px;
                                                        color: rgba(<?php
	                                            $hex = get_theme_mod('text_site_color');
	                                            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	                                            echo $r.",".$g.",". $b;
	                                            ?>, 1)!important;">Height</label>
                                            </p>
	                                        <?php if(!empty($_GET['height'])):?>
                                                <script>
                                                    jQuery(document).ready(function($){
                                                        var location_search = location.search;
                                                        var get_height = location_search.split('height=')[1].split('&city=')[0];
                                                        var get_min_height = parseInt(get_height.split('-')[0]);
                                                        var get_max_height = parseInt(get_height.split('-')[1]);
                                                        $("#slider-height").slider({
                                                            values: [get_min_height, get_max_height]
                                                        });
                                                    });
                                                </script>
	                                        <?php else:?>
                                                <script>
                                                    jQuery(document).ready(function($){
                                                        $("#slider-height").slider({ values: [100, 250]});
                                                    });
                                                </script>
	                                        <?php endif; ?>
                                            <p style="width: 100%;display: inline;font-family: Roboto;
                                                    font-style: normal;
                                                    font-weight: normal;
                                                    font-size: 14px;
                                                    line-height: 16px;text-align: center; margin:0;padding:0;
                                                    color: <?=get_theme_mod('text_site_color')?>;">
                                                <input type="text" name="height" id="height" value="<?php echo $_GET['height'];?>" readonly
                                                       style="padding-right: 0;
                                                        padding-left: 0;
                                                        width: 58%;
                                                        text-align: right;
                                                               margin-left: 0;
                                                               border:0;
                                                               background: transparent !important;
                                                               border: none !important;">
                                                <span style="margin-left: 5px;" class="height-amount"><?=(!empty($_GET['height'])) ? 'cm': '';?></span>
                                            </p>
                                            <div id="slider-height" style="width:100%;display: inline-block;"></div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="fieldset">
                                    <div class="filter-block" style="display: flex;
                                        flex-wrap: wrap;
                                        width: 233px;">
                                        <div class="form-display_name" style="width: 233px;
                                                border-radius: 4px!important;
                                                padding: 20px!important;background: <?=get_theme_mod('primary_color_setting')?>;">
                                            <label for="location">Location</label>
                                            <input placeholder="Location" class="location" id="location" type="text" name="city" value="<?php echo $_GET['city'];?>" style="width: 100%;"><br>
                                            <label for="country_user">Country</label>
                                            <select name="country" id="country_user" style="width: 100%;">
                                                <option selected disabled><?php echo __('Choose country', 'arc'); ?></option>
                                                <option <?php selected($_GET['country'], __('Afghanistan', 'arc')); ?>>Afghanistan</option>
                                                <option <?php selected($_GET['country'], __('Aland Islands', 'arc')); ?>>Aland Islands</option>
                                                <option <?php selected($_GET['country'], __('Albania', 'arc')); ?>>Albania</option>
                                                <option <?php selected($_GET['country'], __('Algeria', 'arc')); ?>>Algeria</option>
                                                <option <?php selected($_GET['country'], __('American Samoa', 'arc')); ?>>American Samoa</option>
                                                <option <?php selected($_GET['country'], __('Andorra', 'arc')); ?>>Andorra</option>
                                                <option <?php selected($_GET['country'], __('Angola', 'arc')); ?>>Angola</option>
                                                <option <?php selected($_GET['country'], __('Anguilla', 'arc')); ?>>Anguilla</option>
                                                <option <?php selected($_GET['country'], __('Antarctica', 'arc')); ?>>Antarctica</option>
                                                <option <?php selected($_GET['country'], __('Antigua and Barbuda', 'arc')); ?>>Antigua and Barbuda</option>
                                                <option <?php selected($_GET['country'], __('Argentina', 'arc')); ?>>Argentina</option>
                                                <option <?php selected($_GET['country'], __('Armenia', 'arc')); ?>>Armenia</option>
                                                <option <?php selected($_GET['country'], __('Aruba', 'arc')); ?>>Aruba</option>
                                                <option <?php selected($_GET['country'], __('Asia/Pacific Region', 'arc')); ?>>Asia/Pacific Region</option>
                                                <option <?php selected($_GET['country'], __('Australia', 'arc')); ?>>Australia</option>
                                                <option <?php selected($_GET['country'], __('Austria', 'arc')); ?>>Austria</option>
                                                <option <?php selected($_GET['country'], __('Azerbaijan', 'arc')); ?>>Azerbaijan</option>
                                                <option <?php selected($_GET['country'], __('Bahamas', 'arc')); ?>>Bahamas</option>
                                                <option <?php selected($_GET['country'], __('Bahrain', 'arc')); ?>>Bahrain</option>
                                                <option <?php selected($_GET['country'], __('Bangladesh', 'arc')); ?>>Bangladesh</option>
                                                <option <?php selected($_GET['country'], __('Barbados', 'arc')); ?>>Barbados</option>
                                                <option <?php selected($_GET['country'], __('Belarus', 'arc')); ?>>Belarus</option>
                                                <option <?php selected($_GET['country'], __('Belgium', 'arc')); ?>>Belgium</option>
                                                <option <?php selected($_GET['country'], __('Belize', 'arc')); ?>>Belize</option>
                                                <option <?php selected($_GET['country'], __('Benin', 'arc')); ?>>Benin</option>
                                                <option <?php selected($_GET['country'], __('Bermuda', 'arc')); ?>>Bermuda</option>
                                                <option <?php selected($_GET['country'], __('Bhutan', 'arc')); ?>>Bhutan</option>
                                                <option <?php selected($_GET['country'], __('Bolivia', 'arc')); ?>>Bolivia</option>
                                                <option <?php selected($_GET['country'], __('Bonaire', 'arc')); ?>>Bonaire</option>
                                                <option <?php selected($_GET['country'], __('Bosnia and Herzegovina', 'arc')); ?>>Bosnia and Herzegovina</option>
                                                <option <?php selected($_GET['country'], __('Botswana', 'arc')); ?>>Botswana</option>
                                                <option <?php selected($_GET['country'], __('Bouvet Island', 'arc')); ?>>Bouvet Island</option>
                                                <option <?php selected($_GET['country'], __('Brazil', 'arc')); ?>>Brazil</option>
                                                <option <?php selected($_GET['country'], __('British Indian Ocean Territory', 'arc')); ?>>British Indian Ocean Territory</option>
                                                <option <?php selected($_GET['country'], __('British Virgin Islands', 'arc')); ?>>British Virgin Islands</option>
                                                <option <?php selected($_GET['country'], __('Brunei Darussalam', 'arc')); ?>>Brunei Darussalam</option>
                                                <option <?php selected($_GET['country'], __('Bulgaria', 'arc')); ?>>Bulgaria</option>
                                                <option <?php selected($_GET['country'], __('Burkina Faso', 'arc')); ?>>Burkina Faso</option>
                                                <option <?php selected($_GET['country'], __('Burundi', 'arc')); ?>>Burundi</option>
                                                <option <?php selected($_GET['country'], __('Cambodia', 'arc')); ?>>Cambodia</option>
                                                <option <?php selected($_GET['country'], __('Cameroon', 'arc')); ?>>Cameroon</option>
                                                <option <?php selected($_GET['country'], __('Canada', 'arc')); ?>>Canada</option>
                                                <option <?php selected($_GET['country'], __('Cape Verde Islands', 'arc')); ?>>Cape Verde Islands</option>
                                                <option <?php selected($_GET['country'], __('Cayman Islands<', 'arc')); ?>>Cayman Islands</option>
                                                <option <?php selected($_GET['country'], __('Central African Republic', 'arc')); ?>>Central African Republic</option>
                                                <option <?php selected($_GET['country'], __('Chad', 'arc')); ?>>Chad</option>
                                                <option <?php selected($_GET['country'], __('Chile', 'arc')); ?>>Chile</option>
                                                <option <?php selected($_GET['country'], __('China', 'arc')); ?>>China</option>
                                                <option <?php selected($_GET['country'], __('Christmas Island', 'arc')); ?>>Christmas Island</option>
                                                <option <?php selected($_GET['country'], __('Cocos Keeling Islands', 'arc')); ?>>Cocos Keeling Islands</option>
                                                <option <?php selected($_GET['country'], __('Colombia', 'arc')); ?>>Colombia</option>
                                                <option <?php selected($_GET['country'], __('Comoros', 'arc')); ?>>Comoros</option>
                                                <option <?php selected($_GET['country'], __('Congo, Democratic Republic of', 'arc')); ?>>Congo, Democratic Republic of</option>
                                                <option <?php selected($_GET['country'], __('Congo, Republic of', 'arc')); ?>>Congo, Republic of</option>
                                                <option <?php selected($_GET['country'], __('Cook Islands', 'arc')); ?>>Cook Islands</option>
                                                <option <?php selected($_GET['country'], __('Costa Rica', 'arc')); ?>>Costa Rica</option>
                                                <option <?php selected($_GET['country'], __('Croatia', 'arc')); ?>>Croatia</option>
                                                <option <?php selected($_GET['country'], __('Cuba', 'arc')); ?>>Cuba</option>
                                                <option <?php selected($_GET['country'], __('Curacao', 'arc')); ?>>Curacao</option>
                                                <option <?php selected($_GET['country'], __('Cyprus', 'arc')); ?>>Cyprus</option>
                                                <option <?php selected($_GET['country'], __('Czech Republic', 'arc')); ?>>Czech Republic</option>
                                                <option <?php selected($_GET['country'], __('Côte d\'Ivoire', 'arc')); ?>>Côte d'Ivoire</option>
                                                <option <?php selected($_GET['country'], __('Denmark', 'arc')); ?>>Denmark</option>
                                                <option <?php selected($_GET['country'], __('Djibouti', 'arc')); ?>>Djibouti</option>
                                                <option <?php selected($_GET['country'], __('Dominica', 'arc')); ?>>Dominica</option>
                                                <option <?php selected($_GET['country'], __('Dominican Republic', 'arc')); ?>>Dominican Republic</option>
                                                <option <?php selected($_GET['country'], __('East Timor', 'arc')); ?>>East Timor</option>
                                                <option <?php selected($_GET['country'], __('Ecuador', 'arc')); ?>>Ecuador</option>
                                                <option <?php selected($_GET['country'], __('Egypt', 'arc')); ?>>Egypt</option>
                                                <option <?php selected($_GET['country'], __('El Salvador', 'arc')); ?>>El Salvador</option>
                                                <option <?php selected($_GET['country'], __('Equatorial Guinea', 'arc')); ?>>Equatorial Guinea</option>
                                                <option <?php selected($_GET['country'], __('Eritrea', 'arc')); ?>>Eritrea</option>
                                                <option <?php selected($_GET['country'], __('Estonia', 'arc')); ?>>Estonia</option>
                                                <option <?php selected($_GET['country'], __('Ethiopia', 'arc')); ?>>Ethiopia</option>
                                                <option <?php selected($_GET['country'], __('European Union', 'arc')); ?>>European Union</option>
                                                <option <?php selected($_GET['country'], __('Falkland Islands', 'arc')); ?>>Falkland Islands</option>
                                                <option <?php selected($_GET['country'], __('Faroe Islands', 'arc')); ?>>Faroe Islands</option>
                                                <option <?php selected($_GET['country'], __('Fiji', 'arc')); ?>>Fiji</option>
                                                <option <?php selected($_GET['country'], __('Finland', 'arc')); ?>>Finland</option>
                                                <option <?php selected($_GET['country'], __('France', 'arc')); ?>>France</option>
                                                <option <?php selected($_GET['country'], __('French Guiana', 'arc')); ?>>French Guiana</option>
                                                <option <?php selected($_GET['country'], __('French Polynesia', 'arc')); ?>>French Polynesia</option>
                                                <option <?php selected($_GET['country'], __('French Southern Territories', 'arc')); ?>>French Southern Territories</option>
                                                <option <?php selected($_GET['country'], __('Gabon', 'arc')); ?>>Gabon</option>
                                                <option <?php selected($_GET['country'], __('Gambia', 'arc')); ?>>Gambia</option>
                                                <option <?php selected($_GET['country'], __('Georgia', 'arc')); ?>>Georgia</option>
                                                <option <?php selected($_GET['country'], __('Germany', 'arc')); ?>>Germany</option>
                                                <option <?php selected($_GET['country'], __('Ghana', 'arc')); ?>>Ghana</option>
                                                <option <?php selected($_GET['country'], __('Gibraltar', 'arc')); ?>>Gibraltar</option>
                                                <option <?php selected($_GET['country'], __('Greece', 'arc')); ?>>Greece</option>
                                                <option <?php selected($_GET['country'], __('Greenland', 'arc')); ?>>Greenland</option>
                                                <option <?php selected($_GET['country'], __('Grenada', 'arc')); ?>>Grenada</option>
                                                <option <?php selected($_GET['country'], __('Guadeloupe', 'arc')); ?>>Guadeloupe</option>
                                                <option <?php selected($_GET['country'], __('Guam', 'arc')); ?>>Guam</option>
                                                <option <?php selected($_GET['country'], __('Guatemala', 'arc')); ?>>Guatemala</option>
                                                <option <?php selected($_GET['country'], __('Guernsey', 'arc')); ?>>Guernsey</option>
                                                <option <?php selected($_GET['country'], __('Guinea', 'arc')); ?>>Guinea</option>
                                                <option <?php selected($_GET['country'], __('Guinea-Bissau', 'arc')); ?>>Guinea-Bissau</option>
                                                <option <?php selected($_GET['country'], __('Guyana', 'arc')); ?>>Guyana</option>
                                                <option <?php selected($_GET['country'], __('Haiti', 'arc')); ?>>Haiti</option>
                                                <option <?php selected($_GET['country'], __('Heard Island and McDonald Islands', 'arc')); ?>>Heard Island and McDonald Islands</option>
                                                <option <?php selected($_GET['country'], __('Honduras', 'arc')); ?>>Honduras</option>
                                                <option <?php selected($_GET['country'], __('Hong Kong', 'arc')); ?>>Hong Kong</option>
                                                <option <?php selected($_GET['country'], __('Hungary', 'arc')); ?>>Hungary</option>
                                                <option <?php selected($_GET['country'], __('Iceland', 'arc')); ?>>Iceland</option>
                                                <option <?php selected($_GET['country'], __('India', 'arc')); ?>>India</option>
                                                <option <?php selected($_GET['country'], __('Indonesia', 'arc')); ?>>Indonesia</option>
                                                <option <?php selected($_GET['country'], __('Iran', 'arc')); ?>>Iran</option>
                                                <option <?php selected($_GET['country'], __('Iraq', 'arc')); ?>>Iraq</option>
                                                <option <?php selected($_GET['country'], __('Ireland', 'arc')); ?>>Ireland</option>
                                                <option <?php selected($_GET['country'], __('Isle of Man', 'arc')); ?>>Isle of Man</option>
                                                <option <?php selected($_GET['country'], __('Israel', 'arc')); ?>>Israel</option>
                                                <option <?php selected($_GET['country'], __('Italy', 'arc')); ?>>Italy</option>
                                                <option <?php selected($_GET['country'], __('Jamaica', 'arc')); ?>>Jamaica</option>
                                                <option <?php selected($_GET['country'], __('Japan', 'arc')); ?>>Japan</option>
                                                <option <?php selected($_GET['country'], __('Jersey', 'arc')); ?>>Jersey</option>
                                                <option <?php selected($_GET['country'], __('Jordan', 'arc')); ?>>Jordan</option>
                                                <option <?php selected($_GET['country'], __('Kazakhstan', 'arc')); ?>>Kazakhstan</option>
                                                <option <?php selected($_GET['country'], __('Kenya', 'arc')); ?>>Kenya</option>
                                                <option <?php selected($_GET['country'], __('Kiribati', 'arc')); ?>>Kiribati</option>
                                                <option <?php selected($_GET['country'], __('Korea, the Republic of', 'arc')); ?>>Korea, the Republic of</option>
                                                <option <?php selected($_GET['country'], __('Kuwait', 'arc')); ?>>Kuwait</option>
                                                <option <?php selected($_GET['country'], __('Kyrgyzstan', 'arc')); ?>>Kyrgyzstan</option>
                                                <option <?php selected($_GET['country'], __('Laos', 'arc')); ?>>Laos</option>
                                                <option <?php selected($_GET['country'], __('Latvia', 'arc')); ?>>Latvia</option>
                                                <option <?php selected($_GET['country'], __('Lebanon', 'arc')); ?>>Lebanon</option>
                                                <option <?php selected($_GET['country'], __('Lesotho', 'arc')); ?>>Lesotho</option>
                                                <option <?php selected($_GET['country'], __('Liberia', 'arc')); ?>>Liberia</option>
                                                <option <?php selected($_GET['country'], __('Libya', 'arc')); ?>>Libya</option>
                                                <option <?php selected($_GET['country'], __('Liechtenstein', 'arc')); ?>>Liechtenstein</option>
                                                <option <?php selected($_GET['country'], __('Lithuania', 'arc')); ?>>Lithuania</option>
                                                <option <?php selected($_GET['country'], __('Luxembourg', 'arc')); ?>>Luxembourg</option>
                                                <option <?php selected($_GET['country'], __('Macau', 'arc')); ?>>Macau</option>
                                                <option <?php selected($_GET['country'], __('Madagascar', 'arc')); ?>>Madagascar</option>
                                                <option <?php selected($_GET['country'], __('Malawi', 'arc')); ?>>Malawi</option>
                                                <option <?php selected($_GET['country'], __('Malaysia', 'arc')); ?>>Malaysia</option>
                                                <option <?php selected($_GET['country'], __('Maldives', 'arc')); ?>>Maldives</option>
                                                <option <?php selected($_GET['country'], __('Mali', 'arc')); ?>>Mali</option>
                                                <option <?php selected($_GET['country'], __('Malta', 'arc')); ?>>Malta</option>
                                                <option <?php selected($_GET['country'], __('Marshall Islands', 'arc')); ?>>Marshall Islands</option>
                                                <option <?php selected($_GET['country'], __('Martinique', 'arc')); ?>>Martinique</option>
                                                <option <?php selected($_GET['country'], __('Mauritania', 'arc')); ?>>Mauritania</option>
                                                <option <?php selected($_GET['country'], __('Mauritius', 'arc')); ?>>Mauritius</option>
                                                <option <?php selected($_GET['country'], __('Mayotte Island', 'arc')); ?>>Mayotte Island</option>
                                                <option <?php selected($_GET['country'], __('Mexico', 'arc')); ?>>Mexico</option>
                                                <option <?php selected($_GET['country'], __('Micronesia', 'arc')); ?>>Micronesia</option>
                                                <option <?php selected($_GET['country'], __('Moldova', 'arc')); ?>>Moldova</option>
                                                <option <?php selected($_GET['country'], __('Monaco', 'arc')); ?>>Monaco</option>
                                                <option <?php selected($_GET['country'], __('Mongolia', 'arc')); ?>>Mongolia</option>
                                                <option <?php selected($_GET['country'], __('Montenegro', 'arc')); ?>>Montenegro</option>
                                                <option <?php selected($_GET['country'], __('Montserrat', 'arc')); ?>>Montserrat</option>
                                                <option <?php selected($_GET['country'], __('Morocco', 'arc')); ?>>Morocco</option>
                                                <option <?php selected($_GET['country'], __('Mozambique', 'arc')); ?>>Mozambique</option>
                                                <option <?php selected($_GET['country'], __('Myanmar', 'arc')); ?>>Myanmar</option>
                                                <option <?php selected($_GET['country'], __('Namibia', 'arc')); ?>>Namibia</option>
                                                <option <?php selected($_GET['country'], __('Nauru', 'arc')); ?>>Nauru</option>
                                                <option <?php selected($_GET['country'], __('Nepal', 'arc')); ?>>Nepal</option>
                                                <option <?php selected($_GET['country'], __('Netherlands', 'arc')); ?>>Netherlands</option>
                                                <option <?php selected($_GET['country'], __('Netherlands Antilles', 'arc')); ?>>Netherlands Antilles</option>
                                                <option <?php selected($_GET['country'], __('New Caledonia', 'arc')); ?>>New Caledonia</option>
                                                <option <?php selected($_GET['country'], __('New Zealand', 'arc')); ?>>New Zealand</option>
                                                <option <?php selected($_GET['country'], __('Nicaragua', 'arc')); ?>>Nicaragua</option>
                                                <option <?php selected($_GET['country'], __('Niger', 'arc')); ?>>Niger</option>
                                                <option <?php selected($_GET['country'], __('Nigeria', 'arc')); ?>>Nigeria</option>
                                                <option <?php selected($_GET['country'], __('Niue', 'arc')); ?>>Niue</option>
                                                <option <?php selected($_GET['country'], __('Norfolk Island', 'arc')); ?>>Norfolk Island</option>
                                                <option <?php selected($_GET['country'], __('North Korea', 'arc')); ?>>North Korea</option>
                                                <option <?php selected($_GET['country'], __('North Macedonia', 'arc')); ?>>North Macedonia</option>
                                                <option <?php selected($_GET['country'], __('Northern Mariana Islands', 'arc')); ?>>Northern Mariana Islands</option>
                                                <option <?php selected($_GET['country'], __('Norway', 'arc')); ?>>Norway</option>
                                                <option <?php selected($_GET['country'], __('Oman', 'arc')); ?>>Oman</option>
                                                <option <?php selected($_GET['country'], __('Oriya', 'arc')); ?>>Oriya</option>
                                                <option <?php selected($_GET['country'], __('Pakistan', 'arc')); ?>>Pakistan</option>
                                                <option <?php selected($_GET['country'], __('Palau', 'arc')); ?>>Palau</option>
                                                <option <?php selected($_GET['country'], __('Palestine', 'arc')); ?>>Palestine</option>
                                                <option <?php selected($_GET['country'], __('Panama', 'arc')); ?>>Panama</option>
                                                <option <?php selected($_GET['country'], __('Papua New Guinea', 'arc')); ?>>Papua New Guinea</option>
                                                <option <?php selected($_GET['country'], __('Paraguay', 'arc')); ?>>Paraguay</option>
                                                <option <?php selected($_GET['country'], __('Peru', 'arc')); ?>>Peru</option>
                                                <option <?php selected($_GET['country'], __('Philippines', 'arc')); ?>>Philippines</option>
                                                <option <?php selected($_GET['country'], __('Pitcairn Island', 'arc')); ?>>Pitcairn Island</option>
                                                <option <?php selected($_GET['country'], __('Poland', 'arc')); ?>>Poland</option>
                                                <option <?php selected($_GET['country'], __('Portugal', 'arc')); ?>>Portugal</option>
                                                <option <?php selected($_GET['country'], __('Puerto Rico', 'arc')); ?>>Puerto Rico</option>
                                                <option <?php selected($_GET['country'], __('Qatar', 'arc')); ?>>Qatar</option>
                                                <option <?php selected($_GET['country'], __('Republic of Kosovo', 'arc')); ?>>Republic of Kosovo</option>
                                                <option <?php selected($_GET['country'], __('Reunion Island', 'arc')); ?>>Reunion Island</option>
                                                <option <?php selected($_GET['country'], __('Romania', 'arc')); ?>>Romania</option>
                                                <option <?php selected($_GET['country'], __('Russian Federation', 'arc')); ?>>Russian Federation</option>
                                                <option <?php selected($_GET['country'], __('Rwanda', 'arc')); ?>>Rwanda</option>
                                                <option <?php selected($_GET['country'], __('Saint Barthelemy', 'arc')); ?>>Saint Barthelemy</option>
                                                <option <?php selected($_GET['country'], __('Saint Helena', 'arc')); ?>>Saint Helena</option>
                                                <option <?php selected($_GET['country'], __('Saint Kitts and Nevis', 'arc')); ?>>Saint Kitts and Nevis</option>
                                                <option <?php selected($_GET['country'], __('Saint Lucia', 'arc')); ?>>Saint Lucia</option>
                                                <option <?php selected($_GET['country'], __('Saint Martin', 'arc')); ?>>Saint Martin</option>
                                                <option <?php selected($_GET['country'], __('Saint Pierre and Miquelon', 'arc')); ?>>Saint Pierre and Miquelon</option>
                                                <option <?php selected($_GET['country'], __('Saint Vincent and the Grenadines', 'arc')); ?>>Saint Vincent and the Grenadines</option>
                                                <option <?php selected($_GET['country'], __('San Marino', 'arc')); ?>>San Marino</option>
                                                <option <?php selected($_GET['country'], __('Sao Tome and Principe', 'arc')); ?>>Sao Tome and Principe</option>
                                                <option <?php selected($_GET['country'], __('Saudi Arabia', 'arc')); ?>>Saudi Arabia</option>
                                                <option <?php selected($_GET['country'], __('Senegal', 'arc')); ?>>Senegal</option>
                                                <option <?php selected($_GET['country'], __('Serbia', 'arc')); ?>>Serbia</option>
                                                <option <?php selected($_GET['country'], __('Seychelles', 'arc')); ?>>Seychelles</option>
                                                <option <?php selected($_GET['country'], __('Sierra Leone', 'arc')); ?>>Sierra Leone</option>
                                                <option <?php selected($_GET['country'], __('Singapore', 'arc')); ?>>Singapore</option>
                                                <option <?php selected($_GET['country'], __('Sint Maarten', 'arc')); ?>>Sint Maarten</option>
                                                <option <?php selected($_GET['country'], __('Slovak Republic', 'arc')); ?>>Slovak Republic</option>
                                                <option <?php selected($_GET['country'], __('Slovenia', 'arc')); ?>>Slovenia</option>
                                                <option <?php selected($_GET['country'], __('Solomon Islands', 'arc')); ?>>Solomon Islands</option>
                                                <option <?php selected($_GET['country'], __('Somalia', 'arc')); ?>>Somalia</option>
                                                <option <?php selected($_GET['country'], __('South Africa', 'arc')); ?>>South Africa</option>
                                                <option <?php selected($_GET['country'], __('South Georgia', 'arc')); ?>>South Georgia</option>
                                                <option <?php selected($_GET['country'], __('South Sudan', 'arc')); ?>>South Sudan</option>
                                                <option <?php selected($_GET['country'], __('Spain', 'arc')); ?>>Spain</option>
                                                <option <?php selected($_GET['country'], __('Sri Lanka', 'arc')); ?>>Sri Lanka</option>
                                                <option <?php selected($_GET['country'], __('Sudan', 'arc')); ?>>Sudan</option>
                                                <option <?php selected($_GET['country'], __('Suriname', 'arc')); ?>>Suriname</option>
                                                <option <?php selected($_GET['country'], __('Svalbard', 'arc')); ?>>Svalbard</option>
                                                <option <?php selected($_GET['country'], __('Swaziland', 'arc')); ?>>Swaziland</option>
                                                <option <?php selected($_GET['country'], __('Sweden', 'arc')); ?>>Sweden</option>
                                                <option <?php selected($_GET['country'], __('Switzerland', 'arc')); ?>>Switzerland</option>
                                                <option <?php selected($_GET['country'], __('Syria', 'arc')); ?>>Syria</option>
                                                <option <?php selected($_GET['country'], __('Taiwan', 'arc')); ?>>Taiwan</option>
                                                <option <?php selected($_GET['country'], __('Tajikistan', 'arc')); ?>>Tajikistan</option>
                                                <option <?php selected($_GET['country'], __('Tanzania', 'arc')); ?>>Tanzania</option>
                                                <option <?php selected($_GET['country'], __('Thailand', 'arc')); ?>>Thailand</option>
                                                <option <?php selected($_GET['country'], __('Togo', 'arc')); ?>>Togo</option>
                                                <option <?php selected($_GET['country'], __('Tokelau', 'arc')); ?>>Tokelau</option>
                                                <option <?php selected($_GET['country'], __('Tonga Islands', 'arc')); ?>>Tonga Islands</option>
                                                <option <?php selected($_GET['country'], __('Trinidad and Tobago', 'arc')); ?>>Trinidad and Tobago</option>
                                                <option <?php selected($_GET['country'], __('Tunisia', 'arc')); ?>>Tunisia</option>
                                                <option <?php selected($_GET['country'], __('Turkey', 'arc')); ?>>Turkey</option>
                                                <option <?php selected($_GET['country'], __('Turkmenistan', 'arc')); ?>>Turkmenistan</option>
                                                <option <?php selected($_GET['country'], __('Turks and Caicos Islands', 'arc')); ?>>Turks and Caicos Islands</option>
                                                <option <?php selected($_GET['country'], __('Tuvalu', 'arc')); ?>>Tuvalu</option>
                                                <option <?php selected($_GET['country'], __('US Virgin Islands', 'arc')); ?>>US Virgin Islands</option>
                                                <option <?php selected($_GET['country'], __('Uganda', 'arc')); ?>>Uganda</option>
                                                <option <?php selected($_GET['country'], __('Ukraine', 'arc')); ?>>Ukraine</option>
                                                <option <?php selected($_GET['country'], __('United Arab Emirates', 'arc')); ?>>United Arab Emirates</option>
                                                <option <?php selected($_GET['country'], __('United Kingdom', 'arc')); ?>>United Kingdom</option>
                                                <option <?php selected($_GET['country'], __('United States', 'arc')); ?>>United States</option>
                                                <option <?php selected($_GET['country'], __('United States Minor Outlying Islands', 'arc')); ?>>United States Minor Outlying Islands</option>
                                                <option <?php selected($_GET['country'], __('Uruguay', 'arc')); ?>>Uruguay</option>
                                                <option <?php selected($_GET['country'], __('Uzbekistan', 'arc')); ?>>Uzbekistan</option>
                                                <option <?php selected($_GET['country'], __('Vanuatu', 'arc')); ?>>Vanuatu</option>
                                                <option <?php selected($_GET['country'], __('Vatican City', 'arc')); ?>>Vatican City</option>
                                                <option <?php selected($_GET['country'], __('Venezuela', 'arc')); ?>>Venezuela</option>
                                                <option <?php selected($_GET['country'], __('Vietnam', 'arc')); ?>>Vietnam</option>
                                                <option <?php selected($_GET['country'], __('Wallis And Futuna', 'arc')); ?>>Wallis And Futuna</option>
                                                <option <?php selected($_GET['country'], __('Western Sahara', 'arc')); ?>>Western Sahara</option>
                                                <option <?php selected($_GET['country'], __('Western Samoa', 'arc')); ?>>Western Samoa</option>
                                                <option <?php selected($_GET['country'], __('Yemen', 'arc')); ?>>Yemen</option>
                                                <option <?php selected($_GET['country'], __('Zambia', 'arc')); ?>>Zambia</option>
                                                <option <?php selected($_GET['country'], __('Zimbabwe', 'arc')); ?>>Zimbabwe</option>
                                            </select>
                                        </div>
                                        <div class="form-display_name" style="margin-top: 13px;">
                                            <div class="form-display_name slideweight" style="margin-bottom: 13px;width: 233px;
                                                    border-radius: 4px!important;
                                                    padding: 20px!important;background: <?=get_theme_mod('primary_color_setting')?>;">
                                                <p style="width: 100%;text-align: center; margin:0;padding:0">
                                                    <label for="height" style="font-family: Roboto;
                                                            font-style: normal;
                                                            font-weight: normal;
                                                            font-size: 14px;
                                                            line-height: 16px;
                                                            color: rgba(<?php
                                                    $hex = get_theme_mod('text_site_color');
                                                    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
                                                    echo $r.",".$g.",". $b;
                                                    ?>, 1)!important;">Weight</label>
                                                </p>
                                                <?php if(!empty($_GET['weight'])):?>
                                                <script>
                                                    jQuery(document).ready(function($){
                                                        var location_search = location.search;
                                                        var get_weight = location_search.split('weight=')[1].split('&username=')[0];
                                                        var get_min_weight = parseInt(get_weight.split('-')[0]);
                                                        var get_max_weight = parseInt(get_weight.split('-')[1]);
                                                        $("#slider-weight").slider({
                                                            values: [get_min_weight, get_max_weight]
                                                        });
                                                    });
                                                </script>
                                                <?php else:?>
                                                    <script>
                                                        jQuery(document).ready(function($){
                                                            $("#slider-weight").slider({ values: [40, 200]});
                                                        });
                                                    </script>
                                                <?php endif; ?>
                                                <p style="width: 100%;display: inline;font-family: Roboto;
                                                        font-style: normal;
                                                        font-weight: normal;
                                                        font-size: 14px;
                                                        line-height: 16px;
                                                        text-align: center; margin:0;padding:0;
                                                        color: <?=get_theme_mod('text_site_color')?>;">
                                                    <input type="text" name="weight" id="weight" value="<?php echo $_GET['weight'];?>" readonly
                                                           style="padding-right: 0;
                                                            padding-left: 0;
                                                            width: 58%;
                                                            text-align: right;
                                                                   margin-left: 0;
                                                                   border:0;
                                                                   background: transparent !important;
                                                                   border: none !important;">
                                                    <span style="margin-left: 5px;" class="weight-amount"><?=(!empty($_GET['weight'])) ? 'kg': '';?></span>
                                                </p>
                                                <div id="slider-weight" style="width:100%;display: inline-block;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="fieldset">
                                    <div class="filter-block" style="display: flex;
                                        flex-wrap: wrap;
                                        width: 233px;">
                                        <div class="form-display_name" style="width: 233px;
                                                border-radius: 4px!important;
                                                padding: 20px!important;background: <?=get_theme_mod('primary_color_setting')?>;">
                                            <label for="username">Username contains</label>
                                            <input placeholder="Username contains" class="username" id="username" type="text" name="username" value="<?php echo $_GET['username'];?>" style="width: 100%"><br>
                                            <label for="user_gender">Gender</label>
                                            <select name="gender" id="user_gender">
                                                <option disabled selected><?php echo __('Choose gender', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Male', 'arc')); ?>><?php echo __('Male', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Female', 'arc')); ?>><?php echo __('Female', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Transgender MtF', 'arc')); ?>><?php echo __('Transgender MtF', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Transgender FtM', 'arc')); ?>><?php echo __('Transgender FtM', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Genderqueer', 'arc')); ?>><?php echo __('Genderqueer', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Male and female couple', 'arc')); ?>><?php echo __('Male and female couple', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Male couple', 'arc')); ?>><?php echo __('Male couple', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Female couple', 'arc')); ?>><?php echo __('Female couple', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Transgender couple', 'arc')); ?>><?php echo __('Transgender couple', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Transgender and male couple', 'arc')); ?>><?php echo __('Transgender and male couple', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Transgender and female couple', 'arc')); ?>><?php echo __('Transgender and female couple', 'arc'); ?></option>
                                                <option <?php selected($_GET['gender'], __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
                                            </select><br>
                                            <label for="user_orientation">Orientation</label>
                                            <select name="orientation" id="user_orientation">
                                                <option disabled selected><?php echo __('Choose orientation', 'arc'); ?></option>
                                                <option <?php selected($_GET['orientation'], __('Heterosexual', 'arc')); ?>><?php echo __('Heterosexual', 'arc'); ?></option>
                                                <option <?php selected($_GET['orientation'], __('Homosexual', 'arc')); ?>><?php echo __('Homosexual', 'arc'); ?></option>
                                                <option <?php selected($_GET['orientation'], __('Bisexual', 'arc')); ?>><?php echo __('Bisexual', 'arc'); ?></option>
                                                <option <?php selected($_GET['orientation'], __('Heteroflexible', 'arc')); ?>><?php echo __('Heteroflexible', 'arc'); ?></option>
                                                <option <?php selected($_GET['orientation'], __('Homoflexible', 'arc')); ?>><?php echo __('Homoflexible', 'arc'); ?></option>
                                                <option <?php selected($_GET['orientation'], __('Pansexual', 'arc')); ?>><?php echo __('Pansexual', 'arc'); ?></option>
                                                <option <?php selected($_GET['orientation'], __('Asexual', 'arc')); ?>><?php echo __('Asexual', 'arc'); ?></option>
                                                <option <?php selected($_GET['orientation'], __('Not sure', 'arc')); ?>><?php echo __('Not sure', 'arc'); ?></option>
                                                <option <?php selected($_GET['orientation'], __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
                                            </select><br>
                                            <label for="relationship">Relationship status</label>
                                            <select name="relationship" id="relationship">
                                                <option disabled selected><?php echo __('Choose status', 'arc'); ?></option>
                                                <option <?php selected($_GET['relationship'], __('Single', 'arc')); ?>><?php echo __('Single', 'arc'); ?></option>
                                                <option <?php selected($_GET['relationship'], __('Taken', 'arc')); ?>><?php echo __('Taken', 'arc'); ?></option>
                                                <option <?php selected($_GET['relationship'], __('Open', 'arc')); ?>><?php echo __('Open', 'arc'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="fieldset">
                                    <div class="filter-block" style="display: flex;
                                        flex-wrap: wrap;
                                        width: 233px;">
                                        <div id="div_hair_color_eye" class="form-display_name" style="width: 233px;
                                                border-radius: 4px!important;
                                                padding: 20px!important;background: <?=get_theme_mod('primary_color_setting')?>;">
                                            <label for="user_hair_color">Hair color</label>
                                            <select name="hair_color" id="user_hair_color" style="width: 100%;">
                                                <option selected disabled><?php echo __('Choose hair color', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Blonde', 'arc')); ?>><?php echo __('Blonde', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Brown', 'arc')); ?>><?php echo __('Brown', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Red', 'arc')); ?>><?php echo __('Red', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Black', 'arc')); ?>><?php echo __('Black', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Hairless', 'arc')); ?>><?php echo __('Hairless', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
                                            </select><br>
                                            <label for="user_eye_color">Eye color</label>
                                            <select name="user_eye_color" id="user_eye_color" style="width: 100%;">
                                                <option selected disabled><?php echo __('Choose eye color', 'arc'); ?></option>
                                                <option <?php selected($_GET['user_eye_color'], __('Black', 'arc')); ?>><?php echo __('Black', 'arc'); ?></option>
                                                <option <?php selected($_GET['user_eye_color'], __('Blue', 'arc')); ?>><?php echo __('Blue', 'arc'); ?></option>
                                                <option <?php selected($_GET['user_eye_color'], __('Brown', 'arc')); ?>><?php echo __('Brown', 'arc'); ?></option>
                                                <option <?php selected($_GET['user_eye_color'], __('Green', 'arc')); ?>><?php echo __('Green', 'arc'); ?></option>
                                                <option <?php selected($_GET['user_eye_color'], __('Gray', 'arc')); ?>><?php echo __('Gray', 'arc'); ?></option>
                                                <option <?php selected($_GET['user_eye_color'], __('Hazel', 'arc')); ?>><?php echo __('Hazel', 'arc'); ?></option>
                                                <option <?php selected($_GET['user_eye_color'], __('Multicolored', 'arc')); ?>><?php echo __('Multicolored', 'arc'); ?></option>
                                                <option <?php selected($_GET['user_eye_color'], __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
                                            </select><br>
                                        </div>
                                        <div id="div_tattoo_piersing" class="form-display_name" style="width: 233px;
                                                border-radius: 4px!important;
                                                padding: 20px!important;background: <?=get_theme_mod('primary_color_setting')?>;margin-top: 13px;">
                                            <input type="checkbox" name="tattoo" id="tattoo" <?php checked($_GET['tattoo'], 'on'); ?>/>
                                            <label for="tattoo"><?php echo __('Has tattoos', 'arc');?></label><br>
                                            <input type="checkbox" name="piercing" id="piercing" <?php checked($_GET['piercing'], 'on'); ?>/>
                                            <label for="piercing"><?php echo __('Has piercing', 'arc');?></label><br>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <fieldset class="fieldset">
                                <div class="filter-btns-videos" style="
                                        text-align: center;
                                        justify-content: center !important;
                                        margin-top: 0px !important;
                                        padding-top: 20px !important;
                                        border-top: 1px solid #293243">
                                    <input type="submit" value="<?php echo __('Search', 'arc');?>">
                                    <input style="float: right;" type="button" id="clear_user_filter" value="<?php echo __('Clear', 'arc');?>">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <br>
                    <br>
                    <div class="clear"></div>
                    <h2 class="widget-title" style="padding-left: 24px;padding-right: 24px;" id="search_results_comm"><?php echo __('Search results', 'arc')?></h2>
                    <?php if($result == '') {?>
                        <article style="padding: 10px;padding-left: 24px;padding-right: 24px;padding-bottom:40px">
                            <div class="alert" style="margin-bottom:0"><?php echo __('Search results are empty. ', 'arc');?></div>
                        </article>
				                <?php
			                } else {
				                $res = explode(',', $result);?>
                    <article class="searched_users" style="padding: 10px;padding-left: 24px;padding-right: 24px;padding-bottom:40px">
                        <div class="users_list2" style="text-align: center;justify-content: center;">
		                    <?php foreach ($res as $r) {
			                    if($r !== '') {
				                    ?>
                                        <div class="item_user2">
                                            <div style="display: inline-flex;align-items: center;">
                                                <p class="user_pic" style="margin-bottom: 0">
								                    <?php
								                    if(get_user_meta($r, 'personal_foto', true) == false) :?>
                                                        <a href="/public-profile/?xxx=<?php echo $r;?>">
                                                            <svg width="40" height="40" viewBox="0 0 212 212" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="212" height="212" rx="4" fill="#200437"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M81.0001 0H8L69.5808 106.661L8.76343 212H81.7635L106.081 169.881L130.398 212H203.398L142.581 106.661L204.162 0H131.162L106.081 43.4412L81.0001 0Z" fill="#C32CE2" fill-opacity="0.1"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="#C32CE2" fill-opacity="0.5"/>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M58.5684 63.0964C57.9212 63.2196 57.6133 63.3769 56.7911 64.0039C55.4855 64.9995 53.7999 67.1756 53.1096 68.7563C51.2002 73.129 49.2688 82.2212 48.2652 91.5604C48.0276 93.7717 47.9984 94.6623 48.0001 99.678C48.0025 106.813 48.1906 109.716 48.9579 114.459C50.2736 122.593 52.1303 128.672 55.1926 134.874C56.347 137.212 57.3139 138.58 59.304 140.69C62.6516 144.239 66.5477 146.544 70.6697 147.413C72.483 147.795 73.9132 147.926 76.438 147.942C78.7667 147.956 78.8688 147.946 80.3801 147.56C82.8344 146.932 84.7766 146.227 86.6525 145.282C88.6627 144.27 90.359 143.143 93.9491 140.434C99.8405 135.989 102.461 134.202 103.628 133.833C104.621 133.519 107.534 133.377 108.552 133.593C110.107 133.923 112.43 135.405 117.975 139.605C124.612 144.633 126.673 145.807 131.17 147.124C134.64 148.14 138.235 148.272 141.94 147.522C146.83 146.531 151.392 143.615 155.095 139.116C157.611 136.058 160.104 130.621 161.897 124.277C163.325 119.227 164.438 112.976 164.852 107.674C165.051 105.136 165.049 94.9817 164.849 92.5902C164.15 84.2148 161.835 73.1295 159.895 68.8749C158.825 66.5265 156.91 64.2428 155.372 63.4804C154.289 62.9435 153.658 62.8677 153.019 63.1977C152.095 63.6757 151.298 64.9217 148.75 69.8731C145.915 75.3834 145.21 76.5714 144.26 77.4414C142.983 78.6103 141.525 79.2675 139.914 79.3999C138.948 79.4793 137.875 79.2797 132.925 78.1009C125.052 76.2257 118.988 75.1242 114.269 74.7124C110.097 74.3484 100.784 74.4545 96.9429 74.9099C92.6389 75.4202 86.6742 76.5332 81.3985 77.8103C76.0994 79.0931 74.4471 79.378 72.7436 79.3025C71.7404 79.258 71.5293 79.2052 70.7046 78.7921C69.0447 77.9604 67.6591 76.3605 66.0759 73.4473C65.7137 72.7809 64.7324 70.8766 63.895 69.2153C61.9454 65.3475 61.1294 63.9729 60.5281 63.5431C59.9988 63.165 59.1838 62.9791 58.5684 63.0964ZM78.9043 111.852C84.8798 112.649 91.0247 115.693 93.7745 119.218C94.9653 120.744 95.5759 122.202 95.9528 124.419L96.1526 125.595L95.8576 125.914C95.4769 126.327 93.7082 127.196 92.3354 127.644C90.346 128.294 89.9523 128.332 85.1039 128.332C81.1708 128.332 80.5269 128.305 79.8489 128.116C77.0316 127.327 74.4267 125.673 71.703 122.94C69.457 120.687 68.1023 118.74 67.2805 116.584C66.5876 114.766 66.6512 113.767 67.5158 112.89C68.0278 112.371 68.1821 112.293 69.1824 112.042C69.7886 111.89 70.8085 111.722 71.4489 111.667C73.0663 111.53 77.272 111.634 78.9043 111.852ZM141.442 111.854C143.71 112.336 144.787 113.395 144.574 114.935C144.041 118.794 139.064 124.639 134.29 127.011C132.076 128.111 130.01 128.514 126.581 128.512C121.974 128.51 118.852 127.913 116.52 126.59L115.524 126.025L115.531 124.816C115.547 122.329 116.539 120.243 118.768 118.013C121.643 115.137 126.247 112.954 131.5 111.976C133.779 111.552 139.678 111.479 141.442 111.854Z" fill="url(#paint_linear_c)"/>
                                                                <defs>
                                                                    <linearGradient id="paint_linear_c" x1="79.4282" y1="68.8369" x2="159.667" y2="207.876" gradientUnits="userSpaceOnUse">
                                                                        <stop offset="0.1" stop-color="#BA25D6"/>
                                                                        <stop offset="1" stop-color="#200437"/>
                                                                    </linearGradient>
                                                                </defs>
                                                            </svg>
                                                        </a>
								                    <?php else:?>
                                                        <a href="/public-profile/?xxx=<?php echo $r;?>">
                                                            <img src="<?php echo get_user_meta($r,'personal_foto', true);?>" alt=""/>
                                                        </a>
								                    <?php endif;?>
                                                </p>
                                                <a style="white-space: nowrap;
                                                    text-overflow: ellipsis;
                                                    overflow: hidden;" href="/public-profile/?xxx=<?php echo $r;?>"><?php echo get_userdata($r)->display_name;?> </a>
                                            </div>
                                            <!--<a href="/public-profile/?xxx=<?php /*echo $r;*/?>"><span>
                                                        <svg width="4" height="17" viewBox="0 0 4 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2" cy="2" r="2" fill="white" fill-opacity="0.5"/>
                                                        <circle cx="2" cy="8.5" r="2" fill="white" fill-opacity="0.5"/>
                                                        <circle cx="2" cy="15" r="2" fill="white" fill-opacity="0.5"/>
                                                       </svg>
                                                </span></a>-->
                                        </div>

				                    <?php
			                    }
		                    }?>
                        </div>
                    </article>
			                <?php }?>
                </div>
                <!--advanced search tab [end] --->
            </div>
			<div class="clear"></div>
			<script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                /*var true_posts = '<?php //echo serialize($wp_query->query_vars); ?>';*/
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
            <style>
                input#username {
                    height: 36px !important;
                }



                @media (min-width: 320px) and (max-width: 398px) {
                    span.big_screen_span,
                    span.middle_screen_span{
                        display: none !important;
                    }
                    span.small_screen_span {
                        display: block !important;
                    }
                    #community-tabs button.feed,
                    #community-tabs button.members,
                    #community-tabs button.advanced_search {
                        padding-left: 20px!important;
                        padding-right: 20px!important;
                    }
                }

                @media (max-width: 333px) {
                    #community-tabs button.feed,
                    #community-tabs button.members,
                    #community-tabs button.advanced_search {
                        padding-left: 14px!important;
                        padding-right: 14px!important;
                    }
                }

                @media (min-width: 334px) and (max-width: 351px) {
                    #community-tabs button.feed,
                    #community-tabs button.members,
                    #community-tabs button.advanced_search {
                        padding-left: 17px!important;
                        padding-right: 17px!important;
                    }
                }

                @media (min-width: 399px) and (max-width: 434px) {
                    span.big_screen_span,
                    span.small_screen_span{
                        display: none !important;
                    }
                    span.middle_screen_span {
                        display: block !important;
                    }
                }

                @media (min-width: 962px) and (max-width: 1027px) {
                    div#filter_users_area {
                        padding-left: 15px !important;
                        padding-right: 15px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) {
                        justify-content: center !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(1),
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(2){
                        width: 50% !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(3),
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(4),
                    div.community-list div#filter_users_area form#form_filter_area > div fieldset.fieldset:last-child{
                        width: 32.2% !important;
                        margin-top: -9px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:first-child {
                        margin-top: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(1) > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(2) > div.filter-block{
                        width: 100% !important;
                        flex-wrap: nowrap !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(1) > div.filter-block div.form-display_name,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(2) > div.filter-block div.form-display_name{
                        width: 49% !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(1) > div.filter-block div.form-display_name:first-child,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(1) > div.filter-block div.form-display_name:last-child,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(2) > div.filter-block div.form-display_name:first-child{
                        margin-right: 13px !important;
                    }
                    div#div_user_gender{
                        margin-right: 13px !important;
                        height: 148px !important;
                    }
                    div#div_user_height{
                        height: 148px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(3),
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(4),
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) {
                        margin-right: 13px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) {
                        margin-right: 0px !important;
                    }

                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(3) > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(4) > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(3) > div.filter-block div.form-display_name,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(4) > div.filter-block div.form-display_name,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block div.form-display_name{
                       width: 100%!important;
                    }
                }

                @media (min-width: 962px) and (max-width: 971px) {
                    div#filter_users_area {
                        padding-left: 10px !important;
                        padding-right: 10px !important;
                    }
                }
                @media (min-width: 1028px) and (max-width: 1155px) {
                    div#filter_users_area {
                        padding-left: 25px !important;
                        padding-right: 25px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) {
                        justify-content: flex-start !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset {
                        margin-right: 13px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) {
                        margin-right: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block{
                        flex-wrap: nowrap !important;
                        width: 513px !important;
                        margin-top: -40px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block div.form-display_name:first-child {
                        margin-right: 13px !important;
                        margin-top: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block div.form-display_name:last-child {
                        margin-right: 0px !important;
                        margin-top: -15px !important;
                        height: 95px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block div.form-display_name {
                        width: 250px !important;
                    }
                }

                @media (min-width: 1028px) and (max-width: 1032px) {
                    div#filter_users_area {
                        padding-left: 0px !important;
                        padding-right: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block{
                        flex-wrap: nowrap !important;
                        width: 479px !important;
                        margin-top: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block div.form-display_name {
                        width: 233px !important;
                    }
                }

                @media (min-width: 1033px) and (max-width: 1042px) {
                    div#filter_users_area {
                        padding-left: 5px !important;
                        padding-right: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block{
                        flex-wrap: nowrap !important;
                        width: 479px !important;
                        margin-top: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block div.form-display_name {
                        width: 233px !important;
                    }
                }

                @media (min-width: 1043px) and (max-width: 1070px) {
                    div#filter_users_area {
                        padding-left: 15px !important;
                        padding-right: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block{
                        flex-wrap: nowrap !important;
                        width: 479px !important;
                        margin-top: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block div.form-display_name {
                        width: 233px !important;
                    }
                }

                @media (min-width: 1071px) and (max-width: 1105px) {
                    div#filter_users_area {
                        padding-left: 15px !important;
                        padding-right: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block{
                        flex-wrap: nowrap !important;
                        width: 493px !important;
                        margin-top: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block div.form-display_name {
                        width: 240px !important;
                    }
                }
                @media (min-width: 1106px) and (max-width: 1115px) {
                    div#filter_users_area {
                        padding-left: 10px !important;
                        padding-right: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block{
                        flex-wrap: nowrap !important;
                        width: 513px !important;
                        margin-top: 0px !important;
                    }
                }

                @media (min-width: 1116px) and (max-width: 1143px) {
                    div#filter_users_area {
                        padding-left: 10px !important;
                        padding-right: 10px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block{
                        flex-wrap: nowrap !important;
                        width: 513px !important;
                        margin-top: 0px !important;
                    }
                }

                @media (min-width: 1144px) and (max-width: 1145px) {
                    div#filter_users_area {
                        padding-left: 20px !important;
                        padding-right: 20px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:nth-child(5) > div.filter-block{
                        flex-wrap: nowrap !important;
                        width: 513px !important;
                        margin-top: -40px !important;
                    }
                }


                @media (min-width: 1156px) and (max-width: 1160px) {
                    div#filter_users_area {
                        padding-left: 0 !important;
                        padding-right: 0 !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) {
                        justify-content: flex-start !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset {
                        margin-right: 13px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:last-child {
                        margin-right: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block div.form-display_name {
                        width: 212px !important;
                    }
                }

                @media (min-width: 1161px) and (max-width: 1227px) {
                    div#filter_users_area {
                        padding-left: 0 !important;
                        padding-right: 0 !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) {
                        justify-content: center !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset {
                        margin-right: 13px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:last-child {
                        margin-right: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block div.form-display_name {
                        width: 213px !important;
                    }
                }
                @media (min-width: 1228px) and (max-width: 1239px) {
                    div#filter_users_area {
                        padding-left: 0 !important;
                        padding-right: 0 !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) {
                        justify-content: center !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset {
                        margin-right: 13px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset:last-child {
                        margin-right: 0px !important;
                    }
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block,
                    div#filter_users_area form#form_filter_area > div:nth-child(1) fieldset.fieldset > div.filter-block div.form-display_name{
                        width: 213px !important;
                    }
                }
            </style>
		</main>
	</div>
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-community-page' ) == 'on') {
	get_sidebar();
}
get_footer();
