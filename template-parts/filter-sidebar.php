<?php
if ('right' === xbox_get_field_value('my-theme-options', 'sidebar-settings')) {
	$sidebar_pos = 'with-sidebar-right';
} else {
	$sidebar_pos = 'with-sidebar-left';
}?>
<aside id="sidebar" class="widget-area <?php echo $sidebar_pos; ?> porn_videos_sidebar" role="complementary" style="margin-top: -1.2em;">
	<section id="widget_filter_video" class="widget widget_filter_video">
		<h2 class="widget-title advanced-filter-sidebar">Advanced filter
        <span class="collapse-all-tabs">collapse all tabs</span></h2>
		<div id="filter_porn_videos_area">
			<script>
                jQuery(document).ready(function($) {
                    /*$("#duration").val(0 + "-" + 120);*/
                    $("#slider-range").slider({
                        range: true,
                        min: 0,
                        max: 120,
                        //values: [0, 120],
                        slide: function (event, ui) {
                            $("#duration").val(ui.values[0] + "-" + ui.values[1]);
                            $("span.duration-video-span").html('minutes');

                        }
                    });
                    $('div#filter_porn_videos_area div.form-display_name input[type=radio], ' +
                        'div#filter_porn_videos_area ul#cat_list li input[type=radio]').checkboxradio();
                    var collapse_flag = true;
                    $(document).on('click', 'span.collapse-all-tabs',function() {
                        if(true === collapse_flag) {
                            $('div#filter_porn_videos_area div.form-display_name, div#filter_porn_videos_area ul#cat_list').slideUp(200);
                            $('div#filter_porn_videos_area legend span.collapse-legend svg').remove();
                            $('div#filter_porn_videos_area legend span.collapse-legend').append('<svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                                '<path d="M6.83927 5.68659C6.64771 5.86356 6.35229 5.86355 6.16072 5.68659L0.943664 0.867275C0.609395 0.55849 0.827875 -1.15154e-06 1.28294 -1.11176e-06L11.7171 -1.99581e-07C12.1721 -1.59798e-07 12.3906 0.558491 12.0563 0.867276L6.83927 5.68659Z" fill="white"/>' +
                                '</svg>');
                            $('fieldset.fieldset').css('margin-bottom', '-25px !important');
                            collapse_flag = false;
                            $('#filter_porn_videos_area fieldset.fieldset legend').addClass('collapsed');
                            $('span.collapse-all-tabs').text('show all tabs');
                        } else {
                            $('fieldset.fieldset').css('margin-bottom', '10px !important');
                            $('div#filter_porn_videos_area div#hd_status, ' +
                                'div#filter_porn_videos_area div#video_production,' +
                                'div#filter_porn_videos_area div#video_orientation').slideDown(200, function() {
                                <?php if(wp_is_mobile()): ?>
                                $(this).css('display', 'flex');
                                <?php else:?>
                                $(this).css('display', 'block');
                                <?php endif;?>
                                $(this).css('flex-wrap', 'wrap');
                            });
                            $('div#filter_porn_videos_area ul#cat_list,' +
                                'div#filter_porn_videos_area div.slidecontainer,' +
                                'div#filter_porn_videos_area  div#tattos_piersing_hair').slideDown(200);
                            $('div#filter_porn_videos_area legend span.collapse-legend svg').remove();
                            $('div#filter_porn_videos_area legend span.collapse-legend').append('<svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                                '<path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"/>' +
                                '</svg>');
                            $('#filter_porn_videos_area fieldset.fieldset legend').removeClass('collapsed');
                            collapse_flag = true;
                            $('span.collapse-all-tabs').text('collapse all tabs');
                        }
                    });

                    $(document).on('click', '#filter_porn_videos_area fieldset.fieldset legend', function () {
                        if(!$(this).hasClass('collapsed')) {
                            $(this).find('span.collapse-legend svg').remove();
                            $(this).find('span.collapse-legend').append('<svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                                '<path d="M6.83927 5.68659C6.64771 5.86356 6.35229 5.86355 6.16072 5.68659L0.943664 0.867275C0.609395 0.55849 0.827875 -1.15154e-06 1.28294 -1.11176e-06L11.7171 -1.99581e-07C12.1721 -1.59798e-07 12.3906 0.558491 12.0563 0.867276L6.83927 5.68659Z" fill="white"/>' +
                                '</svg>');
                            $(this).parent('fieldset.fieldset').find('div.form-display_name, ul#cat_list').slideUp(200, function() {
                                $(this).attr("style='display:none !important'");
                            });
                            $(this).addClass('collapsed');
                        } else {
                            $(this).find('span.collapse-legend svg').remove();
                            $(this).find('span.collapse-legend').append('<svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                                '<path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"/>' +
                                '</svg>');
                            var legend_id = $(this).parent('fieldset.fieldset').find('div.form-display_name').attr('id');
                            if(legend_id == 'hd_status') {
                                $(this).parent('fieldset.fieldset').find('div#hd_status').slideDown(200, function() {
	                                <?php if(wp_is_mobile()): ?>
                                    $(this).css('display', 'flex');
	                                <?php else:?>
                                    $(this).css('display', 'block');
	                                <?php endif;?>
                                    $(this).css('flex-wrap', 'wrap');
                                });
                            } else if(legend_id == 'video_production') {
                                $(this).parent('fieldset.fieldset').find('div#video_production').slideDown(200, function() {
	                                <?php if(wp_is_mobile()): ?>
                                    $(this).css('display', 'flex');
	                                <?php else:?>
                                    $(this).css('display', 'block');
	                                <?php endif;?>
                                    $(this).css('flex-wrap', 'wrap');
                                });
                            } else if(legend_id == 'video_orientation') {
                                $(this).parent('fieldset.fieldset').find('div#video_orientation').slideDown(200, function() {
	                                <?php if(wp_is_mobile()): ?>
                                    $(this).css('display', 'flex');
	                                <?php else:?>
                                    $(this).css('display', 'block');
	                                <?php endif;?>
                                    $(this).css('flex-wrap', 'wrap');
                                });
                            } else {
                                $(this).parent('fieldset.fieldset').find('div.form-display_name, ul#cat_list').slideDown(200);
                                /*var legend_id = $(this).parent('fieldset.fieldset').find('ul#cat_list').attr('id');
                                $(this).parent('fieldset.fieldset').find('div#filter_porn_videos_area ul#cat_list,' +
                                    'div#filter_porn_videos_area div.slidecontainer,' +
                                    'div#filter_porn_videos_area  div#tattos_piersing_hair').slideDown(200);*/
                            }
                            $(this).removeClass('collapsed');
                        }
                    });
                });
			</script>
			<form method="get" action="<?=site_url('/videos/');?>">
                <?php
                if(isset($_GET)) {
                    $i = 0;
	                $qw_center = '';
	                $qw_end = '';
                    foreach ($_GET as $key => $val) {
                        if($i == 0) {
                            $qw_begin = '?' . $key . '=' . $val . '&';
                        } else {
                            if($i >= count($_GET)) {
	                            $qw_end = $key . '=' . $val;
                            } else {
	                            $qw_center .= $key . '=' . $val . '&';
                            }
                        }
                        $i++;
                        $qw_str = $qw_begin . $qw_center . $qw_end;
                    }
                } else $qw_str = '';
                ?>
                <input type="hidden" value="<?=site_url('/videos/').$qw_str;?>">
				<fieldset class="fieldset">
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
                        fieldset.fieldset {
                            padding-right: .6em;
                        }
					</style>
					<legend><?php echo esc_html__( 'Videos', 'arc' ); ?>
                        <span class="collapse-legend">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"/>
                        </svg>
                        </span>
                    </legend>
					<div class="form-display_name col-1-form" id="hd_status">
						<?php
						if(empty($_GET['adv_filter']) || !isset($_GET['adv_filter'])):?>
							<input type="radio" name="adv_filter" value="all_videos" id="all_hd" checked/>
							<label for="all_hd"> <?php echo __('All videos', 'arc');?></label><br>
							<input type="radio" name="adv_filter" value="hd_video" id="hd_video" />
							<label for="hd_video"> <?php echo __('HD videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="premium" class="hd_status" id="premium_video" />
                            <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="featured" class="hd_status" id="featured_video" />
                            <label for="featured_video"> <?php echo __('Recommended videos', 'arc');?></label>
						<?php
						elseif(!empty($_GET['adv_filter']) && $_GET['adv_filter'] == 'all_videos'):?>
							<input type="radio" name="adv_filter" value="all_videos" class="hd_status" id="all_hd" checked/>
							<label for="all_hd"> <?php echo __('All videos', 'arc');?></label><br>
							<input type="radio" name="adv_filter" value="hd_video" class="hd_status" id="hd_video" />
							<label for="hd_video"> <?php echo __('HD videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="premium" class="hd_status" id="premium_video" />
                            <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="featured" class="hd_status" id="featured_video" />
                            <label for="featured_video"> <?php echo __('Recommended videos', 'arc');?></label>
						<?php elseif($_GET['adv_filter'] == 'hd_video'):?>
							<input type="radio" name="adv_filter" value="all_videos" class="hd_status" id="all_hd" />
							<label for="all_hd"> <?php echo __('All videos', 'arc');?></label><br>
							<input type="radio" name="adv_filter" value="hd_video" class="hd_status" id="hd_video" checked/>
							<label for="hd_video"> <?php echo __('HD videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="premium" class="hd_status" id="premium_video" />
                            <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="featured" class="hd_status" id="featured_video" />
                            <label for="featured_video"> <?php echo __('Recommended videos', 'arc');?></label>
						<?php elseif($_GET['adv_filter'] == 'premium'):?>
                            <input type="radio" name="adv_filter" value="all_videos" class="hd_status" id="all_hd" />
                            <label for="all_hd"> <?php echo __('All videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="hd_video" class="hd_status" id="hd_video" />
                            <label for="hd_video"> <?php echo __('HD videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="premium" class="hd_status" id="premium_video" checked/>
                            <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="featured" class="hd_status" id="featured_video" />
                            <label for="featured_video"> <?php echo __('Recommended videos', 'arc');?></label>
						<?php elseif($_GET['adv_filter'] == 'featured'):?>
                            <input type="radio" name="adv_filter" value="all_videos" class="hd_status" id="all_hd" />
                            <label for="all_hd"> <?php echo __('All videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="hd_video" class="hd_status" id="hd_video" />
                            <label for="hd_video"> <?php echo __('HD videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="premium" class="hd_status" id="premium_video" />
                            <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="featured" class="hd_status" id="featured_video" checked/>
                            <label for="featured_video"> <?php echo __('Recommended videos', 'arc');?></label>
						<?php else:?>
							<input type="radio" name="adv_filter" value="all_videos" class="hd_status" id="all_hd" checked/>
							<label for="all_hd"> <?php echo __('All videos', 'arc');?></label><br>
							<input type="radio" name="adv_filter" value="hd_video" class="hd_status" id="hd_video" />
							<label for="hd_video"> <?php echo __('HD videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="premium" class="hd_status" id="premium_video" />
                            <label for="premium_video"> <?php echo __('Premium videos', 'arc');?></label><br>
                            <input type="radio" name="adv_filter" value="featured" class="hd_status" id="featured_video" />
                            <label for="featured_video"> <?php echo __('Recommended videos', 'arc');?></label>
						<?php endif;?>
					</div>
				</fieldset>
				<fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;">
					<legend><?php echo esc_html__( 'Production', 'arc' ); ?>
                        <span class="collapse-legend">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"/>
                        </svg>
                        </span>
                    </legend>
					<div class="form-display_name col-1-form" id="video_production">
						<?php
						if(!empty($_GET['production']) && $_GET['production'] == 'professional'):?>
							<input type="radio" name="production" value="professional" class="production" id="professional" checked />
							<label for="professional"> <?php echo __('Professional', 'arc');?></label><br>
							<input type="radio" name="production" value="homemade" class="production" id="homemade"/>
							<label for="homemade"> <?php echo __('Homemade', 'arc');?></label>
						<?php elseif($_GET['production'] == 'homemade'):?>
							<input type="radio" name="production" value="professional" class="production" id="professional" />
							<label for="professional"> <?php echo __('Professional', 'arc');?></label><br>
							<input type="radio" name="production" value="homemade" class="production" id="homemade" checked/>
							<label for="homemade"> <?php echo __('Homemade', 'arc');?></label>
						<?php else:?>
							<input type="radio" name="production" value="professional" class="production" id="professional" />
							<label for="professional"> <?php echo __('Professional', 'arc');?></label><br>
							<input type="radio" name="production" value="homemade" class="production" id="homemade"/>
							<label for="homemade"> <?php echo __('Homemade', 'arc');?></label>
						<?php endif;?>
					</div>
				</fieldset>
				<fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;">
					<legend><?php echo esc_html__( 'Duration', 'arc' ); ?>
                        <span class="collapse-legend">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"/>
                        </svg>
                        </span>
                    </legend>
					<?php if(!empty($_GET['duration'])):?>
                        <script>
                            jQuery(document).ready(function($){
                                var location_search = location.search;
                                var get_dur = location_search.split('duration=')[1].split('&bust=')[0];
                                var get_min_dur = parseInt(get_dur.split('-')[0]);
                                var get_max_dur = parseInt(get_dur.split('-')[1]);
                                $("#slider-range").slider({
                                    values: [get_min_dur, get_max_dur]
                                });
                            });
                        </script>
					<?php else:?>
                        <script>
                            jQuery(document).ready(function($){
                                $("#slider-range").slider({ values: [0, 120]});
                            });
                        </script>
					<?php endif; ?>
					<style>
                        .slidecontainer {
                            width: 90%;
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
					</style>
					<div class="form-display_name col-1-form slidecontainer">
						<p style="margin-top: 0">
							<label for="duration">Video duration:</label>
							<input type="text" name="duration" id="duration" value="<?php echo $_GET['duration'];?>" readonly style="background: transparent !important;
							border: none!important;
							width: 20%;
							margin-left: 0;
							padding: 0 !important;
							border:0;
                            text-align: center;">
                            <span class="duration-video-span"><?=(!empty($_GET['duration'])) ? 'minutes' : '';?></span>
                        </p>
						<div id="slider-range"></div>
					</div>
				</fieldset>
				<fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;">
					<legend><?php echo esc_html__( 'Orientation', 'arc' ); ?>
                        <span class="collapse-legend">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"/>
                        </svg>
                        </span>
                    </legend>
					<div class="form-display_name col-1-form" id="video_orientation">
						<?php
						if(empty($_GET['video_orientation']) || !isset($_GET['video_orientation'])):?>
							<input type="radio" name="video_orientation" value="straight" class="production" id="straight"/>
							<label for="straight"> <?php echo __('Straight', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="gay" class="production" id="gay" />
							<label for="gay"> <?php echo __('Gay', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="bi" class="production" id="bi"/>
							<label for="bi"> <?php echo __('Bi', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="trans" class="production" id="trans"/>
							<label for="trans"> <?php echo __('Trans', 'arc');?></label>
						<?php
						elseif($_GET['video_orientation'] == 'straight'):?>
							<input type="radio" name="video_orientation" value="straight" class="production" id="straight" checked/>
							<label for="straight"> <?php echo __('Straight', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="gay" class="production" id="gay" />
							<label for="gay"> <?php echo __('Gay', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="bi" class="production" id="bi"/>
							<label for="bi"> <?php echo __('Bi', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="trans" class="production" id="trans"/>
							<label for="trans"> <?php echo __('Trans', 'arc');?></label>
						<?php elseif($_GET['video_orientation'] == 'gay'):?>
							<input type="radio" name="video_orientation" value="straight" class="production" id="straight"/>
							<label for="straight"> <?php echo __('Straight', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="gay" class="production" id="gay" checked/>
							<label for="gay"> <?php echo __('Gay', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="bi" class="production" id="bi"/>
							<label for="bi"> <?php echo __('Bi', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="trans" class="production" id="trans"/>
							<label for="trans"><?php echo __('Trans', 'arc');?></label>
						<?php elseif($_GET['video_orientation'] == 'bi'):?>
							<input type="radio" name="video_orientation" value="straight" class="production" id="straight"/>
							<label for="straight"> <?php echo __('Straight', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="gay" class="production" id="gay" />
							<label for="gay"> <?php echo __('Gay', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="bi" class="production" id="bi" checked/>
							<label for="bi"> <?php echo __('Bi', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="trans" class="production" id="trans"/>
							<label for="trans"> <?php echo __('Trans', 'arc');?></label>
						<?php elseif($_GET['video_orientation'] == 'trans'):?>
							<input type="radio" name="video_orientation" value="straight" class="production" id="straight"/>
							<label for="straight"> <?php echo __('Straight', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="gay" class="production" id="gay" />
							<label for="gay"> <?php echo __('Gay', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="bi" class="production" id="bi" />
							<label for="bi"> <?php echo __('Bi', 'arc');?></label><br>
							<input type="radio" name="video_orientation" value="trans" class="production" id="trans" checked/>
							<label for="trans"> <?php echo __('Trans', 'arc');?></label>
						<?php endif;?>
					</div>
				</fieldset>
				<fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;">
					<legend><?php echo esc_html__( 'Other filters', 'arc' ); ?>
                        <span class="collapse-legend">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"/>
                        </svg>
                        </span>
                    </legend>
					<div class="form-display_name col-1-form" id="tattos_piersing_hair">
                        <label for="porn_tattoo"> <?php echo __('Tattoos', 'arc');?></label>
						<select name="tattoo" id="porn_tattoo" style="width: 100%;"><br>
							<option disabled selected><?php echo __('Has tattoos', 'arc'); ?></option>
							<option <?php selected($_GET['tattoo'], __('Yes', 'arc')); ?>><?php echo __('Yes', 'arc'); ?></option>
							<option <?php selected($_GET['tattoo'], __('No', 'arc')); ?>><?php echo __('No', 'arc'); ?></option>
						</select>
                        <label for="porn_piercing"> <?php echo __('Piercings', 'arc');?></label>
						<select name="piercing" id="porn_piercing" style="width: 100%;"><br>
							<option selected disabled><?php echo __('Has piercings', 'arc'); ?></option>
							<option <?php selected($_GET['piercing'], __('Yes', 'arc')); ?>><?php echo __('Yes', 'arc'); ?></option>
							<option <?php selected($_GET['piercing'], __('No', 'arc')); ?>><?php echo __('No', 'arc'); ?></option>
						</select>
                        <label for="porn_hair_color"> <?php echo __('Hair color', 'arc');?></label>
                        <select name="hair_color" id="porn_hair_color" style="width: 100%;"><br>
                            <option selected disabled><?php echo __('Choose hair color', 'arc'); ?></option>
                            <option <?php selected($_GET['hair_color'], __('Blonde', 'arc')); ?>><?php echo __('Blonde', 'arc'); ?></option>
                            <option <?php selected($_GET['hair_color'], __('Brown', 'arc')); ?>><?php echo __('Brown', 'arc'); ?></option>
                            <option <?php selected($_GET['hair_color'], __('Red', 'arc')); ?>><?php echo __('Red', 'arc'); ?></option>
                            <option <?php selected($_GET['hair_color'], __('Black', 'arc')); ?>><?php echo __('Black', 'arc'); ?></option>
                            <option <?php selected($_GET['hair_color'], __('Hairless', 'arc')); ?>><?php echo __('Hairless', 'arc'); ?></option>
                            <option <?php selected($_GET['hair_color'], __('Other', 'arc')); ?>><?php echo __('Other', 'arc'); ?></option>
                        </select>
                        <label for="porn_ethnicity"> <?php echo __('Ethnicity', 'arc');?></label>
                        <select name="ethnicity" id="porn_ethnicity" style="width: 100%;"><br>
                            <option selected disabled><?php echo __('Choose ethnicity', 'arc'); ?></option>
                            <option <?php selected($_GET['ethnicity'], __('Asian', 'arc')); ?>><?php echo __('Asian', 'arc'); ?></option>
                            <option <?php selected($_GET['ethnicity'], __('Ebony', 'arc')); ?>><?php echo __('Ebony', 'arc'); ?></option>
                            <option <?php selected($_GET['ethnicity'], __('Indian', 'arc')); ?>><?php echo __('Indian', 'arc'); ?></option>
                            <option <?php selected($_GET['ethnicity'], __('Latino', 'arc')); ?>><?php echo __('Latino', 'arc'); ?></option>
                            <option <?php selected($_GET['ethnicity'], __('Middle Eastern', 'arc')); ?>><?php echo __('Middle Eastern', 'arc'); ?></option>
                            <option <?php selected($_GET['ethnicity'], __('Mixed', 'arc')); ?>><?php echo __('Mixed', 'arc'); ?></option>
                            <option <?php selected($_GET['ethnicity'], __('White', 'arc')); ?>><?php echo __('White', 'arc'); ?></option>
                        </select>
                        <label for="porn_bust"> <?php echo __('Bust size', 'arc');?></label>
                        <input style="width: 100%;" id="porn_bust" type="text" name="bust" placeholder="<?php echo __('Bust size A-K', 'arc');?>" value="<?php if(isset($_GET['bust'])) echo $_GET['bust'];?>" />
					</div>
				</fieldset>
				<fieldset class="fieldset" style="margin-left: .2em; padding-left: 1em;margin-bottom: 0px !important;">
					<legend><?php echo esc_html__( 'Categories', 'arc' ); ?>
                        <span class="collapse-legend">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"/>
                        </svg>
                        </span>
                    </legend>
					<style>
						ul#cat_list {
                            list-style: none;
						}
						ul#cat_list li span.li-count {
                            float: right;
                            display: inline;
                            font-family: Roboto;
                            font-style: normal;
                            font-weight: normal;
                            font-size: 14px;
                            line-height: 16px;
						}
                        aside ul#cat_list li:hover {
                            background-color: transparent !important;
                        }
                        aside ul#cat_list li:hover a{
                            color: <?php echo get_theme_mod( 'btn_color_setting'); ?>!important;
                        }
					</style>
					<ul id="cat_list">
					<?php
					$categories = get_categories( [
						'taxonomy'     => 'category',
						'type'         => 'post',
						'orderby'      => 'name',
						'order'        => 'ASC',
						'hide_empty'   => 1,
						'number'       => 0,
						'pad_counts'   => false,
					] );

					if($categories){
						foreach( $categories as $cat ){ ?>
							<li>
                                <input type="radio" name="cat_video" id="<?=str_replace(' ', '-',$cat->name);?>" value="<?=$cat->term_id?>" <?php if ($cat->term_id == $_GET['cat_video']) echo "checked='checked'";?>/>
                                <label for="<?=str_replace(' ', '-',$cat->name);?>"><?=$cat->name;?></label>
                                <span class="li-count"><?=$cat->count?></span>
                            </li>
						<?php
						}
					}
					?>
					</ul>
				</fieldset>
                <fieldset class="fieldset">
				<div class="filter-btns-videos" style="text-align: center">
					<input type="submit" value="<?php echo __('Search videos', 'arc');?>">
					<input type="button" id="clear_user_filter" value="<?php echo __('Clear filter', 'arc');?>" onclick="window.location.href = '<?php echo site_url('/').'videos/'; ?>'">
				</div>
                </fieldset>
			</form>
		</div>
	</section>
</aside>