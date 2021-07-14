<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekening extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_user();
        $this->load->model('master/Mrekening');
    }
    public function index()
    {
        $data = [
            'title' => 'Rekening',
            'links' => '<li class="active">Rekening</li>'
        ];
        $this->template->display('master/rekening/index', $data);
    }
    public function data()
    {
        $action = $this->input->post('action');
        if (isset($action)) {
            if ($action == 'fetch_data') {
                $query = $this->Mrekening->fetch_all();
                if ($query == null) {
                    $data = (int)0;
                } else {
                    foreach ($query as $row) {
                        $data[] = $row;
                    }
                }
                echo json_encode($data);
            }
        }
    }
    public function create()
    {
        $data = [
            'name' => 'Tambah Rekening',
            'post' => 'rekening/store',
            'class' => 'form_create',
            'bank' => $this->Mrekening->bank()
        ];
        $this->template->modal_form('master/rekening/create', $data);
    }
    public function store()
    {
        $this->form_validation->set_rules('bank', 'Bank', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('pemilik', 'Atasnama', 'required');
        $this->form_validation->set_message('required', errorRequired());
        $this->form_validation->set_error_delimiters(errorDelimiter(), errorDelimiter_close());
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post(null, TRUE);
            $this->Mrekening->store($post);
            $json = array(
                'status' => '0100',
                'pesan' => 'Data rekening telah disimpan'
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
            'name' => 'Edit Rekening',
            'post' => 'rekening/update',
            'class' => 'form_create',
            'data' => $this->Mrekening->show($kode),
            'bank' => $this->Mrekening->bank()
        ];
        $this->template->modal_form('master/rekening/edit', $data);
    }
    public function update()
    {
        $this->form_validation->set_rules('bank', 'Bank', 'required');
        $this->form_validation->set_rules('nomor', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('pemilik', 'Atasnama', 'required');
        $this->form_validation->set_message('required', errorRequired());
        $this->form_validation->set_error_delimiters(errorDelimiter(), errorDelimiter_close());
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post(null, TRUE);
            $this->Mrekening->update($post);
            $json = array(
                'status' => '0100',
                'pesan' => 'Data rekening telah dirubah'
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
        $action = $this->Mrekening->destroy($kode);
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

/* End of file Rekening.php */
