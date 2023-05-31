<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li class="wc_payment_method payment_method_<?php echo esc_attr( $gateway->id ); ?>">
    <input style="display:none;" id="payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="input-radio" name="payment_method"
           value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?>
           data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />
    <?php
    if($gateway->get_title() == 'Bitcoin'){
        $img = '<img style="margin-top:-6px;margin-left:0;margin-bottom:0" src="'.get_template_directory_uri(). '/assets/img/bitcoin.png'.'"/>';
    }
    elseif($gateway->get_title() == 'PayPal'){
	    $img = '<img style="margin-top:-6px;margin-left:0;margin-bottom:0" src="'.get_template_directory_uri().'/assets/img/payPal2.png'.'"/>';
    } else {
	    $img = $gateway->get_title();
    }
    ?>
    <label style="display: inline-block;" for="payment_method_<?php echo esc_attr( $gateway->id ); ?>" name="payment_method" class="ui-checkboxradio-label ui-corner-all ui-button ui-widget">
        <span class="ui-checkboxradio-icon ui-corner-all ui-icon ui-icon-background ui-state-hover ui-icon-blank"></span>
        <span class="ui-checkboxradio-icon-space"> </span> <?=$img;?>
    </label>
    <script>
        jQuery(document).ready(function($){
            var payment_choosed = $('input[name="payment_method"]:checked').attr('id');
            $('label[for='+payment_choosed+']').addClass('ui-checkboxradio-checked ui-state-active');
            $('label[for='+payment_choosed+']').find('span.ui-checkboxradio-icon').addClass('ui-icon-check ui-state-checked');

            $('label[name=payment_method]').on('click', function() {
                $('label[name=payment_method]').removeClass('ui-checkboxradio-checked ui-state-active');
                $('label[name=payment_method]').find('span.ui-checkboxradio-icon').removeClass('ui-icon-check ui-state-checked');
                $(this).addClass('ui-checkboxradio-checked ui-state-active');
                $(this).find('span.ui-checkboxradio-icon').addClass('ui-icon-check ui-state-checked');
            });
        });
    </script>
</li>

