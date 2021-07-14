<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/Mproduk');
    }
    public function detail($kode)
    {
        $data = [
            'title' => 'Detail Produk | Pelaminan Basrida Wiwi',
            'data' => $this->Mproduk->show($kode)
        ];
        $this->template->home('home/detail_produk', $data);
    }
}

/* End of file Produk.php */
