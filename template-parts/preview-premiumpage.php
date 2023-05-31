<style>
	#premiumPageModal {
		display: block;
        position: fixed;
        top: 0;
        right: 20px;
        bottom: 0;
        left: 20px;
        z-index: 99999;
        overflow: hidden;
        -webkit-overflow-scrolling: touch;
        outline: 0;
	}
</style>
<style>
    /* Links */
    a.nav-link,
    a.nav-link:focus {
        color: <?php if(get_theme_mod('premium_links_color_top') !== false) echo get_theme_mod('premium_links_color_top'); else echo '#fff';?>!important;
    }
    a.nav-link:hover {
        color: <?php if(get_theme_mod('premium_links_color_top_on_hover') !== false) echo get_theme_mod('premium_links_color_top_on_hover'); else echo '#e56f92';?> !important;
    }
    #premiumPageModal {
        display: -ms-flexbox;
        display: flex;
        background-image: url(<?php if(get_theme_mod('back_file_premium') !== false) echo wp_get_attachment_image_url(get_theme_mod('back_file_premium'), 'full'); else echo wp_get_attachment_image_url(get_option('premium_bg'), 'full')?>););
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        color: <?php if(get_theme_mod('premium_form_text_color') !== false) echo get_theme_mod('premium_form_text_color'); else echo '#000'?>!important;
        font-family: "Roboto Condensed", "Arial Narrow", "Liberation Sans Narrow", sans-serif;
        font-style: normal;
        font-size: 1.3em;
    }
    .cover-container {
        max-width: 42em;
    }
    .masthead {
        margin-bottom: 8rem;
    }
    .masthead-brand {
        margin-bottom: 0;
        margin-left: 30px;
    }
    .masthead-brand img {
        max-width: 230px;
        max-height: 100px;
        margin-top: 0px;
        margin-left: 0px;
    }
    .nav-masthead {
        margin-right: 100px;
        margin-top: 50px;
    }
    .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: <?php if(get_theme_mod('premium_links_color_top') !== false) echo get_theme_mod('premium_links_color_top'); else echo '#fff';?>!important;
        background-color: transparent;
        border-bottom: .25rem solid transparent;
    }
    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
        border-bottom-color: <?php if(get_theme_mod('premium_links_color_top_on_hover') !== false) echo get_theme_mod('premium_links_color_top_on_hover'); else echo '#e56f92';?>!important;
    }
    .nav-masthead .nav-link + .nav-link {
        margin-left: 1rem;
    }
    @media (min-width: 48em) {
        .masthead-brand {
            float: left;
        }
        .nav-masthead {
            float: right;
        }
    }
    /*
  * Cover
  */
    .cover {
        padding: 0 1.5rem;
    }
    .cover .btn-lg {
        padding: .75rem 1.25rem;
        font-weight: 700;
    }

</style>
<div id="premiumPageModal">
	<body class="text-center">
	<div class="container d-flex w-100 h-100 p-1 mx-auto flex-column" style="overflow-y: scroll">
		<header class="masthead">
			<div class="inner">
				<?php if(get_theme_mod('premium_logo_show')) { ?>
					<h3 class="masthead-brand">
						<?php if(get_theme_mod('premium_logo_file') !== false) {
							echo '<img src="'. wp_get_attachment_image_url(get_theme_mod('premium_logo_file'), 'full') .'" />';
						}
						else echo '<img src="'. wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') .'" />'?>
					</h3>
				<?php }?>
				<nav class="nav nav-masthead justify-content-center">
					<a class="nav-link" href="<?php echo wp_login_url(); ?>"><?php echo esc_html__('Login', 'arc'); ?></a>
					<a class="nav-link" href="<?php echo wp_registration_url() ?>">
						<?php echo esc_html__('Register', 'arc'); ?>
					</a>
				</nav>
			</div>
		</header>
		<style>
            main.inner {
                margin: 0px;
                padding: 0px;
                border: 0px none;
                font: inherit;
                position: relative;
                overflow: hidden;
                width: 100%;
                background: <?php if(get_theme_mod('premium_form_back_color') !== false) echo get_theme_mod('premium_form_back_color'); else echo '#fff'?> none repeat scroll 0% 0%;
                border-radius: 0.5em;
                padding: 1.25em 1.25em 0px;
                box-sizing: border-box;
                margin: 1.375rem auto 0px;
                max-width: 420px;
                margin-top: 0;
            }
            form {
                text-align: left;
            }
            form div.form-check {
                position: relative;
                box-sizing: border-box;
                cursor: pointer;
                background: <?php if(get_theme_mod('premium_back_input_color') !== false) echo get_theme_mod('premium_back_input_color'); else echo '#eaeaea'?> none repeat scroll 0% 0%;
                padding: 15px;
                border-radius: 5px;
                margin-bottom: 3px;
            }
            form div.form-check:hover {
                background: <?php if(get_theme_mod('premium_back_input_color_hover') !== false) echo get_theme_mod('premium_back_input_color_hover'); else echo '#dbdbdb'?> none repeat scroll 0% 0%;
            }
            form div.form-check input {
                margin-left: 10px;
            }
            form div.form-check label {
                margin-left: 40px;
                color: <?php if(get_theme_mod('premium_form_text_color') !== false) echo get_theme_mod('premium_form_text_color'); else echo '#000'?>!important;
            }
            form div.form-check span.price {
                float: right;
                font-weight: bold;
            }
            span#best1,
            span#best3,
            span#best6,
            span#best12{
                color: <?php if(get_theme_mod('premium_text_label_color') !== false) echo get_theme_mod('premium_text_label_color'); else echo '#fff'?>!important;
                background: <?php if(get_theme_mod('premium_back_label_color') !== false) echo get_theme_mod('premium_back_label_color'); else echo '#e34449'?> none repeat scroll 0% 0%;
                border-radius: 0.2em;
                padding: 0px 0.5em;
                margin-left: 0.5em;
                white-space: nowrap;
                text-transform: uppercase;
                font-size: 14px;
                display: none;
            }
		</style>
		<main role="main" class="inner">
			<?php if(get_theme_mod('premium_form_header') !== false) :
				echo get_theme_mod('premium_form_header');
				?>
			<?php else:?>
				<h1 style="text-align: left"><?php echo __('Choose a plan', 'arc');?></h1>
			<?php endif;?>
			<form class="form">
				<?php
				if(get_theme_mod('premium_rate_type') !== false)
					$best = get_theme_mod('premium_rate_type');
				else $best = '3';
				switch ($best) {
				case '1':?>
					<style>
                        span#best1 {
                            display: inline !important;
                        }
					</style>
					<script>
                        jQuery(document).ready(function ($){
                            $('input#radio1').attr('checked', 'checked');
                        });
					</script>
				<?php
				break;
				case '3':?>
					<style>
                        span#best3 {
                            display: inline !important;
                        }
					</style>
					<script>
                        jQuery(document).ready(function ($){
                            $('input#radio2').attr('checked', 'checked');
                        });
					</script>
				<?php
				break;
				case '6': ?>
					<style>
                        span#best6 {
                            display: inline !important;
                        }
					</style>
					<script>
                        jQuery(document).ready(function ($){
                            $('input#radio3').attr('checked', 'checked');
                        });
					</script>
				<?php
				break;
				case '12':?>
					<style>
                        span#best12 {
                            display: inline !important;
                        }
					</style>
					<script>
                        jQuery(document).ready(function ($){
                            $('input#radio4').attr('checked', 'checked');
                        });
					</script>
				<?php
				break;
				default: ?>
					<style>
                        span#best3 {
                            display: inline !important;
                        }
					</style>
					<script>
                        jQuery(document).ready(function ($){
                            $('input#radio3').attr('checked', 'checked');
                        });
					</script>
					<?php
					break;
				}
				if(get_theme_mod('premium_display_best_label') != '1') {?>
					<style>
                        span#best1,
                        span#best3,
                        span#best6,
                        span#best12 {
                            display: none !important;
                        }
					</style>
				<?php }?>
				<?php
				$arr_symbol_currency = [
					'AUD' => 'A$',
					'BRL' => 'R$',
					'CZK' => 'Kč',
					'DKK' => 'kr.',
					'HKD' => 'HK$',
					'HUF' => 'Ft',
					'MXN' => 'Mex$',
					'TWD' => 'NT$',
					'NZD' => 'NZ$',
					'NOK' => 'kr',
					'PHP' => '₱',
					'SGD' => 'S$',
					'SEK' => 'kr',
					'CHF' => '₣',
					'THB' => '฿',
					'CAD' => 'C$',
					'CNY' => '¥',
					'EUR' => '€',
					'JPY' => '¥',
					'USD' => '$',
					'RUB' => '₽',
					'UAH' => '₴',
					'GBP' => '£',
					'ILS' => '₪',
					'PLN' => 'zł',
				];
				//wp_paypal_currency_code - wp_options
				$before = 'style="display: none"';
				$after = 'style="display: none"';
				if(get_theme_mod('premium_rate_currency') !== false) {
					if(get_theme_mod('premium_rate_currency') == 'after') {
						$before = 'style="display: none"';
						$after = 'style="display: inline"';
					} else {
						$before = 'style="display: inline"';
						$after = 'style="display: none"';
					}
				}?>
				<div class="form-check" data-div="radio1">
					<input class="form-check-input" type="radio" name="premium_plan" id="radio1" value="Premium 1 month">
					<label class="form-check-label" for="radio1">
						<?php echo __('1 month', 'arc');?>
					</label>
					<span class="best_choice" id="best1"><?php echo __('best choice', 'arc');?></span>
                    <span class="price" data-price="<?php if(get_theme_mod('premium_rate1_price') !== false) echo get_theme_mod('premium_rate1_price'); else echo '1';?>">
                        <span class="curr_pos_before" <?php echo $before;?>><?php echo ($arr_symbol_currency[get_option('premium_rate_currency_code')]) ? $arr_symbol_currency[get_option('premium_rate_currency_code')] : get_option('wp_paypal_currency_code');?></span><?php if(get_theme_mod('premium_rate1_price') !== false) echo get_theme_mod('premium_rate1_price'); else echo '1';?>
                        <span class="curr_pos_after" <?php echo $after; ?>><?php echo get_option('premium_rate_currency_code');?></span>
                    </span>
				</div>
				<div class="form-check" data-div="radio2">
					<input class="form-check-input" type="radio" name="premium_plan" id="radio2" value="Premium 3 months">
					<label class="form-check-label" for="radio2">
						<?php echo __('3 months', 'arc');?>
					</label>
                    <span class="best_choice" id="best3"><?php echo __('best choice', 'arc');?></span>
                    <span class="price" data-price="<?php if(get_theme_mod('premium_rate2_price') !== false) echo get_theme_mod('premium_rate2_price'); else echo '2';?>">
                        <span class="curr_pos_before" <?php echo $before;?>><?php echo ($arr_symbol_currency[get_option('premium_rate_currency_code')]) ? $arr_symbol_currency[get_option('premium_rate_currency_code')] : get_option('wp_paypal_currency_code');?></span><?php if(get_theme_mod('premium_rate2_price') !== false) echo get_theme_mod('premium_rate2_price'); else echo '2';?>
                        <span class="curr_pos_after" <?php echo $after; ?>><?php echo get_option('premium_rate_currency_code');?></span>
                    </span>
				</div>
				<div class="form-check" data-div="radio3">
					<input class="form-check-input" type="radio" name="premium_plan" id="radio3" value="Premium 6 months">
					<label class="form-check-label" for="radio3">
						<?php echo __('6 months', 'arc');?>
					</label>
					<span class="best_choice" id="best6"><?php echo __('best choice', 'arc');?></span>
                    <span class="price" data-price="<?php if(get_theme_mod('premium_rate3_price') !== false) echo get_theme_mod('premium_rate3_price'); else echo '3';?>">
                        <span class="curr_pos_before" <?php echo $before;?>><?php echo ($arr_symbol_currency[get_option('premium_rate_currency_code')]) ? $arr_symbol_currency[get_option('premium_rate_currency_code')] : get_option('wp_paypal_currency_code');?></span><?php if(get_theme_mod('premium_rate3_price') !== false) echo get_theme_mod('premium_rate3_price'); else echo '3';?>
                        <span class="curr_pos_after" <?php echo $after; ?>><?php echo get_option('premium_rate_currency_code');?></span>
                    </span>
				</div>
				<div class="form-check" data-div="radio4">
					<input class="form-check-input" type="radio" name="premium_plan" id="radio4" value="Premium 12 months">
					<label class="form-check-label" for="radio4">
						<?php echo __('12 months', 'arc');?>
					</label>
					<span class="best_choice" id="best12"><?php echo __('best choice', 'arc');?></span>
                    <span class="price" data-price="<?php if(get_theme_mod('premium_rate4_price') !== false) echo get_theme_mod('premium_rate4_price'); else echo '4';?>">
                        <span class="curr_pos_before" <?php echo $before;?>><?php echo ($arr_symbol_currency[get_option('premium_rate_currency_code')]) ? $arr_symbol_currency[get_option('premium_rate_currency_code')] : get_option('wp_paypal_currency_code');?></span><?php if(get_theme_mod('premium_rate4_price') !== false) echo get_theme_mod('premium_rate4_price'); else echo '4';?>
                        <span class="curr_pos_after" <?php echo $after; ?>><?php echo get_option('premium_rate_currency_code');?></span>
                    </span>
				</div>
			</form>
				<!--paypal button---->
				<?= do_shortcode('[wp_paypal button="buynow" name="Premium 1month" amount="1"]') ?>
				<!--bitcoin button---->
				<div id="btn_bitcoin" style="margin-bottom: 20px; text-align: center">
					<?php echo get_option('bitcoin_btn1')?>
				</div>
				<style>
	                #get_premium_login span {
	                    color: <?php if(get_theme_mod('premium_subscriber_color_text') !== false) echo get_theme_mod('premium_subscriber_color_text'); else echo '#000';?>;
	                    display: inline;
	                }
	                a.login_a {
	                    color:<?php if(get_theme_mod('premium_links_color_in_form') !== false) echo get_theme_mod('premium_links_color_in_form'); else echo '#000';?>!important;
	                    border-bottom: .25rem solid transparent;
	                }
	                a.login_a:hover {
	                    text-decoration: none;
	                    color:<?php if(get_theme_mod('premium_links_color_in_form_on_hover') !== false) echo get_theme_mod('premium_links_color_in_form_on_hover'); else echo '#000';?>!important;
	                    border-bottom-color: <?php if(get_theme_mod('premium_links_color_in_form_on_hover') !== false) echo get_theme_mod('premium_links_color_in_form_on_hover'); else echo '#000';?>;
	                }
                    p#subscribe_text_pos_left,
                    p#login_reg_pos_left {
                        text-align: left;
                    }
                    p#subscribe_text_pos_right,
                    p#login_reg_pos_right{
                        text-align: right;
                    }
                    p#subscribe_text_pos_center,
                    p#login_reg_pos_center{
                        text-align: center;
                    }
				</style>
				<div id="get_premium_login" style="margin-top: 25px;margin-bottom: 30px;">
                    <p id="subscribe_text_pos_<?php echo get_theme_mod('subscribe_text_pos');?>" style="margin-bottom: 0;">
						<?php echo __('Are you a premium subscriber? ', 'arc')?>
                    </p>
                    <p id="login_reg_pos_<?php echo get_theme_mod('subscribe_text_pos');?>">
                        <a class="login_a" href="<?php echo wp_login_url(); ?>"><?php echo esc_html__('Login', 'arc'); ?></a> |
                        <a class="login_a" href="<?php echo wp_registration_url() ?>">
                            <?php echo esc_html__('Register', 'arc'); ?>
                        </a>
                    </p>
				</div>
		</main>
        <style>
            #partners {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                margin-top: 30px;
            }
            #partners .partner_item {
                margin:5px;
                box-sizing:border-box;
                width:100px;
                text-align:center;
            }
            <?php
			$logos_cols = xbox_get_field_value('admin_premium_page_metabox_id','grid-layout-cols');
			switch($logos_cols) {
				case '1':?>
            #partners .partner_item {
                flex: 0 0 calc(52% - 30px);
            }
            <?php
            break;
                case '2':?>
            #partners .partner_item {
                flex: 0 0 calc(36% - 30px);
            }
            <?php
			break;
			case '3':?>
            #partners .partner_item {
                flex: 0 0 calc(27% - 30px);
            }
            <?php
			break;
			case '4':?>
            #partners .partner_item {
                flex: 0 0 calc(22% - 30px);
            }
            <?php
			break;
			case '5':?>
            #partners .partner_item {
                flex: 0 0 calc(19% - 30px);
            }
            <?php
			break;
			case '6':?>
            #partners .partner_item {
                flex: 0 0 calc(17% - 30px);
            }
            <?php
			break;
			case '7': ?>
            #partners .partner_item {
                flex: 0 0 calc(15% - 30px);
            }
            <?php
			break;
			case '8': ?>
            #partners .partner_item {
                flex: 0 0 calc(13% - 30px);
            }
            <?php
			break;
			default: ?>
            #partners .partner_item {
                flex: 0 0 calc(12% - 30px);
            }
            <?php
			break;
	}
	?>


            main.inner a.blockoPayBtn:focus {
                outline: none !important;
            }
        </style>
		<?php
		if(get_theme_mod('premium_partners_show')){?>
            <div id="partners" style="width: 1500px">
                Display a partners logos after add a new algorithm
				<?php
				$list = xbox_get_field_value('admin_premium_page_metabox_id','premium-images-list');
				print_r($list);
				foreach ($list as $value) : ?>
                    <p class="partner_item">
                        <img src="<?php echo $value; ?>" />
                    </p>
				<?php endforeach;?>
            </div>
		<?php } else {
		    echo '<div id="partners" style="width: 1500px;"></div>';
		}?>
	</div>
	<script>
        jQuery(document).ready(function($){
            $('form div.form-check input:checked').parent('div.form-check').css('background', obj_for_pay.chosenRate + ' none repeat scroll 0% 0%');
            /***base premium plan, price****/
            var already_checked = $('form div.form-check').find('input:checked').attr('id');
            var base_period = $('input#' + already_checked).val();
            //$('input[name="item_name"]').val(base_period);
            var base_price = $('div[data-div="'+ already_checked + '"]').find('span.price').attr('data-price');
            //$('input[name="amount"]').val(base_price);
            /*** [end] base premium plan, price****/
            var updating = false;
            /****other plan and price****/
            $('div.form-check').on('click', function () {
                $(this).attr('style' , 'background:' + obj_for_pay.inputColor + ' none repeat scroll 0% 0% !important');
                var data_div = $(this).attr('data-div');
                var period = $('input#' + data_div).val();
                /***paypal***/
                //$('input[name="item_name"]').val(period);
                var price = $('div[data-div="'+ data_div + '"]').find('span.price').attr('data-price');
                //$('input[name="amount"]').val(price);
                /*** [end] paypal****/

                /***bitcoin****/
                /*switch(period) {
                    case 'Premium 1 month':
                        $('#btn_bitcoin .blockoPayBtn').remove();
                        $('#btn_bitcoin').html(obj_for_pay.bitcoinBtn1);
                        $('a.blockoPayBtn img').attr('src', obj_for_pay.bitcoinBtn);
                        break;
                    case 'Premium 3 months':
                        $('#btn_bitcoin .blockoPayBtn').remove();
                        $('#btn_bitcoin').html(obj_for_pay.bitcoinBtn2);
                        $('a.blockoPayBtn img').attr('src', obj_for_pay.bitcoinBtn);
                        break;
                    case 'Premium 6 months':
                        $('#btn_bitcoin .blockoPayBtn').remove();
                        $('#btn_bitcoin').html(obj_for_pay.bitcoinBtn3);
                        $('a.blockoPayBtn img').attr('src', obj_for_pay.bitcoinBtn);
                        break;
                    case 'Premium 12 months':
                        $('#btn_bitcoin .blockoPayBtn').remove();
                        $('#btn_bitcoin').html(obj_for_pay.bitcoinBtn4);
                        $('a.blockoPayBtn img').attr('src', obj_for_pay.bitcoinBtn);
                        break;
                }*/
                /*** [end] bitcoin****/
                var inputID = $(this).find("label").attr("for");
                if (!updating) {
                    updating = true;
                    $('input#' + inputID).click();
                    $('div[data-div="' + inputID + '"]').css('background', obj_for_pay.chosenRate + ' none repeat scroll 0% 0%');
                    $('input:not(:checked)').parent('div.form-check').attr('style' , 'background: ' + obj_for_pay.inputColor + ' none repeat scroll 0% 0% !important');
                    updating = false;
                }
            });
            /**** [end] other plan and price****/
            $('form input[type=image]').attr('src', obj_for_pay.btn)
                .attr('style', 'max-width:370px; width:100%; margin-top: 25px');

            $('a.blockoPayBtn img').attr('src', obj_for_pay.bitcoinBtn);
        });
	</script>
	<?php wp_footer(); ?>
	</body>
	</html>
</div>