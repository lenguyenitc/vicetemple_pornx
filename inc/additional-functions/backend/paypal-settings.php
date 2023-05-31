<?php
/*** [start] set currency for paypal***/
function change_currency_code_for_customizer_paypal() {
    if(get_option('wp_paypal_currency_code') !== false && get_option('wp_paypal_currency_code') !== '') {
        update_option('premium_rate_currency_code', trim(get_option('wp_paypal_currency_code')));
    }
}
change_currency_code_for_customizer_paypal();

function change_currency_code_for_wp_paypal() {
    if(get_option('premium_rate_currency_code') !== false && get_option('premium_rate_currency_code') !== '' && is_customize_preview()) {
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
        if (array_search(get_option('premium_rate_currency_code'),$arr_symbol_currency))
        {
            $value = array_search(get_option('premium_rate_currency_code'),$arr_symbol_currency);
        } else {
            $value = get_option('premium_rate_currency_code');
        }
        update_option('wp_paypal_currency_code', trim($value));
    }
}
change_currency_code_for_wp_paypal();
//======================================================================================================================
function additional_event(){
    if (strpos($_SERVER['REQUEST_URI'], 'page=wp-paypal-settings') !== false) {
        if(get_option('wp_paypal_currency_code') === false || get_option('wp_paypal_currency_code') === ''){
            if (get_option('premium_rate_currency_code') !== false && get_option('premium_rate_currency_code') !== '') {
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
                if (array_search(get_option('premium_rate_currency_code'),$arr_symbol_currency))
                {
                    $value = array_search(get_option('premium_rate_currency_code'),$arr_symbol_currency);
                } else {
                    $value = get_option('premium_rate_currency_code');
                }
                update_option('wp_paypal_currency_code', trim($value));
            }
        }
    }
}
additional_event();
/*** [end] set currency for paypal***/



