<?php

/*
|--------------------------------------------------------------------------
| Custom helper functions go here
|--------------------------------------------------------------------------
|
| Add custom helper functions that could be used throughout the app here
|
*/

/**
 * Determine if user is admin.
 *
 * @return bool
 */
function admin() {
    return auth()->check() && auth()->user()->isAdmin();
}

/**
 * Get IP address.
 *
 * @return string
 */
function get_ip_address() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

/**
 * Slugify some text.
 *
 * @param type $str
 * @return type
 */
function slugify($str) {
    $clean = iconv('UTF-8', 'ASCII//IGNORE', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_| -]+/", '-', $clean);
    $clean = trim($clean, ' \t\n\r\0\x0B-');
    return $clean;
}
