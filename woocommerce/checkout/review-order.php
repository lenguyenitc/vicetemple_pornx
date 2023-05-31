<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div id="div_select_payment" style="display: flex; flex-wrap: wrap;justify-content: space-between">
	<?php
	do_action( 'woocommerce_review_order_before_cart_contents' );

	$input_data = get_all_orders_current_user(get_current_user_id());
	if ($input_data !== false){
		$final = get_final_expires_time_of_active_user_order($input_data, false, get_current_user_id());
		if($final) $time_left_from_old_tarif = $final - time();
		else $time_left_from_old_tarif = false;
	} else $time_left_from_old_tarif = false;
	foreach ( WC()->cart->get_fees() as $fee ) : ?>
		<tr class="fee">
			<th><?php echo esc_html( $fee->name ); ?></th>
			<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
		</tr>
	<?php endforeach; ?>
	<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
        <div id="pay_block" style="align-items: center;">
            <?php if(wc_tax_enabled()){
                $title_width = '40%';
                $text_align = 'right';
                $pay_div_ml = '20px';
                $pay_div_width = '50%';
            } else {
	            $title_width = '59%';
	            $text_align = 'center';
	            $pay_div_ml = '0px';
	            $pay_div_width = '40%';
            }?>

            <div style="text-align: <?=$text_align?>;width: <?=$title_width?>;">
                <div>
                    <span id="title_plan">
            <?php
            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	            $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	            echo wp_kses_post(apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key));
	            echo wc_get_formatted_cart_item_data( $cart_item );

	            switch ($_product->get_name()) {
		            case '1 month':
			            $time = strtotime(date("Y/m/d"));
                        if($time_left_from_old_tarif) {
	                        $final = date("d.m.Y", strtotime("+1 month", $time) + $time_left_from_old_tarif);
                        } else {
	                        $final = date("d.m.Y", strtotime("+1 month", $time));
                        }
			            break;
		            case '3 months':
			            $time = strtotime(date("Y/m/d"));
			            if($time_left_from_old_tarif != '') {
				            $final = date( "d.m.Y", strtotime( "+3 months", $time ) + $time_left_from_old_tarif );
			            } else {
				            $final = date( "d.m.Y", strtotime( "+3 months", $time ));
                        }
			            break;
		            case '6 months':
			            $time = strtotime(date("Y/m/d"));
			            if($time_left_from_old_tarif != '') {
				            $final = date( "d.m.Y", strtotime( "+6 months", $time ) + $time_left_from_old_tarif );
			            } else {
				            $final = date( "d.m.Y", strtotime( "+6 months", $time ));
                        }
			            break;
		            case '12 months':
			            $time = strtotime(date("Y/m/d"));
			            if($time_left_from_old_tarif != '') {
				            $final = date( "d.m.Y", strtotime( "+12 months", $time ) + $time_left_from_old_tarif );
			            } else {
				            $final = date( "d.m.Y", strtotime( "+12 months", $time ));
                        }
			            break;
		            default:
			            break;
	            }
            }
            ?><span>: </span>
            </span>
                    <span id="cost_plan">
                        <span><?php /*wc_cart_totals_order_total_html();*/ echo WC()->cart->get_total_ex_tax()?></span>
                    </span>
                </div>
	            <?php
	            $margin = '5px';
                if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) : ?>
		            <?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
			            <?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
                            <span class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
					           <!-- --><?php /*echo esc_html( $tax->label ); */?>
                                <span class="vat_label">VAT</span>
					            <?php echo wp_kses_post($tax->formatted_amount); ?>
                            </span>
			            <?php endforeach; ?>
		            <?php else : ?>
                        <span class="tax-total">
                            <span class="vat_label"><?php echo esc_html(WC()->countries->tax_or_vat()); ?>: </span>
                            <?php ?>
				            <?php wc_cart_totals_taxes_total_html(); ?>
                        </span>
		            <?php endif; ?>
	            <?php $margin = '28px'; endif; ?>
               <?php if(wc_tax_enabled()):?> <div class="total_delimeter"></div><?php endif;?>
                <span class="total_span">
                    <?php if(wc_tax_enabled()):?><span>Total: </span>
                    <span class="total_curr"><?php echo WC()->cart->get_total()?></span>
                    <?php else:?>
                    <p id="period_plan" style="margin-top:<?=$margin?>"><?=date("d.m")?><span> - </span> <?=$final?></p>
                    <?php endif;?>
                </span>
            </div>
            <div style="text-align: right;margin-left: <?=$pay_div_ml?>;width:<?=$pay_div_width?>;">
	            <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

	            <?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>
	            <?php if(wc_tax_enabled()):?> <p id="period_plan" style="margin-top:<?=$margin?>"><?=date("d.m")?><span> - </span> <?=$final?></p><?php endif;?>
	            <?php do_action( 'woocommerce_review_order_after_submit' ); ?>
            </div>
        </div>

	    <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
</div>
