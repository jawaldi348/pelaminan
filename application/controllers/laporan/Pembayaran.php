<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_user();
        $this->load->model('laporan/Mpembayaran');
    }
    public function index()
    {
        $data = [
            'title' => 'Laporan Pembayaran',
            'links' => '<li>Laporan</li><li class="active">Pembayaran</li>',
        ];
        $this->template->display('laporan/pembayaran/index', $data);
    }
    public function perperiode()
    {
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data = [
            'title' => 'Laporan Pembayaran Perperiode',
            'awal' => $awal,
            'akhir' => $akhir,
            'data' => $this->Mpembayaran->perperiode($awal, $akhir)
        ];
        $this->load->view('laporan/pembayaran/perperiode', $data);
    }
    public function perbulan()
    {
        $bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);
        $data = [
            'title' => 'Laporan Pembayaran Perbulan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'data' => $this->Mpembayaran->perbulan($bulan, $tahun)
        ];
        $this->load->view('laporan/pembayaran/perbulan', $data);
    }
    public function pertahun()
    {
        $tahun = $this->input->post('tahun', true);
        $data = [
            'title' => 'Laporan Pembayaran Pertahun',
            'tahun' => $tahun
        ];
        $this->load->view('laporan/pembayaran/pertahun', $data);
    }
}

/* End of file Pembayaran.php */
