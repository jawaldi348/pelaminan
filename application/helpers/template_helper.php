<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('assets')) {
    function assets()
    {
        $link = base_url() . 'assets/';
        return $link;
    }
}

if (!function_exists('assets_home')) {
    function assets_home()
    {
        $link = base_url() . 'assets/home/';
        return $link;
    }
}
