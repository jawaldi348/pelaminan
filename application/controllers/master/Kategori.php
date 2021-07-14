<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_user();
        $this->load->model('master/Mkategori');
    }
    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'links' => '<li class="active">Kategori</li>'
        ];
        $this->template->display('master/kategori/index', $data);
    }
    public function data()
    {
        $action = $this->input->post('action');
        $urut   = $this->input->post('page_id_array');
        if (isset($action)) {
            if ($action == 'fetch_data') {
                $query = $this->db->from('kategori')->order_by('nourut_kategori', 'ASC')->get()->result_array();
                foreach ($query as $row) {
                    $data[] = $row;
                }
                echo json_encode($data);
            }
            if ($action == 'update') {
                for ($count = 0; $count < count($urut); $count++) {
                    $this->db->set('nourut_kategori', ($count + 1));
                    $this->db->where('id_kategori', $urut[$count]);
                    $this->db->update('kategori');
                }
            }
        }
    }
    public function create()
    {
        $data = [
            'name' => 'Tambah Kategori',
            'post' => 'kategori/store',
            'class' => 'form_create'
        ];
        $this->template->modal_form('master/kategori/create', $data);
    }
    public function store()
    {
        $this->form_validation->set_rules('nama', 'Nama kategori', 'required');
        $this->form_validation->set_rules('utama', 'utama', 'required');
        $this->form_validation->set_message('required', errorRequired());
        $this->form_validation->set_error_delimiters(errorDelimiter(), errorDelimiter_close());
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post(null, TRUE);
            $this->Mkategori->store($post);
            $json = array(
                'status' => '0100',
                'pesan' => 'Data kategori telah disimpan'
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
    public function edit()
    {
        $kode = $this->input->get('kode');
        $data = [
            'name' => 'Edit Kategori',
            'post' => 'kategori/update',
            'class' => 'form_create',
            'data' => $this->Mkategori->show($kode)
        ];
        $this->template->modal_form('master/kategori/edit', $data);
    }
    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama kategori', 'required');
        $this->form_validation->set_rules('utama', 'utama', 'required');
        $this->form_validation->set_message('required', errorRequired());
        $this->form_validation->set_error_delimiters(errorDelimiter(), errorDelimiter_close());
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post(null, TRUE);
            $this->Mkategori->update($post);
            $json = array(
                'status' => '0100',
                'pesan' => 'Data kategori telah dirubah'
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
        $action = $this->Mkategori->destroy($kode);
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

/* End of file Kategori.php */
