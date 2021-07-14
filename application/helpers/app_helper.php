<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('cek_user')) {
    function cek_user()
    {
        $CI = &get_instance();
        if ($CI->session->userdata('status_login') != 'session_basrida') {
            redirect('admin/logout');
        }
    }
}

if (!function_exists('cek_pelanggan')) {
    function cek_pelanggan()
    {
        $CI = &get_instance();
        if ($CI->session->userdata('status_home') != 'session_basridahome') {
            redirect('auth/logout');
        }
    }
}

if (!function_exists('id_pelanggan')) {
    function id_pelanggan()
    {
        $CI = &get_instance();
        return $CI->session->userdata('kode_pelanggan');
    }
}
