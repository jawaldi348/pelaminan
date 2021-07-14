<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$data = [
			'title' => 'Pelaminan Basrida Wiwi',
			'kategori' => $this->db->from('kategori')->order_by('nourut_kategori', 'ASC')->get()->result_array()
		];
		$this->template->home('home/content', $data);
	}
}
