<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpelanggan extends CI_Model
{
    public function fetch_all()
    {
        return $this->db->get('pelanggan')->result_array();
    }
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
            'email_pelanggan' => $post['email'],
            'phone_pelanggan' => $post['phone'],
            'alamat_pelanggan' => $post['alamat'],
            'status_pelanggan' => $post['status']
        );
        return $this->db->insert('pelanggan', $data);
    }
    public function show($id = null)
    {
        return $this->db->where('id_pelanggan', $id)->get('pelanggan')->row_array();
    }
    public function update($post)
    {
        $data = array(
            'nama_pelanggan' => $post['nama'],
            'email_pelanggan' => $post['email'],
            'phone_pelanggan' => $post['phone'],
            'alamat_pelanggan' => $post['alamat'],
            'status_pelanggan' => $post['status']
        );
        return $this->db->where('id_pelanggan', $post['kode'])->update('pelanggan', $data);
    }
    public function destroy($kode)
    {
        return $this->db->simple_query("DELETE FROM pelanggan WHERE id_pelanggan='$kode'");
    }
}

/* End of file Mpelanggan.php */
