<?php
/**
Template Name:FAQ
 **/
get_header();
	$sidebar_pos = '';
 ?>
	<div id="primary" class="content-area <?php echo $sidebar_pos; ?>">
		<main id="main" class="site-main <?php echo $sidebar_pos; ?>" role="main">
            <header class="page-header">
				<?php the_title( '<h1 class="widget-title" style="text-align: center">', '</h1>' ); ?>
            </header>
            <div class="videos-list" style="margin-right: 0px; margin-left: 0px">
                <style>
                    .tab input.accordion_input, .tab-content {
                        display: none;
                    }
                    .tab {
                        margin-bottom: 10px;
                        letter-spacing: 1px;
                    }
                    .tab-title {
                        padding: 10px;
                        display: block;
                        cursor: pointer;
                    }
                    .tab-title::after {
                        content: url('data:image/svg+xml; utf-8,<svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.83927 5.68659C6.6477 5.86356 6.35229 5.86355 6.16072 5.68659L0.943663 0.867276C0.609394 0.558491 0.827874 -1.9787e-07 1.28294 -1.58086e-07L11.7171 7.54093e-07C12.1721 7.93877e-07 12.3906 0.558493 12.0563 0.867277L6.83927 5.68659Z" fill="<?=str_replace('#','%23', get_theme_mod('secondary_text_site_color'));?>" /></svg>');
                        opacity: 0.5;
                        float: right;
                    }
                    .tab-content {
                        padding: 10px 20px;
                    }
                    .tab :checked + .tab-title::after {
                        opacity: 1;
                        content: url('data:image/svg+xml; utf-8,<svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.83927 1.11858C6.6477 0.94162 6.35229 0.941621 6.16072 1.11859L0.943663 5.9379C0.609394 6.24668 0.827874 6.80518 1.28294 6.80518L11.7171 6.80518C12.1721 6.80517 12.3906 6.24668 12.0563 5.9379L6.83927 1.11858Z" fill="<?=str_replace('#','%23', get_theme_mod('text_site_color'));?>"/></svg>');
                    }
                    .tab :checked ~ .tab-content {
                        display: block;
                    }
                </style>
                <!--<div class="accordeon">
					<?php
/*                    $faqs = get_option('faqs_questions');
                    if($faqs):
                        foreach ($faqs as $q => $ans):
                            $ans_explode = explode('MY_SEP_BETWEEN', $ans);
                            */?>
                        <div class="tab">
                            <input class="accordion_input" type="checkbox" value="<?/*=$q;*/?>" name="btn" id="btn-<?/*=$q;*/?>">
                            <label for="btn-<?/*=$q; */?>" class="tab-title"><?/*=$ans_explode[0]*/?></label>
                            <section class="tab-content">
	                            <?/*=$ans_explode[1]*/?>
                            </section>
						</div>
					<?php
/*					endforeach; endif;*/?>
                </div>-->

                <div class="accordeon">
                    <?php
                    $faqs = get_option('faqs_test');
                    if($faqs):
                        echo '<h2 class="faqs_title"> General</h2>';
                        foreach ($faqs as $q => $ans):
	                        $item = explode('faq_item_',$q)[1];
	                        $qroup = (explode('~SEP_GROUP_TYPE~', $ans)[1] == 'undefined') ? 'General' : explode('~SEP_GROUP_TYPE~', $ans)[1];
                            if($qroup != 'General') continue;
                            else {
	                            $qw = stripcslashes(explode('~SEP_BITWEEN_Q~', $ans)[0]);
	                            $answ = stripcslashes(explode('~SEP_GROUP_TYPE~',explode('~SEP_BITWEEN_Q~', $ans)[1])[0]);
                            }
                        ?>
                        <div class="tab">
                            <input class="accordion_input" type="checkbox" value="<?= $item;?>" name="btn" id="btn-<?= $item;?>">
                            <label for="btn-<?= $item; ?>" class="tab-title"><?=$qw?></label>
                            <section class="tab-content">
						       <?=$answ?>
                            </section>
                        </div>
			            <?php
			            endforeach; endif;?>
                </div>

                <div class="accordeon">
		            <?php
		            $faqs = get_option('faqs_test');
		            if($faqs):
			            echo '<h2 class="faqs_title"> Abuses</h2>';
			            foreach ($faqs as $q => $ans):
				            $item = explode('faq_item_',$q)[1];
				            $qroup = (explode('~SEP_GROUP_TYPE~', $ans)[1] == 'undefined') ? 'General' : explode('~SEP_GROUP_TYPE~', $ans)[1];
				            if($qroup != 'Abuses') continue;
				            else {
					            $qw = stripcslashes(explode('~SEP_BITWEEN_Q~', $ans)[0]);
					            $answ = stripcslashes(explode('~SEP_GROUP_TYPE~',explode('~SEP_BITWEEN_Q~', $ans)[1])[0]);
				            }
				            ?>
                            <div class="tab">
                                <input class="accordion_input" type="checkbox" value="<?= $item;?>" name="btn" id="btn-<?= $item;?>">
                                <label for="btn-<?= $item; ?>" class="tab-title"><?=$qw?></label>
                                <section class="tab-content">
						            <?=$answ?>
                                </section>
                            </div>
			            <?php
			            endforeach; endif;?>
                </div>

                <div class="accordeon">
		            <?php
		            $faqs = get_option('faqs_test');
		            if($faqs):
			            echo '<h2 class="faqs_title"> Uploads</h2>';
			            foreach ($faqs as $q => $ans):
				            $item = explode('faq_item_',$q)[1];
				            $qroup = (explode('~SEP_GROUP_TYPE~', $ans)[1] == 'undefined') ? 'General' : explode('~SEP_GROUP_TYPE~', $ans)[1];
				            if($qroup != 'Uploads') continue;
				            else {
					            $qw = stripcslashes(explode('~SEP_BITWEEN_Q~', $ans)[0]);
					            $answ = stripcslashes(explode('~SEP_GROUP_TYPE~',explode('~SEP_BITWEEN_Q~', $ans)[1])[0]);
				            }
				            ?>
                            <div class="tab">
                                <input class="accordion_input" type="checkbox" value="<?= $item;?>" name="btn" id="btn-<?= $item;?>">
                                <label for="btn-<?= $item; ?>" class="tab-title"><?=$qw?></label>
                                <section class="tab-content">
						            <?=$answ?>
                                </section>
                            </div>
			            <?php
			            endforeach; endif;?>
                </div>

                <div class="accordeon">
		            <?php
		            $faqs = get_option('faqs_test');
		            if($faqs):
			            echo '<h2 class="faqs_title"> Technical</h2>';
			            foreach ($faqs as $q => $ans):
				            $item = explode('faq_item_',$q)[1];
				            $qroup = (explode('~SEP_GROUP_TYPE~', $ans)[1] == 'undefined') ? 'General' : explode('~SEP_GROUP_TYPE~', $ans)[1];
				            if($qroup != 'Technical') continue;
				            else {
					            $qw = stripcslashes(explode('~SEP_BITWEEN_Q~', $ans)[0]);
					            $answ = stripcslashes(explode('~SEP_GROUP_TYPE~',explode('~SEP_BITWEEN_Q~', $ans)[1])[0]);
				            }
				            ?>
                            <div class="tab">
                                <input class="accordion_input" type="checkbox" value="<?= $item;?>" name="btn" id="btn-<?= $item;?>">
                                <label for="btn-<?= $item; ?>" class="tab-title"><?=$qw?></label>
                                <section class="tab-content">
						            <?=$answ?>
                                </section>
                            </div>
			            <?php
			            endforeach; endif;?>
                </div>
            </div>
            <div class="clear"></div>
            <script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                /*var true_posts = '<?php //echo serialize($wp_query->query_vars); ?>';*/
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
		</main>
	</div>
<?php
get_footer();