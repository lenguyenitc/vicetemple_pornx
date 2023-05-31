<?php
add_action('personal_options', 'add_premium_subscription_field' );
function add_premium_subscription_field( $user ) {
	$premium_access = false;
    $input_data = get_all_orders_current_user($user->ID);

    if ($input_data !== false){
        $final = get_final_expires_time_of_active_user_order($input_data, false, $user->ID);
        if($final > time()){
            $premium_access = true;
            $final = round(($final - time()) / 86400);
        }
    }

    $premium_duration = get_user_meta($user->ID, 'premium_duration', true);

    if ( $premium_duration !== '' && $premium_access !== true) {
        $active_time = (($premium_duration['premium_duration'] * 86400) + $premium_duration['start']) - time();
        if ($active_time > 0) {
            $input_data = [];
            $final = get_final_expires_time_of_active_user_order($input_data, false, $user->ID);
            if($final > time()){
                $premium_access = true;
                $final = round(($final - time()) / 86400);
            }
        }
    }
	if(!$premium_access) $final = 0;

    ?>
	<table class="form-table" id="premium_subscription">
		<tr>
			<th><label for="premium_duration"><?php _e("Premium duration"); ?></label></th>
			<td><input type="number" min="0" name="premium_duration" id="premium_duration" value="<?php echo $final; ?>" class="regular-text" /> days<br />
			</td>
		</tr>
	</table>
<?php }
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
function save_extra_user_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
	$premium_duration = [
	  'start' => time(),
      'premium_duration' => $_POST['premium_duration']
    ];
	update_user_meta( $user_id, 'premium_duration',$premium_duration);
	update_user_meta($user_id, 'payed', 1);
}
