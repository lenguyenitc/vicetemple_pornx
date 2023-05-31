<?php
//add_action('admin_menu', 'ARC_bitcoin_payments_menus');
function ARC_bitcoin_payments_menus(){
/*	add_menu_page(
		'Bitcoin Payments',
		'Bitcoin Payments',
		'manage_options',
		'bitcoin-payments',
		'ARC_bitcoin_payments_page',
		'https://img.icons8.com/officexs/16/000000/bitcoin.png', //dashicons-money-alt
		'26');
	add_submenu_page( 'bitcoin-payments',
		'Settings',
		'Settings',
		'manage_options',
		'bitcoin-settings',
		'ARC_bitcoin_payments_settings');*/
}
function ARC_bitcoin_payments_page(){?>
    <?php
    if(isset($_GET['order']) && !empty($_GET['order'])):
    ?>
    <div class="wrap" style="margin-top: 50px">
        <style>
            div.order_detail {
                background-color: #FFFFFF;
                display: block;
                -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
                padding: 20px;
                font-size: 20px;
                margin-top: 20px;
            }
            div.order_detail p {
                font-size: 20px;
                padding: 3px;
            }
        </style>
        <hr class="wp-header-end">
        <h1 class="wp-heading-inline"><?php echo 'Order '. $_GET['order'];?>
            <a style="font-size: 16px" href="<?php echo '/backend/?order='.
	                            $_GET['order'] . '&tr_id=' .
	                            $_GET['tr_id'] . '&email=' .
	                            $_GET['email'] . '&period=' .
	                            $_GET['period'] . '&status=' .
	                            $_GET['status'] . '&cost=' .
	                            $_GET['cost'] . '&date=' .
	                            $_GET['date']; ?>" class="button button-primary">
		        <?php echo "Save as PDF"?>
            </a>
            <a style="font-size: 16px" href="<?php echo admin_url() . 'admin.php?page=bitcoin-payments';?>" class="button button-secondary">
                Return to all orders
            </a>
        </h1>
        <hr class="wp-header-end">
        <div class="order_detail">
            <p><strong>Transaction ID:</strong> <?php echo $_GET['tr_id'];?></p>
            <p><strong>User email:</strong> <?php echo $_GET['email'];?></p>
            <p><strong>Premium on:</strong> <?php echo $_GET['period'];?></p>
            <p><strong>Payment status:</strong> <?php echo $_GET['status'];?></p>
            <p><strong>Cost:</strong> <?php echo $_GET['cost'];?></p>
            <p><strong>Date:</strong> <?php echo $_GET['date'];?></p>
        </div>
    </div>
    <?php else: ?>
	<div class="wrap" style="margin-top: 50px">
		<h1 class="wp-heading-inline"><?php echo __('Orders', 'arc');?></h1>
        <a style="float: right; font-size: 16px" href="<?php echo '/backend/?bitcoin_orders=save'; ?>" class="button button-primary">
			<?php echo "Save as PDF"?>
        </a>
		<hr class="wp-header-end">
		<table class="wp-list-table widefat fixed striped table-view-list posts">
			<thead>
			<tr>
				<th scope="col" id="title" class="manage-column column-title column-primary">Order</th>
				<th scope="col" id="txn_id" class="manage-column column-txn_id">Transaction ID</th>
				<th scope="col" id="first_name" class="manage-column column-first_name">User Email</th>
				<th scope="col" id="last_name" class="manage-column column-last_name">Period</th>
                <th scope="col" id="payment_status" class="manage-column column-payment_status">Payment Status</th>
                <th scope="col" id="mc_gross" class="manage-column column-mc_gross">Cost</th>
				<th scope="col" id="date" class="manage-column column-date sortable asc">Date</th>
				<th scope="col" id="detail" class="manage-column column-txn_id">Detail</th>
			</tr>
			</thead>
			<tbody id="the-list">
            <?php
            function get_data_for_table_for_admin_btc(){
	            global $wpdb;
	            $table_name = $wpdb->prefix . 'vicetemple_payment_bitcoin';
	            $all_data = $wpdb->get_results( "SELECT * FROM $table_name" );
	            $final_data = [];
	            foreach($all_data as $v){
		            /*$expires = date("d-m-Y", $v->time_end);*/
		            $date_start = date("d-m-Y", $v->time_start);
		            if($v->status == 2) $status = 'Confirmed';
		            if($v->status == 0) $status = 'Unconfirmed';
		            $final_data[] = [
			            'order_id'            => $v->id,
                        'transaction_id'      => $v->address,
			            'period'              => $v->period,
			            'date'                => $date_start,
			            'cost'                => $v->cost,
			            'status'              => $status,
			            'user_email'          => $v->client_email,
		            ];
	            }
	            return $final_data;
            }
            $data_admin = get_data_for_table_for_admin_btc();
            foreach ($data_admin as $data):
            ?>
            <tr>
                <td class="title column-title has-row-actions column-primary page-title" data-colname="Order">
                    <strong><?php echo $data['order_id']?></strong>
                    <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
                    <button type="button" class="toggle-row"><span class="screen-reader-text">Show more details</span></button>
                </td>
                <td  class="txn_id column-txn_id" data-colname="Transaction ID"><?php echo $data['transaction_id']?></td>
                <td class="first_name column-first_name" data-colname="User email"><?php echo $data['user_email']?></td>
                <td class="last_name column-last_name" data-colname="Period"><?php echo $data['period']?></td>
                <td class="mc_gross column-mc_gross" data-colname="Payment Status"><?php echo $data['status']?></td>
                <td class="payment_status column-payment_status" data-colname="Cost"><?php echo $data['cost']?></td>
                <td class="date column-date" data-colname="Date"><?php echo $data['date']?></td>
                <td class="detail column-detail" data-colname="Detail">
                    <a href="<?php echo admin_url() . 'admin.php?page=bitcoin-payments&order='.
                                        $data['order_id'] . '&tr_id=' .
                                        $data['transaction_id'] . '&email=' .
                                        $data['user_email'] . '&period=' .
                                        $data['period'] . '&status=' .
                                        $data['status'] . '&cost=' .
                                        $data['cost'] . '&date=' .
                                        $data['date']; ?>" class="button button-secondary">
                        <?php echo "Detail"?>
                    </a>
                </td>
            </tr>
            <?php endforeach;?>
			</tbody>
		</table>
	</div>
    <?php endif;  ?>
<?php }
function ARC_bitcoin_payments_settings(){
	?>
    <div class="wrap">
        <h2><?php echo __('Bitcoin Settings', 'arc');?></h2>
        <h3>All the necessary information on handling your payments via Bitcoin can be found under
            <a href="<?php echo admin_url()?>admin.php?page=arc-dashboard">
                <?php echo __('Theme Dashboard -> FAQ', 'arc')?>
            </a>
        </h3>
        <form action="options.php" method="POST">
			<?php
			settings_fields( 'bitcoin_group');
			do_settings_sections( 'bitcoin-settings');
			submit_button();
			?>
        </form>
    </div>
	<?php
}
add_action('admin_init', 'bitcoin_page_settings');
function bitcoin_page_settings(){
    /**API**/
	register_setting( 'bitcoin_group', 'bitcoin_api_key', 'sanitize_callback');
	add_settings_section( 'bitcoin_api_section_id', 'API Key Setting', 'bitcoin_api_section_callback_function', 'bitcoin-settings');
	function bitcoin_api_section_callback_function() {
		echo '<p>The API Key from your <a href="https://www.blockonomics.co/">Blockonomics</a> account should go here.</p>';
		echo '<p>You can find it here, under the Settings tab: <a href="https://www.blockonomics.co/merchants#/page3">https://www.blockonomics.co/merchants#/page3</a></p>';
	}
	add_settings_field('bitcoin_api_id', 'API Key', 'bitcoin_api_field', 'bitcoin-settings', 'bitcoin_api_section_id');
	function bitcoin_api_field(){
		$val = get_option('bitcoin_api_key');
		$val = $val ? $val['input'] : null;
		?>
        <input type="text" style="width: 100%"  name="bitcoin_api_key[input]" value="<?php echo esc_attr($val) ?>" />
		<?php
	}
	function sanitize_callback( $options ){
		foreach( $options as $name => & $val ){
			if( $name == 'input' )
				$val = trim(strip_tags($val));
		}
		return $options;
	}
	/***Buttons**/
	register_setting( 'bitcoin_group', 'bitcoin_btn1');
	register_setting( 'bitcoin_group', 'bitcoin_btn2');
	register_setting( 'bitcoin_group', 'bitcoin_btn3');
	register_setting( 'bitcoin_group', 'bitcoin_btn4');
	add_settings_section( 'bitcoin_btn_section_id', 'Premium Button Codes', 'bitcoin_btn_section_callback_function', 'bitcoin-settings');
	function bitcoin_btn_section_callback_function() {
		echo '<p>The button script from your ';
		echo '<a href="https://www.blockonomics.co/merchants#/page3">Blockonomics</a> account should go here.</p>';
		echo '<p>You can find it here, under the Payment Buttons/URL tab (Step 1): ';
		echo '<a href="https://www.blockonomics.co/merchants#/page3">https://www.blockonomics.co/merchants#/page3</a></p>';
	}
	add_settings_field('bitcoin_btn1_code', 'Button - 1 month premium', 'bitcoin_btn1_field', 'bitcoin-settings', 'bitcoin_btn_section_id');
	function bitcoin_btn1_field() {
		$val = trim(strip_tags(htmlspecialchars(get_option('bitcoin_btn1'))));
		$val = $val ? $val : null;
		?>
        <textarea style="width: 100%"  name="bitcoin_btn1"><?php echo $val ?></textarea>
		<?php
	}
	add_settings_field('bitcoin_btn2_code', 'Button - 3 months premium', 'bitcoin_btn2_field', 'bitcoin-settings', 'bitcoin_btn_section_id');
	function bitcoin_btn2_field() {
		$val = trim(strip_tags(htmlspecialchars(get_option('bitcoin_btn2'))));
		$val = $val ? $val : null;
		?>
        <textarea style="width: 100%"  name="bitcoin_btn2"><?php echo $val ?></textarea>
		<?php
	}
	add_settings_field('bitcoin_btn3_code', 'Button - 6 months premium', 'bitcoin_btn3_field', 'bitcoin-settings', 'bitcoin_btn_section_id');
	function bitcoin_btn3_field() {
		$val = trim(strip_tags(htmlspecialchars(get_option('bitcoin_btn3'))));
		$val = $val ? $val : null;
		?>
        <textarea style="width: 100%"  name="bitcoin_btn3"><?php echo $val ?></textarea>
		<?php
	}
	add_settings_field('bitcoin_btn4_code', 'Button - 12 months premium', 'bitcoin_btn4_field', 'bitcoin-settings', 'bitcoin_btn_section_id');
	function bitcoin_btn4_field() {
		$val = trim(strip_tags(htmlspecialchars(get_option('bitcoin_btn4'))));
		$val = $val ? $val : null;
		?>
        <textarea style="width: 100%"  name="bitcoin_btn4"><?php echo $val ?></textarea>
		<?php
	}
	/**Script**/
	register_setting( 'bitcoin_group', 'bitcoin_script_code');
	add_settings_section( 'bitcoin_script_section_id', 'Button Script', 'bitcoin_script_section_callback_function', 'bitcoin-settings');
	function bitcoin_script_section_callback_function() {
		echo '<p>The button script from your ';
		echo '<a href="https://www.blockonomics.co/merchants#/page3">Blockonomics</a> account should go here.</p>';
		echo '<p>You can find it here, under the Payment Buttons/URL tab (Step 2): <a href="https://www.blockonomics.co/merchants#/page3">https://www.blockonomics.co/merchants#/page3</a></p>';
	}
	add_settings_field('bitcoin_script_id', 'Button Script', 'bitcoin_script_field', 'bitcoin-settings', 'bitcoin_script_section_id');
	function bitcoin_script_field(){
		$val = trim(strip_tags(htmlspecialchars(get_option('bitcoin_script_code'))));
		$val = $val ? $val : null;
		?>
        <input type="text" style="width: 100%"  name="bitcoin_script_code" value="<?php echo $val ?>" />
		<?php
	}
}