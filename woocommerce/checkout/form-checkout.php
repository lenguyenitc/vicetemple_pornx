<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}
?>
<?php if(get_theme_mod('show_billings_details')):?>
<p class="billing_details_legend legend"><?php echo esc_html__( 'Billing details', 'arc' ); ?>
    <span class="collapse-legend" style="float:right">
    <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"></path>
    </svg>
    </span>
</p>
<?php endif;?>
<!--<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php /*echo esc_url( wc_get_checkout_url() ); */?>" enctype="multipart/form-data">-->
	<?php if(get_theme_mod('show_billings_details')):?>
    <fieldset class="fieldset billing_details_fieldset">
	<?php if ($checkout->get_checkout_fields()) : ?>
	<?php
        /*echo '<pre>';
        print_r($checkout->get_checkout_fields());
        echo '</pre>';*/?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
		<div id="div_billing_details">
			<div>
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	<p id="pornx_privacy"><?=get_bloginfo('name')?> collects and uses personal data in accordance with our <a href="<?=get_page_link(get_option('wp_page_for_privacy_policy'))?>"> Privacy Policy
            <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url()">
                    <path d="M8 0C3.86437 0 0.5 3.36437 0.5 7.5C0.5 11.6356 3.86437 15 8 15C12.1356 15 15.5 11.6356 15.5 7.5C15.5 3.36437 12.1356 0 8 0ZM8 13.75C4.55375 13.75 1.75001 10.9462 1.75001 7.5C1.75001 4.05375 4.55375 1.25001 8 1.25001C11.4462 1.25001 14.25 4.05375 14.25 7.5C14.25 10.9462 11.4462 13.75 8 13.75Z" fill="white" fill-opacity="0.5"/>
                    <path d="M7.84383 10.1055C7.4357 10.1124 7.10696 10.4411 7.10007 10.8492C7.09946 10.8617 7.09946 10.8749 7.10007 10.8873C7.11446 11.298 7.4582 11.6192 7.86882 11.6055H7.84383C8.25633 11.5986 8.58759 11.2623 8.58759 10.8492C8.57757 10.4424 8.25071 10.1155 7.84383 10.1055Z" fill="white" fill-opacity="0.5"/>
                    <path d="M7.98719 3.41936C7.10594 3.39311 6.25469 3.7406 5.64344 4.3756C5.5728 4.46434 5.5353 4.57497 5.53718 4.68811C5.54031 4.965 5.7603 5.19061 6.03719 5.2006C6.16595 5.20122 6.29031 5.15435 6.3872 5.06935C6.77471 4.66749 7.31031 4.44184 7.86845 4.44436C8.7122 4.44436 9.11846 4.9006 9.11846 5.43811C9.11846 6.5881 7.07471 6.73186 7.07471 8.22562C7.07471 8.58811 7.29971 9.25687 7.76846 9.25687C7.77221 9.25687 7.77657 9.25687 7.78097 9.25687C8.03283 9.25687 8.23721 9.0525 8.23721 8.80063C8.23721 8.63188 8.11847 8.48812 8.11847 8.31937C8.11847 7.19437 10.3185 7.03813 10.3685 5.29438C10.3684 4.23187 9.46844 3.41936 7.98719 3.41936Z" fill="white" fill-opacity="0.5"/>
                </g>
                <defs>
                    <clipPath >
                        <rect width="15" height="15" fill="white" transform="translate(0.5)"/>
                    </clipPath>
                </defs>
            </svg></a>
    </p>
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

        <?php endif;?>
</fieldset>
	<div id="order_review" class="woocommerce-checkout-review-order">
		<p class="select_payment_legend legend"><?php echo esc_html__( 'Select payment', 'arc' ); ?>
			<span class="collapse-legend" style="float:right">
                                            <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.83927 0.313409C6.64771 0.136445 6.35229 0.136445 6.16072 0.31341L0.943664 5.13272C0.609395 5.44151 0.827875 6 1.28294 6L11.7171 6C12.1721 6 12.3906 5.44151 12.0563 5.13272L6.83927 0.313409Z" fill="white"></path>
                                            </svg>
                                            </span>
		</p>
		<fieldset class="fieldset select_payment_fieldset">
            <div id="order_details">
	            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
            </div>
		</fieldset>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

<!--</form>-->

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

