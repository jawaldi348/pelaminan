<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_user();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'links' => '<li class="active">Dashboard</li>'
        ];
        $this->template->display('layout/content', $data);
    }
}

/* End of file Dashboard.php */
