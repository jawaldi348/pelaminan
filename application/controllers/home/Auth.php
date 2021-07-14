<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home/Mauth');
    }
    public function index()
    {
        if ($this->session->userdata('status_home') != 'session_basridahome') :
            $data = [
                'title' => 'Registrasi & Login | Pelaminan Basrida Wiwi'
            ];
            $this->template->home('home/auth', $data);
        else :
            redirect(base_url());
        endif;
    }
    public function login()
    {
        $post = $this->input->post(null, TRUE);
        $email = $post['email'];
        $check_user = $this->check_pelanggan($email);
        $this->form_validation->set_rules('email', 'Email', 'callback_email_check[' . $check_user->num_rows() . ']');
        $this->form_validation->set_rules('password', 'Password', 'callback_password_check[' . $email . ']');
        $this->form_validation->set_error_delimiters(errorDelimiterHome(), errorDelimiterHome_close());
        if ($this->form_validation->run()) {
            $data = $check_user->row_array();
            $this->session->set_userdata('masuk', TRUE);
            if ($this->session->userdata('masuk') == TRUE) {
                $this->session->set_userdata('status_home', 'session_basridahome');
                $this->session->set_userdata('kode_pelanggan', $data['id_pelanggan']);
                $json = ['status' => '0100', 'pesan' => 'Anda berhasil login'];
            } else {
                $this->session->sess_destroy();
                $json = ['status' => '0101'];
            }
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
    public function check_pelanggan($email)
    {
        return $this->db->where(['email_pelanggan' => $email, 'status_pelanggan' => 1])->get('pelanggan');
    }
    public function email_check($email, $recordCount)
    {
        if ($email == null) {
            $this->form_validation->set_message('email_check', 'Email tidak boleh kosong');
            return false;
        } else if ($recordCount == 0) {
            $this->form_validation->set_message('email_check', 'Email tidak ditemukan');
            return FALSE;
        } else {
            return true;
        }
    }
    public function password_check($password, $email)
    {
        $check = $this->check_pelanggan($email);
        $query = $check->row_array();
        $pass  = $query['pass_pelanggan'];
        if ($password == null) {
            $this->form_validation->set_message('password_check', 'Password tidak boleh kosong');
            return false;
        } else {
            if (password_verify($password, $pass)) {
                return true;
            } else {
                $this->form_validation->set_message('password_check', 'Password anda salah');
                return FALSE;
            }
        }
    }
    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'No. HP', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('pass_reg', 'Password', 'required');
        $this->form_validation->set_message('required', errorRequired());
        $this->form_validation->set_message('valid_email', errorValidemail());
        $this->form_validation->set_error_delimiters(errorDelimiterHome(), errorDelimiterHome_close());
        if ($this->form_validation->run() == TRUE) {
            $post = $this->input->post(null, TRUE);
            $this->Mauth->store($post);
            $json = array(
                'status' => '0100',
                'pesan' => 'Anda berhasil melakukan registrasi'
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
    public function logout()
    {
        $this->session->unset_userdata('status_home', FALSE);
        $this->session->unset_userdata('kode_pelanggan');
        redirect(base_url());
    }
}

/* End of file Auth.php */
