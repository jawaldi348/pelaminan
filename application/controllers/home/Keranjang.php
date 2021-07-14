<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home/Mkeranjang');
    }
    public function index()
    {
        $data = [
            'title' => 'Keranjang | Pelaminan Basrida Wiwi',
            'data' => $this->Mkeranjang->fetch_all()
        ];
        $this->template->home('home/keranjang', $data);
    }
    public function store()
    {
        if ($this->session->userdata('status_home') == null) :
            $json = array(
                'status' => '0101',
                'pesan' => 'Anda harus login terlebih dahulu!!!'
            );
        else :
            $post = $this->input->post(null, TRUE);
            $this->Mkeranjang->store($post);
            $json = array(
                'status' => '0100',
                'pesan' => 'Produk berhasil ditambahkan ke keranjang'
            );
        endif;
        echo json_encode($json);
    }
    public function update()
    {
        $post = $this->input->post(null, TRUE);
        $action = $this->Mkeranjang->update($post);
        if ($action == true) :
            $json = array(
                'status' => '0100',
                'pesan' => 'Data produk di keranjang berhasil dirubah'
            );
        else :
            $json = array(
                'status' => '0101',
                'pesan' => 'Data produk di keranjang gagal dirubah'
            );
        endif;
        echo json_encode($json);
    }
    public function destroy($kode)
    {
        $this->db->where('id_tmp', $kode)->delete('tmp_order');
        redirect('keranjang');
    }
}

/* End of file Keranjang.php */
