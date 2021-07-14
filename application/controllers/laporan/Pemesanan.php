<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_user();
        $this->load->model('laporan/Mpemesanan');
    }
    public function index()
    {
        $data = [
            'title' => 'Laporan Pemesanan',
            'links' => '<li>Laporan</li><li class="active">Pemesanan</li>',
        ];
        $this->template->display('laporan/pemesanan/index', $data);
    }
    public function perperiode()
    {
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data = [
            'title' => 'Laporan Pemesanan Perperiode',
            'awal' => $awal,
            'akhir' => $akhir,
            'data' => $this->Mpemesanan->perperiode($awal, $akhir)
        ];
        $this->load->view('laporan/pemesanan/perperiode', $data);
    }
    public function perbulan()
    {
        $bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);
        $data = [
            'title' => 'Laporan Pemesanan Perbulan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'data' => $this->Mpemesanan->perbulan($bulan, $tahun)
        ];
        $this->load->view('laporan/pemesanan/perbulan', $data);
    }
    public function pertahun()
    {
        $tahun = $this->input->post('tahun', true);
        $data = [
            'title' => 'Laporan Pemesanan Pertahun',
            'tahun' => $tahun
        ];
        $this->load->view('laporan/pemesanan/pertahun', $data);
    }
    public function belumlunastanggal()
    {
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data = [
            'title' => 'Laporan Pemesanan Belum Lunas Perperiode',
            'awal' => $awal,
            'akhir' => $akhir,
            'data' => $this->Mpemesanan->belumlunastanggal($awal, $akhir)
        ];
        $this->load->view('laporan/pemesanan/belumlunastanggal', $data);
    }
    public function belumlunasbulan()
    {
        $bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);
        $data = [
            'title' => 'Laporan Pemesanan Belum Lunas Perbulan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'data' => $this->Mpemesanan->belumlunasbulan($bulan, $tahun)
        ];
        $this->load->view('laporan/pemesanan/belumlunasbulan', $data);
    }
    public function lunastanggal()
    {
        $awal = $this->input->post('awal');
        $akhir = $this->input->post('akhir');
        $data = [
            'title' => 'Laporan Pemesanan Sudah Lunas Perperiode',
            'awal' => $awal,
            'akhir' => $akhir,
            'data' => $this->Mpemesanan->lunastanggal($awal, $akhir)
        ];
        $this->load->view('laporan/pemesanan/lunastanggal', $data);
    }
    public function lunasbulan()
    {
        $bulan = $this->input->post('bulan', true);
        $tahun = $this->input->post('tahun', true);
        $data = [
            'title' => 'Laporan Pemesanan Sudah Lunas Perbulan',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'data' => $this->Mpemesanan->lunasbulan($bulan, $tahun)
        ];
        $this->load->view('laporan/pemesanan/lunasbulan', $data);
    }
}

/* End of file Pemesanan.php */
