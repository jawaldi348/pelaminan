<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_user();
        $this->load->model('master/Mkategori');
        $this->load->model('master/Mproduk');
    }
    public function index()
    {
        $data = [
            'title' => 'Laporan Produk',
            'links' => '<li>Laporan</li><li class="active">Produk</li>',
            'kategori' => $this->Mkategori->fetch_all()
        ];
        $this->template->display('laporan/produk/index', $data);
    }
    public function all()
    {
        $data = [
            'title' => 'Laporan Data Produk',
            'data' => $this->Mproduk->fetch_all(),
        ];
        $this->load->view('laporan/produk/all', $data);
    }
    public function kategori()
    {
        $kategori = $this->input->post('kategori');
        $data = [
            'title' => 'Laporan Data Produk Perkategori',
            'kategori' => $this->Mkategori->show($kategori),
            'data' => $this->Mproduk->perkategori($kategori),
        ];
        $this->load->view('laporan/produk/kategori', $data);
    }
}

/* End of file Produk.php */
