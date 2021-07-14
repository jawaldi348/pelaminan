<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpesan extends CI_Model
{
    public function fetch_all()
    {
        return $this->db->select('*,(SELECT IFNULL(SUM(jumlah_konfirmasi),0) FROM konfirmasi_bayar WHERE id_pesan=idpesan_konfirmasi AND status_konfirmasi=1) AS bayar')
            ->where('idpelanggan_pesan', id_pelanggan())
            ->order_by('id_pesan', 'DESC')
            ->get('pemesanan')->result_array();
    }
    public function show($id)
    {
        $query = $this->db->where('id_pesan', $id)->get('pemesanan')->row();
        $data = [
            'id' => $query->id_pesan,
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
    public function cancel($kode)
    {
        return $this->db->query("UPDATE pemesanan SET status_pesan='2' WHERE id_pesan='$kode'");
    }
    public function konfirmasi_store($post, $link)
    {
        $data = array(
            'idpesan_konfirmasi' => $post['idpesan'],
            'idbank_konfirmasi' => $post['bank'],
            'tanggal_transfer' => $post['tanggal'],
            'atasnama_rekening' => $post['pemilik'],
            'nomor_rekening' => $post['norek'],
            'jumlah_konfirmasi' => $post['nilai'],
            'bukti_transfer' => $link,
            'status_konfirmasi' => 0
        );
        return $this->db->insert('konfirmasi_bayar', $data);
    }
    public function data_bayar()
    {
        return $this->db->from('konfirmasi_bayar')
            ->join('pemesanan', 'idpesan_konfirmasi=id_pesan')
            ->join('bank_kode', 'idbank_konfirmasi=id_bank')
            ->where('idpelanggan_pesan', id_pelanggan())
            ->order_by('id_konfirmasi', 'DESC')
            ->get()->result_array();
    }
}

/* End of file Mpesan.php */
