<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mcheckout extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home/Mkeranjang');
    }
    public function data_lokasi()
    {
        return $this->db->from('tmp_order')
            ->where('user_tmp', id_pelanggan())
            ->limit(1)
            ->get()->row();
    }
    public function kode()
    {
        $query = $this->db
            ->select('id_pesan', FALSE)
            ->order_by('id_pesan', 'DESC')
            ->limit(1)
            ->get('pemesanan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id_pesan) + 1;
        } else {
            $kode = 1;
        }
        return $kode;
    }
    public function store($kode, $post)
    {
        $data_tmp = $this->Mkeranjang->fetch_all();
        $total = 0;
        foreach ($data_tmp as $d) {
            $total = $total +  ($d['harga_produk'] * $d['jumlah_tmp']);
        }
        $data_pesan = array(
            'id_pesan' => $kode,
            'idpelanggan_pesan' => id_pelanggan(),
            'tgl_pesan' => date('Y-m-d'),
            'tgl_mulai' => $post['mulai'],
            'tgl_selesai' => $post['selesai'],
            'lokasi_acara' => $d['lokasi_tmp'],
            'total_bayar' => $total,
            'metode_bayar' => $post['bayar'],
            'status_pesan' => 0
        );
        $pesanan = $this->db->insert('pemesanan', $data_pesan);
        foreach ($data_tmp as $value) {
            $idproduk = $value['produk_tmp'];
            $produk = $this->db->where('id_produk', $idproduk)->get('produk')->row();
            $data_detail = array(
                'idpesan_detail' => $kode,
                'idproduk_detail' => $value['produk_tmp'],
                'harga_detail' => $produk->harga_produk,
                'jumlah_detail' => $value['jumlah_tmp']
            );
            $this->db->insert('pemesanan_detail', $data_detail);
        }
        return $pesanan;
    }
}

/* End of file Mcheckout.php */
