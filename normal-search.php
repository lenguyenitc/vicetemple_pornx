<?php
function save_data(){
	global $wpdb;
	$table = $wpdb->prefix . 'smart_search';
	$search_query = sanitize_text_field(get_search_query());
	if(!empty($wpdb->get_col( "SELECT `phrase` FROM $table WHERE `phrase` = '" . $search_query . "'" ))){
		return false;
	}
	if(is_search()){
		$search_query = sanitize_text_field(get_search_query());
		if(preg_match("/^[а-я]+/i", $search_query) == 1 && preg_match("/^[а-я]+/i", $search_query) !== false){
			//Save in DB
			$table = $wpdb->prefix . 'smart_search';
			$wpdb->insert(
				$table,
				array( 'phrase' => $search_query),
				array( '%s' )
			);
		}elseif(preg_match("/^[a-z]+/i", $search_query) == 1 && preg_match("/^[a-z]+/i", $search_query) !== false){
			//Save in DB
			$table = $wpdb->prefix . 'smart_search';
			$wpdb->insert(
				$table,
				array( 'phrase' => $search_query),
				array( '%s' )
			);
		}else{
			return false;
		}
	}
}
get_header();
if(!is_user_logged_in()) {
	$favoriteLogin = ' favoriteLoggedOut';
} else $favoriteLogin = '';
if(xbox_get_field_value( 'my-theme-options', 'layout') == 'full-width') {
	if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-search-page' ) == 'on' ) {
		$filter_max_width = '1217px';
	} else {
		$filter_max_width = '1553px';
	}
} else {
	if ( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-search-page' ) == 'on' ) {
		$filter_max_width = '916px';
	} else {
		$filter_max_width = '1253px';
	}
}?>
<?php if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-search-page' ) == 'on') {
	if( xbox_get_field_value( 'my-theme-options', 'sidebar-settings' ) == 'right' )
	{ $sidebar_pos = 'with-sidebar-right'; } else { $sidebar_pos = 'with-sidebar-left'; }
}else{
	$sidebar_pos = '';
} ?>
	<section id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
			<?php
			if( get_theme_mod( 'title_desc_search_pos' ) == 'top') {?>
            <div class="customizer_content" style="margin-top: 0!important;margin-bottom: 40px;">
				<?php
                if ( get_theme_mod( 'seo_search_title' ) !== '' ) : ?>
					<?php echo get_theme_mod( 'seo_search_title' ); ?>
				<?php endif;?>
					<?php if(get_theme_mod('seo_search_text')) { echo get_theme_mod('seo_search_text'); } ?>
            </div>
			<?php }?>
			<?php
            $s = htmlentities(sanitize_text_field(explode('&', get_search_query())[0]));
			if (have_posts()) {
			    if(empty($_GET['s'])):?>
                    <h1 class="widget-title"><?php echo esc_html__( 'Nothing found', 'arc' ); ?></h1>
                    <p><?php echo esc_html__( 'It looks like nothing was found for this search.', 'arc' ); ?></p>
                    <div class="notfound-videos">
                        <h2 class="widget-title"><?php echo esc_html__('Random videos', 'arc'); ?></h2>
                        <div class="videos-list">
                            <?php $args = array( 'numberposts' => -1, 'orderby' => 'rand' );
                            $rand_posts = get_posts( $args );
                            foreach( $rand_posts as $post ) {
                                get_template_part( 'template-parts/loop', 'video' );
                            } ?>
                        </div>
                        <script>
                            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                            //var true_posts = <?php //echo serialize($wp_query->query_vars); ?>';
                            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                            var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                        </script>
                    </div>
			    <?php else: ?>
				    <?php save_data();?>
                    <header class="page-header">
                        <h2 class="widget-title" id="h2_normal_search">
                            <div><?php printf( __( 'Search results for: %s', 'arc' ), '<span>' . explode('&', get_search_query())[0] . '</span>' ); ?></div>
                            <div id="search_filter" style="position: absolute;right: 1em;top: 0;margin-right: 0px">
                                <div class="filters-select" style="position: relative;
                                display: inline-block;
                                cursor: pointer;height: auto;">
								    <?php echo __('Advanced filter', 'arc');?>
                                    <span class="adv-filter-tags">
                                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.83927 5.68659C6.64771 5.86356 6.35229 5.86355 6.16072 5.68659L0.943664 0.867275C0.609395 0.55849 0.827875 -1.15154e-06 1.28294 -1.11176e-06L11.7171 -1.99581e-07C12.1721 -1.59798e-07 12.3906 0.558491 12.0563 0.867276L6.83927 5.68659Z" fill="white"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </h2>
                    </header>
                <div id="filter_videos_area" style="max-width: <?=$filter_max_width?>; width: 100%;">
                    <h3 class="widget-title">Advanced filter</h3>
                    <script>
                        jQuery(document).ready(function($) {
                            $("#slider-range").slider({
                                range: true,
                                min: 0,
                                max: 120,
                                values: [0, 120],
                                slide: function (event, ui) {
                                    $("#duration").val(ui.values[0] + "-" + ui.values[1]);
                                    $("#filter_videos_area > form > div.filter_container_columns > fieldset:nth-child(3) > div.form-display_name.col-1-form.slidecontainer > span").html('min');
                                }
                            });

                            $('div.filter_container_columns fieldset.fieldset input[type=radio]').checkboxradio();
                        });
                    </script>
                    <style>
                        div.filter_container_columns fieldset.fieldset {
                            display: inline-block;
                            vertical-align: top;
                            margin-bottom: 10px;
                        }

                    </style>
                    <form method="get" action="">
                        <div class="filter_container_columns" style="display: flex;
                                justify-content: space-between;
                                flex-wrap: wrap;">
                            <fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;max-width: 219px;">
                                <style>
                                    #filter_videos_area input[type="text"], select{
                                        border-color: #454545;
                                    }
                                    #filter_videos_area select{
                                        width: 250px;
                                        max-width: 250px;
                                    }
                                    #filter_videos_area label {
                                        margin-right: 10px;
                                    }
                                    #filter_videos_area div.form-display_name {
                                        margin-bottom: 10px;
                                    }
                                </style>
                                <div>
                                    <div>
                                        <legend><?php echo esc_html__( 'Videos', 'arc' ); ?></legend>
                                        <div class="form-display_name col-1-form" id="hd_status" style="max-width: 219px;">
		                                    <?php
		                                    if(empty($_GET['search_filter']) || !isset($_GET['search_filter'])):?>
                                                <input type="radio" name="search_filter" value="all_videos" id="all_hd" checked/>
                                                <label for="all_hd"><?php echo __('All videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="hd_video" id="hd_video" />
                                                <label for="hd_video"><?php echo __('HD videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="premium" class="hd_status" id="premium_video" />
                                                <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="featured" class="hd_status" id="featured_video" />
                                                <label for="featured_video"> <?php echo __('Recommend videos', 'arc');?></label>
		                                    <?php
                                            elseif(!empty($_GET['search_filter']) && $_GET['search_filter'] == 'all_videos'):?>
                                                <input type="radio" name="search_filter" value="all_videos" class="hd_status" id="all_hd" checked/>
                                                <label for="all_hd"><?php echo __('All videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="hd_video" class="hd_status" id="hd_video" />
                                                <label for="hd_video"><?php echo __('HD videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="premium" class="hd_status" id="premium_video" />
                                                <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="featured" class="hd_status" id="featured_video" />
                                                <label for="featured_video"> <?php echo __('Recommend videos', 'arc');?></label>
		                                    <?php elseif($_GET['search_filter'] == 'hd_video'):?>
                                                <input type="radio" name="search_filter" value="all_videos" class="hd_status" id="all_hd" />
                                                <label for="all_hd"><?php echo __('All videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="hd_video" class="hd_status" id="hd_video" checked/>
                                                <label for="hd_video"><?php echo __('HD videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="premium" class="hd_status" id="premium_video" />
                                                <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="featured" class="hd_status" id="featured_video" />
                                                <label for="featured_video"> <?php echo __('Recommend videos', 'arc');?></label>
		                                    <?php elseif($_GET['search_filter'] == 'premium'):?>
                                                <input type="radio" name="search_filter" value="all_videos" class="hd_status" id="all_hd" />
                                                <label for="all_hd"><?php echo __('All videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="hd_video" class="hd_status" id="hd_video" />
                                                <label for="hd_video"><?php echo __('HD videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="premium" class="hd_status" id="premium_video" checked/>
                                                <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="featured" class="hd_status" id="featured_video" />
                                                <label for="featured_video"> <?php echo __('Recommend videos', 'arc');?></label>
		                                    <?php elseif($_GET['search_filter'] == 'featured'):?>
                                                <input type="radio" name="search_filter" value="all_videos" class="hd_status" id="all_hd" />
                                                <label for="all_hd"><?php echo __('All videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="hd_video" class="hd_status" id="hd_video" />
                                                <label for="hd_video"><?php echo __('HD videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="premium" class="hd_status" id="premium_video" />
                                                <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="featured" class="hd_status" id="featured_video" checked />
                                                <label for="featured_video"> <?php echo __('Recommend videos', 'arc');?></label>
		                                    <?php else:?>
                                                <input type="radio" name="search_filter" value="all_videos" class="hd_status" id="all_hd" checked/>
                                                <label for="all_hd"><?php echo __('All videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="hd_video" class="hd_status" id="hd_video" />
                                                <label for="hd_video"><?php echo __('HD videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="premium" class="hd_status" id="premium_video" />
                                                <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                                                <input type="radio" name="search_filter" value="featured" class="hd_status" id="featured_video" />
                                                <label for="featured_video"> <?php echo __('Recommend videos', 'arc');?></label>
		                                    <?php endif;?>
                                        </div>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;max-width: 219px;">
                                <legend style="margin-top:10px"><?php echo esc_html__( 'Video orientation', 'arc' ); ?></legend>
                                <div class="form-display_name col-1-form" id="video_orientation">
		                            <?php
		                            if(empty($_GET['video_orientation']) || !isset($_GET['video_orientation'])):?>
                                        <input type="radio" name="video_orientation" value="straight" class="production" id="straight"/>
                                        <label for="straight"><?php echo __('Straight', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="gay" class="production" id="gay" />
                                        <label for="gay"><?php echo __('Gay', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="bi" class="production" id="bi"/>
                                        <label for="bi"><?php echo __('Bi', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="trans" class="production" id="trans"/>
                                        <label for="trans"><?php echo __('Trans', 'arc');?></label>
		                            <?php
                                    elseif($_GET['video_orientation'] == 'straight'):?>
                                        <input type="radio" name="video_orientation" value="straight" class="production" id="straight" checked/>
                                        <label for="straight"><?php echo __('Straight', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="gay" class="production" id="gay" />
                                        <label for="gay"><?php echo __('Gay', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="bi" class="production" id="bi"/>
                                        <label for="bi"><?php echo __('Bi', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="trans" class="production" id="trans"/>
                                        <label for="trans"><?php echo __('Trans', 'arc');?></label>
		                            <?php elseif($_GET['video_orientation'] == 'gay'):?>
                                        <input type="radio" name="video_orientation" value="straight" class="production" id="straight"/>
                                        <label for="straight"><?php echo __('Straight', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="gay" class="production" id="gay" checked/>
                                        <label for="gay"><?php echo __('Gay', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="bi" class="production" id="bi"/>
                                        <label for="bi"><?php echo __('Bi', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="trans" class="production" id="trans"/>
                                        <label for="trans"><?php echo __('Trans', 'arc');?></label>
		                            <?php elseif($_GET['video_orientation'] == 'bi'):?>
                                        <input type="radio" name="video_orientation" value="straight" class="production" id="straight"/>
                                        <label for="straight"><?php echo __('Straight', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="gay" class="production" id="gay" />
                                        <label for="gay"><?php echo __('Gay', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="bi" class="production" id="bi" checked/>
                                        <label for="bi"><?php echo __('Bi', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="trans" class="production" id="trans"/>
                                        <label for="trans"><?php echo __('Trans', 'arc');?></label>
		                            <?php elseif($_GET['video_orientation'] == 'trans'):?>
                                        <input type="radio" name="video_orientation" value="straight" class="production" id="straight"/>
                                        <label for="straight"><?php echo __('Straight', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="gay" class="production" id="gay" />
                                        <label for="gay"><?php echo __('Gay', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="bi" class="production" id="bi" />
                                        <label for="bi"><?php echo __('Bi', 'arc');?></label><br>
                                        <input type="radio" name="video_orientation" value="trans" class="production" id="trans" checked/>
                                        <label for="trans"><?php echo __('Trans', 'arc');?></label>
		                            <?php endif;?>

                                </div>
                            </fieldset>

                            <fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;max-width: 219px;">
                                <legend><?php echo esc_html__( 'Duration', 'arc' ); ?></legend>
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
                                        cursor: pointer;
                                    }
                                    .slider::-moz-range-thumb {
                                        width: 25px;
                                        height: 25px;
                                        cursor: pointer;
                                    }
                                </style>
                                <div class="form-display_name col-1-form slidecontainer">
                                    <label for="duration">Duration:</label>
                                    <input type="text" name="duration" id="duration" value="<?php echo $_GET['duration'];?>" readonly style="
                                        width: 25%;
                                        margin-left: 0;
                                        padding-left: 0;
                                        padding-right: 0;
                                        text-align: center;
                                        border:0;">
                                    <span class="duration-video-span"><?=(!empty($_GET['duration'])) ? 'minutes' : '';?></span>
                                    <div id="slider-range" style="width: 98%;display: inline-block;"></div>
                                </div><br>
                            </fieldset>

                            <fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;max-width: 207px;">
                                <legend><?php echo esc_html__( 'Production', 'arc' ); ?></legend>
                                <div class="form-display_name col-1-form" id="video_production">
		                            <?php
		                            if(!empty($_GET['production']) && $_GET['production'] == 'professional'):?>
                                        <input type="radio" name="production" value="professional" class="production" id="professional" checked />
                                        <label for="professional"><?php echo __('Professional', 'arc');?></label><br>
                                        <input type="radio" name="production" value="homemade" class="production" id="homemade"/>
                                        <label for="homemade"><?php echo __('Homemade', 'arc');?></label>
		                            <?php elseif($_GET['production'] == 'homemade'):?>
                                        <input type="radio" name="production" value="professional" class="production" id="professional" />
                                        <label for="professional"><?php echo __('Professional', 'arc');?></label><br>
                                        <input type="radio" name="production" value="homemade" class="production" id="homemade" checked/>
                                        <label for="homemade"><?php echo __('Homemade', 'arc');?></label>
		                            <?php else:?>
                                        <input type="radio" name="production" value="professional" class="production" id="professional" />
                                        <label for="professional"><?php echo __('Professional', 'arc');?></label><br>
                                        <input type="radio" name="production" value="homemade" class="production" id="homemade"/>
                                        <label for="homemade"><?php echo __('Homemade', 'arc');?></label>
		                            <?php endif;?>
                                </div>
                            </fieldset>
                            <fieldset class="fieldset" style="max-width: 207px;margin-left: .2em; padding-left: 1em;">
                                <legend><?php echo esc_html__( 'Other settings', 'arc' ); ?></legend>
                                <div style="display:flex; flex-wrap: nowrap;background: <?=get_theme_mod('primary_color_setting')?>;">
                                    <div>
                                        <div class="form-display_name col-1-form">
                                            <select name="tattoo" id="cat_tattoo">
                                                <option disabled selected><?php echo __('Has tattoos', 'arc'); ?></option>
                                                <option <?php selected($_GET['tattoo'], __('Yes', 'arc')); ?>><?php echo __('Yes', 'arc'); ?></option>
                                                <option <?php selected($_GET['tattoo'], __('No', 'arc')); ?>><?php echo __('No', 'arc'); ?></option>
                                            </select><br>
                                            <select name="piercing" id="cat_piercing">
                                                <option selected disabled><?php echo __('Has piercing', 'arc'); ?></option>
                                                <option <?php selected($_GET['piercing'], __('Yes', 'arc')); ?>><?php echo __('Yes', 'arc'); ?></option>
                                                <option <?php selected($_GET['piercing'], __('No', 'arc')); ?>><?php echo __('No', 'arc'); ?></option>
                                            </select><br>
                                            <input id="cat_porn_bust" style="width: 100%;" type="text" name="bust" placeholder="<?php echo __('Bust size (A-K)', 'arc');?>" value="<?php if(isset($_GET['bust'])) echo $_GET['bust'];?>" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-display_name col-1-form">
                                            <select name="hair_color" id="cat_hair_color">
                                                <option selected disabled><?php echo __('Choose hair color', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Blonde', 'arc')); ?>><?php echo __('Blonde', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Brown', 'arc')); ?>><?php echo __('Brown', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Red', 'arc')); ?>><?php echo __('Red', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Black', 'arc')); ?>><?php echo __('Black', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Hairless', 'arc')); ?>><?php echo __('Hairless', 'arc'); ?></option>
                                                <option <?php selected($_GET['hair_color'], __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
                                            </select><br>
                                            <select name="ethnicity" id="cat_ethnicity">
                                                <option selected disabled><?php echo __('Choose ethnicity', 'arc'); ?></option>
                                                <option <?php selected($_GET['ethnicity'], __('Asian', 'arc')); ?>><?php echo __('Asian', 'arc'); ?></option>
                                                <option <?php selected($_GET['ethnicity'], __('Ebony', 'arc')); ?>><?php echo __('Ebony', 'arc'); ?></option>
                                                <option <?php selected($_GET['ethnicity'], __('Indian', 'arc')); ?>><?php echo __('Indian', 'arc'); ?></option>
                                                <option <?php selected($_GET['ethnicity'], __('Latino', 'arc')); ?>><?php echo __('Latino', 'arc'); ?></option>
                                                <option <?php selected($_GET['ethnicity'], __('Middle Eastern', 'arc')); ?>><?php echo __('Middle Eastern', 'arc'); ?></option>
                                                <option <?php selected($_GET['ethnicity'], __('Mixed', 'arc')); ?>><?php echo __('Mixed', 'arc'); ?></option>
                                                <option <?php selected($_GET['ethnicity'], __('White', 'arc')); ?>><?php echo __('White', 'arc'); ?></option>
                                            </select><br>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="filter-btns-videos" style="
                            text-align: center;
                            justify-content: center !important;
                            margin-top: 0px !important;
                            padding-top: 20px !important;
                            border-top: 1px solid #293243">
                            <input type="hidden" name="s" value="<?php echo esc_html($s);?>">
                            <input type="hidden" name="search-type" value="normal">
                            <input type="submit" value="<?php echo __('Search videos', 'arc');?>">
                            <input type="button" id="clear_user_filter" value="<?php echo __('Clear filter', 'arc');?>" onclick="window.location.href = '<?php echo site_url(). '/?s=' . $s . '&search-type=normal'; ?>'">
                        </div>
                    </form>
                </div>
                    <div class="videos-list">
					    <?php
					    if(!isset($_GET['search_filter']) && empty($_GET['search_filter'])) {
						    while ( have_posts() ) : the_post();
							    get_template_part( 'template-parts/loop', 'video' );
						    endwhile;
					    } else {
						    global $wpdb;
						    /****advanced filter****/
						    $result = '';
						    if($_GET['search_filter'] == 'all_videos') {
							    $result = '';
							    $filter_posts = $wpdb->get_results("SELECT `ID` 
                                                                      FROM `wp_posts` 
                                                                      WHERE `post_title` 
                                                                      LIKE '%{$s}%' 
                                                                      AND `post_type` = 'post' 
                                                                      ORDER BY `post_date` DESC");
							    foreach ($filter_posts as $filter) {
								    $result .= $filter->ID . ',';
							    }
						    }
						    if($_GET['search_filter'] == 'hd_video') {
							    $filter_posts = $wpdb->get_results("SELECT `wp_posts`.`ID` 
                                                                      FROM `wp_posts` 
                                                                      JOIN `wp_postmeta` 
                                                                      ON `wp_postmeta`.`post_id`= `wp_posts`.`ID` 
                                                                      WHERE `wp_posts`.`post_title` 
                                                                      LIKE '%{$s}%' 
                                                                      AND `wp_posts`.`post_type` = 'post' 
                                                                      AND `wp_postmeta`.`meta_key` = 'hd_video' 
                                                                      AND `wp_postmeta`.`meta_value` = 'on' 
                                                                      ORDER BY `wp_posts`.`post_date` DESC");
							    foreach ( $filter_posts as $filter ) {
								    $result .= $filter->ID . ',';
							    }
						    }
						    if($_GET['search_filter'] == 'premium') {
							    $filter_posts = $wpdb->get_results("SELECT `wp_posts`.`ID` 
                                                                      FROM `wp_posts` 
                                                                      JOIN `wp_postmeta` 
                                                                      ON `wp_postmeta`.`post_id`= `wp_posts`.`ID` 
                                                                      WHERE `wp_posts`.`post_title` 
                                                                      LIKE '%{$s}%' 
                                                                      AND `wp_posts`.`post_type` = 'post' 
                                                                      AND `wp_postmeta`.`meta_key` = 'premium_video' 
                                                                      AND `wp_postmeta`.`meta_value` = 'on' 
                                                                      ORDER BY `wp_posts`.`post_date` DESC");
							    foreach ( $filter_posts as $filter ) {
								    $result .= $filter->ID . ',';
							    }
						    }
						    if($_GET['search_filter'] == 'featured') {
							    $filter_posts = $wpdb->get_results("SELECT `wp_posts`.`ID` 
                                                                      FROM `wp_posts` 
                                                                      JOIN `wp_postmeta` 
                                                                      ON `wp_postmeta`.`post_id`= `wp_posts`.`ID` 
                                                                      WHERE `wp_posts`.`post_title` 
                                                                      LIKE '%{$s}%' 
                                                                      AND `wp_posts`.`post_type` = 'post' 
                                                                      AND `wp_postmeta`.`meta_key` = 'featured_video' 
                                                                      AND `wp_postmeta`.`meta_value` = 'on' 
                                                                      ORDER BY `wp_posts`.`post_date` DESC");
							    foreach ( $filter_posts as $filter ) {
								    $result .= $filter->ID . ',';
							    }
						    }
						    if(!empty($_GET['production'])) {
							    $result2 = '';
							    foreach (explode(',', $result) as $res) {
								    if(get_post_meta($res, 'production', true) == $_GET['production']) {
									    $result2 .= $res . ',';
								    } else continue;
							    }
							    $result = $result2;
						    }
						    if(!empty($_GET['duration'])) {
							    $result2 = '';
							    $duration = explode('-', $_GET['duration']);
							    $dur_min = $duration[0];
							    $dur_max = $duration[1];
							    foreach (explode(',', $result) as $res) {
								    $dur_res[$res] = get_post_meta($res, 'duration', true);
							    }
							    function duration($min, $max, $arr_all_duration){
								    $duration_in_minutes = [];
								    foreach($arr_all_duration as $k => $v){
									    if(strpos($v, 'min')){
										    $duration_in_minutes[] = [$k => explode(' ' , $v)[0]];
									    }elseif(strpos($v, 'sec')){
										    $prepare = explode(' ' , $v)[0];
										    if($prepare < 60){
											    $duration_in_minutes[] = [$k => 0];
											    continue;
										    }
										    $prepare = round($prepare/60);
										    $duration_in_minutes[] = [$k => $prepare];
									    }else{
										    if($v < 60){
											    $duration_in_minutes[] = [$k => 0];
											    continue;
										    }
										    $v = round($v/60);
										    $duration_in_minutes[] = [$k => $v];
									    }
								    }
								    $res = [];
								    foreach($duration_in_minutes as $value){
									    if(current($value) >= $min && current($value) <= $max){
										    $res[] = key($value);
									    }
								    }
								    return $res;
							    }
							    $duration_in_minutes = duration($dur_min, $dur_max, $dur_res);
							    foreach ($duration_in_minutes as $dur) {
								    $result2 .= $dur . ',';
							    }
							    $result = $result2;
						    }
						    if(!empty($_GET['video_orientation'])) {
							    $result2 = '';
							    foreach (explode(',', $result) as $res) {
								    if(get_post_meta($res, 'video_orientation', true) == $_GET['video_orientation']) {
									    $result2 .= $res . ',';
								    } else continue;
							    }
							    $result = $result2;
						    }
						    if($_GET['tattoo'] == 'Yes') {
							    $result2 = '';
							    foreach (explode(',', $result) as $res) {
								    if(get_post_meta($res, 'tattoo', true) == 'on') {
									    $result2 .= $res . ',';
								    } else continue;
							    }
							    $result = $result2;
						    }
						    if($_GET['tattoo'] == 'No') {
							    $result2 = '';
							    foreach (explode(',', $result) as $res) {
								    if(get_post_meta($res, 'tattoo', true) == 'off') {
									    $result2 .= $res . ',';
								    } else continue;
							    }
							    $result = $result2;
						    }
						    if($_GET['piercing'] == 'Yes') {
							    $result2 = '';
							    foreach (explode(',', $result) as $res) {
								    if(get_post_meta($res, 'piercing', true) == 'on') {
									    $result2 .= $res . ',';
								    } else continue;
							    }
							    $result = $result2;
						    }
						    if($_GET['piercing'] == 'No') {
							    $result2 = '';
							    foreach (explode(',', $result) as $res) {
								    if(get_post_meta($res, 'piercing', true) == 'off') {
									    $result2 .= $res . ',';
								    } else continue;
							    }
							    $result = $result2;
						    }
						    if(!empty($_GET['hair_color'])) {
							    $result2 = '';
							    foreach (explode(',', $result) as $res) {
								    if(get_post_meta($res, 'hair_color', true) == $_GET['hair_color']) {
									    $result2 .= $res . ',';
								    } else continue;
							    }
							    $result = $result2;
						    }
						    if(!empty($_GET['ethnicity'])) {
							    $result2 = '';
							    foreach (explode(',', $result) as $res) {
								    if(get_post_meta($res, 'ethnicity', true) == $_GET['ethnicity']) {
									    $result2 .= $res . ',';
								    } else continue;
							    }
							    $result = $result2;
						    }
						    if(!empty($_GET['bust'])) {
							    $result2 = '';
							    foreach (explode(',', $result) as $res) {
								    if(get_post_meta($res, 'bust', true) == $_GET['bust']) {
									    $result2 .= $res . ',';
								    } else continue;
							    }
							    $result = $result2;
						    }
						    $result2 = implode(',', array_unique(explode(',', $result)));
						    if($result2 == '') {?>
                                <article>
                                    <div class="alert"><?php echo __('No match for your filter query. ', 'arc');?></div>
                                </article>
							    <?php
						    } else {
							    $filter_videos = explode(',', $result2);
							    
							    foreach($filter_videos as $videos){
								    if(get_post_meta($videos, 'hd_video', true) == 'on' && get_post_meta($videos, 'premium_video', true) == 'on') {
									    $premium_margin = 'right: 40px;';
								    }
								    if($videos == '') continue;?>
                                    <article id="post-<?php echo $videos; ?>" <?php if(xbox_get_field_value( 'my-theme-options', 'mob-number_videos_per_row' ) == '1') { post_class('thumb-block full-width'); }else{ post_class('thumb-block'); } ?>>
									    <?php
									    $user = wp_get_current_user();
									    if(get_post_meta($videos, 'premium_video', true) == 'on') {
										    if(!is_user_logged_in()) {
											    $permalink   = '#';
											    $data_toggle = "modal";
											    $data_target = "#subscribeModal";
										    } else {
											    //if('on' === xbox_get_field_value('my-theme-options', 'enable-membership')) {
												    $permalink  = get_the_permalink($videos);
												    $data_toggle=""; $data_target="";
											    //}
										    }
									    } else {
										    $permalink  = get_the_permalink($videos);
										    $data_toggle=""; $data_target="";
									    }
									    ?>
                                        <a href="<?php echo $permalink; ?>" data-toggle="<?php echo $data_toggle;?>" data-target="<?php echo $data_target;?>">
                                            <!-- Trailer -->
										    <?php $trailer_url = get_post_meta($videos, 'trailer_url', true);
										    $trailer_format = explode( '.',  $trailer_url);
										    $trailer_format = $trailer_format[ count( $trailer_format ) - 1];
										    $thumb_url = get_post_meta($videos, 'thumb', true); ?>
										    <?php if( $trailer_url != '' && !wp_is_mobile() && $trailer_url !== false && $trailer_url !== 'false' && $trailer_url !== 'http://false' && $trailer_url !== 'https://false') : ?>
											    <?php
											    if ( get_the_post_thumbnail() != '' ) {
												    $poster_url = get_the_post_thumbnail_url($videos, xbox_get_field_value( 'my-theme-options', 'thumb_quality' ));
											    }elseif( $thumb_url != '' ){
												    $poster_url = $thumb_url;
											    } ?>
                                                <div class="post-thumbnail video-with-trailer">
	                                                <?php if(xbox_get_field_value( 'my-theme-options', 'enable_duration' ) == 'on' && get_post_meta($videos, 'duration', true) !== false) : ?><span class="duration">
		                                                <?php if((int)get_post_meta($videos, 'hours', true) > 0 && (int)get_post_meta($videos, 'hours', true) <= 9) {echo '0' . (int)get_post_meta($videos, 'hours', true) . ':'; }if((int)get_post_meta($videos, 'hours', true) >= 10 && (int)get_post_meta($videos, 'hours', true) < 23) {echo (int)get_post_meta($videos, 'hours', true) . ':'; }  if((int)get_post_meta($videos, 'minute', true) >= 0 && (int)get_post_meta($videos, 'minute', true) <= 9) {echo '0'. (int)get_post_meta($videos, 'minute', true) . ":"; } else echo (int)get_post_meta($videos, 'minute', true) . ":";  if((int)get_post_meta($videos, 'second', true) >= 0 && (int)get_post_meta($videos, 'second', true) < 10) echo '0' . (int)get_post_meta($videos, 'second', true); else echo (int)get_post_meta($videos, 'second', true);?></span><?php endif; ?>
                                                    <div class="play-icon">
                                                        <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.7031 0C7.41884 0 0.703125 6.71572 0.703125 15C0.703125 23.2842 7.41884 29.9999 15.7031 29.9999C23.9873 29.9999 30.7031 23.2842 30.7031 15C30.6943 6.71942 23.9837 0.00885184 15.7031 0ZM22.0202 15.4779C21.9163 15.6862 21.7475 15.8551 21.5392 15.9589V15.9643L12.9678 20.25C12.4384 20.5145 11.7949 20.2998 11.5304 19.7705C11.4552 19.62 11.4164 19.4539 11.4174 19.2857V10.7143C11.4171 10.1225 11.8966 9.64266 12.4883 9.64235C12.6547 9.64228 12.8189 9.68096 12.9678 9.75535L21.5392 14.0411C22.0688 14.305 22.2842 14.9483 22.0202 15.4779Z" fill="white" fill-opacity="0.5"/>
                                                        </svg>
                                                    </div>
                                                    <div class="lds-dual-ring"></div>
                                                    <video class="arc-trailer" preload="none" muted loop poster="<?php echo $poster_url; ?>">
                                                        <source src="<?php echo $trailer_url; ?>" type='video/<?php echo $trailer_format; ?>' />
                                                    </video>
												    <?php if(get_post_meta($videos, 'hd_video', true) == 'on') : ?>
                                                        <span class="hd-video">
                                                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="">
                                                            <rect x="1.5" y="4.5" width="27" height="21" fill="white"/>
                                                            <path d="M28.8095 3.47412H1.19055C0.533001 3.47412 0 4.00723 0 4.66467V25.3356C0 25.9931 0.533001 26.5262 1.19055 26.5262H28.8096C29.467 26.5262 30.0001 25.9932 30.0001 25.3356V4.66467C30 4.00723 29.4669 3.47412 28.8095 3.47412ZM10.7554 19.6511L11.7878 16.0365H7.93466L6.90183 19.6511H4.53687L7.19402 10.3492H9.5596L8.46621 14.1763H12.3192L13.4126 10.3492H15.7784L13.1206 19.6511H10.7554ZM25.2527 15.0002C24.4668 17.7507 21.8773 19.6511 18.8876 19.6511H14.9812L16.7368 13.5055H19.1017L17.8855 17.7637H19.5729C21.0214 17.7637 22.3767 16.6477 22.8435 15.0137C23.3143 13.3657 22.5474 12.2364 21.0458 12.2364H17.0989L17.6381 10.3492H21.638C24.5614 10.3492 26.0418 12.2364 25.2527 15.0002Z" fill="#172030"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath >
                                                            <rect width="30" height="30" fill="white"/>
                                                            </clipPath>
                                                            </defs>
                                                            </svg>
                                                        </span>
												    <?php endif; ?>
												    <?php if(get_post_meta($videos, 'premium_video', true) == 'on') :
													    if(xbox_get_field_value('my-theme-options', 'use-premium-label') == 'off'){
														    $premium_icon = (xbox_get_field_value('my-theme-options', 'thumb-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'thumb-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
													    } else {
														    $premium_icon = (xbox_get_field_value('my-theme-options', 'dashboard-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'dashboard-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
													    }?><span class="premium-video" style="<?=$premium_margin?>"><img class="img-responsive svg-crown" src="<?php echo $premium_icon;?>" /></span>
												    <?php endif; ?>
												    <?php if(has_term('watchlater'.$user->ID, 'playlists', $videos)):?>
                                                        <span data-add="add" data-user="<?php echo $user->ID;?>" class="watchLaterIcon<?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="display:none"><i class="fa fa-check" style="font-size: 24px"></i></span>
												    <?php else: ?>
                                                        <span data-add="" data-user="<?php echo $user->ID;?>" class="watchLaterIcon<?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="display:none"><i class="fa fa-plus" style="font-size: 24px"></i></span>
												    <?php endif;?>
                                                </div>
										    <?php else : ?>
                                                <!-- Thumbnail -->
                                                <div class="post-thumbnail <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>thumbs-rotation<?php endif; ?>"
											         <?php if( xbox_get_field_value( 'my-theme-options', 'enable_thumb_rotation' ) == 'on' ) : ?>data-thumbs='<?php echo arc_get_multithumbs($videos);?>'<?php endif; ?>>
	                                                <?php if(xbox_get_field_value( 'my-theme-options', 'enable_duration' ) == 'on' && get_post_meta($videos, 'duration', true) !== false) : ?><span class="duration">
		                                                <?php if((int)get_post_meta($videos, 'hours', true) > 0 && (int)get_post_meta($videos, 'hours', true) <= 9) {echo '0' . (int)get_post_meta($videos, 'hours', true) . ':'; }if((int)get_post_meta($videos, 'hours', true) >= 10 && (int)get_post_meta($videos, 'hours', true) < 23) {echo (int)get_post_meta($videos, 'hours', true) . ':'; }  if((int)get_post_meta($videos, 'minute', true) >= 0 && (int)get_post_meta($videos, 'minute', true) <= 9) {echo '0'. (int)get_post_meta($videos, 'minute', true) . ":"; } else echo (int)get_post_meta($videos, 'minute', true) . ":";  if((int)get_post_meta($videos, 'second', true) >= 0 && (int)get_post_meta($videos, 'second', true) < 10) echo '0' . (int)get_post_meta($videos, 'second', true); else echo (int)get_post_meta($videos, 'second', true);?></span><?php endif; ?>
                                                    <div class="play-icon">
                                                        <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M15.7031 0C7.41884 0 0.703125 6.71572 0.703125 15C0.703125 23.2842 7.41884 29.9999 15.7031 29.9999C23.9873 29.9999 30.7031 23.2842 30.7031 15C30.6943 6.71942 23.9837 0.00885184 15.7031 0ZM22.0202 15.4779C21.9163 15.6862 21.7475 15.8551 21.5392 15.9589V15.9643L12.9678 20.25C12.4384 20.5145 11.7949 20.2998 11.5304 19.7705C11.4552 19.62 11.4164 19.4539 11.4174 19.2857V10.7143C11.4171 10.1225 11.8966 9.64266 12.4883 9.64235C12.6547 9.64228 12.8189 9.68096 12.9678 9.75535L21.5392 14.0411C22.0688 14.305 22.2842 14.9483 22.0202 15.4779Z" fill="white" fill-opacity="0.5"/>
                                                        </svg>
                                                    </div>
                                                    <div class="lds-dual-ring"></div>
												    <?php
												    if ( get_the_post_thumbnail($videos) != '' ) {
													    if( wp_is_mobile() ){
														    echo '<img src="' . get_the_post_thumbnail_url($videos, xbox_get_field_value( 'my-theme-options', 'thumb_quality' )) . '" alt="' . get_the_title($videos) . '">';
													    }else{
														    echo '<img data-src="' . get_the_post_thumbnail_url($videos, xbox_get_field_value( 'my-theme-options', 'thumb_quality' )) . '" alt="' . get_the_title($videos) . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
													    }
												    }elseif( $thumb_url != '' ){
													    echo '<img data-src="' . $thumb_url . '" alt="' . get_the_title($videos) . '" src="' . get_template_directory_uri() . '/assets/img/px.gif">';
												    }else{
													    echo '<img data-src="' . get_template_directory_uri() . '/assets/img/no-image.png' . '" src="' . get_template_directory_uri() . '/assets/img/no-image.jpg' . '">';
												    } ?>
												    <?php if(get_post_meta($videos, 'hd_video', true) == 'on') : ?>
                                                        <span class="hd-video">
                                                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="">
                                                            <rect x="1.5" y="4.5" width="27" height="21" fill="white"/>
                                                            <path d="M28.8095 3.47412H1.19055C0.533001 3.47412 0 4.00723 0 4.66467V25.3356C0 25.9931 0.533001 26.5262 1.19055 26.5262H28.8096C29.467 26.5262 30.0001 25.9932 30.0001 25.3356V4.66467C30 4.00723 29.4669 3.47412 28.8095 3.47412ZM10.7554 19.6511L11.7878 16.0365H7.93466L6.90183 19.6511H4.53687L7.19402 10.3492H9.5596L8.46621 14.1763H12.3192L13.4126 10.3492H15.7784L13.1206 19.6511H10.7554ZM25.2527 15.0002C24.4668 17.7507 21.8773 19.6511 18.8876 19.6511H14.9812L16.7368 13.5055H19.1017L17.8855 17.7637H19.5729C21.0214 17.7637 22.3767 16.6477 22.8435 15.0137C23.3143 13.3657 22.5474 12.2364 21.0458 12.2364H17.0989L17.6381 10.3492H21.638C24.5614 10.3492 26.0418 12.2364 25.2527 15.0002Z" fill="#172030"/>
                                                            </g>
                                                            <defs>
                                                            <clipPath >
                                                            <rect width="30" height="30" fill="white"/>
                                                            </clipPath>
                                                            </defs>
                                                            </svg>
                                                        </span>
												    <?php endif; ?>
												    <?php if(get_post_meta($videos, 'premium_video', true) == 'on') :
													    if(xbox_get_field_value('my-theme-options', 'use-premium-label') == 'off'){
														    $premium_icon = (xbox_get_field_value('my-theme-options', 'thumb-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'thumb-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
													    } else {
														    $premium_icon = (xbox_get_field_value('my-theme-options', 'dashboard-premium-label') !== false) ? xbox_get_field_value('my-theme-options', 'dashboard-premium-label') : get_template_directory_uri() . '/assets/img/star-premium.png';
													    }?><span class="premium-video" style="<?=$premium_margin?>"><img class="img-responsive svg-crown" data-src="<?php echo $premium_icon;?>" srcset="<?php echo $premium_icon;?>" src="<?php echo $premium_icon;?>" /></span>
												    <?php endif; ?>
												    <?php if(has_term('watchlater'.$user->ID, 'playlists', $videos)):?>
                                                        <span data-add="add" data-user="<?php echo $user->ID;?>" class="watchLaterIcon<?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="display:none"><i class="fa fa-check" style="font-size: 24px"></i></span>
												    <?php else: ?>
                                                        <span data-add="" data-user="<?php echo $user->ID;?>" class="watchLaterIcon<?=$favoriteLogin?>" data-post="<?php echo $videos; ?>" style="display:none"><i class="fa fa-plus" style="font-size: 24px"></i></span>
												    <?php endif;?>
                                                </div>
										    <?php endif; ?>
                                            <div class="video-debounce-bar-back">
                                                <div class="video-debounce-bar"></div>
                                            </div>
                                            <div class="rating-bar <?php if(arc_getPostLikeRate($videos) == false) : ?>no-rate<?php endif;?>">
		                                        <?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
                                                    <span><i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php if(arc_getPostLikeRate($videos) == false) : ?>0%<?php else : ?>
					                                        <?php echo arc_getPostLikeRate($videos);?><?php endif; ?></span>
		                                        <?php endif; ?>
                                            </div>
                                        </a>
                                        <header class="entry-header categoryVideoWatchLater">
                                            <p style="text-align: left; width: 100%;"><?php echo get_the_title($videos); ?></p>
                                            <p class="video_block_delimiter"></p>
                                            <p class="rating-bar">
			                                    <?php if(xbox_get_field_value( 'my-theme-options', 'enable_view' ) == 'on') : ?><span class="views">
				                                    <?php echo arc_getPostViews($videos); ?> <span class="viewers">views</span></span><?php endif; ?>
			                                    <?php if( xbox_get_field_value( 'my-theme-options', 'enable_rating' ) == 'on' ) : ?>
                                                    <span><i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php if(arc_getPostLikeRate($videos) == false) : ?>0%<?php else : ?>
						                                    <?php echo arc_getPostLikeRate($videos);?><?php endif; ?></span>
			                                    <?php endif; ?>
                                            </p>
                                        </header>
                                    </article>
							    <?php }
						    }
					    }?>
                        <div class="clear"></div>
                        <div class="separator-pagination"></div>
                    </div>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        //var true_posts = <?php //echo serialize($wp_query->query_vars); ?>';
                        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                    </script>
            <?php endif; ?>
			<?php
			if (!isset($_GET['search_filter']) && empty($_GET['search_filter'])) {
				arc_page_navi();
			}
			$result = search_for_similar_phrases();
            if(count($result) > 2) {
                ?>
                <h2 class="widget-title" id="searches_related"><?php echo esc_html__('Searches Related to ', 'arc') . '"' . get_search_query() . '"';?></h2>
                <?php
                echo '<ul class="ul_related">';
                $i = 0;
                shuffle($result);
                foreach ($result as $res) {
                    if($i >= 15) break;
                    else {
                        echo '<li class="related_item"><a href="/?s='.str_replace(' ', '+', $res).'&search-type=normal">'. $res. '</a>';
                        $i++;
                    }
                }
                echo '</ul>';
                }
			} else { ?>
				<h1 class="widget-title"><?php echo esc_html__( 'Nothing found', 'arc' ); ?></h1>
				<p><?php echo esc_html__( 'It looks like nothing was found for this search.', 'arc' ); ?></p>
				<?php $result = search_for_similar_phrases();
                    if(count($result) > 2) {
                        ?>
                        <h2 class="widget-title"><?php echo esc_html__('Searches Related to ', 'arc') . '"' . get_search_query() . '"';?></h2>
                        <?php
                        echo '<ul class="ul_related">';
                        $i = 0;
                        shuffle($result);
                        foreach ($result as $res) {
                            if($i >= 15) break;
                            else {
                                echo '<li class="related_item"><a href="?s='.str_replace(' ', '+', $res).'&search-type=normal">'. $res. '</a>';
                                $i++;
                            }
                        }
                        echo '</ul>';
                    } ?>
				<div class="notfound-videos">
					<h2 class="widget-title"><?php echo esc_html__('Random videos', 'arc'); ?></h2>
					<div class="videos-list">
						<?php $args = array( 'numberposts' => xbox_get_field_value( 'my-theme-options', 'number_videos_per_page' ), 'orderby' => 'rand' );
						$rand_posts = get_posts( $args );
						foreach( $rand_posts as $post ) {
							get_template_part( 'template-parts/loop', 'video' );
						} ?>
					</div>
				</div>
			<?php } ?>
            <?php
            /*****smart search*****/
            function search_for_similar_phrases(){
	            $prepositions_and_alliances = [
		            'at', 'in', 'to', 'a', 'the', 'by', 'for', 'from', 'with', 'as', 'near', 'under', 'us', 'among', 'far', 'up', 'down', 'me', 'my', 'and', 'but', 'if', 'or', 'both'
	            ];
	            if(is_search()){
		            $search_query_string = get_search_query();
		            if(preg_match("/^[а-я]+/i", $search_query_string) == 1 && preg_match("/^[а-я]+/i", $search_query_string) !== false){
			            $search_query_array = explode(' ', $search_query_string);


			            mb_regex_encoding('UTF-8');
			            mb_internal_encoding("UTF-8");
			            foreach($search_query_array as $k=>$v){
				            $letter_array[] = preg_split('/(?<!^)(?!$)/u', $v);
			            }


			            $word_root_array = [];
			            foreach($letter_array as $v){
				            $i = 1;
				            if(empty($v))      continue;
				            if(count($v) <= 3) continue;
				            $root = count($v) / 3;
				            $root = ceil($root * 2);
				            if(count($v) > 12){
					            $root = $root - 4;
				            }elseif(count($v) >= 10 && count($v) <= 12){
					            $root = $root - 3;
				            }elseif(count($v) >= 8 && count($v) <= 10){
					            $root = $root - 2;
				            }

				            foreach($v as $value){
					            if($i > $root) break;
					            $string .= $value;
					            $i++;
				            }
				            $word_root_array[] = $string;
				            unset($string);
			            }


			            global $wpdb;
			            $table = $wpdb->prefix . 'smart_search';
			            $phrase_array = $wpdb->get_col( "SELECT `phrase` FROM $table" );
			            $array_similar_phrase = [];
			            foreach($phrase_array as $one_phrase_from_all){
				            foreach($word_root_array as $one_word_from_query){
					            if(strpos($one_phrase_from_all, $one_word_from_query) !== false){
						            if(array_search($one_phrase_from_all, $array_similar_phrase) === false){
							            $array_similar_phrase[] = $one_phrase_from_all;
						            }
					            }
				            }
			            }
		            }elseif(preg_match("/^[a-z]+/i", $search_query_string) == 1 && preg_match("/^[a-z]+/i", $search_query_string) !== false){
			            $search_query_array = explode(' ', $search_query_string);


			            foreach($search_query_array as $v){
				            $letter_array[] = str_split($v);
			            }


			            $word_root_array = [];
			            foreach($letter_array as $v){
				            $i = 1;
				            if(empty($v))      continue;
				            if(count($v) <= 2) continue;
				            if(count($v) == 3 &&  count($v) <= 4){
					            $root = count($v);
					            foreach($v as $value){
						            if($i > $root) break;
						            $string .= $value;
						            $i++;
					            }
					            $word_root_array[] = $string;
					            unset($string);
				            }else{
					            $root = count($v) / 3;
					            $root = ceil($root * 2);
					            if(count($v) > 12){
						            $root = $root - 4;
					            }elseif(count($v) >= 10 && count($v) <= 12){
						            $root = $root - 2;
					            }elseif(count($v) >= 8 && count($v) <= 10){
						            $root = $root - 1;
					            }
					            foreach($v as $value){
						            if($i > $root) break;
						            $string .= $value;
						            $i++;
					            }
					            $word_root_array[] = $string;
					            unset($string);
				            }
			            }


			            global $wpdb;
			            $table = $wpdb->prefix . 'smart_search';
			            $phrase_array = $wpdb->get_col( "SELECT `phrase` FROM $table" );
			            $res = [];
			            $array_similar_phrase = [];
			            foreach($phrase_array as $one_phrase_from_all){
				            foreach($word_root_array as $one_word_from_query){
					            if(strpos($one_phrase_from_all, $one_word_from_query) !== false){
						            if(array_search($one_phrase_from_all, $array_similar_phrase) === false){
							            $array_similar_phrase[] = $one_phrase_from_all;
						            }
					            }
				            }
			            }
		            }
	            }
	            return $array_similar_phrase;
            }?>
			<div class="clear"></div>
			<?php
			if( get_theme_mod( 'title_desc_search_pos' ) == 'bottom') {?>
            <div class="customizer_content" style="margin-bottom: 0 !important;">
				<?php
                if ( get_theme_mod( 'seo_search_title' ) !== '' ) : ?>
					<?php echo get_theme_mod( 'seo_search_title' ); ?>
				<?php endif;?>
					<?php if(get_theme_mod('seo_search_text')) { echo get_theme_mod('seo_search_text'); } ?>
            </div>
			<?php } ?>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                //var true_posts = <?php //echo serialize($wp_query->query_vars); ?>';
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
            </script>
		</main>
	</section>
<?php
if( xbox_get_field_value( 'my-theme-options', 'show-sidebar-on-search-page' ) == 'on') {
	get_sidebar();
}
get_footer();