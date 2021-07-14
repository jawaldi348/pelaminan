<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_pelanggan();
        $this->load->model('home/Mkeranjang');
        $this->load->model('home/Mcheckout');
        $this->load->model('master/Mrekening');
    }
    public function index()
    {
        $data = [
            'title' => 'Checkout | Pelaminan Basrida Wiwi'
        ];
        $this->template->home('home/checkout', $data);
    }
    public function datalokasi()
    {
        $data = $this->Mcheckout->data_lokasi();
        echo $data->lokasi_tmp != null ? $data->lokasi_tmp : '<span style="color: #eb4800">Lokasi acara belum ditambahkan.</span>';
    }
    public function editlokasi()
    {
        $data = $this->Mcheckout->data_lokasi();
        echo '<div class="controls"><textarea name="lokasi" id="lokasi" rows="5" class="span6">' . $data->lokasi_tmp . '</textarea></div><button type="button" class="btn btn-inverse" onclick="savelokasi()">Simpan Lokasi</button>';
    }
    public function savelokasi()
    {
        $lokasi = $this->input->post('lokasi');
        $this->db->query("UPDATE tmp_order SET lokasi_tmp='$lokasi' WHERE user_tmp='" . id_pelanggan() . "'");
        return true;
    }
    public function dataproduk()
    {
        $data = $this->Mkeranjang->fetch_all();
        echo '<table class="table" style="margin-bottom: 10px">';
        echo '<tr>';
        echo '<th>Nama Produk</th>';
        echo '<th>Harga</th>';
        echo '<th>Jumlah</th>';
        echo '<th style="text-align: right;">Total Harga</th>';
        echo '</tr>';
        $total = 0;
        foreach ($data as $d) {
            $total = $total +  ($d['harga_produk'] * $d['jumlah_tmp']);
            echo '<tr>';
            echo '<td>' . $d['nama_produk'] . '</td>';
            echo '<td>' . rupiah($d['harga_produk']) . '</td>';
            echo '<td>' . count_format($d['jumlah_tmp']) . '</td>';
            echo '<td style="text-align: right;">Rp ' . rupiah($d['harga_produk'] * $d['jumlah_tmp']) . '</td>';
            echo '</tr>';
        }
        echo '<tr>';
        echo '<th>Grand Total</th>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<th style="text-align: right;"><strong>Rp ' . rupiah($total) . '</strong></th>';
        echo '</tr>';
        echo '</table>';
        echo '<table class="table">';
        echo '<tr>';
        echo '<th width="8%">Bayar DP</th>';
        echo '<th>';
        echo '<label class="radio">
        <input type="radio" name="bayar" value="1"><strong>Rp ' . rupiah(25 * $total / 100) . '</strong>
        </label>';
        echo '</th>';
        echo '<th width="8%">Bayar Lunas</th>';
        echo '<th>';
        echo '<label class="radio">
        <input type="radio" name="bayar" value="2"><strong>Rp ' . rupiah($total) . '</strong>
        </label>';
        echo '</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<td colspan="4">';
        echo 'Pembayaran harap ditransfer ke rekening:';
        echo '<ul>';
        $rekening = $this->Mrekening->fetch_all();
        foreach ($rekening as $r) {
            echo '<li>';
            echo 'Bank ' . $r['nama_bank'] . ' Norek: ' . $r['nomor_rekening'] . ' Pemilik: ' . $r['atasnama_rekening'];
            echo '</li>';
        }
        echo '</ul>';
        '</td>';
        echo '</tr>';
        echo '</table>';
    }
    public function store()
    {
        error_reporting(E_ALL ^ E_NOTICE);
        $post = $this->input->post(null, TRUE);
        $data = $this->Mcheckout->data_lokasi();
        if ($data->lokasi_tmp != null) {
            if ($post['bayar'] != null) {
                $kode = $this->Mcheckout->kode();
                $action = $this->Mcheckout->store($kode, $post);
                if ($action == true) :
                    $json = array(
                        'status' => '0100',
                        'kode' => $kode,
                        'pesan' => 'Pesanan Anda berhasil dibuat'
                    );
                else :
                    $json = array(
                        'status' => '0101',
                        'pesan' => 'Pesanan Anda gagal dibuat'
                    );
                endif;
            } else {
                $json = array(
                    'status' => '0101',
                    'pesan' => 'Jenis pembayaran belum dipilih'
                );
            }
        } else {
            $json = array(
                'status' => '0101',
                'pesan' => 'Lokasi acara belum ditambahkan'
            );
        }
        echo json_encode($json);
    }
}

/* End of file Checkout.php */
