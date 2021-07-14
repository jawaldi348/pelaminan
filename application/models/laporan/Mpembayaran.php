<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpembayaran extends CI_Model
{
    public function perperiode($awal, $akhir)
    {
        return $this->db->from('konfirmasi_bayar')
            ->join('pemesanan', 'idpesan_konfirmasi=id_pesan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->join('bank_kode', 'idbank_konfirmasi=id_bank')
            ->where('status_konfirmasi', 1)
            ->where("tanggal_transfer BETWEEN '$awal' AND '$akhir'")
            ->order_by('id_konfirmasi', 'DESC')
            ->get()->result_array();
    }
    public function perbulan($bulan, $tahun)
    {
        return $this->db->from('konfirmasi_bayar')
            ->join('pemesanan', 'idpesan_konfirmasi=id_pesan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->join('bank_kode', 'idbank_konfirmasi=id_bank')
            ->where('status_konfirmasi', 1)
            ->where("DATE_FORMAT(tanggal_transfer,'%c')='$bulan' AND DATE_FORMAT(tanggal_transfer,'%Y')='$tahun'")
            ->order_by('id_konfirmasi', 'DESC')
            ->get()->result_array();
    }
}

/* End of file Mpembayaran.php */
