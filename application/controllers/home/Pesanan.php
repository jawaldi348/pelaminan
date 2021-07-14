<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_pelanggan();
        $this->load->model('home/Mpesan');
        $this->load->model('master/Mrekening');
    }
    public function index()
    {
        $data = [
            'title' => 'Pesanan | Pelaminan Basrida Wiwi',
            'data' => $this->Mpesan->fetch_all()
        ];
        $this->template->home('home/pesanan_data', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Pesanan | Pelaminan Basrida Wiwi',
            'data' => $this->Mpesan->show($id),
            'rekening' => $this->Mrekening->fetch_all()
        ];
        $this->template->home('home/pesanan_detail', $data);
    }
    public function cancel()
    {
        $kode = $this->input->get('kode');
        $this->Mpesan->cancel($kode);
        $json = array(
            'status' => '0100',
            'pesan' => 'Pesanan Anda telah dibatalkan'
        );
        echo json_encode($json);
    }
    public function konfirmasi($id)
    {
        $data = [
            'title' => 'Konfirmasi Pembayaran | Pelaminan Basrida Wiwi',
            'data' => $this->Mpesan->show($id)
        ];
        $this->template->home('home/pesanan_confirm', $data);
    }
    public function konfirmasi_store()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal transfer', 'required');
        $this->form_validation->set_rules('nilai', 'Jumlah transfer', 'required');
        $this->form_validation->set_rules('bank', 'Bank Pengirim', 'required');
        $this->form_validation->set_rules('pemilik', 'Atasnama', 'required');
        $this->form_validation->set_rules('norek', 'No Rekening', 'required');
        $this->form_validation->set_message('required', errorRequired());
        $this->form_validation->set_error_delimiters(errorDelimiterHome(), errorDelimiterHome_close());
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post(null, TRUE);
            $types = array('image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/svg+xml');
            $mime = get_mime_by_extension($_FILES['gambar']['name']);
            if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != "") {
                if (in_array($mime, $types)) {
                    $config['upload_path'] = 'assets/images/bukti';
                    $config['allowed_types'] = 'jpg|jpeg|png|svg';
                    $config['max_size'] = 819200;
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('gambar')) {
                        $data['upload_data'] = $this->upload->data('file_name');
                        $link = 'images/bukti/' . $data['upload_data'];
                    }
                    if ($_FILES['gambar']['size'] > 819200) {
                        $json = array(
                            'status' => '0101',
                            'error' => '<div class="text-red">Ukuran file tidak boleh melebihi 800KB</div>'
                        );
                    } else {
                        $this->Mpesan->konfirmasi_store($post, $link);
                        $json = array(
                            'status' => '0100',
                            'pesan' => 'Konfirmasi pembayaran berhasil disimpan'
                        );
                    }
                } else {
                    $json = array(
                        'status' => '0101',
                        'error' => '<div class="text-red">Harap unggah file yang hanya berekstensi .jpeg / .jpg / .png.</div>'
                    );
                }
            } else {
                $json = array(
                    'status' => '0101',
                    'error' => '<div class="text-red">Silahkan upload bukti pembayaran.</div>'
                );
            }
        } else {
            $json['status'] = '0101';
            foreach ($_POST as $key => $value) {
                $json['pesan'][$key] = form_error($key);
            }
        }
        echo json_encode($json);
    }
    public function pembayaran()
    {
        $data = [
            'title' => 'Pembayaran | Pelaminan Basrida Wiwi',
            'data' => $this->Mpesan->data_bayar()
        ];
        $this->template->home('home/pesanan_bayar', $data);
    }
    public function pembayaran_batal()
    {
        $kode = $this->input->get('kode');
        $this->db->query("UPDATE konfirmasi_bayar SET status_konfirmasi='2' WHERE id_konfirmasi='$kode'");
        $json = array(
            'status' => '0100',
            'pesan' => 'Pembayaran telah dibatalkan'
        );
        echo json_encode($json);
    }
}

/* End of file Pesanan.php */
