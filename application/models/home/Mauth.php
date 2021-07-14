<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mauth extends CI_Model
{
    public function kode()
    {
        $query = $this->db
            ->select('id_pelanggan', FALSE)
            ->order_by('id_pelanggan', 'DESC')
            ->limit(1)
            ->get('pelanggan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id_pelanggan) + 1;
        } else {
            $kode = 1;
        }
        return $kode;
    }
    public function store($post)
    {
        $data = array(
            'id_pelanggan' => $this->kode(),
            'nama_pelanggan' => $post['nama'],
            'pass_pelanggan' => password_hash($post['pass_reg'], PASSWORD_BCRYPT),
            'email_pelanggan' => $post['email'],
            'phone_pelanggan' => $post['phone'],
            'alamat_pelanggan' => $post['alamat'],
            'status_pelanggan' => 1
        );
        return $this->db->insert('pelanggan', $data);
    }
    public function show()
    {
        return $this->db->where('id_pelanggan', id_pelanggan())->get('pelanggan')->row_array();
    }
    public function update($post)
    {
        if (empty($post['pass_reg'])) {
            $data = array(
                'nama_pelanggan' => $post['nama'],
                'email_pelanggan' => $post['email'],
                'phone_pelanggan' => $post['phone'],
                'alamat_pelanggan' => $post['alamat']
            );
        } else {
            $data = array(
                'nama_pelanggan' => $post['nama'],
                'pass_pelanggan' => password_hash($post['pass_reg'], PASSWORD_BCRYPT),
                'email_pelanggan' => $post['email'],
                'phone_pelanggan' => $post['phone'],
                'alamat_pelanggan' => $post['alamat']
            );
        }
        return $this->db->where('id_pelanggan', id_pelanggan())->update('pelanggan', $data);
    }
}

/* End of file Mauth.php */
