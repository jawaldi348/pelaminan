<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_user();
        $this->load->model('master/Mpelanggan');
    }
    public function index()
    {
        $data = [
            'title' => 'Laporan Data Pelanggan',
            'data' => $this->Mpelanggan->fetch_all(),
        ];
        $this->load->view('laporan/pelanggan', $data);
    }
}

/* End of file Pelanggan.php */
