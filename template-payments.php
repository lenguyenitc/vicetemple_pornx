<?php
/**
 * Template Name: Payments
 **/
get_header();
$sidebar_pos = '';
?>
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
					<a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/playlists/'?>'"><i class="fa fa-play"></i> <?php echo esc_html__('My playlist', 'arc'); ?></a>
					<!--<a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php /*echo site_url().'/chat/?xxx=' . $curr->ID; */?>'"><i class="fa fa-comment"></i> <?php /*echo esc_html__('My chat', 'arc'); */?></a>-->
					<a style="cursor: pointer;" class="tab-link" onclick="location.href='<?php echo site_url().'/my-subscriptions/'?>'"><i class="fa fa-user-plus"></i> <?php echo esc_html__('My subscriptions', 'arc'); ?></a>
					<button class="tab-link active payments"><i class="fa fa-paypal"></i> <?php echo esc_html__('My payments', 'arc'); ?></button>
				</div>
				<div class="tab-content" style="margin-top: 20px">
					<h2 class="widget-title"><i class="fa fa-paypal"></i><?php echo esc_html__('My payments', 'arc'); ?>
					</h2>
					<div id="payments_page" style="display: block">
						<?php
						function get_data_for_table_mp_paypal(){
							$payments = get_posts( array(
								'numberposts' => -1,
								'category'    => 0,
								'orderby'     => 'date',
								'order'       => 'DESC',
								'post_type'   => 'wp_paypal_order',
								'suppress_filters' => true,
							) );
							$all_data = [];
							foreach($payments as $v){
								$res_id = explode('[custom] =', $v->post_content)[1];
								$res_id = explode(PHP_EOL, $res_id)[0];
								$res_id = explode('&gt;', $res_id)[1];
								$res_subscription_period = explode('[item_name] =', $v->post_content)[1];
								$res_subscription_period = explode(PHP_EOL, $res_subscription_period)[0];
								$res_subscription_period = explode('&gt;', $res_subscription_period)[1];
								switch (trim($res_subscription_period)){
									case "Premium 1 month": $res_subscription_period = '1 month';
										break;
									case "Premium 3 months": $res_subscription_period = '3 months';
										break;
									case 'Premium 6 months': $res_subscription_period = '6 months';
										break;
									case 'Premium 12 months': $res_subscription_period = '12 months';
										break;
									default:
										$res_subscription_period = 1;
								}
								$res_payment_date = explode('[payment_date] =', $v->post_content)[1];
								$res_payment_date = explode(PHP_EOL, $res_payment_date)[0];
								$res_payment_date = explode('&gt;', $res_payment_date)[1];
								$payment_date = strtotime($res_payment_date);
								$res_payment_date = date("d-m-Y", $payment_date);
								$cost = explode('[payment_gross] =', $v->post_content)[1];
								$cost = explode(PHP_EOL, $cost)[0];
								$cost = explode('&gt;', $cost)[1];
								$expires = explode('[item_name] =', $v->post_content)[1];
								$expires = explode(PHP_EOL, $expires)[0];
								$expires = explode('&gt;', $expires)[1];
								switch (trim($expires)){
									case "Premium 1 month": $expires = $payment_date + 2592000;
										break;
									case "Premium 3 months": $expires = $payment_date + 7776000;
										break;
									case 'Premium 6 months': $expires = $payment_date + 15552000;
										break;
									case 'Premium 12 months': $expires = $payment_date + 31536000;
										break;
									default:
										$expires = 1;
								}
								$expires = date("d-m-Y", $expires);
								$status = get_post_meta( $v->ID, '_payment_status', true );
								$all_data [] = [
									'id'                  => $res_id,
									'period'              => $res_subscription_period,
									'date'                => $res_payment_date,
									'post_id'             => $v->ID,
									'cost'                => $cost,
									'expires'             => $expires,
									'status'              => $status,
								];
							}
							$final_data = [];
							foreach($all_data as $v){
								if($v['id'] == get_current_user_id()) $final_data[] = $v;
							}
							return $final_data;
						}
						$data_paypal = get_data_for_table_mp_paypal();

						function get_data_for_table_mp_btc(){
							global $wpdb;
							$table_name = $wpdb->prefix . 'vicetemple_payment_bitcoin';
							$current_user_id = get_current_user_id();
							$all_data = $wpdb->get_results( "SELECT * FROM $table_name WHERE client_id = $current_user_id" );
							$final_data = [];
							foreach($all_data as $v){
								$expires = date("d-m-Y", $v->time_end);
								$date_start = date("d-m-Y", $v->time_start);
								if($v->status == 2) $status = 'Confirmed';
								if($v->status == 0) $status = 'Unconfirmed';
								$final_data[] = [
									'id'                  => $v->client_id,
									'period'              => $v->period,
									'date'                => $date_start,
									'cost'                => $v->cost,
									'expires'             => $expires,
									'status'              => $status,
								];
							}
							return $final_data;
						}
						$data_btc = get_data_for_table_mp_btc();
						if(count($data_paypal) == 0 && count($data_btc) == 0):
						?>
						<div class="alert"><?php echo esc_html__('You have not yet purchased premium access to videos.', 'arc'); ?></div>
						<?php else:?>
						<div id="payment_scroll_table">
                            <h3><?php echo __('PAYPAL', 'arc');?></h3>
							<table id="table_payment">
								<thead>
								<tr>
									<td><?php echo __('Date', 'arc');?></td>
									<td><?php echo __('Period', 'arc');?></td>
									<td><?php echo __('Cost', 'arc');?></td>
									<td><?php echo __('Status', 'arc');?></td>
									<td><?php echo __('Expires', 'arc');?></td>
								</tr>
								</thead>
								<tbody>
                                <?php
                                foreach ($data_paypal as $d):?>
                                    <tr>
                                        <td><?php echo $d['date'] ?></td>
                                        <td><?php echo $d['period'] ?></td>
                                        <td><?php echo $d['cost'] ?></td>
                                        <td><?php echo $d['status'] ?></td>
                                        <td><?php echo $d['expires'] ?></td>
                                    </tr>
                                <?php endforeach;?>
								</tbody>
							</table>
						</div>
                            <div id="payment_scroll_table">
                                <h3><?php echo __('BITCOIN', 'arc');?></h3>
                                <table id="table_payment">
                                    <thead>
                                    <tr>
                                        <td><?php echo __('Date', 'arc');?></td>
                                        <td><?php echo __('Period', 'arc');?></td>
                                        <td><?php echo __('Cost', 'arc');?></td>
                                        <td><?php echo __('Status', 'arc');?></td>
                                        <td><?php echo __('Expires', 'arc');?></td>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach ($data_btc as $d):?>
                                        <tr>
                                            <td><?php echo $d['date'] ?></td>
                                            <td><?php echo $d['period'] ?></td>
                                            <td><?php echo $d['cost'] ?></td>
                                            <td><?php echo $d['status'] ?></td>
                                            <td><?php echo $d['expires'] ?></td>
                                        </tr>
									<?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
						<?php endif;?>
					</div>
				</div>
			<?php endif;?>
			<script>
                var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
               /* var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';*/
                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
			</script>
		</main>
	</div>
<?php
get_footer();
