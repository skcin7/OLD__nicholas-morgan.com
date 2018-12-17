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
 * Slugify some text
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