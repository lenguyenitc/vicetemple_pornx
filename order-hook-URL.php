<?php
/*
 * Template Name: Order Hook URL
 */
/** Saving initial data [start]*/
if($_GET['addr'] != false){
    global $wpdb;
    $table_name = $wpdb->prefix . 'vicetemple_payment_bitcoin';
    $address = $_GET['addr'];
    $list_of_addresses = $wpdb->get_col( "SELECT address FROM $table_name WHERE status != 2" );
    if(in_array($address, $list_of_addresses) === false) {
        $wpdb->insert(
            $table_name,
            array('address' => $_GET['addr'], 'status' => 0, 'time_start' => time() ),
            array( '%s', '%d', '%d' )
        );
    }
}
/** Saving initial data [end]*/