<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_user();
        $this->load->model('transaksi/Mpayments');
    }
    public function index()
    {
        $data = [
            'title' => 'Pembayaran',
            'links' => '<li class="active">Pembayaran</li>'
        ];
        $this->template->display('transaksi/payments/index', $data);
    }
    public function data()
    {
        $action = $this->input->post('action');
        if (isset($action)) {
            if ($action == 'fetch_data') {
                $query = $this->Mpayments->fetch_all();
                if ($query == null) {
                    $data = (int)0;
                } else {
                    foreach ($query as $row) {
                        $data[] = [
                            'id' => $row['id_konfirmasi'],
                            'idpesan' => $row['id_pesan'],
                            'pelanggan' => $row['nama_pelanggan'],
                            'tgltransfer' => format_biasa($row['tanggal_transfer']),
                            'bank' => $row['nama_bank'],
                            'pengirim' => $row['atasnama_rekening'],
                            'norek' => $row['nomor_rekening'],
                            'jumlah' => rupiah($row['jumlah_konfirmasi']),
                            'status' => $row['status_konfirmasi'] == 0 ? '<span class="orange">Pending</span>' : ($row['status_konfirmasi'] == 1 ? '<span class="green">Diterima</span>' : '<span class="red">Dibatalkan</span>')
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
            'name' => 'Detail Pembayaran',
            'data' => $this->Mpayments->show($kode)
        ];
        $this->template->modal_alert('transaksi/payments/detail', $data);
    }
    public function cancel()
    {
        $kode = $this->input->get('kode');
        $this->Mpayments->batal($kode);
        $json = array(
            'status' => '0100',
            'pesan' => 'Pembayaran Berhasil Dibatalkan'
        );
        echo json_encode($json);
    }
    public function approve()
    {
        $kode = $this->input->get('kode');
        $this->Mpayments->approve($kode);
        $json = array(
            'status' => '0100',
            'pesan' => 'Konfirmasi Pembayaran Disetujui'
        );
        echo json_encode($json);
    }
    public function batal()
    {
        $kode = $this->input->get('kode');
        $this->Mpayments->batal($kode);
        $json = array(
            'status' => '0100',
            'pesan' => 'Konfirmasi Pembayaran Dibatalkan'
        );
        echo json_encode($json);
    }
}

/* End of file Payments.php */
