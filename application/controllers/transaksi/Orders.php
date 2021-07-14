<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_user();
        $this->load->model('transaksi/Morders');
    }
    public function index()
    {
        $data = [
            'title' => 'Pesanan',
            'links' => '<li class="active">Pesanan</li>'
        ];
        $this->template->display('transaksi/orders/index', $data);
    }
    public function data()
    {
        $action = $this->input->post('action');
        if (isset($action)) {
            if ($action == 'fetch_data') {
                $query = $this->Morders->fetch_all();
                if ($query == null) {
                    $data = (int)0;
                } else {
                    foreach ($query as $row) {
                        $data[] = [
                            'id' => $row['id_pesan'],
                            'pelanggan' => $row['nama_pelanggan'],
                            'tglpesan' => format_biasa($row['tgl_pesan']),
                            'tglacara' => format_biasa($row['tgl_mulai']) . ' s/d ' . format_biasa($row['tgl_selesai']),
                            'total' => rupiah($row['total_bayar']),
                            'bayar' => rupiah($row['bayar']),
                            'sisa' => rupiah($row['total_bayar'] - $row['bayar']),
                            'status' => $row['status_pesan'] == 0 ? '<span class="orange">Belum Bayar</span>' : ($row['status_pesan'] == 1 ? '<span class="green">Sudah Bayar</span>' : '<span class="red">Dibatalkan</span>')
                        ];
                    }
                }
                echo json_encode($data);
            }
        }
    }
    public function detail()
    {
        $kode = $this->input->get('kode');
        $data = [
            'name' => 'Detail Pemesanan',
            'modallg' => 1,
            'data' => $this->Morders->detail($kode)
        ];
        $this->template->modal_alert('transaksi/orders/detail', $data);
    }
    public function cancel()
    {
        $kode = $this->input->get('kode');
        $this->Morders->batal($kode);
        $json = array(
            'status' => '0100',
            'pesan' => 'Pesanan Berhasil Dibatalkan'
        );
        echo json_encode($json);
    }
}

/* End of file Orders.php */
