<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpayments extends CI_Model
{
    public function fetch_all()
    {
        return $this->db->from('konfirmasi_bayar')
            ->join('pemesanan', 'idpesan_konfirmasi=id_pesan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->join('bank_kode', 'idbank_konfirmasi=id_bank')
            ->order_by('id_konfirmasi', 'DESC')
            ->get()->result_array();
    }
    public function show($id = null)
    {
        return $this->db->from('konfirmasi_bayar')
            ->join('pemesanan', 'idpesan_konfirmasi=id_pesan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->join('bank_kode', 'idbank_konfirmasi=id_bank')
            ->where('id_konfirmasi', $id)
            ->get()->row_array();
    }
    public function batal($kode)
    {
        $data = $this->show($kode);
        if ($data['status_konfirmasi'] == 2) :
            $this->db->query("UPDATE konfirmasi_bayar SET status_konfirmasi='0' WHERE id_konfirmasi='$kode'");
        else :
            $this->db->query("UPDATE konfirmasi_bayar SET status_konfirmasi='2' WHERE id_konfirmasi='$kode'");
        endif;
    }
    public function approve($id = null)
    {
        $data = $this->show($id);
        $this->db->query("UPDATE konfirmasi_bayar SET status_konfirmasi='1' WHERE id_konfirmasi='$id'");
        $idpesan = $data['id_pesan'];
        $query = $this->db->select('*,(SELECT IFNULL(SUM(jumlah_konfirmasi),0) FROM konfirmasi_bayar WHERE id_pesan=idpesan_konfirmasi AND status_konfirmasi=1) AS bayar')
            ->from('pemesanan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->where('id_pesan', $idpesan)
            ->get()->row_array();
        if ($query['total_bayar'] == $query['bayar']) {
            $this->db->query("UPDATE pemesanan SET status_pesan='1' WHERE id_pesan='$idpesan'");
        }
        return true;
    }
}

/* End of file Mpayments.php */
