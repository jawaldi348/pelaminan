<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Morders extends CI_Model
{
    public function fetch_all()
    {
        return $this->db->select('*,(SELECT IFNULL(SUM(jumlah_konfirmasi),0) FROM konfirmasi_bayar WHERE id_pesan=idpesan_konfirmasi AND status_konfirmasi=1) AS bayar')
            ->from('pemesanan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->order_by('id_pesan', 'DESC')
            ->get()->result_array();
    }
    public function show($kode)
    {
        return $this->db->where('id_pesan', $kode)
            ->get('pemesanan')->row_array();
    }
    public function detail($id)
    {
        $query = $this->db->from('pemesanan')
            ->join('pelanggan', 'idpelanggan_pesan=id_pelanggan')
            ->where('id_pesan', $id)
            ->get()->row();
        $data = [
            'id' => $query->id_pesan,
            'nama' => $query->nama_pelanggan,
            'tanggal' => $query->tgl_pesan,
            'mulai' => $query->tgl_mulai,
            'selesai' => $query->tgl_selesai,
            'lokasi' => $query->lokasi_acara,
            'total' => $query->total_bayar,
            'metode' => $query->metode_bayar,
            'status' => $query->status_pesan
        ];
        $queryProduk = $this->db->from('pemesanan_detail')
            ->join('produk', 'idproduk_detail=id_produk')
            ->where('idpesan_detail', $id)
            ->get()->result();
        $result_produk = array();
        $dataProduk = array();
        foreach ($queryProduk as $qp) {
            $result_produk['produk'] = $qp->nama_produk;
            $result_produk['harga'] = $qp->harga_detail;
            $result_produk['jumlah'] = $qp->jumlah_detail;
            $dataProduk[] = $result_produk;
        }
        $data['dataProduk'] = $dataProduk;
        return $data;
    }
    public function batal($kode)
    {
        $data = $this->show($kode);
        if ($data['status_pesan'] == 2) :
            $this->db->query("UPDATE pemesanan SET status_pesan='0' WHERE id_pesan='$kode'");
        else :
            $this->db->query("UPDATE pemesanan SET status_pesan='2' WHERE id_pesan='$kode'");
        endif;
    }
}

/* End of file Morders.php */
