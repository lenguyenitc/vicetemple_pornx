<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.4
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
    return;
}

?>
<p class="woocommerce-form-coupon-toggle legend">
    <?php echo esc_html('Have a coupon?', 'arc');?>
    <span class="collapse-legend" style="float:right">
    <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"></path>
    </svg>
    </span>
    <?php /*wc_print_notice( apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'Have a coupon?', 'woocommerce' ) . ' <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'woocommerce' ) . '</a>' ), 'notice' ); */?>
</p>

<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">
    <fieldset class="fieldset coupon_details_fieldset">
        <p><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'arc' ); ?></p>

        <div id="div_coupon_details">
            <div class="div_first_coupon form-row-wide">
                <input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'arc' ); ?>" id="coupon_code" value="" />
            </div>
            <div>
                <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'arc' ); ?>"><?php esc_html_e( 'Apply coupon', 'arc' ); ?></button>
            </div>
        </div>
        <!--<p class="form-row form-row-first">
        <input type="text" name="coupon_code" class="input-text" placeholder="<?php /*esc_attr_e( 'Coupon code', 'woocommerce' ); */?>" id="coupon_code" value="" />
    </p>

    <p class="form-row form-row-last">
        <button type="submit" class="button" name="apply_coupon" value="<?php /*esc_attr_e( 'Apply coupon', 'woocommerce' ); */?>"><?php /*esc_html_e( 'Apply coupon', 'woocommerce' ); */?></button>
    </p>-->
    </fieldset>
    <!--<div class="clear"></div>-->
</form>