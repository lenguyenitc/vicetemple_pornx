<?php
/***
 * Template Name: Backend
 */
global $wpdb;
require_once 'admin/vendor/dompdf/autoload.inc.php';
use Dompdf\Options;
use Dompdf\Dompdf;
if (empty($_GET['ID'])) {
    die();
}
/** Logo link [start]*/
$logo_link = '';
if(get_theme_mod('enable_demos_logos') == 'demos'){
    if ('lesbian' == xbox_get_field_value('my-theme-options', 'choose-niche')) {
        $logo_link = get_template_directory_uri() . '/assets/logos/LesbianX.png';
    }
//teens
    if ('college' == xbox_get_field_value('my-theme-options', 'choose-niche')) {
        $logo_link = get_template_directory_uri() . '/assets/logos/teens.png';
    }
    if ('milf' == xbox_get_field_value('my-theme-options', 'choose-niche')) {
        $logo_link = get_template_directory_uri() . '/assets/logos/MilfX.png';
    }
    if ('hentai' == xbox_get_field_value('my-theme-options', 'choose-niche')) {
        $logo_link = get_template_directory_uri() . '/assets/logos/HentaiX.png';
    }
//gay
    if ('livexcams' == xbox_get_field_value('my-theme-options', 'choose-niche')) {
        $logo_link = get_template_directory_uri() . '/assets/logos/GayX.png';
    }
//pornx default
    if ('trans' == xbox_get_field_value('my-theme-options', 'choose-niche')) {
        $logo_link = get_template_directory_uri() . '/assets/logos/PornX-trans.png';
    }
//trans
    if ('transs' == xbox_get_field_value('my-theme-options', 'choose-niche')) {
        $logo_link = get_template_directory_uri() . '/assets/logos/TransX.png';
    }
//fetish
    if ('filf' == xbox_get_field_value('my-theme-options', 'choose-niche')) {
        $logo_link = get_template_directory_uri() . '/assets/logos/FetishX.png';
    }
//porn light
    if ('light' == xbox_get_field_value('my-theme-options', 'choose-niche')) {
        $logo_link = get_template_directory_uri() . '/assets/logos/PornX-trans.png';
    }
} else {
    $logo_link = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
}
function insert_base64_encoded_image_src($img){
    $extencion = pathinfo($img, PATHINFO_EXTENSION);
    $data = file_get_contents($img, false);
    $img_base_64 = base64_encode($data);
    $path_img = 'data:image/' . $extencion . ';base64,' . $img_base_64;
    return $path_img;
}
$logo_link = insert_base64_encoded_image_src($logo_link);
/** Logo link [end]*/

/** company info available under woocommerce [start]*/
$site_name = get_bloginfo('name');
$address_company = (!empty(get_option('woocommerce_store_address'))) ? get_option('woocommerce_store_address') : get_option('woocommerce_store_address_2') ;
$city_company = get_option('woocommerce_store_city');
$country_company = WC()->countries->countries[get_option('woocommerce_default_country')];
$email_company = get_option('woocommerce_stock_email_recipient');
$tel_company = get_option('blogname');
/** company info available under woocommerce [end]*/

/** Client info [start]*/
$order = wc_get_order( $_GET['ID']);
$data = $order->get_data();
$firs_name = ($data['billing']['first_name']) ? $data['billing']['first_name'] : 'No data specified';
$last_name = ($data['billing']['last_name']) ? $data['billing']['last_name'] : 'No data specified';
$company_name = ($data['billing']['company']) ? $data['billing']['company'] : 'No data specified';
$address_client = ($data['billing']['address_1']) ? $data['billing']['address_1'] : 'No data specified';
$country_client = ($data['billing']['country']) ? $data['billing']['country'] : 'No data specified';
$city_client = ($data['billing']['city']) ? $data['billing']['city'] : 'No data specified';
$zip_code = ($data['billing']['postcode']) ? $data['billing']['postcode'] : 'No data specified';
/** Client info [end]*/

/** Date [start] */
$order = new WC_Order($_GET['ID']);
$date_purchose = $order->order_date;
global $wpdb;
$product_id = $wpdb->get_var("SELECT `product_id` FROM `wp_wc_order_product_lookup` WHERE `order_id` = " . $_GET['ID']);
$post_title = $wpdb->get_var("SELECT `post_title` FROM `wp_posts` WHERE `ID` = " . $product_id);
switch($post_title) {
    case '1 month':
        $end = strtotime("+1 month", strtotime($date_purchose));
        break;
    case '3 months':
        $end = strtotime("+3 months", strtotime($date_purchose));
        break;
    case '6 months':
        $end = strtotime("+6 months", strtotime($date_purchose));
        break;
    case '12 months':
        $end = strtotime("+12 months", strtotime($date_purchose));
        break;
}
$due_date = date("d/m/Y", $end);
/** Date [end] */

/** Number invoice [start]*/
$number_invoice = $_GET['ID'];
/** Number invoice [end]*/

/** Description [start] */
$description = get_bloginfo('name') . ' Premium Subscription ' . $post_title;
/** Description [end] */

/** Price Tax and total [start]*/
$price = number_format((int)$wpdb->get_var("SELECT `max_price` FROM `wp_wc_product_meta_lookup` WHERE `product_id` = " . $product_id), 0);
$tax = ($wpdb->get_var("SELECT `total_tax` FROM `wp_wc_order_tax_lookup` WHERE `order_id` =". $_GET['ID'])) ? $wpdb->get_var("SELECT `total_tax` FROM `wp_wc_order_tax_lookup` WHERE `order_id` =". $_GET['ID']) : 0;
$total = $price + $tax;
/** Price Tax and total [end]*/


$get_passive_color = get_theme_mod('passive_color_setting');
$passive_color = list($r, $g, $b) = sscanf($get_passive_color, "#%02x%02x%02x");

$template = '<style>@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap");</style><table>
    <tr>
        <td colspan="2" style="font-family: Roboto, sans-serif; font-size: 30px; text-align: left;">INVOICE</td>
        <td></td>
        <td colspan="2" style="text-align: right;"><h1 style="text-align: right;font-family: Roboto, sans-serif;">'.$site_name.'</h1></td>
    </tr>
    <tr>
        <td style="padding-top: 80px;font-family: Roboto, sans-serif;color: '.get_theme_mod('btn_color_setting').'">'.$site_name .' Ltd.</td>
        <td style="padding-top: 80px;font-family: Roboto, sans-serif;color: '.get_theme_mod('btn_color_setting').'">Bill To</td>
        <td style="padding-top: 80px;"></td>
        <td style="padding-top: 80px;font-family: Roboto, sans-serif;color: '.get_theme_mod('btn_color_setting').'">Issued on</td>
        <td style="padding-top: 80px;font-family: Roboto, sans-serif;color: '.get_theme_mod('btn_color_setting').'">Invoice #</td>
    </tr>
    <tr>
        <td style="font-family: Roboto, sans-serif;">'.$address_company.'</td>
        <td style="font-family: Roboto, sans-serif;">'.$firs_name.' '. $last_name.'</td>
        <td></td>
        <td style="font-family: Roboto, sans-serif;">'.date("d/m/Y",strtotime($date_purchose)).'</td>
        <td style="font-family: Roboto, sans-serif;">PX'.$_GET['ID'].'</td>
    </tr>
    <tr>
        <td style="font-family: Roboto, sans-serif;">'.$city_company.', '. $country_company.'</td>
        <td style="font-family: Roboto, sans-serif;">'.$company_name.'</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td style="font-family: Roboto, sans-serif;">'.$email_company.'</td>
        <td style="font-family: Roboto, sans-serif;">'.$address_client.'</td>
        <td></td>
        <td style="font-family: Roboto, sans-serif;color: '.get_theme_mod('btn_color_setting').'">Due date</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td style="font-family: Roboto, sans-serif;">'.$city_client.', '. $country_client.'</td>
        <td></td>
        <td style="font-family: Roboto, sans-serif;">'.date("d/m/Y",strtotime($date_purchose)).'</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td style="font-family: Roboto, sans-serif;">'.$zip_code.'</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="5" style="padding-bottom: 30px;"></td>
    </tr>
    <tr>
        <td colspan="5" style="border-top: 2px solid '.get_theme_mod('btn_color_setting').'"></td>
    </tr>
    <tr>
        <td style="font-family: Roboto, sans-serif;padding-bottom: 10px;color: '.get_theme_mod('btn_color_setting').'">Description</td>
        <td></td>
        <td style="font-family: Roboto, sans-serif;text-align: right;padding-bottom: 10px;color: '.get_theme_mod('btn_color_setting').'">Price</td>
        <td style="font-family: Roboto, sans-serif;text-align: right;padding-bottom: 10px;color: '.get_theme_mod('btn_color_setting').'">Tax</td>
        <td style="font-family: Roboto, sans-serif;text-align: right;padding-bottom: 10px;color: '.get_theme_mod('btn_color_setting').'">Total</td>
    </tr>
    <tr>
        <td style="font-family: Roboto, sans-serif;padding-bottom: 10px;">'.$site_name.' Premium subscription - <br>' . $post_title.'</td>
        <td></td>
        <td style="font-family: Roboto, sans-serif;padding-bottom: 10px;text-align: right;">'.get_woocommerce_currency_symbol().$price.'</td> 
        <td style="font-family: Roboto, sans-serif;padding-bottom: 10px;text-align: right;">'.get_woocommerce_currency_symbol().$tax.'</td>
        <td style="font-family: Roboto, sans-serif;padding-bottom: 10px;text-align: right;">'.get_woocommerce_currency_symbol().$total.'</td>
    </tr>
    <tr>
        <td colspan="5" style="padding-bottom: 30px;border-top: 2px solid rgba('.$passive_color[0] .','. $passive_color[1]. ','. $passive_color[2] . ', 0.3)"></td>
    </tr>
    <tr>
        <td colspan="5" style="padding-bottom: 30px;;border-top: 2px solid rgba('.$passive_color[0] .','. $passive_color[1]. ','. $passive_color[2] . ', 0.3)"></td>
    </tr>
    <tr>
        <td></td> 
        <td></td>       
        <td style="text-align: right;font-family: Roboto, sans-serif;padding-bottom: 10px;">Subtotal</td>
        <td colspan="2" style="text-align: right;font-family: Roboto, sans-serif;padding-bottom: 10px;">'.get_woocommerce_currency_symbol().$price.'</td>
    </tr>
    <tr>
        <td></td>  
        <td></td>      
        <td style="text-align: right;font-family: Roboto, sans-serif;padding-bottom: 10px;">Tax</td>
        <td colspan="2" style="text-align: right;font-family: Roboto, sans-serif;padding-bottom: 10px;">'.get_woocommerce_currency_symbol().$tax.'</td>
    </tr>
    <tr>
        <td></td>  
        <td></td>     
        <td colspan="3" style="border-top: 1px solid '.get_theme_mod('btn_color_setting').'"></td>   
    </tr>
    <tr>
        <td></td> 
        <td></td>      
        <td style="text-align: right;font-family: Roboto, sans-serif;padding-top: 10px;">Total</td>
        <td colspan="2" style="text-align: right;font-family: Roboto, sans-serif;padding-top: 10px;">'.get_woocommerce_currency_symbol().$total.'</td>
    </tr>
    <tr>
        <td colspan="5" style="padding-bottom: 220px;"></td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: center;font-family: Roboto, sans-serif;">If you have any questions about this invoice, please contact</td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: center;font-family: Roboto, sans-serif;">'. xbox_get_field_value('my-theme-options', 'support-email').'</td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: center;font-family: Roboto, sans-serif;"><strong>Thank you!</strong></td>
    </tr>
    <tr>
        <td colspan="5" style="padding-bottom: 80px;"></td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: center; opacity: 0.5;font-family: Roboto, sans-serif;">'.site_url().'</td>
    </tr>
</table>';



render_pdf($template);

function render_pdf($template, $order = ''){
    $dom_opt = new Options();
    $dom_opt->set([
        'isPhpEnabled' => true,
        'isRemoteEnabled' => true,
        'isHtml5ParserEnabled' => true,

    ]);
    $dompdf = new Dompdf($dom_opt);
    $dompdf->loadHtml($template);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    // Output the generated PDF (1 = download and 0 = preview)
    $dompdf->stream("Invoice_PX".$_GET['ID'], array("Attachment" => 1));
}
/*function render_pdf($template, $order = ''){
    $dompdf = new Dompdf();
    $dompdf->loadHtml($template);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    // Output the generated PDF (1 = download and 0 = preview)
    $dompdf->stream("invoice".$order, array("Attachment" => 1));
}*/