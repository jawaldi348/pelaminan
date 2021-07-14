<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpemesanan extends CI_Model
{
    public function perperiode($awal, $akhir)
    {
        return $this->db->from('pemesanan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->where("tgl_pesan BETWEEN '$awal' AND '$akhir'")
            ->order_by('id_pesan', 'DESC')
            ->get()->result_array();
    }
    public function perbulan($bulan, $tahun)
    {
        return $this->db->from('pemesanan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->where("DATE_FORMAT(tgl_pesan,'%c')='$bulan' AND DATE_FORMAT(tgl_pesan,'%Y')='$tahun'")
            ->order_by('id_pesan', 'DESC')
            ->get()->result_array();
    }
    public function belumlunastanggal($awal, $akhir)
    {
        return $this->db->from('pemesanan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->where('status_pesan', 0)
            ->where("tgl_pesan BETWEEN '$awal' AND '$akhir'")
            ->order_by('id_pesan', 'DESC')
            ->get()->result_array();
    }
    public function belumlunasbulan($bulan, $tahun)
    {
        return $this->db->from('pemesanan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->where('status_pesan', 0)
            ->where("DATE_FORMAT(tgl_pesan,'%c')='$bulan' AND DATE_FORMAT(tgl_pesan,'%Y')='$tahun'")
            ->order_by('id_pesan', 'DESC')
            ->get()->result_array();
    }
    public function lunastanggal($awal, $akhir)
    {
        return $this->db->from('pemesanan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->where('status_pesan', 1)
            ->where("tgl_pesan BETWEEN '$awal' AND '$akhir'")
            ->order_by('id_pesan', 'DESC')
            ->get()->result_array();
    }
    public function lunasbulan($bulan, $tahun)
    {
        return $this->db->from('pemesanan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->where('status_pesan', 1)
            ->where("DATE_FORMAT(tgl_pesan,'%c')='$bulan' AND DATE_FORMAT(tgl_pesan,'%Y')='$tahun'")
            ->order_by('id_pesan', 'DESC')
            ->get()->result_array();
    }
}

/* End of file Mpemesanan.php */
