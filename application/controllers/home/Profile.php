<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_pelanggan();
        $this->load->model('home/Mauth');
    }
    public function index()
    {
        $data = [
            'title' => 'Profile | Pelaminan Basrida Wiwi',
            'data' => $this->Mauth->show()
        ];
        $this->template->home('home/profile', $data);
    }
    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'No. HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_message('required', errorRequired());
        $this->form_validation->set_message('valid_email', errorValidemail());
        $this->form_validation->set_error_delimiters(errorDelimiterHome(), errorDelimiterHome_close());
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post(null, TRUE);
            $this->Mauth->update($post);
            $json = array(
                'status' => '0100',
                'pesan' => 'Data Anda berhasi diupdate'
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
}

/* End of file Profile.php */
