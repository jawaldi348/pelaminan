<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Musers extends CI_Model
{
    public function fetch_all()
    {
        return $this->db->get('users')->result_array();
    }
    public function kode()
    {
        $query = $this->db
            ->select('id_user', FALSE)
            ->order_by('id_user', 'DESC')
            ->limit(1)
            ->get('users');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->id_user) + 1;
        } else {
            $kode = 1;
        }
        return $kode;
    }
    public function store($post)
    {
        $data = array(
            'id_user' => $this->kode(),
            'username' => $post['username'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT),
            'level' => $post['level']
        );
        return $this->db->insert('users', $data);
    }
    public function show($id = null)
    {
        return $this->db->where('id_user', $id)->get('users')->row_array();
    }
    public function update($post)
    {
        if (empty($post['password'])) {
            $data = array(
                'username' => $post['username'],
                'level' => $post['level']
            );
        } else {
            $data = array(
                'username' => $post['username'],
                'password' => password_hash($post['password'], PASSWORD_BCRYPT),
                'level' => $post['level']
            );
        }
        return $this->db->where('id_user', $post['kode'])->update('users', $data);
    }
    public function destroy($kode)
    {
        return $this->db->simple_query("DELETE FROM users WHERE id_user='$kode'");
    }
}

/* End of file Musers.php */
