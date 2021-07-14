<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_user();
        $this->load->model('master/Mproduk');
        $this->load->model('master/Mkategori');
    }
    public function index()
    {
        $data = [
            'title' => 'Produk',
            'links' => '<li class="active">Produk</li>',
            'data' => $this->Mproduk->fetch_all()
        ];
        $this->template->display('master/produk/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Produk',
            'links' => '<li>Produk</li><li class="active">Tambah</li>',
            'kategori' => $this->Mkategori->fetch_all()
        ];
        $this->template->display('master/produk/create', $data);
    }
    public function store()
    {
        $this->form_validation->set_rules('nama', 'Nama produk', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('desc', 'Deskripsi', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_message('required', errorRequired());
        $this->form_validation->set_error_delimiters(errorDelimiter(), errorDelimiter_close());
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post(null, TRUE);
            if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != "") {
                $config['upload_path']   = './assets/images/produk';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 0;
                $config['encrypt_name']  = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar')) {
                    $data['upload_data'] = $this->upload->data('file_name');
                    $link = './assets/images/produk/' . $data['upload_data'];
                } else {
                    $link = '';
                }
                $this->Mproduk->store($post, $link);
                $json = array(
                    'status' => '0100',
                    'message' => 'Data produk telah disimpan'
                );
            } else {
                $json = array(
                    'status' => '0101',
                    'message' => 'Data produk gagal disimpan'
                );
                foreach ($_POST as $key => $value) {
                    $json['pesan'][$key] = form_error($key);
                }
            }
        } else {
            $json = array(
                'status' => '0101',
                'message' => 'Data produk gagal disimpan'
            );
            foreach ($_POST as $key => $value) {
                $json['pesan'][$key] = form_error($key);
            }
        }
        echo json_encode($json);
    }
    public function edit($kode)
    {
        $data = [
            'title' => 'Produk',
            'links' => '<li>Produk</li><li class="active">Edit</li>',
            'data' => $this->Mproduk->show($kode),
            'kategori' => $this->Mkategori->fetch_all()
        ];
        $this->template->display('master/produk/edit', $data);
    }
    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama produk', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('desc', 'Deskripsi', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_message('required', errorRequired());
        $this->form_validation->set_error_delimiters(errorDelimiter(), '</div>');
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post(null, TRUE);
            if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != "") {
                $config['upload_path']   = './assets/images/produk';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size']      = 0;
                $config['encrypt_name']  = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar')) {
                    $data['upload_data'] = $this->upload->data('file_name');
                    $link = './assets/images/produk/' . $data['upload_data'];
                } else {
                    $link = '';
                }
                $this->Mproduk->update($post, $link);
            } else {
                $this->Mproduk->update($post, $link = null);
            }
            $json = array(
                'status' => '0100',
                'pesan' => 'Data produk telah dirubah'
            );
        } else {
            $json = array(
                'status' => '0101'
            );
            foreach ($_POST as $key => $value) {
                $json['pesan'][$key] = form_error($key);
            }
        }
        echo json_encode($json);
    }
    public function destroy()
    {
        $kode = $this->input->post('kode', true);
        $action = $this->Mproduk->destroy($kode);
        if ($action) {
            $json = array(
                'status' => '0100',
                'message' => successDestroy()
            );
        } else {
            $json = array(
                'status' => '0101',
                'message' => errorDestroy()
            );
        }
        echo json_encode($json);
    }
}

/* End of file Produk.php */
